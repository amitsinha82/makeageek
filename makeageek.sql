-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 06:37 AM
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
-- Table structure for table `classname`
--

CREATE TABLE `classname` (
  `classid` int(11) NOT NULL,
  `classname` int(11) NOT NULL,
  `subctFKid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classname`
--

INSERT INTO `classname` (`classid`, `classname`, `subctFKid`) VALUES
(19, 9, 5),
(25, 6, 5),
(28, 10, 5),
(33, 8, 5),
(34, 7, 5),
(35, 11, 5),
(36, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(1000) NOT NULL,
  `school_email` varchar(1000) NOT NULL,
  `school_code` varchar(1000) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'images/apple-icon-precomposed.png',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `school_email`, `school_code`, `logo`, `updated_at`, `created_at`) VALUES
(20, 'vidya bharti public school', 'vidya@gmail.com', 'make0506', 's931548768653.png', '2019-01-31 11:30:34', '2019-01-31 11:30:34'),
(21, '+2 high school rahika', 'rahika@gmail.com', 'make6150', 's421548940465.png', '2019-01-31 18:44:25', '2019-01-31 18:44:25'),
(22, '+2 high school rajnagar', 'rajnagar@gmail.com', 'make1161', 's911548940503.png', '2019-01-31 18:45:03', '2019-01-31 18:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcat`
--

CREATE TABLE `subjectcat` (
  `subjcatid` int(11) NOT NULL,
  `subjcatName` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcat`
--

INSERT INTO `subjectcat` (`subjcatid`, `subjcatName`) VALUES
(5, 'Mathematics'),
(12, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `subjtypebyclass`
--

CREATE TABLE `subjtypebyclass` (
  `subjectTypeid` int(11) NOT NULL,
  `subjectTypename` varchar(121) NOT NULL,
  `classFkid` int(11) NOT NULL,
  `b_ground` varchar(70) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjtypebyclass`
--

INSERT INTO `subjtypebyclass` (`subjectTypeid`, `subjectTypename`, `classFkid`, `b_ground`) VALUES
(0, 'Euclidean Geometry', 0, 'image/euclidean-geometry.jpg'),
(31, 'Properties of Arithmetic', 34, 'image/propertiesofatithmatic.png'),
(32, 'Basic Number Theory', 25, 'image/whatnumberreallyr.png'),
(33, 'Algebraic Expressions', 34, 'image/basicsofalgebra.png'),
(34, 'Basics of Probability', 33, 'image/stb.png'),
(36, 'Data Handling and Representation', 33, 'image/datahandling.png'),
(38, 'Powers', 33, 'image/exponents.png'),
(40, 'Perimeter and Area', 34, 'image/areanperimeter.png'),
(43, 'Ratios and Percentages', 33, 'image/rationpercentage.png'),
(44, 'Properties of Triangles', 34, 'image/trianglequadcircle.png'),
(45, 'Squares and Square Roots', 33, 'image/rootnsqroot.png'),
(51, 'Visualization of Space', 28, 'image/3dgeometry.png'),
(56, 'Commercial Mathematics', 33, 'image/coomercialmath.png'),
(58, 'Areas related to Circles', 28, 'image/aerasam.png'),
(62, 'Coordinate Geometry', 28, 'image/coogif.png'),
(64, 'Quadratic Equations', 28, 'image/quadratic_equation.png'),
(65, 'Lines and Angles', 19, 'image/linenangles.png'),
(67, 'Exponents', 19, 'image/exponents.png'),
(69, 'Perimeter and Area', 19, 'image/areanperimeter.png'),
(72, 'Sequences and Series', 28, 'image/sequencenseries.png'),
(99, 'Fraction', 34, 'image/fraction.png'),
(100, 'Decimal', 34, 'image/decimal.png'),
(101, 'Polynomials', 19, 'image/polynomials.jpg'),
(105, 'Number System', 19, 'image/number2.png'),
(106, 'Algebraic Identities and Factorization', 19, 'image/algsam.png'),
(107, 'Polynomials II', 28, 'image/polysam.png'),
(108, 'Triangles II', 28, 'image/triangle2.png'),
(109, 'Circles II', 28, 'image/circle2.png'),
(110, 'Statistics', 19, 'image/stsams.png'),
(111, 'Probability', 19, 'image/stb.png'),
(113, 'Quadrilaterals', 19, 'image/rectasamns.png'),
(114, 'Circles', 19, 'image/circle2.png'),
(115, 'Linear Equations in Two Variables', 28, 'image/2x3y5.png'),
(116, 'Real Numbers', 28, 'image/rationumber.png'),
(117, 'Some Applications of Trigonometry', 28, 'image/applicationsam.png'),
(118, 'Statistics II', 28, 'image/stsams.png'),
(119, 'Probability II', 28, 'image/stb.png'),
(120, 'Triangles and its Angles', 19, 'image/trianglesam.png'),
(121, 'Congruent Triangles', 19, 'image/congtrisam.png'),
(124, 'Trigonometric Ratios', 28, 'image/cos2.png'),
(125, 'Trigonometric Identities', 28, 'image/cosid.png'),
(126, 'SA & Volume of Cuboid & Cube', 19, 'image/cube9sam.png'),
(127, 'SA & Volume of Right Circular Cylinder', 19, 'image/cylindersam.png'),
(128, 'SA & Volume of Right Circular Cone', 19, 'image/conesam.png'),
(129, 'SA & Volume of Sphere', 19, 'image/spheresam.png'),
(140, 'Direct and Inverse Variations', 33, 'image/directindired09.png'),
(141, 'Time And Work', 33, 'image/timeandwork090801.png'),
(144, 'Division of Algebraic Expressions', 33, 'image/divisionof-algeb08.png'),
(145, 'Cubes and Cube Roots', 33, 'image/cube&cubroots04.png'),
(146, 'Understanding Shapes Quadrilaterals', 33, 'image/rectasamns.png'),
(148, 'Special Type Of Quadrilaterals', 33, 'image/rectasamns.png'),
(149, 'Mensuration-Trapezium and Polygon', 33, 'image/pentagon09042018.png'),
(150, 'Algebraic Expressions and Identities', 33, 'image/algebrix0408.png'),
(151, 'Factorization', 33, 'image/factor0904.png'),
(158, 'Mensuration Cuboid and a Cube', 33, 'image/cube9sam.png'),
(160, 'Mensuration Right Circular Cylinder', 33, 'image/cylindersam.png'),
(161, 'Rational Numbers', 33, 'image/rationumber.png'),
(162, 'Linear Equation in One Variable', 33, 'image/linear&equation25.jpg'),
(164, 'Ratio and Proportion', 34, 'image/rationpercentage.png'),
(167, 'Basic of Lines and Angles', 34, 'image/linenangles.png'),
(168, 'Profit and Loss', 34, 'image/dolr.png'),
(169, 'Symmetry', 34, 'image/smytry.png'),
(170, 'Simple Interest', 34, 'image/interest.png'),
(171, 'Basic of Exponents', 34, 'image/exponents.png'),
(172, 'Percentage', 34, 'image/prcent.png'),
(173, 'Integers', 34, 'image/number2.png'),
(174, 'Basic of Rational Numbers', 34, 'image/rationumber.png'),
(175, 'Mensuration', 25, 'image/cube9sam.png'),
(176, 'Playing With Numbers', 33, 'image/number2.png'),
(177, 'Linear Equations', 34, 'image/hkl.png'),
(178, 'Data Handling', 34, 'image/ddts.png'),
(179, 'Whole Numbers', 25, 'image/whonumb.jpg'),
(180, 'Introduction to Algebra', 25, 'image/basicsofalgebra.png'),
(181, 'Ratio, Proportion and Unitary Method', 25, 'image/rationpercentage.png'),
(182, 'Basic of Fractions', 25, 'image/fraction.png'),
(183, 'Basic of Mensuration', 25, 'image/cube9sam.png'),
(184, 'Basics of Decimals', 25, 'image/decimal.png'),
(185, 'Knowing Our Numbers', 25, 'image/whatnumberreallyr.png'),
(186, 'Angles and Triangles', 25, 'image/trianglesam.png'),
(187, 'Quadrilaterals & Circles', 25, 'image/rectasamns.png'),
(188, 'Basics of Data Handling', 25, 'image/ddts.png'),
(190, 'Counting and Probability', 34, '0');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(10) NOT NULL,
  `u_first_name` varchar(50) NOT NULL,
  `u_last_name` varchar(50) NOT NULL,
  `u_email` varchar(121) NOT NULL,
  `class` int(11) NOT NULL,
  `co_code` varchar(5) NOT NULL COMMENT 'country mobile code',
  `u_phone` bigint(10) NOT NULL DEFAULT '0',
  `u_password` varchar(121) NOT NULL,
  `register_date` datetime NOT NULL,
  `u_school_code` varchar(12) NOT NULL DEFAULT '0',
  `per_email` varchar(255) NOT NULL,
  `tech_id` varchar(11) NOT NULL COMMENT 'student is associated with which teacher',
  `user_type` varchar(2) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `account_start_date` date NOT NULL,
  `account_end_date` date NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `u_first_name`, `u_last_name`, `u_email`, `class`, `co_code`, `u_phone`, `u_password`, `register_date`, `u_school_code`, `per_email`, `tech_id`, `user_type`, `token`, `status`, `account_start_date`, `account_end_date`, `updated_at`, `created_at`) VALUES
(34, 'Rakhi', 'Jha', 'rakhijha@hotmail.com', 10, '91', 9910726231, 'a91ba31ced20ac5240275f59329e317c', '2016-07-15 03:11:00', '0', '0', '0', '', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(53, 'Pankajteacher', 'jha', 'pankaj@thejha.in', 0, '91', 7838400402, '3f86e3ed8b3f6ed5463e0f7ad2f1ab16', '2018-07-31 00:00:00', '20', '0', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(315, 'PankajStudent', 'jha', 'pjha287@gmail.com', 10, '91', 7838400402, '207794db6302b5f09973f71b11ad44b3', '2016-08-17 03:41:47', '9', '0', '53', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(316, 'PankajIntern', 'jha', 'intern@gmail.com', 10, '91', 7838400402, '7cfcdcf9a62b3402db36128e52411e80', '2016-08-17 03:41:47', '9', '0', '53', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(317, 'PankajAdmin', 'jha', 'pankaj_admin@thejha.in', 0, '91', 7838400402, '8a0280b5aa574eca8be6c0cfd4201152', '2018-08-17 03:41:47', '9', '0', '0', '4', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(335, 'nitin', 'garg', 'nitingarg0102@gmail.com', 0, '91', 9310543284, 'd62df4fc55b736c197de1f5d1d2d258d', '2018-01-06 03:34:09', '20', '', '53', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(336, 'Rajyashree', 'sood', 'rsood@vasantvalley.org', 0, '0', 9810013397, 'e6e061838856bf47e1de730719fb2609', '2018-11-25 16:20:00', '20', '', 'null', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(339, 'Tarek', 'Lewis', 'Tarektobie@gmail.com', 0, '91', 4434304134, 'ceb6c970658f31504a901b89dcd3e461', '2018-02-07 08:59:19', '20', '', '', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(352, 'Ashwani', 'Duggal', 'ashwanid@gmail.com', 10, '91', 0, 'd41d8cd98f00b204e9800998ecf8427e', '2018-04-20 10:25:14', '9', '', 'null', '1', 'b4d6c49fdd0563d6d365edf43d7bb911', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(353, 'Demo', 'Account', 'demo@yopmail.com', 10, '91', 8505823517, '6eea9b7ef19179a06954edd0f6c05ceb', '2018-04-22 03:47:38', '6', 'demo@yopmail.com', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(354, 'Sheen', 'Teotia', 'sushil_teotias@yahoo.com', 10, '91', 9711991764, 'ed95daa07e0055b60ccca15d6ca7c5cf', '2018-04-28 07:30:35', '6', '', '0', '1', '4c811a5a4dde6e422e10928dc51f4b98', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(355, 'dev', 'kumar', 'devendra.kumar@vvdntech.in', 10, '91', 1234567890, '6eea9b7ef19179a06954edd0f6c05ceb', '2018-05-03 09:17:48', '6', 'devendra.kumar@vvdntech.in', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(356, 'Claudio', 'morales', 'arturomb@hotmail.com', 10, '91', 5516996619, '41b8ec20586541e7bdf5164520bce465', '2018-06-02 15:07:03', '9', 'arturomb@hotmail.com', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(358, 'April', 'Gonzalez', 'aprilgonzal822@gmail.com', 10, '91', 402, '4f7f04cf257e1cfc4ba36a97f9b1b3ba', '2018-06-13 07:26:26', '9', 'aprilgonzal822@gmail.com', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(359, 'Nevaeh', 'Meeks', 'nevaehmeeks03@gmail.com', 0, '91', 140290636, '502eaa5fc488f87e51c99330d0cf23f8', '2018-06-13 20:03:17', '20', 'nevaehmeeks03@gmail.com', '335', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(360, 'Nevaeh', 'Meeks', 'nevhansher@gmail.com', 10, '91', 4029063625, '1abcb33beeb811dca15f0ac3e47b88d9', '2018-06-13 20:12:05', '9', 'nevhansher@gmail.com', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(361, 'amay', 'sharma', 'smritisharma3627@gmail.com', 0, '91', 9910136173, '63343089a3af12199603d29d060a134e', '2018-06-28 05:03:35', '20', 'smritipsharma@yahoo.com', '', '2', 'ec2e93660257059bd70bc1808a63842a', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(363, 'Rohan', 'Jha', 'rohanjha011@gmail.com', 10, '91', 7065286745, 'c948cd227b8b28cba7a224e885fde4eb', '2018-08-08 08:54:19', '4', 'pjha287@gmail.com', '0', '1', 'd90cd3f91a03d72d3e0b14bf4ac09e33', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(367, 'Amit', 'kuma', 'akamit169@gmail.com', 8, '91', 8010152565, 'e10adc3949ba59abbe56e057f20f883e', '2018-08-09 08:15:15', 'Select Schoo', '', '0', '1', '292145b7e8f16aeee94b526eba58ad74', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(368, 'amit', 'kumar', 'amit.sinha590@gmail.com', 0, '91', 0, 'e10adc3949ba59abbe56e057f20f883e', '2018-08-10 06:06:24', '20', '', '', '2', 'e4a21b52f87c674779f379b61ac823cf', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(369, 'Samsher', 'Rao', 'yadav_samsher@rediffmail.com', 10, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2018-09-01 11:20:49', '9', '', '53', '1', 'b8745c7d1851f1177615d381c14df5a6', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(370, 'rakhi jha', '', 'rakhijha716@gmail.com', 10, '91', 9910726231, 'e2a57bdf8149cbab46d6f08109b5bf33', '2018-09-02 07:14:03', '9', '', '53', '1', 'ef643fa9ef622266e98cab23a868ee5d', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(372, 'Asmi', 'Anand', 'asmi.anand@outlook.com', 6, '91', 9650912571, 'd41d8cd98f00b204e9800998ecf8427e', '2018-10-14 14:44:45', '6', '', 'null', '1', '4e3fb03ea010fc11778b9336fe6e1393', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(373, 'Kyra', 'Dewani', 'kyra3030@ggn.hxls.org', 6, '91', 9873010778, 'd41d8cd98f00b204e9800998ecf8427e', '2018-10-18 09:35:27', '9', '', 'null', '1', '8f4bd83cc55f9ba6ca5001e0370e9555', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(374, 'Vanshika', 'Mittal', 'physio1.sonika@gmail.com', 7, '91', 9354327070, '38d7fd8548ef893ac781e38646459a33', '2018-10-20 10:07:23', '9', '', '0', '1', '4cf94ea141fb0fa574e20adaeca936db', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(375, 'Kirti', 'Dutta', 'kirtdutt2@rediffmail.com', 7, '91', 9811650696, 'd41d8cd98f00b204e9800998ecf8427e', '2018-10-20 13:59:15', '9', '', 'null', '1', '230cf317dd2084050a08a06434b4c360', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(376, 'Lokesh', 'Yadav', 'lokeshyadav@gmail.com', 0, '91', 9911558366, '6c5b9642fb5c245920471723ab9441d4', '2018-10-21 13:24:30', '20', '', '', '2', '4e80f0614a6ab0d615b91184b0b28b6c', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(377, 'aditya', 'singh', 'mukeshsingh046@hotmail.com', 6, '91', 9818189574, 'd41d8cd98f00b204e9800998ecf8427e', '2018-10-21 16:29:09', '9', '', 'null', '1', '3edb290fa10dc81527884ec440be7428', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(378, 'R', 'G', 'ROHINA.GUPTA@GMAIL.COM', 9, '91', 9899249645, '40b1d4595e4a01a2f7c06c1864726d40', '2018-10-23 05:50:13', '9', '', 'null', '1', '9311a08bbf05d29ecea8b5259cc02f22', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(380, 'Aman', 'Singh', 'kick2hack@gmail.com', 7, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2018-10-24 05:54:07', '9', 'ssyadavsamsher@gmail.com', '53', '1', '676e20e43f911af7822507a16fc159aa', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(381, 'test', 'student', 'nitin@ipmedia.in', 10, '91', 9911763664, '79eed6a4f52e2cbd8b93d66caea50223', '2018-10-25 05:47:50', '5', '', '368', '1', '2fcf96531a2ddfe1a95c66e4b21acd9f', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(382, 'Ashwini', 'Parida', 'paridarudrakanta1@gmail.com', 0, '91', 9205293045, '34db86771cfec604b12421d2807b6389', '2018-10-25 07:14:37', '20', 'paridarudrakanta@yahoo.co.in', '', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(383, 'JASPREET', 'SINGH', 'jaspreet_singh_sarna@yahoo.co.in', 6, '91', 9013235556, '2a5493b66672d62306b9cda443ba0633', '2018-10-25 15:10:11', '9', '', '53', '1', '2c7126987411d2774a2469431713a3d4', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(384, 'Sunita', 'Jaisingh', 'sunita.jaisingh@globalindianschool.org', 0, '0', 9467574939, 'e6e061838856bf47e1de730719fb2609', '2018-10-26 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(388, 'Sudhir', 'Ram', 'nk1128203@gmail.com', 6, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2018-10-29 10:17:17', '10', 'ssyadavsamsher@gmail.com', '384', '1', '87df76c53c850b4b52cea0a62024d8b0', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(391, 'Tvesha', 'Ghosh', 'tveshaghosh@gmail.com', 6, '91', 9999311061, 'b1f787e1769af95470b38708bb723658', '2018-11-05 04:19:01', '9', 'sumeeta_k@yahoo.com', '53', '1', 'a5121f59b5991cc2fb837378921873bb', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(392, 'yachika', 'joshi', 'nikkijoshi1997@gmail.com', 0, '91', 7042583364, 'c0d5e1b6d7cec7dc70f46ba4ad44a1b4', '2018-11-16 00:29:57', '5', '', '368', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(393, 'nitin', 'prakash', 'developer.ipmedia@gmail.com', 0, '91', 9911617003, '23b431acfeb41e15d466d75de822307c', '2018-11-16 00:49:36', '3', '', '336', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(395, 'kanak', 'yadav', 'kanakyadav14@gmail.com', 0, '91', 9818895336, '8ce87b8ec346ff4c80635f667d1592ae', '2018-11-17 01:40:08', '3', '', '336', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(397, 'nituuu', 'kucchuu', 'nitin.prakash9911@gmail.com', 0, '91', 9911617003, 'c0d5e1b6d7cec7dc70f46ba4ad44a1b4', '2018-11-17 01:57:26', '3', '', '', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(398, 'nitin', 'kumar', 'nitin.prakash99@gmail.com', 0, '0', 99933443343, '79eed6a4f52e2cbd8b93d66caea50223', '2018-11-17 03:03:38', '0', '', '21', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(399, 'tgvc', 'vnb', 'buh@gmail.com', 0, '91', 9632587112, '29376ec71baa9f04865a5cefa6ce14ef', '2018-11-17 03:21:18', '3', '', '393', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(400, 'bzjnz', 'buzz', 'nikkhi1997@gmail.com', 0, '91', 9765486435, 'c3b3ad5e1e30be7ee3421956509099ad', '2018-11-17 04:14:57', '5', '', '368', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(401, 'bzjnz', 'buzz', 'nii1997@gmail.com', 0, '91', 9765486435, 'c3b3ad5e1e30be7ee3421956509099ad', '2018-11-17 04:15:54', '5', '', '368', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(402, 'njj', 'new', 'nitinpra@gmail.com', 7, '91', 999988989, '1bbd886460827015e5d605ed44252251', '2018-11-19 12:19:09', '3', '', '336', '1', 'e54130844fb9a3d1491b5ed2a855ebec', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(403, 'nitin', 'nana', 'nitin.prka@gmail.com', 7, '91', 9911212131, 'd41d8cd98f00b204e9800998ecf8427e', '2018-11-21 05:35:16', 'Select Schoo', '', '0', '1', '02ed46cb06467bc3d1113c1ea0501b1e', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(404, 'Nitin', 'Prakash', 'nitin@gmail.com', 7, '91', 9911617003, 'd41d8cd98f00b204e9800998ecf8427e', '2018-11-21 05:38:31', 'Select Schoo', '', '0', '1', '493e947690c72301edcc002e6e9ff732', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(405, 'Nitin', 'Prakash', 'nitn@', 7, '91', 9911617003, 'd41d8cd98f00b204e9800998ecf8427e', '2018-11-21 06:45:28', 'Select Schoo', '', '0', '1', 'dbbe48107b031a544191ecf0b078ef5c', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(406, 'Sanjay', 'yadav', 'umedkalsan@gmail.com', 0, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2018-11-21 06:18:43', '3', 'ssyadavsamsher@gmail.com', '394', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(408, 'Samsher', 'Singh', 'rozerpitfal@gmail.com', 0, '91', 9767574939, 'e657045bf37cd260928d4eb21ea80565', '2018-11-22 03:26:11', '9', 'ssyadavsamsher@gmail.com', '53', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(409, 'kavye', 'gupta', 'ankita.gupta2u@gmail.com', 6, '91', 9711572492, 'd41d8cd98f00b204e9800998ecf8427e', '2018-11-23 06:23:34', '9', '', 'null', '1', '5268b9c9a1e6b2f39523821a664ebadd', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(410, 'Shobhana', 'S', 'shobhana@kunskappsskolan.edu.in', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-11-25 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(411, 'Vikram', 'DPS', 'vikramdpssl@gmail.com', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-11-25 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(412, 'Anjana', 'Mennon', 'anjana.mennon@lotusvalleygurgaon.com', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-11-25 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(413, 'Neetika', 'Nanda', 'neetikananda@gmail.com', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-11-25 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(414, 'Rupesh', 'Pathak', 'rupeshpathak.8@gmail.com', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-11-28 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(415, 'Vineeta', 'Loomba', 'vatsalooomba@gmail.com', 10, '91', 9716507242, 'd41d8cd98f00b204e9800998ecf8427e', '2018-12-02 01:55:34', '9', '', 'null', '1', 'c713614ae4ecad174a3c34b21fcea539', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(416, 'Shweta', 'Nangia', 'shaweta5nangia@gmail.com', 0, '0', 7503884181, 'e6e061838856bf47e1de730719fb2609', '2018-12-02 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(417, 'Neha', 'Arora', 'neha6121990arora@gmail.com', 0, '0', 9711290676, 'e6e061838856bf47e1de730719fb2609', '2018-12-02 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(418, 'Sangeeta', 'Kumari', 'misssangeetakumari@gmail.com', 10, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2018-12-02 04:23:39', '9', 'ssyadavsamsher@gmail.com', '53', '1', 'e8f5d83abe7531fe7bdc65f488e14754', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(419, 'ram', 'aaa', 'kanak@gmail.com', 0, '91', 1234554321, '1bbd886460827015e5d605ed44252251', '2018-12-03 01:03:35', '4', 'kanak@gmail.com', '53', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(421, 'Meenakshi', 'Khanna', 'mkhanna@aisg46.amity.edu', 0, '0', 0, 'e6e061838856bf47e1de730719fb2609', '2018-12-07 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(422, 'kanak', 'yadav', 'kanak.ipmedia@gmail.com', 0, '91', 7738808577, '1bbd886460827015e5d605ed44252251', '2018-12-11 03:30:51', '4', '', '335', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(423, 'nitin', 'kumar', 'nitin.prakasah99@gmail.com', 0, '0', 99933443343, '79eed6a4f52e2cbd8b93d66caea50223', '2018-12-31 05:40:47', '0', '', '21', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(424, 'nisstin', 'kussmar', 'nitin.prakassssah99@gmail.com', 0, '0', 9933443343, '79eed6a4f52e2cbd8b93d66caea50223', '2018-12-31 10:23:34', '0', '', '21', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(425, 'TestIpmedia', 'Test', 'Test.Ipmedia@gmail.com', 0, '0', 9900112222, '8250bc85cd8e54f572c2dccb3e2ad402', '2018-12-31 10:29:36', '0', '', '21', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(426, 'Nikhil', 'Runner', 'nikhilrunner1999', 10, '91', 9518262569, 'e657045bf37cd260928d4eb21ea80565', '2019-01-01 15:55:16', '9', 'yadav_samsher@rediffmail.com', '53', '1', 'ada46912b6886f9d4fabf57a437d160b', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(427, 'nji', 'ngh', 'nitin.pkash9911@gmail.com', 0, '91', 9911617003, '1bbd886460827015e5d605ed44252251', '2019-01-01 23:08:58', '3', '', '336', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(430, 'neja', 'kjs', 'nnd@gmail.com', 0, '91', 9911618663, '1bbd886460827015e5d605ed44252251', '2019-01-01 23:21:31', '3', '', '336', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(431, 'Maan', 'Bahadur', 'priyankaindia22@gmail.com', 0, '91', 9467574939, 'e657045bf37cd260928d4eb21ea80565', '2019-01-02 00:07:29', '9', 'ssyadavsamsher@gmail.com', '53', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(432, 'Ram', 'yadav', 'kbc@gmail.com', 0, '91', 9898989898, '1bbd886460827015e5d605ed44252251', '2019-01-02 05:52:04', '4', '', '335', '1', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(433, 'Sabreena', 'Talwar', 'sabreenatalwar@kunskapsskolan.edu.in', 0, '91', 9599883963, '1db877d11bfd44216d4820afd382cb14', '2019-01-07 01:20:00', '20', '', '0', '2', '', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:51:43', '2019-01-31 11:28:59'),
(434, 'Pankaj', 'Kumar', 'prashantjee0230@gmail.com', 10, '91', 7319626428, 'd41d8cd98f00b204e9800998ecf8427e', '2019-01-10 12:45:43', '5', '', 'null', '1', 'fc06a09ec5a850803d74adde4654889b', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(435, 'Prashant', 'Jee', 'prashantjee0230@gmail.com', 10, '91', 0, 'e10adc3949ba59abbe56e057f20f883e', '2019-01-10 12:49:28', '10', '', '384', '1', 'f483a470577a7df64f2455ba97647ae7', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(436, 'S', 'E', 'ramakrishnan.shankar@gmail.com', 8, '91', 0, '4f06ee8aeeb2428e2f8e447db8350064', '2019-01-16 05:04:47', 'Select Schoo', 'ramakrishnan.shankar@gmail.com', '0', '1', '909f68117dd10ebdcb5f999d6cbcc056', 0, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(437, 'S', 'R', 'ramakrishnan.shankar@gmail.com', 8, '91', 0, '4f06ee8aeeb2428e2f8e447db8350064', '2019-01-16 06:11:13', '3', 'ramakrishnan.shankar@gmail.com', '336', '1', '0da5b00c561fe3d6f8cac4cbe5536ed9', 1, '0000-00-00', '0000-00-00', '2019-01-31 11:28:59', '2019-01-31 11:28:59'),
(438, 'swati', 'karn', 'swati@gmail.com', 0, '91', 9835873789, 'e10adc3949ba59abbe56e057f20f883e', '2019-01-31 14:55:35', '21', '', '0', '2', '', 1, '2019-01-31', '2019-02-02', '2019-01-31 20:25:35', '2019-01-31 20:25:35'),
(439, 'ankit', 'jha', 'ankit.jha@gmail.com', 19, '91', 987645546, 'e10adc3949ba59abbe56e057f20f883e', '2019-02-01 08:21:55', '21', '', '438', '1', '', 1, '2019-02-01', '2019-02-22', '2019-02-01 13:51:55', '2019-02-01 13:51:55'),
(440, 'avineet anand', 'sinha', 'avineet@gmail.com', 19, '001', 9835873789, 'e10adc3949ba59abbe56e057f20f883e', '2019-02-01 08:22:57', '21', '', '438', '3', '', 1, '2019-02-02', '2019-02-13', '2019-02-01 15:03:21', '2019-02-01 13:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `user_type`, `type_id`) VALUES
(1, 'Student', 1),
(2, 'Teacher', 2),
(3, 'Intern', 3),
(4, 'Supar Admin', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `classname`
--
ALTER TABLE `classname`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `subctFKid` (`subctFKid`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `subjectcat`
--
ALTER TABLE `subjectcat`
  ADD PRIMARY KEY (`subjcatid`);

--
-- Indexes for table `subjtypebyclass`
--
ALTER TABLE `subjtypebyclass`
  ADD PRIMARY KEY (`subjectTypeid`),
  ADD KEY `classFkid` (`classFkid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classname`
--
ALTER TABLE `classname`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subjectcat`
--
ALTER TABLE `subjectcat`
  MODIFY `subjcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subjtypebyclass`
--
ALTER TABLE `subjtypebyclass`
  MODIFY `subjectTypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classname`
--
ALTER TABLE `classname`
  ADD CONSTRAINT `classname_ibfk_1` FOREIGN KEY (`subctFKid`) REFERENCES `subjectcat` (`subjcatid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
