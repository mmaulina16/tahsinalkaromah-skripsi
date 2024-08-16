<?php
$id_user = $_GET['id_user']; //mengambil nilai id_user di url, lalu disimpan di $id_user
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $status_akun = $_POST['status_akun'];

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE pengguna SET nama = '$nama', username = '$username', email = '$email', jenis_kelamin = '$jenis_kelamin', status = '$status', status_akun= 'Diajukan' WHERE id_user = '$id_user'");

    if ($query) {
        echo "<script>alert('Data pengguna berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    } else {
        echo "<script>alert('Data pengguna gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    }
}
$query = mysqli_query($koneksi, "select * from pengguna where id_user='$id_user'");
$data = mysqli_fetch_array($query); // mengambil data dari pengguna lalu ditampung di $data
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Data Pengguna</h5>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=anggota_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <?php } ?>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" required placeholder="Contoh : Fulanah" name="nama" value="<?= $data[1]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" required placeholder="Contoh : fulanah123" name="username" value="<?= $data[2]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="inputEmail" required placeholder="Contoh : fulanah123@gmail.com" name="email" value="<?= $data[3]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputJKelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="inputJKelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Perempuan" <?= ($data[5] == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                        <option value="Laki-Laki" <?= ($data[5] == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select name="status" id="inputStatus" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="Admin" <?= ($data[6] == 'Admin') ? "selected" : "" ?>>Admin</option>
                        <option value="Pengajar" <?= ($data[6] == 'Pengajar') ? "selected" : "" ?>>Pengajar</option>
                        <option value="Anggota" <?= ($data[6] == 'Anggota') ? "selected" : "" ?>>Anggota</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>