<?php
if (isset($_GET['id_jadwal'])) { //jika di url terdapat id_jadwal
    $id_jadwal = $_GET['id_jadwal']; //ambil nilai id_jadwal simpan di $id_jadwal
    $query = mysqli_query($koneksi, "delete from jadwal where id_jadwal='$id_jadwal'");
    if ($query) {
        echo "<script> alert('Data Halaqoh Jadwal berhasil dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=jadwal_read'>";
    } else {
        echo "<script> alert('Data Halaqoh Jadwal gagal dihapus!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=jadwal_read'>";
        // localhost/simtawa-app/index.php?page=jadwal_read
    }
}
