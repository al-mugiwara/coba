-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 06:26 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpsdata`
--
CREATE DATABASE `gpsdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gpsdata`;

-- --------------------------------------------------------

--
-- Table structure for table `barang_detail`
--

CREATE TABLE IF NOT EXISTS `barang_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tgl_masuke` date NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id_keluar` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `kode_barang` varchar(40) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `tgl`, `kode_barang`, `jumlah`) VALUES
(1, '2019-05-25', 'B1', 1),
(2, '2019-05-25', 'B2', 1),
(3, '2019-05-25', 'B3', 2),
(4, '2019-05-25', 'K1', 3),
(5, '2019-05-25', 'B17', 1),
(6, '2019-05-25', 'B13', 1),
(7, '2019-05-25', 'B15', 1),
(8, '2019-07-22', 'B32', 2),
(9, '2019-07-22', 'B6', 1),
(10, '2019-07-22', 'B7', 1),
(11, '2019-07-22', 'B17', 1),
(12, '2019-07-22', 'B26', 1),
(13, '2019-07-22', 'B40', 1),
(14, '2019-07-22', 'B41', 10),
(16, '2019-07-22', 'B38', 1),
(17, '2019-07-22', 'K1', 1),
(18, '2019-07-22', 'B18', 1),
(19, '2019-07-22', 'B35', 1),
(20, '2019-07-22', 'B39', 1),
(21, '2019-07-22', 'B20', 1),
(22, '2019-07-22', 'B36', 1),
(23, '2019-07-22', 'B3', 1),
(24, '2019-07-22', 'B2', 1),
(25, '2019-07-22', 'B1', 1),
(26, '2019-07-23', 'B3', 6),
(27, '2019-07-23', 'B4', 1),
(28, '2019-07-23', 'B9', 3),
(29, '2019-07-23', 'B6', 1),
(30, '2019-07-23', 'B2', 1),
(31, '2019-07-23', 'B18', 1),
(32, '2019-07-23', 'B20', 1),
(33, '2019-07-23', 'B41', 15),
(34, '2019-07-23', 'B35', 12),
(35, '2019-07-23', 'B36', 8),
(36, '2019-07-23', 'B34', 15),
(37, '2019-07-23', 'B40', 15),
(38, '2019-07-23', 'B33', 5),
(39, '2019-07-23', 'B31', 1),
(40, '2019-07-23', 'B1', 5),
(41, '2019-07-23', 'B10', 1),
(42, '2019-07-23', 'B26', 3),
(43, '2019-07-23', 'K1', 3),
(44, '2019-07-25', 'B38', 18),
(45, '2019-07-25', 'B6', 1),
(46, '2019-07-25', 'B17', 2),
(47, '2019-07-25', 'B9', 4),
(48, '2019-07-25', 'B31', 1),
(49, '2019-07-25', 'B41', 12),
(51, '2019-07-25', 'B40', 15),
(52, '2019-07-25', 'B3', 4),
(53, '2019-07-25', 'B26', 3),
(54, '2019-07-25', 'B22', 1),
(55, '2019-07-25', 'B18', 15),
(56, '2019-07-25', 'B19', 1),
(57, '2019-07-25', 'B34', 10),
(58, '2019-07-25', 'B11', 2),
(59, '2019-07-25', 'B35', 9),
(60, '2019-07-25', 'B36', 9),
(61, '2019-07-25', 'K1', 3),
(62, '2019-07-25', 'B33', 5),
(63, '2019-07-25', 'B32', 2),
(64, '2019-07-26', 'B3', 2),
(65, '2019-07-26', 'K1', 3),
(67, '2019-07-26', 'B41', 11),
(68, '2019-07-26', 'B38', 10),
(69, '2019-07-26', 'B7', 1),
(70, '2019-07-26', 'B31', 1),
(71, '2019-07-26', 'B40', 10),
(72, '2019-07-26', 'B35', 9),
(73, '2019-07-26', 'B36', 8),
(74, '2019-07-26', 'K6', 1),
(75, '2019-07-26', 'B34', 13),
(76, '2019-07-26', 'B33', 3),
(77, '2019-07-26', 'B9', 3),
(78, '2019-07-26', 'B18', 10),
(79, '2019-07-26', 'K8', 1),
(80, '2019-07-26', 'B32', 1),
(82, '2019-07-27', 'B41', 10),
(83, '2019-07-27', 'B40', 10),
(84, '2019-07-27', 'B38', 10),
(85, '2019-07-27', 'B36', 9),
(86, '2019-07-27', 'B35', 12),
(87, '2019-07-27', 'B34', 20),
(88, '2019-07-27', 'B33', 6),
(89, '2019-07-27', 'B32', 2),
(90, '2019-07-27', 'K6', 1),
(91, '2019-07-27', 'K8', 1),
(92, '2019-07-27', 'B31', 1),
(93, '2019-07-27', 'K1', 4),
(94, '2019-07-27', 'B13', 2),
(95, '2019-07-27', 'B8', 1),
(96, '2019-07-27', 'B18', 12),
(97, '2019-07-27', 'B17', 1),
(98, '2019-07-27', 'B1', 6),
(99, '2019-07-27', 'B9', 7),
(100, '2019-07-27', 'B3', 6),
(101, '2019-07-27', 'B6', 1),
(102, '2019-07-27', 'B15', 2),
(103, '2019-07-28', 'B41', 9),
(104, '2019-07-28', 'B43', 1),
(105, '2019-07-28', 'B32', 2),
(106, '2019-07-28', 'B34', 15),
(107, '2019-07-28', 'B35', 9),
(108, '2019-07-28', 'B36', 8),
(109, '2019-07-28', 'K1', 2),
(110, '2019-07-28', 'B16', 2),
(111, '2019-07-28', 'B5', 1),
(112, '2019-07-28', 'K8', 1),
(113, '2019-07-28', 'B31', 1),
(114, '2019-07-28', 'B37', 1),
(115, '2019-07-28', 'K6', 1),
(116, '2019-07-28', 'B9', 2),
(117, '2019-07-28', 'B38', 7),
(118, '2019-07-28', 'B3', 5),
(119, '2019-07-28', 'B11', 3),
(120, '2019-07-28', 'B8', 1),
(121, '2019-07-28', 'K5', 1),
(122, '2019-07-29', 'B32', 2),
(123, '2019-07-29', 'B33', 3),
(124, '2019-07-29', 'B34', 15),
(125, '2019-07-29', 'B35', 9),
(126, '2019-07-29', 'B36', 9),
(127, '2019-07-29', 'K1', 2),
(128, '2019-07-29', 'B16', 1),
(129, '2019-07-29', 'B40', 12),
(130, '2019-07-29', 'B31', 1),
(131, '2019-07-29', 'B37', 1),
(132, '2019-07-29', 'B18', 10),
(133, '2019-07-29', 'B41', 12),
(134, '2019-07-29', 'B38', 10),
(135, '2019-07-29', 'B43', 1),
(136, '2019-07-29', 'B3', 6),
(137, '2019-07-29', 'B11', 3),
(138, '2019-07-29', 'B4', 2),
(139, '2019-07-29', 'K5', 1),
(140, '2019-07-29', 'B21', 2),
(141, '2019-07-30', 'B32', 2),
(142, '2019-07-30', 'B33', 5),
(143, '2019-07-30', 'B34', 20),
(144, '2019-07-30', 'B35', 9),
(145, '2019-07-30', 'B36', 9),
(146, '2019-07-30', 'K1', 3),
(147, '2019-07-30', 'B12', 2),
(148, '2019-07-30', 'B40', 2),
(149, '2019-07-30', 'B30', 1),
(150, '2019-07-30', 'B37', 1),
(151, '2019-07-30', 'B22', 1),
(152, '2019-07-30', 'B43', 1),
(153, '2019-07-30', 'B14', 1),
(154, '2019-07-30', 'B11', 2),
(155, '2019-07-30', 'B7', 1),
(156, '2019-07-30', 'B38', 15),
(157, '2019-07-31', 'K1', 10),
(158, '2019-08-01', 'B33', 4),
(159, '2019-08-01', 'B33', 4),
(160, '2019-08-01', 'B33', 44),
(161, '2019-08-01', 'B33', 4),
(162, '2019-08-01', 'B33', 5),
(163, '2019-08-01', 'B33', 5),
(164, '2019-08-01', 'B33', 5),
(165, '2019-08-01', 'B32', 6),
(166, '2019-08-06', 'B33', 11);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id_masuk` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tgl`, `kode_barang`, `jumlah`) VALUES
(1, '2019-05-15', 'B9', '3'),
(3, '2019-05-25', 'B1', '4'),
(4, '2019-05-25', 'B11', '2'),
(5, '2019-05-25', 'B12', '2'),
(6, '2019-05-25', 'B13', '2'),
(7, '2019-05-25', 'B14', '2'),
(8, '2019-05-25', 'B15', '3'),
(9, '2019-05-25', 'B16', '2'),
(10, '2019-05-25', 'B17', '1'),
(11, '2019-05-25', 'B18', '5'),
(12, '2019-05-25', 'B19', '3'),
(13, '2019-05-25', 'B2', '1'),
(14, '2019-05-25', 'B20', '2'),
(15, '2019-05-25', 'B21', '4'),
(16, '2019-05-25', 'B22', '3'),
(17, '2019-05-25', 'B21', '3'),
(18, '2019-05-25', 'B23', '2'),
(19, '2019-05-25', 'B24', '2'),
(20, '2019-05-25', 'K1', '20'),
(21, '2019-05-25', 'B3', '5'),
(22, '2019-07-20', 'B2', '3'),
(23, '2019-07-20', 'B4', '3'),
(24, '2019-07-20', 'B5', '2'),
(25, '2019-07-20', 'B6', '4'),
(26, '2019-07-20', 'B7', '5'),
(27, '2019-07-20', 'B8', '5'),
(28, '2019-07-20', 'B10', '3'),
(29, '2019-07-20', 'B13', '4'),
(30, '2019-07-20', 'B17', '3'),
(31, '2019-07-20', 'B25', '5'),
(32, '2019-07-22', 'B26', '5'),
(33, '2019-07-22', 'B27', '3'),
(34, '2019-07-22', 'B28', '4'),
(35, '2019-07-22', 'B29', '3'),
(36, '2019-07-22', 'B30', '5'),
(37, '2019-07-22', 'B31', '3'),
(38, '2019-07-22', 'K2', '3'),
(39, '2019-07-22', 'K3', '3'),
(40, '2019-07-22', 'K4', '3'),
(41, '2019-07-22', 'K5', '3'),
(42, '2019-07-22', 'K6', '5'),
(43, '2019-07-22', 'K8', '7'),
(44, '2019-07-22', 'K7', '3'),
(45, '2019-07-22', 'B32', '25'),
(46, '2019-07-22', 'B34', '15'),
(47, '2019-07-22', 'B35', '3'),
(48, '2019-07-22', 'B36', '3'),
(49, '2019-07-22', 'B37', '2'),
(50, '2019-07-22', 'B33', '10'),
(51, '2019-07-22', 'B38', '7'),
(52, '2019-07-22', 'B41', '50'),
(53, '2019-07-22', 'B40', '6'),
(54, '2019-07-22', 'B39', '5'),
(55, '2019-07-22', '', '7'),
(56, '2019-07-23', 'B3', '24'),
(57, '2019-07-23', 'B35', '100'),
(58, '2019-07-23', 'B36', '100'),
(59, '2019-07-23', 'B40', '60'),
(60, '2019-07-23', 'B1', '15'),
(61, '2019-07-23', 'B19', '3'),
(62, '2019-07-23', 'B21', '5'),
(63, '2019-07-23', 'B14', '1'),
(64, '2019-07-23', 'B11', '6'),
(65, '2019-07-23', 'K1', '10'),
(66, '2019-07-23', 'B33', '24'),
(67, '2019-07-23', 'B26', '8'),
(68, '2019-07-23', 'B34', '720'),
(69, '2019-07-23', 'B18', '24'),
(70, '2019-07-25', 'B38', '112'),
(71, '2019-07-25', 'B9', '18'),
(72, '2019-07-27', '', '2'),
(73, '2019-07-27', 'B1', '20'),
(74, '2019-07-27', 'B10', '2'),
(75, '2019-07-27', 'B11', '10'),
(76, '2019-07-27', 'B13', '1'),
(77, '2019-07-27', 'B15', '3'),
(78, '2019-07-27', 'B16', '1'),
(79, '2019-07-27', 'B17', '2'),
(80, '2019-07-27', 'B18', '20'),
(81, '2019-07-27', 'B19', '3'),
(82, '2019-07-27', 'B2', '1'),
(83, '2019-07-27', 'B20', '1'),
(84, '2019-07-27', 'B26', '5'),
(85, '2019-07-27', 'B3', '15'),
(86, '2019-07-27', 'B31', '3'),
(87, '2019-07-27', 'B35', '50'),
(88, '2019-07-27', 'B36', '50'),
(89, '2019-07-27', 'B41', '45'),
(90, '2019-07-27', 'B5', '2'),
(91, '2019-07-27', 'K1', '5'),
(92, '2019-07-27', 'B8', '1'),
(93, '2019-07-27', 'K6', '3'),
(94, '2019-07-27', 'K2', '2'),
(95, '2019-07-27', 'K3', '1'),
(96, '2019-07-27', 'K8', '4'),
(97, '2019-07-28', 'B43', '5'),
(98, '2019-07-30', 'B31', '3'),
(99, '2019-07-30', 'B6', '4'),
(100, '2019-07-30', 'B42', '10'),
(101, '2019-07-30', 'K9', '5'),
(102, '2019-07-30', 'B18', '24'),
(103, '2019-07-30', 'B4', '6'),
(104, '2019-07-30', 'B37', '3'),
(105, '2019-07-31', 'K1', '15'),
(106, '2019-07-31', 'B33', '23'),
(107, '2019-07-31', 'B33', '23'),
(108, '2019-07-31', 'B33', '2'),
(109, '2019-07-31', 'B33', '2'),
(110, '2019-07-31', 'B33', '2'),
(111, '2019-07-31', 'B33', '2'),
(112, '2019-07-31', 'B33', '2'),
(113, '2019-07-31', 'B33', '2'),
(114, '2019-07-31', 'B33', '2'),
(115, '2019-07-31', 'B33', '2'),
(116, '2019-07-31', 'B33', '2'),
(117, '2019-07-31', 'B33', '2'),
(118, '2019-07-31', 'B33', '2'),
(119, '2019-07-31', 'B33', '2'),
(120, '2019-07-31', 'B21', '242'),
(121, '2019-08-01', 'B7', '34'),
(122, '2019-08-01', 'B34', '4'),
(123, '2019-08-01', 'B33', '66'),
(124, '2019-08-01', 'B19', '45'),
(125, '2019-08-01', 'B33', '55'),
(126, '2019-08-01', 'B33', '5'),
(127, '2019-08-01', 'B33', '5'),
(128, '2019-08-01', 'B33', '5'),
(129, '2019-08-01', 'B33', '5'),
(130, '2019-08-01', 'B33', '5'),
(131, '2019-08-01', 'B33', '5'),
(132, '2019-08-01', 'B33', '44'),
(133, '2019-08-01', 'B33', '5'),
(134, '2019-08-01', 'B33', '56'),
(135, '2019-08-01', 'B33', '4'),
(136, '2019-08-01', 'B33', '5'),
(137, '2019-08-01', 'B33', '5'),
(138, '2019-08-01', 'B33', '4'),
(139, '2019-08-01', 'B33', '5'),
(140, '2019-08-01', 'B33', '5'),
(141, '2019-08-01', 'B33', '5'),
(142, '2019-08-01', 'B33', '5'),
(143, '2019-08-01', 'B34', '6'),
(144, '2019-08-01', 'B32', '5'),
(145, '2019-07-25', 'B19', '14'),
(146, '2019-08-01', 'B33', '6'),
(147, '2019-08-06', 'B33', '45'),
(148, '2019-07-01', 'B33', '10');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE IF NOT EXISTS `data_barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jml_minimal` int(11) NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `satuan`, `jenis_barang`, `id_supplier`, `jml_minimal`) VALUES
('B1', 'Kacang panjang', 'ikat', 'basah', 2, 5),
('B10', 'waluh jipang', 'biji', 'basah', 2, 1),
('B11', 'tomat', 'buah', 'basah', 2, 1),
('B12', 'buncis', 'helai', 'basah', 2, 1),
('B13', 'sawi sendok', 'ikat', 'basah', 2, 1),
('B14', 'kubis', 'buah', 'basah', 2, 1),
('B15', 'kembang kol', 'ikat', 'basah', 2, 1),
('B16', 'brokoli', 'buah', 'basah', 2, 1),
('B17', 'terong', 'buah', 'basah', 2, 1),
('B18', 'pisang', 'buah', 'basah', 3, 10),
('B19', 'apel', 'buah', 'basah', 3, 1),
('B2', 'sawi', 'ikat', 'basah', 2, 1),
('B20', 'semangka', 'buah', 'basah', 3, 1),
('B21', 'pir', 'buah', 'basah', 3, 5),
('B22', 'melon', 'buah', 'basah', 3, 1),
('B23', 'anggur', 'buah', 'basah', 3, 10),
('B24', 'pepaya', 'buah', 'basah', 3, 1),
('B25', 'alpukat', 'buah', 'basah', 3, 3),
('B26', 'jambu biji merah', 'buah', 'basah', 3, 5),
('B27', 'buah naga', 'buah', 'basah', 3, 3),
('B28', 'mangga', 'buah', 'basah', 3, 1),
('B29', 'jeruk', 'buah', 'basah', 3, 5),
('B3', 'wortel', 'biji', 'basah', 2, 1),
('B30', 'daging giling sapi', 'kg', 'basah', 7, 1),
('B31', 'daging giling ayam', 'kg', 'basah', 4, 1),
('B32', 'air club galon', 'galon', 'basah', 1, 5),
('B33', 'air mineral club botol', 'botol', 'basah', 1, 3),
('B34', 'air mineral club gelas', 'gelas', 'basah', 1, 48),
('B35', 'bawang merah', 'siung', 'basah', 2, 1),
('B36', 'bawang putih', 'siung', 'basah', 2, 1),
('B37', 'daun bawang', 'ikat', 'basah', 2, 1),
('B38', 'Telur', 'kg', 'basah', 8, 1),
('B39', 'daging sapi potong', 'kg', 'basah', 7, 1),
('B4', 'timun', 'buah', 'basah', 2, 1),
('B40', 'daging ayam potong', 'kg', 'basah', 4, 2),
('B41', 'tahu', 'biji', 'basah', 2, 15),
('B42', 'kentang', 'buah', 'basah', 2, 3),
('B43', 'tempe', 'potong', 'basah', 2, 2),
('B44', 'cabai', 'kg', 'basah', 2, 1),
('B5', 'caisin', 'ikat', 'basah', 2, 1),
('B6', 'jagung', 'buah', 'basah', 2, 1),
('B7', 'sayur asem', 'bungkus', 'basah', 2, 3),
('B8', 'sayur sop', 'bungkus', 'basah', 2, 3),
('B9', 'putren', 'biji', 'basah', 2, 1),
('K1', 'Beras', 'kg', 'kering', 2, 5),
('K2', 'tepung gandum', 'kg', 'kering', 2, 1),
('K3', 'tepung beras', 'kg', 'kering', 2, 1),
('K4', 'tepung maizena', 'kg', 'kering', 2, 1),
('K5', 'teh celup', 'biji', 'kering', 6, 12),
('K6', 'gula', 'kg', 'kering', 6, 1),
('K7', 'gula aren', 'kg', 'kering', 2, 1),
('K8', 'garam', 'bungkus', 'kering', 2, 2),
('K9', 'kopi kapal api', 'bungkus', 'kering', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan`
--

CREATE TABLE IF NOT EXISTS `data_pengajuan` (
  `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` date NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jml_tersisa` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `status_ajuan` varchar(10) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_pengajuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `data_pengajuan`
--

INSERT INTO `data_pengajuan` (`id_pengajuan`, `tgl_pengajuan`, `kode_barang`, `jml_tersisa`, `jml_ajuan`, `status_ajuan`, `id_supplier`) VALUES
(21, '2019-07-27', 'B17', 1, 3, 'acc', 2),
(25, '2019-07-29', 'B20', 1, 2, 'ditolak', 3),
(26, '2019-07-29', 'B29', 3, 2, 'sudah', 3),
(27, '2019-07-29', 'K5', 1, 24, 'sudah', 6),
(28, '2019-07-30', 'B22', 1, 3, 'sudah', 3),
(31, '2019-08-01', 'B23', 2, 50, 'ditolak', 3),
(32, '2019-08-01', 'B23', 2, 50, 'acc', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_persediaan`
--

CREATE TABLE IF NOT EXISTS `data_persediaan` (
  `id_persediaan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(40) NOT NULL,
  `masuk` varchar(10) NOT NULL DEFAULT '0',
  `keluar` varchar(10) NOT NULL DEFAULT '0',
  `stok_tersedia` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_persediaan`,`kode_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `data_persediaan`
--

INSERT INTO `data_persediaan` (`id_persediaan`, `kode_barang`, `masuk`, `keluar`, `stok_tersedia`) VALUES
(1, 'B1', '39', '13', '26'),
(2, 'B2', '5', '3', '2'),
(3, 'B3', '44', '32', '12'),
(4, 'B4', '9', '3', '6'),
(5, 'B5', '4', '1', '3'),
(6, 'B6', '8', '4', '4'),
(7, 'B7', '39', '3', '36'),
(8, 'B8', '6', '2', '4'),
(9, 'B9', '21', '19', '2'),
(10, 'B10', '5', '1', '4'),
(11, 'B11', '18', '10', '8'),
(13, 'B12', '2', '2', '0'),
(14, 'B13', '7', '3', '4'),
(15, 'B14', '3', '1', '2'),
(16, 'B15', '6', '3', '3'),
(17, 'B16', '3', '3', '0'),
(18, 'B17', '6', '5', '1'),
(19, 'B18', '73', '49', '24'),
(20, 'B19', '68', '1', '67'),
(21, 'B20', '3', '2', '1'),
(22, 'B21', '254', '2', '252'),
(23, 'B22', '3', '2', '1'),
(24, 'B23', '2', '0', '2'),
(25, 'B24', '2', '0', '2'),
(26, 'B25', '5', '0', '5'),
(27, 'K1', '50', '34', '16'),
(28, 'B26', '18', '7', '11'),
(29, 'B27', '3', '0', '3'),
(30, 'B28', '4', '0', '4'),
(31, 'B29', '3', '0', '3'),
(32, 'B30', '5', '1', '4'),
(33, 'B31', '9', '6', '3'),
(34, 'K2', '5', '0', '5'),
(35, 'K3', '4', '0', '4'),
(36, 'K4', '3', '0', '3'),
(37, 'K5', '3', '2', '1'),
(38, 'K6', '8', '3', '5'),
(39, 'K7', '3', '0', '3'),
(40, 'K8', '11', '3', '8'),
(41, 'B32', '30', '19', '11'),
(42, 'B33', '402', '109', '45'),
(43, 'B34', '745', '108', '637'),
(44, 'K9', '5', '0', '5'),
(45, 'B35', '153', '70', '83'),
(46, 'B36', '153', '61', '92'),
(47, 'B37', '5', '3', '2'),
(48, 'B38', '119', '71', '48'),
(49, 'B39', '5', '1', '4'),
(50, 'B40', '66', '65', '1'),
(51, 'B41', '95', '79', '16'),
(52, '', '9', '5', '4'),
(53, 'B42', '10', '0', '10'),
(54, 'B43', '5', '3', '2'),
(55, 'B44', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE IF NOT EXISTS `data_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_hp`, `email`) VALUES
(1, 'Pt. Indomarco Adi Prima', 'Jl. Wr Supratman no 112 Pekalongan', '0821778834563', 'indomarcoadiprima@gmail.com'),
(2, 'Kios Sayur Mb Nia', 'Pasar Tradisional Kraton Pekalongan', '085602274647', 'Niasayur@gmail.com'),
(3, 'Kios Buah Segar Pak Ali', 'Pasar Tradisonal Kraton Pekalongan', '081154567883', 'alisegar12@gmail.com'),
(4, 'Kios Ayam Pak Ihksan', 'pasar wiradesa', '085878861234', 'ikhsanjaya123@gmail.com'),
(5, 'Pt. Mekar Sari Aqua', 'Jl. Wr Supratman, Panjang Pekalongan', '085866868278', 'aquadanone@gmail.com'),
(6, 'Alfamart Cab Pusri Pekalongan', 'Jl.Gajah Mada Pekalongan', '08577837481', 'Alfamart@gmail.com'),
(7, 'Kios Daging Sapi Hj Barokah', 'Pasar Kraton Pekalongan', '087833848576', '-'),
(8, 'Kios Telur Denvi', 'Jl. Gajah Mada Pekalongan', '08955674521', '-'),
(9, 'Toko Roti Purimas', 'Jl.Gajah Mada Pekalongan', '08574467342', 'purimas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_fifo`
--

CREATE TABLE IF NOT EXISTS `laporan_fifo` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jml_keluar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `judul_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `id_main_menu` int(4) NOT NULL,
  `hak_akses` enum('administrator','bagian_gudang','ahli_gizi','bagian_keuangan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `judul_menu`, `link`, `icon`, `id_main_menu`, `hak_akses`) VALUES
(1, 'Dashboard', 'admin', ' fa fa-hospital-o', 0, 'administrator'),
(3, 'Manajemen Pengguna', 'admin/user_management', 'fa fa-users', 0, 'administrator'),
(4, 'Dashboard', 'Logistik', 'fa fa-hospital-o', 0, 'bagian_gudang'),
(5, 'Data Master', '#', 'fa fa-list', 0, 'bagian_gudang'),
(6, 'Bahan Makanan', 'logistik/barang', 'fa  fa-archive', 5, 'bagian_gudang'),
(7, 'Transaksi', '#', 'fa fa-dollar ', 0, 'bagian_gudang'),
(8, 'Bahan Makanan Masuk', 'logistik/barang_masuk', 'ion-ios7-arrow-thin-down', 7, 'bagian_gudang'),
(9, 'Bahan Makanan Keluar', 'logistik/barang_keluar', 'ion-ios7-arrow-thin-up', 7, 'bagian_gudang'),
(10, 'Laporan', '#', 'fa fa-suitcase', 0, 'bagian_gudang'),
(11, 'Laporan Bahan Makanan Masuk dan Keluar', 'logistik/laporan', ' md-swap-vert', 10, 'bagian_gudang'),
(12, 'Dashboard', 'Keuangan', ' fa fa-hospital-o', 0, 'bagian_keuangan'),
(13, 'Dashboard', 'Ahli_gizi', ' fa fa-hospital-o', 0, 'ahli_gizi'),
(14, 'Cetak Pengajuan', 'Ahli_gizi/cetak', 'fa fa-print', 0, 'ahli_gizi'),
(15, 'Supplier', 'logistik/supplier', ' md-domain', 0, 'bagian_gudang'),
(16, 'Laporan Data Bahan Makanan', 'logistik/data_barang', 'ion-ios7-paper-outline', 10, 'bagian_gudang'),
(18, 'Laporan Pengajuan', 'keuangan/pengajuan', ' fa fa-file-pdf-o', 0, 'bagian_keuangan'),
(19, 'Laporan Bahan Makanan Masuk dan Keluar', 'keuangan/laporan_mk', ' md-swap-vert', 0, 'bagian_keuangan'),
(20, 'Laporan Data Bahan Makanan', 'keuangan/data_barang', 'ion-ios7-paper-outline', 0, 'bagian_keuangan'),
(21, 'Laporan Masuk dan Keluar', 'ahli_gizi/laporan_mk', ' md-swap-vert', 0, 'ahli_gizi'),
(22, 'Laporan Data Bahan Makanan', 'ahli_gizi/data_barang', 'ion-ios7-paper-outline', 0, 'ahli_gizi'),
(23, 'Label Bahan Makanan', 'logistik/label', 'ion-ios7-paper-outline', 7, 'bagian_gudang'),
(24, 'Laporan Fifo', 'logistik/fifo', 'fa fa-suitcase', 10, 'bagian_gudang');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_selesai`
--

CREATE TABLE IF NOT EXISTS `pengajuan_selesai` (
  `tgl_pengajuan` date NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jml_tersisa` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_selesai`
--

INSERT INTO `pengajuan_selesai` (`tgl_pengajuan`, `kode_barang`, `jml_tersisa`, `jml_ajuan`, `id_supplier`) VALUES
('2019-05-15', 'B1', 0, 3, 2),
('2019-05-15', 'B2', 0, 4, 2),
('2019-05-15', 'B3', 0, 3, 2),
('2019-07-20', 'B2', 0, 3, 2),
('2019-07-20', 'B4', 0, 3, 2),
('2019-07-20', 'B5', 0, 2, 2),
('2019-07-20', 'B6', 0, 4, 2),
('2019-07-20', 'B7', 0, 5, 2),
('2019-07-20', 'B8', 0, 5, 2),
('2019-07-20', 'B10', 0, 3, 2),
('2019-07-20', 'B13', 1, 4, 2),
('2019-07-20', 'B17', 0, 3, 2),
('2019-07-20', 'B25', 0, 5, 3),
('2019-07-22', 'B26', 0, 5, 3),
('2019-07-22', 'B27', 0, 3, 3),
('2019-07-22', 'B28', 0, 4, 3),
('2019-07-22', 'B29', 0, 3, 3),
('2019-07-22', 'B30', 0, 5, 7),
('2019-07-22', 'B31', 0, 3, 4),
('2019-07-22', 'K2', 0, 3, 2),
('2019-07-22', 'K3', 0, 3, 2),
('2019-07-22', 'K4', 0, 2, 2),
('2019-07-22', 'K5', 0, 5, 6),
('2019-07-22', 'K6', 0, 5, 6),
('2019-07-22', 'K8', 0, 7, 2),
('2019-07-22', 'K7', 0, 2, 2),
('2019-07-22', 'B32', 0, 30, 1),
('2019-07-22', 'B34', 0, 15, 1),
('2019-07-22', 'B35', 0, 3, 2),
('2019-07-22', 'B36', 0, 3, 2),
('2019-07-22', 'B37', 0, 3, 2),
('2019-07-22', 'B38', 0, 7, 8),
('2019-07-22', 'B41', 0, 60, 2),
('2019-07-22', 'B40', 0, 6, 4),
('2019-07-22', 'B39', 0, 5, 7),
('2019-07-29', 'B31', 0, 4, 4),
('2019-07-27', 'B6', 0, 3, 2),
('2019-07-22', 'B42', 0, 2, 2),
('2019-07-22', 'K9', 0, 6, 6),
('2019-07-27', 'B18', 10, 24, 3),
('2019-07-29', 'B4', 0, 3, 2),
('2019-07-31', 'K1', 1, 15, 2),
('2019-08-01', 'B7', 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id_username` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `login_hash` varchar(30) NOT NULL,
  PRIMARY KEY (`id_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_username`, `username`, `password`, `login_hash`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(2, 'Markis', '202cb962ac59075b964b07152d234b70', 'bagian_gudang'),
(8, 'saroh', '202cb962ac59075b964b07152d234b70', 'bagian_keuangan'),
(9, 'maya', '202cb962ac59075b964b07152d234b70', 'ahli_gizi'),
(13, 'aku', '202cb962ac59075b964b07152d234b70', 'ahli_gizi'),
(16, 'asd', '0aa1ea9a5a04b78d4581dd6d17742627', 'bagian_gudang'),
(17, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'ahli_gizi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
