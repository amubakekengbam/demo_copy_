-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2023 at 07:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `vehicle` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `email`, `phone`, `vehicle`) VALUES
(12, 'BLACK', 'black@gmail.com', '7894561230', 'maruti-MN 0123456'),
(2, 'John', 'john@example.com', 'Doe', '234243'),
(5, 'Boinao', 'boinao@gmail.com', '0123456789', 'MN061234'),
(10, 'BLACK', 'black@gmail.com', '7894561230', 'maruti-MN 0123456'),
(11, 'BLACK', 'black@gmail.com', '7894561230', 'maruti-MN 0123456');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

DROP TABLE IF EXISTS `officer`;
CREATE TABLE IF NOT EXISTS `officer` (
  `officer_id` int NOT NULL AUTO_INCREMENT,
  `officer_name` text NOT NULL,
  `officer_email` varchar(20) NOT NULL,
  `officer_password` varchar(20) NOT NULL,
  `officer_designation` text NOT NULL,
  `offer_driver` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `officer_phone_no` int NOT NULL,
  `officer_address` text NOT NULL,
  `officer_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `officer_name`, `officer_email`, `officer_password`, `officer_designation`, `offer_driver`, `officer_phone_no`, `officer_address`, `officer_creation`, `is_active`) VALUES
(1, 'AMUBA', 'amuba@gmail.com', 'amuba123', 'IT', 'Tomba', 1234567890, '11', '2023-03-13 08:01:26', 1),
(2, 'Thoiba', 'thoiba@gmail.com', 'thoba@123', 'IT support', 'black', 1234567890, 'LAMPHEL', '2023-03-14 08:50:02', NULL),
(3, 'Thoiba', 'thoiba@gmail.com', 'thoba@123', 'IT support', 'black', 1234567890, 'LAMPHEL', '2023-03-14 08:50:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
CREATE TABLE IF NOT EXISTS `phone` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `phone_number`, `Role`, `name`, `status`) VALUES
(1, '6009019173', 'cpc', 'amuba', '0'),
(2, '6009019173', 'cpc', 'amuba', '0'),
(3, '9599475349', 'Driver', 'Momo', '0'),
(4, '9599475349', 'Driver', 'Momo', '0'),
(5, '9599475349', 'Driver', 'keke', '0'),
(19, '12333', 'keke', 'driver', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int NOT NULL AUTO_INCREMENT,
  `phone` int NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `cpassword` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` tinyint NOT NULL,
  `role` varchar(20) NOT NULL,
  `terms` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `phone`, `fname`, `email`, `password`, `cpassword`, `gender`, `role`, `terms`, `status`) VALUES
(2, 2147483647, 'Momocha', 'momo@gmail.com', 'momo123', NULL, 0, 'Officer', NULL, 'pending'),
(4, 2147483647, 'kekkek', 'momo@gmail.com', '123', NULL, 0, 'Driver', NULL, 'pending'),
(5, 2147483647, 'kekkek', 'amubakekengbam@gmail.com', '123', NULL, 0, 'Driver', NULL, 'pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
