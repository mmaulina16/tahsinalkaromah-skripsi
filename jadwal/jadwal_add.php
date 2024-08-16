<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
    // $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    // $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);
    $waktu = $_POST['waktu'];
    $tempat = mysqli_real_escape_string($koneksi, $_POST['tempat']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Pisahkan ID dan nama dari nilai yang dikirim
    // list($id_pengajar, $nama_pengajar) = explode("-", $nama_pengajar, 2);
    // list($id_anggota, $nama_anggota) = explode("-", $nama_anggota, 2);

    // // Trim whitespace jika ada
    // $nama_pengajar = trim($nama_pengajar);
    // $nama_anggota = trim($nama_anggota);


    $query = mysqli_query($koneksi, "INSERT INTO jadwal (kelas_tahsin, waktu, tempat, keterangan) VALUES ('$kelas_tahsin', '$waktu', '$tempat', '$keterangan')");
    if ($query) { //jika query tambah data berhasil
        echo "<script>alert('Jadwal berhasil ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=jadwal_read'>";
    } else {
        echo "<script>alert('Jadwal gagal ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='1;url=?page=jadwal_read'>";
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Jadwal</h5>
            <a href="?page=jadwal_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <select name="kelas_tahsin" id="inputKelas" class="form-control" required>
                        <option value=''>Pilih Kelas Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[nama_kelas]\">$data[nama_kelas]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="datetime-local" class="form-control" id="inputWaktu" required name="waktu">
                </div>
                <div class="mb-3">
                    <label for="inputTempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" id="inputTempat" required name="tempat">
                </div>
                <div class="mb-3">
                    <label for="inputKeterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="inputKeterangan" required name="keterangan">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>