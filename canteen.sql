-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 09:52 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amartabl_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `BILL`
--

CREATE TABLE `BILL` (
  `OrderID` int(11) NOT NULL,
  `Order_Date` varchar(30) NOT NULL,
  `Time` varchar(30) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `served` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BILL`
--

INSERT INTO `BILL` (`OrderID`, `Order_Date`, `Time`, `CustomerID`, `Total_Amount`, `served`) VALUES
(1, '2023-05-29', '7:54 am', 17, 110, 'yes'),
(2, '2023-05-29', '7:55 am', 17, 110, 'no'),
(3, '2023-05-29', '6:49 pm', 22, 110, 'yes'),
(4, '2023-05-29', '8:06 pm', 17, 220, 'no'),
(5, '2023-05-29', '8:09 pm', 25, 210, 'no'),
(6, '2023-05-29', '8:41 pm', 17, 110, 'no'),
(7, '2023-05-29', '8:44 pm', 17, 110, 'no'),
(8, '2023-05-29', '9:17 pm', 39, 800, 'no'),
(9, '2023-05-29', '9:31 pm', 22, 110, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `foodID` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `timestamp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `foodID`, `email`, `quantity`, `timestamp`) VALUES
(65, 6, 'Za@d.com', 1, NULL),
(66, 2, 'saiyem.raiyan@northsouth.edu', 1, NULL),
(67, 4, 'saiyem.raiyan@northsouth.edu', 1, NULL),
(79, 1, 'zahirulnahid@gmail.com', 1, NULL),
(84, 1, 'tanviribnehossain@gmail.com', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `category`) VALUES
(1, 'Beverage'),
(2, 'Fast Food'),
(3, 'Main Dish'),
(4, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(11) NOT NULL,
  `Item_Name` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `Image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `Item_Name`, `Price`, `Description`, `keywords`, `Image_url`) VALUES
(1, 'Burger', 110, 'A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!', '', 'images/Burger.png'),
(2, 'Chicken Biriyani', 100, 'A savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together.', '', 'images/Chicken Biriyani.png'),
(3, 'Chicken Curry', 80, 'A typical curry from the Indian subcontinent consists of chicken stewed in an onion- and tomato-based sauce', '', 'images/Chicken Curry.png'),
(4, 'Dhakaiya Kacchi', 110, 'Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat, rice, and potatoes are infused with delicious blends of aromatic spices.\r\n', '', 'images/Dhakaiya Kacchi.png'),
(5, 'Kala Bhuna', 90, 'Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful and tender dish prepared with chunks of beef and traditional spices', '', 'images/Kala Bhuna.png'),
(6, 'Khichuri', 40, 'Authentic bangali khichuri with all the original flavors of Bengal. Made of rice and lentils (dal) with numerous variations', '', 'images/Khichuri.png'),
(7, 'Pasta', 80, 'This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely bursting with flavour. Its easy, creamy, hearty and delicious!.', '', 'images/Pasta.png'),
(8, 'Pizza', 90, 'consists of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella\r\n', '', 'images/Pizza.png');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = unseen, 1 = seen',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 2', 1, '2023-05-23 12:48:40', '2023-05-23 12:48:40'),
(2, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 2', 1, '2023-05-23 12:48:43', '2023-05-23 12:48:43'),
(3, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 4', 1, '2023-05-23 12:52:01', '2023-05-23 12:52:01'),
(4, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 4', 1, '2023-05-23 12:52:09', '2023-05-23 12:52:09'),
(5, 26, '35', 'Yay! Order Ready.', 'Collect your food from counter 5', 1, '2023-05-23 12:53:43', '2023-05-23 12:53:43'),
(6, 19, '22', 'Hello', 'Enjoy your food', 1, '2023-05-23 12:54:53', '2023-05-23 12:54:53'),
(7, 19, '2', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:47', '2023-05-23 12:57:47'),
(8, 19, '17', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(9, 19, '18', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(10, 19, '22', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(11, 19, '24', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(12, 19, '25', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(13, 19, '26', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(14, 19, '28', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(15, 19, '29', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(16, 19, '30', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(17, 19, '31', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(18, 19, '33', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(19, 19, '34', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(20, 19, '35', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:57:48', '2023-05-23 12:57:48'),
(21, 19, '2', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:32', '2023-05-23 12:58:32'),
(22, 19, '17', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:32', '2023-05-23 12:58:32'),
(23, 19, '18', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(24, 19, '22', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(25, 19, '24', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(26, 19, '25', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(27, 19, '26', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(28, 19, '28', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(29, 19, '29', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(30, 19, '30', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(31, 19, '31', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(32, 19, '33', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(33, 19, '34', 'Lunch has arrived ', 'Order before its over', 0, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(34, 19, '35', 'Lunch has arrived ', 'Order before its over', 1, '2023-05-23 12:58:33', '2023-05-23 12:58:33'),
(35, 19, '22', 'Hello', 'Enjoy your food', 1, '2023-05-23 12:58:47', '2023-05-23 12:58:47'),
(36, 19, '25', 'Hello', 'Enjoy your food', 0, '2023-05-23 12:59:02', '2023-05-23 12:59:02'),
(37, 19, '25', 'Greetings ', 'Good afternoon ', 0, '2023-05-23 13:00:20', '2023-05-23 13:00:20'),
(38, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 2', 1, '2023-05-23 13:51:47', '2023-05-23 13:51:47'),
(39, 26, '22', 'Yay! Order Ready.', 'Collect your food from counter 5', 1, '2023-05-23 13:54:53', '2023-05-23 13:54:53'),
(40, 23, '2', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(41, 23, '17', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(42, 23, '18', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(43, 23, '22', 'Hello', 'Hello there', 1, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(44, 23, '24', 'Hello', 'Hello there', 1, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(45, 23, '25', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(46, 23, '26', 'Hello', 'Hello there', 1, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(47, 23, '28', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(48, 23, '29', 'Hello', 'Hello there', 0, '2023-05-23 13:58:54', '2023-05-23 13:58:54'),
(49, 23, '30', 'Hello', 'Hello there', 0, '2023-05-23 13:58:55', '2023-05-23 13:58:55'),
(50, 23, '31', 'Hello', 'Hello there', 0, '2023-05-23 13:58:55', '2023-05-23 13:58:55'),
(51, 23, '33', 'Hello', 'Hello there', 0, '2023-05-23 13:58:55', '2023-05-23 13:58:55'),
(52, 23, '34', 'Hello', 'Hello there', 0, '2023-05-23 13:58:55', '2023-05-23 13:58:55'),
(53, 23, '35', 'Hello', 'Hello there', 1, '2023-05-23 13:58:55', '2023-05-23 13:58:55'),
(54, 23, '2', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(55, 23, '17', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(56, 23, '18', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(57, 23, '22', 'test', 'hello', 1, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(58, 23, '24', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(59, 23, '25', 'test', 'hello', 1, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(60, 23, '26', 'test', 'hello', 1, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(61, 23, '28', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(62, 23, '29', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(63, 23, '30', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(64, 23, '31', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(65, 23, '33', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(66, 23, '34', 'test', 'hello', 0, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(67, 23, '35', 'test', 'hello', 1, '2023-05-23 13:59:15', '2023-05-23 13:59:15'),
(68, 19, '2', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(69, 19, '17', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(70, 19, '18', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(71, 19, '22', 'BB', 'say my name!!!!!', 1, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(72, 19, '24', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(73, 19, '25', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(74, 19, '26', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(75, 19, '28', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(76, 19, '29', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(77, 19, '30', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(78, 19, '31', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(79, 19, '33', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(80, 19, '34', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(81, 19, '35', 'BB', 'say my name!!!!!', 0, '2023-05-23 19:16:29', '2023-05-23 19:16:29'),
(82, 26, '18', 'Yay! Order Ready.', 'Collect your food from counter 2', 0, '2023-05-23 23:44:00', '2023-05-23 23:44:00'),
(83, 26, '34', 'Yay! Order Ready.', 'Collect your food from counter 5', 0, '2023-05-23 23:54:18', '2023-05-23 23:54:18'),
(84, 37, '25', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-29 07:47:52', '2023-05-29 07:47:52'),
(85, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:56:07', '2023-05-29 07:56:07'),
(86, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:57:15', '2023-05-29 07:57:15'),
(87, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:57:36', '2023-05-29 07:57:36'),
(88, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:57:38', '2023-05-29 07:57:38'),
(89, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:57:42', '2023-05-29 07:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `ItemID`, `Quantity`) VALUES
(1, 1, 2),
(2, 1, 1),
(1, 1, 1),
(2, 1, 1),
(3, 4, 1),
(4, 1, 2),
(5, 1, 1),
(5, 2, 1),
(6, 1, 1),
(7, 1, 1),
(8, 4, 2),
(8, 3, 2),
(8, 2, 2),
(8, 1, 2),
(9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Queue`
--

CREATE TABLE `Queue` (
  `QueueNo` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Queue`
--

INSERT INTO `Queue` (`QueueNo`, `OrderID`, `Counter`) VALUES
(2, 2, 3),
(4, 4, NULL),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, NULL),
(9, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SALES_REPORT`
--

CREATE TABLE `SALES_REPORT` (
  `ItemID` int(11) NOT NULL,
  `Units_Sold` int(11) NOT NULL,
  `Total_Revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SALES_REPORT`
--

INSERT INTO `SALES_REPORT` (`ItemID`, `Units_Sold`, `Total_Revenue`) VALUES
(1, 75, 7740),
(2, 44, 3950),
(3, 32, 2420),
(4, 34, 3740),
(5, 49, 3990),
(6, 102, 4080),
(7, 26, 2080),
(8, 21, 1890);

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
  `verified` varchar(255) NOT NULL DEFAULT 'pending',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `category`, `name`, `email`, `phone`, `password`, `verified`, `token`) VALUES
(2, 2, 'a', 'a', '2', 'a', 'true', ''),
(17, 1, 'Md. Zahirul Islam Nahid', 'zahirulnahid@gmail.com', '01554518620', '25d55ad283aa400af464c76d713c07ad', 'true', '39f2de56a3018a3a62e3409cab923db6'),
(18, 1, 'Ayman', 'ayman@nsu.edu', '01971742000', '1bbd886460827015e5d605ed44252251', 'true', ''),
(19, 4, 'admin', 'admin@nsu.edu', '11111111111', '1bbd886460827015e5d605ed44252251', 'true', ''),
(22, 1, 'Nafis', 'nafis@gmail.com', '11111111111', '1bbd886460827015e5d605ed44252251', 'true', ''),
(23, 4, 'admin', 'admin@admin.com', '01789400704', '25d55ad283aa400af464c76d713c07ad', 'true', ''),
(24, 1, 'nafis ', 'nafis@gmail.com', '11111111111', 'bbb8aae57c104cda40c93843ad5e6db8', 'true', ''),
(25, 1, 'Labib', 'labib@gmail.com', '01774881164', '25d55ad283aa400af464c76d713c07ad', 'true', '576a753d9d473a0b40bdf459f67d8ce1'),
(28, 3, 'ss', 's@gmail.com', '05879654126', '25d55ad283aa400af464c76d713c07ad', 'true', ''),
(29, 1, 'sas3', 'sas3@nsu.edu', '01919191911', '25d55ad283aa400af464c76d713c07ad', 'true', ''),
(31, 1, 'Saiyem Raiyan', 'saiyem.raiyan@northsouth.edu', '01701305658', 'df6f58808ebfd3e609c234cf2283a989', 'true', ''),
(33, 1, 'Walter White', 'walter@gmail.com', '01928366792', '57ba172a6be125cca2f449826f9980ca', 'true', ''),
(34, 1, 'BR0om', 'wamalihir@gmail.com', '01671401476', 'c9425c17bfd5261d08116cd9434825e8', 'true', ''),
(35, 1, 'Cristiano Ronaldo', 'cr7@siu.com', '77777777777', '30e535568de1f9231e7d9df0f4a5a44d', 'true', ''),
(36, 3, 'waiter', 'waiter@nsu.com', '11111111111', 'e82d611b52164e7474fd1f3b6d2c68db', 'pending', ''),
(37, 3, 'Staff', 'staff@nsu.edu', '22223333213', 'bae5e3208a3c700e3db642b6631e95b9', 'pending', ''),
(38, 3, 'S', 'ss@gmail.com', '11111111111', '25d55ad283aa400af464c76d713c07ad', 'pending', ''),
(39, 1, 'Tanvir Ibne Hossain', 'tanviribnehossain@gmail.com', '01952267339', 'f786322a0210167b248d53baa67b59bb', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `category`) VALUES
(1, 'Student'),
(2, 'Faculty'),
(3, 'Staff'),
(4, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BILL`
--
ALTER TABLE `BILL`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodID` (`foodID`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Queue`
--
ALTER TABLE `Queue`
  ADD PRIMARY KEY (`QueueNo`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `SALES_REPORT`
--
ALTER TABLE `SALES_REPORT`
  ADD UNIQUE KEY `ItemID` (`ItemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BILL`
--
ALTER TABLE `BILL`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `Queue`
--
ALTER TABLE `Queue`
  MODIFY `QueueNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BILL`
--
ALTER TABLE `BILL`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`foodID`) REFERENCES `food_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
