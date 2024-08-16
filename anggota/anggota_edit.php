<?php
$id_anggota = $_GET['id_anggota']; //mengambil nilai id_anggota di url, lalu disimpan di $id_anggota
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $npm = $_POST['npm'];
    $nama_anggota = $_POST['nama_anggota'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nama_wali = $_POST['nama_wali'];
    $no_telp_wali = $_POST['no_telp_wali'];
    $universitas = $_POST['universitas'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);
    $username = $_SESSION['username'];

    // Batas ukuran file dalam bytes (misalnya, 2MB = 2 * 1024 * 1024 bytes)
    $maxFileSize = 2 * 1024 * 1024;

    // Ambil data anggota lama dari database untuk mendapatkan nama file foto lama
    $queryLama = mysqli_query($koneksi, "SELECT foto FROM anggota WHERE id_anggota = '$id_anggota'");
    $rowLama = mysqli_fetch_array($queryLama);
    $fotoLama = $rowLama['foto'];

    // Proses unggah foto baru
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDir = "assets/images/profile/";
        $fileName = basename($_FILES["foto"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileSize = $_FILES["foto"]["size"];

        // Validasi tipe file dan ukuran file
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            if ($fileSize <= $maxFileSize) {
                // Pindahkan file ke direktori tujuan
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
                    // Hapus file foto lama jika ada foto baru
                    if (!empty($fotoLama) && file_exists($targetDir . $fotoLama)) {
                        unlink($targetDir . $fotoLama);
                    }
                    // Simpan informasi ke database dengan foto baru
                    $foto = $fileName;
                } else {
                    echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.')</script>";
                    $foto = $fotoLama; // Tetap gunakan foto lama jika gagal mengunggah
                }
            } else {
                echo "<script>alert('Maaf, ukuran file maksimal adalah 2MB.')</script>";
                $foto = $fotoLama; // Tetap gunakan foto lama jika ukuran file terlalu besar
            }
        } else {
            echo "<script>alert('Maaf, hanya file JPG, JPEG, dan PNG yang diperbolehkan.')</script>";
            $foto = $fotoLama; // Tetap gunakan foto lama jika tipe file tidak valid
        }
    } else {
        $foto = $fotoLama; // Tetap gunakan foto lama jika tidak ada file baru yang diunggah
    }

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE anggota SET npm = '$npm', nama_anggota = '$nama_anggota', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', no_telp = '$no_telp', email = '$email', alamat = '$alamat', nama_wali = '$nama_wali', no_telp_wali = '$no_telp_wali', universitas = '$universitas', fakultas = '$fakultas', prodi = '$prodi', kelas_tahsin = '$kelas_tahsin', foto = '$foto', editor = '$username' WHERE id_anggota = '$id_anggota'");

    if ($query) {
        echo "<script>alert('Data anggota berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=anggota_read'>";
    } else {
        echo "<script>alert('Data anggota gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=anggota_read'>";
    }
}
$query = mysqli_query($koneksi, "select * from anggota where id_anggota='$id_anggota'");
$data = mysqli_fetch_array($query); // mengambil data dari anggota lalu ditampung di $data
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Data Anggota</h5>
            <a href="?page=anggota_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputNPM" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="inputNPM" required placeholder="Contoh : 2010012345" name="npm" value="<?= $data[1]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" required placeholder="Contoh : Fulanah" name="nama_anggota" value="<?= $data[2]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputJKelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="inputJKelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Perempuan" <?= ($data[3] == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                        <option value="Laki-Laki" <?= ($data[3] == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTTL" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="inputTTL" required min="1990-01-01" max="2009-12-31" name="tanggal_lahir" value="<?= $data[4]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputNoTelp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="inputNoTelp" required placeholder="Contoh : 081234567890" name="no_telp" value="<?= $data[5]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" required placeholder="Contoh : fulanah123@gmail.com" name="email" value="<?= $data[6]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" required placeholder="Masukkan alamat lengkap" name="alamat" value="<?= $data[7]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputNamaWali" class="form-label">Nama Wali</label>
                    <input type="text" class="form-control" id="inputNamaWali" required placeholder="Contoh : Muhammad Fulan" name="nama_wali" value="<?= $data[8]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputNoWali" class="form-label">No. Telepon Wali</label>
                    <input type="text" class="form-control" id="inputNoWali" required placeholder="Contoh : 081234567890" name="no_telp_wali" value="<?= $data[9]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputUniv" class="form-label">Universitas</label>
                    <input type="text" class="form-control" id="inputUniv" required placeholder="Contoh : Universitas Islam Kalimantan MAB Banjarmasin" name="universitas" value="<?= $data[10]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputFakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="inputFakultas" required placeholder="Contoh : Teknologi Informasi" name="fakultas" value="<?= $data[11]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputProdi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="inputProdi" required placeholder="Contoh : Teknik Informatika" name="prodi" value="<?= $data[12]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas Tahsin</label>
                    <select name="kelas_tahsin" id="inputKelas" class="form-control" required>
                        <option value=''>Pilih Kelas Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
                        while ($kelas = mysqli_fetch_array($query)) {
                            // Menambahkan selected jika nilai kelas_tahsin saat ini sesuai dengan nilai yang ada di database
                            $selected = ($kelas['nama_kelas'] == $data['kelas_tahsin']) ? 'selected' : '';
                            echo "<option value=\"$kelas[nama_kelas]\" $selected>$kelas[nama_kelas]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputFoto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="inputFoto" name="foto" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>