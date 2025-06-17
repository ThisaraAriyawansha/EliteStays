-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 12:52 PM
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
-- Database: `boombitz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `breakfast` tinyint(1) DEFAULT 0,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city_state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `special_notes` text DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `breakfast`, `checkin`, `checkout`, `adults`, `children`, `rooms`, `total_price`, `billing_name`, `email`, `phone`, `passport_number`, `address`, `country`, `city_state`, `postal_code`, `special_notes`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 5, 0, '2025-05-22', '2025-05-24', 1, 1, 2, 6020.00, 'aaa', 'thisara.a2001@gmail.com', '2222', '2222', 'sss', 'aaa', 'qqq', '11', 'aaa', 2, '2025-05-22 01:56:41', '2025-05-22 02:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `booking_statuses`
--

CREATE TABLE `booking_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_statuses`
--

INSERT INTO `booking_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', '2025-05-22 07:10:24', '2025-05-22 07:10:24'),
(2, 'approve', '2025-05-22 07:10:24', '2025-05-22 07:10:24'),
(3, 'reject', '2025-05-22 07:10:24', '2025-05-22 07:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_path` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `about` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `image_path`, `first_name`, `last_name`, `mobile`, `dob`, `about`, `gender`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'ABCD', '$2y$10$eDg8GhB210AP1bxazt0UWeEvjaO1kH.mY0XrB/c08a23oMZAiW3Y.', 'abc@gmail.com', 'Profile/VkSAxJPmauOKIC5bwfQW.jpg', 'ABCDE', 'bcde', '0765566765', '2025-05-21', 'abcdihik', NULL, 1, '2025-05-19 21:42:36', '2025-05-19 23:08:40'),
(2, 'BCD', '$2y$10$pvr.oOfMSlTSjKKdUL8NnuUs9xKrjOnMtFyczyYyvswlg9JF4sRXi', 'bcd@gmail.com', NULL, NULL, '', NULL, NULL, '', NULL, 1, '2025-05-19 21:43:21', '2025-05-19 22:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `logo_path` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `description`, `address`, `city`, `image_path`, `logo_path`, `status_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(2, 'aaa', 'aaa', 'aa', 'aaa', 'Hotel/To04LR6tUNTF7rKxo0WU.jpg', 'Hotel/EtwUMCtqmJ61ymWvSrhQ.jpg', 1, NULL, '2025-05-15 23:34:27', '2025-05-19 21:20:54'),
(3, 'Royal Plaza on Scotts', 'abcd', '12/34 ABC', 'Colombo', 'Hotel/m2RToMPN38mw3ZQMTesw.jpg', NULL, 1, NULL, '2025-05-15 23:35:43', '2025-05-15 23:35:43'),
(4, 'aaa', 'aaa', 'aaa', 'aaa', 'Hotel/BOsvJXeNg32coy94mM1Q.jpg', NULL, 1, NULL, '2025-05-15 23:50:16', '2025-05-15 23:50:16'),
(5, 'ABCDE', 'aaaa', '12/34 bnv', 'Galle', 'Hotel/CzqlmGXfoQ6SJkE83tPi.jpg', NULL, 1, NULL, '2025-05-15 23:52:15', '2025-05-15 23:52:15'),
(6, 'XYZ', 'abc abcd abc', '12/12 C', 'Mtr', 'Hotel/RHty3r8AfP7j8wHkCxFn.jpg', 'Hotel/cYZxC11PSqL1AX8XFIv4.jpg', 1, NULL, '2025-05-19 21:15:05', '2025-05-19 21:15:05'),
(7, 'ZXC', 'bvc bcv', '12w/34 c', 'galle', 'Hotel/CBJLwY5lwpkL1CxrLa4b.jpg', 'Logo/Uv8n0repJWMaBwZoCviP.jpg', 1, NULL, '2025-05-19 21:16:45', '2025-05-19 21:16:45'),
(8, 'FGD', 'cbv cvb', '34/J 78', 'Colombo', 'Hotel/b3l5aMiNfHshKZ6vZOwp.jpg', 'Logo/QYWAj3DajVuigsLvbuGw.jpg', 1, NULL, '2025-05-19 21:18:11', '2025-05-19 21:18:11'),
(11, 'XZQ', 'abcd', '12/45 F', 'Galle', 'Hotel/hS2jzfS9ZE9d5IeH8c5y.jpg', 'Logo/HQYUFxsbqj6pWyGadyQZ.jpg', 1, 1, '2025-05-19 23:28:03', '2025-05-20 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `orders` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `type_id`, `image_path`, `orders`, `created_at`, `updated_at`) VALUES
(4, 2, 'TvImage/1739428871_4.jpg', 1, '2025-02-13 01:11:11', '2025-02-13 01:11:11'),
(5, 1, 'TvImage/1739428885_roo (5).jpg', NULL, '2025-02-13 01:11:25', '2025-02-21 03:34:14'),
(6, 1, 'TvImage/1739433117_2.jpg', 1, '2025-02-13 02:21:57', '2025-02-21 03:34:14'),
(7, 1, 'TvImage/1739433127_4.jpg', 2, '2025-02-13 02:22:07', '2025-02-21 03:33:58'),
(8, 2, 'TvImage/1739433784_roo11.jpg', 2, '2025-02-13 02:33:04', '2025-02-21 03:37:30'),
(9, 3, 'TvImage/1739433795_Wallpapers (2).jpg', 2, '2025-02-13 02:33:15', '2025-02-21 03:48:30'),
(14, 3, 'TvImage/DjQXZnTStyKduutgv7v9.jpg', 1, '2025-02-15 08:19:59', '2025-02-21 03:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_29_080424_create_agents_table', 2),
(6, '2025_01_30_082217_create_estimators_table', 2),
(7, '2025_01_30_082304_create_draftmens_table', 2),
(8, '2025_02_05_110509_create_agentlistings_table', 2),
(9, '2025_02_05_123232_create_draftmen_new_plans_table', 3),
(10, '2025_02_06_134225_create_draftmen_floors_table', 4),
(11, '2025_02_07_075416_create_draftmen_new_estimates_table', 5),
(12, '2025_02_07_075826_create_draftmen_rooms_table', 5),
(13, '2025_02_07_075851_create_draftmen_bathrooms_table', 5),
(14, '2025_02_07_075930_create_draftmen_living_rooms_table', 5),
(15, '2025_02_07_075955_create_draftmen_kitchens_table', 5),
(16, '2025_02_07_080017_create_draftmen_staircases_table', 5),
(17, '2025_02_10_094939_create_draftmen_rooms_table', 6),
(18, '2025_02_10_095212_create_draftmen_staircases_table', 6),
(19, '2025_02_10_095452_create_draftmen_kitchens_table', 6),
(20, '2025_02_10_095620_create_draftmen_living_rooms_table', 6),
(21, '2025_02_10_095828_create_draftmen_bathrooms_table', 6),
(22, '2025_02_10_111130_create_statuses_table', 7),
(23, '2025_02_11_052657_create_draftmen_new_plans_table', 8),
(24, '2025_02_11_052953_create_draftmen_floors_table', 8),
(25, '2025_02_13_031642_create_tv_types_table', 9),
(26, '2025_02_13_050538_create_listings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `adult_price` decimal(10,2) NOT NULL,
  `children_price` decimal(10,2) NOT NULL,
  `total_rooms` int(11) NOT NULL,
  `breakfast_price` decimal(10,2) DEFAULT NULL,
  `size` decimal(10,2) DEFAULT NULL,
  `bed_type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `name`, `price_per_night`, `adult_price`, `children_price`, `total_rooms`, `breakfast_price`, `size`, `bed_type`, `description`, `image_path`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'ABCDE', 150.00, 50.00, 30.00, 10, 20.00, 400.00, 'Single', 'abcde', 'Room/lcXiGKQLYzuW5x4tLntX.jpg', 1, '2025-05-16 01:00:37', '2025-05-19 21:28:04'),
(2, 3, 'aaa', 200.00, 70.00, 40.00, 30, 40.00, 500.00, 'Single', 'abcde', 'Room/RvorbagA5aNGFeIJ6Wv6.jpg', 1, '2025-05-16 01:53:27', '2025-05-19 21:27:49'),
(3, 2, 'Type 2', 200.00, 40.00, 30.00, 10, 70.00, 300.00, 'Queen', 'abcde', 'Room/r0C8APFvZLYIWP7MHv4B.jpg', 1, '2025-05-19 00:57:06', '2025-05-19 21:27:34'),
(4, 2, 'abcde', 2300.00, 50.00, 30.00, 20, 12.00, 500.00, 'Single', 'abc abc', 'Room/T0QfQ9MVuMY4OGxnJHJL.jpg', 1, '2025-05-19 21:25:16', '2025-05-19 21:25:16'),
(5, 11, 'BCDES', 1500.00, 12.00, 10.00, 20, 10.00, 400.00, 'Single', 'abcde', 'Room/WogGcyIr9IKoKY9qRLpa.jpg', 1, '2025-05-20 00:22:17', '2025-05-20 01:24:00'),
(6, 11, 'HJKUYU', 1200.00, 20.00, 10.00, 20, 100.00, 600.00, 'Double', 'abcd bcde', 'Room/ofjzWUjMxUUufTd4MLuH.jpg', 1, '2025-05-20 00:29:06', '2025-05-20 00:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 1, 'RoomImage/GVY8J286khrDjNk5LcDc.jpg', '2025-05-16 02:21:50', '2025-05-16 02:21:50'),
(3, 2, 'RoomImage/It0wJFpm9eJ2s3Hll7SB.jpg', '2025-05-16 02:23:46', '2025-05-16 02:23:46'),
(4, 1, 'RoomImage/JPiIRh3WKPbx46h63ZjG.jpg', '2025-05-16 02:31:18', '2025-05-16 02:31:18'),
(5, 3, 'RoomImage/3sGPdWPJ17NKk5WdTWcR.jpg', '2025-05-19 00:57:45', '2025-05-19 00:57:45'),
(6, 3, 'RoomImage/GmXaDUJdsrP4jZoMPWZV.jpg', '2025-05-19 00:57:53', '2025-05-19 00:57:53'),
(7, 3, 'RoomImage/k4ntju0Oe3w1XZNtpXi5.jpg', '2025-05-19 00:58:03', '2025-05-19 00:58:03'),
(8, 3, 'RoomImage/wmQmdHyn5tGyJPV7mo3L.jpg', '2025-05-19 00:58:25', '2025-05-19 00:58:25'),
(10, 5, 'RoomImage/mdI0Vm6qJccko3JbuMlC.jpg', '2025-05-20 02:07:13', '2025-05-20 02:07:13'),
(11, 5, 'RoomImage/Tu7azFaa02MikHYz0mdt.jpg', '2025-05-20 02:07:36', '2025-05-20 02:07:36'),
(13, 5, 'RoomImage/tD0ZT7FiKYav4v6J9QfT.jpg', '2025-05-20 02:09:01', '2025-05-20 02:09:01'),
(14, 5, 'RoomImage/x0fF5m2Tm4VbgZW45IjB.jpg', '2025-05-21 04:51:23', '2025-05-21 04:51:23'),
(15, 5, 'RoomImage/RT5SN56MXXOnbFieEoyU.jpg', '2025-05-21 04:51:29', '2025-05-21 04:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2025-05-16 04:57:44', '2025-05-16 04:57:44'),
(2, 'Inactive', '2025-05-16 04:57:44', '2025-05-16 04:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `tv_types`
--

CREATE TABLE `tv_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tv_types`
--

INSERT INTO `tv_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Type 1', '2025-02-12 22:49:15', '2025-02-12 22:49:15'),
(2, 'Type 2', '2025-02-12 22:54:37', '2025-02-12 22:54:37'),
(3, 'Type 3', '2025-02-13 02:04:49', '2025-02-13 02:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$RRR1lM/qiRDNKiS4J5j2U.JbdPR1s4Lgov6zx1kMbexTWhcFOeX22', 'ttoWOUbzmIHqQmhmPDJOJrHfLjhJUxIRKfLRJuECqyNv2GGU2pW1oUwsI0sz', '2025-01-23 05:27:35', '2025-01-23 05:27:35'),
(2, 'admin', 'admin1@gmail.com', NULL, '$2y$10$KYqhM5R/rmpnoMzbup7tU./97Nmre2xlLfmIbekVC4IHVHHJ2jgHW', NULL, '2025-02-12 20:32:26', '2025-02-12 20:32:26'),
(3, 'admin', 'admin2@gmail.com', NULL, '$2y$10$UmNm07/.QVkgPsesc9Oa1uqm/sbyBiwlTce09.HmyiY3FP6j6zZwm', NULL, '2025-02-13 02:49:11', '2025-02-13 02:49:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status_id` (`status_id`);

--
-- Indexes for table `booking_statuses`
--
ALTER TABLE `booking_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_type_id_foreign` (`type_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_types`
--
ALTER TABLE `tv_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_statuses`
--
ALTER TABLE `booking_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tv_types`
--
ALTER TABLE `tv_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `booking_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `tv_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
