<?php
if(isset($_GET['id_pengajar'])){ //jika di url terdapat id_pengajar
    $id_pengajar = $_GET['id_pengajar']; //ambil nilai id_pengajar simpan di $id_pengajar
    $query = mysqli_query($koneksi, "delete from pengajar where id_pengajar='$id_pengajar'");
    if($query){
        echo "<script> alert('Data Pengajar berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengajar_read'>";
    } else {
        echo "<script> alert('Data Pengajar gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=pengajar_read'>";
        // localhost/simtawa-app/index.php?page=pengajar_read
    }
} 
?>