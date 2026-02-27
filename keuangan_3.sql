-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2026 at 03:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'Shandy', 'shandy@gmail.com', 'satria01');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`) VALUES
(1, 'Besok, Hari minggu akan ada kunjungan dari pihak dinas untuk mengecek kinerja karyawan.'),
(2, 'Hari Kamis jam 8 akan ada rapat, diharapkan kepada semua karyawan agar dapat berhadir.'),
(3, 'Tingkatkan lagi pendapatan, dan minimalkan pengeluaran'),
(4, 'tgl 6 domain dan hosting banyak yang akan expired, dan harus diperpanjang lagi');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_hutang` date NOT NULL,
  `alasan` text NOT NULL,
  `penghutang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jumlah`, `tgl_hutang`, `alasan`, `penghutang`) VALUES
(2, 1000000, '2019-10-17', 'Pinjam', 'riza'),
(4, 100000, '2019-10-18', 'tunggu gajian', 'lufias'),
(5, 0, '2019-10-19', '', ''),
(6, 0, '2019-10-20', '', ''),
(7, 200000, '2019-10-21', 'sakit', 'saiful'),
(8, 30000, '2019-10-22', 'berobat', 'saiful riza'),
(9, 0, '2019-10-23', '', ''),
(10, 20000, '2019-10-24', 'beli domain', 'yusril'),
(11, 120000, '2019-10-25', 'arifinal', 'untuk beli hosting'),
(12, 2500000, '2019-10-26', 'azir', 'untuk beli hosting'),
(13, 70000, '2019-10-25', 'Riza', 'Mau jalan jalan'),
(14, 50000, '0000-00-00', 'Riza', 'Beli rokok'),
(15, 40000, '2019-10-27', 'Riza', 'Uang Bensi'),
(16, 80000, '2019-10-28', 'Riza', 'Mau Nikahan'),
(17, 1000000, '2019-10-29', 'Riza', 'Biaya lahiran anak');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `posisi` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `umur` int(11) NOT NULL,
  `kontak` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_sumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_kas`
--

CREATE TABLE `pembayaran_kas` (
  `id_kas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `minggu_1` int(11) DEFAULT 0,
  `minggu_2` int(11) DEFAULT 0,
  `minggu_3` int(11) DEFAULT 0,
  `minggu_4` int(11) DEFAULT 0,
  `bulan` varchar(20) NOT NULL,
  `dibayar` int(11) DEFAULT 0,
  `kekurangan` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_sumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'Buat Web Pemerintah'),
(2, 'Desain Poster Lomba'),
(3, 'Instalasi Softwre'),
(4, 'Instalasi OS'),
(5, 'Buat Video Animasi'),
(6, 'Domain'),
(7, 'Hosting'),
(8, 'Listrik'),
(9, 'Air'),
(10, 'Wifi');

-- --------------------------------------------------------

--
-- Table structure for table `uang`
--

CREATE TABLE `uang` (
  `id_uang` int(11) NOT NULL,
  `tgl_uang` date NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `id_pendapatan` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uang`
--

INSERT INTO `uang` (`id_uang`, `tgl_uang`, `id_pengeluaran`, `id_pendapatan`, `jumlah`) VALUES
(1, '2019-10-23', NULL, 1, 500000),
(2, '2019-10-24', 2, NULL, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `pembayaran_kas`
--
ALTER TABLE `pembayaran_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_sumber` (`id_sumber`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id_uang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran_kas`
--
ALTER TABLE `pembayaran_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uang`
--
ALTER TABLE `uang`
  MODIFY `id_uang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
