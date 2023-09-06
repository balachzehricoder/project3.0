-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 12:23 AM
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
(1, 'admin', 'admin@gmail.com', 'admin12345');

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
(9, 'Accessories', 'uploads/OIP.jpeg', 'a phone charger and may types of headphones and data cable');

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
(214, 15, 76000, 200, '2023-08-30 03:30:11', 'delivered'),
(215, 15, 75000, 200, '2023-08-30 03:31:32', 'pending'),
(216, 15, 33000, 200, '2023-09-04 06:53:57', 'delivered'),
(217, 15, 20000, 200, '2023-09-04 07:11:54', 'pending'),
(218, 16, 33000, 200, '2023-09-04 10:32:12', 'pending'),
(219, 15, 20000, 200, '2023-09-04 15:56:46', 'pending'),
(220, 15, 100, 200, '2023-09-05 10:32:24', 'pending'),
(221, 15, 35000, 200, '2023-09-05 10:32:53', 'pending'),
(222, 15, 113000, 200, '2023-09-05 15:07:52', 'pending'),
(223, 15, 21000, 200, '2023-09-06 11:56:51', 'pending'),
(224, 15, 241080, 200, '2023-09-06 12:06:35', 'pending'),
(225, 15, 1096512, 200, '2023-09-06 12:44:12', 'pending'),
(226, 15, 35000, 200, '2023-09-06 12:45:39', 'pending'),
(227, 15, 900120, 200, '2023-09-06 20:39:59', 'pending'),
(228, 15, 728120, 200, '2023-09-06 20:40:49', 'pending'),
(229, 15, 1275192, 200, '2023-09-06 20:42:51', 'pending');

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
(267, 214, 6, 20000, 1),
(268, 214, 7, 35000, 1),
(269, 214, 8, 21000, 1),
(270, 215, 7, 35000, 1),
(271, 215, 11, 40000, 1),
(272, 216, 8, 21000, 1),
(273, 216, 9, 12000, 1),
(274, 217, 6, 20000, 1),
(275, 218, 8, 21000, 1),
(276, 218, 9, 12000, 1),
(277, 219, 6, 20000, 1),
(278, 220, 20, 100, 1),
(279, 221, 7, 35000, 1),
(280, 222, 9, 12000, 1),
(281, 222, 8, 21000, 1),
(282, 222, 11, 40000, 1),
(283, 222, 6, 20000, 1),
(284, 222, 10, 20000, 1),
(285, 223, 8, 21000, 1),
(286, 224, 8, 21000, 1),
(287, 224, 10, 20000, 1),
(288, 224, 13, 200080, 1),
(289, 225, 17, 1000012, 1),
(290, 225, 22, 6500, 1),
(291, 225, 16, 90000, 1),
(292, 226, 7, 35000, 1),
(293, 227, 12, 300040, 3),
(294, 228, 11, 40000, 1),
(295, 228, 9, 12000, 1),
(296, 228, 8, 21000, 1),
(297, 228, 7, 35000, 1),
(298, 228, 6, 20000, 1),
(299, 228, 12, 300040, 1),
(300, 228, 13, 200080, 1),
(301, 228, 10, 20000, 5),
(302, 229, 20, 100, 1),
(303, 229, 17, 1000012, 1),
(304, 229, 11, 40000, 1),
(305, 229, 7, 35000, 1),
(306, 229, 13, 200080, 1);

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
(6, ' c2', 20000, 1, 1, 'databaseimgs/OIP (3).jpeg', 6),
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
(22, 'realme air burd', 6500, 1, 1, 'databaseimgs/OIP (19).jpeg', 9),
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
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password`, `role`, `address`) VALUES
(15, 'balach', 'balachzehr@gmail.com', '2147483647', '$2y$10$vgpesEzlzONW8I9tnCVLGemsKKSi/iBg4vUlLdsEI8z3ifDpOi1lK', 'user', 'apsara appartment'),
(16, 'hacker', 'hacker@gmail.com', '123', '$2y$10$v4SDAW5XY.ohRL9HV0xsO.PLDec1.txup.kmQTcw1XqbF7NJnHKC6', 'user', 'dhhdhdhd');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
