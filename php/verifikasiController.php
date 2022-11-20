<?php 
include 'koneksi.php';
include 'functions.php';

if(isset($_POST['verifikasi'])){
    $username = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    $email = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['email']))));
    $jabatan = mysqli_real_escape_string($koneksi, trim(htmlspecialchars($_POST['jabatan'])));
    $gaji = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['gaji']))));
    $gaji = $gaji/1000;

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

    // php config untuk mendapatkan invoice id
    $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $panj = 4;
    $txtl = strlen($text) - 1;
    $result1 = '';
    for ($i = 1; $i <= $panj; $i++) {
        $result1 .= $text[rand(0, $txtl)];
    }
    $text = '1234567890';
    $panj = 6;
    $txtl = strlen($text) - 1;
    $result2 = '';
    for ($i = 1; $i <= $panj; $i++) {
        $result2 .= $text[rand(0, $txtl)];
    }
    $invoice = "$result1$result2";

    $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO karyawan_tetap
                                               VALUES 
                                               (null, '$kode', '$nama', '$nip', '$tanggal', '$tempat', '$alamat', '$foto', '$jabatan', '$gender', '$gaji')");
                                               
    // $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO top WHERE kode_karyawan = '$kode', jumlah_hadir = '', nama = '$nama'");
    // $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO top VALUES (null, '$kode', '0','$nama', )");
    // jika akun yang di verifikasi adalah karyawan, masukkan ke tabel top
    if($role == "karyawan"){
        $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO top VALUES (null, '$kode', '', '$nama')");
    }
    // variabel untuk pajak
    $pajak = $gaji * 0.05;
    $gajiBersih = $gaji - $pajak;
    $bulanTagihan = date('F');
    $verifikasiAkun .= mysqli_query($koneksi, "INSERT INTO daftar_gaji VALUES (null, '$kode', '$nama', '$invoice', '$bulanTagihan', '', '$gaji', '', '$pajak', '$gajiBersih')");
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