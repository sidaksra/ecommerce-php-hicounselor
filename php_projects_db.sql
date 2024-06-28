-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2024 at 06:50 PM
-- Server version: 8.0.37-0ubuntu0.20.04.3
-- PHP Version: 7.4.3-4ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`) VALUES
(42, 1, 1),
(43, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `total_price`, `created_at`) VALUES
(17, 'EPVvTTiEkA', 'zPLzf@example.com', '1285890307', '427,QnyFc,hYfXghC', '25.00', '2024-05-29 11:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `quantity`) VALUES
(1, 'Product 1', 'Description of Product 1', '10.00', 'https://via.placeholder.com/300', 1),
(2, 'Product 2', 'Description of Product 2', '15.00', 'https://via.placeholder.com/300', 1),
(3, 'Product 3', 'Description of Product 3', '20.00', 'https://via.placeholder.com/300', 1),
(4, 'Product 4', 'Description of Product 4', '25.00', 'https://via.placeholder.com/300', 1),
(5, 'Product 5', 'Description of Product 5', '30.00', 'https://via.placeholder.com/300', 1),
(6, 'Product 6', 'Description of Product 6', '35.00', 'https://via.placeholder.com/300', 1),
(7, 'Product 7', 'Description of Product 7', '40.00', 'https://via.placeholder.com/300', 1),
(8, 'Product 8', 'Description of Product 8', '45.00', 'https://via.placeholder.com/300', 1),
(9, 'Product 9', 'Description of Product 9', '50.00', 'https://via.placeholder.com/300', 1),
(10, 'Product 10', 'Description of Product 10', '55.00', 'https://via.placeholder.com/300', 1),
(11, 'Product 11', 'Description of Product 11', '60.00', 'https://via.placeholder.com/300', 1),
(12, 'Product 12', 'Description of Product 12', '65.00', 'https://via.placeholder.com/300', 1),
(13, 'Product 13', 'Description of Product 13', '70.00', 'https://via.placeholder.com/300', 1),
(14, 'Product 14', 'Description of Product 14', '75.00', 'https://via.placeholder.com/300', 1),
(15, 'Product 15', 'Description of Product 15', '80.00', 'https://via.placeholder.com/300', 1),
(16, 'Product 16', 'Description of Product 16', '85.00', 'https://via.placeholder.com/300', 1),
(17, 'Product 17', 'Description of Product 17', '90.00', 'https://via.placeholder.com/300', 1),
(18, 'Product 18', 'Description of Product 18', '95.00', 'https://via.placeholder.com/300', 1),
(19, 'Product 19', 'Description of Product 19', '100.00', 'https://via.placeholder.com/300', 1),
(20, 'Product 20', 'Description of Product 20', '105.00', 'https://via.placeholder.com/300', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_date`) VALUES
(2, 'Devraj', 'dev', 'devraj@hicounselor.com', '$2y$10$608o28EeEnPLjLn3gy/rLu1HVS5KFRKFhzLfywA1NhRECejDQK486', '2024-05-08 06:40:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
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
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
