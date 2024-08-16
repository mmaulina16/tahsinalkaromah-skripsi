<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Umpan Balik</h5>
            <a href="?page=umpanbalik_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=umpanbalik_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <?php } ?>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="umpanbalik_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kelas..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Rating</th>
                        <th>Alasan Rating</th>
                        <th>Saran</th>
                        <?php if ($_SESSION['status'] == 'Admin') { ?>
                            <th>Responden</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM umpan_balik WHERE 1=1";
                    if ($search) {
                        $query .= " AND kelas LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                    }
                    $data = mysqli_query($koneksi, $query);                    
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['kelas'] ?></td>
                            <td><?= $row['rating'] ?></td>
                            <td><?= $row['alasan_rating'] ?></td>
                            <td><?= $row['saran'] ?></td>
                            <?php if ($_SESSION['status'] == 'Admin') { ?>
                                <td><?= $row['responden'] ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>