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
            font-size: 24px;
            font-weight: normal;
            direction: rtl;
            padding: 0 5px;
            margin: 0;
            line-height: 2;
        }

        .latin {
            font-family: serif;
            font-size: 14px;
            font-weight: normal;
            direction: ltr;
            padding: 0rem;
            margin: 0;
        }

        .arabic_number{
            font-size: 28px;
            font-weight: normal;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <?php
                include "pengaturan/koneksi.php";

                if (isset($_GET['surah']) || isset($_GET['nama_surah'])) {
                    $surah = $_GET['surah'];
                    $nama_surah = $_GET['nama_surah'];

                    echo '<a href="index.php?page=al_quran" class="btn btn-outline-success m-1">
                    <i class="ti ti-arrow-left"></i> Kembali
                    </a>'; 
                    echo '<h3 class="text-center">' . $nama_surah . '</h3>';
                    echo '<hr>';

                    $tampil = mysqli_query($koneksi, "SELECT
                                                        a.text as arabic,
                                                        b.text as indonesia
                                                    FROM
                                                        arabicquran a LEFT OUTER JOIN indonesianquran b
                                                    ON a.index=b.index
                                                    WHERE a.surah = $surah");
                    $ayat = 1;
                    while($data = mysqli_fetch_array($tampil)){
                        $str = $data['arabic'];
                        echo '<p class = "arabic">' . $str . format_arabic_number($ayat) . '</p>';
                        echo '<p class = "latin">'.'['.$ayat.']'.$data['indonesia'].'</p>';
                        echo '<hr>';
                        $ayat++;
                    } 
                }

                // fungsi untuk penomoran ayat arab
                function format_arabic_number($number){
                    $arabic_number = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
                    $jum_karakter = strlen($number);
                    $temp = "";

                    for ($i = 0; $i < $jum_karakter; $i++){
                        $char = substr($number, $i, 1);
                        $temp .= $arabic_number[$char];
                    }

                    return '<span class="arabic_number">' . $temp . '</span>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>