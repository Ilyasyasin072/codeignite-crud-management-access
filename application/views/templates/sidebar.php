<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $title; ?></div>
    </a>
    <!-- Heading -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `tb_user_menu`.`id`, `tb_user_menu`.`nama_menu`
                        FROM `tb_user_menu` JOIN `tb_user_access_menu` 
                        ON `tb_user_access_menu`.`menu_id` = `tb_user_menu`.`id`
                        WHERE `tb_user_access_menu`.`role_id` = $role_id ORDER BY `tb_user_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <!-- MENU -->
    <?php foreach ($menu as $menu) : ?>
        <div class="sidebar-heading">
            <?= $menu['nama_menu'] ?>
        </div>
        <!-- SUBMENU -->
        <?php
        $menuId = $menu['id'];
        $querySubMenu = "SELECT *
                        FROM `tb_user_sub_menu` JOIN `tb_user_menu` 
                          ON `tb_user_sub_menu`.`menu_id` = `tb_user_menu`.`id`
                       WHERE `tb_user_sub_menu`.`menu_id` = $menuId 
                         AND `tb_user_sub_menu`.`is_active` = 1";

        $Submenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($Submenu as $submenu) : ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $submenu['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($submenu['url']); ?>">
                    <i class="<?= $submenu['icon']; ?>"></i>
                    <span><?= $submenu['title']; ?></span></a>
                </li>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>
        <!-- Page Wrapper -->

        <div class="sidebar-heading">
            Logout
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>

        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
</ul>
<!-- End of Sidebar -->