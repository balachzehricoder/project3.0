-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 11:06 AM
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
(49, 1, 46000, 200, '2023-07-03 07:24:28', 'delivered'),
(50, 1, 11000, 200, '2023-07-03 07:25:24', 'delivered'),
(51, 1, 11000, 200, '2023-07-03 07:26:18', 'delivered'),
(52, 1, 69000, 200, '2023-07-03 07:26:42', 'delivered'),
(53, 7, 90000, 200, '2023-07-03 07:43:31', 'delivered'),
(54, 1, 4, 200, '2023-07-03 07:54:22', 'delivered'),
(55, 1, 10000, 200, '2023-07-03 07:55:23', 'delivered'),
(56, 1, 23000, 200, '2023-07-03 07:56:21', 'delivered'),
(57, 1, 2500, 200, '2023-07-03 12:22:36', 'pending'),
(58, 1, 33502, 200, '2023-07-06 10:45:07', 'pending'),
(59, 1, 10000, 200, '2023-07-06 11:29:00', 'pending'),
(60, 1, 10000, 200, '2023-07-06 11:35:01', 'pending'),
(61, 1, 33000, 200, '2023-07-07 11:06:50', 'pending'),
(62, 1, 10000, 200, '2023-07-07 11:12:28', 'pending'),
(63, 1, 1500, 200, '2023-07-07 11:13:10', 'pending'),
(64, 8, 23000, 200, '2023-07-07 11:15:11', 'pending'),
(65, 8, 33000, 200, '2023-07-07 11:17:50', 'pending'),
(66, 8, 33000, 200, '2023-07-07 11:18:19', 'pending'),
(67, 8, 10000, 200, '2023-07-07 11:18:39', 'pending'),
(68, 8, 10500, 200, '2023-07-07 11:19:56', 'pending'),
(69, 8, 20500, 200, '2023-07-07 11:23:28', 'pending'),
(70, 8, 83504, 200, '2023-07-07 11:31:30', 'pending'),
(71, 8, 10000, 200, '2023-07-07 11:46:52', 'pending'),
(72, 1, 33000, 200, '2023-07-10 08:19:43', 'pending'),
(73, 1, 500, 200, '2023-07-10 08:21:58', 'pending'),
(74, 1, 20000, 200, '2023-07-10 08:26:51', 'pending'),
(75, 1, 10500, 200, '2023-07-10 08:30:19', 'pending'),
(76, 1, 33502, 200, '2023-07-10 08:31:22', 'pending'),
(77, 1, 502, 200, '2023-07-10 08:32:11', 'pending'),
(78, 1, 10000, 200, '2023-07-10 08:34:09', 'pending'),
(79, 1, 33000, 200, '2023-07-10 08:35:45', 'pending'),
(80, 1, 33000, 200, '2023-07-10 08:49:01', 'pending'),
(81, 1, 10500, 200, '2023-07-10 08:51:49', 'pending'),
(82, 1, 33002, 200, '2023-07-10 08:57:36', 'pending'),
(83, 1, 10000, 200, '2023-07-10 09:01:40', 'pending'),
(84, 1, 23000, 200, '2023-07-10 09:12:30', 'pending'),
(85, 1, 10000, 200, '2023-07-10 09:24:13', 'pending'),
(86, 1, 10000, 200, '2023-07-10 09:25:50', 'pending'),
(87, 1, 10500, 200, '2023-07-10 09:26:22', 'pending'),
(88, 1, 10000, 200, '2023-07-10 09:27:31', 'pending'),
(89, 1, 2, 200, '2023-07-10 09:38:15', 'pending'),
(90, 1, 10000, 200, '2023-07-10 10:37:00', 'pending'),
(91, 1, 30000, 200, '2023-07-10 10:40:39', 'pending'),
(92, 1, 10000, 200, '2023-07-11 09:40:50', 'pending'),
(93, 1, 23000, 200, '2023-07-11 09:41:38', 'pending'),
(94, 1, 10000, 200, '2023-07-11 09:51:44', 'pending'),
(95, 1, 10500, 200, '2023-07-11 10:04:41', 'pending'),
(96, 1, 23002, 200, '2023-07-11 10:35:07', 'pending'),
(97, 1, 23000, 200, '2023-07-11 10:39:32', 'pending'),
(98, 1, 30010, 200, '2023-07-11 10:43:07', 'pending'),
(99, 1, 23000, 200, '2023-07-11 10:44:05', 'pending'),
(100, 1, 23000, 200, '2023-07-11 10:45:22', 'pending'),
(101, 1, 7500, 200, '2023-07-11 11:11:53', 'pending'),
(102, 1, 10000, 200, '2023-07-11 11:29:33', 'pending'),
(103, 1, 33000, 200, '2023-07-11 11:38:35', 'pending'),
(104, 8, 10000, 200, '2023-07-11 11:43:31', 'pending'),
(105, 8, 33000, 200, '2023-07-11 12:01:14', 'pending'),
(106, 8, 10000, 200, '2023-07-11 12:17:41', 'pending'),
(107, 8, 33502, 200, '2023-07-11 13:00:07', 'pending'),
(108, 8, 2, 200, '2023-07-11 13:23:00', 'pending'),
(109, 8, 23002, 200, '2023-07-11 13:24:47', 'pending'),
(110, 1, 10000, 200, '2023-07-11 13:27:24', 'pending'),
(111, 1, 23000, 200, '2023-07-11 13:39:14', 'pending'),
(112, 1, 10000, 200, '2023-07-11 21:25:19', 'pending'),
(113, 1, 50000, 200, '2023-07-11 21:36:57', 'pending'),
(114, 1, 10500, 200, '2023-07-11 21:38:02', 'delivered'),
(115, 1, 10000, 200, '2023-07-11 21:38:34', 'pending'),
(116, 1, 10000, 200, '2023-07-11 21:40:08', 'pending'),
(117, 1, 33000, 200, '2023-07-11 21:40:41', 'pending'),
(118, 8, 1040, 200, '2023-07-12 09:42:54', 'pending'),
(119, 8, 10500, 200, '2023-07-12 11:05:20', 'pending'),
(120, 8, 34542, 200, '2023-07-12 12:24:49', 'pending'),
(121, 1, 1040, 200, '2023-07-13 15:41:55', 'pending'),
(122, 1, 33000, 200, '2023-07-13 15:42:11', 'delivered'),
(123, 1, 23002, 200, '2023-07-13 15:45:11', 'delivered'),
(124, 8, 24042, 200, '2023-07-13 15:48:42', 'pending'),
(125, 1, 23000, 200, '2023-07-13 15:50:58', 'delivered'),
(126, 1, 8, 200, '2023-07-13 15:53:23', 'delivered'),
(127, 1, 500, 200, '2023-07-13 15:58:00', 'pending'),
(128, 1, 8000, 200, '2023-07-14 06:37:00', 'delivered'),
(129, 1, 10500, 200, '2023-07-14 09:08:13', 'pending'),
(130, 8, 33000, 200, '2023-07-14 09:09:12', 'pending'),
(131, 8, 10500, 200, '2023-07-14 09:11:58', 'pending'),
(132, 8, 10000, 200, '2023-07-14 09:14:17', 'pending'),
(133, 8, 24040, 200, '2023-07-14 09:16:28', 'pending'),
(134, 8, 23000, 200, '2023-07-14 09:46:06', 'pending');

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
(1, 49, 7, 23000, 2),
(2, 51, 9, 500, 2),
(3, 51, 8, 10000, 1),
(4, 52, 7, 23000, 3),
(5, 53, 8, 10000, 9),
(6, 54, 6, 2, 2),
(7, 55, 8, 10000, 1),
(8, 56, 7, 23000, 1),
(9, 57, 9, 500, 5),
(10, 58, 6, 2, 1),
(11, 58, 7, 23000, 1),
(12, 58, 8, 10000, 1),
(13, 58, 9, 500, 1),
(14, 59, 8, 10000, 1),
(15, 60, 8, 10000, 1),
(16, 61, 7, 23000, 1),
(17, 61, 8, 10000, 1),
(18, 62, 8, 10000, 1),
(19, 63, 9, 500, 3),
(20, 64, 7, 23000, 1),
(21, 65, 7, 23000, 1),
(22, 65, 8, 10000, 1),
(23, 66, 7, 23000, 1),
(24, 66, 8, 10000, 1),
(25, 67, 8, 10000, 1),
(26, 68, 8, 10000, 1),
(27, 68, 9, 500, 1),
(28, 69, 8, 10000, 2),
(29, 69, 9, 500, 1),
(30, 70, 8, 10000, 6),
(31, 70, 9, 500, 1),
(32, 70, 6, 2, 2),
(33, 70, 7, 23000, 1),
(34, 71, 8, 10000, 1),
(35, 72, 7, 23000, 1),
(36, 72, 8, 10000, 1),
(37, 73, 9, 500, 1),
(38, 74, 8, 10000, 2),
(39, 75, 9, 500, 1),
(40, 75, 8, 10000, 1),
(41, 76, 8, 10000, 1),
(42, 76, 7, 23000, 1),
(43, 76, 6, 2, 1),
(44, 76, 9, 500, 1),
(45, 77, 6, 2, 1),
(46, 77, 9, 500, 1),
(47, 78, 8, 10000, 1),
(48, 79, 7, 23000, 1),
(49, 79, 8, 10000, 1),
(50, 80, 7, 23000, 1),
(51, 80, 8, 10000, 1),
(52, 81, 8, 10000, 1),
(53, 81, 9, 500, 1),
(54, 82, 6, 2, 1),
(55, 82, 7, 23000, 1),
(56, 82, 8, 10000, 1),
(57, 83, 8, 10000, 1),
(58, 84, 7, 23000, 1),
(59, 85, 8, 10000, 1),
(60, 86, 8, 10000, 1),
(61, 87, 8, 10000, 1),
(62, 87, 9, 500, 1),
(63, 88, 8, 10000, 1),
(64, 89, 6, 2, 1),
(65, 90, 8, 10000, 1),
(66, 91, 8, 10000, 3),
(67, 92, 8, 10000, 1),
(68, 93, 7, 23000, 1),
(69, 94, 8, 10000, 1),
(70, 95, 8, 10000, 1),
(71, 95, 9, 500, 1),
(72, 96, 7, 23000, 1),
(73, 96, 6, 2, 1),
(74, 97, 7, 23000, 1),
(75, 98, 8, 10000, 3),
(76, 98, 6, 2, 5),
(77, 99, 7, 23000, 1),
(78, 100, 7, 23000, 1),
(79, 101, 9, 500, 15),
(80, 102, 8, 10000, 1),
(81, 103, 7, 23000, 1),
(82, 103, 8, 10000, 1),
(83, 104, 8, 10000, 1),
(84, 105, 7, 23000, 1),
(85, 105, 8, 10000, 1),
(86, 106, 8, 10000, 1),
(87, 107, 6, 2, 1),
(88, 107, 7, 23000, 1),
(89, 107, 8, 10000, 1),
(90, 107, 9, 500, 1),
(91, 108, 6, 2, 1),
(92, 109, 7, 23000, 1),
(93, 109, 6, 2, 1),
(94, 110, 8, 10000, 1),
(95, 111, 7, 23000, 1),
(96, 112, 8, 10000, 1),
(97, 113, 8, 10000, 5),
(98, 114, 8, 10000, 1),
(99, 114, 9, 500, 1),
(100, 115, 8, 10000, 1),
(101, 116, 8, 10000, 1),
(102, 117, 7, 23000, 1),
(103, 117, 8, 10000, 1),
(104, 118, 11, 1040, 1),
(105, 119, 8, 10000, 1),
(106, 119, 9, 500, 1),
(107, 120, 6, 2, 1),
(108, 120, 7, 23000, 1),
(109, 120, 8, 10000, 1),
(110, 120, 9, 500, 1),
(111, 120, 11, 1040, 1),
(112, 121, 11, 1040, 1),
(113, 122, 7, 23000, 1),
(114, 122, 8, 10000, 1),
(115, 123, 6, 2, 1),
(116, 123, 7, 23000, 1),
(117, 124, 11, 1040, 1),
(118, 124, 6, 2, 1),
(119, 124, 7, 23000, 1),
(120, 125, 7, 23000, 1),
(121, 126, 6, 2, 4),
(122, 127, 9, 500, 1),
(123, 128, 9, 500, 16),
(124, 129, 8, 10000, 1),
(125, 129, 9, 500, 1),
(126, 130, 7, 23000, 1),
(127, 130, 8, 10000, 1),
(128, 131, 8, 10000, 1),
(129, 131, 9, 500, 1),
(130, 132, 8, 10000, 1),
(131, 133, 7, 23000, 1),
(132, 133, 11, 1040, 1),
(133, 134, 7, 23000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_tax` int(11) NOT NULL,
  `img_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_qty`, `p_tax`, `img_upload`) VALUES
(6, 'realme c21', '2,000', 1, 12, 'databaseimgs/realme.jpeg'),
(7, 'iphone ', '23000', 1, 12, 'databaseimgs/download (1).jpeg'),
(8, 'realme c3', '10000', 1, 12, 'databaseimgs/c2.jpeg'),
(9, 'Headphones ', '500', 1, 13, 'databaseimgs/download.jpeg'),
(11, 'Samsung a 34', '1040', 1, 12, 'databaseimgs/a34.jpg');

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
(1, 'balach', 'balach@mail.com', 123, '$2y$10$UpurSLe.yP4ybI1ioW58tuOj.7bYqayjxm4KaS/drhx8dQemmXPTG', 'user', 'akdsfn'),
(5, 'balach', 'balach12@gmail.com', 2147483647, '$2y$10$QBbLDuN5HiE5WIf78unuy.K7nQaB0n1vVJemMSFM7ZndwqtRHjBkG', 'user', 'kajnfksnknf'),
(7, 'ajdsnfjn', 'balach@hotmail.com', 123, '$2y$10$TOlhiE1a05lI48.CrPg0VeKolReVrpRDBNyJOuX1yCRbwkKjWBJr.', 'user', '123'),
(8, 'Balach zehri', 'balachzehr7@gmail.com', 2147483647, '$2y$10$aiWFFQ2rmrjn7Octc4km5e9yqzRC1mbTKnXTcCNce8lt3sbVbM/Aa', 'user', 'apsara appartment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMINid`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
