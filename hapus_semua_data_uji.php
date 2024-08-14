<?php 

$sql = mysqli_query($koneksi, "DELETE FROM data_uji") or die(mysqli_error($koneksi));

	if($sql){
		echo '<script>alert("Berhasil merubah data!"); document.location="index.php?halaman=data_uji";</script>';
	}else{
		echo '<script>alert("Gagal merubah data!"); document.location="index.php?halaman=data_uji";</script>';
	}


 ?>