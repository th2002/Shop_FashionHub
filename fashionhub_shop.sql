-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th8 21, 2023 lúc 01:00 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashionhub_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(200) DEFAULT NULL,
  `has_size` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: không có size; 1:có size',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `cate_name`, `has_size`, `create_at`, `update_at`) VALUES
(1, 'Quần áo', 1, NULL, NULL),
(2, 'Giày dép', 1, NULL, NULL),
(3, 'Túi ví', 0, NULL, NULL),
(4, 'Mắt kính', 0, NULL, NULL),
(5, 'Phụ kiện', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate_size`
--

CREATE TABLE `cate_size` (
  `cate_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `customer_id`, `product_id`, `content`, `create_at`, `update_at`) VALUES
(1, 11, 14, 'abc\r\n', '2023-08-02', NULL),
(2, 11, 18, 'hjhj', '2023-08-02', NULL),
(3, 11, 11, 'kkk', '2023-08-02', NULL),
(4, 9, 17, 'kaka\r\n', '2023-08-05', NULL),
(5, 13, 8, 'hjhj\r\n', '2023-08-06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '0: amount:giảm theo số tiền; 1: percent:giảm theo %',
  `value` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0:chưa kích hoạt, 1:đã kích hoạt',
  `date_end` date DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `type`, `value`, `status`, `date_end`, `create_at`, `update_at`) VALUES
