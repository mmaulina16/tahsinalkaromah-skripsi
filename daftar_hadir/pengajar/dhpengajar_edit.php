<?php
$id_dhpengajar = $_GET['id_dhpengajar']; //mengambil nilai id_dhpengajar di url, lalu disimpan di $id_dhpengajar
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    $tanggal = $_POST['tanggal'];
    $status_hadir = $_POST['status_hadir'];
    $username = $_SESSION['username'];

    // Pisahkan ID dan nama dari nilai yang dikirim
    list($id_pengajar, $nama_pengajar) = explode("-", $_POST['nama_pengajar'], 2);

    // Trim whitespace jika ada
    $nama_pengajar = trim($nama_pengajar);

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE daftarhadir_pengajar SET nama_pengajar = '$nama_pengajar', tanggal = '$tanggal', status_hadir = '$status_hadir', editor = '$username', updated_at = NOW() WHERE id_dhpengajar = '$id_dhpengajar'");

    if ($query) {
        echo "<script>alert('Daftar Hadir Pengajar berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
    } else {
        echo "<script>alert('Daftar Hadir Pengajar gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM daftarhadir_pengajar WHERE id_dhpengajar='$id_dhpengajar'");
$data = mysqli_fetch_array($query);
$tanggal_sekarang = $data['tanggal'];
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Daftar Hadir Pengajar</h5>
            <a href="?page=dhpengajar_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputPengajar" class="form-label">Pengajar</label>
                    <select name="nama_pengajar" id="inputPengajar" class="form-control" required>
                        <option value=''>Pilih Pengajar</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE status_ajuan = 'Diverifikasi' ORDER BY id_pengajar ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['nama_pengajar'] == $data['nama_pengajar']) ? 'selected' : '';
                            echo "<option value=\"{$row['id_pengajar']}-{$row['nama_pengajar']}\" $selected>{$row['id_pengajar']} - {$row['nama_pengajar']}</option>";
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