-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 05:41 AM
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
(91, '2019-07-29 14:47:31', '', '', '', '2', ' ฝ้าเพดาน สุขภัณฑ์  ', 'fg', 'fg', 0, ''),
(92, '2019-07-29 14:48:31', '', '', '', '3', '  เก้าอี้ โต๊ะ ตู้ ', 'g', 'g', 0, ''),
(93, '2019-07-29 14:48:41', '', '', '', '3', '  โต๊ะ งานโลหะ/ไม้ ', 'g', 'g', 0, ''),
(94, '2019-07-29 14:48:54', '', '', '', '2', ' ประตู หน้าต่าง  ', 'fg', 'g', 0, ''),
(95, '2019-08-20 10:57:04', '', '', '', '1', 'หลอดไฟ   ', 'uui', 'uiui', 0, ''),
(96, '2019-08-20 15:17:18', '', '', '', '1', 'หลอดไฟ   ', 'fdg', 'hfh', 0, ''),
(97, '2019-08-20 16:50:56', '', '', '', 'ไฟฟ้า', 'หลอดไฟ พัดลมดูดอากาศ   ', 'หกหกห', 'หกหก', 0, ''),
(98, '2019-08-20 17:30:18', '', '', '', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ fgfdgf  ', 'fgfgf', 'fgfgfg', 0, ''),
(99, '2019-08-20 17:30:51', '', '', '', 'ตัวอาคาร', ' ประตู หน้าต่าง กระเบื้อง ฝ้าเพดาน ผนัง dfd ', 'dfd', 'dfdf', 0, ''),
(100, '2019-08-20 17:33:31', '', '', '', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ   ', 'fgf', 'ffghfgh', 0, ''),
(101, '2019-08-20 17:34:38', '', '', '', 'ตัวอาคาร', ' สี ท่อนํ้า  ', 'dddd', 'ddddd', 0, ''),
(102, '2019-08-20 18:03:33', '', '', '', 'ไฟฟ้า', 'เครื่องใช้ไฟฟ้า(ของวิทยาเขต)   ', 'กกก', 'กกก', 0, ''),
(103, '2019-08-20 18:05:31', '', '', '', 'ไฟฟ้า', 'พัดลมดูดอากาศ เครื่องใช้ไฟฟ้า(ของวิทยาเขต)   ', 'ำดำด', 'กดกด', 0, ''),
(104, '2019-08-20 21:48:09', '', '', '', 'ไฟฟ้า', 'หลอดไฟ  ประตู หน้าต่าง  ', 'dfdg', 'dfd', 0, ''),
(105, '2019-08-21 10:29:38', '', '', '', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ   ', 'fdfd', 'dfd', 0, ''),
(106, '2019-08-21 10:34:48', 'hna', 'md', 'jjyu', 'ตัวอาคาร', ' ประตู หน้าต่าง dfdf ', 'dfdfd', 'dfdfd', 0, ''),
(107, '2019-08-21 10:40:03', 'hna', 'md', 'fdfd', 'ตัวอาคาร', ' ประตู หน้าต่าง fgfdg ', 'dfgd', 'dgfd', 0, ''),
(108, '2019-08-21 11:52:23', 'hna', 'md', 'IT', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ rrtrt  ', 'rtrt', 'rtrt', 0, ''),
(109, '2019-08-23 11:49:38', 'hna', 'md', 'IT', 'ตัวอาคาร', ' ประตู หน้าต่าง ff ', 'fffffffff', 'fgfgf', 0, ''),
(110, '2019-08-23 11:56:33', 'hna', 'md', 'IT', 'ตัวอาคาร', ' นํ้าฝนรั่ว de ', 'efef', 'efe', 0, ''),
(111, '2019-08-23 12:27:14', 'hna', 'md', 'IT', 'ตัวอาคาร', ' นํ้าฝนรั่ว d ', 'dd', 'dd', 0, ''),
(112, '2019-08-23 12:28:55', 'hna', 'md', 'jjyu', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ fd  ', 'fgfd', 'fgf', 0, ''),
(113, '2019-08-23 12:29:05', 'hna', 'md', 'jjyu', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ fd  ', 'fgfd', 'fgf', 0, ''),
(114, '2019-08-23 12:29:48', 'hna', 'md', 'IT', 'ไฟฟ้า', 'แอร์ พัดลม   ', 'fgdgd', 'dgdfg', 0, ''),
(115, '2019-08-23 12:31:07', 'hna', 'md', 'IT', 'ไฟฟ้า', 'แอร์ พัดลม   ', 'fgdgd', 'dgdfg', 0, ''),
(116, '2019-08-23 12:31:07', 'hna', 'md', 'IT', 'ไฟฟ้า', 'แอร์ พัดลม   ', 'fgdgd', 'dgdfg', 0, ''),
(117, '2019-08-23 12:31:46', 'hna', 'md', 'IT', 'ตัวอาคาร', ' สุขภัณฑ์ นํ้าฝนรั่ว  ', 'sd', 'dfdf', 0, ''),
(118, '2019-08-23 12:33:04', 'hna', 'md', 'jjyu', 'ตัวอาคาร', ' สุขภัณฑ์ นํ้าฝนรั่ว jjjj ', 'uyuuy', 'huyuy', 0, ''),
(119, '2019-08-23 12:44:40', 'hna', 'md', 'IT', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ   ', 'sds', 'sdsd', 0, ''),
(120, '2019-08-24 10:05:40', 'hna', 'md', 'IT', 'ไฟฟ้า', 'หลอดไฟ ปลั๊กไฟ rtrt  ', 'rrtrt', 'rtrt', 0, ''),
(121, '2019-08-24 10:40:02', 'hna', 'md', 'ss', 'ไฟฟ้า', 'แอร์ พัดลม   ', 'sds', 'sdsd', 0, '');

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
  `trn_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `email`, `Userlevel`, `trn_date`) VALUES
(1, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', '', 'A', '0000-00-00 00:00:00'),
(2, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 'bbbb', 'bbbb', '', 'M', '0000-00-00 00:00:00'),
(12, 'Hully', '310dcbbf4cce62f762a2aaa148d556bd', 'อนุธิดา', 'ทำนากล้า', 'annaa.61419@gmail.com', 'T', '2019-04-24 15:22:00'),
(11, 'nnn', 'bcbe3365e6ac95ea2c0343a2395834dd', 'ฮูสนา', 'ดือรามิง', 'husna.1232@gmail.com', 'L', '2019-04-24 15:21:00'),
(23, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-05-16 16:46:00'),
(24, 'ghgh', '827ccb0eea8a706c4c34a16891f84e7b', 'ddd', 'vvv', 'hanna_2540@hotmail.com', 'M', '2019-06-24 03:54:00'),
(21, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-05-16 16:42:00'),
(22, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-05-16 16:42:00'),
(20, 'rrr', 'c5fe25896e49ddfe996db7508cf00534', 'รังสิมา', 'ปาริ', 'lanla_2011@hotmail.com', 'T', '2019-04-25 09:28:00'),
(19, 'nnn', '698d51a19d8a121ce581499d7b701668', 'ฮันนา', 'หมัดอาดัม', 'drlhlovehldr@gmail.com', 'M', '2019-04-25 00:25:00'),
(25, 'hnn', '827ccb0eea8a706c4c34a16891f84e7b', 'hn', 'md', 'hanna_2540@hotmail.com', 'M', '2019-06-26 11:57:00'),
(26, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:39:00'),
(27, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'L', '2019-07-07 06:40:00'),
(28, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'T', '2019-07-07 06:40:00'),
(29, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'T', '2019-07-07 06:56:00'),
(30, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:57:00'),
(31, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 06:58:00'),
(32, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'M', '2019-07-07 07:53:00'),
(33, 'hna', '674f3c2c1a8a6f90461e8a66fb5550ba', 'hna', 'md', 'hanna_2540@hotmail.com', 'M', '2019-07-07 08:15:00'),
(38, 'hj', '827ccb0eea8a706c4c34a16891f84e7b', 'hj', 'hj', 'hanna_2540@hotmail.com', 'L', '2019-07-15 13:16:00'),
(37, 'hh', '674f3c2c1a8a6f90461e8a66fb5550ba', 'hh', 'hh', 'hanna_2540@hotmail.com', 'L', '2019-07-15 13:10:00'),
(39, 'hj', '81dc9bdb52d04dc20036dbd8313ed055', 'hj', 'hj', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:18:00'),
(40, 'hj', '81dc9bdb52d04dc20036dbd8313ed055', 'hj', 'hj', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:18:00'),
(41, 'yy', '81dc9bdb52d04dc20036dbd8313ed055', 'yy', 'yy', 'hanna_2540@hotmail.com', 'T', '2019-07-15 13:19:00'),
(42, 'kl', '46d045ff5190f6ea93739da6c0aa19bc', 'kl', 'lk', 'lanla_2011@hotmail.com', 'T', '2019-07-15 13:21:00'),
(43, 'hannahimchannnn', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'หมัดอาดัม', 'hanna_2540@hotmail.com', 'M', '2019-07-29 09:41:00'),
(44, 'hannaa', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'ปาริ', 'lanla_2011@hotmail.com', 'L', '2019-07-29 09:44:00'),
(45, 'hn', '827ccb0eea8a706c4c34a16891f84e7b', 'ฮันนา', 'หมัดอาดัม', 'hanna_2540@hotmail.com', 'T', '2019-08-23 06:16:00'),
(46, 'hnn', '81dc9bdb52d04dc20036dbd8313ed055', 'ฮันนาk', 'หมัดอาดัมk', 'lanla_2011@hotmail.com', 'M', '2019-08-23 06:18:00'),
(47, 'hk', '81dc9bdb52d04dc20036dbd8313ed055', 'ฮันนาd', 'หมัดอาดัมd', 'drlhlovehldr@gmail.com', 'M', '2019-08-23 06:27:00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `repair_data`
--
ALTER TABLE `repair_data`
  MODIFY `RepID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่แจ้ง', AUTO_INCREMENT=122;
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
