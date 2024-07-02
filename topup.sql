-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 11:34 AM
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
-- Database: `topup`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `game_id`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diamond - ml', '💎', '2024-06-30 05:09:30', '2024-06-30 07:14:27'),
(2, 2, 'UC', 'UC', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(3, 3, 'Diamond - ff', '💎', '2024-06-30 05:09:30', '2024-06-30 07:14:34'),
(4, 4, 'Genesis Crystal', 'GC', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(5, 5, 'Valorant Points', 'VP', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(6, 6, 'COD Points', 'CP', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(7, 6, 'Riot Points', 'CP', '2024-06-30 05:09:30', '2024-06-30 05:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `names`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Legends: Bang Bang', 'https://example.com/mlbb.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(2, 'PUBG Mobile', 'https://example.com/pubg.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(3, 'Free Fire', 'https://example.com/freefire.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(4, 'Genshin Impact', 'https://example.com/genshin.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(5, 'Valorant', 'https://example.com/valorant.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(6, 'Call Of Duty', 'https://example.com/codm.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24'),
(7, 'League Of Legend', 'https://example.com/lol.jpg', '2024-06-30 05:06:24', '2024-06-30 05:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `bonus_amount` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `currency_id`, `name`, `amount`, `price`, `bonus_amount`, `is_active`, `created_at`, `updated_at`) VALUES
(125, 6, '321 COD Points', 321, 45000.00, 0, 1, '2024-07-02 04:22:54', '2024-07-02 04:22:54'),
(126, 1, '925 Diamond Mobile Legends', 925, 99700.00, 0, 1, '2024-07-02 04:23:12', '2024-07-02 04:23:12'),
(127, 7, '1400 Riot Points', 1400, 150500.00, 0, 1, '2024-07-02 04:25:34', '2024-07-02 04:25:34'),
(128, 7, '775 Riot Points', 775, 86000.00, 0, 1, '2024-07-02 04:26:14', '2024-07-02 04:26:14'),
(129, 6, '645 COD Points', 645, 90000.00, 0, 1, '2024-07-02 04:29:12', '2024-07-02 04:29:12'),
(130, 7, '775 Riot Points', 775, 86000.00, 0, 1, '2024-07-02 04:32:56', '2024-07-02 04:32:56'),
(131, 7, '775 Riot Points', 775, 86000.00, 0, 1, '2024-07-02 04:34:24', '2024-07-02 04:34:24'),
(132, 7, '775 Riot Points', 775, 86000.00, 0, 1, '2024-07-02 04:36:17', '2024-07-02 04:36:17'),
(133, 7, '4600 Riot Points', 4600, 330000.00, 0, 1, '2024-07-02 04:36:31', '2024-07-02 04:36:31'),
(134, 3, '3040 Diamonds Free Fire', 3040, 450500.00, 0, 1, '2024-07-02 04:43:20', '2024-07-02 04:43:20'),
(135, 3, '355 Diamonds Free Fire', 355, 45000.00, 0, 1, '2024-07-02 04:45:27', '2024-07-02 04:45:27'),
(136, 3, ' Diamonds Free Fire', 0, 45000.00, 0, 1, '2024-07-02 04:46:15', '2024-07-02 04:46:15'),
(137, 6, '645 COD Points', 645, 90000.00, 0, 1, '2024-07-02 04:47:55', '2024-07-02 04:47:55'),
(138, 3, '1060 Diamonds Free Fire', 1060, 192000.00, 0, 1, '2024-07-02 04:48:47', '2024-07-02 04:48:47'),
(139, 2, '150 UC', 150, 9000.00, 0, 1, '2024-07-02 04:52:21', '2024-07-02 04:52:21'),
(140, 2, '3850 UC', 3850, 480000.00, 0, 1, '2024-07-02 04:54:01', '2024-07-02 04:54:01'),
(141, 2, '1800 UC', 1800, 240000.00, 0, 1, '2024-07-02 04:54:09', '2024-07-02 04:54:09'),
(142, 5, '925 Valorant Points', 925, 99700.00, 0, 1, '2024-07-02 04:56:43', '2024-07-02 04:56:43'),
(143, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:03:36', '2024-07-02 05:03:36'),
(144, 4, '60 Genesis Crystals', 60, 16000.00, 0, 1, '2024-07-02 05:05:41', '2024-07-02 05:05:41'),
(145, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:08:48', '2024-07-02 05:08:48'),
(146, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:09:39', '2024-07-02 05:09:39'),
(147, 4, '3880 Genesis Crystals', 3880, 799500.00, 0, 1, '2024-07-02 05:12:20', '2024-07-02 05:12:20'),
(148, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:12:38', '2024-07-02 05:12:38'),
(149, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:13:02', '2024-07-02 05:13:02'),
(150, 6, '800 COD Points', 800, 108000.00, 0, 1, '2024-07-02 05:13:20', '2024-07-02 05:13:20'),
(151, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:13:34', '2024-07-02 05:13:34'),
(152, 4, '2240 Genesis Crystals', 2240, 479000.00, 0, 1, '2024-07-02 05:15:40', '2024-07-02 05:15:40'),
(153, 4, '8080 Genesis Crystals', 8080, 1599000.00, 0, 1, '2024-07-02 05:18:54', '2024-07-02 05:18:54'),
(154, 4, ' Genesis Crystals', 0, 0.00, 0, 1, '2024-07-02 05:19:53', '2024-07-02 05:19:53'),
(155, 4, '1090 Genesis Crystals', 1090, 249700.00, 0, 1, '2024-07-02 05:24:13', '2024-07-02 05:24:13'),
(156, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:28:39', '2024-07-02 05:28:39'),
(157, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:29:41', '2024-07-02 05:29:41'),
(158, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:29:45', '2024-07-02 05:29:45'),
(159, 4, 'Blessing of Welkin Moon Genesis Crystals', 0, 79000.00, 0, 1, '2024-07-02 05:31:36', '2024-07-02 05:31:36'),
(160, 4, '8080 Genesis Crystals', 8080, 1599000.00, 0, 1, '2024-07-02 05:31:53', '2024-07-02 05:31:53'),
(161, 4, '60 Genesis Crystals', 60, 16000.00, 0, 1, '2024-07-02 05:32:13', '2024-07-02 05:32:13'),
(162, 5, '625 Valorant Points', 625, 66000.00, 0, 1, '2024-07-02 05:32:46', '2024-07-02 05:32:46'),
(163, 5, '925 Valorant Points', 925, 99700.00, 0, 1, '2024-07-02 05:35:34', '2024-07-02 05:35:34'),
(164, 1, '1125 Diamond Mobile Legends', 1125, 115500.00, 0, 1, '2024-07-02 05:36:26', '2024-07-02 05:36:26'),
(165, 7, '2850 Riot Points', 2850, 301000.00, 0, 1, '2024-07-02 05:36:42', '2024-07-02 05:36:42'),
(166, 3, '5600 Diamonds Free Fire', 5600, 970000.00, 0, 1, '2024-07-02 05:36:54', '2024-07-02 05:36:54'),
(167, 3, '2180 Diamonds Free Fire', 2180, 388000.00, 0, 1, '2024-07-02 05:37:02', '2024-07-02 05:37:02'),
(168, 2, '8100 UC', 8100, 960000.00, 0, 1, '2024-07-02 05:37:16', '2024-07-02 05:37:16'),
(169, 6, '3565 COD Points', 3565, 450000.00, 0, 1, '2024-07-02 05:37:27', '2024-07-02 05:37:27'),
(170, 5, '1425 Valorant Points', 1425, 148500.00, 0, 1, '2024-07-02 05:37:38', '2024-07-02 05:37:38'),
(171, 4, '8080 Genesis Crystals', 8080, 1599000.00, 0, 1, '2024-07-02 05:38:09', '2024-07-02 05:38:09'),
(172, 4, '2240 Genesis Crystals', 2240, 479000.00, 0, 1, '2024-07-02 05:39:07', '2024-07-02 05:39:07'),
(173, 4, '12880 Genesis Crystals', 12880, 2399000.00, 0, 1, '2024-07-02 05:40:56', '2024-07-02 05:40:56'),
(174, 1, '1650 Diamond Mobile Legends', 1650, 165000.00, 0, 1, '2024-07-02 05:56:27', '2024-07-02 05:56:27'),
(175, 1, '1950 Diamond Mobile Legends', 1950, 198000.00, 0, 1, '2024-07-02 05:56:34', '2024-07-02 05:56:34'),
(176, 7, '8250 Riot Points', 8250, 615000.00, 0, 1, '2024-07-02 05:56:45', '2024-07-02 05:56:45'),
(177, 3, '10680 Diamonds Free Fire', 10680, 1920000.00, 0, 1, '2024-07-02 05:56:57', '2024-07-02 05:56:57'),
(178, 2, '4000 UC', 4000, 720000.00, 0, 1, '2024-07-02 05:57:11', '2024-07-02 05:57:11'),
(179, 6, '6480 COD Points', 6480, 800000.00, 0, 1, '2024-07-02 05:57:26', '2024-07-02 05:57:26'),
(180, 5, 'undefined Valorant Points', 0, 0.00, 0, 1, '2024-07-02 05:57:35', '2024-07-02 05:57:35'),
(181, 5, 'undefined Valorant Points', 0, 0.00, 0, 1, '2024-07-02 05:57:40', '2024-07-02 05:57:40'),
(182, 4, '12880 Genesis Crystals', 12880, 2399000.00, 0, 1, '2024-07-02 05:58:35', '2024-07-02 05:58:35'),
(183, 5, '1125 Valorant Points', 1125, 115500.00, 0, 1, '2024-07-02 06:01:14', '2024-07-02 06:01:14'),
(184, 5, 'undefined Valorant Points', 0, 0.00, 0, 1, '2024-07-02 06:02:37', '2024-07-02 06:02:37'),
(185, 5, '10 Valorant Points', 10, 2250.00, 0, 1, '2024-07-02 06:04:33', '2024-07-02 06:04:33'),
(186, 5, '2250 Valorant Points', 2250, 297000.00, 0, 1, '2024-07-02 06:05:24', '2024-07-02 06:05:24'),
(187, 5, '2000 Valorant Points', 2000, 264000.00, 0, 1, '2024-07-02 06:05:33', '2024-07-02 06:05:33'),
(188, 1, '1950 Diamond Mobile Legends', 1950, 198000.00, 0, 1, '2024-07-02 08:01:27', '2024-07-02 08:01:27'),
(189, 7, '6450 Riot Points', 6450, 530000.00, 0, 1, '2024-07-02 08:03:18', '2024-07-02 08:03:18'),
(190, 1, '1650 Diamond Mobile Legends', 1650, 165000.00, 0, 1, '2024-07-02 08:22:31', '2024-07-02 08:22:31'),
(191, 1, ' Diamond Mobile Legends', 0, 0.00, 0, 1, '2024-07-02 09:06:42', '2024-07-02 09:06:42'),
(192, 1, ' Diamond Mobile Legends', 0, 0.00, 0, 1, '2024-07-02 09:07:44', '2024-07-02 09:07:44'),
(193, 1, ' Diamond Mobile Legends', 0, 0.00, 0, 1, '2024-07-02 09:08:20', '2024-07-02 09:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `package_id`, `player_id`, `amount`, `total_price`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(109, 4, 184, 23322111, 0, 0.00, 'pending', 'Mandiri', '2024-07-02 06:02:37', '2024-07-02 06:02:37'),
(110, 4, 185, 2113131231, 10, 2250.00, 'pending', 'BCA', '2024-07-02 06:04:33', '2024-07-02 06:04:33'),
(111, 4, 186, 66666666, 2250, 297000.00, 'pending', 'BCA', '2024-07-02 06:05:24', '2024-07-02 06:05:24'),
(112, 4, 187, 66666666, 2000, 264000.00, 'pending', 'Alfamart', '2024-07-02 06:05:34', '2024-07-02 06:05:34'),
(113, 5, 188, 212121, 1950, 198000.00, 'pending', 'BCA', '2024-07-02 08:01:27', '2024-07-02 08:01:27'),
(114, 5, 189, 215454, 6450, 530000.00, 'pending', 'Mandiri', '2024-07-02 08:03:18', '2024-07-02 08:03:18'),
(115, 5, 190, 5434545, 1650, 165000.00, 'pending', 'BCA', '2024-07-02 08:22:31', '2024-07-02 08:22:31'),
(116, 5, 191, 208267515, 0, 0.00, 'pending', 'Dana', '2024-07-02 09:06:42', '2024-07-02 09:06:42'),
(117, 5, 192, 208267515, 0, 0.00, 'pending', 'Dana', '2024-07-02 09:07:44', '2024-07-02 09:07:44'),
(118, 5, 193, 208267515, 0, 0.00, 'pending', 'Dana', '2024-07-02 09:08:20', '2024-07-02 09:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, '', 'putra', 'putraardi@gmail.com', '1234', 'user', '2024-06-30 06:29:31', '2024-06-30 06:29:31'),
(2, 'lala', 'lulu', 'tes1t@gmail.com', 'lele', 'user', '2024-06-30 07:27:11', '2024-06-30 07:27:11'),
(3, 'Putraa', 'ardi', 'ardi@gmail.com', '1234', 'user', '2024-07-01 08:30:17', '2024-07-01 08:30:17'),
(4, 'lelele', 'lalala', '123@gmail.com', 'lala', 'user', '2024-07-01 09:35:20', '2024-07-01 09:35:20'),
(5, 'produk', 'reee', 'ardi222@gmail.com', '22222', 'user', '2024-07-01 09:41:12', '2024-07-01 09:41:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `names` (`names`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `currencies`
--
ALTER TABLE `currencies`
  ADD CONSTRAINT `currencies_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
