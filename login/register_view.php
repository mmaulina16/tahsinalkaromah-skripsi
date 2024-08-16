<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Tahsin Al-Karomah</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/tahsin&tahfidz-putih.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="container-fluid vh-100 d-flex p-0">
        <!-- Logo dan tulisan di sebelah kiri -->
        <div class="d-flex flex-column align-items-center justify-content-center col-6 bg-light">
            <a href="./login_view.php" class="text-nowrap logo-img text-center d-block w-100">
                <img src="../assets/images/logos/tahsin&tahfidz.png" width="300" alt="">
            </a>
            <p class="text-center">Silakan Lengkapi Data Disamping!</p>
        </div>
        <!-- Form pengisian di sebelah kanan -->
        <div class="d-flex align-items-center justify-content-center col-6">
            <div class="w-75">
                <form method="post" action="proses_register.php">
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" required class="form-control" id="inputNama" aria-describedby="textHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Nama Pengguna</label>
                        <input type="text" name="username" required maxlength="10" class="form-control" id="inputUsername" aria-describedby="textHelp">
                        <small class="text-info">
                            <i class="ti ti-info-circle"></i>Khusus anggota isi Nama Pengguna menggunakan NPM
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control" id="inputEmail">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" required class="form-control" id="inputPassword">
                    </div>
                    <div class="mb-3">
                        <label for="inputJKelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="inputJKelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus" class="form-label">Status</label>
                        <select name="status" class="form-control" id="inputStatus">
                            <option value="">Pilih Status</option>
                            <option value="Admin">Admin</option>
                            <option value="Pengajar">Pengajar</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>
                    <button type="submit" name="btn_daftar" class="btn btn-success w-100 py-2 rounded-2">Daftar Akun</button>
                    <div class="d-flex align-items-center justify-content-center mt-4">
                        <p class="mb-0 fw-bold">Sudah punya akun?</p>
                        <a class="text-success fw-bold ms-2" href="./login_view.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>