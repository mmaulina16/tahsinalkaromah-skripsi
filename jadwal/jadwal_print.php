<?php ob_start(); ?>

<html>

<head>
    <title>Cetak Jadwal Tahsin dan Tahfidz</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/tahsin&tahfidz-putih.png" />
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
    include "../pengaturan/koneksi.php";

    // Ambil parameter GET dari URL
    $filter_kls = isset($_GET['filter_kls']) ? $_GET['filter_kls'] : '';
    $filter_bln = isset($_GET['filter_bln']) ? $_GET['filter_bln'] : '';

    // Query SQL untuk memilih semua kolom yang diperlukan dengan filter
    $query = "SELECT id_jadwal, kelas_tahsin, waktu, tempat, keterangan FROM jadwal WHERE 1=1";

    if ($filter_kls != '') {
        $query .= " AND kelas_tahsin = '" . mysqli_real_escape_string($koneksi, $filter_kls) . "'";
    }
    if ($filter_bln != '') {
        $query .= " AND MONTH(waktu) = '" . mysqli_real_escape_string($koneksi, $filter_bln) . "'";
    }
    ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <img src="../assets/images/logos/uniska.png" align="left" height="80" width="80">
                <img src="../assets/images/logos/kdk.png" align="right" height="80" width="80">

                <h2 style="text-align:center;">TAHSIN AL - KAROMAH</h2>
                <h2 style="text-align:center;">UNIT KEGIATAN MAHASISWA KAJIAN DAKWAH KAMPUS</h2>
                <h2 style="text-align:center;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI BANJARMASIN</h2>

                <h3 style="text-align:center;">Sekretariat: Kampus UNISKA Banjarmasin Jl. Adhyaksa No. 02 Kayu Tangi Banjarmasin 70123</h3>

                <hr>
                <h3 style="text-align:center;">LAPORAN JADWAL TAHSIN DAN TAHFIDZ</h3>
                <hr>

                <table class="table" align="center" border="1">
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th style="width: 150px;">Kelas</th>
                        <th style="width: 100px;">Waktu</th>
                        <th style="width: 200px;">Tempat</th>
                        <th style="width: 150px;">Keterangan</th>
                    </tr>
                    <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi, $query); // Eksekusi query dengan filter

                    if ($sql) {
                        $row = mysqli_num_rows($sql);
                        if ($row > 0) {
                            while ($data = mysqli_fetch_array($sql)) {
                                echo "<tr>";
                                echo "<td style=text-align:center;>" . $no++ . "</td>";
                                echo "<td>" . $data['kelas_tahsin'] . "</td>";
                                echo "<td style=text-align:center;>" . $data['waktu'] . "</td>";
                                echo "<td>" . $data['tempat'] . "</td>";
                                echo "<td>" . $data['keterangan'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Query error: " . mysqli_error($koneksi) . "</td></tr>";
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