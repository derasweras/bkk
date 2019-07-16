<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $judul ?></title>
</head>
<body>
  <h1>Lowongan Kerja</h1>
  <table>
    <tr>
      <td>nama pabrik</td>
      <td>tanggal</td>
    </tr>
    <tr>
      <?php foreach ($lowongan as $low) : ?>
        <p></p>
        <p><?= $low['nama_pabrik'] ?></p>
        <p><?= $low['tgl'] ?></p>

        <p>persyaratan</p>
        <p>Nilai UN : <?= $low['nilai_un'] ?></p>
        <p>Nilai UN MTK :<?= $low['nilai_un_mtk'] ?></p>
        <p>Tinggi : <?= $low['tinggi'] ?></p>
      <?php endforeach; ?>
    </tr>
  </table>
</body>
</html>