-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 02:34 PM
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
-- Database: `wifi_hotspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courses_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courses_id`, `course_name`) VALUES
(6, 'BEED'),
(9, 'BSCRIM'),
(5, 'BSED'),
(8, 'BSHM'),
(4, 'BSIT'),
(7, 'BSTM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `user_log_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT current_timestamp(),
  `logout_time` datetime DEFAULT NULL,
  `data_used_mb` int(11) DEFAULT 0,
  `device_mac` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `user_id` int(11) NOT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gmail` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `year_level` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `voucher_code` varchar(100) DEFAULT NULL,
  `password_generated` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`user_id`, `school_id`, `first_name`, `middle_name`, `last_name`, `gmail`, `contact_number`, `course_name`, `year_level`, `gender`, `user_type`, `voucher_code`, `password_generated`, `status`, `created_at`) VALUES
(4, '2210992', 'Nick Lourence', '', 'Brandares', 'nlbrandares@gmail.com', '09227999000', 'BSIT', '3rd Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-11-27 15:07:48'),
(5, 'c', 'c', 'c', 'c', 'c@gmail.com', '09214801924', 'BSTM', '3rd Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-11-27 15:24:58'),
(6, 'd', 'd', 'd', 'd', 'd@gmail.com', '09227999000', 'BSCRIM', '1st Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-11-29 08:42:02'),
(7, 'e', 'e', 'e', 'e', 'e@gmail.com', '123456', 'BSTM', '4th Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-12-02 10:39:52'),
(8, '2210992', 'Henry', 'D', 'Nacorda', 'rei@gmail.com', '09184502288', 'BSIT', '4th Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-03 16:48:35'),
(11, '12312312', 'Jessabel', 'N', 'Sinambong', 'jessabel@gmail.com', '09223231231', 'BSHM', '3rd Year', 'Female', 'Student', NULL, NULL, 'Active', '2025-12-03 17:24:38'),
(12, '1312442', 'Dex', 'R', 'Arriesgado', 'dex@gmail.com', '0922323134', 'BSIT', '4th Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 06:54:58'),
(13, '12346789', 'jerecho', 'e', 'latosa', 'jerecho@gmail.com', '0972389529', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 07:06:13'),
(14, '823701', 'dummy', 'e', 'dum', 'dummy@gmail.com', '098272352', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 07:09:00'),
(15, '12312312', 'Jessabel', 'N', 'Sinambong', 'jessabel@gmail.com', '09223231231', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 09:38:46'),
(16, '12346789', 'jerecho', 'e', 'latosa', 'dex@gmail.com', '0922323134', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 09:44:54'),
(17, '11431434', 'GIL', 'b', 'arda', 'ARDA@gmail.com', '0922424222', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-04 10:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `user_profile_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `used_at` datetime DEFAULT NULL,
  `time_limit_minutes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`user_profile_id`, `id`, `code`, `used`, `created_at`, `used_at`, `time_limit_minutes`) VALUES
(14, 41, 'CEC - WIFI HOTSPOT - 361006d', 0, '2025-12-04 15:19:28', NULL, 0),
(15, 42, 'CEC - WIFI HOTSPOT - 553a8bc', 0, '2025-12-04 17:38:52', NULL, 0),
(16, 43, 'CEC - WIFI HOTSPOT - 9844cd0', 0, '2025-12-04 17:45:12', NULL, 0),
(17, 44, 'CEC - WIFI HOTSPOT - 479d7fe', 0, '2025-12-04 18:10:03', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courses_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`) USING HASH,
  ADD KEY `user_profile_id` (`user_profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`user_profile_id`) REFERENCES `users_profile` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
