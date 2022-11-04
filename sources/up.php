<?php 
session_start();
include '../php/koneksi.php';
    if(!isset($_SESSION['login'])){
        header("location:Login.php");
        exit;
    }
    if($_SESSION['posisi'] == "karyawan"){
        header("location:lo.php");
        exit;
    }

    $kode = $_SESSION['kode'];

    // select database dari table antrian
    $cekAntrian = mysqli_query($koneksi, "SELECT * FROM verify");

    $rows = [];
    while($row= mysqli_fetch_assoc($cekAntrian)){
    $rows[] = $row; 
    }


    $cekSemuaAntrian = $rows;

    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'");
    $baris =[];
    while($bariss = mysqli_fetch_assoc($dataAdmin)){
        $baris[] = $bariss;
    }

    $tampil = $baris;
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <h1>Kamu adalah <?php  
    echo $_SESSION['posisi']; ?></h1>
    <a href="../php/logoutController.php">LOG_OUT</a>
    <br>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Hello Admin</h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Antrian Verifikasi Akun</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($cekSemuaAntrian as $user): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <a href="verifikasi.php?user=<?php echo $user['username']; ?>">
                                    <button class="btn btn-success">
                                        Verified
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Data Admin</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($tampil as $user): ?>
                        <tr>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['nip']; ?></td>
                            <td><?= $user['tempat']; ?></td>
                            <td><?= $user['tanggal']; ?></td>
                            <td><?= $user['alamat']; ?></td>
                            <td><img src="<?php echo "Asset/".$user['foto'] ?>" style="width :80px;"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>