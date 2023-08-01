-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 10:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonesell.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMINid` int(11) NOT NULL,
  `ADMIN_NAME` varchar(100) NOT NULL,
  `ADMIN_EMAILID` varchar(100) NOT NULL,
  `ADMIN_PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMINid`, `ADMIN_NAME`, `ADMIN_EMAILID`, `ADMIN_PASSWORD`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`, `description`) VALUES
(6, 'Realme', 'uploads/R.png', 'Realme is a very good brand'),
(7, 'Samsung', 'uploads/OIP (3).jpeg', 'Samsung is a very good company '),
(8, 'Apple', 'uploads/download.jpeg', 'apple is a good comany'),
(9, 'Accessioes', 'uploads/OIP.jpeg', 'a phone charger and may types of headphones and data cable');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `delivery_charges` int(11) NOT NULL,
  `order_date_time` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `delivery_charges`, `order_date_time`, `status`) VALUES
(163, 10, 100000, 200, '2023-07-22 12:44:23', 'delivered'),
(164, 10, 20000, 200, '2023-07-22 12:47:02', 'delivered'),
(165, 10, 1020050, 200, '2023-07-23 08:10:36', 'delivered'),
(166, 10, 630120, 200, '2023-07-23 11:25:50', 'delivered'),
(167, 12, 90000, 200, '2023-07-24 06:28:16', 'delivered'),
(168, 12, 56000, 200, '2023-07-24 06:28:43', 'delivered'),
(169, 12, 58243040, 200, '2023-07-24 06:33:37', 'delivered'),
(170, 12, 4000170, 200, '2023-07-24 06:38:41', 'delivered'),
(171, 12, 68000, 200, '2023-07-24 06:41:04', 'delivered'),
(172, 10, 100000, 200, '2023-07-24 07:05:49', 'delivered'),
(173, 10, 1000050, 200, '2023-07-24 07:12:07', 'delivered'),
(174, 10, 1100040, 200, '2023-07-24 08:43:50', 'delivered'),
(175, 10, 1000050, 200, '2023-07-24 08:46:22', 'delivered'),
(176, 10, 290080, 200, '2023-07-24 08:53:47', 'delivered'),
(177, 10, 1000050, 200, '2023-07-24 08:55:27', 'delivered'),
(178, 13, 1090050, 200, '2023-07-24 08:59:37', 'delivered'),
(179, 10, 40000, 200, '2023-07-24 09:13:26', 'delivered'),
(180, 10, 190000, 200, '2023-07-24 11:17:44', 'delivered'),
(181, 10, 125000, 200, '2023-07-24 11:21:13', 'delivered'),
(182, 10, 200080, 200, '2023-07-24 11:41:42', 'delivered'),
(183, 10, 35000, 200, '2023-07-24 11:56:15', 'delivered'),
(184, 10, 78100, 200, '2023-07-24 12:19:35', 'delivered'),
(185, 10, 1213200, 200, '2023-07-24 13:08:07', 'delivered'),
(186, 10, 300, 200, '2023-07-24 13:18:47', 'delivered'),
(187, 10, 35000, 200, '2023-07-24 15:12:44', 'delivered'),
(188, 10, 12300, 200, '2023-07-24 15:41:40', 'delivered'),
(189, 10, 500, 200, '2023-07-25 10:20:51', 'delivered'),
(190, 10, 1000, 200, '2023-07-27 09:06:26', 'delivered'),
(191, 10, 41000, 200, '2023-07-27 09:42:24', 'delivered'),
(192, 10, 1300, 200, '2023-07-27 10:03:45', 'delivered'),
(193, 12, 300040, 200, '2023-07-27 10:06:01', 'delivered'),
(194, 10, 39900, 200, '2023-07-27 10:51:50', 'delivered'),
(195, 10, 21500, 200, '2023-07-28 23:27:27', 'pending'),
(196, 10, 33000, 200, '2023-07-28 23:29:16', 'pending'),
(197, 10, 147000, 200, '2023-07-31 10:43:33', 'delivered'),
(198, 10, 35000, 200, '2023-07-31 12:01:13', 'pending'),
(199, 10, 35000, 200, '2023-07-31 12:34:24', 'pending'),
(200, 10, 300040, 200, '2023-07-31 12:36:07', 'pending'),
(201, 10, 221380, 200, '2023-07-31 14:49:17', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`) VALUES
(179, 163, 15, 100000, 1),
(180, 164, 6, 20000, 1),
(181, 165, 18, 1000050, 1),
(182, 165, 6, 20000, 1),
(183, 166, 11, 40000, 1),
(184, 166, 12, 300040, 1),
(185, 166, 13, 200080, 1),
(186, 166, 16, 90000, 1),
(187, 167, 16, 90000, 1),
(188, 168, 8, 21000, 1),
(189, 168, 7, 35000, 1),
(190, 169, 14, 100040, 1),
(191, 169, 7, 35000, 1),
(192, 169, 9, 12000, 9),
(193, 169, 6, 20000, 2900),
(194, 170, 17, 1000040, 3),
(195, 170, 18, 1000050, 1),
(196, 171, 8, 21000, 1),
(197, 171, 7, 35000, 1),
(198, 171, 9, 12000, 1),
(199, 172, 15, 100000, 1),
(200, 173, 18, 1000050, 1),
(201, 174, 15, 100000, 1),
(202, 174, 17, 1000040, 1),
(203, 175, 18, 1000050, 1),
(204, 176, 16, 90000, 1),
(205, 176, 13, 200080, 1),
(206, 177, 18, 1000050, 1),
(207, 178, 18, 1000050, 1),
(208, 178, 16, 90000, 1),
(209, 179, 11, 40000, 1),
(210, 180, 15, 100000, 1),
(211, 180, 16, 90000, 1),
(212, 181, 7, 35000, 1),
(213, 181, 16, 90000, 1),
(214, 182, 13, 200080, 1),
(215, 183, 7, 35000, 1),
(216, 184, 26, 700, 1),
(217, 184, 7, 35000, 1),
(218, 184, 6, 20000, 2),
(219, 184, 27, 300, 8),
(220, 185, 27, 300, 12),
(221, 185, 15, 100000, 12),
(222, 185, 25, 800, 12),
(223, 186, 19, 300, 1),
(224, 187, 7, 35000, 1),
(225, 188, 9, 12000, 1),
(226, 188, 27, 300, 1),
(227, 189, 23, 500, 1),
(228, 190, 27, 300, 1),
(229, 190, 26, 700, 1),
(230, 191, 6, 20000, 1),
(231, 191, 8, 21000, 1),
(232, 192, 24, 600, 1),
(233, 192, 26, 700, 1),
(234, 193, 12, 300040, 1),
(235, 194, 22, 4000, 1),
(236, 194, 7, 35000, 1),
(237, 194, 21, 900, 1),
(238, 195, 23, 500, 1),
(239, 195, 8, 21000, 1),
(240, 196, 8, 21000, 1),
(241, 196, 9, 12000, 1),
(242, 197, 15, 100000, 1),
(243, 197, 7, 35000, 1),
(244, 197, 9, 12000, 1),
(245, 198, 7, 35000, 1),
(246, 199, 7, 35000, 1),
(247, 200, 12, 300040, 1),
(248, 201, 27, 300, 1),
(249, 201, 13, 200080, 1),
(250, 201, 8, 21000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_tax` int(11) NOT NULL,
  `img_upload` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_qty`, `p_tax`, `img_upload`, `category_id`) VALUES
(6, 'realme c2', 20000, 1, 1, 'databaseimgs/OIP (3).jpeg', 6),
(7, 'realme c33', 35000, 1, 1, 'databaseimgs/OIP (9).jpeg', 6),
(8, 'realme c21', 21000, 1, 1, 'databaseimgs/OIP (7).jpeg', 6),
(9, 'realme c 12', 12000, 1, 1, 'databaseimgs/OIP (6).jpeg', 6),
(10, 'realme c3', 20000, 1, 1, 'databaseimgs/OIP (5).jpeg', 6),
(11, 'iphone 8', 40000, 1, 1, 'databaseimgs/OIP (13).jpeg', 8),
(12, 'iphone 14', 300040, 1, 1, 'databaseimgs/download (1).jpeg', 8),
(13, 'iphone 13', 200080, 1, 1, 'databaseimgs/OIP (14).jpeg', 8),
(14, 'iphone 12', 100040, 1, 1, 'databaseimgs/OIP (16).jpeg', 8),
(15, 'iphone 11', 100000, 1, 1, 'databaseimgs/OIP (15).jpeg', 8),
(16, 'iphone x', 90000, 1, 1, 'databaseimgs/download.jpeg', 8),
(17, 'Samsung a33', 1000012, 1, 1, 'databaseimgs/OIP (11).jpeg', 7),
(18, 'smasung a34', 1000040, 1, 1, 'databaseimgs/OIP (12).jpeg', 7),
(19, 'realme data cable', 300, 1, 1, 'databaseimgs/OIP (17).jpeg', 9),
(20, 'realme handsfree', 100, 1, 1, 'databaseimgs/OIP (18).jpeg', 9),
(21, 'Samsung data cable type c', 900, 1, 1, 'databaseimgs/OIP (20).jpeg', 9),
(22, 'realme air burd', 4000, 1, 1, 'databaseimgs/OIP (19).jpeg', 9),
(23, 'Samsung adapter', 500, 1, 1, 'databaseimgs/OIP (22).jpeg', 9),
(24, 'Samsung akg handfree', 600, 1, 1, 'databaseimgs/OIP (21).jpeg', 9),
(25, 'apple data cable', 800, 1, 1, 'databaseimgs/OIP (23).jpeg', 9),
(26, 'apple handsfree', 700, 1, 1, 'databaseimgs/OIP (24).jpeg', 9),
(27, 'apple converter', 300, 1, 1, 'databaseimgs/OIP (25).jpeg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password`, `role`, `address`) VALUES
(10, 'Balach zehri', 'balachzehr7@gmail.com', 2147483647, '$2y$10$IxSSoRtNSMiNZSoklJ6O8.gjzc577xp8wTx8YIKzqz3QrWeiTfkgy', 'user', 'apsara apartment'),
(11, 'muhammad hadi', 'muhammad123hadi@gmail.com', 2147483647, '$2y$10$bke8a8agAVfYximAbaFeReyA4ykE4osD4mi7Ikhl3dlMj5YhbjYri', 'user', 'gulshan-e-iqbal'),
(12, 'hadi habib', 'hadi.habib315@gmail.com', 2147483647, '$2y$10$469V.mx.HVKLxoLYSLBzC.bXtm.Zvvzgue0JtuHpYZ43VcD8RgGD2', 'user', 'gulshan'),
(13, 'codewithbz', 'codewithbz@gmail.com', 2147483647, '$2y$10$ypRCZSkpo4nNrQgWWxggZe4q6lqhE8IuzfrQDNWjfYgV.6/J0UISa', 'user', 'gulshan-e-iqbal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMINid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_ibfk_1` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMINid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