(1, 'FASHIONHUB2023', 0, 100000, 1, '2023-08-26', '2023-08-05', NULL),
(2, 'XINCHAO2023', 1, 10, 1, '2023-08-26', '2023-08-05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification_type` varchar(255) DEFAULT NULL,
  `notification_content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `pinned` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oders`
--

CREATE TABLE `oders` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL COMMENT 'mã user',
  `recipient_name` varchar(200) DEFAULT NULL COMMENT 'tên người nhận',
  `phone_number` varchar(11) DEFAULT NULL COMMENT 'sdt người nhận',
  `address_detail` varchar(100) DEFAULT NULL COMMENT 'số nhà / tên đường',
  `province` varchar(200) DEFAULT NULL COMMENT 'tỉnh / thành phố',
  `district` varchar(200) DEFAULT NULL COMMENT 'quận / huyện',
  `ward` varchar(200) DEFAULT NULL COMMENT 'phường / xã',
  `coupon_code_id` int(11) DEFAULT NULL COMMENT 'mã giảm giá',
  `payment_method` tinyint(4) DEFAULT 0 COMMENT '0:tiền mặt COD, 1:bank',
  `total_amount` float DEFAULT NULL COMMENT 'tổng tiền',
  `status_payment` tinyint(1) DEFAULT 0 COMMENT '0: chưa thanh toán; 1: đã thanh toán',
  `status_delivery` tinyint(1) DEFAULT 0 COMMENT '0: chưa giao; 1: đang giao; 2: đã giao; 3: đã hủy',
  `created_at` date DEFAULT NULL COMMENT 'ngày tạo oder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oders`
--

INSERT INTO `oders` (`id`, `cus_id`, `recipient_name`, `phone_number`, `address_detail`, `province`, `district`, `ward`, `coupon_code_id`, `payment_method`, `total_amount`, `status_payment`, `status_delivery`, `created_at`) VALUES
(1, 11, 'Hiếu Trung', '0906757332', '1051 Hậu giang', 'Thành Phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 1, 6000000, 1, 3, '2023-08-05'),
(2, 11, 'Đinh Lê Trung Hiếu', '0906757332', '1051 Hậu Giang', 'Thành Phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 1, 2000000, 1, 3, '2023-08-05'),
(3, 11, 'Đinh Lê Trung Hiếu', '0906757332', '1051 Hậu Giang', 'Thành Phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 1, 0, 2000000, 0, 3, '2023-08-05'),
(4, 11, 'Đinh Lê Trung Hiếu', '0906757332', '1051 Hậu Giang', 'Thành Phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 1, 0, 2000000, 0, 3, '2023-08-05'),
(9, 11, 'Kha', '0906757332', '1051 Hậu Giang', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 0, 65029000, 0, 3, '2023-08-06'),
(10, 11, 'Kha', '0906757332', '1051 Hậu Giang', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 0, 65029000, 0, 3, '2023-08-06'),
(11, 11, 'Kha', '0866677713', '49 XLHN', 'Thành phố Hồ Chí Minh', 'Quận 2', 'Phường Thảo Điền', 2, 0, 65029000, 0, 3, '2023-08-06'),
(32, 13, 'Hậu', '0906757332', '1051 Hậu Giang', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 1, 1, 51078000, 1, 0, '2023-08-06'),
(41, 14, 'Nam', '0906757332', '49 XLHN', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 1, 1, 474000, 1, 0, '2023-08-07'),
(42, 9, 'Hiếu Trung', '0866677713', '1051 Hậu Giang', 'Tỉnh Thái Nguyên', 'Thành phố Sông Công', 'Phường Lương Sơn', 1, 1, 20749000, 0, 0, '2023-08-07'),
(43, 9, 'Hiếu Trung', '0866677713', '49 XLHN', 'Tỉnh Thái Nguyên', 'Huyện Định Hóa', 'Xã Định Biên', 1, 1, 20749000, 0, 0, '2023-08-07'),
(44, 9, 'Hiếu Trung', '0866677713', '1051 Hậu Giang', 'Tỉnh Bắc Giang', 'Huyện Tân Yên', 'Xã Việt Ngọc', 1, 1, 20749000, 0, 0, '2023-08-07'),
(45, 9, 'Hiếu Trung', '0906757332', '49 XLHN', 'Tỉnh Thái Nguyên', 'Huyện Định Hóa', 'Xã Phượng Tiến', 1, 1, 33449000, 0, 0, '2023-08-07'),
(46, 9, 'Hiếu Trung', '0906757332', '49 XLHN', 'Tỉnh Lạng Sơn', 'Huyện Tràng Định', 'Xã Trung Thành', 1, 1, 33449000, 0, 0, '2023-08-07'),
(47, 9, 'Hiếu Trung', '0906757332', '1051 Hậu Giang', 'Tỉnh Yên Bái', 'Huyện Lục Yên', 'Xã Khánh Hoà', 1, 0, 33449000, 0, 0, '2023-08-07'),
(48, 9, 'Hiếu Trung', '0906757332', '1051 Hậu Giang', 'Thành phố Hà Nội', 'Huyện Phúc Thọ', 'Xã Phụng Thượng', 1, 1, 33449000, 1, 0, '2023-08-07'),
(49, 9, 'Hiếu Trung', '0866677713', '49 XLHN', 'Thành phố Hà Nội', 'Huyện Ba Vì', 'Xã Tòng Bạt', 1, 0, 33449000, 0, 0, '2023-08-07'),
(50, 15, 'Trung Hiếu', '0906757332', '1051 Hậu Giang', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 0, 8274000, 0, 0, '2023-08-07'),
(51, 11, 'Kha', '0906757332', '1051 Hậu Giang', 'Thành phố Cần Thơ', 'Quận Cái Răng', 'Phường Ba Láng', 2, 0, 8274000, 0, 3, '2023-08-08'),
(52, 12, 'Tiên', '0906757332', '49 XLHN', 'Thành phố Hồ Chí Minh', 'Quận 2', 'Phường Thảo Điền', 2, 0, 8536000, 0, 3, '2023-08-08'),
(53, 12, 'Tiên', '0937007039', '49 XLHN', 'Thành phố Hồ Chí Minh', 'Quận 2', 'Phường Thảo Điền', 1, 1, 8536000, 1, 3, '2023-08-08'),
(54, 11, 'Kha', '0906757332', '49 XLHN', 'Tỉnh Bắc Giang', 'Huyện Lạng Giang', 'Xã Tân Thanh', 2, 0, 14539000, 0, 3, '2023-08-09'),
(55, 11, 'Kha', '0906757332', '1051 Hậu Giang', 'Thành phố Hồ Chí Minh', 'Quận 6', 'Phường 11', 2, 1, 8616000, 1, 3, '2023-08-11'),
(56, 11, 'Kha', '0906757332', '49 XLHN', 'Tỉnh Phú Thọ', 'Huyện Tam Nông', 'Xã Vạn Xuân', 1, 0, 7800000, 0, 3, '2023-08-11'),
(57, 11, 'Kha', '0866677713', '1051 Hậu Giang', 'Tỉnh Thái Nguyên', 'Thành phố Sông Công', 'Phường Mỏ Chè', 1, 0, 19006000, 0, 0, '2023-08-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_detail`
--

CREATE TABLE `oder_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL COMMENT 'số lượng mua',
  `size` varchar(100) DEFAULT NULL,
  `oder_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oder_detail`
--

INSERT INTO `oder_detail` (`id`, `product_id`, `quantity`, `size`, `oder_id`) VALUES
(1, 6, 2, '40', 1),
(2, 18, 3, NULL, 2),
(3, 19, 1, NULL, 1),
(4, 10, 1, NULL, 2),
(5, 20, 10, NULL, 3),
(6, 17, 2, NULL, 4),
(9, 14, 1, 'No size', 11),
(15, 12, 3, 'No size', 15),
(16, 11, 3, 'No size', 15),
(17, 14, 3, 'No size', 15),
(18, 18, 1, 'No size', 16),
(19, 17, 1, 'No size', 16),
(20, 7, 1, 'XXL', 16),
(21, 5, 1, '45', 16),
(22, 18, 1, 'No size', 17),
(23, 17, 1, 'No size', 17),
(24, 7, 1, 'XS', 17),
(25, 5, 1, '35', 17),
(67, 11, 3, 'No size', 32),
(68, 12, 2, 'No size', 32),
(69, 17, 1, 'No size', 34),
(70, 18, 1, 'No size', 34),
(71, 20, 1, 'No size', 34),
(72, 15, 1, 'No size', 34),
(73, 17, 1, 'No size', 35),
(74, 18, 1, 'No size', 35),
(75, 20, 1, 'No size', 35),
(76, 15, 1, 'No size', 35),
(77, 17, 1, 'No size', 36),
(78, 20, 1, 'No size', 36),
(79, 17, 1, 'No size', 37),
(80, 20, 1, 'No size', 37),
(81, 17, 1, 'No size', 38),
(82, 20, 1, 'No size', 38),
(83, 17, 1, 'No size', 39),
(84, 20, 1, 'No size', 39),
(85, 17, 1, 'No size', 40),
(86, 20, 1, 'No size', 40),
(87, 18, 1, 'No size', 41),
(88, 20, 1, 'No size', 41),
(89, 11, 1, 'No size', 42),
(90, 12, 1, 'No size', 42),
(91, 14, 1, 'No size', 42),
(92, 11, 1, 'No size', 43),
(93, 12, 1, 'No size', 43),
(94, 14, 1, 'No size', 43),
(95, 11, 1, 'No size', 44),
(96, 12, 1, 'No size', 44),
(97, 14, 1, 'No size', 44),
(98, 11, 2, 'No size', 45),
(99, 14, 1, 'No size', 45),
(100, 9, 1, 'No size', 45),
(101, 11, 2, 'No size', 46),
(102, 14, 1, 'No size', 46),
(103, 9, 1, 'No size', 46),
(104, 11, 2, 'No size', 47),
(105, 14, 1, 'No size', 47),
(106, 9, 1, 'No size', 47),
(107, 11, 2, 'No size', 48),
(108, 14, 1, 'No size', 48),
(109, 9, 1, 'No size', 48),
(110, 11, 2, 'No size', 49),
(111, 14, 1, 'No size', 49),
(112, 9, 1, 'No size', 49),
(113, 17, 1, 'No size', 50),
(114, 18, 1, 'No size', 50),
(115, 20, 1, 'No size', 50),
(116, 18, 1, 'No size', 51),
(117, 17, 1, 'No size', 51),
(118, 20, 1, 'No size', 51),
(119, 18, 2, 'No size', 52),
(120, 7, 1, 'XXL', 52),
(121, 5, 1, '44', 52),
(122, 2, 2, 'XXL', 52),
(123, 18, 2, 'No size', 53),
(124, 7, 1, 'XS', 53),
(125, 5, 1, '35', 53),
(126, 2, 2, 'XS', 53),
(127, 18, 1, 'No size', 54),
(128, 7, 4, 'XXL', 54),
(129, 8, 1, 'XS', 55),
(130, 9, 1, 'No size', 55),
(131, 6, 1, '46', 55),
(132, 2, 3, 'XXL', 55),
(133, 17, 1, 'No size', 56),
(134, 8, 1, 'XS', 57),
(135, 9, 1, 'No size', 57),
(136, 6, 1, '35', 57),
(137, 2, 3, 'XS', 57),
(138, 17, 1, 'No size', 57),
(139, 16, 1, 'No size', 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `decsription` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL COMMENT 'số lượng hàng tồn kho',
  `price` float NOT NULL,
  `sale_price` float DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:bình thường, 1:nổi bật',
  `best_seller` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: bình thường, 1: bán chạy',
  `cate_id` int(11) DEFAULT NULL COMMENT 'thuộc về loại hàng nào',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `size` int(11) DEFAULT -1 COMMENT '-1: not size; 0: size áo: 1: size giày'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `decsription`, `quantity`, `price`, `sale_price`, `featured`, `best_seller`, `cate_id`, `create_at`, `update_at`, `size`) VALUES
(1, 'Áo thun nữ cổ tròn tay ngắn Basic Boxy Fit', 'Tự do mix&match với chiếc áo thun Basic Boxy Fit này! Chiếc áo thun cơ bản với logo thương hiệu B tinh tế, đơn giản để kết hợp với nhiều loại trang phục, mang lại cho bạn vẻ ngoài năng động, cá tính.\r\n \r\nThương hiệu: MLB\r\nXuất xứ: Hàn Quốc\r\nGiới tính: Nữ\r\nKiểu dáng: Áo thun\r\nMàu sắc: L.Purple, S.Cream, Black\r\nChất liệu: 100% Cotton\r\nCổ tròn, tay ngắn\r\nHoạ tiết: Trơn một màu\r\nThiết kế:\r\nBo viền cổ áo\r\nChất vải mềm mịn, thấm hút tốt\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện\r\nLogo: Chi tiết logo bóng chày nổi bật ở ngực trái\r\nPhom áo: Suông vừa vặn\r\nTúi áo: Không\r\nKhoá kéo: Không\r\nThích hợp mặc trong các dịp: Đi chơi, đi làm....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 100, 1090000, NULL, 1, 1, 1, '2023-07-14', NULL, 0),
(2, 'Quần short ngắn nữ Logo 4In', 'Hè đến với tinh thần thể thao tràn đầy, MLB lên kệ ngay chiếc quần short đáp ứng đúng nhu cầu vận động thoải mái và cực kỳ cá tính cho MLB Fans đây. Bạn có thể kết hợp chiếc quần short này với chiếc áo polo cùng set “tông xoẹt tông” chắc chắn sẽ đem đến cho bạn một diện mạo đủ trendy và thoải mái, “chinh chiến\" mọi hoạt động ngày hè!\r\n \r\nThương hiệu: MLB\r\nXuất xứ: Hàn Quốc\r\nGiới tính: Nữ\r\nKiểu dáng: Quần shorts\r\nMàu sắc: Navy, Pink, Cream, Green\r\nChất liệu: Nhung\r\nHoạ tiết: Trơn một màu\r\nThiết kế:\r\nLưng cao tôn dáng\r\nChất vải nhung mềm mại\r\nGam màu hiên đại dễ dàng phối với nhiều trang phục và phụ kiện khác\r\nLogo: Được thêu nổi bật ở mặt trước\r\nTúi xéo hai bên\r\nPhom quần: Suông thoải mái\r\nKhoá kéo: Không\r\nThích hợp mặc trong các dịp: Đi chơi, đi du lịch....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 100, 1399000, NULL, 1, 1, 1, '2023-07-14', NULL, 0),
(3, 'Giày sneakers unisex cổ thấp Chunky Liner', 'Chất liệu: Da cao cấp\r\nKiểu dáng giày thể thao cổ thấp thời trang \r\nĐế cao chunky hiện đại\r\nThiết kế lấy cảm hứng từ hiệp hội bóng chày MLB\r\nLogo bóng chày in nổi bật ở má ngoài\r\nLớp lót êm ái, nâng dáng bước chân\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện\r\nXuất xứ thương hiệu: Hàn quốc', 100, 3199000, 4199000, 1, 1, 2, '2023-07-14', NULL, 1),
(4, 'Giày sneakers unisex cổ thấp CA Pro Glitch', 'Chất liệu: Da tổng hợp, Cao su \r\nKiểu dáng giày thể thao cổ thấp thời trang\r\nPhom ôm chân, dễ dàng di chuyển\r\nDây mảnh đan chéo đơn giản\r\nLogo Puma Cat nổi bật\r\nĐế ngoài cao su có độ bám tốt\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện\r\nXuất xứ thương hiệu: Đức', 100, 3590000, 4590000, 1, 1, 2, '2023-07-14', NULL, 1),
(5, 'Dép unisex quai ngang bản rộng Chunky Bouncer', 'Đôi dép quai ngang đơn giản nhưng hiện đại với phom đế cao chunky cùng phần quai dép cách điệu độc đáo. Không cần cầu kì, đôi dép này hoàn hảo để phối với nhiều loại trang phục, mang đến cho bạn vẻ ngoài năng động, cá tính.\r\nThương hiệu: MLB\r\nXuất xứ: Hàn Quốc\r\nGiới tính: Unisex\r\nKiểu dáng: Dép quai ngang\r\nMàu sắc: White, Red, Black,Green\r\nChất liệu: Upper Injection EVA\r\nThiết kế:\r\nQuai ngang bản rộng cá tính\r\nĐế có rãnh chống trơn trượt, tăng độ bám\r\nPhong cách phóng khoáng, hiện đại, đa năng\r\nLogo: Chi tiết logo bóng chày được in trên quai dép\r\nMũi dép tròn, đế thấp\r\nDây quai: Mềm mại, dễ dàng thao tác xỏ/tháo\r\nThích hợp dùng trong các dịp: Đi biển, đi chơi, hoạt động ngoài trời.....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 99, 1790000, 2790000, 1, 1, 2, '2023-07-14', NULL, 1),
(6, 'Dép nữ quai ngang bản rộng phối logo in nổi thời trang', 'Chất liệu: Rubber/ Fabric\r\nĐộ cao: 2.5cm\r\nKiểu dáng dép nữ mũi tròn hiện đại\r\nThiết kế quai ngang bản rộng cá tính\r\nPhối logo in chạm nổi độc đáo\r\nMàu sắc hiện đại, dễ dàng kết hợp với nhiều phong cách khác nhau\r\nXuất xứ thương hiệu: Singapore', 100, 1990000, NULL, 1, 1, 2, '2023-07-14', NULL, 1),
(7, 'Áo sơ mi unisex cổ bẻ tay ngắn Mega Dia Monogram', 'Bỏ qua những chiếc áo sơ mi basic vốn có, cùng làm mới tủ đồ MLB với họa tiết monogram độc đáo mùa hè này. Hãy \"biến hóa\" phong cách tươi mới cho bản thân bằng sơ mi họa tiết mang vẻ phóng khoáng nhưng không kém phần năng động cho giới trẻ.\r\n\r\n \r\nThương hiệu: MLB\r\nXuất xứ: Hàn Quốc\r\nGiới tính: Unisex\r\nKiểu dáng: Áo sơ mi\r\nMàu sắc: Sky Blue, White\r\nChất liệu: 100% cotton\r\nCổ bẻ chữ V, tay ngắn\r\nHoạ tiết: Monogram\r\nThiết kế:\r\nNút cài tròn cùng tone màu\r\nChất vải mềm mại, thoáng mát\r\nGam màu hiện đại dễ dàng kết hợp với nhiều loại trang phục khác nhau\r\nLogo: Chi tiết logo bóng chày thêu nổi bật ở ngực trái\r\nPhom áo: Rộng thoải mái\r\nTúi áo: Không\r\nKhoá kéo: Không\r\nThích hợp mặc trong các dịp: Đi chơi, đi làm,...\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 99, 3590000, 4590000, 1, 1, 1, '2023-07-14', NULL, 0),
(8, 'Quần short ngắn nữ lưng thun Dolphin', 'Màu sắc: Light Purple/ Navy/ Red\r\nThành phần vải: 65% cotton, 35% polyester\r\nKiểu dáng quần shorts trên gối trẻ trung\r\nLưng thun co giãn thoải mái, đi kèm dây rút dễ dàng điều chỉnh\r\nPhối logo thương hiệu ở góc trái quần\r\nThiết kế bo viền màu tương phản, phối túi xéo hai bên\r\nChất vải mềm mịn, thoáng mát\r\nGam màu hiện đại dễ dàng phối với nhiều phụ kiện khác nhau \r\nXuất xứ thương hiệu: Hàn Quốc', 100, 1090000, NULL, 1, 1, 1, '2023-07-14', NULL, 0),
(9, 'Ví nữ dáng ngắn gập Studio Leather Tri Fold', 'Sở hữu phom dáng ngắn cổ điển, chất liệu da cao cấp cùng logo PEDRO kim loại ấn tượng ở mặt trước, chiếc ví dáng ngắn Studio Leather Tri Fold sẽ là nơi lưu trữ an toàn cho các loại thẻ cùng tiền mặt. \r\n \r\nThương hiệu: Pedro\r\nXuất xứ: Singapore\r\nGiới tính: Nữ\r\nKiểu dáng: Ví dáng ngắn\r\nMàu sắc: Black, Cream, Blush\r\nChất liệu: Calf Leather\r\nLớp lót: Calf Leather & Fabric\r\nKích thước: H9.2 x W11 x D3 (cm)\r\nThiết kế:\r\nNắp gập cổ điển\r\nNhiều ngăn đựng tiền và ngăn đựng thẻ tín dụng\r\nChất liệu da mềm mại, đường may tỉ mỉ\r\nDây đeo: Không\r\nSức chứa: Có thể đựng vừa thẻ tín dụng, tiền,...\r\nChống thấm nước: Không\r\nThích hợp dùng trong các dịp: Đi chơi, đi làm, đi học....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 100, 1339000, NULL, 1, 1, 3, '2023-07-14', NULL, -1),
(10, 'Ví nữ dáng dài chữ nhật Studio Leather Bi Fold', 'Với chất liệu da cao cấp cùng logo kim loại đem đến nét hiện đại, trẻ trung, chiếc ví dáng dài Studio Leather Bi Fold trở thành một vật dụng hữu ích tô điểm thêm phong cách riêng của các nàng. \r\n \r\nThương hiệu: Pedro\r\nXuất xứ: Singapore\r\nGiới tính: Nữ\r\nKiểu dáng: Ví dáng dài\r\nMàu sắc: Black, Cream, Navy\r\nChất liệu: Calf Leather\r\nLớp lót: Calf Leather & Fabric\r\nKích thước: H10 x W19.5 x D3.5 (cm)\r\nThiết kế:\r\nNắp gập cổ điển\r\nNhiều ngăn đựng tiền và ngăn đựng thẻ tín dụng\r\nChất liệu da mềm mại, đường may tỉ mỉ\r\nDây đeo: Không\r\nSức chứa: Có thể đựng vừa thẻ tín dụng, tiền,...\r\nChống thấm nước: Không\r\nThích hợp dùng trong các dịp: Đi chơi, đi làm, đi học....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 100, 1999000, 2999000, 1, 1, 3, '2023-07-14', NULL, -1),
(11, 'Túi xách nữ hình thang Sammy 21 In Signature', 'Chiếc túi xách xuất hiện nổi bật với thiết kế sang trọng sẽ giúp hoàn thiện cho vẻ ngoài bạn. Với phần khóa tông màu vàng tuyệt đẹp tạo sự tương phản đầy thú vị, chiếc túi này giúp bạn dễ dàng phối với mọi loại trang phục của mình. Túi có đi kèm dây đeo có thể tháo rời, bạn có thể xách tay hoặc đeo chéo tùy theo sở thích. Kết hợp chiếc túi này với một chiếc váy xếp li da và chiếc áo khoác bomber để có vẻ ngoài chuẩn streetstyle.\r\n \r\nThương hiệu: COACH\r\nXuất xứ: New York\r\nGiới tính: Nữ\r\nKiểu dáng: Túi xách\r\nMàu sắc: Brown\r\nChất liệu: Da\r\nKích thước: L21.5 x H15.5 x W10 (cm)\r\nThiết kế:\r\nKiểu dáng túi xách phom hình thang thời trang\r\nNắp gập, tay cầm da cố định\r\nLogo chữ C được đính sang trọng ở nắp túi\r\nĐóng mở bằng khóa bấm\r\nDây đeo: Có thể tháo rời\r\nSức chứa: Có thể đựng vừa chìa khoá, điện thoại, ví tiền, các phụ kiện nhỏ khác...\r\nChống thấm nước: Không\r\nThân thiện với môi trường: Không\r\nThích hợp dùng trong các dịp: Đi chơi, đi làm....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 97, 14760000, NULL, 1, 1, 3, '2023-07-14', NULL, -1),
(12, 'Túi đeo vai nữ phom chữ nhật Studio Rift Leather', 'Chiếc túi đeo vai Studio Rift Leather sở hữu vẻ ngoài trang nhã với gam màu hiện đại và thiết kế tối giản, tinh tế với logo dập nổi, lại có sức chứa rộng rãi. Items này vừa hữu dụng, lại vừa mang đến cho bạn một phong cách hiện đại, gọn gàng.\r\n \r\nThương hiệu: Pedro\r\nXuất xứ: Singapore\r\nGiới tính: Nữ\r\nKiểu dáng: Túi đeo vai\r\nMàu sắc: Black, Cream\r\nChất liệu: Calf Leather\r\nLớp lót: Suede Microfiber\r\nKích thước: H25 x W32 x D10.3 (cm)\r\nThiết kế:\r\nKiểu dáng túi nữ phom hình chữ nhật thời trang\r\nNgăn chứa rộng rãi giúp đựng được nhiều vật dụng\r\nGam màu hiện đại, phù hợp với nhiều trang phục \r\nLogo: Chi tiết logo in nhỏ ở mặt túi trước\r\nĐóng mở bằng nút đóng nhanh\r\nDây đeo: Dây đeo vai đôi bản mảnh\r\nSức chứa: Có thể đựng vừa chìa khoá, điện thoại, ví tiền, các phụ kiện nhỏ khác...\r\nChống thấm nước: Không\r\nThân thiện với môi trường: Không\r\nThích hợp dùng trong các dịp: Đi chơi, đi làm....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 97, 3399000, NULL, 1, 1, 3, '2023-07-14', NULL, -1),
(13, 'Kính mát unisex phom vuông thời trang', 'Chất liệu: Nhựa và im loại cao cấp \r\nKiểu dáng: Phom dáng vuông thời thượng\r\nThiết kế gọng bản dày hiện đại\r\nTròng kính tráng màu nổi bật\r\nKhả năng chống nắng: Chống tia UVA/UVB\r\nKích thước: 146 x 48 x 150 (mm)\r\nXuất xứ thương hiệu: Hong Kong', 100, 2990000, 3990000, 1, 1, 4, '2023-07-14', NULL, -1),
(14, 'Kính mát unisex phom vuông hiện đại', 'Chất liệu: Nhựa và im loại cao cấp \r\nKiểu dáng: Phom dáng vuông thời thượng\r\nThiết kế gọng bản mỏng hiện đại\r\nTròng kính tráng màu nổi bật\r\nKhả năng chống nắng: Chống tia UVA/UVB\r\nKích thước: 147.5 x 50 x 150 (mm)\r\nXuất xứ thương hiệu: Hong Kong', 97, 2590000, NULL, 1, 1, 4, '2023-07-14', NULL, -1),
(15, 'Kính mát unisex gọng phi công bản mảnh thời trang', 'Chất liệu: Kim loại cao cấp  \r\nKiểu dáng kính phi công cá tính\r\nThiết kế gọng kính đa giác thời trang\r\nKhung kính bản mảnh hiện đại, thanh lịch\r\nKhả năng chống nắng: Chống tia UVA/UVB\r\nKích thước: 145 x 50 x 148 (mm)\r\nXuất xứ thương hiệu: Hong Kong', 100, 1999000, NULL, 1, 1, 4, '2023-07-14', NULL, -1),
(16, 'Kính mát nữ gọng oval hiện đại', 'Chất liệu: Nhựa và kim loại cao cấp \r\nKiểu dáng: Gọng kính oval hiện đại\r\nMàu sắc thời trang, cá tính\r\nKhung kính dày dặn, chắc chắn\r\nKhả năng chống nắng: Chống tia UVA/UVB\r\nKích thước: 145 x 47 x 147 (mm)\r\nXuất xứ thương hiệu: Hong Kong', 100, 2590000, 3590000, 1, 1, 4, '2023-07-14', NULL, -1),
(17, 'Nón bóng chày unisex Pac-Man', 'Thương hiệu: DSQUARED2\r\nXuất xứ: Ý\r\nGiới tính: Unisex\r\nKiểu dáng: Nón bóng chày\r\nMàu sắc: Black\r\nChất liệu: 100% Cotton \r\nHoạ tiết: Trơn một màu\r\nThiết kế:\r\n\r\nWebbing điều chỉnh kích thước ở phía sau\r\nChi tiết chữ “PAC-MAN” in nổi bật ở phía sau\r\nChất vải cao cấp thoáng mát và co giãn tạo cảm giác thoải mái\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện khác\r\nLogo: Được in ở mặt trước của nón\r\nThích hợp đội trong các dịp: Đi chơi, hoạt động ngoài trời....\r\nXu hướng theo mùa: Sử dụng được tất cả các mùa trong năm', 99, 7800000, NULL, 1, 1, 5, '2023-07-14', NULL, -1),
(18, 'Móc khóa nữ hình chú chó đáng yêu', 'Chiếc móc khóa hình chú chó đáng yêu này là một sản phẩm đáng chú ý cho những người yêu thích các \"bé cún cưng\" và muốn thể hiện phong cách dễ thương của mình. Với thiết kế tinh xảo, hình dáng chú chó đáng yêu cùng màu sắc nổi bật, chiếc móc khóa sẽ làm cho phong cách thời trang của bạn trở nên nên độc đáo và thu hút mọi ánh nhìn. Sản phẩm này không chỉ là một phụ kiện trang trí, mà còn là biểu tượng cho tình yêu và sự gắn bó với những chú chó.\r\n \r\nThương hiệu: Ceci\r\nXuất xứ: Việt Nam\r\nGiới tính: Nữ\r\nKiểu dáng: Phụ kiện\r\nMàu sắc: Black, Blue, Red, Pink\r\nChất liệu: Resin\r\nThiết kế:\r\nGồm 1 móc hình chú chó dễ thương và 1 thẻ treo chữ nhật\r\nKhoe tròn kim loại chắc chắn\r\nGam màu hiện đại, trẻ trung dễ dàng phối với nhiều loại túi', 99, 179000, NULL, 1, 1, 5, '2023-07-14', NULL, -1),
(19, 'Thắt lưng nữ bản vừa Statement', 'Một chiếc thắt lưng có thể khiến vẻ ngoài của bạn thêm phần hoàn hảo. Chiếc thắt lưng bản vừa này đơn giản nhưng tinh tế với phần khóa chốt logo thương hiệu màu bạc sang trọng, chắc chắn sẽ làm nổi bật vòng eo của bạn. Phối cùng với chiếc áo vest thời thượng, bạn sẽ mang phong cách của những người phụ nữ bận rộn quyến rũ.\r\n \r\nThương hiệu: DSQUARED2\r\nXuất xứ: Ý\r\nGiới tính: Nữ\r\nKiểu dáng: Thắt lưng bản vừa\r\nMàu sắc: Black\r\nChất liệu: 100% Leather\r\nKhóa: 100% Brass\r\nThiết kế:\r\nĐộ dài linh hoạt, phù hợp với nhiều thể trạng cơ thể\r\nKhóa cài chốt xỏ\r\nMàu sắc hiện đại dễ dàng kết hợp với nhiều loại trang phục khác nhau\r\nLogo: Khoá cài logo thương hiệu đẳng cấp', 100, 12500000, 13500000, 1, 1, 5, '2023-07-14', NULL, -1),
(20, 'Vớ cổ cao unisex thời trang', 'Màu sắc: Black, White \r\nChất liệu: 70% Cotton, 28% Polyester, 2% Polyurethane \r\nKiểu dáng vớ cổ cao phong cách unisex thời trang \r\nPhối tên thương hiệu nổi bật \r\nMàu sắc dễ phối với nhiều mẫu giày sneakers\r\nThấm hút mồ hôi tốt, không gây hầm, bí\r\nXuất xứ thương hiệu: Hàn Quốc', 100, 295000, NULL, 1, 1, 5, '2023-07-14', '2023-07-14', -1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`) VALUES
(1, 17, 'https://product.hstatic.net/1000284478/product/1062_bcw0750_1_39d53343a4124f62a69394e309460b4a_large.jpg'),
(2, 18, 'https://product.hstatic.net/1000284478/product/13_cc9-03000009_1_18608cc3c29442e69d95648e245af869_large.jpg'),
(3, 19, 'https://product.hstatic.net/1000284478/product/m802_bew0360_1_cc62b6622a2c4aac8843e80170c0e28d_large.jpg'),
(4, 20, 'https://product.hstatic.net/1000284478/product/owh_fs3scf5354x_2_4261c72edd1b4dc4b7c791a2e3f2160c_grande.jpg'),
(5, 16, 'https://product.hstatic.net/1000284478/product/whc2_mj102sj535_2_1546957de5e4434db8d88c0761538c53_grande.jpg'),
(6, 15, 'https://product.hstatic.net/1000284478/product/bkc1_mj101sj545_2_f3ee495b1f144637b06567054f104dd7_grande.jpg'),
(7, 14, 'https://product.hstatic.net/1000284478/product/mtc2_mj101sj537_2_3646fecf13a14d5a89ef3f1be6823317_grande.jpg'),
(8, 13, 'https://product.hstatic.net/1000284478/product/bkc1_mj101sj538_2_979035748e0940b3bcb5041dc471a15e_grande.jpg'),
(9, 12, 'https://product.hstatic.net/1000284478/product/09_pw2-46390021_2_0382e14cb9c64ef0a257e515dadbbae6_grande.jpg'),
(10, 11, 'https://product.hstatic.net/1000284478/product/b4nq4_cj831_1_2c001e1f610c4075a6d9869fe60449af_large.jpg'),
(11, 10, 'https://product.hstatic.net/1000284478/product/01_pw4-15940084-1_1_1d2b751b3d35487982f95f073255f1ba_large.jpg'),
(12, 9, 'https://product.hstatic.net/1000284478/product/83_pw4-15940085-1_1_d393a70004a6465aa7b685535cdafecd_large.jpg'),
(13, 8, 'https://product.hstatic.net/1000284478/product/07_pneu23ks09_2_f92190730f6c4f5b84c4f821247dc8fb_grande.jpg'),
(14, 7, 'https://product.hstatic.net/1000284478/product/50whs_3awsm0533_2_1c814d4400434ae893d32b0c4cab6de1_grande.jpg'),
(15, 6, 'https://product.hstatic.net/1000284478/product/13_pw1-66380013_2_b9d7874712084a9b819efe62d89ba88b_grande.jpg'),
(16, 5, 'https://product.hstatic.net/1000284478/product/07whs_3alpfbs33_2_7948cc3a4f604ea587ceaaec075d5e41_grande.jpg'),
(17, 4, 'https://product.hstatic.net/1000284478/product/02_390681_1_7037793dd622419cb2cd67a1e22da171_large.jpg'),
(18, 3, 'https://product.hstatic.net/1000284478/product/50gns_3asxclb3n_1_1c3a2975cee14f4b9e71fe6b7da7d61d_large.jpg'),
(19, 2, 'https://product.hstatic.net/1000284478/product/50crs_3fspb0533_1_6e50de55ef5547dabf8630d0bfc38563_large.jpg'),
(20, 1, 'https://product.hstatic.net/1000284478/product/50bks_3ftsb1233_1_0af1ef8a58c0411585278247011cea74_large.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `cate_size` tinyint(4) DEFAULT NULL COMMENT '0: quần áo; 1: giày dép',
  `name_size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `cate_size`, `name_size`) VALUES
(1, 0, 'XS'),
(2, 0, 'S'),
(3, 0, 'M'),
(4, 0, 'L'),
(5, 0, 'XL'),
(6, 0, 'XXL'),
(7, 1, '35'),
(8, 1, '36'),
(9, 1, '37'),
(10, 1, '38'),
(11, 1, '39'),
(12, 1, '40'),
(13, 1, '41'),
(14, 1, '42'),
(15, 1, '43'),
(16, 1, '44'),
(17, 1, '45'),
(18, 1, '46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submit_contact`
--

CREATE TABLE `submit_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0:chưa xử lý, 1:đã xử lý',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL COMMENT 'họ tên',
  `phone_number` int(11) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `role` tinyint(4) DEFAULT 0 COMMENT '0: khách hàng; 1: admin',
  `position` tinyint(4) DEFAULT 0 COMMENT '0: thành viên; 1: quản lý',
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `full_name`, `phone_number`, `images`, `role`, `position`, `ip_address`) VALUES
(1, 'trunghieu123', 'hieu@gmnail.com', '123456', 'Đinh Lê Trung Hiếu', 906757332, NULL, 1, 0, NULL),
(2, 'duc123', 'duc@gmail.com', '123456', 'Đức', 123456789, NULL, 1, 0, NULL),
(3, 'hoa123', 'hoa@gmail.com', '123456', 'Lưu Việt Hòa', 123456789, NULL, 1, 0, NULL),
(4, 'tuan123', 'tuan@gmail.com', '123456', 'Tuấn', 123456789, NULL, 1, 0, NULL),
(5, 'toan123', 'toan@gmail.com', '123456', 'Văn Toàn', 123456789, NULL, 1, 0, NULL),
(6, 'customer1', 'customer1@gmail.com', '123456', 'khách hàng 1', 123456789, NULL, 0, 0, NULL),
(7, 'customer2', 'customer2@gmail.com', '123456', 'Khách hàng 2', 123456789, NULL, 0, 0, NULL),
(8, 'quanly123', 'quanly@gmail.com', '123456', 'quản lý', 123456789, NULL, 1, 1, NULL),
(9, 'trunghieu1234', 'dinhletrunghieu0207@gmail.com', '$2y$10$JYSLl4WUB/e8KOH8iiSbcuCW19vLFREo0kSELcCi.XI4STrOknCv2', 'Hiếu Trung', 937028400, NULL, 1, 1, '::1'),
(10, 'trunghieuzz', 'huhuhihi@gmail.com', '$2y$10$s4zVSv3Lg8kSk4pfdcY56.1OnaydGx0gz5DLj2H/4zg6zE/mbn16u', 'Hiếu', 906757332, NULL, 0, 0, '::1'),
(11, 'khach1', 'customer@gmail.com', '$2y$10$3kPJq1gYevGAy3dAlfNpseVLbSZ9JOVZ1FnqXWV5AUYj5/FspcyA6', 'Kha', 906757332, NULL, 0, 0, '::1'),
(12, 'khach2', 'mtcute@gmail.com', '$2y$10$SvT6vBP0ch9MtSPLNxqzPeyGdog5.lW8FfKcP4iVRBdBPKwi5EcYe', 'Tiên', 906757332, NULL, 0, 0, '::1'),
(13, 'hau123', 'hau@gmail.com', '$2y$10$YRtb/55SwnwTsOQjjzoQkODb0rcL1DBrR.XwcKAWCfSYUCAUDa8By', 'Hậu', 937007039, NULL, 0, 0, '::1'),
(14, 'nguyenthinam', 'nam@gmail.com', '$2y$10$ci5JGBi0nP.kdW09keI1.eBeP7q1tCxyL4.nebI/GthAtqoBr/.yW', 'Nam', 906757332, NULL, 0, 0, '::1'),
(15, 'trunghieu456', 'hieu456@gmail.com', '$2y$10$.TWrSBtzY/BJArfyXKHiXe936/AbvPHxuKsRTLXbNXaCpRVbn1uSK', 'Trung Hiếu', 906757332, NULL, 0, 0, '::1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cate_size`
--
ALTER TABLE `cate_size`
  ADD KEY `id cate` (`cate_id`),
  ADD KEY `id size` (`size_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmt cua sp` (`product_id`),
  ADD KEY `cmt cua user` (`customer_id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_giam_gia` (`coupon_code_id`),
  ADD KEY `ma_user` (`cus_id`);

--
-- Chỉ mục cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id sp` (`product_id`),
  ADD KEY `oder id` (`oder_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai hang` (`cate_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_sp cua img` (`product_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `submit_contact`
--
ALTER TABLE `submit_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `oders`
--
ALTER TABLE `oders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `submit_contact`
--
ALTER TABLE `submit_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cate_size`
--
ALTER TABLE `cate_size`
  ADD CONSTRAINT `id cate` FOREIGN KEY (`cate_id`) REFERENCES `category_product` (`id`),
  ADD CONSTRAINT `id size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `cmt cua sp` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cmt cua user` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `ma_giam_gia` FOREIGN KEY (`coupon_code_id`) REFERENCES `coupon` (`id`),
  ADD CONSTRAINT `ma_user` FOREIGN KEY (`cus_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD CONSTRAINT `id sp` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `oder id` FOREIGN KEY (`oder_id`) REFERENCES `oders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `loai hang` FOREIGN KEY (`cate_id`) REFERENCES `category_product` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `ma_sp cua img` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
