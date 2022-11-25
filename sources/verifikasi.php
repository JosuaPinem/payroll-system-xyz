<!-- PHP Script -->
<?php
session_start();
include '../php/koneksi.php';
include '../php/functions.php';

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
if (!isset($_SESSION['admin'])) {
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu!')
          </script>";
    header('refresh:0; ../index.php');
    exit;
}

// cek apakah di url terdapat user
if (!isset($_GET['user'])) {
    echo "<script>
            alert('User tidak diketahui, silahkan login ulang')
          </script>";
    header('refresh:0; ../index.php');
    exit;
}

$username = $_GET['user'];

// ambil database dari tabel verify
$query = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$username'");
$user = mysqli_fetch_assoc($query);

// ambil data personal admin yang sedang login
$kode = $_SESSION['kode'];
$akun = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'")

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <title>Verification</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/main.css">
</head>

<body class="d-none">
    <!-- Content -->
    <div class="content col d-flex flex-column gap-3 mb-2">
        <!-- Topbar -->
        <nav id="topbar" class="navbar d-flex px-1 px-lg-3 shadow-sm">
            <!-- Topbar Logo & Greetings -->
            <div class="d-flex p-2">
                <!-- Topbar Logo Display md-xs -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex">
                        <img src="../assets/img/xyz_logo.svg" height="30px" width="30px" alt="">
                    </div>
                    <span id="brand-text" class="fs-4 fw-bold d-none d-sm-flex text">XYZ Company</span>
                </div>
            </div>

            <!-- Topbar -->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!-- Dark Mode -->
                <div class="dark-mode d-flex align-items-center">
                    <label class="btn text material-icons-round p-1" for="dark-mode">&#xe518</label>
                    <div class="d-flex form-check form-switch justify-content-center" for="dark-mode">
                        <input class="form-check-input" type="checkbox" role="switch" title="toggle-dark" id="dark-mode">
                    </div>
                    <label class="btn text material-icons-round p-1" for="dark-mode">&#xef5e</label>
                </div>

                <!-- Dropdown -->
                <div class="dropdown d-flex">
                    <!-- Toggle Dropdown -->
                    <button class="btn d-flex align-items-center gap-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="profile-img" src="user-img/<?= $akun['foto'] ?>" class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex col flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= $akun['nama']; ?></span>
                            <span class="fs-6 text opacity-75"><?= $akun['posisi']; ?></span>
                        </span>
                    </button>

                    <!-- Dropdown Content -->
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li>
                            <a class="dropdown-item d-flex d-lg-none flex-column">
                                <span class="fs-5">Roberto Firmino</span>
                                <span class="fs-5 fw-bold text-danger">CEO</span>
                            </a>
                        </li>
                        <li>
                            <a class=" dropdown-item active" href="#">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Help</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider d-block d-lg-none">
                        </li>
                        <li>
                            <a class="dropdown-item d-block d-lg-none" href="../../php/logoutController.php" onclick="return confirm('Apakah anda ingin logout')">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="d-flex flex-column px-2 gap-3">
            <!-- Content Header -->
            <div class="d-flex my-2 mx-0 mx-lg-4 px-1 gap-1">
                <div class="p-2 d-flex align-items-center">
                    <div class="">
                        <a type="button" href="admin/admin-verification.php" class="d-flex rounded-circle p-1 btn btn-primary align-items-center justify-content-center">
                            <i class="material-icons-round">&#xe5c4</i>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row col align-items-lg-center justify-content-between p-1">
                    <span class="fs-3 fw-bold">Confirm Verification</span>
                    <ol class="breadcrumb my-0 p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin/admin-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin/admin-verification.php">Verification</a></li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex row mx-1 mx-lg-4 gap-4">
                <!-- Verification Form -->
                <div>
                    <form action="../php/verifikasiController.php" method="post" class="form container rounded-4 d-flex flex-column col col-sm-8 col-md-7 col-lg-6 col-xxl-5 p-4 gap-3 text-center" enctype="multipart/form-data">
                        <h2 class="fw-bold fs-1">Verification</h2>
                        <div class="form-floating">
                            <input type="text" readonly class="form-control text text-field" name="username" value="<?= $user['username'] ?>" title="nama">
                            <label class="text">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" readonly class="form-control text text-field focus-none" name="email" value="<?= $user['email'] ?>" title="email">
                            <label>Email</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select text text-field" id="floatingSelect" aria-label="Jabatan" name="jabatan">
                                <option selected>Pilih Jabatan</option>
                                <option value="Admin">Admin</option>
                                <option value="Android Developer">Android Developer</option>
                                <option value="CEO">CEO</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="HRD">HRD</option>
                                <option value="IT Security">IT Security</option>
                                <option value="Web Developer">Web Developer</option>
                            </select>
                            <label for="floatingSelect">Jabatan</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text text text-field" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control text text-field" placeholder="Gaji" aria-label="Username" aria-describedby="basic-addon1" name="gaji">
                        </div>
                        <div class="d-flex">
                            <input type="submit" value="Verifikasi" name="verifikasi" class="btn btn-primary px-4 py-2 mb-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../assets/script/main.js"></script>
</body>

</html>