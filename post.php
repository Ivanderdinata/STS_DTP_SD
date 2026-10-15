<?php
require_once 'database/koneksi.php';

$nama_pelapor = $_POST['nama_pelapor'];
$nama_fasilitas = $_POST['nama_fasilitas'];
$lokasi = $_POST['lokasi'];
$id_kategori = $_POST['id_kategori'];
$deskripsi = $_POST['deskripsi'];
$prioritas = $_POST['prioritas'];

$stmt = $pdo->prepare("INSERT INTO laporan_kerusakan (nama_pelapor, nama_fasilitas, lokasi, id_kategori, deskripsi, prioritas) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$nama_pelapor, $nama_fasilitas, $lokasi, $id_kategori, $deskripsi, $prioritas]);

if ($stmt->execute()) {
    echo "Laporan berhasil ditambahkan!";
} else {
    echo "Error: ";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Sukses</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="index.php" method="get">
        <input type="submit" value="Kembali ke Halaman Utama">
    </form>
</body>

</html>