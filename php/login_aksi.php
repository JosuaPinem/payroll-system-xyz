<?php
    // session_start();
    // include 'koneksi.php';
    // // Pengambilan data dari form login
    // $user = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    // $pass = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

    //  // cek apakah ada kolom yang tidak terisi
    // if($user == "" || $pass == ""){
    //         $_SESSION['login'] = true;
    //         $_SESSION['posisi'] = " ";

    //         session_start();
    //         $_SESSION = [];
    //         session_unset();
    //         session_destroy();
    //         echo "<script>
    //                 alert('Pastikan semua kolom sudah terisi');
    //                 document.location.href = '../index.php';
    //             </script>";
    // }

    // // cek apakah username dan password sudah terverifikasi
    // $cekVerifikasiAkun = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$user'");
    // if(mysqli_num_rows($cekVerifikasiAkun)=== 1){
    //         $_SESSION['login'] = true;
    //         $_SESSION['posisi'] = " ";

    //         session_start();
    //         $_SESSION = [];
    //         session_unset();
    //         session_destroy();
    //         echo "<script>
    //                 alert('Akun anda sedang dalam tahap verifikasi, silahkan tunggu atau hubungi admin!');
    //                 document.location.href = '../index.php';
    //             </script>";
    // }

    // // cek apakah username dan password sudah terdaftar
    // $cekRegistrasiAkun = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$user'");
    // if(mysqli_num_rows($cekRegistrasiAkun) === 0){
    //         $_SESSION['login'] = true;
    //         $_SESSION['posisi'] = " ";

    //         session_start();
    //         $_SESSION = [];
    //         session_unset();
    //         session_destroy();
    //         echo "<script>
    //                 alert('Akun anda belum terdaftar!');
    //                 document.location.href = '../index.php';
    //             </script>";
    // }

    // // proses login

    // $ambil = mysqli_fetch_assoc($cekRegistrasiAkun);

    // // mengambil data kode 
    // $kode = $ambil['kode_karyawan'];

    // // cek apakah password salah
    // if($pass != password_verify($pass, $ambil['password'])){
    //         $_SESSION['login'] = true;
    //         $_SESSION['posisi'] = " ";

    //         $_SESSION = [];
    //         session_unset();
    //         session_destroy();
    //         echo "<script>
    //                 alert('Password yang anda masukkan salah!');
    //             </script>";
    //             header('Location:../index.php');
    // }

    // //cek posisi
    // $jabatan='';
    // if($ambil['posisi'] == "karyawan"){
    //     $jabatan = "karyawan";
    // }else{
    //     $jabatan = "admin";
    // }
    // // Jika semua benar, maka login
    // if($ambil){
    //     if($user = $ambil['username']){
    //         if($pass = password_verify($pass, $ambil['password'])){
    //             if($ambil['posisi'] == $ambil['posisi']){
    //                 if($ambil['posisi'] == "karyawan"){
    //                     header("location:../Source/lo.php");
    //                     $_SESSION['login'] = true;
    //                     $_SESSION['posisi'] = "karyawan";
    //                     $_SESSION['kode'] = $kode;
    //                     exit;
    //                 }else if($ambil['posisi'] == "hrd" || $ambil['posisi'] == "ceo"){
    //                     header("location:../Source/admin-dashboard.php");
    //                     $_SESSION['login'] = true;
    //                     $_SESSION['posisi'] = $ambil['posisi'];
    //                     $_SESSION['kode'] = $kode;
    //                     exit;
    //                 }    
    //             }
                
    //         }
    //     }
    // }

session_start();
include 'koneksi.php';
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    $password = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['password']))));
    
    // cek apakah ada kolom yang kosong
    if($username == "" || $password == ""){
        echo "<script>
                alert('Pastikan semua kolom sudah terisi');
              </script>";
        header('refresh:0; ../index.php');
        return false;
    }

    // cek apakah akun sudah terverifikasi
    $cekVerifikasiAkun = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$username'");
    if(mysqli_num_rows($cekVerifikasiAkun) == 1){
        echo "<script>
                alert('Akun anda sedang dalam tahap verifikasi, silahkan tunggu konfirmasi dari admin!')
              </script>";
        header('refresh:0; ../index.php');
        return false;
    }

    // cek apakah username tidak ada di database
    $cekAkun = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");

    if(mysqli_num_rows($cekAkun) == 0){
        echo "<script>
                alert('Username anda tidak ditemukan, silahkan daftar terlebih dahulu')
              </script>";
        header('refresh:0; ../index.php');
        return false;
    }

    // login 
    $login = mysqli_fetch_assoc($cekAkun);

    // cek apakah password salah
    if($password != password_verify($password, $login['password'])){
        echo "<script>
                alert('Password yang anda masukkan salah!');
              </script>";
        header('refresh:0; ../index.php');
    }

    $kode = $login['kode_karyawan'];

    if($login){
        if($username = $login['username']){
            if($password = password_verify($password, $login['password'])){
                if($login['posisi'] = $login['posisi']){
                    if($login['posisi'] == "karyawan"){
                        $_SESSION["karyawan"] = true;
                        header("refresh:0; ../sources/employee/employee-dashboard.php?user=$username&kode=$kode");
                        return false;
                    }else{
                        $_SESSION["admin"] = true;
                        header("refresh:0; ../sources/admin/admin-dashboard.php?user=$username&kode=$kode");
                        return false;
                    }
                }
            }
        }
    }
}
?>