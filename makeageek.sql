-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 06:10 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeageek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(121) NOT NULL,
  `ad_password` varchar(250) NOT NULL,
  `user_email` varchar(121) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_password`, `user_email`, `user_type`, `user_registered`) VALUES
(1, 'dev', 'e10adc3949ba59abbe56e057f20f883e', 'amit@gmail.com', 1000, '2016-05-05 14:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(1000) NOT NULL,
  `school_email` varchar(1000) NOT NULL,
  `school_code` varchar(1000) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'images/apple-icon-precomposed.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `school_email`, `school_code`, `logo`) VALUES
(4, 'Pathways International School, Gurgaon', 'Pathways International School, Gurgaon', 'make1623', '/images/school_images/image.php'),
(3, 'Vasant Valley School, New Delhi', 'info@makeageek.com', 'make9498', 'images/school_images/logo_vasant_valley_school.jpg'),
(5, 'DPS - Sushant Lok I, Gurgaon', 'info@makeageek.com', 'make9601', 'images/apple-icon-precomposed.png'),
(6, 'DPS - Sector 45, Gurgaon', 'info@makeageek.com', 'make8178', 'images/apple-icon-precomposed.png'),
(9, 'My school is not in this list ', 'info@makeageek.com', 'make4307', 'images/apple-icon-precomposed.png'),
(10, 'makeageek', 'info@makeageek.com', 'make7448', 'images/apple-icon-precomposed.png'),
(11, 'Kunskapsskolan', 'sabreenatalwar@kunskapsskolan.edu.in', 'make0617', 'images/apple-icon-precomposed.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
