-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 07:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(100) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `Gender` varchar(300) NOT NULL,
  `dateofbirth` varchar(300) NOT NULL,
  `doctorID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `Username`, `email`, `Gender`, `dateofbirth`, `doctorID`) VALUES
(4, 'Nourhan', 'nourhan@gmail.com', 'Female', '1999-02-01\r\n', 64),
(5, 'Nura', 'nura@gmail.com', 'Female', '1999-02-03', 83),
(11, 'koko', 'koko@gmail.com', 'Male', '1999-05-05', 83);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `Status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `email`, `gender`, `Status`) VALUES
(1, 'nourhan@gmail.com', 'Female', 'Positive');

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

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `CPR`, `Ferritin`, `LDH`, `ALT`, `CBC`, `DDimer`, `AST`, `email`, `image`) VALUES
(4, '10', '20', '30', '40', '50', '16', '20', 'nouraatef43@yahoo.com', 'images/pirate.jpg'),
(7, '123', '123', '123', '123', '123', '123', '123', 'nouraatef43@yahoo.com', 'Empty'),
(30, '2', '3', '4', '5', '6', '7', '6', 'nourhan@gmail.com', ''),
(31, '12', '13', '25', '25', '2', '3', '3', 'nourhan@gmail.com', ''),
(49, '22', '22', '22', '22', '22', '22', '22', 'nourhan@gmail.com', '');

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
  `Username` varchar(100) NOT NULL,
  `dateofbirth` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `Password`, `User_type`, `Gender`, `Username`, `dateofbirth`) VALUES
(26, 'nura@gmail.com', '123456', 'Admin', 'Female', 'nurahelmy', '1965-03-101'),
(64, 'noran@gmail.com', '123456', 'Doctor', 'Female', 'noranhany', '2021-06-24'),
(65, 'nourhan2@gmail.com', '123456', 'Patient', 'Female', 'nourhanatef', '2021-06-17'),
(80, 'moh@gmail.com', '123456', 'Patient', 'Select Gender', 'd', ''),
(83, 'degwy@gmail.com', '12345678', 'Doctor', 'Male', 'Degwy', '1999-01-01'),
(84, 'nourhan@gmail.com', '123456789', 'Patient', 'Female', 'koko', '2021-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorid` (`doctorID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `doctorid` FOREIGN KEY (`doctorID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
