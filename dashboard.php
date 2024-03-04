<?php
session_start();
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
            <h1>Dashboard</h1>
            <div class="box">
                <h4>Selamat Datang Admin<?php echo $_SESSION['a_global']->admin_name ?> di Butik Bellamadu</h4>
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