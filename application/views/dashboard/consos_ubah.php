<section class="section">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $npage ?></h5>
                    <form class="add" method="POST" action="<?php if ($contsos->id_adm_secmen == 2) {
                                                                echo base_url('editcon/' . $contsos->id);
                                                            } else {
                                                                echo base_url('editsos/' . $contsos->id);
                                                            }  ?>">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label"><?php echo $contsos->judul ?></label>
                            <div class="col-sm-10">
                                <?php if ($contsos->id_adm_secmen == 2) : ?>
                                    <textarea name="judul" id="judul" class="form-control" style="height: 100px" placeholder="<?php echo $contsos->site_ ?>" value="<?= set_value('judul'); ?>"></textarea>
                                    <?php echo form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                <?php else : ?>
                                    <textarea name="judul" id="judul" class="form-control" style="height: 100px" placeholder="<?php echo $contsos->link ?>" value="<?= set_value('judul'); ?>"></textarea>
                                    <?php echo form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                <?php endif ?>
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