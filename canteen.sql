-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2023 at 10:17 PM
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
  `Order_Date` date NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BILL`
--

INSERT INTO `BILL` (`OrderID`, `Order_Date`, `CustomerID`, `Total_Amount`) VALUES
(1, '2023-04-05', 18, 220),
(2, '2023-04-07', 17, 180);

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
(16, 'zahirulnahid@gmail.com', 1, '2023-04-04'),
(17, 'ayman@nsu.edu', 1, '2023-04-04'),
(18, 'ayman@nsu.edu', 2, '2023-04-04'),
(19, 'ayman@nsu.edu', 3, '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `QUEUE`
--

CREATE TABLE `QUEUE` (
  `QueueNo` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `QUEUE`
--

INSERT INTO `QUEUE` (`QueueNo`, `OrderID`) VALUES
(1, 1),
(2, 2);

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
(1, 15, 1500),
(7, 10, 800),
(6, 50, 2000),
(5, 30, 2400);

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
(17, 1, 'Md. Zahirul Islam Nahid', 'zahirulnahid@gmail.com', '01554518620', '25d55ad283aa400af464c76d713c07ad', 'pending'),
(18, 1, 'Ayman', 'ayman@nsu.edu', '11111111111', '1bbd886460827015e5d605ed44252251', 'pending');

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `QUEUE`
--
ALTER TABLE `QUEUE`
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `SALES_REPORT`
--
ALTER TABLE `SALES_REPORT`
  ADD KEY `ItemID` (`ItemID`);

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
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BILL`
--
ALTER TABLE `BILL`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `users` (`id`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `BILL` (`OrderID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `FOOD_LIST` (`id`);

--
-- Constraints for table `QUEUE`
--
ALTER TABLE `QUEUE`
  ADD CONSTRAINT `queue_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`);

--
-- Constraints for table `SALES_REPORT`
--
ALTER TABLE `SALES_REPORT`
  ADD CONSTRAINT `sales_report_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `FOOD_LIST` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
