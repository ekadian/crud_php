<body>
  <h1>Tambah Data Mahasiswa</h1>
  <?php
  include "koneksi.php";

  $id = $_GET['edit'];

  $query = "SELECT *FROM mahasiswa WHERE id='$id'";
  $result = mysqli_query($konek, $query);
  $row = mysqli_fetch_array($result);
   ?>
  <form method="post" action="proses.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    Nama : <input type="text" name="nama" value="<?= $row['nama']; ?>">
    NIM : <input type="text" name="nim" value="<?= $row['nim']; ?>">
    <label for="gambar">Gambar :</label>
    <img src="img/<?= $row['gambar'];?>" width="100px">
        <input type="file" name="gambar" id="gambar" >
    <button type="submit" name="edit">Edit</button>
  </form>
</body>
