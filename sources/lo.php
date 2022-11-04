<?php 
include '../action/koneksi.php';
session_start();
    if(!isset($_SESSION['login'])){
        header("location:Login.php");
        exit;
    }

    if($_SESSION['posisi'] == "hrd" || $_SESSION['posisi'] == "ceo"){
        header("location:up.php");
        exit;
    }
    $kode = $_SESSION['kode'];
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'");
    $baris =[];
    while($bariss = mysqli_fetch_assoc($dataAdmin)){
        $baris[] = $bariss;
    }

    $tampil = $baris;
?>

<body>
    <h1>Kamu adalah Karyawan</h1>
    <a href="logout.php">LOG_OUT</a>
    <div class="row">
            <div class="col-sm-6">
                <h2>Data Karyawan</h2>
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
</body>