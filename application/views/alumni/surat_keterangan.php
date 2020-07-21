<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Bersekolah</title>
  <style>
    body {
      padding-left: 30px;
      padding-right: 30px;
      font-family: 'Times New Roman', Times, serif;
      background-image: url('./logo.png');
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

    .judul h2,
    h6 {
      text-align: center;
    }

    .judul h6 {
      margin-top: -30px;
    }

    .content-siswa {
      margin-top: 30px;
    }
    .footer {
      padding-top: 120px;
      text-align: right;
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
  </div>
  <div class="judul">
    <h2>SURAT KETERANGAN BERSEKOLAH</h2>
    <hr style="width: 50%;">
    <h6>Nomor: 421/097/SMAN3CIKAMPEK/KCD.WIL.IV/2019</h6>
  </div>
  <div class="content">
    <p>Saya bertanda tangan dibawah ini:</p>
    <table width="100%">
      <tr>
        <td width="25%">Nama</td>
        <td width="5%">:</td>
        <td><?= $alumni['nama_kepsek']; ?></td>
      </tr>
      <tr>
        <td>NIP</td>
        <td width="5%">:</td>
        <td><?= $alumni['nip']; ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td width="5%">:</td>
        <td><?= $alumni['jabatan']; ?></td>
      </tr>
    </table>
  </div>
  <div class="content-siswa">
    <p>Dengan ini Menyatakan</p>
    <table width="100%">
      <tr>
        <td width="25%">Nama</td>
        <td width="5%">:</td>
        <td><?= $alumni['nama_siswa']; ?></td>
      </tr>
      <tr>
        <td width="25%">TTL</td>
        <td width="5%">:</td>
        <td><?= $alumni['tempat_lahir'] . ', ' . tgl_indo($alumni['tanggal_lahir']); ?></td>
      </tr>
      <tr>
        <td width="25%">Alamat</td>
        <td width="5%">:</td>
        <td><?= $alumni['alamat']; ?></td>
      </tr>
      <tr>
        <td width="25%">NIS</td>
        <td width="5%">:</td>
        <td><?= $alumni['nis']; ?></td>
      </tr>
      <tr>
        <td width="25%">NISN</td>
        <td width="5%">:</td>
        <td><?= $alumni['nisn']; ?></td>
      </tr>
    </table>
  </div>
  <br><br>
  <p>Bahwa siswa tersebut telah bersekolah di SMA Negeri 3 Cikampek demikian Surat Keterangan ini dibuat agar dapat di gunakan dengan sebaik-baik nya.</p>
  <div class="footer">
    <?php $date =  date('Y-m-d'); ?>
    <p>Karawang, <?= tgl_indo($date); ?></p>
    <p>Kepala SMA N 3 CIKAMPEK</p>
    <div class="footer-title">
      <p><?= $alumni['nama_kepsek']; ?></p>
      <p><?= $alumni['nip']; ?></p>
    </div>
  </div>
</body></html>