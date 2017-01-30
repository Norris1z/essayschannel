-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 11:01 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mutaik_avaessays`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_resets_table', 1),
(63, '2015_10_05_110608_create_messages_table', 1),
(64, '2015_10_05_110622_create_conversations_table', 1),
(65, '2016_11_22_075547_create_roles_table', 1),
(66, '2016_11_22_075643_create_user_role_table', 1),
(67, '2016_11_22_080109_create_orders_table', 1),
(68, '2016_11_22_095135_create_order_user_table', 1),
(69, '2016_11_22_102354_create_files_table', 1),
(70, '2016_12_06_150804_add_paymentstatus_to_orders', 1),
(71, '2016_12_26_222024_create_chat_messages_table', 2),
(72, '2017_01_18_224849_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE IF NOT EXISTS `order_user` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `doctype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available',
  `order_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_pages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spacing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discipline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `citation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_sources` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `ext_rqst` int(11) NOT NULL DEFAULT '0',
  `available` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `removed_order` int(11) NOT NULL DEFAULT '0',
  `confirm` int(11) NOT NULL DEFAULT '0',
  `same_client` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `approvaldate` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `auto_assign` int(11) NOT NULL DEFAULT '0',
  `request_re_assign` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT NULL,
  `client_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `doctype`, `status`, `order_title`, `order_level`, `no_of_pages`, `spacing`, `discipline`, `deadline`, `client_price`, `citation`, `no_of_sources`, `instructions`, `approved`, `paid`, `banned`, `ext_rqst`, `available`, `assigned`, `removed_order`, `confirm`, `same_client`, `order_status`, `approvaldate`, `auto_assign`, `request_re_assign`, `user_id`, `client_id`, `created_at`, `updated_at`, `payment_status`) VALUES
