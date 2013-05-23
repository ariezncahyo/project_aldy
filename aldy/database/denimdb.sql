-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 06:59 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `denimdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_katalog`
--

CREATE TABLE IF NOT EXISTS `tb_katalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_baju` varchar(100) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `jenis_file` varchar(100) NOT NULL,
  `jenis_katagori` varchar(50) NOT NULL,
  `harga_baju` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_katalog`
--

INSERT INTO `tb_katalog` (`id`, `nama_baju`, `nama_gambar`, `ukuran`, `jenis_file`, `jenis_katagori`, `harga_baju`, `tgl_upload`, `keterangan`) VALUES
(1, 'blas', 'Blazer Black 2.jpg', 171961, 'image/jpeg', 'design', 0, '2013-05-19', 'rerer  \r\n                    '),
(2, 'jjj', '2jacket.jpg', 90465, 'image/jpeg', 'design', 0, '2013-05-22', 'kkkkkk                   \r\n                    ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE IF NOT EXISTS `tb_konsumen` (
  `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` int(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_konsumen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `nama_konsumen`, `email`, `tgl_lahir`, `no_hp`, `password`, `alamat`) VALUES
(3, 'benny', 'benny@gmail.com', '2013-04-20', 903030303, '1010', 'jalan kemasan'),
(4, 'paijo', 'paijo@gmail.com', '2013-04-12', 87878778, '69', 'patih gajah mada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsumen` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `ukuran_pesan` varchar(10) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `tujuan_pengiriman` text NOT NULL,
  `status_pesan` varchar(40) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_konsumen`, `id_katalog`, `tgl_pesan`, `ukuran_pesan`, `jumlah_pesan`, `id_pengiriman`, `tujuan_pengiriman`, `status_pesan`, `keuntungan`, `total`) VALUES
(1, 3, 1, '2013-05-19', 'l', 10, 2, 'jfnjenf', 'belum deal', 0, 0),
(2, 3, 2, '2013-05-22', 'l', 87, 2, 'hhhh', 'belum deal', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE IF NOT EXISTS `tb_pengiriman` (
  `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `nama_wilayah`, `harga`) VALUES
(1, 'bandung', 10000),
(2, 'jakarta', 20000),
(3, 'Semarang', 30000),
(4, 'Batak', 50000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
