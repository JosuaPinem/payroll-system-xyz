<?php 
        session_start();
        require '../../php/functions.php';
        include '../../php/koneksi.php';
        if(!isset($_SESSION['admin'])){
            echo "<script>
                    alert('Anda belum login, silahkan login terlebih dahulu!')
                </script>";
            header('refresh:0; ../../index.php');
            return false;
        }

    // lakukan query untuk mengambil data dari tabel data_karyawan mengambil foto dan nama lengkap
    $username = $_SESSION['user'];
    $kode = $_SESSION['kode'];  

    // $query untuk mengambil data nama lengkap karyawan dari tabel data_karyawan
    $query = query("SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'");

    // $query2 untuk mengambil data posisi karyawan dari tabel login
    $query2 = query("SELECT * FROM  login WHERE username = '$username'");

    // $query3 untuk mengambil data karyawan yang belum diverifikasi
    $query3 = query("SELECT * FROM verify ORDER BY id DESC");

    // $query4 untuk mengambil top karyawan
    $query5 = query("SELECT * FROM top_karyawan");


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
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
            <li class="active">
                <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9b0</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="admin-employee.php" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
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
                        <img id="profile-img" src="<?php echo "../../assets/user-img/".$query['foto'] ?>"
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
                                <span class="fs-5"><?= strtoupper($query['nama']); ?></span>
                                <span class="fs-5 fw-bold text-danger"><?= strtoupper($query['posisi']); ?></span>
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
            <div class="d-flex header my-2  mx-0 mx-lg-4 px-1">
                <div class="d-flex flex-column flex-lg-row col justify-content-between px-1 px-lg-2">
                    <h1 class="fw-bold header">Dashboard</h1>
                    <ol class="breadcrumb p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex col flex-column flex-xxl-row mx-1 mx-lg-4 gap-3">
                <!-- Container One -->
                <div class="col-xxl-9 d-flex flex-column p-2 gap-4">
                    <!-- Row One -->
                    <div class="d-flex row gap-4">
                        <!-- Info -->
                        <div class="d-flex col flex-column flex-md-row gap-4">
                            <div class="card rounded-4 shadow border-0 col d-flex p-4 gap-1">
                                <div class="d-flex justify-content-between">
                                    <span class="fs-5">Employee</span>
                                    <i class="material-icons-round card-icon one rounded-2 p-3">&#xf233</i>
                                </div>
                                <?php 
                                $query4 = mysqli_query($koneksi, "SELECT * FROM login");
                                $jumlahAkun = mysqli_num_rows($query4);
                                ?>
                                <span class="display-4 fw-bold mb-3"><?= $jumlahAkun; ?></span>
                                <a href="admin-employee.php" class="text-decoration-none fs-6">Go to Employee</a>
                            </div>
                            <?php
                                $total = 0;
                                $query6 = mysqli_query($koneksi, "SELECT * FROM data_karyawan");
                                while($gaji = $query6->fetch_array()){
                                    $total += $gaji['gaji'];
                                }
                            ?>
                            <div class="card rounded-4 shadow border-0 col d-flex p-4 gap-1">
                                <div class="d-flex justify-content-between">
                                    <span class="fs-5">Payroll</span>
                                    <i class="material-icons-round card-icon two rounded-2 p-3">&#xef63</i>
                                </div>
                                <span class="display-4 fw-bold mb-3">Rp <?php echo $total; ?></span>
                                <a href="" class="text-decoration-none fs-6">Go to Payroll</a>
                            </div>
                            <div class="card rounded-4 shadow border-0 col d-flex p-4 gap-1">
                                <div class="d-flex justify-content-between">
                                    <span class="fs-5">Revenue</span>
                                    <i class="material-icons-round card-icon three rounded-2 p-3">&#xe8e5</i>
                                </div>
                                <span class="display-4 fw-bold mb-3">$ 2.5M</span>
                                <a href="" class="text-decoration-none fs-6">Go to Revenue</a>
                            </div>
                        </div>
                    </div>

                    <!-- Row Two -->
                    <div class="d-flex row p-2 gap-4 flex-column flex-xxl-row">
                        <!-- Top Employee -->
                        <div class="container col rounded-4 shadow border-0 d-flex flex-column p-2">
                            <h3 class="fw-bold p-3 header">Top Employee</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="d-flex col px-2 py-1">
                                        <th class="col-6 text">Employee Name</th>
                                        <th class="col-6 text">Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                
                                    $i = 1;
                                    $top = $query5;
                                    foreach($top as $karyawan):
                                
                                ?>
                                    <tr class="d-flex col px-2 py-1">
                                        <td class="col-6 d-flex align-items-center gap-3 ">
                                            <img id="profile-img"
                                                src="<?php echo "../../assets/user-img/".$karyawan['foto'] ?>"
                                                class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                            <span class="text"><?= $karyawan['nama']; ?></span>
                                        </td>
                                        <td class="col-6 d-flex align-items-center">
                                            <span class="text"><?= $karyawan['posisi']; ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a href="admin-employee.php" class="text-decoration-none fs-6 p-3 mt-auto">Go to
                                Employee</a>
                        </div>

                        <!-- Verification -->
                        <div class="container col col-xxl-5 rounded-4 shadow border-0 d-flex flex-column p-2">
                            <h3 class="fw-bold p-3 header">Verification</h3>
                            <table class="table table-borderless">

                                <tbody height="250px" h class="d-flex flex-column gap-2 px-2 overflow-auto">
                                    <?php 
                                    $i = 1;
                                    $antrianVerifikasi = $query3;
                                    foreach($antrianVerifikasi as $antrian):

                                ?>
                                    <?php
                                                require '../../php/koneksi.php';
                                                $getkode = $antrian['kode_karyawan'];
                                                $konek = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE kode_karyawan = '$getkode'");
                                                $cek = mysqli_fetch_assoc($konek);
                                ?>
                                    <tr class="d-flex align-items-center p-2 rounded-2 shadow-sm background">
                                        <td class="col d-flex align-items-center gap-3 ">
                                            <img id="profile-img"
                                                src="<?php echo "../../assets/user-img/".$cek['foto'] ?>"
                                                class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                            <span class="text"><?= $antrian['username']; ?></span>
                                        </td>
                                        <td class="col-4 d-flex justify-content-center gap-1">
                                            <button type="button" href="#"
                                                class="btn btn-warning d-flex align-items-center p-md-2 p-1"
                                                title="accept">
                                                <span>Requested</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- <tr class="d-flex align-items-center p-2 rounded-2 shadow-sm background">
                                        <td class="col d-flex align-items-center gap-3 ">
                                            <img id="profile-img"
                                                src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                                class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                            <span class="text">Bruno Fernandes</span>
                                        </td>
                                        <td class="col-4 d-flex justify-content-center gap-1">
                                            <button type="button" href="#"
                                                class="btn btn-warning d-flex align-items-center p-md-2 p-1"
                                                title="accept">
                                                <span>Requested</span>
                                            </button>
                                        </td>
                                    </tr> -->
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <a href="admin-verification.php" class="text-decoration-none fs-6 p-3 mt-auto">Go to
                                Verification</a>
                        </div>
                    </div>
                </div>

                <!-- Container Two -->
                <div class="d-flex row flex-column col pt-2 pb-3 px-3 gap-4">
                    <!-- Profile -->
                    <div class="container col rounded-4 shadow border-0 d-flex flex-column p-3 gap-5">
                        <h3 class="fw-bold p-3 header d-flex justify-content-center">Profile</h3>
                        <div class="d-flex flex-column align-items-center gap-3">
                            <img id="profile-img-container" src="<?php echo "../../assets/user-img/".$query['foto'] ?>"
                                class="rounded-circle bg-light border shadow-sm" alt="Avatar" />
                        </div>
                        <div class="d-flex flex-column gap-1 py-3">
                            <div class="d-flex gap-1 background">
                                <div class="d-flex align-items-center p-3">
                                    <i class="material-icons-round">&#xe85e</i>
                                </div>
                                <div class="d-flex col flex-column justify-content-center px-2">
                                    <span class="fs-6 opacity-75">Name</span>
                                    <span class="fs-6 fw-semibold"><?= strtoupper($query['nama']); ?></span>
                                </div>
                            </div>
                            <div class="d-flex gap-1 background">
                                <div class="d-flex align-items-center p-3">
                                    <i class="material-icons-round">&#xe8f9</i>
                                </div>
                                <div class="d-flex col flex-column justify-content-center px-2">
                                    <span class="fs-6 opacity-75">Position</span>
                                    <span class="fs-6 fw-semibold"><?= strtoupper($query['posisi']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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