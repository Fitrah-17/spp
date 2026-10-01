-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2026 at 12:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_pembayaran`
--

CREATE TABLE `cek_pembayaran` (
  `nisn` varchar(10) NOT NULL,
  `tgl_terakhir_byr` date NOT NULL,
  `tgl_sekarang` date NOT NULL,
  `status` enum('Belum Lunas','Sudah Lunas') NOT NULL,
  `jumlah_bulan` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cek_pembayaran`
--

INSERT INTO `cek_pembayaran` (`nisn`, `tgl_terakhir_byr`, `tgl_sekarang`, `status`, `jumlah_bulan`, `nama`, `no_telp`) VALUES
('0019283746', '2026-02-06', '2026-02-06', 'Sudah Lunas', '1', 'Fitrah', '082112345678'),
('0048172635', '2026-02-07', '2026-02-10', 'Sudah Lunas', '1', 'Arif', '081376543210'),
('0073648291', '2026-01-08', '2026-02-15', 'Belum Lunas', '2', 'Reza', '085712345678'),
('0087654321', '2026-01-12', '2026-02-11', 'Belum Lunas', '1', 'Aji', '081298765432'),
('0091827364', '2026-02-09', '2026-02-09', 'Sudah Lunas', '1', 'Mabi', '089612345678');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `komp_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `komp_keahlian`) VALUES
('KLS001', 'X RPL 3', 'Rekayasa Perangkat Lunak'),
('KLS002', 'X RPL 2', 'Rekayasa Perangkat Lunak'),
('KLS003', 'XI RPL 1', 'Rekayasa Perangkat Lunak'),
('KLS004', 'XI TKJ 1', 'Teknik Komputer Jaringan'),
('KLS005', 'XII TKJ 2', 'Teknik Komputer Jaringan'),
('KLS006', 'XI RPL 1', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(11) NOT NULL,
  `status` enum('Belum Lunas','Sudah Lunas') NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_terakhir_bayar` date NOT NULL,
  `batas_pembayaran` date NOT NULL,
  `jumlah_bulan` varchar(10) NOT NULL,
  `id_spp` varchar(11) NOT NULL,
  `nominal_bayar` varchar(100) NOT NULL,
  `jumlah_bayar` varchar(40) NOT NULL,
  `kembalian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `status`, `nisn`, `tgl_bayar`, `tgl_terakhir_bayar`, `batas_pembayaran`, `jumlah_bulan`, `id_spp`, `nominal_bayar`, `jumlah_bayar`, `kembalian`) VALUES
('BYR001', 'Belum Lunas', '0087654321', '2026-02-11', '2026-01-12', '2026-02-10', '1', 'SPP002', '175000', '100000', '-75000'),
('BYR002', 'Sudah Lunas', '0019283746', '2026-02-06', '2026-02-06', '2026-02-10', '1', 'SPP003', '200000', '200000', '0'),
('BYR003', 'Sudah Lunas', '0073648291', '2026-02-15', '2026-01-08', '2026-02-10', '2', 'SPP001', '150000', '150000', '0'),
('BYR004', 'Sudah Lunas', '0048172635', '2026-02-07', '2026-02-07', '2026-02-10', '1', 'SPP005', '250000', '250000', '0'),
('BYR005', 'Sudah Lunas', '0091827364', '2026-02-09', '2026-02-09', '2026-02-10', '1', 'SPP004', '225000', '250000', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
('PTG001', 'admin', 'admin123', 'Budi Santos', 'admin'),
('PTG002', 'andi', 'andi123', 'Andi Setiawan', 'petugas'),
('PTG003', 'siti', 'siti123', 'Siti Aminah', 'petugas'),
('PTG004', 'dewi', 'dewi123', 'Dewi Lestari', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('0019283746', '240021', 'Fitrahg', 'KLS001', 'Jl. Cempaka No. 8', '082112345678', 'SPP003'),
('0048172635', '240009', 'Arif', 'KLS002', 'Jl. Melati No. 44', '081376543210', 'SPP005'),
('0073648291', '220018', 'Reza', 'KLS005', 'Jl. Anggrek No. 21', '085712345678', 'SPP001'),
('0087654321', '230014', 'Aji', 'KLS003', 'Jl. Mawar No. 15', '081298765432', 'SPP002'),
('0091827364', '230027', 'Mabi', 'KLS004', 'Jl. Kenanga No. 12', '089612345678', 'SPP004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` varchar(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
('SPP001', 2022, '150000'),
('SPP002', 2023, '175000'),
('SPP003', 2024, '200000'),
('SPP004', 2025, '225000'),
('SPP005', 2026, '250000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_pembayaran`
--
ALTER TABLE `cek_pembayaran`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pembayaran_siswa` (`nisn`),
  ADD KEY `fk_pembayaran_spp` (`id_spp`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `fk_siswa_kelas` (`id_kelas`),
  ADD KEY `fk_siswa_spp` (`id_spp`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cek_pembayaran`
--
ALTER TABLE `cek_pembayaran`
  ADD CONSTRAINT `fk_cek_pembayaran_siswa` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `fk_pembayaran_siswa` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran_spp` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa_spp` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
