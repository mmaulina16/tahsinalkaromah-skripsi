<?php
if(isset($_GET['id_user'])){ //jika di url terdapat id_user
    $id_user = $_GET['id_user']; //ambil nilai id_user simpan di $id_user
    $query = mysqli_query($koneksi, "delete from pengguna where id_user='$id_user'");
    if($query){
        echo "<script> alert('Data Pengguna berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
    } else {
        echo "<script> alert('Data Pengguna gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengguna_read'>";
        // localhost/simtawa-app/index.php?page=pengguna_read
    }
} 
?>