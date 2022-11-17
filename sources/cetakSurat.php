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
    <title>Surat Keterangan</title>
</head>

<body>
    <object data="surat-izin/<?= $query['surat']?>" width="300" height="200"></object>
</body>

</html>