<?php
    include 'functions.php';
    include 'koneksi.php';

    $nama = $_GET['kode'];
    $delete = mysqli_query($koneksi, "DELETE FROM login WHERE kode_karyawan = '$kode'");
    $delete .= mysqli_query($koneksi, "DELETE FROM karyawan_tetap WHERE kode_karyawan = '$kode'");

    if($delete){
        echo "<script>
                alert('Permintaan verifikasi berhasil ditolak!')
              </script>";
        header('refresh:0; ../sources/admin/admin-verification.php');
    }
?>