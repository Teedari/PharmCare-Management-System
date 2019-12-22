-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 12:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Medicine', ''),
(2, 'Injection', ''),
(3, 'Other', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `batchNo` int(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `shelf` varchar(100) NOT NULL,
  `buyPrice` double DEFAULT NULL,
  `sellPrice` double DEFAULT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `batchNo`, `category`, `shelf`, `buyPrice`, `sellPrice`, `expDate`) VALUES
(2, 'injection 21 MG100', 1123, 'Injection', '2', 3, 5, '2019-05-31'),
(3, 'Paracetamol', 1122, 'Medicine', '1', 1, 3, '2019-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `batchNo` int(100) DEFAULT NULL,
  `totalQuantity` int(100) DEFAULT NULL,
  `sellPrice` int(100) DEFAULT NULL,
  `buyPrice` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `batchNo`, `totalQuantity`, `sellPrice`, `buyPrice`) VALUES
(1, 'Paracetamol', 1122, 10, 3, 1),
(2, 'injection 21 MG100', 1123, 3353, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `purchaseCode` int(200) NOT NULL,
  `supName` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `grandTotal` double DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchaseCode`, `supName`, `paymentMethod`, `grandTotal`, `status`) VALUES
(3, 3, 'supplier 2', 'check', 1000, 'paid'),
(4, 4, 'supplier', 'check', 3000, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `salesCode` int(200) NOT NULL,
  `customer` varchar(225) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `grandTotal` double DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `salesCode`, `customer`, `paymentMethod`, `grandTotal`, `status`, `date`) VALUES
(1, 1, 'customer 1', 'cash', 1000, 'paid', '0000-00-00'),
(2, 2, '', 'cash', 4000, 'paid', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `saleslist`
--

CREATE TABLE `saleslist` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `batchNo` int(100) DEFAULT NULL,
  `salesCode` int(100) DEFAULT NULL,
  `customer` varchar(255) NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `sellPrice` int(100) DEFAULT NULL,
  `buyPrice` int(100) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleslist`
--

INSERT INTO `saleslist` (`id`, `name`, `batchNo`, `salesCode`, `customer`, `quantity`, `amount`, `sellPrice`, `buyPrice`, `date`) VALUES
(1, 'Paracetamol', 1122, 1, 'customer 1', 200, 200, 3, 1, '2019-05-30'),
(2, 'Paracetamol', 1122, 1, 'customer 1', 200, 200, 3, 1, '2019-05-30'),
(3, 'injection 21 MG100', 1123, 1, 'customer 1', 200, 600, 5, 3, '2019-05-30'),
(4, 'Paracetamol', 1122, 2, 'customer 2', 1000, 1000, 3, 1, '2019-05-30'),
(5, 'injection 21 MG100', 1123, 2, 'customer 2', 1000, 3000, 5, 3, '2019-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `salesproducts`
--

CREATE TABLE `salesproducts` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `batchNo` int(100) DEFAULT NULL,
  `totalQuantity` int(100) DEFAULT NULL,
  `sellPrice` int(100) DEFAULT NULL,
  `buyPrice` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesproducts`
--

INSERT INTO `salesproducts` (`id`, `name`, `batchNo`, `totalQuantity`, `sellPrice`, `buyPrice`) VALUES
(1, 'injection 21 MG100', 1123, 200, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numericno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`id`, `name`, `numericno`) VALUES
(1, 'one', 1),
(2, 'two', 2),
(3, 'three', 3),
(4, 'four', 4);

-- --------------------------------------------------------

--
-- Table structure for table `stocklist`
--

CREATE TABLE `stocklist` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `batchNo` int(100) NOT NULL,
  `purchaseCode` int(200) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `sellPrice` double DEFAULT NULL,
  `buyPrice` double DEFAULT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocklist`
--

INSERT INTO `stocklist` (`id`, `name`, `batchNo`, `purchaseCode`, `supplier`, `quantity`, `amount`, `sellPrice`, `buyPrice`, `expDate`) VALUES
(3, 'Paracetamol', 1122, 3, 'supplier 2', 1000, 1000, 3, 1, '2019-05-31'),
(4, 'injection 21 MG100', 1123, 4, 'supplier', 1000, 3000, 5, 3, '2019-05-31'),
(8, 'injection 21 MG100', 1123, 6666, 'supplier 2', 3333, 9999, 5, 3, '2019-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `address`, `notes`) VALUES
(1, 'supplier', 'supplier1@gmail.com', '12345678', '', ''),
(2, 'supplier 2', 'supplier2@hotmail.com', '0000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `user_role` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin@gmail.com', '123456789', 'admin'),
(2, 'domain@gmail.com', '123456789', 'admin'),
(3, 'gideonboateng@gmail.com', '1234', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleslist`
--
ALTER TABLE `saleslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesproducts`
--
ALTER TABLE `salesproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocklist`
--
ALTER TABLE `stocklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saleslist`
--
ALTER TABLE `saleslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesproducts`
--
ALTER TABLE `salesproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocklist`
--
ALTER TABLE `stocklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
