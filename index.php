<?php 

session_start();

  include 'koneksi.php';

  include 'header.php';

 ?>
<?php 

if (!isset($_SESSION['username'])){
 echo "<script> document.location.href='login.php'; </script>";
  } 

  ?>
  

  <?php 
    if (isset($_GET['halaman']))
    {
     if ($_GET['halaman']=="data_latih")
     {
      include 'data_latih.php';
    }
     elseif ($_GET['halaman']=="insert_data_latih")
    {
      include 'insert_data_latih.php';
    }
    elseif ($_GET['halaman']=="insert_kamus")
    {
      include 'insert_kamus.php';
    }
    elseif ($_GET['halaman']=="kamus")
    {
      include 'kamus.php';
    }
    elseif ($_GET['halaman']=="lexicon_based_uji")
    {
      include 'lexicon_based_uji.php';
    }
     elseif ($_GET['halaman']=="data_uji")
    {
      include 'data_uji.php';
    }
    elseif ($_GET['halaman']=="lexicon_based")
    {
      include 'lexicon_based.php';
    }
    elseif ($_GET['halaman']=="insert_data_uji")
    {
      include 'insert_data_uji.php';
    }
    elseif ($_GET['halaman']=="case_folding")
    {
      include 'case_folding.php';
    } 
    elseif ($_GET['halaman']=="token")
    {
      include 'token.php';
    }
    elseif ($_GET['halaman']=="kata_dasar")
    {
      include 'klasifikasi/kata_dasar.php';
    }
     elseif ($_GET['halaman']=="proses_text")
    {
      include 'proses_text.php';
    }
    elseif ($_GET['halaman']=="data_uji")
    {
      include 'data_uji.php';
    }
    elseif ($_GET['halaman']=="klasifikasi")
    {
      include 'klasifikasi.php';
    }
     elseif ($_GET['halaman']=="proses_klasifikasi")
    {
      include 'proses_klasifikasi.php';
    }
    elseif ($_GET['halaman']=="hasil_klasifikasi")
    {
      include 'klasifikasi/tampilkan_hasil.php';
    }
    elseif($_GET['halaman']=="visualisasi"){
      include 'visualisasi.php';
    }
    elseif($_GET['halaman']=="akurasi"){
      include 'akurasi.php';
    }
    elseif($_GET['halaman']=="analisis"){
      include 'hasil_analisis.php';
    }
     elseif($_GET['halaman']=="hasil_filtering"){
      include 'hasil_filtering.php';
    }
     elseif($_GET['halaman']=="proses_tfidf_uji"){
      include 'proses_tfidf_uji.php';
    }
    elseif ($_GET['halaman']=="insert_kvalues")
    {
      include 'insert_kvalues.php';
    }
    elseif($_GET['halaman']=="edit_data"){
      include 'edit_data.php';
    } 
    elseif($_GET['halaman']=="delete_data"){
      include 'delete_data.php';
    } 
    elseif($_GET['halaman']=="wordCloud"){
      include 'word_cloud.php';
    }
    elseif($_GET['halaman']=="hasil_tfidf"){
      include 'hasil_tfidf.php';
    }
    elseif($_GET['halaman']=="hapus_semua_data_uji"){
      include 'hapus_semua_data_uji.php';
    }
    elseif($_GET['halaman']=="hapus_semua_data_latih"){
      include 'hapus_semua_data_latih.php';
    }

  }
  else
  {
    include 'beranda.php';
  }

  ?>


 <?php 
  include 'footer.php';
  ?>
