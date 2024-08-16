<?php
$id_pengajar = $_GET['id_pengajar']; // Mengambil nilai id_pengajar di URL, lalu disimpan di $id_pengajar
if (isset($_POST['btn_simpan'])) { // Jika tombol simpan diklik
    $nama_pengajar = $_POST['nama_pengajar'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $lulusan = $_POST['lulusan'];
    $jurusan = $_POST['jurusan'];
    $hafalan = $_POST['hafalan'];
    $kelas_tahsin = $_POST['kelas_tahsin'];
    $username = $_SESSION['username'];

    // Batas ukuran file dalam bytes
    $maxFotoSize = 2 * 1024 * 1024; // 2MB
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    // Ambil data pengajar lama dari database untuk mendapatkan nama file foto lama
    $queryLama = mysqli_query($koneksi, "SELECT foto, cv, portofolio FROM pengajar WHERE id_pengajar = '$id_pengajar'");
    $rowLama = mysqli_fetch_array($queryLama);
    $cvLama = $rowLama['cv'];
    $portofolioLama = $rowLama['portofolio'];
    $fotoLama = $rowLama['foto'];

    // Proses unggah foto baru
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDirFoto = "assets/images/profile/";
        $fileNameFoto = basename($_FILES["foto"]["name"]);
        $targetFilePathFoto = $targetDirFoto . $fileNameFoto;
        $fileTypeFoto = pathinfo($targetFilePathFoto, PATHINFO_EXTENSION);
        $fileSizeFoto = $_FILES["foto"]["size"];

        // Validasi tipe file dan ukuran file
        $allowTypesFoto = array('jpg', 'png', 'jpeg');
        if (in_array($fileTypeFoto, $allowTypesFoto) && $fileSizeFoto <= $maxFotoSize) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePathFoto)) {
                // Hapus file foto lama jika ada foto baru
                if (!empty($fotoLama) && file_exists($targetDirFoto . $fotoLama)) {
                    unlink($targetDirFoto . $fotoLama);
                }
                $foto = $fileNameFoto;
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah foto.')</script>";
                $foto = $fotoLama;
            }
        } else {
            echo "<script>alert('Maaf, hanya file JPG, JPEG, dan PNG yang diperbolehkan dan ukuran file maksimal adalah 2MB.')</script>";
            $foto = $fotoLama;
        }
    } else {
        $foto = $fotoLama;
    }

    // Proses unggah CV baru
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $targetDirCV = "assets/doc/cv/";
        $fileNameCV = basename($_FILES["cv"]["name"]);
        $targetFilePathCV = $targetDirCV . $fileNameCV;
        $fileTypeCV = pathinfo($targetFilePathCV, PATHINFO_EXTENSION);
        $fileSizeCV = $_FILES["cv"]["size"];

        $allowTypesCV = array('pdf', 'doc', 'docx');
        if (in_array($fileTypeCV, $allowTypesCV) && $fileSizeCV <= $maxFileSize) {
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePathCV)) {
                if (!empty($cvLama) && file_exists($targetDirCV . $cvLama)) {
                    unlink($targetDirCV . $cvLama);
                }
                $cv = $fileNameCV;
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah CV.')</script>";
                $cv = $cvLama;
            }
        } else {
            echo "<script>alert('Maaf, hanya file PDF, DOC, dan DOCX yang diperbolehkan dan ukuran file maksimal adalah 5MB.')</script>";
            $cv = $cvLama;
        }
    } else {
        $cv = $cvLama;
    }

    // Proses unggah portofolio baru
    if (isset($_FILES['portofolio']) && $_FILES['portofolio']['error'] == 0) {
        $targetDirPortofolio = "assets/doc/portofolio/";
        $fileNamePortofolio = basename($_FILES["portofolio"]["name"]);
        $targetFilePathPortofolio = $targetDirPortofolio . $fileNamePortofolio;
        $fileTypePortofolio = pathinfo($targetFilePathPortofolio, PATHINFO_EXTENSION);
        $fileSizePortofolio = $_FILES["portofolio"]["size"];

        $allowTypesPortofolio = array('pdf', 'doc', 'docx');
        if (in_array($fileTypePortofolio, $allowTypesPortofolio) && $fileSizePortofolio <= $maxFileSize) {
            if (move_uploaded_file($_FILES["portofolio"]["tmp_name"], $targetFilePathPortofolio)) {
                if (!empty($portofolioLama) && file_exists($targetDirPortofolio . $portofolioLama)) {
                    unlink($targetDirPortofolio . $portofolioLama);
                }
                $portofolio = $fileNamePortofolio;
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah portofolio.')</script>";
                $portofolio = $portofolioLama;
            }
        } else {
            echo "<script>alert('Maaf, hanya file PDF, DOC, dan DOCX yang diperbolehkan dan ukuran file maksimal adalah 5MB.')</script>";
            $portofolio = $portofolioLama;
        }
    } else {
        $portofolio = $portofolioLama;
    }

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE pengajar SET nama_pengajar = '$nama_pengajar', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telp = '$no_telp', email = '$email', lulusan = '$lulusan', jurusan = '$jurusan', hafalan = '$hafalan', kelas_tahsin = '$kelas_tahsin', cv = '$cv', portofolio = '$portofolio', foto = '$foto', editor = '$username' WHERE id_pengajar = '$id_pengajar'");

    if ($query) {
        echo "<script>alert('Data pengajar berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengajar_read'>";
    } else {
        echo "<script>alert('Data pengajar gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengajar_read'>";
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'");
$data = mysqli_fetch_array($query); // Mengambil data dari pengajar lalu ditampung di $data
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Data Pengajar</h5>
            <a href="?page=pengajar_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="inputNamaPengajar" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNamaPengajar" required placeholder="Contoh : Fulanah" name="nama_pengajar" value="<?= $data[1]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="inputJenisKelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Perempuan" <?= ($data[2] == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                        <option value="Laki-Laki" <?= ($data[2] == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTTL" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="inputTTL" required min="1980-01-01" max="2004-12-31" name="tanggal_lahir" value="<?= $data[3]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" required placeholder="Masukkan Alamat Lengkap" name="alamat" value="<?= $data[4]; ?>">
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
                    <label for="inputLulusan" class="form-label">Lulusan</label>
                    <input type="text" class="form-control" id="inputLulusan" required placeholder="Contoh : Universitas Islam Kalimantan MAB" name="lulusan" value="<?= $data[7]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputJurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="inputJurusan" required placeholder="Contoh : Pendidikan Agama Islam" name="jurusan" value="<?= $data[8]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputHafalan" class="form-label">Hafalan</label>
                    <input type="text" class="form-control" id="inputHafalan" required placeholder="Contoh : Juz 1 - 5" name="hafalan" value="<?= $data[9]; ?>">
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
                <div class="mb-3">
                    <label for="inputCV" class="form-label">CV</label>
                    <input type="file" class="form-control" id="inputCV" name="cv" accept=".pdf,.doc,.docx">
                </div>
                <div class="mb-3">
                    <label for="inputPortofolio" class="form-label">Portofolio</label>
                    <input type="file" class="form-control" id="inputPortofolio" name="portofolio" accept=".pdf,.doc,.docx">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>