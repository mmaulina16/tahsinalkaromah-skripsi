<?php
if(isset($_GET['id_dhpengajar'])){ //jika di url terdapat id_dhpengajar
    $id_dhpengajar = $_GET['id_dhpengajar']; //ambil nilai id_dhpengajar simpan di $id_dhpengajar
    $query = mysqli_query($koneksi, "delete from daftarhadir_pengajar where id_dhpengajar='$id_dhpengajar'");
    if($query){
        echo "<script> alert('Data pengajar berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
    } else {
        echo "<script> alert('Data pengajar gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
    }
} 
?>