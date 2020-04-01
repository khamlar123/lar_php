-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2020 at 06:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lar_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `adminlastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `createDate` date NOT NULL,
  `modifyDate` date DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `village` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `telegramnumber` varchar(14) DEFAULT NULL,
  `telegramtoken` varchar(100) DEFAULT NULL,
  `telegramid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`adminid`, `adminname`, `adminlastname`, `email`, `password`, `createDate`, `modifyDate`, `phone`, `img`, `token`, `village`, `City`, `Province`, `telegramnumber`, `telegramtoken`, `telegramid`) VALUES
(2, 'khamlar', 'lar', 'lar@lar.com', '$2y$10$C3XEJyfGaLDjvB3vKCN84O3YhtIuLRoFrY4wFiE5Uwu6j4Gpv7QlG', '2020-01-31', '0000-00-00', 99887766, '', '$2y$10$ccN9BCWJE5EKd08.DDajw.jDFM52/b67RR3o9GlxCe9P6YSqBsZAq', '', '', '', '', '', ''),
(3, 'admin', 'admin', 'admin@admin.com', '$2y$10$9iB22SD/K.ktM8m/ejvypeGAKuolj1CvZ4Ym.7l7RhTiQ/.16fdEu', '2020-01-31', '0000-00-00', 99887766, 'dFQROr7oWzulq5FZYAdIUsZbhUGSJNuE1PgraX04G2xp6kJyhTyS9D3nerViEuA0y74.jpg', '$2y$10$6nD5590RJ/ahkmn6WznKJebHPkzZ8AuIsz78Egspgoag9.ARsj35y', 'narthom', 'xaithany', 'vinetien', '78387878', '914144499:AAGQ7JlxaN0PZd3yT2G-kBdywKRjLwnz-G4', '1020975496');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hitory`
--

CREATE TABLE `tb_hitory` (
  `id` int(11) NOT NULL,
  `loginDate` datetime NOT NULL,
  `logoutDate` datetime NOT NULL,
  `text` varchar(200) NOT NULL,
  `userId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_hitory`
--

INSERT INTO `tb_hitory` (`id`, `loginDate`, `logoutDate`, `text`, `userId`, `adminId`) VALUES
(246, '2020-02-12 00:49:35', '2020-02-12 00:50:28', 'null', 80, 0),
(256, '2020-02-16 15:43:47', '2020-02-16 15:43:51', 'null', 80, 0),
(257, '2020-02-16 16:24:16', '2020-02-16 16:24:18', 'null', 80, 0),
(269, '2020-02-16 19:22:17', '2020-02-16 19:22:20', 'null', 96, 0),
(270, '2020-02-17 19:22:37', '2020-02-17 19:22:39', 'null', 96, 0),
(271, '2020-02-17 19:27:52', '2020-02-17 19:34:22', 'null', 0, 3),
(272, '2020-02-17 20:36:14', '2020-02-17 21:23:20', 'null', 0, 3),
(273, '2020-02-17 21:23:33', '2020-02-17 21:38:29', 'null', 0, 3),
(274, '2020-02-17 21:38:33', '2020-02-17 21:39:21', 'null', 0, 3),
(275, '2020-02-17 21:39:25', '2020-02-17 21:42:36', 'null', 0, 3),
(276, '2020-02-17 21:42:40', '2020-02-17 21:47:46', 'null', 0, 3),
(281, '2020-02-17 22:38:58', '2020-02-17 22:39:01', 'null', 96, 0),
(283, '2020-02-17 23:09:40', '2020-02-17 23:09:42', 'null', 96, 0),
(284, '2020-02-17 23:09:49', '2020-02-17 23:09:51', 'null', 96, 0),
(285, '2020-02-17 23:09:57', '2020-02-17 23:10:00', 'null', 96, 0),
(288, '2020-02-18 00:13:52', '2020-02-18 00:13:54', 'null', 96, 0),
(291, '2020-02-18 00:25:14', '2020-02-18 00:25:15', 'null', 97, 0),
(292, '2020-02-18 00:25:19', '2020-02-18 00:56:47', 'null', 0, 3),
(293, '2020-02-18 00:57:19', '2020-02-18 00:58:26', 'null', 0, 3),
(294, '2020-02-18 01:11:30', '2020-02-18 01:12:47', 'null', 0, 3),
(295, '2020-02-18 01:13:09', '2020-02-18 01:13:16', 'null', 0, 2),
(296, '2020-02-18 01:14:03', '2020-02-18 01:14:05', 'null', 0, 2),
(297, '2020-02-18 01:29:20', '2020-02-18 01:29:24', 'null', 0, 3),
(298, '2020-02-18 01:32:55', '2020-02-18 01:32:58', 'null', 0, 3),
(299, '2020-02-18 01:33:05', '2020-02-18 01:33:08', 'null', 0, 3),
(300, '2020-02-18 01:33:25', '2020-02-18 01:33:27', 'null', 96, 0),
(301, '2020-02-18 01:34:33', '2020-02-18 01:34:35', 'null', 96, 0),
(302, '2020-02-18 01:37:40', '2020-02-18 01:37:43', 'null', 0, 3),
(303, '2020-02-18 01:45:58', '2020-02-18 01:46:00', 'null', 0, 3),
(304, '2020-02-18 01:47:26', '2020-02-18 01:48:40', 'null', 0, 3),
(305, '2020-02-19 13:28:47', '2020-02-19 14:05:26', 'null', 0, 3),
(306, '2020-02-19 21:01:58', '2020-02-19 21:04:29', 'null', 0, 3),
(307, '2020-02-19 21:04:33', '0000-00-00 00:00:00', 'null', 0, 3),
(308, '2020-02-19 21:05:11', '0000-00-00 00:00:00', 'null', 0, 3),
(309, '2020-02-19 21:05:44', '0000-00-00 00:00:00', 'null', 0, 3),
(310, '2020-02-19 21:05:59', '0000-00-00 00:00:00', 'null', 0, 3),
(311, '2020-02-19 21:06:27', '0000-00-00 00:00:00', 'null', 0, 3),
(312, '2020-02-19 21:07:39', '0000-00-00 00:00:00', 'null', 0, 3),
(313, '2020-02-19 21:08:07', '0000-00-00 00:00:00', 'null', 0, 3),
(314, '2020-02-19 21:08:19', '2020-02-19 21:10:43', 'null', 0, 3),
(315, '2020-02-19 21:10:47', '2020-02-19 21:15:01', 'null', 0, 3),
(316, '2020-02-19 21:15:05', '2020-02-19 21:15:41', 'null', 0, 3),
(317, '2020-02-19 21:15:44', '2020-02-19 21:19:07', 'null', 0, 3),
(318, '2020-02-19 21:19:52', '2020-02-19 21:19:58', 'null', 0, 3),
(319, '2020-02-19 21:47:53', '2020-02-19 21:48:49', 'null', 0, 3),
(320, '2020-02-19 21:51:10', '2020-02-19 21:51:19', 'null', 0, 3),
(321, '2020-02-19 21:52:08', '2020-02-19 21:52:22', 'null', 0, 3),
(322, '2020-02-19 21:52:53', '2020-02-19 21:53:05', 'null', 0, 3),
(323, '2020-02-19 21:54:26', '2020-02-19 21:54:38', 'null', 0, 3),
(324, '2020-02-19 21:55:00', '2020-02-19 21:55:05', 'null', 0, 3),
(325, '2020-02-19 21:56:08', '2020-02-19 21:56:11', 'null', 0, 3),
(326, '2020-02-19 21:57:06', '0000-00-00 00:00:00', 'null', 0, 3),
(327, '2020-02-19 21:59:07', '0000-00-00 00:00:00', 'null', 0, 3),
(328, '2020-02-19 21:59:36', '2020-02-19 21:59:50', 'null', 0, 3),
(329, '2020-02-19 22:06:00', '0000-00-00 00:00:00', 'null', 0, 3),
(330, '2020-02-21 13:12:55', '0000-00-00 00:00:00', 'null', 0, 3),
(331, '2020-02-21 19:43:37', '2020-02-21 20:28:09', 'null', 0, 3),
(332, '2020-02-21 20:28:17', '2020-02-21 21:31:16', 'null', 0, 3),
(333, '2020-02-21 21:31:26', '0000-00-00 00:00:00', 'null', 0, 3),
(334, '2020-02-23 20:56:53', '2020-02-23 20:57:14', 'null', 0, 3),
(335, '2020-03-16 19:03:02', '0000-00-00 00:00:00', 'null', 0, 3),
(336, '2020-03-18 17:04:11', '2020-03-18 17:05:21', 'null', 0, 3),
(337, '2020-03-23 12:33:55', '2020-03-23 12:35:13', 'null', 0, 3),
(338, '2020-03-23 12:35:30', '2020-03-23 12:35:39', 'null', 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `create` varchar(100) NOT NULL,
  `modifydate` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `adminApprovedDate` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `adminApproved` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`userid`, `name`, `lastname`, `email`, `password`, `phone`, `create`, `modifydate`, `img`, `token`, `role`, `adminApprovedDate`, `village`, `City`, `Province`, `adminApproved`) VALUES
(80, 'lar', 'lar', 'lar55@lar.com', '$2y$10$sPZ91Ewf.xfxNxs.VW//K.YMkMM6BZMf6ckHSLlDdwyx0x2N0H50u', ' 99887766', ' 0000-00-00', '0000-00-00', 'lar', '$2y$10$2eDYUa9SCj0uIGDLjzLbcu002zWjOQm0htLXT4Bn2yq4sKlCEkPW.', 'user', '2020-02-07 16:04:47', 'dsafasd', 'saddd', 'ffdf', 'admin'),
(96, 'khamlar', 'chanthavong', 'khamlar@khamlar.com', '$2y$10$XRgXaIirHCthfIpROmg0FebhmM81DQxQEX.D9.66Y7a.17pSJvtdK', ' 99887766', ' 2020-02-17 19:21:22', '00:00:00', 'dFQROr7oWzulq5FZYAdIUsZbhUGSJNuE1PgraX04G2xp6kJyhTyS9D3nerViEuA0y74.jpg', '$2y$10$qbrKFB.ntHA5OQGMkbaJ8OkPcvfi2Ai9EXwXHdsrbry9U4WK3CdCi', 'user', '2020-02-17 19:21:56', 'ww', 'www', 'www', 'admin'),
(97, 'xx', 'xxx', 'xx@xx.com', '$2y$10$/Kz0YPWv.Km2W2BBwsECFeYk7p62F8j7AsRknEKoXPS0BWpcZf2.q', ' 11223344', ' 2020-02-18 00:24:31', '00:00:00', 'Screen Shot 2020-02-10 at 21.16.57.png', '$2y$10$i7JZ8YkOfSwFQTo./4ICwuOHchagVjsP.wuK89ai4/lUZuMl4ujdy', 'user', '2020-02-18 00:24:56', 'xx', 'xx', 'xxx', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_userReques`
--

CREATE TABLE `tb_userReques` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `create` datetime NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `role` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_userReques`
--

INSERT INTO `tb_userReques` (`id`, `name`, `lname`, `email`, `password`, `phone`, `create`, `img`, `role`, `village`, `City`, `Province`) VALUES
(96, 'larrrrr', 'ffffff', 'larxxx@gmail.com', '123456', '1212', '2020-02-19 22:05:08', 'lol.png', 'user', 'sss', 'sss', 'sss'),
(120, 'ggggg', 'ffffff', 'larxxx@gmail.com', '123456', '1212', '2020-02-19 22:05:08', 'lol.png', 'user', 'sss', 'sss', 'sss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tb_hitory`
--
ALTER TABLE `tb_hitory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tb_userReques`
--
ALTER TABLE `tb_userReques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_hitory`
--
ALTER TABLE `tb_hitory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_userReques`
--
ALTER TABLE `tb_userReques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
