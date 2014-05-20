-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2014 at 09:22 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trackr`
--
CREATE DATABASE IF NOT EXISTS `trackr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trackr`;

-- --------------------------------------------------------

--
-- Table structure for table `time-category`
--

CREATE TABLE IF NOT EXISTS `time-category` (
  `TimeCategoryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`TimeCategoryId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time-data`
--

CREATE TABLE IF NOT EXISTS `time-data` (
  `TimeDataId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TrackingDate` date NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`TimeDataId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time-tracking-entry`
--

CREATE TABLE IF NOT EXISTS `time-tracking-entry` (
  `TimeEntryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TimeDataId` int(10) unsigned NOT NULL,
  `TimeCategoryId` int(10) unsigned NOT NULL,
  `Seconds` int(10) unsigned NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`TimeEntryId`),
  KEY `TimeDataId` (`TimeDataId`,`TimeCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordHash` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateRegistred` date NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `PasswordHash`, `Email`, `DateRegistred`) VALUES
(2, 'zetway', 'a4d12f46d92e32fe3bc841d1c0f431b4e72c83f7', 'zetway@mail.ru', '2014-05-19'),
(3, 'andy', 'd848c9713eb1c248d99ae01d257fe9b269623d27', 'a@a.com', '2014-05-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
