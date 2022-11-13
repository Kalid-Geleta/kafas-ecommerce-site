-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.byetcluster.com
-- Generation Time: Aug 18, 2022 at 07:50 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32160717_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `is_deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `is_deleted`) VALUES
('096h53kg', 'tie', 0),
('7c3owynj', 'iuuhdhd', 0),
('fik82n7g', 'fish', 0),
('vhm296r1', 'fri', 0),
('xt0fpba1', 'uiiokj', 0),
('zqntm48u', 'gold', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `payment_type` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `order_amount`, `order_status`, `created_at`, `payment_type`, `updated_at`, `is_deleted`) VALUES
('1ivnbye0', 'ctmhueoq', 1, 0, '2022-07-13 02:24:18', 0, '2022-07-13 02:24:18', 1),
('1wx9bf3g', 'oj5h8awu', 1, 0, '2022-07-14 11:26:05', 0, '2022-07-14 11:26:05', 1),
('5xq1fazw', 'ir680nxy', 1, 0, '2022-07-18 04:25:45', 0, '2022-07-18 04:25:45', 1),
('8og7pqi4', '6wa5kvhj', 1, 0, '2022-07-15 01:20:55', 0, '2022-07-15 01:20:55', 1),
('ex6cov18', 'j1wav3k8', 1, 0, '2022-07-26 11:04:17', 0, '2022-07-26 11:04:17', 1),
('i7pgx8yn', 'bt0pgyn8', 1, 0, '2022-07-14 11:19:39', 0, '2022-07-14 11:19:39', 1),
('mt8ujc4g', '1bofg7ue', 1, 0, '2022-07-19 04:07:45', 0, '2022-07-19 04:07:45', 1),
('nhog3jbf', 'agr6t9ce', 1, 0, '2022-07-13 05:22:53', 0, '2022-07-13 05:22:53', 1),
('q89f3x2t', '3', 1, 0, '2022-07-13 11:16:32', 0, '2022-07-13 11:16:32', 1),
('v2h6r1zf', 'z6yw2fx9', 1, 0, '2022-07-13 04:31:55', 0, '2022-07-13 04:31:55', 1),
('v9ag8hz1', 'ip3hqy80', 1, 0, '2022-07-13 01:26:21', 0, '2022-07-13 01:26:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `orderdetails_id` varchar(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `product_price` double NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `orderdetails_total` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`orderdetails_id`, `order_id`, `user_id`, `product_id`, `product_price`, `order_quantity`, `orderdetails_total`, `created_at`, `updated_at`, `is_deleted`) VALUES
('0citlgzm', 'mt8ujc4g', '1bofg7ue', '67bdt12x', 78, 1, 78, '2022-07-19 04:07:45', '2022-07-19 04:07:45', 1),
('16jchqyl', '3u8bd1y6', 'agr6t9ce', '5b417nf0', 89, 1, 89, '2022-07-13 05:11:38', '2022-07-13 05:11:38', 1),
('1r7f3zak', 'ex6cov18', 'j1wav3k8', '5b417nf0', 89, 8, 712, '2022-07-26 11:04:17', '2022-07-26 11:04:17', 1),
('23n6xdjb', 'i7pgx8yn', 'bt0pgyn8', '5b417nf0', 89, 5, 445, '2022-07-14 11:20:23', '2022-07-14 11:20:23', 1),
('4ubnq9yi', 'v2h6r1zf', 'z6yw2fx9', '5b417nf0', 89, 1, 89, '2022-07-13 04:32:00', '2022-07-13 04:32:00', 1),
('73bwzxko', 'c5km8lwq', 'e2hy8u0f', '5b417nf0', 89, 1, 89, '2022-07-13 09:44:57', '2022-07-13 09:44:57', 1),
('8fhwbkyc', '8og7pqi4', '6wa5kvhj', '5b417nf0', 89, 1, 89, '2022-07-15 01:22:15', '2022-07-15 01:22:15', 1),
('b79gc4jo', 'v2h6r1zf', 'z6yw2fx9', '67bdt12x', 78, 1, 78, '2022-07-13 04:31:55', '2022-07-13 04:31:55', 1),
('d3flb26n', 'v9ag8hz1', 'ip3hqy80', '67bdt12x', 78, 1, 78, '2022-07-13 01:26:21', '2022-07-13 01:26:21', 1),
('dp4b80uv', '8og7pqi4', '6wa5kvhj', '67bdt12x', 78, 8, 624, '2022-07-15 01:21:05', '2022-07-15 01:21:05', 1),
('eynkqv80', 'q89f3x2t', '3', '67bdt12x', 78, 1, 78, '2022-07-17 12:01:37', '2022-07-17 12:01:37', 1),
('itf9lhnu', 'nhog3jbf', 'agr6t9ce', '5b417nf0', 89, 1, 89, '2022-07-13 05:22:57', '2022-07-13 05:22:57', 1),
('jcv08wpb', '5xq1fazw', 'ir680nxy', '2dpi13ag', 89, 1, 89, '2022-07-18 04:26:12', '2022-07-18 04:26:12', 1),
('mpl9cbav', '8og7pqi4', '6wa5kvhj', '67bdt12x', 78, 1326, 103428, '2022-07-15 01:20:55', '2022-07-15 01:20:55', 1),
('nudt2jmk', 'i7pgx8yn', 'bt0pgyn8', '67bdt12x', 78, 1, 78, '2022-07-14 11:19:39', '2022-07-14 11:19:39', 1),
('nvpqd1t4', 'nhog3jbf', 'agr6t9ce', '5b417nf0', 89, 1, 89, '2022-07-13 05:34:12', '2022-07-13 05:34:12', 1),
('opzchyu9', '5xq1fazw', 'ir680nxy', '5b417nf0', 89, 1, 89, '2022-07-18 04:26:03', '2022-07-18 04:26:03', 1),
('p720uqby', 'nhog3jbf', 'agr6t9ce', '67bdt12x', 78, 1, 78, '2022-07-13 05:22:53', '2022-07-13 05:22:53', 1),
('t7kp8vzr', '5xq1fazw', 'ir680nxy', '67bdt12x', 78, 1, 78, '2022-07-18 04:26:08', '2022-07-18 04:26:08', 1),
('yc9rz2xn', '1ivnbye0', 'ctmhueoq', '67bdt12x', 78, 78, 6084, '2022-07-13 02:24:18', '2022-07-13 02:24:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymenttypes`
--

