-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2020 at 05:29 PM
-- Server version: 10.1.44-MariaDB-0+deb9u1
-- PHP Version: 7.3.19-1+0~20200612.60+debian9~1.gbp6c8fe1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonani_polling`
--

-- --------------------------------------------------------

--
-- Table structure for table `framework`
--

CREATE TABLE `framework` (
  `id` int(11) NOT NULL,
  `framework` varchar(50) NOT NULL,
  `value` int(50) NOT NULL,
  `win` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `framework`
--


INSERT INTO `framework` (`id`, `framework`, `value`, `win`) VALUES
(1, 'Idea Orbit', 0, 0),
(2, 'Eureka Minds', 0, 0),
(3, '⁠Dialog Kreatif', 0, 0),
(4, 'Mindspark', 0, 0),
(5, 'URidea', 0, 0),
(6, 'Sansvieria', 0, 0),
(7, 'Hexarion', 0, 0),
(8, 'Sinarupa', 0, 0),
(9, 'Braind', 0, 0),
(10, 'Digisense Tech Solution', 0, 0),
(11, 'Kreatix Media', 0, 0),
(12, 'Sparklab Digital', 0, 0),
(13, 'Nexlora', 0, 0),
(14, 'StartNova', 0, 0),
(15, 'Zynova', 0, 0),
(13, 'Vortech Digital', 0, 0),
(14, 'Ionlab Media', 0, 0),
(15, 'Quantum Media', 0, 0);
COMMIT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `framework`
--
ALTER TABLE `framework`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `framework`
--
ALTER TABLE `framework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
