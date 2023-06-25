-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2023 at 10:11 AM
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
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_oil_request`
--

DROP TABLE IF EXISTS `form_oil_request`;
CREATE TABLE IF NOT EXISTS `form_oil_request` (
  `formoil_id` int NOT NULL AUTO_INCREMENT,
  `formoil_driver_name` varchar(120) DEFAULT NULL,
  `formoil_tobeapprove` json DEFAULT NULL,
  PRIMARY KEY (`formoil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form_oil_request`
--

INSERT INTO `form_oil_request` (`formoil_id`, `formoil_driver_name`, `formoil_tobeapprove`) VALUES
(1, 'sdf', '[{\"value\": \"amuba\", \"status\": 0, \"officer\": \"78\"}, {\"value\": \"kala\", \"status\": 0, \"officer\": \"23\"}]');

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
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `officer_name`, `officer_email`, `officer_password`, `officer_designation`, `offer_driver`, `officer_phone_no`, `officer_address`, `officer_creation`) VALUES
(1, 'AMUBA', 'amuba@gmail.com', 'amuba123', 'IT', 'Tomba', 1234567890, '11', '2023-03-13 02:31:26'),
(2, 'Thoiba', 'thoiba@gmail.com', 'thoba@123', 'IT support', 'black', 1234567890, 'LAMPHEL', '2023-03-14 03:20:02'),
(3, 'Thoiba', 'thoiba@gmail.com', 'thoba@123', 'IT support', 'black', 1234567890, 'LAMPHEL', '2023-03-14 03:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `oil`
--

DROP TABLE IF EXISTS `oil`;
CREATE TABLE IF NOT EXISTS `oil` (
  `oil_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL COMMENT 'to know driver',
  `officer_id` int NOT NULL COMMENT 'get userid of type officer from users table',
  `sub_request` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT ' subject of request from officers',
  `oil_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `amount_oil` int NOT NULL,
  `vehicle_number` int DEFAULT NULL,
  `duty_on` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `consumption_rate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `last_issued_date` date NOT NULL,
  `last_issue_quantity` int DEFAULT NULL,
  `left_then` int DEFAULT NULL,
  `left_now` int DEFAULT NULL,
  `present_milometer` int DEFAULT NULL,
  `prev_milometer` int DEFAULT NULL,
  `cover_milometer` int DEFAULT NULL,
  `token_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'last stage to create  token ',
  `comment_jrg` varchar(100) DEFAULT NULL,
  `comment_rg` varchar(200) DEFAULT NULL,
  `date_apply` date DEFAULT NULL,
  PRIMARY KEY (`oil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `oil`
--

