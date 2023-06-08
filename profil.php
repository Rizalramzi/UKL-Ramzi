<?php
include('db.php');
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"
                        value="<?php echo $d->nama_admin ?>" required autocomplete="off">
                    <input type="text" name="user" placeholder="Username" class="input-control"
                        value="<?php echo $d->username ?>" required autocomplete="off">
                    <input type="text" name="hp" placeholder="No Hp" class="input-control"
                        value="<?php echo $d->telp_admin ?>" required autocomplete="off">
                    <input type="email" name="email" placeholder="Email" class="input-control"
                        value="<?php echo $d->email_admin ?>" required autocomplete="off">
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                        value="<?php echo $d->admin_address ?>" required autocomplete="off">
                    <input type="submit" name="submit" value="Ubah">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = $_POST['nama'];
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $email = $_POST['email'];
                    $alamat = $_POST['alamat'];

                    $update = mysqli_query($conn, "UPDATE admin set
                                            nama_admin = '" . $nama . "',
                                            username = '" . $user . "',
                                            telp_admin = '" . $hp . "',
                                            email_admin = '" . $email . "',
                                            admin_address = '" . $alamat . "' 
                                            WHERE id_admin = '" . $d->id_admin . "'");
                    if ($update) {
                        echo '<script>alert("Profil Berhasil Diubah")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'Gagal Diubah';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="pass" placeholder="Password Baru" class="input-control" required
                        autocomplete="off">
                    <input type="text" name="passkonf" placeholder="Konfirmasi Password Baru" class="input-control"
                        required autocomplete="off">
                    <input type="submit" name="ubah" value="Ubah">
                </form>
                <?php
                if (isset($_POST['ubah'])) {

                    $pass = $_POST['pass'];
                    $passkonf = $_POST['passkonf'];

                    if ($pass != $passkonf) {
                        echo '<script>alert("Konfirmasi Password tidak sesuai")</script>';
                    } else {

                        $upass = mysqli_query($conn, "UPDATE admin set
                                        password = '" . $pass . "'
                                        WHERE id_admin = '" . $d->id_admin . "'");


                        if ($upass) {
                            echo '<script>alert("Password Berhasil Diubah")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'Gagal Diubah';
                        }
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