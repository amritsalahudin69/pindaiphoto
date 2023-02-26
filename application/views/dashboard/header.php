<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php
  $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
  $sitemap = $this->db->query($query)->row();
  ?>
  <title><?php echo $sitemap->judul ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="<?php echo base_url('https://fonts.gstatic.com') ?>" rel="preconnect">
  <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') ?>" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('dashboard/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('dashboard/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('dashboard/css/style.css') ?>" rel="stylesheet">

</head>

<body>


<!-- templating -->


<!-- templating -->

</main><!-- End #main -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>