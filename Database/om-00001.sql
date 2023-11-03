-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 08:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `om-00001`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admins`
--

CREATE TABLE `tb_admins` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `admin_prefix` text NOT NULL,
  `admin_name` text NOT NULL,
  `admin_lastname` text NOT NULL,
  `admin_national_card` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_admins`
--

INSERT INTO `tb_admins` (`user_id`, `username`, `password`, `admin_prefix`, `admin_name`, `admin_lastname`, `admin_national_card`, `add_date`, `update_date`) VALUES
(1, 'admin', '123456', 'Mr.', 'NTC-UnnJai', 'Official', '4695158222417', '2023-11-03 11:26:38', '2023-11-03 11:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_board`
--

CREATE TABLE `tb_board` (
  `id` int(11) NOT NULL,
  `board_name` text NOT NULL,
  `board_detail` text NOT NULL,
  `board_image` text NOT NULL,
  `remark` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_board_reply`
--

CREATE TABLE `tb_board_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `reply_liked` int(11) NOT NULL,
  `add_date` text NOT NULL,
  `update_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_doctor_request`
--

CREATE TABLE `tb_doctor_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `status_th` text NOT NULL DEFAULT 'รอการตอบรับจากหมอ',
  `sign_date` text NOT NULL,
  `remark` text NOT NULL,
  `is_del` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_doctor_request`
--

INSERT INTO `tb_doctor_request` (`id`, `user_id`, `doctor_id`, `status`, `status_th`, `sign_date`, `remark`, `is_del`) VALUES
(1, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 15:28:14', '', 1),
(2, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 15:34:51', '', 1),
(3, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 15:35:52', '', 1),
(4, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 15:38:05', '', 1),
(5, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 16:02:35', '', 1),
(6, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 16:03:00', '', 1),
(7, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 16:03:09', '', 1),
(8, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-02 16:03:11', '', 1),
(9, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-03 09:00:37', '', 1),
(10, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-03 09:01:17', '', 1),
(11, 1, 0, 'waiting', 'รอการตอบรับจากหมอ', '2023-11-03 10:52:06', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_estimate_list`
--

CREATE TABLE `tb_estimate_list` (
  `id` int(11) NOT NULL,
  `estimate_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_estimate_score`
--

CREATE TABLE `tb_estimate_score` (
  `id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `estimate_score` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id` int(11) NOT NULL,
  `view_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id`, `view_date`) VALUES
(1, '2023-11-03 11:42:40'),
(2, '2023-11-03 11:43:04'),
(3, '2023-11-03 14:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_see_doctor_date`
--

CREATE TABLE `tb_see_doctor_date` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `sign_date` text NOT NULL,
  `see_date` text NOT NULL,
  `remark` text NOT NULL,
  `is_del` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_prefix` text NOT NULL,
  `user_name` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_national_card` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_role` text NOT NULL,
  `add_date` text NOT NULL,
  `update_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_prefix`, `user_name`, `user_lastname`, `user_national_card`, `user_birthday`, `user_role`, `add_date`, `update_date`) VALUES
(1, 'Mr.', 'Nontapat', 'Ponharn', '1349901107222', '30/07/2001', 'admin', '2023-11-02 10:19:08', '2023-11-02 10:19:08'),
(4, 'Mr.', 'NonNie', 'Eiei', '1234567890987', '30/08/2001', 'doctor', '2023-11-03 09:31:10', '2023-11-03 09:31:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admins`
--
ALTER TABLE `tb_admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_board`
--
ALTER TABLE `tb_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_board_reply`
--
ALTER TABLE `tb_board_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_doctor_request`
--
ALTER TABLE `tb_doctor_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_estimate_list`
--
ALTER TABLE `tb_estimate_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_estimate_score`
--
ALTER TABLE `tb_estimate_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_see_doctor_date`
--
ALTER TABLE `tb_see_doctor_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admins`
--
ALTER TABLE `tb_admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_board`
--
ALTER TABLE `tb_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_board_reply`
--
ALTER TABLE `tb_board_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_doctor_request`
--
ALTER TABLE `tb_doctor_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_estimate_list`
--
ALTER TABLE `tb_estimate_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_estimate_score`
--
ALTER TABLE `tb_estimate_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_see_doctor_date`
--
ALTER TABLE `tb_see_doctor_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
