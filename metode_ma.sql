-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 07:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_ma`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis_ma`
--

CREATE TABLE `analisis_ma` (
  `id_analisis` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `periode` varchar(125) NOT NULL,
  `tahun` int(11) NOT NULL,
  `total_permintaan` int(11) NOT NULL,
  `forecast` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_ma`
--

INSERT INTO `analisis_ma` (`id_analisis`, `id_bb`, `periode`, `tahun`, `total_permintaan`, `forecast`) VALUES
(1, 2, '1', 2023, 0, 0),
(2, 2, '2', 2023, 0, 0),
(3, 2, '3', 2023, 0, 0),
(4, 2, '4', 2023, 974, 324.66666666667),
(5, 2, '5', 2023, 886, 295.33333333333),
(6, 2, '6', 2023, 972, 324),
(7, 1, '1', 2023, 0, 0),
(8, 1, '2', 2023, 0, 0),
(9, 1, '3', 2023, 0, 0),
(10, 1, '4', 2023, 1001, 333.66666666667),
(11, 1, '5', 2023, 1379, 459.66666666667),
(12, 1, '6', 2023, 1405, 468.33333333333),
(13, 1, '7', 2023, 1501, 500.33333333333),
(14, 1, '7', 2023, 1501, 500.33333333333);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_bb` varchar(125) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bb`, `id_user`, `nama_bb`, `keterangan`, `harga`, `stok`, `deskripsi`) VALUES
(1, 2, 'Kayu Jati', 'meter', '100000', 120, 'Kayu jati Lokal'),
(2, 2, 'Kayu Mahoni', 'meter', '120000', 230, 'Kayu Mahoni Lokal');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bb`
--

CREATE TABLE `detail_bb` (
  `id_detail_bb` int(11) NOT NULL,
  `id_tran_bb` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bb`
--

INSERT INTO `detail_bb` (`id_detail_bb`, `id_tran_bb`, `id_bb`, `jml`) VALUES
(1, 1, 2, 100),
(2, 2, 2, 25),
(3, 3, 2, 81),
(4, 4, 2, 50),
(5, 5, 2, 45),
(6, 6, 2, 5),
(7, 7, 2, 38),
(8, 8, 2, 64),
(9, 9, 2, 25),
(10, 10, 2, 70),
(11, 11, 2, 65),
(12, 12, 2, 16),
(13, 13, 2, 20),
(14, 14, 2, 78),
(15, 15, 2, 45),
(16, 16, 2, 67),
(17, 17, 2, 89),
(18, 18, 2, 91),
(19, 19, 2, 43),
(20, 20, 2, 56),
(21, 21, 2, 79),
(22, 22, 2, 20),
(23, 23, 2, 20),
(24, 24, 2, 80),
(25, 25, 2, 72),
(26, 26, 2, 45),
(27, 27, 2, 78),
(28, 28, 2, 98),
(29, 29, 2, 11),
(30, 30, 2, 120),
(31, 31, 2, 66),
(32, 32, 2, 67),
(33, 33, 2, 89),
(34, 34, 2, 100),
(35, 35, 2, 89),
(36, 36, 2, 89),
(37, 37, 2, 9),
(38, 38, 2, 41),
(39, 39, 2, 70),
(40, 40, 2, 67),
(41, 41, 2, 45),
(42, 42, 2, 89),
(43, 43, 2, 21),
(44, 44, 2, 8),
(45, 45, 2, 125),
(46, 46, 2, 34),
(47, 47, 2, 89),
(48, 48, 2, 129),
(49, 49, 2, 89),
(50, 50, 2, 87),
(51, 51, 2, 11),
(52, 52, 2, 90),
(53, 53, 2, 87),
(54, 54, 2, 56),
(55, 55, 2, 23),
(56, 56, 2, 56),
(57, 57, 2, 3),
(58, 58, 2, 45),
(59, 59, 2, 67),
(60, 60, 2, 143),
(61, 61, 2, 65),
(62, 62, 2, 120),
(63, 63, 2, 43),
(64, 64, 2, 128),
(65, 65, 2, 231),
(66, 66, 2, 150),
(67, 67, 2, 8),
(68, 68, 2, 31),
(69, 69, 2, 123),
(70, 70, 2, 35),
(71, 71, 2, 190),
(72, 72, 2, 50),
(73, 73, 2, 9),
(74, 1, 1, 12),
(75, 2, 1, 34),
(76, 3, 1, 120),
(77, 4, 1, 50),
(78, 5, 1, 20),
(79, 6, 1, 4),
(80, 7, 1, 24),
(81, 8, 1, 59),
(82, 9, 1, 21),
(83, 10, 1, 15),
(84, 11, 1, 5),
(85, 12, 1, 9),
(86, 13, 1, 10),
(87, 14, 1, 89),
(88, 15, 1, 34),
(89, 16, 1, 300),
(90, 17, 1, 89),
(91, 18, 1, 106),
(92, 19, 1, 231),
(93, 20, 1, 190),
(94, 21, 1, 100),
(95, 22, 1, 50),
(96, 23, 1, 47),
(97, 24, 1, 89),
(98, 25, 1, 45),
(99, 26, 1, 10),
(100, 27, 1, 5),
(101, 28, 1, 15),
(102, 29, 1, 5),
(103, 30, 1, 200),
(104, 31, 1, 234),
(105, 32, 1, 45),
(106, 33, 1, 121),
(107, 34, 1, 68),
(108, 35, 1, 21),
(109, 36, 1, 14),
(110, 37, 1, 11),
(111, 38, 1, 89),
(112, 39, 1, 23),
(113, 40, 1, 60),
(114, 41, 1, 34),
(115, 42, 1, 12),
(116, 43, 1, 42),
(117, 44, 1, 12),
(118, 45, 1, 131),
(119, 46, 1, 59),
(120, 47, 1, 121),
(121, 48, 1, 14),
(122, 49, 1, 5),
(123, 50, 1, 58),
(124, 51, 1, 33),
(125, 52, 1, 31),
(126, 53, 1, 134),
(127, 54, 1, 34),
(128, 55, 1, 54),
(129, 56, 1, 43),
(130, 57, 1, 17),
(131, 58, 1, 231),
(132, 59, 1, 35),
(133, 60, 1, 32),
(134, 61, 1, 89),
(135, 62, 1, 20),
(136, 63, 1, 24),
(137, 64, 1, 251),
(138, 65, 1, 87),
(139, 66, 1, 59),
(140, 67, 1, 44),
(141, 68, 1, 165),
(142, 69, 1, 89),
(143, 70, 1, 46),
(144, 71, 1, 21),
(145, 72, 1, 31),
(146, 73, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tran_bb`
--

CREATE TABLE `tran_bb` (
  `id_tran_bb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_tran` varchar(15) NOT NULL,
  `tot_bayar` varchar(15) NOT NULL,
  `stat_order` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tran_bb`
--

INSERT INTO `tran_bb` (`id_tran_bb`, `id_user`, `tgl_tran`, `tot_bayar`, `stat_order`, `time`) VALUES
(1, 2, '2023-01-01', '11440000', 1, '2023-09-09 03:24:48'),
(2, 2, '2023-01-02', '6580000', 1, '2023-09-09 03:24:48'),
(3, 2, '2023-01-03', '22500000', 1, '2023-09-09 03:24:48'),
(4, 2, '2023-01-04', '11000000', 1, '2023-09-09 03:24:48'),
(5, 2, '2023-01-05', '6900000', 1, '2023-09-09 03:24:48'),
(6, 2, '2023-01-06', '980000', 1, '2023-09-09 03:24:48'),
(7, 2, '2023-02-01', '5780000', 1, '2023-09-09 03:19:34'),
(8, 2, '2023-02-02', '13480000', 1, '2023-09-09 03:19:34'),
(9, 2, '2023-02-03', '5020000', 1, '2023-09-09 03:19:34'),
(10, 2, '2023-02-04', '8800000', 1, '2023-09-09 03:19:34'),
(11, 2, '2023-02-05', '7100000', 1, '2023-09-09 03:19:34'),
(12, 2, '2023-02-06', '2680000', 1, '2023-09-09 03:19:34'),
(13, 2, '2023-02-07', '3200000', 1, '2023-09-09 03:19:34'),
(14, 2, '2023-03-01', '18480000', 1, '2023-09-09 03:19:34'),
(15, 2, '2023-03-02', '8580000', 1, '2023-09-09 03:19:34'),
(16, 2, '2023-03-03', '42700000', 1, '2023-09-09 03:19:34'),
(17, 2, '2023-03-04', '19580000', 1, '2023-09-09 03:19:34'),
(18, 2, '2023-03-05', '21820000', 1, '2023-09-09 03:19:34'),
(19, 2, '2023-04-06', '32020000', 1, '2023-09-09 03:19:34'),
(20, 2, '2023-04-07', '28400000', 1, '2023-09-09 03:19:34'),
(21, 2, '2023-04-08', '19900000', 1, '2023-09-09 03:19:34'),
(22, 2, '2023-04-09', '8000000', 1, '2023-09-09 03:19:34'),
(23, 2, '2023-04-10', '7640000', 1, '2023-09-09 03:19:34'),
(24, 2, '2023-05-11', '18680000', 1, '2023-09-09 03:19:34'),
(25, 2, '2023-05-12', '12600000', 1, '2023-09-09 03:19:34'),
(26, 2, '2023-05-13', '5700000', 1, '2023-09-09 03:19:34'),
(27, 2, '2023-05-14', '8400000', 1, '2023-09-09 03:19:34'),
(28, 2, '2023-05-15', '11600000', 1, '2023-09-09 03:19:34'),
(29, 2, '2023-05-16', '1700000', 1, '2023-09-09 03:19:34'),
(30, 2, '2023-06-01', '36000000', 1, '2023-09-09 03:19:34'),
(31, 2, '2023-06-02', '34680000', 1, '2023-09-09 03:19:34'),
(32, 2, '2023-06-03', '12100000', 1, '2023-09-09 03:19:34'),
(33, 2, '2023-06-04', '23420000', 1, '2023-09-09 03:19:34'),
(34, 2, '2023-06-05', '18160000', 1, '2023-09-09 03:19:34'),
(35, 2, '2023-06-06', '11420000', 1, '2023-09-09 03:19:34'),
(36, 2, '2023-06-07', '10580000', 1, '2023-09-09 03:19:34'),
(37, 2, '2023-06-08', '2220000', 1, '2023-09-09 03:19:34'),
(38, 2, '2023-07-01', '14780000', 1, '2023-09-09 03:19:34'),
(39, 2, '2023-07-02', '9760000', 1, '2023-09-09 03:19:34'),
(40, 2, '2023-07-03', '13900000', 1, '2023-09-09 03:19:34'),
(41, 2, '2023-07-04', '8580000', 1, '2023-09-09 03:19:34'),
(42, 2, '2023-07-05', '10340000', 1, '2023-09-09 03:19:34'),
(43, 2, '2023-07-06', '7140000', 1, '2023-09-09 03:19:34'),
(44, 2, '2023-07-07', '2240000', 1, '2023-09-09 03:19:34'),
(45, 2, '2023-08-01', '28220000', 1, '2023-09-09 03:19:34'),
(46, 2, '2023-08-02', '10480000', 1, '2023-09-09 03:19:34'),
(47, 2, '2023-08-03', '23420000', 1, '2023-09-09 03:19:34'),
(48, 2, '2023-08-04', '14580000', 1, '2023-09-09 03:19:34'),
(49, 2, '2023-08-05', '9500000', 1, '2023-09-09 03:19:34'),
(50, 2, '2023-08-06', '15660000', 1, '2023-09-09 03:19:34'),
(51, 2, '2023-08-07', '5060000', 1, '2023-09-09 03:19:34'),
(52, 2, '2023-09-01', '12720000', 1, '2023-09-09 03:19:34'),
(53, 2, '2023-09-02', '24780000', 1, '2023-09-09 03:19:34'),
(54, 2, '2023-09-03', '9680000', 1, '2023-09-09 03:19:34'),
(55, 2, '2023-09-04', '8780000', 1, '2023-09-09 03:19:34'),
(56, 2, '2023-09-05', '10760000', 1, '2023-09-09 03:19:34'),
(57, 2, '2023-09-06', '2340000', 1, '2023-09-09 03:19:34'),
(58, 2, '2023-10-07', '32220000', 1, '2023-09-09 03:19:34'),
(59, 2, '2023-10-08', '10900000', 1, '2023-09-09 03:19:34'),
(60, 2, '2023-10-09', '18140000', 1, '2023-09-09 03:19:34'),
(61, 2, '2023-10-10', '17180000', 1, '2023-09-09 03:19:34'),
(62, 2, '2023-10-11', '14400000', 1, '2023-09-09 03:19:34'),
(63, 2, '2023-10-12', '7180000', 1, '2023-09-09 03:19:34'),
(64, 2, '2023-11-01', '42920000', 1, '2023-09-09 03:19:34'),
(65, 2, '2023-11-02', '33540000', 1, '2023-09-09 03:19:34'),
(66, 2, '2023-11-03', '22080000', 1, '2023-09-09 03:19:34'),
(67, 2, '2023-11-04', '6080000', 1, '2023-09-09 03:19:34'),
(68, 2, '2023-12-01', '22900000', 1, '2023-09-09 03:19:34'),
(69, 2, '2023-12-02', '22980000', 1, '2023-09-09 03:19:34'),
(70, 2, '2023-12-03', '9020000', 1, '2023-09-09 03:19:34'),
(71, 2, '2023-12-04', '21520000', 1, '2023-09-09 03:19:34'),
(72, 2, '2023-12-05', '8720000', 1, '2023-09-09 03:19:34'),
(73, 2, '2023-12-06', '4500000', 1, '2023-09-09 03:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Perusahaan', 'Kuningan, Jawa Barat', '089887656545', 'perusahaan', 'perusahaan', 1),
(2, 'Supplier 1', 'Kuningan, Jawa Barat', '089987656543', 'supplier1', 'supplier1', 2),
(3, 'Supplier2', 'Kuningan, Jawa Barat', '089987645312', 'supplier2', 'supplier2', 2),
(4, 'Supplier3', 'Kuningan, Jawa Barat', '089987677654', 'supplier3', 'supplier3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis_ma`
--
ALTER TABLE `analisis_ma`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indexes for table `detail_bb`
--
ALTER TABLE `detail_bb`
  ADD PRIMARY KEY (`id_detail_bb`);

--
-- Indexes for table `tran_bb`
--
ALTER TABLE `tran_bb`
  ADD PRIMARY KEY (`id_tran_bb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis_ma`
--
ALTER TABLE `analisis_ma`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_bb`
--
ALTER TABLE `detail_bb`
  MODIFY `id_detail_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tran_bb`
--
ALTER TABLE `tran_bb`
  MODIFY `id_tran_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
