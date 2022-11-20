# payroll-system-xyz

tugas hari ini :
membuat fitur upload surat izin, dan bisa diakses oleh admin

// ini code gagal, krn bisa query
// untuk mendapatkan waktu tanggal melakukan absensi
// date*default_timezone_set('Asia/Jakarta');
// $menitLokal = date('j:H:i:s');
    // // membuat otomatisasi gaji setiap tanggal 1
    // if(date('i:s') ==  "0" ){
    //     // untuk mendapatkan waktu tanggal melakukan absensi
    //     date_default_timezone_set('Asia/Jakarta');
    //     $query = mysqli_query($koneksi, "SELECT * FROM daftar*gaji");
// $rows = [];
    //     while ($result = mysqli_fetch_assoc($query)) {
    //         $rows[] = $result;
    //     }
    //     $total = mysqli_num_rows($query);
// for ($i = 0; $i < $total; $i++) {
    //         $gajiPokok = $rows[$i]['gaji_pokok'];
// $kodeKaryawan = $rows[$i]['kode_karyawan'];
// $pajak = $rows[$i]['pajak'];
// $pajak = $gajiPokok * 0.05;
// $namaUser = $rows[$i]['nama'];
// $gajiBersih = $gajiPokok - $pajak;
    //         // php config untuk merandom invoice
    //         $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $panj = 4;
    //         $txtl = strlen($text) - 1;
// $result1 = '';
    //         for ($i = 1; $i <= $panj; $i++) {
    //             $result1 .= $text[rand(0, $txtl)];
    //         }
    //         $text = '1234567890';
    //         $panj = 6;
    //         $txtl = strlen($text) - 1;
// $result2 = '';
    //         for ($i = 1; $i <= $panj; $i++) {
    //             $result2 .= $text[rand(0, $txtl)];
    //         }
    //         $invoice = "$result1$result2";
    //         $updateGajiBulanan = mysqli_query($koneksi, "INSERT INTO daftar_gaji VALUES (null, '$kodeKaryawan', '$namaUser', '$invoice', '$bulanTagihan', '', '$gajiPokok', 0, '$pajak', '$gajiBersih')");
// }
// }
