-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 10:30 AM
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
-- Table structure for table `clientrequestlist`
--

CREATE TABLE `clientrequestlist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientrequestlist`
--

INSERT INTO `clientrequestlist` (`id`, `name`, `email`, `contact`, `request`) VALUES
(13, 'Emmanuel Punay', 'eman656@gmail.com', '0934134232', 'DDR4 RAM\r\nArduino Sensor Kit\r\nAsus Motherboard'),
(15, 'John Doe', 'johndoe@gmail.com', '09352381801', 'Magnifying Lens\r\n'),
(16, 'Paulo Lozano', 'paulo981@gmail.com', '09234132892', 'Tripod\r\nDobsonian Base'),
(17, 'John Robert Castillo', 'robertcastillo22@gmail.com', '092341423189', 'Processor Sockets\r\nPCI Slots'),
(18, 'John Robert Castillo', 'robertcastillo22@gmail.com', '092341423189', 'Processor Sockets\r\nPCI Slots'),
(19, 'asd', 'fas@gmail.com', 'sdf', 'sdf\r\n'),
(20, 'sdf', 'sds@sdf', 'sdfs', 'd'),
(21, 'asf', 'asdf@fsd', 'sdf', 'sdfsd'),
(22, 'asdf', 'aasd@fas', 'asdfasfd', 'asdfa'),
(23, 'asdf', 'asdfa@asdfa', 'asdfa', 'asdfa'),
(24, 'asd', 'a@fds', 'sdfs', 'sdf'),
(25, 'asf', 'asda@asd', 'asdas', 'asd'),
(26, 'asdf', 'asdf@dfa', 'asdfa', 'asdfa'),
(27, 'asdf', 'sdf@sdfg', '324', 'afasd'),
(28, 'Haha', 'hehe@gmail.com', '1234', 'dfgkm'),
(29, 'Steffanie Reyes', 'steffanie@gmail.com', '0946227367', 'Hotdog malake'),
(30, 'Kap', 'kap@gmail.com', '09876543219', 'gege'),
(31, 'Bebang', 'Bebang@gmail.com', '09123456789', 'bebangskie\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `employee_id`, `password`) VALUES
(8, '2871D', '$2y$10$n//92Tw7.09WxFNrpGROVOtKUY.pfPKmh4qKkx86SaOj6fhlBhwua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
