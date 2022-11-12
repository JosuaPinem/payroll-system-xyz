-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220522.7701cd71da
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2022 pada 07.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

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
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `kode_karyawan`, `nama`, `nip`, `tanggal`, `tempat`, `alamat`, `foto`, `posisi`, `jenis_kelamin`) VALUES
(6, 'ABC123', 'Afiq Alghazali', '55555', '2004-02-03', 'medan', 'medan', 'LOGO FMIPA.png', 'HRD', 'Laki-Laki'),
(9, 'KRT698', 'josua', '123456789', '2001-01-01', 'Medan', 'Medan', 'LOGO FMIPA.png', 'CEO', 'Laki-Laki'),
(12, 'XYT221', 'raihan', '55555', '2002-02-02', 'Medan', 'medan', 'LOGO FMIPA.png', 'senior developer', 'Laki-Laki'),
(15, 'OEF501', 'rendy', '10983453', '1999-03-03', 'Semarang', 'Jakarta', 'LOGO FMIPA.png', '', ''),
(16, 'TQX268', 'novi', '987789006', '1997-05-05', 'Bali', 'Jakarta', 'LOGO FMIPA.png', '', ''),
(27, 'KXU654', 'Grace Oktavia', '12345', '2022-11-29', 'Medan', 'Medan', 'bright.jpg', '', ''),
(28, 'TOW966', 'Sasuke Uchiha', '12345', '2022-11-09', 'Konoha', 'Konoha', 'josua.jpg', '', ''),
(29, 'NMH809', 'Bright Ginting', '12345', '2022-11-01', 'Medan', 'Medan', 'logo solvedx-04.png', '', '');

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
(5, 'ABC123', 'afiq', '$2y$10$6UNcx1gDkgDx440/5z98humxFVwxfei4t9cdltAFfa1oycTySNCcK', 'admin', 'afiq@gmail.com'),
(6, 'KRT698', 'josua', '$2y$10$p9u6tU.1SbNhvqQI5KmvI.rfCZlqmZg2r9ZPfS/QH7rxDQRwR88w6', 'ceo', 'josua@gmail.com'),
(7, 'XYT221', 'raihan', '$2y$10$O3Vd0cEAtwDOXv/ox6.95OGGed5WXlrPXae0xJ3B2.WYaE/XINrl6', 'karyawan', 'raihan@gmail.com'),
(8, 'OEF501', 'rendy', '$2y$10$6UNcx1gDkgDx440/5z98humxFVwxfei4t9cdltAFfa1oycTySNCcK', 'karyawan', 'rendy@gmail.com'),
(9, 'TQX268', 'novi', '$2y$10$Nw307Pq16DclMrezrcWDZeIlgYf60rX8QNOx8iJVcszGTBVp2HlW6', 'karyawan', 'novi123@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `top_karyawan`
--

CREATE TABLE `top_karyawan` (
  `kode_karyawan` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `top_karyawan`
--

INSERT INTO `top_karyawan` (`kode_karyawan`, `nama`, `posisi`, `foto`) VALUES
('ABC123', 'Afiq Alghazali', 'hrd', 'LOGO FMIPA.png'),
('KRT698', 'Josua', 'ceo', 'LOGO FMIPA.png'),
('XYT221', 'raihan', 'senior developer', 'LOGO FMIPA.png');

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
(25, 'KXU654', 'grace', '$2y$10$VOTGGs55q//3Wj4pn97zkeSWJUgizoXWmhIC.rsRBbbYlR.kUcOJa', 'grace@gmail.com'),
(26, 'TOW966', 'sasuke', '$2y$10$rAtXxaeiEvCnisGQwbPk4.no9K5gpuvtfca5i4mst7/jqE8i1WMU.', 'sasuke@gmail.com'),
(27, 'NMH809', 'bright', '$2y$10$YY0.zdWmd6BOC1soRGNPV.8gaKhKB2rlR4/Lq2RyXsOXycOLdVPIG', 'bright@gmail.com'),
(12344, 'BOT428', 'luluk', '12345667', 'luluk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
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
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



