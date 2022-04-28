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
-- Cấu trúc bảng cho bảng `bill_detail_in`
--

CREATE TABLE `bill_detail_in` (
  `Bi_id` int(11) NOT NULL,
  `Pr_id` int(11) NOT NULL,
  `Bd_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail_in`
--

INSERT INTO `bill_detail_in` (`Bi_id`, `Pr_id`, `Bd_amount`) VALUES
(1, 1, 5),
(1, 2, 2),
(2, 2, 3),
(3, 1, 10),
(3, 5, 6),
(4, 1, 10),
(4, 2, 20),
(4, 4, 8);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_detail_in`
--
ALTER TABLE `bill_detail_in`
  ADD PRIMARY KEY (`Bi_id`,`Pr_id`),
  ADD KEY `Pr_id` (`Pr_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_detail_in`
--
ALTER TABLE `bill_detail_in`
  ADD CONSTRAINT `bill_detail_in_ibfk_1` FOREIGN KEY (`Bi_id`) REFERENCES `bill_in` (`Bi_id`),
  ADD CONSTRAINT `bill_detail_in_ibfk_2` FOREIGN KEY (`Pr_id`) REFERENCES `product` (`Pr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
