-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 07.23
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Aghna Mumtaz', 'L', '082326423807', 'Komplek Dutamas Fatmawati Blok B2/26, Cipete Utara, Kebayoran Baru', '2021-08-17 15:27:52', '2021-08-17 10:33:33'),
(3, 'Raline Qairina Yasmin', 'P', '082326423807', 'Komplek Dutamas Fatmawati Blok B2/26, Cipete Utara, Kebayoran Baru', '2021-08-17 15:34:10', '2021-08-17 10:34:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_categories`
--

CREATE TABLE `p_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_categories`
--

INSERT INTO `p_categories` (`category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirt', '2021-08-17 16:25:59', '2021-08-17 11:26:09'),
(5, 'Shoes', '2021-08-17 16:37:40', '2021-08-17 13:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_items`
--

CREATE TABLE `p_items` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `names` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_units`
--

CREATE TABLE `p_units` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_units`
--

INSERT INTO `p_units` (`unit_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', '2021-08-17 16:25:59', '2021-08-17 13:07:32'),
(5, 'Lusin', '2021-08-17 16:37:40', '2021-08-17 13:12:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mazriza Store', '082328423807', 'Bandung', 'ATK', '2021-08-16 11:55:54', '2021-08-16 06:54:13'),
(2, 'Alivess Store', '082326423807', 'Jakarta', 'Clothing', '2021-08-16 11:55:54', '2021-08-16 06:54:13'),
(4, 'DJK Store', '082326423333', 'Ciwaruga', NULL, '2021-08-16 15:05:32', '2021-08-17 13:09:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1 admin, 2 kasir',
  `is_active` int(1) NOT NULL COMMENT '1 active, 0 non active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `address`, `level`, `is_active`) VALUES
(5, 'irsyad', '$2y$10$0lvkpHwzfd.rv1Ok.WvsM.rGrvlLK3qS45tJjORhg2WNtpzhAzKzq', 'Irsyad Al Fahriza', 'irsyad@gmail.com', 'Brebes, Indonesia', 1, 1),
(9, 'sasa', '$2y$10$vNxuyxzTqKkM/XZhN5donuivu4l2SV7x7PWkFKhtqY2dVpbG6xaI2', 'Safira Rizki Anindya', 'safira.rizkianindya@gmail.com', 'Medan, indonesia', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `p_categories`
--
ALTER TABLE `p_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `p_items`
--
ALTER TABLE `p_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `p_units`
--
ALTER TABLE `p_units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `p_categories`
--
ALTER TABLE `p_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `p_items`
--
ALTER TABLE `p_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `p_units`
--
ALTER TABLE `p_units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_items`
--
ALTER TABLE `p_items`
  ADD CONSTRAINT `p_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_categories` (`category_id`),
  ADD CONSTRAINT `p_items_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_units` (`unit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
