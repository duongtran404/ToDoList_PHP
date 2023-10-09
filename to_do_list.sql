-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 09, 2023 lúc 10:23 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ToDoList`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('not started','doing','completed') NOT NULL DEFAULT 'not started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `to_do_list`
--

INSERT INTO `to_do_list` (`id`, `description`, `begin_date`, `end_date`, `status`) VALUES
(8, 'hoc toan', '2023-10-06', '2023-10-07', 'not started'),
(10, 'on tap tinh chat cua oop', '2023-10-06', '2023-10-07', 'not started'),
(16, 'di hoc', '2023-10-09', '2023-10-10', 'not started'),
(17, 'go to school', '2023-10-09', '2023-10-13', 'doing');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
