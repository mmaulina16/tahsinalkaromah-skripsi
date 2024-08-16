<?php
// Load file koneksi.php
include "pengaturan/koneksi.php";

// Query SQL yang benar untuk memilih semua kolom yang diperlukan
$query = "SELECT id_dhanggota, npm, nama_anggota, tanggal, status_hadir FROM daftarhadir_anggota WHERE 1=1";

// Ambil nilai filter jika ada
$filter_npm = isset($_POST['filter_npm']) ? $_POST['filter_npm'] : '';
$filter_bln = isset($_POST['filter_bln']) ? $_POST['filter_bln'] : '';

if ($filter_npm != '') {
	$query .= " AND npm = '" . mysqli_real_escape_string($koneksi, $filter_npm) . "'";
}
if ($filter_bln != '') {
	$query .= " AND MONTH(tanggal) = '" . mysqli_real_escape_string($koneksi, $filter_bln) . "'";
}

$url_cetak = "daftar_hadir/anggota/dhanggota_print.php?&filter_npm=" . urlencode($filter_npm) . "&filter_bln=" . urlencode($filter_bln);;
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Cetak Daftar Hadir Anggota</h5>

			<!-- FILTER -->
			<form method="POST">
				<div class="row">

					<!-- Filter NPM -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_npm" id="filter_npm" class="form-control">
								<option value="">Filter NPM Anggota</option>
								<?php
								// Query untuk mendapatkan NPM dan nama anggota
								$npm_query = mysqli_query($koneksi, "SELECT npm, nama_anggota FROM anggota WHERE status_ajuan='Diverifikasi' ORDER BY npm ASC");

								// Loop untuk menampilkan opsi dropdown
								while ($data = mysqli_fetch_array($npm_query)) {
									echo "<option value=\"" . htmlspecialchars($data['npm']) . "\">" . htmlspecialchars($data['npm']) . " - " . htmlspecialchars($data['nama_anggota']) . "</option>";
								}
								?>
							</select>
						</div>
					</div>


					<!-- Filter Bulan -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_bln" id="filter_bln" class="form-control">
								<option value="">Filter Bulan</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
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
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">NPM</th>
							<th class="text-center">Nama Anggota</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Status</th>
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
									echo "<td>" . $data['tanggal'] . "</td>";
									echo "<td>" . $data['status_hadir'] . "</td>";
								}
							} else {
								echo "<tr><td colspan='5'>Data tidak ada</td></tr>"; // kolom
							}
						} else {
							echo "<tr><td colspan='5'>Query error: " . mysqli_error($koneksi) . "</td></tr>";
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