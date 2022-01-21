-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 02:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant-task`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_19_203704_create_services_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `type` enum('meal','drink') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `subtitle`, `price`, `type`, `description`, `image`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(20, 'English Breakfast', 'Breakfast', 34.5, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/FvK0fs1dxmf5kLO4AM2J6khhlA4vAyXtrH4MkgEj.jpg', 1, '2022-01-21 09:36:16', '2022-01-21 09:36:16'),
(21, 'English Breakfast', 'Breakfast', 44.5, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/ddO3tcNkzFjsCP0xjfvsffKrJjQmEbrHbLYgpdKI.jpg', 1, '2022-01-21 09:36:36', '2022-01-21 09:36:36'),
(22, 'Chines Breakfast', 'Breakfast', 40, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/W6yxiWXRXFqLnZgOus5ir9Rs9Eq6v8Y8YJqZ27wY.jpg', 1, '2022-01-21 09:37:00', '2022-01-21 09:37:00'),
(23, 'Chines Breakfast', 'Breakfast', 40, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/iIYSAqQD81q2L6vFQHlfec5vvOe3UmT4WfRaFdfo.jpg', 1, '2022-01-21 09:40:58', '2022-01-21 09:40:58'),
(24, 'Indian Breakfast', 'Breakfast', 40, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/jZ2hA0a6ZkLrGdkik9TqJ2dqLlAkXFkiZ7PAd64f.jpg', 1, '2022-01-21 09:41:17', '2022-01-21 09:41:17'),
(25, 'Indian Breakfast', 'Breakfast', 40, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/AYyq0fAtFkGJ1r7f3LUaK0nbCrbgKyUwTjUTEvqI.jpg', 1, '2022-01-21 09:41:31', '2022-01-21 09:41:31'),
(26, 'Arabic Breakfast', 'Breakfast', 40, 'meal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/UulzwaY3mfPB02Oui2S05nhfhAeseyszWDlAOUtu.jpg', 1, '2022-01-21 09:41:44', '2022-01-21 09:41:44'),
(27, 'Arabic Drink', 'Cool', 25.5, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/V2NqFPl848BTTN73nXy46f1A44oA6sZMkcrHyH6b.jpg', 1, '2022-01-21 09:44:03', '2022-01-21 09:44:03'),
(28, 'Arabic Drink', 'Cool', 25.5, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/0VjvxEEkaZMFOH46kRd94xZF3UUlnI0vtTRuyAxm.jpg', 1, '2022-01-21 09:44:15', '2022-01-21 09:44:15'),
(29, 'Arabic Drink', 'Cool', 27, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/srfWB35a2L20ZMji4bxOySuRTwYfyJSHN11nW7RC.jpg', 1, '2022-01-21 09:46:57', '2022-01-21 09:46:57'),
(30, 'English Drink', 'Cool', 27, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/rLjZ5mcrr7uJM7QHDzv6o01bJrCGN2yEeDqrqBJ9.jpg', 1, '2022-01-21 09:47:30', '2022-01-21 09:47:30'),
(31, 'English Drink', 'Cool', 27, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/Fj52uIBrpa0YR6jLlmjdfiF9TUIbT2gxVO2mJZCw.jpg', 1, '2022-01-21 09:47:40', '2022-01-21 09:47:40'),
(32, 'Arabic Drink', 'Cool', 35, 'drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.', 'services/y6DRxcepbzBZpBFHfUjDHlCnqEq76cAd1poEbE5I.jpg', 1, '2022-01-21 09:48:07', '2022-01-21 09:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `logo`, `motto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Albaroon', 'baroon@barooon.com', NULL, '$2y$10$iIarPYimHFhBZ1wg.TfC/u3.ktPDRzr1vI/Fk8jYRbcUs9dnMybvi', 'logos/XqMnEjLThPrOfd2P4kPVmXq5qZVXnzdL7FuwtRcx.jpg', 'We are not the only ones but we are the best', 'TCdhReu1WH9DKUWme0fSdsMWiMgXBwSXHzg5xhJEs1xrNmobMcwPYU8jFLLM', '2022-01-19 10:07:48', '2022-01-21 09:52:09'),
(2, 'TamTam', 'Tam@tam.com', NULL, '$2y$10$CEJTCo0BqClNmrEnWuoQLOqd4K45KSWwBN.ODkKYPRxttIDYLatqq', 'logos/csXvjuAEJTDOvAFLEp4jPw2mKQJZuA2ueerjpnPl.png', 'Live life by the four L\'s. Learn, Listen, Lead and Laugh.', NULL, '2022-01-20 17:56:04', '2022-01-21 09:54:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_restaurant_id_foreign` (`restaurant_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
