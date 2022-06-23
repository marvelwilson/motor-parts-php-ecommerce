-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 06:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_items`
--

CREATE TABLE `added_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `added_items`
--

INSERT INTO `added_items` (`id`, `product_id`, `user_id`, `total`, `sub_total`, `quantity`, `total_quantity`) VALUES
(5, 6, 8, 650000000, 650000000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `visitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `phone`, `password`, `visitor`) VALUES
(1, '08119214078', 'mypassword', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_cat` varchar(100) NOT NULL,
  `banner_image` varchar(2000) NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `banner_discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_cat`, `banner_image`, `banner_title`, `banner_discription`) VALUES
(10, 'Jewelry_Watches', 'lamborghini-sc18-alston-1.jpg', 'my spare parts just for you', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(11, 'Cellphone_acc', 'download (1).jpg', 'my spare parts just for you', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(15, 'Bobies_Moms', 'programming_room.jpg', 'my spare parts just for you', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(16, 'Body Parts', 'lamborghini-sc18-alston-1.jpg', 'this is who we are now ', 'this is just we');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `user_id`, `product_id`) VALUES
(1, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `status` varchar(42) NOT NULL,
  `tm` varchar(70) NOT NULL,
  `dy` varchar(70) NOT NULL,
  `tracking_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `product_id`, `user_id`, `total`, `sub_total`, `quantity`, `total_quantity`, `status`, `tm`, `dy`, `tracking_code`) VALUES
(5, 5, 1, 3200, 3200, 4, 4, '', '15:30:22', '2020-09-15', ''),
(6, 6, 1, 30000000, 30000000, 1, 1, '', '15:31:14', '2020-09-15', ''),
(7, 2, 1, 803, 803, 6, 6, 'pending', '06:1013', 'Sun:Oct:2020', '#12053');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `category` varchar(600) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `brand` varchar(70) NOT NULL,
  `discription` text NOT NULL,
  `amount` varchar(70) NOT NULL,
  `availability` varchar(60) NOT NULL,
  `conditions` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ad_images` text NOT NULL,
  `time_up` varchar(70) NOT NULL,
  `date_up` varchar(70) NOT NULL,
  `item_option` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `category`, `title`, `brand`, `discription`, `amount`, `availability`, `conditions`, `quantity`, `ad_images`, `time_up`, `date_up`, `item_option`) VALUES
(2, 'Wheels & Tires', 'this is the title of this product', 'Brandix 1 11 o4 a 6   ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '50000000', 'in Stock', 'New', 1, '[\"lamborghini-cost.jpg\",\"lexus.jpg\",\"programming_room.jpg\"]', '02:1030', 'Mon:Oct:2020', 'bestseller'),
(5, 'Wheels & Tires', 'venza', 'Motor spare parts', 'this is the best of all cars', '30000000', 'in Stock', 'New', 1, '[\"download (1).jpg\",\"images.jpg\",\"programming_room.jpg\"]', '12:1047', 'Wed:Oct:2020', 'bestseller'),
(6, 'Interior Parts>anything', 'lamborgini', 'Motor spare parts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '50000000', 'in Stock', 'New', 1, '[\"download (1).jpg\",\"lamborghini-cost.jpg\",\"lamborghini-sc18-alston-1.jpg\"]', '02:1030', 'Mon:Oct:2020', 'bestseller'),
(9, 'Engine & Drivetrain', 'venza', 'Motor spare parts', 'this is the best of all cars', '30000000', 'Sold', 'New', 1, '[\"download (1).jpg\",\"images.jpg\",\"programming_room.jpg\"]', '12:1047', 'Wed:Oct:2020', 'bestseller');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(58) NOT NULL,
  `lastname` varchar(58) NOT NULL,
  `company_name` varchar(1000) NOT NULL,
  `country` varchar(40) NOT NULL,
  `str_address` text NOT NULL,
  `apartment` text NOT NULL,
  `city_town` text NOT NULL,
  `state_country` text NOT NULL,
  `postcode_zip` varchar(60) NOT NULL,
  `email_address` varchar(1000) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `stats` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `firstname`, `lastname`, `company_name`, `country`, `str_address`, `apartment`, `city_town`, `state_country`, `postcode_zip`, `email_address`, `phone`, `stats`) VALUES
(1, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(2, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(3, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(4, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(5, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(6, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', ''),
(7, 1, 'marvel', 'wilson', 'my company', 'Afghanistan', '8 0sayande str off erediawa off sapele road', '', 'benin', 'edo', '300271', 'marvel@gmail.com', '907459676', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(42) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `email`, `phone`, `password`) VALUES
(1, 'marvel wilson', 'marvelwilson@gmail.com', '0907459676', 'fffff'),
(2, 'marvel min', 'yemiabiodun10@gmail.com', '', '0b5e7ebea464528f0397d996bca6e86a'),
(3, 'mark Ben', 'marvel@gmail.com', '', 'afbb4630a6dd2e9ee0f9710066869fc6'),
(4, 'pastor kle', 'marvelouswilson2000@gmail.com', '', '5970f6ced52d5e98d3d5bf28e4b993b6'),
(5, 'mwtech56@gmail.com', 'marvelwilsononit@gmail.com', '', '1eb59a70ecdbabe57a6bf731698e7c77'),
(6, '', '', '', 'fffff'),
(7, '', 'spare_parts@gmail.com', '', 'ffff'),
(8, '', 'marvel@gmail.org', '', 'jjj');

-- --------------------------------------------------------

--
-- Table structure for table `whistlist`
--

CREATE TABLE `whistlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whistlist`
--

INSERT INTO `whistlist` (`id`, `product_id`, `user_id`) VALUES
(2, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_items`
--
ALTER TABLE `added_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whistlist`
--
ALTER TABLE `whistlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_items`
--
ALTER TABLE `added_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `whistlist`
--
ALTER TABLE `whistlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
