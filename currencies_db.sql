-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 01:26 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `currencies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `action` enum('No action','Apply a 2% discount','Send an Email Notification') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No action',
  `total_amount_discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1428928635),
('m130524_201442_init', 1428928646);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `operation` enum('Purchase','Pay') COLLATE utf8_unicode_ci NOT NULL,
  `currency` enum('USD','GBP','EUR','KES') COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `surcharge` double NOT NULL,
  `amount` double NOT NULL,
  `calculated_amount` double NOT NULL,
  `total_surcharged_amount` double NOT NULL,
  `surcharge_amount` double NOT NULL,
  `final_amount` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` enum('ZAR','USD','GBP','EUR','KES') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ZAR',
  `to` enum('USD','GBP','EUR','KES') COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `surcharge` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `time`, `from`, `to`, `rate`, `surcharge`) VALUES
(1, '2017/11/24 15:58:05', 'ZAR', 'USD', 0.0715564, 7.5),
(2, '2017/11/24 17:09:48', 'ZAR', 'GBP', 0.0536412, 5),
(3, '2015-06-24T14:10:57+02:00', 'ZAR', 'EUR', 0.0736, 5),
(4, '2017/11/24 15:44:58', 'ZAR', 'KES', 7.374358, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `active_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recover_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `active_hash`, `password`, `recover_hash`, `email`, `active`, `first_name`, `last_name`, `remember_identifier`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '', '$2y$10$FbS5kNwPJOVpRS.6xE9Y.eOQMbC/qCL8dtj47OpCzqLfv6FMrQsIu', NULL, 'scele6@gmail.com', 1, 'Siyanda', 'Cele', 'RMX2PXJI+Yz4lsOgasyLn9RdZhP3L2ta5QVXmjv32t2mqxraNiVO/0+iApLW5ol8WMjivsaAj8HDVQLKkcKPHI1388jLytcUV2hVGAFJZub9SRVH6bH0mZ6/ux7vI22R', 'd576659ed2a62d2e1c7cab730dc13ac882c8557bfe20b26ada8b035a84f93066', '2017-11-23 12:41:10', '2017-11-26 01:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`), ADD KEY `userid` (`user_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
