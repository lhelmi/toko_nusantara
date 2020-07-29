-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 09:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoindonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama_barang` varchar(75) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kategori`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
('BR1001', 'Makanan', 'Krupuk Ikan', 25000, 60, 'SP01'),
('BR1002', 'Makanan', 'Keripik Singkong', 15000, 60, 'SP01');

-- --------------------------------------------------------

--
-- Table structure for table `gerai`
--

CREATE TABLE `gerai` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gerai`
--

INSERT INTO `gerai` (`id`, `nama`, `alamat`, `kota`, `telepon`) VALUES
('G1', 'Gerai Dago', 'Jl. Ir Hj Djuanda 115', 'Bandung', '0227206678');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `kota`, `telepon`) VALUES
('SP01', 'PD Idola Snack', 'Jl. Kud - Sukabumi', 'Bekasi', '085693725494'),
('SP03', 'Indocraft', 'Jl. Raya Mas No. 47', 'Bali', '0361-973091');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `gerai`
--
ALTER TABLE `gerai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
