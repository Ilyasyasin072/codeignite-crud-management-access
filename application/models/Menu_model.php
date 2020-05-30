<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `tb_user_sub_menu`.*, `tb_user_menu`.`nama_menu`
                  FROM `tb_user_sub_menu` JOIN `tb_user_menu`
                  ON `tb_user_sub_menu`.`menu_id` = `tb_user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('tb_user_menu', ['id' => $id])->row_array();
    }

    public function UbahSubMenu()
    {
        $data = [
            "nama_menu" => $this->input->post('nama_menu')
        ];

        $this->db->get_where('id', $this->input->post('id'));
        $this->db->update('tb_user_menu', $data);
    }
}
