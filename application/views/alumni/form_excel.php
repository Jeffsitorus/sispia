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
              <div class="row">
                <div class="col-md-6 offset-3">
                  <form method="post" action="<?php echo base_url("alumni/import_excel"); ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="file" name="file" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="preview" class="btn btn-primary" value="Preview">
                  </div>
                  </form>
                </div>
              </div>
                <?php
                if (isset($_POST['preview'])) {
                  if (isset($upload_error)) {
                    echo "<div style='color: red;'>" . $upload_error . "</div>";
                    die;
                  }
                  echo "<form method='post' action='" . base_url("alumni/import") . "'>";
                  echo "<div style='color: red;' id='kosong'>
                    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                    </div>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-hover table-bordered'>
                    <thead>
                    <tr>
                      <th>NIS</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>No Telepon</th>
                      <th>Alamat</th>
                      <th>Angkatan</th>
                      <th>NIP Kepsek</th>
                    </tr>
                    </thead>
                    ";
                  $numrow = 1;
                  $kosong = 0;
                  foreach ($sheet as $row) {
                    $nis            = $row['A'];
                    $nisn           = $row['B'];
                    $nama_siswa     = $row['C'];
                    $jenis_kelamin  = $row['D'];
                    $agama          = $row['E'];
                    $tempat_lahir   = $row['F'];
                    $tanggal_lahir  = $row['G'];
                    $no_hp          = $row['H'];
                    $alamat         = $row['I'];
                    $angkatan       = $row['J'];
                    $kepsek_id      = $row['K'];
                    if ($nis == "" && $nisn == "" && $nama_siswa == "" && $jenis_kelamin == "" && $agama == "" && $tempat_lahir == "" && $tanggal_lahir == "" && $no_hp == "" && $alamat == "" && $angkatan == "" && $kepsek_id == "")
                      continue;
                    if ($numrow > 1) {
                      // Validasi apakah semua data telah diisi
                      $nis_td       = (!empty($nis)) ? "" : " style='background: #E07171;'";
                      $nisn_td      = (!empty($nisn)) ? "" : " style='background: #E07171;'";
                      $nama_td      = (!empty($nama_siswa)) ? "" : " style='background: #E07171;'";
                      $jk_td        = (!empty($jenis_kelamin)) ? "" : " style='background: #E07171;'";
                      $agama_td     = (!empty($agama)) ? "" : " style='background: #E07171;'";
                      $tmp_td       = (!empty($tempat_lahir)) ? "" : " style='background: #E07171;'";
                      $tgl_td       = (!empty($tanggal_lahir)) ? "" : " style='background: #E07171;'";
                      $no_td        = (!empty($no_hp)) ? "" : " style='background: #E07171;'";
                      $alamat_td    = (!empty($alamat)) ? "" : " style='background: #E07171;'";
                      $angkatan_td  = (!empty($angkatan)) ? "" : " style='background: #E07171;'";
                      $kepsek_td    = (!empty($kepsek_id)) ? "" : " style='background: #E07171;'";
                      if ($nis == "" && $nisn == "" && $nama_siswa == "" && $jenis_kelamin == "" && $agama == "" && $tempat_lahir == "" && $tanggal_lahir == "" && $no_hp == "" && $alamat == "" && $angkatan == "" && $kepsek_id == "") {
                        $kosong++;
                      }
                      echo "<tbody>";
                      echo "<tr>";
                      echo "<td" . $nis_td . ">" . $nis . "</td>";
                      echo "<td" . $nisn_td . ">" . $nisn . "</td>";
                      echo "<td" . $nama_td . ">" . $nama_siswa . "</td>";
                      echo "<td" . $jk_td . ">" . $jenis_kelamin . "</td>";
                      echo "<td" . $agama_td . ">" . $agama . "</td>";
                      echo "<td" . $tmp_td . ">" . $tempat_lahir . "</td>";
                      echo "<td" . $tgl_td . ">" . $tanggal_lahir . "</td>";
                      echo "<td" . $no_td . ">" . $no_hp . "</td>";
                      echo "<td" . $alamat_td . ">" . $alamat . "</td>";
                      echo "<td" . $angkatan_td . ">" . $angkatan . "</td>";
                      echo "<td" . $kepsek_td . ">" . $kepsek_id . "</td>";
                      echo "</tr>";
                      echo "</tbody>";
                    }
                    $numrow++;
                  }
                  echo "</table>";
                  echo "</div>";
                  if ($kosong > 0) { ?>
                    <script>
                      $(document).ready(function() {
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                        $("#kosong").show();
                      });
                    </script>
                <?php
                  } else {
                    echo "<hr>";
                    echo "<button type='submit' class='btn btn-primary' name='import'>Import</button>";
                    echo "<a href='" . base_url("alumni") . "' class='btn btn-danger'>Cancel</a>";
                  }
                  echo "</form>";
                }
                ?>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>

<?php $this->load->view('templates/js.php'); ?>
<script>
  $(document).ready(function() {
    $("#kosong").hide();
  });
</script>