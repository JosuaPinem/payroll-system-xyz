<?php 

// function untuk koneksi ke database
function koneksi (){

    return mysqli_connect("localhost", "root", "", "perusahaan");
}

// function untuk query select / melihat database
function query ($query){
    $koneksi = koneksi();
    $data = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($data) > 1){
        $rows = [];
        while($row = mysqli_fetch_assoc($data)){
            $rows[] = $row;
        }
        return $rows;

    }else {
        $rows = mysqli_fetch_assoc($data);
        return $rows;
    }
}

// function untuk session
// function session_function($target)
// {
//     session_start();
//     if (!isset($_SESSION['karyawan'])) {
//         echo "<script>
//                 alert('Anda belum login, silahkan login terlebih dahulu!')
//               </script>";
//         header("refresh:0; $target");
//         return false;
//     }else if( !isset($_SESSION['admin'])){
//         echo "<script>
//                 alert('Anda belum login, silahkan login terlebih dahulu!')
//               </script>";
//         header("refresh:0; $target");
//         return false;
//     }
// }

?>