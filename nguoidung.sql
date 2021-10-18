-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2021 lúc 10:14 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bestbook-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nguoidung_id` int(100) UNSIGNED NOT NULL,
  `nguoidung_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nguoidung_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nguoidung_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nguoidung_id`, `nguoidung_name`, `nguoidung_email`, `nguoidung_pass`) VALUES
(2, ' Trần Tuyền', '0972612200tuyen@gmail.com', ' 0972612200'),
(4, ' Trần Tuyền', 'tnt097@gmail.com', ' 0972612200'),
(5, ' Tràn Hạo', 'tranhao@gmail.com', ' 123456tnt'),
(6, ' Nguyễn Nam', 'nguyennam@gmail.com', ' 0972612200'),
(7, ' Phi Long', 'philong@gmail.com', ' 123456'),
(8, ' Nguyên Long', 'nugyenong@gmail.com', ' 1234567'),
(9, ' Ngô Khởi', 'ngokhoi@gmail.com', ' 1234567tnt'),
(10, ' Ngô Long', 'ngolong@gmail.com', ' tuyen1234'),
(11, ' Thùy Linh', 'thuylinh@gmail.com', ' 0972612200tuyen'),
(12, ' Vũ Lôi', 'vuloi@gmail.com', ' tuyen0972612200');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nguoidung_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nguoidung_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
