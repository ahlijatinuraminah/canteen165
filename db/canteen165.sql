-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 06:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE IF NOT EXISTS `tblbanner` (
`IDBanner` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Deskripsi1` varchar(200) NOT NULL,
  `Deskripsi2` varchar(200) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`IDBanner`, `Nama`, `Deskripsi1`, `Deskripsi2`, `Foto`) VALUES
(1, 'Buy 1 Get 2', 'Happy Sunday', 'Buy 1 food item, free 2 drinks', '1.jpg'),
(2, 'Crazy Friday', 'Discount up to 90%', 'Grab it fast!', '2.jpg'),
(3, 'Mid season sale', 'Up to 50% Off', 'On selected items online and in stores', '3.jpg'),
(4, 'tes', 'tes1', 'tes2', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
`IDCategory` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`IDCategory`, `Nama`, `Deskripsi`) VALUES
(1, 'MAKANAN', 'produk2 yang bisa dimakan'),
(2, 'MINUMAN', 'Produk-produk yang bisa diminum'),
(4, 'DESSERT', 'hidangan pencuci mulut	    '),
(5, 'APPETIZER', 'makanan pembuka	    '),
(8, 'ade', 'sama');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE IF NOT EXISTS `tblmenu` (
`IDMenu` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `Harga` int(11) NOT NULL,
  `IDCategory` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`IDMenu`, `Nama`, `Deskripsi`, `Harga`, `IDCategory`, `Foto`) VALUES
(10, 'Es melon', '	    es melon enak', 6000, 2, '10.jpg'),
(11, 'Pizza', '	    Pizza keju	    ', 50000, 1, '11.jpg'),
(12, 'Puding Mangga', '	    	    	    Puding mangga enak', 21500, 4, '12.jpg'),
(13, 'Salad buah', 'salad buah tropis	    ', 31000, 5, '13.jpg'),
(14, 'Nasi Goreng', 'nasi goreng spesial	    ', 17000, 1, '14.jpg'),
(15, 'Rendang', 'Rendang atau randang adalah masakan daging bercita rasa pedas yang menggunakan campuran dari berbagai bumbu dan rempah-rempah. Masakan ini dihasilkan dari proses memasak yang dipanaskan berulang-ulang dengan santan kelapa. Proses memasaknya memakan waktu berjam-jam (biasanya sekitar empat jam) hingga kering dan berwarna hitam pekat. Dalam suhu ruangan, rendang dapat bertahan hingga berminggu-minggu. Rendang yang dimasak dalam waktu yang lebih singkat dan santannya belum mengering disebut kalio, ', 90000, 1, '15.jpg'),
(16, 'Es Teh manis', 'es teh manis sekali', 3000, 2, '16.jpg'),
(18, 'Gado-gado', 'gado gado dari bahan alami', 25000, 5, '18.jpg'),
(20, 'Es krim strawberry', 'Es krim dengan toping strawberry', 16000, 4, '20.jpg'),
(21, 'Sup Makaroni', 'sup makaroni isi ayam sosis', 24000, 5, '21.jpg'),
(22, 'Brownies ', 'brownies kukus coklat', 21000, 4, '22.jpg'),
(23, 'Bakso', 'bakso kuah', 18000, 5, '23.jpg'),
(24, 'Teh Botol', 'teh botol sosro dingin', 4000, 2, '24.jpg'),
(25, 'Sate kambing', 'sate kambing bumbu kecap maknyus', 27000, 1, '25.jpg'),
(26, 'Jus Strawberry', 'dari buah asli', 12000, 2, '26.jpg'),
(27, 'Red Velvet Cake', 'red velvet so delicious', 23000, 4, '27.jpg'),
(28, 'Rujak', 'Rujak seger', 16000, 4, '28.jpg'),
(29, 'es', 'es', 1010, 4, '29.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblpesanan`
--

CREATE TABLE IF NOT EXISTS `tblpesanan` (
`IDPesanan` int(11) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `IDMenu` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `TanggalTransaksi` date NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpesanan`
--

INSERT INTO `tblpesanan` (`IDPesanan`, `IDUser`, `IDMenu`, `Quantity`, `Harga`, `TotalHarga`, `TanggalTransaksi`, `Status`) VALUES
(1, 10, 15, 3, 90000, 270000, '2016-05-24', 'Approve'),
(2, 2, 14, 0, 0, 0, '0000-00-00', 'Approve'),
(3, 7, 14, 4, 17000, 68000, '0000-00-00', 'Not Approve'),
(4, 10, 21, 3, 24000, 72000, '0000-00-00', 'Not Approve'),
(5, 10, 25, 30, 27000, 810000, '2016-05-26', 'Not Approve'),
(6, 2, 26, 2, 12000, 24000, '2017-04-27', 'Not Approve');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
`IDUser` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Handphone` varchar(20) NOT NULL,
  `JenisKelamin` varchar(10) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Foto` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`IDUser`, `Email`, `Password`, `Nama`, `Alamat`, `TempatLahir`, `TanggalLahir`, `Handphone`, `JenisKelamin`, `Role`, `Foto`) VALUES
(2, 'admin', 'admin', 'Administrator', 'jalan hr rasuna said', 'jakarta', '2000-03-02', '0191919', 'perempuan', 'admin', '2.png'),
(21, 'ade.alam@alalam', '01010110', 'Ade', 'jakarta', '', '0000-00-00', '', '', '', ''),
(25, 'ana@gmail.com', '123456', 'ana', 'jakarta', '', '0000-00-00', '', '', 'member', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
 ADD PRIMARY KEY (`IDBanner`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
 ADD PRIMARY KEY (`IDCategory`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
 ADD PRIMARY KEY (`IDMenu`);

--
-- Indexes for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
 ADD PRIMARY KEY (`IDPesanan`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
 ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
MODIFY `IDBanner` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
MODIFY `IDCategory` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
MODIFY `IDMenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
MODIFY `IDPesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
