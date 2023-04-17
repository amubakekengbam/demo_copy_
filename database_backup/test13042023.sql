/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

/*Table structure for table `adminlogin` */

DROP TABLE IF EXISTS `adminlogin`;

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `adminlogin` */

insert  into `adminlogin`(`id`,`username`,`password`) values 
(2,'admin2','admin2');

/*Table structure for table `driver` */

DROP TABLE IF EXISTS `driver`;

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `vehicle` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `driver` */

insert  into `driver`(`id`,`name`,`email`,`phone`,`vehicle`) values 
(12,'BLACK','black@gmail.com','7894561230','maruti-MN 0123456'),
(2,'John','john@example.com','Doe','234243'),
(5,'Boinao','boinao@gmail.com','0123456789','MN061234'),
(10,'BLACK','black@gmail.com','7894561230','maruti-MN 0123456'),
(11,'BLACK','black@gmail.com','7894561230','maruti-MN 0123456');

/*Table structure for table `officer` */

DROP TABLE IF EXISTS `officer`;

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `officer_name` text NOT NULL,
  `officer_email` varchar(20) NOT NULL,
  `officer_password` varchar(20) NOT NULL,
  `officer_designation` text NOT NULL,
  `offer_driver` text NOT NULL,
  `officer_phone_no` int(11) NOT NULL,
  `officer_address` text NOT NULL,
  `officer_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `officer` */

insert  into `officer`(`officer_id`,`officer_name`,`officer_email`,`officer_password`,`officer_designation`,`offer_driver`,`officer_phone_no`,`officer_address`,`officer_creation`,`is_active`) values 
(1,'AMUBA','amuba@gmail.com','amuba123','IT','Tomba',1234567890,'11','2023-03-13 08:01:26',1),
(2,'Thoiba','thoiba@gmail.com','thoba@123','IT support','black',1234567890,'LAMPHEL','2023-03-14 08:50:02',NULL),
(3,'Thoiba','thoiba@gmail.com','thoba@123','IT support','black',1234567890,'LAMPHEL','2023-03-14 08:50:08',NULL);

/*Table structure for table `phone` */

DROP TABLE IF EXISTS `phone`;

CREATE TABLE `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `phone` */

insert  into `phone`(`id`,`phone_number`,`Role`,`name`,`status`) values 
(1,'6009019173','cpc','amuba','0'),
(2,'6009019173','cpc','amuba','0'),
(3,'9599475349','Driver','Momo','0'),
(4,'9599475349','Driver','Momo','0'),
(5,'9599475349','Driver','keke','0'),
(19,'12333','keke','driver','');

/*Table structure for table `registration` */

DROP TABLE IF EXISTS `registration`;

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `cpassword` varchar(25) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL,
  `terms` varchar(20) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `registration` */

insert  into `registration`(`reg_id`,`phone`,`fname`,`email`,`password`,`cpassword`,`gender`,`role`,`terms`,`status`) values 
(2,2147483647,'Momocha','momo@gmail.com','momo123',NULL,0,'Officer',NULL,'pending'),
(4,2147483647,'kekkek','momo@gmail.com','123',NULL,0,'Driver',NULL,'pending'),
(5,2147483647,'kekkek','amubakekengbam@gmail.com','123',NULL,0,'Driver',NULL,'pending');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(75) NOT NULL,
  `role_status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_name`,`role_status`) values 
(1,'Admin',1),
(2,'Officer',1),
(3,'User',1);

/*Table structure for table `temp_users` */

DROP TABLE IF EXISTS `temp_users`;

CREATE TABLE `temp_users` (
  `temp_user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `designation` varchar(75) NOT NULL,
  `officer_user_id` bigint(20) DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `photo` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`temp_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `temp_users` */

insert  into `temp_users`(`temp_user_id`,`full_name`,`email`,`mobile`,`gender`,`role_id`,`designation`,`officer_user_id`,`user_status`,`photo`,`created_at`,`updated_at`) values 
(2,'Malemngalba','lkonsam@gmail.com','9612011104','male',3,'Driver',1,0,NULL,'2023-04-13 17:21:04',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(75) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `designation` varchar(75) NOT NULL,
  `officer_user_id` bigint(20) DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `photo` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`full_name`,`email`,`mobile`,`password`,`gender`,`role_id`,`designation`,`officer_user_id`,`user_status`,`photo`,`created_at`,`updated_at`) values 
(1,'Malemngalba','lkonsam@gmail.com','9612011104','test','male',3,'Driver',1,0,NULL,'2023-04-13 17:21:04','2023-04-13 17:21:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
