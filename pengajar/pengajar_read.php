<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Pengajar</h5>
            <?php if ($_SESSION['status'] == 'Admin') { ?>
                <a href="?page=dfpengajar_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
            <?php } ?>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="pengajar_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama pengajar..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="min-width: 3000px;">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Lulusan</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Hafalan</th>
                            <th class="text-center">Kelas yang Dipilih</th>
                            <th class="text-center">CV</th>
                            <th class="text-center">Portofolio</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Tanggal Pendaftaran</th>
                            <?php if ($_SESSION['status'] == 'Admin') { ?>
                                <th class="text-center">Terakhir Diedit Oleh</th>
                                <th class="text-center">Waktu Edit</th>
                                <th class="text-center">Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $query = "SELECT * FROM pengajar WHERE status_ajuan = 'Diverifikasi'";
                        if ($search) {
                            $query .= " AND nama_pengajar LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                        }
                        $data = mysqli_query($koneksi, $query);                        
                        while ($row = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="text-end"><?= $no++ ?></td>
                                <td><?= $row['nama_pengajar'] ?></td>
                                <td class="text-center"><?= $row['jenis_kelamin'] ?></td>
                                <td class="text-center"><?= $row['tanggal_lahir'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['no_telp'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['lulusan'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td><?= $row['hafalan'] ?></td>
                                <td><?= $row['kelas_tahsin'] ?></td>
                                <td class="text-center">
                                    <a href="assets/doc/cv/<?= htmlspecialchars($row['cv'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-success">
                                        Lihat CV
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="assets/doc/portofolio/<?= htmlspecialchars($row['portofolio'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-success">
                                        Lihat Portofolio
                                    </a>
                                </td>
                                <td class="text-center">
                                    <img src="assets/images/profile/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" width="100" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal(this.src)">
                                </td>
                                <td><?= $row['tanggal_pendaftaran'] ?></td>
                                <?php if ($_SESSION['status'] == 'Admin') { ?>
                                    <td><?= $row['editor'] ?></td>
                                    <td><?= $row['waktu_edit'] ?></td>
                                    <td>
                                        <a href="?page=pengajar_edit&id_pengajar=<?= $row[0] ?>" class="btn btn-warning btn-sm"><i class="ti ti-edit"></i>Ubah</a>
                                        <a href="?page=pengajar_delete&id_pengajar=<?= $row[0] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin menghapus data ini?')"><i class="ti ti-trash"></i>Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Foto Pengajar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="Foto Besar" id="modalImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    function showImageModal(src) {
        document.getElementById('modalImage').src = src;
    }
</script>