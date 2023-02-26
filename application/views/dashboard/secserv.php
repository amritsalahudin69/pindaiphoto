<div class="pagetitle">
    <h1><?php echo $npage ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $npage ?></a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="col ml-3 mb-1">
  <a href="<?php echo site_url('secservadd') ?>" class="btn btn-primary btn-icon-split">
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
                                <th>Jenis Layanan</th>
                                <th>Discuss</th>
                                <th>Status</th>
                                <th>Ubah</th>
                                <th>Opsi</th>
                                <th>Detail</th>
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
                                    echo "<td>" . status($d['status']) . "</td>";
                                    echo "<td>
                                            <a href='" . site_url('ubah_secserv/' . $d['id']) . "'>
                                                <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
                                            </a>
                                        </td>";
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
                                    }
                                    echo "<td>
                                            <a href='" . site_url('secserv/' . $d['id']) . "'>
                                                <button type='button' class='btn btn-secondary rounded-pill'>Lihat Detail</button>
                                            </a>
                                        </td>";
                                    echo "<td>
                                            <a class='ubah' name='ubah' id='ubah'href='" . site_url('delete1/' . $d['id']) . "'>
                                                <button type='button' class='btn btn-secondary rounded-pill'>Hapus</button>
                                            </a>
                                        </td>";
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