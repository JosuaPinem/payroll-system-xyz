<?php 
include 'koneksi.php';
include 'functions.php';

if(isset($_POST['verifikasi'])){
    $username = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    $email = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['email']))));
    $jabatan = mysqli_real_escape_string($koneksi, trim(htmlspecialchars($_POST['jabatan'])));
    $gaji = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['gaji']))));

    // cek apakah ada kolom yang kosong
    if($username == " " || $email == " " || $jabatan == " " || $gaji == " "){
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

    // buat sebuah logika, jika posisi adalah admin, ceo, dan hrd, maka user role adalah admin
    // dan jika selain itu, maka posisinya adalah karyawan
    if($jabatan == "CEO" || $jabatan == "Admin" || $jabatan == "HRD"){
        $role = "admin";
    }else {
        $role = "karyawan";
    }

    // insert data menuju tabel user supaya bisa login
    $verifikasiAkun = mysqli_query($koneksi, "INSERT INTO login 
                                        VALUES(null,'$kode', '$username', '$password', '$role', '$email')");
    // insert data gaji menuju tabel data karyawan
    $verifikasiAkun .= mysqli_query($koneksi, "UPDATE data_karyawan SET gaji = $gaji WHERE kode_karyawan = '$kode'");

    // insert data nama pekerjaan user menuju tabel data karyawan
    $verifikasiAkun .= mysqli_query($koneksi, "UPDATE data_karyawan SET posisi = '$jabatan' WHERE kode_karyawan = '$kode' ");


    // upload semua data lengkap menuju tabel karyawan_lengkap
    $data = query("SELECT * FROM data_karyawan WHERE kode_karyawan = '$kode'");
    $nama = $data['nama'];
    $nip = $data['nip'];
    $tanggal = $data['tanggal'];
    $tempat = $data['tempat'];
    $alamat = $data['alamat'];
    $foto = $data['foto'];
    $gender = $data['jenis_kelamin'];

    $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO karyawan_tetap
                                               VALUES 
                                               (null, '$kode', '$nama', '$nip', '$tanggal', '$tempat', '$alamat', '$foto', '$jabatan', '$gender', '$gaji')");
                                               
    if($verifikasiAkun){
        // delete data dari tabel antrian_registrasi
        $deleteData = mysqli_query($koneksi, "DELETE FROM verify WHERE username = '$username'");
        $deletData .= mysqli_query($koneksi, "DELETE FROM data_karyawan WHERE kode_karyawan = '$kode'");
            echo "<script>
                    alert('Akun telah berhasil diverifikasi, silahkan login')
                </script>";
                header("refresh:0; ../sources/admin/admin-verification.php");
        return false;
    }
}

?>