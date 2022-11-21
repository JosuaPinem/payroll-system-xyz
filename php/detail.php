<?php
include 'koneksi.php';

$query = $koneksi ->query("SELECT * FROM riwayat_gaji WHERE id = '$_GET[id]'");
$result = array();

while($fetchData = $query->fetch_assoc()){
    $result[] = $fetchData;
}

echo json_encode($result);
?>