
<div class="card-body">
<?php if(validation_errors()) :?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>    

  <form action="" method="post">
  <p>Id : <input type="text" name="id"></p>
  <p>Nama : <input type="text" name="nama"></p>
  <p>alamat : <input type="text" name="alamat"></p>

  <button type="submit">Simpan</button>

  </form>
