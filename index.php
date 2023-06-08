<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Farmi</a></h1>
            <ul>
                <li><a href="index.php">Shop</a></li>
                <li><a href="informasi.php">Information</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                include("db.php");
                    $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY id_category DESC");{
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                <a href="produk.php?id=<?php echo $k['id_category'] ?>">
                <div class="col-5">
                    <p><?php echo $k['name_category'] ?> </p>
                </div>
                </a>
            <?php }} ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Produk Baru</h3>
            <div class="box">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM product ORDER BY id_product DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="col-4">
                    <img src="produk/<?php echo $p['img_product'] ?>" alt="">
                    <p class="nama"><?php echo $p['name_product'] ?></p>
                    <p class="harga">Rp. <?php echo number_format($p['price_product'], 0, ',', '.')?></p>
                </div>
                
            <?php }} ?>
            </div>
        </div>
    </div>

</body>
</html>