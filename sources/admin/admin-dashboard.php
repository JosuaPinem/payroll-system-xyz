<!-- php script -->
<?php 
    session_start();
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
$query = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'");
$user = mysqli_fetch_assoc($query);

// lakukan query untuk mengambil data dari tabel login mengambil posisi/jabatan
$query2 = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");
$user2 = mysqli_fetch_assoc($query2);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../assets/style/style.css">
    <title>XYZ Payroll</title>
</head>

<body>
    <main class="main-container d-flex">
        <nav class="sidebar col-auto bg-white" id="sidebar-nav">
            <div class="header-box p-2 mt-4 mb-5 align-items-center d-none d-md-none d-lg-flex gap-2 position-relative">
                <div class="logo">
                    <svg width="48px" height="48px" viewBox="0 0 374 376" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M67.1713 27.5684L14.8287 27.5684C13.1103 27.5711 11.5856 29.8048 12.7067 31.1028L157.002 197.927C157.796 198.846 159.026 198.84 159.832 197.927L186.003 167.531C186.667 166.779 187.362 166.169 186.71 165.41L69.2933 28.2753C68.9126 27.8323 67.7564 27.5675 67.1713 27.5684Z"
                            fill="#0D6EFD" />
                        <path
                            d="M300.977 347.686L353.32 347.686C355.027 347.693 355.853 346.156 354.734 344.859L236.415 205.414C235.621 204.494 234.383 204.509 233.585 205.414L207.414 235.81C206.759 236.552 206.058 237.173 206.707 237.93L298.855 346.98C299.236 347.424 300.394 347.684 300.977 347.686Z"
                            fill="#0D6EFD" />
                        <path
                            d="M297.829 27.5684C297.249 27.57 296.087 27.8365 295.707 28.2753L25.506 340.717C24.3836 342.012 25.2112 343.549 26.9206 343.544H79.2632C79.8424 343.543 81.0049 343.276 81.3852 342.838L351.586 30.3959C352.708 29.101 351.881 27.5635 350.171 27.5684L297.829 27.5684Z"
                            fill="#0D6EFD" />
                        <path
                            d="M353.783 28.9921C354.923 27.7018 353.73 25.8556 352.005 25.8554L97.3312 25.4232C95.615 25.4229 94.9214 28.0457 96.0442 29.3403L130.268 68.9191C130.649 69.3581 131.608 70.061 132.19 70.0611L316.686 70.4177C317.261 70.4178 317.375 69.923 317.755 69.4926L353.783 28.9921Z"
                            fill="#0D6EFD" />
                        <path
                            d="M234.027 304.249C233.647 303.812 232.685 303.107 232.105 303.107L59.5807 303.546C59.0069 303.546 58.9625 303.045 58.5833 303.474L22.5559 343.974C21.4189 345.259 22.6132 347.111 24.3334 347.111L267.036 346.748C268.748 346.748 269.371 345.117 268.251 343.828L234.027 304.249Z"
                            fill="#0D6EFD" />
                    </svg>
                </div>
                <span id="brand-text" class="fs-4 fw-bold">XYZ Company</span>
                <button
                    class="btn btn-primary toggle p-1 text-white rounded-circle d-none d-md-none d-lg-flex position-absolute">
                    <span class="material-symbols-outlined fs-5 rounded-circle toggle-icon">
                        chevron_left
                    </span>
                </button>
            </div>
            <ul id="menu-bar" class="fs-6 p-1 p-lg-2 d-flex flex-row flex-lg-column gap-4 justify-content-center">
                <li class="active">
                    <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex "><span
                            class="material-symbols-outlined fs-2 menu-icon"> grid_view </span>
                        <div class="text align-items-center d-none d-md-none d-lg-flex">
                            <span class="text-sidebar">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex"><span
                            class="material-symbols-outlined fs-2 menu-icon"> badge </span>
                        <div class="text align-items-center d-none d-md-none d-lg-flex">
                            <span class="text-sidebar">Employee</span>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex"><span
                            class="material-symbols-outlined fs-2  menu-icon"> monitoring </span>
                        <div class="text align-items-center d-none d-md-none d-lg-flex">
                            <span class="text-sidebar">Statistic</span>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex"><span
                            class="material-symbols-outlined fs-2 menu-icon"> wallet </span>
                        <div class="text align-items-center d-none d-md-none d-lg-flex">
                            <span class="text-sidebar">Payroll</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="content d-flex flex-column gap-3 mb-5">
            <nav id="topbar" class="navbar d-flex px-1 px-lg-4 bg-white">
                <div class="d-flex">
                    <div class="d-flex align-items-center gap-3">
                        <div class="logo d-flex d-lg-none">
                            <svg width="40px" height="40px" viewBox="0 0 374 376" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M67.1713 27.5684L14.8287 27.5684C13.1103 27.5711 11.5856 29.8048 12.7067 31.1028L157.002 197.927C157.796 198.846 159.026 198.84 159.832 197.927L186.003 167.531C186.667 166.779 187.362 166.169 186.71 165.41L69.2933 28.2753C68.9126 27.8323 67.7564 27.5675 67.1713 27.5684Z"
                                    fill="#0D6EFD" />
                                <path
                                    d="M300.977 347.686L353.32 347.686C355.027 347.693 355.853 346.156 354.734 344.859L236.415 205.414C235.621 204.494 234.383 204.509 233.585 205.414L207.414 235.81C206.759 236.552 206.058 237.173 206.707 237.93L298.855 346.98C299.236 347.424 300.394 347.684 300.977 347.686Z"
                                    fill="#0D6EFD" />
                                <path
                                    d="M297.829 27.5684C297.249 27.57 296.087 27.8365 295.707 28.2753L25.506 340.717C24.3836 342.012 25.2112 343.549 26.9206 343.544H79.2632C79.8424 343.543 81.0049 343.276 81.3852 342.838L351.586 30.3959C352.708 29.101 351.881 27.5635 350.171 27.5684L297.829 27.5684Z"
                                    fill="#0D6EFD" />
                                <path
                                    d="M353.783 28.9921C354.923 27.7018 353.73 25.8556 352.005 25.8554L97.3312 25.4232C95.615 25.4229 94.9214 28.0457 96.0442 29.3403L130.268 68.9191C130.649 69.3581 131.608 70.061 132.19 70.0611L316.686 70.4177C317.261 70.4178 317.375 69.923 317.755 69.4926L353.783 28.9921Z"
                                    fill="#0D6EFD" />
                                <path
                                    d="M234.027 304.249C233.647 303.812 232.685 303.107 232.105 303.107L59.5807 303.546C59.0069 303.546 58.9625 303.045 58.5833 303.474L22.5559 343.974C21.4189 345.259 22.6132 347.111 24.3334 347.111L267.036 346.748C268.748 346.748 269.371 345.117 268.251 343.828L234.027 304.249Z"
                                    fill="#0D6EFD" />
                            </svg>
                        </div>
                        <span id="brand-text" class="fs-4 fw-bold d-none d-sm-flex d-lg-none">XYZ Company</span>
                    </div>
                    <div class="d-none d-lg-flex px-2 px-lg-2 align-items-center">
                        <span class="fs-4 greetings ">Good</span>
                    </div>
                </div>
                <div class="dropdown d-flex">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="profile-img" src="<?php echo "../../assets/user-img/".$user['foto'] ?>"
                            class="rounded-circle shadow-2 border-1 " alt="Avatar" />
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">

                        <li>
                            <a class="dropdown-item d-flex flex-column">
                                <span class="fs-5"><?= $user['nama']; ?></span>
                                <span class="fs-5 fw-bold text-danger"><?= $user2['posisi']; ?></span>
                            </a>
                        </li>
                        <li><a class="dropdown-item active" href="#">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">Help</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../../php/logoutController.php"
                                onclick="return confirm('Apakah anda ingin logout')">Sign Out</a></li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column gap-4 px-3">
                <div class="d-flex header mx-0 mx-lg-4 px-1">
                    <div class="d-flex flex-column px-1 px-lg-2">
                        <span class="fs-3 fw-bold">Dashboard</span>
                        <span class="fs-6">Welcome to XYZ Company</span>
                    </div>
                </div>
                <div class="d-flex col flex-column flex-xxl-row mx-1 mx-lg-4 gap-3">
                    <div class="col-xxl-8 d-flex flex-column p-2 gap-4">
                        <div class="row col gap-3">
                            <div class="card col d-flex p-3 gap-4">
                                <span class="fs-5">Employee</span>
                                <!-- kode php untuk mengetahui berapa jumlah employee -->
                                <?php 
                                $query4 = mysqli_query($koneksi, "SELECT * FROM login");
                                $jumlahAkun = mysqli_num_rows($query4);
                                ?>
                                <span class="display-5 fw-bold"><?= $jumlahAkun; ?></span>
                                <span>Go to Employee</span>
                            </div>
                            <div class="card col d-flex p-3 gap-4">
                                <span class="fs-5">Payroll</span>
                                <span class="display-5 fw-bold">$ 2.5 M</span>
                                <span>Go to Payroll</span>
                            </div>
                            <div class="card col d-flex p-3 gap-4">
                                <span class="fs-5">Revenue</span>
                                <span class="display-5 fw-bold">$ 2.5 M</span>
                                <span>Go to Revenue</span>
                            </div>
                        </div>
                        <div class="card row gap-3">
                            <div class="d-flex flex-column p-3">
                                <span class="fs-2 mb-4">Top Employee</span>
                                <div class="user d-flex flex-column gap-3 mb-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <img id="user-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1020748599367311490/My_project.jpg"
                                            class="rounded-circle shadow-4" alt="Avatar" />
                                        <span class="fs-6">Afiq Alghazali</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <img id="user-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1020748599367311490/My_project.jpg"
                                            class="rounded-circle shadow-4" alt="Avatar" />
                                        <span class="fs-6">Afiq Alghazali</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <img id="user-img"
                                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1020748599367311490/My_project.jpg"
                                            class="rounded-circle shadow-4" alt="Avatar" />
                                        <span class="fs-6">Afiq Alghazali</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex flex-column p-3">
                            <span class="fs-2 mb-4">Pending Verification</span>
                            <div class="user d-flex flex-column gap-3 mb-2">
                                <div class="d-flex align-items-center gap-3">
                                    <!-- ini adalah tabel untuk memberi info mengenai akun yang dipending verifikasinya oleh admin pada halaman dashboard -->
                                    <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Kode Karyawan</th>
                                            <th>Proses</th>
                                        </tr>
                                        <?php 
                                        // lakukan query untuk mengambil data dari tabel verify mengambil karyawan yang perlu diverifikasi
                                        $i = 1;
                                        $query3 = mysqli_query($koneksi, "SELECT * FROM verify");
                                        $rows = [];
                                        while($row= mysqli_fetch_assoc($query3)){
                                            $rows[] = $row; 
                                        }
                                        $antrianVerifikasi = $rows;
                                        foreach($antrianVerifikasi as $antrian):
                                        ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $antrian['username']; ?></td>
                                            <td><?= $antrian['kode_karyawan']; ?></td>
                                            <td>
                                                <a href="../verifikasi.php?user=<?= $antrian['username']; ?>">
                                                    <button class="btn btn-primary">
                                                        Verifikasi
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../assets/scripts/main.js"></script>
</body>

</html>