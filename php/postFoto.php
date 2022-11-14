<?php
include 'koneksi.php';
session_start();
$kode = $_SESSION['kode'];
$validation = array('png', 'jpg', 'jpeg'); // data yang diperbolehkan
$nama = $_FILES['foto']['name']; //mendapatkan nama dari file
$x = explode('.', $nama); //memecah nama file contoh file.jpg maka yang ditangkap jpg
$ekstensi = strtolower(end($x)); //mengambil ekstensi file b
$ukuran = $_FILES['foto']['size']; //mendapatkan ukuran file
$file_tmp = $_FILES['foto']['tmp_name']; //mendapatkan lokasi file sementara

    //pengujian file 
    if(in_array($ekstensi, $validation) === true){
        // upload diperbolehkan
        // uji jika ukuran file dibawah 1mb
        if($ukuran < 1044070){
            // jika ukuran file dibawah 1mb
            move_uploaded_file($file_tmp, '../sources/user-img/'.$nama);
            $update = mysqli_query($koneksi, "UPDATE karyawan_tetap SET foto='$nama' WHERE kode='$kode'");
            if($update){
                echo "<script>alert('Foto berhasil diupload');document.location.href = '../sources/profile.php';</script>";
            }else{
                echo "<script>alert('Foto gagal diupload');document.location.href = '../sources/peorfilephp';</script>";
            }
        }else{
            // jika ukuran file diatas 1mb
            echo "<script>alert('Ukuran file terlalu besar');document.location.href = '../Source/profile.php';</script>";
        }
    }else{
        //ekstensi file yang diuplaod tidak sesuai

        echo "<srcipt>
                alert('Ekstensi file yang diupload tidak sesuai');
                document.location.href = '../Source/form.php';
            </script>";
    }
?>