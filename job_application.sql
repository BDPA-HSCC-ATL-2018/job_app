-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 03:15 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) NOT NULL,
  `ssn` varchar(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `pri_phone` varchar(255) NOT NULL,
  `address_line_one` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_cd` varchar(255) NOT NULL,
  `postal_cd` varchar(255) NOT NULL,
  `agreement_sw` enum('Y','N') NOT NULL DEFAULT 'N',
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `first_name`, `middle_name`, `last_name`, `email_id`, `ssn`, `date_of_birth`, `pri_phone`, `address_line_one`, `city_name`, `state_cd`, `postal_cd`, `agreement_sw`, `lastmod`) VALUES
(1, 'John', 'Clark', 'Smith', 'test@gmail.com', '123-45-6789', '2018-03-02', '555-555-5555', '123 Wallaby Ln', 'Tucker', 'GA', '12345', 'N', '2018-07-27 18:40:46'),
(3, 'JHGVg', 'kJHG', 'KJnhb', 'kjhghg@gmail.com', '098765432', '2015-12-31', '0', '123 Wallaby Ln', 'Kjjn', 'Georgia', '23242', 'N', '2018-03-11 23:38:26'),
(4, 'Evan', '', 'Robin', 'kjhjb@gmail.com', '721892921', '2018-03-03', '111-111-1111', 'Australia', 'Bacon', 'GA', '39829', 'N', '2018-04-21 14:18:40'),
(5, 'John', 'Hank', 'Anderson', 'welcomeemail@gmail.com', '323-42-2421', '0000-00-00', '', '930 JNn', 'Tucker', 'GA', '23324', 'N', '2018-04-20 20:14:04'),
(6, 'Smith', 'Smithers', 'Smitherson', 'new_account@gmail.com', '928-32-2332', '0000-00-00', '', '0987 YYhb', 'BHjb', 'GA', '09843', 'N', '2018-04-20 20:18:14'),
(7, 'Ron', 'Derek', 'Blake', 'new@example.com', '123-45-6789', '2016-01-31', '123-456-7890', '123 Katydid Dr.', 'Decatur', 'Georgia', '54321', 'N', '2018-07-27 19:48:22'),
(8, 'Test', 'Test', 'Test', 'testing@example.com', '123-456-789', '2007-11-24', '123-456-7890', '123 Main St.', 'Norcross', 'Georgia', '32891', 'N', '2018-07-27 20:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `i_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `i_name` varchar(255) DEFAULT NULL,
  `i_start_date` varchar(255) DEFAULT NULL,
  `i_end_date` varchar(255) DEFAULT NULL,
  `i_type` varchar(255) NOT NULL,
  `i_grad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`i_id`, `applicant_id`, `i_name`, `i_start_date`, `i_end_date`, `i_type`, `i_grad_date`) VALUES
(1, 4, 'Georgia Tech', '2019-08-26', '2021-04-30', '4-Year', '2021-05-21'),
(2, 4, 'Stanford University', '2018-04-03', '2018-04-06', '4-Year', '2018-04-18'),
(3, 4, 'Howard University', '2016-10-01', '2017-01-02', '4-Year', '2017-01-02'),
(6, 1, 'Brandeis University', '2018-07-04', '2018-07-16', '4-Year', '2018-07-25'),
(8, 7, 'Brown University', '2001-09-28', '2005-03-19', '4-Year', '2005-05-12'),
(10, 7, 'Stanford University', '2018-07-04', '2018-07-14', '4-Year', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `e_name` varchar(255) DEFAULT NULL,
  `e_phone` varchar(14) DEFAULT NULL,
  `e_city` varchar(255) DEFAULT NULL,
  `e_state` varchar(255) DEFAULT NULL,
  `e_start_date` varchar(255) DEFAULT NULL,
  `e_end_date` varchar(255) DEFAULT NULL,
  `e_position` varchar(255) DEFAULT NULL,
  `e_description` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `applicant_id`, `e_name`, `e_phone`, `e_city`, `e_state`, `e_start_date`, `e_end_date`, `e_position`, `e_description`, `timestamp`) VALUES
(3, 4, 'IKEA', '123454321', 'Berlin', 'It', '2003-02-12', '2007-02-14', 'Shopper', 'Buying', '2018-04-21 14:25:09'),
(4, 4, 'El Goog', '1111111111', 'Mountain View', 'It', '1994', '2004', 'Software Engineer', 'Making things by typing', '2018-04-21 04:48:25'),
(5, 4, 'IBM', '1111111111', 'Los Angeles', 'It', '2010', '2004', 'Software Engineer', 'Making things by typing', '2018-04-21 14:29:18'),
(20, 1, 'Work Inc.', '123-456-7895', 'Tucker', 'Georgia', '2016-04-17', '2018-09-03', 'Employee', 'Working', '2018-07-27 18:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `FK_applicant_id_for_education` (`applicant_id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_applicant_id` (`applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `FK_applicant_id_for_education` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `FK_applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