INSERT INTO `oil` (`oil_id`, `user_id`, `officer_id`, `sub_request`, `oil_type`, `amount_oil`, `vehicle_number`, `duty_on`, `consumption_rate`, `last_issued_date`, `last_issue_quantity`, `left_then`, `left_now`, `present_milometer`, `prev_milometer`, `cover_milometer`, `token_status`, `comment_jrg`, `comment_rg`, `date_apply`) VALUES
(11, 78, 39, 'request for 20l of petrol', 'petrol', 50, 4666, 'SHUBAM VASHIT', '20k/l', '2023-05-02', 122, 22, 22, 222, 200, 220, NULL, NULL, NULL, '2023-03-06'),
(12, 39, 1, 'thrtr', 'rh', 0, 5555, 'hh', '20', '0000-00-00', 2020, 7, 7, 77, 77, 77, NULL, NULL, NULL, NULL),
(13, 39, 1, 'fghj', '435', 45, 45, '45', '45', '0000-00-00', 45, 45, 45, 45, 45, 45, NULL, NULL, NULL, NULL),
(14, 39, 1, '678657867867', '4fghj', 6, 45, 'GHETET', 'ghjk', '0000-00-00', 45, 45, 45, 45, 45, 45, NULL, NULL, NULL, NULL),
(15, 39, 1, 'Request for Chandramukhi Oil', 'petrol', 5, 4533, 'Chandramukhi', '11', '2023-06-01', 10, 5, 1, 234, 180, 54, NULL, NULL, NULL, NULL),
(16, 39, 2, '20l of oil', 'petrol', 20, 12345, 'joint rg', '11', '0000-00-00', 50, 5, 2, 1222, 1111, 111, NULL, NULL, NULL, NULL),
(17, 78, 39, '50 LITERS', 'PETROL', 50, 4561, 'JUSTICES', '12', '0000-00-00', 50, 2, 5, 1112, 1100, 12, NULL, NULL, NULL, NULL),
(18, 78, 39, '55 petrol', 'petrol', 0, 12333, 'kkk', '11', '0000-00-00', 22, 5, 6, 1110, 1100, 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oil_report`
--

DROP TABLE IF EXISTS `oil_report`;
CREATE TABLE IF NOT EXISTS `oil_report` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `oil_table_id` int NOT NULL COMMENT 'id from oil table',
  `o_user_id` int NOT NULL COMMENT 'officer user id',
  `o_desg_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'officer designation name from user table',
  `oil_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token_number` varchar(50) DEFAULT NULL COMMENT 'generated token number',
  `oil_token_status` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oil_report`
--

INSERT INTO `oil_report` (`report_id`, `oil_table_id`, `o_user_id`, `o_desg_name`, `oil_status`, `token_number`, `oil_token_status`, `date`) VALUES
(2, 11, 39, 'Joint Register', '1', NULL, NULL, '2023-06-09 12:20:07'),
(4, 15, 2, NULL, NULL, NULL, NULL, '2023-05-18 10:55:34'),
(11, 16, 2, NULL, NULL, NULL, NULL, '2023-06-01 06:04:14'),
(12, 11, 80, 'Register General', '1', NULL, NULL, '2023-06-09 12:27:51'),
(10, 15, 39, 'Joint Register', '1', NULL, NULL, '2023-06-19 09:33:39'),
(13, 15, 80, 'Register General', NULL, NULL, NULL, '2023-06-02 11:17:12'),
(14, 17, 39, NULL, NULL, NULL, NULL, '2023-06-05 07:32:26'),
(15, 17, 80, 'Register General', NULL, NULL, NULL, '2023-06-06 07:01:44'),
(16, 0, 80, 'Register General', NULL, NULL, NULL, '2023-06-08 07:29:14'),
(17, 12, 80, 'Register General', NULL, NULL, NULL, '2023-06-08 11:33:02'),
(18, 18, 39, NULL, NULL, NULL, NULL, '2023-06-09 12:02:44'),
(19, 18, 80, 'Register General', NULL, NULL, NULL, '2023-06-09 12:03:07'),
(21, 0, 0, NULL, NULL, '8581', NULL, '2023-06-23 06:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

DROP TABLE IF EXISTS `otp_expiry`;
CREATE TABLE IF NOT EXISTS `otp_expiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail_id` varchar(50) DEFAULT NULL,
  `otp` varchar(10) NOT NULL,
  `is_expired` int NOT NULL,
  `create_at` datetime NOT NULL,
  `verify_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`id`, `mail_id`, `otp`, `is_expired`, `create_at`, `verify_status`) VALUES
