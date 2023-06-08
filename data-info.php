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
    <title>Data Informasi</title>
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
            <h3>Data Informasi</h3>
            <div class="box">
                <p><a href="tambah-info.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Isi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM information ORDER BY id_information DESC");
                        while ($row = mysqli_fetch_array($kategori)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><img src="info-photo/<?php echo $row['gambar']?>" width="100px"></td>
                                <td>
                                    <?php echo $row['isi'] ?>
                                </td>
                                <td>
                                    <a href="edit-info.php?id=<?php echo $row['id_information'] ?>">Edit</a> || <a
                                        href="hapus-info.php?id=<?php echo $row['id_information'] ?>"
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