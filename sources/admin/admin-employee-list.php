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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>XYZ Company</title>
</head>

<!-- PHP Config -->

<?php

require '../../php/koneksi.php';
require '../../php/functions.php';
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>
            alert('Anda belum login, silahkan login terlebih dahulu!')
          </script>";
    header('refresh:0; ../../index.php');
    exit;
}

$username = $_SESSION['user'];
$kode = $_SESSION['kode'];

$user1 = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'"); //query untuk mendapatkan data personal pekerja yang login

?>


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
                        <img src="../../assets/img/xyz_logo.svg" height="30px" width="30px" alt="">
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
                        <img id="profile-img" src="../user-img/<?= $user1['foto'] ?>" class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex col flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= strtoupper($user1['nama']); ?></span>
                            <span class="fs-6 text opacity-75"><?= strtoupper($user1['posisi']); ?></span>
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
                            <a class=" dropdown-item active" href="admin-dashboard.php">Home</a>
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
        <div class="d-flex flex-column px-2 gap-3">
            <!-- Content Header -->
            <div class="d-flex my-2 mx-0 mx-lg-4 px-1 gap-1">
                <div class="p-2 d-flex align-items-center">
                    <div class="">
                        <a type="button" href="admin-employee.php" class="d-flex rounded-circle p-1 btn btn-primary align-items-center justify-content-center">
                            <i class="material-icons-round">&#xe5c4</i>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row col align-items-lg-center justify-content-between p-1">
                    <span class="fs-3 fw-bold">Employee List</span>
                    <ol class="breadcrumb my-0 p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-employee.php">Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee List</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex row mx-0 mx-lg-4 px-2 gap-4">
                <!-- Employee's List -->
                <div class="container col rounded-4 shadow border-0 d-flex flex-column p-2">
                    <div class="d-flex align-items-center gap-3 p-3">
                        <form class="d-flex align-items-center gap-2" action="" method="post">
                            <input type="text" class="form-control text-field" id="search" placeholder="Search" name="cari">
                            <button type="submit" name="send" class="btn btn-primary material-icons-round">&#xe8b6</button>
                        </form>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr class="d-flex col px-2 py-1">
                                <th class="col-8 col-sm-4 col-xxl d-flex text">Employee Name</th>
                                <th class="col d-none d-sm-flex justify-content-center align-items-center text">Sex</th>
                                <th class="col d-none d-sm-flex justify-content-center align-items-center text">Salary
                                </th>
                                <th class="col d-none d-sm-flex justify-content-center align-items-center text">Position
                                </th>
                                <th class="col d-flex justify-content-center gap-1 text">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $batas = 7;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "SELECT * FROM karyawan_tetap");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            if (isset($_POST['send'])) {
                                $keyword = $_POST['cari'];
                                $user2 = mysqli_query($koneksi, "SELECT * FROM daftar_gaji 
                                WHERE nama LIKE '%$keyword%'
                                OR jenis_kelamin LIKE '%$keyword%'
                                OR posisi LIKE '%$keyword%'");
                            } else {
                                $user2 = mysqli_query($koneksi, "SELECT * FROM karyawan_tetap limit $halaman_awal, $batas");
                            }
                            while ($u = mysqli_fetch_assoc($user2)) :
                            ?>
                                <tr class="d-flex col px-2 py-1">
                                    <td class="col-8 col-sm-4 col-xxl d-flex gap-2 align-items-center">
                                        <img id="profile-img" src="../user-img/<?= $u['foto'] ?>" class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                        <span class="text"><?= $u['nama']; ?></span>
                                    </td>
                                    <td class="col d-none d-sm-flex justify-content-center align-items-center text">
                                        <span class="text"><?= $u['jenis_kelamin']; ?></span>
                                    </td>
                                    <?php
                                    $gaji = $u['gaji'];
                                    $gaji = $gaji * 1000;
                                    ?>
                                    <td class="col d-none d-sm-flex justify-content-center align-items-center text">
                                        <span class="text-success">Rp <?php echo number_format($gaji, 0, '', '.'); ?></span>
                                    </td>
                                    <td class="col d-none d-sm-flex justify-content-center align-items-center text">
                                        <span class="text"><?= $u['posisi']; ?></span>
                                    </td>
                                    <td class="col d-flex justify-content-center gap-1">
                                        <a href="./admin-employee-edit.php?user=<?= $u['kode_karyawan'] ?>" style="text-decoration:none">
                                            <button type="button" class="btn btn-primary d-flex align-items-center p-md-2 p-1" title="print">
                                                <i class="material-icons">&#xe3c9</i>
                                            </button>
                                        </a>
                                        <a href="../deleteKaryawan.php?user=<?= $u['kode_karyawan'] ?>" style="text-decoration: none;" onclick="return confirm('Apakah anda ingin menghapus data <?= $u['nama'] ?>')">
                                            <button type="button" class="btn btn-danger d-flex align-items-center p-md-2 p-1" title="print">
                                                <i class="material-icons">&#xe872</i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="..." class="d-flex justify-content-center mt-auto">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link d-flex" <?php if ($halaman > 1) {
                                                            echo "href='?halaman=$previous'";
                                                        } ?>><i class="material-icons-round">&#xe408</i></a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) :
                        ?>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link d-flex" <?php if ($halaman < $total_halaman) {
                                                            echo "href='?halaman=$next'";
                                                        } ?>><i class="material-icons-round">&#xe409</i></a>
                        </li>
                    </ul>
                </nav>
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