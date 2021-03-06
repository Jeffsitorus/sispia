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
        <a href="<?= site_url('alumni'); ?>" class="btn btn-outline-white mb-3 btn-lg"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        <div class="card">
          <div class="card-body">
            <form action="<?= site_url('alumni/tambah') ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nis">NIS SISWA</label>
                    <input type="text" name="nis" id="nis" value="<?= set_value('nis'); ?>" class="form-control" placeholder="Masukkan NIS">
                    <?= form_error('nis', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nisn">NISN SISWA</label>
                    <input type="text" name="nisn" id="nisn" value="<?= set_value('nisn'); ?>" class="form-control" placeholder="Masukkan NISN">
                    <?= form_error('nisn', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>" class="form-control" placeholder="Masukkan nama">
                    <?= form_error('nama', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                      <option value="">-- PILIH --</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                      <option value="">-- PILIH --</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Khatolik">Khatolik</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Hindu">Hindu</option>
                    </select>
                    <?= form_error('agama', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" id="tempat_lahir" class="form-control" placeholder="Tempat lahir">
                        <?= form_error('tempat_lahir', '<div class="text-danger small">', ' </div>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" id="tanggal_lahir" class="form-control">
                        <?= form_error('tanggal_lahir', '<div class="text-danger small">', ' </div>'); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <?php if (!empty($this->session->flashdata('error_upload'))) :  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="tel" name="no_hp" value="<?= set_value('no_hp'); ?>" id="no_hp" class="form-control" placeholder="Misal : +62081281291">
                    <?= form_error('no_hp', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" class="form-control"><?= set_value('alamat') ?></textarea>
                    <?= form_error('alamat', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="kepsek">Masa Kepala Sekolah</label>
                    <select name="kepsek" id="kepsek" class="form-control">
                      <option value="">-- PILIH --</option>
                      <?php foreach ($kepsek as $kep) : ?>
                        <option value="<?= $kep['nip'] ?>"><?= $kep['nama_kepsek']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('kepsek', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" class="form-control" placeholder="Tahun angkatan">
                    <?= form_error('angkatan', '<div class="text-danger small">', ' </div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto" id="customFileLang" lang="id">
                      <label class="custom-file-label" for="customFileLang">Pilih file</label>
                    </div>
                    <span class="text-dark mt-2">Format file jpg|png|jpeg maksimal 1MB.</span>
                  </div>
                  <div class="text-right">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg"> Simpan</button>
                      <button type="reset" class="btn btn-danger btn-lg"><i class="fas fa-times-circle"></i> Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>

<?php $this->load->view('templates/js.php'); ?>