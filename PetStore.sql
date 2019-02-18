-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 05:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petstores`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `age` int(11) NOT NULL,
  `lifespan` int(11) NOT NULL,
  `pettype` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `itemtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `price`, `age`, `lifespan`, `pettype`, `color`, `itemtype`) VALUES
(1, 'xyz', 207, 12, 6, 1, 4, 1),
(2, 'pet shop4', 207, 12, 6, 1, 4, 1),
(3, 'pet shop3', 207, 12, 6, 3, 3, 3),
(4, 'pet shop1', 2000, 18, 6, 2, 3, 2),
(5, 'xyz', 207, 12, 6, 4, 4, 4),
(6, 'pet shop5', 207, 12, 6, 4, 4, 4),
(7, 'pet shop2', 207, 12, 6, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'blue'),
(4, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `itemtype`
--

CREATE TABLE `itemtype` (
  `id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemtype`
--

INSERT INTO `itemtype` (`id`, `title`) VALUES
(1, 'cat'),
(2, 'dog'),
(3, 'Reptiles'),
(4, 'Pet toys'),
(5, 'Pet Carriers');

-- --------------------------------------------------------

--
-- Table structure for table `pettype`
--

CREATE TABLE `pettype` (
  `id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pettype`
--

INSERT INTO `pettype` (`id`, `title`) VALUES
(1, 'Hounds'),
(2, 'Mutts'),
(3, 'Calicos'),
(4, 'Turtles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemtype`
--
ALTER TABLE `itemtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pettype`
--
ALTER TABLE `pettype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itemtype`
--
ALTER TABLE `itemtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pettype`
--
ALTER TABLE `pettype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
