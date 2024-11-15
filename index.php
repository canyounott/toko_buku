<?php
include 'koneksi.php';

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
            background: linear-gradient(135deg, #ff80b5, #a05cce, #80bfff); /* Latar belakang pink, ungu, dan biru muda */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Putih transparan untuk tabel */
            border-radius: 10px;
            overflow: hidden; /* Untuk border-radius */
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f1a7c0; /* Warna senada dengan latar belakang */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #ffeef8; /* Warna baris genap */
        }
        .button-container {
            margin-bottom: 20px;
        }
        .button-container a {
            background-color: #ff80b5; /* Warna senada pink */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px; /* Spasi antar tombol */
        }
        .button-container a:hover {
            background-color: #f15b91; /* Warna pink sedikit lebih gelap */
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    
    <div class="button-container">
        <a href="tambah_buku.php">Tambah Buku</a>
        <a href="form_pesanan.php">Beli Buku</a>
    </div>

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
            <td><?php echo $row['harga']; ?></td>
            <td><?php echo $row['stok']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