CREATE TABLE `tbl_paymenttypes` (
  `paymenttype_id` int(11) NOT NULL,
  `paymenttype_name` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `category_id` varchar(40) NOT NULL,
  `unit_price` double NOT NULL,
  `subcategory_id` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `unit_price`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
('2dpi13ag', 'jkl', 'fik82n7g', 89, 'hc81ykgl', '2022-07-14 12:25:17', '2022-07-14 12:25:17', 'kalid', 0),
('5b417nf0', '78', 'vhm296r1', 89, 'bzver05y', '2022-07-12 05:15:27', '2022-07-12 05:15:27', 'kalid', 0),
('67bdt12x', 'car', 'vhm296r1', 78, 'ceh1ow39', '2022-07-13 09:56:44', '2022-07-13 09:56:44', '1', 0),
('fht25x0z', 'hj', 'fik82n7g', 87, 'bzver05y', '2022-07-12 05:13:47', '2022-07-12 05:13:47', 'kalid', 0),
('pag5qe37', 'hj', 'fik82n7g', 87, 'bzver05y', '2022-07-12 05:13:55', '2022-07-12 05:13:55', 'kalid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productimages`
--

CREATE TABLE `tbl_productimages` (
  `productimages_id` varchar(100) NOT NULL,
  `product_image` varchar(40) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit_price` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productimages`
--

INSERT INTO `tbl_productimages` (`productimages_id`, `product_image`, `product_id`, `description`, `quantity`, `unit_price`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
('2ri7q0mg', 'images/download (2).jpg', '67bdt12x', 'verygood', 100, 78, '2022-07-13 09:56:44', '2022-07-13 09:56:44', '1', 0),
('4xf8aupy', 'images/bb5846cd6aa667994280ff5d6a754002.', '2dpi13ag', 'enljnefljnf', 78, 89, '2022-07-14 12:25:17', '2022-07-14 12:25:17', 'kalid', 0),
('l9e740ka', 'images/download.jpg', '5b417nf0', 'type here9', 89, 89, '2022-07-12 05:15:27', '2022-07-12 05:15:27', 'kalid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `subcategory_id` varchar(100) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`subcategory_id`, `subcategory_name`, `is_deleted`) VALUES
('0w4kpa7v', 'sss', 0),
('bzver05y', 'vi', 0),
('ceh1ow39', 'hjj', 0),
('hc81ykgl', 'buy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogins`
--

CREATE TABLE `tbl_userlogins` (
  `userlogin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` varchar(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `role`, `is_deleted`) VALUES
('1bofg7ue', 'Melchior', 'Bahati', 'melchiorbahati2580@gmail.com', 'Bahati138275', 'm', 0, 0),
('3', '1', '1', '1', '1', 'm', 0, 0),
('5nbxl7ku', 'Jay ', 'Patel', 'jaypatel2003p@gmail.com', 'Jay123', 'm', 0, 0),
('6wa5kvhj', 'k', 'k', 'k', 'k', 'm', 0, 0),
('75z4byat', 'nkdncknkjndc', 'cd knkdckjnckjncd', 'hu', '111', 'm', 0, 0),
('ihetfk93', 'errolyu', 'berul', 'erolberu@gmail.com', '123', 'm', 0, 0),
('ip3hqy80', 'Kerrion', 'Munene', 'kerrion.muchangi@strathmore.edu', '123', 'm', 0, 0),
('ir680nxy', 'uuu', 'hhh', 'achiengwinfred20@gmail.com', '123', 'f', 0, 0),
('j1wav3k8', 'Joy', 'Muthoni', 'joymuthoni856@gmail.com', '1234567', 'f', 0, 0),
('oj5h8awu', 'Tony', 'Mogoa', 'tony.mogoa@strathmore.edu', '12345', 'm', 0, 0),
('uxckfo4g', 'lance', 'munyao', 'lance.munyao@strathmore.edu', '123', 'm', 0, 0),
('w0vk5j4d', 'kalid', 'dessalegn', 'kalid.dessalegn@strathmore.edu', '123', 'f', 0, 0),
('z6yw2fx9', 'Kalid', 'Puta', 'puta@gmail.com ', 'P2003', 'm', 0, 0),
('zlmyu6a2', 'Kalid', 'Puta', 'puta@gmail.com ', 'P2003', 'm', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount_available` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  ADD PRIMARY KEY (`productimages_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_userlogins`
--
ALTER TABLE `tbl_userlogins`
  ADD PRIMARY KEY (`userlogin_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wallet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
