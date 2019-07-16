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
  <a href="<?= base_url() ?>Lowongan/tambah_lowongan">Tambah Data Lowongan</a>
  <table border="1">
    <tr>
      <td>nama pabrik</td>
      <td>tanggal</td>
      <td>persyaratan</td>
    </tr>
      <?php foreach ($lowongan as $low) : ?>
      <tr>
        <td><?= $low['nama_pabrik'] ?></td>
        <td><?= $low['tgl'] ?></td>
        <td>
       <p> Nilai UN : <?= $low['nilai_un'] ?>
       <p> Nilai UN MTK :<?= $low['nilai_un_mtk'] ?></p>
       <p> Tinggi : <?= $low['tinggi'] ?></p></td>
      </tr>
      <?php endforeach; ?>
    </tr>
  </table>
  <?php 
     $syarat = "tinggi : 15, un : 70, mtk: 12";
     $s = explode(',', $syarat);
    // var_dump($s);echo '</br>';


     foreach ($s as $n) {
       echo $n.'</br>';
     }

     $dataGabung = implode(':',$s);
     var_dump($dataGabung);
     ?>
</body>
</html>