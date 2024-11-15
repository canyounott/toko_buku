<?php
include 'koneksi.php';
include 'status_pesanan.php'; // Pastikan ini merujuk ke kelas yang benar

$status_pesananObj = new status_pesanan($koneksi);
$message = isset($_GET['message']) ? $_GET['message'] : '';

if ($message) {
    echo "<p style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;'>$message</p>";
}

// Tampilkan status pesanan
$status_pesananObj->tampilkanStatusPesanan();
?>
