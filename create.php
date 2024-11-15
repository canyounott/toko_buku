<?php
include 'koneksi.php';

// Ambil daftar buku yang tersedia
$query = "SELECT * FROM buku";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .button-container a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['penulis']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['tahun_terbit']; ?></td>
            <td>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
            <td><?php echo $row['stok']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div class="button-container">
        <a href="pesan.php">Buat Pesanan</a>
    </div>
</body>
</html>
