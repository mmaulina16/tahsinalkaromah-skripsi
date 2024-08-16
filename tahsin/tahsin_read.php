<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Halaqoh Tahsin</h5>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=tahsin_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
                <a href="?page=tahsin_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <?php } ?>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="tahsin_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama anggota..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 1800px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengajar</th>
                            <th>Anggota</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Jadwal Tahsin</th>
                            <th>Batas Tahsin</th>
                            <th>Kemajuan</th>
                            <th>Perbaikan Bacaan</th>
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
                        $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
                        $status = $_SESSION['status'];
                        $username = $_SESSION['username'];

                        // Base query
                        $query = "SELECT * FROM halaqoh_tahsin";

                        // Add search filter if needed
                        if ($search) {
                            $query .= " WHERE nama_anggota LIKE '%$search%'";
                        }

                        // If the user is an Anggota, filter by npm
                        if ($status == 'Anggota') {
                            $query .= $search ? " AND npm = '$username'" : " WHERE npm = '$username'";
                        }

                        // Add ordering
                        $query .= " ORDER BY created_at DESC";

                        $data = mysqli_query($koneksi, $query);
                        if (!$data) {
                            die("Query Error: " . mysqli_error($koneksi));
                        }

                        while ($row = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_pengajar'] ?></td>
                                <td><?= $row['nama_anggota'] ?></td>
                                <td><?= $row['npm'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['jadwal_tahsin'] ?></td>
                                <td><?= $row['batas_tahsin'] ?></td>
                                <td><?= $row['kemajuan'] ?></td>
                                <td><?= $row['perbaikan_bacaan'] ?></td>
                                <?php if ($status != 'Anggota') { ?>
                                    <?php if ($status == 'Admin') { ?>
                                        <td><?= $row['creator'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $row['editor'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                    <?php } ?>
                                    <td>
                                        <a href="?page=tahsin_edit&id_tahsin=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                        <a href="?page=tahsin_delete&id_tahsin=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>