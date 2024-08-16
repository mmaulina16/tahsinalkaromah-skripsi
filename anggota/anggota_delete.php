<?php
if(isset($_GET['id_anggota'])){ //jika di url terdapat id_anggota
    $id_anggota = $_GET['id_anggota']; //ambil nilai id_anggota simpan di $id_anggota
    $query = mysqli_query($koneksi, "delete from anggota where id_anggota='$id_anggota'");
    if($query){
        echo "<script> alert('Data Anggota berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=anggota_read'>";
    } else {
        echo "<script> alert('Data Anggota gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=anggota_read'>";
        // localhost/simtawa-app/index.php?page=anggota_read
    }
} 
?>