<div class="pagetitle">
    <h1><?php echo $npage ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $des ?></a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

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
                                <?php
                                $a = $ak;
                                ?>
                                <th>Nama Pengirim</th>
                                <th>Alamat Email</th>
                                <?php if ($a == 1) : ?>
                                    <th>Subject</th>
                                    <th>Isi Pesan</th>
                                <?php endif ?>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data as $d) {
                                echo "<tr>";
                                echo "<td>{$d['nama']}</td>";
                                echo "<td>{$d['email']}</td>";
                                if ($a == 1) {
                                    echo "<td>{$d['sub']}</td>";
                                    echo "<td>{$d['mass']}</td>";
                                }
                                if ($a == 1) {
                                    echo "<td>
                                            <a href='" . site_url('ubah_eunsecure/' . $d['id']) . "'>
                                            <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
                                            </a>
                                        </td>";
                                } else {
                                    echo "<td>
                                    <a href='" . site_url('ubah_ereport/' . $d['id']) . "'>
                                    <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
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