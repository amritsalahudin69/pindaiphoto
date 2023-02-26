<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
    $role = $this->session->userdata('log_role');
    $query = "SELECT * FROM `db_role` WHERE `id`= $role";
    $admin = $this->db->query($query)->row();
    ?>
    <li class="nav-heading"><?php echo $admin->name_role ?></li>
    <?php
    $role = $this->session->userdata('log_role');
    $querymenu = "SELECT 
                  `db_menurole`.`id_menu`,
                  `db_menurole`.`insatus`,
                  `db_menu`.`id`,
                  `db_menu`.`menu`,
                  `db_menu`.`route`,
                  `db_menu`.`incode`,
                  `db_ikon`.`kode`
              FROM `db_menurole`
              JOIN `db_menu` on `db_menurole`.`id_menu` = `db_menu`.`id`
              JOIN `db_ikon` on `db_menu`.`id_ikon` = `db_ikon`.`id`
              WHERE `id_role`= $role
              AND `insatus` = 1";
    $menu = $this->db->query($querymenu)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>
      <?php if ($m['incode'] == 1) : ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url($m['route']) ?>">
            <i class="<?php echo $m['kode'] ?>"></i>
            <span><?php echo $m['menu'] ?></span>
          </a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <!-- <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" > -->
          <a class="nav-link">
            <i class="<?php echo $m['kode'] ?>"></i><span><?php echo $m['menu'] ?></span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <?php
          $idm = $m['id'];
          $querysubmenu = "SELECT * FROM `db_menusub` WHERE `id_menu`= $idm AND `incode` = 1";
          $submenu = $this->db->query($querysubmenu)->result_array();
          ?>
          <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <?php foreach ($submenu as $sub) : ?>
                <a href="<?php echo site_url($sub['route']) ?>">
                  <i class="bi bi-circle"></i><span><?php echo $sub['submenu'] ?></span>
                </a>
              <?php endforeach ?>
            </li>
          </ul>
        </li>
      <?php endif ?>
    <?php endforeach ?>

    <!-- End Components Nav -->

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">