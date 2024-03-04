<?php
session_start();
include 'db.php';
if ($_SESSION['s_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butikbellamadu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body> 
    <header>
        <div class="container">
            <h1><a href="Butikbellamadu">Butik Bellamadu</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data_Kategori.php">Data Kategori</a></li>
                <li><a href="data_Produk.php">Data Produk</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- konten -->
    <div class="section">
        <div class="container">
            <h1>Tambah Data Kategori</h1>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="lgn">
                </form>
                <?php
                include 'db.php';
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        // Use prepared statement to prevent SQL injection
                        $stmt = $conn->prepare("INSERT INTO tb_kategori (kategori_nama) VALUES (?)");
                        $stmt->bind_param("s", $nama);
                        
                        if ($stmt->execute()) {
                            echo '<script>alert("Tambah Kategori Berhasil")</script>';
                            echo '<script>window.location="data_kategori.php"</script>';
                        } else {
                            echo 'Gagal' . $stmt->error;
                        }

                        $stmt->close();
                        $conn->close();
                    }
                ?>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Butikbellamadu.</small>
        </div>
    </footer>
</body>
</html>
