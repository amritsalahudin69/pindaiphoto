<section class="section">
    <div class="row">
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $des ?></h5>

                    <?php
                    $iemail = array(
                        'name' => 'email',
                        'id' => 'email',
                        'class' => 'form-control',
                        'value' => set_value('email'),
                        'placeholder' => $data->email
                    );

                    $iuser = array(
                        'name' => 'user',
                        'id' => 'user',
                        'class' => 'form-control',
                        'value' => set_value('user'),
                        'placeholder' => $data->user
                    );

                    $ipassword = array(
                        'name' => 'password',
                        'id' => 'password',
                        'class' => 'form-control'
                    );
                    $inewpass = array(
                        'name' => 'newpass',
                        'id' => 'newpass',
                        'class' => 'form-control'
                    );
                    $iconfirm = array(
                        'name' => 'confirm',
                        'id' => 'confirm',
                        'class' => 'form-control'
                    );

                    echo form_open('', array('role' => 'form', 'class' => 'form-horizontal'));
                    ?>
                    <div class="card-body">

                        <div class="form-group">
                            <?php echo form_label('Email', 'email', array('class' => 'control-label col-sm-6')); ?>
                            <div class="col-sm-8">
                                <?php echo form_input($iemail) . form_error('email'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('User', 'user', array('class' => 'control-label col-sm-6')); ?>
                            <div class="col-sm-8">
                                <?php echo form_input($iuser) . form_error('user'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Password Lama', 'password', array('class' => 'control-label col-sm-3')); ?>
                            <div class="col-sm-8">
                                <?php echo form_password($ipassword) . form_error('password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Password baru', 'newpass', array('class' => 'control-label col-sm-3')); ?>
                            <div class="col-sm-8">
                                <?php echo form_password($inewpass) . form_error('newpass'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('Konfirmasi password baru', 'confirm', array('class' => 'control-label col-sm-3')); ?>
                            <div class="col-sm-8">
                                <?php echo form_password($iconfirm) . form_error('confirm'); ?>
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