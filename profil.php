<?php
session_start();
include 'db.php';
if ($_SESSION['s_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
$d = mysqli_fetch_object($query);
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
        <h1>Profil</h1>
        <div class="box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_lengkap;?>" required>
                <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username;?>" required>
                <input type="text" name="hp" placeholder="No Telepon" class="input-control" value="<?php echo $d->telepon;?>" required>
                <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email;?>" required>
                <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat;?>" required>
                <input type="submit" name="submit" value="Ubah Profil" class="lgn">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $nama    = ucwords($_POST['nama']);
                    $user    = $_POST['user'];
                    $hp      = $_POST['hp'];
                    $email   = $_POST['email'];
                    $alamat  = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET
                                nama_lengkap = '".$nama."',
                                username = '".$user."',
                                telepon = '".$hp."',
                                email = '".$email."',
                                alamat = '".$alamat."' 
                                WHERE id_admin = '".$d->id_admin."' ");
                    if($update){
                        echo '<script>alert("Data berhasil diubah")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'Gagal' .mysqli_error($conn);
                    }            
                }
            ?>
        </div>

            <h1>Ubah Password</h1>
            <div class="box">
        <form action="" method="POST">
            <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
            <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
            <input type="submit" name="ubah_password" value="Ubah Password" class="lgn">
        </form>
        <?php
            if(isset($_POST['submit'])){
                $pass1    = $_POST['pass1'];
                $pass2      = $_POST['pass2']; 

                if($pass2 != $pass1){
                    echo '<script>alert("Password Baru Tidak Sesuai")</script>';
                }else{
                    $u_pass = mysqli_query($conn, "UPDATE tb_admin SET password = '".$pass1."' 
                    WHERE id_admin = '".$d->id_admin."' ");
                if($u_pass){  
                    echo '<script>alert("Password berhasil diubah")</script>';
                    echo '<script>window.location="profil.php"</script>';
                } else {
                    echo 'Gagal' .mysqli_error($conn);
                }
            }  
        }
    ?>
    </div>
</div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Butikbellamadu.</small>
        </div>
    </footer>
</body>
</html>
