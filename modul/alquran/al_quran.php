<!doctype html>
<html>

<head>
    <style>
        @font-face {
            font-family: "Uthmani";
            src: url('assets/font/UthmanicHafs1Ver09.otf') format('truetype');
        }

        .arabic {
            font-family: 'Uthmani', serif;
            font-size: 18px;
            font-weight: normal;
            direction: rtl;
            padding: 0 5px;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Al-Quran Digital</h1>
                <hr>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Surah</th>
                        <th>Arti</th>
                        <th>Jumlah Ayat</th>
                        <th>Tempat Turun</th>
                    </tr>
                    <?php
                    include "pengaturan/koneksi.php";
                    $tampil = mysqli_query($koneksi, "SELECT * FROM daftarsurah");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                        <tr>
                            <td><?= $data['index'] ?></td>
                            <td>
                                <a href="?page=detail&surah=<?= $data['index'] ?>&nama_surah=<?= urlencode($data['surah_indonesia']) ?>">
                                    <?= $data['surah_indonesia'] ?>
                                </a>
                                <span class="arabic">(<?= $data['surah_arab'] ?>)</span>
                            </td>
                            <td><?= $data['arti'] ?></td>
                            <td><?= $data['jumlah_ayat'] ?></td>
                            <td><?= $data['tempat_turun'] ?></td>
                        </tr>

                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>