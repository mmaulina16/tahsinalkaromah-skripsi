<?php
// Load file koneksi.php
include "pengaturan/koneksi.php";

// Query SQL yang benar untuk memilih semua kolom yang diperlukan
$query = "SELECT id_tahfidz, nama_pengajar, nama_anggota, npm, kelas, jadwal_tahfidz, batas_tahfidz, kemajuan, perbaikan FROM halaqoh_tahfidz WHERE 1=1";

// Ambil nilai filter jika ada
$filter_kls = isset($_POST['filter_kls']) ? $_POST['filter_kls'] : '';
$filter_bln = isset($_POST['filter_bln']) ? $_POST['filter_bln'] : '';

if ($filter_kls != '') {
	$query .= " AND kelas = '" . mysqli_real_escape_string($koneksi, $filter_kls) . "'";
}
if ($filter_bln != '') {
	$query .= " AND MONTH(jadwal_tahfidz) = '" . mysqli_real_escape_string($koneksi, $filter_bln) . "'";
}

$url_cetak = "tahfidz/tahfidz_print.php?&filter_kls=" . urlencode($filter_kls) . "&filter_bln=" . urlencode($filter_bln);
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Cetak Data Halaqoh Tahfidz</h5>

			<!-- FILTER -->
			<form method="POST">
				<div class="row">

					<!-- Filter Kelas -->
					<div class="col-sm-6 col-md-2">
						<div class="form-group">
							<select name="filter_kls" id="filter_kls" class="form-control">
								<option value="">Filter Kelas Tahfidz</option>
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

					<!-- Filter Bulan -->
					<div class="col-sm-6 col-md-2">
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
				<table class="table table-hover table-bordered" style="min-width: 1800px;">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Pengajar</th>
							<th class="text-center">Nama Anggota</th>
							<th class="text-center">NPM</th>
							<th class="text-center">Kelas</th>
							<th class="text-center">Jadwal Tahfidz</th>
							<th class="text-center">Batas Tahfidz</th>
							<th class="text-center">Kemajuan</th>
							<th class="text-center">Perbaikan Bacaan</th>
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
									echo "<td>" . $data['nama_pengajar'] . "</td>";
									echo "<td>" . $data['nama_anggota'] . "</td>";
									echo "<td>" . $data['npm'] . "</td>";
									echo "<td>" . $data['kelas'] . "</td>";
									echo "<td>" . $data['jadwal_tahfidz'] . "</td>";
									echo "<td>" . $data['batas_tahfidz'] . "</td>";
									echo "<td>" . $data['kemajuan'] . "</td>";
									echo "<td>" . $data['perbaikan'] . "</td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><td colspan='9'>Data tidak ada</td></tr>"; // Kolom
							}
						} else {
							echo "<tr><td colspan='9'>Query error: " . mysqli_error($koneksi) . "</td></tr>";
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