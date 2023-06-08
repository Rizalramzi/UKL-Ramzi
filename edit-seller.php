<?php
include('db.php');
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit();
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM seller WHERE id_seller = '$id'");
    $data = mysqli_fetch_assoc($query);
} else {
    echo '<script>window.location="data-seller.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penjual</title>
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
            <h3>Edit Data Penjual</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="produk" class="input-control" required>
                        <option value="">...Pilih...</option>
                        <?php
                        $prod = mysqli_query($conn, "SELECT * FROM product ORDER BY id_product DESC");
                        while ($r = mysqli_fetch_array($prod)) {
                            $selected = ($data['id_product'] == $r['id_product']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $r['id_product'] ?>" <?php echo $selected; ?>>
                                <?php echo $r['name_product'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Penjual" required value="<?php echo $data['nama_seller']; ?>">
                    <input type="number" name="notelp" class="input-control" placeholder="No. Telpon" required value="<?php echo $data['telp_seller']; ?>">
                    <textarea class="input-control" name="alamat" placeholder="Alamat"><?php echo $data['alamat_seller']; ?></textarea>
                    <input type="submit" name="submit" value="Update">
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $produk = $_POST['produk'];
                    $nama = $_POST['nama'];
                    $notelp = $_POST['notelp'];
                    $alamat = $_POST['alamat'];
                    $sql = "UPDATE seller SET id_product = '$produk', nama_seller = '$nama', telp_seller = '$notelp', alamat_seller = '$alamat' WHERE id_seller = '$id'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<script>alert("Berhasil Diupdate!")</script>';
                        echo '<script>window.location="data-seller.php"</script>';
                    } else {
                        echo "Terjadi kesalahan saat mengupdate data Penjual.";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
