<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        //echo "welcome user&nbsp;" . $data['tb_user']['name'];
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_user_role'] = $this->db->get('tb_user_role')->result_array();
        $data['title'] = 'Role';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tb_user_role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);

        if($result->num_rows() < 1) {
            $this->db->insert('tb_user_access_menu', $data);
        } else {
            $this->db->delete('tb_user_access_menu', $data);
        }

        $this->session->set_flashdata('massage', '
            <div class="alert alert-success" role="alert">
            Access Changed! </div>');
    }

        public function registrationAdmin()
    {
        //rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_user.email]'
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
            $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //echo "welcome user&nbsp;" . $data['tb_user']['name'];
            $data['title'] = 'Dashboard';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/registration-admin', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1
            ];
            $this->db->insert('tb_user', $data);
            //session alert after registration
            $this->session->set_flashdata('massage', '
            <div class="alert alert-success" role="alert">
            Account New Admin has been created! </div>');
            redirect('admin/registrationAdmin');
        }
    }

    public function showuser()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->db->get('tb_user')->result_array();
        $data['title'] = 'Manage User';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/show-user', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
       $data = $this->db->delete('tb_user', array('id' => $id));
       echo $data;
    }
}
