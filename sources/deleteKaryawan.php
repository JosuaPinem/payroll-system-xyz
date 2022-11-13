<?php

require '../php/koneksi.php';
require '../php/functions.php';
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu!')
          </script>";
    header('refresh:0; ../../index.php');
    exit;
}

$karyawanDelete = $_GET['user'];
$delete = mysqli_query($koneksi, "DELETE FROM karyawan_tetap WHERE nama = '$karyawanDelete'");
if($delete){
    header('refresh:0; admin/admin-employee-list.php');
}
?>