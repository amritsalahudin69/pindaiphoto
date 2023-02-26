<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <?php
  $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
  $sitemap = $this->db->query($query)->row();
  ?>
  <div class="d-flex align-items-center justify-content-between">
    <a href="<?php echo site_url('rumah') ?>" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block"><?php echo $sitemap->judul ?></span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <!-- nav -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <?php
      $q = "SELECT count(*) as `cekemail`
                  from `feedback`
                  where `status` = 1";
      $email = $this->db->query($q)->row();
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <?php if (isset($email->cekemail)) : ?>
            <span class="badge bg-success badge-number"><?= $email->cekemail ?></span>
          <?php else : ?>
            <span class="badge badge-number"><?= $email->cekemail ?></span>
          <?php endif ?>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

          <li class="dropdown-header">
            Anda Memiliki <?= $email->cekemail ?> Pesan
            <a href="<?php echo site_url('feedback') ?>"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>
          <?php
          $query = "SELECT * FROM `feedback` WHERE `status`= 1";
          $data = $this->db->query($query)->result_array();
          ?>

          <?php foreach ($data as $d) : ?>
            <li class="message-item">
              <a href="<?php echo site_url('baca/' . $d['id']) ?>">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4><?= $d['email'] ?>/h4>
                    <p><?= substr($d['message'], 1, 20) ?> ....baca Selengkapnya</p>
                    <p><?= $d['datesend'] ?></p>
                </div>
              </a>
            </li>
          <?php endforeach ?>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="dropdown-footer">
            <a href="<?php echo site_url('feedback') ?>">Lihat Semua Pesan</a>
          </li>

        </ul><!-- End Messages Dropdown Items -->

      </li><!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">Dashboard Ngademin</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('gantipass') ?>">
              <i class="bi bi-gear"></i>
              <span>Ubah Password</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('duhdek') ?>">
              <i class="bi bi-box-arrow-right"></i>
              <span>Keluarkan dari Dalam</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

  <!-- nav -->

</header><!-- End Header -->

<a href="<?php echo site_url('rumah') ?>" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url('dashboard/vendor/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/chart.js/chart.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/echarts/echarts.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/quill/quill.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/simple-datatables/simple-datatables.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('dashboard/vendor/php-email-form/validate.js') ?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('dashboard/js/main.js') ?>"></script>