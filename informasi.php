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
            <h3>Informasi</h3>
            <div class="box">
                <?php
                    include("db.php");
                    $inf = mysqli_query($conn, "SELECT * FROM information ORDER BY id_information DESC");
                    if(mysqli_num_rows($inf) > 0){
                        while($i = mysqli_fetch_array($inf)){
                ?>
                <div class="col-4-info">
                    <img src="info-photo/<?php echo $i['gambar'] ?>" alt="" width="200px">
                    <p><?php echo $i['isi'] ?></p>
                </div>
            <?php }} ?>
            </div>
        </div>
    </div>

</body>
</html>