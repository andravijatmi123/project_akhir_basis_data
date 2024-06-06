-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:03 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `password`) VALUES
(1, 'admin_ganteng', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `config_potongan`
--

CREATE TABLE `config_potongan` (
  `id` int(11) NOT NULL,
  `potongan` float NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `config_potongan`
--

INSERT INTO `config_potongan` (`id`, `potongan`, `waktu`) VALUES
(1, 0.5, '2024-06-04 22:57:12'),
(2, 0.7, '2024-06-05 00:25:12'),
(3, 0.8, '2024-06-05 00:25:37'),
(4, 0.5, '2024-06-05 00:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `uname`, `password`, `nama_lengkap`, `nama_toko`, `alamat_toko`, `nomor_hp`, `email`, `saldo`, `waktu`) VALUES
(1, 'dudu', 'didi', 'dadu', 'shop', 'bandung', '123456789', 'abcd', 132337, '2024-06-04 19:51:57'),
(2, '', '', '', '', '', '', '', 1000, '2024-06-05 00:35:14'),
(4, 'trojan', '123', 'Febiyanti Virginia Yunita', 'Toko Tronjal Tronjol', 'di sini', '1238219380129', 'usesafe434@gmail.com', 3975, '2024-06-06 02:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bayar`
--

CREATE TABLE `transaksi_bayar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi_bayar`
--

INSERT INTO `transaksi_bayar` (`id`, `id_user`, `id_toko`, `nominal`, `waktu`) VALUES
(1, 10, 1, 500, '0000-00-00 00:00:00'),
(2, 10, 1, 500, '2024-06-05 09:46:17'),
(3, 10, 1, 2000, '2024-06-05 10:46:58'),
(4, 10, 1, 8000, '2024-06-05 10:47:47'),
(5, 10, 1, 10000, '2024-06-05 10:58:25'),
(6, 10, 1, 5000, '2024-06-05 10:58:44'),
(7, 10, 1, 100000, '2024-06-05 11:14:09'),
(8, 10, 6, 20000, '2024-06-05 12:13:24'),
(9, 10, 1, 2000, '2024-06-05 20:51:48'),
(10, 10, 4, 5000, '2024-06-06 04:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penarikan`
--

CREATE TABLE `transaksi_penarikan` (
  `id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`, `nama_lengkap`, `nomor_hp`, `email`, `saldo`, `waktu`, `status`) VALUES
(2, 'aaaa', 'bbbb', 'ababab', '1234', 'abcd', 0, '2024-06-03 18:40:42', 0),
(3, 'bbbb', 'aaaa', 'ababab', '1234', 'abcd', 0, '2024-06-03 18:41:56', 0),
(5, 'cccc', 'aaaa', 'ababab', '1234', 'abcd', 0, '2024-06-03 18:42:47', 0),
(6, 'dddd', 'dddd', 'ababab', '1234', 'abcd', 0, '2024-06-03 18:44:41', 0),
(7, 'eeee', 'eeee', 'ababab', '1234', 'abcd', 0, '2024-06-03 18:45:47', 0),
(10, 'asep', '123', 'gfgfdf', '0097886', 'aa@gmail.com', 848000, '2024-06-04 16:58:14', 0),
(11, 'dono', '123', 'dono', '1234', 'dono', 0, '2024-06-05 09:48:17', 0),
(12, 'dini', '123', 'dini', '1234', 'dini', 0, '2024-06-05 09:48:49', 0),
(13, 'dana', '123', 'dana', '1234', 'dana', 0, '2024-06-05 09:49:32', 0),
(14, 'bagas', 'bagus', 'asep nur jaman', '088976041438', 'agnessabila2017@gmail.com', 0, '2024-06-06 02:13:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `config_potongan`
--
ALTER TABLE `config_potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `transaksi_bayar`
--
ALTER TABLE `transaksi_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_penarikan`
--
ALTER TABLE `transaksi_penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `config_potongan`
--
ALTER TABLE `config_potongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_bayar`
--
ALTER TABLE `transaksi_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_penarikan`
--
ALTER TABLE `transaksi_penarikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;