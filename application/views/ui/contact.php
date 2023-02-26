 <!-- contact sestion   -->
   <section class="section pb-5">
     <div class="container">

       <div class="row mb-5 align-items-end">
         <div class="col-md-6" data-aos="fade-up">
           <h2><?php echo $cont->judul ?></h2>
           <p class="mb-0"><?php echo $cont->deskripsi ?>
           </p>
         </div>

       </div>

       <div class="row">
         <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-down">

           <form method="post" class="add">

           <?php
            $iname = array(
                'name' => 'name',
                'id' => 'name',
                'class' => 'form-control',
                'type' => 'text',
                'value' => set_value('name')
            );
            $iemail = array(
              'name' => 'email',
              'id' => 'email',
              'class' => 'form-control',
              // 'type' => 'email',
              'value' => set_value('email')
            );

            $isubject = array(
              'name' => 'subject',
              'id' => 'subject',
              'class' => 'form-control',
              'type' => 'text',
              'value' => set_value('subject')
            );
            $imassage = array(
              'name' => 'massage',
              'id' => 'subject',
              'class' => 'form-control',
              'type' => 'text',
              'value' => set_value('massage')
            );
            echo form_open('', array('role' => 'form'));
            ?>

             <div class="row gy-3">

               <div class="col-md-6 form-group">
               <?php echo form_label('Nama', 'name', array('class' => 'control-label col-sm-6')); ?>
               <?php echo form_input($iname) . form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>

               <div class="col-md-6 form-group">
               <?php echo form_label('Email', 'email', array('class' => 'control-label col-sm-6')); ?>
               <?php echo form_input($iemail) . form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>

               <div class="col-md-12 form-group">
               <?php echo form_label('Subject', 'subject', array('class' => 'control-label col-sm-6')); ?>
               <?php echo form_input($isubject) . form_error('subject', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

               <div class="col-md-12 form-group">
               <?php echo form_label('Massage', 'massage', array('class' => 'control-label col-sm-6')); ?>
               <?php echo form_textarea($imassage) . form_error('massage', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>

               <div class="col-md-6 mt-0 form-group" name="masuk" id="masuk">
                 <?php echo form_submit('ok', 'Send Message', 'class =readmore d-block w-100"'); ?>
               </div>

               
               <?php
                echo form_close();
                ?>

             </div>
           </form>

         </div>

         <div class="col-md-4 ml-auto order-2" data-aos="fade-up">
           <ul class="list-unstyled">
             <?php foreach ($address as $add) : ?>
               <li class="mb-3">
                 <strong class="d-block mb-1"><?php echo $add['judul'] ?></strong>
                 <span><?php echo $add['site_'] ?></span>
               </li>
             <?php endforeach ?>

           </ul>
         </div>
       </div>
     </div>
   </section>
 <!-- contact sestion   -->

<script>
    $(document).ready(function() {
        $('.ubah').click(function() {
            return confirm("Apakah Anda yakin ingin mengubah status ax?");
        });
    });
</script>