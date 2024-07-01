-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 10:20 AM
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
-- Database: `dienmayquocanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`, `created_at`, `updated_at`, `email`, `role`) VALUES
(0, 'root', 'root', 'Admin root', '2024-05-16 03:12:39', '2024-05-16 03:12:39', 'duyanhliebedeutschland@gmail.com', 1),
(1, 'duyanh', '$2y$12$B/cR/ETOJbQDqwbyea4Qs.wvHYgFvrsa6C.r.RXHIucZlVdG7kUN6', 'Duy Anh', '2024-05-02 18:28:50', '2024-06-30 00:47:56', 'nguyenduyanh.tit@gmail.com', 1),
(4, 'quocanhadmin', '$2y$12$hK9sYmkZKGMpMgj6ORU.ZumyG83Z6zvZObk73WSXzA/LM9XZ6ut7C', 'Quốc Anh Admin', '2024-05-15 19:46:05', '2024-06-30 03:00:21', 'quocanh2017.ltd@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `content` text NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `meta_description`, `content`, `author_id`, `image_link`, `created_at`, `updated_at`) VALUES
(1, 'Màn hình tivi bị đốm sáng? Nguyên nhân và cách khắc phục', 'Màn hình tivi bị đốm sáng có thể gây khó chịu khi xem truyền hình. Bài viết này chỉ ra nguyên nhân gây ra lỗi này và các cách sửa lỗi tại nhà.', '<h2><strong>Nguy&ecirc;n nh&acirc;n</strong>:</h2>\r\n<p>Đốm s&aacute;ng tr&ecirc;n m&agrave;n h&igrave;nh tivi thường l&agrave; do điểm ảnh chết, l&agrave; những điểm m&agrave;u kh&ocirc;ng thể thay đổi do c&aacute;c b&oacute;ng b&aacute;n dẫn. C&aacute;c nguy&ecirc;n nh&acirc;n bao gồm:</p>\r\n<ol style=\"list-style-type: decimal;\">\r\n<li>\r\n<p><strong>Điểm ảnh chết</strong>: C&aacute;c điểm ảnh tr&ecirc;n m&agrave;n h&igrave;nh tivi bị chết v&agrave; kh&ocirc;ng hoạt động đ&uacute;ng c&aacute;ch.</p>\r\n</li>\r\n<li>\r\n<p><strong>Lỗi transistor điều khiển</strong>: Nếu c&aacute;c đốm s&aacute;ng l&agrave; do lỗi transistor điều khiển, bạn c&oacute; thể cần thay m&agrave;n h&igrave;nh hoặc mua tivi mới.</p>\r\n</li>\r\n</ol>\r\n<div><img style=\"height: auto;\" src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_4223463.jpg\" alt=\"L&agrave;m thế n&agrave;o khi Tivi bị đốm s&aacute;ng?\"></div>\r\n<h2><strong>C&aacute;ch sửa lỗi</strong>:</h2>\r\n<ol style=\"list-style-type: decimal;\">\r\n<li>\r\n<p><strong>Kh&ocirc;i phục c&agrave;i đặt gốc</strong>: Thử kh&ocirc;i phục c&agrave;i đặt gốc của tivi để đưa thiết lập về trạng th&aacute;i ban đầu. C&agrave;i đặt n&agrave;y thường nằm trong phần \"C&agrave;i đặt\". Nếu kh&ocirc;ng t&igrave;m thấy, xem hướng dẫn sử dụng hoặc li&ecirc;n hệ trung t&acirc;m bảo h&agrave;nh để được hỗ trợ.</p>\r\n</li>\r\n<li>\r\n<p><strong>Sử dụng biện ph&aacute;p vật l&yacute;</strong>: Nếu bạn tự tin v&agrave; c&oacute; kiến thức về c&ocirc;ng nghệ, bạn c&oacute; thể thử hai c&aacute;ch sau đ&acirc;y:</p>\r\n<p>a. Sử dụng b&uacute;t v&agrave; khăn mềm: Gấp đ&ocirc;i khăn nhỏ v&agrave; đặt l&ecirc;n c&aacute;c đốm s&aacute;ng, sau đ&oacute; d&ugrave;ng đầu tr&ograve;n của b&uacute;t để nhẹ nh&agrave;ng ấn l&ecirc;n c&aacute;c đốm s&aacute;ng qua lớp khăn. Điều n&agrave;y c&oacute; thể gi&uacute;p loại bỏ c&aacute;c điểm ảnh chết.</p>\r\n<p>b. Xoa nhẹ: Đặt ng&oacute;n tay l&ecirc;n c&aacute;c đốm s&aacute;ng v&agrave; xoa nhẹ cho đến khi c&aacute;c đốm s&aacute;ng biến mất. H&atilde;y thực hiện thao t&aacute;c n&agrave;y nhẹ nh&agrave;ng để tr&aacute;nh l&agrave;m trầy m&agrave;n h&igrave;nh.</p>\r\n</li>\r\n<li>\r\n<p><strong>Sử dụng phần mềm JScreenFix</strong>: Nếu tivi của bạn l&agrave; Smart TV v&agrave; c&oacute; kết nối Internet, bạn c&oacute; thể sử dụng phần mềm JScreenFix. Phần mềm n&agrave;y c&oacute; khả năng loại bỏ c&aacute;c đốm s&aacute;ng tr&ecirc;n m&agrave;n h&igrave;nh.</p>\r\n</li>\r\n</ol>\r\n<div><img style=\"height: auto;\" src=\"https://sony-vietnam.com/hinh-anh/tin-tuc/tin-tuc-1609376988.png\" alt=\"4 C&aacute;ch khắc phục lỗi m&agrave;n h&igrave;nh tivi sony bị đốm s&aacute;ng tại nh&agrave;\"></div>\r\n<h2><strong>Lời kết</strong></h2>\r\n<p>Lưu &yacute; rằng, nếu tất cả c&aacute;c biện ph&aacute;p tr&ecirc;n kh&ocirc;ng th&agrave;nh c&ocirc;ng v&agrave; c&aacute;c đốm s&aacute;ng vẫn tồn tại, bạn n&ecirc;n đưa thiết bị đến trung t&acirc;m bảo h&agrave;nh hoặc c&aacute;c cơ sở sửa chữa uy t&iacute;n để được hỗ trợ v&agrave; khắc phục lỗi m&agrave;n h&igrave;nh tivi.</p>', 1, 'img/article_images/1717856487_tividomsang.jpg', '2024-05-15 21:37:04', '2024-06-08 07:21:27'),
(2, '5 lựa chọn tivi 55 inch đáng tiền nhất tại thời điểm hiện tại', 'Điện Máy Quốc Anh giới thiệu 5 lựa chọn tivi 55 inch đáng tiền nhất tại thời điểm hiện tại. Các bạn đọc cùng tìm hiểu và đặt mua nhé!', '<h1>5 lựa chọn tivi 55 inch đ&aacute;ng tiền nhất tại thời điểm hiện tại</h1>\r\n<div>Điện M&aacute;y Quốc Anh giới thiệu&nbsp;5 lựa chọn tivi 55 inch đ&aacute;ng tiền nhất tại thời điểm hiện tại. C&aacute;c bạn đọc c&ugrave;ng t&igrave;m hiểu v&agrave; đặt mua nh&eacute;!</div>\r\n<h2><strong>5 lựa chọn tivi 55 inch đ&aacute;ng tiền nhất tại thời điểm hiện tại</strong></h2>\r\n<p>Dưới đ&acirc;y l&agrave; danh s&aacute;ch 5 lựa chọn tivi 55 inch đ&aacute;ng tiền nhất tại thời điểm hiện tại:</p>\r\n<h3><a href=\"https://thegioidienmay247.com/products/smart-tivi-samsung-4k-crystal-uhd-55-inch-ua55bu8000\"><strong>#1: Smart Tivi Samsung Crystal UHD 4K 55 inch 55BU8000</strong></a></h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Thiết kế viền mỏng v&agrave; kiểu d&aacute;ng thanh mảnh.</li>\r\n<li>Độ ph&acirc;n giải 4K cho h&igrave;nh ảnh r&otilde; r&agrave;ng v&agrave; ch&acirc;n thực.</li>\r\n<li>C&ocirc;ng nghệ HDR10+ cải thiện tương phản v&agrave; độ s&aacute;ng.</li>\r\n</ul>\r\n<div><img style=\"height: auto;\" src=\"https://product.hstatic.net/200000632093/product/65bu8000_72eb6a3aaae2478ea4c76561fbf7fc85_large.jpg\" alt=\"Smart Tivi Samsung 4K Crystal UHD 55 inch 55BU8000 (UA55BU8000)\"></div>\r\n<h3><a href=\"https://thegioidienmay247.com/products/smart-tivi-samsung-4k-55-inch-ua55au7700\"><strong>#2: Smart Tivi Samsung UHD 4K 55 inch UA55AU7700</strong></a></h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>M&agrave;n h&igrave;nh 55 inch chất lượng 4K.</li>\r\n<li>C&ocirc;ng nghệ PurColor tạo h&igrave;nh ảnh sống động.</li>\r\n<li>Bộ vi xử l&yacute; Crystal Processor 4K tối ưu m&agrave;u sắc v&agrave; h&igrave;nh ảnh.</li>\r\n</ul>\r\n<div><img style=\"height: auto;\" src=\"https://product.hstatic.net/200000632093/product/av.002101_feature_91979_853dd205a9ba4152af505aae68c886af_large.jpg\" alt=\"Smart Tivi Samsung 4K 55 inch 55AU7700 (UA55AU7700)\"></div>\r\n<h3><a href=\"https://thegioidienmay247.com/products/smart-tivi-samsung-4k-55-inch-ua55au7002\">#3:&nbsp;<strong>Smart Tivi Samsung Crystal UHD 4K 55 inch UA55AU7002</strong></a></h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Độ ph&acirc;n giải 4K v&agrave; c&ocirc;ng nghệ HDR10+.</li>\r\n<li>Adaptive Sound tối ưu h&oacute;a &acirc;m thanh.</li>\r\n<li>Hỗ trợ ứng dụng SmartThings để điều khiển tivi bằng điện thoại.</li>\r\n</ul>\r\n<div><img style=\"height: auto;\" src=\"https://product.hstatic.net/200000632093/product/untitled-11_fe1e67798b63433981859482bd4d549b_large.jpeg\" alt=\"Smart Tivi Samsung 4K 55 inch 55AU7002 (UA55AU7002)\"></div>\r\n<h3><a href=\"https://thegioidienmay247.com/products/android-tivi-xiaomi-uhd-4k-55-inch-l55m6-6arg\"><strong>#4: Android Tivi Xiaomi UHD 4K 55 inch L55M6-6ARG</strong></a></h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Thiết kế viền si&ecirc;u mỏng v&agrave; hiển thị 4K Ultra HD.</li>\r\n<li>C&ocirc;ng nghệ Dolby Vision tối ưu h&oacute;a độ s&aacute;ng v&agrave; tương phản.</li>\r\n<li>Hỗ trợ c&ocirc;ng nghệ MEMC cho khung h&igrave;nh mượt m&agrave;.</li>\r\n</ul>\r\n<div><img style=\"height: auto;\" src=\"https://product.hstatic.net/200000632093/product/android-tivi-xiaomi-uhd-4k-55-inch-l55m6-6arg-1_1647f01492ac4a7a91fbdcae38b60dc7_large.jpg\" alt=\"Android Tivi Xiaomi UHD 4K 55 inch L55M6-6ARG\"></div>\r\n<h3><strong>#5:&nbsp;</strong>Smart Tivi LG 4K 55 inch 55UQ9100PSD</h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>M&agrave;n h&igrave;nh lớn 55 inch v&agrave; g&oacute;c xem rộng.</li>\r\n<li>\r\n<p>Độ ph&acirc;n giải 4K Ultra HD, c&ocirc;ng nghệ &nbsp;HDR 10 Pro &amp; HLG</p>\r\n</li>\r\n<li>Kho ứng dụng đồ sộ v&agrave; kết nối kh&ocirc;ng d&acirc;y tiện lợi.</li>\r\n</ul>\r\n<div><img style=\"height: auto;\" src=\"https://product.hstatic.net/200000632093/product/av.002810_feature_112910_32b69260a7ef44949117dbfe74d94376_large.jpg\" alt=\"Smart Tivi LG 4K 55 inch 55UQ9100PSD\"></div>\r\n<p>Những tivi n&agrave;y đều c&oacute; sẵn để bạn tham khảo v&agrave; mua tr&ecirc;n thị trường. T&ugrave;y thuộc v&agrave;o nhu cầu v&agrave; ng&acirc;n s&aacute;ch của bạn, bạn c&oacute; thể lựa chọn một trong số những t&ugrave;y chọn n&agrave;y để c&oacute; trải nghiệm giải tr&iacute; tốt nhất cho gia đ&igrave;nh.</p>', 1, 'img/article_images/1717856243_smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103905.jpg', '2024-05-15 21:43:57', '2024-06-08 07:17:23'),
(4, 'Câu hỏi thường gặp khi mua máy sấy quần áo', 'Điện Máy Quốc Anh giải đáp một vài câu hỏi thường gặp khi mua máy sấy quần áo. Các độc giả cùng tìm hiểu nhé!', '<h2><strong>M&aacute;y Sấy C&oacute; L&agrave;m Quần &Aacute;o Bị Nhăn Kh&ocirc;ng?</strong></h2>\r\n<ul>\r\n<li>Điều n&agrave;y c&oacute; thể phụ thuộc v&agrave;o chế độ sấy v&agrave; loại vải. M&aacute;y sấy quần &aacute;o thường c&oacute; chế độ giảm nhăn để giảm t&igrave;nh trạng quần &aacute;o bị nhăn.</li>\r\n<li>Để tr&aacute;nh t&igrave;nh trạng quần &aacute;o bị nhăn, bạn c&oacute; thể sử dụng chế độ sấy ở nhiệt độ thấp v&agrave; theo d&otilde;i thời gian sấy. Trong trường hợp vải mong v&agrave; dễ nhăn, h&atilde;y d&ugrave;ng 1-2 ống b&oacute;ng tennis hoặc b&oacute;ng sấy gi&agrave;y để l&agrave;m mềm quần &aacute;o v&agrave; giảm nhăn.</li>\r\n</ul>\r\n<div>\r\n<p><img src=\"https://product.hstatic.net/200000632093/product/may-giat-say-panasonic-inverter-9-kg-na-s96fc1lvt1_77ff1ad4964f48f79265338c85ce3747_grande.jpg\"></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<h2><strong>M&aacute;y Sấy Quần &Aacute;o C&oacute; Tốn Điện?</strong></h2>\r\n<ul>\r\n<li>M&aacute;y sấy quần &aacute;o ti&ecirc;u tốn điện năng, nhưng lượng điện sử dụng phụ thuộc v&agrave;o c&ocirc;ng suất của m&aacute;y v&agrave; thời gian sấy. Sử dụng chế độ sấy ở nhiệt độ thấp v&agrave; bỏ v&agrave;o m&aacute;y lượng quần &aacute;o vừa đủ để tiết kiệm điện năng.</li>\r\n<li>M&aacute;y sấy bơm nhiệt (heat pump dryers) thường tiết kiệm điện năng hơn so với m&aacute;y sấy th&ocirc;ng thường.</li>\r\n</ul>\r\n<div><img src=\"https://mediamart.vn/images/uploads/2022/3196e9be-4760-441c-8c0f-b7810ef4f881.png\"></div>\r\n<h2><strong>M&aacute;y Sấy Quần &Aacute;o C&oacute; L&agrave;m Đồ Len Co R&uacute;t Kh&ocirc;ng?</strong></h2>\r\n<ul>\r\n<li>Như bạn đ&atilde; đề cập, đồ len v&agrave; c&aacute;c loại vải nhạy cảm kh&aacute;c c&oacute; thể bị biến dạng hoặc co r&uacute;t khi sấy ở nhiệt độ cao.</li>\r\n<li>Để tr&aacute;nh t&igrave;nh trạng n&agrave;y, h&atilde;y đọc kỹ nh&atilde;n m&aacute;c chăm s&oacute;c sản phẩm tr&ecirc;n quần &aacute;o v&agrave; tu&acirc;n thủ hướng dẫn.</li>\r\n<li>Nếu bạn cần sấy quần &aacute;o len, h&atilde;y sử dụng chế độ sấy ở nhiệt độ thấp v&agrave; ch&uacute; &yacute; đến thời gian sấy để tr&aacute;nh l&agrave;m hỏng sản phẩm.</li>\r\n</ul>\r\n<p>Ngo&agrave;i ra, h&atilde;y đảm bảo vệ sinh m&aacute;y sấy quần &aacute;o đều đặn để duy tr&igrave; hiệu suất tốt nhất v&agrave; tr&aacute;nh t&igrave;nh trạng lắp đầy b&ocirc;ng v&agrave; c&aacute;c chất thải kh&aacute;c trong lưới lọc của m&aacute;y.</p>', 4, 'img/article_images/1717858852_bay-tri-may-giat-cho-ngoi-nha-chat.png', '2024-06-08 08:00:52', '2024-06-08 08:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Chưa gắn nhãn hãng', '2024-05-07 05:42:53', '2024-05-07 05:43:02'),
(1, 'Samsung', '2024-05-04 20:16:28', '2024-05-04 20:16:28'),
(2, 'Sony', '2024-05-04 20:16:41', '2024-05-04 20:16:41'),
(3, 'Mitsubishi', '2024-05-04 20:16:52', '2024-05-04 20:16:52'),
(4, 'LG', '2024-05-04 20:17:03', '2024-05-04 20:17:03'),
(6, 'Aqua', '2024-05-04 20:17:24', '2024-05-04 20:17:24'),
(7, 'Toshiba', '2024-05-04 20:17:36', '2024-05-04 20:17:36'),
(9, 'Hitachi', '2024-05-09 19:00:25', '2024-05-09 19:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_name` varchar(125) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `catalog_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(0, 'Không có danh mục cha', 0, '2024-05-03 23:07:20', '2024-05-03 23:07:20'),
(1, 'Tivi', 0, '2024-05-03 14:34:12', '2024-05-03 15:36:21'),
(2, 'Tủ lạnh', 0, '2024-05-03 14:44:46', '2024-05-03 14:44:46'),
(3, 'Máy giặt', 0, '2024-05-03 14:45:08', '2024-05-03 16:21:20'),
(4, 'Điều hòa', 0, '2024-05-03 14:45:18', '2024-05-03 14:45:18'),
(5, 'Tủ đông', 0, '2024-05-03 14:45:30', '2024-05-03 14:45:30'),
(6, 'Âm thanh', 0, '2024-05-03 14:45:42', '2024-05-03 14:45:42'),
(8, 'Nồi cơm', 13, '2024-05-03 14:46:08', '2024-05-03 16:21:52'),
(9, 'Máy rửa bát', 13, '2024-05-03 14:46:33', '2024-05-10 18:27:03'),
(13, 'Gia dụng', 0, '2024-05-03 16:21:32', '2024-05-03 16:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Chưa xác định thiết kế', '2024-05-07 05:42:02', '2024-05-07 05:42:10'),
(1, 'Inverter', '2024-05-04 21:11:03', '2024-05-04 21:11:03'),
(2, 'Không Inverter', '2024-05-04 21:11:20', '2024-05-04 21:11:20'),
(3, 'Lồng Đứng', '2024-05-04 21:11:30', '2024-05-04 21:11:30'),
(4, 'Lồng Ngang', '2024-05-04 21:11:41', '2024-05-04 21:11:41'),
(5, 'Side by Side', '2024-05-04 21:13:37', '2024-05-04 21:13:37'),
(6, '1 cánh', '2024-05-04 21:13:51', '2024-05-04 21:13:51'),
(7, '2 cánh', '2024-05-04 21:14:02', '2024-05-04 21:14:02'),
(8, '3 cánh', '2024-05-04 21:14:44', '2024-05-04 21:14:44'),
(9, '4 cánh', '2024-05-04 21:14:55', '2024-05-04 21:20:24'),
(12, '4K', '2024-05-13 22:37:18', '2024-05-13 22:37:18'),
(13, '8K', '2024-05-13 22:37:29', '2024-05-13 22:37:29'),
(14, 'Full HD', '2024-05-13 22:37:39', '2024-05-13 22:37:39'),
(17, '1 chiều', '2024-06-08 11:05:40', '2024-06-08 11:05:40'),
(18, '2 chiều', '2024-06-08 11:05:48', '2024-06-08 11:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotline1` varchar(255) DEFAULT NULL,
  `hotline2` varchar(255) DEFAULT NULL,
  `hotline3` varchar(255) DEFAULT NULL,
  `hotline4` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_zalo` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_tiktok` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `hotline1`, `hotline2`, `hotline3`, `hotline4`, `address`, `email`, `link_facebook`, `link_zalo`, `link_instagram`, `link_tiktok`, `created_at`, `updated_at`) VALUES
(1, '090.328.3996', '096.253.8373', '091.304.7388', '033.809.3232', '158 Phan Trọng Tuệ, Thanh Liệt, Thanh Trì, Hà Nội', 'quocanh2017.ltd@gmail.com', 'https://www.facebook.com/QUOCANHCOM', '096.253.8373', 'https://www.instagram.com/thegioidienmay247/', 'https://www.tiktok.com/@thegioidienmay247?_t=8mk7FvtiR62&_r=1', '2024-05-29 02:28:52', '2024-05-28 22:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_link`, `group`, `created_at`, `updated_at`) VALUES
(1, '1716793604_QA.png', 1, '2024-05-16 12:30:39', '2024-05-27 00:06:44'),
(2, '1716798495_slider_image1.jpg', 2, NULL, '2024-05-27 01:28:15'),
(3, '1716798495_slider_image2.png', 2, NULL, '2024-05-27 01:28:15'),
(4, '1716798495_slider_image3.jpg', 2, NULL, '2024-05-27 01:28:15'),
(5, '1716796765_long1.png', 3, NULL, '2024-05-27 00:59:25'),
(6, '1716797274_long2.png', 3, NULL, '2024-05-27 01:07:54'),
(7, '1716797241_long3.png', 3, NULL, '2024-05-27 01:07:21'),
(8, '1716797274_long4.png', 3, NULL, '2024-05-27 01:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_02_042426_create_admin_table', 1),
(7, '2024_05_02_042513_create_catalog_table', 1),
(8, '2024_05_02_042523_create_product_table', 2),
(9, '2024_05_02_042533_create_transaction_table', 3),
(10, '2024_05_02_042544_create_order_table', 3),
(11, '2024_05_03_010324_rename_tables', 4),
(12, '2024_05_03_012747_change_password_length', 5),
(13, '2024_05_03_191106_add_role_and_emails_to_admins', 6),
(15, '2024_05_03_203336_changedefaultparentid', 7),
(16, '2024_05_05_021418_create_brand_table', 8),
(22, '2024_05_05_021439_create_feature_table', 9),
(23, '2024_05_05_021431_create_type_table', 10),
(24, '2024_05_05_023858_edit_products_table', 11),
(25, '2024_05_05_025531_edit_products_table_catalog_id', 12),
(28, '2024_05_05_025904_edit_products_table_catalog_id_column', 13),
(30, '2024_05_16_025758_create_articles_table', 14),
(31, '2024_05_16_120707_create_images_table', 15),
(32, '2024_05_20_132352_rename_image_link_column_in_images_table', 16),
(33, '2024_05_29_022259_create_table_footer', 17),
(34, '2024_06_08_132444_alter_image_link_columns_in_products_table', 18),
(35, '2024_06_11_101039_add_phonenumber_to_users_table', 19),
(36, '2024_06_11_110140_create_policies_table', 20),
(37, '2024_06_11_110657_add_content_to_policies_table', 21),
(38, '2024_06_20_081538_create_carts_table', 22),
(40, '2024_06_20_081545_create_cart_items_table', 23),
(41, '2024_06_21_083428_update_orders_table', 24),
(42, '2024_06_21_084858_create_order_items_table', 25),
(43, '2024_06_21_090823_remove_orders_table', 26),
(44, '2024_06_21_100412_add_status_to_orders_table', 27),
(45, '2024_06_23_090658_add_payment_status_to_orders_table', 28),
(47, '2024_06_26_054858_update_order_items', 29),
(48, '2024_06_30_050843_add_address_to_users_table', 30),
(49, '2024_06_30_051629_add_address_to_users_table', 31),
(50, '2024_06_30_051729_add_address_to_users_table', 31),
(51, '2024_06_30_132211_add_revenue_to_orders_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Chưa giao',
  `payment_status` varchar(255) NOT NULL DEFAULT 'Chưa thanh toán',
  `address` varchar(255) NOT NULL DEFAULT 'Gọi điện cho khách xác nhận địa chỉ',
  `revenue` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_amount`, `created_at`, `updated_at`, `user_id`, `payment_method`, `status`, `payment_status`, `address`, `revenue`) VALUES
(25, 46000000, '2024-06-30 06:27:59', '2024-07-01 00:21:00', 1, 'cod', 'Đã giao', 'Đã thanh toán', 'An Trạch 1, Quốc Tử Giám', 4000000.00),
(26, 15000000, '2024-06-30 06:47:14', '2024-07-01 00:20:41', 1, 'cod', 'Chưa giao', 'Đã thanh toán', 'An Trạch 1, Quốc Tử Giám', 10000000.00),
(27, 10800000, '2024-07-01 01:16:54', '2024-07-01 01:17:05', 2, 'cod', 'Chưa giao', 'Đã thanh toán', '2 Hào Nam, Đống Đa, Hà Nội', 1000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`, `product_name`) VALUES
(38, 25, 1, 46000000.00, '2024-06-30 06:27:59', '2024-06-30 06:27:59', 'Smart Tivi OLED Samsung 4K 65 inch QA65S95CA'),
(39, 26, 1, 15000000.00, '2024-06-30 06:47:14', '2024-06-30 06:47:14', 'Tủ lạnh Hitachi Inverter 464 lít HR4N7520DSWDXVN'),
(40, 27, 1, 6000000.00, '2024-07-01 01:16:54', '2024-07-01 01:16:54', 'Máy giặt Aqua 9kg AQW-S90CT (H2/S)'),
(41, 27, 1, 4800000.00, '2024-07-01 01:16:54', '2024-07-01 01:16:54', 'Máy giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK)');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nguyenduyanh.tit@gmail.com', '$2y$12$BbiPtgb2Yxz0n3lSXF1RT.70VALEO/2Of1mMAAeRik6GFPseR/RJ2', '2024-06-30 02:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `name`, `group`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Chính sách bảo mật', 'secure', '<h2><strong>1. Mục đ&iacute;ch v&agrave; phạm vi thu thập th&ocirc;ng tin</strong></h2>\r\n<p>Điện M&aacute;y Quốc Anh kh&ocirc;ng b&aacute;n, chia sẻ hay trao đổi th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng thu thập tr&ecirc;n trang web cho một b&ecirc;n thứ ba n&agrave;o kh&aacute;c.<br>Th&ocirc;ng tin c&aacute; nh&acirc;n thu thập được sẽ chỉ được sử dụng trong nội bộ c&ocirc;ng ty.<br>Khi bạn li&ecirc;n hệ đăng k&yacute; dịch vụ, th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; Điện M&aacute;y Quốc Anh thu thập bao gồm:</p>\r\n<ul>\r\n<li>Họ v&agrave; t&ecirc;n</li>\r\n<li>Điện thoại</li>\r\n<li>Email</li>\r\n<li>Ngo&agrave;i th&ocirc;ng tin c&aacute; nh&acirc;n l&agrave; c&aacute;c th&ocirc;ng tin về dịch vụ</li>\r\n<li>T&ecirc;n sản phẩm</li>\r\n<li>Số lượng</li>\r\n<li>Thời gian giao nhận sản phẩm</li>\r\n</ul>\r\n<h2><strong>2. Phạm vi sử dụng th&ocirc;ng tin</strong></h2>\r\n<p>Th&ocirc;ng tin c&aacute; nh&acirc;n thu thập được sẽ chỉ được Điện M&aacute;y Quốc Anh sử dụng trong nội bộ c&ocirc;ng ty v&agrave; cho một hoặc tất cả c&aacute;c mục đ&iacute;ch sau đ&acirc;y:<br>&ndash; Hỗ trợ kh&aacute;ch h&agrave;ng<br>&ndash; Cung cấp th&ocirc;ng tin li&ecirc;n quan đến dịch vụ<br>&ndash; Xử l&yacute; đơn đặt h&agrave;ng v&agrave; cung cấp dịch vụ v&agrave; th&ocirc;ng tin qua trang web của ch&uacute;ng t&ocirc;i theo y&ecirc;u cầu của bạn<br>&ndash; Ch&uacute;ng t&ocirc;i c&oacute; thể sẽ gửi th&ocirc;ng tin sản phẩm, dịch vụ mới, th&ocirc;ng tin về c&aacute;c sự kiện sắp tới hoặc th&ocirc;ng tin tuyển dụng nếu qu&yacute; kh&aacute;ch đăng k&iacute; nhận email th&ocirc;ng b&aacute;o.<br>&ndash; Ngo&agrave;i ra, ch&uacute;ng t&ocirc;i sẽ sử dụng th&ocirc;ng tin bạn cung cấp để hỗ trợ quản l&yacute; t&agrave;i khoản kh&aacute;ch h&agrave;ng; x&aacute;c nhận v&agrave; thực hiện c&aacute;c giao dịch t&agrave;i ch&iacute;nh li&ecirc;n quan đến c&aacute;c khoản thanh to&aacute;n trực tuyến của bạn;</p>\r\n<h2><strong>3. Thời gian lưu trữ th&ocirc;ng tin</strong></h2>\r\n<p>Đối với th&ocirc;ng tin c&aacute; nh&acirc;n, Điện M&aacute;y Quốc Anh chỉ x&oacute;a đi dữ liệu n&agrave;y nếu kh&aacute;ch h&agrave;ng c&oacute; y&ecirc;u cầu, kh&aacute;ch h&agrave;ng y&ecirc;u cầu gửi mail về quocanh2017.ltd@gmail.com</p>\r\n<h2><strong>4. Những người hoặc tổ chức c&oacute; thể được tiếp cận với th&ocirc;ng tin c&aacute; nh&acirc;n</strong></h2>\r\n<p>Đối tượng được tiếp cận với th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng thuộc một trong những trường<br>hợp sau:<br>&ndash; C&Ocirc;NG TY TNHH THƯƠNG MẠI DỊCH VỤ ĐẦU TƯ QUỐC ANH<br>&ndash; C&aacute;c đối t&aacute;c c&oacute; k&yacute; hợp động thực hiện 1 phần dịch vụ do C&Ocirc;NG TY TNHH THƯƠNG MẠI DỊCH VỤ ĐẦU TƯ QUỐC ANH. C&aacute;c đối t&aacute;c n&agrave;y sẽ nhận được những th&ocirc;ng tin theo thỏa thuận hợp đồng (c&oacute; thể 1phần hoặc to&agrave;n bộ th&ocirc;ng tin tuy theo điều khoản hợp đồng) để tiến h&agrave;nh hỗ trợ người d&ugrave;ng sử dụng dịch vụ do C&ocirc;ng ty cung cấp.</p>\r\n<h2><strong>5. Địa chỉ của đơn vị thu thập v&agrave; quản l&yacute; th&ocirc;ng tin c&aacute; nh&acirc;n</strong></h2>\r\n<p>C&Ocirc;NG TY TNHH THƯƠNG MẠI DỊCH VỤ ĐẦU TƯ QUỐC ANH<br>Địa chỉ: <strong>Số 158 Đường Phan Trọng Tuệ, Thanh Liệt, Thanh Tr&igrave;, H&agrave; Nội</strong><br>Điện thoại: <a title=\"0962538373\" href=\"tel:0962538373\">0962 538 373</a><br>Email: quocanh2017.ltd@gmail.com</p>\r\n<h2><strong>6. Phương tiện v&agrave; c&ocirc;ng cụ để người d&ugrave;ng tiếp cận v&agrave; chỉnh sửa dữ liệu c&aacute; nh&acirc;n của m&igrave;nh</strong></h2>\r\n<p>Điện M&aacute;y Quốc ANH kh&ocirc;ng thu thập th&ocirc;ng tin kh&aacute;ch h&agrave;ng qua trang web, th&ocirc;ng tin c&aacute; nh&acirc;n kh&aacute;ch h&agrave;ng được thực hiện thu thập qua email li&ecirc;n hệ đặt mua sản phẩm, dịch vụ gửi về hộp mail của ch&uacute;ng t&ocirc;i: quocanh2017.ltd@gmail.com hoặc số điện thoại li&ecirc;n hệ đặt mua sản phẩm gọi về <a title=\"0962538373\" href=\"tel:0962538373\">0962 538 373</a><br>Bạn c&oacute; thể li&ecirc;n hệ địa chỉ email c&ugrave;ng số điện thoại tr&ecirc;n để y&ecirc;u cầu c&ocirc;ng ty chỉnh sửa dữ liệu c&aacute; nh&acirc;n của m&igrave;nh.</p>\r\n<h2><strong>7. Cơ chế tiếp nhận v&agrave; giải quyết khiếu nại của người ti&ecirc;u d&ugrave;ng li&ecirc;n quan đến việc th&ocirc;ng tin c&aacute; nh&acirc;n bị sử dụng sai mục đ&iacute;ch hoặc phạm vi đ&atilde; th&ocirc;ng b&aacute;o.</strong></h2>\r\n<p>Tại Điện M&aacute;y Quốc Anh, việc bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn l&agrave; rất quan trọng, bạn được đảm bảo rằng th&ocirc;ng tin cung cấp cho ch&uacute;ng t&ocirc;i sẽ được bảo mật. C&ocirc;ng ty cam kết kh&ocirc;ng chia sẻ, b&aacute;n hoặc cho thu&ecirc; th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho bất kỳ người n&agrave;o kh&aacute;c. C&ocirc;ng ty cam kết chỉ sử dụng c&aacute;c th&ocirc;ng tin của bạn v&agrave;o c&aacute;c trường hợp sau:<br>&ndash; N&acirc;ng cao chất lượng dịch vụ d&agrave;nh cho kh&aacute;ch h&agrave;ng<br>&ndash; Giải quyết c&aacute;c tranh chấp, khiếu nại<br>&ndash; Khi cơ quan ph&aacute;p luật c&oacute; y&ecirc;u cầu.<br>C&ocirc;ng ty hiểu rằng quyền lợi của bạn trong việc bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n cũng ch&iacute;nh l&agrave; tr&aacute;ch nhiệm của ch&uacute;ng t&ocirc;i n&ecirc;n trong bất kỳ trường hợp c&oacute; thắc mắc, g&oacute;p &yacute; n&agrave;o li&ecirc;n quan đến ch&iacute;nh s&aacute;ch bảo mật của c&ocirc;ng ty, v&agrave; li&ecirc;n quan đến việc th&ocirc;ng tin c&aacute; nh&acirc;n bị sử dụng sai mục đ&iacute;ch hoặc phạm vi đ&atilde; th&ocirc;ng b&aacute;o vui l&ograve;ng li&ecirc;n hệ qua số hotline <a title=\"0962538373\" href=\"tel:0962538373\">0962 538 373</a> hoặc email: quocanh2017.ltd@gmail.com</p>', NULL, '2024-06-11 04:58:30'),
(2, 'Chính sách đổi trả', 'return', '<h2><strong>I. Ch&iacute;nh s&aacute;ch đổi trả:</strong></h2>\r\n<h3><strong>1. Sản phẩm bị lỗi&nbsp;</strong><strong>(do nh&agrave; sản xuất)</strong></h3>\r\n<p>1 đổi 1 trong 7 ng&agrave;y (c&ugrave;ng model, c&ugrave;ng m&agrave;u,..)</p>\r\n<p>Trường hợp sản phẩm đổi hết h&agrave;ng:</p>\r\n<p>a/ Kh&aacute;ch h&agrave;ng được đổi sản phẩm tương đương c&ugrave;ng &nbsp;nh&oacute;m &nbsp;h&agrave;ng (c&oacute; gi&aacute; trị &gt; 50% gi&aacute; trị của sản phẩm lỗi, b&ugrave; hoặc ho&agrave;n tiền phần ch&ecirc;nh lệch nếu c&oacute;).&nbsp;</p>\r\n<p>b/ Nếu kh&aacute;ch kh&ocirc;ng lấy sản phẩm , kh&aacute;ch h&agrave;ng được ho&agrave;n lại 80% tr&ecirc;n gi&aacute; tr&ecirc;n h&oacute;a &nbsp;đơn</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>2. Sản phẩm kh&ocirc;ng lỗi</strong></h3>\r\n<p>KH&Ocirc;NG ĐỔI TRẢ</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>3. C&aacute;c trường hợp lỗi kh&aacute;c</strong></h3>\r\n<ul>\r\n<li>Sản phẩm lỗi do người sử dụng</li>\r\n<li>Sản Phẩm c&ograve;n nguy&ecirc;n vẹn kh&ocirc;ng th&aacute;o lắp, sửa chữa.</li>\r\n<li>Kh&ocirc;ng đủ điều kiện bảo h&agrave;nh theo qui định của h&atilde;ng.</li>\r\n<li>M&aacute;y kh&ocirc;ng giữ nguy&ecirc;n 100% h&igrave;nh dạng ban đầu.</li>\r\n<li>Sản phẩm bị đứt d&acirc;y điện.</li>\r\n</ul>\r\n<p>=&gt;&nbsp;Kh&ocirc;ng &aacute;p dụng bảo h&agrave;nh, đổi trả. C&ocirc;ng Ty sẽ&nbsp;hỗ trợ chuyển bảo h&agrave;nh t&iacute;nh ph&iacute;.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>II. Điều kiện đổi trả:</strong></h2>\r\n<ul>\r\n<li>​SP bắt buộc phải c&ograve;n đầy đủ hộp, phiếu bảo h&agrave;nh (nếu c&oacute;), phụ kiện đi k&egrave;m (nếu c&oacute;, c&ograve;n sử dụng được), qu&agrave; khuyến m&atilde;i (nếu c&oacute;).</li>\r\n<li>Trường hợp thiếu c&aacute;c điều kiện tr&ecirc;n:&nbsp;<strong>C&ocirc;ng Ty sẽ kh&ocirc;ng hỗ trợ đổi trả.</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2><strong>​III. Bảo h&agrave;nh:&nbsp;</strong></h2>\r\n<p>Theo đ&uacute;ng quy định v&agrave; điều kiện bảo h&agrave;nh của nh&agrave; sản xuất.</p>', NULL, '2024-06-11 04:58:11'),
(3, 'Điều khoản dịch vụ', 'service', '<p><span class=\"wysiwyg-font-size-medium\"><strong>1. Giới thiệu</strong></span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Ch&agrave;o mừng qu&yacute; kh&aacute;ch h&agrave;ng đến với website ch&uacute;ng t&ocirc;i.</span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Khi qu&yacute; kh&aacute;ch h&agrave;ng truy cập v&agrave;o trang website của ch&uacute;ng t&ocirc;i c&oacute; nghĩa l&agrave; qu&yacute; kh&aacute;ch đồng &yacute; với c&aacute;c điều khoản n&agrave;y. Trang web c&oacute; quyền thay đổi, chỉnh sửa, th&ecirc;m hoặc lược bỏ bất kỳ phần n&agrave;o trong Điều khoản mua b&aacute;n h&agrave;ng h&oacute;a n&agrave;y, v&agrave;o bất cứ l&uacute;c n&agrave;o. C&aacute;c thay đổi c&oacute; hiệu lực ngay khi được đăng tr&ecirc;n trang web m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o trước. V&agrave; khi qu&yacute; kh&aacute;ch tiếp tục sử dụng trang web, sau khi c&aacute;c thay đổi về Điều khoản n&agrave;y được đăng tải, c&oacute; nghĩa l&agrave; qu&yacute; kh&aacute;ch chấp nhận với những thay đổi đ&oacute;.</span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Qu&yacute; kh&aacute;ch h&agrave;ng vui l&ograve;ng kiểm tra thường xuy&ecirc;n để cập nhật những thay đổi của ch&uacute;ng t&ocirc;i.</span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\"><strong>2. Hướng dẫn sử dụng website</strong></span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Khi v&agrave;o web của ch&uacute;ng t&ocirc;i, kh&aacute;ch h&agrave;ng phải đảm bảo đủ 18 tuổi, hoặc truy cập dưới sự gi&aacute;m s&aacute;t của cha mẹ hay người gi&aacute;m hộ hợp ph&aacute;p. Kh&aacute;ch h&agrave;ng đảm bảo c&oacute; đầy đủ h&agrave;nh vi d&acirc;n sự để thực hiện c&aacute;c giao dịch mua b&aacute;n h&agrave;ng h&oacute;a theo quy định hiện h&agrave;nh của ph&aacute;p luật Việt Nam.</span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Trong suốt qu&aacute; tr&igrave;nh đăng k&yacute;, qu&yacute; kh&aacute;ch đồng &yacute; nhận email quảng c&aacute;o từ website. Nếu kh&ocirc;ng muốn tiếp tục nhận mail, qu&yacute; kh&aacute;ch c&oacute; thể từ chối bằng c&aacute;ch nhấp v&agrave;o đường link ở dưới c&ugrave;ng trong mọi email quảng c&aacute;o.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span class=\"wysiwyg-font-size-medium\"><strong>3. Thanh to&aacute;n an to&agrave;n v&agrave; tiện lợi</strong></span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\">Người mua c&oacute; thể tham khảo c&aacute;c phương thức thanh to&aacute;n sau đ&acirc;y v&agrave; lựa chọn &aacute;p dụng phương thức ph&ugrave; hợp:</span></p>\r\n<p><span class=\"wysiwyg-font-size-medium\"><strong><u>C&aacute;ch 1</u></strong>: Thanh to&aacute;n trực tiếp (người mua nhận h&agrave;ng tại địa chỉ người b&aacute;n)</span><br><span class=\"wysiwyg-font-size-medium\"><strong><u>C&aacute;ch 2</u></strong><strong>:</strong>&nbsp;Thanh to&aacute;n sau (COD &ndash; giao h&agrave;ng v&agrave; thu tiền tận nơi)</span><br><span class=\"wysiwyg-font-size-medium\"><strong><u>C&aacute;ch 3</u></strong><strong>:</strong>&nbsp;Thanh to&aacute;n online qua thẻ t&iacute;n dụng, chuyển khoản</span></p>', NULL, '2024-06-11 04:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `model` varchar(125) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `old_price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `content` text NOT NULL,
  `specifications` text NOT NULL,
  `image_link` text NOT NULL,
  `image_list` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `import_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catalog_id`, `type_id`, `feature_id`, `brand_id`, `name`, `model`, `price`, `old_price`, `quantity`, `content`, `specifications`, `image_link`, `image_list`, `created_at`, `updated_at`, `import_price`) VALUES
(2, 1, 3, 12, 1, 'Smart Tivi OLED Samsung 4K 65 inch QA65S95CA', 'QA65S95CA', 46000000, 55000000, 9, '<p><strong><em>Smart Tivi OLED Samsung 4K 65 inch QA65S95CA&nbsp;với sức mạnh của bộ xử l&yacute; Neural Quantum 4K AI 20 nơ-ron t&aacute;i hiện h&igrave;nh ảnh chất lượng 4K sắc n&eacute;t, c&ocirc;ng nghệ OLED,&nbsp;Quantum Dot&nbsp;tạo n&ecirc;n h&igrave;nh ảnh với sắc m&agrave;u sống động, chứng nhận m&agrave;u sắc nguy&ecirc;n bản&nbsp;PANTONE,&nbsp;c&ocirc;ng nghệ Dolby Atmos cho trải nghiệm &acirc;m thanh đa chiều cuốn h&uacute;t.&nbsp;</em></strong></p>\n<h3>Tổng quan thiết kế</h3>\n<p>-&nbsp;Tivi Samsung&nbsp;c&oacute; thiết kế thanh mảnh, m&agrave;n h&igrave;nh mỏng tinh tế, to&aacute;t l&ecirc;n n&eacute;t sang trọng từ mọi g&oacute;c nh&igrave;n, rất th&iacute;ch hợp để bố tr&iacute; trong kh&ocirc;ng gian sống của gia đ&igrave;nh, c&ocirc;ng ty.&nbsp;</p>\n<p>- Với&nbsp;m&agrave;n h&igrave;nh 65 inch, bạn c&oacute; thể đặt sắp đặt kiểu để b&agrave;n hoặc treo tường trong những gian ph&ograve;ng c&oacute; diện t&iacute;ch rộng.&nbsp;<strong>Ch&acirc;n đế chữ L chất liệu kim loại rắn chắc</strong>, n&acirc;ng đỡ&nbsp;tivi&nbsp;vững v&agrave;ng tr&ecirc;n kệ tivi, kệ s&aacute;ch.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304253/smart-tivi-oled-samsung-4k-77-inch-qa77s95ca-220323-093752.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304253/smart-tivi-oled-samsung-4k-77-inch-qa77s95ca-220323-093752.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 77 inch QA77S95CA - Tổng quan thiết kế\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304253/smart-tivi-oled-samsung-4k-77-inch-qa77s95ca-220323-093752.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Tổng quan thiết kế\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304253/smart-tivi-oled-samsung-4k-77-inch-qa77s95ca-220323-093752.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>C&ocirc;ng nghệ h&igrave;nh ảnh</h3>\n<p>- Độ ph&acirc;n giải&nbsp;4K&nbsp;với 8 triệu điểm ảnh t&aacute;i hiện h&igrave;nh ảnh chi tiết, sắc n&eacute;t.&nbsp;</p>\n<p>- C&ocirc;ng nghệ&nbsp;<strong>m&agrave;n h&igrave;nh OLED</strong>&nbsp;với c&aacute;c điểm ảnh tự ph&aacute;t s&aacute;ng từ Quantum Dot t&aacute;i tạo n&ecirc;n sắc m&agrave;u phong ph&uacute;, sắc tối s&acirc;u hơn, sắc s&aacute;ng thuần khiết hơn.</p>\n<p>Xem th&ecirc;m:&nbsp;Tivi OLED l&agrave; g&igrave;? Sự kh&aacute;c biệt giữa tivi OLED với tivi LED, tivi QLED v&agrave; tivi 4K</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103852.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103852.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - C&ocirc;ng nghệ h&igrave;nh ảnh\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103852.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - C&ocirc;ng nghệ h&igrave;nh ảnh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103852.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;Bộ xử l&yacute;&nbsp;<strong>Neural Quantum 4K</strong>&nbsp;kết hợp tr&iacute; tuệ nh&acirc;n tạo AI v&agrave; 20 hệ thống đa nơ-ron m&ocirc; phỏng thần kinh n&acirc;ng cao chất lượng khung h&igrave;nh l&ecirc;n chuẩn 4K để bạn được tận hưởng trải nghiệm h&igrave;nh ảnh sống động đ&aacute;ng kinh ngạc từng ph&uacute;t gi&acirc;y.&nbsp;</p>\n<p>-&nbsp;C&ocirc;ng nghệ&nbsp;<strong>Real Depth Enhancer</strong>&nbsp;tăng chi tiết, n&acirc;ng cấp h&igrave;nh ảnh 3D bằng mạng thần kinh mạnh mẽ cho cảm thấy như bạn đang chi&ecirc;m ngưỡng khung cảnh ấy bằng mắt thường.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103900.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103900.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - C&ocirc;ng nghệ Real Depth Enhancer\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103900.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - C&ocirc;ng nghệ Real Depth Enhancer\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103900.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;<strong>Chứng nhận PANTONE</strong>&nbsp;cho bạn tận hưởng m&agrave;u sắc t&aacute;i tạo ch&iacute;nh x&aacute;c, trung thực chỉ tr&ecirc;n m&agrave;n h&igrave;nh&nbsp;Smart tivi Samsung&nbsp;QA65S95CA.</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103905.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103905.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Chứng nhận PANTONE\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103905.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Chứng nhận PANTONE\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103905.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;<strong>Quantum HDR OLED</strong>&nbsp;từng điểm ảnh pixel được tối ưu, cải thiện hiển thị c&aacute;c điểm s&aacute;ng, tối cho chất lượng h&igrave;nh ảnh ho&agrave;nh tr&aacute;ng đ&aacute;ng kinh ngạc.</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103914.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103914.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Quantum HDR OLED+\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103914.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Quantum HDR OLED+\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103914.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;<strong>Motion Xcelerator Pro</strong>&nbsp;th&ecirc;m khung h&igrave;nh v&agrave;o nội dung ban đầu tự động, tăng tần số qu&eacute;t từ 120 Hz đến 144 Hz để những cảnh chuyển động trở n&ecirc;n r&otilde; r&agrave;ng, uyển chuyển, kh&ocirc;ng bị mờ nh&ograve;e.&nbsp;</p>\n<p>Xem th&ecirc;m c&aacute;c c&ocirc;ng nghệ h&igrave;nh ảnh kh&aacute;c tr&ecirc;n&nbsp;Samsung QA65S95CA th&ocirc;ng số kỹ thuật.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103902.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103902.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Motion Xcelerator Turbo Pro\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103902.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Motion Xcelerator Turbo Pro\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103902.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>C&ocirc;ng nghệ &acirc;m thanh</h3>\n<p>- Tổng c&ocirc;ng suất loa&nbsp;<strong>70W</strong>, hệ thống&nbsp;<strong>4.2.2 k&ecirc;nh&nbsp;</strong>cho chất &acirc;m to r&otilde;, l&ocirc;i cuốn.&nbsp;</p>\n<p>- C&ocirc;ng nghệ&nbsp;Dolby Atmos&nbsp;với d&agrave;n loa đ&aacute;nh trần vật l&yacute; đem đến &acirc;m thanh đa chiều lan tỏa rộng, cho bạn đắm ch&igrave;m v&agrave;o chương tr&igrave;nh thể thao như bạn đang c&oacute; mặt tr&ecirc;n kh&aacute;n đ&agrave;i xem trực tiếp.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103910.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103910.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Dolby Atmos\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103910.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Dolby Atmos\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103910.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;OTS+&nbsp;với 6 loa vệ tinh v&agrave; 2 loa sub chuy&ecirc;n xử l&yacute; &acirc;m bass gi&uacute;p tạo ra &acirc;m thanh 3D nhận biết sự chuyển động của h&igrave;nh ảnh tr&ecirc;n m&agrave;n h&igrave;nh, tăng trải nghiệm &acirc;m thanh của bạn.&nbsp;</p>\n<p>-&nbsp;AVA&nbsp;khuếch đại giọng thoại khi m&ocirc;i trường xung quanh ồn &agrave;o để bạn kh&ocirc;ng bỏ lỡ th&ocirc;ng tin n&agrave;o được c&aacute;c MC trong chương tr&igrave;nh truyền h&igrave;nh, nh&acirc;n vật trong phim chia sẻ.&nbsp;</p>\n<p>-&nbsp;<strong>Adaptive Sound+</strong>&nbsp;điều chỉnh &acirc;m thanh ph&ugrave; hợp với từng thể loại nội dung một c&aacute;ch tự động để bạn cảm nhận được sự ch&acirc;n thật khi thưởng thức.</p>\n<p>- C&ocirc;ng nghệ&nbsp;Q-Symphony&nbsp;tối ưu c&ocirc;ng suất loa kiến tạo kh&ocirc;ng gian &acirc;m thanh b&ugrave;ng nổ, cho bữa tiệc th&ecirc;m tưng bừng, s&ocirc;i động khi li&ecirc;n kết loa thanh với hệ thống loa tivi.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103907.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103907.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Q-Symphony\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103907.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Q-Symphony\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103907.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>Hệ điều h&agrave;nh</h3>\n<p>-&nbsp;Giao diện của hệ điều h&agrave;nh&nbsp;<strong>Tizen&trade;</strong>&nbsp;được thiết kế tối ưu gi&uacute;p người d&ugrave;ng l&agrave;m quen v&agrave; thao t&aacute;c nhanh ch&oacute;ng, truy cập v&agrave;o c&aacute;c nội dung m&igrave;nh quan t&acirc;m trong thời gian ngắn. T&iacute;ch hợp thư viện ứng dụng phong ph&uacute; phục vụ tốt cho nhu cầu giải tr&iacute;, học tập của mọi th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh.&nbsp;</p>\n<p>Xem th&ecirc;m:&nbsp;C&aacute;ch xem phim bằng tr&igrave;nh duyệt web tr&ecirc;n tivi&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103854.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103854.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Hệ điều h&agrave;nh\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103854.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Hệ điều h&agrave;nh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103854.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>Tiện &iacute;ch</h3>\n<p>-&nbsp;Google Duo&nbsp;(mua th&ecirc;m camera) gi&uacute;p bạn tương t&aacute;c, tr&ograve; chuyện th&acirc;n mật với bạn b&egrave;, người th&acirc;n th&ocirc;ng qua m&agrave;n h&igrave;nh tivi dễ d&agrave;ng.&nbsp;</p>\n<p>- Việc t&igrave;m kiếm, điều khiển&nbsp;tivi Samsung&nbsp;linh hoạt hơn khi bạn c&oacute; thể trực tiếp sử dụng giọng n&oacute;i của m&igrave;nh để thao t&aacute;c nhờ hỗ trợ của trợ l&yacute; ảo&nbsp;<strong>Bixby</strong>&nbsp;(c&oacute; tiếng Việt).</p>\n<p>- Ứng dụng&nbsp;SmartThings&nbsp;l&agrave; c&ocirc;ng cụ tiện &iacute;ch để bạn điều khiển, gi&aacute;m s&aacute;t v&agrave; quản l&yacute; những thiết bị điện tử trong hệ sinh th&aacute;i của ng&ocirc;i nh&agrave; m&igrave;nh đơn giản, tiết kiệm thời gian.&nbsp;</p>\n<p>- T&iacute;nh năng&nbsp;AirPlay 2&nbsp;(iPhone),&nbsp;<strong>Screen Mirroring</strong>&nbsp;(Android) v&agrave;&nbsp;Tap View&nbsp;cho bạn tr&igrave;nh chiếu được c&aacute;c album ảnh, t&agrave;i liệu, video từ điện thoại của m&igrave;nh l&ecirc;n tivi dễ d&agrave;ng, gi&uacute;p c&ocirc;ng việc, c&aacute;c hoạt động giải tr&iacute; diễn ra thuận lợi, trơn tru hơn.&nbsp;</p>\n<p>- Xem đồng thời c&aacute;c nội dung được chia sẻ từ nhiều nguồn kh&aacute;c nhau ngay tr&ecirc;n m&agrave;n h&igrave;nh tivi dễ d&agrave;ng c&ugrave;ng t&iacute;nh năng&nbsp;<strong>Multi View</strong>.</p>\n<p>Xem th&ecirc;m:&nbsp;C&aacute;ch sử dụng t&iacute;nh năng Multi View tr&ecirc;n tivi Samsung</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103857.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103857.jpg\"><img title=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Tiện &iacute;ch\" src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103857.jpg\" alt=\"Smart Tivi OLED Samsung 4K 65 inch QA65S95CA - Tiện &iacute;ch\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/304254/smart-tivi-oled-samsung-4k-65-inch-qa65s95ca-220323-103857.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p><em>Với th&agrave;nh c&ocirc;ng từ sản phẩm Smart Tivi OLED Samsung 4K 65 inch QA65S95B được ra mắt năm 2022, Samsung ra mắt phi&ecirc;n bản năm 2023</em><em>&nbsp;Smart Tivi&nbsp;OLED Samsung 4K 65 inch QA65S95CA&nbsp;l&agrave; lựa chọn tuyệt vời cho những ai đang t&igrave;m kiếm mẫu tivi OLED gi&uacute;p t&ocirc;n l&ecirc;n mắt thẩm mỹ thời thượng của gia chủ, bởi n&oacute; sở hữu vẻ ngo&agrave;i cao cấp, t&aacute;i tạo h&igrave;nh ảnh 4K sắc n&eacute;t, &acirc;m thanh đa chiều sống động nhờ c&oacute;&nbsp;bộ xử l&yacute;&nbsp;Neural Quantum 4K AI, c&ocirc;ng nghệ OLED,&nbsp;Real Depth Enhancer,&nbsp;Dolby Atmos, OTS+,... B&ecirc;n cạnh đ&oacute; c&ograve;n t&iacute;ch hợp hệ điều h&agrave;nh&nbsp;Tizen&trade;&nbsp;v&agrave; nhiều t&iacute;nh năng tiện &iacute;ch gi&uacute;p n&acirc;ng tầm trải nghiệm của bạn.</em></p>\n<p>Xem th&ecirc;m :&nbsp;Hướng dẫn d&ograve; k&ecirc;nh tr&ecirc;n Smart TV Samsung</p>', '<table data-cke-table-faked-selection-table=\"\">\n<tbody>\n<tr>\n<td>Model:</td>\n<td>QA65S95CAKXXV</td>\n</tr>\n<tr>\n<td>M&agrave;u sắc:</td>\n<td>Đen</td>\n</tr>\n<tr>\n<td>Nh&agrave; sản xuất:</td>\n<td>Samsung</td>\n</tr>\n<tr>\n<td>Xuất xứ:</td>\n<td>Việt Nam</td>\n</tr>\n<tr>\n<td>Năm ra mắt :</td>\n<td>2023</td>\n</tr>\n<tr>\n<td>Thời gian bảo h&agrave;nh:</td>\n<td>24 Th&aacute;ng</td>\n</tr>\n<tr>\n<td>Địa điểm bảo h&agrave;nh:</td>\n<td>Ch&iacute;nh H&atilde;ng</td>\n</tr>\n<tr>\n<td>Loại Tivi:</td>\n<td>Smart Tivi OLED</td>\n</tr>\n<tr>\n<td>K&iacute;ch thước m&agrave;n h&igrave;nh:</td>\n<td>65 inch</td>\n</tr>\n<tr>\n<td>Độ ph&acirc;n giải:</td>\n<td>4K (UHD)</td>\n</tr>\n<tr>\n<td>Tần số qu&eacute;t:</td>\n<td>144 Hz</td>\n</tr>\n<tr>\n<td>Bộ vi xử l&iacute;:</td>\n<td>Neural Quantum 4K</td>\n</tr>\n<tr>\n<td>Smart Tivi:</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Tivi 3D:</td>\n<td>Kh&ocirc;ng</td>\n</tr>\n<tr>\n<td>Tivi m&agrave;n h&igrave;nh cong:</td>\n<td>Kh&ocirc;ng</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ xử l&iacute; h&igrave;nh ảnh:</td>\n<td>Neo Quantum 4K, Quantum Dot, HDR, OLED, Real Depth Enhancer, Ultra Viewing Angle</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ &acirc;m thanh:</td>\n<td>Object Tracking Sound, Active Voice Amplifier, Adaptive Sound+, Q Symphony</td>\n</tr>\n<tr>\n<td>Tổng c&ocirc;ng suất loa:</td>\n<td>60W</td>\n</tr>\n<tr>\n<td>Số lượng loa:</td>\n<td>H&atilde;ng kh&ocirc;ng c&ocirc;ng bố</td>\n</tr>\n<tr>\n<td>Cổng WiFi:</td>\n<td>Wifi 5</td>\n</tr>\n<tr>\n<td>Cổng Internet (LAN):</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Cổng HDMI:</td>\n<td>4 Cổng</td>\n</tr>\n<tr>\n<td>Cổng Optical:</td>\n<td>1 cổng</td>\n</tr>\n<tr>\n<td>Cổng AV in (Composite / Component):</td>\n<td>4 cổng HDMI c&oacute; 1 cổng HDMI eARC (ARC)</td>\n</tr>\n<tr>\n<td>Cổng AV out:</td>\n<td>1 cổng Optical (Digital Audio), 1 cổng eARC (ARC)</td>\n</tr>\n<tr>\n<td>Cổng USB:</td>\n<td>2 Cổng</td>\n</tr>\n<tr>\n<td>Chia sẻ th&ocirc;ng minh:</td>\n<td>Bluetooth 5.2</td>\n</tr>\n<tr>\n<td>Hệ điều h&agrave;nh - Giao diện:</td>\n<td>Tizen&trade;</td>\n</tr>\n<tr>\n<td>Tr&igrave;nh duyệt web:</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Bộ nhớ:</td>\n<td>H&atilde;ng kh&ocirc;ng c&ocirc;ng bố</td>\n</tr>\n<tr>\n<td>Điều khiển bằng cử chỉ:</td>\n<td>Kh&ocirc;ng</td>\n</tr>\n<tr>\n<td>T&igrave;m kiếm bằng giọng n&oacute;i:</td>\n<td>Trợ l&yacute; ảo Bixby, T&igrave;m kiếm bằng giọng n&oacute;i Tiếng Việt tr&ecirc;n Youtube</td>\n</tr>\n<tr>\n<td>Nhận diện khu&ocirc;n mặt:</td>\n<td>Kh&ocirc;ng</td>\n</tr>\n<tr>\n<td>K&iacute;ch thước c&oacute; ch&acirc;n đế:</td>\n<td>Ngang 1444.3 x Cao 897.6 x D&agrave;y 288.2 mm</td>\n</tr>\n<tr>\n<td>K&iacute;ch thước kh&ocirc;ng ch&acirc;n đế:</td>\n<td>Ngang 1444.3 x Cao 831.7 x D&agrave;y 39.9 mm</td>\n</tr>\n<tr>\n<td>Khối lượng c&oacute; ch&acirc;n đế:</td>\n<td>25.5 kg</td>\n</tr>\n<tr>\n<td>Khối lượng kh&ocirc;ng ch&acirc;n đế:</td>\n<td>21.2 kg</td>\n</tr>\n</tbody>\n</table>', 'img/product_images/1717854667_QA65S95CA.jpg', '[\"img\\/product_images\\/1717854667_QA65S95CA_1.jpg\",\"img\\/product_images\\/1717854667_QA65S95CA_2.jpg\"]', '2024-05-13 22:43:48', '2024-07-01 01:19:45', 42000000),
(3, 2, 6, 5, 9, 'Tủ lạnh Hitachi Inverter 464 lít HR4N7520DSWDXVN', 'HR4N7520DSWDXVN', 18000000, 30000000, 1, '<p><strong><em>Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN&nbsp;thiết kế Multi Door tinh tế, c&oacute; ngăn chuyển đổi đa năng Selectable Zone lưu trữ thực phẩm kh&ocirc;ng cần r&atilde; đ&ocirc;ng, giảm hao ph&iacute; điện năng, đảm bảo khả năng l&agrave;m lạnh tối ưu với c&ocirc;ng nghệ Inverter, c&ocirc;ng nghệ l&agrave;m lạnh v&ograve;ng cung giữ thực phẩm tươi ngon với kh&iacute; lạnh nhẹ nh&agrave;ng.</em></strong></p>\n<h3>Tổng quan thiết kế</h3>\n<p>- Mẫu&nbsp;tủ lạnh Hitachi&nbsp;n&agrave;y c&oacute; thiết kế kiểu&nbsp;Multi Door&nbsp;với 4 c&aacute;nh cửa được l&agrave;m từ vật liệu th&eacute;p kh&ocirc;ng gỉ sử dụng bền bỉ, hạn chế gỉ s&eacute;t, chống m&agrave;i m&ograve;n, l&agrave;m sạch dễ d&agrave;ng.</p>\n<p>- Dung t&iacute;ch sử dụng 464 l&iacute;t đ&aacute;p ứng nhu cầu lưu trữ thực phẩm trong gia đ&igrave;nh c&oacute; từ 4 - 5 th&agrave;nh vi&ecirc;n hoặc c&aacute; nh&acirc;n, gia đ&igrave;nh &iacute;t người c&oacute; th&oacute;i quen t&iacute;ch trữ lượng lớn thực phẩm trong nh&agrave;.&nbsp;</p>\n<p><img title=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Tổng quan thiết kế\" src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055113.jpg\" alt=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Tổng quan thiết kế\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055113.jpg\"></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</em></p>\n<h3>Ngăn lạnh</h3>\n<p>- Dung t&iacute;ch:&nbsp;<strong>289 l&iacute;t</strong>.</p>\n<p>- Trang bị nhiều khay, kệ, hộc chứa được thiết kế b&ecirc;n trong th&acirc;n tủ v&agrave; ở 2 c&aacute;nh cửa gi&uacute;p cung cấp cho người d&ugrave;ng nhiều vị tr&iacute; để cất giữ c&aacute;c loại thực phẩm thuận tiện, ngăn nắp.&nbsp;</p>\n<p>- Ngăn rau củ chuy&ecirc;n biệt c&oacute; độ ẩm cao sử dụng để bảo quản tr&aacute;i c&acirc;y, rau củ tươi l&acirc;u.&nbsp;</p>\n<h3>Ngăn đ&aacute;</h3>\n<p>- Dung t&iacute;ch:&nbsp;<strong>175 l&iacute;t</strong>.&nbsp;</p>\n<p>- Với dung t&iacute;ch nhỏ hơn, c&aacute;c kệ, hộc chứa &iacute;t hơn ngăn lạnh nhưng ngăn đ&aacute; vẫn c&oacute; đủ kh&ocirc;ng gian để bạn sắp xếp đa dạng thực phẩm cần giữ lạnh.&nbsp;</p>\n<h3>Ngăn chuyển đổi đa năng Selectable Zone</h3>\n<p>- Dung t&iacute;ch của Selectable Zone&nbsp;l&agrave;&nbsp;<strong>18 l&iacute;t</strong>.&nbsp;</p>\n<p>&nbsp;<strong>Ngăn chuyển đổi đa năng Selectable Zone (c&oacute; đ&ocirc;ng mềm -3&deg;C)&nbsp;</strong>c&oacute; thể điều chỉnh nhiệt độ thiết lập dựa v&agrave;o nhu cầu bảo quản v&agrave; th&oacute;i quen sinh hoạt của gia đ&igrave;nh bạn với 4 chế độ:&nbsp;<strong>rau quả từ 3 - 5&deg;C</strong>&nbsp;(d&ugrave;ng cho rau củ quả),&nbsp;<strong>l&agrave;m lạnh/thịt 1 - 2&deg;C</strong>&nbsp;(trữ sữa, thịt, những loại thực phẩm kh&ocirc;),&nbsp;<strong>đồ uống 0 - 1&deg;C</strong>&nbsp;(l&agrave;m lạnh thức uống cấp tốc),&nbsp;<strong>cấp đ&ocirc;ng mềm từ -1 tới -3&deg;C&nbsp;</strong>(giữ lạnh thịt c&aacute; tươi để nấu ăn ngay m&agrave; kh&ocirc;ng cần r&atilde; đ&ocirc;ng).</p>\n<p><img title=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Dung t&iacute;ch\" src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055123.jpg\" alt=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Dung t&iacute;ch\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055123.jpg\"></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</em></p>\n<h3>C&ocirc;ng nghệ tiết kiệm điện</h3>\n<p>-&nbsp;C&ocirc;ng nghệ Inverter&nbsp;t&iacute;ch hợp m&aacute;y n&eacute;n hiệu suất cao được điều khiển điện tử cho hiệu quả l&agrave;m lạnh cao, giảm hao ph&iacute; điện năng v&agrave; hoạt động &ecirc;m &aacute;i.&nbsp;</p>\n<p>-&nbsp;<strong>Cảm biến nhiệt Eco k&eacute;p th&ocirc;ng minh</strong>&nbsp;được hỗ trợ cho ngăn lạnh v&agrave; ngăn đ&aacute; ri&ecirc;ng. Những cảm biến n&agrave;y ph&aacute;t hiện sự thay đổi nhiệt độ trong từng ngăn, duy tr&igrave; nhiệt độ ph&ugrave; hợp tại mọi thời điểm để l&agrave;m lạnh tối ưu m&agrave; kh&ocirc;ng l&atilde;ng ph&iacute; điện năng.&nbsp;</p>\n<p>-&nbsp;<strong>Chế độ Holiday</strong>: ngăn chặn tủ lạnh ph&aacute;t sinh nấm mốc, m&ugrave;i kh&oacute; chịu khi bạn kh&ocirc;ng sử dụng trong một khoảng thời gian đồng thời tiết kiệm điện tối ưu (lưu &yacute;: khi sử dụng chế độ n&agrave;y kh&ocirc;ng để thực phẩm b&ecirc;n trong tủ lạnh).</p>\n<p><img title=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - C&ocirc;ng nghệ tiết kiệm điện\" src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055117.jpg\" alt=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - C&ocirc;ng nghệ tiết kiệm điện\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055117.jpg\"></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</em></p>\n<h3>C&ocirc;ng nghệ l&agrave;m lạnh&nbsp;</h3>\n<p>-&nbsp;<strong>C&ocirc;ng nghệ l&agrave;m lạnh v&ograve;ng cung</strong>: với hệ thống lưu th&ocirc;ng kh&iacute; lạnh dạng v&ograve;ng cung, hạn chế thổi hơi lạnh trực tiếp v&agrave;o thực phẩm, giữ lạnh thực phẩm đồng đều, đảm bảo độ tươi ngon. Ngo&agrave;i ra c&ograve;n gi&uacute;p cho việc l&agrave;m sạch thuận tiện khi hệ thống l&agrave;m lạnh hiện đại kh&ocirc;ng g&acirc;y đ&oacute;ng tuyết.</p>\n<p><img title=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - C&ocirc;ng nghệ l&agrave;m lạnh\" src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055121.jpg\" alt=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - C&ocirc;ng nghệ l&agrave;m lạnh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055121.jpg\"></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</em></p>\n<h3>Tiện &iacute;ch</h3>\n<p>-&nbsp;Lấy nước b&ecirc;n ngo&agrave;i: cung cấp nước sạch m&aacute;t lạnh sẵn s&agrave;ng cho bạn r&oacute;t để uống dễ d&agrave;ng m&agrave; kh&ocirc;ng cần mở cửa&nbsp;tủ lạnh&nbsp;ra.&nbsp;</p>\n<p>-&nbsp;<strong>Bảng điều khiển cảm ứng</strong>&nbsp;thiết kế phẳng c&oacute; độ nhạy tốt, t&ugrave;y chỉnh c&aacute;c c&agrave;i đặt linh hoạt, chuẩn x&aacute;c bằng thao t&aacute;c chạm nhẹ.</p>\n<p>-&nbsp;<strong>Đ&egrave;n LED</strong>&nbsp;thiết kế chống ch&oacute;i sử dụng tiết kiệm điện được t&iacute;ch hợp cả ở ngăn lạnh v&agrave; ngăn đ&aacute; cho bạn quan s&aacute;t b&ecirc;n trong tủ tiện lợi mọi l&uacute;c.</p>\n<p><img title=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Tiện &iacute;ch\" src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055126.jpg\" alt=\"Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN - Tiện &iacute;ch\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1943/320503/tu-lanh-hitachi-inverter-464-lit-multi-door-hr4n7520dswdxvn-231223-055126.jpg\"></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</em></p>\n<p><em>Tủ lạnh Hitachi Inverter 464 l&iacute;t Multi Door HR4N7520DSWDXVN l&agrave; tủ lạnh ph&ugrave; hợp với gia đ&igrave;nh c&oacute; từ 4 đến 5 người với dung t&iacute;ch sử dụng thiết kế 464 l&iacute;t, trang bị nhiều c&ocirc;ng nghệ, tiện &iacute;ch ti&ecirc;n tiến gi&uacute;p cho qu&aacute; tr&igrave;nh sử dụng, lưu trữ thực phẩm hiệu quả.</em></p>', '<table data-cke-table-faked-selection-table=\"\">\n<tbody>\n<tr>\n<td>Model sản phẩm</td>\n<td>HR4N7522DSDXVN</td>\n</tr>\n<tr>\n<td>D&ograve;ng tủ</td>\n<td>4 c&aacute;nh</td>\n</tr>\n<tr>\n<td>Dung t&iacute;ch tổng</td>\n<td>464 l&iacute;t - 5-7 người</td>\n</tr>\n<tr>\n<td>Dung t&iacute;ch sử dụng</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>Dung t&iacute;ch ngăn m&aacute;t</td>\n<td>289 l&iacute;t</td>\n</tr>\n<tr>\n<td>Dung t&iacute;ch ngăn đ&ocirc;ng</td>\n<td>175 l&iacute;t</td>\n</tr>\n<tr>\n<td>Dung t&iacute;ch ngăn chuyển đổi</td>\n<td>18 l&iacute;t</td>\n</tr>\n<tr>\n<td>Chất liệu c&aacute;nh tủ</td>\n<td>Kim Loại</td>\n</tr>\n<tr>\n<td>Khay trong tủ</td>\n<td>K&iacute;nh chịu lực</td>\n</tr>\n<tr>\n<td>Chất liệu d&agrave;n n&oacute;ng, d&agrave;n lạnh</td>\n<td>Ống dẫn gas bằng Đồng v&agrave; Sắt, l&aacute; tản nhiệt bằng Nh&ocirc;m</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ tiết kiệm điện</td>\n<td>Cảm Biến Nhiệt Eco Inverter</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ l&agrave;m lạnh</td>\n<td>L&agrave;m lạnh v&ograve;ng cung</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ bảo quản thực phẩm</td>\n<td>Ngăn chuyển đổi đa năng Selectable Zone</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ khử m&ugrave;i,diệt khuẩn</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>Tiện &iacute;ch</td>\n<td>Bảng điều khiển cảm ứng b&ecirc;n ngo&agrave;i cửa tủ, lấy nước b&ecirc;n ngo&agrave;i<br>Hộc l&agrave;m đ&aacute; k&eacute;p, Tấm giữ nhiệt kim loại, Chế độ đi vắng, Cấp đ&ocirc;ng nhanh, Khay đ&aacute; xoay</td>\n</tr>\n<tr>\n<td>L&agrave;m đ&aacute; tự động</td>\n<td>Kh&ocirc;ng</td>\n</tr>\n<tr>\n<td>Lấy nước ngo&agrave;i</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Năm ra mắt sản phẩm</td>\n<td>2023</td>\n</tr>\n<tr>\n<td>Xuất xứ</td>\n<td>Trung Quốc</td>\n</tr>\n<tr>\n<td>C&ocirc;ng suất ti&ecirc;u thụ</td>\n<td>437 kWh/năm</td>\n</tr>\n<tr>\n<td>Thời gian bảo h&agrave;nh</td>\n<td>2 năm m&aacute;y / 10 năm động cơ</td>\n</tr>\n<tr>\n<td>Bảo h&agrave;nh điện tử / giấy</td>\n<td>Điện tử</td>\n</tr>\n<tr>\n<td>K&iacute;ch thước</td>\n<td>Cao 180 cm-Rộng 79.5 cm-S&acirc;u 73.5 cm</td>\n</tr>\n<tr>\n<td>Trọng lượng</td>\n<td>87 kg</td>\n</tr>\n</tbody>\n</table>', 'img/product_images/1717883866HR4N7520DSWDXVN.webp', '[\"img\\/product_images\\/1717854247_HR4N7520DSWDXVN_1.webp\"]', '2024-05-13 22:48:48', '2024-07-01 01:19:45', 5000000),
(4, 3, 10, 4, 7, 'Máy giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK)', 'TW-BK95S2V(WK)', 4800000, 5200000, 5, '<h2><strong>M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang</strong></h2>\n<p><strong><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_4928586.jpg\" alt=\"M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang - K&iacute;ch thước\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_4928586.jpg\"></strong></p>\n<h3><strong>Thiết kế sang trọng, m&agrave;u sắc trang nh&atilde;</strong></h3>\n<p>M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang&nbsp;với gam m&agrave;u thanh lịch c&ugrave;ng thiết kế độc đ&aacute;o l&agrave;m h&agrave;i l&ograve;ng cả những người kh&oacute; t&iacute;nh nhất bởi sự sang trọng v&agrave; tinh tế. M&aacute;y c&oacute; vỏ ngo&agrave;i được l&agrave;m bằng chất liệu th&eacute;p mạ k&eacute;m mang đến vẻ đẹp sang trọng v&agrave; thanh lịch cho kh&ocirc;ng gian nội thất ng&ocirc;i nh&agrave;. Lớp th&eacute;p mạ k&eacute;m n&agrave;y vừa gi&uacute;p hạn chế trầy xước b&ecirc;n ngo&agrave;i, vừa gi&uacute;p người d&ugrave;ng dễ d&agrave;ng vệ sinh, l&agrave;m cho&nbsp;m&aacute;y giặt&nbsp;lu&ocirc;n s&aacute;ng b&oacute;ng v&agrave; sạch sẽ như mới.&nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184328.jpg\" alt=\"Thiết kế -M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184328.jpg\"></p>\n<h3><strong>Khối lượng giặt 8.5 kg</strong></h3>\n<p>M&aacute;y giặt lồng ngang&nbsp;TW-BK95S2V(WK) c&oacute; khối lượng giặt lớn l&ecirc;n đến 8.5 kg gi&uacute;p giải quyết nhu cầu giặt giũ của c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh một c&aacute;ch dễ d&agrave;ng. Đối với những gia đ&igrave;nh từ 3 &ndash; 5 người hoặc gia đ&igrave;nh &iacute;t th&agrave;nh vi&ecirc;n nhưng c&oacute; nhu cầu giặt giũ cao th&igrave; m&aacute;y giặt Toshiba TW-BK95S2V(WK) l&agrave; một sự lựa chọn đ&aacute;ng để c&acirc;n nhắc. &nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_2946503.jpg\" alt=\"Khối lượng giặt-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_2946503.jpg\"></p>\n<h3><strong>Đ&aacute;nh bay vết bẩn cứng đầu nhờ C&ocirc;ng nghệ giặt Greatwaves&nbsp;</strong></h3>\n<p>Toshiba Inverter TW-BK95S2V(WK) sử dụng c&ocirc;ng nghệ giặt Greatwaves, c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;sức mạnh si&ecirc;u s&oacute;ng&rdquo;. C&ocirc;ng nghệ n&agrave;y được coi l&agrave; một bước đột ph&aacute; nổi bật quan trọng, chỉ xuất hiện độc quyền tr&ecirc;n c&aacute;c m&aacute;y giặt của Toshiba.</p>\n<p>C&ocirc;ng nghệ giặt Greatwaves l&agrave; một c&ocirc;ng nghệ t&iacute;ch hợp 3 trong 1 gồm: Flush Waves, Real Inverter, Color care.&nbsp;</p>\n<p><strong>Flush Waves:</strong>&nbsp;tạo s&oacute;ng nước cực mạnh gi&uacute;p tăng hiệu quả giặt sạch l&ecirc;n đến 5% m&agrave; kh&ocirc;ng l&agrave;m quần &aacute;o sờn r&aacute;ch hay tưa chỉ.</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184140.jpg\" alt=\"Flush Waves-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184140.jpg\"></p>\n<p><strong>Real Inverter:</strong>&nbsp;động cơ kh&ocirc;ng chổi than gi&uacute;p m&aacute;y vận h&agrave;nh &ecirc;m &aacute;i, bền bỉ, kh&ocirc;ng g&acirc;y tiếng ồn, kh&ocirc;ng l&agrave;m ảnh hưởng đến giấc ngủ cũng như những sinh hoạt kh&aacute;c trong gia đ&igrave;nh.</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184141.jpg\" alt=\"Real Inverter-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184141.jpg\"></p>\n<p><strong>Color care:</strong>&nbsp;l&agrave;m tan cặn bột giặt, l&agrave;m giảm được 39 độ phai m&agrave;u v&agrave; 45% độ biến dạng của vải so với giặt nước n&oacute;ng, gi&uacute;p giữ m&agrave;u sắc quần &aacute;o bền đẹp như mới.&nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184155.jpg\" alt=\"Color care-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184155.jpg\"></p>\n<h3><strong>Bảng điều khiển hiện đại&nbsp;</strong></h3>\n<p>M&aacute;y giặt TW-BK95S2V(WK) sở hữu bảng điều khiển hiện đại, chống nước an to&agrave;n, c&oacute; m&agrave;n h&igrave;nh LED hiển thị. Bảng điều khiển được thiết kế đơn giản gi&uacute;p người d&ugrave;ng dễ d&agrave;ng quan s&aacute;t, thao t&aacute;c v&agrave; sử dụng.</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184327.jpg\" alt=\"Bảng điều khiển-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184327.jpg\"></p>\n<h3><strong>Chế độ giặt nhanh 15 ph&uacute;t</strong></h3>\n<p>M&aacute;y được trang bị th&ecirc;m chế độ giặt nhanh gi&uacute;p giặt sạch nhanh ch&oacute;ng c&aacute;c loại quần &aacute;o mỏng, nhẹ chỉ trong v&ograve;ng 15 ph&uacute;t, đặc biệt ph&ugrave; hợp với những người bận rộn. Chỉ với một khoảng thời gian rất ngắn, người d&ugrave;ng đ&atilde; c&oacute; những bộ quần &aacute;o sạch sẽ, thơm tho, tiết kiệm thời gian chăm s&oacute;c quần &aacute;o.</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_2946502.jpg\" alt=\"giặt nhanh 15 ph&uacute;t-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_2946502.jpg\"></p>\n<h3><strong>Chức năng tự khởi động lại khi c&oacute; điện</strong></h3>\n<p>Người d&ugrave;ng lo sợ nếu đang giặt m&agrave; mất điện th&igrave; m&aacute;y sẽ nhanh bị hỏng, qu&aacute; tr&igrave;nh phải quay lại từ đầu mất nhiều thời gian th&igrave; m&aacute;y giặt Toshiba TW-BK95S2V(WK) sẽ giải quyết tất cả. Khi c&oacute; điện trở lại, m&aacute;y giặt sẽ tự động tiếp tục qu&aacute; tr&igrave;nh giặt chưa ho&agrave;n th&agrave;nh trước đ&oacute;, đ&acirc;y l&agrave; một chức năng v&ocirc; c&ugrave;ng tiện lợi. T&iacute;nh năng n&agrave;y gi&uacute;p loại bỏ những lo lắng của người d&ugrave;ng, đồng thời cũng tiết kiệm thời gian hơn rất nhiều so với phải quay lại chu tr&igrave;nh giặt từ đầu.&nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184325.jpg\" alt=\"khởi động lại khi c&oacute; điện-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184325.jpg\"></p>\n<h3><strong>Vắt cực kh&ocirc; l&agrave;m kh&ocirc; quần &aacute;o nhanh ch&oacute;ng</strong></h3>\n<p>TW-BK95S2V(WK) được trang bị tốc độ vắt l&ecirc;n đến 1200 v&ograve;ng/ph&uacute;t gi&uacute;p quần &aacute;o vắt kh&ocirc; dễ d&agrave;ng, tiết kiệm tối đa thời gian l&agrave;m kh&ocirc; quần &aacute;o. Chức năng n&agrave;y cực kỳ ph&ugrave; hợp với những ng&agrave;y thời tiết kh&ocirc;ng thuận lợi (nồm ẩm, mưa&hellip;) hay trong những t&igrave;nh huống cần quần &aacute;o trong thời gian ngắn.&nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184293.jpg\" alt=\"tốc độ vắt-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3184293.jpg\"></p>\n<h3><strong>Chế độ vệ sinh lồng giặt&nbsp;</strong></h3>\n<p>M&aacute;y giặt lồng ngang TW-BK95S2V(WK) sở hữu chức năng vệ sinh lồng giặt gi&uacute;p l&agrave;m sạch lồng giặt hiệu quả, đảm bảo sạch sẽ chuẩn bị cho lần giặt sau. Chức năng n&agrave;y sẽ mang đến cho cả gia đ&igrave;nh những bộ quần &aacute;o sạch sẽ hơn, mang lại hiệu quả giặt vượt trội, loại bỏ được c&aacute;c vi khuẩn c&oacute; hại cũng như cặn bột giặt b&aacute;m tr&ecirc;n lồng giặt c&ograve;n s&oacute;t lại. Chức năng vệ sinh lồng giặt gi&uacute;p người d&ugrave;ng tiết kiệm được nhiều thời gian cũng như chi ph&iacute; vệ sinh lồng giặt, v&ocirc; c&ugrave;ng tiện lợi.&nbsp;</p>\n<p><img src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3183748.jpg\" alt=\"vệ sinh lồng giặt&nbsp;-M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang\" data-cke-saved-src=\"https://hc.com.vn/i/ecommerce/media/ckeditor_3183748.jpg\"></p>\n<p>M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) lồng ngang l&agrave; sản phẩm được thiết kế đẹp mắt, nhiều t&iacute;nh năng tiện lợi, khối lượng giặt lớn, an to&agrave;n khi sử dụng, được nhiều người ti&ecirc;u d&ugrave;ng y&ecirc;u th&iacute;ch v&agrave; lựa chọn.</p>', '<table data-cke-table-faked-selection-table=\"\">\n<thead>\n<tr>\n<th class=\"cke_table-faked-selection\">#</th>\n<th class=\"cke_table-faked-selection\">THUỘC T&Iacute;NH</th>\n<th class=\"cke_table-faked-selection\">GI&Aacute; TRỊ</th>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">1</th>\n<td class=\"cke_table-faked-selection\">Xuất xứ</td>\n<td class=\"cke_table-faked-selection\">Th&aacute;i Lan</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">2</th>\n<td class=\"cke_table-faked-selection\">Bảo h&agrave;nh</td>\n<td class=\"cke_table-faked-selection\">2 năm</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">3</th>\n<td class=\"cke_table-faked-selection\">Lồng giặt</td>\n<td class=\"cke_table-faked-selection\">Lồng ngang</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">4</th>\n<td class=\"cke_table-faked-selection\">Khối lượng giặt</td>\n<td class=\"cke_table-faked-selection\">8.5 Kg</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">5</th>\n<td class=\"cke_table-faked-selection\">Tốc độ quay vắt</td>\n<td class=\"cke_table-faked-selection\">1200 v&ograve;ng/ph&uacute;t</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">6</th>\n<td class=\"cke_table-faked-selection\">Inverter</td>\n<td class=\"cke_table-faked-selection\">C&oacute;</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">7</th>\n<td class=\"cke_table-faked-selection\">Kiểu động cơ</td>\n<td class=\"cke_table-faked-selection\">D&acirc;y Curoa</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">8</th>\n<td class=\"cke_table-faked-selection\">Chương tr&igrave;nh giặt</td>\n<td class=\"cke_table-faked-selection\">16 chương tr&igrave;nh giặt</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">9</th>\n<td class=\"cke_table-faked-selection\">C&ocirc;ng nghệ giặt</td>\n<td class=\"cke_table-faked-selection\">Greatwaves sức mạnh si&ecirc;u s&oacute;ng, Phục hồi chương tr&igrave;nh giặt dang dở</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">10</th>\n<td class=\"cke_table-faked-selection\">Tiện &iacute;ch</td>\n<td class=\"cke_table-faked-selection\">Giặt bằng nước n&oacute;ng, Tự khởi động lại khi c&oacute; điện, Hẹn giờ, Kh&oacute;a trẻ em, Vệ sinh lồng giặt, Giặt nhanh 15 ph&uacute;t</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">11</th>\n<td class=\"cke_table-faked-selection\">Chất liệu lồng giặt</td>\n<td class=\"cke_table-faked-selection\">Th&eacute;p kh&ocirc;ng gỉ</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">12</th>\n<td class=\"cke_table-faked-selection\">Chất liệu nắp m&aacute;y</td>\n<td class=\"cke_table-faked-selection\">K&iacute;nh chịu lực</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">13</th>\n<td class=\"cke_table-faked-selection\">Bảng điều khiển</td>\n<td class=\"cke_table-faked-selection\">N&uacute;t xoay chọn chương tr&igrave;nh</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">14</th>\n<td class=\"cke_table-faked-selection\">Khoảng khối lượng giặt</td>\n<td class=\"cke_table-faked-selection\">Từ 8 đến &lt; 9 Kg (3 - 5 người)</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">15</th>\n<td class=\"cke_table-faked-selection\">K&iacute;ch thước</td>\n<td class=\"cke_table-faked-selection\">Cao 84.5 cm - Ngang 59.5 cm - S&acirc;u 60 cm</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">16</th>\n<td class=\"cke_table-faked-selection\">Trọng lượng</td>\n<td class=\"cke_table-faked-selection\">~ 68Kg</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">17</th>\n<td class=\"cke_table-faked-selection\">Năm ra mắt</td>\n<td class=\"cke_table-faked-selection\">2021</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">18</th>\n<td class=\"cke_table-faked-selection\">Giặt nước n&oacute;ng</td>\n<td class=\"cke_table-faked-selection\">C&oacute;</td>\n</tr>\n<tr>\n<th class=\"cke_table-faked-selection\" scope=\"row\">19</th>\n<td class=\"cke_table-faked-selection\">Tự khởi động lại khi c&oacute; điện</td>\n<td class=\"cke_table-faked-selection\">C&oacute;</td>\n</tr>\n</thead>\n</table>', 'img/product_images/1717881243_TW-BK95S2V(WK).webp', '[\"img\\/product_images\\/1717881243_TW-BK95S2V(WK)_1.webp\",\"img\\/product_images\\/1717881243_TW-BK95S2V(WK)_2.webp\"]', '2024-06-08 14:14:03', '2024-07-01 01:19:45', 1200000);
INSERT INTO `products` (`id`, `catalog_id`, `type_id`, `feature_id`, `brand_id`, `name`, `model`, `price`, `old_price`, `quantity`, `content`, `specifications`, `image_link`, `image_list`, `created_at`, `updated_at`, `import_price`) VALUES
(5, 3, 10, 3, 6, 'Máy giặt Aqua 9kg AQW-S90CT (H2/S)', 'AQW-S90CT (H2/S)', 6000000, 6600000, 4, '<h3>Đặc điểm nổi bật</h3>\n<p>M&aacute;y giặt AQUA S90CT&nbsp;l&agrave; chiếc m&aacute;y giặt sở hữu nhiều đặc điểm nổi bật như:</p>\n<ul>\n<li>Thiết kế độc đ&aacute;o, k&iacute;ch thước nhỏ gọn, ph&ugrave; hợp cho cả nơi kh&ocirc;ng gian hạn chế.</li>\n<li>C&ocirc;ng nghệ giặt hiện đại, hiệu quả giặt sạch cao, tiết kiệm thời gian.&nbsp;</li>\n<li>9 chương tr&igrave;nh giặt đa dạng, ph&ugrave; hợp cho nhiều nhu cầu.</li>\n<li>Tự động khởi động lại chu tr&igrave;nh giặt sau khi gặp sự cố điện.</li>\n<li>T&iacute;nh năng vệ sinh lồng giặt đảm bảo kh&ocirc;ng gian giặt giũ lu&ocirc;n vệ sinh nhất.</li>\n</ul>\n<h3>Đ&aacute;nh gi&aacute; chi tiết m&aacute;y giặt AQUA 9kg AQW-S90CT (H2/S)</h3>\n<p><strong>M&aacute;y giặt AQUA 9kg AQW-S90CT (H2/S)</strong>&nbsp;l&agrave; chiếc&nbsp;m&aacute;y giặt lồng đứng&nbsp;v&ocirc; c&ugrave;ng th&acirc;n thiện với người d&ugrave;ng Việt Nam. Sản phẩm của thương hiệu AQUA c&oacute; khối lượng giặt tối đa 9kg, k&iacute;ch thước kh&aacute; nhỏ gọn, thiết kế độc đ&aacute;o, ph&ugrave; hợp cho những gia đ&igrave;nh c&oacute; từ 3 - 5 th&agrave;nh vi&ecirc;n m&agrave; kh&ocirc;ng gian bị hạn chế.&nbsp;</p>\n<h3>C&ocirc;ng nghệ giặt nhiều luồng nước phun MultiJet giặt sạch hiệu quả</h3>\n<p><img title=\"M&aacute;y giặt Aqua 9kg AQW-S90CT sử dụng c&ocirc;ng nghệ MultiJet\" src=\"https://s.meta.com.vn/Data/image/2022/08/24/may-giat-aqua-9kg-aqw-s90ct-1.jpg\" alt=\"M&aacute;y giặt Aqua 9kg AQW-S90CT sử dụng c&ocirc;ng nghệ MultiJet\" width=\"600\" height=\"333\" data-cke-saved-src=\"https://s.meta.com.vn/Data/image/2022/08/24/may-giat-aqua-9kg-aqw-s90ct-1.jpg\"></p>\n<p>M&aacute;y giặt AQUA&nbsp;AQW-S90CT ứng dụng c&ocirc;ng nghệ MultiJet c&oacute; khả năng tạo ra nhiều luồng nước phun mạnh mẽ l&ecirc;n quần &aacute;o, nhờ đ&oacute;, c&aacute;c vết bẩn cứng đầu sẽ nhanh ch&oacute;ng bị đ&aacute;nh bật, gi&uacute;p quần &aacute;o được giặt một c&aacute;ch sạch sẽ nhất.</p>\n<h3>Vắt kh&ocirc; ho&agrave;n hảo, tiết kiệm thời gian phơi quần &aacute;o</h3>\n<p><img title=\"M&aacute;y giặt Aqua AQW-S90CT c&oacute; tốc độ quay nhanh, vắt kh&ocirc; kỹ quần &aacute;o\" src=\"https://s.meta.com.vn/Data/image/2022/08/24/may-giat-aqua-9kg-aqw-s90ct-2.jpg\" alt=\"M&aacute;y giặt Aqua AQW-S90CT c&oacute; tốc độ quay nhanh, vắt kh&ocirc; kỹ quần &aacute;o\" width=\"600\" height=\"333\" data-cke-saved-src=\"https://s.meta.com.vn/Data/image/2022/08/24/may-giat-aqua-9kg-aqw-s90ct-2.jpg\"></p>\n<p>Với tốc độ quay vắt quần &aacute;o l&agrave; 700 v&ograve;ng/ph&uacute;t,&nbsp;m&aacute;y giặt lồng đứng AQUA&nbsp;9kg AQW-S90CT sẽ vắt kh&ocirc; ho&agrave;n hảo quần &aacute;o sau khi giặt xong, g&oacute;p phần gi&uacute;p bạn tiết kiệm được thời gian phơi quần &aacute;o.</p>\n<h3>9 chương tr&igrave;nh giặt đa dạng</h3>\n<p>M&aacute;y giặt AQUA 9kg&nbsp;AQW-S90CT được t&iacute;ch hợp 9 chương tr&igrave;nh giặt kh&aacute;c nhau gi&uacute;p tiết kiệm thời gian v&agrave; n&acirc;ng cao chất lượng giặt, gồm:</p>\n<ul>\n<li>Chế độ ti&ecirc;u chuẩn</li>\n<li>Giặt mạnh</li>\n<li>Giặt nhanh</li>\n<li>Giặt nhẹ</li>\n<li>Giặt chăn m&agrave;n</li>\n<li>Giặt ng&acirc;m</li>\n<li>Vắt</li>\n<li>Vắt cực kh&ocirc;</li>\n<li>Vệ sinh lồng giặt</li>\n</ul>\n<p>&nbsp;</p>\n<h3>Tự khởi động lại khi c&oacute; điện</h3>\n<p>T&iacute;nh năng tự khởi động lại khi c&oacute; điện sẽ ghi nhớ chương tr&igrave;nh hiện tại nếu đột ngột mất điện v&agrave; gi&uacute;p m&aacute;y giặt tiếp tục khởi động chương tr&igrave;nh dang dở ngay khi c&oacute; điện, x&oacute;a tan nỗi lo lắng khi đồ giặt bị ng&acirc;m, ủ qu&aacute; l&acirc;u nếu c&uacute;p điện đột ngột trong l&uacute;c bạn vắng nh&agrave;.</p>\n<p>&nbsp;</p>\n<h3>Vệ sinh lồng giặt tự động</h3>\n<p>Với t&iacute;nh năng vệ sinh lồng giặt tự động của m&aacute;y giặt AQUA S90CT, bạn sẽ kh&ocirc;ng c&ograve;n phải tốn nhiều thời gian hay chi ph&iacute; l&agrave;m vệ sinh m&agrave; vẫn y&ecirc;n t&acirc;m lồng giặt lu&ocirc;n sạch sẽ, kh&ocirc;ng b&aacute;m m&ugrave;i h&ocirc;i, đảm bảo chất lượng giặt giũ.</p>\n<h3>Thiết kế bảng điều khiển độc đ&aacute;o&nbsp;</h3>\n<p>&nbsp;</p>\n<p>Bảng điều khiển m&aacute;y giặt AQUA AQW-S90CT c&oacute; thiết kế kh&aacute; độc đ&aacute;o, thay v&igrave; đặt ngang như c&aacute;c loại m&aacute;y giặt kh&aacute;c, n&oacute; được đặt dọc b&ecirc;n phải nắp m&aacute;y, c&oacute; dạng n&uacute;t bấm điện tử kết hợp m&agrave;n h&igrave;nh LED v&agrave; ch&uacute; th&iacute;ch tiếng Việt. Với thiết kế n&agrave;y, kể cả người lớn tuổi trong gia đ&igrave;nh bạn cũng c&oacute; thể dễ d&agrave;ng thao t&aacute;c sử dụng cũng như theo d&otilde;i c&aacute;c th&ocirc;ng số hoạt động của m&aacute;y giặt.&nbsp;</p>\n<p>&nbsp;</p>\n<h3>Khối lượng 9kg ph&ugrave; hợp cho c&aacute;c gia đ&igrave;nh đ&ocirc;ng người</h3>\n<p>M&aacute;y giặt AQUA AQW-S90CT sử dụng động cơ d&acirc;y curoa với tốc độ quay 700 v&ograve;ng/ph&uacute;t gi&uacute;p r&uacute;t ngắn thời gian giặt cũng như n&acirc;ng cao hiệu quả l&agrave;m sạch.&nbsp;M&aacute;y giặt c&oacute; khối lượng giặt tối đa 9kg, ph&ugrave; hợp cho c&aacute;c gia đ&igrave;nh c&oacute; từ 3 - 5 th&agrave;nh vi&ecirc;n.</p>\n<p>&nbsp;</p>\n<h3>Thiết kế thanh lịch, sang trọng</h3>\n<p>M&aacute;y giặt AQUA 9kg AQW-S90CT (H2/S) sở hữu thiết kế lồng đứng đơn giản, hiện đại, tiết kiệm diện t&iacute;ch n&ecirc;n rất ph&ugrave; hợp với c&aacute;c gia đ&igrave;nh sinh sống ở nơi kh&ocirc;ng gian hẹp. Vỏ m&aacute;y được l&agrave;m từ kim loại sơn tĩnh điện, chống han gỉ hiệu quả, gi&uacute;p bảo vệ động cơ v&agrave; lồng m&aacute;y giặt tốt hơn.</p>\n<p>Nắp m&aacute;y được l&agrave;m bằng k&iacute;nh chịu lực trong suốt gi&uacute;p dễ d&agrave;ng quan s&aacute;t qu&aacute; tr&igrave;nh giặt b&ecirc;n trong. Phần lồng giặt được l&agrave;m từ th&eacute;p kh&ocirc;ng gỉ, đảm bảo kh&ocirc;ng bị th&ocirc;i nhiễm kim loại ra vải v&oacute;c, quần &aacute;o, an to&agrave;n hơn cho cơ thể của người d&ugrave;ng.</p>\n<p>Nh&igrave;n chung, nếu bạn đang muốn&nbsp;mua m&aacute;y giặt&nbsp;với khối lượng giặt lớn v&agrave; mức gi&aacute; rẻ, hiệu quả đảm bảo th&igrave; m&aacute;y giặt AQUA AQW-S90CT 9kg l&agrave; lựa chọn bạn kh&ocirc;ng n&ecirc;n bỏ qua.&nbsp;</p>\n<p><strong>Lưu &yacute;:</strong> H&igrave;nh ảnh sản phẩm chỉ c&oacute; t&iacute;nh chất minh họa, chi tiết sản phẩm, m&agrave;u sắc c&oacute; thể thay đổi t&ugrave;y theo sản phẩm thực tế.</p>', '<table>\n<tbody>\n<tr>\n<td>Model:</td>\n<td>AQW-S90CT</td>\n</tr>\n<tr>\n<td>M&agrave;u sắc:</td>\n<td>X&aacute;m</td>\n</tr>\n<tr>\n<td>Nh&agrave; sản xuất:</td>\n<td>Aqua</td>\n</tr>\n<tr>\n<td>Xuất xứ:</td>\n<td>Việt Nam</td>\n</tr>\n<tr>\n<td>Năm ra mắt :</td>\n<td>2019</td>\n</tr>\n<tr>\n<td>Thời gian bảo h&agrave;nh:</td>\n<td>24 Tháng</td>\n</tr>\n<tr>\n<td>Địa điểm bảo h&agrave;nh:</td>\n<td>Ch&iacute;nh h&atilde;ng</td>\n</tr>\n<tr>\n<td>Loại m&aacute;y giặt:</td>\n<td>Cửa tr&ecirc;n</td>\n</tr>\n<tr>\n<td>Khối lượng giặt:</td>\n<td>9 Kg</td>\n</tr>\n<tr>\n<td>Chế độ giặt:</td>\n<td>9 Chương tr&igrave;nh</td>\n</tr>\n<tr>\n<td>Tốc độ quay vắt:</td>\n<td>700 v&ograve;ng/ph&uacute;t</td>\n</tr>\n<tr>\n<td>Lượng nước ti&ecirc;u thụ:</td>\n<td>138 l&iacute;t</td>\n</tr>\n<tr>\n<td>Chất liệu lồng giặt:</td>\n<td>Th&eacute;p kh&ocirc;ng gỉ</td>\n</tr>\n<tr>\n<td>Tự khởi động lại sau khi c&oacute; điện:</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Kh&oacute;a an to&agrave;n:</td>\n<td>C&oacute;</td>\n</tr>\n<tr>\n<td>Khối lượng sản phẩm (kg):</td>\n<td>34.2 kg</td>\n</tr>\n<tr>\n<td>K&iacute;ch thước sản phẩm:</td>\n<td>560 x 630 x 986 mm</td>\n</tr>\n</tbody>\n</table>', 'img/product_images/1717883654AQWS90CTH2S.jpg', '[\"img\\/product_images\\/1717883654AQWS90CTH2S1.jpg\",\"img\\/product_images\\/1717883654AQWS90CTH2S2.jpg\"]', '2024-06-08 14:22:27', '2024-07-01 01:19:45', 400000),
(20, 1, 4, 12, 1, 'Smart Tivi QLED 4K 98 inch Samsung QA98Q80C', 'QA98Q80C', 92000000, 85900000, 18, '<p><strong><em>Smart Tivi QLED 4K 98 inch Samsung QA98Q80C&nbsp;cho bạn thưởng thức c&aacute;c bộ phim h&agrave;nh động m&atilde;n nh&atilde;n với m&agrave;n h&igrave;nh lớn 98 inch, t&aacute;i hiện nội dung 4K sắc n&eacute;t nhờ bộ xử l&yacute; Neural Quantum 4K AI 20 nơ-ron, mang đến m&agrave;u đen s&acirc;u thẳm, m&agrave;u trắng tươi s&aacute;ng nhờ c&ocirc;ng nghệ Direct Full Array 8X, cảnh chuyển động mượt m&agrave; với tần số qu&eacute;t 120 Hz, c&ocirc;ng nghệ Motion Xcelerator Turbo+, trải nghiệm game tuyệt vời với &acirc;m thanh đa chiều c&ugrave;ng c&ocirc;ng nghệ Dolby Atmos.</em></strong></p>\n<h3>Tổng quan thiết kế</h3>\n<p>-&nbsp;Samsung QA98Q80C c&oacute; thiết kế đơn giản, đường n&eacute;t ho&agrave;n thiện, cạnh viền l&agrave;m từ chất liệu kim loại bao bọc chắc chắn c&aacute;c cạnh m&agrave;n h&igrave;nh v&agrave; g&oacute;p phần gi&uacute;p l&agrave;m tăng độ bền cho&nbsp;tivi.&nbsp;</p>\n<p>- K&iacute;ch thước&nbsp;m&agrave;n h&igrave;nh tivi 98 inch&nbsp;gi&uacute;p lấp đầy bức tường trống trải c&oacute; diện t&iacute;ch lớn trong kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ, h&agrave;nh lang rộng của bạn.&nbsp;&nbsp;</p>\n<p>-&nbsp;Tivi Samsung&nbsp;Ch&acirc;n đế bản to kiểu chữ T đặt ở giữa m&agrave;n h&igrave;nh, được chế t&aacute;c cứng c&aacute;p, gi&uacute;p n&acirc;ng đỡ tivi thăng bằng khi trưng b&agrave;y kiểu để b&agrave;n.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/303214/smart-tivi-qled-4k-75-inch-samsung-qa75q80c-190323-102100.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/303214/smart-tivi-qled-4k-75-inch-samsung-qa75q80c-190323-102100.jpg\"><img title=\"Smart Tivi QLED 4K 75 inch Samsung QA75Q80C - Tổng quan thiết kế\" src=\"https://cdn.tgdd.vn/Products/Images/1942/303214/smart-tivi-qled-4k-75-inch-samsung-qa75q80c-190323-102100.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - Tổng quan thiết kế\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/303214/smart-tivi-qled-4k-75-inch-samsung-qa75q80c-190323-102100.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>C&ocirc;ng nghệ h&igrave;nh ảnh</h3>\n<p>- Với 8 triệu điểm ảnh, m&agrave;n h&igrave;nh t&aacute;i tạo nội dung&nbsp;4K&nbsp;chi tiết, r&otilde; n&eacute;t.&nbsp;</p>\n<p>-&nbsp;Bộ xử l&yacute;<strong>&nbsp;Neural Quantum 4K AI</strong>&nbsp;với hệ thống 20 nơ-ron điều chỉnh h&igrave;nh ảnh, &acirc;m thanh v&agrave; nhiều yếu tố kh&aacute;c một c&aacute;ch th&ocirc;ng minh, n&acirc;ng cao chất lượng khung h&igrave;nh bằng tr&iacute; tuệ nh&acirc;n tạo để bạn được chi&ecirc;m ngưỡng khung h&igrave;nh tuyệt hảo.&nbsp;</p>\n<p>Mời bạn xem th&ecirc;m:&nbsp;Những độ ph&acirc;n giải m&agrave;n h&igrave;nh phổ biến hiện nay tr&ecirc;n tivi</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093409.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093409.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093409.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093409.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;Direct Full Array 8X, c&ocirc;ng nghệ tinh chỉnh c&aacute;c v&ugrave;ng đ&egrave;n LED nền tập trung ch&iacute;nh x&aacute;c, t&aacute;i tạo sắc đen s&acirc;u hơn, sắc trắng thuần khiết, cho bạn được tận hưởng h&igrave;nh ảnh s&aacute;ng r&otilde;, chi tiết ấn tượng.</p>\n<p>- C&ocirc;ng nghệ&nbsp;<strong>Real Depth Enhancer</strong>&nbsp;tăng độ tương phản, độ chi tiết cho chủ thể gi&uacute;p mang đến h&igrave;nh ảnh c&oacute; chiều s&acirc;u ch&acirc;n thực như mắt thường trực tiếp nh&igrave;n thấy.</p>\n<p>- M&agrave;u sắc&nbsp;tivi Samsung&nbsp;đạt ti&ecirc;u chuẩn chứng nhận&nbsp;<strong>PANTONE</strong>, c&ocirc;ng nghệ&nbsp;<strong>Quantum Dot</strong>&nbsp;t&aacute;i hiện 100% dải m&agrave;u sắc cho c&aacute;c thước phim m&agrave;u sắc sống động tự nhi&ecirc;n.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093413.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093413.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 1\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093413.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 1\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093413.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>- C&ocirc;ng nghệ&nbsp;Motion Xcelerator Turbo+&nbsp;gi&uacute;p bạn dẫn đầu cuộc chiến với tốc độ nhanh kh&ocirc;ng ngờ với c&aacute;c ph&acirc;n cảnh chuyển động mượt m&agrave; c&ugrave;ng tần số qu&eacute;t l&ecirc;n đến 120 Hz. C&ocirc;ng nghệ&nbsp;FreeSync Premium Pro&nbsp;giảm thiểu giật, x&eacute; h&igrave;nh, cho bạn chơi game cuồng nhiệt với h&igrave;nh ảnh HDR ch&acirc;n thực v&agrave; độ trễ thấp.</p>\n<p>Xem th&ecirc;m c&aacute;c c&ocirc;ng nghệ h&igrave;nh ảnh kh&aacute;c tr&ecirc;n&nbsp;Samsung QA98Q80C tại bảng th&ocirc;ng số kỹ thuật.&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093415.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093415.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 2\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093415.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 2\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093415.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>C&ocirc;ng nghệ &acirc;m thanh</h3>\n<p>-&nbsp;Smart tivi Samsung&nbsp;c&oacute; tổng c&ocirc;ng suất loa 40W cho &acirc;m thanh to r&otilde;, trung thực.&nbsp;</p>\n<p>-&nbsp;Dolby Atmos,&nbsp;c&ocirc;ng nghệ tạo n&ecirc;n &acirc;m thanh đa chiều lan tỏa rộng khắp kh&ocirc;ng gian, bao tr&ugrave;m mọi gi&aacute;c quan, từng m&agrave;n game diễn ra ch&acirc;n thật, sống động hơn.&nbsp;</p>\n<p>-&nbsp;OTS Lite&nbsp;gi&uacute;p người nghe được tận hưởng chất &acirc;m 3D l&ocirc;i cuốn giống như &acirc;m thanh tại rạp chiếu phim.</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093418.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093418.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093418.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093418.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p>-&nbsp;Q-Symphony 3.0&nbsp;bằng c&aacute;ch li&ecirc;n kết hệ thống loa tivi c&ugrave;ng loa thanh gi&uacute;p truyền tải chất &acirc;m mạnh mẽ, cho bữa tiệc &acirc;m nhạc th&ecirc;m s&ocirc;i động.</p>\n<p>- C&ocirc;ng nghệ&nbsp;AVA&nbsp;khuếch đại giọng thoại trong đoạn phim, chương tr&igrave;nh truyền h&igrave;nh để bạn lu&ocirc;n nghe r&otilde; nội dung c&aacute;c nh&acirc;n vật trao đổi ngay cả khi m&ocirc;i trường xung quanh ồn &agrave;o.</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093425.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093425.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 1\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093425.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - C&ocirc;ng nghệ &acirc;m thanh 1\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093425.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>Hệ điều h&agrave;nh</h3>\n<p>-&nbsp;Thiết lập hệ điều h&agrave;nh<strong>&nbsp;Tizen&trade;&nbsp;</strong>c&oacute; giao diện trực quan, sắp xếp c&aacute;c ph&acirc;n mục dễ d&agrave;ng nhận diện v&agrave; t&ugrave;y chọn theo nhu cầu giải tr&iacute; của bạn.</p>\n<p>- Thư viện ứng dụng đồ sộ, c&agrave;i đặt nhiều ứng dụng sẵn c&oacute; quen thuộc: YouTube, Netflix, Clip TV, FPT Play, MyTV, VieON, Spotify,...</p>\n<p>Xem th&ecirc;m:&nbsp;C&aacute;ch xem phim bằng tr&igrave;nh duyệt web tr&ecirc;n tivi&nbsp;</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093420.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093420.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - Hệ điều h&agrave;nh\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093420.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - Hệ điều h&agrave;nh\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093420.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<h3>Tiện &iacute;ch</h3>\n<p>-&nbsp;Google Duo&nbsp;cho người d&ugrave;ng dễ d&agrave;ng thực hiện c&aacute;c cuộc gọi video c&ugrave;ng gia đ&igrave;nh, đối t&aacute;c với chất lượng h&igrave;nh ảnh, &acirc;m thanh sắc n&eacute;t qua Samsung QA98Q80C. Lưu &yacute;, để sử dụng ứng dụng n&agrave;y, bạn cần mua th&ecirc;m camera.</p>\n<p>-&nbsp;<strong>Bixby&nbsp;</strong>(hỗ trợ tiếng Việt) cho ph&eacute;p bạn t&igrave;m kiếm c&aacute;c nội dung giải tr&iacute; bằng giọng n&oacute;i trực tiếp, kh&ocirc;ng cần thao t&aacute;c thủ c&ocirc;ng tr&ecirc;n remote mất thời gian.&nbsp;</p>\n<p>-&nbsp;Ứng dụng&nbsp;SmartThings&nbsp;kết nối đa dạng thiết bị, người d&ugrave;ng c&oacute; thể quản l&yacute; thống nhất c&aacute;c thiết bị th&ocirc;ng minh trong nh&agrave; dễ d&agrave;ng th&ocirc;ng qua m&agrave;n h&igrave;nh tivi.</p>\n<p>- T&iacute;nh năng&nbsp;<strong>Multi View</strong>&nbsp;tr&igrave;nh chiếu nhiều nội dung tr&ecirc;n m&agrave;n h&igrave;nh c&ugrave;ng l&uacute;c để bạn trải nghiệm giải tr&iacute; năng suất, tiết kiệm thời gian hơn.&nbsp;</p>\n<p>- Để thuận tiện cho việc thảo luận, l&agrave;m việc nh&oacute;m, bạn c&oacute; thể chia sẻ video, h&igrave;nh ảnh từ&nbsp;điện thoại&nbsp;l&ecirc;n tivi để c&ugrave;ng mọi người theo d&otilde;i v&agrave; l&agrave;m việc hiệu quả hơn nhờ c&oacute; t&iacute;nh năng&nbsp;AirPlay 2&nbsp;(iPhone),&nbsp;<strong>Screen Mirroring</strong>&nbsp;(Android),&nbsp;Tap View&nbsp;tiện dụng.</p>\n<p>Xem th&ecirc;m:&nbsp;C&aacute;ch sử dụng t&iacute;nh năng Multi View tr&ecirc;n tivi Samsung</p>\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093422.jpg\" data-cke-saved-href=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093422.jpg\"><img title=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - Tiện &iacute;ch\" src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093422.jpg\" alt=\"Smart Tivi QLED 4K 98 inch Samsung QA98Q80C - Tiện &iacute;ch\" data-cke-saved-src=\"https://cdn.tgdd.vn/Products/Images/1942/305837/smart-tivi-qled-4k-98-inch-samsung-qa98q80c-130423-093422.jpg\"></a></p>\n<p><em>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa sản phẩm</em></p>\n<p><em>T&oacute;m lại,&nbsp;Smart Tivi QLED 4K 98 inch Samsung QA98Q80C với k&iacute;ch thước m&agrave;n h&igrave;nh l&ecirc;n đến 98 inch, cho bạn được trải nghiệm nội dung 4K ho&agrave;n hảo được xử l&yacute; tối ưu bởi chip&nbsp;Neural Quantum 4K AI 20 nơ-ron, c&ocirc;ng nghệ Direct Full Array 8X, Motion Xcelerator Turbo+, Real Depth Enhancer, Dolby Atmos,... đi k&egrave;m đa dạng t&iacute;nh năng, hệ điều h&agrave;nh Tizen&trade; với kho ứng dụng phong ph&uacute;, lựa chọn tuyệt vời cho gia đ&igrave;nh Việt.</em></p>\n<p>Xem th&ecirc;m :&nbsp;Hướng dẫn d&ograve; k&ecirc;nh tr&ecirc;n Smart TV Samsung</p>', '<table>\n<tbody>\n<tr>\n<td>K&iacute;ch cỡ m&agrave;n h&igrave;nh:</td>\n<td>98 inch</td>\n</tr>\n<tr>\n<td>Độ ph&acirc;n giải:</td>\n<td>4K</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ h&igrave;nh ảnh:</td>\n<td>C&ocirc;ng nghệ Quantum Dot hiển thị 100% dải m&agrave;u<br>Bộ xử l&yacute; h&igrave;nh ảnh Neural Quantum 4K<br>C&ocirc;ng nghệ Quantum HDR+ (50&rdquo;: Quantum HDR)<br>C&ocirc;ng nghệ đ&egrave;n nền Direct Full Array 8X<br>C&ocirc;ng nghệ Supreme UHD Dimming<br>Motion Xcelerator Turbo+<br>Wide Viewing Angle<br>Real Dept Enhancer, EyeComfort</td>\n</tr>\n<tr>\n<td>Tần số qu&eacute;t thực:</td>\n<td>120 Hz</td>\n</tr>\n<tr>\n<td>C&ocirc;ng nghệ &acirc;m thanh:</td>\n<td>Object Tracking Sound với Dolby Atmos (OTS Pro)<br>Active Voice Amplifier (AVA)<br>Q Symphony 3.0, Adaptive Sound+</td>\n</tr>\n<tr>\n<td>Tổng c&ocirc;ng suất loa:</td>\n<td>40W</td>\n</tr>\n<tr>\n<td>Hệ điều h&agrave;nh:</td>\n<td>Tizen OS</td>\n</tr>\n<tr>\n<td>Ứng dụng phổ biến:</td>\n<td>Clip TV<br>YouTube<br>VieON<br>Tr&igrave;nh duyệt web<br>Spotify<br>POPS Kids<br>Netflix<br>MP3 Zing<br>MyTV<br>Galaxy Play (Fim+)<br>FPT Play</td>\n</tr>\n<tr>\n<td>T&iacute;nh năng th&ocirc;ng minh</td>\n<td>Điều khiển One Remote Control t&iacute;ch hợp Solar Cell Remote<br>Chế độ h&igrave;nh nền Ambient Mode+<br>Multi View, Multi Voice, Far Field Voice<br><strong>T&iacute;nh năng Game:</strong><br>FreeSync Premium Pro, Game Motion Plus<br>Auto Low Latency Mode<br>T&iacute;nh năng Super Ultrawide Game View v&agrave; Game Bar<br>Workspace, SmartThings, Tapview, Music Wall, Google Meet</td>\n</tr>\n<tr>\n<td>Kết nối Internet:</td>\n<td>Wifi</td>\n</tr>\n<tr>\n<td>Kết nối kh&ocirc;ng d&acirc;y:</td>\n<td>Bluetooth 5.2 (Kết nối loa, thiết bị di động)</td>\n</tr>\n<tr>\n<td>USB:</td>\n<td>2 cổng USB</td>\n</tr>\n<tr>\n<td>Cổng nhận h&igrave;nh ảnh, &acirc;m thanh:</td>\n<td>4 cổng HDMI</td>\n</tr>\n<tr>\n<td>Nơi sản xuất:</td>\n<td>Việt Nam</td>\n</tr>\n<tr>\n<td>Năm ra mắt:</td>\n<td>2023</td>\n</tr>\n<tr>\n<td>H&atilde;ng:</td>\n<td>Samsung.</td>\n</tr>\n</tbody>\n</table>', 'img/product_images/1717854574_QA98Q80C.jpg', '[\"img\\/product_images\\/1717854574_QA98Q80C_1.jpg\",\"img\\/product_images\\/1717854574_QA98Q80C_2.jpg\"]', '2024-06-26 03:12:51', '2024-07-01 01:19:45', 70000000);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Chưa phân loại', '2024-05-07 05:42:23', '2024-05-07 05:42:35'),
(1, 'dưới 48 inch', '2024-05-04 20:52:21', '2024-05-04 20:52:21'),
(2, 'từ 48 inch đến 55 inch', '2024-05-04 20:52:45', '2024-05-04 20:52:45'),
(3, 'từ 55 inch đến 65 inch', '2024-05-04 20:53:01', '2024-05-04 20:53:01'),
(4, 'trên 65 inch', '2024-05-04 20:53:15', '2024-05-04 20:53:15'),
(5, 'dưới 400 lít', '2024-05-04 20:54:21', '2024-05-04 20:54:21'),
(6, 'từ 400 lít đến 600 lít', '2024-05-04 20:54:37', '2024-05-04 20:54:37'),
(7, 'từ 600 lít đến 800 lít', '2024-05-04 20:54:51', '2024-05-04 20:54:51'),
(8, 'trên 800 lít', '2024-05-04 20:55:03', '2024-05-04 20:55:03'),
(9, 'dưới 8kg', '2024-05-04 20:55:38', '2024-05-04 20:57:04'),
(10, 'từ 8kg đến 15kg', '2024-05-04 20:55:54', '2024-05-04 20:55:54'),
(11, 'từ 15kg đến 20kg', '2024-05-04 20:56:12', '2024-05-04 20:56:12'),
(12, 'trên 20kg', '2024-05-04 20:56:23', '2024-05-04 20:56:23'),
(16, '1 HP ~ 9000 BTU', '2024-06-08 11:11:04', '2024-06-08 11:11:04'),
(17, '1.5 HP ~ 12.000 BTU', '2024-06-08 11:11:16', '2024-06-08 11:11:16'),
(18, '2 HP ~ 18.000 BTU', '2024-06-08 11:11:26', '2024-06-08 11:11:26'),
(19, '2.5 HP ~ 24.0000 BTU', '2024-06-08 11:11:39', '2024-06-08 11:11:39'),
(20, 'Từ 3 HP trở lên ~ Công suất lớn', '2024-06-08 11:11:55', '2024-06-08 11:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `address`) VALUES
(1, 'Duy Anh', 'nguyenduyanh.tit@gmail.com', NULL, '$2y$12$6p/gzu77poyKuT7ZUW0CT.qHt6RiaUaVOcSHpst4w7m1VveNJ1XfG', NULL, '2024-05-24 01:20:40', '2024-06-30 02:42:09', '0336775479', 'An Trạch 1, Quốc Tử Giám'),
(2, 'Kim Ngọc', 'luyen_ngoc_kim@yahoo.com', NULL, '$2y$12$onyJRXPeBXSuyECq.fkgKOHuq0BQU8NWh91ApNFKjRsS767t2JFZe', NULL, '2024-05-24 01:21:35', '2024-06-30 00:42:35', '0903208660', '2 Hào Nam, Đống Đa, Hà Nội'),
(3, 'test', 'test@test.com', NULL, '$2y$12$xOSTgkZHQe6vMuL5ywbZWO2.O6yH4z7We8zC/Y3Jk.8/8.7LjqLxG', NULL, '2024-06-03 18:08:55', '2024-06-03 18:08:55', NULL, NULL),
(4, 'Cơ', 'trongco@gmail.com', NULL, '$2y$12$tca7N1o7M43zDK5EzABAv.ezLlbFpn5iHEOwVqgKJQmZoMLZ6ScKy', NULL, '2024-06-11 03:17:22', '2024-06-11 03:17:22', '0913047388', NULL),
(5, 'Hồ Ngọc Ánh', 'hongocanh2202@gmail.com', NULL, '$2y$12$.9QgQcoWjE5y/JmdcwaJj.xT9ue7PzPrmKGjCHYWcDnAVMpA0fD.y', NULL, '2024-06-29 22:12:17', '2024-06-29 22:12:17', '0333671771', '210 Tân Mai, Hoàng Mai, Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_author_id_foreign` (`author_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_feature_id_foreign` (`feature_id`),
  ADD KEY `products_type_id_foreign` (`type_id`),
  ADD KEY `products_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `products_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
