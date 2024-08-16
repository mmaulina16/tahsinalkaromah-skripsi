<?php
// Load file koneksi.php
include "pengaturan/koneksi.php";

// Query SQL yang benar untuk memilih semua kolom yang diperlukan
$query = "SELECT id_umpanbalik, kelas, rating, alasan_rating, saran FROM umpan_balik WHERE 1=1";

// Ambil nilai filter jika ada
$filter_kls = isset($_POST['filter_kls']) ? $_POST['filter_kls'] : '';
$filter_rate = isset($_POST['filter_rate']) ? $_POST['filter_rate'] : '';

if ($filter_kls != '') {
	$query .= " AND kelas = '" . mysqli_real_escape_string($koneksi, $filter_kls) . "'";
}
if ($filter_rate != '') {
	$query .= " AND rating = '" . mysqli_real_escape_string($koneksi, $filter_rate) . "'";
}

$url_cetak = "umpan_balik/umpanbalik_print.php?filter_kls=" . urlencode($filter_kls) . "&filter_rate=" . urlencode($filter_rate);;
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Cetak Umpan Balik</h5>

			<!-- FILTER -->
			<form method="POST">
				<div class="row">
					<!-- Filter Kelas -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_kls" id="filter_kls" class="form-control">
								<option value="">Filter Kelas</option>
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

					<!-- Filter Rating -->
					<div class="col-sm-6 col-md-4">
						<div class="form-group">
							<select name="filter_rate" id="filter_rate" class="form-control">
								<option value="">Filter Rating</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
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
							<th class="text-center">No</th>
							<th class="text-center">Kelas</th>
							<th class="text-center">Rating</th>
							<th class="text-center">Alasan Rating</th>
							<th class="text-center">Saran</th>
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
									echo "<td>" . $data['kelas'] . "</td>";
									echo "<td>" . $data['rating'] . "</td>";
									echo "<td>" . $data['alasan_rating'] . "</td>";
									echo "<td>" . $data['saran'] . "</td>";
									echo "</tr>";
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