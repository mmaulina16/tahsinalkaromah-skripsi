<?php
if(isset($_GET['id_user'])){
    $status_akun = $_GET['status_akun'];
    $id_user = $_GET['id_user'];
    $exe = mysqli_query($koneksi, "update pengguna set status_akun='$status_akun' where id_user=$id_user");
    if($exe){
        echo "<script> alert('Proses verifikasi akun berhasil $status_akun!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    } else {
        echo "<script> alert('Gagal verifikasi akun')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    }
}
?>