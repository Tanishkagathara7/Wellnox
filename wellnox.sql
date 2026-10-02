-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2026 at 05:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellnox`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(255) DEFAULT 'Product Requirement / Inquiry',
  `message` text NOT NULL,
  `status` enum('new','read','replied','archived') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rohan Pankhaniya', 'pankhaniyageetaben74@gmail.com', '9328978130', 'Website Product Requirement Enquiry', 'ssssssssssss', 'archived', '2026-09-29 23:57:51', '2026-09-30 00:02:27'),
(3, 'rrrrrrrrrrrrr', 'rohantechmatrix@gmail.com', '9328978130', 'Website Product Requirement Enquiry', 'asdasdasdasd', 'read', '2026-09-29 23:58:26', '2026-09-30 00:02:15'),
(4, 'Rohan Pankhaniya', 'pankhaniyarohan13@gmail.com', '9067804723', 'Website Product Requirement Enquiry', 'adasdadasdasd', 'read', '2026-09-30 00:08:57', '2026-09-30 22:26:32'),
(5, 'Rohan Pankhaniya', 'pankhaniyarocky@gmail.com', '45455454545', 'Website Product Requirement Enquiry', 'testing jkashdkjashdjhas', 'read', '2026-09-30 22:14:51', '2026-09-30 22:26:28'),
(6, 'Rohan Pankhaniya', 'rohantechmatrix@gmail.com', '9328978130', 'Website Product Requirement Enquiry', 'sdadddddddddddddddd', 'new', '2026-09-30 22:33:54', '2026-09-30 22:33:54'),
(7, 'Rohan Pankhaniya', 'rohantechmatrix@gmail.com', '9067804723', 'Website Product Requirement Enquiry', 'asddddddddddd', 'new', '2026-09-30 22:35:35', '2026-09-30 22:35:35'),
(8, 'Rohan Pankhaniya', 'rohantechmatrix@gmail.com', '9328978130', 'Website Product Requirement Enquiry', 'asdddddd', 'new', '2026-09-30 22:38:29', '2026-09-30 22:38:29'),
(9, 'Rohan Pankhaniya', 'rohantechmatrix@gmail.com', '6544444444', 'Website Product Requirement Enquiry', 'asdasdsadas', 'new', '2026-09-30 22:38:50', '2026-09-30 22:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_30_050000_create_product_categories_table', 2),
(5, '2026_09_30_050001_create_products_table', 2),
(6, '2026_09_30_050002_create_contacts_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `short_description`, `description`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Square Drainer', 'square-drainer', 'AISI 304 Stainless Steel Point Drainer with Anti-Cockroach Trap', 'Precision-engineered AISI 304 square floor drainer designed for rapid water drainage and complete odour/pest prevention. Available in polished mirror and satin matt finishes.', 'assets/images/popular-product/1.webp', 1, 1, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(2, 2, 'Channel Drainer', 'channel-drainer', 'Regular Matt Finish Architectural Linear Shower Channel', 'Sleek linear shower drainer crafted from premium 304-grade stainless steel with continuous gradient flow and 60L/min certified discharge rate.', 'assets/images/popular-product/2.webp', 1, 2, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(3, 1, 'Round Floor Drainer', 'round-floor-drainer', 'Mirror Finish Classical Round Grating with Hair Catcher', 'Classic circular floor grating with high-gloss mirror chrome buffing. Ideal for residential shower enclosures and wet utility rooms.', 'assets/images/popular-product/3.webp', 1, 3, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(4, 2, 'Wave Channel Drainer', 'wave-channel-drainer', 'PVD Coated Designer Wave Slotted Shower Drainer', 'Artistic wave laser-cut pattern featuring durable PVD titanium molecular finish, impervious to scratches and bathroom cleaning chemicals.', 'assets/images/popular-product/4.webp', 1, 4, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(5, 5, 'Ceramic Bathroom Accessories', 'ceramic-bathroom-accessories', 'Premium Design with a Touch of Elegance', 'Handcrafted ceramic bathroom dispenser set with gold-accented stainless steel fittings.', 'assets/images/product/5.webp', 1, 5, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(6, 6, 'Dish Racks & Drainers', 'dish-racks-drainers', 'Smart Organization for a Modern Kitchen', 'Heavy gauge stainless steel kitchen dish drying rack with removable drip tray and utensil caddy.', 'assets/images/product/6.webp', 1, 6, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(7, 7, 'Cloth Drying Stands', 'cloth-drying-stands', 'Sturdy, Space-Saving & Long-Lasting', 'Collapsible multi-tier heavy duty cloth dryer stand with weather-resistant powder coated finish.', 'assets/images/product/7.webp', 1, 7, '2026-09-30 00:25:23', '2026-09-30 00:25:23'),
(8, 8, 'MS Ladders & Utility Products', 'ms-ladders-utility-products', 'Strong, Reliable & Versatile', 'Industrial and domestic multi-step safety ladder with anti-skid wide platform and rubberized grip feet.', 'assets/images/product/8.webp', 1, 8, '2026-09-30 00:25:23', '2026-09-30 00:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Floor Drains & Gratings', 'floor-drains-gratings', 'Precision-engineered AISI 304 stainless steel floor drains, tile insert channels and cockroach trap gratings.', 'assets/images/product/1.webp', 1, 1, '2026-09-29 23:46:45', '2026-10-01 00:09:58'),
(2, 'Shower Channel Drainers', 'shower-channel-drainers', 'Architectural linear shower channels with superior 60L/min flow capacity and luxury finishes.', 'assets/images/product/2.webp', 1, 2, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(3, 'Bathroom Accessories', 'bathroom-accessories', 'Contemporary towel bars, soap dispensers, robe hooks and luxury glass shelf brackets.', 'assets/images/product/3.webp', 1, 3, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(4, 'Health Faucets', 'health-faucets', 'Heavy-duty brass and stainless steel health faucets with anti-burst flexi tubes.', 'assets/images/product/4.webp', 1, 4, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(5, 'Ceramic Bathroom Accessories', 'ceramic-bathroom-accessories', 'Handcrafted ceramic accessories with fine glazed finishes for luxury hotel suites and residences.', 'assets/images/product/5.webp', 1, 5, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(6, 'Dish Racks & Drainers', 'dish-racks-drainers', 'Modular stainless steel kitchen dish drying racks, cutlery holders and sink organizer baskets.', 'assets/images/product/6.webp', 1, 6, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(7, 'Cloth Drying Stands', 'cloth-drying-stands', 'Ergonomic folding clothes drying racks built with high-tensile weather-resistant steel tubes.', 'assets/images/product/7.webp', 1, 7, '2026-09-29 23:46:45', '2026-09-29 23:46:45'),
(8, 'MS Ladders & Utility Products', 'ms-ladders-utility-products', 'Anti-skid multi-step industrial and household heavy duty safety ladders.', 'assets/images/product/8.webp', 1, 8, '2026-09-29 23:46:45', '2026-09-29 23:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Wellnox', 'admin@gmail.com', '2026-09-29 23:46:45', '$2y$12$KysWb3w0dBTn4CsJc/dACOYwbqVSnnzOSRzi1oiiOnanvGm2K7qHe', 'shAxUbDJ2QtM89WJyCSWrYfEJThCQBDXxhGAXVsf6pzozR31CNfQxrApXZYc', '2026-09-29 23:46:45', '2026-09-29 23:56:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_status_index` (`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_status_index` (`status`),
  ADD KEY `products_sort_order_index` (`sort_order`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_status_index` (`status`),
  ADD KEY `product_categories_sort_order_index` (`sort_order`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
