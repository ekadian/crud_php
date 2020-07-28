<?php
require "koneksi.php";


if (isset($_POST['submit'])) {
  // tambah
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

  $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$namaFileBaru')";

  $result = mysqli_query($konek, $query);

  if ($result) {
    header("location: index.php");
  }else {
    header("location: tambah.php");
  }

}else if (isset($_GET['hapus'])) {
  // Hapus
  $id = $_GET['hapus'];

  $query = "DELETE FROM mahasiswa WHERE id='$id'";
  $result = mysqli_query($konek, $query);

  if ($result) {
    header("location: index.php");
    echo "berhasil hapus";
  }else {
    header("location: index.php");
    echo "gagal hapus";
  }


}else{
  // Edit
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
  //var_dump($namaFileBaru);

  $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', gambar='$namaFileBaru' WHERE id='$id'";
  $result = mysqli_query($konek, $query);


  if ($result) {
    header("location: index.php");
  }else {
    header("location: edit.php");
  }
}
?>
