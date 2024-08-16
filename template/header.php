<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px;">
                            <i class="ti ti-user-circle" style="font-size: 24px;"></i> &nbsp; <?php echo $_SESSION['nama']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="?page=pengguna_edit&id_user=<?php echo $_SESSION['id_user']; ?>" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">Profil Saya</p>
                                </a>
                                <a href="?page=password_edit&id_user=<?php echo $_SESSION['id_user']; ?>" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">Ganti Password</p>
                                </a>
                                <!-- <a href="?page=anggota_edit" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-address-book fs-6"></i>
                                    <p class="mb-0 fs-3">Informasi Pribadi</p>
                                </a> -->
                                <a href="login/logout.php" onclick="return confirm('Anda yakin ingin logout?')" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>