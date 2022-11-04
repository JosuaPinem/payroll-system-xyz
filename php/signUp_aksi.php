<?php 
    session_start();
    require('koneksi.php');
    $user = mysqli_real_escape_string($koneksi, trim(strtolower(htmlspecialchars($_POST['username']))));
    $pass = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
    $email = $_POST['email'];

    // menolak akses data kosong
    if($user =="" | $pass =="" | $email ==""){
        echo "  <srcipt>
                    alert('Mohon masukkan data yang valid');
                    document.location.href = '../index.php';
                </script>";
        exit;
    }

    // membuat kode karyawan baru 
    $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $panj = 3;
    $txtl = strlen($text)-1;
    $result = '';
    for($i=1; $i<=$panj; $i++){
    $result1 .= $text[rand(0, $txtl)];
    }
    $text = '1234567890';
    $panj = 3;
    $txtl = strlen($text)-1;
    $result = '';
    for($i=1; $i<=$panj; $i++){
    $result2 .= $text[rand(0, $txtl)];
    }
    $gabungan = "$result1$result2";
    

    $cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$user' AND email='$email'");

    // cek di data verify
    $cekRegistrasiAkun = mysqli_query($koneksi, "SELECT * FROM verify WHERE username = '$user' AND email='$email'");

    // cek di data login
    if(mysqli_num_rows($cek) === 0 && mysqli_num_rows($cekRegistrasiAkun) === 0){
        $_SESSION['login'] = true;
        $_SESSION['form'] = true;

        // enkripsi password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // masukkan  data ke databse verify untuk di verifikasi oleh adimn
        $query = mysqli_query($koneksi, "INSERT INTO verify VALUES (null, '$gabungan' ,'$user','$pass', '$email' )");
        if($query){
            $_SESSION['kode'] = $gabungan;
            echo "<script>
                alert('Username dan Password telah disimpan. Silahkan isi data diri anda');
                document.location.href = '../sources/form.php';
            </script>";
        header('refresh:0; ../sources/form.php');
        }
    }else{
        echo "<script>
                alert('Username atau Password atau email telah digunakan');
            </script>";
    header('refresh:0; ../index.php');
    }
?>