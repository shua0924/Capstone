-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 09:36 AM
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
(8, '2210992', 'Henry', 'D', 'Nacorda', 'rei@gmail.com', '09184502288', 'BSIT', '4th Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-03 16:48:35'),
(26, '12346789', 'Jessabel', 'N', 'Sinambong', 'jessabel@gmail.com', '0922323134', 'BSHM', '3rd Year', 'Female', 'Student', NULL, '$2y$10$ugK41MagMZZ8mRz74VL7veFQxWApXZdzo4ZQsaG.gicbXj0mP57ZC', 'Active', '2025-12-07 09:17:26'),
(32, '12312312', 'jerecho', 'N', 'Sinambong', 'dex@gmail.com', '0922323134', 'BSIT', '1st Year', 'Female', 'Student', NULL, '$2y$10$osNhrn82NwtpPavpjHsO0.z5VDi34p21xRSKmsWcyVd6kOP.JywGy', 'Active', '2025-12-07 15:07:10'),
(33, '1312442', 'Jessabel', 'e', 'Sinambong', 'dex@gmail.com', '09223231231', 'BSED', '1st Year', 'Other', 'Student', NULL, NULL, 'Active', '2025-12-07 15:07:22'),
(36, '12312312', 'jerecho', 'b', 'Arriesgado', 'jerecho@gmail.com', '0972389529', 'BSED', '2nd Year', 'Female', 'Student', NULL, '$2y$10$osNhrn82NwtpPavpjHsO0.z5VDi34p21xRSKmsWcyVd6kOP.JywGy', 'Active', '2025-12-07 15:21:00'),
(41, '12312312', 'Joshua', 'B', 'Caballes', 'joshuacaballes@gmail.com', '0923231412', 'BSIT', '4th Year', 'Male', 'Student', NULL, '$2y$10$osNhrn82NwtpPavpjHsO0.z5VDi34p21xRSKmsWcyVd6kOP.JywGy', 'Active', '2025-12-10 05:34:00'),
(44, '12312312', 'qqw', 'e', 'Arriesgado', 'dex@gmail.com', '09223231231', 'BSIT', '1st Year', 'Male', 'Student', NULL, NULL, 'Active', '2025-12-11 03:38:21');

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
(26, 50, 'CEC - WIFI HOTSPOT - 5262b15', 0, '2025-12-07 22:29:32', NULL, 0),
(8, 54, 'CEC - WIFI HOTSPOT - 3079155', 0, '2025-12-07 23:06:43', NULL, 0),
(33, 55, 'CEC - WIFI HOTSPOT - 2797da9', 0, '2025-12-07 23:15:01', NULL, 0),
(41, 65, 'CEC - WIFI HOTSPOT - 1631a68', 0, '2025-12-10 13:54:00', NULL, 0),
(41, 69, 'CEC - WIFI HOTSPOT - 465bede', 0, '2025-12-11 11:13:21', NULL, 0),
(41, 72, 'CEC - WIFI HOTSPOT - 112c268', 0, '2025-12-11 11:33:03', NULL, 0);

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
  ADD KEY `vouchers_ibfk_1` (`user_profile_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
