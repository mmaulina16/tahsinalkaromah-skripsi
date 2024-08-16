<?php
$id_jadwal = $_GET['id_jadwal']; //mengambil nilai id_jadwal di url, lalu disimpan di $id_jadwal
if (isset($_POST['btn_simpan'])) { //jika tombol simpan diklik
    // $nama_pengajar = $_POST['nama_pengajar'];
    // $nama_anggota = $_POST['nama_anggota'];
    $kelas_tahsin = mysqli_real_escape_string($koneksi, $_POST['kelas_tahsin']);
    $waktu = $_POST['waktu'];
    $tempat = mysqli_real_escape_string($koneksi, $_POST['tempat']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Simpan data yang telah diperbarui ke database
    $query = mysqli_query($koneksi, "UPDATE jadwal SET kelas_tahsin = '$kelas_tahsin', waktu = '$waktu', tempat = '$tempat', keterangan = '$keterangan' WHERE id_jadwal = '$id_jadwal'");

    if ($query) {
        echo "<script>alert('Jadwal berhasil diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=jadwal_read'>";
    } else {
        echo "<script>alert('Jadwal gagal diperbarui!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=jadwal_read'>";
    }
}
$query = mysqli_query($koneksi, "select * from jadwal where id_jadwal='$id_jadwal'");
$data = mysqli_fetch_array($query); // mengambil data dari jadwal lalu ditampung di $data
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Jadwal</h5>
            <a href="?page=jadwal_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <!-- source code didapat dari file ui-form.html baris 201-216 -->
            <form action="" method="post">
                <!-- method=post data yg diisi di form tidak akan keliatan di url-->
                <!-- method=get data yg diisi di form akan keliatan di form -->
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas Tahsin</label>
                    <select name="kelas_tahsin" id="inputKelas" class="form-control" required>
                        <option value=''>Pilih Kelas Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
                        while ($kelas = mysqli_fetch_array($query)) {
                            // Menambahkan selected jika nilai kelas_tahsin saat ini sesuai dengan nilai yang ada di database
                            $selected = ($kelas['nama_kelas'] == $data['kelas_tahsin']) ? 'selected' : '';
                            echo "<option value=\"$kelas[nama_kelas]\" $selected>$kelas[nama_kelas]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="datetime-local" class="form-control" id="inputWaktu" required name="waktu" value="<?= $data[4]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputTempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" id="inputTempat" required name="tempat" value="<?= $data[5]; ?>">
                </div>
                <div class="mb-3">
                    <label for="inputKeterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="inputKeterangan" required name="keterangan" value="<?= $data[6]; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>