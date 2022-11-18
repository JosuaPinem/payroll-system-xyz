-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2022 pada 05.53
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `absensi`
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
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `kode_karyawan`, `nama`, `tanggal`, `bulan`, `jam`, `keterangan`, `foto`, `surat`) VALUES
(27, 'MYU889', 'Vira Siburian', '18 Nov 2022', '11', '00:06', 'Present', 'Vira.png', 'MYU889_18 Nov 2022_'),
(28, 'FSR366', 'Tomi Ginting', '18 Nov 2022', '11', '00:06', 'Present', 'tomi.png', 'FSR366_18 Nov 2022_'),
(31, 'NNG812', 'Fadly', '18 Nov 2022', '11', '00:16', 'Present', 'fadly.png', 'NNG812_18 Nov 2022_'),
(41, 'WXK009', 'Mark Ferdinan', '18 Nov 2022', '11', '01:06', 'Emergency', 'mark.png', 'WXK009_18 Nov 2022_analisis-regresi.pdf'),
(42, 'ACV829', 'Wiliam wijaya', '18 Nov 2022', '11', '01:08', 'Other', 'wiliam.png', 'ACV829_18 Nov 2022_MAKALAH SO_KLP MAGUIRE_FIREWALL.pdf'),
(45, 'PGT728', 'Natan Sigalingging', '18 Nov 2022', '11', '01:19', 'Sick', 'natan.png', '__34-65-1-SM-1.pdf'),
(46, 'SYL580', 'Rendy Herianto', '17 Nov 2022', '11', '01:22', 'Present', 'rendy.png', ''),
(55, 'SYL580', 'Rendy Herianto', '18 Nov 2022', '11', '11:01', 'Present', 'rendy.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
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
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`, `gaji`) VALUES
(58, 'SRN288', 'Valentina', '112344552234', '2001-10-23', 'Bogor', 'Bogor', 'yura.png', '', 'Female', 0),
(59, 'MXC145', 'Fino Aldebaran', '2341123568843', '2000-02-01', 'Palangkaraya', 'Palangkaraya', 'josep.png', '', 'Male', 0),
(60, 'URV047', 'Fitri Anisa', '2231134553221', '1998-06-20', 'Aceh', 'Jakarta', 'silvia.png', '', 'Female', 0),
(61, 'HUB943', 'Boy Ferdinan', '2211244565622', '2001-12-29', 'Surakarta', 'Solo', 'mark.png', '', 'Male', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_tetap`
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
-- Dumping data untuk tabel `karyawan_tetap`
--

INSERT INTO `karyawan_tetap` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`, `gaji`) VALUES
(44, 'FSR366', 'Tomi Ginting', '121234111301988', '1988-11-30', 'Bali', 'Bali', 'tomi.png', 'Data Analyst', 'Male', 4200),
(45, 'WXK009', 'Mark Ferdinan', '888721104042000', '2000-04-04', 'Palembang', 'Palembang', 'mark.png', 'IT Security', 'Male', 4300),
(46, 'MQA848', 'Yura Goh', '222111210151997', '1997-10-15', 'Sumedang', 'Depok', 'yura.png', 'HRD', 'Female', 5000),
(47, 'UYB623', 'Raihan Maulana', '444212309201997', '1997-09-20', 'Medan', 'Medan', 'raihan.png', 'CEO', 'Male', 10000),
(48, 'PGT728', 'Natan Sigalingging', '111445711021999', '1999-11-02', 'Jambi', 'Lampung', 'natan.png', 'Android Developer', 'Male', 4000),
(49, 'NNG812', 'Fadly', '222197705051992', '1992-05-05', 'Magelang', 'Surabaya', 'fadly.png', 'Web Developer', 'Male', 4500),
(51, 'ACV829', 'Wiliam wijaya', '442122312251996', '1996-12-25', 'Bandung', 'Bandung', 'wiliam.png', 'IT Security', 'Male', 5000),
(52, 'WKQ250', 'Josep Sembiring', '111267911282001', '2001-11-28', 'Berastagi', 'Bekasi', 'josep.png', 'Android Developer', 'Male', 4100),
(53, 'CBW276', 'Muhammad Agus Syahpu', '332443108271999', '1999-08-27', 'Tangerang', 'Medan', 'agus.png', 'CEO', 'Male', 10000),
(54, 'DZF691', 'Bright Nine Ginting', '221345109092000', '2003-07-09', 'Medan', 'Medan', 'bright.jpeg', 'CEO', 'Male', 10000),
(55, 'SYL580', 'Rendy Herianto', '983225704191990', '1990-04-19', 'Bogor', 'Bogor', 'rendy.png', 'IT Security', 'Male', 5000),
(56, 'MYU889', 'Vira Siburian', '235548401021998', '1998-01-02', 'Tarutung', 'Medan', 'Vira.png', 'Data Analyst', 'Female', 5000),
(57, 'BZG488', 'Lidya Sularto', '102234505251994', '1994-05-25', 'Jakarta', 'Surabaya', 'lidya.png', 'Android Developer', 'Female', 4000),
(58, 'MAB545', 'Afiq Alghazali', '111222306212000', '2000-06-21', 'Medan', 'Medan', 'afiq.png', 'CEO', 'Male', 10000),
(59, 'AYY935', 'Josua Pinem', '111234301011999', '1999-01-01', 'Medan', 'Medan', 'josua.png', 'CEO', 'Male', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
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
-- Dumping data untuk tabel `login`
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
(33, 'AYY935', 'josua', '$2y$10$.3fjXfdVxLpa3X9Afvaraeeq9OmvD45sx4.OZpXa4mwUj1cli.LpS', 'admin', 'josua@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `top`
--

CREATE TABLE `top` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `jumlah_hadir` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `top`
--

INSERT INTO `top` (`id`, `kode_karyawan`, `jumlah_hadir`, `nama`) VALUES
(1, 'FSR366', '1', 'Tomi Ginting'),
(2, 'WXK009', '1', 'Mark Ferdinan'),
(3, 'PGT728', '1', 'Natan Sigalingging'),
(4, 'NNG812', '1', 'Fadly'),
(5, 'ACV829', '1', 'Wiliam Wijaya'),
(6, 'WKQ250', '1', 'Josep Sembiring'),
(7, 'SYL580', '2', 'Rendy Herianto'),
(8, 'MYU889', '1', 'Vira Siburian'),
(9, 'BZG488', '5', 'Lidya Sularto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify`
--

CREATE TABLE `verify` (
  `id` int(20) NOT NULL,
  `kode_karyawan` varchar(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(299) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verify`
--

INSERT INTO `verify` (`id`, `kode_karyawan`, `username`, `password`, `email`) VALUES
(12379, 'SRN288', 'valentina', '$2y$10$ySshDPsq8pbrsi1ejKbip.1zQlShU33xWC5WA.DMvIYuUpxV7Pk7O', 'valentina@gmail.com'),
(12380, 'MXC145', 'fino', '$2y$10$hdd9iIdXYbbueMhd9d8evuVJKEFKYOdznZS1mN45oZ6AbszKbuoxa', 'fino@gmail.com'),
(12381, 'URV047', 'fitri', '$2y$10$i9QKdSyNbBLgygMIxFf0N.LZk8chvG0fmqkj/ay0n6AgXus/NlnZu', 'fitri@gmail.com'),
(12382, 'HUB943', 'boy', '$2y$10$NIJ39bdu7ao1OH9/yFfKWOsHv8TP1zex1sVWOQgEz5pJbWERYzONy', 'boy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan_tetap`
--
ALTER TABLE `karyawan_tetap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `top`
--
ALTER TABLE `top`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `karyawan_tetap`
--
ALTER TABLE `karyawan_tetap`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12386;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
