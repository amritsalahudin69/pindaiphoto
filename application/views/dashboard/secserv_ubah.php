<section class="section">
    <div class="row">
        <div class="col-lg-11">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $npage ?></h5>
                    <form class="add" method="POST" action="<?php echo base_url('editsec/' . $data->id); ?>">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="<?php echo $data->nama ?>" value="<?= set_value('nama'); ?>"></input>
                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="des" id="des" class="form-control" style="height: 200px" placeholder="<?php echo $data->add_desk ?>" value="<?= set_value('des'); ?>"></textarea>
                                <?php echo form_error('mass', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

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