(3, '5', 'Available', 'test order kindly don''t assign', '3', '1', '1', '13', '7', '25.25', '6', '4', 'some cool order description', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-20 18:12:54', '2017-01-20 18:12:54', 'unpaid'),
(4, '5', 'Available', 'ytrewq', '3', '3', '1', '12', '7', '75.74', '6', '4', 'some cool order se\r\n', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-22 09:35:03', '2017-01-22 09:35:03', 'unpaid'),
(5, '5', 'Available', 'ergrewerte', '3', '9', '1', '17', '7', '227.21', '6', '4', 'ertyuiyt', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-22 09:45:44', '2017-01-22 09:45:44', 'unpaid'),
(6, '5', 'Available', 'test order kindly don''t assign', '3', '2', '1', '17', '7', '50.49', '6', '4', 'some cool description', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-22 14:55:43', '2017-01-22 14:55:43', 'unpaid'),
(7, '5', 'Available', 'Here we go', '4', '11', '1', '111', '7', '310.37', '4', '4', 'As Augustine wrestles to get close to God, he finds inward contemplation as a means for transporting his mind to a higher realm. And by looking inwardly, Augustine perceives comes to the realization of ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 13:11:06', '2017-01-23 13:11:06', 'unpaid'),
(8, '12', 'Available', 'Isaacs first order', '2', '7', '1', '103', '8', '164.93', '3', '15', 'geerhfrlhglithi rfrjtljgt5ig frjf;trjgt;ojgy ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 13:16:51', '2017-01-23 13:16:51', 'unpaid'),
(9, '5', 'Available', 'th  dsjsjssk  skksksk ', '2', '1', '1', '15', '10', '20.2', '1', '4', 'hhshshshsb   hsb s s hhshhshs  hhhshs', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 13:23:45', '2017-01-23 13:23:45', 'unpaid'),
(10, '5', 'Available', 'tht hhhf hh', '1', '1', '1', '12', '15', '19.01', '1', '4', 'hf  sh  fjjdjjd hdhhf fhhfjfj', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 22:21:07', '2017-01-23 22:21:07', 'unpaid'),
(11, '3', 'Available', 'Honne   shnndnn  ddd', '1', '1', '1', '15', '15', '19.01', '1', '4', 'thh b fhhf hht  hhrrr', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 22:39:15', '2017-01-23 22:39:15', 'unpaid'),
(12, '5', 'Available', 'Gtrthh  dhhhd  djdjjdjnd ', '1', '1', '1', '12', '15', '19.01', '1', '4', 'Ghet  hdjhdjjn dhhdhdkb ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 23:03:59', '2017-01-23 23:03:59', 'unpaid'),
(13, '5', 'Available', 'hhr r hhhhd', '1', '1', '1', '15', '10', '19.01', '1', '4', 'gdv ff fgfggsdgsssss gvdfdfdf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-23 23:16:00', '2017-01-23 23:16:00', 'unpaid'),
(14, '3', 'Available', 'ergrewerte', '3', '1', '1', '15', '7', '25.25', '6', '4', 'tyrewq', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 13:38:03', '2017-01-25 13:38:03', 'unpaid'),
(15, '5', 'Available', 'ergrewerte', '3', '1', '1', '18', '7', '25.25', '6', '4', 'some cool stuff', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 13:56:03', '2017-01-25 13:56:03', 'unpaid'),
(16, '5', 'Available', 'fguhur', '3', '1', '1', '12', '7', '25.25', '6', '4', 'dfghjgfdsa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 22:44:10', '2017-01-25 22:44:10', 'unpaid'),
(17, '5', 'Available', 'fguhur', '3', '1', '1', '12', '7', '25.25', '6', '4', 'dfghjgfdsa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 22:48:14', '2017-01-25 22:48:14', 'unpaid'),
(18, '5', 'Available', 'fguhur', '3', '1', '1', '12', '7', '25.25', '6', '4', 'dfghjgfdsa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 22:50:18', '2017-01-25 22:50:18', 'unpaid'),
(19, '5', 'Available', 'fguhur', '3', '1', '1', '12', '7', '25.25', '6', '4', 'dfghjgfdsa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 22:54:34', '2017-01-25 22:54:34', 'unpaid'),
(20, '5', 'Available', 'qwertyu', '3', '1', '1', '17', '7', '25.25', '6', '4', 'erttyrewrtyre', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 23:00:59', '2017-01-25 23:00:59', 'unpaid'),
(21, '5', 'Available', 'ndjjdddd', '3', '4', '1', '16', '7', '100.98', '6', '4', 'ajktrertjkhtrew', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 23:03:46', '2017-01-25 23:03:46', 'unpaid'),
(22, '5', 'Available', 'awesome title', '3', '1', '1', '15', '7', '25.25', '6', '4', 'rghjkl;''', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-25 23:17:27', '2017-01-25 23:17:27', 'unpaid'),
(23, '8', 'Available', 'Money test', '3', '1', '1', '52', '14', '20.2', '2', '16', 'More to follow', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-26 00:01:55', '2017-01-26 00:01:55', 'unpaid'),
(24, '5', 'Available', 'grggg', '3', '1', '1', '13', '7', '25.25', '6', '4', 'aerghdfsa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-26 01:12:40', '2017-01-26 01:12:40', 'unpaid'),
(25, '5', 'Available', 'ergrewerte', '3', '1', '1', '15', '7', '25.25', '6', '4', 'shjhkhg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-26 01:14:16', '2017-01-26 01:14:16', 'unpaid'),
(26, '1', 'Available', 'Here we go', '2', '2', '1', '11', '14', '40.39', '5', '20', ' vf vdf vfc bvfbvfbvfbv  vd vdf gv  vdfvfg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-26 01:27:55', '2017-01-26 01:27:55', 'unpaid'),
(27, '5', 'Available', 'test order kindly don''t assign', '3', '1', '', '17', '7', '12.62', '6', '4', 'description', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 9, '2017-01-26 21:11:49', '2017-01-26 21:11:49', 'unpaid'),
(28, '2', 'Available', 'Final test', '2', '5', '', '15', '9', '50.49', '3', '20', 'Bla dbdfbvcr cnbbfbvf cbdf vf ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, NULL, 10, '2017-01-26 21:17:53', '2017-01-26 21:17:53', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('walterokenye@gmail.com', 'cc50a45577c115938604e5330089d9157749b232de75363c29e942f07e3844c7', '2017-01-26 02:14:03'),
('koechisaac4@gmail.com', '0d6f4653fc3aacbfbd8645ce4a088331f6eafc26259e98c95f433dc0e065aaf7', '2017-01-26 18:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'the admin', '2016-12-21 12:47:25', '2016-12-21 12:47:25'),
(2, 'client', 'the client', '2016-12-21 12:47:25', '2016-12-21 12:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, NULL, NULL),
(2, 9, 2, NULL, NULL),
(3, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'ikoech44@gmail.com', '$2y$10$.W6QwyqdrjiA3lzTNp7OE.cFL1e1RjjlImkUc1H4cxsVJDcHnastu', 'YyXcomltnvjZmymtxjMh53UVa0Sihcm2gjbhCfz3kdSlIQ9bqBUohEN8J5N5', '2016-12-21 12:48:58', '2017-01-26 13:45:47'),
(9, 'walter okenye', 'walterokenye@gmail.com', '$2y$10$jfB9kWS6nVOauq9CaD0g2uyMLhHia4eQ9nAQjFQmev4T1jwOSd/c6', 'm3r8xn9J4CAGPKE1lflfUF1HKUULaJzk3RxyNJGGbntYGG999tgRXjwSJj8m', '2016-12-21 12:50:55', '2017-01-26 21:22:59'),
(10, 'isaac', 'koechisaac4@gmail.com', '$2y$10$G3PfPnChFGE8WcpE2ph/xuc60VZRnGiaPr4upB5GN6sCQ2t5HVMCC', 'uDTvKqTvB3AQa3XeZw4d5bLo4AF69Y89UUsKCE2l2OwAOgkZLBaBJ4fUdLqL', '2017-01-20 18:14:39', '2017-01-29 19:49:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`), ADD KEY `files_user_id_foreign` (`user_id`), ADD KEY `files_order_id_foreign` (`order_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`), ADD KEY `orders_user_id_foreign` (`user_id`), ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`), ADD KEY `user_role_user_id_foreign` (`user_id`), ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
ADD CONSTRAINT `files_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
