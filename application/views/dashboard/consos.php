<div class="pagetitle">
  <h1><?php echo $npage ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Contact</a></li>
    </ol>
  </nav>
</div><!-- End Page Title -->

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
                <th>Jenis</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Ubah</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($contsos as $cn) {
                echo "<tr>";
                echo "<td>{$i}</td>";
                if ($sc == 2) {
                  echo "<td>{$cn['judul']}</td>";
                  echo "<td>{$cn['site_']}</td>";
                } else {
                  echo "<td>{$cn['judul']}</td>";
                  echo "<td>{$cn['link']}</td>";
                }
                echo "<td>" . status($cn['status']) . "</td>";
                echo "<td>
                        <a href='" . site_url('ubahcon/' . $cn['id']) . "'>
                          <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
                        </a>
                      </td>";
                if ($cn['status'] == 1) {
                  echo "<td>
                          <a class='ubah' name='ubah' id='ubah' href='" . site_url('disablecon/' . $cn['id']) . "'>
                            <button type='button' class='btn btn-danger rounded-pill'>Non Aktifkan</button>
                          </a>
                        </td>";
                } else {
                  echo "<td>
                          <a class='ubah' name='ubah' id='ubah'href='" . site_url('enablecon/' . $cn['id']) . "'>
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

<script>
  $(document).ready(function() {
    $('.ubah').click(function() {
      return confirm("Apakah Anda yakin ingin mengubah status?");
    });
  });
</script>