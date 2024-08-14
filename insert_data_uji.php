
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan formulir telah dikirim

    $document = $_POST["document"];
    $code_sentiment = $_POST["code_sentiment"];

    if (empty($code_sentiment) || $code_sentiment == "0") {
        // Jika tidak ada sentimen yang dipilih, tampilkan pesan kesalahan
        echo '<script>alert("Silakan untuk mengisi sentimen terlebih dahulu"); document.location="index.php?halaman=data_uji";</script>';
    } else {
        $query = "INSERT INTO data_uji VALUES(NULL,'$document','$code_sentiment','Belum Diketahui')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Berhasil menambahkan data!"); document.location="index.php?halaman=data_uji";</script>';
        } else {
            echo '<script>alert("Gagal menambahkan data!"); document.location="index.php?halaman=data_uji";</script>';
        }
    }
}
?>