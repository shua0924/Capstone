-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 06:08 PM
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
(1, '1231123123', 'a', 'a', 'a', 'a@gmail.com', '123123123213', 'BSED', '2nd Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-11-27 13:14:57'),
(2, 'a', 'a', 'a', 'a', 'aa@gmail.com', 'a', 'BSED', '3rd Year', 'Female', 'Student', NULL, NULL, 'Active', '2025-11-27 13:21:07'),
(3, 'b', 'b', 'b', 'b', 'b@gmail.com', '123', 'BSTM', '4th Year', 'Female', 'Student', NULL, NULL, 'Active', '2025-11-27 14:34:42'),
(4, '2210992', 'Nick Lourence', '', 'Brandares', 'nlbrandares@gmail.com', '09227999000', 'BSIT', '3rd Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-11-27 15:07:48'),
(5, 'c', 'c', 'c', 'c', 'c@gmail.com', '09214801924', 'BSTM', '3rd Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-11-27 15:24:58'),
(6, 'd', 'd', 'd', 'd', 'd@gmail.com', '09227999000', 'BSCRIM', '1st Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-11-29 08:42:02'),
(7, 'e', 'e', 'e', 'e', 'e@gmail.com', '123456', 'BSTM', '4th Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-12-02 10:39:52'),
(8, '2210992', 'Henry', 'D', 'Nacorda', 'rei@gmail.com', '09184502288', 'BSIT', '4th Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-03 16:48:35'),
(9, 'f', 'f', 'f', 'f', 'f@gmail.com', '213123', 'BEED', '1st Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-12-03 16:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `student_id` int(11) NOT NULL,
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

INSERT INTO `vouchers` (`student_id`, `id`, `code`, `used`, `created_at`, `used_at`, `time_limit_minutes`) VALUES
(0, 23, 'CEC - WIFI HOTSPOT - 4824527', 0, '2025-12-04 00:35:00', NULL, 0),
(0, 24, 'CEC - WIFI HOTSPOT - 131c19d', 0, '2025-12-04 00:35:02', NULL, 0),
(0, 25, 'CEC - WIFI HOTSPOT - 1988c47', 0, '2025-12-04 00:47:00', NULL, 0),
(0, 26, 'CEC - WIFI HOTSPOT - 3972c92', 0, '2025-12-04 00:57:38', NULL, 0),
(0, 27, 'CEC - WIFI HOTSPOT - 6319e4f', 0, '2025-12-04 00:58:17', NULL, 0);

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
  ADD UNIQUE KEY `code` (`code`) USING HASH;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
