-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 05:56 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rspkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Superuser','User') NOT NULL,
  `gambar` text NOT NULL,
  `jenis_kelamin` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`, `gambar`, `jenis_kelamin`) VALUES
('34', 'jaka', 's', 'admin', '123', 'Admin', 'gambar_admin/homeless-man-g10ae3522e_1920.jpg', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(14) NOT NULL,
  `nama_dokter` varchar(90) NOT NULL,
  `nama_poli` varchar(90) NOT NULL,
  `alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `nama_poli`, `alamat`) VALUES
('1223', 'dr. Hamdan Att, SPt U janco', 'Poli Gigi', 'brebes selatan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `nama_dokter` varchar(55) NOT NULL,
  `nama_poli` varchar(90) NOT NULL,
  `Senin` varchar(25) NOT NULL,
  `Selasa` varchar(23) NOT NULL,
  `Rabu` varchar(25) NOT NULL,
  `Kamis` varchar(25) NOT NULL,
  `Jumat` varchar(25) NOT NULL,
  `Sabtu` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `nama_dokter`, `nama_poli`, `Senin`, `Selasa`, `Rabu`, `Kamis`, `Jumat`, `Sabtu`) VALUES
(1, 'dr. Hamdan Att, SPt U janco', 'Poli Gigi', '10-10 - 10-10 Wib', '10-10 - 10-10 Wib', '10-10 - 10-10 Wib', '10-10 - 10-10 Wib', '10-10 - 10-10 Wib', '10-10 - 10-10 Wib');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_poli`
--

CREATE TABLE `jenis_poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_poli`
--

INSERT INTO `jenis_poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Gigi'),
(2, 'Poliklink Spesialis penyakit dalam'),
(3, 'Poli Umum ');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_user` varchar(10) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(15) NOT NULL,
  `gambar` text NOT NULL,
  `jenis_kelamin` varchar(55) NOT NULL,
  `usia` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_user`, `nama_pasien`, `alamat`, `no_hp`, `username`, `password`, `level`, `gambar`, `jenis_kelamin`, `usia`, `tgl_lahir`) VALUES
('pasien6964', 'samsul', 'jakarta', '18292919', 'sepul', '123', 'User', 'gambar/Screenshot_20200424-165830.png', 'perempuan', 32, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(25) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `nama_poli` varchar(55) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `jam_daftar` varchar(55) NOT NULL,
  `cara_bayar` varchar(25) NOT NULL,
  `status` varchar(55) NOT NULL,
  `nama_dokter` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenis_poli`
--
ALTER TABLE `jenis_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
