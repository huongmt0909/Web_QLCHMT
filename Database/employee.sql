-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2021 lúc 02:09 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `computer_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `Ep_id` int(11) NOT NULL,
  `Ep_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ep_sex` int(11) DEFAULT NULL,
  `Ep_birthday` date DEFAULT NULL,
  `Ep_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ep_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ep_Position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`Ep_id`, `Ep_name`, `Ep_sex`, `Ep_birthday`, `Ep_phone`, `Ep_adress`, `Ep_Position`) VALUES
(1, 'Ma Trung Hướng', 0, '2021-03-12', '03957468', 'Bắc Kan', 0),
(2, 'Hoàng Thị Mai', 0, '2021-03-12', '03957468', 'Thái Bình', 0),
(13, 'Hoàng Lan Chi', 1, '2021-03-19', '0395749813', 'Bac Kan', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Ep_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `Ep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
