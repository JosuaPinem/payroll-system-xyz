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
$delete = mysqli_query($koneksi, "DELETE FROM karyawan_tetap WHERE kode_karyawan = '$karyawanDelete'");
$delet .= mysqli_query($koneksi, "DELETE FROM login WHERE kode_karyawan = '$karyawanDelete'");
$delet .= mysqli_query($koneksi, "DELETE FROM absensi WHERE kode_karyawan = '$karyawanDelete'");
$delet .= mysqli_query($koneksi, "DELETE FROM daftar_gaji WHERE kode_karyawan = '$karyawanDelete'");
$delet .= mysqli_query($koneksi, "DELETE FROM top WHERE kode_karyawan = '$karyawanDelete'");
$delet .= mysqli_query($koneksi, "DELETE FROM riwayat_gaji WHERE kode_karyawan = '$karyawanDelete'");
if($delete){
    header('refresh:0; admin/admin-employee-list.php');
}
?>