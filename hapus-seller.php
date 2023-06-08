<?php
    include('db.php');

    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM seller WHERE id_seller = '".$_GET['id']."'");
        echo '<script>window.location="data-seller.php"</script>';
    }
?>