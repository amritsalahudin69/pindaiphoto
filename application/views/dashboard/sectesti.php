<div class="pagetitle">
    <h1><?php echo $npage ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $npage ?></a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col ml-3 mb-1">
  <a href="<?php echo site_url('testivadd') ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus "></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title"><?php echo $npage ?></h5> -->
                    <!-- <p><?php echo $des ?></p> -->
                    <!-- Small tables -->
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Client</th>
                                <th>Testimoni</th>
                                <th>Avatar Client</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (isset($data)) {
                                foreach ($data as $d) {
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    echo "<td>{$d['nama']}</td>";
                                    echo "<td>{$d['add_desk']}</td>";
                                    echo "<td class='col-sm-2 col-md-2'>
                                         <div class='col-6'>
                                            <img src ='assets/upload_gambar/" . $d['add_2'] . "' alt='Image' class='img-fluid'>
                                         </div>
                                        </td>";
                                    echo "<td>" . status($d['status']) . "</td>";
                                    if ($d['status'] == 1) {
                                        echo "<td>
                                              <a class='ubah' name='ubah' id='ubah' href='" . site_url('disablescli/' . $d['id']) . "'>
                                                <button type='button' class='btn btn-danger rounded-pill'>Non Aktifkan</button>
                                              </a>
                                            </td>";
                                    } else {
                                        echo "<td>
                                                <a class='ubah' name='ubah' id='ubah'href='" . site_url('enablescli/' . $d['id']) . "'>
                                                  <button type='button' class='btn btn-success rounded-pill'>Aktifkan</button>
                                                </a>
                                            </td>";
                                    };
                                    echo "<td>
                                            <a class='ubah' name='ubah' id='ubah'href='" . site_url('delete2/' . $d['id']) . "'>
                                                <button type='button' class='btn btn-secondary rounded-pill'>Hapus</button>
                                            </a>
                                        </td>";;
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- End small tables -->

                </div>
            </div>

        </div>
    </div>
</section>