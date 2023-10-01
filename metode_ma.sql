-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2023 pada 14.58
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
-- Struktur dari tabel `analisis_ma`
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
-- Dumping data untuk tabel `analisis_ma`
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
(13, 1, '7', 2023, 1501, 500.33333333333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
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
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bb`, `id_user`, `nama_bb`, `keterangan`, `harga`, `stok`, `deskripsi`) VALUES
(1, 2, 'Kayu Jati', 'meter', '100000', 111, 'Kayu jati Lokal'),
(2, 2, 'Kayu Mahoni', 'meter', '120000', 225, 'Kayu Mahoni Lokal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_jadi`
--

CREATE TABLE `bahan_jadi` (
  `id_bj` int(11) NOT NULL,
  `nama_bj` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_jadi`
--

INSERT INTO `bahan_jadi` (`id_bj`, `nama_bj`, `keterangan`, `stok`, `harga`) VALUES
(2, 'Pintu', 'meteran 1 x 0,5 m', 1, '200000'),
(3, 'Jendela', 'ukuran 0,5 x 0,5', 4, '120000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb_keluar`
--

CREATE TABLE `bb_keluar` (
  `id_bb_keluar` int(11) NOT NULL,
  `id_detail_bb` int(11) NOT NULL,
  `id_bj` int(11) NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `qty_bj` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb_keluar`
--

INSERT INTO `bb_keluar` (`id_bb_keluar`, `id_detail_bb`, `id_bj`, `qty_keluar`, `qty_bj`, `time`) VALUES
(4, 146, 3, 2, 1, '2023-09-23 00:58:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bb`
--

CREATE TABLE `detail_bb` (
  `id_detail_bb` int(11) NOT NULL,
  `id_tran_bb` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bb`
--

INSERT INTO `detail_bb` (`id_detail_bb`, `id_tran_bb`, `id_bb`, `jml`, `sisa`) VALUES
(1, 1, 2, 100, 0),
(2, 2, 2, 25, 0),
(3, 3, 2, 81, 0),
(4, 4, 2, 50, 0),
(5, 5, 2, 45, 0),
(6, 6, 2, 5, 0),
(7, 7, 2, 38, 0),
(8, 8, 2, 64, 0),
(9, 9, 2, 25, 0),
(10, 10, 2, 70, 0),
(11, 11, 2, 65, 0),
(12, 12, 2, 16, 0),
(13, 13, 2, 20, 0),
(14, 14, 2, 78, 0),
(15, 15, 2, 45, 0),
(16, 16, 2, 67, 0),
(17, 17, 2, 89, 0),
(18, 18, 2, 91, 0),
(19, 19, 2, 43, 0),
(20, 20, 2, 56, 0),
(21, 21, 2, 79, 0),
(22, 22, 2, 20, 0),
(23, 23, 2, 20, 0),
(24, 24, 2, 80, 0),
(25, 25, 2, 72, 0),
(26, 26, 2, 45, 0),
(27, 27, 2, 78, 0),
(28, 28, 2, 98, 0),
(29, 29, 2, 11, 0),
(30, 30, 2, 120, 0),
(31, 31, 2, 66, 0),
(32, 32, 2, 67, 0),
(33, 33, 2, 89, 0),
(34, 34, 2, 100, 0),
(35, 35, 2, 89, 0),
(36, 36, 2, 89, 0),
(37, 37, 2, 9, 0),
(38, 38, 2, 41, 0),
(39, 39, 2, 70, 0),
(40, 40, 2, 67, 0),
(41, 41, 2, 45, 0),
(42, 42, 2, 89, 0),
(43, 43, 2, 21, 0),
(44, 44, 2, 8, 0),
(45, 45, 2, 125, 0),
(46, 46, 2, 34, 0),
(47, 47, 2, 89, 0),
(48, 48, 2, 129, 0),
(49, 49, 2, 89, 0),
(50, 50, 2, 87, 0),
(51, 51, 2, 11, 0),
(52, 52, 2, 90, 0),
(53, 53, 2, 87, 0),
(54, 54, 2, 56, 0),
(55, 55, 2, 23, 0),
(56, 56, 2, 56, 0),
(57, 57, 2, 3, 0),
(58, 58, 2, 45, 0),
(59, 59, 2, 67, 0),
(60, 60, 2, 143, 0),
(61, 61, 2, 65, 0),
(62, 62, 2, 120, 0),
(63, 63, 2, 43, 0),
(64, 64, 2, 128, 0),
(65, 65, 2, 231, 0),
(66, 66, 2, 150, 0),
(67, 67, 2, 8, 0),
(68, 68, 2, 31, 0),
(69, 69, 2, 123, 0),
(70, 70, 2, 35, 0),
(71, 71, 2, 190, 0),
(72, 72, 2, 50, 19),
(73, 73, 2, 9, 0),
(74, 1, 1, 12, 0),
(75, 2, 1, 34, 0),
(76, 3, 1, 120, 0),
(77, 4, 1, 50, 0),
(78, 5, 1, 20, 0),
(79, 6, 1, 4, 0),
(80, 7, 1, 24, 0),
(81, 8, 1, 59, 0),
(82, 9, 1, 21, 0),
(83, 10, 1, 15, 0),
(84, 11, 1, 5, 0),
(85, 12, 1, 9, 0),
(86, 13, 1, 10, 0),
(87, 14, 1, 89, 0),
(88, 15, 1, 34, 0),
(89, 16, 1, 300, 0),
(90, 17, 1, 89, 0),
(91, 18, 1, 106, 0),
(92, 19, 1, 231, 0),
(93, 20, 1, 190, 0),
(94, 21, 1, 100, 0),
(95, 22, 1, 50, 0),
(96, 23, 1, 47, 0),
(97, 24, 1, 89, 0),
(98, 25, 1, 45, 0),
(99, 26, 1, 10, 0),
(100, 27, 1, 5, 0),
(101, 28, 1, 15, 0),
(102, 29, 1, 5, 0),
(103, 30, 1, 200, 0),
(104, 31, 1, 234, 0),
(105, 32, 1, 45, 0),
(106, 33, 1, 121, 0),
(107, 34, 1, 68, 0),
(108, 35, 1, 21, 0),
(109, 36, 1, 14, 0),
(110, 37, 1, 11, 0),
(111, 38, 1, 89, 0),
(112, 39, 1, 23, 0),
(113, 40, 1, 60, 0),
(114, 41, 1, 34, 0),
(115, 42, 1, 12, 0),
(116, 43, 1, 42, 0),
(117, 44, 1, 12, 0),
(118, 45, 1, 131, 0),
(119, 46, 1, 59, 0),
(120, 47, 1, 121, 0),
(121, 48, 1, 14, 0),
(122, 49, 1, 5, 0),
(123, 50, 1, 58, 0),
(124, 51, 1, 33, 0),
(125, 52, 1, 31, 0),
(126, 53, 1, 134, 0),
(127, 54, 1, 34, 0),
(128, 55, 1, 54, 0),
(129, 56, 1, 43, 0),
(130, 57, 1, 17, 0),
(131, 58, 1, 231, 0),
(132, 59, 1, 35, 0),
(133, 60, 1, 32, 0),
(134, 61, 1, 89, 0),
(135, 62, 1, 20, 0),
(136, 63, 1, 24, 0),
(137, 64, 1, 251, 0),
(138, 65, 1, 87, 0),
(139, 66, 1, 59, 0),
(140, 67, 1, 44, 0),
(141, 68, 1, 165, 0),
(142, 69, 1, 89, 0),
(143, 70, 1, 46, 0),
(144, 71, 1, 21, 0),
(145, 72, 1, 31, 0),
(146, 73, 1, 30, 20),
(148, 75, 1, 5, 5),
(149, 76, 1, 5, 5),
(150, 77, 2, 5, 5),
(151, 78, 1, 9, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_bb`
--

CREATE TABLE `tran_bb` (
  `id_tran_bb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_tran` varchar(15) NOT NULL,
  `tot_bayar` varchar(15) NOT NULL,
  `stat_order` int(11) NOT NULL,
  `bukti_payment` text DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tran_bb`
--

INSERT INTO `tran_bb` (`id_tran_bb`, `id_user`, `tgl_tran`, `tot_bayar`, `stat_order`, `bukti_payment`, `time`) VALUES
(1, 2, '2023-01-01', '11440000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(2, 2, '2023-01-02', '6580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(3, 2, '2023-01-03', '22500000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(4, 2, '2023-01-04', '11000000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(5, 2, '2023-01-05', '6900000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(6, 2, '2023-01-06', '980000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(7, 2, '2023-02-01', '5780000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(8, 2, '2023-02-02', '13480000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(9, 2, '2023-02-03', '5020000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(10, 2, '2023-02-04', '8800000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(11, 2, '2023-02-05', '7100000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(12, 2, '2023-02-06', '2680000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(13, 2, '2023-02-07', '3200000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(14, 2, '2023-03-01', '18480000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(15, 2, '2023-03-02', '8580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(16, 2, '2023-03-03', '42700000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(17, 2, '2023-03-04', '19580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(18, 2, '2023-03-05', '21820000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(19, 2, '2023-04-06', '32020000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(20, 2, '2023-04-07', '28400000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(21, 2, '2023-04-08', '19900000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(22, 2, '2023-04-09', '8000000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(23, 2, '2023-04-10', '7640000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(24, 2, '2023-05-11', '18680000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(25, 2, '2023-05-12', '12600000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(26, 2, '2023-05-13', '5700000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(27, 2, '2023-05-14', '8400000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(28, 2, '2023-05-15', '11600000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(29, 2, '2023-05-16', '1700000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(30, 2, '2023-06-01', '36000000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(31, 2, '2023-06-02', '34680000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(32, 2, '2023-06-03', '12100000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(33, 2, '2023-06-04', '23420000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(34, 2, '2023-06-05', '18160000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(35, 2, '2023-06-06', '11420000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(36, 2, '2023-06-07', '10580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(37, 2, '2023-06-08', '2220000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(38, 2, '2023-07-01', '14780000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(39, 2, '2023-07-02', '9760000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(40, 2, '2023-07-03', '13900000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(41, 2, '2023-07-04', '8580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(42, 2, '2023-07-05', '10340000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(43, 2, '2023-07-06', '7140000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(44, 2, '2023-07-07', '2240000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(45, 2, '2023-08-01', '28220000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(46, 2, '2023-08-02', '10480000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(47, 2, '2023-08-03', '23420000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(48, 2, '2023-08-04', '14580000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(49, 2, '2023-08-05', '9500000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(50, 2, '2023-08-06', '15660000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(51, 2, '2023-08-07', '5060000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:43:54'),
(52, 2, '2023-09-01', '12720000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(53, 2, '2023-09-02', '24780000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(54, 2, '2023-09-03', '9680000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(55, 2, '2023-09-04', '8780000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(56, 2, '2023-09-05', '10760000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(57, 2, '2023-09-06', '2340000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(58, 2, '2023-10-07', '32220000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(59, 2, '2023-10-08', '10900000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(60, 2, '2023-10-09', '18140000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(61, 2, '2023-10-10', '17180000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(62, 2, '2023-10-11', '14400000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(63, 2, '2023-10-12', '7180000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(64, 2, '2023-11-01', '42920000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(65, 2, '2023-11-02', '33540000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(66, 2, '2023-11-03', '22080000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(67, 2, '2023-11-04', '6080000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(68, 2, '2023-12-01', '22900000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(69, 2, '2023-12-02', '22980000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(70, 2, '2023-12-03', '9020000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(71, 2, '2023-12-04', '21520000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(72, 2, '2023-12-05', '8720000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(73, 2, '2023-12-06', '4500000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-11.jpg', '2023-10-01 12:44:22'),
(75, 2, '2023-09-23', '500000', 3, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-12.jpg', '2023-10-01 12:56:03'),
(76, 2, '2023-09-23', '500000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-13.jpg', '2023-10-01 12:46:52'),
(77, 2, '2023-09-23', '600000', 0, '0', '2023-09-23 09:55:39'),
(78, 2, '2023-09-23', '900000', 0, '0', '2023-09-23 09:55:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Administrasi', 'Kuningan, Jawa Barat', '089887656545', 'admin', 'admin', 1),
(2, 'Supplier 1', 'Kuningan, Jawa Barat', '089987656543', 'supplier1', 'supplier1', 2),
(3, 'Supplier2', 'Kuningan, Jawa Barat', '089987645312', 'supplier2', 'supplier2', 2),
(4, 'Supplier3', 'Kuningan, Jawa Barat', '089987677654', 'supplier3', 'supplier3', 2),
(6, 'Produksi', 'Kuningan, Jawa Barat', '089987656543', 'produksi', 'produksi', 3),
(7, 'Pemilik', 'Kuningan, Jawa Barat', '089987645312', 'pemilik', 'pemilik', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisis_ma`
--
ALTER TABLE `analisis_ma`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indeks untuk tabel `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  ADD PRIMARY KEY (`id_bj`);

--
-- Indeks untuk tabel `bb_keluar`
--
ALTER TABLE `bb_keluar`
  ADD PRIMARY KEY (`id_bb_keluar`);

--
-- Indeks untuk tabel `detail_bb`
--
ALTER TABLE `detail_bb`
  ADD PRIMARY KEY (`id_detail_bb`);

--
-- Indeks untuk tabel `tran_bb`
--
ALTER TABLE `tran_bb`
  ADD PRIMARY KEY (`id_tran_bb`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisis_ma`
--
ALTER TABLE `analisis_ma`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id_bj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bb_keluar`
--
ALTER TABLE `bb_keluar`
  MODIFY `id_bb_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_bb`
--
ALTER TABLE `detail_bb`
  MODIFY `id_detail_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `tran_bb`
--
ALTER TABLE `tran_bb`
  MODIFY `id_tran_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
