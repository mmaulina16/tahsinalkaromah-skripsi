<html>

<head>
        <!-- <style>
            th {
                color: #5D87FF;
            }
        </style> -->
</head>

<body>
    <?php
    // Menghitung total anggota
    $query_anggota = "SELECT COUNT(*) as total_anggota FROM anggota WHERE status_ajuan='Diverifikasi'";
    $result_anggota = mysqli_query($koneksi, $query_anggota);
    $row_anggota = mysqli_fetch_assoc($result_anggota);
    $total_anggota = $row_anggota['total_anggota'];

    // Menghitung total pengajar
    $query_pengajar = "SELECT COUNT(*) as total_pengajar FROM pengajar WHERE status_ajuan='Diverifikasi'";
    $result_pengajar = mysqli_query($koneksi, $query_pengajar);
    $row_pengajar = mysqli_fetch_assoc($result_pengajar);
    $total_pengajar = $row_pengajar['total_pengajar'];

    // Menghitung total pendaftaran anggota berdasarkan bulan dari tabel anggota
    $current_month = date('m'); // Format bulan, misal '08' untuk Agustus
    $current_year = date('Y'); // Format tahun, misal '2024'

    // Menghitung total pendaftar anggota untuk bulan saat ini
    $query_anggota_bulan = "SELECT COUNT(*) AS total_anggota
    FROM anggota
    WHERE MONTH(tanggal_pendaftaran) = $current_month
    AND YEAR(tanggal_pendaftaran) = $current_year";
    $result_anggota_bulan = mysqli_query($koneksi, $query_anggota_bulan);
    $row_anggota_bulan = mysqli_fetch_assoc($result_anggota_bulan);
    $total_anggota_bulan_saat_ini = $row_anggota_bulan['total_anggota'];

    // Mengambil data jadwal tahsin untuk bulan saat ini
    $query_jadwal = "SELECT `id_jadwal`, `kelas_tahsin`, `waktu`, `tempat`, `keterangan` 
                 FROM `jadwal` 
                 WHERE MONTH(waktu) = $current_month 
                 AND YEAR(waktu) = $current_year";
    $result_jadwal = mysqli_query($koneksi, $query_jadwal);
    ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Total Anggota</h5>
                                <h3 class="card-title text-primary mb-2" style="font-weight: bold;"><?= $total_anggota ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Total Pengajar</h5>
                                <h3 class="card-title text-primary mb-2" style="font-weight: bold;"><?= $total_pengajar ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Total Anggota yang Mendaftar Bulan Ini</h5>
                                <h3 class="card-title text-primary mb-2" style="font-weight: bold;"><?= $total_anggota_bulan_saat_ini ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Card for Jadwal Tahsin Bulan Ini -->
                    <h5 class="card-title text-muted mt-3">Jadwal Tahsin Bulan Ini</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-primary">No</th>
                                    <th class="text-primary">Kelas</th>
                                    <th class="text-primary">Waktu</th>
                                    <th class="text-primary">Tempat</th>
                                    <th class="text-primary">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result_jadwal)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['kelas_tahsin']) ?></td>
                                        <td><?= htmlspecialchars($row['waktu']) ?></td>
                                        <td><?= htmlspecialchars($row['tempat']) ?></td>
                                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>