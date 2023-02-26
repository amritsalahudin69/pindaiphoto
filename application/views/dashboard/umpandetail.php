<div class="pagetitle">
    <h1><?php echo $npage ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $npage ?></a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

                <!-- Card with header and footer -->
            <div class="card">
                <div class="card-header"><?= $data->name?></div>
                <div class="card-body">
                <h5 class="card-title"><?= $data->subject_em?></h5>
                <?= $data->message?>
                </div>
                <div class="card-footer">
                <?= $data->email?>
                </div>
            </div><!-- End Card with header and footer -->

        </div>
    </div>
</section>