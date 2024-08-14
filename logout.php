<?php
session_start();
unset($_SESSION['username']);
echo "<script> document.location.href='index.php'; </script>";
?>
