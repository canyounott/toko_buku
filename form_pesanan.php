<?php
include 'koneksi.php';
//include 'status_pesanan.php';
include 'pesanan.php';

$pesananObj = new pesanan($koneksi);
// Proses formulir pemesanan jika ada pengiriman data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];

    // Panggil metode untuk memproses pemesanan
    if (!$pesananObj->prosesPesanan($id_buku, $jumlah)) {
        echo "<p style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;'>Jumlah pesanan melebihi stok yang tersedia atau buku tidak ditemukan.</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #ffd1dc; /* Latar belakang pink */
        }
        form {
            background-color: #f8e7fc; /* Warna ungu muda */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #7ea0ff; /* Biru muda */
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #567edc; /* Biru sedikit lebih gelap */
        }
        .button-container {
            margin-bottom: 20px;
            text-align: center;
        }
        .button-container a {
            display: inline-block;
            background-color: #7ea0ff; /* Sama dengan submit */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .button-container a:hover {
            background-color: #567edc; /* Sama dengan hover submit */
        }
    </style>
</head>
<body>
    <div class="button-container">
        <a href="index.php">Kembali ke Daftar Buku</a>
    </div>

    <h1>Form Pemesanan Buku</h1>
    <form method="post">
        <label for="id_buku">Pilih Buku:</label>
        <select name="id_buku" id="id_buku" required>
            <?php
            $resultBuku = $koneksi->query("SELECT id_buku, judul, stok FROM buku");
            while ($row = $resultBuku->fetch_assoc()) {
                echo "<option value='{$row['id_buku']}'>{$row['judul']} (Stok: {$row['stok']})</option>";
            }
            ?>
        </select>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" min="1" required>
        <input type="hidden" name="id_pelanggan" value="1"> <!-- Gantilah dengan ID pelanggan yang relevan -->
        <input type="submit" value="Pesan Buku">
    </form>
</body>
</html>
