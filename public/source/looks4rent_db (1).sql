-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 10:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `looks4rent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deposit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`id`, `name`, `description`, `quantity`, `available`, `image_path`, `price`, `deleted_at`, `created_at`, `updated_at`, `category_id`, `status`, `deposit`) VALUES
(1, 'L4R-PD001', 'Social Floral Beaded Gown\r\n\r\nV-neckline, Sleeveless, Spaghetti strap, Back zipper, Floor length, Floral motif beading at bodice, Multi-colored layering of tulle skirt, Polyester, Spot clean\r\n\r\nSize: S, M, L, XL\r\nColor: Rose Gold', 3, 3, 'images/1549310095.jpg', '2500.00', NULL, '2019-02-01 10:05:10', '2019-02-04 12:42:03', 1, '1', '2000.00'),
(2, 'L4R-PD002', 'Beaded Tripple Waist Glitter Mesh Ball Gown\r\n\r\nGlitter-accented mesh fabric, Deep V-neckline, Shoulder straps, Rows of jeweled trim at the waist, Floor-length skirt, Cut out back details, Back zipper with hook-and-eye closure, 61\" length, Polyester, Spot clean\r\n\r\nSize: S, M, L, XL\r\nColor: Rose Gold', 3, 3, 'images/1549312897.jpg', '2000.00', NULL, '2019-02-01 10:05:28', '2019-02-04 12:42:22', 2, '1', '2500.00'),
(3, 'L4R-ED001', 'Wine Red Sexy Satin Evening Dresses Long 2018 A Line Prom Dresses Evening Party Gown Open Back Robe\r\n\r\nSize: S, M, XL, L\r\nColor: Red', 5, 5, 'images/1549313185.jpg', '2500.00', NULL, '2019-02-01 10:05:49', '2019-02-04 12:51:31', 2, '1', '2500.00'),
(4, 'L4R-ED002', 'Black Lace Appliques slit Prom Evening Dress\r\n\r\nThis black evening dress features alluring tulle top , lace edge on the side and back,and mermaid skirt. With its flattering silhouette, this elegant dress surely won\'t remain in the closet for long. Wear it to your prom Evening Party\r\n\r\nSize: S, M, XL, L\r\nColor: Blue', 6, 6, 'images/1549313640.jpg', '2500.00', NULL, '2019-02-01 10:06:05', '2019-02-04 12:54:00', 2, '1', '2500.00'),
(5, 'L4R-WD001', 'This Glamorous Ballgown Features a Frosted, Embroidered Lace Bodice Accented with Crystal Beaded Straps and Waistband. Dreamy Layers of Flounced Organza Trimmed with Horsehair all Come Together Beautifully to Create the Perfect Look. Available in Three Lengths: 55″, 58″, 61″. Shown in Ivory/Caramel\r\n\r\nSize: S, M, L, XL\r\nColor: White, Ivory, Ivory/Caramel', 3, 3, 'images/1549314229.jpg', '3500.00', NULL, '2019-02-02 00:53:31', '2019-02-04 13:14:20', 3, '1', '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_order`
--

CREATE TABLE `accomodation_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accomodation_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation_order`
--

