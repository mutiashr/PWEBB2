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
        <h1>Kategori Produk</h1>
        <div class="box">
            <p><a href="tambah_kategori.php">Tambah Data</a></p>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Kategori</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                    while ($row = mysqli_fetch_array($kategori)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kategori_nama']; ?></td>
                        <td>
                            <a href="edit-kategori.php?id=<?php echo $row['kategori_id']; ?>">Edit</a> |
                            <a href="hapus.php?idk=<?php echo $row['kategori_id']; ?>" onclick="return confirm('Confirm Hapus Data?')">Hapus</a>
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
        <small>Copyright &copy; 2024 - Butikbellamadu.</small>
    </div>
</footer>
</body>
</html>
