<?php

include '../php/koneksi.php';
include '../php/functions.php';
$surat = $_GET['surat'];

$query = query("SELECT * FROM absensi WHERE surat = '$surat' ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/favicon.ico" type="image/ico">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <title>Surat Keterangan</title>
</head>

<body class="d-flex row">
    <object data="surat-izin/<?= $query['surat'] ?>" style="height:100vh"></object>
</body>

</html>