<?php
$query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
$sitemap = $this->db->query($query)->row();
?>
    <div class="pagetitle">
      <h1>Selamat Datang di Dashboard <?php echo $sitemap->judul ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          
        <?php
        $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
        $sitemap = $this->db->query($query)->row();
        ?>
        <!-- kontencard -->
        <!-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">Page Blank</h5>
                <p>KOnten Page Blank</p>
            </div>
        </div> -->
        <!-- kontencard -->

        </div>

        </div>
      </div>
    </section>


