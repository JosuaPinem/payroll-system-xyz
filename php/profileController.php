<?php
    session_start();

    if($_SESSION['halaman']=="admin"){
        header('location: ../sources/admin/admin-dashboard.php');
    }else if($_SESSION['halaman']=="karyawan"){
        header('location:  ../sources/employee/employee-dashboard.php');
    }
?>