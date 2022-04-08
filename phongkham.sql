-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 03:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phongkham`
--

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(26, '2016_06_01_000004_create_oauth_clients_table', 1),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(28, '2022_02_20_124854_create_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('073048a530662f38c23906d6db4b02eec879cde774f83a0a2791bb7a1ca0d0d44710c226884d110f', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:12:32', '2022-03-23 05:12:32', '2023-03-23 12:12:32'),
('0aa1e3c26e55d349648510646c11410a904c77e886500f67b0eb5e4ea754e922610632b4e3562860', 1, 1, 'Hua Dung', '[]', 0, '2022-03-23 05:24:55', '2022-03-23 05:24:55', '2023-03-23 12:24:55'),
('0c709160630cbccec71e8969dad2751fadd05dd3cf9a0d1568f1f763ad3e53c79ea572206b7065df', 1, 1, 'Hua Dung', '[]', 0, '2022-03-23 05:26:15', '2022-03-23 05:26:15', '2023-03-23 12:26:15'),
('1e0e01e568edbecfda9cbc189013cc41cf48d47fbd5c2ac1d863edf0431678646009b352363aa217', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:11:56', '2022-03-23 05:11:56', '2023-03-23 12:11:56'),
('395b16f10471e17a074d5dd4cbf0a3083f6435c9284f2b5884fb9999f9248d6b163149cc2bae9c49', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:22:12', '2022-03-23 05:22:12', '2023-03-23 12:22:12'),
('3ed9141a9d40c1f2429f93993fdb0dba89db4c27800b1a9c88c3e8eafe7ef9f9c5c73af092516a72', 1, 1, 'Personal Access Token', '[]', 1, '2022-03-23 05:12:40', '2022-03-23 05:12:40', '2023-03-23 12:12:40'),
('515f8782a1c7aba23b1186137611db469bcc0d0000e0b320633e286df8e5f9dbd6fffda1b22d72c8', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:12:39', '2022-03-23 05:12:39', '2023-03-23 12:12:39'),
('5f06661585c0fbfc7e1465ea77a769b64dfa45c0cb726e10ed672f065d5e0ba1ee75fe19ef3cc5a8', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:12:30', '2022-03-23 05:12:30', '2023-03-23 12:12:30'),
('689bf713e5d1ba43bb6c59bdf33067a5f6b3ca1f2d1c01756a051f1e1f81e773dd90fad451d50789', 1, 1, NULL, '[]', 0, '2022-03-23 05:10:37', '2022-03-23 05:10:37', '2023-03-23 12:10:37'),
('80d6ee8a04c2d7389d9ec266e0ee81229cdf0cbbce083819f9d46282b08c363c946e42a1afd8caef', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:24:19', '2022-03-23 05:24:19', '2023-03-23 12:24:19'),
('8970a133e68b4c2baf4d7319ad8922e523aea185c74b86b594b7229c9041d4f0471d254ad11a6271', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:12:34', '2022-03-23 05:12:34', '2023-03-23 12:12:34'),
('afe86f321415d5d2adb069333e3ddb5a4807a6d49f16c8be8cf3a693779086958ff2ef9a0cbaa21e', 1, 1, 'Hua Dung', '[]', 0, '2022-03-23 05:31:34', '2022-03-23 05:31:34', '2023-03-23 12:31:34'),
('bfb07933ee16259e156063391cb57563f351b24b42b44684905f2ce023f37408066f2170527920d2', 1, 1, 'Hua Dung', '[]', 0, '2022-03-23 05:26:30', '2022-03-23 05:26:30', '2023-03-23 12:26:30'),
('d0c08e20c861618a1a75e3fc8d9b1b213f591a30342938e9778c26bf1f75ff39b17e1d32b178002f', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:24:06', '2022-03-23 05:24:06', '2023-03-23 12:24:06'),
('e57be7bcee6823bf824ef2c6768019a99ead749ac17760fe40d99d25c3cb0e8c2f0f26e60072cb99', 1, 1, 'Personal Access Token', '[]', 0, '2022-03-23 05:12:36', '2022-03-23 05:12:36', '2023-03-23 12:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'h6iTDaeFWUd5Jean1gondQWzrVvQSjxgk08fZfu5', 'http://localhost', 1, 0, 0, '2022-03-23 05:08:42', '2022-03-23 05:08:42'),
(2, NULL, 'Laravel Password Grant Client', 'WjkRAVBI2E87EJW9pxQL9jaa5uCaLFEPnEMg96SH', 'http://localhost', 0, 1, 0, '2022-03-23 05:08:42', '2022-03-23 05:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-23 05:08:42', '2022-03-23 05:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hua Dung', 'dunghuava', 'dunghuava@gmail.com', NULL, '$2y$10$FSn/BKNdWLnj3jn6FOd1eeTYW9mTsXBhwMnsA4Lw31MptRNp4/7EK', NULL, '2022-03-23 05:10:29', '2022-03-23 05:10:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_name_index` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
