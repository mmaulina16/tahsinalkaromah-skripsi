<?php
include '../pengaturan/koneksi.php'; // panggil file koneksi.php

if (isset($_POST['btn_daftar'])) { // cek apakah tombol daftar telah diklik
    $nama = $_POST['nama']; // ambil nilai dari inputan nama simpan di $nama
    $username = $_POST['username']; // ambil nilai dari inputan username simpan di $username
    $email = $_POST['email']; // ambil nilai dari inputan email simpan di $email
    $password = md5($_POST['password']); // ambil nilai dari password, lalu enkripsi simpan di $password
    $jenis_kelamin = $_POST['jenis_kelamin']; // ambil nilai dari inputan jenis_kelamin simpan di $jenis_kelamin
    $status = $_POST['status']; // ambil nilai dari inputan status simpan di $status

    // cek apakah username sudah terdaftar
    $cek_username = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username'");
    if (mysqli_num_rows($cek_username) > 0) { // jika username sudah terdaftar di sistem
        echo "<script>alert('Username sudah terdaftar di sistem!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=register_view.php'>";
    } else { // jika username belum terdaftar di sistem, maka masukkan data pengguna
        $data = mysqli_query($koneksi, "INSERT INTO pengguna VALUES (null, '$nama', '$username', '$email', '$password', '$jenis_kelamin', '$status', 'Diajukan')"); // jalankan query tambah data ke tabel pengguna

        if ($data) { // jika query tambah data berhasil
            echo "<script>alert('Pendaftaran akun anda berhasil dilakukan, tunggu operator untuk menyetujui pendaftaran akun anda!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=login_view.php'>";
        } else { // jika query tambah data gagal
            echo "<script>alert('Pendaftaran akun anda gagal diproses. Silakan daftar ulang!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=register_view.php'>";
        }
    }
}
?>

