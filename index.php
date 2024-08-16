<?php
session_start();
include "pengaturan/koneksi.php"; // memanggil file koneksi

$page = isset($_GET['page']) ? $_GET['page'] : '';

// Rute yang bisa diakses tanpa login
$openRoutes = ['dfanggota_add', 'dfpengajar_add'];

if (!in_array($page, $openRoutes) && !isset($_SESSION['id_user'])) {
    include "home.php"; // jika belum login dan bukan halaman terbuka, tampilkan home.php
    exit();
}

include "template/sidebar.php"; // memanggil file sidebar
include "template/header.php"; // memanggil file header

switch($page){
    case "dashboard": include "template/dashboard.php"; break;

    // assets
    case "fpdf": include "assets/fpdf/fpdf.php"; break;

    // modul
    case "metode_ummi": include "modul/metodeummi/metode_ummi.php"; break;
    case "jilid1": include "modul/metodeummi/jilid1.php"; break;
    case "jilid2": include "modul/metodeummi/jilid2.php"; break;
    case "jilid3": include "modul/metodeummi/jilid3.php"; break;
    case "jilid4": include "modul/metodeummi/jilid4.php"; break;
    case "al_quran": include "modul/alquran/al_quran.php"; break;
    case "detail": include "modul/alquran/detail.php"; break;

    // pelafalan huruf hijaiyah
    case "huruf": include "pelafalan/huruf.php"; break;

    // jadwal halaqoh
    case "jadwal_read": include "jadwal/jadwal_read.php"; break;
    case "jadwal_add": include "jadwal/jadwal_add.php"; break;
    case "jadwal_edit": include "jadwal/jadwal_edit.php"; break;
    case "jadwal_delete": include "jadwal/jadwal_delete.php"; break;
    case "jadwal_report": include "jadwal/jadwal_report.php"; break;
    case "jadwal_print": include "jadwal/jadwal_print.php"; break;

    // daftar hadir pengajar
    case "dhpengajar_read": include "daftar_hadir/pengajar/dhpengajar_read.php"; break;
    case "dhpengajar_add": include "daftar_hadir/pengajar/dhpengajar_add.php"; break;
    case "dhpengajar_edit": include "daftar_hadir/pengajar/dhpengajar_edit.php"; break;
    case "dhpengajar_delete": include "daftar_hadir/pengajar/dhpengajar_delete.php"; break;
    case "dhpengajar_report": include "daftar_hadir/pengajar/dhpengajar_report.php"; break;
    case "dhpengajar_print": include "daftar_hadir/pengajar/dhpengajar_print.php"; break;

    // daftar hadir anggota
    case "dhanggota_read": include "daftar_hadir/anggota/dhanggota_read.php"; break;
    case "dhanggota_add": include "daftar_hadir/anggota/dhanggota_add.php"; break;
    case "dhanggota_edit": include "daftar_hadir/anggota/dhanggota_edit.php"; break;
    case "dhanggota_delete": include "daftar_hadir/anggota/dhanggota_delete.php"; break;
    case "dhanggota_report": include "daftar_hadir/anggota/dhanggota_report.php"; break;
    case "dhanggota_print": include "daftar_hadir/anggota/dhanggota_print.php"; break;

    // halaqoh tahsin
    case "tahsin_read": include "tahsin/tahsin_read.php"; break;
    case "tahsin_add": include "tahsin/tahsin_add.php"; break;
    case "tahsin_edit": include "tahsin/tahsin_edit.php"; break;
    case "tahsin_delete": include "tahsin/tahsin_delete.php"; break;
    case "tahsin_report": include "tahsin/tahsin_report.php"; break;
    case "tahsin_print": include "tahsin/tahsin_print.php"; break;

    // halaqoh tahfidz
    case "tahfidz_read": include "tahfidz/tahfidz_read.php"; break;
    case "tahfidz_add": include "tahfidz/tahfidz_add.php"; break;
    case "tahfidz_edit": include "tahfidz/tahfidz_edit.php"; break;
    case "tahfidz_delete": include "tahfidz/tahfidz_delete.php"; break;
    case "tahfidz_report": include "tahfidz/tahfidz_report.php"; break;
    case "tahfidz_print": include "tahfidz/tahfidz_print.php"; break;

    // pendaftaran anggota
    case "dfanggota_read": include "pendaftar_anggota/dfanggota_read.php"; break;
    case "dfanggota_add": include "pendaftar_anggota/dfanggota_add.php"; break;
    case "verifikasi_ajuan_anggota": include "pendaftar_anggota/proses_verifikasi.php"; break;
    case "dfanggota_report": include "pendaftar_anggota/dfanggota_report.php"; break;
    case "dfanggota_print": include "pendaftar_anggota/dfanggota_print.php"; break;

    // pendaftaran pengajar
    case "dfpengajar_read": include "pendaftar_pengajar/dfpengajar_read.php"; break;
    case "dfpengajar_add": include "pendaftar_pengajar/dfpengajar_add.php"; break;
    case "verifikasi_ajuan_pengajar": include "pendaftar_pengajar/proses_verifikasi.php"; break;
    case "dfpengajar_report": include "pendaftar_pengajar/dfpengajar_report.php"; break;
    case "dfpengajar_print": include "pendaftar_pengajar/dfpengajar_print.php"; break;

    // anggota
    case "anggota_read": include "anggota/anggota_read.php"; break;
    case "anggota_edit": include "anggota/anggota_edit.php"; break;
    case "anggota_delete": include "anggota/anggota_delete.php"; break;
    case "anggota_report": include "anggota/anggota_report.php"; break;
    case "anggota_print": include "anggota/anggota_print.php"; break;

    // pengajar
    case "pengajar_read": include "pengajar/pengajar_read.php"; break;
    case "pengajar_edit": include "pengajar/pengajar_edit.php"; break;
    case "pengajar_delete": include "pengajar/pengajar_delete.php"; break;

    // pengguna
    case "pengguna_read": include "pengguna/pengguna_read.php"; break;
    case "pengguna_add": include "pengguna/pengguna_add.php"; break;
    case "pengguna_edit": include "pengguna/pengguna_edit.php"; break;
    case "pengguna_delete": include "pengguna/pengguna_delete.php"; break;
    case "verifikasi_akun": include "pengguna/proses_verifikasi.php"; break;
    case "password_edit": include "pengguna/password_edit.php"; break;

    // umpan balik
    case "umpanbalik_read": include "umpan_balik/umpanbalik_read.php"; break;
    case "umpanbalik_add": include "umpan_balik/umpanbalik_add.php"; break;
    case "umpanbalik_edit": include "umpan_balik/umpanbalik_edit.php"; break;
    case "umpanbalik_delete": include "umpan_balik/umpanbalik_delete.php"; break;
    case "umpanbalik_report": include "umpan_balik/umpanbalik_report.php"; break;
    case "umpanbalik_print": include "umpan_balik/umpanbalik_print.php"; break;

    default: include "template/dashboard.php"; break; // tambahkan halaman default jika $page kosong atau tidak cocok
}
include "template/footer.php";
?>
