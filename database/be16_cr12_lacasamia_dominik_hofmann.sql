-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 05:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr12_lacasamia_dominik_hofmann`
--
CREATE DATABASE IF NOT EXISTS `be16_cr12_lacasamia_dominik_hofmann` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr12_lacasamia_dominik_hofmann`;

-- --------------------------------------------------------

--
-- Table structure for table `realestate`
--

CREATE TABLE `realestate` (
  `id` int(11) NOT NULL,
  `advert_title` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `roomnumber` int(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `pricereduction` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realestate`
--

INSERT INTO `realestate` (`id`, `advert_title`, `size`, `roomnumber`, `city`, `price`, `address`, `latitude`, `longitude`, `image`, `pricereduction`) VALUES
(1, 'Maledives Bungalow', '320m²', 3, 'Maledives', '€270.500', 'Maledivestreet 5', 1.92499, 73.3997, 'maledives.jpg', 'No'),
(4, 'Schweizer Landhaus', '240m²', 3, 'Geneva', '€380.150', 'Schweizerstreet 1', 46.2044, 6.14316, 'geneva.jpg', 'Yes'),
(5, 'Lisbon Villa', '660m²', 5, 'Lisbon', '€240.400', 'Villastreet 16', 38.7369, -9.14268, 'lisbon.jpg', 'No'),
(6, 'New York Penthouse', '280m²', 4, 'New York', '€430.000', 'NewYorkStreet 7', 40.7306, -73.9352, 'newyork.jpg', 'No'),
(7, 'Portland Farm', '1100m²', 5, 'Portland', '€780.000', 'Portlandstreet 5', 45.5231, -122.676, 'portland.jpg', 'Yes'),
(8, 'Beijing Small House', '290m²', 2, 'Beijing', '€180.000', 'Beijingstreet 1', 39.9167, 116.383, 'beijing.jpg', 'No'),
(9, 'Tokyo Student Apartment', '60m²', 2, 'Tokyo', '€210.000', 'Japanstreet 4', 35.6528, 139.839, 'tokyo.jpg', 'No'),
(10, 'Oslo Forresthouse', '280m²', 3, 'Oslo', '€290.000', 'Oslostreet', 59.9115, 10.7579, 'oslo.jpg', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `realestate`
--
ALTER TABLE `realestate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `realestate`
--
ALTER TABLE `realestate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
