<?php
// Load file koneksi.php
include "pengaturan/koneksi.php";

// Query SQL yang benar untuk memilih semua kolom yang diperlukan
$query = "SELECT id_anggota, npm, nama_anggota, jenis_kelamin, tanggal_lahir, no_telp, email, alamat, universitas, prodi, kelas_tahsin FROM anggota WHERE 1=1 AND status_ajuan='Diverifikasi'";

// Ambil nilai filter jika ada
$filter_jk = isset($_POST['filter_jk']) ? $_POST['filter_jk'] : '';
$filter_kls = isset($_POST['filter_kls']) ? $_POST['filter_kls'] : '';

if ($filter_jk != '') {
	$query .= " AND jenis_kelamin = '" . mysqli_real_escape_string($koneksi, $filter_jk) . "'";
}
if ($filter_kls != '') {
	$query .= " AND kelas_tahsin = '" . mysqli_real_escape_string($koneksi, $filter_kls) . "'";
}

$url_cetak = "anggota/anggota_print.php?filter_jk=" . urlencode($filter_jk) . "&filter_kls=" . urlencode($filter_kls);;
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Cetak Data Anggota</h5>

			<!-- FILTER -->
			<form method="POST">
				<div class="row">
					<!-- Filter Jenis Kelamin -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_jk" id="filter_jk" class="form-control">
								<option value="">Filter Jenis Kelamin</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>

					<!-- Filter Kelas -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_kls" id="filter_kls" class="form-control">
								<option value="">Filter Kelas Tahsin</option>
								<?php
								// Gunakan variabel lain untuk query dropdown kelas
								$kelas_query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas ASC");
								while ($data = mysqli_fetch_array($kelas_query)) {
									echo "<option value=\"$data[nama_kelas]\">$data[nama_kelas]</option>";
								}
								?>
							</select>
						</div>
					</div>

					<!-- Tombol Filter -->
					<div class="col-sm-6 col-md-4">
						<button type="submit" class="btn btn-primary">Filter</button>
					</div>
				</div>
			</form>

			<!-- Tombol Cetak PDF -->
			<a href="<?php echo $url_cetak; ?>" class="btn btn-success btn-sm mt-3" target="_blank">
				<i class="ti ti-download"></i> Cetak PDF
			</a>

			<hr />
			<div class="table-responsive">
				<table class="table table-hover table-bordered" style="min-width: 1800px;">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">NPM</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center" style="width: 125px;">Tanggal Lahir</th>
							<th class="text-center">No. Telepon</th>
							<th class="text-center">Email</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">Universitas</th>
							<th class="text-center">Jurusan</th>
							<th class="text-center">Kelas</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

						// Cek apakah query berhasil
						if ($sql) {
							$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
							if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
								while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
									echo "<tr>";
									echo "<td>" . $no++ . "</td>";
									echo "<td>" . $data['npm'] . "</td>";
									echo "<td>" . $data['nama_anggota'] . "</td>";
									echo "<td>" . $data['jenis_kelamin'] . "</td>";
									echo "<td>" . $data['tanggal_lahir'] . "</td>";
									echo "<td>" . $data['no_telp'] . "</td>";
									echo "<td>" . $data['email'] . "</td>";
									echo "<td>" . $data['alamat'] . "</td>";
									echo "<td>" . $data['universitas'] . "</td>";
									echo "<td>" . $data['prodi'] . "</td>";
									echo "<td>" . $data['kelas_tahsin'] . "</td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><td colspan='11'>Data tidak ada</td></tr>"; // Ubah 12 menjadi 11 karena ada 11 kolom
							}
						} else {
							echo "<tr><td colspan='11'>Query error: " . mysqli_error($koneksi) . "</td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		setDateRangePicker(".tgl_awal", ".tgl_akhir");
	});
</script>
</body>

</html>