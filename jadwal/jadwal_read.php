<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Jadwal Tahsin & Tahfidz</h5>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=jadwal_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
                <a href="?page=jadwal_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <?php } ?>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="jadwal_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kelas..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Keterangan</th>
                        <?php if ($_SESSION['status'] == 'Admin') { ?>
                            <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM jadwal ORDER BY waktu DESC";
                    if ($search) {
                        $searchEscaped = mysqli_real_escape_string($koneksi, $search);
                        $query .= " WHERE kelas_tahsin LIKE '%$searchEscaped%'";
                    }
                    $data = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td><?= $row['kelas_tahsin'] ?></td>
                            <td><?= $row['waktu'] ?></td>
                            <td><?= $row['tempat'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <?php if ($_SESSION['status'] == 'Admin') { ?>
                                <td>
                                    <a href="?page=jadwal_edit&id_jadwal=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                    <a href="?page=jadwal_delete&id_jadwal=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>