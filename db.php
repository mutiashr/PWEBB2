<?php
$host = "localhost"; // Ganti dengan nama host Anda
$user = "root"; // Ganti dengan nama pengguna database Anda
$pass = ""; // Ganti dengan kata sandi database Anda
$db   = "butik_bellamadu"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
