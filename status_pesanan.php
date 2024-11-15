<?php
include 'koneksi.php'; // Pastikan koneksi sudah di-include

class status_pesanan {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function tampilkanStatusPesanan() {
        echo '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Status Pesanan</title>
            <style>
                body {
                    background-color: #f8c8dc; /* Baby pink */
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    color: #333;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                    background-color: #e6d9fc; /* Perpaduan ungu muda */
                    border-radius: 10px;
                    overflow: hidden;
                }
                th, td {
                    border: 1px solid #ccc;
                    padding: 10px;
                    text-align: left;
                }
                th {
                    background-color: #b399e8; /* Ungu lebih gelap */
                    color: #fff;
                }
                tr:nth-child(even) {
                    background-color: #e0f7fe; /* Biru muda */
                }
                .button-container {
                    text-align: right; /* Memindahkan tombol ke kanan */
                    margin-top: 20px; /* Jarak di atas tombol */
                }
                .button-container a {
                    background-color: #b399e8; /* Warna ungu */
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                    border: none;
                    cursor: pointer;
                }
                .button-container a:hover {
                    background-color: #967ac4; /* Ungu lebih gelap */
                }
            </style>
        </head>
        <body>
            <h2>Status Pesanan</h2>
        ';

        $query = $this->koneksi->query("SELECT p.id_pesanan, p.tanggal_pesanan, p.status, d.id_buku, d.jumlah, d.subtotal, b.judul 
                                         FROM pesanan p
                                         JOIN detail_pesanan d ON p.id_pesanan = d.id_pesanan
                                         JOIN buku b ON d.id_buku = b.id_buku");

        if ($query->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>";
            while ($row = $query->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_pesanan']}</td>
                        <td>{$row['tanggal_pesanan']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['judul']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>Rp " . number_format($row['subtotal'], 2, ',', '.') . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data pesanan yang ditemukan.</p>";
        }

        // Tambahkan button "OK" yang mengarah ke index.php
        echo '
        <div class="button-container">
            <a href="index.php">OK</a>
        </div>
        </body>
        </html>
        ';
    }
}
?>
