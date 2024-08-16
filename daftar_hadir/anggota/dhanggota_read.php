<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Daftar Hadir Anggota</h5>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=dhanggota_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
                <a href="?page=dhanggota_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <?php } ?>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="dhanggota_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama anggota..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <?php if ($_SESSION['status'] != 'Anggota') { ?>
                            <?php if ($_SESSION['status'] == 'Admin') { ?>
                                <th>Creator</th>
                                <th>Created at</th>
                                <th>Editor</th>
                                <th>Updated at</th>
                            <?php } ?>
                            <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM daftarhadir_anggota";
                    if ($search) {
                        $query .= " WHERE nama_anggota LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                    }
                    $query .= " ORDER BY npm ASC";
                    $data = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['npm'] ?></td>
                            <td><?= $row['nama_anggota'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['status_hadir'] ?></td>
                            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                                <?php if ($_SESSION['status'] == 'Admin') { ?>
                                    <td><?= $row['creator'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['editor'] ?></td>
                                    <td><?= $row['updated_at'] ?></td>
                                <?php } ?>
                                <td>
                                    <a href="?page=dhanggota_edit&id_dhanggota=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                    <a href="?page=dhanggota_delete&id_dhanggota=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>