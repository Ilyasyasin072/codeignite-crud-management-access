<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tb_menu'] = $this->db->get('tb_user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_menu', ['nama_menu' =>  $this->input->post('menu')]);
            $this->session->set_flashdata('massage', '
			<div class="alert alert-success" role="alert">
			New Add Menu Management </div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['tb_menu'] = $this->db->get('tb_user_menu')->result_array();
        $data['tb_sub_menu'] = $this->menu->getSubMenu();


        $this->form_validation->set_rules('title', 'Sub Menu Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url Link', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->db->insert('tb_user_sub_menu', $data);
            $this->session->set_flashdata('massage', '
			<div class="alert alert-success" role="alert">
			New Add Sub Menu Management </div>');
            redirect('menu/submenu');
        }
    }

    public function ubahMenu($id)
    {
        $data['title'] = 'Submenu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->menu->getMenuById($id);

        $this->form_validation->set_rules('title', 'Sub Menu Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url Link', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_menu' => $this->input->post('nama_menu'),
            ];
            $this->menu->UbahSubMenu($data);
            $this->session->set_flashdata('flash', '
			<div class="alert alert-success" role="alert">
			New Add Sub Menu Management </div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $data = $this->db->delete('tb_user_sub_menu', array('id' => $id));
        echo "Delete Success!!" . $data;
    }
}
