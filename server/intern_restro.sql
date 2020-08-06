-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 09:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_restro`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `pref` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cust_id`, `name`, `email`, `phone`, `pref`) VALUES
(1, 'IR679523', 'Daft Punk', 'daft@gmail.com', 8787485985, 'nveg');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(255) NOT NULL,
  `dish_id` varchar(255) NOT NULL,
  `restro_id` varchar(255) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_description` varchar(500) NOT NULL,
  `d_type` varchar(4) NOT NULL,
  `d_price` int(5) NOT NULL,
  `d_img` varchar(50) NOT NULL,
  `d_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `dish_id`, `restro_id`, `d_name`, `d_description`, `d_type`, `d_price`, `d_img`, `d_active`) VALUES
(1, 'DISH239928', 'IR519993', 'The Crispy Bun', 'Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.', 'nveg', 90, 'burgur0.jpg', 1),
(2, 'DISH155357', 'IR519993', 'Dum Biriyani', 'Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.', 'nveg', 360, 'dumbiryani0.jpg', 1),
(3, 'DISH103172', 'IR519993', 'Onion Rings', 'Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.', 'veg', 40, 'onion.jpg', 1),
(4, 'DISH148343', 'IR519993', 'Chicken Korma', 'Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.', 'nveg', 450, 'kchicken.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `dish_id` varchar(255) NOT NULL,
  `restro_id` varchar(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `dish_id`, `restro_id`, `cust_id`, `date`) VALUES
(1, 'ORD793047', 'DISH155357', 'IR519993', 'IR679523', '01-Aug-2020'),
(2, 'ORD960309', 'DISH148343', 'IR519993', 'IR679523', '01-Aug-2020');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `restro_id` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `restro_name` varchar(100) NOT NULL,
  `restro_logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `restro_id`, `name`, `email`, `phone`, `restro_name`, `restro_logo`) VALUES
(1, 'IR519993', 'Santosh Kumar', 'skp09098@gmail.com', 9643516301, 'Hotel Picasa', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `u_id` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `role` varchar(15) NOT NULL,
  `pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_id`, `email`, `phone`, `role`, `pass`) VALUES
(1, 'IR519993', 'skp09098@gmail.com', 9643516301, 'restro', '4297f44b13955235245b2497399d7a93'),
(2, 'IR679523', 'daft@gmail.com', 8787485985, 'cust', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cust_id` (`cust_id`,`email`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restro_id` (`restro_id`,`email`,`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_id` (`u_id`,`email`,`phone`) USING HASH,
  ADD UNIQUE KEY `u_id_2` (`u_id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
