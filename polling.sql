-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2020 at 10:33 PM
-- Server version: 10.1.44-MariaDB-0+deb9u1
-- PHP Version: 7.3.17-1+0~20200419.57+debian9~1.gbp0fda17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polling`
--

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE `polling` (
  `id` int(11) NOT NULL,
  `framework` varchar(100) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polling`
--

INSERT INTO `polling` (`id`, `framework`, `value`) VALUES
(1, 'Bootstrap', 41),
(2, 'Materialize', 3),
(3, 'Foundation', 1),
(4, 'Bulma', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polling`
--
ALTER TABLE `polling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polling`
--
ALTER TABLE `polling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
