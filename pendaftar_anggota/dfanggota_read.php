<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Pendaftaran Anggota</h5>
            <a href="?page=dfanggota_add" class="btn btn-success btn-sm"><i class="ti ti-plus"></i>Tambah Data</a>
            <a href="?page=dfanggota_report" class="btn btn-primary btn-sm"><i class="ti ti-report"></i> Laporan</a>
            <hr>
            <!-- Form Pencarian -->
            <form method="GET" action="index.php">
                <div class="input-group mb-3">
                    <input type="hidden" name="page" value="dfanggota_read">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama anggota..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 3000px;">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">NPM</th>
                            <th class="text-center" style="width: 150px;">Nama Lengkap</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center" style="width: 125px;">Tanggal Lahir</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center" style="width: 150px;">Nama Wali</th>
                            <th class="text-center">No. Telepon Wali</th>
                            <th class="text-center">Universitas</th>
                            <th class="text-center">Fakultas</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Batas Belajar</th>
                            <th class="text-center">Kemampuan</th>
                            <th class="text-center">Kelas yang Dipilih</th>
                            <th class="text-center">Alasan Bergabung</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Status Ajuan</th>
                            <?php if ($_SESSION['status'] == 'Admin') { ?>
                                <th class="text-center">Tanggal Pendaftaran</th>
                                <th class="text-center">Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $query = "SELECT * FROM anggota WHERE 1=1";
                        if ($search) {
                            $query .= " AND nama_anggota LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                        }
                        $data = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="text-end"><?= $no++ ?></td>
                                <td class="text-center"><?= $row['npm'] ?></td>
                                <td><?= $row['nama_anggota'] ?></td>
                                <td class="text-center"><?= $row['jenis_kelamin'] ?></td>
                                <td class="text-center"><?= $row['tanggal_lahir'] ?></td>
                                <td class="text-center"><?= $row['no_telp'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['nama_wali'] ?></td>
                                <td class="text-center"><?= $row['no_telp_wali'] ?></td>
                                <td><?= $row['universitas'] ?></td>
                                <td><?= $row['fakultas'] ?></td>
                                <td><?= $row['prodi'] ?></td>
                                <td><?= $row['batas_belajar'] ?></td>
                                <td><?= $row['kemampuan'] ?></td>
                                <td><?= $row['kelas_tahsin'] ?></td>
                                <td><?= $row['alasan'] ?></td>
                                <td class="text-center">
                                    <img src="assets/images/profile/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" width="100" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal(this.src)">
                                </td>
                                <td class="text-center"><?= $row['status_ajuan'] ?></td>
                                <?php if ($_SESSION['status'] == 'Admin') { ?>
                                    <td class="text-center"><?= $row['tanggal_pendaftaran'] ?></td>
                                    <td>
                                        <?php if ($row['status_ajuan'] == 'Diajukan') { ?>
                                            <a href="?page=verifikasi_ajuan_anggota&id_anggota=<?= $row[0] ?> &status_ajuan=Diverifikasi" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menyetujui ajuan ini?')"><i class="ti ti-check"></i>Setujui</a>
                                            <a href="?page=verifikasi_ajuan_anggota&id_anggota=<?= $row[0] ?> &status_ajuan=Ditolak" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak ajuan ini?')"><i class="ti ti-x"></i>Tolak</a>
                                        <?php } ?>
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
                <h5 class="modal-title" id="imageModalLabel">Foto Anggota</h5>
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