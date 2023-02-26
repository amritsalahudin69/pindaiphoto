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
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <!-- <h5 class="card-title"><?php echo $npage ?></h5> -->
          <!-- <p><?php echo $des ?></p> -->
          <!-- Small tables -->
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>Nama Menu</th>
                <th>Alias</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($data as $d) {
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$d['nama']}</td>";
                echo "<td>{$d['alias']}</td>";
                echo "<td>" . status($d['status']) . "</td>";
                if ($d['status'] == 1) {
                  echo "<td>
                        <a class='ubah' name='ubah' id='ubah' href='" . site_url('disablelaman/' . $d['id']) . "'>
                          <button type='button' class='btn btn-danger rounded-pill'>Non Aktifkan</button>
                        </a>
                      </td>";
                } else {
                  echo "<td>
                          <a class='ubah' name='ubah' id='ubah'href='" . site_url('enablelaman/' . $d['id']) . "'>
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