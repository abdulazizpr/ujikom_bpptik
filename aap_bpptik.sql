-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 02:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aap_bpptik`
--

-- --------------------------------------------------------

--
-- Table structure for table `aap_buku`
--

CREATE TABLE `aap_buku` (
  `aap_kode_buku` varchar(8) NOT NULL,
  `aap_judul_buku` varchar(100) NOT NULL,
  `aap_pengarang` varchar(100) NOT NULL,
  `aap_penerbit` varchar(100) NOT NULL,
  `aap_tahun_terbit` varchar(4) NOT NULL,
  `aap_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aap_buku`
--

INSERT INTO `aap_buku` (`aap_kode_buku`, `aap_judul_buku`, `aap_pengarang`, `aap_penerbit`, `aap_tahun_terbit`, `aap_harga`) VALUES
('BK001', 'Algoritma dan Pemrograman', 'Rosa Ariani Sukamto', 'Informatika', '2014', 35000),
('BK002', 'Basis Data', 'Maman Abdurahman', 'Informatika', '2015', 50000),
('BK003', 'Biologi', 'Sutrisna', 'Erlangga', '2002', 35000),
('BK004', 'Fisika', 'Yayan Permana', 'Tridarma', '2012', 32000),
('BK005', 'Sosiologi', 'Asidik', 'Pendidikan Indonesia', '2014', 65000),
('BK006', 'Bahasa Indonesia', 'Tutut Wulandari', 'Trisakti', '2011', 25000),
('BK007', 'Bahasa Inggris', 'John Smith', 'Oxford', '2006', 72500);

-- --------------------------------------------------------

--
-- Table structure for table `aap_login`
--

CREATE TABLE `aap_login` (
  `aap_id` int(11) NOT NULL,
  `aap_username` varchar(20) NOT NULL,
  `aap_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aap_login`
--

INSERT INTO `aap_login` (`aap_id`, `aap_username`, `aap_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aap_pemesanan`
--

CREATE TABLE `aap_pemesanan` (
  `aap_kode_pemesanan` varchar(8) NOT NULL,
  `aap_tanggal_pemesanan` date NOT NULL,
  `aap_email_pemesanan` varchar(50) NOT NULL,
  `aap_kode_buku` varchar(8) NOT NULL,
  `aap_jumlah_pemesanan` int(11) NOT NULL,
  `aap_keterangan` varchar(255) DEFAULT NULL,
  `aap_kode_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aap_pemesanan`
--

INSERT INTO `aap_pemesanan` (`aap_kode_pemesanan`, `aap_tanggal_pemesanan`, `aap_email_pemesanan`, `aap_kode_buku`, `aap_jumlah_pemesanan`, `aap_keterangan`, `aap_kode_bayar`) VALUES
('TRX001', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK001', 8, 'Bayar Lunas', 1),
('TRX002', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK002', 10, 'Bayar Lunas', 1),
('TRX003', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK003', 52, 'Bayar Lunas', 1),
('TRX004', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK004', 15, 'Bayar Lunas', 1),
('TRX005', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK005', 25, 'Bayar Lunas', 1),
('TRX006', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK006', 2, 'Bayar Lunas', 1),
('TRX007', '2017-07-11', 'toto@gmail.com', 'BK001', 4, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aap_buku`
--
ALTER TABLE `aap_buku`
  ADD PRIMARY KEY (`aap_kode_buku`);

--
-- Indexes for table `aap_login`
--
ALTER TABLE `aap_login`
  ADD PRIMARY KEY (`aap_id`);

--
-- Indexes for table `aap_pemesanan`
--
ALTER TABLE `aap_pemesanan`
  ADD PRIMARY KEY (`aap_kode_pemesanan`),
  ADD KEY `fk_kode_buku` (`aap_kode_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aap_login`
--
ALTER TABLE `aap_login`
  MODIFY `aap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aap_pemesanan`
--
ALTER TABLE `aap_pemesanan`
  ADD CONSTRAINT `fk_kode_buku` FOREIGN KEY (`aap_kode_buku`) REFERENCES `aap_buku` (`aap_kode_buku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
