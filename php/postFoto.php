<?php
include 'koneksi.php';
session_start();
$kode = $_SESSION['kode'];
$file_name = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
$file_up_name = time().$file_name;
move_uploaded_file($tmp_name, "../sources/user-img/".$file_up_name);
?>