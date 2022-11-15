<?php 
    session_start();
    require '../../php/functions.php';
    include '../../php/koneksi.php';
    if(!isset($_SESSION['admin'])){
        echo "<script>
                alert('Anda belum login, silahkan login terlebih dahulu!')
            </script>";
        header('refresh:0; ../index.php');
        return false;
    }
    $kode = $_GET['user'];
    $kode2 = $_SESSION['kode'];
    $query = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");

    $query2 = query("SELECT * FROM login WHERE kode_karyawan = '$kode'");
    $query3 = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode2'");
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
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/style/main.css">
    <title>XYZ Company</title>
</head>

<!-- PHP Config -->


<body class="d-flex">
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
                            src="../user-img/<?php echo $query3['foto'] ?>"
                            class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex col flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text"><?= strtoupper($query3['nama']); ?></span>
                            <span class="fs-6 text opacity-75"><?= strtoupper($query3['nama']); ?></span>
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
                            <a class=" dropdown-item" href="./admin-dashboard.php">Home</a>
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
        <div class="d-flex flex-column px-2 gap-3">
            <!-- Content Header -->
            <div class="d-flex my-2 mx-0 mx-lg-4 px-1 gap-1">
                <div class="p-2 d-flex align-items-center">
                    <div class="d-flex">
                        <a type="button" href="./admin-employee-list.php"
                            class="d-flex rounded-circle p-1 btn btn-primary align-items-center justify-content-center">
                            <i class="material-icons-round">&#xe5c4</i>
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-row col align-items-lg-center justify-content-between p-1">
                    <span class="fs-3 fw-bold">Edit Data</span>
                    <ol class="d-flex my-0 breadcrumb p-lg-2">
                        <li class="breadcrumb-item"><a class="text-decoration-none"
                                href="admin-employee-list.html">Employee List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Employee Profile</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex mx-1 mx-lg-4 mb-4 p-2 justify-content-center">
                <!-- Profile -->
                <div class="flex-container d-flex flex-column gap-3 p-4 rounded-4 ">
                    <!-- My Profile -->
                    <div class="d-flex justify-content-center">
                        <h2 class="fw-bold header">User Profile</h2>
                    </div>

                    <!-- Profile Picture -->
                    <div class="d-flex justify-content-center p-3">
                        <div class="d-flex position-relative">
                            <img id="profile-img-container"
                                src="../user-img/<?php echo $query['foto'] ?>"
                                class="rounded-circle bg-light col-2 border " alt="Avatar" />
                        </div>

                    </div>

                    <!-- Profile Details -->
                    <div class="d-flex flex-column gap-3 mt-2">
                        <div class="d-flex">
                            <h4 class="fw-semibold header">
                                Personal Information
                            </h4>
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-3 ">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex align-items-center">
                                        <i class="material-icons-round fs-1">&#xe85e</i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold">Name</span>
                                        <input class="form-control text text-field profile-info" type="text"
                                            value="<?= $query['nama']; ?>" aria-label="readonly input example" readonly>
                                    </div>
                                </div>
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex gap-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xe0be</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Email</span>
                                            <input class="form-control text text-field profile-info" type="text"
                                                value="<?= $query2['email']; ?>" aria-label="readonly input example" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex gap-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xf045</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">NIP</span>
                                            <input class="form-control text text-field profile-info" type="text"
                                                value="<?= $query['nip']; ?>" aria-label="readonly input example" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex align-items-center">
                                        <i class="material-icons-round fs-1">&#xe878</i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold">Birth Date</span>
                                        <input class="form-control text text-field profile-info" id="datepicker"
                                            type="text" value="<?= $query['tanggal']; ?>" aria-label="readonly input example" readonly>
                                    </div>
                                </div>
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex gap-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xe4eb</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Gender</span>
                                            <select class="form-select text text-field profile-info"
                                                aria-label="Default select example" disabled>
                                                <option><?= $query['jenis_kelamin']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                    <div class="d-flex gap-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xe0c8</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Location</span>
                                            <input class="form-control text text-field profile-info" type="text"
                                                value="<?= $query['alamat']; ?>" aria-label="readonly input example" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex flex-column gap-3 mt-2">
                        <div class="d-flex">
                            <h4 class="fw-semibold header">
                                Company Information
                            </h4>
                            <a class="btn btn-primary ms-auto d-flex p-2" id="edit-profile">
                                <i class="material-icons-round">&#xe3c9</i>
                            </a>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="d-flex flex-column flex-md-row gap-3 ">
                                <div class="d-flex col flex-column gap-3">
                                    <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xe8f9</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Position</span>
                                            <?php 
                                                $namaPosisi="";
                                                if($query['posisi'] == "Admin"){
                                                    $namaPosisi = "admini";
                                                }else if ($query['posisi'] == "CEO") {
                                                    $namaPosisi = "CEO";
                                                }else if ($query['posisi'] == "HRD") {
                                                    $namaPosisi = "HRD";
                                                }else if ($query['posisi'] == "Android Developer") {
                                                    $namaPosisi = "Android Developer";
                                                }else if ($query['posisi'] == "IT Analyst") {
                                                    $namaPosisi = "IT Analyst";
                                                }else if ($query['posisi'] == "Web Developer") {
                                                    $namaPosisi = "Web Developer";
                                                }else if ($query['posisi'] == "Data Analyst") {
                                                    $namaPosisi = "Data Analyst";
                                                }
                                                ?>
                                            <select name="position" class="user-edit form-select text text-field profile-info"
                                                aria-label="Default select example" disabled>
                                                <option value="<?= $query['posisi']; ?>">
                                                        <?= $namaPosisi; ?>
                                                    </option>
                                                <option  value="Admin">Admin</option>
                                                <option  value="Android Developer">Android Developer</option>
                                                <option  value="CEO">CEO</option>
                                                <option  value="Data Analyst">Data Analyst</option>
                                                <option  value="HRD">HRD</option>
                                                <option  value="IT Security">IT Security</option>
                                                <option  value="Web Developer">Web Developer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex col flex-column gap-3">
                                    <div class="d-flex px-3 py-2 gap-4 background rounded-4">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons-round fs-1">&#xf041</i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold">Salary</span>
                                            <div class="input-group d-flex gap-2">
                                                <span class="input-group-text text text-field profile-info">Rp</span>
                                                <input class="user-edit form-control text text-field profile-info" name="gaji"
                                                    type="text" value="<?= $query['gaji']; ?>" aria-label="readonly input example"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <button type="submit" name="simpan" href="#"
                                    class="btn btn-primary my-2 me-auto p-2 gap-2 d-none" id="save-profile">
                                    <i class="material-icons-round">&#xe161</i>
                                    <span>Simpan</span>
                            </button>
                        </form>
                    </div>

                </div>
                <!-- Bootstrap JS -->
                <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

                <!-- JQuery Library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                <!-- Bootstrap Datepicker -->
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

                <!-- Custom JS -->
                <script src="../../assets/script/main.js"></script>
</body>
<?php
    if(isset($_POST['simpan'])){
        $posisi = @$_POST['position'];
        $gaji = $_POST['gaji'];
        if($posisi === "admin" || $posisi === "ceo" || $posisi === "hrd"){
            $role = "admin";
        }else{
            $role = "karyawan";
        }
        $update = mysqli_query($koneksi, "UPDATE karyawan_tetap SET posisi = '$posisi', gaji = '$gaji' WHERE kode_karyawan = '$kode'");
        $update .= mysqli_query($koneksi, "UPDATE login SET posisi = '$role' WHERE kode_karyawan = '$kode'");
        
    }
?>
</html>