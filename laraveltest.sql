-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2019 at 03:25 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.13-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveltest`
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `created_at`, `updated_at`) VALUES
(19, 'asdfasdf', '2019-01-25 04:21:38', '2019-01-25 04:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`id`, `item_id`, `filename`, `created_at`, `updated_at`) VALUES
(15, 19, 'photos/L3oEv5IRzLNoDxHpI1UzB6JIEhAai1xLBsuz2C2D.png', '2019-01-25 04:21:38', '2019-01-25 04:21:38');

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
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
