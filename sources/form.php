<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <script src="https://kit.fontawesome.com/531b145c34.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/main.css">
</head>
<?php
session_start();
include '../php/koneksi.php';
if (!isset($_SESSION['form'])) {
    if ($_SESSION['posisi'] == "karyawan") {
        header("location:lo.php");
        exit;
    } else if ($_SESSION['posisi'] == "hrd" || $_SESSION['posisi'] == "ceo") {
        header("location:../index.php");
        exit;
    } else {
        header("location:../index.php");
        exit;
    }
}
?>

<body class="d-flex align-items-center p-3">
    <form action="../php/form_aksi.php" method="post"
        class="form container d-flex flex-column col col-sm-8 col-md-7 col-lg-6 col-xxl-5 p-5 gap-3 text-center"
        enctype="multipart/form-data">
        <h2 class="fw-bold fs-1">Register Form</h2>
        <div class="form-floating">
            <input type="text" class="form-control" name="nama" placeholder="Nama">
            <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="nip" placeholder="NIP">
            <label for="floatingInput">NIP</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir">
            <label for="floatingInput">Tempat Lahir</label>
        </div>
        <div class="form-floating">
            <select name="gender" id="gender" class="form-control">
                <option value="">---</option>
                <option value="Male">Laki-Laki</option>
                <option value="Female">Perempuan</option>
            </select>
            <label for="floatingInput">Jenis Kelamin</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
            <label for="floatingInput">Tanggal</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="adress" id="adress" placeholder="Alamat">
            <label for="floatingInput">Alamat</label>
        </div>
        <div>
            <input class="form-control" name="foto" type="file" id="formFile" id="foto" title="foto">
        </div>
        <div class="d-flex">
            <input type="submit" value="Submit" class="btn btn-primary px-4 py-2 mb-3">
        </div>
    </form>
</body>

</html>