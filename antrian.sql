-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2021 at 09:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `teller` int(11) NOT NULL,
  `cs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `teller`, `cs`) VALUES
(1, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang_kerja`
--

CREATE TABLE `tb_ruang_kerja` (
  `id_ruang` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis` int(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang_kerja`
--

INSERT INTO `tb_ruang_kerja` (`id_ruang`, `nama`, `jenis`, `aktif`) VALUES
(1, 'Teller 1', 0, 2),
(2, 'Teller 2', 0, 0),
(3, 'Teller 3', 0, 1),
(4, 'Teller 4', 0, 1),
(5, 'CS-1', 1, 1),
(6, 'CS-2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_utama`
--

CREATE TABLE `tb_utama` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `no_antri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_utama`
--

INSERT INTO `tb_utama` (`id`, `tanggal`, `id_user`, `id_ruang`, `no_antri`) VALUES
(1, '2021-04-05 14:42:32', 1, 1, 3),
(2, '2021-04-05 14:42:32', 2, 2, 4),
(3, '2021-04-05 14:43:13', 3, 3, 6),
(4, '2021-04-05 14:43:13', 3, 3, 8),
(5, '2021-04-20 15:47:11', 1, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruang_kerja`
--
ALTER TABLE `tb_ruang_kerja`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_utama`
--
ALTER TABLE `tb_utama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_ruang` (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ruang_kerja`
--
ALTER TABLE `tb_ruang_kerja`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_utama`
--
ALTER TABLE `tb_utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_utama`
--
ALTER TABLE `tb_utama`
  ADD CONSTRAINT `fk_to_ruang` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang_kerja` (`id_ruang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
