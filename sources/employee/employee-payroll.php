<?php 
session_start();

include '../../php/functions.php';
include '../../php/koneksi.php';
if(!isset($_SESSION['karyawan'])){
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
    $gaji = query("SELECT * FROM riwayat_gaji WHERE kode_karyawan = '$kode'");

    // fungsi untuk mendapatkan bulan, agar history absen otomatis update setiap bulan
    date_default_timezone_set('Asia/Jakarta');
    $bulan = date('m');


?>

<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>XYZ Company</title>
</head>

<!-- PHP Config -->


<body class="d-flex">
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
            <button
                class="btn btn-primary toggle p-1 text-white rounded-circle d-none d-md-none d-lg-flex position-absolute">
                <i class="material-icons-round fs-5 rounded-circle toggle-icon">&#xe5cc</i>
            </button>
        </div>

        <!-- Sidebar Body -->
        <ul id="menu-bar"
            class="list-unstyled col d-flex flex-row flex-lg-column gap-4 justify-content-center fs-6 p-1 p-lg-2">
            <li>
                <a href="employee-dashboard.html" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9b0</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="employee-attendance.html" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe614</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Attendance</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xef63</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Payroll</span>
                    </div>
                </a>
            </li>
            <li class="mt-auto d-none d-md-none d-lg-flex sign-out">
                <a href="../../php/logoutController.php" onclick="return confirm('Apakah anda ingin logout')"
                    class="col text-decoration-none p-1 px-lg-3 py-lg-2 d-flex align-items-center rounded-3">
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
                        <input class="form-check-input" type="checkbox" role="switch" title="toggle-dark"
                            id="dark-mode">
                    </div>
                    <label class="btn text material-icons-round p-1" for="dark-mode">&#xef5e</label>
                </div>

                <!-- Dropdown -->
                <div class="dropdown d-flex">
                    <!-- Toggle Dropdown -->
                    <button class="btn d-flex align-items-center gap-3" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img id="profile-img"
                            src="../user-img/<?php echo $query['foto'] ?>"
                            class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= strtoupper($query['nama']); ?></span>
                            <span class="fs-6 text opacity-75"><?= strtoupper($query['posisi']); ?></span>
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
                            <a class=" dropdown-item active" href="./employee-dashboard.php">Home</a>
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
                            <a class="dropdown-item d-block d-lg-none" href="../../php/logoutController.php"
                                onclick="return confirm('Apakah anda ingin logout')">Sign Out</a>
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
                    <h1 class="fw-bold header">Payroll</h1>
                    <ol class="breadcrumb p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none"
                                href="./employee-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Payroll</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex  flex-column mx-0 mx-lg-4 px-md-1 gap-3">
                <!-- Payroll List -->
                <div class="flex-container rounded-4 shadow border-0 p-2">
                    <h3 class="fw-bold p-3 header">Salary History</h3>
                    <table class="table table-hover">
                        <thead>
                            <tr class="d-flex col p-1">
                                <th class="col d-none d-md-flex p-1 align-items-center justify-content-center text">
                                    Invoice ID
                                </th>
                                <th
                                    class="col col-lg col-md-3 p-1 d-none d-md-flex align-items-center justify-content-center text">
                                    Date
                                </th>
                                <th class="col d-flex p-1 align-items-center justify-content-center text">
                                    Total Gaji
                                </th>
                                <th class="col d-none d-sm-flex p-1 align-items-center justify-content-center text">
                                    Status
                                </th>
                                <th class="col d-flex p-1 align-items-center justify-content-center gap-1 text">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-flex col p-1">
                                <td class="col d-none d-md-flex p-1 align-items-center justify-content-center">
                                    <span class="text">RHN89123457</span>
                                </td>
                                <td
                                    class="col col-lg col-md-3 d-none d-md-flex gap-2 p-1 align-items-center justify-content-center">
                                    <span class="text">16 November 2022</span>
                                </td>
                                <td class="col d-flex p-1 align-items-center justify-content-center">
                                    <span class="text">Rp 10.400.000</span>
                                </td>
                                <td class="col d-none d-sm-flex p-1 align-items-center justify-content-center">
                                    <span class="bg-success text-white px-4 py-1 rounded-1">Paid</span>
                                </td>
                                <td class="col d-flex p-1 align-items-center justify-content-center gap-1">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Details</button>
                                    <!-- Modal Details -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content flex-container">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text" id="staticBackdropLabel">Salary
                                                        Details
                                                    </h1>
                                                    <button type="button" class="btn-close bg-light"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex p-2 gap-2">
                                                        <div class="d-flex flex-column col gap-2">
                                                            <div class="d-flex px-2">
                                                                <span class="text fw-bold col-4 py-1">Invoice ID</span>
                                                                <span class="text col py-1">RHN89123457</span>
                                                            </div>
                                                            <div class="d-flex px-2">
                                                                <span class="text fw-bold col-4 py-1">Date</span>
                                                                <span class="text col py-1">16 November 2022</span>
                                                            </div>
                                                            <div class="d-flex px-2">
                                                                <span class="text fw-bold col-4 py-1">Status</span>
                                                                <span
                                                                    class="bg-success text-white px-4 py-1 rounded-1">Paid</span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column mt-3 border border-2 border-primary border-opacity-50 rounded">
                                                                <div class="px-2 pt-2">
                                                                    <div
                                                                        class="d-flex justify-content-between px-2 py-1 mb-1">
                                                                        <span
                                                                            class="text-primary fs-5 fw-bold col">Pendapatan</span>
                                                                        <span
                                                                            class="d-flex align-items-center px-1 border border-primary rounded-3">
                                                                            <i
                                                                                class="material-icons-round text-primary">&#xe227</i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="d-flex px-2">
                                                                        <span class="text col py-1 opacity-75">Gaji
                                                                            Pokok</span>
                                                                        <span
                                                                            class="text-success col py-1 text-end fw-semibold numb">Rp
                                                                            10.000.000</span>
                                                                    </div>
                                                                    <div class="d-flex px-2">
                                                                        <span
                                                                            class="text col py-1 opacity-75">Bonus</span>
                                                                        <span
                                                                            class="text-success col py-1 text-end fw-semibold numb">Rp
                                                                            1.500.000</span>
                                                                    </div>
                                                                    <div class="d-flex px-2">
                                                                        <span
                                                                            class="text col py-1 opacity-75">Pajak</span>
                                                                        <span
                                                                            class="text-danger col py-1 text-end fw-semibold numb">Rp
                                                                            1.100.000</span>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex background rounded-bottom fs-6 p-2">
                                                                    <span class="text fw-semibold col-7 py-1 px-2">Total
                                                                        pendapatan</span>
                                                                    <span
                                                                        class="text col py-1 px-2 text-end fw-semibold numb">Rp
                                                                        10.400.000</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Back</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="..." class="d-flex justify-content-center mt-auto">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link d-flex"><i class="material-icons-round">&#xe408</i></a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link d-flex" href="#"><i class="material-icons-round">&#xe409</i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../../assets/script/main.js"></script>
</body>

</html>