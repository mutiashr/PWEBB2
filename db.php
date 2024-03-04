<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'db_butik123';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die('Gagal terhubung ke database: ' . mysqli_connect_error());
}
?>
