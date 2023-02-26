    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/img/favicon.png') ?>" alt="">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <?php
                    $query = "SELECT * FROM `adm_sitemap` WHERE `id`= 1";
                    $sitemap = $this->db->query($query)->row();
                    ?>
                    <h5 class="card-title text-center pb-0 fs-4"><?php echo $sitemap->judul ?> Login</h5>
                  </div>

                  <?php echo get_message('login'); ?>
                  <form class="row g-3 needs-validation" method="POST">
                    <?php
                    $ikode = array(
                      'name' => 'kode',
                      'id' => 'kode',
                      'type' => 'text',
                      'class' => 'form-control form-control-user',
                      'placeholder' => "user"
                    );
                    $ipassword = array(
                      'name' => 'password',
                      'id' => 'password',
                      'type' => 'password',
                      'class' => 'form-control form-control-user',
                      'placeholder' => "Password"
                    );
                    echo form_open('', array('role' => 'form'));
                    ?>
                    <div class="col-12">
                      <label for="youremail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <?php echo  form_input($ikode,  set_value('kode')) . form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <?php echo  form_input($ipassword,  set_value('password')) . form_error('password',  '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                </div>
                <div class="col-12" name="masuk" id="masuk">
                  <?php echo form_submit('ok', 'Masuk', 'button class="btn btn-primary w-100"'); ?>
                </div>
                <?php
                echo form_close();
                ?>

                </form>

              </div>
            </div>

          </div>
        </div>
    </div>

    </section>

    </div>