<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in & Sig-in Form</title>
    <link rel="stylesheet" href="assets/style/Login.css">
    <script src="https://kit.fontawesome.com/531b145c34.js" crossorigin="anonymous"></script>
</head>
<?php 
session_start();
if(isset($_SESSION['admin'])){
    header('refresh:0; sources/admin/admin-dashboard.php');
    exit;
}else if(isset($_SESSION['karyawan'])){
    header('refresh:0; sources/employee/employee-dashboard.php');
    exit;
}
?>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="php/login_aksi.php" method="post" class="sign-in-form">
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" required autocomplete="off">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <input type="submit" value="Login" class="btn solid" name="login">
                </form>

                <form action="php/signUp_aksi.php" method="post" class="sign-up-form">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" value="Sign Up" class="btn solid" name="registrasi">
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here ?</h3>
                    <p>Jika anda merupakan karyawan baru, maka silahkan sign-up untuk membuat akun.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>

                <!-- <img src="./img/undraw_working_remotely_re_6b3a.svg" class="image" alt=""> -->
                <img src="assets/img/undraw_working_remotely_re_6b3a.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us ?</h3>
                    <p>Anda merupakan bagian dari kami, silahkan masuk terlebih dahulu.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="assets/img/undraw_feeling_proud_qne1.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="assets/script/app.js"></script>
</body>

</html>