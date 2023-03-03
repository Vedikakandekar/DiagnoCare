-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2023 at 06:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `content` longblob,
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patho_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `type`, `size`, `content`, `appointment_id`, `user_id`, `patho_id`, `test_id`) VALUES
(36, 'demoReport4.txt', 'text/plain', 60, 0x686969200d0a746869732069732064656d6f207265706f727420340d0a66726f6d20706174686f6c6f6779206c61620d0a7468616e6b20796f750d0a, 4, 4, 1, 3),
(37, 'demoReport4.txt', 'text/plain', 60, 0x686969200d0a746869732069732064656d6f207265706f727420340d0a66726f6d20706174686f6c6f6779206c61620d0a7468616e6b20796f750d0a, 7, 5, 3, 24),
(38, 'demoReport4.txt', 'text/plain', 60, 0x686969200d0a746869732069732064656d6f207265706f727420340d0a66726f6d20706174686f6c6f6779206c61620d0a7468616e6b20796f750d0a, 9, 4, 1, 3),
(39, 'demoReport4.txt', 'text/plain', 60, 0x686969200d0a746869732069732064656d6f207265706f727420340d0a66726f6d20706174686f6c6f6779206c61620d0a7468616e6b20796f750d0a, 10, 6, 5, 36);

-- --------------------------------------------------------

--
-- Table structure for table `pathalogy_login`
--

