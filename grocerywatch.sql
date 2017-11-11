-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2017 at 04:25 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerywatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `drinksdata`
--

CREATE TABLE `drinksdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drinksdata`
--

INSERT INTO `drinksdata` (`id`, `name`, `time`, `quantity`) VALUES
(1, 'pepsi', '10:07:00', 5),
(2, 'coke', '11:07:00', 3),
(3, 'orange', '08:07:00', 4),
(4, 'lime', '06:11:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vegedata`
--

CREATE TABLE `vegedata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `weight` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vegedata`
--

INSERT INTO `vegedata` (`id`, `name`, `time`, `weight`) VALUES
(1, 'Carrot', '10:13:00', 200),
(2, 'Potato', '06:13:00', 280),
(3, 'Tomato', '05:10:00', 300.5),
(4, 'Onion', '03:20:00', 150),
(5, 'Broccoli', '09:30:00', 300);

-- --------------------------------------------------------

--
-- Table structure for table `waterbottles`
--

CREATE TABLE `waterbottles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waterbottles`
--

INSERT INTO `waterbottles` (`id`, `name`, `time`, `quantity`) VALUES
(1, 'bottletype1 ', '07:10:00', 5),
(2, 'bottletype2 ', '10:10:00', 5),
(3, 'bottletype3 ', '06:10:00', 4),
(4, 'bottletype4 ', '06:50:00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinksdata`
--
ALTER TABLE `drinksdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vegedata`
--
ALTER TABLE `vegedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waterbottles`
--
ALTER TABLE `waterbottles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinksdata`
--
ALTER TABLE `drinksdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vegedata`
--
ALTER TABLE `vegedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `waterbottles`
--
ALTER TABLE `waterbottles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
