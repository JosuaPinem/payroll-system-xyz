<!-- @format -->
<?php
session_start();

include '../../php/functions.php';
include '../../php/koneksi.php';
if (!isset($_SESSION['karyawan'])) {
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu')
          </script>";
    header('refresh:0; ../../index.php');
    return false;
}
$_SESSION['posisi'] = "karyawan";
$_SESSION['halaman'] = "karyawan";

// query untuk mengambil data personal employee yang sedang login
$kode = $_SESSION['kode'];
$user = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");

// query untuk mengambil data absen employee yang sedang login
$absen = query("SELECT * FROM absensi WHERE kode_karyawan = '$kode'");

// fungsi untuk mendapatkan bulan, agar history absen otomatis update setiap bulan
date_default_timezone_set('Asia/Jakarta');
$bulan = date('m');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Round" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>XYZ Company</title>
</head>

<!-- PHP Config -->


<body class="d-none">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-lg-column col-auto shadow" id="sidebar-nav">
        <!-- Sidebar Hedaer -->
        <div class="header-box p-2 mt-4 mb-5 align-items-center d-none d-md-none d-lg-flex gap-2 position-relative">
            <!-- Company Logo & Name -->
            <div class="logo">
                <img src="../../assets/img/xyz_logo.svg" width="48px" height="48px" alt="">
            </div>
            <span id="brand-text" class="fs-4 fw-bold">XYZ Company</span>

            <!-- Button Toggle Maximize Sidebar -->
            <button class="btn btn-primary toggle p-1 text-white rounded-circle d-none d-md-none d-lg-flex position-absolute">
                <i class="material-icons-round fs-5 rounded-circle toggle-icon">&#xe5cc</i>
            </button>
        </div>

        <!-- Sidebar Body -->
        <ul id="menu-bar" class="list-unstyled col d-flex flex-row flex-lg-column gap-4 justify-content-center fs-6 p-1 p-lg-2">
            <li>
                <a href="employee-dashboard.php" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9b0</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe614</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Attendance</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="./employee-payroll.php" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xef63</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Payroll</span>
                    </div>
                </a>
            </li>
            <li class="mt-auto d-none d-md-none d-lg-flex sign-out">
                <a href="../../php/logoutController.php" onclick="return confirm('Apakah anda ingin logout')" class="col text-decoration-none p-1 px-lg-3 py-lg-2 d-flex align-items-center rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9ba</i>
                    <div class="align-items-center">
                        <span class="text-sidebar">Sign Out</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="content col d-flex flex-column gap-3 mb-5">
        <!-- Topbar -->
        <nav id="topbar" class="navbar d-flex px-1 px-lg-3 shadow-sm">
            <!-- Topbar Logo & Greetings -->
            <div class="d-flex p-2">
                <!-- Topbar Logo Display md-xs -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex d-lg-none">
                        <img src="../../assets/img/xyz_logo.svg" height="30px" width="30px" alt="">
                    </div>
                    <span id="brand-text" class="fs-4 fw-bold d-none d-sm-flex d-lg-none text">XYZ Company</span>
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
                        <img id="profile-img" src="../user-img/<?= $user['foto'] ?>" class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text">
                                <?= $user['nama']; ?>
                            </span>
                            <span class="fs-6 text opacity-75">
                                <?= $user['posisi']; ?>
                            </span>
                        </span>
                    </button>

                    <!-- Dropdown Content -->
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li>
                            <a class="dropdown-item d-flex d-lg-none flex-column">
                                <span class="fs-5">Mohammed Salah</span>
                                <span class="fs-5 fw-bold text-danger">Web Developer</span>
                            </a>
                        </li>
                        <li>
                            <a class=" dropdown-item active" href="employee-dashboard.php">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../profile.php">Profile</a>
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
        <div class="d-flex flex-column gap-4 px-2">
            <!-- Content Header -->
            <div class="d-flex header my-2 mx-0 mx-lg-4 px-1">
                <div class="d-flex flex-column flex-lg-row col justify-content-between px-1 px-lg-2">
                    <h1 class="fw-bold header">Attendance</h1>
                    <ol class="breadcrumb p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="employee-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex col flex-column flex-xxl-row mx-1 mx-lg-4 gap-4 mb-4">
                <!-- Container One -->
                <div class="d-flex col flex-column gap-4">
                    <!-- Attendance -->
                    <div class="flex-container col rounded-4 shadow border-0 d-flex flex-column p-3">
                        <h3 class="fw-bold p-3 header">Presence</h3>
                        <span class="d-flex p-3">
                            <h2 id="date" class="fw-bold">dayname, dd-month-yyyy</h2>
                        </span>
                        <form action="../../php/attendanceController.php" method="post" enctype="multipart/form-data" class="col d-flex flex-column">
                            <div class="d-flex flex-column p-3 gap-4">
                                <div class="d-flex">
                                    <div class="d-flex col gap-3">
                                        <input type="radio" class="btn-check" name="keterangan" id="present" value="Present" autocomplete="off">
                                        <label class="btn btn-outline-success col d-flex justify-content-center fs-5 p-3" for="present">Present</label>
                                        <input type="radio" class="btn-check" name="keterangan" id="permission" value="permission" autocomplete="off">
                                        <label class="btn btn-outline-primary col fs-5 p-3" for="permission">Permission</label>
                                    </div>
                                </div>
                                <div class="permission col d-none flex-column gap-4">
                                    <div class="d-flex gap-3">
                                        <input type="radio" class="btn-check reason" name="keterangan" id="sick" value="Sick" autocomplete="off">
                                        <label class="btn btn-outline-warning col" for="sick">Sick</label>
                                        <input type="radio" class="btn-check reason" name="keterangan" id="emergency" value="Emergency" autocomplete="off">
                                        <label class="btn btn-outline-danger col" for="emergency">Emergency</label>
                                        <input type="radio" class="btn-check reason" name="keterangan" value="Other" id="other" value="Other" autocomplete="off">
                                        <label class="btn btn-outline-info col" for="other">Other</label>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <label for="formFile" class="form-label fw-bold">Input statement letter</label>
                                        <input class="form-control text-field text" type="file" id="formFile" name="surat">
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex p-3 gap-3 mt-auto">
                                <button class="btn btn-primary d-flex py-2 rounded mt-auto" type="submit" name="kirim" title="Kirim Absensi">
                                    <i class="material-icons-round">&#xe163</i>
                                </button>
                                <a href="../surat-izin/template_surat.pdf" download="Template Surat" title="Download Template Surar" class="d-flex btn rounded mt-auto btn-primary py-2">
                                    <i class="material-icons-round text-white">&#xe8ad</i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Container Two -->
                <div class="d-flex flex-column gap-3 col">
                    <!-- Digital Clock -->
                    <div class="flex-container d-flex flex-column col rounded-4 shadow border-0 p-3">
                        <h3 class="fw-bold p-3 header">Digital Clock</h3>
                        <div class="d-flex flex-column flex-sm-row col gap-3 p-3 text-white">
                            <div class="col d-flex flex-row flex-sm-column justify-content-center shadow clock">
                                <span id="hours" class="display-3 col d-flex align-items-center justify-content-center px-3">
                                    00
                                </span>
                                <div class="d-flex flex-column col py-2 justify-content-center">
                                    <span class="d-flex justify-content-center px-3 text-uppercase time">
                                        Hours
                                    </span>
                                </div>
                            </div>
                            <div class="col d-flex flex-row flex-sm-column justify-content-center shadow clock">
                                <span id="minutes" class="display-3 col d-flex align-items-center justify-content-center px-3">
                                    00
                                </span>
                                <div class="d-flex flex-column col py-2 justify-content-center">
                                    <span class="d-flex justify-content-center px-3 text-uppercase time">
                                        Minutes
                                    </span>
                                </div>
                            </div>
                            <div class="col d-flex flex-row flex-sm-column justify-content-center shadow clock">
                                <span id="seconds" class="display-3 col d-flex align-items-center justify-content-center px-3">
                                    00
                                </span>
                                <div class="d-flex flex-column col py-2 justify-content-center">
                                    <span class="d-flex justify-content-center px-3 text-uppercase time">
                                        Seconds
                                    </span>
                                </div>
                            </div>
                            <div class="col d-flex flex-row flex-sm-column justify-content-center shadow clock">
                                <span id="period" class="display-3 col d-flex align-items-center justify-content-center px-3">
                                    AM
                                </span>
                                <div class="d-flex flex-column col py-2 justify-content-center">
                                    <span class="d-flex justify-content-center px-3 text-uppercase time">
                                        Period
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance History -->
                    <div class="flex-container col rounded-4 shadow border-0 d-flex flex-column p-3">
                        <h3 class="fw-bold p-3 header">Attendance History</h3>
                        <table class="table table-borderless d-flex flex-column gap-2">
                            <tbody class="d-flex col flex-column gap-2 px-2">
                                <tr class="d-flex align-items-center p-1 text">
                                    <td class="col fw-bold">
                                        Present
                                    </td>
                                    <td class="col d-flex justify-content-center">
                                        <?php
                                        $dataPresent = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kode_karyawan = '$kode' AND keterangan = 'Present' AND bulan = '$bulan'");
                                        $jumlahPresentUser = mysqli_num_rows($dataPresent);
                                        if ($jumlahPresentUser == 0) {
                                            $jumlahPresentUser = "-";
                                        }
                                        echo $jumlahPresentUser;
                                        ?>
                                    </td>
                                </tr>
                                <tr class="d-flex align-items-center p-1 text">
                                    <td class="col fw-bold">
                                        Sick
                                    </td>
                                    <td class="col d-flex justify-content-center">
                                        <?php
                                        $dataPresent = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kode_karyawan = '$kode' AND keterangan = 'Sick'");
                                        $jumlahPresentUser = mysqli_num_rows($dataPresent);
                                        if ($jumlahPresentUser == 0) {
                                            $jumlahPresentUser = "-";
                                        }
                                        echo $jumlahPresentUser;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="d-flex col flex-column gap-2 px-2 overflow-hidden">
                                <tr class="d-flex align-items-center p-1 text">
                                    <td class="col fw-bold">
                                        Emergency
                                    </td>
                                    <td class="col d-flex justify-content-center">
                                        <?php
                                        $dataPresent = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kode_karyawan = '$kode' AND keterangan = 'Emergency'");
                                        $jumlahPresentUser = mysqli_num_rows($dataPresent);
                                        if ($jumlahPresentUser == 0) {
                                            $jumlahPresentUser = "-";
                                        }
                                        echo $jumlahPresentUser;
                                        ?>
                                    </td>
                                </tr>
                                <tr class="d-flex align-items-center p-1 text">
                                    <td class="col fw-bold">
                                        Other
                                    </td>
                                    <td class="col d-flex justify-content-center">
                                        <?php
                                        $dataPresent = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kode_karyawan = '$kode' AND keterangan = 'Other'");
                                        $jumlahPresentUser = mysqli_num_rows($dataPresent);
                                        if ($jumlahPresentUser == 0) {
                                            $jumlahPresentUser = "-";
                                        }
                                        echo $jumlahPresentUser;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- JQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Time JS-->
    <script src="../../assets/script/time.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/script/main.js"></script>
</body>

</html>