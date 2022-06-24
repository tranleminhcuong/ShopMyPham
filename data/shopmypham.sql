-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 30, 2021 lúc 01:12 PM
-- Phiên bản máy phục vụ: 5.7.25
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopmypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mypham_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT '0',
  `soluong` int(11) NOT NULL DEFAULT '1',
  `thanhtien` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ngaylap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nguoidung_id` int(11) NOT NULL,
  `tongtien` float NOT NULL DEFAULT '0',
  `ghichu` varchar(255) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimypham`
--

CREATE TABLE `loaimypham` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaimypham`
--

INSERT INTO `loaimypham` (`id`, `tenloai`) VALUES
(1, 'Tẩy trang'),
(2, 'Sữa rửa mặt'),
(3, 'Kem dưỡng mắt'),
(4, 'Kem chống nắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mypham`
--

CREATE TABLE `mypham` (
  `id` int(11) NOT NULL,
  `tenmypham` varchar(255) NOT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `giagoc` float NOT NULL DEFAULT '0',
  `giaban` float NOT NULL DEFAULT '0',
  `soluongton` int(11) NOT NULL DEFAULT '0',
  `hinhanh` varchar(255) DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT '0',
  `luotmua` int(11) NOT NULL DEFAULT '0',
  `kiemduyet` tinyint(4) NOT NULL,
  `loaimypham_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mypham`
--

INSERT INTO `mypham` (`id`, `tenmypham`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `luotxem`, `luotmua`, `kiemduyet`, `loaimypham_id`, `thuonghieu_id`) VALUES
(1, 'Sữa rửa mặt Simple Refreshing Facial Wash', 'Sửa rửa mặt', 70000, 85000, 0, 'images/2-simple.png', 0, 0, 0, 2, 4),
(2, 'Dầu Tẩy Trang Chuyên Sâu Kracie Naive', NULL, 160000, 175000, 0, 'images/t2.jpg', 0, 0, 1, 1, 4),
(3, 'Sữa Rửa Mặt Kiehl’s Calendula', NULL, 150000, 180000, 0, 'images/2-kiel\'s.jpg', 0, 0, 1, 2, 3),
(4, 'Gel Dưỡng Da Vùng Mắt Bioderma', NULL, 290000, 306000, 0, 'images/b1.png', 0, 0, 1, 3, 2),
(5, 'Gel Rửa Mặt Dành Cho Da Dầu Mụn Bioderma', NULL, 200000, 216000, 0, 'images/b2.png', 0, 0, 1, 2, 2),
(6, 'Kem Chống Nắng Bioderma Photoderm Laser', NULL, 385000, 420000, 0, 'images/b3.png', 0, 0, 1, 4, 2),
(7, 'Gel Rửa Mặt cho da dầu mụn Vichy Normaderm', NULL, 290000, 320000, 0, 'images/s1.jpg', 0, 0, 1, 2, 4),
(8, 'Gel Rửa Mặt Chiết Xuất Tràm Trà ST.Ives Blemish', NULL, 100000, 139000, 0, 'images/s2.jpg', 0, 0, 1, 2, 4),
(9, 'Gel Rửa Mặt Cosrx Good Morning Gel Cleanser', NULL, 156000, 180000, 0, 'images/s3.jpg', 0, 0, 1, 2, 4),
(10, 'Gel Rửa Mặt Neutrogena Hydro Boost Exfoliating', NULL, 196000, 210000, 0, 'images/s4.jpg', 0, 0, 1, 2, 4),
(11, 'Gel Rửa Mặt Senka Perfect Gel Gentle Wash', NULL, 45000, 54000, 0, 'images/s5.jpg', 0, 0, 1, 2, 4),
(12, 'Kem Rửa Mặt Dưỡng Trắng Da Hada Labo', NULL, 43000, 55000, 0, 'images/s6.png', 0, 0, 1, 2, 4),
(13, 'Kem Rửa Mặt Dưỡng Ẩm Tối Ưu Hada Labo', NULL, 45000, 55000, 0, 'images/s7.png', 0, 0, 1, 2, 4),
(14, 'Kem Rửa Mặt Trị Thâm – Ngừa Mụn Acnes', NULL, 33000, 45000, 0, 'images/s8.jpg', 0, 0, 1, 2, 4),
(15, 'Sáp Rửa Mặt Secret Key Lemon Sparkling Stick', NULL, 149000, 160000, 0, 'images/s9.jpg', 0, 0, 1, 2, 4),
(16, 'Dầu Tẩy Trang Biore Makeup Remover', NULL, 133000, 145000, 0, 'images/t1.jpg', 0, 0, 1, 1, 1),
(17, 'Dầu Tẩy Trang Ciracle Absolute Deep Cleansing', NULL, 264000, 280000, 0, 'images/t3.jpg', 0, 0, 1, 1, 2),
(18, 'Dầu Tẩy Trang DHC Deep Cleansing Oil', NULL, 215000, 239000, 0, 'images/t4.jpg', 0, 0, 1, 1, 4),
(19, 'Dầu Tẩy Trang Kanebo Kracie Naive', NULL, 120000, 135000, 0, 'images/t5.jpg', 0, 0, 1, 1, 2),
(20, 'Nước Tẩy Trang Dành Cho Da Dầu Bioderma Sebium', NULL, 150000, 175000, 0, 'images/t6.png', 0, 0, 1, 1, 2),
(21, 'Chống Nắng Dạng Gel Shiseido Anessa', NULL, 450000, 550000, 0, 'images/c1.jpg', 0, 0, 1, 4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT '3',
  `trangthai` tinyint(4) NOT NULL DEFAULT '1',
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `hoten`, `sodienthoai`, `email`, `matkhau`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'Trần Lê Minh Cường', '0368672641', 'cuong@cuong.com', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 0, 'avt1.jpg'),
(2, 'Bùi Linh Linh Linh', '0911673582', 'linh@linh', '356a192b7913b04c54574d18c28d46e6395428ab', 2, 1, 'avt5.jpg'),
(3, 'Nguyễn Thị Lệ Hằng', '0368672644', 'lehang', '356a192b7913b04c54574d18c28d46e6395428ab', 2, 1, 'avt4.jpg'),
(5, 'Như', '0368672641', 'abc@abc.com', 'a9993e364706816aba3e25717850c26c9cd0d89d', 2, 0, 'avt5.jpg'),
(6, 'Trương Trương', '0368672641', 'truongy@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 'avt1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `tenthuonghieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenthuonghieu`) VALUES
(1, 'Senka'),
(2, 'BioDerMa'),
(3, 'Kiehl’s '),
(4, 'Simple');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `sanpham_id` (`mypham_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `loaimypham`
--
ALTER TABLE `loaimypham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mypham`
--
ALTER TABLE `mypham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaimypham_id` (`loaimypham_id`),
  ADD KEY `thuonghieu_id` (`thuonghieu_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaimypham`
--
ALTER TABLE `loaimypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `mypham`
--
ALTER TABLE `mypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_chitietdonhang_donhang` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitietdonhang_mypham` FOREIGN KEY (`mypham_id`) REFERENCES `mypham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_nguoidung` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mypham`
--
ALTER TABLE `mypham`
  ADD CONSTRAINT `fk_mypham_loaimypham` FOREIGN KEY (`loaimypham_id`) REFERENCES `loaimypham` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mypham_thuonghieu` FOREIGN KEY (`thuonghieu_id`) REFERENCES `thuonghieu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
