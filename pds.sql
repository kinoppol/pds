-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 09:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pds`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL COMMENT 'รหัสเรื่องร้องเรียน',
  `receive_code` varchar(50) NOT NULL DEFAULT '0' COMMENT 'เลขรับเรื่อง/ธุรการ',
  `level_confidential` varchar(50) NOT NULL DEFAULT '0' COMMENT 'ชั้นความรับ',
  `complaint_code` varchar(50) NOT NULL DEFAULT '0' COMMENT 'หมายเลขเรื่องร้องเรียน',
  `subject` varchar(200) NOT NULL COMMENT 'ชื่อเรื่องร้องเรียน',
  `source_id` int(11) NOT NULL COMMENT 'รหัสแหล่งที่มาของเรื่องร้องเรียน',
  `owner_id` int(11) UNSIGNED NOT NULL COMMENT 'รหัสเจ้าของสำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `receive_code`, `level_confidential`, `complaint_code`, `subject`, `source_id`, `owner_id`) VALUES
(1, '1', 'ลับมาก', '1', 'sadsfdg', 1, 1),
(2, '2', 'ลับที่สุด', '2', 'lKJHKGJFHG', 1, 1),
(3, '3', 'ลับมาก', '3', 'KLJKHGJFHGD', 1, 1),
(4, '', 'ลับ', '', '', 1, 1),
(5, '', 'ลับ', '', '', 1, 1),
(6, '', 'ลับ', '', '', 1, 1),
(7, '', 'ลับ', '', '', 1, 1),
(8, '111', 'ลับมาก', '8', 'asdfghjkl', 3, 1),
(9, '1119', 'ลับ', '12', 'knlkm bjnj', 1, 1),
(10, '9', 'ลับ', '89', 'jhkjnlm;,\'.', 1, 1),
(11, '123', 'ลับ', '5678', 'qwertyuiop[', 1, 1),
(12, '123', 'ลับที่สุด', '123456er7t8989', 'อยากกินไก่ทอด', 1, 2),
(13, '456', 'ลับที่สุด', '23456789', 'หนังสือเรียน', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_timeline`
--

