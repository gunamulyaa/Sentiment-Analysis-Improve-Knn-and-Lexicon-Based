<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan formulir telah dikirim

    $kata = $_POST["kata"];
    $nilai = $_POST["code_sentiment"];

    if (empty($nilai) || $nilai == "0") {
        // Jika tidak ada sentimen yang dipilih, tampilkan pesan kesalahan
        echo '<script>alert("Silakan untuk mengisi sentiment terlebih dahulu"); document.location="index.php?halaman=kamus";</script>';
    }
    else {
        $query = "INSERT INTO kamus VALUES(NULL,'$kata','$nilai')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Berhasil menambahkan data!"); document.location="index.php?halaman=kamus";</script>';
        } else {
            echo '<script>alert("Gagal menambahkan data!"); document.location="index.php?halaman=kamus";</script>';
        }
    }
}
?>