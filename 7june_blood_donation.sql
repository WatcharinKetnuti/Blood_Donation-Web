-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `admin_level` char(1) NOT NULL COMMENT 'A:Administrator, M:ScheduleManage',
  `admin_organization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_level`, `admin_organization`) VALUES
('admin0001', 'admin1', '123', 'A', 'ผู้ดูแลระบบ1'),
('admin0002', 'admin2', '123', 'M', 'โรงพยาบาลกรุงเทพ'),
('admin0003', 'admin3', '123', 'A', 'ทดลอง1'),
('admin0004', 'admin_bangkok', 'password123', 'A', 'กรุงเทพมหานคร สาธารณสุข'),
('admin0005', 'admin_hospital', 'hospital456', 'M', 'โรงพยาบาลจุฬาลงกรณ์'),
('admin0006', 'admin_redcross', 'redcross789', 'A', 'สภากาชาดไทย'),
('admin0007', 'manager_central', 'central123', 'M', 'โรงพยาบาลกลาง'),
('admin0008', 'supervisor_north', 'north456', 'A', 'เครือข่ายภาคเหนือ');

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
('loc000003', 'ไบเทคบางนา', 'จังหวัดกรุงเทพ Hall3-1'),
('loc000004', 'โรงพยาบาลจุฬาลงกรณ์', '1873 ถนนพระราม 4 แขวงปฐุมวัน เขตปฐุมวัน กรุงเทพฯ 10330'),
('loc000005', 'โรงพยาบาลศิริราช', '2 ถนนวังหลัง แขวงศิริราช เขตบางกอกน้อย กรุงเทพฯ 10700'),
('loc000006', 'เซ็นทรัลเวิลด์', '999/9 ถนนพระราม 1 แขวงปฐุมวัน เขตปฐุมวัน กรุงเทพฯ 10330'),
('loc000007', 'มหาวิทยาลัยเกษตรศาสตร์', '50 ถนนงามวงศ์วาน แขวงลาดยาว เขตจตุจักร กรุงเทพฯ 10900'),
('loc000008', 'ห้างสยามพารากอน', '991 ถนนพระราม 1 แขวงปฐุมวัน เขตปฐุมวัน กรุงเทพฯ 10330');

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
('mem0000001', 'watcharin', 'kenuti', '2025-02-09', '0985463214', '2', '', 'A', 'bossgoog123@gmail.com', '123'),
('mem0000002', 'john', 'deptt', '2016-02-02', '0123456666', '3', '', 'A', '6614210011@mut.ac.th', '1234567'),
('mem0000003', 'anakin', 'sky', '2008-02-05', '0333225333', '4', '4', 'A', 'kirito_159852@hotmail.com', '123'),
('mem0000004', 'robert', 'DW', '2005-02-01', '0999999666', '5', '5', 'A', 'asddd@gmail.com', 'asd123456'),
('mem0000005', 'วิเชียร', 'ดีเด่', '1995-02-02', '0123222255', '6', '', 'O', 'asd_a@htomail.com', '33asd33'),
('mem0000006', 'Default First Name', 'Default Last Name', '2000-01-01', '0123456789', '7', '', 'A', 'default@example.com', 'defaultpassword'),
('mem0000007', 'aaa', 'bbb', '2017-05-16', '0123456787', '1259845632015', 'Bangkok', 'B', 'aaa@example.com', '123456'),
('mem0000008', 'bbb', '123', '2021-05-11', '1458698753', '1234567890127', '123 Default St, City, Country', 'A', 'bbb@gmail.com', '123456'),
('mem0000009', 'สมชาย', 'ใจดี', '1990-05-15', '0812345678', '1234567890123', '123 ถนนสุขุมวิท แขวงคลองตัน เขตคลองตัน กรุงเทพฯ 10110', 'A', 'somchai@email.com', 'pass123'),
('mem0000010', 'สมหญิง', 'รักษ์ชาติ', '1985-08-22', '0823456789', '2345678901234', '456 ถนนพระราม 4 แขวงสีลม เขตบางรัก กรุงเทพฯ 10500', 'B', 'somying@email.com', 'pass456'),
('mem0000011', 'วิชัย', 'มั่นคง', '1992-12-10', '0834567890', '3456789012345', '789 ถนนวิภาวดี แขวงจตุจักร เขตจตุจักร กรุงเทพฯ 10900', 'O', 'wichai@email.com', 'pass789'),
('mem0000012', 'นิดา', 'สว่างใส', '1988-03-18', '0845678901', '4567890123456', '321 ถนนลาดพร้าว แขวงลาดพร้าว เขตลาดพร้าว กรุงเทพฯ 10230', 'AB', 'nida@email.com', 'pass101'),
('mem0000013', 'ธนากร', 'เจริญสุข', '1995-07-25', '0856789012', '5678901234567', '654 ถนนรัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310', 'A', 'thanakorn@email.com', 'pass202'),
('mem0000014', 'อรุณี', 'แสงทอง', '1987-11-08', '0867890123', '6789012345678', '987 ถนนพระราม 9 แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพฯ 10310', 'B', 'arunee@email.com', 'pass303'),
('mem0000015', 'ประยุทธ', 'กล้าหาญ', '1993-01-30', '0878901234', '7890123456789', '147 ถนนสาทร แขวงสีลม เขตบางรัก กรุงเทพฯ 10500', 'O', 'prayuth@email.com', 'pass404');

