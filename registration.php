<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Sign Up</h2>
        <form method="post">
            <input type="text" name="Nama" placeholder="Nama" class="input-control">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="password" name="confirm_pass" placeholder="Konfirmasi password" class="input-control">
            <input type="submit" name="submit" value="Sign Up" class="lgn">
        </form>
        <?php
        if(isset($_POST['submit'])){
            session_start();
            include 'db.php'; // Menggunakan file db.php untuk koneksi database

            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $confirm_pass = $_POST['confirm_pass'];

            // Mengecek apakah username sudah terdaftar
            $cek_username = mysqli_query($conn, "SELECT * FROM karyawan WHERE Nama_Karyawan = '$user'");
            if(mysqli_num_rows($cek_username) > 0){
                echo '<script>alert("Username sudah terdaftar!")</script>';
            } else {
                // Memastikan password dan konfirmasi password sama
                if ($pass !== $confirm_pass) {
                    echo '<script>alert("Konfirmasi password tidak sesuai!")</script>';
                } else {
                    // Jika username belum terdaftar dan konfirmasi password sesuai, masukkan data ke dalam database
                    $insert_query = "INSERT INTO karyawan (Nama_Karyawan, Jabatan, Password) VALUES ('$user', 'role', '$pass')";
                    if(mysqli_query($conn, $insert_query)){
                        echo '<script>alert("Registrasi berhasil! Silakan login.")</script>';
                    } else {
                        echo '<script>alert("Registrasi gagal! Silakan coba lagi.")</script>';
                    }
                }
            }
        }
        ?>
    </div>
</body>
</html>
