<?php ob_start(); ?>

<html>

<head>
    <title>Cetak Daftar Hadir Pengajar</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/tahsin&tahfidz-putih.png" />
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 3px;
            word-wrap: break-word;
            font-size: 9px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        h2,
        h3 {
            margin-top: 5px;
            font-size: 14px;
        }

        hr {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <?php
    // Load file koneksi.php
    include "../../pengaturan/koneksi.php";

    // Ambil parameter GET dari URL
    $filter_nama = isset($_GET['filter_nama']) ? $_GET['filter_nama'] : '';
    $filter_bln = isset($_GET['filter_bln']) ? $_GET['filter_bln'] : '';    

    $query = "SELECT id_dhpengajar, nama_pengajar, tanggal, status_hadir FROM daftarhadir_pengajar WHERE 1=1";

    if ($filter_nama != '') {
        $query .= " AND nama_pengajar = '" . mysqli_real_escape_string($koneksi, $filter_nama) . "'";
    }

    if ($filter_bln != '') {
        $query .= " AND MONTH(tanggal) = '" . mysqli_real_escape_string($koneksi, $filter_bln) . "'";
    }
    ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <img src="../../assets/images/logos/uniska.png" align="left" height="80" width="80">
                <img src="../../assets/images/logos/kdk.png" align="right" height="80" width="80">

                <h2 style="text-align:center;">TAHSIN AL - KAROMAH</h2>
                <h2 style="text-align:center;">UNIT KEGIATAN MAHASISWA KAJIAN DAKWAH KAMPUS</h2>
                <h2 style="text-align:center;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

                <h3 style="text-align:center;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>

                <hr>
                <h3 style="text-align:center;">LAPORAN DAFTAR HADIR PENGAJAR</h3>
                <hr>

                <table class="table" align="center" border="1" style="text-align:center;">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengajar</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi, $query); // Eksekusi query dengan filter

                    if ($sql) {
                        $row = mysqli_num_rows($sql);
                        if ($row > 0) {
                            while ($data = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $data['nama_pengajar'] . "</td>";
                                echo "<td>" . $data['tanggal'] . "</td>";
                                echo "<td>" . $data['status_hadir'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Query error: " . mysqli_error($koneksi) . "</td></tr>";
                    }
                    ?>
                </table>

                <br /><br /><br />
                <table align="right" width="100%">
                    <tr>
                        <td width="40%"></td>
                        <td width="20%"></td>
                        <td align="center">Banjarmasin,
                            <?php
                            $bulanInggris = array(
                                'January' => 'Januari',
                                'February' => 'Februari',
                                'March' => 'Maret',
                                'April' => 'April',
                                'May' => 'Mei',
                                'June' => 'Juni',
                                'July' => 'Juli',
                                'August' => 'Agustus',
                                'September' => 'September',
                                'October' => 'Oktober',
                                'November' => 'November',
                                'December' => 'Desember'
                            );

                            $tanggal = date('d F Y');
                            $tanggalIndonesia = strtr($tanggal, $bulanInggris);
                            echo $tanggalIndonesia;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><br><br><br></td>
                        <td></td>
                        <td align="center">Ketua Umum<br><br><br></td>
                    </tr>
                    <tr>
                        <td align="center"></td>
                        <td></td>
                        <td align="center"><u>Alamudin Haqi</u> <br> NPM. 2010010564</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
<?php
ob_end_flush();
?>