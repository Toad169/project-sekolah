-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 05:08 AM
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
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'Shandy', 'shandy@gmail.com', '$2y$10$ITGUnKfVdWluTOFy8KNmvOO.mICmvyq8i'),
(3, 'Aku', 'admin@admin.com', '$2y$10$m8qCd6OvqPyBqEWH47Uw.e7S/eCvgb6qr'),
(4, 'alya putri iftitah', 'oke@gmail.com', '$2y$10$wQNcfDr6Yu5EcYyaJNA2TOpkcP.QDDOadD6uQfgGf4pK9o97T7o8e'),
(5, 'zulia riska', 'halo@gmail.com', 'satria01'),
(6, 'zulia riska', 'gatau@gmail.com', 'satria01');

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

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`) VALUES
(9, 'ALISA SABRINA RIZKI', 'anggota', '', 15, '0812345678'),
(10, 'VANESA PUTRI RAMADHANI', 'anggota', '', 15, '0812345678'),
(11, 'RIZKIA YULIANA NIKMAH', 'anggota', '', 15, '0812345678'),
(12, 'AENI SURYANINGTYAS', 'anggota', '', 15, '0812345678'),
(13, 'DURROTUN NAFISAH', 'anggota', '', 15, '0812345678'),
(14, 'MOHAMMAD FIKRI ALVIN', 'anggota', '', 15, '0812345678'),
(15, 'MOHAMMAD FIKRI ALVIN', 'anggota', '', 15, '0812345678'),
(16, 'AISYA NAZULA', 'anggota', '', 15, '0812345678'),
(17, 'JIHAN RAMADHANI', 'anggota', '', 15, '0812345678'),
(18, 'NEYSA AULYA PUTRI', 'anggota', '', 15, '0812345678'),
(19, 'KURNIA NURUL BAROKAH', 'anggota', '', 15, '0812345678'),
(20, 'FATMA NAILA HUSNA', 'anggota', '', 15, '0812345678'),
(21, 'NEYSA AULIA PUTRI', 'anggota', '', 15, '0812345678'),
(22, 'MUHAMMAD GUSNUL ARKHAMUL FIRDAUS', 'anggota', '', 15, '0812345678'),
(23, 'MAHESA BIMAS EFFENDI', 'anggota', '', 15, '0812345678'),
(24, 'AKHDA NURUL AZIZAH', 'anggota', '', 15, '0812345678'),
(25, 'MUHAMMAD RAIHAN AMIN', 'anggota', '', 15, '0812345678'),
(26, 'NOVANTYO WAHYU PRADI SETYANTO', 'anggota', '', 15, '0812345678'),
(27, 'MUHAMMAD KHAIRUL AZZAM SAIFUL ANAM', 'anggota', '', 15, '0812345678'),
(28, 'MUHAMMAD REYHAN YAQDHAN', 'anggota', '', 15, '0812345678'),
(29, 'WAJID MAFIS SONI', 'anggota', '', 15, '0812345678'),
(30, 'WAJID MAFIS SONI', 'anggota', '', 15, '0812345678'),
(31, 'AHMAD RIFQI HIDAYAH', 'anggota', '', 15, '0812345678'),
(32, 'MILLA APRILLIA', 'anggota', '', 15, '0812345678'),
(33, 'FEBRIANA ARDIA PRAMESTI', 'Ketua Paskib', '', 16, '0897654321'),
(34, 'LIANA PUTRI WULAN DARI', 'anggota', '', 16, '0897654321'),
(35, 'EVA DWI AGUSTIN', 'Wakil Ketua 2', '', 16, '0897654321'),
(36, 'RIRIN AYU SETIANINGSIH', 'anggota', '', 16, '0897654321'),
(37, 'FRISCA CANDRA AMIRA', 'Bendahara', '', 16, '0897654321'),
(38, 'MAULIDA KHASANAH', 'Sekertaris', '', 16, '0897654321'),
(39, 'FARIDAH NABILAH ZAHRAH', 'Sekertaris', '', 16, '0897654321'),
(40, 'HAFIZATUN NAFSIYAH', 'anggota', '', 16, '0897654321'),
(41, 'SATRIO DIMAS PRAYOGA', 'Wakil Ketua 1', '', 16, '0897654321'),
(42, 'MUHAMMAD RAFI RAMADHAN', 'anggota', '', 16, '0897654321'),
(43, 'RESTU BAYU PRATAMA', 'anggota', '', 16, '0897654321'),
(44, 'ZIMA KHOLIFATUL MUZZA', 'Bendahara 2', '', 16, '0897654321'),
(45, 'LATIFATUZ ZAHRA RAMANDHANI', 'Sekertaris 2', '', 16, '0897654321'),
(46, 'BELVA ARMIDA AULIA', 'anggota', '', 16, '0897654321'),
(49, 'muklis ahmad', 'anggota', '', 16, '08135678910');

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

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jumlah`, `keterangan`, `id_sumber`) VALUES
(25, '2025-06-27', 358000, 'uang kas bulan juni', NULL),
(26, '2025-05-29', 370000, 'uang kas bulan mei', NULL),
(27, '2024-09-16', 1256000, 'anggaran paskib', NULL),
(33, '2026-04-08', 5000, 'kas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_kas`
--

CREATE TABLE `pembayaran_kas` (
  `id_kas` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `keterangan`, `id_sumber`) VALUES
(21, '2025-04-17', 25000, 'print materi paskibraka', NULL),
(22, '2025-04-08', 400000, 'kopel satpam', NULL),
(23, '2025-03-13', 740000, 'peci paskibraka', NULL),
(24, '2025-02-01', 272000, 'topi paskibra ', NULL),
(25, '2025-02-04', 112000, 'bet paskib', NULL),
(31, '2026-04-08', 3000, 'karet', NULL);

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
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `id_karyawan` (`id_karyawan`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembayaran_kas`
--
ALTER TABLE `pembayaran_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran_kas`
--
ALTER TABLE `pembayaran_kas`
  ADD CONSTRAINT `pembayaran_kas_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
