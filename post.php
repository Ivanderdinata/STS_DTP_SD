<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_laporan_fasilitas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama_pelapor = $_POST['nama_pelapor'];
$nama_fasilitas = $_POST['nama_fasilitas'];
$lokasi = $_POST['lokasi'];
$id_kategori = $_POST['id_kategori'];
$deskripsi = $_POST['deskripsi'];
$prioritas = $_POST['prioritas'];

$stmt = $conn->prepare("INSERT INTO laporan_kerusakan (nama_pelapor, nama_fasilitas, lokasi, id_kategori, deskripsi, prioritas) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nama_pelapor, $nama_fasilitas, $lokasi, $id_kategori, $deskripsi, $prioritas);

if ($stmt->execute()) {
    echo "Laporan berhasil ditambahkan!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
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