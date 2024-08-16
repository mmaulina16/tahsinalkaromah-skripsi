<?php
if(isset($_GET['id_pengajar'])){
    $status_ajuan = $_GET['status_ajuan'];
    $id_pengajar = $_GET['id_pengajar'];
    $exe = mysqli_query($koneksi, "update pengajar set status_ajuan='$status_ajuan' where id_pengajar=$id_pengajar");
    if($exe){
        echo "<script> alert('Proses verifikasi ajuan berhasil $status_ajuan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengajar_read'>";
    } else {
        echo "<script> alert('Gagal verifikasi ajuan')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dfpengajar_read'>";
    }
}
?>