<?php
include('db.php');
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
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
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="kategori" placeholder="Nama Kategori" class="input-control" autocomplete="off">
                    <input type="submit" name="submit" value="Tambah">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = $_POST['kategori'];
                        $insert = mysqli_query($conn, "INSERT INTO category Values(

                                                null,
                                                '".$nama."')");
                                                
                    if($insert){
                        echo '<script>alert("Berhasil!")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                        echo '<script>alert("Gagal Ditambahkan!")</script>';
                    }
                    }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Farmishop</small>

        </div>
    </footer>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>