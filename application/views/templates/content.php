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
                <div class="card bg-default">
                    <div class="card-header bg-transparent">

                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/footer.php'); ?>
    </div>
</div>

<?php $this->load->view('templates/js.php'); ?>