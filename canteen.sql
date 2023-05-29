-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2023 at 02:27 PM
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
(1, '2023-04-05', '', 18, 220, 'yes'),
(2, '2023-04-07', '', 17, 180, 'yes'),
(3, '2023-04-05', '', 17, 100, 'yes'),
(24, '2023-04-29', '', 2, 999, 'yes'),
(25, '2023-04-29', '', 2, 999, 'yes'),
(26, '2023-04-29', '', 2, 999, 'yes'),
(27, '2023-04-29', '', 2, 999, 'yes'),
(28, '2023-04-29', '', 2, 999, 'yes'),
(29, '2023-04-29', '', 2, 999, 'yes'),
(30, '2023-04-29', '', 18, 720, 'yes'),
(31, '2023-04-29', '', 18, 299, 'yes'),
(32, '2023-04-29', '', 18, 299, 'yes'),
(33, '2023-04-29', '', 18, 720, 'yes'),
(34, '2023-04-29', '', 18, 720, 'yes'),
(35, '2023-04-29', '', 18, 300, 'yes'),
(36, '2023-04-30', '', 18, 210, 'yes'),
(37, '2023-04-30', '', 18, 220, 'yes'),
(38, '2023-04-30', '', 18, 70, 'yes'),
(39, '2023-05-06', '', 18, 310, 'yes'),
(40, '2023-05-07', '', 18, 200, 'yes'),
(41, '2023-05-08', '10:13 pm', 18, 120, 'yes'),
(42, '2023-05-08', '10:18 pm', 18, 70, 'yes'),
(43, '2023-05-08', '10:27 pm', 18, 260, 'yes'),
(44, '2023-05-20', '5:07 pm', 18, 160, 'yes'),
(45, '2023-05-20', '6:02 pm', 18, 290, 'yes'),
(46, '2023-05-20', '6:23 pm', 18, 370, 'yes'),
(47, '2023-05-20', '6:27 pm', 18, 230, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `foodID` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `foodID`, `email`, `quantity`, `timestamp`) VALUES
(1, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(2, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(3, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(4, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(5, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(6, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(7, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(8, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(9, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(10, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(11, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(12, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(13, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(14, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(15, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(16, 1, 'zahirulnahid@gmail.com', 1, '2023-04-04');

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
(1, 'Burger', 100, 'A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!', '', 'images/Burger.png'),
(2, 'Chicken Biriyani', 90, 'A savory chicken and rice dish that includes layers of chicken, rice, and aromatics that are steamed together.\r\n', '', 'images/Chicken Biriyani.png'),
(3, 'Chicken Curry', 70, 'A typical curry from the Indian subcontinent consists of chicken stewed in an onion- and tomato-based sauce\r\n', '', 'images/Chicken Curry.png'),
(4, 'Dhakaiya Kacchi', 110, 'Introducing the spicy and tender dhakaiya kacchi where l,ayers of meat, rice, and potatoes are infused with delicious blends of aromatic spices.\r\n', '', 'images/Dhakaiya Kacchi.png'),
(5, 'Kala Bhuna', 80, 'Authentic and spicy chatgaiya beef kalabhuna. Exclusive dark, flavourful and tender dish prepared with chunks of beef and traditional spices\r\n', '', 'images/Kala Bhuna.png'),
(6, 'Khichuri', 40, 'Authentic bangali khichuri with all the original flavors of Bengal. Made of rice and lentils (dal) with numerous variations\r\n', '', 'images/Khichuri.png'),
(7, 'Pasta', 80, 'This Spicy Chicken Pasta is the perfect level of spice, whilst absolutely bursting with flavour. It’s easy, creamy, hearty and delicious!.\r\n', '', 'images/Pasta.png'),
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
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = unseen, 1 = seen',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1),
(1, 6, 1),
(1, 5, 1),
(2, 8, 2),
(32, 1, 3),
(32, 6, 4),
(32, 2, 2),
(32, 5, 1),
(33, 1, 3),
(33, 6, 4),
(33, 2, 2),
(33, 5, 1),
(34, 1, 3),
(34, 6, 4),
(34, 2, 2),
(34, 5, 1),
(35, 2, 1),
(35, 1, 1),
(35, 4, 1),
(36, 8, 1),
(36, 6, 1),
(36, 5, 1),
(37, 4, 2),
(38, 3, 1),
(39, 2, 3),
(39, 6, 1),
(40, 1, 2),
(40, 2, 0),
(41, 6, 1),
(42, 3, 1),
(43, 2, 2),
(44, 2, 1),
(44, 3, 1),
(45, 8, 2),
(45, 6, 1),
(45, 3, 1),
(46, 7, 1),
(46, 8, 1),
(46, 1, 2),
(47, 6, 1),
(47, 5, 1),
(47, 4, 1);

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
(9, 40, 0);

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
(1, 50, 5000),
(2, 27, 2250),
(3, 14, 980),
(4, 4, 440),
(5, 42, 3360),
(6, 95, 3800),
(7, 11, 880),
(8, 4, 360);

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
(2, 2, 'a', 'a', '2', 'a', 'true'),
(17, 1, 'Md. Zahirul Islam Nahid', 'zahirulnahid@gmail.com', '01554518620', '25d55ad283aa400af464c76d713c07ad', 'true'),
(18, 1, 'Ayman', 'ayman@nsu.edu', '11111111111', '1bbd886460827015e5d605ed44252251', 'true'),
(19, 4, 'admin', 'admin@nsu.edu', '11111111111', '1bbd886460827015e5d605ed44252251', 'true'),
(20, 3, 'kashundi', 'staff@nsu.edu', '11111111222', '1bbd886460827015e5d605ed44252251', 'true');

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
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Queue`
--
ALTER TABLE `Queue`
  MODIFY `QueueNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BILL`
--
ALTER TABLE `BILL`
  ADD CONSTRAINT `BILL_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`foodID`) REFERENCES `food_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
