-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 03:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(100) NOT NULL,
  `CPR` varchar(100) NOT NULL,
  `Ferritin` varchar(100) NOT NULL,
  `LDH` varchar(100) NOT NULL,
  `ALT` varchar(100) NOT NULL,
  `CBC` varchar(100) NOT NULL,
  `DDimer` varchar(100) NOT NULL,
  `AST` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `User_type` varchar(300) NOT NULL,
  `Gender` varchar(300) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL,
  `Username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `Password`, `User_type`, `Gender`, `confirmpassword`, `Username`) VALUES
(11, 'mariam@gmail.com', '123456', 'Patient', '', '', ''),
(12, 'nourhan@gmail.com', '123456', 'Patient', '', '', ''),
(15, 'nada@gmail.com', '123456', ' ', '', '', ''),
(16, 'doaa@gmail.com', '123456', '', 'Doctor', '123456', ''),
(17, 'marwa@gmail.com', '789', '', 'Select', '789', ''),
(18, 'mariam@gmail.com', '123456', '', 'female', '123456', ''),
(19, 'salma@gmail.com', '123456', 'Patient', 'female', '123456', ''),
(20, 'nouraatef43@yahoo.com', '123456', 'Patient', 'female', '123456', ''),
(21, 'amr@gmail.com', '123456', 'Doctor', 'female', '123456', 'amrmohamed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
