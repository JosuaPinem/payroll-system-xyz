<?php

session_start();
include 'functions.php';
include 'koneksi.php';

if(isset($_POST['kirim'])){
    // untuk mendapatkan keterangan absen
    $keterangan = $_POST['keterangan'];

    // untuk mendapatkan kode karyawan
    $kode = $_SESSION['kode'];

    // untuk mendapatkan waktu tanggal melakukan absensi
    date_default_timezone_set('Asia/Jakarta');
    $date = date('d M Y');

    // untuk mendapatkan jam absensi
    $jam = date('h:i');

    // untuk mendapatkan bulan absensi history, supaya bisa reset tiap bulan
    $bulan = date('m');

    // untuk mendapatkan foto profil karyawan
    $fotoQuery = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");
    $foto = $fotoQuery['foto'];

    // untuk mendapatkan nama employee yang melakukan absensi
    $namaQuery = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");
    $nama = $namaQuery['nama'];

    // insert data menuju database
    $absen = mysqli_query($koneksi, "INSERT INTO absensi VALUES(NULL, '$kode', '$nama', '$date', '$bulan', '$jam', '$keterangan', '$foto')");

    if($absen){
        echo "<script></script>";
        header('refresh:0; ../sources/employee/employee-dashboard.php');
    }
}

?>