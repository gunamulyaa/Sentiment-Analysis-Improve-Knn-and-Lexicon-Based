<?php

// Fungsi untuk membaca kata kunci dari database
function bacaKataKunciDariDatabase($koneksi, $codeSentiment) {
    $kataKunci = array();

    // Sesuaikan query sesuai struktur tabel Anda
    $sql = mysqli_query($koneksi, "SELECT kata FROM kamus WHERE code_sentiment = '$codeSentiment'");

    if (!$sql) {
        die('Error: ' . mysqli_error($koneksi));
    }

    while ($data = mysqli_fetch_assoc($sql)) {
        $kataKunci[] = $data['kata'];
    }

    return $kataKunci;
}

// Fungsi untuk melabeli kalimat
function labelKalimat($kalimat, $kataKunciPositif, $kataKunciNegatif) {
    $kalimat = strtolower($kalimat); // Convert to lowercase for case-insensitive matching
    $kataKunciPositif = array_map('strtolower', $kataKunciPositif);
    $kataKunciNegatif = array_map('strtolower', $kataKunciNegatif);

    $jumlahPositif = 0;
    $jumlahNegatif = 0;

    foreach ($kataKunciPositif as $kataPositif) {
        if (strpos($kalimat, $kataPositif) !== false) {
            $jumlahPositif++;
        }
    }

    foreach ($kataKunciNegatif as $kataNegatif) {
        if (strpos($kalimat, $kataNegatif) !== false) {
            $jumlahNegatif++;
        }
    }

    if ($jumlahPositif > $jumlahNegatif) {
        return "s1";
    } elseif ($jumlahNegatif > $jumlahPositif) {
        return "s2";
    } else {
        return "s3";
    }
}

// Koneksi ke database (sesuaikan dengan koneksi database Anda)
$koneksi = mysqli_connect("localhost", "root", "", "improve_knn");

if (!$koneksi) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

// Perbarui sentimen dalam database
$sql =  mysqli_query($koneksi,"SELECT * FROM data_uji JOIN sentiment ON data_uji.klasifikasi_manual = sentiment.code_sentiment ORDER BY id_uji DESC");

while($data = mysqli_fetch_array($sql)) {
    $codeSentiment = $data['klasifikasi_manual'];
    $kataKunciPositif = bacaKataKunciDariDatabase($koneksi, $codeSentiment="s1");
    $kataKunciNegatif = bacaKataKunciDariDatabase($koneksi, $codeSentiment="s2"); // Add logic to read negative keywords if needed
    $kalimat = $data['document'];
    $label = labelKalimat($kalimat, $kataKunciPositif, $kataKunciNegatif);
    $doc_id = $data['id_uji'];
    
    // Perbarui nilai sentimen dalam database
    $update_sql = "UPDATE data_uji SET klasifikasi_manual = '$label' WHERE id_uji = $doc_id";
    mysqli_query($koneksi, $update_sql);
}

// Tutup koneksi database
mysqli_close($koneksi);

if ($update_sql) {
    ?>
    <script language="JavaScript">
        alert('Successfully');
        document.location='index.php?halaman=data_uji';
    </script>
    <?php
} else {
    ?>
    <script language="JavaScript">
        alert('Failed');
        document.location='index.php?halaman=data_uji';
    </script>
    <?php
}
?>
