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
        <a href="<?= site_url('kepsek'); ?>" class="btn btn-outline-white mb-3 btn-lg"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        <div class="card">
          <div class="card-body">
            <form action="<?= site_url('kepsek/tambah'); ?>" method="post">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan nip">
                    <?= form_error('nip', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama_kepsek">Nama</label>
                    <input type="text" name="nama_kepsek" id="nama_kepsek" class="form-control" placeholder="Masukkan nama">
                    <?= form_error('nama_kepsek', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                      <option value="">
                        <= PILIH=>
                      </option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label for="jabatan">jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
                    <?= form_error('jabatan', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="akademik_id">Tahun Akademik</label>
                    <select name="akademik_id" id="akademik_id" class="form-control">
                      <option value="">
                        <= PILIH=>
                      </option>
                      <?php foreach ($akademik as $akm) : ?>
                        <option value="<?= $akm['id_akm']; ?>"><?= $akm['tahun_ak']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('akademik_id', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan no hp">
                    <?= form_error('no_hp', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Batal</button>
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