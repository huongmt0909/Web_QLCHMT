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
-- Cấu trúc bảng cho bảng `bill_in`
--

CREATE TABLE `bill_in` (
  `Bi_id` int(11) NOT NULL,
  `Ep_id` int(11) DEFAULT NULL,
  `Bi_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_in`
--

INSERT INTO `bill_in` (`Bi_id`, `Ep_id`, `Bi_date`) VALUES
(1, 2, '2021-03-10'),
(2, 1, '2021-03-20'),
(3, 13, '2021-03-18'),
(4, 1, '2021-03-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_in`
--
ALTER TABLE `bill_in`
  ADD PRIMARY KEY (`Bi_id`),
  ADD KEY `Ep_id` (`Ep_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_in`
--
ALTER TABLE `bill_in`
  MODIFY `Bi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_in`
--
ALTER TABLE `bill_in`
  ADD CONSTRAINT `bill_in_ibfk_2` FOREIGN KEY (`Ep_id`) REFERENCES `employee` (`Ep_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
