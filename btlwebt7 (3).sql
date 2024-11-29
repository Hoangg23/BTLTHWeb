-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 05:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btlwebt7`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total` int(12) NOT NULL,
  `pttt` tinyint(1) NOT NULL,
  `trangthai` text NOT NULL,
  `ngaygiao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `name`, `address`, `tel`, `email`, `total`, `pttt`, `trangthai`, `ngaygiao`) VALUES
(36, 'phùng thanh tùng', 'hn', '0876312241', 'phephehoan@gmail.com', 54, 0, 'Đã Duyệt', NULL),
(37, 'dfghdfgh', 'fghdfh', '098454654', 'sfdhdfhg', 29, 0, 'Đã Duyệt', NULL),
(38, 'minhhoanpp', 'fghdfh', '234234234', 'sfdhdfhg', 38, 0, 'Đã Duyệt', NULL),
(39, 'minhhoanpp', 'hn', '124234124', 'sfdhdfhg', 31, 0, '', NULL),
(42, 'nguyenminhhoaneq  ', 'sdc', '123234234', 'phehoan@gmail.com   ', 54, 0, 'Đã Duyệt', NULL),
(43, 'nguyenminhhoaneq  ', 'sdf', '142431243', 'phehoan@gmail.com   ', 29, 0, 'Đang Giao', NULL),
(44, 'nguyenminhhoaneq  ', '2343', '1243124', 'phehoan@gmail.com   ', 41, 0, 'Đã Giao', '2024-11-29'),
(49, 'Lê Tuấn Kiệt', 'Hà Nội', '0123456789', 'kietle2003@gmail.com', 31, 0, 'Đã Giao', '2024-11-29'),
(50, 'Lê Tuấn Kiệt', 'Nam Định', '0123456789', 'kietle2003@gmail.com', 321, 0, 'Đã Giao', '2024-11-29'),
(51, 'Lê Tuấn Kiệt', 'Hà Nội', '0123456789', 'kietle2003@gmail.com', 666, 0, 'Đã Duyệt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(12) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `dongia` int(12) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL DEFAULT 0,
  `thanhtien` int(12) NOT NULL DEFAULT 0,
  `idbill` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `tensp`, `img`, `dongia`, `soluong`, `thanhtien`, `idbill`) VALUES
(76, 'Áo Xám Vải Cotton  ', 'r4.jpg', 31, 1, 31000, 49),
(77, 'Áo Xanh Than ', 'r7.jpg', 321, 1, 321000, 50),
(78, 'Áo Phông Nâu Đen  ', 'r8.jpg', 222, 3, 666000, 51);

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `hoten` varchar(200) NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham1`
--

