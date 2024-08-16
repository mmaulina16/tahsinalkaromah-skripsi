<?php
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5('password');
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $query = mysqli_query($koneksi, "insert into pengguna values (null, '$nama', '$username', '$email', '$password', '$jenis_kelamin', '$status', 'Diajukan')");
    if ($query) {
        echo "<script> alert('Data pengguna berhasil ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    } else {
        echo "<script> alert('Data pengguna gagal ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
        // localhost/simtawa-app/index.php?page=pengguna_read
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pengguna</h5>
            <a href="?page=pengguna_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" required placeholder="Contoh : Fulanah" name="nama">
                </div>
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" required placeholder="Contoh : fulanah123" name="username">
                    <small class="text-info">
                        <i class="ti ti-info-circle"></i>Khusus anggota isi Username menggunakan NPM
                    </small>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" required placeholder="Contoh : fulanah123@gmail.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" required name="password">
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
                    <label for="inputStatus" class="form-label">Status</label>
                    <select name="status" id="inputStatus" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="Admin">Admin</option>
                        <option value="Pengajar">Pengajar</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan"></i> Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>