INSERT INTO `accomodation_order` (`id`, `created_at`, `updated_at`, `accomodation_id`, `order_id`, `quantity`) VALUES
(31, '2019-02-04 08:59:56', '2019-02-04 08:59:56', 2, 40, 1),
(32, '2019-02-04 08:59:56', '2019-02-04 08:59:56', 3, 40, 1),
(37, '2019-02-04 09:10:13', '2019-02-04 09:10:13', 1, 45, 1),
(38, '2019-02-04 09:13:17', '2019-02-04 09:13:17', 2, 48, 1),
(45, '2019-02-04 09:33:21', '2019-02-04 09:33:21', 2, 52, 1),
(46, '2019-02-04 09:33:21', '2019-02-04 09:33:21', 3, 52, 1),
(47, '2019-02-04 09:35:12', '2019-02-04 09:35:12', 2, 53, 2),
(48, '2019-02-04 09:38:35', '2019-02-04 09:38:35', 2, 56, 1),
(49, '2019-02-04 13:20:26', '2019-02-04 13:20:26', 2, 57, 3),
(50, '2019-02-04 13:20:26', '2019-02-04 13:20:26', 4, 57, 1),
(51, '2019-02-04 13:20:26', '2019-02-04 13:20:26', 1, 57, 1),
(52, '2019-02-04 13:20:46', '2019-02-04 13:20:46', 3, 58, 1),
(53, '2019-02-04 13:21:24', '2019-02-04 13:21:24', 2, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Prom Dresses', NULL, '2019-02-01 09:56:41', '2019-02-01 09:56:41', '1'),
(2, 'Evening Dresses', NULL, '2019-02-01 09:56:44', '2019-02-01 09:56:44', '1'),
(3, 'Wedding Dresses', NULL, '2019-02-01 09:56:47', '2019-02-01 09:56:47', '1'),
(4, 'Formal Dresses', NULL, '2019-02-01 09:56:50', '2019-02-01 09:56:50', '1'),
(5, 'Cocktail Dresses', NULL, '2019-02-01 22:18:25', '2019-02-01 22:18:25', '1'),
(6, 'Graduation Dresses', NULL, '2019-02-01 22:18:26', '2019-02-01 22:18:26', '1'),
(7, 'Bridesmaid Dresses', NULL, '2019-02-02 00:36:08', '2019-02-02 00:36:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_29_121116_create_accomodations_table', 1),
(4, '2019_01_29_121209_create_categories_table', 1),
(5, '2019_01_29_124304_create_roles_table', 1),
(6, '2019_01_29_124942_add_category_id_table', 1),
(7, '2019_01_30_005952_add_accomodations_table', 1),
(8, '2019_01_30_030217_add_status_categories_table', 1),
(9, '2019_01_31_023635_add_accomodations_item_deposit_table', 1),
(10, '2019_01_31_072429_create_statuses_table', 1),
(11, '2019_01_31_072500_create_orders_table', 1),
(12, '2019_01_31_115253_create_accomodation_order_table', 1),
(13, '2019_02_01_015035_add_transaction_code_table', 1),
(14, '2019_02_01_124433_add_role_id_table', 1),
(15, '2019_02_04_134345_add_date_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `total`, `user_id`, `status_id`, `transaction_code`, `start_date`, `end_date`) VALUES
(40, '2019-02-04 08:59:56', '2019-02-04 08:59:56', '48.00', 2, 1, 'Looks4Rent-1549299596-00000041', 'Not yet OK', 'Not yet OK'),
(45, '2019-02-04 09:10:12', '2019-02-04 09:10:13', '24444.00', 2, 1, 'Looks4Rent-1549300213-00000046', 'Not yet OK', 'Not yet OK'),
(48, '2019-02-04 09:13:17', '2019-02-04 09:13:17', '3.00', 2, 1, 'Looks4Rent-1549300397-00000049', 'Not yet OK', 'Not yet OK'),
(52, '2019-02-04 09:33:21', '2019-02-04 10:21:31', '48.00', 2, 2, 'Looks4Rent-1549301601-00000053', 'Not yet OK', 'Not yet OK'),
(53, '2019-02-04 09:35:12', '2019-02-04 09:35:12', '6.00', 2, 1, 'Looks4Rent-1549301712-00000054', 'Not yet OK', 'Not yet OK'),
(56, '2019-02-04 09:38:35', '2019-02-04 09:38:36', '3.00', 2, 1, 'Looks4Rent-1549301916-00000057', 'Not yet OK', 'Not yet OK'),
(57, '2019-02-04 13:20:26', '2019-02-04 13:20:26', '11000.00', 2, 1, 'Looks4Rent-1549315226-00000058', 'Not yet OK', 'Not yet OK'),
(58, '2019-02-04 13:20:46', '2019-02-04 13:20:47', '2500.00', 2, 1, 'Looks4Rent-1549315247-00000059', 'Not yet OK', 'Not yet OK'),
(60, '2019-02-04 13:21:24', '2019-02-04 13:21:24', '2000.00', 2, 1, 'Looks4Rent-1549315284-00000061', 'Not yet OK', 'Not yet OK');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'borrowed', NULL, NULL),
(2, 'cancelled', NULL, NULL),
(3, 'returned', NULL, NULL),
(4, 'approved', NULL, NULL),
(5, 'rejected', NULL, NULL),
(6, 'completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Razelle Ann', 'Dela Cruz', 'B25 L26 Lapids Village, Tambubong', 'annadrianostaff@gmail.com', NULL, '$2y$10$FJLW8bWBI/pmHnVybYVXGe2fJ0ZXXCWZjC7H8E1qJ/tH6O6swXN5S', 'IuZrOTC6otkcOFgMML5UqXurqwntYvDkUg1ej4uyg3lzVG7nGWPIAIAZvBxb', '2019-02-01 09:55:38', '2019-02-01 09:55:38', 1),
(2, 'ann', 'ann', 'buni', 'hadhad@alipunga.ph', NULL, '$2y$10$O/cn20Ho9dTetoHzT/pk3uXs7J5qxf6AY4HugDadjmjcYp8FWofjG', 'yONuxtvT93HkZwOOIY8eqmXIHy11Z3OZqg6XYIPIEMDAcagXJudg9FJeaonM', '2019-02-01 22:09:40', '2019-02-01 22:09:40', 2),
(3, 'pretty', 'zelle', 'earth', 'ganda@ganda.com', NULL, '$2y$10$Ljp3zi0dposE7DERVP2IOeQFv17or9/66dyCbSbAanG2mXWMuqOa6', 'CDGGu8VCW6bBfEG2GQXVrGte616qt14aWRHsrzux1OsOGeNKszIJ2caSI5OT', '2019-02-04 02:41:27', '2019-02-04 02:41:27', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accomodations_category_id_foreign` (`category_id`);

--
-- Indexes for table `accomodation_order`
--
ALTER TABLE `accomodation_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accomodation_order_accomodation_id_foreign` (`accomodation_id`),
  ADD KEY `accomodation_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `accomodation_order`
--
ALTER TABLE `accomodation_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD CONSTRAINT `accomodations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `accomodation_order`
--
ALTER TABLE `accomodation_order`
  ADD CONSTRAINT `accomodation_order_accomodation_id_foreign` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `accomodation_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
