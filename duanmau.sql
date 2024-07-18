-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 18, 2024 lúc 04:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL COMMENT '1.thanh toán trực tiếp\r\n2.chuyển khoản\r\n3.thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `receive_name` int(11) DEFAULT NULL,
  `receive_address` int(11) DEFAULT NULL,
  `receive_tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(25, 1, 'LongLV', 'Hà Nội', '0388205794', 'longlvph39851@fpt.edu.vn', 0, '09:59:26am 18/11/2023', 350, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(28, 'Áo đẹp đấy', 1, 75, '11:23:54pm 26/10/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(46, 1, 30, 'ao9.jpg', 'Áo thun UNDER Song Ngư', 350, 1, 350, 23),
(47, 1, 24, 'ao3.jpg', 'Áo thun UNDER Higher (Đen)', 250, 1, 250, 23),
(48, 1, 33, 'aokhoac2.jpg', 'Áo Khoác Sporty A/W 2022', 275, 1, 275, 23),
(49, 1, 75, 'aohoodie8.jpg', 'Áo Hoodie Xanh Bluebaby', 350, 1, 350, 24),
(50, 1, 73, 'aohoodie6.jpg', 'Áo Hoodie BASIC - Đen', 269, 1, 269, 24),
(51, 1, 75, 'aohoodie8.jpg', 'Áo Hoodie Xanh Bluebaby', 350, 1, 350, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(2, 'Quần Dài'),
(4, 'Áo Khoác'),
(6, 'Áo Thun'),
(8, 'Áo Sơ Mi'),
(9, 'Quần Short'),
(10, 'Áo Hoodie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(22, 'Áo thun UNDER Signature (Đen)', 250, 'ao1.jpg', 'THÔNG TIN SẢN PHẨM:\r\n\r\n- Hàng chuẩn thương hiệu UNDER sản xuất, có tem mác chính hãng.\r\n\r\n- Chất liệu: thun cotton 100%, co giãn 2 chiều giữ form, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\nTHÔNG SỐ CHỌN SIZE:\r\n\r\n- Size M: 1m50-1m65 (50-60kg) \r\n\r\n- Size L: 1m65-1m72 (55-65kg) \r\n\r\n- Size XL: 1m72- 1m85 (60-75kg) ', 0, 6),
(23, 'Áo thun UNDER Bạch Dương', 350, 'ao2.jpg', '+ THÔNG TIN SẢN PHẨM\r\n\r\nThương hiệu: UNDER\r\n\r\nMã sản phẩm: UTS015\r\n\r\nChất liệu: 100% Cotton\r\n\r\nMàu sắc: Brown (Nâu)', 0, 6),
(24, 'Áo thun UNDER Higher (Đen)', 250, 'ao3.jpg', 'THÔNG TIN SẢN PHẨM:\r\n\r\n- Hàng chuẩn thương hiệu UNDER sản xuất, có tem mác chính hãng.\r\n\r\n- Chất liệu: thun cotton 100%, co giãn 2 chiều giữ form, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\nTHÔNG SỐ CHỌN SIZE:\r\n\r\n- Size M: 1m50-1m65 (50-60kg) \r\n\r\n- Size L: 1m65-1m72 (55-65kg) \r\n\r\n- Size XL: 1m72- 1m85 (60-75kg) ', 0, 6),
(25, 'Áo thun UNDER Higher (Trắng)', 250, 'ao4.jpg', 'THÔNG TIN SẢN PHẨM:\r\n\r\n- Hàng chuẩn thương hiệu UNDER sản xuất, có tem mác chính hãng.\r\n\r\n- Chất liệu: thun cotton 100%, co giãn 2 chiều giữ form, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\nTHÔNG SỐ CHỌN SIZE:\r\n\r\n- Size M: 1m50-1m65 (50-60kg) \r\n\r\n- Size L: 1m65-1m72 (55-65kg) \r\n\r\n- Size XL: 1m72- 1m85 (60-75kg) ', 0, 6),
(26, 'Áo thun UNDER Thần Nông', 350, 'ao5.jpg', '+ THÔNG TIN SẢN PHẨM\r\n\r\nThương hiệu: UNDER\r\n\r\nMã sản phẩm: UTS022\r\n\r\nChất liệu: 100% Cotton\r\n\r\nMàu sắc: Black (Đen)', 0, 6),
(27, 'Áo thun UNDER Signature (Cream)', 250, 'ao6.jpg', 'THÔNG TIN SẢN PHẨM:\r\n\r\n- Hàng chuẩn thương hiệu UNDER sản xuất, có tem mác chính hãng.\r\n\r\n- Chất liệu: thun cotton 100%, co giãn 2 chiều giữ form, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\nTHÔNG SỐ CHỌN SIZE:\r\n\r\n- Size M: 1m50-1m65 (50-60kg) \r\n\r\n- Size L: 1m65-1m72 (55-65kg) \r\n\r\n- Size XL: 1m72- 1m85 (60-75kg) ', 0, 6),
(28, 'Áo thun UNDER Cự Giải', 350, 'ao7.jpg', '+ THÔNG TIN SẢN PHẨM\r\n\r\nThương hiệu: UNDER\r\n\r\nMã sản phẩm: UTS018\r\n\r\nChất liệu: 100% Cotton\r\n\r\nMàu sắc: Blue (Xanh Dương)', 0, 6),
(29, 'Áo thun UNDER Hà Nội (Trắng)', 199, 'ao8.jpg', 'THÔNG TIN SẢN PHẨM:\r\n\r\n- Hàng chuẩn thương hiệu UNDER sản xuất, có tem mác chính hãng.\r\n\r\n- Chất liệu: thun cotton 100%, co giãn 2 chiều giữ form, vải mềm, vải mịn, thoáng mát, không xù lông.\r\n\r\n- Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n- Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Phù hợp khi mix đồ với nhiều loại.\r\n\r\n- Thiết kế hiện đại, trẻ trung, năng động. Dễ phối đồ.\r\n\r\n\r\n\r\nTHÔNG SỐ CHỌN SIZE:\r\n\r\n- Size M: 1m50-1m65 (50-60kg) \r\n\r\n- Size L: 1m65-1m72 (55-65kg) \r\n\r\n- Size XL: 1m72- 1m85 (60-75kg) ', 0, 6),
(30, 'Áo thun UNDER Song Ngư', 350, 'ao9.jpg', '+ THÔNG TIN SẢN PHẨM\r\n\r\nThương hiệu: UNDER\r\n\r\nMã sản phẩm: UTS026\r\n\r\nChất liệu: 100% Cotton\r\n\r\nMàu sắc: Green (Xanh Lá)', 0, 6),
(32, 'Áo Khoác Signature Windbreaker', 275, 'aokhoac1.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen\r\n\r\n- Thiết kế: Khoá kéo, có mũ, in lụa cao cấp', 0, 4),
(33, 'Áo Khoác Sporty A/W 2022', 275, 'aokhoac2.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen phối trắng, xám nhạt\r\n\r\n- Thiết kế: Khoá kéo, in lụa cao cấp', 0, 4),
(34, 'Áo Khoác Design Studio', 275, 'aokhoac3.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen phối xám\r\n\r\n- Thiết kế: Khoá kéo, in lụa cao cấp', 0, 4),
(35, 'Áo Khoác Active-Jacket', 285, 'aokhoac4.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp cải tiến\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Xám phối đen\r\n\r\n- Thiết kế: In lụa cao cấp', 0, 4),
(36, 'Áo khoác Legacy Line', 285, 'aokhoac5.jpg', 'Thông tin sản phẩm:\r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen\r\n\r\n- Thiết kế: In lụa', 0, 4),
(37, 'Áo Khoác United AK067', 285, 'aokhoac6.jpg', 'Thông tin sản phẩm:\r\n\r\n- Chất liệu: Gió dù\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen\r\n\r\n- Thiết kế: In lụa', 0, 4),
(38, 'Áo Khoác Private Collection', 275, 'aokhoac7.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Đen phối trắng\r\n\r\n- Thiết kế: Khoá kéo, in lụa cao cấp', 0, 4),
(39, 'Áo Khoác Vintage Sport', 275, 'aokhoac8.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Xanh phối trắng\r\n\r\n- Thiết kế: Khoá kéo, in lụa cao cấp', 0, 4),
(40, 'Áo Khoác Collection Jacket', 550, 'aokhoac9.jpg', 'Thông tin sản phẩm: \r\n\r\n- Chất liệu: Gió dù 2 lớp\r\n\r\n- Form: Oversize\r\n\r\n- Màu sắc: Xanh phối kem\r\n\r\n- Thiết kế: Khoá kéo, in lụa cao cấp', 0, 4),
(41, 'Áo sơ mi mango Hàn Quốc', 159, 'aosomi1.jpg', '👉 Chất liệu: chất mago mềm mịn , thoáng mát\r\n\r\n👉 Áo thấm hút mồ hôi tốt\r\n\r\n👉 Form rộng vừa, đứng form áo cực kỳ trẻ trung năng động\r\n\r\n👉 Chất vải dày đẹp, không xù lông, không phai màu\r\n\r\n👉 Đường may cực tỉ mỉ cực đẹp\r\n\r\n👉 Có thể mặc đi làm, đi chơi, đặc biệt đi tiệc sự kiện , cực sang trọng', 0, 8),
(42, 'Áo Sơ Mi Họa Tiết Cò Lã', 179, 'aosomi2.jpg', '* Thông tin sản phẩm:\r\n\r\n- Chất liệu: chất lụa mềm mịn\r\n\r\n- Áo thấm hút mồ hôi tốt\r\n\r\n- Form rộng vừa, đứng form áo cực kỳ trẻ trung năng động\r\n\r\n- Chất vải dày đẹp, không xù lông, không phai màu\r\n\r\n- Đường may cực tỉ mỉ cực đẹp\r\n\r\n- Có thể mặc đi làm, đi chơi, đi tiệc sự kiện', 0, 8),
(43, 'Áo sơ mi hoạ tiết đường phố', 179, 'aosomi3.jpg', '👉 Chất liệu: chất lụa mềm mịn , thoáng mát\r\n\r\n👉 Áo thấm hút mồ hôi tốt\r\n\r\n👉 Form rộng vừa, đứng form áo trẻ trung năng động\r\n\r\n👉 Chất vải dày đẹp, không xù lông, không phai màu\r\n\r\n👉 Đường may cực tỉ mỉ cực đẹp\r\n\r\n👉 Có thể mặc đi làm, đi chơi, đặc biệt đi tiệc sự kiện , cực sang trọng', 0, 8),
(44, 'Áo sơ mi có túi cao cấp', 179, 'aosomi4.jpg', '⏩ Thông tin sản phẩm:\r\n\r\n👉 Chất liệu: vải nhung tăm cao cấp, thấm hút mồ hôi tốt.\r\n\r\n👉 mặc cực thoải mái, ít nhăn\r\n\r\n👉 Chất vải đẹp, không xù lông, không phai màu\r\n\r\n👉 Đường may cực tỉ mỉ cực đẹp, có túi\r\n\r\n👉 Có thể mặc đi chơi, dễ phối đồ, cổ cách điệu cực chất\r\n\r\n👉 Kiểu dáng: Thiết kế theo form rộng vừa,đơn giản , dễ mặc ..Tôn lên được sự trẻ trung năng động cho các bạn nam, kèm vào đó là sự hoạt động thoải mái khi mặc sản phẩm.', 0, 8),
(45, 'Áo sơ mi in họa tiết cao cấp', 189, 'aosomi5.jpg', '* Thông tin sản phẩm:\r\n\r\n- Chất liệu: chất lụa mềm mịn\r\n\r\n- Áo thấm hút mồ hôi tốt\r\n\r\n- Form rộng vừa, đứng form áo cực kỳ trẻ trung năng động\r\n\r\n- Chất vải dày đẹp, không xù lông, không phai màu\r\n\r\n- Đường may cực tỉ mỉ cực đẹp\r\n\r\n- Có thể mặc đi làm, đi chơi, đi tiệc sự kiện', 0, 8),
(46, 'Áo sơ mi nam tay ngắn sang trọng', 159, 'aosomi6.jpg', '⏩ Thông tin sản phẩm:\r\n\r\n👉 Chất liệu: chất mago mềm mịn , thoáng mát\r\n\r\n👉 Áo thấm hút mồ hôi tốt\r\n\r\n👉 Form rộng vừa, đứng form áo cực kỳ trẻ trung năng động\r\n\r\n👉 Chất vải dày đẹp, không xù lông, không phai màu\r\n\r\n👉 Đường may cực tỉ mỉ cực đẹp\r\n\r\n👉 Có thể mặc đi làm, đi chơi, đặc biệt đi tiệc sự kiện , cực sang trọng\r\n\r\n👉 Xuất xứ: VIỆT NAM', 0, 8),
(47, 'Áo sơ mi tay ngắn In họa tiết', 179, 'aosomi7.jpg', 'Thông tin sản phẩm:\r\n\r\nChất liệu: Chất vải kate, thấm hút mồ hôi tốt.\r\n\r\nKiểu dáng: Thiết kế theo form chuẩn, thích hợp phối với quần jean dài, jean short, quần tây dài, tây short để đi tiệc, đi làm công sở, đi chơi, dạo phố...Tôn lên được sự trẻ trung, thanh lịch cho các bạn nam, kèm vào đó là sự hoạt động thoải mái khi mặc sản phẩm.\r\n\r\nXuất xứ: VIỆT NAM.', 0, 8),
(48, 'Áo Sơ Mi Tay Ngắn Cho Mùa Hè', 179, 'aosomi8.jpg', '* Thông tin sản phẩm:\r\n- Chất liệu: chất lụa mềm mịn\r\n- Áo thấm hút mồ hôi tốt\r\n- Form rộng vừa, đứng form áo cực kỳ trẻ trung năng động\r\n- Chất vải dày đẹp, không xù lông, không phai màu\r\n- Đường may cực tỉ mỉ cực đẹp\r\n- Có thể mặc đi làm, đi chơi, đi tiệc sự kiện', 0, 8),
(49, 'Áo sơ mi nam dài tay cao cấp', 199, 'aosomi9.jpg', '⏩ Thông tin sản phẩm:\r\n\r\n👉 Chất liệu: vải nhung tăm cao cấp, thấm hút mồ hôi tốt.\r\n\r\n👉 mặc cực thoải mái, ít nhăn\r\n\r\n👉 Chất vải đẹp, không xù lông, không phai màu\r\n\r\n👉 Đường may cực tỉ mỉ cực đẹp\r\n\r\n👉 Có thể mặc đi chơi, dễ phối đồ, cổ cách điệu cực chất\r\n\r\n👉 Kiểu dáng: Thiết kế theo form rộng vừa,đơn giản , dễ mặc ..Tôn lên được sự trẻ trung năng động cho các bạn nam, kèm vào đó là sự hoạt động thoải mái khi mặc sản phẩm.', 0, 8),
(50, 'Quần Short In Họa Tiết Cổ Điển', 115, 'quanshort1.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và thun\r\n\r\n* Kích thước: XS S M L XL 2XL 3XL', 0, 9),
(51, 'Quần short bóng rổ thoáng mát', 144, 'quanshort2.jpg', '* Quần in 3D mới\r\n\r\n* Chất liệu : Polyester và thun\r\n\r\n* Kích thước: XS S M L XL 2XL 3XL', 0, 9),
(52, 'Quần Short Đường Phố', 144, 'quanshort3.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và spandex\r\n\r\n* Kích thước: XS SML XL 2XL 3XL', 0, 9),
(53, 'Quần Short Thể Thao Đi Biển', 144, 'quanshort4.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và spandex\r\n\r\n* Kích thước: XS SML XL 2XL 3XL', 0, 9),
(54, 'Quần Short Thể Thao', 144, 'quanshort5.jpg', '* Quần in 3D mới\r\n\r\n* Chất liệu : Polyester và thun\r\n\r\n* Kích thước “ XS S M L XL 2XL 3XL', 0, 9),
(55, 'Eric Emanuel EE Quần Short', 115, 'quanshort6.jpg', '* Quần in 3D mới\r\n\r\n* Chất liệu : Polyester và thun\r\n\r\n* Kích thước “ XS S M L XL 2XL 3XL', 0, 9),
(56, 'Mndgms Y2 OG Lưới Ngắn', 144, 'quanshort7.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và spandex\r\n\r\n* Kích thước: XS SML XL 2XL 3XL', 0, 9),
(57, 'Quần Short Kuromi', 144, 'quanshort8.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và thun\r\n\r\n* Kích thước: XS S M L XL 2XL 3XL', 0, 9),
(58, 'Quần Short hoạt hình Tokago', 144, 'quanshort9.jpg', '* Mới: Quần in 3D\r\n\r\n* Chất liệu: Polyester và thun\r\n\r\n* Kích thước: XS S M L XL 2XL 3XL', 0, 9),
(59, 'Quần Basic Pants', 250, 'quandai1.jpg', 'Thông tin sản phẩm Quần Basic Pants JOGGER Unisex Nam Nữ Kaki Ống Rộng Co Giãn:\r\n\r\n\r\n\r\n– Hàng chuẩn JOG sản xuất, tem mác chuẩn chính hãng.\r\n\r\n– Chất liệu: KAKI cao cấp co giãn 4 chiều mặc mát thoải mái\r\n\r\n– Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n– Mặc ở nhà, Mặc đi chơi, Mặc đi học, hoặc khi vận động thể thao. \r\n\r\n- Dễ mix đồ với nhiều loại trang phục áo phông, áo khoác và giày thể thao. \r\n\r\n– Thiết kế hiện đại, trẻ trung, năng động.\r\n\r\n- Form Unisex Cho Cả Nam Và Nữ', 0, 2),
(60, 'Quần Cargo Pants Basic', 252, 'quandai2.jpg', 'Thông tin sản phẩm Quần Cargo Pants Basic JOGGER Nam Kaki Túi Hộp Ống Rộng phong cách đường phố:\r\n\r\n\r\n\r\n– Hàng chuẩn JOGGER sản xuất, tem mác chuẩn chính hãng.\r\n\r\n\r\n\r\n– Chất liệu KAKI cao cấp co giãn 4 chiều mặc mát thoải mái\r\n\r\n\r\n\r\n– Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n\r\n\r\n– Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Dễ mix đồ với nhiều loại trang phục.\r\n\r\n\r\n\r\n– Thiết kế hiện đại, trẻ trung, năng động.', 0, 2),
(61, 'Quần Cargo Pants', 256, 'quandai3.jpg', 'Thông tin sản phẩm Quần Cargo Pants JOG Túi Hộp Nam Chất Kaki Ống Rộng phong cách đường phố:\r\n\r\n– Hàng chuẩn JOG sản xuất, tem mác chuẩn chính hãng.\r\n\r\n– Chất liệu:\r\n\r\n– KAKI cao cấp co giãn 4 chiều mặc mát thoải mái\r\n\r\n– Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n– Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Dễ mix đồ với nhiều loại trang phục.\r\n\r\n– Thiết kế hiện đại, trẻ trung, năng động.', 0, 2),
(62, 'Quần Jogger', 240, 'quandai4.jpg', 'Thông tin sản phẩm Quần JOGGER JOG Nam Kaki 4 Túi Hộp Co Giãn thể thao nam nữ phong cách đường phố:\r\n\r\n– Hàng chuẩn JOG sản xuất, tem mác chuẩn chính hãng.\r\n\r\n– Chất liệu:\r\n\r\n– KAKI cao cấp co giãn 4 chiều mặc mát thoải mái\r\n\r\n– Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n\r\n– Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. Dễ mix đồ với nhiều loại trang phục.\r\n\r\n– Thiết kế hiện đại, trẻ trung, năng động.', 0, 2),
(63, 'Quần Baggy Denim', 195, 'quandai5.jpg', 'Quần Baggy Denim SAIGONESE Quần Jean Dài Ống Suông Form Rộng Unisex Nam Nữ / Xanh Nhạt\r\n\r\nChất liệu: Vải Jean Denim cao cấp\r\n\r\nThiết kế : Quần suông ống rộng lưng thun thoải mái năng động\r\n\r\nKiểu dáng gọn nhẹ, trẻ trung, năng động basic dễ mặc\r\n\r\nPhù hợp nhiều hoàn cảnh: mặc nhà, đi học, đi chơi, du lịch ngoài ra rất là dễ phối đồ cho những bạn mặc theo phong cách freestyle , unisex\r\n\r\n- Đặc điểm: quần dài ống suông có dây rút có thể điều chỉnh độ rút , form quần đứng nên rộng rải thoải mái', 0, 2),
(64, 'Quần cargo pants kem', 256, 'quandai6.jpg', 'Thông tin sản phẩm Quần cargo pants JOG kem kaki túi hộp nam nữ ống rộng phong cách đường phố:\r\n– Hàng chuẩn JOG sản xuất, tem mác chuẩn chính hãng.\r\n– Chất liệu KAKI cao cấp co giãn mặc mát thoải mái\r\n– Đường may chuẩn chỉnh, tỉ mỉ, chắc chắn.\r\n– Mặc ở nhà, mặc đi chơi hoặc khi vận động thể thao. \r\n- Dễ mix đồ với nhiều loại trang phục.\r\n– Thiết kế hiện đại, trẻ trung, năng động.', 0, 2),
(65, 'Quần caro plaid pants', 335, 'quandai7.jpg', '🍓 Bảng SIZE: Quần / Áo form châu Âu rộng rộng nhé các cậu \r\n(Bảng size mang tính chất tham khảo và phù hợp 80-90% sở thích các cậu ạ. Các bạn muốn chọn size phù hợp có thể xem hình feedback các khách đã mua hoặc inbox cho SAIGONESE nhé ^^)\r\n-Size S: dưới 47kg, Cao dưới 1m60 \r\n-Size M: dưới 53kg, Cao dưới 1m60\r\n-Size L: từ 54-63kg , Cao 1m61 - 1m70\r\n-Size XL: từ 64-70kg, Cao : 1m71 trở lên\r\n 🥝 🍓 Ngập tràn mẫu mới 🍓 🥝\r\n 👉 Quần Caro, Quần Plaid Pants', 0, 2),
(66, 'Quần Nhung Tăm Ống Rộng', 440, 'quandai8.jpg', 'Sản Phẩm: Quần Nhung Tăm Ống Rộng SGES Baggy Lưng Thun Unisex Nam Nữ\r\n\r\nChất liệu: Vải Nhung Tăm, mặc thông thoáng, co giãn tốt\r\n\r\nThiết kế : Quần suông ống rộng lưng thun thoải mái năng động\r\n\r\nKiểu dáng gọn nhẹ, trẻ trung, năng động basic dễ mặc\r\n\r\nPhù hợp nhiều hoàn cảnh: mặc nhà, đi học, đi chơi, du lịch ngoài ra rất là dễ phối đồ cho những bạn mặc theo phong cách freestyle , unisex\r\n\r\nXuất xứ: Việt Nam', 0, 2),
(67, 'Quần Dù Ống Rộng', 220, 'quandai9.jpg', 'Quần Dù Ống Rộng SAIGONESE  Parachute Pants Túi Hộp Unisex Nam Nữ\r\n\r\nChất liệu: Vải Dù cao cấp\r\n\r\nThiết kế : Quần Dù Ống Rộng dáng suông lưng thun thoải mái năng động\r\n\r\nKiểu dáng gọn nhẹ, trẻ trung, năng động basic dễ mặc\r\n\r\nPhù hợp nhiều hoàn cảnh: mặc nhà, đi học, đi chơi, du lịch ngoài ra rất là dễ phối đồ cho những bạn mặc theo phong cách freestyle , unisex\r\n\r\n- Đặc điểm:  Parachute Pants Túi Hộp có dây rút có thể điều chỉnh độ rút , form quần đứng nên rộng rải thoải mái', 0, 2),
(68, 'Áo Hoodie BASIC - Mint', 249, 'aohoodie1.jpg', 'Điều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(69, 'Áo Hoodie Local Brand - Hồng', 175, 'aohoodie2.jpg', '✅Bảng size áo Hoodie Vstyle\r\nM : Dài 68 Rộng 64 / 1m40-1m55, 35-50Kg\r\nL : Dài 72 Rộng 65,5 / 1m50 - 1m70, 45-65Kg\r\nXL : Dài 76 Rộng 67 / 1m65 - 1m85, 55-80Kg\r\n( Bảng trên mang tính chất tham khảo, tuỳ vào sở thích mặc vừa/mặc rộng của các bạn )', 0, 10),
(70, 'Áo khoác hoodie ZIP - Trắng', 400, 'aohoodie3.jpg', 'Điều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(71, 'Áo Hoodie BASIC - Xám', 269, 'aohoodie4.jpg', 'Chất liệu: Nỉ bông cotton 100% dày dặn\r\n\r\nĐiều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(72, 'Áo Hoodie BASIC - Nâu', 269, 'aohoodie5.jpg', 'Chất vải: Nỉ Cotton 100% dày dặn\r\n\r\nĐiều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(73, 'Áo Hoodie BASIC - Đen', 269, 'aohoodie6.jpg', 'Chất vải: Nỉ chân cua Cotton 100% dày dặn\r\n\r\nĐiều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(74, 'Áo Hoodie BASIC - Xanh Oliu', 400, 'aohoodie7.jpg', 'Chất vải: Nỉ chân cua Cotton 100% dày dặn\r\n\r\nĐiều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10),
(75, 'Áo Hoodie Xanh Bluebaby', 350, 'aohoodie8.jpg', '✅Bảng size áo Hoodie Vstyle\r\nM : Dài 68 Rộng 64 / 1m40-1m55, 35-50Kg\r\nL : Dài 72 Rộng 65,5 / 1m50 - 1m70, 45-65Kg\r\nXL : Dài 76 Rộng 67 / 1m65 - 1m85, 55-80Kg\r\n( Bảng trên mang tính chất tham khảo, tuỳ vào sở thích mặc vừa/mặc rộng của các bạn )', 0, 10),
(76, 'Áo khoác hoodie ZIP - Cream', 400, 'aohoodie9.jpg', 'Điều đầu tiên bạn sẽ thấy khi cầm vào chiếc áo hoodie UDAS đó chính là lớp vải mềm, mướt tay nhưng dày dặn, độ bắt màu tốt và ít nhăn. Chất liệu ngang hàng với những thương hiệu có tiếng nhưng giá thành không quá đau ví.\r\n\r\nChẳng cần nói quá nhiều vì chúng mình tự tin vào chất liệu nỉ cotton này có thể làm chiều lòng ngay cả những khách hàng khó tính nhất. Và nếu chất liệu áo không giống như mô tả, chúng mình sẵn sàng hoàn trả toàn bộ số tiền mà bạn bỏ ra để trải nghiệm chiếc áo với chất liệu sánh ngang hàng hiệu này.', 0, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'LongLV', 'longlv123', 'longlvph39851@fpt.edu.vn', 'Hà Nội', '0388205794', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
