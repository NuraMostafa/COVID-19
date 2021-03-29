-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 10:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
  `dateofbirth` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `Username`, `email`, `Gender`, `dateofbirth`) VALUES
(3, 'yasmin', 'yasmin@gmail.com', 'Female', '2018-01-02');

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
(13, '', '', '', '', '', '', '', 'nourhan@gmail.com', 'images/police.jpg'),
(14, '12', '13', '14', '', '', '', '', 'nouraatef43@yahoo.com', 'images/police.jpg'),
(16, '', '', '', '', '', '', '', 'nouraatef43@yahoo.com', 'image/pirate.jpg'),
(17, '', '', '', '', '', '', '', 'nouraatef43@yahoo.com', 'image/pirate.jpg'),
(18, '', '', '', '', '', '', '', 'marwa@gmail.com', 'image/algo1.png'),
(19, '', '', '', '', '', '', '', 'samira@gmail.com', 'image/pirate.jpg'),
(20, '', '', '', '', '', '', '', 'loli@gmail.com', 'images/police.jpg'),
(21, '', '', '', '', '', '', '', 'saloma@gmail.com', 'images/police.jpg'),
(22, '', '', '', '', '', '', '', 'saloma@gmail.com', 'images/police.jpg'),
(23, '', '', '', '', '', '', '', 'nouraatef43@yahoo.com', 'images/pirate.jpg'),
(24, '', '', '', '', '', '', '', 'ALAA@gmail.com', 'images/police.jpg'),
(25, '', '', '', '', '', '', '', 'koki@gmail.com', 'images/police.jpg'),
(26, '', '', '', '', '', '', '', 'amira@gmail.com', 'images/pirate.jpg'),
(27, '', '', '', '', '', '', '', 'moody@gmail.com', 'images/pirate.jpg'),
(28, '', '', '', '', '', '', '', 'yousseff@gmail.com', 'images/police.jpg'),
(29, '', '', '', '', '', '', '', 'osman@gmail.com', 'images/police.jpg');

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
(21, 'amr@gmail.com', '123456', 'Doctor', 'Male', 'amrmohamed', '1998-3-25'),
(22, 'nouraatef43@yahoo.com', '123456', 'Patient', 'Female', 'nouraatef', '1999-9-1'),
(25, 'dodo@gmail.com', '123456', 'Patient', 'Male', 'dod', '1997-03-25'),
(26, 'nourhan@gmail.com', '123456', 'Admin', 'Female', 'zozo', '1965-03-101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
