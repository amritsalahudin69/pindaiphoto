<!-- Vendor CSS Files -->
<link href="<?= ('asset2/vendor/aos/aos.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
<link href="<?= ('asset2/css/style.css') ?>" rel="stylesheet">


<!-- ======= Works Section ======= -->
  <section class="section site-portfolio" id="1">
    <div class="container">
      <div class="row mb-5 align-items-center">

        <?php
        $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
        $sitemap = $this->db->query($query)->row();
        ?>

        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
          <h2><?php echo $sitemap->judul ?></h2>
          <p class="mb-0"><?php echo $sitemap->site_ ?></p>
        </div>

        <?php
        $query = "SELECT * FROM `con_catagory` WHERE `status`= 1"; //gallery
        $category = $this->db->query($query)->result_array();
        ?>

        <div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
          <div id="filters" class="filters">
            <?php foreach ($category as $cat) : ?>
              <a href="<?php echo $cat['link_']; ?>" data-filter="<?php echo $cat['pref']; ?>" class="active"><?php echo $cat['ncat']; ?></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <!-- gallery sec -->
      <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($gallery as $gal) : ?>
          <div class="item <?php echo $gal['domref'] ?> col-sm-6 col-md-4 col-lg-4 mb-4">
            <!--sort by dom -->
            <a href="work-single.html" class="item-wrap fancybox">
              <div class="work-info">
                <h3><?php echo $gal['namafile'] ?></h3>
                <span><?php echo $gal['ncat'] ?></span>
              </div>
              <img class="img-fluid" src="<?php echo base_url('assets/img/' . $gal['exfile']) ?>">
            </a>
          </div>
          <?php endforeach ?>
        </div>
        <!-- End gallery sec -->


    </div>
  </section>
<!-- End  Works Section -->


 <!-- Vendor JS Files -->
<script src="<?= ('asset2/vendor/purecounter/purecounter.js') ?>"></script>
<script src="<?= ('asset2/vendor/aos/aos.js') ?>"></script>
<script src="<?= ('asset2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= ('asset2/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= ('asset2/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= ('asset2/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= ('asset2/vendor/typed.js/typed.min.js') ?>"></script>
<script src="<?= ('asset2/vendor/waypoints/noframework.waypoints.js') ?>"></script>
<script src="<?= ('asset2/vendor/php-email-form/validate.js') ?>"></script>

  <!-- Template Main JS File -->
<script src="<?= ('asset2/js/main.js') ?>"></script>