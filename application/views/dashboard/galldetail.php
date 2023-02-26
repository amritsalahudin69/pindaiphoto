<div class="pagetitle">
  <h1><?php echo $npage ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?php echo $npage ?></a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10">

    <!-- Card with an image on top -->
    <div class="card">
            <img src="<?php echo base_url('assets/gallery/' . $data->exfile) ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $data->namafile?></h5>

              <?php if($data->status == 1):?>
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tayang
                  </div>
                <?php else :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ter-Arsip
                  </div>
              <?php endif ?>
              <!-- tombol hapus dan disable -->
              <div class="col ml-3 mb-1">
                <a href="<?php echo site_url('detdel/'. $data->id) ?>" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus "></i>
                  </span>
                  <span class="text">Hapus</span>
                </a>

                <?php if($data->status == 1):?>
                <a href="<?php echo site_url('detdis/'. $data->id) ?>" class="btn btn-warning btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus "></i>
                  </span>
                  <span class="text">Arsipkan</span>
                </a>
                <?php else :?>
                <a href="<?php echo site_url('detena/'. $data->id) ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus "></i>
                  </span>
                  <span class="text">Tayangkan</span>
                </a>
                <?php endif ?>

              </div>
              <!-- tombol hapus dan disable -->
            </div>
          </div><!-- End Card with an image on top -->

    </div>
  </div>
</section>