<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tahsin & Tahfidz Al-Karomah</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/tahsin&tahfidz-putih.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />

    <style>
        .form-container {
            display: flex;
            overflow: hidden;
            width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .form-slide {
            min-width: 100%;
            flex-shrink: 0;
        }

        .card-img-top {
            object-fit: cover;
            aspect-ratio: 1 / 1;
        }
    </style>
</head>

<body>
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="assets/images/logos/tahsin&tahfidz.png" width="100" alt="" />
                    </a>
                </div>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <a href="login/login_view.php" class="btn btn-success">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span>Masuk</span>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <!--  Header End -->

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2 class="fw-semibold mb-4 text-center">Ahlan Wa Sahlan..</h2>
                <p class="text-center mt-3 ms-3 me-3" style="font-size: 16px; word-spacing: 2px;">
                    Tahsin dan Tahfidz Al-Karomah merupakan program pembelajaran dari divisi Binkad (Pembinaan dan Pengkaderan) dan Minba (Minat dan Bakat) UKM KDK Al-Karomah Uniska MAB.
                    Tujuan adanya program Tahsin dan Tahfidz ini adalah untuk mengajak mahasiswa/i belajar Al-Qur'an terutama mengenai bacaan, makhraj huruf, tajwid, dan lain-lain, supaya mahasiswa/i fasih dalam membaca Al-Quran.
                    Peserta Tahsin dan Tahfidz Al-Karomah terbuka untuk umum, tidak hanya untuk anggota KDK Al-Karomah dan mahasiswa/i Uniska, tapi juga menerima peserta dari luar kampus.
                </p>
                <!-- <div class="d-grid gap-2 col-2 mx-auto">
                    <a href="#pendaftaran" class="btn btn-success">Daftar Menjadi Anggota</a>
                </div> -->
            </div>
            <h3 class="fw-semibold mt-4 mb-4 text-center">Dokumentasi Tahsin</h3>
            <div class="row ms-5 me-5 mt-3">
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/images/ziarah.jpg" alt="...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/images/tahsin.jpeg" alt="...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/images/tahsin2.jpeg" alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="fw-semibold mt-4 mb-4 text-center">Kegiatan Lainnya</h3>
                <p class="text-center mt-3 ms-3 me-3" style="font-size: 16px;">
                    KDK Al-Karomah juga mengadakan kegiatan untuk umum yang bisa diikuti selain anggota KDK Al-Karomah dan Mahasiswa/i Uniska MAB
                </p>
                <div class="row ms-5 me-5 mt-3">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="assets/images/karimah.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Karimah</h5>
                                <p class="card-text">Some quick input text to build on the card title and make up the bulk of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-success">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="assets/images/habsyi.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Habsyi</h5>
                                <p class="card-text">Some quick input text to build on the card title and make up the bulk of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-success">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="assets/images/desaingrafis.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pelatihan Desain Grafis</h5>
                                <p class="card-text">Some quick input text to build on the card title and make up the bulk of
                                    the
                                    card's content.</p>
                                <a href="#" class="btn btn-success">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM PENDAFTARAN -->

        <div class="card">
            <div class="card-body" id="pendaftaran">
                <!-- Navigation Buttons -->
                <h3 class="text-center">Form Pendaftaran</h3>
                <div class="form-navigation text-center mt-3">
                    <button class="btn btn-success" onclick="showForm('anggota')">Form Anggota</button>
                    <button class="btn btn-success" onclick="showForm('pengajar')">Form Pengajar</button>
                </div>
                <hr>

                <div class="form-container">
                    <!-- Form Pendaftaran Anggota -->
                    <div class="form-slide" id="form-anggota">
                        <h4 class="text-center mt-3">Pendaftaran Anggota Tahsin Al - Karomah</h4>
                        <?php
                        if (isset($_POST['simpan_anggota'])) { // jika tombol simpan diklik
                            $npm = $_POST['npm'];
                            $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
                            $jenis_kelamin = $_POST['jenis_kelamin'];
                            $tanggal_lahir = $_POST['tanggal_lahir'];
                            $no_telp = $_POST['no_telp'];
                            $email = $_POST['email'];
                            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
                            $nama_wali = mysqli_real_escape_string($koneksi, $_POST['nama_wali']);
                            $no_telp_wali = $_POST['no_telp_wali'];
                            $universitas = mysqli_real_escape_string($koneksi, $_POST['universitas']);
                            $fakultas = mysqli_real_escape_string($koneksi, $_POST['fakultas']);
                            $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
                            $batas_belajar = mysqli_real_escape_string($koneksi, $_POST['batas_belajar']);
                            $kemampuan = mysqli_real_escape_string($koneksi, $_POST['kemampuan']);
                            $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);
                            $alasan = mysqli_real_escape_string($koneksi, $_POST['alasan']);

                            $cekNPM = mysqli_query($koneksi, "SELECT * FROM anggota WHERE npm='$npm'");
                            if (mysqli_num_rows($cekNPM) > 0) {
                                // Jika NPM sudah ada, tampilkan pesan error
                                echo "<script>alert('NPM sudah terdaftar. Silakan gunakan NPM lain.')</script>";
                                echo "<meta http-equiv='refresh' content='0;url=?page=home'>";
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
                                                    // echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
                                                } else {

                                                    // print_r($_POST);
                                                    // print_r($query);
                                                    echo "<script> alert('Pendaftaran anggota gagal ditambahkan!')</script>";
                                                    // echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
                                                    echo "Error: " . mysqli_error($koneksi);
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
                            <button type="submit" class="btn btn-primary" name="simpan_anggota">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </form>
                    </div>

                    <!-- Form Pendaftaran Pengajar -->
                    <div class="form-slide" id="form-pengajar">
                        <h4 class="text-center mt-3">Pendaftaran Pengajar Tahsin Al - Karomah</h4>
                        <?php
                        if (isset($_POST['simpan_pengajar'])) { // jika tombol simpan diklik
                            $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
                            $jenis_kelamin = $_POST['jenis_kelamin'];
                            $tanggal_lahir = $_POST['tanggal_lahir'];
                            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
                            $no_telp = $_POST['no_telp'];
                            $email = $_POST['email'];
                            $lulusan = mysqli_real_escape_string($koneksi, $_POST['lulusan']);
                            $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
                            $hafalan = mysqli_real_escape_string($koneksi, $_POST['hafalan']);
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
                                    // echo "<meta http-equiv='refresh' content='0;url=?page=dfpengajar_read'>";
                                } else {
                                    echo "<script>alert('Pendaftaran pengajar gagal ditambahkan!')</script>";
                                    // echo "<meta http-equiv='refresh' content='0;url=?page=dfpengajar_read'>";
                                    echo "Error: " . mysqli_error($koneksi);
                                }
                            }
                        }
                        ?>
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
                            <button type="submit" class="btn btn-primary" name="simpan_pengajar">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Javascript Form -->
        <script>
            function showForm(formType) {
                // Sembunyikan semua form terlebih dahulu
                document.getElementById('form-anggota').style.display = 'none';
                document.getElementById('form-pengajar').style.display = 'none';

                // Tampilkan form yang dipilih
                if (formType === 'anggota') {
                    document.getElementById('form-anggota').style.display = 'block';
                } else if (formType === 'pengajar') {
                    document.getElementById('form-pengajar').style.display = 'block';
                }
            }
        </script>


        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/sidebarmenu.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>