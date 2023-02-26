<div class="pagetitle">
  <h1><?php echo $npage ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?php echo $npage ?></a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="col ml-3 mb-1">
  <a href="<?php echo site_url('addcat') ?>" class="btn btn-primary btn-icon-split">
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
          <h5 class="card-title"><?php echo $npage ?></h5>
          <p><?php echo $des ?></p>
          <!-- Small tables -->
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>Nama Category</th>
                <th>Status</th>
                <th>Ubah</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($data as $d) {
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$d['ncat']}</td>";
                echo "<td>" . status($d['status']) . "</td>";
                if ($d['id'] > 1) {
                  echo "<td>
                  <a href='" . site_url('ubahcat/' . $d['id']) . "'>
                  <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
                  </a>
                  </td>";
                } else {
                  "<td></td>";
                }
                if ($d['status'] == 1) {
                  echo "<td>
                        <a class='ubah' name='ubah' id='ubah' href='" . site_url('disablecat/' . $d['id']) . "'>
                          <button type='button' class='btn btn-danger rounded-pill'>Non Aktifkan</button>
                        </a>
                      </td>";
                } else {
                  echo "<td>
                          <a class='ubah' name='ubah' id='ubah'href='" . site_url('enablecat/' . $d['id']) . "'>
                            <button type='button' class='btn btn-success rounded-pill'>Aktifkan</button>
                          </a>
                      </td>";
                }
                echo "</tr>";
                $i++;
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