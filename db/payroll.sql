-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 03:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `name`, `password`, `email`) VALUES
(3, 'admin', 'admin', 'admin@admin.com'),
(4, 'user', 'user', 'user@user.co.id'),
(6, 'Devent', '333', 'devent@user.com'),
(7, 'dasep', 'admin', 'depiyawandasep13@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `histori_gajian`
--

CREATE TABLE `histori_gajian` (
  `id` int(11) NOT NULL,
  `noref` varchar(100) DEFAULT NULL,
  `iduser` char(15) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` char(15) DEFAULT NULL,
  `jobclass` varchar(3) DEFAULT NULL,
  `gajipokok` int(15) DEFAULT NULL,
  `tunjangan1` int(15) DEFAULT NULL,
  `tunjangan2` int(15) DEFAULT NULL,
  `tunjangan3` int(15) DEFAULT NULL,
  `lembur` int(15) DEFAULT NULL,
  `bpjs_kesehatan` int(13) DEFAULT NULL,
  `bpjs_tenagakerja` int(13) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `npwp` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori_gajian`
--

INSERT INTO `histori_gajian` (`id`, `noref`, `iduser`, `nama`, `nik`, `jobclass`, `gajipokok`, `tunjangan1`, `tunjangan2`, `tunjangan3`, `lembur`, `bpjs_kesehatan`, `bpjs_tenagakerja`, `tanggal`, `email`, `npwp`) VALUES
(37, '1207212015045465PYRL', '2015045465', 'Dasep Depiyawan', '2015045465', 'A3', 5200000, 320000, 100000, 0, 0, 90000, 89000, '2021-07-01', 'depiyawandasep13@gmail.com', '178784545'),
(39, '1207212015045463PYRL ', '2015045463', 'Sukijah', '2015045463', 'A1', 4000000, 300000, 0, 0, 0, 89000, 75000, '2021-07-01', 'dasepdepiyawan19101051@gmail.com', '17878451332342');

-- --------------------------------------------------------

--
-- Table structure for table `jobclass`
--

CREATE TABLE `jobclass` (
  `id` int(11) NOT NULL,
  `idjobclass` char(30) DEFAULT NULL,
  `jobclass` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobclass`
--

INSERT INTO `jobclass` (`id`, `idjobclass`, `jobclass`) VALUES
(2, '02', 'A2'),
(3, '03', 'A3'),
(8, '01', 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` char(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jobclass` char(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `npwp` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_user`, `nama`, `nik`, `tgl_lahir`, `jobclass`, `email`, `npwp`) VALUES
(12, '2015045465', 'Dasep Depiyawan', '2015045465', '2021-04-13', 'A3', 'depiyawandasep13@gmail.com', '178784545'),
(13, '2015045463', 'Sukijah', '2015045463', '1996-03-01', 'A1', 'dasepdepiyawan19101051@gmail.com', '17878451332342');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji_karyawan`
--

CREATE TABLE `tbl_gaji_karyawan` (
  `id` int(11) NOT NULL,
  `id_user` char(15) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` char(15) DEFAULT NULL,
  `gaji_pokok` int(13) DEFAULT NULL,
  `tunjangan1` int(13) DEFAULT NULL,
  `tunjangan2` int(13) DEFAULT NULL,
  `tunjangan3` int(13) DEFAULT NULL,
  `bpjs_kesehatan` int(13) DEFAULT NULL,
  `bpjs_tenagakerja` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gaji_karyawan`
--

INSERT INTO `tbl_gaji_karyawan` (`id`, `id_user`, `nama`, `nik`, `gaji_pokok`, `tunjangan1`, `tunjangan2`, `tunjangan3`, `bpjs_kesehatan`, `bpjs_tenagakerja`) VALUES
(20, '2015045463', 'Sukijah', '2015045463', 4000000, 300000, 0, 0, 89000, 75000),
(21, '2015045465', 'Dasep Depiyawan', '2015045465', 5200000, 320000, 100000, 0, 90000, 89000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori_gajian`
--
ALTER TABLE `histori_gajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobclass`
--
ALTER TABLE `jobclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`,`id_user`);

--
-- Indexes for table `tbl_gaji_karyawan`
--
ALTER TABLE `tbl_gaji_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `histori_gajian`
--
ALTER TABLE `histori_gajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jobclass`
--
ALTER TABLE `jobclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_gaji_karyawan`
--
ALTER TABLE `tbl_gaji_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
