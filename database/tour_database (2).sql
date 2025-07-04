-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `binifit_images`
--

CREATE TABLE `binifit_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `account_number` varchar(16) NOT NULL,
  `exp_date` varchar(5) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `payment_type` enum('Full Payment','Half Payment') NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `travel_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `travel_end_date` date NOT NULL,
  `profile_image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `account_number`, `exp_date`, `cvv`, `payment_type`, `customer_name`, `email`, `phone`, `travel_date`, `created_at`, `travel_end_date`, `profile_image`) VALUES
(123, '12321333124', '26/11', '213', 'Half Payment', 'janith wathsala', 'wathsalajanith@gmail.com', '0711519402', '2025-01-19', '2025-01-16 17:06:23', '2025-01-23', 0x32343673686f74735f736f2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`) VALUES
(7, 'poson', '2025-01-27 00:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `festival_name` varchar(255) NOT NULL,
  `festival_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Loc_id` int(11) NOT NULL,
  `Loc_name` varchar(255) NOT NULL,
  `Details` text DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Loc_id`, `Loc_name`, `Details`, `Image`) VALUES
(2, 'Mirissa', 'A coastal paradise with stunning beaches', 'https://th.bing.com/th/id/OIP.QSbk_HN1tbrP6HjctoEKCgHaE8?rs=1&pid=ImgDetMain'),
(3, 'Ella', 'Known for its scenic beauty and hiking trails', 'https://th.bing.com/th/id/R.3c8ec97e3494ec012c64fae36aaccfad?rik=IeT8Rf%2fxDcWR%2bQ&pid=ImgRaw&r=0'),
(4, 'Nuwara Eliya', 'Famous for tea plantations and cool climate', 'https://th.bing.com/th/id/OIP.bScl0qFLnuY7Aqm4DW9ragHaE8?rs=1&pid=ImgDetMain'),
(5, 'Anuradhapura', 'An ancient city with cultural landmarks', 'https://th.bing.com/th/id/OIP.en7IZbu5IKHjmlMJDMQUJgHaFR?rs=1&pid=ImgDetMain'),
(6, 'Colombo', 'The commercial capital of Sri Lanka', 'https://th.bing.com/th/id/OIP.7PkXnteVXyT56ZGgkHm0rgHaE7?rs=1&pid=ImgDetMain'),
(7, 'Galle', 'fort', 'https://th.bing.com/th/id/OIP.gfLSC5wo79vT59V1QEN37AHaE7?rs=1&pid=ImgDetMain');

-- --------------------------------------------------------

--
-- Table structure for table `plain`
--

CREATE TABLE `plain` (
  `id` int(11) NOT NULL,
  `Plain_name_id` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Loc1` int(11) DEFAULT NULL,
  `Loc2` int(11) DEFAULT NULL,
  `Loc3` int(11) DEFAULT NULL,
  `Loc4` int(11) DEFAULT NULL,
  `Loc5` int(11) DEFAULT NULL,
  `Loc6` int(11) DEFAULT NULL,
  `Loc7` int(11) DEFAULT NULL,
  `Loc8` int(11) DEFAULT NULL,
  `Loc9` int(11) DEFAULT NULL,
  `Loc10` int(11) DEFAULT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plain`
--

INSERT INTO `plain` (`id`, `Plain_name_id`, `Days`, `image`, `Loc1`, `Loc2`, `Loc3`, `Loc4`, `Loc5`, `Loc6`, `Loc7`, `Loc8`, `Loc9`, `Loc10`, `Price`) VALUES
(1, 3, 5, 'https://th.bing.com/th/id/OIP.d4QZBEZxLduzMrNoOGTEpgHaHa?rs=1&pid=ImgDetMaihttps://th.bing.com/th/id/OIP.d4QZBEZxLduzMrNoOGTEpgHaHa?rs=1&pid=ImgDetMain', 1, 2, 3, 4, 6, 0, 0, 0, 0, 0, 60),
(2, 1, 10, 'https://www.bing.com/images/search?view=detailV2&ccid=G6voGN%2b6&id=C9ACAAD4E1C68A81E5348E866119791C8DD343E6&thid=OIP.G6voGN-6bxOM-5AORHs1FwHaE8&mediaurl=https%3a%2f%2fasiasomeday.com%2fsrilanka%2fwp-content%2fuploads%2fsites%2f5%2f2020%2f02%2fella-train-', 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 40),
(3, 1, 3, NULL, 1, 2, 3, 0, 0, 0, 0, 0, 0, 0, 80),
(11, 2, 5, NULL, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 100),
(12, 3, 5, 'https://th.bing.com/th/id/R.1babe818dfba6f138cfb900e447b3517?rik=5kPTjRx5GWGGjg&pid=ImgRaw&r=0', 2, 3, 4, 5, 1, 0, 0, 0, 0, 0, 0),
(13, 3, 5, NULL, 1, 3, 5, 4, 0, 0, 0, 0, 0, 0, 0),
(15, 3, 5, 'https://th.bing.com/th/id/OIP.OCF19uuZ-5mxiIXgV-p61QHaFj?rs=1&pid=ImgDetMain', 5, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plain_name`
--

CREATE TABLE `plain_name` (
  `id` int(11) NOT NULL,
  `Plain_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plain_name`
--

INSERT INTO `plain_name` (`id`, `Plain_name`) VALUES
(1, 'Photography Tour'),
(2, 'Honeymoon Tour'),
(3, 'Activity Tour');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `breakfast` decimal(10,2) DEFAULT NULL,
  `dinner` decimal(10,2) DEFAULT NULL,
  `human_guide` decimal(10,2) DEFAULT NULL,
  `ai_guide` decimal(10,2) DEFAULT NULL,
  `accommodation` decimal(10,2) DEFAULT NULL,
  `bic` float NOT NULL,
  `car` float NOT NULL,
  `van` float NOT NULL,
  `tuktuk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `breakfast`, `dinner`, `human_guide`, `ai_guide`, `accommodation`, `bic`, `car`, `van`, `tuktuk`) VALUES
(1, 10.50, 20.75, 50.00, 30.00, 100.00, 10, 20, 30, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binifit_images`
--
ALTER TABLE `binifit_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Loc_id`);

--
-- Indexes for table `plain`
--
ALTER TABLE `plain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Plain_name_id` (`Plain_name_id`);

--
-- Indexes for table `plain_name`
--
ALTER TABLE `plain_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binifit_images`
--
ALTER TABLE `binifit_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plain`
--
ALTER TABLE `plain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plain_name`
--
ALTER TABLE `plain_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plain`
--
ALTER TABLE `plain`
  ADD CONSTRAINT `plain_ibfk_1` FOREIGN KEY (`Plain_name_id`) REFERENCES `plain_name` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
