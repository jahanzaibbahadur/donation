-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 04:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `regip` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `lastip` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `banned` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `active`, `regip`, `regdate`, `lastlogin`, `lastip`, `level`, `banned`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'jazzy', '$2y$10$pCqbhIeA2yZTzalQLs5s5eNfngW9EI3MZbxqlXlKfjfL39prTqrpG', 'jazzy@gmail.com', 1, '::1', '2017-08-10 01:20:18', '2017-08-10 01:20:18', '::1', 0, 0, 0, '0000-00-00 00:00:00', '2017-08-10 01:20:18', '2017-10-27 18:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `payment_profiles`
--

CREATE TABLE `payment_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `card_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `card_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `payment_profiles`
--

INSERT INTO `payment_profiles` (`id`, `user_id`, `payment_id`, `card_type`, `card_number`, `created_at`, `updated_at`) VALUES
(2, 1, '1502219752', 'Visa', '1111', '2017-10-30 19:04:37', '2017-10-30 14:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `txid` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `amount` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `recurring` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `donated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `user_id`, `payment_id`, `txid`, `amount`, `recurring`, `donated_at`) VALUES
(2, 1, '1523427676', '40366651767', '2.00', NULL, '2017-10-15 22:30:23'),
(3, 1, '1523427676', '40367576265', '1.00', NULL, '2017-10-16 11:26:16'),
(4, 1, '1523427676', '40368644868', '1.00', NULL, '2017-10-16 18:47:12'),
(5, 1, '1502219752', '40008019023', '5.00', NULL, '2017-10-30 20:00:45'),
(6, 1, '1502219752', '40008019198', '5.00', NULL, '2017-10-30 20:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sender_number` varchar(30) NOT NULL,
  `SMS_url` varchar(255) NOT NULL,
  `SMS_user` varchar(255) NOT NULL,
  `SMS_password` varchar(255) NOT NULL,
  `MERCHANT_LOGIN_ID` varchar(40) NOT NULL,
  `MERCHANT_TRANSACTION_KEY` varchar(40) NOT NULL,
  `RESPONSE_OK` varchar(40) NOT NULL,
  `SUBSCRIPTION_ID_GET` varchar(40) NOT NULL,
  `TRANS_ID` varchar(40) NOT NULL,
  `SAMPLE_AMOUNT` float NOT NULL,
  `comp_name` varchar(30) NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `comp_phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sender_number`, `SMS_url`, `SMS_user`, `SMS_password`, `MERCHANT_LOGIN_ID`, `MERCHANT_TRANSACTION_KEY`, `RESPONSE_OK`, `SUBSCRIPTION_ID_GET`, `TRANS_ID`, `SAMPLE_AMOUNT`, `comp_name`, `comp_address`, `comp_phone`) VALUES
(1, '+12056058513', 'https://api.catapult.inetwork.com/v1/users/u-fvpckk7vxx7yycmj4bvfnoq/messages/', 't-yq3tzec4sogatryfj65cata', 'yfuxuozo62s2exevv7ttqhmdith4ct6mn2c3npa', '66BB6xppD8qM', '656XnVC7p9S2yxhj', 'Ok', '2930242', '2238968786', 2.23, 'Masjid Abu Hurairah', 'Masjid Abu Hurairah  at 3296 Westerville Rd, Columbus, OH 43224', '(614) 207-2552');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone_num` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `verify` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `state` varchar(255) CHARACTER SET latin1 NOT NULL,
  `zip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `profileid` varchar(40) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone_num`, `email`, `verify`, `password`, `firstname`, `lastname`, `mobile`, `address`, `city`, `state`, `zip`, `profileid`, `created_at`, `updated_at`) VALUES
(1, '1-234-567-89', 'aliraza@gmail.com', '', '$2y$10$SliB7FPLIo72mUA2xexK0.bz4ArvQmzK6uMXhQWp2N4O0RgMAn29i', 'Ali', 'Raza', '1-234-567-89', 'Houston', 'Houston', 'Texas', '12345', '1502673012', '0000-00-00 00:00:00', '2017-10-29 07:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_profiles`
--
ALTER TABLE `payment_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_profiles`
--
ALTER TABLE `payment_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
