-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220601.866861edac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 10:41 AM
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
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`) VALUES
(6, 'ABC123', 'Afiq Alghazali', '55555', '2004-02-03', 'medan', 'medan', 'LOGO FMIPA.png'),
(9, 'KRT698', 'josua', '123456789', '2001-01-01', 'Medan', 'Medan', 'LOGO FMIPA.png'),
(12, 'XYT221', 'raihan', '55555', '2002-02-02', 'Medan', 'medan', 'LOGO FMIPA.png'),
(15, 'OEF501', 'rendy', '10983453', '1999-03-03', 'Semarang', 'Jakarta', 'LOGO FMIPA.png'),
(16, 'TQX268', 'novi', '987789006', '1997-05-05', 'Bali', 'Jakarta', 'LOGO FMIPA.png'),
(27, 'KXU654', 'Grace Oktavia', '12345', '2022-11-29', 'Medan', 'Medan', 'bright.jpg'),
(28, 'TOW966', 'Sasuke Uchiha', '12345', '2022-11-09', 'Konoha', 'Konoha', 'josua.jpg'),
(29, 'NMH809', 'Bright Ginting', '12345', '2022-11-01', 'Medan', 'Medan', 'logo solvedx-04.png'),
(31, 'AWN937', 'Cristiano Ronaldo', '123456', '2022-11-15', 'Portugal', 'Portugal', 'WhatsApp Image 2022-10-31 at 08.40.59.jpeg'),
(32, 'AHD971', 'Wahyu Abdilla', '12345', '2022-11-15', 'Medan', 'Medan', 'WhatsApp Image 2022-10-31 at 08.40.59.jpeg');

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
(5, 'ABC123', 'afiq', '$2y$10$6UNcx1gDkgDx440/5z98humxFVwxfei4t9cdltAFfa1oycTySNCcK', 'admin', 'afiq@gmail.com'),
(6, 'KRT698', 'josua', '$2y$10$p9u6tU.1SbNhvqQI5KmvI.rfCZlqmZg2r9ZPfS/QH7rxDQRwR88w6', 'hrd', 'josua@gmail.com'),
(7, 'XYT221', 'raihan', '$2y$10$O3Vd0cEAtwDOXv/ox6.95OGGed5WXlrPXae0xJ3B2.WYaE/XINrl6', 'karyawan', 'raihan@gmail.com'),
(8, 'OEF501', 'rendy', '$2y$10$6UNcx1gDkgDx440/5z98humxFVwxfei4t9cdltAFfa1oycTySNCcK', 'karyawan', 'rendy@gmail.com'),
(9, 'TQX268', 'novi', '$2y$10$Nw307Pq16DclMrezrcWDZeIlgYf60rX8QNOx8iJVcszGTBVp2HlW6', 'karyawan', 'novi123@gmail.com'),
(13, 'KXU654', 'grace', '$2y$10$VOTGGs55q//3Wj4pn97zkeSWJUgizoXWmhIC.rsRBbbYlR.kUcOJa', 'karyawan', 'grace@gmail.com'),
(14, 'AWN937', 'ronaldo', '$2y$10$W5BUlf3ebFAxxnmLDzOq2eHhDDDfdWtybvizYD2rI5e4qN/Lonv..', 'admin', 'ronaldo@gmail.com');

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
(26, 'TOW966', 'sasuke', '$2y$10$rAtXxaeiEvCnisGQwbPk4.no9K5gpuvtfca5i4mst7/jqE8i1WMU.', 'sasuke@gmail.com'),
(27, 'NMH809', 'bright', '$2y$10$YY0.zdWmd6BOC1soRGNPV.8gaKhKB2rlR4/Lq2RyXsOXycOLdVPIG', 'bright@gmail.com'),
(30, 'AHD971', 'wahyu', '$2y$10$rx1b1q2F/QcSJ0FMMuSVM.nRqmY9CH5r6JHOqf6e4ls9CzqhzgaKG', 'wahyu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
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
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



