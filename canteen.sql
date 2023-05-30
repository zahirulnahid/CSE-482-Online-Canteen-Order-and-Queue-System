-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2023 at 10:33 PM
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
-- Database: `canteen`
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
(9, '2023-05-29', '9:31 pm', 22, 110, 'no'),
(10, '2023-05-29', '9:59 pm', 18, 80, 'yes'),
(11, '2023-05-29', '10:08 pm', 40, 220, 'no'),
(12, '2023-05-29', '10:09 pm', 42, 110, 'yes'),
(13, '2023-05-29', '10:31 pm', 45, 120, 'no'),
(14, '2023-05-29', '10:41 pm', 45, 120, 'no'),
(15, '2023-05-29', '10:53 pm', 22, 100, 'yes'),
(16, '2023-05-29', '11:25 pm', 48, 325, 'no'),
(17, '2023-05-29', '11:46 pm', 49, 250, 'no'),
(18, '2023-05-30', '6:43 am', 17, 250, 'yes'),
(19, '2023-05-30', '10:59 am', 25, 125, 'no'),
(20, '2023-05-30', '12:42 pm', 18, 240, 'yes'),
(21, '2023-05-30', '12:48 pm', 18, 60, 'no'),
(22, '2023-05-30', '12:49 pm', 18, 60, 'no'),
(23, '2023-05-30', '12:51 pm', 18, 60, 'no'),
(24, '2023-05-30', '1:12 pm', 22, 120, 'no');

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
(84, 1, 'tanviribnehossain@gmail.com', 2, NULL);

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
(1, 'Burger', 125, 'A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!', '', 'images/Burger.png'),
(2, 'Chicken Biriyani', 100, 'A savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together.', '', 'images/Chicken Biriyani.png'),
(3, 'Chicken Curry', 80, 'A typical curry from the Indian subcontinent consists of chicken stewed in an onion- and tomato-based sauce', '', 'images/Chicken Curry.png'),
(4, 'Dhakaiya Kacchi', 110, 'Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat, rice, and potatoes are infused with delicious blends of aromatic spices.\r\n', '', 'images/Dhakaiya Kacchi.png'),
(5, 'Kala Bhuna', 90, 'Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful and tender dish prepared with chunks of beef and traditional spices', '', 'images/Kala Bhuna.png'),
(6, 'Khichuri', 40, 'Authentic bangali khichuri with all the original flavors of Bengal. Made of rice and lentils (dal) with numerous variations', '', 'images/Khichuri.png'),
(7, 'Pasta', 80, 'This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely bursting with flavour. Its easy, creamy, hearty and delicious!.', '', 'images/Pasta.png'),
(8, 'Pizza', 90, 'consists of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella\r\n', '', 'images/Pizza.png'),
(9, 'Mughlai paratha', 60, 'Mughlai paratha is a popular Bengali street food consisting of a flatbread (paratha) wrapped around or stuffed with keema (spiced minced meat)', '', 'https://s3-ap-south-1.amazonaws.com/betterbutterbucket-silver/ananya-gupta020170622193758464.jpeg');

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
(89, 37, '17', 'Yay! Order Ready.', 'Collect your food from counter 3', 0, '2023-05-29 07:57:42', '2023-05-29 07:57:42'),
(90, 44, '42', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-29 22:17:16', '2023-05-29 22:17:16'),
(91, 47, '22', 'Yay! Order Ready.', 'Collect your food from counter 2', 0, '2023-05-29 23:04:38', '2023-05-29 23:04:38'),
(92, 47, '17', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 06:51:38', '2023-05-30 06:51:38'),
(93, 23, '17', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(94, 23, '18', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(95, 23, '22', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(96, 23, '24', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(97, 23, '25', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(98, 23, '28', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(99, 23, '31', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(100, 23, '33', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(101, 23, '34', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(102, 23, '35', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(103, 23, '39', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(104, 23, '40', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(105, 23, '42', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(106, 23, '43', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(107, 23, '45', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(108, 23, '46', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(109, 23, '47', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(110, 23, '48', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(111, 23, '49', 'Test', 'Final', 0, '2023-05-30 10:52:27', '2023-05-30 10:52:27'),
(112, 23, '25', 'Test 123', 'Message 222', 1, '2023-05-30 11:00:38', '2023-05-30 11:00:38'),
(113, 23, '25', '1', '2', 0, '2023-05-30 11:01:04', '2023-05-30 11:01:04'),
(114, 23, '25', 'Xyz', '123', 0, '2023-05-30 11:01:38', '2023-05-30 11:01:38'),
(115, 23, '25', '123', '5555', 0, '2023-05-30 11:03:50', '2023-05-30 11:03:50'),
(116, 23, '17', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(117, 23, '18', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(118, 23, '22', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(119, 23, '24', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(120, 23, '25', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(121, 23, '28', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(122, 23, '31', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(123, 23, '33', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(124, 23, '34', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(125, 23, '35', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(126, 23, '39', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(127, 23, '40', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(128, 23, '42', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(129, 23, '43', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(130, 23, '45', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(131, 23, '46', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(132, 23, '47', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(133, 23, '48', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(134, 23, '49', 'Test', 'Tesr123', 0, '2023-05-30 12:04:29', '2023-05-30 12:04:29'),
(135, 47, '18', 'Yay! Order Ready.', 'Collect your food from counter 2', 0, '2023-05-30 12:42:36', '2023-05-30 12:42:36'),
(136, 47, '22', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 13:29:20', '2023-05-30 13:29:20'),
(137, 47, '22', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 13:29:38', '2023-05-30 13:29:38'),
(138, 47, '22', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 13:30:23', '2023-05-30 13:30:23'),
(139, 47, '22', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 13:45:01', '2023-05-30 13:45:01'),
(140, 47, '18', 'Yay! Order Ready.', 'Collect your food from counter 1', 0, '2023-05-30 13:46:06', '2023-05-30 13:46:06'),
(141, 19, '18', 'Hi babu bhai', 'Kemon achen', 0, '2023-05-30 14:03:43', '2023-05-30 14:03:43'),
(142, 19, '17', 'Hi mr.ceo', 'Mon kharap naki boss', 0, '2023-05-30 14:04:12', '2023-05-30 14:04:12'),
(143, 19, '17', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(144, 19, '18', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(145, 19, '22', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(146, 19, '25', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(147, 19, '31', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(148, 19, '39', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(149, 19, '40', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(150, 19, '42', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(151, 19, '43', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(152, 19, '47', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43'),
(153, 19, '48', 'Khida paise', 'khida paise', 0, '2023-05-30 14:08:43', '2023-05-30 14:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `ItemID`, `Quantity`, `Price`) VALUES
(1, 1, 2, 125),
(2, 1, 1, 125),
(1, 1, 1, 125),
(2, 1, 1, 125),
(3, 4, 1, 110),
(4, 1, 2, 125),
(5, 1, 1, 125),
(5, 2, 1, 100),
(6, 1, 1, 125),
(7, 1, 1, 125),
(8, 4, 2, 110),
(8, 3, 2, 80),
(8, 2, 2, 100),
(8, 1, 2, 125),
(9, 1, 1, 125),
(10, 7, 1, 80),
(11, 1, 2, 125),
(12, 1, 1, 125),
(13, 1, 1, 125),
(14, 1, 1, 125),
(15, 2, 1, 100),
(16, 2, 2, 100),
(16, 1, 1, 125),
(17, 1, 2, 125),
(18, 1, 2, 125),
(19, 1, 1, 125),
(20, 9, 4, 60),
(23, 9, 1, 60),
(24, 9, 2, 60);

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
(9, 9, NULL),
(11, 11, NULL),
(13, 13, NULL),
(14, 14, NULL),
(16, 16, NULL),
(17, 17, NULL),
(19, 19, NULL),
(21, 21, NULL),
(22, 22, NULL),
(23, 23, 1),
(24, 24, 1);

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
(1, 86, 9060),
(2, 47, 4250),
(3, 32, 2420),
(4, 34, 3740),
(5, 49, 3990),
(6, 102, 4080),
(7, 27, 2160),
(8, 21, 1890),
(9, 4, 240);

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
(17, 1, 'Md. Zahirul Islam Nahid', 'zahirulnahid@gmail.com', '01554518620', '25d55ad283aa400af464c76d713c07ad', 'true', '39f2de56a3018a3a62e3409cab923db6'),
(18, 1, 'Ayman', 'ayman@nsu.edu', '01971742000', '1bbd886460827015e5d605ed44252251', 'true', ''),
(19, 4, 'admin', 'admin@nsu.edu', '11111111111', '25d55ad283aa400af464c76d713c07ad', 'true', '73af54e314a0407fee4ad5327fc307e2'),
(22, 1, 'Nafis', 'nafis@gmail.com', '01531216024', '25d55ad283aa400af464c76d713c07ad', 'true', '95c392ad991d137cf433b82777ec9ee1'),
(23, 4, 'admin', 'admin@admin.com', '01789400704', '25d55ad283aa400af464c76d713c07ad', 'deactive', '15d1047c5160b10bf452023238f5707c'),
(24, 1, 'nafis ', 'nafis@gmail.com', '11111111111', 'bbb8aae57c104cda40c93843ad5e6db8', 'deactive', '95c392ad991d137cf433b82777ec9ee1'),
(25, 1, 'Labib', 'labib@gmail.com', '01774881164', '25d55ad283aa400af464c76d713c07ad', 'true', 'b274ed0dffd2fc7a36cce9f5a42a0a69'),
(28, 3, 'ss', 's@gmail.com', '05879654126', '25d55ad283aa400af464c76d713c07ad', 'deactive', ''),
(31, 1, 'Saiyem Raiyan', 'saiyem.raiyan@northsouth.edu', '01701305658', 'df6f58808ebfd3e609c234cf2283a989', 'true', ''),
(33, 1, 'Walter White', 'walter@gmail.com', '01928366792', '57ba172a6be125cca2f449826f9980ca', 'deactive', ''),
(34, 1, 'BR0om', 'wamalihir@gmail.com', '01671401476', 'c9425c17bfd5261d08116cd9434825e8', 'deactive', ''),
(35, 1, 'Cristiano Ronaldo', 'cr7@siu.com', '77777777777', '30e535568de1f9231e7d9df0f4a5a44d', 'deactive', ''),
(39, 1, 'Tanvir Ibne Hossain', 'tanviribnehossain@gmail.com', '01952267339', 'f786322a0210167b248d53baa67b59bb', 'true', ''),
(40, 1, 'Toufique', 'toufiquehossain716@gmail.com', '01738893999', '25d55ad283aa400af464c76d713c07ad', 'true', '4b0c83649efa5411cd8fb39eb093a25a'),
(42, 1, 'Prantor Biswas ', 'prantor.playstore@gmail.com', '01708018367', '85726bbd56ea28c44a17102339ef8f4a', 'true', '44eb528754891b58b6dd6a911f07f519'),
(43, 1, 'Prantor Biswas ', 'prantor.playstore@gmail.com', '01708018367', '85726bbd56ea28c44a17102339ef8f4a', 'true', '44eb528754891b58b6dd6a911f07f519'),
(45, 1, 'Z', 'z@gmail.com', '01757994513', '25d55ad283aa400af464c76d713c07ad', 'deactive', '884c9ff5e2edae1e43d34db5c3470485'),
(46, 1, 'Z', 'z@gmail.com', '01757994513', '25d55ad283aa400af464c76d713c07ad', 'deactive', '884c9ff5e2edae1e43d34db5c3470485'),
(47, 3, 'staff', 'staff@nsu.edu', '22222222222', '25d55ad283aa400af464c76d713c07ad', 'true', ''),
(48, 1, 'Toufique Husein', 'toufique.husein@northsouth.edu', '01712368159', '25d55ad283aa400af464c76d713c07ad', 'true', ''),
(49, 1, 'red hunter', '420redhunter@gmail.com', '01857601044', '25d55ad283aa400af464c76d713c07ad', 'deactive', '372a60c9806bd3672ee78f4cdf12ea0e'),
(52, 1, 'Tamim Iqbal', 't.iqbal@gmail.com', '29992828112', '25d55ad283aa400af464c76d713c07ad', 'deactive', '');

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
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `Queue`
--
ALTER TABLE `Queue`
  MODIFY `QueueNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
