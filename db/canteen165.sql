-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 12:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `id` int(11) NOT NULL,
  `idpesanan` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldetailpesanan`
--

INSERT INTO `tbldetailpesanan` (`id`, `idpesanan`, `idmenu`, `quantity`) VALUES
(3, 16, 12, 7),
(4, 16, 16, 17),
(5, 17, 12, 1),
(6, 17, 11, 2),
(7, 18, 26, 2),
(8, 18, 18, 3);

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
-- Table structure for table `tblpesanan`
--

CREATE TABLE `tblpesanan` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `tanggaltransaksi` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpesanan`
--

INSERT INTO `tblpesanan` (`id`, `iduser`, `totalharga`, `tanggaltransaksi`, `status`) VALUES
(1, 25, 270000, '2016-05-24', 'Approve'),
(2, 2, 0, '0000-00-00', 'Approve'),
(3, 25, 68000, '0000-00-00', 'Approve'),
(4, 26, 72000, '0000-00-00', 'Not Approve'),
(5, 26, 810000, '2016-05-26', 'Not Approve'),
(9, 26, 20000, '2021-04-13', 'Menunggu Persetujuan'),
(16, 26, 201500, '2021-04-13', 'Approve'),
(17, 28, 121500, '2021-04-13', 'Approve'),
(18, 28, 99000, '2021-04-13', 'Not Approve'),
(19, 28, 99000, '2021-04-13', 'Menunggu Persetujuan'),
(20, 28, 99000, '2021-04-13', 'Menunggu Persetujuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `email`, `password`, `nama`, `alamat`, `tempatlahir`, `tanggallahir`, `handphone`, `jeniskelamin`, `role`, `foto`) VALUES
(2, 'admin', 'admin', 'Administrator', 'jalan hr rasuna said', 'jakarta', '2000-03-02', '08111222333', 'laki-laki', 'admin', '2.png'),
(21, 'ade.alam@alalam', '01010110', 'Ade', 'jakarta', '', '0000-00-00', '', '', '', ''),
(25, 'ana@gmail.com', '123456', 'ana', 'jakarta', '', '0000-00-00', '', '', 'member', ''),
(26, 'user@gmail.com', '123456', 'User Biasa', 'Jalan TB', 'Jakarta', '2021-04-27', '08171717', 'laki-laki', '', ''),
(28, 'ahlijati.nuraminah@esqbs.ac.id', '12345678', 'Ahlijati Nuraminah', 'Jalan Panjang', 'Jakarta', '2021-04-16', '08111222333', 'perempuan', '', '28.jpeg');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmenu` (`idmenu`),
  ADD KEY `tbldetailpesanan_ibfk_1` (`idpesanan`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Indexes for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `tbldetailpesanan`
--
ALTER TABLE `tbldetailpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldetailpesanan`
--
ALTER TABLE `tbldetailpesanan`
  ADD CONSTRAINT `tbldetailpesanan_ibfk_1` FOREIGN KEY (`idpesanan`) REFERENCES `tblpesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetailpesanan_ibfk_2` FOREIGN KEY (`idmenu`) REFERENCES `tblmenu` (`id`);

--
-- Constraints for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD CONSTRAINT `tblmenu_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `tblcategory` (`id`);

--
-- Constraints for table `tblpesanan`
--
ALTER TABLE `tblpesanan`
  ADD CONSTRAINT `tblpesanan_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `tbluser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
