-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220601.866861edac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 04:49 AM
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
  `foto` varchar(100) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gaji` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`, `gaji`) VALUES
(6, 'ABC123', 'Afiq Alghazali', '55555', '2004-02-03', 'medan', 'medan', 'LOGO FMIPA.png', 'HRD', 'Male', 200),
(9, 'KRT698', 'josua', '123456789', '2001-01-01', 'Medan', 'Medan', 'LOGO FMIPA.png', 'CEO', 'Male', 100),
(12, 'XYT221', 'raihan', '55555', '2002-02-02', 'Medan', 'medan', 'LOGO FMIPA.png', 'IT Security', 'Male', 200),
(15, 'OEF501', 'rendy', '10983453', '1999-03-03', 'Semarang', 'Jakarta', 'LOGO FMIPA.png', 'Android Developer', 'Male', 300),
(16, 'TQX268', 'novi', '987789006', '1997-05-05', 'Bali', 'Jakarta', 'LOGO FMIPA.png', 'Web Developer', 'Female', 50),
(27, 'KXU654', 'Grace Oktavia', '12345', '2022-11-29', 'Medan', 'Medan', 'bright.jpg', '', '', 0),
(28, 'TOW966', 'Sasuke Uchiha', '12345', '2022-11-09', 'Konoha', 'Konoha', 'josua.jpg', 'Data Scientist', 'Male', 100),
(36, 'CCP222', 'Dita Natasya', '123', '2022-11-29', 'Medan', 'Medan', 'gambar 2 so.jpeg', '', 'Female', 0),
(37, 'BQF891', 'Naruto Uzumaki', '123', '2022-11-22', 'Medan', 'Medan', 'WhatsApp Image 2022-10-31 at 08.40.59.jpeg', '', 'Female', 0),
(38, 'GSV263', 'Janson Pasaribu', '123', '2022-11-22', 'Medan', 'Medan', 'logo masyarakat.jpg', '', 'Male', 0),
(39, 'XOL377', 'Julia Amanda', '123', '2022-11-16', 'Medan', 'Medan', 'hero_image (2).jpg', 'Admin', 'Female', 200),
(41, 'RKS771', 'Agnes Manurung', '123', '2022-11-16', 'Medan', 'Medan', 'LOGOKEMENKUE.jpg', 'CEO', 'Female', 100);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_tetap`
--

CREATE TABLE `karyawan_tetap` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
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
(6, 'ABC123', 'Afiq Alghazali', '55555', '2004-02-03', 'medan', 'medan', 'LOGO FMIPA.png', 'HRD', 'Male', 200),
(9, 'KRT698', 'josua', '123456789', '2001-01-01', 'Medan', 'Medan', 'LOGO FMIPA.png', 'CEO', 'Male', 100),
(12, 'XYT221', 'raihan', '55555', '2002-02-02', 'Medan', 'medan', 'LOGO FMIPA.png', 'IT Security', 'Male', 200),
(15, 'OEF501', 'rendy', '10983453', '1999-03-03', 'Semarang', 'Jakarta', 'LOGO FMIPA.png', 'Android Developer', 'Male', 300),
(28, 'TOW966', 'Sasuke Uchiha', '12345', '2022-11-09', 'Konoha', 'Konoha', 'josua.jpg', 'Data Scientist', 'Male', 100),
(41, 'RKS771', 'Agnes Manurung', '123', '2022-11-16', 'Medan', 'Medan', 'LOGOKEMENKUE.jpg', 'CEO', 'Female', 100),
(42, 'XOL377', 'Julia Amanda', '123', '2022-11-16', 'Medan', 'Medan', 'hero_image (2).jpg', 'Admin', 'Female', 200);

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
(6, 'KRT698', 'josua', '$2y$10$p9u6tU.1SbNhvqQI5KmvI.rfCZlqmZg2r9ZPfS/QH7rxDQRwR88w6', 'ceo', 'josua@gmail.com'),
(7, 'XYT221', 'raihan', '$2y$10$O3Vd0cEAtwDOXv/ox6.95OGGed5WXlrPXae0xJ3B2.WYaE/XINrl6', 'karyawan', 'raihan@gmail.com'),
(8, 'OEF501', 'rendy', '$2y$10$6UNcx1gDkgDx440/5z98humxFVwxfei4t9cdltAFfa1oycTySNCcK', 'karyawan', 'rendy@gmail.com'),
(9, 'TQX268', 'novi', '$2y$10$Nw307Pq16DclMrezrcWDZeIlgYf60rX8QNOx8iJVcszGTBVp2HlW6', 'karyawan', 'novi123@gmail.com'),
(14, 'TOW966', 'sasuke', '$2y$10$rAtXxaeiEvCnisGQwbPk4.no9K5gpuvtfca5i4mst7/jqE8i1WMU.', 'karyawan', 'sasuke@gmail.com'),
(15, 'RKS771', 'agnes', '$2y$10$5aevlecZFK/jLgzmflBAqewYL5L8OwSvxZDplDU63AhhS2xpBEV8G', 'admin', 'agnesmanurung@gmail.'),
(16, 'XOL377', 'manda', '$2y$10$ilPGJ.iwj0vEZtECwkw4Duzxik9ipk0DoI.ikFwI4AmsLpfyGYG/2', 'admin', 'manda@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `top_karyawan`
--

CREATE TABLE `top_karyawan` (
  `kode_karyawan` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `top_karyawan`
--

INSERT INTO `top_karyawan` (`kode_karyawan`, `nama`, `posisi`, `foto`) VALUES
('ABC123', 'Afiq Alghazali', 'hrd', 'LOGO FMIPA.png'),
('KRT698', 'Josua', 'ceo', 'LOGO FMIPA.png'),
('XYT221', 'raihan', 'senior developer', 'LOGO FMIPA.png');

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
(25, 'KXU654', 'grace', '$2y$10$VOTGGs55q//3Wj4pn97zkeSWJUgizoXWmhIC.rsRBbbYlR.kUcOJa', 'grace@gmail.com'),
(12356, 'CCP222', 'dita', '$2y$10$48USE7LGpvVReFCcYfDXf.Q98JVT6RV/uG3GxFjLVXaOy8CmMFZFi', 'dita@gmail.com'),
(12357, 'BQF891', 'naruto', '$2y$10$ab2zHMomjkkkPSS9GtEgjeuD3Oo1vVi0WwKM4feZwNahyr24gF036', 'naruto@gmail.com'),
(12358, 'GSV263', 'janson', '$2y$10$4YoSGuF.MCT1PG3oLzJu/OnEyYPPeT9NfnfJcg00B1sCrVp9TXZYi', 'janson@gmail.com');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `karyawan_tetap`
--
ALTER TABLE `karyawan_tetap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12362;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



