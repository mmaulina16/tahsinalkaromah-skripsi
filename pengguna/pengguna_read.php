<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Pengguna</h5>
            <a href="?page=pengguna_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="pengguna_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama pengguna..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Status Akun</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM pengguna WHERE 1=1";
                    if ($search) {
                        $query .= " AND nama LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                    }
                    $data = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['status_akun'] ?></td>
                            <td>
                                <?php if ($row['status_akun'] == 'Diajukan') { ?>
                                    <a href="?page=verifikasi_akun&id_user=<?= $row[0] ?> &status_akun=Diverifikasi" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menyetujui akun ini?')"><i class="ti ti-check"></i>Setujui</a>
                                    <a href="?page=verifikasi_akun&id_user=<?= $row[0] ?> &status_akun=Ditolak" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak akun ini?')"><i class="ti ti-x"></i>Tolak</a>
                                <?php } ?>
                                <a href="?page=pengguna_edit&id_user=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                <a href="?page=pengguna_delete&id_user=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>