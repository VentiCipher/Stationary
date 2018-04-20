-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 12:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationary`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `users_id`, `products_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 1, '2018-04-19 15:16:54', '2018-04-19 21:54:31'),
(6, 1, 1, 6, '2018-04-19 21:49:50', '2018-04-19 22:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `createby`, `description`, `created_at`, `updated_at`) VALUES
(1, 'เครื่องเขียน', 'promsurinm@hotmail.com', 'เครื่องเขียน เช่น ปากกา สมุด กระเป๋า', '2018-04-19 14:53:59', '2018-04-19 14:53:59'),
(2, 'กระเป๋าใส่อุปกรณ์', 'promsurinm@hotmail.com', 'กระเป๋าใส่เครื่องเขียนต่างๆ', '2018-04-19 14:54:18', '2018-04-19 14:54:18'),
(3, 'สมุด', 'promsurinm@hotmail.com', 'สมุด หนังสือ', '2018-04-19 14:54:25', '2018-04-19 14:54:25'),
(4, 'ปากกา', 'promsurinm@hotmail.com', 'ดินสอ ปากกา ชนิดต่างๆ', '2018-04-19 14:54:36', '2018-04-19 14:54:36'),
(5, 'ชุดเครื่องเขียน', 'promsurinm@hotmail.com', 'ชุดเครื่องเขียน', '2018-04-19 14:58:18', '2018-04-19 14:58:18'),
(6, 'อุปกรณ์สำนักงาน', 'promsurinm@hotmail.com', 'สำนักงาน', '2018-04-19 15:03:16', '2018-04-19 15:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `matcher`
--

CREATE TABLE `matcher` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matcher`
--

INSERT INTO `matcher` (`id`, `products_id`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 3, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 4, 3, NULL, NULL),
(11, 4, 4, NULL, NULL),
(12, 4, 5, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 5, 4, NULL, NULL),
(15, 6, 1, NULL, NULL),
(16, 6, 3, NULL, NULL),
(19, 8, 6, NULL, NULL),
(20, 9, 1, NULL, NULL),
(21, 9, 4, NULL, NULL),
(22, 9, 5, NULL, NULL),
(23, 9, 6, NULL, NULL),
(27, 11, 1, NULL, NULL),
(28, 11, 2, NULL, NULL),
(29, 11, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_06_062958_create_products', 1),
(4, '2018_04_06_070440_create_categories', 1),
(5, '2018_04_06_070655_create_matcher', 1),
(6, '2018_04_06_071651_create_carts', 1),
(7, '2018_04_10_092438_create_images_table', 1),
(8, '2018_04_10_144036_create_wishlist_table', 1),
(9, '2018_04_11_084231_create_productinfo_table', 1),
(10, '2018_04_06_071651_create_subscribers', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `price_promo` double DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbsnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `in_stock`, `description`, `price`, `price_promo`, `color`, `createby`, `promotion_id`, `thumbsnail`, `created_at`, `updated_at`) VALUES
(1, 'ปากกาซูมิโกะ', 120, 'Sumikko Gurashi From JAPAN', 25, 20, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (2).jpg', '2018-04-19 14:55:52', '2018-04-20 03:21:08'),
(2, 'ยางลบ Sumikko Gurashi', 100, NULL, 15, NULL, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (3).jpg', '2018-04-19 14:56:32', '2018-04-20 03:21:26'),
(3, 'สมุด Sumikko Gurashi', 10, 'สมุดแท้จากญี่ปุ่น', 80, 69, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (4).jpg', '2018-04-19 14:57:18', '2018-04-20 03:21:42'),
(4, 'ชุดเครื่องเขียน Sumikko Gurashi', 10, 'รวมเซ็ตเครื่องเขียนสุดน่ารัก', 370, 349, 'ตามแบบ', 'promsurinm@hotmail.com', 'SUMIK123', 'dealers/promsurinm@hotmail.com/1 (4).jpg', '2018-04-19 14:58:07', '2018-04-20 03:22:07'),
(5, 'ปากกา Rilakkuma', 0, 'ปากกาแท้จาก Sanrio X', 40, NULL, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (1).jpg', '2018-04-19 15:01:35', '2018-04-20 03:22:33'),
(6, 'สมุด Rilakkuma', 4, 'สมุดแท้จากญี่ปุ่น', 80, 79, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (5).jpg', '2018-04-19 15:02:29', '2018-04-20 03:22:57'),
(8, 'เครื่องคิดเลข Rilakkuma', 3, NULL, 280, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (7).jpg', '2018-04-19 15:03:45', '2018-04-20 03:23:17'),
(9, 'เซ็ตปากกา Rilakkuma', 10, NULL, 129, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (19).jpg', '2018-04-19 15:04:31', '2018-04-20 03:23:42'),
(11, 'กระเป๋า Rilakkuma', 4, NULL, 129, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (21).jpg', '2018-04-20 03:24:33', '2018-04-20 03:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `users_id`, `products_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(11, 1, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_images`
--

CREATE TABLE `p_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_images`
--

INSERT INTO `p_images` (`id`, `products_id`, `path`, `createby`, `created_at`, `updated_at`) VALUES
(16, 1, 'dealers/promsurinm@hotmail.com/1 (2).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:20:59', '2018-04-20 03:20:59'),
(17, 2, 'dealers/promsurinm@hotmail.com/1 (3).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:21:22', '2018-04-20 03:21:22'),
(18, 3, 'dealers/promsurinm@hotmail.com/1 (4).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:21:37', '2018-04-20 03:21:37'),
(19, 4, 'dealers/promsurinm@hotmail.com/1 (2).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:01', '2018-04-20 03:22:01'),
(20, 4, 'dealers/promsurinm@hotmail.com/1 (3).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:01', '2018-04-20 03:22:01'),
(21, 4, 'dealers/promsurinm@hotmail.com/1 (4).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:01', '2018-04-20 03:22:01'),
(22, 5, 'dealers/promsurinm@hotmail.com/1 (1).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:29', '2018-04-20 03:22:29'),
(23, 6, 'dealers/promsurinm@hotmail.com/1 (5).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(24, 6, 'dealers/promsurinm@hotmail.com/1 (11).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(25, 6, 'dealers/promsurinm@hotmail.com/1 (16).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(26, 8, 'dealers/promsurinm@hotmail.com/1 (7).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:12', '2018-04-20 03:23:12'),
(27, 8, 'dealers/promsurinm@hotmail.com/1 (22).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:12', '2018-04-20 03:23:12'),
(28, 9, 'dealers/promsurinm@hotmail.com/1 (6).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:36', '2018-04-20 03:23:36'),
(29, 9, 'dealers/promsurinm@hotmail.com/1 (17).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:37', '2018-04-20 03:23:37'),
(30, 9, 'dealers/promsurinm@hotmail.com/1 (19).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:37', '2018-04-20 03:23:37'),
(31, 11, 'dealers/promsurinm@hotmail.com/1 (21).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:24:33', '2018-04-20 03:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lineid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `lineid`, `created_at`, `updated_at`) VALUES
(1, 'promsurinm@hotmail.com', 'promsurin', '2018-04-19 15:45:10', '2018-04-19 15:45:10'),
(3, 'ininaw@gmail.com', NULL, '2018-04-19 22:06:08', '2018-04-19 22:06:08'),
(4, 'GG@gmail.com', NULL, '2018-04-19 22:10:02', '2018-04-19 22:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profilepic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_approve` tinyint(1) NOT NULL DEFAULT '0',
  `shopname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `address`, `phonenumber`, `gender`, `age`, `email`, `birthdate`, `paymentcard`, `roles`, `password`, `profilepic`, `dealer_approve`, `shopname`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Promsurin', 'Phutthammawong', NULL, NULL, 'male', 20, 'promsurinm@hotmail.com', '1997-09-03', NULL, 'admin', '$2y$10$gx1e8Kbvrh6635ZMZG0tSeiqvbXumPpiZ.IHvAX1TS2YLmoY13TTq', NULL, 0, 'SUMIKKO BKK', '5kijFAOhIlaWbx1pHP50lgA0TvtZXOdUZHWaeFzSAvLm52uh2i44SCjS0o3O', '2018-04-19 14:50:58', '2018-04-19 14:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `users_id`, `products_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2018-04-19 22:15:53', '2018-04-19 22:15:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_id_unique` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_id_unique` (`id`);

--
-- Indexes for table `matcher`
--
ALTER TABLE `matcher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matcher_id_unique` (`id`),
  ADD KEY `matcher_products_id_foreign` (`products_id`),
  ADD KEY `matcher_categories_id_foreign` (`categories_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_id_unique` (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_info_users_id_foreign` (`users_id`),
  ADD KEY `product_info_products_id_foreign` (`products_id`);

--
-- Indexes for table `p_images`
--
ALTER TABLE `p_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_images_id_unique` (`id`),
  ADD KEY `p_images_products_id_foreign` (`products_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_shopname_unique` (`shopname`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_users_id_foreign` (`users_id`),
  ADD KEY `wishlists_products_id_foreign` (`products_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matcher`
--
ALTER TABLE `matcher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p_images`
--
ALTER TABLE `p_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matcher`
--
ALTER TABLE `matcher`
  ADD CONSTRAINT `matcher_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matcher_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_info_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_images`
--
ALTER TABLE `p_images`
  ADD CONSTRAINT `p_images_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
