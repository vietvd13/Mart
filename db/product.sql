-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2020 at 01:50 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_img` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_img`, `product_name`, `brand_id`, `product_price`) VALUES
(7, '379000_9_png', 'Mỳ Omachi tôm chua cay', 9, 379000),
(8, '791000_9_png', 'Mỳ Bò Koreno', 13, 791000),
(9, '369000_9_png', 'Mỳ Omachi sườn', 9, 369000),
(10, '1187000_15_png', 'Mỳ Samyang gà cay', 15, 1187000),
(11, '316000_13_png', 'Mỳ Đen Koreno', 13, 316000),
(13, '202000_11_png', 'Mỳ Inodemie', 11, 202000),
(14, '161000_10_png', 'Mỳ Kokomi Đại', 10, 161000),
(15, '112000_16_png', 'Mỳ Hảo Hảo chua cay', 16, 112000),
(16, '121000_16_png', 'Mỳ Hảo Hảo Xào', 16, 121000),
(18, '17400_12_png', 'Mì Mama hương thịt heo bằm', 12, 17400),
(19, '107000_14_png', 'Mì Nissan lẩu thái hải sản', 14, 107000),
(20, '10200_17_png', 'Mì udon vị cà ri New Way', 17, 10200),
(21, '225000_18_jpg', 'Mì KOKA Tom Yom', 18, 225000),
(22, '6600_19_png', 'Mì Đệ Nhất thịt bằm', 19, 6600),
(23, '12000_20_png', 'Mì lẩu Thái Nhớ mãi mãi', 20, 12000),
(24, '257000_21_png', 'Mì ramen miso rong biển Vifon', 21, 257000),
(25, '90000_22_png', 'Mì Trứng Vàng hương vị tôm chua cay', 22, 90000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
