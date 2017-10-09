-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 06:40 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `part_number` int(11) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `cost_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `vat_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `part_number`, `description`, `image`, `stock_quantity`, `cost_price`, `selling_price`, `vat_rate`) VALUES
(1, 54312332, 'biig tool            3                                                                                    ', 'https://shinesg.files.wordpress.com/2014/01/big_hilti.jpg', 22, 9999, 999993, 233),
(2, 323, 'bigest tool            ', 'https://previews.123rf.com/images/johan2011/johan20111106/johan2011110600118/10069140-3d-little-human-character-with-a-big-tool-Stock-Photo-mechanical-cartoon.jpg', 12, 323, 33333, 123),
(3, 3123, 'biig tool            ', 'https://shinesg.files.wordpress.com/2014/01/big_hilti.jpg', 22, 9999, 99999, 44),
(9, 0, '', '', 0, 0, 0, 0),
(13, 232, '           fdsfdsfdsf', 'http://pediaa.com/wp-content/uploads/2014/11/What-is-the-Difference-Between-Tools-and-Equipment.jpg', 434, 4444, 222222, 323232323),
(14, 232, '           fdsfdsfdsf', 'http://pediaa.com/wp-content/uploads/2014/11/What-is-the-Difference-Between-Tools-and-Equipment.jpg', 434, 4444, 222222, 323232323);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
