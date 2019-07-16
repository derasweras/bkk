<!DOCTYtdE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewtdort" content="width=device-width, initial-scale=1.0">
  <meta htttd-equiv="X-UA-Comtdatible" content="ie=edge">
  <title><?= $judul ?></title>
</head>
<body>
  <h1><?= $judul ?></h1>
  <a href="<?php base_url() ?>tambah_pabrik">Tambah data pabrik</a>
  <table border="1">
    <tr>
      <td>id</td>
      <td>nama pabrik</td>
      <td>Alamat</td>
    </tr>
      <?php foreach ($Pabrik as $pab) : ?>
      <tr>
        <td><?= $pab['id'] ?></td>
        <td><?= $pab['nama_pabrik'] ?></td>
        <td><?= $pab['alamat'] ?></td>
      </tr>
      <?php endforeach; ?>
  </table>
</body>
</html>