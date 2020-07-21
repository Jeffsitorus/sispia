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
        <a href="<?= site_url('admin/tambahUser'); ?>" class="btn btn-outline-white mb-3 btn-lg"><i class="fas fa-plus-square"></i> Tambah User</a>
        <div class="card">
          <div class="card-body">
            <?php if(!empty($this->session->flashdata('success'))) : ?>
              <div class="alert alert-success mb-2 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?= $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $user) : ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $user['nama']; ?></td>
                      <td><?= $user['username']; ?></td>
                      <td><?= $user['email']; ?></td>
                      <td><?= $user['no_hp']; ?></td>
                      <td>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $user['nama']; ?>">
                          <img alt="Image placeholder" src="<?= base_url() ?>/assets/img/upload/default.jpg">
                        </a>
                      </td>
                      <td>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $user['id_user']; ?>"><i class="fas fa-trash"></i></a>
                      </td>
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

<?php foreach($users as $us) : ?>
<div class="modal fade" id="delete<?= $us['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin ingin menghapusnya?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <h2>Data <?= $us['nama']; ?></h2>
        <form action="<?= site_url('admin/hapusUser') ?>" method="post">
        <input type="hidden" name="id_user" value="<?= $us['id_user']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-warning">Ya, Hapus!</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach; ?>