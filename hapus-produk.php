<?php
    include('db.php');

    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM product WHERE id_product = '".$_GET['id']."'");
        echo '<script>window.location="data-produk.php"</script>';
    }
?>