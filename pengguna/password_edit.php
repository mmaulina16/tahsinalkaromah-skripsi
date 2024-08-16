<?php
// Mengambil nilai id_user di URL, lalu disimpan di $id_user
$id_user = isset($_GET['id_user']) ? intval($_GET['id_user']) : 0;

// Periksa jika tombol simpan diklik
if (isset($_POST['btn_simpan'])) {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];

    // Cek jika id_user valid
    if ($id_user > 0) {
        // Query untuk mendapatkan password lama
        $query = mysqli_query($koneksi, "SELECT password FROM pengguna WHERE id_user = '$id_user'");
        $data = mysqli_fetch_assoc($query);

        // Verifikasi password lama dan update password baru
        if (md5($password_lama) === $data['password']) {
            $password_baru_md5 = md5($password_baru);
            $query = mysqli_query($koneksi, "UPDATE pengguna SET password = '$password_baru_md5' WHERE id_user = '$id_user'");
            if ($query) {
                echo "<script>alert('Password berhasil diperbarui!');</script>";
                echo "<meta http-equiv='refresh' content='0;url=?page=dashboard'>";
            } else {
                echo "<script>alert('Password gagal diperbarui!');</script>";
                echo "<meta http-equiv='refresh' content='0;url=?page=password_edit'>";
            }
        } else {
            echo "<script>alert('Password lama salah!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=password_edit'>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Password</h5>
            <hr>
            <!-- Form untuk mengganti password -->
            <form action="" method="post">
                <div class="mb-3">
                    <label for="inputPasswordLama" class="form-label">Password Lama</label>
                    <input type="password" class="form-control" id="inputPasswordLama" required name="password_lama">
                </div>
                <div class="mb-3">
                    <label for="inputPasswordBaru" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="inputPasswordBaru" required name="password_baru">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>