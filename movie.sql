-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 06:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(40) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `m_seat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `duration`, `date`, `time`, `pictures`, `m_seat`) VALUES
(24, 'F1', '2 hr 30 mins', '2025-10-17', '10:00-13:00', '1205483255.jpg', ',C3,C4'),
(25, 'After', '1 hr 30 mins', '2025-10-17', '16:00-19:00', '1648387517.jpg', ''),
(26, 'Tee yod 3', '1 hr 44 mins', '2025-10-17', '19:00-22:00', '1760729358.jpg', ''),
(28, 'Superman', '2 hr 9 mins', '2025-10-18', '10:00-13:00', '706638085.jpg', ''),
(29, 'Godzilla Vs Kong', '1 hr 53 mins', '2025-10-18', '16:00-19:00', '1902554193.png', ''),
(30, 'Minecraft', '1 hr 41 mins', '2025-10-18', '19:00-22:00', '2135753362.jpg', ''),
(31, 'Jurassic World Rebirth', '2 hr 13 mins', '2025-10-19', '10:00-13:00', '1643998819.png', ''),
(33, 'The Snake', '1 hr 25 mins', '2025-10-19', '16:00-19:00', '35519540.jpg', ''),
(34, 'Good Boy', '1 hr 14 mins', '2025-10-19', '19:00-22:00', '279126174.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `seat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `movie_id`, `user_id`, `price`, `seat`) VALUES
(19, 24, 2, 160, 'C3,C4');

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE `type_user` (
  `typeuser_id` int(11) NOT NULL,
  `name_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_user`
--

INSERT INTO `type_user` (`typeuser_id`, `name_type`) VALUES
(1, 'customer'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `user_type`) VALUES
(1, 'admin', '1234', 'admin@email.com', 2),
(2, 'c', '123', 'test@gmail.com', 1),
(6, 'c2', '123', 'test2@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `seat` (`seat`),
  ADD KEY `movie` (`movie_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`typeuser_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `usertype` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `typeuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `usertype` FOREIGN KEY (`user_type`) REFERENCES `type_user` (`typeuser_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
