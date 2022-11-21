-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220601.866861edac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 04:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `bulan` varchar(5) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `kode_karyawan`, `nama`, `tanggal`, `bulan`, `jam`, `keterangan`, `foto`, `surat`) VALUES
(27, 'MYU889', 'Vira Siburian', '18 Nov 2022', '11', '00:06', 'Present', 'Vira.png', 'MYU889_18 Nov 2022_'),
(28, 'FSR366', 'Tomi Ginting', '18 Nov 2022', '11', '00:06', 'Present', 'tomi.png', 'FSR366_18 Nov 2022_'),
(31, 'NNG812', 'Fadly', '18 Nov 2022', '11', '00:16', 'Present', 'fadly.png', 'NNG812_18 Nov 2022_'),
(41, 'WXK009', 'Mark Ferdinan', '18 Nov 2022', '11', '01:06', 'Emergency', 'mark.png', 'WXK009_18 Nov 2022_analisis-regresi.pdf'),
(42, 'ACV829', 'Wiliam wijaya', '18 Nov 2022', '11', '01:08', 'Other', 'wiliam.png', 'ACV829_18 Nov 2022_MAKALAH SO_KLP MAGUIRE_FIREWALL.pdf'),
(45, 'PGT728', 'Natan Sigalingging', '18 Nov 2022', '11', '01:19', 'Sick', 'natan.png', '__34-65-1-SM-1.pdf'),
(46, 'SYL580', 'Rendy Herianto', '17 Nov 2022', '11', '01:22', 'Present', 'rendy.png', ''),
(55, 'SYL580', 'Rendy Herianto', '18 Nov 2022', '11', '11:01', 'Present', 'rendy.png', ''),
(56, 'URV047', 'Fitri Anisa', '20 Nov 2022', '11', '10:12', 'Present', 'silvia.png', ''),
(58, 'WKQ250', 'Josep Sembiring', '20 Nov 2022', '11', '10:28', 'Present', 'josep.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_gaji`
--

CREATE TABLE `daftar_gaji` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `date_lengkap` varchar(20) NOT NULL,
  `gaji_pokok` bigint(50) NOT NULL,
  `bonus` bigint(50) NOT NULL,
  `pajak` bigint(50) NOT NULL,
  `gaji_bersih` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_gaji`
--

INSERT INTO `daftar_gaji` (`id`, `kode_karyawan`, `nama`, `invoice`, `bulan`, `date_lengkap`, `gaji_pokok`, `bonus`, `pajak`, `gaji_bersih`) VALUES
(47, 'FSR366', 'Tomi Ginting', 'RABW620465', 'November\r\n', '', 3000, 1400, 150, 4250),
(48, 'WXK009', 'Mark Ferdinan', 'ASPS327386', 'November\r\n', '', 4000, 1050, 200, 4850),
(49, 'MQA848', 'Yura Goh', 'RGQK328950', 'November\r\n', '', 5000, 1100, 250, 5850),
(50, 'UYB623', 'Raihan Maulana', 'XPAG246240', 'November\r\n', '', 9000, 1100, 450, 9650),
(51, 'PGT728', 'Natan Sigalingging', 'BSPL691185', 'November\r\n', '', 4800, 1100, 240, 5660),
(52, 'NNG812', 'Fadly', 'JRAP614963', 'November\r\n', '', 4500, 1100, 225, 5375),
(53, 'ACV829', 'Wiliam wijaya', 'WCCI543584', 'November\r\n', '', 4800, 1100, 240, 5660),
(54, 'WKQ250', 'Josep Sembiring', 'MSXH561938', 'November\r\n', '', 4000, 1600, 200, 5400),
(55, 'CBW275', 'Muhammad Agus Syahpu', 'GLVM408258', 'November\r\n', '', 9300, 1100, 465, 9935),
(56, 'DZF691', 'Bright Nine Ginting', 'DVQG210260', 'November\r\n', '', 9300, 2100, 465, 10935),
(57, 'SYL580', 'Rendy Herianto', 'UHNI881764', 'November\r\n', '', 4800, 1100, 240, 5660),
(58, 'MYU889', 'Vira Siburian', 'ZUPN132279', 'November\r\n', '', 4800, 1100, 240, 5660),
(59, 'BZG488', 'Lidya Sularto', 'WUAV960847', 'November\r\n', '', 3900, 1100, 195, 4805),
(60, 'MAB545', 'Afiq Alghazali', 'SGVE402890', 'November\r\n', '', 9300, 1100, 465, 9935),
(61, 'AYY935', 'Josua Pinem', 'IFHQ202744', 'November\r\n', '', 9300, 1100, 465, 9935),
(77, 'URV047', 'Fitri Anisa', 'RHQG899830', 'November', '', 3000, 1100, 150, 3950),
(78, 'FEP068', 'Agnes Manurung', 'IFEG600506', 'November', '', 2000, 1100, 100, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gaji` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`, `gaji`) VALUES
(58, 'SRN288', 'Valentina', '112344552234', '2001-10-23', 'Bogor', 'Bogor', 'yura.png', '', 'Female', 0),
(59, 'MXC145', 'Fino Aldebaran', '2341123568843', '2000-02-01', 'Palangkaraya', 'Palangkaraya', 'josep.png', '', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_tetap`
--

CREATE TABLE `karyawan_tetap` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gaji` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan_tetap`
--

INSERT INTO `karyawan_tetap` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`, `gaji`) VALUES
(44, 'FSR366', 'Tomi Ginting', '121234111301988', '1988-11-30', 'Bali', 'Bali', 'tomi.png', 'Data Analyst', 'Male', 3000),
(45, 'WXK009', 'Mark Ferdinan', '888721104042000', '2000-04-04', 'Palembang', 'Palembang', 'mark.png', 'IT Security', 'Male', 4000),
(46, 'MQA848', 'Yura Goh', '222111210151997', '1997-10-15', 'Sumedang', 'Depok', 'yura.png', 'HRD', 'Female', 5000),
(47, 'UYB623', 'Raihan Maulana', '444212309201997', '1997-09-20', 'Medan', 'Medan', 'raihan.png', 'CEO', 'Male', 9000),
(48, 'PGT728', 'Natan Sigalingging', '111445711021999', '1999-11-02', 'Jambi', 'Lampung', 'natan.png', 'Android Developer', 'Male', 4800),
(49, 'NNG812', 'Fadly', '222197705051992', '1992-05-05', 'Magelang', 'Surabaya', 'fadly.png', 'Web Developer', 'Male', 4500),
(51, 'ACV829', 'Wiliam wijaya', '442122312251996', '1996-12-25', 'Bandung', 'Bandung', 'wiliam.png', 'IT Security', 'Male', 4800),
(52, 'WKQ250', 'Josep Sembiring', '111267911282001', '2001-11-28', 'Berastagi', 'Bekasi', 'josep.png', 'Android Developer', 'Male', 4000),
(53, 'CBW276', 'Muhammad Agus Syahpu', '332443108271999', '1999-08-27', 'Tangerang', 'Medan', 'agus.png', 'CEO', 'Male', 9300),
(54, 'DZF691', 'Bright Nine Ginting', '221345109092000', '2003-07-09', 'Medan', 'Medan', 'bright.jpeg', 'CEO', 'Male', 9300),
(55, 'SYL580', 'Rendy Herianto', '983225704191990', '1990-04-19', 'Bogor', 'Bogor', 'rendy.png', 'IT Security', 'Male', 4800),
(56, 'MYU889', 'Vira Siburian', '235548401021998', '1998-01-02', 'Tarutung', 'Medan', 'Vira.png', 'Data Analyst', 'Female', 4800),
(57, 'BZG488', 'Lidya Sularto', '102234505251994', '1994-05-25', 'Jakarta', 'Surabaya', 'lidya.png', 'Android Developer', 'Female', 3900),
(58, 'MAB545', 'Afiq Alghazali', '111222306212000', '2000-06-21', 'Medan', 'Medan', 'afiq.png', 'CEO', 'Male', 9300),
(59, 'AYY935', 'Josua Pinem', '111234301011999', '1999-01-01', 'Medan', 'Medan', 'josua.png', 'CEO', 'Male', 9300),
(61, 'URV047', 'Fitri Anisa', '2231134553221', '1998-06-20', 'Aceh', 'Jakarta', 'silvia.png', 'Data Analyst', 'Female', 4000),
(66, 'FEP068', 'Agnes Manurung', '123456655', '2022-11-22', 'Pematang Siantar', 'Medan', 'raihan.jpg', 'Admin', 'Female', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(299) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `kode_karyawan`, `username`, `password`, `posisi`, `email`) VALUES
(18, 'FSR366', 'tomi', '$2y$10$vOHQgZzrOgEgYI48UwZw8u3.5lwuUy0prG4bKbzL.X2gy.Jc/Q62K', 'karyawan', 'tomi@gmail.com'),
(19, 'WXK009', 'mark', '$2y$10$cDfjr.Y4GsNozuDw9vEYh.3eUU/NymWtaxzGjNK.EFdIRb2yUsI3S', 'karyawan', 'mark@gmail.com'),
(20, 'MQA848', 'yura', '$2y$10$ULiEozj8uuQsA1kgFsBCYefIu2hWGp7SzrJVQimw8XwChy4iTeT4a', 'admin', 'yura@gmail.com'),
(21, 'UYB623', 'raihan', '$2y$10$.kRkGvVARdmrP5yQkxeEEeCJW.oId6iy2VbEIdQf0Z47d.tvDdEMO', 'admin', 'raihan@gmail.com'),
(22, 'PGT728', 'natan', '$2y$10$tG5Oi2VQcYCtUrAvpFp2hulGGryWEx.G0WYikGzijAv8zrBcHn8/m', 'karyawan', 'natan@gmail.com'),
(23, 'NNG812', 'fadly', '$2y$10$5dRQt.EejnsLYHE/.pHAreehobmhd5vQLhsohaig/sQMJisnwKVj2', 'karyawan', 'fadly@gmail.com'),
(25, 'ACV829', 'wiliam', '$2y$10$I7DLD6u8hSgI7NQAZTr9uOIvu9ZN3KsGdyejKLZJavPOXtScsmV7q', 'karyawan', 'wiliam@gmail.com'),
(26, 'WKQ250', 'josep', '$2y$10$aj54BLjUA72dYTgInpEBn.lazyksIMhS6UeUL/GJ4DaCnYSYWLumS', 'karyawan', 'josep@gmail.com'),
(27, 'CBW276', 'agus', '$2y$10$dG5YXOpnYK1oNbjKP7YylOd5V7tXOH4xMpg.Qj1MGobzKVUS3lwSK', 'admin', 'agus@gmail.com'),
(28, 'DZF691', 'bright', '$2y$10$Cth5lfCeUEIuaDFYxnQIeerukx2spRrWSOM8C3r0LClta0yD4z1ce', 'admin', 'bright@gmail.com'),
(29, 'SYL580', 'rendy', '$2y$10$4W4Xo3LvAilSOuUthPi7DOEfUNI0oexGp2ZH5EeRNdPz4Y0qBE9Gi', 'karyawan', 'rendy@gmail.com'),
(30, 'MYU889', 'vira', '$2y$10$3PcNcMlMWiJfmFwbfBIgjegG4loQwjxjPn0U38Oiplm6sW85oKNTi', 'karyawan', 'vira@gmail.com'),
(31, 'BZG488', 'lidya', '$2y$10$Ca7lmJoHnkEps8/Cy11NtOAQifwlnO9vCLRjf5o0vIY8jEg0ngbzK', 'karyawan', 'lidya@gmail.com'),
(32, 'MAB545', 'afiq', '$2y$10$Q3LgUkbW9K/PQqRKhEGGJulMel4zB9B0yHKk/hZJ9t7afJKGt5Rry', 'admin', 'afiq'),
(33, 'AYY935', 'josua', '$2y$10$.3fjXfdVxLpa3X9Afvaraeeq9OmvD45sx4.OZpXa4mwUj1cli.LpS', 'admin', 'josua@gmail.com'),
(35, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'karyawan', 'fitri@gmail.com'),
(36, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'karyawan', 'fitri@gmail.com'),
(37, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'karyawan', 'fitri@gmail.com'),
(38, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'karyawan', 'fitri@gmail.com'),
(39, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'karyawan', 'fitri@gmail.com'),
(40, 'FEP068', 'agnes', '$2y$10$irSfiyZrjkuBLSvZ6lWz4uu/zDdj4n81fSKZgNyberyhwJzScjDP2', 'admin', 'agnes@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_gaji`
--

CREATE TABLE `riwayat_gaji` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `tanggal_bayar` varchar(30) NOT NULL,
  `bulan_tagihan` varchar(10) NOT NULL,
  `total_gaji` varchar(50) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `bonus` varchar(50) NOT NULL,
  `pajak` varchar(50) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_gaji`
--

INSERT INTO `riwayat_gaji` (`id`, `kode_karyawan`, `invoice`, `tanggal_bayar`, `bulan_tagihan`, `total_gaji`, `gaji_pokok`, `bonus`, `pajak`, `status_pembayaran`) VALUES
(502, 'FSR366', 'RABW620465', '21 Nov 2022', 'November\r\n', '3250', '3000', '400', '150', 'Paid'),
(503, 'WXK009', 'ASPS327386', '21 Nov 2022', 'November\r\n', '3850', '4000', '50', '200', 'Paid'),
(504, 'MQA848', 'RGQK328950', '21 Nov 2022', 'November\r\n', '4850', '5000', '100', '250', 'Paid'),
(505, 'UYB623', 'XPAG246240', '21 Nov 2022', 'November\r\n', '8650', '9000', '100', '450', 'Paid'),
(506, 'PGT728', 'BSPL691185', '21 Nov 2022', 'November\r\n', '4660', '4800', '100', '240', 'Paid'),
(507, 'NNG812', 'JRAP614963', '21 Nov 2022', 'November\r\n', '4375', '4500', '100', '225', 'Paid'),
(508, 'ACV829', 'WCCI543584', '21 Nov 2022', 'November\r\n', '4660', '4800', '100', '240', 'Paid'),
(509, 'WKQ250', 'MSXH561938', '21 Nov 2022', 'November\r\n', '4400', '4000', '600', '200', 'Paid'),
(510, 'CBW275', 'GLVM408258', '21 Nov 2022', 'November\r\n', '8935', '9300', '100', '465', 'Paid'),
(511, 'DZF691', 'DVQG210260', '21 Nov 2022', 'November\r\n', '9935', '9300', '1100', '465', 'Paid'),
(512, 'SYL580', 'UHNI881764', '21 Nov 2022', 'November\r\n', '4660', '4800', '100', '240', 'Paid'),
(513, 'MYU889', 'ZUPN132279', '21 Nov 2022', 'November\r\n', '4660', '4800', '100', '240', 'Paid'),
(514, 'BZG488', 'WUAV960847', '21 Nov 2022', 'November\r\n', '3805', '3900', '100', '195', 'Paid'),
(515, 'MAB545', 'SGVE402890', '21 Nov 2022', 'November\r\n', '8935', '9300', '100', '465', 'Paid'),
(516, 'AYY935', 'IFHQ202744', '21 Nov 2022', 'November\r\n', '8935', '9300', '100', '465', 'Paid'),
(517, 'URV047', 'RHQG899830', '21 Nov 2022', 'November', '2950', '3000', '100', '150', 'Paid'),
(518, 'FEP068', 'IFEG600506', '21 Nov 2022', 'November', '2000', '2000', '100', '100', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `top`
--

CREATE TABLE `top` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `jumlah_hadir` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `top`
--

INSERT INTO `top` (`id`, `kode_karyawan`, `jumlah_hadir`, `nama`) VALUES
(1, 'FSR366', '1', 'Tomi Ginting'),
(2, 'WXK009', '1', 'Mark Ferdinan'),
(3, 'PGT728', '1', 'Natan Sigalingging'),
(4, 'NNG812', '1', 'Fadly'),
(5, 'ACV829', '1', 'Wiliam Wijaya'),
(6, 'WKQ250', '2', 'Josep Sembiring'),
(7, 'SYL580', '2', 'Rendy Herianto'),
(8, 'MYU889', '1', 'Vira Siburian'),
(9, 'BZG488', '5', 'Lidya Sularto'),
(10, 'URV047', '', 'Fitri Anisa');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(299) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `kode_karyawan`, `username`, `password`, `email`) VALUES
(12379, 'SRN288', 'valentina', '$2y$10$ySshDPsq8pbrsi1ejKbip.1zQlShU33xWC5WA.DMvIYuUpxV7Pk7O', 'valentina@gmail.com'),
(12380, 'MXC145', 'fino', '$2y$10$hdd9iIdXYbbueMhd9d8evuVJKEFKYOdznZS1mN45oZ6AbszKbuoxa', 'fino@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_gaji`
--
ALTER TABLE `daftar_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_tetap`
--
ALTER TABLE `karyawan_tetap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top`
--
ALTER TABLE `top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `daftar_gaji`
--
ALTER TABLE `daftar_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343306;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `karyawan_tetap`
--
ALTER TABLE `karyawan_tetap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12387;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



