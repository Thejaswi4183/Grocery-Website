-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 05:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `popular` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `image`, `meta_title`, `status`, `popular`, `created_at`) VALUES
(1, 'Fruits', 'Fruits', 'product-img-6.jpeg', 'Fruits', 1, 1, '2023-07-09 09:28:21'),
(2, 'Vegetables', 'Vegetables    ', 'product-img-7.jpg', 'Vegetables', 1, 1, '2023-07-09 09:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(191) NOT NULL,
  `name` mediumtext NOT NULL,
  `image` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `description`, `name`, `image`, `meta_keywords`, `price`, `slug`, `status`) VALUES
(1, 1, 'Strawberry', 'Strawberry', 'product-img-1.jpg', 'Strawberry', 100, 'Fruits', 0),
(2, 2, 'Cauliflower', 'Cauliflower', 'product-img-15.jpeg', 'Vegetables', 120, 'Vegetables', 0),
(3, 2, 'Onion', 'Onion', 'product-img-9.jpeg', 'Vegetables', 120, 'Vegetables', 0),
(4, 1, 'Banana', 'Banana', 'product-img-13.jpeg', 'Fruits', 20, 'Fruits', 0),
(5, 2, 'Beans', 'Beans', 'product-img-16.jpeg', 'Vegetables', 60, 'Vegetables', 0),
(6, 2, 'Tomato', 'Tomato', 'product-img-8.jpeg', 'Tomato', 80, 'Vegetables', 0),
(7, 1, 'Apple', 'Apple', 'product-img-18.jpeg', 'Fruits', 100, 'Fruits', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `email`, `token`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@mail.com', 'e6d47446e698dcf80c3b3a9175b10e81878b05dc1f515f74c858ddf5d6fdfdef'),
(5, 'cyber', 'b59c67bf196a4758191e42f76670ceba', 'cyberghostganji@gmail.com', '03257d17a5eb3362ffc70cea2789a84dfb7428aa01be01f3ccffa743c4003233'),
(7, 'ss', '934b535800b1cba8f96a5d72f72f1611', 'sujansuji2009@gmail.com', 'b2e281bfc68daf422b5eeb32dc2269b8324c8cfb3416d0080df29a42abef0f75'),
(8, 'void', '202cb962ac59075b964b07152d234b70', 'thejaswi4uns@gmail.com', '5ffac5cc0438614858203d5e6d363e33d174ffe72d4ad12ff97ff1365f1d6ca0'),
(11, 'adminadmin123', '6512bd43d9caa6e02c990b0a82652dca', 'notvoid83@gmail.com', '5077c134f258e9c3c8f0cabb4c6c19baeebcb3a7212c3d85b036935b15fad273');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
