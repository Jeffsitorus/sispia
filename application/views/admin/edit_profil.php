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
        <a href="<?= site_url('admin/profil'); ?>" class="btn btn-outline-white mb-3 btn-lg"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        <?php if (!empty($this->session->flashdata('success'))) : ?>
          <div class="alert alert-success mb-2 alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?= $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-body">
            <form action="<?= site_url('admin/edit_profil'); ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-xl-6">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>">
                    <?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Masukkan username">
                    <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Masukkan email" readonly>
                  </div>
                </div>
                <div class="col-xl-6">
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
                    <label for="no_hp">No Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" value="<?= $user['no_hp'] ?>" class="form-control" placeholder="+62">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-3 order-lg-2">
                        <a href="javascript:void(0);">
                          <img src="<?= base_url('assets/img/upload/' . $user['foto']); ?>" class="rounded-circle" width="80">
                        </a>
                      </div>
                      <div class="col-lg-9 order-lg-2">
                        <label for="foto">Foto</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto" id="customFileLang" lang="id">
                          <label class="custom-file-label" for="customFileLang">Pilih file</label>
                        </div>
                        <span class="text-dark mt-2">Format file jpg|png|jpeg maksimal 1MB.</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Update</button>
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