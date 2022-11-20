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
    <link rel="stylesheet" href="../../assets/styles/main.css">
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
                <a href="admin-dashboard.html" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe9b0</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="admin-employee.html" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xea67</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Employee</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="admin-verification.html" class="text-decoration-none p-1 px-lg-3 py-lg-2 d-flex rounded-3">
                    <i class="material-icons-round fs-2 menu-icon">&#xe6b1</i>
                    <div class="align-items-center d-none d-md-none d-lg-flex">
                        <span class="text-sidebar">Verification</span>
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
                <a href="../../index.html" onclick="return confirm('Apakah anda ingin logout')"
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
                            src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                            class="rounded-circle bg-light shadow-sm col-2" alt="Avatar" />
                        <span class="d-none d-lg-flex flex-column align-items-start me-1 ">
                            <span class="fs-6 fw-semibold text">Roberto Firmino</span>
                            <span class="fs-6 text opacity-75">CEO</span>
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
                            <a class=" dropdown-item active" href="admin-dashboard.html">Home</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../profile.html">Profile</a>
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
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Payroll</li>
                    </ol>
                </div>
            </div>

            <!-- Content Body -->
            <div class="d-flex  flex-column mx-0 mx-lg-4 px-md-1 gap-3">
                <!-- Payroll List -->
                <div class="flex-container rounded-4 shadow border-0 p-2">
                    <div class="d-flex flex-column flex-sm-row col p-3 gap-3">
                        <!-- Search Bar -->
                        <div class="d-flex col">
                            <form class="d-flex align-items-center gap-2" action="">
                                <input type="email" class="form-control" id="search" placeholder="Search">
                                <button type="submit" class="btn btn-primary material-icons-round">&#xe8b6</button>
                            </form>
                        </div>
                        <!-- Button Payrol -->
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Add Bonus</button>
                            <!-- Modal Bonus -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content flex-container">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text" id="staticBackdropLabel">Tambahkan Bonus
                                            </h1>
                                            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex flex-column">
                                                <label class="form-label d-flex">Bonus</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text text text-field">Rp</span>
                                                    <input type="text" class="form-control text-success text-field"
                                                        aria-label="Username" placeholder="1.000.000"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success">Run Payroll</button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr class="d-flex col p-1">
                                <th class="col-8 col-sm-4 col-md-3 p-1 align-items-center d-flex text">
                                    Employee Name
                                </th>
                                <th class="col d-none d-md-flex p-1 align-items-center justify-content-center text">
                                    Bonus</th>
                                <th class="col d-none d-md-flex p-1 align-items-center justify-content-center text">
                                    Pajak
                                </th>
                                <th class="col d-none d-sm-flex p-1 align-items-center justify-content-center text">
                                    Gaji Bersih
                                </th>
                                <th class="col d-flex p-1 align-items-center justify-content-center gap-1 text">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-flex col p-1">
                                <td class="col-8 col-sm-4 col-md-3 d-flex gap-2 p-1 align-items-center">
                                    <img id="profile-img"
                                        src="https://cdn.discordapp.com/attachments/1020601540257521674/1037712201202552882/person_filled_FILL0_wght400_GRAD0_opsz48.png"
                                        class="rounded-circle bg-light shadow-sm" alt="Avatar" />
                                    <span class="text">Mohammed Salah</span>
                                </td>
                                <td class="col d-none d-md-flex p-1 align-items-center justify-content-center text">
                                    <span class="text-success">Rp 1.500.000</span>
                                </td>
                                <td class="col d-none d-md-flex p-1 align-items-center justify-content-center text">
                                    <span class="text-danger">Rp 1.100.000</span>
                                </td>
                                <td class="col d-none d-sm-flex p-1 align-items-center justify-content-center text">
                                    <span class="text">Rp 10.400.000</span>
                                </td>
                                <td class="col d-flex p-1 align-items-center justify-content-center gap-1">
                                    <a href="admin-payroll-edit.html" type="button"
                                        class="btn btn-primary d-flex align-items-center p-md-2 p-1" title="edit">
                                        <i class="material-icons-round">&#xe3c9</i>
                                    </a>
                                    <a type="button" class="btn btn-success d-flex align-items-center p-md-2 p-1"
                                        title="delete">
                                        <i class="material-icons-round">&#xe227</i>
                                    </a>
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

    <script src="../../assets/scripts/main.js"></script>
</body>

</html>