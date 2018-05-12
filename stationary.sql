-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 09:29 PM
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
(13, 7, 2, 1, '2018-05-10 07:05:55', '2018-05-10 07:05:55');

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
(6, 'อุปกรณ์สำนักงาน', 'promsurinm@hotmail.com', 'สำนักงาน', '2018-04-19 15:03:16', '2018-04-19 15:03:16'),
(8, 'iyuiop', 'promsurinm@hotmail.com', 'jkl;', '2018-04-21 09:55:17', '2018-04-21 09:55:17');

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
(4, 3, 1, NULL, NULL),
(5, 3, 3, NULL, NULL),
(15, 6, 1, NULL, NULL),
(16, 6, 3, NULL, NULL),
(20, 9, 1, NULL, NULL),
(21, 9, 4, NULL, NULL),
(22, 9, 5, NULL, NULL),
(23, 9, 6, NULL, NULL),
(27, 11, 1, NULL, NULL),
(28, 11, 2, NULL, NULL),
(29, 11, 6, NULL, NULL),
(31, 14, 6, NULL, NULL),
(32, 5, 1, NULL, NULL),
(33, 5, 4, NULL, NULL),
(34, 8, 6, NULL, NULL),
(37, 2, 1, NULL, NULL);

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
(22, '2018_05_04_061939_create_order_pack', 3),
(63, '2018_05_06_120124_create_payments', 4),
(64, '2018_05_08_060355_create_promotion_table', 4),
(65, '2018_05_08_120214_create_order_table', 4),
(66, '2018_04_06_071651_create_subscribers', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `ordercode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payments_id` int(11) DEFAULT NULL,
  `methods` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_cost` double NOT NULL DEFAULT '0',
  `cards` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_pack`
--

CREATE TABLE `order_pack` (
  `id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `methods` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final` double NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `filepath` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `promotion_id` int(11) UNSIGNED DEFAULT NULL,
  `thumbsnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `in_stock`, `description`, `price`, `price_promo`, `color`, `createby`, `promotion_id`, `thumbsnail`, `created_at`, `updated_at`) VALUES
(2, 'ยางลบ Sumikko Gurashi', 85, NULL, 15, 13, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (3).jpg', '2018-04-19 14:56:32', '2018-05-12 09:12:58'),
(3, 'สมุด Sumikko Gurashi', 2, 'สมุดแท้จากญี่ปุ่น', 80, 69, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (4).jpg', '2018-04-19 14:57:18', '2018-05-12 09:18:13'),
(5, 'ปากกา Rilakkuma', 5, 'ปากกาแท้จาก Sanrio X', 40, NULL, 'ตามแบบ', 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (1).jpg', '2018-04-19 15:01:35', '2018-05-12 09:06:00'),
(6, 'สมุด Rilakkuma', 22, 'สมุดแท้จากญี่ปุ่น', 80, 79, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (5).jpg', '2018-04-19 15:02:29', '2018-05-10 06:57:10'),
(8, 'เครื่องคิดเลข Rilakkuma', 10, NULL, 280, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (7).jpg', '2018-04-19 15:03:45', '2018-05-12 12:12:27'),
(9, 'เซ็ตปากกา Rilakkuma', 3, NULL, 129, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (19).jpg', '2018-04-19 15:04:31', '2018-05-12 07:35:47'),
(11, 'กระเป๋า Rilakkuma', 0, NULL, 129, NULL, NULL, 'promsurinm@hotmail.com', NULL, 'dealers/promsurinm@hotmail.com/1 (21).jpg', '2018-04-20 03:24:33', '2018-05-09 23:13:51'),
(14, 'เครื่องคิดเลข Rilakkuma', 4, 'เครื่องคิดเลขสุดน่ารัก', 280, NULL, 'น้ำตาล', 'rilakkumamee.toon@hotmail.com', NULL, 'dealers/rilakkumamee.toon@hotmail.com/4bcd715a-da6f-d1ee-701d-5a07f381ab6c.jpg', '2018-04-21 07:41:41', '2018-05-10 06:38:52');

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
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(11, 1, 11, NULL, NULL),
(14, 3, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `promocoder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salemore` double NOT NULL DEFAULT '0',
  `freeship` double DEFAULT NULL,
  `info` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` int(11) NOT NULL DEFAULT '0',
  `createby` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promocoder`, `salemore`, `freeship`, `info`, `limit`, `createby`, `created_at`, `updated_at`) VALUES
(1, 'PROMO123', 50, 555, 'EtstPormotion', 5, 'Promsurin', '2018-05-10 10:53:46', '2018-05-10 10:53:46'),
(2, 'DISCOUTN50', 50, 50, 'PromoDiscout50WithFreewShipping 1 Time Use', 1, 'Promsurin', '2018-05-10 10:54:21', '2018-05-10 10:54:21'),
(3, 'TRYTHISGRAZT', 50, 50, 'Try This Stationary Rewards by Free Shipping and Discount First 50 person !', 500, 'Promsurin', '2018-05-10 10:58:04', '2018-05-10 10:58:04'),
(4, 'BNK48PROMO', 500, NULL, 'BNK48 ~ Nothing just give a free discount for 500BAHT', 9999, 'Promsurin', '2018-05-12 11:32:40', '2018-05-12 11:33:02'),
(5, 'NEWUSRTT', 50, NULL, 'New user discount 50.- no limit', 999, 'Promsurin', '2018-05-12 12:21:06', '2018-05-12 12:21:06');

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
(17, 2, 'dealers/promsurinm@hotmail.com/1 (3).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:21:22', '2018-04-20 03:21:22'),
(18, 3, 'dealers/promsurinm@hotmail.com/1 (4).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:21:37', '2018-04-20 03:21:37'),
(22, 5, 'dealers/promsurinm@hotmail.com/1 (1).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:29', '2018-04-20 03:22:29'),
(23, 6, 'dealers/promsurinm@hotmail.com/1 (5).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(24, 6, 'dealers/promsurinm@hotmail.com/1 (11).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(25, 6, 'dealers/promsurinm@hotmail.com/1 (16).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:22:50', '2018-04-20 03:22:50'),
(26, 8, 'dealers/promsurinm@hotmail.com/1 (7).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:12', '2018-04-20 03:23:12'),
(27, 8, 'dealers/promsurinm@hotmail.com/1 (22).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:12', '2018-04-20 03:23:12'),
(28, 9, 'dealers/promsurinm@hotmail.com/1 (6).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:36', '2018-04-20 03:23:36'),
(29, 9, 'dealers/promsurinm@hotmail.com/1 (17).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:37', '2018-04-20 03:23:37'),
(30, 9, 'dealers/promsurinm@hotmail.com/1 (19).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:23:37', '2018-04-20 03:23:37'),
(31, 11, 'dealers/promsurinm@hotmail.com/1 (21).jpg', 'promsurinm@hotmail.com', '2018-04-20 03:24:33', '2018-04-20 03:24:33'),
(35, 14, 'dealers/rilakkumamee.toon@hotmail.com/4bcd715a-da6f-d1ee-701d-5a07f381ab6c.jpg', 'rilakkumamee.toon@hotmail.com', '2018-04-21 07:41:41', '2018-04-21 07:41:41');

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
(11, 'promsurinm@hotmail.com', NULL, '2018-05-12 11:12:28', '2018-05-12 11:12:28');

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
  `defaultdev` double DEFAULT NULL,
  `freeshipwhenprice` double DEFAULT NULL,
  `couponwhenprice` double DEFAULT NULL,
  `codegiftwhenprice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `address`, `phonenumber`, `gender`, `age`, `email`, `birthdate`, `paymentcard`, `roles`, `password`, `profilepic`, `dealer_approve`, `shopname`, `defaultdev`, `freeshipwhenprice`, `couponwhenprice`, `codegiftwhenprice`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Promsurin', 'Phutthammawong', NULL, NULL, 'male', 20, 'promsurinm@hotmail.com', '1997-09-03', NULL, 'admin', '$2y$10$gx1e8Kbvrh6635ZMZG0tSeiqvbXumPpiZ.IHvAX1TS2YLmoY13TTq', NULL, 0, 'SUMIKKOBKK', 50, 600, 50, 'BNK48PROMO', 'roMFj7pT1g86mmzuEOyXDXLDNfvy8TLOkAPAQ9Hzi4aA3iQvxEhBSoqltIVv', '2018-04-19 14:50:58', '2018-05-12 12:10:05'),
(3, 'toonjaru', 'Cartoon', 'City Park', '0971342012', 'female', 21, 'rilakkumamee.toon@hotmail.com', '2539-11-08', NULL, 'admin', '$2y$10$mkhOBSB/kEcPapshH8mElO6RgNh6RytYV4cYkQvjCYdynWTlK/1bm', NULL, 0, 'toonjaru', NULL, NULL, NULL, NULL, NULL, '2018-04-21 07:15:38', '2018-04-21 07:15:53'),
(4, 'Suthida', 'P.', 'dsasas', '0888888888', 'female', 20, 'zacatza@hotmail.com', '2540-10-31', NULL, 'seller', '$2y$10$AhC3P0oORoxHZjP3GJxOI.4N2E6jHVj.5ejkYlMuBxkyyEpJ2e/MK', NULL, 0, 'Suthida', NULL, NULL, NULL, NULL, NULL, '2018-04-21 07:16:08', '2018-04-21 07:17:54'),
(5, 'Baifeern', 'Tcssakul', '127/14', '0123456789', 'female', 21, 'baifernishungry@gmail.com', '1996-12-31', '555', 'user', '$2y$10$gx1e8Kbvrh6635ZMZG0tSeiqvbXumPpiZ.IHvAX1TS2YLmoY13TTq', NULL, 0, NULL, NULL, NULL, NULL, NULL, '7jp43LiCmnCm20Y6wrg8Uy8pigHO3AIXNVBuz5ewouZcr9WiivwAnLejSLpb', '2018-04-21 07:18:08', '2018-04-21 07:38:58'),
(6, 'Tester', 'Tseter2', NULL, NULL, 'male', 20, 'ininaw@gmail.com', '1997-09-03', NULL, 'user', '$2y$10$Elq/JB2BuJ6CCuOkJCr1rODaxv4EFdMtMugpylTrCOZE8pJa97Y0G', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'aOEYtDpWr5OuIlIdoko9HgCrBs5saS3j3XZmWOt9d0V5rjFly5WPUvgcIcAI', '2018-05-07 22:17:29', '2018-05-10 03:08:20'),
(7, 'nineties', 'c.', NULL, NULL, 'male', 20, 'ninekawit@gmail.com', '1997-03-07', NULL, 'seller', '$2y$10$rU1mxAdvfcJc.8uiqb381umH7fx1LdUUlsQk/WQESyvgcJN2kOgD6', NULL, 0, 'nineties', NULL, NULL, NULL, NULL, NULL, '2018-05-10 06:24:59', '2018-05-10 06:30:07'),
(8, 'tttest', 'tt', '21321', '12321314345', 'female', 19, 'ppppp1710@hotmail.com', '2018-05-17', NULL, 'user', '$2y$10$qFfPzpN9E1BRPhTZXjtyjeOWPwhQNHssz1Rh3F0glIQVMyCF2nt2y', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-10 06:31:23', '2018-05-10 06:31:23'),
(9, 'PP', 'PP', NULL, NULL, 'male', 1, 'p@s.com', '2018-05-01', NULL, 'user', '$2y$10$D3IZYuLOvBGPqRC/f6OiMelJsPIigEb5EU4Zt71m6JaQzKNpa6TES', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'HPdaTQekc0O8LPBloEcqmHKCK3Tx6oqfGAxWTcb08Kzx2rJlHUHTbF7zxh11', '2018-05-12 07:33:34', '2018-05-12 07:33:34');

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
(6, 3, 2, '2018-04-21 07:45:25', '2018-04-21 07:45:25'),
(8, 6, 2, '2018-05-07 22:17:37', '2018-05-07 22:17:37'),
(9, 6, 3, '2018-05-07 22:17:43', '2018-05-07 22:17:43'),
(10, 6, 5, '2018-05-07 22:17:45', '2018-05-07 22:17:45'),
(11, 6, 6, '2018-05-07 22:17:48', '2018-05-07 22:17:48'),
(12, 6, 8, '2018-05-07 22:17:50', '2018-05-07 22:17:50'),
(18, 8, 2, '2018-05-10 06:31:39', '2018-05-10 06:31:39');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pack`
--
ALTER TABLE `order_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `subscribers_id_unique` (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `matcher`
--
ALTER TABLE `matcher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_pack`
--
ALTER TABLE `order_pack`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_images`
--
ALTER TABLE `p_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