CREATE TABLE `complaint_timeline` (
  `id` int(11) NOT NULL COMMENT 'รหัสความคืบหน้า',
  `complaint_id` int(11) DEFAULT NULL COMMENT 'รหัสเรื่องร้องเรียน',
  `step_id` int(11) DEFAULT NULL COMMENT 'รหัสขั้นตอน',
  `date_step` date DEFAULT NULL COMMENT 'วันที่เข้าสู่ขั้นตอน',
  `time_limit` date DEFAULT NULL COMMENT 'กำหนดเวลา(วัน)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ขั้นตอนการรับเรื่องร้องเรียนและสืบพยาน';

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_action`
--

CREATE TABLE `disciplinary_action` (
  `id` int(11) NOT NULL COMMENT 'รหัสโทษ',
  `action_name` varchar(50) NOT NULL DEFAULT '0' COMMENT 'ชื่อ',
  `action_type` enum('high','low') NOT NULL DEFAULT 'low' COMMENT 'ระดับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='โทษทางวินัย';

--
-- Dumping data for table `disciplinary_action`
--

INSERT INTO `disciplinary_action` (`id`, `action_name`, `action_type`) VALUES
(1, 'ภาคฑันฑ์', 'low'),
(2, 'ตัดเงินเดือน', 'low'),
(3, 'ลดขั้นเงินเดือน', 'low'),
(4, 'ปลดออก', 'high'),
(5, 'ไล่ออก', 'high');

-- --------------------------------------------------------

--
-- Table structure for table `investigate`
--

CREATE TABLE `investigate` (
  `id` int(11) NOT NULL COMMENT 'รหัสการสอบสวน',
  `complaint_id` int(11) DEFAULT NULL COMMENT 'รหัสการร้องเรียน',
  `subject` varchar(50) DEFAULT NULL COMMENT 'เรื่อง',
  `investigate_type` enum('unfounded','light_punishment','punishment') NOT NULL DEFAULT 'light_punishment' COMMENT 'ประเภทการสอบสวน',
  `result` varchar(100) DEFAULT NULL COMMENT 'ผลการสอบสวน',
  `appeal` enum('Y','N') DEFAULT 'N' COMMENT 'การอุทธรณ์',
  `undecided_case_code` varchar(50) DEFAULT NULL COMMENT 'หมายเลขคดีดำ',
  `decided_case_code` varchar(50) DEFAULT NULL COMMENT 'หมายเลขคดีแดง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='การสอบสวน';

-- --------------------------------------------------------

--
-- Table structure for table `investigate_timeline`
--

CREATE TABLE `investigate_timeline` (
  `id` int(11) NOT NULL COMMENT 'รหัสความคืบหน้า',
  `investigate_id` int(11) DEFAULT NULL COMMENT 'รหัสการสอบสวน',
  `step_id` int(11) DEFAULT NULL COMMENT 'รหัสขั้นตอน',
  `date_step` date DEFAULT NULL COMMENT 'วันที่เข้าสู่ขั้นตอน',
  `time_limit` int(11) DEFAULT NULL COMMENT 'กำหนดระยะเวลา (วัน)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ขั้นตอนการสืบสวน' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL COMMENT 'รหัสบุคลากร',
  `citizen_id` varchar(20) DEFAULT NULL COMMENT 'เลขประจำตัวประชาชน',
  `fname` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(50) DEFAULT NULL COMMENT 'สกุล',
  `position` varchar(200) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `email` varchar(50) DEFAULT NULL COMMENT 'อีเมล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `citizen_id`, `fname`, `lname`, `position`, `email`) VALUES
(1, '0000000000001', 'ผู้ดูแลระบบ', '-', 'ผู้จัดการระบบ', 'admin.pds@vec.go.th'),
(2, '0000000000002', 'เจ้าหน้าที่ธุรการ', '-', 'เจ้าหน้าที่', 'staff.pds@vec.go.th'),
(3, '0000000000003', 'นิติกร', '-', 'นิติกร', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `config_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `detail` text NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`config_name`, `detail`, `lastUpdate`) VALUES
('siteName', 'Personnel Discipline Subdivision : กลุ่มงานวินัย', '2019-08-23 09:32:50'),
('siteURL', 'http://localhost/pds', '2019-08-18 08:46:58'),
('subName', 'PDS', '2019-08-18 08:47:05'),
('theme', 'admin4b', '2019-07-14 13:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL COMMENT 'รหัสแหล่งที่มา',
  `source_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อแหล่งที่มา',
  `source_type` enum('anonymous_letter','external_org','website') DEFAULT NULL COMMENT 'ประเภทของแหล่งที่มา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='แหล่งที่มาของเรื่องร้องเรียน';

-- --------------------------------------------------------

--
-- Table structure for table `step_data`
--

CREATE TABLE `step_data` (
  `id` int(11) NOT NULL COMMENT 'รหัสขั้นตอนดำเนินการ',
  `step_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อขั้นตอน',
  `time_limit` int(11) DEFAULT '7' COMMENT 'ระยะเวลา(จำนวนวันภายในกำหนด)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ขั้นตอนการดำเนินการ';

--
-- Dumping data for table `step_data`
--

INSERT INTO `step_data` (`id`, `step_name`, `time_limit`) VALUES
(1, 'รับเรื่องร้องเรียน', 7),
(2, 'แต่งตั้งคณะกรรมการสืบสวน', 30),
(3, 'ประชุมคณะกรรมการสืบสวน', 30),
(4, 'ดำเนินการสืบสวน', 7),
(5, 'ประชุมพิจารณาพยาน', 7),
(6, 'แต่งตั้งกรรมการสอบสวน', 7),
(7, 'จัดทำรายงานการสอบสวน (ผิดวินัยไม่ร้ายแรง)', 90),
(8, 'จัดทำรายงานการสอบสวน (ผิดวินัยร้ายแรง)', 240),
(9, 'ขยายเวลา (ไม่ร้ายแรง) ครั้งที่ 1', 30),
(10, 'ขยายเวลา (ไม่ร้ายแรง) ครั้งที่ 2', 30),
(11, 'ขยายเวลา (ร้ายแรง) ครั้งที่ 1', 60),
(12, 'ขยายเวลา (ร้ายแรง) ครั้งที่ 2', 60),
(13, 'ขยายเวลาตาม อกคศ.', 0),
(14, 'เสร็จสิ้น', 0),
(15, 'ยื่นอุทธรณ์', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `username` varchar(50) DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(32) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `personal_id` int(11) DEFAULT NULL COMMENT 'รหัสบุคลากร',
  `active` enum('Y','N','B') NOT NULL DEFAULT 'Y' COMMENT 'เปิดใช้งาน',
  `user_type` enum('admin','advisor',' lawyer','staff','user') NOT NULL DEFAULT 'user' COMMENT 'ประเภทผู้ใช้',
  `last_login` datetime DEFAULT NULL COMMENT 'ลงชื่อเข้าใช้ครั้งสุดท้าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `password`, `personal_id`, `active`, `user_type`, `last_login`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1, 'Y', 'admin', '2019-08-23 17:39:55'),
(2, 'staff', '25d55ad283aa400af464c76d713c07ad', 2, 'Y', 'staff', '2019-08-24 08:23:34'),
(3, 'pds01', '25d55ad283aa400af464c76d713c07ad', 3, 'Y', ' lawyer', '2019-08-24 14:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE `witness` (
  `id` int(11) NOT NULL COMMENT 'รหัสพยาน',
  `complaint_id` int(11) DEFAULT NULL COMMENT 'รหัสเรื่องร้องเรียน',
  `witness_code` varchar(50) DEFAULT NULL COMMENT 'หมายเลขพยาน',
  `witness_type` enum('person','document','object') DEFAULT NULL COMMENT 'ประเภทพยาน บุคคล เอกสาร หรือวัตถุ',
  `file_location` enum('person','document','object') DEFAULT NULL COMMENT 'ที่อยู่ไฟล์พยาน',
  `description` text COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='พยาน';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_timeline`
--
ALTER TABLE `complaint_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigate`
--
ALTER TABLE `investigate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigate_timeline`
--
ALTER TABLE `investigate_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citizen_id` (`citizen_id`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`config_name`),
  ADD UNIQUE KEY `config_name` (`config_name`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step_data`
--
ALTER TABLE `step_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `witness`
--
ALTER TABLE `witness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `witness_code` (`witness_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเรื่องร้องเรียน', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `complaint_timeline`
--
ALTER TABLE `complaint_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสความคืบหน้า';

--
-- AUTO_INCREMENT for table `disciplinary_action`
--
ALTER TABLE `disciplinary_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโทษ', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `investigate`
--
ALTER TABLE `investigate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการสอบสวน';

--
-- AUTO_INCREMENT for table `investigate_timeline`
--
ALTER TABLE `investigate_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสความคืบหน้า';

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบุคลากร', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแหล่งที่มา';

--
-- AUTO_INCREMENT for table `step_data`
--
ALTER TABLE `step_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสขั้นตอนดำเนินการ', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `witness`
--
ALTER TABLE `witness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพยาน';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
