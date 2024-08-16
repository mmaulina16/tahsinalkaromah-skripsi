<?php
if(isset($_GET['id_dhanggota'])){ //jika di url terdapat id_dhanggota
    $id_dhanggota = $_GET['id_dhanggota']; //ambil nilai id_dhanggota simpan di $id_dhanggota
    $query = mysqli_query($koneksi, "delete from daftarhadir_anggota where id_dhanggota='$id_dhanggota'");
    if($query){
        echo "<script> alert('Data Anggota berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhanggota_read'>";
    } else {
        echo "<script> alert('Data Anggota gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhanggota_read'>";
        // localhost/simtawa-app/index.php?page=dhanggota_read
    }
} 
?>