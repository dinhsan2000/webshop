-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 08:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`, `date_create`) VALUES
(1, 'Men', 1, '2022-05-26 16:26:51'),
(2, 'Girl', 1, '2022-05-26 16:27:07'),
(3, 'Demo', 1, '2022-05-26 16:27:14'),
(4, 'LV', 1, '2022-06-10 02:25:19'),
(5, 'Thượng Đình', 1, '2022-06-25 02:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`fac_id`, `fac_name`, `status`, `date_create`) VALUES
(1, 'Adidas', 1, '2022-05-26 17:40:34'),
(2, 'Nike', 1, '2022-05-26 17:40:45'),
(3, 'Bitits', 1, '2022-05-26 17:41:11'),
(4, 'demo', 1, '2022-05-26 19:49:21'),
(5, 'Demo3', 1, '2022-06-10 02:21:22'),
(6, 'Demo3', 1, '2022-06-10 02:22:16'),
(7, 'demo44', 1, '2022-06-25 02:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `pro_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pro_id`, `image`, `status`, `date_create`) VALUES
(63, 'AT533.png', NULL, NULL),
(63, 'AT536.png', NULL, NULL),
(63, 'T2099.png', NULL, NULL),
(63, 'T2106.png', NULL, NULL),
(64, 'AT536.png', NULL, NULL),
(64, 'T2099.png', NULL, NULL),
(64, 'T2106.png', NULL, NULL),
(64, 'T2119.png', NULL, NULL),
(65, 'T2099.png', NULL, NULL),
(65, 'T2106.png', NULL, NULL),
(65, 'T2119.png', NULL, NULL),
(65, 'TD509.png', NULL, NULL),
(66, 'T2106.png', NULL, NULL),
(66, 'T2109.png', NULL, NULL),
(66, 'T2119.png', NULL, NULL),
(66, 'T2127.png', NULL, NULL),
(67, 'T2106.png', NULL, NULL),
(67, 'T2109.png', NULL, NULL),
(67, 'T2119.png', NULL, NULL),
(67, 'T2127.png', NULL, NULL),
(68, 'Default.rdp', NULL, NULL),
(69, 'T2119.png', NULL, NULL),
(69, 'T2127.png', NULL, NULL),
(69, 'T2128.png', NULL, NULL),
(69, 'T2129.png', NULL, NULL),
(70, 'T2130.png', NULL, NULL),
(70, 'T2131.png', NULL, NULL),
(70, 'TD481.png', NULL, NULL),
(70, 'TD509.png', NULL, NULL),
(71, 'T2109.png', NULL, NULL),
(71, 'T2119.png', NULL, NULL),
(71, 'T2127.png', NULL, NULL),
(71, 'T2128.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `order_date` date NOT NULL,
  `pay` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `fullname`, `phone_number`, `email`, `order_date`, `pay`, `address`, `user_id`) VALUES
(16, 'Đinh Trọng San', 972580430, 'dinhsan200@gmail.com', '2022-06-27', '1', 'Hoàng Quốc Việt, Phường Cổ Nhuế, Quận Nam Từ Liêm, Hà Nội', 0),
(18, 'Đinh Trọng San', 972580430, 'dinhsan200@gmail.com', '2022-06-27', '1', 'Hoàng Quốc Việt, Phường Cổ Nhuế, Quận Nam Từ Liêm, Hà Nội', 0),
(20, 'Đinh Trọng San', 972580430, 'dinhsan200@gmail.com', '2022-06-30', '1', 'Address: Hoàng Quốc Việt, Phường Cổ Nhuế, Quận Nam Từ Liêm, Hà Nội', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` tinyint(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `size_name` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `pro_id`, `price`, `color`, `quantity`, `status`, `date_create`, `payment_id`, `size_id`, `size_name`, `image`, `pro_name`) VALUES
(16, 12, 64, 100000, 'Đỏ', 2, 1, '2022-06-25 01:52:56', 0, 0, 'S-38', 'uploads/AT536.png', ''),
(18, 13, 64, 100000, 'Đỏ', 1, 1, '2022-06-25 02:37:30', 0, 0, 'S-38', 'uploads/AT536.png', ''),
(19, 16, 63, 200000, 'Trắng', 2, 1, '2022-06-27 01:19:39', 0, 0, 'S-38', 'uploads/AT533.png', 'Champion Graphic Big Logo T-Shirt'),
(20, 18, 63, 200000, 'Trắng', 5, 1, '2022-06-27 01:30:04', 0, 0, 'S-38', 'uploads/AT533.png', 'Champion Graphic Big Logo T-Shirt'),
(21, 18, 64, 100000, 'Đỏ', 3, 1, '2022-06-27 01:30:04', 0, 0, 'S-38', 'uploads/AT536.png', 'Champion Change The World'),
(22, 18, 67, 200000, 'Vàng', 5, 1, '2022-06-27 01:30:04', 0, 0, 'S-38', 'uploads/T2106.png', 'Tie Dye Orange Mint Tee'),
(23, 20, 63, 200000, 'Trắng', 1, 1, '2022-06-30 01:52:12', 0, 0, 'S-38', 'uploads/AT533.png', 'Champion Graphic Big Logo T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_name`, `status`, `date_create`) VALUES
(1, 'COD', 1, '2022-06-24 02:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `factory_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `old_price` int(255) DEFAULT NULL,
  `color_pro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `cat_id`, `size_id`, `factory_id`, `image`, `price`, `description`, `status`, `date_create`, `old_price`, `color_pro`) VALUES
(63, 'Champion Graphic Big Logo T-Shirt', 1, 1, 1, 'uploads/AT533.png', 200000, 'Cổ Tròn Tay Ngắn Hình In Trước Áo', 1, '2022-06-25 03:02:58', NULL, 'Trắng'),
(64, 'Champion Change The World', 1, 2, 1, 'uploads/AT536.png', 100000, 'Cổ Tròn Tay Ngắn Hình Thêu Trước Áo	', 1, '2022-06-08 01:43:17', NULL, 'Đỏ'),
(65, 'No Smile Tee Purple', 1, 3, 3, 'uploads/T2099.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau', 1, '2022-06-08 01:45:57', NULL, 'Tím'),
(66, 'Shin Chan Tee', 1, 1, 1, 'uploads/T2106.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau	', 1, '2022-06-08 01:50:59', NULL, 'Cam'),
(67, 'Tie Dye Orange Mint Tee', 1, 2, 1, 'uploads/T2106.png', 200000, 'Cổ Tròn', 1, '2022-06-10 01:59:55', NULL, 'Vàng'),
(69, 'Champion Graphic Big Logo T-Shirt', 4, 3, 1, 'uploads/T2109.png', 300000, 'Cổ Tròn Tay Ngắn Hình In Trước Áo', 1, '2022-06-14 20:17:05', NULL, 'Vàng'),
(70, 'Champion Change The World', 1, 2, 3, 'uploads/T2130.png', 300000, 'Cổ Tròn Tay Ngắn Hình Thêu Trước Áo	', 1, '2022-06-14 20:18:14', NULL, 'Đen'),
(71, 'Shin Chan Tee', 2, 4, 1, 'uploads/T2119.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau', 1, '2022-06-14 20:21:35', NULL, 'Hồng'),
(72, 'Champion Graphic Big Logo T-Shirt', 1, 1, 1, 'uploads/AT533.png', 200000, 'Cổ Tròn Tay Ngắn Hình In Trước Áo', 1, '2022-06-08 01:33:32', NULL, 'Trắng'),
(73, 'Champion Change The World', 1, 2, 1, 'uploads/AT536.png', 100000, 'Cổ Tròn Tay Ngắn Hình Thêu Trước Áo	', 1, '2022-06-08 01:43:17', NULL, 'Đỏ'),
(74, 'No Smile Tee Purple', 1, 3, 3, 'uploads/T2099.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau', 1, '2022-06-08 01:45:57', NULL, 'Tím'),
(75, 'Shin Chan Tee', 1, 1, 1, 'uploads/T2106.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau	', 1, '2022-06-08 01:50:59', NULL, 'Cam'),
(76, 'Tie Dye Orange Mint Tee', 1, 2, 1, 'uploads/T2106.png', 200000, 'Cổ Tròn', 1, '2022-06-10 01:59:55', NULL, 'Vàng'),
(77, 'Champion Graphic Big Logo T-Shirt', 4, 3, 1, 'uploads/T2109.png', 300000, 'Cổ Tròn Tay Ngắn Hình In Trước Áo', 1, '2022-06-14 20:17:05', NULL, 'Vàng'),
(78, 'Champion Change The World', 1, 2, 3, 'uploads/T2130.png', 300000, 'Cổ Tròn Tay Ngắn Hình Thêu Trước Áo	', 1, '2022-06-14 20:18:14', NULL, 'Đen'),
(79, 'Shin Chan Tee', 2, 4, 1, 'uploads/T2119.png', 300000, 'Cổ Tay Ngắn Vạt Ngang Hình Phía Trước Và Sau', 1, '2022-06-14 20:21:35', NULL, 'Hồng'),
(80, 'Champion Graphic Big Logo T-Shirt', 2, 1, 1, 'uploads/T2106.png', 100000, 'Áo Champion Graphic Big Logo T-Shirt', 1, '2022-06-25 01:58:16', NULL, 'Vàng');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_number` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `size_number`, `status`, `date_create`) VALUES
(1, 'S', 38, 1, '2022-05-26 17:30:39'),
(2, 'M', 39, 1, '2022-05-26 17:38:09'),
(3, 'L', 40, 1, '2022-05-26 17:38:26'),
(4, 'XL', 41, 1, '2022-05-26 17:38:46'),
(5, 'XXL', 42, 1, '2022-05-26 17:38:55'),
(6, 'XXL', 43, 1, '2022-05-26 17:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `mobile`, `address`, `status`, `date_create`, `gender`) VALUES
(9, 'admin', 'dinhsan200@gmail.com', '$2y$10$KoSBm7JnLnQRtF47ztYhfumkhJOEdtxQ9pW8ow0kFTRbywvramjHe', 972580430, '', NULL, '2022-05-27 02:26:31', 1),
(10, 'admin1', 'trongsanddm@gmail.com', '$2y$10$2Cyj/Ld634ZHUAH0f9oN9u3xs2g1L1tTNrhlvbyBh4Q.HUy8svVhC', 972580430, '', NULL, '2022-05-27 02:45:59', 1),
(11, 'admin12', 'dinhsan2001@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 972580430, 'Hoàng Quốc Việt, Phường Cổ Nhuế, Quận Nam Từ Liêm, Hà Nội', 1, '2022-05-27 02:58:01', 1),
(12, 'admin123', 'mail@gmail.com', '$2y$10$RoZrsOYuK8BjPCuzLOCMvOub0YJ08zfLUdZ7SRYdzRZN67PQHIibS', 123456789, '', NULL, '2022-05-27 03:01:51', 1),
(13, 'san', 'trongsanddtm@gmail.com', '$2y$10$n7sLE2ndy5ASGHGsyI1eyeeg27C1DVG3EE.xU9DiOP.VYohrANqAm', 972580430, '', NULL, '2022-05-27 14:22:06', 1),
(14, 'sanzz', 'mai1l@gmail.com', '$2y$10$.l5hZJAJUxrFzhhxKoH77uB1lG03AwobOL4gkS8ad9GRrCQk62pfa', 123456789, '', NULL, '2022-05-27 14:23:58', 1),
(15, 'sanzzzz', 'trongsanddm11@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 972580430, '', 0, '2022-05-27 14:27:57', 1),
(16, 'san111', 'trongsanddm1111@gmail.com', '25d55ad283aa400af464c76d713c07ad', 972580430, '', NULL, '2022-06-09 20:45:49', 1),
(17, 'admin1235', 'admin@miuivs.com', 'd41d8cd98f00b204e9800998ecf8427e', 972580432, '', 1, '2022-06-25 02:57:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`pro_id`,`image`) USING BTREE;

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `factory`
--
ALTER TABLE `factory`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_to_order_detail` FOREIGN KEY (`order_id`) REFERENCES `order_detail` (`order_detail_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
