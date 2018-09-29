-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 06:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraxenon`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_url` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_order` tinyint(4) NOT NULL DEFAULT '0',
  `parent_menu` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `menus`
--

TRUNCATE TABLE `menus`;
--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `menu_url`, `description`, `menu_order`, `parent_menu`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'Home menu', 1, NULL, '2018-09-28 18:00:00', NULL),
(2, 'Admin Console', NULL, 'admin console related all menu', 20, NULL, '2018-09-28 18:00:00', NULL),
(3, 'Menu', '/menu', 'create, update & delete menu', 1, 2, '2018-09-28 18:00:00', NULL),
(4, 'Blog', 'blog/all_post', NULL, 2, NULL, '2018-09-29 02:59:46', '2018-09-29 02:59:46'),
(5, 'Add New Blog', NULL, NULL, 1, 4, '2018-09-29 03:06:05', '2018-09-29 03:06:05'),
(6, 'Manage Posts', NULL, NULL, 2, 4, '2018-09-29 03:10:18', '2018-09-29 03:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_29_064230_create_menus_table', 1),
(2, '2018_09_29_075802_add_url_to_menus_table', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_menu_foreign` (`parent_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_menu_foreign` FOREIGN KEY (`parent_menu`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
