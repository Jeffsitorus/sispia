<?php $this->load->view('templates/head.php'); ?>
<?php $this->load->view('templates/nav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
  <?php $this->load->view('templates/topbar.php'); ?>
  <div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url(<?= base_url('assets/img/theme/profile-cover.jpg') ?>); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-9"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <h1 class="display-3 text-white">Hello <?= $user['nama']; ?></h1>
          <p class="text-white mt-0 mb-5">Sistem Informasi Pengarsipan Ijazah Dan Alumni Sekolah SMA NEGERI 3 CIKAMPEK</p>
          <a href="<?= site_url('staff'); ?>" class="btn btn-neutral"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
          <a href="<?= site_url('staff/edit_profil'); ?>" class="btn btn-neutral"><i class="fas fa-edit"></i> Edit Profil</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--8">
    <div class="row">
      <div class="col-xl-4 order-xl-2 offset-4">
        <div class="card card-profile">
          <img src="<?= base_url() ?>/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="javascript:void(0);">
                  <img src="<?= base_url('assets/img/upload/' . $user['foto']); ?>" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="javascript:void(0);" class="btn btn-sm btn-info  mr-4 "><?php if ($user['role_id'] == 2) {
                                                                                  echo "Staff";
                                                                                } ?></a>
              <a href="javascript:void(0);" class="btn btn-sm btn-default float-right">SISPIA</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="text-center">
              <h5 class="h3">
                <?= $user['nama']; ?>
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i><?= $user['no_hp']; ?>
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Akun sejak - <?= $user['created_at']; ?>
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>SMA NEGERI 3 CIKAMPEK
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>

<?php $this->load->view('templates/js.php'); ?>