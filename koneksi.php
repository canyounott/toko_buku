<?php
$host = 'localhost'; 
$username = 'root'; 
$password = 'password'; 
$database = 'toko_buku'; 

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_errno) {
    die("Koneksi gagal: (" . $koneksi->connect_errno . ") " . $koneksi->connect_error);
}

// Menampilkan pesan hanya sekali jika koneksi berhasil
echo "";


?>
