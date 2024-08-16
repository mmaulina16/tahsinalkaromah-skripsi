<?php
include "../pengaturan/koneksi.php"; //panggil koneksi
if (isset($_POST['btn_login'])) { //cek apakah button login sudah diklik
    $username = $_POST['username']; //ambil nilai dari inputan username simpan di $username
    $password = md5($_POST['password']); //ambil nilai dari inputan password simpan di $password
    $query = mysqli_query($koneksi, "select * from pengguna where username='$username' and password='$password'");
    if (mysqli_num_rows($query) > 0) { //jika username dan password benar
        $data = mysqli_fetch_array($query); //ambil data pengguna simpan di $data
        if ($data['status_akun'] == 'Diajukan') { //jika status akun diajukan
            echo "<script> alert('Status akun anda masih diajukan. Silakan hubungi admin untuk diverifikasi!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
        } else if ($data['status_akun'] == 'Ditolak') { //jika status akun ditolak
            echo "<script> alert('Status akun anda ditolak. Silakan daftar ulang akun anda, atau hubungi admin!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
        } else { //jika status akun diverifikasi
            session_start(); //memulai session, agar bisa membuat session
            $_SESSION['id_user'] = $data['id_user']; //ambil nilai dari kolom id_user simpan di session id_user
            $_SESSION['username'] = $data['username']; //ambil nilai dari kolom username simpan di session username
            $_SESSION['nama'] = $data['nama']; //ambil nilai dari kolom nama simpan di session nama
            $_SESSION['status'] = $data['status']; //ambil nilai dari kolom status simpan di session status
            $_SESSION['jenis_kelamin'] = $data['jenis_kelamin']; //ambil nilai dari kolom jenis_kelamin simpan di session jenis_kelamin
            echo "<script> alert('Login Berhasil! Selamat datang di Tahsin Al-Karomah')</script>";
            echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
        }
    } else { //jika username dan password tidak terdaftar
        echo "<script> alert('Nama Pengguna dan Kata Sandi tidak terdaftar di sistem!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
    }
}
