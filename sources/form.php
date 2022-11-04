<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <script src="https://kit.fontawesome.com/531b145c34.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/style/form.css">
</head>
<?php 
    session_start();
    include '../php/koneksi.php';
    if(!isset($_SESSION['form'])){
        if($_SESSION['posisi'] == "karyawan"){
            header("location:lo.php");
            exit;
        }else if($_SESSION['posisi'] == "hrd" || $_SESSION['posisi'] == "ceo"){
            header("location:../index.php");
            exit;
        }else{
            header("location:../index.php");
            exit;
        } 
    }
?>

<body>
    <div class="container">
        <form action="../php/form_aksi.php" method="post" class="form" enctype="multipart/form-data">
            <h2 class="title1">Register Form</h2>
            <div class="bio">
                <h3 class="title">Personal Data</h3>
                <div class="input-field">
                    <i class="fa-solid fa-signature"></i>
                    <input type="text" name="nama" placeholder="Name">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-id-card"></i>
                    <input type="text" name="nip" placeholder="NIP">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-house-user"></i>
                    <input type="text" name="tempat" placeholder="Place Of Birth">
                </div>
                <div class="input-field">
                    <i class="fa-sharp fa-solid fa-calendar-days"></i>
                    <input type="date" name="tanggal">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-location-pin"></i>
                    <input type="text" name="adress" id="adress" placeholder="Address">
                </div>
            </div>
            <div class="code">
                <h3 class="title">Pas Photo Employee</h3>
                <span>Upload Photo</span>
                <div class="input-field">
                    <i class="fa-solid fa-image"></i>
                    <input type="file" name="foto" id="foto">
                </div>
            </div>
            <input type="submit" value="Submit" class="btn solid">
        </form>
    </div>
</body>

</html>