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
          <h1 class="display-3 text-white">Hello <?= $alumni['nama_siswa']; ?></h1>
          <p class="text-white mt-0 mb-5">Sistem Informasi Pengarsipan Ijazah Dan Alumni Sekolah SMA NEGERI 3 CIKAMPEK</p>
          <a href="<?= site_url('alumni/edit/'.$alumni['nis']); ?>" class="btn btn-neutral">Edit profile</a>
          <a href="<?= site_url('alumni'); ?>" class="btn btn-neutral"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <img src="<?= base_url() ?>/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="<?= base_url('assets/img/alumni/'. $alumni['foto']); ?>" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info  mr-4 ">Alumni</a>
              <a href="#" class="btn btn-sm btn-default float-right">SMA</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="text-center">
              <h5 class="h3">
                <?= $alumni['nama_siswa']; ?>
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i><?= $alumni['alamat']; ?>
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Alumni - <?= date('Y'); ?>
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>SMA NEGERI 3 CIKAMPEK
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Info Detail <?= $alumni['nama_siswa'] ?> </h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-flush">
                      <tr>
                        <th>NIS</th>
                        <td><?= $alumni['nis']; ?></td>
                      </tr>
                      <tr>
                        <th>NISN</th>
                        <td><?= $alumni['nisn']; ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $alumni['kelamin']; ?></td>
                      </tr>
                      <tr>
                        <th>Agama</th>
                        <td><?= $alumni['agama']; ?></td>
                      </tr>
                      <tr>
                        <th>Tempat, Tanggal Lahir</th>
                        <td><?= $alumni['tempat_lahir'] .', '. tgl_indo($alumni['tanggal_lahir']); ?></td>
                      </tr>
                      <tr>
                        <th>No Telepon</th>
                        <td><?= $alumni['no_hp']; ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td><?= $alumni['alamat']; ?></td>
                      </tr>
                      <tr>
                        <th>Tahun Angkatan</th>
                        <td><?= $alumni['angkatan']; ?></td>
                      </tr>
                      <tr>
                        <th>Pimpinan Sekolah</th>
                        <td><?= $alumni['nama_kepsek']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>

<?php $this->load->view('templates/js.php'); ?>