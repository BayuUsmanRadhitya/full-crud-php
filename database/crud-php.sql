-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 10:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Bayu', 'bay', 'usmanradhityab@gmail.com', '$2y$10$VH1.0R8YtdtGLICgY1qBF.YP5eukxXeGNroo28yhfKYJOmg9y29cq', '1'),
(6, 'Operator Barang', 'operatorbarang', 'operatorbarang@gmail.com', '$2y$10$1h0XpYcOkQc6iTJ.ksTQ.erwiUMs5RySXHgfrdf2CW224t97QMwrm', '2'),
(7, 'Operator Mahasiswa', 'operatormahasiswa', 'operatormahasiswa@gmail.com', '$2y$10$BsZXNYc49wCROfpuSwfU8uwJKfocR4a2GCa.mz6XkRCJ2B5Iek.um', '3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'Pulpen', 4, 2000, '2024-07-02 01:02:18'),
(2, 'Pensil', 3, 1000, '2024-07-01 06:50:01'),
(3, 'Bayu', 56, 1000, '2024-07-02 01:02:38'),
(4, 'Buku ', 2, 2000, '2024-07-01 08:12:09'),
(5, 'HP', 10, 10000000, '2024-07-01 08:12:37'),
(6, 'HP', 10, 10000000, '2024-07-01 08:13:01'),
(7, 'Papan Dada', 1, 5000, '2024-07-01 08:13:24'),
(8, 'Papan Dada', 1, 5000, '2024-07-01 08:14:20'),
(9, 'Papan Dada', 1, 5000, '2024-07-01 08:14:25'),
(10, 'Papan Dada', 1, 5000, '2024-07-01 08:15:08'),
(12, 'Monitor', 1, 50000, '2024-07-02 03:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `email`, `foto`) VALUES
(1, 'Bayu Usman Radhitya', 'Teknik Informatika ', 'Laki-Laki', '081320131178', 'usmanradhityab@gmail.com', 'foto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
