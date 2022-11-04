<?php 
include 'koneksi.php';

if(isset($_POST['verifikasi'])){
    $username = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    $email = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['email']))));
    $jabatan = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['jabatan']))));

    // cek apakah ada kolom yang kosong
    if($username == " " || $email == " " || $jabatan == " "){
            echo "<script>
                    alert('Pastikan semua kolom sudah terisi')
                </script>";
        return false;
    }

    // buka enkripsi password
    $ambilData = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$username'");
    $data = mysqli_fetch_assoc($ambilData);

    $password = $data['password'];
    $kode= $data['kode_karyawan'];

    // insert data menuju tabel user supaya bisa login
    $verifikasiAkun = mysqli_query($koneksi, "INSERT INTO login 
                                        VALUES(null,'$kode', '$username', '$password', '$jabatan', '$email')");
    
    if($verifikasiAkun){
        // delete data dari tabel antrian_registrasi
        $deleteData = mysqli_query($koneksi, "DELETE FROM verify WHERE username = '$username'");
            echo "<script>
                    alert('Akun telah berhasil diverifikasi, silahkan login')
                </script>";
                header("refresh:0; ../index.php");
        return false;
    }
}

?>