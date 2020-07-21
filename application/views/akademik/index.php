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
        <button type="button" class="btn btn-outline-white mb-3 btn-lg" data-toggle="modal" data-target="#tambahAkademik">
          Tambah Akademik
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
                    <th scope="col">Tahun Akademik</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($akademik as $key => $value) : ?>
                    <tr>
                      <td><?= $key + 1; ?></td>
                      <td><?= $value['tahun_ak']; ?></td>
                      <td><?= $value['status']; ?></td>
                      <td width="10%">
                        <a href="#" class="btn btn-primary btn-sm" data-target="#edit<?= $value['id_akm']; ?>" data-toggle="modal"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-target="#hapus<?= $value['id_akm']; ?>" data-toggle="modal"><i class="fas fa-trash"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="tambahAkademik" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Akademik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('akademik/tambah'); ?>" method="post">
          <div class="form-group">
            <label for="tahun_ak">Tahun Akademik</label>
            <select name="tahun_ak" id="tahun_ak" class="form-control" required>
              <option value="">-- Pilih Tahun --</option>
              <?php $date = date('Y'); ?>
              <?php for ($i = 2010; $i <= $date; $i++) { ?>
                <?php $a = $i + 1; ?>
                <option value="<?= $i . '-' .  $a ?>"><?= $i . '-' . $a ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
              <option value="">
                <= PILIH=>
              </option>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($akademik as $value) : ?>
  <!-- Modal -->
  <div class="modal fade" id="hapus<?= $value['id_akm']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anda yakin ingin menghapusnya?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h2>Data <?= $value['tahun_ak']; ?></h2>
          <form action="<?= site_url('akademik/hapus'); ?>" method="post">
            <input type="hidden" name="id_akm" value="<?= $value['id_akm']; ?>">
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

<?php foreach ($akademik as $value) : ?>
  <div class="modal fade" id="edit<?= $value['id_akm']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Akademik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('akademik/update'); ?>" method="post">
            <div class="form-group">
              <label for="tahun_ak">Tahun Akademik</label>
              <input type="hidden" name="id_akm" value="<?= $value['id_akm'] ?>">
              <select name="tahun_ak" id="tahun_ak" class="form-control" required>
                <option value="">-- Pilih Tahun --</option>
                <?php $date = date('Y'); ?>
                <?php for ($i = 2010; $i <= $date; $i++) { ?>
                  <?php $a = $i + 1; ?>
                  <option value="<?= $i . '-' .  $a ?>"<?php if($value['tahun_ak'] == $i .'-'. $a) { echo "selected"; } ?>><?= $i . '-' . $a ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control" required>
                <option value="">
                  <= PILIH=>
                </option>
                <option value="Aktif" <?php if ($value['status'] == 'Aktif') {
                                        echo "selected";
                                      } ?>>Aktif</option>
                <option value="Tidak Aktif" <?php if ($value['status'] == 'Tidak Aktif') {
                                              echo "selected";
                                            } ?>>Tidak Aktif</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>