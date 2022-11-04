<?php 
    session_start();
    require('koneksi.php');
    $kode = $_SESSION['kode'];
    $name = $_POST['nama'];
    $nip = $_POST['nip'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['adress'];
    $foto = $_FILES['foto'];
    
    
    // menolak akses jika tidak terdapat data

    if($tanggal =="" | $nip =="" | $tempat =="" | $alamat =="" | $foto ==""){
        echo "  <srcipt>
                    alert('Mohon masukkan data yang valid');
                    document.location.href = '../Source/form.php';
                </script>";
        exit;
    }

    // Proses upload foto

    if(isset($_FILES['foto'])){
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
                }else{
                    // jika ukuran file diatas 1mb
                    echo "<script>alert('Ukuran file terlalu besar');document.location.href = '../Source/form.php';</script>";
                }
            }else{
                //ekstensi file yang diuplaod tidak sesuai

                echo "<srcipt>
                        alert('Ekstensi file yang diupload tidak sesuai');
                        document.location.href = '../Source/form.php';
                    </script>";
            }
    }
    //--------------------------------------------------------------------

    // Upload data dari form ke database
    $query2 = mysqli_query($koneksi, "INSERT INTO data_karyawan VALUES (null,'$kode', '$name', '$nip', '$tanggal', '$tempat', '$alamat', '$nama')");
    if($query2){
        $_SESSION['posisi'] = " ";
        $_SESSION = [];
        session_unset();
        session_destroy();
        echo "<script>
                alert('Data berhasil disimpan. Mohon menunggu hinga akun anda di verify admin!');
            </script>";
    header('refresh:0; ../index.php');
    }
?>