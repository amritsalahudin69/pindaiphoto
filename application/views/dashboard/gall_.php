<div class="pagetitle">
    <h1><?php echo $npage ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $npage ?></a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col ml-3 mb-1">
  <a href="<?php echo site_url('addpor') ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus "></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>
</div>

<!-- gallery sec -->
<div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
    <?php foreach ($data as $gal) : ?>
        <div class="item col-sm-6 col-md-4 col-lg-4 mb-4">
            <!--sort by dom -->
            <a href="<?php echo base_url('galery/' . $gal['id']) ?>" class="item-wrap fancybox">
                <img class="img-fluid" src="<?php echo base_url('assets/gallery/' . $gal['exfile']) ?>">
            </a>
        </div>
    <?php endforeach ?>
</div>
<!-- End gallery sec -->