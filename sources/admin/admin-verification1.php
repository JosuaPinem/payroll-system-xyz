<!-- php script -->
<?php

require '../../php/functions.php';
$verifikasi = query("SELECT * FROM verify ORDER BY id DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verifikasi Sederhana</title>
</head>

<body>
    <h1 style="text-align: center;">Ini adalah halaman daftar verifikasi sementara</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Karyawan</th>
            <th>Username</th>
            <th>Email</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $i = 1;
        foreach($verifikasi as $v):?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $v['kode_karyawan']; ?></td>
            <td><?= $v['username']; ?></td>
            <td><?= $v['email']; ?></td>
            <td>
                <a href="../verifikasi.php?user=<?=$v['username']?>">Terima</a>
                <a onclick="return confirm('Apakah anda ingin menolak verifikasi <?=$v['username']?>')"
                    href="../../php/tolakVerifikasiController.php?kode=<?=$v['kode_karyawan']?>">Tolak</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>