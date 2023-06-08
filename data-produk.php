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
    <title>Data Produk</title>
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
            <h3>Data Produk</h3>
            <div class="box">
                <p><a href="tambah-produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM product ORDER BY id_product DESC");
                            if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                                $category = mysqli_query($conn, "SELECT name_category FROM category WHERE id_category = '{$row['id_category']}'");
                                $categoryname = mysqli_fetch_array($category);
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $categoryname['name_category']; ?></td>
                            <td><?php echo $row['name_product']?></td>
                            <td width="150px">Rp <?php echo number_format($row['price_product'], 0, ',', '.')?></td>
                            <td><?php echo $row['desc_product']?></td>
                            <td><img src="produk/<?php echo $row['img_product']?>" width="100px"></td>
                            <td><?php echo $row['status_product']?></td>
                            <td>
                            <a href="edit-produk.php?id=<?php echo $row['id_product'] ?>">Edit</a> || <a
                                        href="hapus-produk.php?id=<?php echo $row['id_product'] ?>"
                                        onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
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