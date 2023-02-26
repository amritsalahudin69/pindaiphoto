<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $des ?></h5>

                     <?php
                        $inama= array(
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

                        echo form_open('', array('role' => 'form', 'class' => 'form-horizontal'));
                        ?>
                        <div class="card-body">

                            <div class="form-group">
                                <?php echo form_label('Judul Layanan', 'nama', array('class' => 'control-label col-sm-6')); ?>
                                <div class="col-sm-8">
                                    <?php echo form_input($inama) . form_error('nama'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Deskripsi', 'add_desk', array('class' => 'control-label col-sm-6')); ?>
                                <div class="col-sm-8">
                                    <?php echo form_textarea($iadd_desk) . form_error('add_desk'); ?>
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