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
    <title>Edit Informasi</title>
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
            <h3>Edit Data Informasi</h3>
            <div class="box">
                <?php
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM information WHERE id_information = '$id'");
                $data = mysqli_fetch_assoc($query);
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id_information']; ?>">
                    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="input-control" placeholder="Nama">
                    <input type="file" name="foto" class="input-control" autocomplete="off">
                    <img src="info-photo/<?php echo $data['gambar']?>" alt="" width="200px">
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $data['isi']; ?></textarea>
                    <input type="submit" name="submit" value="Simpan">
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
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $desk = $_POST['deskripsi'];

    if ($_FILES['foto']['name'] !== '') {
        $filename = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        if (!in_array($file_extension, $allowed_extensions)) {
            echo 'Format File Tidak Diizinkan';
            exit;
        }

        $newname = 'gambar' . time() . '.' . $file_extension;
        $destination = './info-photo/' . $newname;

        if (!move_uploaded_file($tmp_name, $destination)) {
            echo 'Gagal memindahkan file';
            exit;
        }

        $update = mysqli_query($conn, "UPDATE information SET
            nama = '".$nama."',
            gambar = '".$newname."',
            isi = '".$desk."'
            WHERE id_information = '$id'");
    } else {
        $update = mysqli_query($conn, "UPDATE information SET
            nama = '".$nama."',
            isi = '".$desk."'
            WHERE id_information = '$id'");
    }

    if ($update) {
        echo '<script>alert("Berhasil!")</script>';
        echo '<script>window.location="data-info.php"</script>';
        exit;
    } else {
        echo '<script>alert("Gagal Disimpan!")</script>';
    }
}
?>
