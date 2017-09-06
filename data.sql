-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2014 at 11:29 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thuocdb`
--


-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE IF NOT EXISTS `baiviet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tomtat` text COLLATE utf8_unicode_ci,
  `noidung` text COLLATE utf8_unicode_ci,
  `anh` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngaysua` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id`, `ten`, `tomtat`, `noidung`, `anh`, `ngaytao`, `ngaysua`) VALUES
(1, 'Tản mạn về cây lá kim', 'Nói đến cây lá kim làm người nghe liên tưởng đến những loài cây có hình dạng lá như những cây kim, trong khuôn khổ bài viết có thể liệt kê một số cây thuộc họ Thông  ( Pinaceae), họ Kim Giao ( Podocarpaceae), họ Bách Tán ( Araucariaceae) và họ Bách ( Cupressaceae), đây là những cây khá thông dụng trồng làm cây cảnh trang trí sân vườn hay chế tác thành các tác phẩm Bonsai.', ' Cây Bách xanh có tên khoa học Calocedrus macrolepis thuộc cây xanh quanh năm phân cành nhánh nhiều, lá xanh đậm, lá dạng vẩy dẹt răn reo xếp áp sát cành, thường có 4 lá ở một vòng cành, đầu lá có mũi nhọn, tán là xòe tròn thành hình tháp nhọn.Cây Bach xanh là cây gỗ lớn nhưng có thể trồng chậu làm cây cảnh.\r\n\r\n Cây Trắc Bá Diệp có tên khoa học là Thuja orientalis, cây có nguồn gốc từ Trung Quốc, Nhật Bản, cây Trắc Bá Diệp thuộc cây gỗ nhỏ, phân cành từ gốc, các nhánh lá xếp theo những mặt phẳng đứng có dạng dẹt.Cây có dáng hình chóp rất đẹp phù hợp để trồng làm cây cảnh ở vườn hay trồng chậu.\r\n\r\n Cây Kim Giao với tên khoa học là Podocarpus  wallichianus, cây mọc vùng núi đá vôi và mọc lẫn với các cây lá rộng ở miền Bắc và miền Trung nước ta, cây Kim giao là cây gỗ trung bình từ 20-25 mét, thân thẳng hình trụ, cành mọc ngang đôi khi rũ xuống, lá hình xoan đầu nhọn gốc lá thuôn đều, gân lá hình cung nổi rõ.Đây là cây gỗ quí dáng đẹp nên trồng làm cây tạo cảnh quang hay trồng trong chậu.\r\n\r\n Cây Bách xanh có tên khoa học Calocedrus macrolepis thuộc cây xanh quanh năm phân cành nhánh nhiều, lá xanh đậm, lá dạng vẩy dẹt răn reo xếp áp sát cành, thường có 4 lá ở một vòng cành, đầu lá có mũi nhọn, tán là xòe tròn thành hình tháp nhọn.Cây Bach xanh là cây gỗ lớn nhưng có thể trồng chậu làm cây cảnh.\r\n\r\n Cây Trắc Bá Diệp có tên khoa học là Thuja orientalis, cây có nguồn gốc từ Trung Quốc, Nhật Bản, cây Trắc Bá Diệp thuộc cây gỗ nhỏ, phân cành từ gốc, các nhánh lá xếp theo những mặt phẳng đứng có dạng dẹt.Cây có dáng hình chóp rất đẹp phù hợp để trồng làm cây cảnh ở vườn hay trồng chậu.\r\n\r\n Cây Kim Giao với tên khoa học là Podocarpus  wallichianus, cây mọc vùng núi đá vôi và mọc lẫn với các cây lá rộng ở miền Bắc và miền Trung nước ta, cây Kim giao là cây gỗ trung bình từ 20-25 mét, thân thẳng hình trụ, cành mọc ngang đôi khi rũ xuống, lá hình xoan đầu nhọn gốc lá thuôn đều, gân lá hình cung nổi rõ.Đây là cây gỗ quí dáng đẹp nên trồng làm cây tạo cảnh quang hay trồng trong chậu.', '14003547ddadf4fab12.95787897.jpg', '2014-12-02 22:29:35', '2014-12-02 22:29:35'),
(2, 'Công dụng tuyệt vời từ trái thanh long đối với sức khỏe', 'Thanh long đang dần trở thành một loại trái cây ưa thích của nhiều người bởi mềm và mát. Đây là loại quả khá rẻ khi vào mùa nhưng có nhiều lợi ích sức khỏe không kém các loại quả đắt tiền', 'Sống trong thời đại bận rộn và nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghiêm trọng với sức khỏe tim mạch. Thanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Trái cây này rất giàu chất béo không bão hòa đơn giúp trái tim được nghỉ ngơi trong tình trạng tốt nhất\r\nSống trong thời đại bận rộn và nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghiêm trọng với sức khỏe tim mạch. Thanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Trái cây này rất giàu chất béo không bão hòa đơn giúp trái tim được nghỉ ngơi trong tình trạng tốt nhất\r\nSống trong thời đại bận rộn và nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghiêm trọng với sức khỏe tim mạch. Thanh long có thể giúp cải thiện sức khỏe tim mạch bằng cách giảm mức cholesterol xấu và bổ sung thêm cholesterol tốt. Trái cây này rất giàu chất béo không bão hòa đơn giúp trái tim được nghỉ ngơi trong tình trạng tốt nhất', '13079547e04158ec3a1.69275774.jpg', '2014-12-03 01:25:25', '0000-00-00 00:00:00'),
(3, 'Công dụng đối với sức khỏe từ trái cà chua ngon lành', 'Cà chua là một loại thực phẩm phổ biến trong số các loại rau củ quả mà chúng ta ăn hàng ngày. Cây cà chua thân tròn, cành rất nhiều, mùa quả chính là mùa đôgn và mùa xuân. Quả cà chua khi chín có màu đỏ tươi chứa rất nhiều Vitamin A', '<p>Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất</p>\r\n', '25611547e04881f5393.08346172.jpg', '2014-12-03 01:27:20', '0000-00-00 00:00:00'),
(4, 'Những thực phẩm cực tốt cho người bị bệnh tiểu đường', 'Cà chua là một loại thực phẩm phổ biến trong số các loại rau củ quả mà chúng ta ăn hàng ngày. Cây cà chua thân tròn, cành rất nhiều, mùa quả chính là mùa đôgn và mùa xuân. Quả cà chua khi chín có màu đỏ tươi chứa rất nhiều Vitamin A', '<p>Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thᶳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất</p>\r\n', '1136547e04e933f829.97852489.jpg', '2014-12-03 01:28:57', '0000-00-00 00:00:00'),
(5, 'Những lý do chúng ta nên ăn xoài thường xuyên', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tác dụng phòng bệnh não và tim; 10% lợi khuẩn; 8% đồng cần cho việc sản xuất các tế bào máu; 8% kali giúp cân bằng lượng natri trong cơ thể và 5% magie.Nhiều nghiên cứu cho thấy các hợp chất chống ôxy hóa trong trái xoài có tác dụng bảo vệ cơ thể, chống lại ung thư ruột kết, ung thư vú, ung thư tuyến tiền liệt và bệnh bạch cầu. Các hợp chất này là isoquercitrin, quercetin, fisetin, astragalin, methylgallat, axit gallic cũng như các enzim khác', '<p>Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất.</p>\r\n\r\n<p>Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt.</p>\r\n\r\n<p>Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch.</p>\r\n\r\n<p>Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất Sống trong thời đại bận rộn v&agrave; nhiều căng thẳng, rất nhiều người gặp phải những vấn đề nghi&ecirc;m trọng với sức khỏe tim mạch. Thanh long c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch bằng c&aacute;ch giảm mức cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt. Tr&aacute;i c&acirc;y n&agrave;y rất gi&agrave;u chất b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đơn gi&uacute;p tr&aacute;i tim được nghỉ ngơi trong t&igrave;nh trạng tốt nhất</p>\r\n', '15830547e0597cc10e0.10174874.jpg', '2014-12-03 01:31:51', '2014-12-04 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `benh`
--

CREATE TABLE IF NOT EXISTS `benh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `benh`
--

