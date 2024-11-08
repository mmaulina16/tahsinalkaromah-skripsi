<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tahsin Al-Karomah</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/tahsin&tahfidz-putih.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />

  <style>
    a {
      text-decoration: none;
      color: #2a3547;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="./dashboard.php" class="text-nowrap logo-img mx-auto">
            <img src="assets/images/logos/tahsin&tahfidz.png" width="120" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="?page=dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link sidebar-icon-hover" href="#collapseModul" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseModul">
                <span>
                  <i class="ti ti-books"></i>
                </span>
                <span class="hide-menu">Modul</span>
              </a>
              <div class="collapse ms-4" id="collapseModul">
                <a href="?page=metode_ummi" class="d-flex align-items-center py-3">
                  <i class="ti ti-book fs-6"></i>
                  <p class="mb-0 ms-1 fs-3">Tahsin Metode Ummi</p>
                </a>
                <a href="?page=al_quran" class="d-flex align-items-center py-3">
                  <i class="ti ti-book fs-6"></i>
                  <p class="mb-0 ms-1 fs-3">Al - Qur'an</p>
                </a>
              </div>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?page=huruf" aria-expanded="false">
                <span>
                  <i class="ti ti-volume"></i>
                </span>
                <span class="hide-menu">Pelafalan Huruf Hijaiyah</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="?page=jadwal_read" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar-time"></i>
                </span>
                <span class="hide-menu">Jadwal Tahsin & Tahfidz</span>
              </a>
            </li>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=dhanggota_read" aria-expanded="false">
                  <span>
                    <i class="ti ti-checkup-list"></i>
                  </span>
                  <span class="hide-menu">Daftar Hadir Anggota</span>
                </a>
              </li>
              <?php if ($_SESSION['status'] == 'Admin') { ?>
                <li class="sidebar-item">
                  <a class="sidebar-link" href="?page=dhpengajar_read" aria-expanded="false">
                    <span>
                      <i class="ti ti-checkup-list"></i>
                    </span>
                    <span class="hide-menu">Daftar Hadir Pengajar</span>
                  </a>
                </li>
              <?php } ?>
            <?php } ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#collapseHalaqoh" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseHalaqoh">
                <span>
                  <i class="ti ti-notes"></i>
                </span>
                <span class="hide-menu">Data Halaqoh</span>
              </a>
              <div class="collapse ms-4" id="collapseHalaqoh">
                <a href="?page=tahsin_read" class="d-flex align-items-center py-3">
                  <i class="ti ti-notes fs-6"></i>
                  <p class="mb-0 ms-1 fs-3">Data Halaqoh Tahsin</p>
                </a>
                <a href="?page=tahfidz_read" class="d-flex align-items-center py-3">
                  <i class="ti ti-notes fs-6"></i>
                  <p class="mb-0 ms-1 fs-3">Data Halaqoh Tahfidz</p>
                </a>
              </div>
            </li>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link sidebar-icon-hover" href="#collapsePendaftaran" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePendaftaran">
                  <span>
                    <i class="ti ti-user-plus"></i>
                  </span>
                  <span class="hide-menu">Pendaftaran</span>
                </a>
                <div class="collapse ms-4" id="collapsePendaftaran">
                  <a href="?page=dfanggota_read" class="d-flex align-items-center py-3">
                    <i class="ti ti-user-plus fs-6"></i>
                    <p class="mb-0 ms-1 fs-3">Pendaftaran Anggota</p>
                  </a>
                  <?php if ($_SESSION['status'] == 'Admin') { ?>
                    <a href="?page=dfpengajar_read" class="d-flex align-items-center py-3">
                      <i class="ti ti-user-plus fs-6"></i>
                      <p class="mb-0 ms-1 fs-3">Pendaftaran Pengajar</p>
                    </a>
                  <?php } ?>
                </div>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=anggota_read" aria-expanded="false">
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">Data Anggota</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['status'] == 'Admin') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=pengajar_read" aria-expanded="false">
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">Data Pengajar</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['status'] == 'Admin') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=pengguna_read" aria-expanded="false">
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                  <span class="hide-menu">Pengguna</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['status'] != 'Anggota') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=umpanbalik_read" aria-expanded="false">
                  <span>
                    <i class="ti ti-message"></i>
                  </span>
                  <span class="hide-menu">Umpan Balik</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['status'] == 'Anggota') { ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?page=umpanbalik_add" aria-expanded="false">
                  <span>
                    <i class="ti ti-message"></i>
                  </span>
                  <span class="hide-menu">Tambah Umpan Balik</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>