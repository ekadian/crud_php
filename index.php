 <html>
<head>
  <title>
  </title>
</head>
<body>

  <?php
  include "koneksi.php";

  $query = "SELECT *FROM mahasiswa";
  $result = mysqli_query($konek, $query);

   ?>

  <h1>Tabel Mahasiswa</h1>
  <a href="tambah.php"><button type="submit">Tambah</button></a>

  <table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Foto</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;

      while($rows = mysqli_fetch_array($result)) :
      ?>
      <tr>
        <td><?= $i++;?></td>
        <td><?= $rows['nama'];?></td>
        <td><?= $rows['nim'];?></td>
        <td><img src="img/<?= $rows['gambar'];?>" width="100px"></td>
        <td>
          <a href="edit.php?edit=<?= $rows['id'];?>">Edit ||</a>
          <a href="proses.php?hapus=<?= $rows['id']; ?>">Hapus ||</a]>
        </td>
      </tr>
    <?php endwhile;?>
    </tbody>
  </table>


</body>
</html>
