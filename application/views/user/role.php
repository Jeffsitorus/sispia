<?php $this->load->view('templates/head.php'); ?>
<?php $this->load->view('templates/nav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
  <?php $this->load->view('templates/topbar.php'); ?>
  <?php $this->load->view('templates/header.php'); ?>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-8">
        <button type="button" class="btn btn-outline-white mb-3 btn-lg" data-toggle="modal" data-target="#tambahRole">
          Tambah Role
        </button>
        <div class="card">
          <div class="card-body">
            <?php if (!empty($this->session->flashdata('success'))) : ?>
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
                    <th scope="col">Nama Role</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($roles as $key => $role) : ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $role['nama_role']; ?></td>
                      <td width="10%">
                        <!-- <a href="#" class="btn btn-primary btn-sm" data-target="#edit<?= $role['id']; ?>" data-toggle="modal"><i class="fas fa-edit"></i></a> -->
                        <a href="#" class="btn btn-danger btn-sm" data-target="#hapus<?= $role['id']; ?>" data-toggle="modal"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/tambahRole'); ?>" method="post">
          <label for="nama_role">Nama Role</label>
          <input type="text" name="nama_role" id="nama_role" class="form-control" placeholder="Nama role" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach($roles as $role) : ?>
<div class="modal fade" id="hapus<?= $role['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin ingin menghapusnya?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Role <?= $role['nama_role']; ?></h2>
        <form action="<?= site_url('admin/hapusRole'); ?>" method="post">
          <input type="hidden" name="id" value="<?= $role['id']; ?>">
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