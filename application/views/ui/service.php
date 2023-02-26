 <!-- ======= Services Section ======= -->

   <section class="section services">
     <div class="container">
       <div class="row justify-content-center text-center mb-4">
         <div class="col-5">
           <h3 class="h3 heading"><?php echo $serv->judul ?></h3>
           <p><?php echo $serv->deskripsi ?></p>
         </div>
       </div>
       <div class="row">
       <?php
        $query = "SELECT * FROM `con_clientserv_detail`";
        $csd = $this->db->query($query)->result_array();
        ?>
        <?php if(isset($csd)) : ?>
         <?php foreach ($detserv as $serv) : ?>
           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
             <i class="bi bi-card-checklist"></i>
             <h4 class="h4 mb-2"><?php echo $serv['nama'] ?></h4>
             <p><?php echo $serv['add_desk'] ?></p>

             <!-- detail -->
             <?php
              $id = $serv['id'];
              $query = "SELECT * FROM `con_serv_detail` WHERE `id_clientserv_detail`= $id"; //gallery
              $det = $this->db->query($query)->result_array();
              ?>
            <?php if(isset($det)) : ?>
             <?php foreach ($det as $d) : ?>
               <ul class="list-unstyled list-line">
                 <li><?php echo $d['deskripsi'] ?></li>
               </ul>
             <?php endforeach ?>
             <?php endif ?>
             <!-- detail -->
           </div>
         <?php endforeach ?>
         <?php endif ?>

       </div>
     </div>
   </section>
 <!-- End Services Section -->