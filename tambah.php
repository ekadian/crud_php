<?php

 ?>

<!DOCTYPE html>
<html>
<body>
  <h1>Tambah Data Mahasiswa</h1>
  <form method="post" action="proses.php" enctype="multipart/form-data">
    Nama : <input type="text" name="nama">
    NIM : <input type="text" name="nim">
    <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar" >

    <button type="submit" name="submit">Tambah</button>
  </form>

</body>
</html>
