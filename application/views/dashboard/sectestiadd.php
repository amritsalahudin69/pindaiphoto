<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $des ?></h5>
                    <div class="alert alert-info  alert-dismissible fade show" role="alert">
                        Ukuran Maksimal File Upload Hanya 4Mb
                    </div>
                    <?php
                    $inama = array(
                        'name' => 'nama',
                        'id' => 'nama',
                        'class' => 'form-control',
                        'value' => set_value('nama')
                    );
                    $iadd_desk = array(
                        'name' => 'add_desk',
                        'id' => 'add_desk',
                        'class' => 'form-control',
                        'value' => set_value('add_desk')
                    );
                    $ifile = array(
                        'name' => 'file',
                        'id'    => 'file',
                        'type'  => 'file'
                    );


                    echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
                    ?>
                    <div class="card-body">

                        <div class="form-group">
                            <?php echo form_label('Nama File', 'nama', array('class' => 'control-label col-sm-6')); ?>
                            <div class="col-sm-8">
                                <?php echo form_input($inama) . form_error('nama'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Isi Testimoni', 'add_desk', array('class' => 'control-label col-sm-6')); ?>
                            <div class="col-sm-8">
                                <?php echo form_textarea($iadd_desk) . form_error('add_desk'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Pilih File', 'file', array('class' => 'control-label col-sm-3')); ?>
                            <div class="col-sm-5">
                                <?php echo form_upload($ifile) . form_error('file'); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                        </div>
                        <div name="masuk" id="masuk" class="form-group">
                            <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Tambah', 'class="btn btn-primary"'); ?></div>
                        </div>

                        <?php
                        echo form_close();
                        ?>

                        <!-- </form> -->

                    </div>
                    <!--  -->

                </div>
            </div>

        </div>
    </div>
</section>