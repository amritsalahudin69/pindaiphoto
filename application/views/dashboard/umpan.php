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
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat Email</th>
                                <th>Subjek</th>
                                <th>Isi Pesan</th>
                                <th>Jam Kirim</th>
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
                                    echo "<td>{$d['name']}</td>";
                                    echo "<td>{$d['email']}</td>";
                                    echo "<td>{$d['subject_em']}</td>";
                                    echo "<td>" . substr($d['message'], 1, 20) . " ...baca selengkapnya</td>";
                                    echo "<td>{$d['datesend']}</td>";
                                    if($d['status'] == 1){
                                        echo "<td>
                                        <a class='ubah' name='ubah' id='ubah'href='" . site_url('baca/' . $d['id']) . "'>
                                            <button type='button' class='btn btn-danger rounded-pill'>Belum Terbaca</button>
                                        </a>
                                    </td>";    
                                    }else{
                                        echo "<td>
                                                <a class='ubah' name='ubah' id='ubah'href='" . site_url('baca/' . $d['id']) . "'>
                                                    <button type='button' class='btn btn-success rounded-pill'>Baca Kembali</button>
                                                </a>
                                            </td>";
                                    }

                                    echo "<td>
                                    <a class='ubah' name='ubah' id='ubah'href='" . site_url('hap/' . $d['id']) . "'>
                                        <button type='button' class='btn btn-warning rounded-pill'>Hapus</button>
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