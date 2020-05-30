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

    public function changepassword()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        //echo "welcome user&nbsp;" . $data['tb_user']['name'];
        $data['title'] = 'User';

        $this->form_validation->set_rules('current_password', 'Current Password' , 'required|trim');
        $this->form_validation->set_rules(
            'new_password1',
            'New Password',
            'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules(
            'new_password2',
            'New Password',
            'required|trim|min_length[3]|matches[new_password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/change-password', $data);
            $this->load->view('templates/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['tb_user']['password']))
            {
                $this->session->set_flashdata('massage', '
                <div class="alert alert-danger" role="alert">
                Wrong current password </div>');
               redirect('user/changepassword');
            } else {

                if($current_password == $new_password) {

                $this->session->set_flashdata('massage', '
                <div class="alert alert-danger" role="alert">
                New password cannot been same as current password!</div>');
                redirect('user/changepassword');
                 
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                     $this->session->set_flashdata('massage', '
                    <div class="alert alert-success" role="alert">
                    Password Change!!</div>');
                    redirect('user/changepassword');
                }
            }

        }
    }

    public function postuser()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        //echo "welcome user&nbsp;" . $data['tb_user']['name'];
        $data['title'] = 'Post';

         if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('users/post_users', $data);
            $this->load->view('templates/footer');
        } else {
        $i = 0;
        $post = $this->input->post('post');
        $desc = $this->input->post('desc');
        $desc2 = $this->input->post('desc2');

        if($post[0] != null) {
            foreach ($post as $row) {
                $data = [
                    'post'=>$row,
                    'desc'=>$desc[$i],
                    'desc2'=>$desc2[$i],
                ];

                $insert = $this->db->insert('tb_post',$data);
                if($insert) {
                    $i++;
                }
            }
        }
        $arr['success'] = true;
        $arr['notif'] = '<div class="alert alert-success"> Data Berhasil !!</div>';
        return $this->output->set_output(json_encode($arr));
    }

    }
}
