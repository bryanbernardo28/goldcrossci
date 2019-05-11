-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 02:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `account_access` tinyint(1) NOT NULL,
  `registered_at` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password_code` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `firstname`, `lastname`, `username`, `address`, `age`, `gender`, `password`, `status`, `account_access`, `registered_at`, `email`, `verification_code`, `is_verified`, `password_code`, `image`) VALUES
(73, 'Bryan', 'Bernardo', 'boyetbernardo', 'Quezon City', 21, 1, '38d0f91a99c57d189416439ce377ccdcd92639d0', 1, 1, 1542378178, 'boyetbernardo@gmail.com', 'KjP4Ym', 1, '', 'default_avatar.png'),
(74, 'Alexander', 'Pierce', 'alexpierce', 'Quezon City', 24, 1, '38d0f91a99c57d189416439ce377ccdcd92639d0', 0, 2, 0, 'alexpierce@gmail.com', '', 1, '', NULL),
(75, 'John', 'Doe', 'janedoe', 'Manila', 22, 2, '38d0f91a99c57d189416439ce377ccdcd92639d0', 1, 3, 0, 'janedoe@gmail.com', '', 1, '', NULL),
(76, 'Airi ', 'Satou', 'airisatou', 'Pasig', 23, 1, '', 1, 1, 0, 'airisatou@gmail.com', '', 0, '', NULL),
(77, 'Lance', 'Bernardo', 'lancebernardo', 'Quezon City', 22, 1, '38d0f91a99c57d189416439ce377ccdcd92639d0', 1, 1, 0, 'Lancebernardo22@gmail.com', '', 1, 'TEYbAJ', NULL),
(78, 'James ', 'Huang', 'jameshuang', 'Pasig', 20, 1, '', 1, 1, 0, 'jameshuang@gmail.com', '', 0, '', NULL),
(79, 'Harvey', 'Ruaro', 'harveyruaro', 'Pasay', 20, 1, '', 1, 1, 0, 'harveyruaro@gmail.com', '', 0, '', NULL),
(80, 'Nicole', 'Legaspi', 'nicolelegaspi', 'Pasay', 23, 2, '', 1, 1, 0, 'nicolelegaspi@gmail.com', '', 0, '', NULL),
(81, 'Jenn', 'Roque', 'jennroque', 'Quezon City', 21, 2, '', 1, 2, 0, 'jennroque@gmail.com', '', 0, '', NULL),
(82, 'Kaye', 'Alcantara', 'kayealcantara', 'Cavite', 19, 2, '', 1, 2, 0, 'kayealcantara@gmail.com', '', 0, '', NULL),
(83, 'Clare', 'Pangan', 'clarepangan', 'Caloocan', 21, 2, '', 1, 2, 0, 'clarepangan@gmail.com', '', 0, '', NULL),
(86, 'Levin', 'Labao', 'Levin Labao', 'Quezon City', 21, 1, '', 1, 4, 0, 'Paullabao@gmail.com', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detachment`
--

CREATE TABLE `detachment` (
  `detachment_id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `detachment_date_added` int(11) NOT NULL,
  `detachment_date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(256) NOT NULL,
  `job_requirements` text NOT NULL,
  `job_vacancy` int(11) NOT NULL,
  `job_date_added` int(11) NOT NULL,
  `job_date_updated` int(11) NOT NULL,
  `job_posted` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`, `job_requirements`, `job_vacancy`, `job_date_added`, `job_date_updated`, `job_posted`) VALUES
(1, 'Licensed Lady Guards/cctv operations', 'Height : 5\'3 above; Atleast college level; confident and can speak english; With pleasing personality; Work experience not necessary but preferably attentive to details; Age rage bet 20-34 year old', 10, 1550389037, 1556179241, 1),
(2, 'sample', 'Sample,sample,sample', 2, 1550401173, 1551605625, 1),
(3, 'sample2', 'req1,req,req3,req4,req5', 1, 1550402295, 1550402295, 0),
(5, 'Teacher', 'BS', 2, 1551529688, 1551529688, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
