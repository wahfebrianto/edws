-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2017 at 12:57 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `RECOMMENDED` tinyint(1) NOT NULL,
  `NOTE` text NOT NULL,
  `RESTAURANT_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TIME_OPEN` int(11) NOT NULL,
  `LATITUDE` double NOT NULL,
  `LONGITUDE` double NOT NULL,
  `BIO` text NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_open`
--

DROP TABLE IF EXISTS `time_open`;
CREATE TABLE `time_open` (
  `NO` int(11) NOT NULL,
  `TIME_OPEN_MONDAY` time DEFAULT NULL,
  `TIME_CLOSE_MONDAY` time DEFAULT NULL,
  `TIME_OPEN_TUESDAY` time DEFAULT NULL,
  `TIME_CLOSE_TUESDAY` time DEFAULT NULL,
  `TIME_OPEN_WEDNESDAY` time DEFAULT NULL,
  `TIME_CLOSE_WEDNESDAY` time DEFAULT NULL,
  `TIME_OPEN_THURSDAY` time DEFAULT NULL,
  `TIME_CLOSE_THURSDAY` time DEFAULT NULL,
  `TIME_OPEN_FRIDAY` time DEFAULT NULL,
  `TIME_CLOSE_FRIDAY` time DEFAULT NULL,
  `TIME_OPEN_SATURDAY` time DEFAULT NULL,
  `TIME_CLOSE_SATURDAY` time DEFAULT NULL,
  `TIME_OPEN_SUNDAY` time DEFAULT NULL,
  `TIME_CLOSE_SUNDAY` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GENDER` tinyint(1) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_rate`
--

DROP TABLE IF EXISTS `user_rate`;
CREATE TABLE `user_rate` (
  `USER_NO` int(11) NOT NULL,
  `RESTAURANT_NO` int(11) NOT NULL,
  `RATE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `FK_RESTAURANT_MENU` (`RESTAURANT_NO`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `RESTAURANT_TIME_OPEN_NO` (`TIME_OPEN`);

--
-- Indexes for table `time_open`
--
ALTER TABLE `time_open`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `user_rate`
--
ALTER TABLE `user_rate`
  ADD KEY `USER_RATE_RESTAURANT_NO` (`RESTAURANT_NO`),
  ADD KEY `USER_RATE_USER_NO` (`USER_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `time_open`
--
ALTER TABLE `time_open`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_RESTAURANT_MENU` FOREIGN KEY (`RESTAURANT_NO`) REFERENCES `restaurant` (`NO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `RESTAURANT_TIME_OPEN_NO` FOREIGN KEY (`TIME_OPEN`) REFERENCES `time_open` (`NO`);

--
-- Constraints for table `user_rate`
--
ALTER TABLE `user_rate`
  ADD CONSTRAINT `USER_RATE_RESTAURANT_NO` FOREIGN KEY (`RESTAURANT_NO`) REFERENCES `restaurant` (`NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USER_RATE_USER_NO` FOREIGN KEY (`USER_NO`) REFERENCES `user` (`NO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
