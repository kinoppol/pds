-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2019 at 06:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `lgs_site_config`
--

CREATE TABLE `lgs_site_config` (
  `config_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `detail` text NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lgs_site_config`
--

INSERT INTO `lgs_site_config` (`config_name`, `detail`, `lastUpdate`) VALUES
('siteName', 'Legal Group System : ระบบงานกลุ่มนิติการ', '2019-08-16 15:02:53'),
('siteURL', 'http://localhost/lgs', '2019-08-16 14:46:46'),
('subName', 'LGS', '2019-08-16 14:47:22'),
('theme', 'admin4b', '2019-07-14 13:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `lgs_user_data`
--

CREATE TABLE `lgs_user_data` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `register_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `user_type` enum('admin','staff','advisor','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lgs_user_data`
--

INSERT INTO `lgs_user_data` (`id`, `firstname`, `lastname`, `email`, `password`, `school_id`, `active`, `register_time`, `last_login`, `user_type`) VALUES
(1, 'นพพล', 'อินศร', 'i.noppol@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 'Y', '2019-07-18 01:52:34', '2019-08-16 23:09:10', 'admin'),
(3, 'นพพล', 'อินศร', 'noppol.ins@bncc.ac.th', 'e10adc3949ba59abbe56e057f20f883e', '1310096201', 'Y', '2019-07-18 07:42:49', '2019-07-18 10:19:54', 'user'),
(4, 'สมชาย', 'สบายดี', 's@m.c', '25d55ad283aa400af464c76d713c07ad', '1396106401', 'Y', '2019-07-18 11:02:00', '2019-08-16 23:07:22', 'user'),
(5, 'สมชาย', 'สบายดี', 'sc@m.c', 'e10adc3949ba59abbe56e057f20f883e', '1320026101', 'Y', '2019-07-18 11:47:53', '2019-07-18 11:56:10', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lgs_site_config`
--
ALTER TABLE `lgs_site_config`
  ADD PRIMARY KEY (`config_name`),
  ADD UNIQUE KEY `config_name` (`config_name`);

--
-- Indexes for table `lgs_user_data`
--
ALTER TABLE `lgs_user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lgs_user_data`
--
ALTER TABLE `lgs_user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
