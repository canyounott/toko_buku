<?php
include 'koneksi.php';
//include 'statusPesanan.php';


class pesanan {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function prosesPesanan($id_buku, $jumlah) {
        if ($this->buatPesanan($id_buku, $jumlah)) {
            header("Location: statusPesanan.php?message=Pesanan%20berhasil%20dibuat");
            exit;
        } else {
            return false;
        }
    }

    private function buatPesanan($id_buku, $jumlah) {
        $queryBuku = $this->koneksi->query("SELECT harga, stok FROM buku WHERE id_buku = $id_buku");
        $buku = $queryBuku->fetch_assoc();

        if ($buku && $jumlah <= $buku['stok']) {
            $subtotal = $jumlah * $buku['harga'];
            $this->koneksi->query("UPDATE buku SET stok = stok - $jumlah WHERE id_buku = $id_buku");
            $this->koneksi->query("INSERT INTO pesanan (id_pelanggan, tanggal_pesanan, status) VALUES (NULL, NOW(), 'diproses')");
            $id_pesanan = $this->koneksi->insert_id;
            $this->koneksi->query("INSERT INTO detail_pesanan (id_pesanan, id_buku, jumlah, subtotal) VALUES ($id_pesanan, $id_buku, $jumlah, $subtotal)");
            return true;
        } else {
            return false;
        }
    }
}
?>



