<!-- PHP Script -->
<?php 
session_start();
include '../php/koneksi.php';

    // // mencegah user yang tidak terdaftar
    // session_start();
    // if(!isset($_SESSION['login'])){
    //     header("location:Login.php");
    //     exit;
    // }
    // if($_SESSION['posisi'] == "karyawan"){
    //     header("location:lo.php");
    //     exit;
    // }

    // cek apakah sesion sebagai admin sudah dimulai
    if(!isset($_SESSION['admin'])){
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu!')
          </script>";
    header('refresh:0; ../index.php');
    exit;
    }

    // cek apakah di url terdapat user
    if(!isset($_GET['user'])){
    echo "<script>
            alert('User tidak diketahui, silahkan login ulang')
          </script>";
    header('refresh:0; ../index.php');
    return false;
    }

    $username = $_GET['user'];

// ambil database dari tabel verify
$query = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$username'");
$user = mysqli_fetch_assoc($query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll Management System - Verifikasi</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    #login-registrasi .col-sm-4 {
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }
    </style>
</head>

<body>
    <div class="container" id="login-registrasi">
        <div class="row">
            <div class="col-sm-4">
                <form action="../php/verifikasiController.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" readonly
                            value="<?= $user['username']?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" value="<?= $user['email']?>" name="email"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="CEO">CEO</option>
                            <option value="Admin">Admin</option>
                            <option value="HRD">HRD</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="verifikasi">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>