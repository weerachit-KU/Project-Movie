-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2025 at 06:46 PM
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
(24, 'F1', '2 hr 30 mins', '2025-10-17', '10:00-13:00', '1205483255.jpg', ''),
(25, 'After', '1 hr 30 mins', '2025-10-17', '16:00-19:00', '1648387517.jpg', ''),
(26, 'Tee yod 3', '1 hr 44 mins', '2025-10-17', '19:00-22:00', '1760729358.jpg', ''),
(28, 'Superman', '2 hr 9 mins', '2025-10-18', '10:00-13:00', '706638085.jpg', ''),
(29, 'Godzilla Vs Kong', '1 hr 53 mins', '2025-10-18', '16:00-19:00', '1902554193.png', ''),
(30, 'Minecraft', '1 hr 41 mins', '2025-10-18', '19:00-22:00', '2135753362.jpg', ',A1,B2'),
(31, 'Jurassic World Rebirth', '2 hr 13 mins', '2025-10-19', '10:00-13:00', '1643998819.png', ''),
(33, 'The Snake', '1 hr 25 mins', '2025-10-19', '16:00-19:00', '35519540.jpg', ''),
(34, 'Good Boy', '1 hr 14 mins', '2025-10-19', '19:00-22:00', '279126174.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
