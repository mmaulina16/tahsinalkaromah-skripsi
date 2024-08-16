<?php
if(isset($_GET['id_tahsin'])){ //jika di url terdapat id_tahsin
    $id_tahsin = $_GET['id_tahsin']; //ambil nilai id_tahsin simpan di $id_tahsin
    $query = mysqli_query($koneksi, "delete from halaqoh_tahsin where id_tahsin='$id_tahsin'");
    if($query){
        echo "<script> alert('Data Halaqoh Tahsin berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    } else {
        echo "<script> alert('Data Halaqoh Tahsin gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    }
} 
?>