<section class="section">
    <div class="row">
        <div class="col-lg-11">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $npage ?></h5>
                    <form class="add" method="POST" action="<?php echo base_url('edit_email/' . $data->id); ?>">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Pengirim</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="<?php echo $data->nama ?>" value="<?= set_value('nama'); ?>"></input>
                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Alamat Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $data->email ?>" value="<?= set_value('email'); ?>"></input>
                                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <?php if ($ak != 2) : ?>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Password Email</label>
                                <div class="col-sm-10">
                                    <input type="password" name="pass_email" id="pass_email" class="form-control" placeholder="<?php echo $data->pass_email ?>" value="<?= set_value('pass_email'); ?>"></input>
                                    <?php echo form_error('pass_email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Subjek Pesan Dukurum</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sub" id="sub" class="form-control" placeholder="<?php echo $data->sub ?>" value="<?= set_value('sub'); ?>"></input>
                                    <?php echo form_error('sub', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pesan Dikirim</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="mass" id="mass" class="form-control" style="height: 200px" placeholder="<?php echo $data->mass ?>" value="<?= set_value('mass'); ?>"></textarea>
                                    <?php echo form_error('mass', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" id="ok" name="ok" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>