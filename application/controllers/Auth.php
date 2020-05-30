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
			Account not activated . Please check email for been activated!! </div>');

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
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0
			];

			//siapkan token

			$token = base64_encode(random_bytes(32));

			$user_token = [
				'email' => $email,
				'token' => $token,
				'created_at' => time()
			];
			$this->db->insert('tb_user', $data);
			$this->db->insert('tb_user_token', $user_token);

			$this->_sendEmail($token, 'verify');
			//session alert after registration
			$this->session->set_flashdata('massage', '
			<div class="alert alert-success" role="alert">
			Please Active your Account !! </div>');
			redirect('auth');
		}
	}

	public function _sendEmail($token, $type)
	{

		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ilyasyasin2811@gmail.com',
			'smtp_pass' => 'Combo123!@#',
			'smtp_port' => 465,
			'meiltype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n",
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('ilyasyasin2811@gmail.com', 'Management Access');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {

			$this->email->subject('Account Verification');
			$this->email->message('click this link to verify account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Active</a>');
		}



		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['created_at'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('tb_user');

					$this->db->delete('tb_user_token', ['email' => $email]);

					$this->session->set_flashdata('massage', '
					<div class="alert alert-success" role="alert">
					' . $email . ' has been activated please login!! </div>');

					redirect('auth');
				} else {

					$this->db->delete('tb_user', ['email' => $email]);
					$this->db->delete('tb_user_token', ['email' => $email]);

					$this->session->set_flashdata('massage', '
					<div class="alert alert-danger" role="alert">
					Account Activation failed?: Token Expired </div>');

					redirect('auth');
				}
			} else {

				$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			Account Activation failed?: Wrong Email </div>');

				redirect('auth');
			}
		} else {

			$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			Account Activation failed?: </div>');

			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('massage', '
			<div class="alert alert-danger" role="alert">
			You have been logout </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('error/blocked');
	}
}
