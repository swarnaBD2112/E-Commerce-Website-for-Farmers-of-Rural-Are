-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 07:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_agricenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Binayak ', 'binayak', 'csebinayak.ku@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'Meat'),
(3, 'Vegetable'),
(4, 'Crops'),
(5, 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, '2pssv44rbnmq99hkivgu7t2d35', 22, 'Raw Bannana', 200.00, 1, 'uploads/781236e88e.png'),
(2, '2pssv44rbnmq99hkivgu7t2d35', 30, 'Puti Fish', 200.00, 1, 'uploads/4d38d7d025.jpg'),
(3, '2pssv44rbnmq99hkivgu7t2d35', 31, 'Hen', 120.00, 1, 'uploads/a0483675f2.jpg'),
(7, 'rts4acsfrc9qa96pscudcgrs47', 22, 'Raw Bannana', 200.00, 5, 'uploads/781236e88e.png'),
(8, 'rts4acsfrc9qa96pscudcgrs47', 21, 'Tomato', 10.00, 1, 'uploads/248b2b0ecc.jpg'),
(15, 'p0prc4gpua47soo40rcimce182', 22, 'Raw Bannana', 200.00, 5, 'uploads/781236e88e.png'),
(16, 'p0prc4gpua47soo40rcimce182', 21, 'Tomato', 10.00, 5, 'uploads/248b2b0ecc.jpg'),
(17, '09futea1e67mmc8ovn1ggqgso3', 22, 'Raw Bannana', 200.00, 1, 'uploads/781236e88e.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE IF NOT EXISTS `tbl_catagory` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`catId`, `catName`) VALUES
(16, 'Vegetables'),
(17, 'Meat'),
(18, 'Fish'),
(19, 'Flowers'),
(20, 'Fruits'),
(21, 'Craft'),
(22, 'Dairy'),
(23, 'Tree'),
(24, 'Mat'),
(25, 'Poultry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(60) NOT NULL,
  `zip` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(3, 'Binayak Ray', 'gollamari,Khulna', 'Khulna', 'Bangladesh', '1100', '01940523661', 'csebinayak.ku@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'masum', 'Gollamari,Khulna', 'Khulna', 'Bangladesh', '1200', '01612130217', 'masum17@gmail.com', '93fb9d4b16aa750c7475b6d601c35c2c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_farmer`
--

CREATE TABLE IF NOT EXISTS `tbl_farmer` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_farmer`
--

INSERT INTO `tbl_farmer` (`fid`, `name`, `address`, `phone`, `password`) VALUES
(2, 'masum', 'batiaghata', '01612130217', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Farmer 2', 'batiaghata', '01612130204', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'farmer 3', 'bagerhat', '01735156975', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'Sagor Ray', 'batiaghata', '019343445566', 'c4ca4238a0b923820dcc509a6f75849b'),
(6, 'Farmer 1', 'batiaghata', '01940523661', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `body` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `fid`, `body`, `unit`, `price`, `image`) VALUES
(20, 'Pumpkin', 16, 4, '<p>Get fresh vegetables direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'mon', 100.000, 'uploads/f0fd22c6e4.jpg'),
(21, 'Tomato', 16, 4, '<p>Get fresh vegetables direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'mon', 10.000, 'uploads/248b2b0ecc.jpg'),
(22, 'Raw Bannana', 16, 4, '<p>Get fresh vegetables direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'dozen', 200.000, 'uploads/781236e88e.png'),
(23, 'Cabbage', 16, 5, '<p>Get fresh vegetables direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'mon', 50.000, 'uploads/030d75e9ae.jpg'),
(24, 'Banna', 20, 2, '<p>Get fresh Fruits of Kalabagan,&nbsp; direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'dozen', 400.000, 'uploads/4b0265e460.png'),
(25, 'Apple', 20, 2, '<p>Get fresh apple direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'kg', 40.000, 'uploads/e773eb6505.png'),
(26, 'Jackfruit', 20, 2, '<p>Get fresh Jackfruit direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'piece', 100.000, 'uploads/37ced3cc1a.jpg'),
(27, 'Tengra Fish', 18, 6, '<p>Get fresh fish direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'mon', 200.000, 'uploads/cc0707c9fe.jpg'),
(28, 'Taki Fish', 18, 6, '<p>Get fresh fish direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'mon', 200.000, 'uploads/ea1844c718.jpg'),
(29, 'Koi Fish', 18, 6, '<p>Get fresh fish direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'kg', 100.000, 'uploads/90a9d7b341.jpg'),
(30, 'Puti Fish', 18, 6, '<p>Get fresh fish direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'kg', 200.000, 'uploads/4d38d7d025.jpg'),
(31, 'Hen', 25, 3, '<p>Get best quality hen direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'piece', 120.000, 'uploads/a0483675f2.jpg'),
(33, 'Guava', 20, 2, '<p>Get fresh Jackfruit direct from farmer. No added preservative , no insectisides. Order now, get discount.</p>', 'kg', 20.000, 'uploads/d9e6dd59e5.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
