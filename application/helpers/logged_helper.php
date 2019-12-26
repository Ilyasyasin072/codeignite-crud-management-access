<?php
function is_logged_in()
{
    $instance = get_instance();
    if (!$instance->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $instance->session->userdata('role_id');
        $menu = $instance->uri->segment(1);

        $queryMenu = $instance->db->get_where('tb_user_menu', ['nama_menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $queryAccess = $instance->db->get_where(
            'tb_user_access_menu',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );

        if ($queryAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }

    function check_access($role_id, $menu_id)
    {
        $instant = get_instance();

        $instant->db->where('role_id', $role_id);
        $instant->db->where('menu_id', $menu_id);
        $result = $instant->db->get('tb_user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }
}