(2, 'amubakekengbam@gmail.com', '355268', 0, '2023-04-26 11:17:05', 0),
(17, 'amubakekengbam@gmail.com', '241640', 0, '2023-05-16 05:54:46', 0),
(16, 'bis@gmail.com', '840940', 0, '2023-05-02 10:48:07', 0),
(18, 'scsinghhcimphal@gmail.com', '402917', 1, '2023-06-01 05:54:15', 0),
(19, 'kekengbam10@gmail.com', '919447', 1, '2023-06-19 09:26:02', 0),
(20, 'amubakekengbam@gmail.com', '659431', 1, '2023-06-21 08:02:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` bigint NOT NULL AUTO_INCREMENT,
  `role_name` varchar(75) NOT NULL,
  `role_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Admin', 1),
(2, 'inital_approver', 1),
(3, 'final_approver', 1),
(4, 'driver', 1),
(5, 'issue', 1),
(6, 'officer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_otp`
--

DROP TABLE IF EXISTS `sms_otp`;
CREATE TABLE IF NOT EXISTS `sms_otp` (
  `id_otp` int NOT NULL AUTO_INCREMENT,
  `request_id` int DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `otp_token` int DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `date` int DEFAULT NULL,
  PRIMARY KEY (`id_otp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

DROP TABLE IF EXISTS `temp_users`;
CREATE TABLE IF NOT EXISTS `temp_users` (
  `temp_user_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role_id` bigint NOT NULL,
  `designation` varchar(75) NOT NULL,
  `officer_user_id` bigint DEFAULT NULL,
  `verify_status` int NOT NULL DEFAULT '0',
  `photo` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verify_token` tinyint DEFAULT NULL,
  PRIMARY KEY (`temp_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_users`
--

INSERT INTO `temp_users` (`temp_user_id`, `full_name`, `email`, `mobile`, `gender`, `role_id`, `designation`, `officer_user_id`, `verify_status`, `photo`, `created_at`, `updated_at`, `verify_token`) VALUES
(2, 'Malemngalba', 'lkonsam@gmail.com', '9612011104', 'male', 2, 'Driver', 1, 0, NULL, '2023-04-13 17:21:04', NULL, 0),
(12, 'salam', 'kekengbam10@gmail.com', '9612709832', 'male', 1, 'Joint Register', 1, 0, NULL, '2023-04-25 12:56:56', NULL, 127),
(13, 'Bisleri', 'bis@gmail.com', '1234567890', 'male', 4, 'issuer', 39, 0, NULL, '2023-05-02 16:15:20', NULL, 0),
(16, 'salam', 'scsinghhcimphal@gmail.com', '19173', 'male', 3, 'Register General', 2, 0, NULL, '2023-06-01 11:14:08', NULL, 0),
(18, 'robi', 'amubakekengbam@gmail.com', '9862709832', 'male', 6, 'Officer', 39, 0, NULL, '2023-06-21 13:29:15', NULL, 127),
(19, 'ramesh', 'rameshmay22@gmail.com', '9612880719', 'male', 6, 'Officer', 2, 0, NULL, '2023-06-22 14:03:22', NULL, 46);

-- --------------------------------------------------------

--
-- Table structure for table `uploading`
--

DROP TABLE IF EXISTS `uploading`;
CREATE TABLE IF NOT EXISTS `uploading` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `file_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(75) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role_id` bigint NOT NULL,
  `designation` varchar(75) NOT NULL,
  `officer_user_id` bigint DEFAULT NULL,
  `verify_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  `photo` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verify_token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `mobile`, `password`, `gender`, `role_id`, `designation`, `officer_user_id`, `verify_status`, `photo`, `created_at`, `updated_at`, `verify_token`) VALUES
(2, 'Administrator', 'admin@gmail.com', '9612011104', '123', 'male', 1, 'Admin', NULL, 1, 'dipak.png', '2023-04-13 17:21:04', '2023-04-13 17:40:42', NULL),
(39, 'Shubham Vashist', 'jrhcimphal@gmail.com', '9612709832', '123', 'male', 2, 'Joint Register', 2, 1, 'subam.jpg', '2023-04-20 10:39:41', '2023-04-24 17:03:22', NULL),
(78, 'Bisleri', 'bis@gmail.com', '6009019173', '123', 'male', 5, 'issue', 39, 1, NULL, '2023-05-02 16:15:20', '2023-05-02 16:16:18', '0'),
(79, 'amuba', 'kekengbam@gmail.com', '6009019173', '123', 'male', 4, 'Driver', 39, 1, NULL, '2023-05-15 12:17:28', '2023-05-16 11:20:43', '127'),
(80, 'salam', 'scsinghhcimphal@gmail.com', '6009019173', '123', 'male', 3, 'Register General', 2, 1, NULL, '2023-06-01 11:14:08', '2023-06-01 11:19:20', '0'),
(82, 'robi', 'amubakekengbam@gmail.com', '9862709832', '123', 'male', 6, 'Officer', 39, 1, NULL, '2023-06-21 13:29:15', '2023-06-21 13:30:54', '127'),
(83, 'ramesh', 'rameshmay22@gmail.com', '9612880719', '123', 'male', 4, 'Officer', 2, 1, NULL, '2023-06-22 14:03:22', '2023-06-22 14:04:14', '46');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_number`
--

DROP TABLE IF EXISTS `vehicle_number`;
CREATE TABLE IF NOT EXISTS `vehicle_number` (
  `id` int NOT NULL AUTO_INCREMENT,
  `officer_user_id` int DEFAULT NULL COMMENT 'it is the id of officer from user table\r\n',
  `v_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `driver` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_assign` date DEFAULT NULL,
  `servicing_date` date DEFAULT NULL COMMENT 'date of servicing ',
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle_number`
--

INSERT INTO `vehicle_number` (`id`, `officer_user_id`, `v_number`, `driver`, `date_assign`, `servicing_date`, `status`) VALUES
(1, 39, '4521', 'loken', NULL, NULL, '1'),
(6, 39, '8521', 'amuba', '2023-06-25', NULL, NULL),
(5, NULL, '45556', 'ravi', '2023-06-23', NULL, NULL),
(7, 39, 'MN 06 5429', ' 79 ', '2023-06-23', '2023-06-24', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
