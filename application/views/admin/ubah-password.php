<?php $this->load->view('templates/head.php'); ?>
<?php $this->load->view('templates/nav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
  <?php $this->load->view('templates/topbar.php'); ?>
  <?php $this->load->view('templates/header.php'); ?>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 col-md-12">
        <?php if (!empty($this->session->flashdata('error') || $this->session->flashdata('success'))) : ?>
          <div class="alert alert-message alert-<?php if ($this->session->flashdata('error')) {
                                                  echo "danger";
                                                } else if ($this->session->flashdata('success')) {
                                                  echo "success";
                                                } ?>">
            <?= $this->session->flashdata('error'); ?>
            <?= $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
        <div class="card card-stats">
          <div class="card-body">
            <?= form_open('admin/ubahpassword'); ?>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form_group">
                  <label for="password">Password Sekarang</label>
                  <input type="password" name="password" id="password" class="form-control">
                  <?= form_error('password', '<div class="text-danger small">', '</div>') ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form_group">
                  <label for="password_baru">Password Baru</label>
                  <input type="password" name="password1" id="password1" class="form-control" placeholder="Minimal 4 karakter">
                  <?= form_error('password1', '<div class="text-danger small">', '</div>') ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="form_group">
                  <label for="ulangi_password">Ulangi Password</label>
                  <input type="password" name="password2" id="password2" class="form-control">
                  <?= form_error('password2', '<div class="text-danger small">', '</div>') ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success mt-3"> Ubah password</button>
                </div>
              </div>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>

<?php $this->load->view('templates/js.php'); ?>