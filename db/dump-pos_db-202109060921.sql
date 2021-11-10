-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2021 pada 04.21
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
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_items`
--

INSERT INTO `p_items` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(3, 'TINE10', 'Work is Never End', 1, 1, 120000, 36, 'item-210818-6b1a4fa124.jpg', '2021-08-18 14:54:42', '2021-08-18 15:18:42'),
(5, 'TINE09', 'Time is Never End', 1, 1, 120000, 24, 'item-210818-e9274b3762.jpg', '2021-08-18 15:04:18', '2021-08-18 15:26:31'),
(10, 'TINE11', 'Wasting Time', 1, 1, 120000, 0, 'item-210818-c843ea1b3f.jpg', '2021-08-18 19:46:32', NULL),
(13, 'C21001', 'Alivess Collection I', 1, 1, 100000, 12, 'item-210819-9f7634ca97.jpg', '2021-08-19 17:39:58', '2021-08-19 12:40:57'),
(14, 'C21002', 'Alivess Collection II', 1, 1, 100000, 0, 'item-210819-419d5c5ab7.jpg', '2021-08-19 17:40:37', NULL),
(15, 'C21003', 'Alivess Collection III', 1, 1, 100000, 0, 'item-210819-6ac8671670.jpg', '2021-08-19 17:41:35', NULL),
(16, 'C21004', 'Alivess Collection IV', 1, 1, 100000, 24, 'item-210819-8cdc63c02e.jpg', '2021-08-19 17:42:15', NULL),
(17, 'C21005', 'Alivess Collection V', 1, 1, 100000, 0, 'item-210819-7174ffe48d.jpg', '2021-08-19 17:42:40', NULL),
(18, 'C21006', 'Alivess Collection VI', 1, 1, 100000, 0, 'item-210819-476271cddd.jpg', '2021-08-19 17:43:16', NULL),
(19, 'C21007', 'Alivess Collection VII', 1, 1, 100000, 0, 'item-210819-882c16ea4c.jpg', '2021-08-19 17:43:54', NULL),
(20, 'C21008', 'Alivess Collection VII', 1, 1, 100000, 0, 'item-210819-cdddda39ef.jpg', '2021-08-19 17:44:31', '2021-08-19 13:37:43');

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
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `type` enum('in','out') DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created_at`, `user_id`) VALUES
(1, 3, 'in', 'Konveksi', NULL, 24, '2021-09-03', NULL, NULL),
(2, 3, 'in', 'Konveksi', NULL, 24, '2021-09-03', NULL, NULL),
(3, 5, 'in', 'Konveksi', 4, 24, '2021-09-03', '0000-00-00 00:00:00', NULL),
(4, 3, 'in', 'Konveksi', NULL, 12, '2021-09-03', NULL, NULL),
(5, 13, 'in', 'Konveksi', 2, 12, '2021-09-03', '2021-09-03 08:43:54', NULL),
(6, 16, 'in', 'Garment', 1, 24, '2021-09-03', '2021-09-03 08:57:01', NULL);

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
  ADD UNIQUE KEY `barcode` (`barcode`),
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
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `t_stock_FK_1` (`supplier_id`),
  ADD KEY `t_stock_FK` (`item_id`),
  ADD KEY `t_stock_FK_2` (`user_id`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_FK` FOREIGN KEY (`item_id`) REFERENCES `p_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_FK_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`),
  ADD CONSTRAINT `t_stock_FK_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
