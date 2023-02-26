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

  <?php
  $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 11";
  $sitemap = $this->db->query($query)->row();
  ?>
  <meta content="<?php echo $sitemap->site_ ?>" name="description">

  <?php
  $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 11";
  $sitemap = $this->db->query($query)->row();
  ?>
  <meta content="<?php echo $sitemap->site_ ?>" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i') ?>" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>

<body>
  <main id="main">