-- --------------------------------------------------------


CREATE TABLE `schedule` (
  `schedule_id` varchar(11) NOT NULL,
  `schedule_start_date` date NOT NULL,
  `schedule_end_date` date NOT NULL,
  `schedule_start_time` time NOT NULL,
  `schedule_end_time` time NOT NULL,
  `schedule_blood_type` varchar(15) DEFAULT NULL,
  `schedule_status` char(1) NOT NULL COMMENT 'E:Enable, D:Disable',
  `schedule_detail` varchar(255) DEFAULT NULL,
  `schedule_max` int(11) NOT NULL,
  `location_id` varchar(11) NOT NULL,
  `admin_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_start_date`, `schedule_end_date`, `schedule_start_time`, `schedule_end_time`, `schedule_blood_type`, `schedule_status`, `schedule_detail`, `schedule_max`, `location_id`, `admin_id`) VALUES
('sch000001', '2025-03-03', '2025-05-15', '18:00:00', '23:00:00', 'A,B,AB', 'D', 'ติดต่อโทร1001 รายละเอียด\r\nรายละเอียดของกำหนดการ\r\n', 1, 'loc000001', 'admin0001'),
('sch000002', '2025-02-11', '2025-04-25', '19:38:00', '22:38:00', 'O', 'D', 'จำเป็นต้องมาถึงในเวลาที่กำหนด [รายละเอียดกำหนดการ] ', 1, 'loc000002', 'admin0001'),
('sch000003', '2025-03-13', '2025-06-30', '13:11:00', '13:13:00', 'A,B,AB,O', 'E', 'asdasd', 1, 'loc000001', 'admin0001'),
('sch000004', '2025-06-01', '2025-07-30', '09:10:00', '10:10:00', 'A,B,O', 'E', 'ชั้น9', 22, 'loc000001', 'admin0001'),
('sch000005', '2025-05-23', '2025-06-30', '09:27:00', '10:27:00', 'A,B,O', 'D', '111', 2, 'loc000001', 'admin0001'),
('sch000006', '2025-01-15', '2025-01-20', '08:00:00', '16:00:00', 'A,B,O,AB', 'E', 'กิจกรรมบริจาคโลหิตประจำเดือน ณ โรงพยาบาลจุฬาฯ กรุณาเตรียมบัตรประชาชน', 50, 'loc000004', 'admin0005'),
('sch000007', '2025-02-01', '2025-02-05', '09:00:00', '17:00:00', 'O,A', 'E', 'รณรงค์บริจาคโลหิตเพื่อผู้ป่วยฉุกเฉิน ต้องการเลือดหมู่ O และ A เป็นพิเศษ', 30, 'loc000005', 'admin0006'),
('sch000008', '2025-02-14', '2025-02-14', '10:00:00', '18:00:00', 'A,B,AB,O', 'E', 'งานบริจาคโลหิตวันวาเลนไทน์ แบ่งปันความรัก แบ่งปันชีวิต ที่เซ็นทรัลเวิลด์', 80, 'loc000006', 'admin0004'),
('sch000009', '2025-03-01', '2025-03-07', '08:30:00', '15:30:00', 'B,AB', 'E', 'กิจกรรมบริจาคโลหิตประจำปี มหาวิทยาลัยเกษตรศาสตร์ เน้นเลือดหมู่ B และ AB', 40, 'loc000007', 'admin0007'),
('sch000010', '2025-03-15', '2025-03-17', '11:00:00', '19:00:00', 'A,O', 'E', 'บริจาคโลหิตช่วยเหลือสังคม ณ สยามพารากอน ร่วมกันช่วยชีวิตผู้ป่วย', 60, 'loc000008', 'admin0008'),
('sch000011', '2025-06-07', '2025-06-16', '11:34:00', '23:37:00', 'A', 'E', '123', 1, 'loc000001', 'admin0001'),
('sch000012', '2025-06-06', '2025-06-12', '11:37:00', '23:37:00', 'A', 'E', '1', 1, 'loc000001', 'admin0003');


--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserve_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reserve_status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'W:wait, D:donated, C,cancel',
  `member_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `reserve_date`, `reserve_status`, `member_id`) VALUES
('res00000001', '2025-01-10 14:30:00', 'C', 'mem0000001'),
('res00000002', '2025-01-12 09:15:00', 'C', 'mem0000002'),
('res00000003', '2025-01-28 16:45:00', 'C', 'mem0000003'),
('res00000004', '2025-02-08 11:20:00', 'C', 'mem0000004'),
('res00000005', '2025-02-10 13:30:00', 'C', 'mem0000005'),
('res00000006', '2025-02-25 10:00:00', 'C', 'mem0000006'),
('res00000007', '2025-02-28 15:15:00', 'C', 'mem0000007'),
('res00000008', '2025-06-07 11:26:38', 'D', 'mem0000006');


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
('res00000001', 'sch000006', '2025-01-16'),
('res00000002', 'sch000006', '2025-01-17'),
('res00000003', 'sch000007', '2025-02-02'),
('res00000004', 'sch000007', '2025-02-03'),
('res00000005', 'sch000008', '2025-02-14'),
('res00000006', 'sch000009', '2025-03-02'),
('res00000007', 'sch000010', '2025-03-16'),
('res00000008', 'sch000004', '2025-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--


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
