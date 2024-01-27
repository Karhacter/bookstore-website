-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 09:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0588_duckhanh_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_banner`
--

CREATE TABLE `2122110588_banner` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `position` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `2122110588_banner`
--

INSERT INTO `2122110588_banner` (`id`, `name`, `link`, `sort_order`, `position`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Sách mới năm 2024', 'https://res.cloudinary.com/dr7696xo1/image/upload/v1704211285/slide_1_yjmskw.jpg', 1, 'slidehow', 'slide_1.jpg', '2024-01-02 14:07:40', 1, NULL, 1, 1),
(2, 'Sách tái bản 2024', 'public/images/banner/slide_2.jpg', 2, 'slidehow', 'slide_2.jpg', '2024-01-02 15:39:03', 1, NULL, 1, 1),
(3, 'Sách hay đón hè', 'public/images/banner/slide_3.jpg', 3, 'slidehow', 'slide_3.jpg', '2024-01-02 15:42:30', 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_brand`
--

CREATE TABLE `2122110588_brand` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Not Null',
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Not Null',
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Default 0',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT 'Not Null',
  `created_by` int UNSIGNED NOT NULL COMMENT 'Not Null',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2' COMMENT 'Default 2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `2122110588_brand`
--

INSERT INTO `2122110588_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Kim đồng', 'kim-dong', 'kim-dong.png', 1, 'Nhà xuất bản kim đồng', '2023-12-29 12:10:29', 1, '2024-01-05 09:56:29', 1, 2),
(2, 'Alpha Books', 'alpha-books', 'Alpha-Books.png', 2, 'Nhà xuất bản Alpha Books', '2024-01-04 15:31:04', 1, '2024-01-05 09:56:30', 1, 2),
(3, 'Trẻ', 'tre', 'tre.png', 3, 'Nhà xuất bản Trẻ', '2024-01-04 15:32:25', 1, '2024-01-05 09:56:32', 1, 2),
(4, 'MCBooks', 'MCBooks', 'mcbook.png', 4, 'Nhà xuất bản MCBooks', '2024-01-04 15:33:00', 1, '2024-01-05 09:56:37', 1, 1),
(5, 'Lao Động', 'lao-dong', 'lao-dong.png', 5, 'Nhà xuất bản Lao Động', '2024-01-04 15:34:18', 1, '2024-01-05 09:56:38', 1, 1),
(6, 'Nhã Nam', 'nha-nam', 'nha-nam.png', 6, 'Nhà xuất bản Nhã Nam', '2024-01-04 15:34:52', 1, '2024-01-05 09:56:36', 1, 2),
(7, 'Hội Nhà Văn', 'nha-van', 'nha-van.png', 0, 'nhà xuất bản hội nhà văn ', '2024-01-04 17:35:26', 1, '2024-01-04 17:35:26', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_category`
--

CREATE TABLE `2122110588_category` (
  `id` int UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` int DEFAULT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `2122110588_category`
--

INSERT INTO `2122110588_category` (`id`, `name`, `slug`, `image`, `parent_id`, `sort_order`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Tiểu thuyết', 'tieu-thuyet', NULL, 0, 0, 'Tiểu thuyết', '2024-01-02 16:13:04', 1, '2024-01-02 23:13:04', 0, 1),
(2, 'Tâm lý', 'tam-ly', NULL, 0, 0, 'Tâm lý', '2024-01-02 16:16:22', 1, '2024-01-02 23:16:22', 0, 1),
(3, 'Kinh tế', 'kinh-te', NULL, 0, 0, 'Kinh tế', '2024-01-02 16:21:41', 1, '2024-01-02 23:13:04', 0, 1),
(4, 'Truyện tranh', 'truyen-tranh', NULL, 0, 0, 'Truyện tranh', '2024-01-02 16:22:17', 1, '2024-01-02 23:13:04', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_contact`
--

CREATE TABLE `2122110588_contact` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `reply_id` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_menu`
--

CREATE TABLE `2122110588_menu` (
  `id` int NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `link` varchar(1) COLLATE utf8mb3_unicode_ci NOT NULL,
  `table_id` int UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_order`
--

CREATE TABLE `2122110588_order` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_orderdetail`
--

CREATE TABLE `2122110588_orderdetail` (
  `id` int NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_post`
--

CREATE TABLE `2122110588_post` (
  `id` int UNSIGNED NOT NULL,
  `topic_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_product`
--

CREATE TABLE `2122110588_product` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `brand_id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `pricesale` float DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `detail` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_topic`
--

CREATE TABLE `2122110588_topic` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `2122110588_user`
--

CREATE TABLE `2122110588_user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `roles` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'admin or customer',
  `created_at` datetime NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2122110588_banner`
--
ALTER TABLE `2122110588_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_brand`
--
ALTER TABLE `2122110588_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_category`
--
ALTER TABLE `2122110588_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_contact`
--
ALTER TABLE `2122110588_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_menu`
--
ALTER TABLE `2122110588_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_order`
--
ALTER TABLE `2122110588_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_orderdetail`
--
ALTER TABLE `2122110588_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_post`
--
ALTER TABLE `2122110588_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_product`
--
ALTER TABLE `2122110588_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_topic`
--
ALTER TABLE `2122110588_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2122110588_user`
--
ALTER TABLE `2122110588_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2122110588_banner`
--
ALTER TABLE `2122110588_banner`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `2122110588_brand`
--
ALTER TABLE `2122110588_brand`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `2122110588_category`
--
ALTER TABLE `2122110588_category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT';

--
-- AUTO_INCREMENT for table `2122110588_contact`
--
ALTER TABLE `2122110588_contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_menu`
--
ALTER TABLE `2122110588_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_order`
--
ALTER TABLE `2122110588_order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_orderdetail`
--
ALTER TABLE `2122110588_orderdetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_post`
--
ALTER TABLE `2122110588_post`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_product`
--
ALTER TABLE `2122110588_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_topic`
--
ALTER TABLE `2122110588_topic`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `2122110588_user`
--
ALTER TABLE `2122110588_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
