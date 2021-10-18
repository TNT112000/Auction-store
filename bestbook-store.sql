-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2021 lúc 10:29 AM
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
-- Cấu trúc bảng cho bảng `edit_category`
--

CREATE TABLE `edit_category` (
  `edit_category_id` int(100) UNSIGNED NOT NULL,
  `edit_category_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `edit_category`
--

INSERT INTO `edit_category` (`edit_category_id`, `edit_category_img`, `category_id`) VALUES
(1, '', 3),
(2, '', 3),
(3, '', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_book`
--

CREATE TABLE `list_book` (
  `book_id` int(100) UNSIGNED NOT NULL,
  `book_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(100) UNSIGNED NOT NULL,
  `book_thickness` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_title` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `book_rice` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_category`
--

CREATE TABLE `list_category` (
  `category_id` int(100) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `list_category`
--

INSERT INTO `list_category` (`category_id`, `category_name`) VALUES
(1, 'Truyện tranh'),
(2, 'Nấu ăn'),
(3, 'Chính trị'),
(4, 'Kinh tế'),
(5, 'Khám phá'),
(6, 'Lịch sử'),
(7, 'Tiểu thuyết'),
(8, 'Khoa học'),
(9, 'Động vật'),
(10, 'Văn hóa'),
(11, 'Tôn giáo'),
(12, 'Ngôn ngữ'),
(13, 'Vũ trụ'),
(14, 'Nhật ký'),
(15, 'Viễn tưởng'),
(16, 'Từ điển');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(100) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `edit_category`
--
ALTER TABLE `edit_category`
  ADD PRIMARY KEY (`edit_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `list_book`
--
ALTER TABLE `list_book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `list_category`
--
ALTER TABLE `list_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `edit_category`
--
ALTER TABLE `edit_category`
  MODIFY `edit_category_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `list_book`
--
ALTER TABLE `list_book`
  MODIFY `book_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `list_category`
--
ALTER TABLE `list_category`
  MODIFY `category_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `edit_category`
--
ALTER TABLE `edit_category`
  ADD CONSTRAINT `edit_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `list_category` (`category_id`);

--
-- Các ràng buộc cho bảng `list_book`
--
ALTER TABLE `list_book`
  ADD CONSTRAINT `list_book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `list_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
