<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?= base_url('assets/img/upload/' . $user['foto']) ?>">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?= $user['nama']; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome! <?= $user['nama']; ?></h6>
                        </div>
                        <?php if($user['role_id'] == 1) : ?>
                            <a href="<?= site_url('admin/profil'); ?>" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profil Saya</span>
                            </a>
                            <a href="<?= site_url('admin/edit_profil'); ?>" class="dropdown-item">
                                <i class="fas fa-edit"></i>
                                <span>Edit Profil</span>
                            </a>
                            <a href="<?= site_url('admin/ubahpassword'); ?>" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Pengaturan</span>
                            </a>
                        <?php else: ?>
                            <a href="<?= site_url('staff/profil'); ?>" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profil Saya</span>
                            </a>
                            <a href="<?= site_url('staff/edit_profil'); ?>" class="dropdown-item">
                                <i class="fas fa-edit"></i>
                                <span>Edit Profil</span>
                            </a>
                            <a href="<?= site_url('staff/ubahpassword'); ?>" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Pengaturan</span>
                            </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" data-target="#logout" data-toggle="modal">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>