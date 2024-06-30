-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2024 pada 07.15
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `currencies`
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
-- Dumping data untuk tabel `currencies`
--

INSERT INTO `currencies` (`id`, `game_id`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diamond', '💎', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(2, 2, 'UC', 'UC', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(3, 3, 'Diamond', '💎', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(4, 4, 'Genesis Crystal', 'GC', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(5, 5, 'Valorant Points', 'VP', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(6, 6, 'COD Points', 'CP', '2024-06-30 05:09:30', '2024-06-30 05:09:30'),
(7, 6, 'Riot Points', 'CP', '2024-06-30 05:09:30', '2024-06-30 05:09:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `games`
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
-- Struktur dari tabel `packages`
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
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `currency_id`, `name`, `amount`, `price`, `bonus_amount`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paket Pemula', 50, 10000.00, 5, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(2, 1, 'Paket Starlight', 360, 70000.00, 30, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(3, 2, 'Paket Klasik', 60, 15000.00, 0, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(4, 2, 'Paket Elite', 325, 75000.00, 25, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(5, 3, 'Paket Harian', 100, 20000.00, 10, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(6, 3, 'Paket Mingguan', 500, 90000.00, 50, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(7, 4, 'Welkin Moon', 300, 75000.00, 90, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(8, 4, 'Gnostic Hymn', 980, 240000.00, 680, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(9, 5, 'Paket Kecil', 475, 50000.00, 0, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42'),
(10, 5, 'Paket Besar', 11000, 1000000.00, 1250, 1, '2024-06-30 05:10:42', '2024-06-30 05:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `names` (`names`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `currencies`
--
ALTER TABLE `currencies`
  ADD CONSTRAINT `currencies_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Ketidakleluasaan untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
