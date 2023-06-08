<?php
include('db.php');
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $data_produk = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id_produk'");
    $row = mysqli_fetch_assoc($data_produk);
} else {
    echo '<script>window.location="data-produk.php"</script>';
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    if ($_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
        $update_produk = mysqli_query($conn, "UPDATE product SET id_category='$kategori', name_product='$nama', price_product='$harga', desc_product='$deskripsi', status_product='$status' WHERE id_product='$id_produk'");
    } else {
        $nama_file = $_FILES['foto']['name'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $path = "produk/" . $nama_file;

        if (move_uploaded_file($tmp_file, $path)) {
            $update_produk = mysqli_query($conn, "UPDATE product SET id_category='$kategori', name_product='$nama', price_product='$harga', desc_product='$deskripsi', img_product='$nama_file', status_product='$status' WHERE id_product='$id_produk'");
        } else {
            echo '<script>alert("Upload foto gagal.");</script>';
        }
    }

    if ($update_produk) {
        echo '<script>alert("Data produk berhasil diupdate.");window.location="data-produk.php";</script>';
    } else {
        echo '<script>alert("Data produk gagal diupdate.");</script>';
    }
}

$data_kategori = mysqli_query($conn, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
            <h3>Edit Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" value="<?php echo $row['name_product']; ?>" required>
                    <select name="kategori" class="input-control" required>
                        <option value="">Pilih Kategori</option>
                        <?php while ($kategori = mysqli_fetch_assoc($data_kategori)) { ?>
                            <option value="<?php echo $kategori['id_category']; ?>" <?php if ($kategori['id_category'] == $row['id_category']) echo 'selected'; ?>><?php echo $kategori['name_category']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="harga" placeholder="Harga" class="input-control" value="<?php echo $row['price_product']; ?>" required>
                    <textarea name="deskripsi" placeholder="Deskripsi Produk" class="input-control" required><?php echo $row['desc_product']; ?></textarea>
                    <input type="file" name="foto" class="input-control">
                    <img src="produk/<?php echo $row['img_product']; ?>" width="100px">
                    <select name="status" class="input-control" required>
                        <option value="Aktif" <?php if ($row['status_product'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
                        <option value="Tidak Aktif" <?php if ($row['status_product'] == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
                    </select>
                    <input type="submit" name="update" value="Update Produk" class="btn">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2023 - Farmishop</p>
        </div>
    </footer>
</body>

</html>
