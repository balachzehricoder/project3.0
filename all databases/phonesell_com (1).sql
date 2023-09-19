-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 12:21 PM
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
(23, 'realme', 'category_pictures/OIP.jpeg', 'realme is a good brand'),
(24, 'samsung', 'category_pictures/OIP (1).jpeg', 'it is a very huge brand'),
(25, 'apple', 'category_pictures/OIP (2).jpeg', 'make a good products '),
(26, 'Accessory', 'category_pictures/OPI.png', 'threr are a many type of handsfree charger datacable');

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
(231, 15, 106999, 200, '2023-09-14 22:17:40', 'delivered'),
(232, 15, 30000, 200, '2023-09-14 22:18:53', 'delivered'),
(233, 17, 3301977, 200, '2023-09-15 13:03:23', 'delivered'),
(234, 15, 40000, 200, '2023-09-18 07:15:31', 'delivered'),
(235, 17, 43000, 200, '2023-09-18 07:16:50', 'delivered'),
(236, 15, 20000, 200, '2023-09-19 11:43:50', 'delivered'),
(237, 15, 69000, 200, '2023-09-19 11:45:22', 'pending'),
(238, 15, 46000, 200, '2023-09-19 11:45:55', 'pending'),
(239, 15, 15000, 200, '2023-09-19 11:47:36', 'pending'),
(240, 15, 23000, 200, '2023-09-19 11:49:01', 'delivered'),
(241, 15, 15000, 200, '2023-09-19 11:49:44', 'pending'),
(242, 15, 20000, 200, '2023-09-19 11:50:35', 'pending'),
(243, 17, 20000, 200, '2023-09-19 12:03:57', 'pending'),
(244, 15, 90000, 200, '2023-09-19 12:13:04', 'pending'),
(245, 17, 20000, 200, '2023-09-19 12:14:40', 'pending'),
(246, 17, 20000, 200, '2023-09-19 12:16:09', 'pending'),
(247, 17, 20000, 200, '2023-09-19 12:16:40', 'pending'),
(248, 17, 46000, 200, '2023-09-19 12:17:31', 'pending');

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
(308, 231, 31, 23000, 1),
(309, 231, 32, 15000, 1),
(310, 231, 35, 68999, 1),
(311, 232, 33, 30000, 1),
(312, 233, 36, 138999, 23),
(313, 233, 32, 15000, 7),
(314, 234, 30, 20000, 2),
(315, 235, 30, 20000, 1),
(316, 235, 31, 23000, 1),
(317, 236, 30, 20000, 1),
(318, 237, 31, 23000, 3),
(319, 238, 31, 23000, 2),
(320, 239, 32, 15000, 1),
(321, 240, 31, 23000, 1),
(322, 241, 32, 15000, 1),
(323, 242, 30, 20000, 1),
(324, 243, 30, 20000, 1),
(325, 244, 33, 30000, 3),
(326, 245, 30, 20000, 1),
(327, 246, 30, 20000, 1),
(328, 247, 30, 20000, 1),
(329, 248, 31, 23000, 2);

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
(30, 'realme c2', 20000, 1, 12, 'databaseimgs/OIP (3).jpeg', 23),
(31, 'realme c3', 23000, 1, 13, 'databaseimgs/OIP (5).jpeg', 23),
(32, 'realme c12', 15000, 1, 10, 'databaseimgs/OIP (6).jpeg', 23),
(33, 'realme c21', 30000, 1, 12, 'databaseimgs/OIP (7).jpeg', 23),
(34, 'realme c33', 60000, 1, 12, 'databaseimgs/OIP (9).jpeg', 23),
(35, 'Samsung galaxy a33', 68999, 1, 12, 'databaseimgs/OIP (12).jpeg', 24),
(36, 'Samsung galaxy a34 ', 138999, 1, 12, 'databaseimgs/OIP (11).jpeg', 24);

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
(16, 'hacker', 'hacker@gmail.com', '123', '$2y$10$v4SDAW5XY.ohRL9HV0xsO.PLDec1.txup.kmQTcw1XqbF7NJnHKC6', 'user', 'dhhdhdhd'),
(17, 'balach', 'balachzehr7@gmail.com', '03313345084', '$2y$10$k3pZauhpodZufOBt7OF5VOfbROzkzYUStfUSrpX5q0vAC5Na9HuuO', 'user', 'apsara apartment Gulshan-e-Iqbal block 17 karachi');

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`) VALUES
(19, 17, 32);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
