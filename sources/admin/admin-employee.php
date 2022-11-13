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
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>XYZ Company</title>
</head>

<!-- PHP Config -->
<?php

require '../../php/functions.php';
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu!')
          </script>";
    header('refresh:0; ../../index.php');
    exit;
}

$username = $_SESSION['user'];
$kode = $_SESSION['kode'];

$user1 = query("SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'") //query untuk mendapatkan data personal pekerja yang login

?>


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
                <a href="admin-dashboard.php" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9b0</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xea67</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Employee</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="admin-verification.php" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe6b1</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Verification</span>
                    </div>
                </a>
            </li>
            <li>
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
            <div class="d-flex">
                <!-- Topbar Logo Display md-xs -->
                <div class="d-flex align-items-center gap-3">
                    <div class="logo d-flex d-lg-none">
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
                        <img id="profile-img" src="../user-img/<?= $user1['foto']?>"
                            class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex col flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= $user1['nama']; ?></span>
                            <span class="fs-6 text opacity-75"><?=$user1['posisi']?></span>
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
                    <h1 class="fw-bold header">Employee</h1>
                    <ol class="breadcrumb p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex col flex-column flex-xxl-row mx-1 mx-lg-4 gap-4">
                <!-- Container One -->
                <div class="col-xxl-8 d-flex flex-column p-2 gap-3">
                    <!-- Row One -->
                    <div class="d-flex">
                        <!-- Card -->
                        <div class="d-flex row col flex-column flex-lg-row gap-4 p-2">
                            <!-- Info Employee -->
                            <div class="container col col-lg-4 rounded-4 shadow border-0 p-3 gap-3 d-flex flex-column">
                                <span class="fs-4">Total Employee</span>
                                <?php
                                $jumlahKaryawan = count(query("SELECT * FROM login"));
                                ?>
                                <span class="display-3 fw-bold"><?= $jumlahKaryawan; ?></span>
                                <div class="d-flex flex-column gap-1">
                                    <div class="d-flex flex-column background px-2 py-1">
                                        <span class="fs-6">Attendance</span>
                                        <span class="fs-6 fw-bold">95</span>
                                    </div>
                                    <div class="d-flex flex-column background px-2 py-1">
                                        <span class="fs-6">Absent</span>
                                        <span class="fs-6 fw-bold">5</span>
                                    </div>
                                </div>
                                <a href="admin-employee-list.php"
                                    class="text-decoration-none btn btn-primary fs-6 p-2 mt-auto">Employee
                                    List</a>
                            </div>

                            <!-- Top Employee -->
                            <div class="container col rounded-4 shadow border-0 d-flex flex-column p-2 ">
                                <h3 class="fw-bold p-3 header">Top Employee</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="d-flex col px-2 py-1">
                                            <th class="col text">Employee Name</th>
                                            <th class="col text">Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="d-flex col px-2 py-1">
                                            <td class="col d-flex align-items-center gap-3 ">
                                                <img id="profile-img"
                                                    src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                    class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                                <span class="text">Roberto Firmino</span>
                                            </td>
                                            <td class="col d-flex align-items-center">
                                                <span class="text">HRD</span>
                                            </td>
                                        </tr>
                                        <tr class="d-flex col px-2 py-1">
                                            <td class="col d-flex align-items-center gap-3 ">
                                                <img id="profile-img"
                                                    src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                    class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                                <span class="text">Van Djik</span>
                                            </td>
                                            <td class="col d-flex align-items-center">
                                                <span class="text">Senior Engineer</span>
                                            </td>
                                        </tr>
                                        <tr class="d-flex col px-2 py-1 ">
                                            <td class="col d-flex align-items-center gap-3 ">
                                                <img id="profile-img"
                                                    src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                    class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                                <span class="text">Allison</span>
                                            </td>
                                            <td class="col d-flex align-items-center">
                                                <span class="text">Junior Developer</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Row Two -->
                    <div class="d-flex row col p-2 flex-column flex-xxl-row">
                        <!-- Employee's Absence -->
                        <div class="container col rounded-4 shadow border-0 d-flex flex-column p-2">
                            <h3 class="fw-bold p-3 header">Employee Absence</h3>
                            <table class="table table-borderless">
                                <thead>
                                    <tr class="d-flex col px-2 py-1 ">
                                        <th class="col-8 col-sm-4 justify-content-center text">Employee Name</th>
                                        <th class="col-4 d-none d-md-flex justify-content-center text">Period</th>
                                        <th class="col d-none d-md-flex justify-content-center text">Reason</th>
                                        <th class="col d-flex justify-content-center text">Action</th>
                                    </tr>
                                </thead>
                                <tbody height="160px" class="d-flex flex-column gap-2 px-2 overflow-auto">
                                    <tr class="d-flex align-items-center p-1 rounded-2 shadow-sm background">
                                        <td class="col-8 col-sm-4 d-flex align-items-center gap-3 ">
                                            <img id="profile-img"
                                                src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                            <span class="text">Luis Diaz</span>
                                        </td>
                                        <td class="col-4 d-none d-md-flex justify-content-center">
                                            <span class="text">1 Jan 2021 - 3 Jan 2021</span>
                                        </td>
                                        <td class="col d-none d-md-flex justify-content-center">
                                            <span class="text">Sick</span>
                                        </td>
                                        <td class="col d-flex justify-content-center gap-1">
                                            <button type="button"
                                                class="btn btn-primary d-flex align-items-center p-md-2 p-1"
                                                title="accept">
                                                <i class="material-icons">&#xe8ad</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="d-flex align-items-center p-1 rounded-2 shadow-sm background">
                                        <td class="col-8 col-sm-4  d-flex align-items-center gap-3 ">
                                            <img id="profile-img"
                                                src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                            <span class="text">Garnacho</span>
                                        </td>
                                        <td class="col-4 d-none d-md-flex justify-content-center">
                                            <span class="text">2 Jan 2021 - 4 Jan 2021</span>
                                        </td>
                                        <td class="col d-none d-md-flex justify-content-center">
                                            <span class="text">Emergency</span>
                                        </td>
                                        <td class="col d-flex justify-content-center gap-1">
                                            <button type="button"
                                                class="btn btn-primary d-flex align-items-center p-md-2 p-1"
                                                title="accept">
                                                <i class="material-icons">&#xe8ad</i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Container Two -->
                <div class="d-flex col flex-column col p-3">
                    <!-- Employee's Attendance -->
                    <div class="container col rounded-4 shadow border-0 d-flex flex-column gap-1 p-2">
                        <h3 class="fw-bold p-3 header">Employee's Attendance</h3>
                        <div class="d-flex align-items-center gap-3 px-2">
                            <form class="d-flex col align-items-center gap-2" action="">
                                <input type="email" class="form-control" id="search" placeholder="Search">
                                <button type="submit" class="btn btn-primary material-icons-round">&#xe8b6</button>
                            </form>
                        </div>
                        <table class="table table-borderless">
                            <thead>
                                <tr class="d-flex col px-2 py-1">
                                    <th class="col-9 text">Employee Name</th>
                                    <th class="col text">Time</th>
                                </tr>
                            </thead>
                            <tbody class="d-flex flex-column gap-2 px-2 overflow-hidden">
                                <tr class="d-flex align-items-center p-1 rounded-2 shadow-sm background">
                                    <td class="col-9 d-flex align-items-center gap-3 ">
                                        <img id="profile-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                            class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                        <span class="text">Cristiano Ronaldo</span>
                                    </td>
                                    <td class="col">
                                        <span class="text">07:00</span>
                                    </td>
                                </tr>
                                <tr class="d-flex align-items-center p-1 rounded-2 shadow-sm background">
                                    <td class="col-9 d-flex align-items-center gap-3 ">
                                        <img id="profile-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                            class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                        <span class="text">David De Gea</span>
                                    </td>
                                    <td class="col">
                                        <span class="text">08:00</span>
                                    </td>
                                </tr>
                                <tr class="d-flex align-items-center p-1 rounded-2 shadow-sm background">
                                    <td class="col-9 d-flex align-items-center gap-3 ">
                                        <img id="profile-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                            class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                        <span class="text">Harry Maguire</span>
                                    </td>
                                    <td class="col">
                                        <span class="text">11:00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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