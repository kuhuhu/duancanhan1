-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2024 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duancanhan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` int(2) NOT NULL,
  `creat_at_account` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `tel`, `role`, `creat_at_account`, `isdelete`) VALUES
(1, 'admin', '123456', 'admin1@gmail.com', '0826226209', 1, '2024-05-23 05:46:16.137116', 0),
(2, 'minhthiet', '1221', 'minhthiet@gmail.com', '081880892', 0, '2023-02-10 00:00:00.000000', 0),
(3, 'Thanhdat', '12345', 'Thanhdat@gmail.com', '081880892', 0, '2023-01-02 00:00:00.000000', 0),
(7, 'Lê Thành Đạt', '123456', 'datltph32876@gmail.com', '0382921776', 0, '2024-05-11 09:04:33.000000', 0),
(8, 'huy haf duy', '12345678', 'datltph32876@fpt.edu.vn', '0382921776', 0, '2024-05-11 09:08:37.000000', 0),
(9, 'Khang thừa', '12345678', 'hahaha@gmail.com', '0485765463', 0, '2024-05-23 07:56:02.000000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_account`
--

CREATE TABLE `address_account` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel_address` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  `creat_at_address` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address_account`
--

INSERT INTO `address_account` (`id`, `id_user`, `name`, `tel_address`, `address`, `role`, `creat_at_address`, `isdelete`) VALUES
(1, 1, 'Nguyen Anh Tuan', '0987654321', '123/45 Duong Ba Trac', 1, '2024-05-23 05:46:31.418448', 0),
(2, 2, 'Le Thi Bich Phuong', '0123456789', '123/2 Le Duan', 1, '2024-05-23 05:46:40.147137', 0),
(3, 3, 'Tran Van Nam', '0909090909', '456/3 Nguyen Trai', 1, '2024-05-23 05:47:16.626506', 0),
(4, 1, 'Gia Bảo', '0475635463', '17 trịnh văn bô', 0, '2024-05-23 08:00:49.000000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `quantity`, `size`) VALUES
(12, 1, 1, 1, 42),
(13, 7, 1, 1, 38),
(14, 3, 9, 1, 39),
(15, 1, 9, 1, 39),
(16, 3, 4, 1, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isdelete`) VALUES
(1, 'Giày NIKE', 'sanpham1.jpg', 0),
(2, 'Giày ADIDAS', 'sanpham2.jpg', 0),
(3, 'Giày MIZUNO', 'sanpham3.jpg', 0),
(4, 'Giày PUMA', 'sanpham4.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `creat_at_comment` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_user`, `id_product`, `creat_at_comment`) VALUES
(1, 'Sản phẩm rất đang trải nghiệm', 2, 1, '2023-09-22 00:00:00.000000'),
(2, 'Sản phẩm rất tốt', 3, 1, '2023-09-22 00:00:00.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `creat_at_favorite` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id_product` int(10) NOT NULL,
  `image_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
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
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `creat_at_order` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `order_status` int(10) NOT NULL,
  `order_payment` int(10) NOT NULL,
  `payment_type` int(10) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_user`, `username`, `address`, `creat_at_order`, `order_status`, `order_payment`, `payment_type`, `total_amount`, `isdelete`) VALUES
(1, 1, 'Nguyen anh tuan', '96, hòe thị', '2024-05-22 11:12:17.102508', 4, 1, 1, 1.00, 0),
(2, 1, ' le thanh dat', '88 nam phong', '2024-05-22 13:45:34.260788', 3, 1, 1, 300.00, 0),
(3, 1, 'admin', 'FB88', '2024-05-16 13:23:55.000000', 1, 1, 1, 2.00, 0),
(4, 1, 'hihu', '123/7 xuân phương', '2024-05-16 13:41:19.000000', 1, 1, 1, 1734.00, 0),
(5, 1, 'Nguyen Anh Tuan', '123/45 Duong Ba Trac', '2024-05-22 03:24:12.000000', 1, 1, 1, 149.00, 0),
(6, 1, 'Gia Bảo', '17 trịnh văn bô', '2024-05-23 08:00:57.000000', 1, 1, 1, 178.00, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_product` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
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
(6, 6, 1, 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `view` int(100) NOT NULL,
  `id_category` int(10) NOT NULL,
  `price_sale` double(10,2) NOT NULL,
  `creat_at_product` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `purchases` int(100) NOT NULL,
  `isdelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `view`, `id_category`, `price_sale`, `creat_at_product`, `purchases`, `isdelete`) VALUES
(1, 'Nike Tiempo Legend 9 Academy ', 300.00, 'sanpham1.jpg', 'Giày đá bóng sân cỏ nhân tạo ', 100, 1, 0.00, '2024-05-25 07:53:57.924059', 133, 0),
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
-- Cấu trúc bảng cho bảng `size_products`
--

CREATE TABLE `size_products` (
  `id_product` int(10) NOT NULL,
  `size38` int(20) NOT NULL,
  `size39` int(20) NOT NULL,
  `size40` int(20) NOT NULL,
  `size41` int(20) NOT NULL,
  `size42` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size_products`
--

INSERT INTO `size_products` (`id_product`, `size38`, `size39`, `size40`, `size41`, `size42`) VALUES
(1, 10, 2, 18, 25, 30),
(2, 11, 16, 0, 26, 31),
(3, 11, 17, 19, 27, 32),
(4, 13, 0, 23, 28, 33),
(5, 14, 19, 24, 29, 34),
(6, 15, 19, 0, 0, 35),
(7, 16, 20, 26, 31, 36),
(8, 17, 4, 27, 32, 37),
(9, 18, 22, 27, 33, 38),
(10, 19, 24, 29, 34, 39),
(11, 20, 25, 30, 35, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `creat_at_wishlist` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_product`, `id_user`, `creat_at_wishlist`) VALUES
(1, 9, 1, '2024-05-23 06:20:52.000000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `address_account`
--
ALTER TABLE `address_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD KEY `image_products_ibfk_1` (`id_product`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `id_products` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `size_products`
--
ALTER TABLE `size_products`
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `address_account`
--
ALTER TABLE `address_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address_account`
--
ALTER TABLE `address_account`
  ADD CONSTRAINT `address_account_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `size_products`
--
ALTER TABLE `size_products`
  ADD CONSTRAINT `size_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
