-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2023 at 06:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `FOOD_LIST`
--

CREATE TABLE `FOOD_LIST` (
  `Item_Name` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FOOD_LIST`
--

INSERT INTO `FOOD_LIST` (`Item_Name`, `Price`, `Description`, `Image_url`) VALUES
('Burger', 100, 'Non vegan', '[value-4]'),
('Chicken Biriyani', 90, 'A savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together.\r\n', ''),
('Chicken Curry', 70, 'A typical curry from the Indian subcontinent consists of chicken stewed in an onion- and tomato-based sauce\r\n', '[value-4]'),
('Dhakaiya Kacchi', 110, 'Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat, rice, and potatoes are infused with delicious blends of aromatic spices.\r\n', ''),
('Kala Bhuna', 80, 'Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful and tender dish prepared with chunks of beef and traditional spices\r\n', ''),
('Khichuri', 40, 'Authentic bangali khichuri with all the original flavors of Bengal. Made of rice and lentils (dal) with numerous variations\r\n', ''),
('Pasta', 80, 'This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely bursting with flavour. It’s easy, creamy, hearty and delicious!.\r\n', ''),
('Pizza', 90, 'consists of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella\r\n', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FOOD_LIST`
--
ALTER TABLE `FOOD_LIST`
  ADD PRIMARY KEY (`Item_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
