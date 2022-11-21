<?php

include 'koneksi.php';
include 'functions.php';

// <!-- php config ketika run payroll ditekan -->
if(isset($_POST['run'])){
    // php config untuk mendapatkan tanggal_lengkap pembayaran
    $tanggalBayar = date('d M Y');
    // variabel untuk mendapatkan bulan tagihan
    $bulanTagihan = date('F');

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
    
    $runPayroll = mysqli_query($koneksi, "INSERT INTO riwayat_gaji( kode_karyawan,invoice, bulan_tagihan, total_gaji, gaji_pokok, bonus, pajak )
    SELECT kode_karyawan, invoice, bulan, gaji_bersih, gaji_pokok, bonus, pajak FROM daftar_gaji");
    // untuk mendapatkan variabel tanggal pembayaran dan status pembayaran
    $runPayroll .= mysqli_query($koneksi, "UPDATE riwayat_gaji SET tanggal_bayar = '$tanggalBayar'");
    $runPayroll .= mysqli_query($koneksi, "UPDATE riwayat_gaji SET status_pembayaran = 'Paid'");
    $runPayroll .= mysqli_query($koneksi, "UPDATE daftar_gaji SET bonus = '0'");
    if($runPayroll){
    echo "<script>
    alert('Gaji seluruh karyawan sudah dibayar');window.location='../sources/admin/admin-payroll.php';
          </script>";
    }  
}

// php config ketika tombol add bonus ditekan
if (isset($_POST['tambahBonus'])) {
    if ($_POST['jumlahBonus'] == 0 || $_POST['jumlahBonus'] == "") {
        echo "<script>
                alert('Silahkan input jumlah bonus');window.location='../sources/admin/admin-payroll.php';
              </script>";
        return false;
    }
    $query = mysqli_query($koneksi, "SELECT * FROM daftar_gaji");
    $rows = [];
    while ($result = mysqli_fetch_assoc($query)) {
        $rows[] = $result;
    }
    $total = mysqli_num_rows($query);
    for ($i = 0; $i < $total; $i++) {
        $gajiPokok = $rows[$i]['gaji_pokok'];
        $pajak = $rows[$i]['gaji_pokok'] * 0.05;
        $namaUser = $rows[$i]['nama'];
        $daftarBonus = $rows[$i]['bonus'];
        $jumlahBonus = $_POST['jumlahBonus'] / 1000;
        $totalBonus = $daftarBonus + $jumlahBonus;
        $gajiBersih = $gajiPokok - $pajak + $totalBonus;
        $updateBonus = mysqli_query($koneksi, "UPDATE daftar_gaji SET bonus = $totalBonus, gaji_bersih = $gajiBersih, pajak='$pajak' WHERE nama = '$namaUser'");
    }
    if ($updateBonus) {
        echo "<script>
            alert('Bonus sudah ditambahkan');window.location='../sources/admin/admin-payroll.php';
          </script>";
    }


}
?>