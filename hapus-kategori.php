<?php
    include('db.php');

    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM category WHERE id_category = '".$_GET['id']."'");
        echo '<script>window.location="data-kategori.php"</script>';
    }
?>