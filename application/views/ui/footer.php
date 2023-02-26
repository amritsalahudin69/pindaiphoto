</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<?php
$query = "SELECT * FROM `adm_sitemap` WHERE `id`= 12"; //gallery
$footer = $this->db->query($query)->row();
?>
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <p class="mb-1">&copy; Copyright <?php echo $footer->judul ?> All Rights Reserved</p>
        <div class="credits">
          Designed by <a href="<?php echo $footer->site_ ?>"><?php echo $footer->judul ?></a>
        </div>
      </div>
      <?php
      $query = "SELECT * FROM `adm_sitemap` WHERE `nama_page`= 'Sosmed' AND `status` = 1"; //gallery
      $contact = $this->db->query($query)->result_array();
      ?>
      <div class="col-sm-6 social text-md-end">
        <?php foreach ($contact as $con) : ?>
          <a href="<?php echo $con['link'] ?>"><span class="<?php echo $con['site_'] ?>"></span></a>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js ') ?>"></script>
<script src="<?php echo base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js ') ?>"></script>
<script src="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.js ') ?>"></script>
<script src="<?php echo base_url('assets/vendor/php-email-form/validate.js ') ?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/js/main.js ') ?>"></script>

</body>

</html>