CREATE TABLE `sanpham1` (
  `masp` varchar(100) NOT NULL,
  `nhom_id` int(11) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `mota` text DEFAULT NULL,
  `dongiacu` int(11) NOT NULL,
  `dongiamoi` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `img3` varchar(200) DEFAULT NULL,
  `img4` varchar(200) DEFAULT NULL,
  `enable` tinyint(4) NOT NULL DEFAULT 1,
  `ghichu` text DEFAULT NULL,
  `diemnoibat` text DEFAULT NULL,
  `xuatxu` varchar(255) DEFAULT NULL,
  `ngaydang` varchar(50) DEFAULT NULL,
  `kichthuoc` varchar(255) DEFAULT NULL,
  `nguoidang` varchar(50) DEFAULT NULL,
  `loaiao` varchar(200) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham1`
--

INSERT INTO `sanpham1` (`masp`, `nhom_id`, `tensp`, `mota`, `dongiacu`, `dongiamoi`, `img1`, `img2`, `img3`, `img4`, `enable`, `ghichu`, `diemnoibat`, `xuatxu`, `ngaydang`, `kichthuoc`, `nguoidang`, `loaiao`, `soluong`) VALUES
('245', 3242, 'Áo Nâu báo  ', 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. ', 45, 41, 'r1.jpg', 'r3.jpg', 'r8.jpg', 'r7.jpg', 1, 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè.', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng  Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.\r\n\r\n                   ', 'Đồng Thấp                     ', '2/2/2022                     ', 'Over Side', 'Lê Tuấn Kiệt            ', 'Áo Thun ', 50),
('24235353', 3242, 'Áo Xanh Blue Loang  ', 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài ', 44, 38, 'r2.jpg', 'r8.jpg', 'r7.jpg', 'r6.jpg', 1, 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng  Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.\r\n\r\n                    ', 'Việt Nam                   ', '2/11/2023                      ', 'Over site', 'Lê Tuấn Kiệt                     ', 'Áo Thun ', 50),
('23435345', 3242, 'Áo Thun Xám Loang ', 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài', 77, 54, 'r3.jpg', 'r4.jpg', 'r1.jpg', 'r2.jpg', 1, 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng  Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.\r\n\r\n                 ', 'Hà Nội            ', '2/2/2022                  ', '30cm- 70cm                  ', 'Trần Huy Hoàng ', 'Áo Thun', 50),
('234345', 3242, 'Áo Xám Vải Cotton  ', 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài ', 34, 31, 'r4.jpg', 'r3.jpg', 'r7.jpg', 'r6.jpg', 1, 'Áo thun siêu mát. Cực kì thích hợp cho mùa hè. Đi biển là chuẩn bài', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng  Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.\r\n\r\n                  ', 'Việt Nam          ', '2/2/2022                    ', 'XXXL', 'Lê Tuấn Kiệt             ', 'Áo Thun ', 50),
('3436547568', 3242, 'Áo Thun Xanh 3158   ', 'Áo thun mát mẻ. Năng độc trẻ trung. Phù hợp với đi tập thể thao khoe body 6 múi.  ', 44, 29, 'r5.jpg', 'r2.jpg', 'r1.jpg', 'r7.jpg', 1, 'Hàng Quảng Châu chất lượng cao', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng  Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.\r\n\r\n                ', 'Trung Quốc                ', '2/11/2023                   ', '10- 30 cm                    ', 'Lê Tuấn Kiệt  ', 'Áo Thun ', 50),
('47', 3242, 'Áo Thun Nâu  ', 'Áo thun mát mẻ. Năng độc trẻ trung. Phù hợp với đi tập thể thao khoe body 6 múi. ', 345, 232, 'r6.jpg', 'r4.jpg', 'r1.jpg', 'r2.jpg', 1, 'Áo thun mát mẻ. Năng độc trẻ trung. Phù hợp với đi tập thể thao khoe body 6 múi.', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.               ', 'Hà Nội ', '11/2/2023                 ', 'XS    ', 'Lê Tuấn Kiệt ', 'Áo Thun ', 50),
('4543', 3242, 'Áo Xanh Than ', 'Sản phẩm mới', 333, 321, 'r7.jpg', 'r3.jpg', 'r1.jpg', 'r8.jpg', 1, 'không cần nói', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.                 ', 'Việt Nam', '11/2/2023                  ', 'XXL', 'Hà Nội', 'Hoa Hồng Nhập Khẩu                  ', 50),
('666', 32424, 'Áo Phông Nâu Đen   ', 'Áo phông mát mẻ. Năng độc trẻ trung. Phù hợp với đi tập thể thao khoe body 6 múi.  ', 321, 222, 'r8.jpg', 'r3.jpg', 'r1.jpg', 'r7.jpg', 1, 'Hàng xin đẹp. Siêu cấp vip pro', 'Mặc dù lịch sử của bánh cupcake đã có từ rất lâu nhưng Cupcake chỉ thật sử nổi lên như một trào lưu vào thế kỷ XXI. Cupcake thường được sử dụng như một món tráng miệng trong các buổi tiệc tùng hay gặp mặt. Với đặc điểm ngon và bắt mắt, Cupcake hiện đang được ưa chuộng bởi mọi lứa tuổi. Một chiếc bánh tuy nhìn sặc sỡ nhưng cách làm cũng không quá cầu kỳ, nếu có điều kiện bạn nên thử một lần làm chiếc bánh này tại nhà, không gì ngon bằng được thường thức những chiếc Chupcake nhỏ xinh do chính tay mình làm.                 ', 'Quảng Châu  ', '2/11/2023                    ', 'L ->XL        ', 'Lê Tuấn Kiệt  ', 'Áo Phông  ', 47),
('SPVIP', 3242, 'Áo Vip       ', 'Quá đẹp. Quá xuất sắc không có gì để mô tả       ', 100, 99, 'ao-thun-local-brand-dep-mau-den-form-rong-tay-lo-12.webp', 'ao-thun-local-brand-dep-mau-trang-in-hinh-3.webp', 'dosiin-mvr-maverick-ao-thun-dep-form-rong-tay-lo-ao-phong-nam-nu-mua-he-unisex-hinh-ca-voi-vu-tr441368.webp', 'aothunone1.jpg', 1, 'Quá đẹp. Quá xuất sắc không có gì để mô tả', '', 'Việt Nam       ', '29/11/2024       ', 'XXL       ', 'Teik       ', '  Áo ViP     ', 20),
('SPVIP', 3242, 'Áo Vip       ', 'Quá đẹp. Quá xuất sắc không có gì để mô tả       ', 100, 99, 'ao-thun-local-brand-dep-mau-den-form-rong-tay-lo-12.webp', 'ao-thun-local-brand-dep-mau-trang-in-hinh-3.webp', 'dosiin-mvr-maverick-ao-thun-dep-form-rong-tay-lo-ao-phong-nam-nu-mua-he-unisex-hinh-ca-voi-vu-tr441368.webp', 'aothunone1.jpg', 1, 'Quá đẹp. Quá xuất sắc không có gì để mô tả', '', 'Việt Nam       ', '29/11/2024       ', 'XXL       ', 'Teik       ', '  Áo ViP     ', 20),
('TDK', 3242, 'Apple ', 'ádasdsadasd ', 44, 22, 'aothunnau1.jpg', 'aothunnau2.jpg', 'aothunnau3.jpg', 'aothunnau4.jpg', 1, 'ÁO SIÊU XỊN SIÊU ĐẸP NHÌN LÀ MUỐN MUA', '', 'Nhật Bản ', '22/11/2024 ', 'XL->XXL ', 'Kiệt ', '  Áo ViP', 20),
('QVXT', 3242, 'Triệu Vân  ', 'ưqeqweqwe  ', 100, 99, 'aothunone1.jpg', 'aothunone2.jpg', 'aothunone3.jpg', 'aothunone4.jpg', 1, 'no cmt', '', 'Nhật Bản  ', '22/11/2024  ', 'XXL  ', 'Lê Tuấn Kiệt               ', '  Áo ViP ', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_nhom`
--

CREATE TABLE `sanpham_nhom` (
  `id` int(11) NOT NULL,
  `tennhom` varchar(100) NOT NULL,
  `ghichu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham_nhom`
--

INSERT INTO `sanpham_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(3242, 'Áo Thun Vải Mát', '2           '),
(32424, 'Áo Phông Vải 3158', '4234           '),
(232, 'Áo Polo', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT 1,
  `quyen` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `hoten`, `email`, `enable`, `quyen`) VALUES
('hpanpp', 'hp1', 'minhhoan', 'phephehoan@gmail.com', 1, 0),
('minhhoanpp', 'hp1   ', 'nguyenminhhoaneq  ', 'phehoan@gmail.com   ', 1, 0),
('nguyenminhhoan', 'hp1   ', 'mh03   ', 'nguyenminhhoan@gmail.com   ', 1, 1),
('yasuo', 'hp1', 'ys', 'ys@gmail.com', 1, 1),
('ádfas', 'ádf ', 'ádfasdf ', 'dfads@gmail.com ', 1, 0),
('letuankiet', 'kiet2003', 'Lê Tuấn Kiệt', 'kietle2003@gmail.com', 1, 1),
('letuankiet1', '1', 'Lê Tuấn Kiệt', 'hehe@gmail.css', 1, 0),
('HieuDuong', '1', 'Dương Quang Hiếu', 'hieupeo2003@gmail.com', 1, 0),
('huyhoang', 'h1', 'Trần Huy Hoàng', 'hoangbancafe@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
