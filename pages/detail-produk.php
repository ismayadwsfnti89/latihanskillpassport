<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <h1>Toko Online</h1>
        </div>
    </div>

    <div class="menu">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="detail-product">
                    <?php
                    include "../koneksi.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM produk WHERE id = $id";
                    $query = mysqli_query($koneksi, $sql);
                    $data = mysqli_fetch_array($query);
                    ?>
                    <img class="img-product" src="../products/<?= $data['gambar'] ?>" alt="">
                    <div class="deskripsi">
                        <h1><?= $data['nama'] ?></h1>
                        <h3>Stok: <?= $data['jumlah'] ?></h3>
                        <h3>Harga Rp. <?= $data['harga'] ?></h3>
                        <br>
                        <br>
                        <p>
                            <?= $data['deskripsi'] ?>
                        </p>

                        <br>
                        <button>Tambah ke keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>&copy; 2024 Toko Online</p>
        </div>
    </div>
</body>

</html>