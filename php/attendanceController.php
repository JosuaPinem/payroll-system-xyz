<?php

session_start();
include 'functions.php';
include 'koneksi.php';

if(isset($_POST['kirim'])){
    // cek apakah ada form yang kosong
    if($_POST['keterangan'] == ""){
        echo "<script>
                alert('Silahkan pilih salah satu')
              </script>";
        header('refresh: 0; ../sources/employee/employee-attendance.php');
        die;
    }

    // cek apakah dia menekan tombol izin, tapi tidak memilih alasan
    if($_POST['keterangan'] == 'permission'){
        echo "<script>
                alert('Silahkan pilih alasan anda izin!')
              </script>";
        header('refresh: 0; ../sources/employee/employee-attendance.php');
        die;        
    }

    // cek apakah dia tidak upload surat ketika izin
    if($_POST['keterangan'] == 'Sick' || $_POST['keterangan'] == "Emergency" || $_POST['keterangan'] == "Other"){
        if($_FILES['surat']['name'] == ""){
            echo "<script>
                    alert('Silahkan upload surat izin anda')
                  </script>";
            header('refresh: 0; ../sources/employee/employee-attendance.php');
            die;        
        }else {
            if (isset($_FILES['surat'])) {
                $validation = array('pdf'); // data yang diperbolehkan
                $nama = $_FILES['surat']['name']; //mendapatkan nama dari file
                $x = explode('.', $nama); //memecah nama file contoh file.jpg maka yang ditangkap jpg
                $ekstensi = strtolower(end($x)); //mengambil ekstensi file b
                $ukuran = $_FILES['surat']['size']; //mendapatkan ukuran file
                $file_tmp = $_FILES['surat']['tmp_name']; //mendapatkan lokasi file sementara
                $ext = pathinfo($nama, PATHINFO_EXTENSION);
        
                // //pengujian file 
                // if(in_array($ekstensi, $validation) == true){
                //     // upload diperbolehkan
                //     // uji jika ukuran file dibawah 1mb
                //     if($ukuran < 1088000){
                //         // jika ukuran file dibawah 1mb
                //         move_uploaded_file($file_tmp, '../sources/surat-izin/'.$namaBaru);
                //     }else{
                //         // jika ukuran file diatas 1mb
                //         echo "<script>alert('Ukuran file terlalu besar');document.location.href = '../sources/employee/employee-attendance.php';</script>";
                //         return false;
                //     }
                // }else{
                //     //ekstensi file yang diuplaod tidak sesuai
        
                //     echo "<srcipt>
                //             alert('Ekstensi file yang diperbolehkan hanya .pdf');
                //             document.location.href = '../sources/employee/employee-attendance.php';
                //         </script>";
                // }
        
                // validasi file yang dikirim
                if(in_array($ext, $validation) == true) {
                    if ($filesize < 2000000) {
                        // membuat nama file sesuai kode karyawan dan tanggal absensi
                        $namaBaru = $kode . '_' . $date . '_' . $nama;
                        move_uploaded_file($file_tmp, '../sources/surat-izin/'.$namaBaru);
                    }else {
                        echo "<script>
                                alert('Maksimal ukuran file adalah 2 Mb!')
                              </script>";
                        header('refresh:0; ../sources/employee/employee-attendance.php');
                        return false;
                    }
                }else {
                    echo "<script>
                            alert('Jenis file yang diperbolehkan adalah .pdf')
                          </script>";
                    header('refresh:0; ../sources/employee/employee-attendance.php');
                    return false;            
                }
            }
        }
    }

    // untuk mendapatkan keterangan absen
    $keterangan = $_POST['keterangan'];

    // untuk mendapatkan kode karyawan
    $kode = $_SESSION['kode'];

    // untuk mendapatkan waktu tanggal melakukan absensi
    date_default_timezone_set('Asia/Jakarta');
    $date = date('d M Y');

    // untuk mendapatkan jam absensi
    $jam = date('H:i');

    // untuk mendapatkan bulan absensi history, supaya bisa reset tiap bulan
    $bulan = date('m');

    // untuk mendapatkan foto profil karyawan
    $fotoQuery = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");
    $foto = $fotoQuery['foto'];

    // cek apakah dia sudah absen di hari yang sama
    $prosesAbsensi = mysqli_query($koneksi, "SELECT * FROM absensi WHERE kode_karyawan = '$kode' AND tanggal = '$date'");
    if(mysqli_num_rows($prosesAbsensi) > 0){
        echo "<script>
                alert('Anda mencapai batas maksimal absensi')
              </script>";
        header('refresh: 0; ../sources/employee/employee-attendance.php');
        return false;
    }
    

    // untuk upload surat
    $surat = $_FILES['surat'];

    // untuk mendapatkan nama employee yang melakukan absensi
    $namaQuery = query("SELECT * FROM karyawan_tetap WHERE kode_karyawan = '$kode'");
    $nama = $namaQuery['nama'];

    // untuk mendapatkan surat
    $surat = $namaBaru;

    // insert data menuju database
    $absen = mysqli_query($koneksi, "INSERT INTO absensi VALUES(NULL, '$kode', '$nama', '$date', '$bulan', '$jam', '$keterangan', '$foto', '$surat')");

    if($keterangan === "Present"){
        $ambil = query("SELECT * FROM top WHERE kode_karyawan = '$kode'");
        $total = $ambil['jumlah_hadir'];
        $jumlahHadir = $total + 1;
        $absen .= mysqli_query($koneksi, "UPDATE top SET jumlah_hadir = '$jumlahHadir' WHERE kode_karyawan = '$kode'");
        // $ambil = query("SELECT * FROM top jumlah_hadir WHERE kode_karyawan = '$kode'");
        // $total =  $ambil['jumlah_hadir'];
        // $total = $total + 1;
        // $absen .= mysqli_query($koneksi, "UPDATE top SET jumlah_hadir='$total' WHERE kode_karyawan='$kode'");
    }
    if($absen){
        echo "<script>
                alert('Anda telah melakukan absensi')
              </script>";
        header('refresh:0; ../sources/employee/employee-dashboard.php');
    }
}

?>