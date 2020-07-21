<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Alumni SMA N 3 CIKAMPEK</title>
  <style>
    table,
    tr,
    th,
    td {
      border: 1px solid #333;
      padding: 10px;
    }

    table {
      margin: 20px auto;
      border-collapse: collapse;
    }

    .header {
      text-align: center;
    }

    h4 {
      margin-top: -10px;
      margin-bottom: 0;
    }

    h3 {
      margin-top: -50px;
      margin-bottom: 0;
    }

    .header p {
      margin-top: -5px;
      margin-bottom: 0px;
    }
  </style>
</head><body>
  <div class="header">
    <h4>PEMERINTAH PROVINSI JAWA BARAT</h4>
    <h4>DINAS PENDIDIKAN</h4>
    <h3>CABANG DINAS PENDIDIKAN WILAYAH IV</h3>
    <h3>SMA NEGERI 3 CIKAMPEK</h3>
    <hr>
    <p>Jl. Sumur Bandung Kaler No.165 Dawuan Timur Cikampek, 41373</p>
    <p>email: sman3cikampek@gmail.com</p>
    <p>Data Alumni</p>
  </div>
  <table>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>NISN</th>
      <th>Nama lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Agama</th>
      <th>Tahun Angkatan</th>
    </tr>
    <?php foreach ($alumni as $key => $alm) : ?>
      <tr>
        <td><?= $key + 1; ?></td>
        <td><?= $alm['nis']; ?></td>
        <td><?= $alm['nisn']; ?></td>
        <td><?= $alm['nama_siswa']; ?></td>
        <td><?= $alm['kelamin']; ?></td>
        <td><?= $alm['tempat_lahir'] . ',' . $alm['tanggal_lahir']; ?></td>
        <td><?= $alm['agama']; ?></td>
        <td><?= $alm['angkatan']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body></html>