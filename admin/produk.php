<?php
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
  <style>
    table tr th {
      background-color: green;

    }

    table tr td {
      background-color: silver;
    }
  </style>
</head>

<body>
  <form action="" method="get">
    <input type="search" name="cari" id="">
    <input type="submit" value="Cari">
  </form>
  <br>
  <a href="index.php?page=create-produk">
    <button>Tambah Data Produk</button>
  </a>
  <br>
  <br>
  <table border=1>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Deskripsi</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
    <?php
    include "../koneksi.php";
    if (isset($_GET['cari'])) {
      $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
      $sql = "SELECT*FROM produk WHERE Nama LIKE '%$cari%' OR kategori LIKE '%cari%'";
      // $ql = "SELECT*FROM produk WHERE nama='$cari' OR kategori='$cari"; 
    } else {
      $sql = "SELECT*FROM produk";
    }

    $query = mysqli_query($koneksi, $sql);
    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['kategori'] ?></td>
        <td><?= $data['deskripsi'] ?></td>
        <td><?= $data['jumlah'] ?></td>
        <td><?= $data['harga'] ?></td>
        <td>
          <?php
          if (file_exists('image/' . $data['gambar'])) {
          ?>
            <img src="<?= 'image/' . $data['gambar'] ?>" alt="" width="50" height="50">
          <?php
          }
          ?>
        </td>
        <td>
          <a href="delete-produk.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
          <a href="edit-produk.php?id=<?= $data['id'] ?>">Edit</a>
        </td>
      </tr>
    <?php
    }
    ?>

</body>

</html>