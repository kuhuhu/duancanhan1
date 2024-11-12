-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duancanhan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `creat_at_account` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `tel`, `role`, `creat_at_account`, `isdelete`) VALUES
(1, 'admin', '12345678', 'admin1@gmail.com', '0826226209', 1, '2024-11-12 10:44:27.407304', 0),
(2, 'nguyenkhang', '1221', 'nguyenkhang@gmail.com', '081880892', 0, '2024-11-12 10:42:07.176632', 1),
(3, 'avfc', '12345', 'dfgh@gmail.com', '0818808921', 0, '2024-11-12 10:46:28.850214', 1),
(7, 'Nguyễn Ngọc Nguyên Khang', '123456', 'khangnnnph33130@gmail.com', '0974895263', 0, '2024-11-12 10:44:02.389830', 1),
(8, 'huy haf duy', '12345678', 'khangnnnph33130@fpt.edu.vn', '038123456', 0, '2024-11-12 10:46:58.279551', 1),
(9, 'Khang thừa hihi', '12345678', 'hahaha@gmail.com', '0485765463', 0, '2024-11-12 10:44:39.476147', 0);

-- --------------------------------------------------------

--
-- Table structure for table `address_account`
--

CREATE TABLE `address_account` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel_address` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `creat_at_address` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_account`
--