INSERT INTO `benh` (`id`, `ten`) VALUES
(1, 'Bệnh Sởi'),
(2, 'Bệnh Gan'),
(3, 'Bệnh Trĩ');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnguoidung` int(11) DEFAULT NULL,
  `idbaiviet` int(11) NOT NULL DEFAULT '0',
  `idcaythuoc` int(11) NOT NULL DEFAULT '0',
  `ngay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idnguoidung`, `idbaiviet`, `idcaythuoc`, `ngay`, `noidung`) VALUES
(6, 7, 5, 0, '12/04/2014 01:47 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(7, 7, 5, 0, '12/04/2014 01:47 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(8, 9, 5, 0, '12/04/2014 01:51 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(9, 7, 5, 0, '12/04/2014 01:51 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(10, 9, 5, 0, '12/04/2014 01:51 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(11, 7, 5, 0, '12/04/2014 01:52 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(12, 9, 5, 0, '12/04/2014 01:52 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(13, 9, 4, 0, '12/04/2014 02:49 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(14, 9, 3, 0, '12/04/2014 02:49 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(15, 9, 2, 0, '12/04/2014 02:49 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(16, 9, 1, 0, '12/04/2014 02:50 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(17, 7, 0, 11, '12/04/2014 02:52 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(18, 7, 0, 10, '12/04/2014 02:52 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(19, 7, 0, 10, '12/04/2014 02:52 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(20, 9, 0, 8, '12/04/2014 02:53 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(21, 7, 0, 2, '12/05/2014 02:04 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry');

-- --------------------------------------------------------

--
-- Table structure for table `caythuoc`
--

CREATE TABLE IF NOT EXISTS `caythuoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhac` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenkhoahoc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ho` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idtacdung` int(11) NOT NULL DEFAULT '0',
  `idbenh` int(11) NOT NULL DEFAULT '0',
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `thuhai` text COLLATE utf8_unicode_ci NOT NULL,
  `thanhphanhoahoc` text COLLATE utf8_unicode_ci,
  `tacdungduocly` text COLLATE utf8_unicode_ci,
  `congdung` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donthuoc` text COLLATE utf8_unicode_ci,
  `ngaytao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngaysua` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `caythuoc`
