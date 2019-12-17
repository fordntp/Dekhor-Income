-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 12:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dekhor`
--

-- --------------------------------------------------------

--
-- Table structure for table `dekhor_category`
--

CREATE TABLE `dekhor_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category_type` enum('IN','OUT','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `category_icon` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category_theme` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'btn-light',
  `category_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dekhor_category`
--

INSERT INTO `dekhor_category` (`id`, `user_id`, `category_name`, `category_type`, `category_icon`, `category_theme`, `category_color`) VALUES
(1, 0, 'อาหาร', 'OUT', 'fas fa-utensils', 'yellow', '#ffcc00'),
(2, 0, 'บิล', 'OUT', 'fas fa-bolt', 'deepskyblue', '#00BFFF'),
(3, 0, 'เดินทาง', 'OUT', 'fas fa-taxi', 'lime', '#2DDAA6'),
(4, 0, 'ช้อปปิ้ง', 'OUT', 'fa fa-shopping-cart', 'orange', '#FF792C'),
(5, 0, 'การศึกษา', 'OUT', 'fas fa-graduation-cap', 'sandybrown', '#F4A460'),
(6, 0, 'สุขภาพ', 'OUT', 'fas fa-briefcase-medical', 'hotpink', '#FF69B4'),
(7, 0, 'ท่องเที่ยว', 'OUT', 'fas fa-plane', 'mediumpurple', '#9370DB'),
(8, 0, 'งาน', 'OUT', 'fas fa-laptop', 'limegreen', '#77DE65'),
(9, 0, 'หนังสือ', 'OUT', 'fas fa-book', 'thistle', '#D8BFD8'),
(10, 0, 'ปาร์ตี้', 'OUT', 'fas fa-beer', 'goldenrod', '#DAA520'),
(11, 0, 'เกม', 'OUT', 'fas fa-gamepad', 'red', '#ff5050'),
(12, 0, 'อื่น ๆ', 'OUT', 'fas fa-ellipsis-h', 'salmon', '#FA8072'),
(13, 0, 'เงินเดือน', 'IN', 'fas fa-wallet', 'mediumpurple', '#9370DB'),
(14, 0, 'เงินสัปดาห์', 'IN', 'fas fa-calendar', 'yellow', '#ffcc00'),
(15, 0, 'รายได้เสริม', 'IN', 'fas fa-bolt', 'lime', '#2DDAA6'),
(16, 0, 'ขายของ', 'IN', 'fas fa-hand-holding-usd', 'deepskyblue', '#00BFFF'),
(17, 0, 'ลงทุน', 'IN', 'fas fa-chart-line', 'limegreen', '#77DE65'),
(18, 0, 'อื่น ๆ', 'IN', 'fas fa-ellipsis-h', 'salmon', '#FA8072');

-- --------------------------------------------------------

--
-- Table structure for table `dekhor_record`
--

CREATE TABLE `dekhor_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('IN','OUT','TRF','') COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `memo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` double(64,2) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dekhor_user`
--

CREATE TABLE `dekhor_user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dekhor_wallet`
--

CREATE TABLE `dekhor_wallet` (
  `id` int(11) NOT NULL,
  `type` enum('bank','wallet','credit','') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double(64,2) NOT NULL DEFAULT 0.00,
  `create_date` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dekhor_category`
--
ALTER TABLE `dekhor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dekhor_record`
--
ALTER TABLE `dekhor_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dekhor_user`
--
ALTER TABLE `dekhor_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dekhor_wallet`
--
ALTER TABLE `dekhor_wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dekhor_category`
--
ALTER TABLE `dekhor_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dekhor_record`
--
ALTER TABLE `dekhor_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dekhor_user`
--
ALTER TABLE `dekhor_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dekhor_wallet`
--
ALTER TABLE `dekhor_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
