-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 03:13 PM
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
('res00000024', 'sch000003', '2025-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  ADD KEY `reserve_id` (`reserve_id`,`schedule_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserve_detail`
--
ALTER TABLE `reserve_detail`
  ADD CONSTRAINT `reserve_detail_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`),
  ADD CONSTRAINT `reserve_detail_ibfk_2` FOREIGN KEY (`reserve_id`) REFERENCES `reserve` (`reserve_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
