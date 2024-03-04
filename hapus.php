<?php
    include 'db.php';

    if(isset($_GET['idk'])){
        $idk = mysqli_real_escape_string($conn, $_GET['idk']);
        $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategori_id = '$idk'");
        
        if($delete){
            echo '<script>window.location="data_kategori.php"</script>';
        } else {
            echo 'Error deleting category: ' . mysqli_error($conn);
        }
    }
?>
