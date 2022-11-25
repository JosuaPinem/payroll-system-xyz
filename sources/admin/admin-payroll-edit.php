<!DOCTYPE html>
<html lang="en">

<!-- php config -->
<?php
include '../../php/functions.php';
include '../../php/koneksi.php';

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>
alert('Anda belum login, silahkan login terlebih dahulu!')
</script>";
    header('refresh:0; ../../index.php');
    return false;
}
// lakukan query untuk mendapatkan data personal user yang login
$kode = $_SESSION['kode'];
$akun = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'")

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Google Material -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>Verification</title>
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
                        <img id="profile-img" src="../user-img/<?= $akun['foto'] ?>" class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex col flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= $akun['nama'] ?></span>
                            <span class="fs-6 text opacity-75"><?= $akun['posisi'] ?></span>
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
                            <a class=" dropdown-item" href="admin-dashboard.php">Home</a>
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
                        <a type="button" href="admin-payroll.php" class="d-flex rounded-circle p-1 btn btn-primary align-items-center justify-content-center">
                            <i class="material-icons-round">&#xe5c4</i>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row col align-items-lg-center justify-content-between p-1">
                    <span class="fs-3 fw-bold">Edit Payroll</span>
                    <ol class="breadcrumb my-0 p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-payroll.php">Payroll</a>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex row mx-1 mx-lg-4 gap-4">
                <!-- Payroll Form -->
                <div>
                    <!-- php config untuk mendapatkan data gaji karyawan yang sedang di edit -->
                    <?php
                    $kodeURL = $_GET['kode'];
                    $query = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kodeURL'");
                    $query2 = query("SELECT * FROM daftar_gaji WHERE kode_karyawan = '$kodeURL'");
                    ?>
                    <form action="" method="post" class="form container rounded-3 d-flex flex-column col col-sm-8 col-md-7 col-lg-6 col-xxl-5 p-5 gap-5 text-center" enctype="multipart/form-data">
                        <h2 class="fw-bold fs-1">Payroll Form</h2>
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <label class="form-label d-flex">Nama Karyawan</label>
                                <input class="form-control text text-field" type="text" aria-label="readonly input example" value="<?= $query['nama'] ?>" readonly>
                            </div>
                            <div>
                                <label class="form-label d-flex">Posisi Karyawan</label>
                                <input class="form-control text text-field" type="text" aria-label="readonly input example" value="<?= $query['posisi'] ?>" readonly>
                            </div>
                            <div class="d-flex flex-column">
                                <label class="form-label d-flex">Gaji Pokok</label>
                                <div class="input-group">
                                    <span class="input-group-text text text-field">Rp</span>
                                    <!-- php config untuk mendapatkan variabel gaji -->
                                    <?php
                                    $gaji = $query2['gaji_pokok'] * 1000;
                                    ?>
                                    <input type="text" name="gaji" class="salary form-control text text-field" aria-label="Salary" value=<?= $gaji ?> readonly>
                                    <button type="button" id="edit-salary" class="btn btn-primary d-flex align-items-center p-md-2 p-1" title="edit">
                                        <i class="material-icons-round">&#xe3c9</i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <label class="form-label d-flex">Bonus</label>
                                <div class="input-group">
                                    <span class="input-group-text text text-field">Rp</span>
                                    <!-- php config untuk mendapatkan variabel bonus -->
                                    <?php $bonus = $query2['bonus'] * 1000; ?>
                                    <input type="text" name="bonus" class="salary form-control text-success text-field" aria-label="Bonus" value=<?= $bonus ?>>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <label class="form-label d-flex">Pajak</label>
                                <div class="input-group">
                                    <span class="input-group-text text text-field">Rp</span>
                                    <!-- php config untuk mendapatkan variabel pajak -->
                                    <?php
                                    $pajak = $query2['pajak'] * 1000;
                                    ?>
                                    <input type="text" name="pajak" class="form-control text-danger text-field" aria-label="Tax" value="<?= number_format($pajak, 0, ".", "."); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <input type="submit" value="Simpan" name="updateGaji" class="btn btn-primary px-4 py-2 mb-3">
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

    <script src="../../assets/script/main.js"></script>
</body>

</html>

<!-- php config untuk update gaji -->
<?php
if (isset($_POST['updateGaji'])) {
    if (!isset($_POST['gaji'])) {
        $gaji = $query2['gaji_pokok'];
    } else {
        $gaji = $_POST['gaji'] / 1000;
    }
    if (!isset($_POST['bonus'])) {
        $bonus = $query['bonus'];
    } else {
        $bonus = $_POST['bonus'] / 1000;
    }
    $pajak = ($gaji * 0.05);
    $gajiBersih = $gaji - $pajak + $bonus;
    // update data
    $updateGaji = mysqli_query($koneksi, "UPDATE daftar_gaji SET gaji_pokok = '$gaji', bonus = '$bonus', pajak = '$pajak', gaji_bersih = '$gajiBersih' WHERE kode_karyawan = '$kodeURL'");
    $updateGaji .= mysqli_query($koneksi, "UPDATE karyawan_tetap SET gaji = '$gaji' WHERE kode_karyawan = '$kodeURL'");
    if ($updateGaji) {
        echo "<script>
                alert('Data gaji sudah diperbarui');window.location='admin-payroll.php';
              </script>";
    }
}
?>