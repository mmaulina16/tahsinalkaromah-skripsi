<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
    $nama_pengajar = mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    $nama_anggota = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
    $npm = $_POST['npm'];
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jadwal_tahsin = $_POST['jadwal_tahsin'];
    $batas_tahsin = mysqli_real_escape_string($koneksi, $_POST['batas_tahsin']);
    $kemajuan = mysqli_real_escape_string($koneksi, $_POST['kemajuan']);
    $perbaikan_bacaan = mysqli_real_escape_string($koneksi, $_POST['perbaikan_bacaan']);
    $username = $_SESSION['username'];
    $created_at = $_POST['created_at'];

    // Pisahkan ID dan nama dari nilai yang dikirim
    list($id_pengajar, $nama_pengajar) = explode("-", $_POST['nama_pengajar'], 2);
    list($id_anggota, $nama_anggota) = explode("-", $_POST['nama_anggota'], 2);
    list($nama_anggota, $npm) = explode("-", $_POST['npm'], 2);

    // Trim whitespace jika ada
    $nama_pengajar = trim($nama_pengajar);
    $nama_anggota = trim($nama_anggota);
    $npm = trim($npm);

    // Simpan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO halaqoh_tahsin (nama_pengajar, nama_anggota, npm, kelas, jadwal_tahsin, batas_tahsin, kemajuan, perbaikan_bacaan, creator, created_at) VALUES ('$nama_pengajar', '$nama_anggota', '$npm', '$kelas', '$jadwal_tahsin', '$batas_tahsin', '$kemajuan', '$perbaikan_bacaan', '$username', NOW())");
    if ($query) { // jika query tambah data berhasil
        echo "<script>alert('Data halaqoh tahsin berhasil ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    } else {
        echo "<script>alert('Data halaqoh tahsin gagal ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=tahsin_read'>";
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Halaqoh Tahsin</h5>
            <a href="?page=tahsin_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="inputPengajar" class="form-label">Pengajar</label>
                    <select name="nama_pengajar" id="inputPengajar" class="form-control" required>
                        <option value=''>Pilih Pengajar</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE status_ajuan = 'Diverifikasi' ORDER BY id_pengajar ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[id_pengajar]-$data[nama_pengajar]\">$data[id_pengajar] - $data[nama_pengajar]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputAnggota" class="form-label">Anggota</label>
                    <select name="nama_anggota" id="inputAnggota" class="form-control" required>
                        <option value=''>Pilih Anggota</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE status_ajuan = 'Diverifikasi' ORDER BY id_anggota ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[id_anggota]-$data[nama_anggota]\">$data[id_anggota] - $data[nama_anggota]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputNPM" class="form-label">NPM</label>
                    <select name="npm" id="inputNPM" class="form-control" required>
                        <option value=''>Pilih NPM</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE status_ajuan = 'Diverifikasi' ORDER BY nama_anggota ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[nama_anggota]-$data[npm]\">$data[nama_anggota] - $data[npm]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <select name="kelas" id="inputKelas" class="form-control" required>
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
                    <label for="inputJadwal" class="form-label">Jadwal Tahsin</label>
                    <select name="jadwal_tahsin" id="inputJadwal" class="form-control" required>
                        <option value=''>Pilih Jadwal Tahsin</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE MONTH(waktu) = MONTH(CURDATE()) AND YEAR(waktu) = YEAR(CURDATE()) ORDER BY id_jadwal ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=\"$data[waktu]\">$data[waktu]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputBTahsin" class="form-label">Batas Tahsin</label>
                    <input type="text" class="form-control" id="inputBTahsin" required placeholder="Contoh : Metode Ummi jilid 1 hal. 3" name="batas_tahsin">
                </div>
                <div class="mb-3">
                    <label for="inputKemajuan" class="form-label">Kemajuan</label>
                    <input type="text" class="form-control" id="inputKemajuan" required placeholder="Masukkan kemajuan bacaan anggota" name="kemajuan">
                </div>
                <div class="mb-3">
                    <label for="inputPBacaan" class="form-label">Perbaikan Bacaan</label>
                    <input type="text" class="form-control" id="inputPBacaan" required placeholder="Masukkan perbaikan bacaan anggota" name="perbaikan_bacaan">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>