
<div class="card-body">
<?php if(validation_errors()) :?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>    

  <form action="" method="post">
  <p>Id : <input type="text" name="id"></p>
  <p>tgl : <input type="text" name="tgl"></p>
  <p>pabrik :
    <select id="pabrik" name="pabrik">
      <?php foreach ($pabrik as $pab) : ?>
         <option value="<?= $pab["id"]?>"><?= $pab["nama_pabrik"]?></option>
      <?php endforeach ?>
     </select>
  </p>
  <p>Id_persyaratan : <input type="text" name="id_persyaratan"></p>
  <p>tinggi : <input type="text" name="tinggi"></p>
  <p>nilai_un_mtk : <input type="text" name="nilai_un_mtk"></p>
  <p>nilai_un : <input type="text" name="nilai_un"></p>
  <button type="submit">Simpan</button>

  </form>
