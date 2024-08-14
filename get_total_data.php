<?php
// Sesuaikan dengan detail koneksi database Anda
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "improved_knn";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Kueri untuk mendapatkan total jumlah data
$sql = "SELECT COUNT(*) AS total_data FROM hasil_klasifikasi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil hasil kueri
    $row = $result->fetch_assoc();
    $totalData = $row['total_data'];
    
    // Kembalikan total data sebagai respons HTTP
    echo $totalData;
} else {
    // Jika tidak ada data
    echo "0";
}

// Tutup koneksi
$conn->close();
?>
