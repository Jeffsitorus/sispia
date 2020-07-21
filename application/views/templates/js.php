<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url() ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

<script src="<?= base_url('assets/js/datatable/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/datatable/custom.dataTables.js'); ?>"></script>
<!-- Optional JS -->
<script src="<?= base_url() ?>/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url() ?>/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin ingin keluar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Silahkan klik ya untuk keluar dari sistem!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
        <a href="<?= site_url('auth/logout'); ?>" type="submit" class="btn btn-success">Ya!</a>
      </div>
    </div>
  </div>
</div>