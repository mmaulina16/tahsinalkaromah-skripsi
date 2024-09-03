<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
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
    $batas_belajar = mysqli_real_escape_string($koneksi, $_POST['batas_belajar']);
    $kemampuan = $_POST['kemampuan'];
    $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);
    $alasan = mysqli_real_escape_string($koneksi, $_POST['alasan']);

    $cekNPM = mysqli_query($koneksi, "SELECT * FROM anggota WHERE npm='$npm'");
    if (mysqli_num_rows($cekNPM) > 0) {
        // Jika NPM sudah ada, tampilkan pesan error
        echo "<script>alert('NPM sudah terdaftar. Silakan gunakan NPM lain.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
    } else {
        // Batas ukuran file dalam bytes (misalnya, 2MB = 2 * 1024 * 1024 bytes)
        $maxFileSize = 2 * 1024 * 1024;

        // Proses unggah foto
        if (isset($_FILES['foto'])) {
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
                        // Simpan informasi ke database
                        $query = mysqli_query($koneksi, "INSERT INTO anggota (npm, nama_anggota, jenis_kelamin, tanggal_lahir, no_telp, email, alamat, nama_wali, no_telp_wali, universitas, fakultas, prodi, batas_belajar, kemampuan, kelas_tahsin, alasan, foto, status_ajuan, tanggal_pendaftaran) VALUES ('$npm', '$nama_anggota', '$jenis_kelamin', '$tanggal_lahir', '$no_telp', '$email', '$alamat', '$nama_wali', '$no_telp_wali', '$universitas', '$fakultas', '$prodi', '$batas_belajar', '$kemampuan', '$kelas_tahsin', '$alasan', '$fileName', 'Diajukan', NOW())");


                        if ($query) {
                            // print_r($_POST);
                            // print_r($query);
                            echo "<script> alert('Pendaftaran anggota berhasil ditambahkan!')</script>";
                            echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
                        } else {

                            // print_r($_POST);
                            // print_r($query);
                            echo "<script> alert('Pendaftaran anggota gagal ditambahkan!')</script>";
                            echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
                        }
                    } else {
                        echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.')</script>";
                    }
                } else {
                    echo "<script>alert('Maaf, ukuran file maksimal adalah 2MB.')</script>";
                }
            } else {
                echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.')</script>";
            }
        } else {
            echo "<script>alert('Harap unggah file foto.')</script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pendaftaran Anggota</h5>
            <a href="?page=dfanggota_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="inputNPM" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="inputNPM" required placeholder="Contoh: 2010010766" name="npm" maxlength="11">
                </div>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" required placeholder="Contoh : Fulanah" name="nama_anggota">
                </div>
                <div class="mb-3">
                    <label for="inputJKelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="inputJKelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTTL" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="inputTTL" name="tanggal_lahir" required min="1990-01-01" max="2009-12-31">
                </div>
                <div class="mb-3">
                    <label for="inputNoTelp" class="form-label">No. Telpon</label>
                    <input type="text" class="form-control" id="inputNoTelp" required placeholder="Contoh : 081234567890" name="no_telp">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" required placeholder="Contoh : fulanah123@gmail.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" required placeholder="Masukkan Alamat Lengkap" name="alamat">
                </div>
                <div class="mb-3">
                    <label for="inputNWali" class="form-label">Nama Wali</label>
                    <input type="text" class="form-control" id="inputNWali" required placeholder="Contoh : Muhammad Fulan" name="nama_wali">
                </div>
                <div class="mb-3">
                    <label for="inputNoWali" class="form-label">No Telepon Wali</label>
                    <input type="text" class="form-control" id="inputNoWali" required placeholder="Contoh : 0812345678901" name="no_telp_wali">
                </div>
                <div class="mb-3">
                    <label for="inputUniv" class="form-label">Universitas</label>
                    <input type="text" class="form-control" id="inputUniv" required placeholder="Contoh : Universitas Islam Kalimantan MAB" name="universitas">
                </div>
                <div class="mb-3">
                    <label for="inputFakultas" class="form-label">Fakultas</label>
                    <input type="text" class="form-control" id="inputFakultas" required placeholder="Contoh : Teknologi Informasi" name="fakultas">
                </div>
                <div class="mb-3">
                    <label for="inputProdi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="inputProdi" required placeholder="Contoh : Teknik Informatika" name="prodi">
                </div>
                <div class="mb-3">
                    <label for="inputBBelajar" class="form-label">Batas Belajar</label>
                    <input type="text" class="form-control" id="inputBBelajar" required placeholder="Contoh : Iqro Jilid 3" name="batas_belajar">
                </div>
                <div class="mb-3">
                    <label for="inputKemampuan" class="form-label">Kemampuan</label>
                    <select name="kemampuan" id="inputKemampuan" class="form-control" required>
                        <option value="">Pilih Kemampuan</option>
                        <option value="Belum bisa">Belum bisa</option>
                        <option value="Terbata-bata">Terbata-bata</option>
                        <option value="Lancar tapi belum bertajwid">Lancar tapi belum bertajwid</option>
                        <option value="Lancar dan bertajwid">Lancar dan bertajwid</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas Tahsin</label>
                    <select name="kelas_tahsin" id="inputKelas" class="form-control" required>
                        <option value=''>Pilih Kelas Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[nama_kelas]\">$data[nama_kelas]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputAlasan" class="form-label">Alasan</label>
                    <input type="text" class="form-control" id="inputAlasan" required placeholder="Masukkan alasan bergabung tahsin" name="alasan">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>