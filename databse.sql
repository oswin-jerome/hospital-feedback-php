-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 08:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--
CREATE DATABASE IF NOT EXISTS `feedback` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `feedback`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `qualification`, `email`, `password`) VALUES
(1, 'Jois', 'MBBS', 'jois@gmail.com', 'Jois'),
(2, 'Nelson', 'BDS', 'nelson@gmail.com', 'Nelson');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(5) NOT NULL,
  `name` varchar(70) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `height` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` int(2) NOT NULL,
  `info` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `email`, `height`, `weight`, `bloodgroup`, `dob`, `gender`, `info`) VALUES
(1, 'John doe', 8344441232, 'johndoe@gmail.com', 178, 68, 'AB-', '25/02/1982', 0, 'no such info'),
(2, 'aslin jenifer', 8923651244, 'aslin@gmail.com', 150, 45, 'B+', '12/02/2000', 1, 'Noo'),
(3, 'Ratha', 8993472463, 'ratha@gmail.com', 130, 67, 'AB+', '12/03/1992', 1, 'Allergic to plants');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(5) NOT NULL,
  `patient` int(5) NOT NULL,
  `doctor` int(5) NOT NULL,
  `temprature` int(5) NOT NULL,
  `checkin` varchar(25) NOT NULL,
  `problem` varchar(512) NOT NULL,
  `medicine` varchar(512) DEFAULT NULL,
  `feedback` varchar(512) DEFAULT NULL,
  `checkout` varchar(25) DEFAULT NULL,
  `closed` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `patient`, `doctor`, `temprature`, `checkin`, `problem`, `medicine`, `feedback`, `checkout`, `closed`) VALUES
(1, 1, 2, 100, '14/03/2020 11:53 am', 'Stomach ace', 'sds', 'sdsdsd', '14/03/2020 12:45 pm', 1),
(2, 3, 2, 98, '14/03/2020 12:26 pm', 'Stomach ace', 'as', 'asas', '14/03/2020 12:46 pm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
