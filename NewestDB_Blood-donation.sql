-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 05:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_level` char(1) NOT NULL,
  `admin_organization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_level`, `admin_organization`) VALUES
('admin0001', 'admin1', '123', 'A', 'ผู้ดูแลระบบ'),
('admin0002', 'admin2', '123', 'M', 'โรงพยาบาลกรุงเทพ');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` varchar(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_address`) VALUES
('loc000001', 'โรงพยาบาลพญาไท', 'detail'),
('loc000002', 'โรงพยาบาล A-ชื่อสถานที่', 'รายละเอียด-สถานที่'),
('loc000003', 'ไบเทคบางนา', 'จังหวัดกรุงเทพ Hall3-1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(11) NOT NULL,
  `member_fname` varchar(50) NOT NULL,
  `member_lname` varchar(50) NOT NULL,
  `member_birth_date` date NOT NULL,
  `member_tel` varchar(10) NOT NULL,
  `member_cardID` varchar(13) NOT NULL,
  `member_address` varchar(150) NOT NULL,
  `member_blood_type` varchar(2) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_fname`, `member_lname`, `member_birth_date`, `member_tel`, `member_cardID`, `member_address`, `member_blood_type`, `member_email`, `member_password`) VALUES
('1', 'somchai', 'ทอง', '2017-02-01', '0985463314', '1', 'asd', 'B', 'ki1233@gmail.com', '1234567'),
('mem0000001', 'watcharin', 'kenuti', '2025-02-09', '0985463214', '2', '', 'A', 'bossgoog123@gmail.com', '123'),
('mem0000002', 'john', 'deptt', '2016-02-02', '0123456666', '3', '', 'A', '6614210011@mut.ac.th', '1234567'),
('mem0000003', 'anakin', 'sky', '2008-02-05', '0333225333', '4', '4', 'A', 'kirito_159852@hotmail.com', '123'),
('mem0000004', 'robert', 'DW', '2005-02-01', '0999999666', '5', '5', 'A', 'asddd@gmail.com', 'asd123456'),
('mem0000005', 'วิเชียร', 'ดีเด่', '1995-02-02', '0123222255', '6', '', 'O', 'asd_a@htomail.com', '33asd33'),
('mem0000006', 'Default First Name', 'Default Last Name', '2000-01-01', '0123456789', '7', '', 'A', 'default@example.com', 'defaultpassword');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserve_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reserve_status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `reserve_date`, `reserve_status`, `member_id`) VALUES
('res00000001', '2025-02-08 19:30:49', 'D', '1'),
('res00000002', '2025-02-09 22:08:55', 'D', 'mem0000001'),
('res00000003', '2025-02-09 22:10:06', 'D', '1'),
('res00000004', '0000-00-00 00:00:00', 'C', 'mem0000006'),
('res00000005', '2025-03-25 00:00:00', 'C', 'mem0000006'),
('res00000006', '2024-03-28 18:42:11', 'C', 'mem0000006'),
('res00000007', '2025-03-26 18:55:24', 'C', 'mem0000006'),
('res00000008', '2025-03-26 19:00:01', 'C', 'mem0000006'),
('res00000009', '2025-03-26 19:01:58', 'C', 'mem0000006'),
('res00000010', '2025-03-26 19:03:41', 'C', 'mem0000006'),
('res00000011', '2025-03-26 19:17:39', 'C', 'mem0000006'),
('res00000012', '2025-03-26 19:19:25', 'C', 'mem0000006'),
('res00000013', '2025-03-26 19:21:03', 'C', 'mem0000006'),
('res00000014', '2025-03-26 19:37:07', 'C', 'mem0000006'),
('res00000015', '2025-03-26 19:40:06', 'C', 'mem0000006'),
('res00000016', '2025-03-26 19:41:45', 'C', 'mem0000006'),
('res00000017', '2025-03-27 16:11:01', 'C', 'mem0000006'),
('res00000018', '2025-03-27 16:14:22', 'C', 'mem0000006'),
('res00000019', '2025-03-27 16:17:34', 'C', 'mem0000006'),
('res00000020', '2025-03-27 16:18:33', 'C', 'mem0000006'),
('res00000021', '2025-03-29 12:04:00', 'C', 'mem0000006'),
('res00000022', '2025-03-29 19:25:40', 'C', 'mem0000006'),
('res00000023', '2025-03-29 19:31:03', 'C', 'mem0000006'),
('res00000024', '2025-03-29 19:55:43', 'C', 'mem0000006'),
('res00000025', '2025-04-06 11:25:12', 'W', 'mem0000006');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_detail`
--

CREATE TABLE `reserve_detail` (
  `reserve_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserve_donation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve_detail`
--

INSERT INTO `reserve_detail` (`reserve_id`, `schedule_id`, `reserve_donation_date`) VALUES
('res00000001', 'sch00000001', '2025-02-03'),
('res00000002', 'sch00000001', '2025-02-03'),
('res00000003', 'sch000002', '2025-02-03'),
('res00000004', 'sch00000001', '2025-03-11'),
('res00000005', 'sch00000001', '2025-03-11'),
('res00000006', 'sch00000001', '2025-03-11'),
('res00000007', 'sch000003', '2025-03-27'),
('res00000008', 'sch000003', '2025-03-27'),
('res00000009', 'sch000003', '2025-03-28'),
('res00000010', 'sch000003', '2025-03-27'),
('res00000011', 'sch000003', '2025-03-26'),
('res00000012', 'sch000003', '2025-03-26'),
('res00000013', 'sch000003', '2025-03-27'),
('res00000014', 'sch000003', '2025-03-26'),
('res00000015', 'sch000003', '2025-03-26'),
('res00000016', 'sch000003', '2025-03-26'),
('res00000017', 'sch000003', '2025-03-29'),
('res00000018', 'sch000003', '2025-04-15'),
('res00000019', 'sch000003', '2025-03-28'),
('res00000020', 'sch000003', '2025-03-27'),
('res00000021', 'sch000003', '2025-03-29'),
('res00000022', 'sch000003', '2025-04-02'),
('res00000023', 'sch000003', '2025-03-29'),
('res00000024', 'sch000003', '2025-03-29'),
('res00000025', 'sch000003', '2025-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(11) NOT NULL,
  `schedule_start_date` date NOT NULL,
  `schedule_end_date` date NOT NULL,
  `schedule_start_time` time NOT NULL,
  `schedule_end_time` time NOT NULL,
  `schedule_blood_type` varchar(15) DEFAULT NULL,
  `schedule_status` char(1) NOT NULL,
  `schedule_detail` varchar(255) DEFAULT NULL,
  `location_id` varchar(11) NOT NULL,
  `admin_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_start_date`, `schedule_end_date`, `schedule_start_time`, `schedule_end_time`, `schedule_blood_type`, `schedule_status`, `schedule_detail`, `location_id`, `admin_id`) VALUES
('sch00000001', '2025-03-03', '2025-05-15', '18:00:00', '23:00:00', 'A,B,AB', 'D', 'ติดต่อโทร1001 รายละเอียด\r\nรายละเอียดของกำหนดการ\r\n', 'loc000001', 'admin0001'),
('sch000002', '2025-02-11', '2025-04-25', '19:38:00', '19:38:00', 'O', 'E', 'จำเป็นต้องมาถึงในเวลาที่กำหนด [รายละเอียดกำหนดการ] ', 'loc000002', 'admin0001'),
('sch000003', '2025-03-13', '2025-04-15', '13:11:00', '13:13:00', 'A,B,AB,O', 'E', 'asdasd', 'loc000001', 'admin0001'),
('sch000004', '2025-03-07', '2025-06-27', '08:33:00', '08:37:00', 'A,B', 'E', 'ชั้น9', 'loc000001', 'admin0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_email` (`member_email`),
  ADD UNIQUE KEY `member_cardID` (`member_cardID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  ADD KEY `reserve_id` (`reserve_id`,`schedule_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  ADD CONSTRAINT `reserve_detail_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`),
  ADD CONSTRAINT `reserve_detail_ibfk_2` FOREIGN KEY (`reserve_id`) REFERENCES `reserve` (`reserve_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
