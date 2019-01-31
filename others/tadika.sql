-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tadika.branch
DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(11) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `tel_mobile` varchar(20) DEFAULT NULL,
  `tel_office` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.branch: ~5 rows (approximately)
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` (`id`, `organization_name`, `branch_name`, `address_1`, `address_2`, `city`, `postcode`, `state`, `country`, `tel_mobile`, `tel_office`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(12, 'Pusat Tuisyen Berjaya', 'Pusat Tuisyen Berjaya Keramat', 'No B12, Jalan Megah', 'Taman AU2 ', 'Keramat', '68000', 'Kuala Lumpur', 'Malaysia', '0132583698', '0364789512', 'tuisyenberjaya.keramat@gmail.com', '2016-12-22 10:10:07', '2016-12-22 02:10:07', NULL),
	(13, 'Pusat Tuisyen Berjaya', 'Pusat Tuisyen Berjaya Johor Jaya', 'Blok-B-12, Jalan Julia', 'Taman Johor Yaja', 'Johor Bahru', '68000', 'Johor', 'Malaysia', '0132583698', '0364789511', 'tuisyenberjaya.jjaya@gmail.com', '2016-12-22 10:02:21', '2016-12-22 02:01:14', NULL),
	(14, 'Tadika Amee', 'Tadika Amee Taman Universiti', 'No. 201, Jalan Megah', 'Taman Universiti', 'Skudai', '81310', 'Johor', 'Malaysia', '0196411111', '0764566545', 'tadikaametmnu@gmail.commm', '2016-12-22 10:10:25', '2016-12-29 06:15:24', NULL),
	(18, 'Pusat Tuisyen Berjaya', 'Pusat Tuisyen Berjaya Ampang', 'No 402, Jalan 2', 'Taman Sri Ampang', 'Ampang', '68100', 'Kuala Lumpur', 'Malaysia', '0177777777', '0177777777', 'try@gmail.comm', '2016-12-22 02:11:59', '2016-12-22 02:11:59', NULL),
	(19, 'Pusat Jagaan Melenie', 'Pusat Jagaan Bayi Melmel', 'No 20, Jalan Anggerik', 'Taman Melati', 'Melati', '68100', 'Kuala Lumpur', 'Malaysia', '0134880418', '0312345678', 'melmel@gmail.comm', '2016-12-22 07:00:05', '2016-12-22 07:00:05', NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;

-- Dumping structure for table tadika.branch_staff
DROP TABLE IF EXISTS `branch_staff`;
CREATE TABLE IF NOT EXISTS `branch_staff` (
  `branch_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.branch_staff: ~6 rows (approximately)
/*!40000 ALTER TABLE `branch_staff` DISABLE KEYS */;
INSERT INTO `branch_staff` (`branch_id`, `staff_id`) VALUES
	(13, 128),
	(13, 131),
	(12, 133),
	(12, 134),
	(18, 132),
	(19, 137);
/*!40000 ALTER TABLE `branch_staff` ENABLE KEYS */;

-- Dumping structure for table tadika.classroom
DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_package` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `class_name` varchar(25) DEFAULT NULL,
  `total_students` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.classroom: ~0 rows (approximately)
/*!40000 ALTER TABLE `classroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom` ENABLE KEYS */;

-- Dumping structure for table tadika.fee
DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `no_receipt` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`no_receipt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.fee: ~0 rows (approximately)
/*!40000 ALTER TABLE `fee` DISABLE KEYS */;
/*!40000 ALTER TABLE `fee` ENABLE KEYS */;

