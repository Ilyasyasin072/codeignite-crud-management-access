<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'User';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {

        $data['title'] = 'Edit Profile';
        $data['tb_user'] = $this->db->get_where('tb_user', 
            ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name','Full Name', 'required|trim');

        if($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];
            //var_dump($upload_image);die;

            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = 'assets/img/profile/';

                $this->load->library('upload', $config);

                //jika file tidak bisa terganti pada linux gunakan perintah
                //sudo chmod -R 777 ./

                if ($this->upload->do_upload('image'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                }

            }

            $this->db->set('name', $name);
            $this->db->where('email' , $email);
            $data = $this->db->update('tb_user');

            $this->session->set_flashdata('massage', '
            <div class="alert alert-success" role="alert">
            Sucess Account been updated </div>');
           redirect('user');

        }
    }
}
