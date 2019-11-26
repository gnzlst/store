-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 01:20 PM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptops', 'laptops', '2019-08-31 04:26:50', '2019-10-14 22:00:34', '2019-10-14 22:00:34'),
(2, 'Cables', 'cables', '2019-08-31 06:58:23', '2019-10-14 22:01:27', '2019-10-14 22:01:27'),
(4, 'Memory', 'memory', '2019-09-04 17:11:58', '2019-09-07 04:21:40', NULL),
(5, 'CPU', 'cpu', '2019-09-06 23:00:07', '2019-09-07 04:20:18', NULL),
(6, 'Graphic Cards', 'graphic-cards', '2019-11-06 02:05:05', '2019-11-06 02:06:18', '2019-11-06 02:06:18'),
(7, 'Laptop', 'laptop', '2019-11-06 02:07:07', '2019-11-06 02:07:07', NULL),
(8, 'Monitor', 'monitor', '2019-11-13 00:29:13', '2019-11-13 00:29:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PCF4CT0RY-5DC16DE426B746.73366204', '2019-07-05 04:11:08', '2019-11-05 03:11:08', NULL),
(2, 1, 'PCF4CT0RY-5DC17106C94E17.13074310', '2019-08-05 04:24:30', '2019-11-05 03:24:30', NULL),
(3, 1, 'PCF4CT0RY-5DC171AED83EE4.39925318', '2019-09-05 04:27:18', '2019-11-05 03:27:18', NULL),
(4, 1, 'PCF4CT0RY-5DC1735AAB10A8.42542050', '2019-09-05 04:34:26', '2019-11-05 03:34:26', NULL),
(5, 1, 'PCF4CT0RY-5DC174C658DE61.70587780', '2019-10-04 14:30:00', '2019-11-05 03:40:30', NULL),
(6, 1, 'PCF4CT0RY-5DC3E18FC596F3.79921626', '2019-11-06 23:49:11', '2019-11-06 23:49:11', NULL),
(7, 1, 'PCF4CT0RY-5DC3E1D4313337.15106489', '2019-11-06 23:50:20', '2019-11-06 23:50:20', NULL),
(8, 1, 'PCF4CT0RY-5DC3E221E75F28.26723592', '2019-11-06 23:51:38', '2019-11-06 23:51:38', NULL),
(9, 2, 'PCF4CT0RY-5DCBD1283C3EF7.78517911', '2019-11-13 00:17:20', '2019-11-13 00:17:20', NULL),
(10, 2, 'PCF4CT0RY-5DCCC4F58A45F7.91804836', '2019-11-13 17:37:33', '2019-11-13 17:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `unit_price`, `quantity`, `total`, `status`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1179, 1, 1179, 'Pending', 'PCF4CT0RY-5DC16DE426B746.73366204', '2019-11-05 03:11:08', '2019-11-05 03:11:08', NULL),
(2, 1, 8, 839, 2, 1678, 'Pending', 'PCF4CT0RY-5DC16DE426B746.73366204', '2019-11-05 03:11:08', '2019-11-05 03:11:08', NULL),
(3, 1, 4, 339, 4, 1356, 'Pending', 'PCF4CT0RY-5DC16DE426B746.73366204', '2019-11-05 03:11:08', '2019-11-05 03:11:08', NULL),
(4, 1, 1, 1179, 2, 2358, 'Pending', 'PCF4CT0RY-5DC17106C94E17.13074310', '2019-11-05 03:24:30', '2019-11-05 03:24:30', NULL),
(5, 1, 8, 839, 2, 1678, 'Pending', 'PCF4CT0RY-5DC17106C94E17.13074310', '2019-11-05 03:24:30', '2019-11-05 03:24:30', NULL),
(6, 1, 4, 339, 1, 339, 'Pending', 'PCF4CT0RY-5DC171AED83EE4.39925318', '2019-11-05 03:27:18', '2019-11-05 03:27:18', NULL),
(7, 1, 1, 1179, 4, 4716, 'Pending', 'PCF4CT0RY-5DC1735AAB10A8.42542050', '2019-11-05 03:34:26', '2019-11-05 03:34:26', NULL),
(8, 1, 4, 339, 1, 339, 'Pending', 'PCF4CT0RY-5DC174C658DE61.70587780', '2019-11-05 03:40:30', '2019-11-05 03:40:30', NULL),
(9, 1, 4, 339, 1, 339, 'Pending', 'PCF4CT0RY-5DC3E18FC596F3.79921626', '2019-11-06 23:49:11', '2019-11-06 23:49:11', NULL),
(10, 1, 7, 69, 1, 69, 'Pending', 'PCF4CT0RY-5DC3E1D4313337.15106489', '2019-11-06 23:50:20', '2019-11-06 23:50:20', NULL),
(11, 1, 10, 149, 1, 149, 'Pending', 'PCF4CT0RY-5DC3E221E75F28.26723592', '2019-11-06 23:51:38', '2019-11-06 23:51:38', NULL),
(12, 2, 1, 1179, 1, 1179, 'Pending', 'PCF4CT0RY-5DCBD1283C3EF7.78517911', '2019-11-13 00:17:20', '2019-11-13 00:17:20', NULL),
(13, 2, 11, 2599, 1, 2599, 'Pending', 'PCF4CT0RY-5DCCC4F58A45F7.91804836', '2019-11-13 17:37:33', '2019-11-13 17:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_no`, `amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PCF4CT0RY-5DC16DE426B746.73366204', 421300, 'succeeded', '2019-07-05 04:11:08', '2019-11-05 03:11:08', NULL),
(2, 1, 'PCF4CT0RY-5DC17106C94E17.13074310', 403600, 'succeeded', '2019-08-05 04:24:30', '2019-11-05 03:24:30', NULL),
(3, 1, 'PCF4CT0RY-5DC171AED83EE4.39925318', 33900, 'succeeded', '2019-09-05 04:27:18', '2019-11-05 03:27:18', NULL),
(4, 1, 'PCF4CT0RY-5DC1735AAB10A8.42542050', 471600, 'succeeded', '2019-09-05 04:34:26', '2019-11-05 03:34:26', NULL),
(5, 1, 'PCF4CT0RY-5DC174C658DE61.70587780', 33900, 'succeeded', '2019-10-05 04:40:30', '2019-11-05 03:40:30', NULL),
(6, 1, 'PCF4CT0RY-5DC3E18FC596F3.79921626', 33900, 'succeeded', '2019-11-06 23:49:11', '2019-11-06 23:49:11', NULL),
(7, 1, 'PCF4CT0RY-5DC3E1D4313337.15106489', 6900, 'succeeded', '2019-11-06 23:50:20', '2019-11-06 23:50:20', NULL),
(8, 1, 'PCF4CT0RY-5DC3E221E75F28.26723592', 14900, 'succeeded', '2019-11-06 23:51:38', '2019-11-06 23:51:38', NULL),
(9, 2, 'PCF4CT0RY-5DCBD1283C3EF7.78517911', 117900, 'succeeded', '2019-11-13 00:17:20', '2019-11-13 00:17:20', NULL),
(10, 2, 'PCF4CT0RY-5DCCC4F58A45F7.91804836', 259900, 'succeeded', '2019-11-13 17:37:33', '2019-11-13 17:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `sub_category_id`, `quantity`, `image_path`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AMD Ryzen Threadripper', 1179, 'AMD (YD295XA8AFWOF) Ryzen Threadripper 2950X 4.4GHZ/12Core/32MB/180W CPU ', 5, 3, 35, 'images\\uploads\\products\\amd-threadripper-e44a8e3b80288c06c89a2c94f68dfaa7.jpeg', 1, '2019-09-07 20:59:29', '2019-11-13 00:17:20', NULL),
(2, 'Intel Core i9-9960X X-series 22M', 2499, 'Intel (BX80673I99960X) Core i9-9960X X-series 22M Cache 4.40 GHz LGA14A Boxed CPU ', 5, 4, 96, 'images\\uploads\\products\\intelcorei9-c69f4041e3508e28c41615153b5d66c5.png', 0, '2019-10-12 05:21:19', '2019-11-05 02:55:42', NULL),
(3, 'Cablelist CL-V2.0HD1M 1 Meter HDMI', 8, 'Cablelist CL-V2.0HD1M 1 Meter HDMI Ver2.0 4K 3D M-M Gold Plated Copper Cable', 2, 2, 100, 'images\\uploads\\products\\hdmi-fa1479d3dd6526c35c1f1c7de97250e5.jpeg', 0, '2019-10-14 21:42:01', '2019-10-14 21:42:01', '2019-10-13 13:30:00'),
(4, 'G.Skill Trident Z Neo', 339, 'G.Skill Trident Z Neo (F4-3600C18D-32GTZN) 32GB Kit (16GBx2) DDR4 3600 Desktop RAM', 4, 5, 86, 'images\\uploads\\products\\memory-60f50dadd2138a0518ff33d3ae7cea4b.png', 1, '2019-10-14 21:57:03', '2019-11-06 23:49:11', NULL),
(5, 'Intel (BX80673I99980X) Core i9-9980XE', 2999, 'Intel (BX80673I99980X) Core i9-9980XE 24.75M Cache 4.40 GHz LGA14A Boxed CPU', 5, 4, 97, 'images\\uploads\\products\\intel-ba5548d249b948cf552ffc095bf0b796.jpeg', 0, '2019-10-14 21:59:14', '2019-11-05 02:55:42', NULL),
(6, 'AMD Ryzen 7-2700X ', 293, 'AMD (YD270XBGAFBOX) Ryzen 7-2700X 4.35Ghz/8 Core/20MB/105W AM4 Boxed CPU with Wraith Prism cooler', 5, 3, 96, 'images\\uploads\\products\\amd-ryzen-7-2700x-2578ef16e304c7307d0bdb0ba0ea2253.jpeg', 0, '2019-10-14 22:17:45', '2019-11-05 02:55:42', NULL),
(7, 'Kingston 8GB Single DDR3 1600', 69, 'Kingston 8GB Single DDR3 1600 - KVR16N11/8 ', 4, 11, 91, 'images\\uploads\\products\\kingston-8gb-6b31403ff3c86139909b0f1da10a4de0.jpeg', 0, '2019-10-14 22:25:20', '2019-11-06 23:50:20', NULL),
(10, 'G.Skill Trident Z Royal Gold', 149, 'G.Skill Trident Z Royal Gold (F4-3000C16D-16GTRG) 16GB Kit (8GBx2) DDR4 3000 Desktop RAM', 4, 5, 96, 'images\\uploads\\products\\nabw-259e269c5faa002a00cdc181f8a5d667.jpeg', 0, '2019-10-14 22:45:40', '2019-11-06 23:51:38', NULL),
(11, 'ASUS Scar III', 2599, 'ASUS Scar III Core i7 GeForce RTX 2060 15.6in 240Hz Notebook', 7, 13, 49, 'images\\uploads\\products\\asus-scar-3-66eac74a854319a73a503870c5c68ffe.PNG', 1, '2019-11-06 02:10:18', '2019-11-13 17:37:33', NULL),
(12, 'Gigabyte AERO', 2399, 'Gigabyte AERO 15 9th Gen Core i7 GTX1660Ti 15.6in 144hz Notebook', 7, 14, 50, 'images\\uploads\\products\\gigabyte-aero-a3fdfb52e3fcfc6021894c1eb63b9555.PNG', 0, '2019-11-06 02:12:05', '2019-11-06 02:12:05', NULL),
(15, 'LG 22MB35D-B', 119, 'LG 22MB35D-B FHD IPS 22in Monitor', 8, 15, 50, 'images\\uploads\\products\\lghmon-0c59f1bbe80be0d355f91926baf7ab6f.jpg', 0, '2019-11-13 00:34:43', '2019-11-13 00:34:43', NULL),
(16, 'Samsung C49HG90', 1499, 'Samsung C49HG90 DFHD S-UltraWide 144Hz 49in QLED Curved Monitor', 8, 16, 45, 'images\\uploads\\products\\lc49hg90dmexxy-l-ae4dcdab1ca7d71e81c8c12b4e0a8503.jpg', 0, '2019-11-13 00:37:28', '2019-11-13 00:37:28', NULL),
(17, 'MSI Optix MPG341CQR', 1429, 'MSI Optix MPG341CQR UWQHD 144Hz Adaptive Sync HDR 34in Monitor', 8, 17, 36, 'images\\uploads\\products\\mpg341cqr-lrg-29f54ab262d6e8b80159417456e8ad84.jpg', 0, '2019-11-13 00:39:34', '2019-11-13 00:39:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Audio', 'audio', 2, '2019-09-07 01:01:52', '2019-10-14 22:01:27', '2019-10-14 22:01:27'),
(2, 'Video', 'video', 2, '2019-09-07 05:53:20', '2019-10-14 22:01:27', '2019-10-14 22:01:27'),
(3, 'AMD', 'amd', 5, '2019-09-07 16:00:58', '2019-09-07 16:00:58', NULL),
(4, 'Intel', 'intel', 5, '2019-09-07 16:01:10', '2019-09-07 16:01:10', NULL),
(5, 'DDR4', 'ddr4', 4, '2019-10-14 21:55:42', '2019-10-14 21:55:42', NULL),
(11, 'DDR3', 'ddr3', 4, '2019-10-14 22:22:45', '2019-10-14 22:22:45', NULL),
(12, 'Nvidia', 'nvidia', 6, '2019-11-06 02:05:25', '2019-11-06 02:06:10', '2019-11-06 02:06:10'),
(13, 'Asus', 'asus', 7, '2019-11-06 02:07:18', '2019-11-06 02:07:18', NULL),
(14, 'Gigabyte', 'gigabyte', 7, '2019-11-06 02:07:38', '2019-11-06 02:07:38', NULL),
(15, 'LG', 'lg', 8, '2019-11-13 00:32:09', '2019-11-13 00:32:09', NULL),
(16, 'Samsung', 'samsung', 8, '2019-11-13 00:32:20', '2019-11-13 00:32:20', NULL),
(17, 'MSI', 'msi', 8, '2019-11-13 00:32:44', '2019-11-13 00:32:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `street_address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `post_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `city_suburb_town` varchar(50) CHARACTER SET utf8 NOT NULL,
  `state_territory` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country` varchar(45) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 NOT NULL,
  `agent` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_status` int(11) NOT NULL,
  `geo_city` varchar(10) CHARACTER SET utf8 NOT NULL,
  `geo_region` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_region_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `geo_region_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_country_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `geo_country_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_latitude` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_longitude` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_timezone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `geo_currency_code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `geo_currency_symbol_utf8` varchar(10) CHARACTER SET utf8 NOT NULL,
  `geo_currency_converter` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `street_address`, `post_code`, `city_suburb_town`, `state_territory`, `country`, `role`, `agent`, `ip`, `geo_status`, `geo_city`, `geo_region`, `geo_region_code`, `geo_region_name`, `geo_country_code`, `geo_country_name`, `geo_latitude`, `geo_longitude`, `geo_timezone`, `geo_currency_code`, `geo_currency_symbol_utf8`, `geo_currency_converter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gsoto', 'Gonzalo Soto', 'soto.gonzalo@gmail.com', '$2y$10$iZnLJIylh1RLjF0QudrQneR4b2r6do5sJfYyjB6IBS.mN.bRcA9jm', 'Mansfield 123', '3421', 'Mansfield', 'South Australia', 'Australia', 'user', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '61.69.244.246', 200, 'Sydney', 'New South Wales', 'NSW', 'New South Wales', 'New South ', 'Australia', '-33.8612', '151.1982', 'Australia/Sydney', 'AUD', '$', 1.4844, '2019-10-16 00:21:32', '2019-10-16 00:21:32', NULL),
(2, 'cbravo', 'Claudia Bravo', 'cbravo@darkom.cl', '$2y$10$.kHkilH8d6l08dttpuWii.MPslj8k3qpZDaTByRmU5pQSfhza8WxK', 'Evergreen 123', '5341', 'Mansfield', 'South Australia', 'Australia', 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '61.69.244.246', 200, 'Sydney', 'New South Wales', 'NSW', 'New South Wales', 'AU', 'Australia', '-33.8612', '151.1982', 'Australia/Sydney', 'AUD', '$', 1.4844, '2019-11-04 21:28:55', '2019-11-04 21:28:55', NULL),
(3, 'aferro', 'Alessandro Ferro', 'aferro@gmail.com', '$2y$10$miPHgTSPW8epRK3WCTqkZe5UEn23QbTh8FYD0WwJ0M1ezdtXqlw9u', 'King Williams 421', '5001', 'Adelaide', 'South Australia', 'Australia', 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '127.0.0.1', 404, 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 0, '2019-11-13 00:58:15', '2019-11-13 00:58:15', NULL),
(4, 'nnguyen', 'Ngo Nguyen', 'nnguyen@gmail.com', '$2y$10$Fqx0WIlSz4bLORvQA/jXsuk0edWBuKdEoOf5a/319lBptuoekzzfK', 'Rosetta 321', '5431', 'Adelaide', 'South Australia', 'Australia', 'user', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '127.0.0.1', 404, 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 0, '2019-11-13 01:08:21', '2019-11-13 01:08:21', NULL),
(5, 'jescobar', 'Jimena Escobar', 'jescobar@gmail.com', '$2y$10$gRMIXyW6WTNEjrNBOUg/C.XX.fycYbV4hWfLW48uHI/DWRRz4LrtS', 'Bower 342', '5342', 'Adelaide', 'South Australia', 'Australia', 'user', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '127.0.0.1', 404, 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 0, '2019-11-13 01:11:21', '2019-11-13 01:11:21', NULL),
(6, 'dmolina', 'Daniela Molina', 'dmolina@gmail.com', '$2y$10$fYgfJ5vC34FwhVjJ1O7kR.MTNTVEY2gRNUiKPOoYcg.favFEFn9Ia', 'Greenwich 321', '5430', 'Adeliade', 'South Australia', 'Australia', 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '127.0.0.1', 404, 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 'UNKNOWN', 0, '2019-11-13 01:13:44', '2019-11-13 01:13:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
