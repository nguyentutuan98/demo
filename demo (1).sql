-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2022 lúc 10:45 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(10) NOT NULL,
  `role` int(10) NOT NULL,
  `namerole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `role`, `namerole`) VALUES
(1, 1, 'user'),
(2, 2, 'guest'),
(3, 99, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  `permission_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `name`, `del_flag`, `create_time`, `update_time`, `create_id`, `update_id`, `gender`, `note`, `birthday`, `active`, `permission_role`) VALUES
(1, 'tu@gmail.com', '123', 'tu', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(2, 'tu2@gmail.com', '123', 'tu2', 1, '2022-03-09 05:01:36', '2022-03-09 05:01:36', NULL, NULL, 1, '', NULL, 0, 0),
(3, 'tu3@gmail.com', '123', 'tu3', 0, '2022-03-09 05:02:51', '2022-03-09 05:02:51', NULL, NULL, 1, '', NULL, 0, 0),
(4, 'tu4@gmail.com', '123', 'tu4', 1, '2022-03-09 05:03:27', '2022-03-09 05:03:27', NULL, NULL, 1, '', NULL, 0, 0),
(5, 'tu5@gmail.com', '123', 'tu5', 1, '2022-03-10 04:07:03', '2022-03-10 04:07:03', NULL, NULL, 1, '', NULL, 0, 0),
(6, 'tu6@gmail.com', '123', 'tu6', 1, '2022-03-09 05:09:13', '2022-03-09 05:09:13', NULL, NULL, 1, '', NULL, 0, 0),
(7, 'tu7@gmail.com', '123', 'tu7', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(8, 'tu8@gmail.comp', '123', 'tu8', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(9, 'tu9@gmail.com', '123', 'tu91', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(10, 'tu@gmail.com', '123', 'ffssdssss', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(11, 'tu90@gmail.com', '123', 'tu91', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(13, 'tu@gmail.com', '123', 'gggaa', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(14, 'tu@gmail.com', '123', 'sgagaggag', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(15, 'tu@gmail.com', 'qwe', '123', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(16, 'tu@gmail.com', 'qwe', '123', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(17, 'tu@gmail.com', 'qwe', 'asdasdad', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(18, 'tu@gmail.com', 'qwe', 'asdasdad', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(19, 'tu@gmail.com', 'wqe', 'asdasd', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(20, 'DH5161962@student.stu.edu.vn', '213', 'eqweqweqeqwe', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(21, 'tujjj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 1, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(22, 'tu@gmail.com', '202cb962ac59075b964b07152d234b70', 'tu91', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(23, 'tu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 0, NULL, NULL, NULL, NULL, 1, '', NULL, 0, 0),
(24, 'tu66@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu90', 0, NULL, NULL, 22, 22, 1, '', NULL, 0, 0),
(25, 'tu44@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 0, NULL, NULL, 22, NULL, 1, NULL, NULL, 0, 0),
(26, 'wqeqweqwe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 0, NULL, NULL, 22, NULL, 1, NULL, NULL, 0, 0),
(27, 'tu555@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234', 0, '2022-03-15 03:40:54', '2022-03-15 03:40:54', 22, NULL, 1, NULL, NULL, 0, 0),
(28, 'tu222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu9999', 0, '2022-03-15 03:46:45', '2022-03-15 03:59:26', 22, 22, 1, NULL, NULL, 0, 0),
(29, 'turrr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu999', 0, NULL, '2022-03-15 04:00:03', 22, 22, 1, NULL, NULL, 0, 0),
(30, 'tu2222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 0, '2022-03-15 04:06:28', NULL, 22, NULL, 1, NULL, NULL, 0, 0),
(31, 'tu222222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'qweqweqwe', 1, '2022-03-15 04:07:12', NULL, 22, NULL, 1, NULL, NULL, 0, 0),
(32, 'tu232323@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu91', 1, '2022-03-15 11:20:22', '2022-03-15 15:04:42', 22, 22, 2, 'jhkhhk', NULL, 0, 0),
(33, 'tu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu', 1, '2022-03-15 14:03:39', '2022-03-15 14:03:39', 23, NULL, 1, NULL, NULL, 0, 0),
(34, 'qweqweqwe@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu91', 1, '2022-03-15 14:31:55', '2022-03-15 15:01:45', 23, 23, 1, 'sdaadadad', NULL, 0, 0),
(35, 'tu223222@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'lfsdlflflsjfs', 1, '2022-03-15 15:13:30', '2022-03-15 16:25:12', 22, 22, 1, 'eqweqweqwe', NULL, 0, 0),
(36, 'kkk@aa.com1', 'd41d8cd98f00b204e9800998ecf8427e', 'kkk', 1, '2022-03-15 16:27:06', '2022-03-15 16:30:04', 22, 22, 1, 'k note\nnote', NULL, 0, 0),
(37, 'kkk@aa.com', 'e10adc3949ba59abbe56e057f20f883e', 'kkk', 1, '2022-03-15 16:29:16', '2022-03-15 16:29:16', 22, NULL, 2, NULL, NULL, 0, 0),
(38, 'kkk@aa.com', '202cb962ac59075b964b07152d234b70', 'hhhh', 1, '2022-03-15 16:37:06', '2022-03-15 16:37:06', 37, NULL, 1, NULL, NULL, 0, 0),
(39, 'tu2@gmail.com', '202cb962ac59075b964b07152d234b70', 'qweqweqwe', 1, '2022-03-15 16:38:24', '2022-03-15 16:38:24', 37, NULL, 1, NULL, NULL, 0, 0),
(40, 'tu22223333@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 1, '2022-03-17 10:28:40', '2022-03-17 10:28:40', NULL, NULL, 1, NULL, NULL, 0, 0),
(41, 'tu222223333@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'wqeqwe', 1, '2022-03-17 10:34:26', '2022-03-17 14:20:29', NULL, NULL, 2, 'sadasdasd', NULL, 0, 0),
(42, 'kk222k@aa.com', 'e10adc3949ba59abbe56e057f20f883e', 'tu91', 0, '2022-03-17 16:26:31', '2022-03-17 16:26:31', 22, NULL, 2, NULL, NULL, 0, 0),
(43, 'kk22222k@aa.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu9888', 0, '2022-03-17 16:26:31', '2022-03-18 09:41:46', 22, NULL, 1, NULL, NULL, 0, 0),
(44, 'ty@gmail.com', '202cb962ac59075b964b07152d234b70', 'tu91', 0, '2022-03-18 10:03:48', '2022-03-18 10:03:48', 23, NULL, 2, NULL, NULL, 0, 0),
(45, 'ty3@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu97', 0, '2022-03-18 10:28:00', '2022-03-18 10:28:48', 23, 23, 1, NULL, NULL, 0, 0),
(46, 'tutest@gmail.com', 'a64f7adc005226a334c1e9c1b41b403f', 'tu91', 0, '2022-03-18 14:14:18', '2022-03-18 14:14:18', 22, NULL, 1, NULL, NULL, 0, 0),
(47, 'ty5@gmail.com', 'a64f7adc005226a334c1e9c1b41b403f', 'qweqwe', 0, '2022-03-21 14:14:38', '2022-03-21 14:14:38', 22, NULL, 1, NULL, '2022-02-03', 0, 0),
(48, 'ty6@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'dsasa', 0, '2022-03-21 14:20:24', '2022-03-22 14:17:17', 22, 22, 1, NULL, '1970-01-01', 0, 0),
(49, 'tr@gmail.com', 'e355264165a7c7ae1de3af1a226ee533', 'sda', 0, '2022-03-21 14:29:24', '2022-03-21 14:29:24', 22, NULL, 1, NULL, '1970-01-01', 1, 0),
(50, 'tr2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'asda', 0, '2022-03-21 14:47:33', '2022-03-22 14:37:37', 22, 22, 1, 'qwqwq\n\nd\nd\ns\ns\nd\ns', '2022-03-25', 0, 0),
(51, 'tr3@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'asdads', 0, '2022-03-21 16:08:39', '2022-03-23 16:06:50', 22, 22, 1, 'đây là text\nđã xuống dòng\nxuống dòng\n\n\n\n\n\ndòng cuối \n\n\ncuối', '2022-03-23', 1, 1),
(52, 'kkk2@aa.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ttt', 1, '2022-03-21 16:38:56', '2022-03-22 13:40:41', 22, 22, 1, NULL, '2022-03-25', 1, 0),
(53, 'kktk@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'sdasdss', 1, '2022-03-22 13:43:32', '2022-03-22 14:01:02', 22, 22, 1, NULL, '2022-03-22', 1, 1),
(54, 'role@gmail.com', '43deba22da2b1995f3a39be03f0c0f10', 'ttt', 0, '2022-03-23 14:04:57', '2022-03-23 14:04:57', 22, NULL, 1, NULL, '2022-03-02', 1, 1),
(55, 'role2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu91', 0, '2022-03-23 14:23:57', '2022-03-23 15:07:27', 22, 22, 2, NULL, '2022-03-18', 1, 99),
(56, 'role3@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'tu', 0, '2022-03-23 15:08:02', '2022-03-30 20:47:18', 22, 22, 2, NULL, '2022-03-09', 1, 99);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `del_flag` (`del_flag`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
