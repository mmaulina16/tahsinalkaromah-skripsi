<?php
$id_tahfidz = $_GET['id_tahfidz']; //mengambil nilai id_tahfidz di url, lalu disimpan di $id_tahfidz
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jadwal_tahfidz = $_POST['jadwal_tahfidz'];
    $batas_tahfidz = mysqli_real_escape_string($koneksi, $_POST['batas_tahfidz']);
    $kemajuan = mysqli_real_escape_string($koneksi, $_POST['kemajuan']);
    $perbaikan = mysqli_real_escape_string($koneksi, $_POST['perbaikan']);
    $username = $_SESSION['username'];
    $updated_at = $_POST['updated_at'];

    // Pisahkan ID dan nama dari nilai yang dikirim
    list($id_pengajar, $nama_pengajar) = explode("-", $_POST['nama_pengajar'], 2);
    list($id_anggota, $nama_anggota) = explode("-", $_POST['nama_anggota'], 2);
    list($nama_anggota, $npm) = explode("-", $_POST['npm'], 2);

    // Trim whitespace jika ada
    $nama_pengajar = trim($nama_pengajar);
    $nama_anggota = trim($nama_anggota);
    $npm = trim($npm);

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE halaqoh_tahfidz SET nama_pengajar = '$nama_pengajar', nama_anggota = '$nama_anggota', npm = '$npm', jadwal_tahfidz = '$jadwal_tahfidz', batas_tahfidz = '$batas_tahfidz', kemajuan = '$kemajuan', perbaikan = '$perbaikan', editor = '$username', updated_at = NOW() WHERE id_tahfidz = '$id_tahfidz'");

    if ($query) {
        echo "<script>alert('Data halaqoh tahfidz berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahfidz_read'>";
    } else {
        echo "<script>alert('Data halaqoh tahfidz gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahfidz_read'>";
    }
}
$query = mysqli_query($koneksi, "select * from halaqoh_tahfidz where id_tahfidz='$id_tahfidz'");
$data = mysqli_fetch_array($query); // mengambil data dari halaqoh_tahfidz lalu ditampung di $data
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Data Halaqoh tahfidz</h5>
            <a href="?page=tahfidz_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
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
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <select name="kelas" id="inputKelas" class="form-control" required>
                        <option value=''>Pilih Kelas Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['nama_kelas'] == $data['kelas']) ? 'selected' : '';
                            echo "<option value=\"{$row['nama_kelas']}\" $selected>{$row['nama_kelas']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputJadwal" class="form-label">Jadwal Tahfidz</label>
                    <select name="jadwal_tahfidz" id="inputJadwal" class="form-control" required>
                        <option value=''>Pilih Jadwal Tahfidz</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE MONTH(waktu) = MONTH(CURDATE()) AND YEAR(waktu) = YEAR(CURDATE()) ORDER BY id_jadwal ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['waktu'] == $data['jadwal_tahfidz']) ? 'selected' : '';
                            echo "<option value=\"{$row['waktu']}\" $selected>{$row['waktu']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputBTahfidz" class="form-label">Batas Tahfidz</label>
                    <input type="text" class="form-control" id="inputBTahfidz" required placeholder="Jilid 1, hal. 3" name="batas_tahfidz" value="<?= $data[6]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputKemajuan" class="form-label">Kemajuan</label>
                    <input type="text" class="form-control" id="inputKemajuan" required placeholder="Masukkan kemajuan bacaan anggota" name="kemajuan" value="<?= $data[7]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputPerbaikan" class="form-label">Perbaikan</label>
                    <input type="text" class="form-control" id="inputPerbaikan" required placeholder="Masukkan perbaikan bacaan anggota" name="perbaikan" value="<?= $data[8]; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>