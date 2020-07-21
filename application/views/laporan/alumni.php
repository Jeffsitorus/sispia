<?php $this->load->view('templates/head.php'); ?>
<?php $this->load->view('templates/nav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
  <?php $this->load->view('templates/topbar.php'); ?>
  <?php $this->load->view('templates/header.php'); ?>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <a href="<?= site_url('laporan/cetak_alumni') ?>" target="_blank" class="btn btn-danger mb-3"><i class="fas fa-print"></i> Cetak Pdf</a>
        <a href="<?= site_url('laporan/excel') ?>" class="btn btn-success mb-3"><i class="fas fa-file"></i> Export Excel</a>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="laporanAlumni">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama lengkap</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tempat, Tanggal Lahir</th>
                    <th scope="col">Tahun Angkatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($alumni as $key => $alm) : ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $alm['nis']; ?></td>
                      <td><?= $alm['nisn']; ?></td>
                      <td><?= $alm['nama_siswa']; ?></td>
                      <td><?= $alm['kelamin']; ?></td>
                      <td><?= $alm['tempat_lahir'].',' . $alm['tanggal_lahir']; ?></td>
                      <td><?= $alm['angkatan']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>
<?php $this->load->view('templates/js.php'); ?>