DROP TABLE IF EXISTS `pathalogy_login`;
CREATE TABLE IF NOT EXISTS `pathalogy_login` (
  `patho_id` int(11) NOT NULL AUTO_INCREMENT,
  `patho_name` varchar(50) NOT NULL,
  `patho_emailid` varchar(50) NOT NULL,
  `patho_password` varchar(50) NOT NULL,
  `patho_phno` varchar(20) NOT NULL,
  `patho_addr` varchar(50) NOT NULL,
  PRIMARY KEY (`patho_id`),
  KEY `patho_name` (`patho_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathalogy_login`
--

INSERT INTO `pathalogy_login` (`patho_id`, `patho_name`, `patho_emailid`, `patho_password`, `patho_phno`, `patho_addr`) VALUES
(1, 'swami', 'hritikakoli08@gmail.com', 'sm', '8989898989', 'qwert'),
(2, 'Vision', 'arpitakoli08@gmail.com', 'aa', '1698745632', 'pune'),
(3, 'hritika', 'hritika8@gmail.com', 'pp', '0', 'pune'),
(4, 'ved Pharmacy', 'ved@gmail.com', 'ved', '123321', 'warje,pune'),
(5, 'Health is Wealth', 'wealth@gmail.com', 'health', '9898787897', 'kothrud');

-- --------------------------------------------------------

--
-- Table structure for table `path_appointments`
--

DROP TABLE IF EXISTS `path_appointments`;
CREATE TABLE IF NOT EXISTS `path_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `clientFname` varchar(20) NOT NULL,
  `clientLname` varchar(20) NOT NULL,
  `test_id` int(11) NOT NULL,
  `patho_id` int(11) NOT NULL,
  `patho_name` varchar(30) DEFAULT NULL,
  `client_addr` varchar(50) NOT NULL,
  `test_name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `user_id` int(10) NOT NULL,
  `usermail` varchar(30) NOT NULL,
  `test_progress` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `path_appointments`
--

INSERT INTO `path_appointments` (`appointment_id`, `clientFname`, `clientLname`, `test_id`, `patho_id`, `patho_name`, `client_addr`, `test_name`, `date`, `time`, `user_id`, `usermail`, `test_progress`) VALUES
(4, 'ved', 'k', 3, 1, 'swami', '', 'Sonography', '2023-03-02', '18:41:15.000000', 4, 'ved11@gmail.com', 'Report is Ready'),
(5, 'ved', 'k', 5, 2, 'Vision', '', 'Lipid Profile', '2023-03-02', '18:41:20.000000', 4, 'ved11@gmail.com', 'in progress'),
(6, 'ram', 'bunny', 3, 1, 'swami', '', 'Sonography', '2023-03-02', '18:57:34.000000', 1, 'hritikakoli08@gmail.com', 'Report is Ready'),
(7, 'raju', 'bogiwala', 24, 3, 'hritika', 'kothrud', 'Water Test', '2023-03-03', '08:36:44.000000', 5, 'bogiwala@gmail.com', 'Report is Ready'),
(8, 'raju', 'bogiwala', 3, 1, 'swami', 'hgh', 'Sonography', '2023-03-03', '09:55:53.000000', 5, 'bogiwala@gmail.com', 'Report is Ready'),
(9, 'ved', 'k', 3, 1, 'swami', 'pune', 'Sonography', '2023-03-03', '09:55:56.000000', 4, 'ved11@gmail.com', 'Report is Ready'),
(10, 'kaju', 'katali', 36, 5, 'Health is Wealth', 'warje,pune', 'Blood Count', '2023-03-03', '11:33:14.000000', 6, 'katali@gmail.com', 'Report is Ready');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

DROP TABLE IF EXISTS `test_details`;
CREATE TABLE IF NOT EXISTS `test_details` (
  `patho_id` int(30) NOT NULL,
  `patho_name` varchar(50) NOT NULL,
  `test_id` int(10) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(50) NOT NULL,
  `test_cost` int(30) NOT NULL,
  `test_instructions` varchar(60) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `patho_name` (`patho_name`,`patho_id`),
  KEY `patho_id` (`patho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`patho_id`, `patho_name`, `test_id`, `test_name`, `test_cost`, `test_instructions`) VALUES
(1, 'swami', 3, 'Sonography', 322, 'Enter Instructions of Test ...'),
(1, 'swami', 4, 'Blood Culture', 0, ''),
(2, 'Vision', 5, 'Lipid Profile', 100, ''),
(2, 'swami', 6, 'Thyroid Function Test', 0, ''),
(1, 'swami', 7, 'Fasting Blood Sugar (FBS)', 0, ''),
(1, 'swami', 8, 'HbA1C', 0, ''),
(1, 'swami', 9, 'Stool Culture', 0, ''),
(2, 'Vision', 10, 'Urine Culture', 0, ''),
(1, 'swami', 11, 'PSA (Prostate-Specific Antigen) ', 0, ''),
(3, 'hritika', 24, 'Water Test', 200, 'Enter Instructions of Test ...'),
(3, 'hritika', 26, 'Superman', 54545, 'Enter Instructions of Test ...'),
(3, 'hritika', 28, 'sd', 9000, 'Enter Instructions of Test ...'),
(3, 'hritika', 29, 'xx', 966222, 'dont drink water'),
(3, 'hritika', 30, 'Complete body checkup', 500000, 'Please drink plenty of water before test'),
(4, 'ved Pharmacy', 31, 'abc', 123, 'Enter Instructions of Test ...'),
(4, 'ved Pharmacy', 32, 'xyz', 345, 'Enter Instructions of Test ...'),
(1, 'swami', 34, 'Demo1', 123, 'Enter Instructions of Test ...123\r\n123\r\n123'),
(1, 'swami', 35, 'demo', 1567, 'Enter Instructions of Test ...'),
(5, 'Health is Wealth', 36, 'Blood Count', 675, 'Enter Instructions of Test ...\r\nN/A'),
(5, 'Health is Wealth', 37, 'Blood Typing', 453, 'Enter Instructions of Test ...'),
(5, 'Health is Wealth', 38, 'Enzyme Analysis', 543, 'Enter Instructions of Test ...');

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment`
--

DROP TABLE IF EXISTS `user_appointment`;
CREATE TABLE IF NOT EXISTS `user_appointment` (
  `appointment_id` int(230) NOT NULL AUTO_INCREMENT,
  `test_id` int(230) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_cost` int(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `patho_id` int(230) NOT NULL,
  `patho_name` varchar(230) NOT NULL,
  `user_id` int(230) NOT NULL,
  `firstname` varchar(230) NOT NULL,
  `lastname` varchar(230) NOT NULL,
  `emailid` varchar(230) NOT NULL,
  `address` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL DEFAULT 'paid',
  `acceptance_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointment`
--

INSERT INTO `user_appointment` (`appointment_id`, `test_id`, `test_name`, `test_cost`, `date`, `time`, `patho_id`, `patho_name`, `user_id`, `firstname`, `lastname`, `emailid`, `address`, `payment_status`, `acceptance_status`) VALUES
(37, 3, 'Sonography', 322, '2023-02-14', '11:45:00.000000', 1, 'swami', 1, 'ram', 'bunny', 'hritikakoli08@gmail.com', '', '', 'yes'),
(38, 3, 'Sonography', 322, '2023-02-24', '16:16:00.000000', 1, 'swami', 4, 'ved', 'k', 'ved11@gmail.com', '', 'paid', 'yes'),
(39, 5, 'Lipid Profile', 100, '2023-02-21', '16:10:00.000000', 2, 'Vision', 4, 'ved', 'k', 'ved11@gmail.com', '', 'paid', 'yes'),
(40, 24, 'Water Test', 200, '2023-03-15', '17:03:00.000000', 3, 'hritika', 5, 'raju', 'bogiwala', 'bogiwala@gmail.com', 'kothrud', 'paid', 'yes'),
(41, 7, 'Fasting Blood Sugar (FBS)', 0, '2023-03-16', '11:11:00.000000', 1, 'swami', 5, 'raju', 'bogiwala', 'bogiwala@gmail.com', 'shivajinagar', 'paid', 'yes'),
(42, 11, 'PSA (Prostate-Specific Antigen) ', 0, '2023-03-16', '11:14:00.000000', 1, 'swami', 6, 'kaju', 'katali', 'katali@gmail.com', 'delhi gate', 'paid', NULL),
(43, 10, 'Urine Culture', 0, '2023-03-15', '12:14:00.000000', 2, 'Vision', 6, 'kaju', 'katali', 'katali@gmail.com', 'manapa', 'paid', NULL),
(44, 3, 'Sonography', 322, '2023-03-24', '10:24:00.000000', 1, 'swami', 5, 'raju', 'bogiwala', 'bogiwala@gmail.com', 'hgh', 'paid', 'yes'),
(45, 3, 'Sonography', 322, '2023-03-30', '11:34:00.000000', 1, 'swami', 4, 'ved', 'k', 'ved11@gmail.com', 'pune', 'paid', 'yes'),
(46, 32, 'xyz', 345, '2023-03-15', '14:51:00.000000', 4, 'ved Pharmacy', 5, 'raju', 'bogiwala', 'bogiwala@gmail.com', 'aurangabad', 'paid', NULL),
(47, 36, 'Blood Count', 675, '2023-03-16', '14:28:00.000000', 5, 'Health is Wealth', 6, 'kaju', 'katali', 'katali@gmail.com', 'warje,pune', 'paid', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `addr` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `firstname`, `middlename`, `lastname`, `emailid`, `password`, `phno`, `addr`) VALUES
(1, 'ram', 'sunny', 'bunny', 'hritikakoli08@gmail.com', 'hh', '2147483647', ''),
(2, 'arpita', 'c', 'koli', 'arpita8@gmail.com', 'aa', '1154369875', ''),
(3, 'lokesh', 'm', 'pachgadhe', 'lokesh08@gmail.com', 'll', '154789635', ''),
(4, 'ved', 'g', 'k', 'ved11@gmail.com', 'ved', '123321', 'manapa'),
(5, 'raju', 'rajat', 'bogiwala', 'bogiwala@gmail.com', 'raju', '9879877897', 'kothrud'),
(6, 'kaju', 'anjir', 'katali', 'katali@gmail.com', 'kaju', '9878798979', 'swargate');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test_details`
--
ALTER TABLE `test_details`
  ADD CONSTRAINT `test_details_ibfk_1` FOREIGN KEY (`patho_id`) REFERENCES `pathalogy_login` (`patho_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_details_ibfk_2` FOREIGN KEY (`patho_name`) REFERENCES `pathalogy_login` (`patho_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