-- Dumping structure for table tadika.grade
DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `id_subject` varchar(11) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `review` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.grade: ~15 rows (approximately)
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` (`id`, `id_student`, `subject_name`, `id_subject`, `grade`, `mark`, `review`) VALUES
	(1, 1, 'Bahasa Melayu', 'BM01', 'A', 88, 'Cemerlang'),
	(2, 1, 'Bahasa Inggeris', 'BI02', 'A', 84, 'Cemerlang'),
	(3, 1, 'Matematik', 'MT03', 'A', 82, 'Cemerlang'),
	(4, 1, 'Seni', 'SN04', 'A', 84, 'Cemerlang'),
	(5, 1, 'Iqra\'', 'IQ05', 'A', 80, 'Cemerlang'),
	(6, 2, 'Bahasa Melayu', 'BM01', 'A', 82, 'Cemerlang'),
	(7, 2, 'Bahasa Inggeris', 'BI02', 'A', 84, 'Cemerlang'),
	(8, 2, 'Matematik', 'MT03', 'A', 88, 'Cemerlang'),
	(9, 2, 'Seni', 'SN04', 'A', 80, 'Cemerlang'),
	(10, 2, 'Iqra\'', 'IQ05', 'A', 85, 'Cemerlang'),
	(11, 3, 'Bahasa Melayu', 'BM01', 'A', 88, 'Cemerlang'),
	(12, 3, 'Bahasa Inggeris', 'BI02', 'A', 84, 'Cemerlang'),
	(13, 3, 'Matematik', 'MT03', 'A', 88, 'Cemerlang'),
	(14, 3, 'Seni', 'SN04', 'A', 84, 'Cemerlang'),
	(15, 3, 'Iqra\'', 'IQ05', 'A', 82, 'Cemerlang');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;

-- Dumping structure for table tadika.guardian
DROP TABLE IF EXISTS `guardian`;
CREATE TABLE IF NOT EXISTS `guardian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relationship` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `ic_father` varchar(50) DEFAULT NULL,
  `occupation_f` varchar(50) DEFAULT NULL,
  `salary_f` double DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `tel_mobile_f` int(20) DEFAULT NULL,
  `tel_home` varchar(100) DEFAULT NULL,
  `email_f` varchar(100) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `ic_mother` varchar(50) DEFAULT NULL,
  `occupation_m` varchar(50) DEFAULT NULL,
  `salary_m` double DEFAULT NULL,
  `tel_mobile_m` varchar(100) DEFAULT NULL,
  `email_m` varchar(100) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.guardian: ~4 rows (approximately)
/*!40000 ALTER TABLE `guardian` DISABLE KEYS */;
INSERT INTO `guardian` (`id`, `relationship`, `father_name`, `ic_father`, `occupation_f`, `salary_f`, `nationality`, `tel_mobile_f`, `tel_home`, `email_f`, `mother_name`, `ic_mother`, `occupation_m`, `salary_m`, `tel_mobile_m`, `email_m`, `address_1`, `address_2`, `postcode`, `city`, `state`, `country`, `created_at`, `deleted_at`, `updated_at`) VALUES
	(1, 'Bapa', 'Hamid bin Daeng Naqib', '2147483647', 'PA', 1500, 'malaysia', 1234567890, '067895422', 'njh@gmail.com', 'Saadah', '123456789123', 'suri rumah', 0, '01236547895', '-', 'No. 90, Jalan Pulasam 30', 'Taman kKota Masai', 81700, 'Johor Bahru', 'Johor', 'Malaysia', '2016-12-20 12:33:37', NULL, NULL),
	(8, 'Anak kandung', 'Mohd Faiz bin Yaasin', '98745614258', 'Juruteknik', 2450, 'Malaysia', 123654789, '071458966', 'faiz@gmail.com', 'Dayang Seri binti Hamid', '651125478596', 'Suri rumah', NULL, '0124589674', 'nana@gmail.com', 'No. 84, Jalan Cempaka 15', 'Taman Melawati', 81300, 'Skudai', 'Johor', 'Malaysia', '2017-01-04 15:10:20', NULL, NULL),
	(11, 'Anak', 'Saifulamri bin Rosmin', '2147483647', 'Pemandu lori', 3000, 'Malaysia', 142735494, '069727522', 'ciknana@gmail.com', 'Maryuni binti Jilin', '941024015894', 'Suri Rumah', 0, '0127609821', 'nurfazianas@gmail.com', 'No. 90, Jalan Pulasan 30', 'Taman Kota Masai', 81700, 'Pasir Gudang', 'Johor', 'Malaysia', '2017-01-01 11:35:29', NULL, NULL),
	(12, 'Anak Kandung', 'Mohamod bin Arif', '123456147896', 'Telekom Malaysia', 3500, 'Malaysia', 123456789, '069729522', 'nada@gmail.com', 'Shahira binti Khamis', '321456145874', 'Cikgu', 3000, '0142587658', 'shahira@gmail.com', 'No.105, Jalan Nuri', 'Taman Gombak ', 84156, 'Gombak', 'Kuala Lumpur', 'Malaysia', '2017-01-04 15:06:17', NULL, NULL);
/*!40000 ALTER TABLE `guardian` ENABLE KEYS */;

-- Dumping structure for table tadika.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` char(32) NOT NULL,
  `role` varchar(35) DEFAULT NULL,
  `user_id` varchar(32) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_me` varchar(32) DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tadika.login: ~5 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `role`, `user_id`, `username`, `password`, `remember_me`, `confirmation_token`, `enable`) VALUES
	('1', 'owner', '', 'owner', '$2y$10$Tela8Jkr6UE10DmXF4KUz.o49RSiAWjFcx3BAzWZGc6nlZ2Kh9YZO', NULL, NULL, 1),
	('2', 'clerk', '', 'clerk', '$2y$10$uJpEqJTS611SR5frkKVrRukL6ZxrqX36IskYLU9PObpFUXbxrJ66q', NULL, NULL, 1),
	('3', 'teacher', '', 'teacher', '$2y$10$QLS548ceBmkircuJ/.vP4eN9qKdl7frKNaKHpLrsmi0H9q9eRlDgO', NULL, NULL, 1),
	('4', 'parents', '', 'parents', '$2y$10$ALZ2YEv3gnHfhSfPr6Lu7e7OgRVrmqKo8cZRn1ReHvs5ALPqU6RpK', NULL, NULL, 1),
	('5', 'admin', '', 'admin', '$2y$10$H4WCeTKhZD3I3PNifKPH/.Ezhgs9.kD04osFGY1OhImbrQ2/toTB.', NULL, NULL, 1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table tadika.login_log
DROP TABLE IF EXISTS `login_log`;
CREATE TABLE IF NOT EXISTS `login_log` (
  `id` char(32) NOT NULL,
  `user_id` char(32) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `login_dtm` datetime NOT NULL,
  `browser` varchar(50) NOT NULL,
  `browser_version` varchar(50) DEFAULT NULL,
  `os` varchar(50) NOT NULL,
  `os_version` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table tadika.login_log: ~201 rows (approximately)
/*!40000 ALTER TABLE `login_log` DISABLE KEYS */;
INSERT INTO `login_log` (`id`, `user_id`, `ip_address`, `login_dtm`, `browser`, `browser_version`, `os`, `os_version`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('00cf751d7da24b7493b0da952169ac80', '', '127.0.0.1', '2016-11-25 11:35:04', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-25 19:35:04', NULL, NULL),
	('01a30b574cdf4bae8b63e1b6c09db197', '', '127.0.0.1', '2016-11-24 14:53:04', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 22:53:04', NULL, NULL),
	('0265f0f7600d4a6c822d9695e61d5acf', '', '127.0.0.1', '2016-12-18 01:26:55', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 09:26:55', NULL, NULL),
	('061148ee710e48f19220395d0bf92d30', '', '127.0.0.1', '2017-01-05 01:17:53', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 09:17:53', NULL, NULL),
	('068e489b04be4420acc0ca8974f416da', '', '127.0.0.1', '2016-12-22 02:29:13', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 10:29:13', NULL, NULL),
	('0775612218894a8ba1f6b217cd18bc83', '', '127.0.0.1', '2016-12-29 03:48:52', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-29 11:48:52', NULL, NULL),
	('082708c905a14c4b9ccadfd1a9e3fe6f', '', '::1', '2017-01-03 09:06:21', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 17:06:21', NULL, NULL),
	('08275e5956d84608aef0be09b909b154', '', '::1', '2017-01-03 07:58:46', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:58:46', NULL, NULL),
	('0a8e96612cc64f17b313284bf536408f', '', '127.0.0.1', '2016-12-01 07:38:52', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 15:38:53', NULL, NULL),
	('0c5c8b4d034349faa9d19e6f82a15020', '', '127.0.0.1', '2018-10-04 02:30:34', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-04 10:30:34', NULL, NULL),
	('1006cce766844272a0014b02ab4808ac', '', '127.0.0.1', '2016-11-27 01:24:48', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:24:48', NULL, NULL),
	('10d98143a7dc42c282569880d7eaf748', '', '127.0.0.1', '2016-11-23 04:05:30', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 12:05:30', NULL, NULL),
	('114dc317774a4d74b1a1bd830f0f0b09', '', '::1', '2017-01-01 07:42:39', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-01 15:42:39', NULL, NULL),
	('1165533e990d4a8e8dc2f5f2369eeaa0', '', '127.0.0.1', '2016-11-24 14:47:37', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 22:47:37', NULL, NULL),
	('11833098a7ae4922bca76277800f1eeb', '', '127.0.0.1', '2016-12-15 04:23:33', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-15 12:23:33', NULL, NULL),
	('120ba18f3cec44eea3bf61670d9eb9e3', '', '127.0.0.1', '2016-12-05 07:51:04', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 15:51:04', NULL, NULL),
	('130e1497bce946018ab8d7e7e325022b', '', '127.0.0.1', '2018-09-30 04:36:39', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 12:36:39', NULL, NULL),
	('1375a83236ed4514b76136a12d1af88a', '', '127.0.0.1', '2016-12-06 01:46:53', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 09:46:53', NULL, NULL),
	('13b0884aed2147c5b08bcd88fb3fdaa2', '', '::1', '2016-11-30 04:41:25', 'Chrome', '54.0.2840.99', 'Windows', '6.1', '2016-11-30 12:41:25', NULL, NULL),
	('13b2f42d3da14efd80c5a4d3535b11f9', '', '127.0.0.1', '2016-12-14 03:22:12', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:22:12', NULL, NULL),
	('143d531474754d73bc64599e5da2e3d4', '', '127.0.0.1', '2016-11-27 01:15:40', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:15:40', NULL, NULL),
	('161cb247cb684bae9a237e80ef22066c', '', '127.0.0.1', '2016-12-05 08:33:56', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 16:33:56', NULL, NULL),
	('198203874aed48e680592333c71bcdb7', '', '127.0.0.1', '2018-10-03 02:17:12', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-03 10:17:12', NULL, NULL),
	('1bf1f373226b4116b9f8775645cb98f7', '', '::1', '2017-01-02 02:40:36', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-02 10:40:36', NULL, NULL),
	('1cb4df3951764d888a4e7870a8cca03c', '', '::1', '2017-01-03 07:21:27', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:21:27', NULL, NULL),
	('1cbe46de795d498dbf940f157f1a1ba1', '', '127.0.0.1', '2018-10-08 07:09:59', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-08 15:09:59', NULL, NULL),
	('1d19710a289148008c3771b79b0f75e5', '', '127.0.0.1', '2017-01-05 08:26:39', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 16:26:39', NULL, NULL),
	('1daf313bdd2f4e3f9fd2d430daf177f9', '', '127.0.0.1', '2017-01-05 07:55:53', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 15:55:53', NULL, NULL),
	('1debf06c4f624360b156a508d4d4dbd7', '', '::1', '2017-01-01 03:20:41', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-01 11:20:41', NULL, NULL),
	('1ec21156a53b4d50ae8bfb3965313c7b', '', '127.0.0.1', '2016-12-14 03:53:59', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:53:59', NULL, NULL),
	('1f3ffd77c1aa40399f880b13bfe50acc', '', '127.0.0.1', '2016-12-15 04:24:51', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-15 12:24:51', NULL, NULL),
	('1fe8a0a2b4ec462d9d811bd95997ef04', '', '127.0.0.1', '2016-12-06 01:52:49', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 09:52:49', NULL, NULL),
	('200783dde49e4d05ab88b963fcb43131', '', '127.0.0.1', '2016-11-23 02:55:49', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 10:55:49', NULL, NULL),
	('207066aa9ec84bd482518138ae2b1ebd', '', '127.0.0.1', '2016-12-15 00:32:36', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-15 08:32:37', NULL, NULL),
	('21718cde71d846068fd9da8bbba9e1a1', '', '::1', '2017-01-03 07:33:51', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:33:51', NULL, NULL),
	('21adb690cb1a4d7db563eb3d815a285a', '', '127.0.0.1', '2016-12-28 04:35:16', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-28 12:35:16', NULL, NULL),
	('21adca455a004b3fb4742b2f91da6acf', '', '::1', '2017-01-03 07:57:53', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:57:53', NULL, NULL),
	('22bb8e682cfc4890814655879afc0383', '', '::1', '2017-01-03 07:38:47', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:38:47', NULL, NULL),
	('239e978898d5440c9470bd14658e0037', '', '127.0.0.1', '2018-09-30 07:46:56', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 15:46:56', NULL, NULL),
	('2408781442764f9bb66f4faef08c0fab', '', '127.0.0.1', '2016-12-29 02:38:33', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-29 10:38:33', NULL, NULL),
	('2454b6d5367e43e1988ea906cf88f733', '', '::1', '2016-12-01 02:04:44', 'Chrome', '54.0.2840.99', 'Windows', '6.1', '2016-12-01 10:04:44', NULL, NULL),
	('24e58d93a24c4bfe91e24a10686e35c6', '', '::1', '2017-01-02 01:55:28', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-02 09:55:28', NULL, NULL),
	('25f19168f1a64ea698baf1bb1d9a410f', '', '127.0.0.1', '2016-12-22 07:26:34', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 15:26:34', NULL, NULL),
	('264924e6f3aa44e19393534dd4739fab', '', '127.0.0.1', '2018-10-08 03:17:46', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-08 11:17:46', NULL, NULL),
	('275a15ee0fda42e390210e4a3858b26b', '', '127.0.0.1', '2016-12-07 23:58:07', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 07:58:07', NULL, NULL),
	('27ba9520c2ec4e92888d168c7a61da35', '', '127.0.0.1', '2016-12-29 09:56:03', 'Chrome', '55.0.2883.87', 'Windows', '6.3', '2016-12-29 17:56:03', NULL, NULL),
	('2ff4338ac932465698af0bc66c16e09b', '', '127.0.0.1', '2018-09-30 05:01:42', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 13:01:42', NULL, NULL),
	('31dc0086fb394c4ba3d283fc0cba5cdf', '', '127.0.0.1', '2016-12-14 01:20:48', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 09:20:48', NULL, NULL),
	('33e9b1b197244a3fbc3f45274389515e', '', '127.0.0.1', '2017-01-05 05:01:00', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 13:01:00', NULL, NULL),
	('34a96bd3d28647369c07df8a41c0b3fa', '', '127.0.0.1', '2017-01-05 03:29:28', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 11:29:28', NULL, NULL),
	('3a75e39b8f9e48f4bc464fb1aa5b60a6', '', '127.0.0.1', '2016-12-22 07:02:30', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 15:02:30', NULL, NULL),
	('3bb3111da17d41478d5ef73112262a1b', '', '::1', '2016-11-30 06:58:36', 'Chrome', '54.0.2840.99', 'Windows', '6.1', '2016-11-30 14:58:36', NULL, NULL),
	('3cd125bc4af642238e8b4ead5efd0ede', '', '::1', '2017-01-02 07:36:24', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-02 15:36:24', NULL, NULL),
	('3d17695f105c494d8da655eac39661a3', '', '127.0.0.1', '2016-12-08 09:01:32', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 17:01:32', NULL, NULL),
	('3d3bb35f50ae45aaaab2654271b82ee4', '', '127.0.0.1', '2016-11-23 04:25:10', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 12:25:10', NULL, NULL),
	('3d6cd79792fa474680984ec1ddb636fb', '', '127.0.0.1', '2017-01-05 08:30:28', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 16:30:28', NULL, NULL),
	('3ef08a1f6b0f4de5b6823e13152194af', '', '::1', '2017-01-03 09:12:43', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 17:12:43', NULL, NULL),
	('3f36995977ad4c7b85b0e28e1975147a', '', '127.0.0.1', '2016-11-27 01:30:22', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:30:22', NULL, NULL),
	('3ff71459c95b48d2b8ed0103f742c6af', '', '::1', '2017-01-04 04:26:45', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-04 12:26:45', NULL, NULL),
	('4218dfbb3d7d4d45a805df39e2d176d9', '', '::1', '2017-01-03 06:52:24', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 14:52:24', NULL, NULL),
	('4235de02de504a98af5827be006dc9fe', '', '127.0.0.1', '2016-12-07 07:39:57', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-07 15:39:57', NULL, NULL),
	('42f39ab422754a22b81c32a24c6da29e', '', '127.0.0.1', '2016-12-06 01:54:01', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 09:54:01', NULL, NULL),
	('438e8c57273447e7836d3b64b74d9185', '', '127.0.0.1', '2016-12-05 01:25:32', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 09:25:32', NULL, NULL),
	('44399ae9bec94b56b2fe69ca017b36b5', '', '127.0.0.1', '2016-12-26 03:39:45', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 11:39:45', NULL, NULL),
	('44505c947a5c4f58806d9e3f87c759f1', '', '127.0.0.1', '2017-01-05 03:29:18', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 11:29:18', NULL, NULL),
	('4480d8e84589422092c3f113129d696a', '', '127.0.0.1', '2016-12-26 03:39:24', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 11:39:24', NULL, NULL),
	('470261e2f2b6471e872c86259d1f9791', '', '127.0.0.1', '2017-01-05 08:25:12', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 16:25:12', NULL, NULL),
	('470de197a2174c8eb7d8880ed69f8bf8', '', '127.0.0.1', '2016-12-29 01:36:35', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-29 09:36:35', NULL, NULL),
	('489c75d4b64d40a79d032a0a7d1890aa', '', '127.0.0.1', '2016-11-24 14:24:17', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 22:24:18', NULL, NULL),
	('48a95ac79e1a4774b3f6548b701242cc', '', '127.0.0.1', '2016-12-04 01:25:35', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-04 09:25:35', NULL, NULL),
	('4a1d3b8b2d2b460daf486189c1a87430', '', '127.0.0.1', '2016-12-11 03:23:33', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-11 11:23:33', NULL, NULL),
	('4ad93e2bb3c54efbbb133821e16a5d71', '', '127.0.0.1', '2016-12-01 07:48:38', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 15:48:38', NULL, NULL),
	('4b3417849c9a494e972a7072ed208043', '', '127.0.0.1', '2016-11-23 07:57:59', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 15:57:59', NULL, NULL),
	('4b86c3d96d7f4627bb78787c7cda9b8d', '', '127.0.0.1', '2016-12-18 01:08:15', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 09:08:15', NULL, NULL),
	('4b8de05c8ceb4b4dbcbded31c7e9794a', '', '::1', '2017-01-03 07:13:58', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:13:58', NULL, NULL),
	('4db80c7e8feb4c90aa685bd8548b3a20', '', '10.0.2.2', '2016-11-29 21:51:29', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-30 05:51:29', NULL, NULL),
	('501548cc02ff46b584496aea7d092191', '', '127.0.0.1', '2016-12-01 07:27:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 15:27:47', NULL, NULL),
	('506eca76b0e448d184574d8822686462', '', '127.0.0.1', '2018-09-30 04:31:02', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 12:31:02', NULL, NULL),
	('5206bdaa17c9476bafa87b9e00e42c7b', '', '127.0.0.1', '2016-12-05 02:36:05', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 10:36:05', NULL, NULL),
	('527b56e8195e47b8803a5c0d151181f9', '', '127.0.0.1', '2016-11-24 00:24:39', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 08:24:39', NULL, NULL),
	('567a401c963d43b2b48646393349123d', '', '127.0.0.1', '2016-12-18 05:12:53', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 13:12:53', NULL, NULL),
	('57839e4732d64edeafc107717da02e0c', '', '127.0.0.1', '2016-11-23 07:59:14', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 15:59:14', NULL, NULL),
	('57ec27edf5d440c48fd0623f5c0b7571', '', '127.0.0.1', '2016-12-26 08:27:04', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 16:27:04', NULL, NULL),
	('57f7d8ba77e84771bd32f7322bf9cc4e', '', '127.0.0.1', '2016-12-26 08:20:04', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 16:20:04', NULL, NULL),
	('58a870838e3f42beb0db05d78185befa', '', '127.0.0.1', '2016-12-14 03:49:22', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:49:22', NULL, NULL),
	('59549918a96d4363b23ac2d4b6f599b6', '', '127.0.0.1', '2016-12-07 00:45:31', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-07 08:45:31', NULL, NULL),
	('5b1d9b7f899143678ac6d65adb7bc702', '', '127.0.0.1', '2016-12-06 08:11:06', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 16:11:06', NULL, NULL),
	('5d211ae3f77d4ecaa6e89afab0a5ff4e', '', '127.0.0.1', '2017-01-05 06:43:35', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 14:43:35', NULL, NULL),
	('5dd5161ebd4840baae14d0e8a311d14f', '', '127.0.0.1', '2016-12-08 01:03:05', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 09:03:05', NULL, NULL),
	('5fa6c2e4611c4781ac3fab91247c835c', '', '::1', '2016-12-20 03:09:42', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2016-12-20 11:09:42', NULL, NULL),
	('608a01eef9b44ec699da9a21f5ed6be1', '', '127.0.0.1', '2016-12-01 07:50:20', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 15:50:20', NULL, NULL),
	('6218d8b6071d4c2d86a02c05db2c1a52', '', '127.0.0.1', '2016-12-14 06:54:17', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 14:54:17', NULL, NULL),
	('63b71a8cfcf54b99b28ab431557d1032', '', '127.0.0.1', '2016-11-24 14:46:29', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 22:46:29', NULL, NULL),
	('64380160f33340b79161f99a0bf09c19', '', '127.0.0.1', '2016-12-18 01:28:14', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 09:28:14', NULL, NULL),
	('656d345fb34940cea7cb977238c184d5', '', '127.0.0.1', '2016-12-07 07:43:38', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-07 15:43:38', NULL, NULL),
	('6573b5c7c4784681ac1019602c401c73', '', '127.0.0.1', '2017-01-05 04:59:38', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 12:59:38', NULL, NULL),
	('6583460481d2471195f209ff94289656', '', '127.0.0.1', '2016-12-14 01:50:37', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 09:50:37', NULL, NULL),
	('668bcd9ba1e3421ba3c20c8a54f08709', '', '127.0.0.1', '2016-11-27 01:25:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:25:47', NULL, NULL),
	('6a71b1f2a69340a8bccb7da3dab0b31c', '', '127.0.0.1', '2016-12-08 01:46:55', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 09:46:55', NULL, NULL),
	('6d695d2ae6974cca9b8cd6ba75eeaed0', '', '::1', '2017-01-04 02:01:49', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-04 10:01:49', NULL, NULL),
	('6e97e08fe7ec4ab69db25294b4613f41', '', '::1', '2017-01-03 09:03:49', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 17:03:49', NULL, NULL),
	('70a13cf9a77b474daaba4f000a1c677f', '', '127.0.0.1', '2016-11-27 03:52:02', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 11:52:02', NULL, NULL),
	('7217e29359304b81a5cda7f1f6073b6d', '', '127.0.0.1', '2016-12-08 09:28:34', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 17:28:34', NULL, NULL),
	('728874c250c84c7ea9a4d6a4cc7f2448', '', '127.0.0.1', '2017-01-05 08:24:21', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 16:24:21', NULL, NULL),
	('7484ac5637ba4a10858643a5629fb55a', '', '127.0.0.1', '2016-12-26 03:40:45', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 11:40:45', NULL, NULL),
	('74ece0379588409888d15fe4eb2197fa', '', '127.0.0.1', '2016-12-06 01:54:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 09:54:47', NULL, NULL),
	('7501fd42247f4fbfa817efb52715aa1e', '', '127.0.0.1', '2016-12-06 06:37:28', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 14:37:28', NULL, NULL),
	('760f91b5caf64dd68bc77e89a8736d47', '', '::1', '2017-01-02 02:05:12', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-02 10:05:12', NULL, NULL),
	('77e93fb3954340ef8d2a9c4c349dc237', '', '127.0.0.1', '2016-11-23 06:49:02', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 14:49:02', NULL, NULL),
	('7806f5fb67ed478abade3528d0a869a9', '', '127.0.0.1', '2018-10-03 06:36:46', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-03 14:36:46', NULL, NULL),
	('7a340db2f6ee45d4af7184a34552ffb3', '', '127.0.0.1', '2018-10-07 03:25:03', 'Chrome', '69.0.3497.100', 'AndroidOS', '8.0.0', '2018-10-07 11:25:03', NULL, NULL),
	('7c2efce3141e4d70b2c0e5cdac1e671f', '', '127.0.0.1', '2016-11-25 10:57:18', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-25 18:57:18', NULL, NULL),
	('7d4518c562d94361bdde32b35f8bd459', '', '127.0.0.1', '2016-12-06 04:10:20', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 12:10:20', NULL, NULL),
	('7e04f4be946e4ad9ab35b96f9720919a', '', '127.0.0.1', '2016-12-11 01:02:46', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-11 09:02:46', NULL, NULL),
	('7ec9c3d6d19145f28b6923ffcfbb800f', '', '127.0.0.1', '2017-01-05 07:09:15', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 15:09:15', NULL, NULL),
	('808ac5ab728f4ba3b80cd5c5a630f6cd', '', '127.0.0.1', '2016-12-14 03:51:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:51:47', NULL, NULL),
	('81bd568cb30c4f098b10f39d3ef268f6', '', '127.0.0.1', '2016-12-22 07:28:47', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 15:28:47', NULL, NULL),
	('82057366615441d3b37b1ec48054694e', '', '127.0.0.1', '2016-11-25 09:58:39', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-25 17:58:39', NULL, NULL),
	('83216b53a78347bab881431155a83c99', '', '127.0.0.1', '2016-12-08 06:35:32', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 14:35:32', NULL, NULL),
	('86c49b4ee38a4d398997fcf4f1c50b37', '', '10.0.2.2', '2016-11-23 00:21:39', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 08:21:39', NULL, NULL),
	('880a7175f39f4e8f8165eb5309cd5a4e', '', '127.0.0.1', '2018-09-30 07:07:22', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 15:07:22', NULL, NULL),
	('89984e56b71b47599ecd1f7ca42b909f', '', '127.0.0.1', '2018-09-30 07:38:27', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 15:38:27', NULL, NULL),
	('89b78411492d42529d6b38abce9470d4', '', '127.0.0.1', '2018-10-04 01:59:20', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-04 09:59:20', NULL, NULL),
	('8a530dd97fb340eeab84a2631e3bc44b', '', '127.0.0.1', '2018-10-04 06:20:53', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-04 14:20:53', NULL, NULL),
	('8bec3cc6945c4b8c92e95064e22adaa8', '', '::1', '2017-01-03 14:52:39', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 22:52:39', NULL, NULL),
	('8df2db09a5d6461fb8d62e1f7815456b', '', '127.0.0.1', '2016-12-18 01:25:36', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 09:25:36', NULL, NULL),
	('8ef74b25ff7c4f2c85e4bb85ec3d16ee', '', '127.0.0.1', '2016-12-06 01:26:29', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 09:26:30', NULL, NULL),
	('91b8df723ef64b9ea681dc9800f5220b', '', '127.0.0.1', '2016-12-05 06:53:33', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 14:53:33', NULL, NULL),
	('92a0899e82404c4f90ab900bddfe17e1', '', '127.0.0.1', '2016-12-19 01:03:07', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-19 09:03:07', NULL, NULL),
	('92f21148d54a41e2816877f89101bfeb', '', '127.0.0.1', '2018-09-30 04:33:19', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 12:33:19', NULL, NULL),
	('95c2aeb4394e44f08acc29a70ac92656', '', '127.0.0.1', '2018-10-07 04:13:59', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-07 12:13:59', NULL, NULL),
	('95da6d9dfaf64d86b13921888584b591', '', '10.0.2.2', '2016-11-29 15:27:59', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-29 23:27:59', NULL, NULL),
	('968474b198f645e9a52207a17b513e0d', '', '::1', '2017-01-03 04:18:12', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 12:18:12', NULL, NULL),
	('976e4ed4bba54aaa92351e59211b5105', '', '127.0.0.1', '2017-01-05 03:19:00', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 11:19:00', NULL, NULL),
	('97fbcdf0f9834495b7b9346fd6f3ea58', '', '::1', '2017-01-03 14:15:51', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 22:15:51', NULL, NULL),
	('9b102d07c7c540088aa93d66b3da01b0', '', '127.0.0.1', '2016-12-08 09:02:00', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 17:02:00', NULL, NULL),
	('9cf3be035de242d49d41ae7b6737f640', '', '127.0.0.1', '2016-12-08 00:02:40', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 08:02:40', NULL, NULL),
	('9e211e47750947b0b2bd5a4d51ad7b1e', '', '127.0.0.1', '2016-12-05 01:23:44', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 09:23:44', NULL, NULL),
	('a523b44bcac44456b4220d8e21ac98f6', '', '127.0.0.1', '2016-12-01 08:07:30', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 16:07:30', NULL, NULL),
	('a6ae4a01bf20401a95bcd3f08dce9aa0', '', '127.0.0.1', '2016-12-21 07:14:01', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-21 15:14:01', NULL, NULL),
	('a71a5a610ffb4b7ebde7549b67df0d50', '', '127.0.0.1', '2016-12-21 01:08:03', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-21 09:08:03', NULL, NULL),
	('a83f81775e3142f79bdb1c9a70347ee2', '', '127.0.0.1', '2016-12-14 03:48:57', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:48:57', NULL, NULL),
	('a8ae1567401245bca3abcc6dbefe321c', '', '::1', '2017-01-01 03:18:54', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-01 11:18:54', NULL, NULL),
	('a9810dcd820540f39db080cfc4480b45', '', '127.0.0.1', '2016-12-05 03:57:21', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 11:57:21', NULL, NULL),
	('a9b18f57369a4645b423886f292bd76d', '', '127.0.0.1', '2016-12-18 01:28:27', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-18 09:28:27', NULL, NULL),
	('a9f05da8278e46a28f8a741527e51fc3', '', '127.0.0.1', '2018-09-30 07:47:53', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 15:47:53', NULL, NULL),
	('aa05e9ca89234144bed9f0fc32bfe1d6', '', '127.0.0.1', '2016-12-22 07:29:34', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 15:29:34', NULL, NULL),
	('ac44afe699bb4269af1b0317da5c8b4d', '', '127.0.0.1', '2016-12-06 07:19:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 15:19:47', NULL, NULL),
	('acce2f8f243a4f41a23b239add8ae04a', '', '127.0.0.1', '2016-12-29 00:29:27', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-29 08:29:27', NULL, NULL),
	('adb39eb392594d159b77a44b1d2e0811', '', '127.0.0.1', '2016-12-01 02:55:58', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 10:55:58', NULL, NULL),
	('aebdbff4c6404701873f321c3fac4828', '', '127.0.0.1', '2016-12-06 03:01:28', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-06 11:01:28', NULL, NULL),
	('af83ac4017104ed393754ee3fecf5e00', '', '127.0.0.1', '2017-01-05 07:03:39', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 15:03:39', NULL, NULL),
	('b19f7de11fbf42d5b9a871a742e9b9fb', '', '127.0.0.1', '2016-12-27 00:22:28', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-27 08:22:28', NULL, NULL),
	('b1fff23fd23c43219a47750b12d2b9fd', '', '127.0.0.1', '2016-12-08 01:45:38', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 09:45:38', NULL, NULL),
	('b5eb3872d9a64d03aa5f0ef18dfffccd', '', '::1', '2017-01-01 07:49:49', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-01 15:49:49', NULL, NULL),
	('ba672295c1184c76ade0b3ed2405f779', '', '127.0.0.1', '2016-12-08 02:33:42', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 10:33:42', NULL, NULL),
	('c158147a9e684c46878c34157fa44c67', '', '127.0.0.1', '2018-10-03 02:44:02', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-03 10:44:02', NULL, NULL),
	('c37de295845049129d1e43c3095905da', '', '127.0.0.1', '2017-01-05 06:38:58', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 14:38:58', NULL, NULL),
	('c3a0f7dfc42044ba8a7cf2a4d09de16b', '', '::1', '2017-01-02 08:00:41', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-02 16:00:41', NULL, NULL),
	('c414727d76af4d55ab15a0bfdc3fbdb3', '', '127.0.0.1', '2018-10-07 03:24:25', 'Chrome', '69.0.3497.100', 'AndroidOS', '8.0.0', '2018-10-07 11:24:25', NULL, NULL),
	('c5f5494add4046c6ba5fb97d6e241857', '', '10.0.2.2', '2016-11-29 22:17:10', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-30 06:17:10', NULL, NULL),
	('c6deca7fc475407fabc408e1ebcffd4f', '', '::1', '2017-01-04 03:07:59', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-04 11:07:59', NULL, NULL),
	('c814e6a86989453b95fd861b22546c86', '', '127.0.0.1', '2016-12-22 02:30:33', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 10:30:33', NULL, NULL),
	('cccac3aa284a4cf4bcbbe2e98040290a', '', '::1', '2017-01-03 14:15:14', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 22:15:14', NULL, NULL),
	('cce1d1b9ecf04e8cb05c9e2180580172', '', '127.0.0.1', '2016-12-14 06:54:51', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 14:54:51', NULL, NULL),
	('ce5f8edcca6241acb87bec9b4c657bda', '', '127.0.0.1', '2016-12-05 08:32:54', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 16:32:54', NULL, NULL),
	('cf7cf2a7b6cb4673b24ad568fa72b612', '', '127.0.0.1', '2016-12-26 00:40:41', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 08:40:41', NULL, NULL),
	('d021f5101f844776bf55051eb83efefe', '', '127.0.0.1', '2016-12-22 07:01:14', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 15:01:14', NULL, NULL),
	('d0641b69152a44a58d07161ff9d4cd03', '', '127.0.0.1', '2018-09-30 04:30:16', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 12:30:16', NULL, NULL),
	('d13b61c5d07b48b58bf8fdbc5bdc5870', '', '127.0.0.1', '2016-12-08 01:09:59', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 09:09:59', NULL, NULL),
	('d15a76eb8ebe47f9bda31db15100b819', '', '127.0.0.1', '2016-12-08 02:21:26', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 10:21:26', NULL, NULL),
	('d231a90676224582be098e8f3f96d4c8', '', '127.0.0.1', '2016-11-27 01:24:13', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:24:13', NULL, NULL),
	('d6614a0711e2454bb97069628076520d', '', '127.0.0.1', '2016-12-05 07:57:47', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 15:57:47', NULL, NULL),
	('d67871da72b04a3abbadd525c52ace05', '', '::1', '2017-01-03 03:13:23', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 11:13:23', NULL, NULL),
	('daf8ea78808a4135986d74432f0a89b5', '', '127.0.0.1', '2016-12-14 03:30:35', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 11:30:35', NULL, NULL),
	('dc639554befb426fb0d0f72841224a77', '', '127.0.0.1', '2016-12-22 00:37:25', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 08:37:25', NULL, NULL),
	('dcaaf351e2404e2bba6285106633a2f8', '', '::1', '2017-01-01 08:05:44', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-01 16:05:44', NULL, NULL),
	('de7e1ca4d6d64a4a83e0b32b0ce9751a', '', '127.0.0.1', '2018-09-30 04:28:47', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-09-30 12:28:47', NULL, NULL),
	('e0fedfa440ce4a04a24a0ad94e1bcb93', '', '127.0.0.1', '2016-12-14 01:56:06', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-14 09:56:06', NULL, NULL),
	('e1cb3257a0274b66886ab2f12ffca1d2', '', '127.0.0.1', '2016-12-05 08:43:18', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 16:43:18', NULL, NULL),
	('e2745eb647c448fc8fe7681922b482b8', '', '127.0.0.1', '2016-11-23 04:17:58', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-23 12:17:58', NULL, NULL),
	('e40bdf251e8040aa92076f4b15ca9d71', '', '127.0.0.1', '2018-10-01 04:19:08', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-01 12:19:08', NULL, NULL),
	('e66533f959014609b9839f666fff1aa6', '', '127.0.0.1', '2016-12-28 00:48:51', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-28 08:48:51', NULL, NULL),
	('e7b918ca859a46bcbb3aa0c868da50ea', '', '127.0.0.1', '2016-12-05 01:23:08', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 09:23:08', NULL, NULL),
	('ecdbae7a534e429d9371f2afcacfd775', '', '10.0.2.2', '2016-11-29 22:15:03', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-30 06:15:03', NULL, NULL),
	('ed0667418d01495b896d0ae7555ced20', '', '127.0.0.1', '2018-10-07 03:23:12', 'Chrome', '69.0.3497.100', 'AndroidOS', '8.0.0', '2018-10-07 11:23:12', NULL, NULL),
	('ed3fb258705b42018c437c8b912ade95', '', '127.0.0.1', '2016-11-24 12:40:27', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 20:40:28', NULL, NULL),
	('ef236726e4604e49a6e7457bdb62b0c9', '', '127.0.0.1', '2016-12-08 02:09:43', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-08 10:09:43', NULL, NULL),
	('ef4f3bd833e7402e8cc5d1c4f391c069', '', '127.0.0.1', '2018-10-07 04:29:00', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-07 12:29:00', NULL, NULL),
	('f18bed165e794e57b261510647c6c296', '', '127.0.0.1', '2016-11-25 09:53:12', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-25 17:53:12', NULL, NULL),
	('f2fee52f99324193946315cbf84f7b3b', '', '::1', '2017-01-03 07:01:34', 'Chrome', '53.0.2785.143', 'Windows', '6.1', '2017-01-03 15:01:34', NULL, NULL),
	('f55204edfced49afb89eda6f4e516604', '', '127.0.0.1', '2018-10-03 06:31:04', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-03 14:31:04', NULL, NULL),
	('f5d68dd2f17a4e66a021ee9f70f9e988', '', '127.0.0.1', '2016-12-26 03:40:10', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-26 11:40:10', NULL, NULL),
	('f696634e212247f98a450fcfd4723a25', '', '127.0.0.1', '2016-12-22 01:22:44', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2016-12-22 09:22:44', NULL, NULL),
	('f7c3fad686cf44a18b98ced6831a5aca', '', '127.0.0.1', '2016-11-27 01:25:06', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-27 09:25:06', NULL, NULL),
	('f8ccf5ff24664c8485e81358aa7a0ea4', '', '127.0.0.1', '2017-01-05 08:23:01', 'Chrome', '55.0.2883.87', 'Windows', '10.0', '2017-01-05 16:23:01', NULL, NULL),
	('fb0d53cd70874a82bb480c991eac7f96', '', '127.0.0.1', '2018-10-07 03:27:02', 'Chrome', '69.0.3497.100', 'AndroidOS', '8.0.0', '2018-10-07 11:27:02', NULL, NULL),
	('fb9b7c1489f14b0c9bbd80ea2abe83ae', '', '127.0.0.1', '2016-11-24 14:52:37', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-11-24 22:52:37', NULL, NULL),
	('fbcf32786245410ba94414fb14176ef7', '', '127.0.0.1', '2016-12-05 00:21:15', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-05 08:21:15', NULL, NULL),
	('fce2136117584490befe3823056bb094', '', '127.0.0.1', '2016-12-01 08:01:15', 'Chrome', '54.0.2840.99', 'Windows', '10.0', '2016-12-01 16:01:15', NULL, NULL),
	('fe40ed79b4304ab0a31589a8fdc71c25', '', '127.0.0.1', '2018-10-07 01:15:36', 'Chrome', '69.0.3497.100', 'Windows', '10.0', '2018-10-07 09:15:36', NULL, NULL);
/*!40000 ALTER TABLE `login_log` ENABLE KEYS */;

-- Dumping structure for table tadika.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table tadika.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tadika.notification
DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) DEFAULT NULL,
  `id_parents` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.notification: ~0 rows (approximately)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Dumping structure for table tadika.organization
DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL COMMENT 'Jenis organizasi, samada tadika atau pusat tuisyen, dll',
  `own_by` varchar(100) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `tel_mobile` varchar(20) DEFAULT NULL,
  `tel_office` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.organization: ~4 rows (approximately)
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` (`id`, `organization_name`, `type`, `own_by`, `address_1`, `address_2`, `city`, `postcode`, `state`, `country`, `tel_mobile`, `tel_office`, `email`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Pusat Tuisyen Berjaya', 'Pusat Tuisyen', 'Naadiyah binti Haris', 'No. 52 Jalan PH 10', 'Saffron, Puteri Heights', 'Rawang', '48000', 'Selangor', 'Malaysia', '0134888888', '0361811111', 'naadharis@gmail.com', 'bookmark.png', '2017-01-05 13:05:22', '2016-12-14 02:44:31', NULL),
	(2, 'Tadika Amee', 'Tadika', 'Aminah binti Ali', 'No. 106, Jalan Amzil 1', 'Taman', 'Gombak', '68100', 'Kuala Lumpur', 'Malaysia', '0177777772', '0177777717', 'try@gmail.comm', NULL, '2016-12-14 15:13:35', '2016-12-14 07:13:35', NULL),
	(3, 'Pusat Jagaan Melenie Lee', 'Pusat Jagaan Bayi', 'Melenie Daniel Lee', 'No. 5, Jalan Maluri 2/B', 'Taman Melati', 'Gombak', '68100', 'Kuala Lumpur', 'Malaysia', '0121234567', '0325898989', 'pjbayi@gmail.comm', NULL, '2016-12-26 16:20:27', '2016-12-26 08:20:27', NULL),
	(6, 'Pusat Jagaan Melenie Lee', 'Pusat Jagaan Bayi', 'Melenie Daniel Lee', 'No. 5, Jalan Maluri 2/B', 'Taman Melati', 'Gombak', '68100', 'Kuala Lumpur', 'Malaysia', '0121234567', '0325898989', 'pjbayi@gmail.comm', 'pizzaricos.jpg', '2017-01-05 05:07:21', '2017-01-05 05:07:21', NULL);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;

-- Dumping structure for table tadika.organization_branch
DROP TABLE IF EXISTS `organization_branch`;
CREATE TABLE IF NOT EXISTS `organization_branch` (
  `organization_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.organization_branch: ~4 rows (approximately)
/*!40000 ALTER TABLE `organization_branch` DISABLE KEYS */;
INSERT INTO `organization_branch` (`organization_id`, `branch_id`) VALUES
	(1, 12),
	(1, 13),
	(2, 14),
	(3, 19);
/*!40000 ALTER TABLE `organization_branch` ENABLE KEYS */;

-- Dumping structure for table tadika.owner
DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) DEFAULT NULL,
  `no_ic` varchar(13) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `tel_mobile` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `organization_name` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `purchased_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.owner: ~3 rows (approximately)
/*!40000 ALTER TABLE `owner` DISABLE KEYS */;
INSERT INTO `owner` (`id`, `full_name`, `no_ic`, `dob`, `age`, `gender`, `religion`, `address_1`, `address_2`, `city`, `postcode`, `state`, `country`, `nationality`, `tel_mobile`, `email`, `marital_status`, `role`, `organization_name`, `image`, `created_at`, `updated_at`, `deleted_at`, `purchased_date`) VALUES
	(130, 'Naadiyah binti Haris', '940418111111', '1994-04-18', NULL, 'Perempuan', 'Buddha', 'L17-C Kolej Tun Hussein Onn', 'Universiti Teknologi Malaysia', 'Skudai', 38000, 'Johor Bahru', 'Malaysia', 'Malaysia', '0134880418', 'naadiyahharis@gmail.com', 'Berkahwin', 'Pemilik', 'Pusat Tuisyen Berjaya', 'sunny-big.jpg', '2016-12-14 10:15:55', '2017-01-05 04:10:45', NULL, '2016-12-03'),
	(131, 'Aminah binti Ali', '890210105554', '1994-08-30', NULL, 'Perempuan', 'Buddha', 'No. 106, Jalan Amzil 1', 'Taman Melewar', 'Gombak', 68100, 'Kuala Lumpur', 'Malaysia', 'Malaysia', '0177777771', 'ciknana@gmail.com', 'Lain-lain', 'Pemilik', 'Tadika Amee', 'demo.png', '2016-12-29 11:13:25', '2017-01-05 13:00:44', NULL, '2016-12-03'),
	(133, 'Melenie Daniel Lee', '841230145522', '1984-12-30', NULL, 'Perempuan', 'Buddha', 'No. 5, Jalan Maluri 2/B', 'Taman Melati', 'Gombak', 68100, 'Kuala Lumpur', 'Malaysia', 'Filipino', '0121234567', 'melenie@gmail.commm', 'Bujang', 'Pemilik', 'Pusat Jagaan Bayi', 'demo.png', '2016-12-14 16:21:10', '2017-01-05 13:00:44', NULL, '2016-12-13');
/*!40000 ALTER TABLE `owner` ENABLE KEYS */;

-- Dumping structure for table tadika.owner_organization
DROP TABLE IF EXISTS `owner_organization`;
CREATE TABLE IF NOT EXISTS `owner_organization` (
  `owner_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.owner_organization: ~3 rows (approximately)
/*!40000 ALTER TABLE `owner_organization` DISABLE KEYS */;
INSERT INTO `owner_organization` (`owner_id`, `organization_id`) VALUES
	(130, 1),
	(131, 2),
	(133, 3);
/*!40000 ALTER TABLE `owner_organization` ENABLE KEYS */;

-- Dumping structure for table tadika.package
DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `limit_student` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.package: ~4 rows (approximately)
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` (`id`, `name`, `description`, `price`, `limit_student`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'B', 'Pakej untuk pelajar umur 4 tahun. Subjek Basic (BM, BI)', 499.53, 30, '2016-12-22 10:44:46', '2016-12-22 10:07:00', NULL),
	(4, 'A', 'Pakej untuk pelajar umur 6 tahun', 545.9, 28, '2016-12-07 02:23:28', '2016-12-07 02:23:28', NULL),
	(5, 'C', 'Baby Daycare.', 350.9, 10, '2016-12-07 04:48:12', '2016-12-07 04:48:12', NULL),
	(12, 'Tuisyen Insentif', 'Tuisyen untuk pelajar SPM setiap hari Jumaat dan Sabtu malam', 254.9, 30, '2017-01-02 07:53:59', '2017-01-02 07:53:59', NULL);
/*!40000 ALTER TABLE `package` ENABLE KEYS */;

-- Dumping structure for table tadika.package_subject
DROP TABLE IF EXISTS `package_subject`;
CREATE TABLE IF NOT EXISTS `package_subject` (
  `package_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.package_subject: ~21 rows (approximately)
/*!40000 ALTER TABLE `package_subject` DISABLE KEYS */;
INSERT INTO `package_subject` (`package_id`, `subject_id`) VALUES
	(1, 1),
	(1, 5),
	(4, 1),
	(4, 5),
	(4, 11),
	(5, 13),
	(5, 14),
	(9, 1),
	(9, 15),
	(10, 12),
	(10, 14),
	(10, 15),
	(10, 17),
	(7, 2),
	(7, 6),
	(11, 17),
	(11, 2),
	(12, 5),
	(12, 1),
	(12, 17),
	(12, 18);
/*!40000 ALTER TABLE `package_subject` ENABLE KEYS */;

-- Dumping structure for table tadika.parents
DROP TABLE IF EXISTS `parents`;
CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `ic_father` int(12) DEFAULT NULL,
  `occupation_f` varchar(50) DEFAULT NULL,
  `salary_f` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `tel_mobile_1` int(20) DEFAULT NULL,
  `tel_home` varchar(100) DEFAULT NULL,
  `email_1` varchar(100) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `ic_mother` varchar(50) DEFAULT NULL,
  `occupation_m` varchar(50) DEFAULT NULL,
  `salary_m` varchar(50) DEFAULT NULL,
  `tel_mobile_2` varchar(100) DEFAULT NULL,
  `email_2` varchar(100) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.parents: ~1 rows (approximately)
/*!40000 ALTER TABLE `parents` DISABLE KEYS */;
INSERT INTO `parents` (`id`, `father_name`, `ic_father`, `occupation_f`, `salary_f`, `nationality`, `tel_mobile_1`, `tel_home`, `email_1`, `mother_name`, `ic_mother`, `occupation_m`, `salary_m`, `tel_mobile_2`, `email_2`, `address_1`, `address_2`, `postcode`, `city`, `state`, `country`, `relationship`, `created_at`, `deleted_at`, `updated_at`) VALUES
	(11, 'Daeng Naqib', 2147483647, 'PA', '1500', 'malaysia', 1234567890, '067895422', 'njh@gmail.com', 'Saadah', '123456789123', 'suri rumah', '-', '01236547895', '-', 'No. 90, Jalan Pulasam 30', 'Taman kKota Masai', 81700, 'Johor Bahru', 'Johor', 'Malaysia', 'Bapa', '2016-12-20 12:33:37', NULL, NULL);
/*!40000 ALTER TABLE `parents` ENABLE KEYS */;

-- Dumping structure for table tadika.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table tadika.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tadika.staff
DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) DEFAULT NULL,
  `no_ic` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `address_1` varchar(100) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `tel_mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `no_account` varchar(30) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.staff: ~6 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `full_name`, `no_ic`, `dob`, `gender`, `religion`, `address_1`, `address_2`, `city`, `postcode`, `state`, `country`, `nationality`, `tel_mobile`, `email`, `marital_status`, `salary`, `no_account`, `bank_name`, `role`, `branch_name`, `class_name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(128, 'Naadiyah binti Haris', '940418105572', '1994-04-18', 'Perempuan', 'Buddha', 'L17-C Kolej Tun Hussein Onn', 'Universiti Teknologi Malaysia', 'Skudai', 38000, 'Johor Bahru', 'Malaysia', 'Malaysia', '0134880418', 'naadiyahharis@gmail.com', 'Berkahwin', 2300, '7015528462', 'CIMB', 'Kerani', 'Pusat Tuisyen Berjaya Johor Jaya', 'Tiada', 'demo.png', '2016-12-29 14:09:40', '2017-01-05 14:57:13', NULL),
	(131, 'Nurul Atieqah Binti Zulyadin', '951217015572', '1995-12-17', 'Perempuan', 'Buddha', 'No 1023 Blok 2', 'Felda Lok Heng Timur', 'Kota TInggi', 38000, 'Johor', 'Malaysia', 'Malaysia', '0134888888', 'try@gmail.comm', '', 1590, '7015528462', 'CIMB', 'Cikgu', 'Pusat Tuisyen Berjaya Johor Jaya', '4 Nuri', 'demo.png', '2016-12-11 16:16:10', '2017-01-05 14:57:13', NULL),
	(132, 'Daniel Lee', '940830011111', '1994-08-30', 'Lelaki', 'Kristian', 'No. 52 Jalan Anggerik 2', 'Taman Renald', 'Ampang', 68100, 'negeri', 'Malaysia', 'Malaysia', '0134888888', 'danieltry@gmail.comm', 'Bujang', 2300, '7015528462', 'CIMB', 'Kerani', 'Pusat Tuisyen Berjaya Ampang', 'Tiada', 'demo.png', '2016-12-11 08:20:10', '2017-01-05 14:57:13', NULL),
	(133, 'Melissa Melanie a/p Raweng', '940101025566', '1994-01-01', 'Perempuan', 'Kristian', 'Blok B - 223, Apartment Cecilia', 'Jalan AU2', 'Keramat', 68100, 'Kuala Lumpur', 'Malaysia', 'Malaysia', '0134888888', 'meltry@gmail.comm', 'Lain-lain', 2300, '14562298965262', 'MAYBANK', 'Cikgu', 'Pusat Tuisyen Berjaya Keramat', '4 Helang', 'demo.png', '2016-12-11 08:25:11', '2017-01-05 14:57:13', NULL),
	(134, 'Anbuselvan a/l Ramanan', '911217145551', '1991-12-17', 'Lelaki', 'Buddha', 'No. 11, Jalan Batu 2', 'Taman Gombak', 'Batu Caves', 68100, 'Kuala Lumpur', 'Malaysia', 'Malaysia', '0134567891', 'antry@gmail.comm', 'Berkahwin', 1580, '701254869966', 'CIMB', 'Kerani', 'Pusat Tuisyen Berjaya Keramat', 'Tiada', 'pizzaricos.jpg', '2016-12-29 14:06:57', '2017-01-05 07:01:53', NULL),
	(137, 'Siti Nuraisyah binti Ahmad', '940516145572', '1994-06-15', 'Perempuan', 'Buddha', 'No. 106, Jalan Amzil 1', 'Taman Melewar', 'Gombak', 68100, 'Kuala Lumpur', 'Malaysia', 'Malaysia', '0134880418', 'aisyahtry@gmail.comm', 'Bujang', 1700, '7015528462', 'CIMB', 'Sambilan', 'Pusat Jagaan Bayi Melmel', 'Tiada', '', '2016-12-29 14:11:38', '2016-12-29 06:12:13', NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table tadika.stock
DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_name` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.stock: ~4 rows (approximately)
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`, `stock_name`, `description`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(13, 'Uniform', 'Uniform tahun 5', 30.5, 50, '2017-01-03 15:41:22', '2017-01-03 07:41:22', NULL),
	(14, 'alat tulis', 'kegunaan pelajar', 1.5, 100, '2018-10-07 11:10:54', '2018-10-07 03:10:54', NULL),
	(15, 'Pensel warna', 'untuk budak tahun 3', 5.5, 30, '2017-01-03 16:01:47', '2017-01-03 08:01:47', NULL),
	(16, 'Mainan', 'kegunaan guru', 15, 100, '2018-10-07 03:11:24', '2018-10-07 03:11:24', NULL);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- Dumping structure for table tadika.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `classroom` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `mykid` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthplace` varchar(50) DEFAULT NULL,
  `race` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.student: ~6 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `full_name`, `classroom`, `package`, `mykid`, `dob`, `gender`, `birthplace`, `race`, `religion`, `nationality`, `reg_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Mazlin binti Hamid', 'Bahasa Cina', 'Aulad', '123123123', '2016-09-03', 'Perempuan', 'HSA', 'Melayu', 'Islam', 'Malaysian', NULL, '2017-01-02 15:43:16', '2017-01-01 03:21:18', NULL),
	(2, 'Acap Bin Aizat', '', 'Nuri', '971217093343', '2000-05-30', NULL, 'HTAA', 'India', 'Buddha', 'Malaysia', NULL, '2018-10-03 10:49:29', '2018-10-03 02:49:29', NULL),
	(3, 'Nurfaziana binti Saifulamri', 'Bahasa Melayu 3', 'Nuri', '941024015894', '2000-10-24', 'Perempuan', 'HSA JB', 'Melayu', 'Islam', 'Malaysia', NULL, '2017-01-04 14:12:16', '2017-01-04 06:12:16', NULL),
	(5, 'Siti Khairunnada binti Mohamood', 'Bahasa Cina', 'Aulad', '940109145888', '2017-01-09', 'Perempuan', 'Kuala Lumpur', 'Cina', 'Islam', 'Malaysia', NULL, '2017-01-02 15:42:56', '2017-01-01 04:24:00', NULL),
	(6, 'Nurul Amalina binti Mohd Faiz', 'Bahasa Inggeris', 'Nuri', '941216154896', '2017-01-16', 'Perempuan', 'Seremban', 'Cina', 'Hindu', 'Malaysia', NULL, '2017-01-02 15:43:08', '2017-01-01 04:25:38', NULL),
	(7, 'Ini Cobaan', 'Bahasa Cina', 'Helang', '234256625141', '2013-02-07', 'Perempuan', 'inderapura', 'Lain-lain', 'Kristian', 'Malaysia', NULL, '2018-10-07 04:20:23', '2018-10-07 04:20:23', NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table tadika.student_guardian
DROP TABLE IF EXISTS `student_guardian`;
CREATE TABLE IF NOT EXISTS `student_guardian` (
  `student_id` int(11) NOT NULL,
  `parents_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.student_guardian: ~3 rows (approximately)
/*!40000 ALTER TABLE `student_guardian` DISABLE KEYS */;
INSERT INTO `student_guardian` (`student_id`, `parents_id`) VALUES
	(3, 11),
	(5, 12),
	(6, 8);
/*!40000 ALTER TABLE `student_guardian` ENABLE KEYS */;

-- Dumping structure for table tadika.subject
DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `type_subject` varchar(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table tadika.subject: ~12 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`id`, `code`, `name`, `description`, `type_subject`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'BM04', 'Bahasa Melayu', 'Subjek Bahasa Melayu\r\n(Buku Teks, Buku Latihan dan 2 Buku Cerita)', 'Basic', 0, '2016-11-30 10:00:00', '2016-12-29 16:15:03', NULL),
	(2, 'D01R', 'Renang', 'Belajar renang dua hari seminggu setiap pagi. \r\n(Pelajar boleh membeli pakaian renang pada kerani semasa mengambil stok).', 'Add-On', 25.95, '2016-12-07 04:31:13', '2016-12-08 03:17:30', NULL),
	(5, 'BI04', 'Bahasa Inggeris', 'Subjek Bahasa Inggeris (Buku Latihan dan 2 Buku Cerita) fghfgh', 'Basic', 0, '2016-12-07 04:33:45', '2016-12-29 08:59:50', NULL),
	(6, 'S0A', 'Seni Lukis', 'Subjek seni lukis.\r\n\r\n*Peralatan seni lukis disediakan, sila serahkan pada penjaga bersama stok lain semasa daftar pelajar.', 'Add-On', 7.91, '2016-12-07 04:34:46', '2016-12-22 10:42:52', NULL),
	(11, 'JA01', 'Jawi', 'Subjek Jawi (Buku Cerita 2 dan Buku Latihan 3)', 'Basic', 0, '2016-12-29 08:40:48', '2016-12-29 09:04:04', NULL),
	(12, 'KR01', 'Kraf Tangan', 'Subjek ini untuk kelas kraf tangan (Bahan Kraf disediakan, Sila ambil semasa serah stok)', 'Add-On', 20.5, '2016-12-29 10:31:39', '2016-12-29 10:31:55', NULL),
	(13, 'FD01', 'Makan Pagi', 'penyedian sarapan setiap hari', 'Basic', 0, '2016-12-29 15:55:15', '2017-01-02 07:13:03', NULL),
	(14, 'FD02', 'Makan Petang', 'Penyediaan kudapan petang setiap hari', 'Add-On', 55.95, '2016-12-29 15:56:36', '2016-12-29 15:57:01', NULL),
	(15, 'MN', 'Mandi & Tidur', 'Peralatan mandi dan penyediaan tempat tidur', 'Add-On', 10.5, '2017-01-01 06:41:46', '2017-01-01 06:41:46', NULL),
	(16, 'Q01', 'Iqra\'', 'Belajar', 'Basic', 0, '2017-01-01 06:42:35', '2017-01-01 06:42:35', NULL),
	(17, 'MT01', 'Matematik', 'Subjek Matematik (2 Buku Latihan bewarna)', 'Basic', 0, '2017-01-01 06:43:10', '2017-01-01 06:43:10', NULL),
	(18, 'SC01', 'Sains', 'Subjek Sains (Basic Sains)', 'Basic', 0, '2017-01-01 06:44:38', '2017-01-01 06:44:38', NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- Dumping structure for table tadika.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table tadika.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
