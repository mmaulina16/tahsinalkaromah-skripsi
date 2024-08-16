<?php
$id_dhanggota = $_GET['id_dhanggota']; //mengambil nilai id_dhanggota di url, lalu disimpan di $id_dhanggota
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $npm = $_POST['npm'];
    $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $tanggal = $_POST['tanggal'];
    $status_hadir = $_POST['status_hadir'];
    $username = $_SESSION['username'];
    $updated_at = $_POST['updated_at'];

    // Pisahkan ID dan nama dari nilai yang dikirim
    list($id_anggota, $nama_anggota) = explode("-", $_POST['nama_anggota'], 2);
    list($nama_anggota, $npm) = explode("-", $_POST['npm'], 2);

    // Trim whitespace jika ada
    $nama_anggota = trim($nama_anggota);
    $npm = trim($npm);

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE daftarhadir_anggota SET npm = '$npm', nama_anggota = '$nama_anggota', tanggal = '$tanggal', status_hadir = '$status_hadir', editor = '$username', updated_at = NOW() WHERE id_dhanggota = '$id_dhanggota'");

    if ($query) {
        echo "<script>alert('Daftar Hadir Anggota berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhanggota_read'>";
    } else {
        echo "<script>alert('Daftar Hadir Anggota gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhanggota_read'>";
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM daftarhadir_anggota WHERE id_dhanggota='$id_dhanggota'");
$data = mysqli_fetch_array($query);
$tanggal_sekarang = $data['tanggal'];
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Daftar Hadir Anggota</h5>
            <a href="?page=dhanggota_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputNPM" class="form-label">NPM</label>
                    <select name="npm" id="inputNPM" class="form-control" required>
                        <option value=''>Pilih NPM</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE status_ajuan = 'Diverifikasi' ORDER BY nama_anggota ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['npm'] == $data['npm']) ? 'selected' : '';
                            echo "<option value=\"{$row['nama_anggota']}-{$row['npm']}\" $selected>{$row['nama_anggota']} - {$row['npm']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputAnggota" class="form-label">Anggota</label>
                    <select name="nama_anggota" id="inputAnggota" class="form-control" required>
                        <option value=''>Pilih Anggota</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE status_ajuan = 'Diverifikasi' ORDER BY id_anggota ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['nama_anggota'] == $data['nama_anggota']) ? 'selected' : '';
                            echo "<option value=\"{$row['id_anggota']}-{$row['nama_anggota']}\" $selected>{$row['id_anggota']} - {$row['nama_anggota']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="form-label">Tanggal Hadir</label>
                    <select name="tanggal" id="inputTanggal" class="form-control" required>
                        <option value="">Pilih Tanggal</option>
                        <?php
                        $query_jadwal = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id_jadwal ASC");
                        while ($data_jadwal = mysqli_fetch_array($query_jadwal)) {
                            $tanggal = date("Y-m-d", strtotime($data_jadwal['waktu']));
                            $selected = ($tanggal == $tanggal_sekarang) ? 'selected' : '';
                            echo "<option value=\"$tanggal\" $selected>$tanggal</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select class="form-control" id="inputStatus" name="status_hadir" required>
                        <option value="Hadir" <?php if ($data['status_hadir'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                        <option value="Izin" <?php if ($data['status_hadir'] == 'Izin') echo 'selected'; ?>>Izin</option>
                        <option value="Sakit" <?php if ($data['status_hadir'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                        <option value="Tanpa Keterangan" <?php if ($data['status_hadir'] == 'Tanpa Keterangan') echo 'selected'; ?>>Tanpa Keterangan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>