<!-- ======= Testimonials Section ======= -->
  <section class="section pt-0">
    <div class="container">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <!-- End slide testimonial item -->
        <?php
        $query = "SELECT * FROM `con_clientserv_detail`";
        $csd = $this->db->query($query)->result_array();
        ?>
        <?php if(isset($csd)) : ?>
          <?php foreach ($testi as $test) : ?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial">
                  <?php if (isset($test['add_2'])) : ?>
                    <img src="<?php echo ('assets/upload_gambar/' . $test['add_2']) ?>" alt="Image" class="img-fluid">
                  <?php endif ?>
                  <blockquote>
                    <p><?php echo $test['add_desk'] ?></>
                  </blockquote>
                  <p>&mdash; <?php echo $test['nama'] ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php endif ?>
          <!-- End slide testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>
<!-- End Testimonials Section -->