-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 09:51 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FilesID` int(4) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `FilesName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(5) NOT NULL,
  `date` varchar(15) NOT NULL,
  `department` varchar(30) NOT NULL,
  `elect` varchar(30) NOT NULL,
  `building` varchar(30) NOT NULL,
  `office` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `update` varchar(10) NOT NULL,
  `delete` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `date`, `department`, `elect`, `building`, `office`, `description`, `place`, `status`, `update`, `delete`) VALUES
(209, '62-04-24', 'IT', 'โต๊ะ', 'โต๊ะ', 'โต๊ะ', 'ooooo', 'สนามกีฬา', '', '', ''),
(212, '62-04-25', 'mis', 'โต๊ะ', 'โต๊ะ', 'โต๊ะ', 'โต๊ะพัง', 'อาคารเรียนรวม1', '', '', ''),
(213, '62-05-16', 'ss', 'on', 'on', 'on', 'df', 'สนามกีฬา', '', '', ''),
(214, '62-05-21', 'tuy', 'เก้าอี้', 'เก้าอี้', 'เก้าอี้', 'yutyu', 'rtutu', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `repair_data`
--

CREATE TABLE `repair_data` (
  `RepID` int(5) UNSIGNED NOT NULL COMMENT 'เลขที่แจ้ง',
  `date` datetime NOT NULL COMMENT 'วันที่แจ้ง',
  `Firstname` varchar(500) NOT NULL,
  `Lastname` varchar(500) NOT NULL,
  `Department` varchar(500) NOT NULL,
  `Type` varchar(20) NOT NULL COMMENT 'ประเภทการแจ้งซ่อม',
  `values_type` varchar(200) NOT NULL COMMENT 'สิ่งที่ต้องการแจ้งซ่อม',
  `description` varchar(300) NOT NULL COMMENT 'ลักษณะการชำรุด',
  `place` varchar(200) NOT NULL COMMENT 'สถานที่',
  `user` int(5) NOT NULL,
  `status` varchar(10) NOT NULL COMMENT 'สถานะการซ่อม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_data`
--

INSERT INTO `repair_data` (`RepID`, `date`, `Firstname`, `Lastname`, `Department`, `Type`, `values_type`, `description`, `place`, `user`, `status`) VALUES
(139, '2019-08-24 14:32:13', 'hna', 'md', 'IT', 'ไฟฟ้า', 'cxcx  ', 'cvc', 'ccb', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `NameValue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `NameValue`) VALUES
(1, 'ไฟฟ้า', ''),
(2, 'ตัวอาคาร', ''),
(3, 'ครุภัณฑ์', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Userlevel` varchar(1) NOT NULL,
  `trn_date` datetime NOT NULL,
  `Files_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `email`, `Userlevel`, `trn_date`, `Files_img`) VALUES
(1, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', '', 'A', '0000-00-00 00:00:00', ''),
(2, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 'bbbb', 'bbbb', '', 'M', '0000-00-00 00:00:00', ''),
(12, 'Hully', '310dcbbf4cce62f762a2aaa148d556bd', 'อนุธิดา', 'ทำนากล้า', 'annaa.61419@gmail.com', 'T', '2019-04-24 15:22:00', ''),
(11, 'nnn', 'bcbe3365e6ac95ea2c0343a2395834dd', 'ฮูสนา', 'ดือรามิง', 'husna.1232@gmail.com', 'L', '2019-04-24 15:21:00', ''),
(23, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-05-16 16:46:00', ''),
(24, 'ghgh', '827ccb0eea8a706c4c34a16891f84e7b', 'ddd', 'vvv', 'hanna_2540@hotmail.com', 'M', '2019-06-24 03:54:00', ''),
(21, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-05-16 16:42:00', ''),
(22, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-05-16 16:42:00', ''),
(20, 'rrr', 'c5fe25896e49ddfe996db7508cf00534', 'รังสิมา', 'ปาริ', 'lanla_2011@hotmail.com', 'T', '2019-04-25 09:28:00', ''),
(19, 'nnn', '698d51a19d8a121ce581499d7b701668', 'ฮันนา', 'หมัดอาดัม', 'drlhlovehldr@gmail.com', 'M', '2019-04-25 00:25:00', ''),
(25, 'hnn', '827ccb0eea8a706c4c34a16891f84e7b', 'hn', 'md', 'hanna_2540@hotmail.com', 'M', '2019-06-26 11:57:00', ''),
(26, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:39:00', ''),
(27, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-07-07 06:40:00', ''),
(28, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'T', '2019-07-07 06:40:00', ''),
(29, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'T', '2019-07-07 06:56:00', ''),
(30, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:57:00', ''),
(31, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:58:00', ''),
(32, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 07:53:00', ''),
(33, 'hna', '674f3c2c1a8a6f90461e8a66fb5550ba', 'hna', 'md', 'hanna_2540@hotmail.com', 'M', '2019-07-07 08:15:00', ''),
(38, 'hj', '827ccb0eea8a706c4c34a16891f84e7b', 'hj', 'hj', 'hanna_2540@hotmail.com', 'L', '2019-07-15 13:16:00', ''),
(37, 'hh', '674f3c2c1a8a6f90461e8a66fb5550ba', 'hh', 'hh', 'hanna_2540@hotmail.com', 'L', '2019-07-15 13:10:00', ''),
(39, 'hj', '81dc9bdb52d04dc20036dbd8313ed055', 'hj', 'hj', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:18:00', ''),
(40, 'hj', '81dc9bdb52d04dc20036dbd8313ed055', 'hj', 'hj', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:18:00', ''),
(41, 'yy', '81dc9bdb52d04dc20036dbd8313ed055', 'yy', 'yy', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:19:00', ''),
(42, 'kl', '46d045ff5190f6ea93739da6c0aa19bc', 'kl', 'lk', 'lanla_2011@hotmail.com', 'T', '2019-07-15 13:21:00', ''),
(43, 'hannahimchannnn', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'หมัดอาดัม', 'hanna_2540@hotmail.com', 'M', '2019-07-29 09:41:00', ''),
(44, 'hannaa', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'ปาริ', 'lanla_2011@hotmail.com', 'L', '2019-07-29 09:44:00', ''),
(45, 'hn', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'หมัดอาดัม', 'hanna_2540@hotmail.com', 'T', '2019-08-23 06:16:00', ''),
(46, 'hnn', '81dc9bdb52d04dc20036dbd8313ed055', 'ฮันนาk', 'หมัดอาดัมk', 'lanla_2011@hotmail.com', 'M', '2019-08-23 06:18:00', ''),
(47, 'hk', '81dc9bdb52d04dc20036dbd8313ed055', 'ฮันนาd', 'หมัดอาดัมd', 'drlhlovehldr@gmail.com', 'M', '2019-08-23 06:27:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FilesID`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_data`
--
ALTER TABLE `repair_data`
  ADD PRIMARY KEY (`RepID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FilesID` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `repair_data`
--
ALTER TABLE `repair_data`
  MODIFY `RepID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่แจ้ง', AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
