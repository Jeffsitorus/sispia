<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                SISPIA
                <!-- <img src="<?= base_url() ?>/assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <?php if($user['role_id'] == 1) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'admin' xor $this->uri->segment(2) == 'user' xor $this->uri->segment(2) == 'role') {
                                                    echo "active";
                                                } ?>" href="<?= site_url('admin') ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment(1) == 'admin' xor $this->uri->segment(2) == 'user' xor $this->uri->segment(2) == 'role') {
                                                echo "active";
                                            } ?>" href="<?= site_url('staff') ?>">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment(1) == 'akademik') {
                                                echo "active";
                                            } ?>" href="<?= site_url('akademik') ?>">
                            <i class="fas fa-graduation-cap text-orange"></i>
                            <span class="nav-link-text">Akademik</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment(1) == 'alumni') {
                                                echo "active";
                                            } ?>" href="<?= site_url('alumni'); ?>">
                            <i class="ni ni-circle-08 text-primary"></i>
                            <span class="nav-link-text">Alumni</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment(1) == 'kepsek') {
                                                echo "active";
                                            } ?>" href="<?= site_url('kepsek') ?>">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Kepala Sekolah</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'role') {
                                                    echo "active";
                                                } ?>" href="<?= site_url('admin/role'); ?>">
                                <i class="ni ni-key-25 text-info"></i>
                                <span class="nav-link-text">Role</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'user') {
                                                    echo "active";
                                                } ?>" href="<?= site_url('admin/user'); ?>">
                                <i class="fas fa-user-cog text-default"></i>
                                <span class="nav-link-text">User</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($this->uri->segment(1) == 'laporan') {
                                                echo "active";
                                            } ?>" href="<?= site_url('laporan/alumni') ?>">
                            <i class="fas fa-folder-open text-default"></i>
                            <span class="nav-link-text">Laporan Alumni</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#logout" href="#">
                            <i class="fas fa-power-off text-danger"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>