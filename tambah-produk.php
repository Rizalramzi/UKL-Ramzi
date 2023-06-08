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
    <title>Tambah Produk</title>
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
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="kategori" class="input-control" required>
                        <option value="">...Pilih...</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY id_category DESC");
                        while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                            <option value="<?php echo $r['id_category'] ?>">
                                <?php echo $r['name_category'] ?>
                            </option>
                            
                        <?php } ?>
                        <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                        <input type="number" name="harga" class="input-control" placeholder="Harga" required>
                        <input type="file" name="gambar" class="input-control" required >
                        <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                        <select class="input-control" name="status">
                            <option value="">...Pilih...</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <input type="submit" name="submit" value="Tambah">
                    </select>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];
                    $status = $_POST['status'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'produk' . time() . '.' . $type2;

                    $tipe_izin = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_izin)) {

                        echo 'Format File Tidak Diizinkan';
                    } else {
                        move_uploaded_file($tmp_name, './produk/' . $newname);
                    }

                    $insert = mysqli_query($conn, "INSERT INTO product VALUES (
                                            null,
                                            '" . $kategori . "',
                                            '" . $nama . "',
                                            '" . $harga . "',
                                            '" . $deskripsi . "',
                                            '" . $newname . "',
                                            '" . $status . "',
                                            null

                                            )");
                    if ($insert) {
                        echo 'Simpan data berhasil';
                        echo '<script>window.location="data-produk.php"</script>';
                    } else {
                        echo 'Gagal';
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