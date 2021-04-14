-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 08:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen165`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `idrole` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `nama`, `email`, `password`, `idrole`) VALUES
(1, 'Administrator', 'admin', 'admin', 1),
(2, 'Ahlijati Nuraminah', 'ahlijati.nuraminah@esqbs.ac.id', '123456', 2),
(3, 'Ade', 'ahlijati.nuraminah@gmail.com', '12345678', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi1` varchar(200) NOT NULL,
  `deskripsi2` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`id`, `nama`, `deskripsi1`, `deskripsi2`, `foto`) VALUES
(1, 'Buy 1 Get 2', 'Happy Sunday', 'Buy 1 food item, free 2 drinks', '1.jpg'),
(2, 'Crazy Friday', 'Discount up to 90%', 'Grab it fast!', '2.jpg'),
(3, 'Mid season sale', 'Up to 50% Off', 'On selected items online and in stores', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `nama`, `deskripsi`) VALUES
(1, 'MAKANAN', 'produk2 yang bisa dimakan'),
(2, 'MINUMAN', 'Produk-produk yang bisa diminum'),
(4, 'DESSERT', 'hidangan pencuci mulut	    '),
(5, 'APPETIZER', 'makanan pembuka	    ');

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailpesanan`
--

CREATE TABLE `tbldetailpesanan` (
  `idpesanan` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldetailpesanan`
--

INSERT INTO `tbldetailpesanan` (`idpesanan`, `idmenu`, `quantity`) VALUES
(1, 15, 1),
(1, 24, 2),
(2, 21, 2),
(2, 27, 3),
(3, 15, 3),
(3, 26, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`id`, `nama`, `deskripsi`, `harga`, `idcategory`, `foto`) VALUES
(10, 'Es melon', '	    es melon enak', 6000, 2, '10.jpg'),
(11, 'Pizza', '	    Pizza keju	    ', 50000, 1, '11.jpg'),
(12, 'Puding Mangga', '	    	    	    Puding mangga enak', 21500, 4, '12.jpg'),
(13, 'Salad buah', 'salad buah tropis	    ', 31000, 5, '13.jpg'),
(14, 'Nasi Goreng', 'nasi goreng spesial	    ', 17000, 1, '14.jpg'),
(15, 'Rendang', 'Rendang atau randang adalah masakan daging bercita rasa pedas yang menggunakan campuran dari berbagai bumbu dan rempah-rempah. Masakan ini dihasilkan dari proses memasak yang dipanaskan berulang-ulang dengan santan kelapa. Proses memasaknya memakan waktu berjam-jam (biasanya sekitar empat jam) hingga kering dan berwarna hitam pekat. Dalam suhu ruangan, rendang dapat bertahan hingga berminggu-minggu. Rendang yang dimasak dalam waktu yang lebih singkat dan santannya belum mengering disebut kalio, ', 90000, 1, '15.jpg'),
(16, 'Es Teh manis', 'es teh manis sekali', 3000, 2, '16.jpg'),
(18, 'Gado-gado', 'gado gado dari bahan alami', 25000, 5, '18.jpg'),
(21, 'Sup Makaroni', 'sup makaroni isi ayam sosis', 24000, 5, '21.jpg'),
(22, 'Brownies ', 'brownies kukus coklat', 21000, 4, '22.jpg'),
(23, 'Bakso', 'bakso kuah', 18000, 5, '23.jpg'),
(24, 'Teh Botol', 'teh botol sosro dingin', 4000, 2, '24.jpg'),
(26, 'Jus Strawberry', 'dari buah asli', 12000, 2, '26.jpg'),
(27, 'Red Velvet Cake', 'red velvet so delicious', 23000, 4, '27.jpg'),
(28, 'Rujak', 'Rujak seger', 16000, 4, '28.jpg'),
(30, 'Puding Cokelat', 'Puding rasa brownies	', 35000, 4, '30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpembeli`
--

CREATE TABLE `tblpembeli` (
  `id` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `idaccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpembeli`
--

INSERT INTO `tblpembeli` (`id`, `alamat`, `tempatlahir`, `tanggallahir`, `handphone`, `jeniskelamin`, `foto`, `idaccount`) VALUES
(1, 'JakartaS', 'Jakarta', '2021-04-28', '08111222333', 'perempuan', '1.jpg', 2),
(2, '', '', '0000-00-00', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblpesanan`
--

CREATE TABLE `tblpesanan` (
  `id` int(11) NOT NULL,
  `idpembeli` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpesanan`
--

INSERT INTO `tblpesanan` (`id`, `idpembeli`, `totalharga`, `tanggaltransaksi`, `status`) VALUES
(1, 1, 98000, '2021-04-13', 'Approve'),
(2, 1, 117000, '2021-04-13', 'Menunggu Persetujuan'),
(3, 2, 318000, '2021-04-13', 'Menunggu Persetujuan');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldetailpesanan`
--
ALTER TABLE `tbldetailpesanan`
  ADD PRIMARY KEY (`idpesanan`,`idmenu`),
  ADD KEY `idmenu` (`idmenu`),
  ADD KEY `idpesanan` (`idpesanan`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Indexes for table `tblpembeli`
--
ALTER TABLE `tblpembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idaccount` (`idaccount`);

--
-- Indexes for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`idpembeli`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblpembeli`
--
ALTER TABLE `tblpembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD CONSTRAINT `tblaccount_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `tblrole` (`id`);

--
-- Constraints for table `tbldetailpesanan`
--
ALTER TABLE `tbldetailpesanan`
  ADD CONSTRAINT `tbldetailpesanan_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `tblmenu` (`id`),
  ADD CONSTRAINT `tbldetailpesanan_ibfk_2` FOREIGN KEY (`idpesanan`) REFERENCES `tblpesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD CONSTRAINT `tblmenu_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `tblcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
