<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Hadir Pengajar</h5>
            <a href="?page=dhpengajar_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
            <a href="?page=dhpengajar_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="dhpengajar_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama pengajar..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Creator</th>
                        <th>Created at</th>
                        <th>Editor</th>
                        <th>Updated at</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM daftarhadir_pengajar WHERE 1=1";
                    if ($search) {
                        $query .= " AND nama_pengajar LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                    }
                    $data = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_pengajar'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['status_hadir'] ?></td>
                            <td><?= $row['creator'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['editor'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td>
                                <a href="?page=dhpengajar_edit&id_dhpengajar=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                <a href="?page=dhpengajar_delete&id_dhpengajar=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>