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
    <title>Tambah Informasi</title>
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
            <h3>Tambah Data Informasi</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="input-control" placeholder="Nama" required>
                    <input type="file" name="foto" class="input-control" autocomplete="off" required >
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <input type="submit" name="submit" value="Tambah">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>&copy; 2023 - Farmishop</small>
        </div>
    </footer>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>
<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $desk = $_POST['deskripsi'];
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

    if(!in_array($file_extension, $allowed_extensions)){
        echo 'Format File Tidak Diizinkan';
    } else {
        $newname = 'gambar' . time() . '.' . $file_extension;
        $destination = './info-photo/' . $newname;

        if(move_uploaded_file($tmp_name, $destination)){
            $insert = mysqli_query($conn, "INSERT INTO information (nama, gambar, isi) VALUES (
                '".$nama."',
                '".$newname."',
                '".$desk."')");

            if($insert){
                echo '<script>alert("Berhasil!")</script>';
                echo '<script>window.location="data-info.php"</script>';
                exit;
            } else {
                echo '<script>alert("Gagal Ditambahkan!")</script>';
            }
        } else {
            echo 'Gagal memindahkan file';
        }
    }
}
?>

