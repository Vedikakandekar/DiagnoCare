-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 04:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `pathalogy_login`
--

CREATE TABLE `pathalogy_login` (
  `patho_id` int(11) NOT NULL,
  `patho_name` varchar(50) NOT NULL,
  `patho_emailid` varchar(50) NOT NULL,
  `patho_password` varchar(50) NOT NULL,
  `patho_phno` int(10) NOT NULL,
  `patho_addr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pathalogy_login`
--

INSERT INTO `pathalogy_login` (`patho_id`, `patho_name`, `patho_emailid`, `patho_password`, `patho_phno`, `patho_addr`) VALUES
(1, 'swami', 'hritikakoli08@gmail.com', 'sm', 0, 'qwert'),
(2, 'Vision', 'arpitakoli08@gmail.com', 'aa', 1698745632, 'pune'),
(3, 'hritika', 'hritika8@gmail.com', 'pp', 0, 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `patho_id` int(30) NOT NULL,
  `patho_name` varchar(50) NOT NULL,
  `test_id` int(10) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_cost` int(30) NOT NULL,
  `test_instructions` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'hritika', 30, 'Complete body checkup', 500000, 'Please drink plenty of water before test');

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment`
--

CREATE TABLE `user_appointment` (
  `appointment_id` int(230) NOT NULL,
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
  `payment_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_appointment`
--

INSERT INTO `user_appointment` (`appointment_id`, `test_id`, `test_name`, `test_cost`, `date`, `time`, `patho_id`, `patho_name`, `user_id`, `firstname`, `lastname`, `emailid`, `payment_status`) VALUES
(37, 3, 'Sonography', 322, '2023-02-14', '11:45:00.000000', 3, 'swami', 1, 'ram', 'bunny', 'hritikakoli08@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `firstname`, `middlename`, `lastname`, `gender`, `emailid`, `password`, `phno`) VALUES
(1, 'ram', 'sunny', 'bunny', 'male', 'hritikakoli08@gmail.com', 'hh', 2147483647),
(2, 'arpita', 'c', 'koli', 'female', 'arpita8@gmail.com', 'aa', 1154369875),
(3, 'lokesh', 'm', 'pachgadhe', 'male', 'lokesh08@gmail.com', 'll', 154789635);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pathalogy_login`
--
ALTER TABLE `pathalogy_login`
  ADD PRIMARY KEY (`patho_id`),
  ADD KEY `patho_name` (`patho_name`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `patho_name` (`patho_name`,`patho_id`),
  ADD KEY `patho_id` (`patho_id`);

--
-- Indexes for table `user_appointment`
--
ALTER TABLE `user_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pathalogy_login`
--
ALTER TABLE `pathalogy_login`
  MODIFY `patho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_details`
--
ALTER TABLE `test_details`
  MODIFY `test_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_appointment`
--
ALTER TABLE `user_appointment`
  MODIFY `appointment_id` int(230) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
