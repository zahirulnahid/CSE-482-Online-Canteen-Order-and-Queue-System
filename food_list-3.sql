-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2023 at 02:07 PM
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
(1, 'Burger', 100, 'A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!', '../images/Burger.png'),
(2, 'Chicken Biriyani', 90, 'A savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together.\r\n', '../images/Chicken Biriyani.png'),
(3, 'Chicken Curry', 70, 'A typical curry from the Indian subcontinent consists of chicken stewed in an onion- and tomato-based sauce\r\n', '../images/Chicken Curry.png'),
(4, 'Dhakaiya Kacchi', 110, 'Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat, rice, and potatoes are infused with delicious blends of aromatic spices.\r\n', '../images/Dhakaiya Kacchi.png'),
(5, 'Kala Bhuna', 80, 'Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful and tender dish prepared with chunks of beef and traditional spices\r\n', '../images/Kala Bhuna.png'),
(6, 'Khichuri', 40, 'Authentic bangali khichuri with all the original flavors of Bengal. Made of rice and lentils (dal) with numerous variations\r\n', '../images/Khichuri.png'),
(7, 'Pasta', 80, 'This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely bursting with flavour. It’s easy, creamy, hearty and delicious!.\r\n', '../images/Pasta.png'),
(8, 'Pizza', 90, 'consists of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella\r\n', '../images/Pizza.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
