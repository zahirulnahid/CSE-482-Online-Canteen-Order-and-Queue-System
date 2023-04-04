-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 03:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foodID` int(11) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `foodID`, `timestamp`) VALUES
(1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(2, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(3, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(4, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(5, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(6, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(7, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(8, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(9, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(10, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(11, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(12, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(13, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(14, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(15, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(16, 'zahirulnahid@gmail.com', 1, '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(11) NOT NULL,
  `Item_Name` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `Item_Name`, `Price`, `Description`, `Image_url`) VALUES
(1, 'Burger', 50, 'Vegetable Burger', 'https://www.thespruceeats.com/thmb/d4-3wLGWdWQrdsYmcgOgokNDOxg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/vegan-tofu-veggie-burgers-recipe-3377169-hero-01-a2dd40a53b1c4d3ba21625925cc9e28b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `verified` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `category`, `name`, `email`, `phone`, `password`, `verified`) VALUES
(17, 1, 'Md. Zahirul Islam Nahid', 'zahirulnahid@gmail.com', '01554518620', '25d55ad283aa400af464c76d713c07ad', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
