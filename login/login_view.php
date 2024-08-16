<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Tahsin Al-Karomah</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/tahsin&tahfidz-putih.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-10 col-lg-8 col-xxl-5">
          <div class="card mb-0">
            <div class="card-body">
              <a href="#" class="text-nowrap logo-img text-center d-block w-100">
                <img src="../assets/images/logos/tahsin&tahfidz.png" width="180" alt="">
              </a>
              <p class="text-center">Silakan login terlebih dulu</p>
              <form method="post" action="proses_login.php">
                <div class="mb-3">
                  <label for="exampleInputUsername" class="form-label">Nama Pengguna</label>
                  <input type="text" name="username" required class="form-control" id="exampleInputUsername" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword" class="form-label">Kata Sandi</label>
                  <input type="password" name="password" required class="form-control" id="exampleInputPassword">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                </div>
                <button type="submit" name="btn_login" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                <div class="d-flex align-items-center justify-content-center">
                  <a class="text-success fw-bold ms-2" href="register_view.php">Daftar Akun</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>