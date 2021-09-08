-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 07:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_konsumen`
--

CREATE TABLE `data_konsumen` (
  `id_konsumen` int(6) UNSIGNED NOT NULL,
  `no_invoice` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_konsumen`
--

INSERT INTO `data_konsumen` (`id_konsumen`, `no_invoice`, `nama_konsumen`, `no_telepon`) VALUES
(1, 000001, 'Sasa', '123456789'),
(2, 000002, 'Dafa', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(6) NOT NULL,
  `no_invoice` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `subTotal` int(8) NOT NULL,
  `diskon` int(20) NOT NULL,
  `total` int(8) NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `kode_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `no_invoice`, `nama_konsumen`, `no_telepon`, `subTotal`, `diskon`, `total`, `tanggal`, `kode_hash`) VALUES
(1, 000001, 'Sasa', '123456789', 1500000, 5, 1425000, '2021-05-15', '3e8157d2f8953e80533d81ab88040157d2f0d2f107d1578951d2f7dd2f0d8406c081578d2f8957d895402d902d9d816c07d1b1d2f40895d2fd84053308958951b7d40d82001b3e8'),
(3, 000002, 'Dafa', '1234', 150000, 5, 142500, '2021-05-12', 'd2f2d9800ab802d91b40d2f1b6c02d92003e803e8d85331578956c0d2f5336c07d1577d1b3e83e80895d8ab8403e840013e82002d989553315786c06c06c089520040ab88200407d89507d1573e8');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(2) UNSIGNED NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `harga_perUnit` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan`, `harga_perUnit`) VALUES
(1, 'Desain Poster', 250000),
(2, 'Desain Logo', 150000),
(3, 'Desain $ Cetak Stiker', 50000),
(4, 'Video Invitation', 300000),
(5, 'Website Invitation', 450000),
(6, 'Undangan Cetak type TRIFOLD', 5000),
(7, 'Undangan Cetak type 103', 2000),
(8, 'Undangan Cetak type 104', 2000),
(9, 'Undangan Cetak type 109', 4000),
(10, 'Undangan Cetak type C09', 6000),
(11, 'Undangan Cetak type K77', 5000),
(12, 'Undangan Cetak type T01', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `sessionpesanan_1`
--

CREATE TABLE `sessionpesanan_1` (
  `id_pesanan` int(6) UNSIGNED NOT NULL,
  `id_konsumen` int(6) NOT NULL,
  `no_invoice` int(6) NOT NULL,
  `layanan1` varchar(100) NOT NULL,
  `harga_perUnit1` varchar(8) NOT NULL,
  `quantity1` varchar(3) NOT NULL,
  `subTotal1` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessionpesanan_1`
--

INSERT INTO `sessionpesanan_1` (`id_pesanan`, `id_konsumen`, `no_invoice`, `layanan1`, `harga_perUnit1`, `quantity1`, `subTotal1`) VALUES
(1, 1, 1, 'Desain Logo', '150000', '10', '1500000'),
(3, 2, 2, 'Desain Logo', '150000', '1', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `sessionpesanan_2`
--

CREATE TABLE `sessionpesanan_2` (
  `id_pesanan` int(6) UNSIGNED NOT NULL,
  `id_konsumen` int(6) NOT NULL,
  `no_invoice` int(6) NOT NULL,
  `layanan2` varchar(100) NOT NULL,
  `harga_perUnit2` varchar(8) NOT NULL,
  `quantity2` varchar(3) NOT NULL,
  `subTotal2` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessionpesanan_2`
--

INSERT INTO `sessionpesanan_2` (`id_pesanan`, `id_konsumen`, `no_invoice`, `layanan2`, `harga_perUnit2`, `quantity2`, `subTotal2`) VALUES
(1, 1, 1, '', '', '', ''),
(3, 2, 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_adm` int(2) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(205) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_adm`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Fauzi Maulana', 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_konsumen`
--
ALTER TABLE `data_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `sessionpesanan_1`
--
ALTER TABLE `sessionpesanan_1`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `sessionpesanan_2`
--
ALTER TABLE `sessionpesanan_2`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_adm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_konsumen`
--
ALTER TABLE `data_konsumen`
  MODIFY `id_konsumen` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sessionpesanan_1`
--
ALTER TABLE `sessionpesanan_1`
  MODIFY `id_pesanan` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessionpesanan_2`
--
ALTER TABLE `sessionpesanan_2`
  MODIFY `id_pesanan` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_adm` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
