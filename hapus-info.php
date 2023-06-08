<?php
    include('db.php');

    if(isset($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM information WHERE id_information = '".$_GET['id']."'");
        echo '<script>window.location="data-info.php"</script>';
    }
?>