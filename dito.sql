-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 10:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dito`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptedrequest`
--

CREATE TABLE `acceptedrequest` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptedrequest`
--

INSERT INTO `acceptedrequest` (`id`, `name`, `email`, `contact`, `address`, `request`) VALUES
(10, 'Emmanuel Punay', 'emmanuelpunay6906@gmail.com', '09351686906', '', 'Wireless Mouse'),
(47, 'John Robert Castillo', 'robert@gmail.com', '09234234232', '', 'Hand Clutch and Engine for Motorcycle'),
(65, 'Emman Punay', 'emmanuelpunay6906@gmail.com', '09234232933', '2nd Ave, Caloocan', 'Motherboard ITX');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archiveName` varchar(200) NOT NULL,
  `archiveEmail` varchar(200) NOT NULL,
  `archiveContact` varchar(200) NOT NULL,
  `archiveAddress` varchar(100) NOT NULL,
  `archiveRequest` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `archiveName`, `archiveEmail`, `archiveContact`, `archiveAddress`, `archiveRequest`) VALUES
(62, 'sdf', 'fda@dfsd', '32423234234', '', 'sjsdfklj');

-- --------------------------------------------------------

--
-- Table structure for table `clientrequestlist`
--

CREATE TABLE `clientrequestlist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `delivery_id` int(11) NOT NULL DEFAULT 0,
  `customerName` varchar(200) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productBrand` varchar(100) NOT NULL,
  `productPrice` int(200) NOT NULL,
  `productQty` int(200) NOT NULL,
  `orderDate` date NOT NULL,
  `printDate` date NOT NULL,
  `carrier` varchar(200) NOT NULL,
  `carrierContact` varchar(100) NOT NULL,
  `sortCenter` varchar(200) NOT NULL,
  `orderNo` varchar(200) NOT NULL,
  `trackingNo` varchar(200) NOT NULL,
  `deliveryStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`delivery_id`, `customerName`, `customerEmail`, `customerAddress`, `productName`, `productBrand`, `productPrice`, `productQty`, `orderDate`, `printDate`, `carrier`, `carrierContact`, `sortCenter`, `orderNo`, `trackingNo`, `deliveryStatus`) VALUES
(28, 'Emmanuel Punay', '', '', 'Wireless Mouse', 'wer', 3, 3, '2023-12-11', '2023-12-24', 'One', '09348398489', 'DITO LMSICITNA', '29774031160286', '89283930734577', 'Delivered'),
(29, 'asdf', '', 'dfsdfsdfs', 'sdfsdf', 'asus', 1231, 1, '2023-12-10', '2023-12-12', 'Ernesto Santos', '09499718994', 'DITO LMSICITNA', '52857197178222', '56748231129104', 'Delivered'),
(37, 'Harry Potter', 'emmanuelpunay6906@gmail.com', 'Hogwarts, USA', 'Elder Wand ', 'asus', 23, 23, '2023-12-12', '2023-12-31', 'Ernesto Santos', '09643914724', 'DITO LMSICITNA', '62396818500356', '96399874097360', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productBrand` varchar(100) NOT NULL,
  `productPrice` int(200) NOT NULL,
  `productQty` int(200) NOT NULL,
  `orderDate` date NOT NULL,
  `printDate` date NOT NULL,
  `carrier` varchar(200) NOT NULL,
  `carrierContact` varchar(100) NOT NULL,
  `sortCenter` varchar(200) NOT NULL,
  `orderNo` varchar(200) NOT NULL,
  `trackingNo` varchar(200) NOT NULL,
  `deliveryStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `customerName`, `customerEmail`, `customerAddress`, `productName`, `productBrand`, `productPrice`, `productQty`, `orderDate`, `printDate`, `carrier`, `carrierContact`, `sortCenter`, `orderNo`, `trackingNo`, `deliveryStatus`) VALUES
(9, 'Emmanuel Punay', '', '', 'Wireless Mouse', '', 138, 1, '2023-11-18', '2023-11-26', 'DITO Logistics', '', 'DITO', '012349192037', '982374039873245', 'Delivered'),
(38, 'John Robert Castillo', 'robert@gmail.com', '', 'Hand Clutch and Engine for Motorcycle', 'sdf', 23, 3, '2023-12-24', '2023-12-10', 'Ernesto Santos', '09863063147', 'DITO LMSICITNA', '80712685732420', '78875894748076', 'Delivered'),
(39, 'John Robert Castillo', 'robert@gmail.com', '', 'Hand Clutch and Engine for Motorcycle', 'asd', 234, 3, '2023-12-25', '2023-12-17', 'Ernesto Santos', '09881258299', 'DITO LMSICITNA', '38861658020299', '66577567889934', 'Arrived at Logistics Hub'),
(40, 'Emman Punay', 'emmanuelpunay6906@gmail.com', '2nd Ave, Caloocan', 'Motherboard ITX', 'ASUS', 9200, 1, '2023-12-12', '2023-12-20', 'Ernesto Santos', '09799571458', 'DITO LMSICITNA', '28300553393074', '34586792544646', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(200) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `employee_id`, `password`, `role`, `creationDate`, `pic`) VALUES
(8, '2871D', '$2y$10$n//92Tw7.09WxFNrpGROVOtKUY.pfPKmh4qKkx86SaOj6fhlBhwua', 'Main Admin', '2023-11-26 06:34:28', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
