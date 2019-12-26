<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

		if ($user) {
			//jika user active
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					//untuk redirect nanti user login
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			wronge password  </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			user is not active </div>');

				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			Email is not registered </div>');

			redirect('auth');
		}
	}

	public function registration()
	{
		//rules
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[tb_user.email]',
			[
				'is_unique' => 'this email has already registered'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'password dont matches',
				'min_length' => 'password to short!'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim|matches[password1]'
		);
		// untuk form validasi
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1
			];
			$this->db->insert('tb_user', $data);
			//session alert after registration
			$this->session->set_flashdata('massage', '
			<div class="alert alert-success" role="alert">
			Congratulation your account has been created </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('massage', '
			<div class="alert alert-success" role="alert">
			you have been logout </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('error/blocked');
	}
}
