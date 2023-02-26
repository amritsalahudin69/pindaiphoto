  <!-- ======= Clients Section ======= -->
  <section class="section" id="2">
    <div class="container">
      <div class="row justify-content-center text-center mb-4">

        <div class="col-5">
          <h3 class="h3 heading"><?php echo $partner->judul ?></h3>
          <p><?php echo $partner->deskripsi ?></p>
        </div>

      </div>

      <?php
      $query = "SELECT * FROM `con_clientserv_detail`";
      $csd = $this->db->query($query)->result_array();
      ?>

      <?php if (isset($csd)) : ?>
        <div class="row">
          <?php foreach ($partdet as $par) : ?>
            <div class="col-4 col-sm-4 col-md-2">
              <a href="<?php if (isset($par['backlink'])) {
                          echo $par['backlink'];
                        } else {
                          echo '#';
                        } ?>" class="client-logo"><img src="<?php echo base_url('assets/upload_gambar/' . $par['logo']) ?>" alt="Image" class="img-fluid"></a>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>

    </div>
  </section>
  <!-- End Clients Section -->