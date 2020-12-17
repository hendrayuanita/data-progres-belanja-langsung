-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 08:41 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekbang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_nomor_telp` varchar(100) NOT NULL,
  `admin_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_nama`, `admin_nomor_telp`, `admin_gambar`) VALUES
(2, 'avroraf9@gmail.com', '123', 'Jeanice Ang', '+6289667329031', 'jeje.jpg'),
(3, 'elsalusi@gmail.com', '12345', 'elsa', '+6289667329031', '17630840794038644411.jpg'),
(4, 'yuanita@gmail.com', 'yuanita', 'Yuanita', '+628457284852', '1768326871314877867.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(100) NOT NULL,
  `skpd_nama` varchar(100) NOT NULL,
  `pengeluaran_nominal` bigint(20) NOT NULL,
  `pengeluaran_tgl` date NOT NULL,
  `pengeluaran_added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`pengeluaran_id`, `skpd_nama`, `pengeluaran_nominal`, `pengeluaran_tgl`, `pengeluaran_added_by`) VALUES
(1, 'Dinas Kesehatan', 12000000, '2019-01-29', ''),
(2, 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah', 600000, '2019-01-30', 'Jeanice Ang'),
(3, 'Badan Penanggulangan Bencana Daerah', 200000, '2019-02-06', 'elsa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skpd`
--

CREATE TABLE `tbl_skpd` (
  `skpd_id` int(100) NOT NULL,
  `skpd_nama` varchar(100) NOT NULL,
  `skpd_pagu` bigint(20) NOT NULL,
  `skpd_added_by` varchar(100) NOT NULL,
  `skpd_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skpd`
--

INSERT INTO `tbl_skpd` (`skpd_id`, `skpd_nama`, `skpd_pagu`, `skpd_added_by`, `skpd_color`) VALUES
(2, 'Badan Penanggulangan Bencana Daerah', 3000000, 'Jeanice Ang', '#00FFFF'),
(3, 'Dinas Kesehatan', 24000000, 'Jeanice Ang', '#8FBC8F'),
(4, 'Dinas Pendidikan', 12000000, 'Jeanice Ang', '#20B2AA'),
(7, 'Badan Keuangan Daerah', 2000000, 'Jeanice Ang', '#FAEBD7'),
(8, 'Badan Penanggulangan Bencana Daerah', 3000000, 'Jeanice Ang', '#00FFFF'),
(9, 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah', 3000000, 'Jeanice Ang', '#000000'),
(10, 'Bagian Adm Kesejahteraan Rakyat dan Sosial', 2000000, 'Jeanice Ang', '#0000FF'),
(11, 'Bagian Administrasi Perekonomian dan Pembangunan', 9000000, 'Jeanice Ang', '#8A2BE2'),
(12, 'Bagian Administrasi Pemerintahan dan Otonomi Daerah', 3000000, 'Jeanice Ang', '#A52A2A'),
(13, 'Bagian Hubungan Masyarakat', 9000000, 'Jeanice Ang', '#7FFF00'),
(15, 'Bagian Layanan Pengadaan', 3000000, 'Jeanice Ang', '#008B8B'),
(16, 'Bagian Organisasi', 9000000, 'Jeanice Ang', '#B8860B'),
(17, 'Dinas Sosial', 15000000, 'Jeanice Ang', '#FAEBD7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indexes for table `tbl_skpd`
--
ALTER TABLE `tbl_skpd`
  ADD PRIMARY KEY (`skpd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `pengeluaran_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_skpd`
--
ALTER TABLE `tbl_skpd`
  MODIFY `skpd_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
