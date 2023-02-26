<?php echo get_message('msg'); ?>
<div class="pagetitle">
      <h1><?php echo $npage ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">View</a></li>
          <li class="breadcrumb-item">Update Meta</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title"><?php echo $npage ?> Aktif</h5>

              <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?php echo $des ?> : <?php echo $meta->site_ ?>
              </div>
              
              <div class="card-body">
                <form class="add" method="POST">
                    <?php
                    $isite_ = array(
                        'name' => 'site_',
                        'id' => 'site_',
                        'class' => 'form-control'
                    );

                    echo form_open('', array('role' => 'form'));
                    ?>
                  <div>
                      <?php echo form_label('Deskripsi/Tagline', 'site_', array('class' => 'control-label col-sm-12')); ?>
                      <div class="col-sm-12" role="alert">
                          <?php echo form_textarea($isite_) . form_error('site_'); ?>
                      </div>
                  </div>

                  <div class="col-12" name="masuk" id="masuk">
                    <div>
                        <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Ubah', 'class="btn btn-primary"'); ?></div>
                    </div>
                  </div>

                  <?php
                  echo form_close();
                  ?>
              </div>

            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
