<?php
include 'functions.php';
include 'koneksi.php';

$kode = $_GET['kode'];
$delete = mysqli_query($koneksi, "DELETE FROM verify WHERE kode_karyawan = '$kode'");
$delete .= mysqli_query($koneksi, "DELETE FROM data_karyawan WHERE kode_karyawan = '$kode'");

if($delete){
    echo "<script>
            alert('Permintaan verifikasi berhasil ditolak!')
          </script>";
    header('refresh:0; ../sources/admin/admin-verification.php');
}

?>