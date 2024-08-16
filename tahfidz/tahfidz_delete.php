<?php
if(isset($_GET['id_tahfidz'])){ //jika di url terdapat id_tahfidz
    $id_tahfidz = $_GET['id_tahfidz']; //ambil nilai id_tahfidz simpan di $id_tahfidz
    $query = mysqli_query($koneksi, "delete from halaqoh_tahfidz where id_tahfidz='$id_tahfidz'");
    if($query){
        echo "<script> alert('Data Halaqoh tahfidz berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahfidz_read'>";
    } else {
        echo "<script> alert('Data Halaqoh tahfidz gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahfidz_read'>";
        // localhost/simtawa-app/index.php?page=tahfidz_read
    }
} 
?>