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

            <div class="card">
                <div class="card-body">
                    <!-- <h5 class="card-title"><?php echo $npage ?></h5> -->
                    <!-- <p><?php echo $des ?></p> -->
                    <!-- Small tables -->
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama Laman</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($data as $d) {
                                echo "<tr>";
                                echo "<td>{$i}</td>";
                                echo "<td>{$d['nama']}</td>";
                                echo "<td>{$d['judul']}</td>";
                                echo "<td>{$d['deskripsi']}</td>";
                                echo "<td>
                                        <a href='" . site_url('ubahkonten/' . $d['id']) . "'>
                                        <button type='button' class='btn btn-warning rounded-pill'>Edit</button>
                                        </a>
                                        </td>";
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