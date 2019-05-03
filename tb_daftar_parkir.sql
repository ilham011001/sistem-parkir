-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 02:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_parkir`
--

CREATE TABLE `tb_daftar_parkir` (
  `kode` varchar(5) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `jenis` varchar(22) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jam_masuk` varchar(9) NOT NULL,
  `hitung_jam_masuk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_parkir`
--

INSERT INTO `tb_daftar_parkir` (`kode`, `plat_nomor`, `jenis`, `merk`, `jam_masuk`, `hitung_jam_masuk`) VALUES
('EP187', '223', 'Motor', '11', '20:15', 20),
('EP247', 'dsfa', 'Motor', 'dfsa', '19:17', 19),
('EP263', 'afds', 'Motor', 'fdsa', '20:15', 20),
('EP302', 'asdfdf', 'Mobil', 'afds', '19:17', 19),
('EP502', 'asdff', 'Motor', 'afds', '19:15', 19),
('EP733', 'asdf', 'Motor', 'dsa', '19:23', 19),
('EP854', 'fdas', 'Mobil', 'fds', '20:19', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_parkir`
--
ALTER TABLE `tb_daftar_parkir`
  ADD PRIMARY KEY (`kode`,`plat_nomor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
