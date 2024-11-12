-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2024 lúc 09:20 AM
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
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `image_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `id_product`, `image_description`) VALUES
(1, 1, 'sanpham1_1.jpg'),
(2, 1, 'sanpham1_2.jpg'),
(3, 1, 'sanpham1_3.jpg'),
(4, 2, 'sanpham2_1.jpg'),
(5, 2, 'sanpham2_2.jpg'),
(6, 2, 'sanpham2_3.jpg'),
(7, 3, 'sanpham3_1.jpg'),
(8, 3, 'sanpham3_2.jpg'),
(9, 3, 'sanpham3_3.jpg'),
(10, 4, 'sanpham4_1.jpg'),
(11, 4, 'sanpham4_2.jpg'),
(12, 4, 'sanpham4_3.jpg'),
(13, 5, 'sanpham5_1.jpg'),
(14, 5, 'sanpham5_2.jpg'),
(15, 5, 'sanpham5_3.jpg'),
(16, 6, 'sanpham6_1.jpg'),
(17, 6, 'sanpham6_2.jpg'),
(18, 6, 'sanpham6_3.jpg'),
(19, 7, 'sanpham7_1.jpg'),
(20, 7, 'sanpham7_2.jpg'),
(21, 7, 'sanpham7_3.jpg'),
(22, 8, 'sanpham8_1.jpg'),
(23, 8, 'sanpham8_2.jpg'),
(24, 8, 'sanpham8_3.jpg'),
(25, 9, 'sanpham9_1.jpg'),
(26, 9, 'sanpham9_2.jpg'),
(27, 9, 'sanpham9_3.jpg'),
(28, 10, 'sanpham10_1.jpg'),
(29, 10, 'sanpham10_2.jpg'),
(30, 10, 'sanpham10_3.jpg'),
(31, 11, 'sanpham11_1.jpg'),
(32, 11, 'sanpham11_2.jpg'),
(33, 11, 'sanpham11_3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_products_ibfk_1` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
