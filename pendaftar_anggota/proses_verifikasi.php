<?php
if(isset($_GET['id_anggota'])){
    $status_ajuan = $_GET['status_ajuan'];
    $id_anggota = $_GET['id_anggota'];
    $exe = mysqli_query($koneksi, "update anggota set status_ajuan='$status_ajuan' where id_anggota=$id_anggota");
    if($exe){
        echo "<script> alert('Proses verifikasi berhasil $status_ajuan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=anggota_read'>";
    } else {
        echo "<script> alert('Gagal verifikasi')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dfanggota_read'>";
    }
}
?>