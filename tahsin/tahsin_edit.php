<?php
$id_tahsin = $_GET['id_tahsin']; // Mengambil nilai id_tahsin di URL
if (isset($_POST['btn_simpan'])) { // Jika tombol simpan diklik
    // Mengambil dan menyiapkan data dari form
    $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $npm = $_POST['npm'];
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jadwal_tahsin = $_POST['jadwal_tahsin'];
    $batas_tahsin = mysqli_real_escape_string($koneksi, $_POST['batas_tahsin']);
    $kemajuan = mysqli_real_escape_string($koneksi, $_POST['kemajuan']);
    $perbaikan_bacaan = mysqli_real_escape_string($koneksi, $_POST['perbaikan_bacaan']);
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

    // Simpan data ke database
    $query = mysqli_query($koneksi, "UPDATE halaqoh_tahsin SET nama_pengajar = '$nama_pengajar', nama_anggota = '$nama_anggota', npm = '$npm', kelas = '$kelas', jadwal_tahsin = '$jadwal_tahsin', batas_tahsin = '$batas_tahsin', kemajuan = '$kemajuan', perbaikan_bacaan = '$perbaikan_bacaan', editor = '$username', updated_at = NOW() WHERE id_tahsin = '$id_tahsin'");

    if ($query) {
        echo "<script>alert('Data halaqoh tahsin berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    } else {
        echo "<script>alert('Data halaqoh tahsin gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    }
}

// Mengambil data untuk form edit
$query = mysqli_query($koneksi, "SELECT * FROM halaqoh_tahsin WHERE id_tahsin = '$id_tahsin'");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Data Halaqoh Tahsin</h5>
            <a href="?page=tahsin_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post">
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
                    <label for="inputJadwal" class="form-label">Jadwal Tahsin</label>
                    <select name="jadwal_tahsin" id="inputJadwal" class="form-control" required>
                        <option value=''>Pilih Jadwal Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE MONTH(waktu) = MONTH(CURDATE()) AND YEAR(waktu) = YEAR(CURDATE()) ORDER BY id_jadwal ASC");
                        while ($row = mysqli_fetch_array($query)) {
                            $selected = ($row['waktu'] == $data['jadwal_tahsin']) ? 'selected' : '';
                            echo "<option value=\"{$row['waktu']}\" $selected>{$row['waktu']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputBTahsin" class="form-label">Batas Tahsin</label>
                    <input type="text" class="form-control" id="inputBTahsin" required placeholder="Contoh : Metode Ummi jilid 1 hal. 3" name="batas_tahsin" value="<?= $data['batas_tahsin']; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputKemajuan" class="form-label">Kemajuan</label>
                    <input type="text" class="form-control" id="inputKemajuan" required placeholder="Masukkan kemajuan bacaan anggota" name="kemajuan" value="<?= $data['kemajuan']; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputPBacaan" class="form-label">Perbaikan Bacaan</label>
                    <input type="text" class="form-control" id="inputPBacaan" required placeholder="Masukkan perbaikan bacaan anggota" name="perbaikan_bacaan" value="<?= $data['perbaikan_bacaan']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>