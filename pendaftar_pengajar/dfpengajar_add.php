<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
    $nama_pengajar = $_POST['nama_pengajar'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $lulusan = $_POST['lulusan'];
    $jurusan = $_POST['jurusan'];
    $hafalan = $_POST['hafalan'];
    $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);

    // Proses unggah foto
    $fotoFileName = '';
    if (isset($_FILES['foto'])) {
        $targetDir = "assets/images/profile/";
        $fotoFileName = basename($_FILES["foto"]["name"]);
        $targetFilePath = $targetDir . $fotoFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileSize = $_FILES["foto"]["size"];

        // Validasi tipe file dan ukuran file
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes) && $fileSize <= 2 * 1024 * 1024) {
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah foto.')</script>";
            }
        } else {
            echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG yang diperbolehkan dan ukuran file maksimal adalah 2MB.')</script>";
        }
    }

    // Proses unggah CV
    $cvFileName = '';
    if (isset($_FILES['cv'])) {
        $targetDir = "assets/doc/cv/";
        $cvFileName = basename($_FILES["cv"]["name"]);
        $targetFilePath = $targetDir . $cvFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileSize = $_FILES["cv"]["size"];

        // Validasi tipe file dan ukuran file
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes) && $fileSize <= 5 * 1024 * 1024) {
            if (!move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePath)) {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah CV.')</script>";
            }
        } else {
            echo "<script>alert('Maaf, hanya file PDF, DOC, DOCX yang diperbolehkan dan ukuran file maksimal adalah 5MB.')</script>";
        }
    }

    // Proses unggah portofolio
    $portofolioFileName = '';
    if (isset($_FILES['portofolio'])) {
        $targetDir = "assets/doc/portofolio/";
        $portofolioFileName = basename($_FILES["portofolio"]["name"]);
        $targetFilePath = $targetDir . $portofolioFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileSize = $_FILES["portofolio"]["size"];

        // Validasi tipe file dan ukuran file
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes) && $fileSize <= 5 * 1024 * 1024) {
            if (!move_uploaded_file($_FILES["portofolio"]["tmp_name"], $targetFilePath)) {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah portofolio.')</script>";
            }
        } else {
            echo "<script>alert('Maaf, hanya file PDF, DOC, DOCX yang diperbolehkan dan ukuran file maksimal adalah 5MB.')</script>";
        }
    }

    // Simpan informasi ke database jika file berhasil diunggah
    if ($fotoFileName && $cvFileName && $portofolioFileName) {
        $query = mysqli_query($koneksi, "INSERT INTO pengajar (nama_pengajar, jenis_kelamin, tanggal_lahir, alamat, no_telp, email, lulusan, jurusan, hafalan, kelas_tahsin, foto, cv, portofolio, status_ajuan, tanggal_pendaftaran) VALUES ('$nama_pengajar', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$no_telp', '$email', '$lulusan', '$jurusan', '$hafalan', '$kelas_tahsin', '$fotoFileName', '$cvFileName', '$portofolioFileName', 'Diajukan', NOW())");

        if ($query) {
            echo "<script>alert('Pendaftaran pengajar berhasil ditambahkan!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=dfpengajar_read'>";
        } else {
            echo "<script>alert('Pendaftaran pengajar gagal ditambahkan!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=dfpengajar_read'>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pendaftaran Pengajar</h5>
            <a href="?page=dfanggota_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" required placeholder="Contoh : Fulanah" name="nama_pengajar">
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
                    <input type="date" class="form-control" id="inputTTL" name="tanggal_lahir" required min="1980-01-01" max="2004-12-31">
                </div>
                <div class="mb-3">
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" required placeholder="Masukkan Alamat Lengkap" name="alamat">
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
                    <label for="inputLulusan" class="form-label">Lulusan</label>
                    <input type="text" class="form-control" id="inputLulusan" required placeholder="Contoh : Universitas Islam Kalimantan MAB" name="lulusan">
                </div>
                <div class="mb-3">
                    <label for="inputJurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="inputJurusan" required placeholder="Contoh : Pendidikan Agama Islam" name="jurusan">
                </div>
                <div class="mb-3">
                    <label for="inputHafalan" class="form-label">Hafalan</label>
                    <input type="text" class="form-control" id="inputHafalan" required placeholder="Contoh : Juz 1 - 5" name="hafalan">
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
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="inputCV" class="form-label">CV</label>
                    <input type="file" class="form-control" id="inputCV" required name="cv" accept=".pdf,.doc,.docx">
                </div>
                <div class="mb-3">
                    <label for="inputPortofolio" class="form-label">Portofolio</label>
                    <input type="file" class="form-control" id="inputPortofolio" required name="portofolio" accept=".pdf,.doc,.docx">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>