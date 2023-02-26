<!-- Vendor CSS Files -->
<link href="<?= ('asset2/vendor/aos/aos.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
<link href="<?= ('asset2/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
<link href="<?= ('asset2/css/style.css') ?>" rel="stylesheet">


<section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

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
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
            <?php foreach ($category as $cat) : ?>
              <li data-filter="<?php echo $cat['pref']; ?>"><?php echo $cat['ncat']; ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>

        <?php
        $query = "SELECT * FROM `con_gallery`";
        $category = $this->db->query($query)->result_array();
        ?>
        <?php if(isset($category)) : ?>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($gallery as $gal) : ?>
          <div class="col-lg-4 col-md-6 portfolio-item item <?php echo $gal['domref'] ?>">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url('assets/gallery/' . $gal['exfile']) ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="<?php echo base_url('assets/gallery/' . $gal['exfile']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $gal['namafile'] ?>"><i class="bx bx-plus"></i></a>
                 </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <?php else : ?>
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <h2>EMPTY</h2>
          <p class="mb-0">DATA EMPTY</p>
          </div>
        <?php endif ?>
      </div>
    </section><!-- End Portfolio Section -->


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