INSERT INTO `address_account` (`id`, `id_user`, `name`, `tel_address`, `address`, `role`, `creat_at_address`, `isdelete`) VALUES
(1, 2, 'Nguyen Anh Tuan', '0987654321', '123/45/7 Duong Ba Trac', 1, '2024-11-12 10:51:03.772550', 0),
(2, 2, 'Le  Bich Phuong', '0123456789', '123/2 Le Duan', 1, '2024-11-12 10:51:25.154769', 0),
(3, 3, 'Tran Van Nam', '0909090909', '456/3 Nguyen Trai', 1, '2024-11-12 05:47:16.626506', 0),
(4, 1, 'Gia Bảo', '0475635463', '17 trịnh văn bô', 0, '2024-11-12 08:00:49.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`, `size`) VALUES
(13, 7, 1, 1, 38),
(14, 3, 9, 1, 39),
(16, 3, 4, 1, 40),
(18, 1, 9, 2, 39),
(19, 1, 9, 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isdelete`) VALUES
(1, 'Giày NIKE', 'sanpham1.jpg', 0),
(2, 'Giày ADIDAS', 'sanpham2.jpg', 0),
(3, 'Giày MIZUNO', 'sanpham3.jpg', 0),
(4, 'Giày PUMA', 'sanpham4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `creat_at_comment` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_user`, `id_product`, `creat_at_comment`) VALUES
(1, 'Sản phẩm rất đang trải nghiệm', 2, 1, '2023-09-22 00:00:00.000000'),
(2, 'Sản phẩm rất tốt', 3, 1, '2023-09-22 00:00:00.000000'),
(3, 'Đẹp lắm', 1, 9, '2024-05-28 12:17:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `creat_at_favorite` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id_product` int(11) NOT NULL,
  `image_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_products`
--

INSERT INTO `image_products` (`id_product`, `image_description`) VALUES
(1, 'sanpham1_1.jpg'),
(1, 'sanpham1_2.jpg'),
(1, 'sanpham1_3.jpg'),
(2, 'sanpham2_1.jpg'),
(2, 'sanpham2_2.jpg'),
(2, 'sanpham2_3.jpg'),
(3, 'sanpham3_1.jpg'),
(3, 'sanpham3_2.jpg'),
(3, 'sanpham3_3.jpg'),
(4, 'sanpham4_1.jpg'),
(4, 'sanpham4_2.jpg'),
(4, 'sanpham4_3.jpg'),
(5, 'sanpham5_1.jpg'),
(5, 'sanpham5_2.jpg'),
(5, 'sanpham5_3.jpg'),
(6, 'sanpham6_1.jpg'),
(6, 'sanpham6_2.jpg'),
(6, 'sanpham6_3.jpg'),
(7, 'sanpham7_1.jpg'),
(7, 'sanpham7_2.jpg'),
(7, 'sanpham7_3.jpg'),
(8, 'sanpham8_1.jpg'),
(8, 'sanpham8_2.jpg'),
(8, 'sanpham8_3.jpg'),
(9, 'sanpham9_1.jpg'),
(9, 'sanpham9_2.jpg'),
(9, 'sanpham9_3.jpg'),
(10, 'sanpham10_1.jpg'),
(10, 'sanpham10_2.jpg'),
(10, 'sanpham10_3.jpg'),
(11, 'sanpham11_1.jpg'),
(11, 'sanpham11_2.jpg'),
(11, 'sanpham11_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `creat_at_order` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `order_status` int(11) NOT NULL,
  `order_payment` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `username`, `address`, `creat_at_order`, `order_status`, `order_payment`, `payment_type`, `total_amount`, `isdelete`) VALUES
(1, 1, 'Nguyen anh tuann', '96, hòe thị', '2024-11-12 10:47:57.361180', 4, 1, 1, 1.00, 0),
(2, 1, ' le thanh dat', '19 nam phong', '2024-11-12 10:48:14.411599', 4, 1, 1, 300.00, 0),
(3, 1, 'admin', 'FB88x', '2024-11-12 10:48:29.823759', 1, 1, 1, 2.00, 0),
(4, 1, 'hihuhihu', '123/7 xuân phương', '2024-11-12 10:48:40.319522', 1, 1, 1, 1734.00, 0),
(5, 1, 'Nguyen Anh Tuan', '123/45/7 Duong Ba Trac', '2024-11-12 10:48:59.961779', 1, 1, 1, 149.00, 0),
(6, 1, 'Gia Minh', '17 trịnh văn bô', '2024-11-12 10:49:16.489300', 1, 1, 1, 178.00, 0),
(7, 1, 'Nguyen Anh Tuan', '123/45/7 Duong Ba Trac', '2024-11-12 10:49:32.093023', 1, 1, 1, 1034.00, 0),
(8, 1, 'Nguyen Anh Tuan', '123/45/7 Duong Ba Trac', '2024-11-12 10:49:39.972685', 1, 1, 1, 140.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_product`, `id_order`, `quantity`, `size`) VALUES
(1, 1, 1, 40),
(3, 1, 1, 38),
(1, 2, 1, 40),
(9, 3, 1, 39),
(3, 3, 2, 40),
(9, 4, 1, 40),
(3, 4, 1, 40),
(7, 5, 1, 39),
(6, 6, 1, 39),
(1, 7, 1, 42),
(9, 7, 1, 39),
(2, 8, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price_sale` double(10,2) NOT NULL,
  `creat_at_product` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `purchases` int(11) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `view`, `id_category`, `price_sale`, `creat_at_product`, `purchases`, `isdelete`) VALUES
(1, 'Nike Tiempo Legend 9 Academy ', 300.00, 'sanpham1.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 100, 1, 0.00, '2024-06-26 00:23:47.391832', 133, 0),
(2, 'Nike React Phantom GX Pro TF', 400.00, 'sanpham2.jpg', 'Giày đá bóng sân cỏ nhân tạo', 10, 1, 35.00, '2024-05-25 07:30:11.664804', 440, 0),
(3, 'Nike Tiempo  ', 1000.00, 'sanpham3.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 99, 1, 0.00, '2024-05-23 08:36:58.276037', 220, 0),
(4, 'ADIDAS PREDATOR 19.3 TF', 250.00, 'sanpham4.jpg', 'Giày đá bóng sân cỏ tự nhiên', 14, 2, 22.00, '2024-03-14 00:00:00.000000', 320, 0),
(5, 'Adidas Copa Sense .3 TF', 132.00, 'sanpham5.jpg', 'Giày đá bóng sân có tự nhiên  ', 12, 2, 64.00, '2024-02-13 00:00:00.000000', 96, 0),
(6, 'Adidas X Ghosted .3 TF', 405.00, 'sanpham6.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 18, 2, 44.00, '2023-12-24 00:00:00.000000', 54, 0),
(7, 'Mizuno Monarcida Neo ', 452.00, 'sanpham7.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 55, 3, 33.00, '2023-09-26 00:00:00.000000', 246, 0),
(8, 'Mizuno Monarcida Neo', 500.00, 'sanpham8.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 19, 3, 55.00, '2023-09-17 00:00:00.000000', 512, 0),
(9, 'Nike Zoom Mercurial Superfly 9 Academy TF ', 954.00, 'sanpham9.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 133, 4, 77.00, '2023-06-21 00:00:00.000000', 601, 0),
(10, 'Adidas Predator Accuracy Injection .3 TF', 274.00, 'sanpham10.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 1030, 4, 53.00, '2023-04-22 00:00:00.000000', 302, 0),
(11, 'Nike Zoom Mercurial Vapor 15 Academy TF', 900.00, 'sanpham111.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 10330, 4, 25.00, '2023-05-22 00:00:00.000000', 227, 0);

-- --------------------------------------------------------

--
-- Table structure for table `size_products`
--

CREATE TABLE `size_products` (
  `id_product` int(11) NOT NULL,
  `size38` int(11) NOT NULL,
  `size39` int(11) NOT NULL,
  `size40` int(11) NOT NULL,
  `size41` int(11) NOT NULL,
  `size42` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size_products`
--

INSERT INTO `size_products` (`id_product`, `size38`, `size39`, `size40`, `size41`, `size42`) VALUES
(1, 10, 2, 18, 25, 29),
(2, 11, 15, 0, 26, 31),
(3, 11, 17, 19, 27, 32),
(4, 13, 0, 23, 28, 33),
(5, 14, 19, 24, 29, 34),
(6, 15, 19, 0, 0, 35),
(7, 16, 20, 26, 31, 36),
(8, 17, 4, 27, 32, 37),
(9, 18, 21, 27, 33, 38),
(10, 19, 24, 29, 34, 39),
(11, 20, 25, 30, 35, 40);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `creat_at_wishlist` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_product`, `id_user`, `creat_at_wishlist`) VALUES
(1, 9, 2, '2024-11-12 10:50:06.513657');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_account`
--
ALTER TABLE `address_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD KEY `image_products_ibfk_1` (`id_product`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `id_products` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `size_products`
--
ALTER TABLE `size_products`
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `address_account`
--
ALTER TABLE `address_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_account`
--
ALTER TABLE `address_account`
  ADD CONSTRAINT `address_account_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Constraints for table `size_products`
--
ALTER TABLE `size_products`
  ADD CONSTRAINT `size_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
