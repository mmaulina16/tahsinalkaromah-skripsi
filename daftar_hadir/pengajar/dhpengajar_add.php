<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
    $nama_pengajar = $_POST['nama_pengajar'];
    $tanggal = $_POST['tanggal'];
    $status_hadir = $_POST['status_hadir'];
    $username = $_SESSION['username'];

    // Pisahkan ID dan nama dari nilai yang dikirim
    list($id_anggota, $nama) = explode("-", $nama_pengajar, 2);

    // Trim whitespace jika ada
    $nama = trim($nama);

    $query = "INSERT INTO daftarhadir_pengajar (nama_pengajar, tanggal, status_hadir, creator) VALUES ('$nama', '$tanggal', '$status_hadir', '$username')";

    if (mysqli_query($koneksi, $query)) { // jika query tambah data berhasil
        echo "<script>alert('Daftar hadir pengajar berhasil ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
    } else {
        echo "<script>alert('Daftar hadir pengajar gagal ditambahkan!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=dhpengajar_read'>";
        echo "Error: " . mysqli_error($koneksi); // Tampilkan pesan kesalahan
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Daftar Hadir Pengajar</h5>
            <a href="?page=dhpengajar_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="inputNamaPengajar" class="form-label">Nama Pengajar</label>
                    <select name="nama_pengajar" id="inputNamaPengajar" class="form-control" required>
                        <option value="">Pilih Nama Pengajar</option>
                        <?php
                        // Mengambil data dari database
                        $query = mysqli_query($koneksi, "SELECT * FROM pengajar WHERE status_ajuan = 'Diverifikasi' ORDER BY nama_pengajar ASC");

                        while ($data = mysqli_fetch_array($query)) {
                            // Gabungkan ID dan nama untuk membuat nilai yang unik
                            $value = htmlspecialchars($data['id_pengajar']) . "-" . htmlspecialchars($data['nama_pengajar']);
                            echo "<option value=\"$value\">" . htmlspecialchars($data['id_pengajar']) . " - " . htmlspecialchars($data['nama_pengajar']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="form-label">Tanggal Hadir</label>
                    <select name="tanggal" id="inputTanggal" class="form-control" required>
                        <option value=''>Pilih Tanggal</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY id_jadwal ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $tanggal = date("Y-m-d", strtotime($data['waktu'])); // Format tanggal menjadi Y-m-d
                            echo "<option value=\"$tanggal\">$tanggal</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputStatus" class="form-label">Status</label>
                    <select class="form-control" id="inputStatus" name="status_hadir" required>
                        <option value="" disabled selected>Pilih Status Kehadiran</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>