--

INSERT INTO `caythuoc` (`id`, `ten`, `tenkhac`, `tenkhoahoc`, `anh`, `ho`, `idtacdung`, `idbenh`, `mota`, `thuhai`, `thanhphanhoahoc`, `tacdungduocly`, `congdung`, `donthuoc`, `ngaytao`, `ngaysua`) VALUES
(1, 'Quả kim anh tử', 'Quả kim anh tử', 'Quả kim anh tử', '14973547cb7771fdcf3.60839919.jpg', 'kim anh tử', 17, 2, 'Mặt ngo&agrave;i hơi nhăn nheo, c&oacute; vết của gai đ&atilde; rụng. Đầu tr&ecirc;n mang vết t&iacute;ch của l&aacute; đ&agrave;i, nhị v&agrave; nhụy. Đầu dưới c&ograve;n s&oacute;t lại một đoạn cuống ngắn. C&acirc;y mọc hoang ở v&ugrave;ng n&uacute;i thấp ở c&aacute;c tỉnh như Cao Bằng, Lạng Sơn&hellip; v&agrave; thường được trồng l&agrave;m h&agrave;ng r&agrave;o. Kim anh tử thường được thu h&aacute;i v&agrave;o th&aacute;ng 10 &ndash; 11, khi quả ch&iacute;n tới biến th&agrave;nh m&agrave;u đỏ, phơi kh&ocirc;, loại bỏ gai cứng. Mặt ngo&agrave;i hơi nhăn nheo, c&oacute; vết của gai đ&atilde; rụng. Đầu tr&ecirc;n mang vết t&iacute;ch của l&aacute; đ&agrave;i, nhị v&agrave; nhụy. Đầu dưới c&ograve;n s&oacute;t lại một đoạn cuống ngắn. C&acirc;y mọc hoang ở v&ugrave;ng n&uacute;i thấp ở c&aacute;c tỉnh như Cao Bằng, Lạng Sơn&hellip; v&agrave; thường được trồng l&agrave;m h&agrave;ng r&agrave;o. Kim anh tử thường được thu h&aacute;i v&agrave;o th&aacute;ng 10 &ndash; 11, khi quả ch&iacute;n tới biến th&agrave;nh m&agrave;u đỏ, phơi kh&ocirc;, loại bỏ gai cứng.\r\n', 'Người Tày gọi là mác nam coi. Là loại cây nhỏ mọc thành bụi. Thân cành có gai, lá kép, mép khía răng nhọn, có lá kèm nhỏ. Hoa to, màu trắng, mọc riêng lẻ ở đầu cành. Quả giả (đế hoa), hình trứng, có gai và đài còn lại, khi chín màu vàng nâu. Hạt (quả thật) nhiều, dẹt. Mùa hoa quả: vào tháng 3 – 6; Quả vào tháng 7 – 9. Bộ phận được dùng làm thuốc là quả giả (đế hoa lõm biến thành) bổ dọc, hình bầu dục, dài 2 – 4 cm, rộng 0,3 – 1,2 cm. Mép cắt thường quăn gập lại.', 'Người Tày gọi là mác nam coi. Là loại cây nhỏ mọc thành bụi. Thân cành có gai, lá kép, mép khía răng nhọn, có lá kèm nhỏ. Hoa to, màu trắng, mọc riêng lẻ ở đầu cành. Quả giả (đế hoa), hình trứng, có gai và đài còn lại, khi chín màu vàng nâu. Hạt (quả thật) nhiều, dẹt. Mùa hoa quả: vào tháng 3 – 6; Quả vào tháng 7 – 9. Bộ phận được dùng làm thuốc là quả giả (đế hoa lõm biến thành) bổ dọc, hình bầu dục, dài 2 – 4 cm, rộng 0,3 – 1,2 cm. Mép cắt thường quăn gập lại.', 'Người Tày gọi là mác nam coi. Là loại cây nhỏ mọc thành bụi. Thân cành có gai, lá kép, mép khía răng nhọn, có lá kèm nhỏ. Hoa to, màu trắng, mọc riêng lẻ ở đầu cành. Quả giả (đế hoa), hình trứng, có gai và đài còn lại, khi chín màu vàng nâu. Hạt (quả thật) nhiều, dẹt. Mùa hoa quả: vào tháng 3 – 6; Quả vào tháng 7 – 9. Bộ phận được dùng làm thuốc là quả giả (đế hoa lõm biến thành) bổ dọc, hình bầu dục, dài 2 – 4 cm, rộng 0,3 – 1,2 cm. Mép cắt thường quăn gập lại.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Người Tày gọi là mác nam coi. Là loại cây nhỏ mọc thành bụi. Thân cành có gai, lá kép, mép khía răng nhọn, có lá kèm nhỏ. Hoa to, màu trắng, mọc riêng lẻ ở đầu cành. Quả giả (đế hoa), hình trứng, có gai và đài còn lại, khi chín màu vàng nâu. Hạt (quả thật) nhiều, dẹt. Mùa hoa quả: vào tháng 3 – 6; Quả vào tháng 7 – 9. Bộ phận được dùng làm thuốc là quả giả (đế hoa lõm biến thành) bổ dọc, hình bầu dục, dài 2 – 4 cm, rộng 0,3 – 1,2 cm. Mép cắt thường quăn gập lại.', '2014-12-02 01:46:15', '2014-12-03 02:51:50'),
(2, 'Cây Bướm Bạc', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '21751547de1133bd991.18929142.jpg', 'saponin ', 18, 1, 'Thanh nhiệt, giải biểu, khai uất, ho&agrave; l&yacute;, lương huyết, ti&ecirc;u vi&ecirc;m. Lợi tiểu, chữa ho, hen, gẫy xương, chữa t&ecirc; thấp.Thanh nhiệt, giải biểu, khai uất, ho&agrave; l&yacute;, lương huyết, ti&ecirc;u vi&ecirc;m. Lợi tiểu, chữa ho, hen, gẫy xương, chữa t&ecirc; thấp.Thanh nhiệt, giải biểu, khai uất, ho&agrave; l&yacute;, lương huyết, ti&ecirc;u vi&ecirc;m. Lợi tiểu, chữa ho, hen, gẫy xương, chữa t&ecirc; thấp.Thanh nhiệt, giải biểu, khai uất, ho&agrave; l&yacute;, lương huyết, ti&ecirc;u vi&ecirc;m. Lợi tiểu, chữa ho, hen, gẫy xương, chữa t&ecirc; thấp.\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:56:03', '2014-12-05 19:58:52'),
(3, 'Cây Bối Mẫu', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '3077547de143b75481.16619642.png', 'saponin ', 19, 3, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:56:51', '2014-12-05 19:59:20'),
(4, 'Hạt Đậu Miêu', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '19658547de16ac8f725.46764028.jpg', 'saponin ', 17, 2, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:57:30', '2014-12-03 02:51:11'),
(5, 'Cây Bạch Truật', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '28219547de1855dea27.92378343.jpg', 'saponin ', 18, 1, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:57:57', '2014-12-05 19:59:04'),
(6, 'Nấm Bạch Linh', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '21594547de1cae75c45.41186136.jpg', 'saponin ', 17, 2, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:59:06', '2014-12-03 02:50:49'),
(7, 'Cây Bách Bộ', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '6488547de1f0de5e80.99319245.jpg', 'saponin ', 17, 2, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 22:59:44', '0000-00-00 00:00:00'),
(8, 'Cây Ba Gạc', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '1675547deeb87144a2.20411207.jpg', 'saponin ', 19, 3, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-02 23:54:16', '2014-12-05 19:58:15'),
(9, 'Nhất Chi Hoa', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '19121547e00554f8ce4.21699390.jpg', 'saponin ', 17, 3, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-03 01:07:02', '2014-12-05 19:58:28'),
(10, 'Nha Đam', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '27542547e00c846a867.08886213.jpg', 'saponin ', 17, 2, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Thân Bướm bạc 12g, lá Ngũ tráo 10g, Bạc hà 3g. Ngâm trong nước sôi mà uống.', '2014-12-03 01:11:20', '2014-12-03 02:50:35'),
(11, 'Cây Bông Nổ', 'Bươm bướm, Hoa bướm.', 'Mussaenda pubescens Ait.f., họ Cà phê (Rubiaceae).', '8036547e0126756212.80527500.jpg', 'saponin ', 17, 2, 'C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai C&acirc;y Th&ocirc;ng ba l&aacute; (Pinus kesiya ) thuộc c&acirc;y gỗ lớn cao 30-35 m&eacute;t, th&acirc;n thẳng tr&ograve;n với vỏ d&agrave;y m&agrave;u n&acirc;u sẫm, c&agrave;nh th&ocirc; m&agrave;u n&acirc;u đỏ, l&agrave; xanh thẩm mềm dạng kim d&agrave;i, xếp 3 chiếc l&aacute; trong một bẹ ở đầu c&agrave;nh ngắn.C&acirc;y th&ocirc;ng ba l&aacute; th&iacute;ch hợp nơi kh&iacute; hậu ẩm m&aacute;t v&ugrave;ng n&uacute;i, c&oacute; thể trồng trong chậu hay uốn sửa th&agrave;nh Bonsai\r\n', 'Thân Bướm bạc 30g, dây Kim ngân tươi 60g, Mã đề 30g sắc nước uống', 'saponin (Mussaendosides D, E and H).', 'Thanh nhiệt, giải biểu, khai uất, hoà lý, lương huyết, tiêu viêm. Lợi tiểu, chữa ho, hen, gẫy xương, chữa tê thấp.', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tá', 'Uống mỗi ngày một cốc sinh tố xoài chứa tỷ lệ phần trăm dinh dưỡng như sau: 103 kalo, 75% vitamin C có tác dụng chống ôxy hóa và tăng cường hệ miễn dịch; 24% vitamin A giúp chống oxy hóa và tăng thị lực; 12% vitamin B6 và một số vitamin B khác các tác dụng phòng bệnh não và tim; 10% lợi khuẩn; 8% đồng cần cho việc sản xuất các tế bào máu; 8% kali giúp cân bằng lượng natri trong cơ thể và 5%', '2014-12-03 01:12:54', '2014-12-03 02:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `caythuoc_benh`
--

CREATE TABLE IF NOT EXISTS `caythuoc_benh` (
  `idcaythuoc` int(11) DEFAULT '0',
  `idbenh` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `caythuoc_benh`
--

INSERT INTO `caythuoc_benh` (`idcaythuoc`, `idbenh`) VALUES
(2, 1),
(1, 2),
(2, 2),
(3, 3),
(4, 2),
(5, 1),
(6, 2),
(7, 2),
(8, 3),
(9, 3),
(10, 2),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `caythuoc_tacdung`
--

CREATE TABLE IF NOT EXISTS `caythuoc_tacdung` (
  `idcaythuoc` int(11) DEFAULT '0',
  `idtacdung` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `caythuoc_tacdung`
--

INSERT INTO `caythuoc_tacdung` (`idcaythuoc`, `idtacdung`) VALUES
(2, 18),
(1, 17),
(2, 17),
(3, 19),
(4, 17),
(5, 18),
(6, 17),
(7, 17),
(8, 19),
(9, 17),
(10, 17),
(11, 17);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnguoidung` int(11) DEFAULT NULL,
  `ngaythaydoi` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `noidung` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `idnguoidung`, `ngaythaydoi`, `noidung`) VALUES
(33, 7, '2014-12-01 01:53:16', 'Chỉnh Sửa Thông Tin Thành Viên : "NGuyen thành an"'),
(34, 7, '2014-12-01 01:53:39', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(35, 7, '2014-12-01 01:53:49', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(36, 7, '2014-12-01 01:54:14', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(37, 7, '2014-12-01 01:54:26', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(38, 7, '2014-12-01 02:09:32', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(39, 7, '2014-12-01 02:13:52', 'Chỉnh Sửa Thông Tin Thành Viên : "Lê Vũ Trường An"'),
(40, 9, '2014-12-01 02:14:28', 'Xóa Bản Ghi Thông Tin Cây Thuốc :Cây Dương Xỉ'),
(41, 9, '2014-12-01 02:52:13', 'Chỉnh Sửa Thông Tin Thành Viên : "Nguyễn Minh Đức"'),
(42, 7, '2014-12-02 01:37:53', 'Thêm Mới Thông Tin Tác Dụng : "Chữa bệnh Sởi"'),
(43, 7, '2014-12-02 01:37:58', 'Thêm Mới Thông Tin Tác Dụng : "Chữa bệnh Trĩ"'),
(44, 7, '2014-12-02 01:38:07', 'Thêm Mới Thông Tin Bệnh : "Bệnh Sởi"'),
(45, 7, '2014-12-02 01:38:11', 'Thêm Mới Thông Tin Bệnh : "Bệnh Gan"'),
(46, 7, '2014-12-02 01:38:14', 'Thêm Mới Thông Tin Bệnh : "Bệnh Trĩ"'),
(47, 7, '2014-12-02 01:46:15', 'Thêm Mới Thông Tin Cây Thuốc : "Quả kim anh tử"'),
(48, 7, '2014-12-02 22:29:35', 'Chỉnh Sửa Thông Tin Bài Viết : "Tản mạn về cây lá kim"'),
(49, 7, '2014-12-02 22:56:03', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Bướm Bạc"'),
(50, 7, '2014-12-02 22:56:52', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Bối Mẫu"'),
(51, 7, '2014-12-02 22:57:30', 'Thêm Mới Thông Tin Cây Thuốc : "Hạt Đậu Miêu"'),
(52, 7, '2014-12-02 22:57:57', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Bạch Truật"'),
(53, 7, '2014-12-02 22:59:06', 'Thêm Mới Thông Tin Cây Thuốc : "Nấm Bạch Linh"'),
(54, 7, '2014-12-02 22:59:44', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Bách Bộ"'),
(55, 7, '2014-12-02 23:54:16', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Ba Gạc"'),
(56, 7, '2014-12-03 01:07:03', 'Thêm Mới Thông Tin Cây Thuốc : "Nhất Chi Hoa"'),
(57, 7, '2014-12-03 01:09:25', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Nhất Chi Hoa"'),
(58, 7, '2014-12-03 01:11:21', 'Thêm Mới Thông Tin Cây Thuốc : "Nha Đam"'),
(59, 7, '2014-12-03 01:12:54', 'Thêm Mới Thông Tin Cây Thuốc : "Cây Bông Nổ"'),
(60, 7, '2014-12-03 01:25:25', 'Thêm Mới Bài Viết : "Công dụng tuyệt vời từ trái thanh long đối với sức khỏe"'),
(61, 7, '2014-12-03 01:27:20', 'Thêm Mới Bài Viết : "Công dụng đối với sức khỏe từ trái cà chua ngon lành"'),
(62, 7, '2014-12-03 01:28:57', 'Thêm Mới Bài Viết : "Những thực phẩm cực tốt cho người bị bệnh tiểu đường"'),
(63, 7, '2014-12-03 01:31:51', 'Thêm Mới Bài Viết : "Những lý do chúng ta nên ăn xoài thường xuyên"'),
(64, 7, '2014-12-03 01:50:04', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bướm Bạc"'),
(65, 7, '2014-12-03 02:48:46', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bông Nổ"'),
(66, 7, '2014-12-03 02:49:00', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Nha Đam"'),
(67, 7, '2014-12-03 02:50:35', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Nha Đam"'),
(68, 7, '2014-12-03 02:50:49', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Nấm Bạch Linh"'),
(69, 7, '2014-12-03 02:51:01', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bạch Truật"'),
(70, 7, '2014-12-03 02:51:11', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Hạt Đậu Miêu"'),
(71, 7, '2014-12-03 02:51:28', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bối Mẫu"'),
(72, 7, '2014-12-03 02:51:38', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bướm Bạc"'),
(73, 7, '2014-12-03 02:51:50', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Quả kim anh tử"'),
(74, 7, '2014-12-03 03:48:41', 'Chỉnh Sửa Thông Tin Thành Viên : "Nguyễn Minh Đức"'),
(75, 7, '2014-12-04 15:50:41', 'Chỉnh Sửa Thông Tin Bài Viết : "Những lý do chúng ta nên ăn xoài thường xuyên"'),
(76, 7, '2014-12-04 20:08:51', 'Chỉnh Sửa Thông Tin Thành Viên : "Trường An"'),
(77, 9, '2014-12-04 20:12:19', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(78, 7, '2014-12-05 19:50:16', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(79, 7, '2014-12-05 19:58:07', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Ba Gạc"'),
(80, 7, '2014-12-05 19:58:15', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Ba Gạc"'),
(81, 7, '2014-12-05 19:58:28', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Nhất Chi Hoa"'),
(82, 7, '2014-12-05 19:58:52', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bướm Bạc"'),
(83, 7, '2014-12-05 19:59:04', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bạch Truật"'),
(84, 7, '2014-12-05 19:59:20', 'Chỉnh Sửa Thông Tin Cây Thuốc : "Cây Bối Mẫu"'),
(85, 7, '2014-12-05 20:24:55', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(86, 7, '2014-12-05 20:26:26', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(87, 7, '2014-12-05 20:27:36', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(88, 9, '2014-12-05 20:35:14', 'Thêm Mới Bài Viết : "Tên bài viết"'),
(89, 7, '2014-12-05 20:57:10', 'Chỉnh Sửa Thông Tin Thành Viên : "Linh Hương"'),
(90, 7, '2014-12-06 15:21:40', 'Chỉnh Sửa Thông Tin Thành Viên : "Nguyễn Đức Hiệp"'),
(91, 7, '2014-12-06 16:25:25', 'Xóa Bản Ghi Thông Tin Bình Luận Của :Trường An'),
(92, 7, '2014-12-06 17:27:30', 'Xóa Bản Ghi Thông Tin Bài Viết :Tên bài viết');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noio` text COLLATE utf8_unicode_ci,
  `maquyen` int(11) DEFAULT NULL,
  `trangthai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaydangki` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ghichu` text COLLATE utf8_unicode_ci,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `taikhoan`, `matkhau`, `hoten`, `email`, `noio`, `maquyen`, `trangthai`, `ngaydangki`, `ghichu`, `avatar`) VALUES
(7, 'Line', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Trường An', 'zando.shop@gmail.com', 'Hà Nội', 4, NULL, '2014-12-04 00:00:00', NULL, '2290654805ce3670734.30824644.jpg'),
(9, 'linhhuong', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Linh Hương', 'box.zando@gmail.com', 'Ha nội 2', 3, NULL, '2014-12-03 00:00:00', NULL, '227145481b9b6dab502.19506021.jpg'),
(10, 'vincom', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Nguyễn Đức Hiệp', 'rizwankhan8079@gmail.com', 'Hà Nội', 3, NULL, '2014-12-06 14:19:53', NULL, 'no_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
  `idquyen` int(11) NOT NULL AUTO_INCREMENT,
  `tenquyen` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idquyen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`idquyen`, `tenquyen`) VALUES
(1, 'Khách'),
(2, 'Người Dùng'),
(3, 'Quản Lý'),
(4, 'Quản Trị');

-- --------------------------------------------------------

--
-- Table structure for table `tacdung`
--

CREATE TABLE IF NOT EXISTS `tacdung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tentacdung` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tacdung`
--

INSERT INTO `tacdung` (`id`, `tentacdung`) VALUES
(17, 'chữa bệnh Gan'),
(18, 'Chữa bệnh Sởi'),
(19, 'Chữa bệnh Trĩ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
