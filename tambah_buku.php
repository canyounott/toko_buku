<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $koneksi->prepare("INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, harga, stok) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdi", $judul, $penulis, $penerbit, $tahun_terbit, $harga, $stok);

    if ($stmt->execute()) {
        echo "<p style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;'>Data berhasil ditambahkan.</p>";
    } else {
        echo "<p style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;'>Gagal menambahkan data: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #ffd1dc; /* Latar belakang pink */
        }
        form {
            max-width: 500px;
            margin: auto;
            background-color: #f8e7fc; /* Ungu muda */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="number"] {
            background-color: #ffe4f0; /* Pink muda */
        }
        input[type="submit"] {
            background-color: #7ea0ff; /* Biru muda */
            color: white;
            border: none;
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

    <h1>Tambah Buku</h1>
    <form method="post" action="">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" required>
        
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis">
        
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit">
        
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" min="1900" max="2099">
        
        <label for="harga">Harga:</label>
        <input type="number" step="0.01" name="harga" id="harga">
        
        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok">
        
        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
