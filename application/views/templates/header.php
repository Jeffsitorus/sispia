<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <?php if($user['role_id'] == 1) : ?>
                                <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboards</a></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?= site_url('staff'); ?>">Dashboards</a></li>
                            <?php endif; ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>