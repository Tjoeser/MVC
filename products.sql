-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 02:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(6) NOT NULL,
  `product_type_code` int(6) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `other_product_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
(1, 3, 4, 'kaasje', '2.00', 'jong belegen'),
(2, 4, 16, 'ham', '1.00', 'yorkhametje'),
(4, 5, 6, 'tosti', '30.00', 'tostie met ham en kaas en pindasaus'),
(5, 5, 4, 'pindasays', '1610.00', 'gwn pindasaus met 4 pompen'),
(6, 7, 89, 'ketchup', '3.50', 'rood'),
(7, 5, 6, 'Curry', '1.20', 'curry underrated met een tosti'),
(10, 3, 4, 'pannekoek', '0.69', 'gewoon een naturel pannekoek'),
(11, 4, 4, 'pannekoek met spek', '0.00', 'pannekoek met spekk hemmmm yummmyyy'),
(12, 4, 4, 'pannekoek met koe', '9999.99', 'PAANNNEKOEK MET KOE!! WATAFACK'),
(13, 4, 4, 'baby klm vliegtuigje', '100.00', 'wat een lief ding'),
(14, 40, 5, 'pannekoek met appel', '20.00', 'gewoon een zalige appelkoek met pan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
