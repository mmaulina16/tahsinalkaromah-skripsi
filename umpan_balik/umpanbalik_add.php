<?php
if (isset($_POST['btn_simpan'])) { // jika tombol simpan diklik
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $rating = $_POST['rating'];
    $alasan_rating = mysqli_real_escape_string($koneksi, $_POST['alasan_rating']);
    $saran = mysqli_real_escape_string($koneksi, $_POST['saran']);
    $username = $_SESSION['username'];

    $query = mysqli_query($koneksi, "INSERT INTO umpan_balik (kelas, rating, alasan_rating, saran, responden) VALUES ('$kelas', '$rating', '$alasan_rating', '$saran', '$username')");
    if ($query) {
        echo "<script> alert('Umpan balik berhasil ditambahkan!')</script>";
        if ($_SESSION['status'] == 'Admin') {
            echo "<meta http-equiv='refresh' content='0;url=?page=umpanbalik_read'>";
        }
    } else {
        echo "<script> alert('Umpan balik gagal ditambahkan!')</script>";
        if ($_SESSION['status'] == 'Admin') {
            echo "<meta http-equiv='refresh' content='0;url=?page=umpanbalik_read'>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Umpan Balik</h5>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
                <a href="?page=umpanbalik_read" class="btn btn-success btn-sm"><i class="ti ti-arrow-left"></i>Kembali</a>
            <?php } ?>
            <hr>
            <form action="" method="post">
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
                    <label class="form-label">Rating</label>
                    <div>
                        <label class="me-3">
                            <input type="radio" name="rating" value="1"> 1
                        </label>
                        <label class="me-3">
                            <input type="radio" name="rating" value="2"> 2
                        </label>
                        <label class="me-3">
                            <input type="radio" name="rating" value="3"> 3
                        </label>
                        <label class="me-3">
                            <input type="radio" name="rating" value="4"> 4
                        </label>
                        <label class="me-3">
                            <input type="radio" name="rating" value="5"> 5
                        </label>
                    </div>
                    <small class="text-muted mt-2">Pilih rating seberapa puas anda dengan pengajaran tahsin ini</small>
                </div>

                <div class="mb-3">
                    <label for="inputAlasan" class="form-label">Alasan Rating</label>
                    <input type="text" class="form-control" id="inputAlasan" required placeholder="Masukkan alasan anda memilih rating di atas" name="alasan_rating">
                </div>
                <div class="mb-3">
                    <label for="inputSaran" class="form-label">Saran</label>
                    <input type="text" class="form-control" id="inputSaran" required placeholder="Masukkan saran agar tahsin ini lebih baik kedepannya" name="saran">
                </div>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>