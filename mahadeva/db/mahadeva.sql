-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 12:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahadeva`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dish_category_id` int(11) NOT NULL,
  `gluten_free` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `dish_category_id`, `gluten_free`, `vegan`, `description`, `price`) VALUES
(1, 'Rasam', 3, 1, 1, 'Rasam is a South Indian dish. It is a spicy-sweet-sour stock traditionally prepared using kokum, tamarind, or dried green mango juice as a base along with jaggery, chili pepper, black pepper, cumin, tomato, and other spices as seasonings.', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `dish_category`
--

CREATE TABLE `dish_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish_category`
--

INSERT INTO `dish_category` (`id`, `name`) VALUES
(1, 'Appetizers'),
(5, 'Desserts'),
(2, 'Salads'),
(3, 'Soups'),
(4, 'Starters');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `drink_size_id` int(11) NOT NULL,
  `drink_category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id`, `name`, `drink_size_id`, `drink_category_id`, `description`, `price`) VALUES
(1, 'Coca-Cola', 1, 1, '', 2.5),
(2, 'Latte Macchiato', 3, 3, '', 2.4);

-- --------------------------------------------------------

--
-- Table structure for table `drink_category`
--

CREATE TABLE `drink_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drink_category`
--

INSERT INTO `drink_category` (`id`, `name`) VALUES
(2, 'Beers'),
(3, 'Coffees'),
(1, 'Soft drinks');

-- --------------------------------------------------------

--
-- Table structure for table `drink_size`
--

CREATE TABLE `drink_size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drink_size`
--

INSERT INTO `drink_size` (`id`, `size`) VALUES
(3, '0.2'),
(1, '0.3'),
(2, '0.5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$mgLtSVhL/JiXOybi5.qB6OPXB5xny04QZUoC3K1qusSj0vuxGgxjm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_dish_category_id` (`dish_category_id`);

--
-- Indexes for table `dish_category`
--
ALTER TABLE `dish_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_drink_size_id` (`drink_size_id`),
  ADD KEY `fk_drink_category_id` (`drink_category_id`);

--
-- Indexes for table `drink_category`
--
ALTER TABLE `drink_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `drink_size`
--
ALTER TABLE `drink_size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size` (`size`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_user_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dish_category`
--
ALTER TABLE `dish_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drink_category`
--
ALTER TABLE `drink_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drink_size`
--
ALTER TABLE `drink_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_dish_category_id` FOREIGN KEY (`dish_category_id`) REFERENCES `dish_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `fk_drink_category_id` FOREIGN KEY (`drink_category_id`) REFERENCES `drink_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_drink_size_id` FOREIGN KEY (`drink_size_id`) REFERENCES `drink_size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
