<?php
include('db.php');
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Farmi</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="data-info.php">Data Informasi</a></li>
                <li><a href="data-seller.php">Data Penjual</a></li>
                <li><a href="login.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Data Penjual</h3>
            <div class="box">
                <p><a href="tambah-seller.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $seller = mysqli_query($conn, "SELECT * FROM seller ORDER BY id_seller DESC");
                        while ($row = mysqli_fetch_array($seller)) {
                            $product = mysqli_query($conn, "SELECT img_product FROM product WHERE id_product = '{$row['id_product']}'");
                            $productdata = mysqli_fetch_array($product);

                            ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row['nama_seller'] ?>
                                </td>
                                <td>
                                    <img src="produk/<?php echo $productdata['img_product']; ?>" width="100px" alt="Produk">
                                </td>
                                <td><?php echo $row['telp_seller'] ?> <br> <a href="https://api.whatsapp.com/send?phone=<?php echo $row['telp_seller'] ?>&text=Halo!" target="_blank" class="input-control">Chat</a></td>
                                <td>
                                    <?php echo $row['alamat_seller'] ?>
                                </td>
                                <td>
                                    <a href="edit-seller.php?id=<?php echo $row['id_seller'] ?>">Edit</a> || <a
                                        href="hapus-seller.php?id=<?php echo $row['id_seller'] ?>"
                                        onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Farmishop</small>

        </div>
    </footer>
</body>

</html>