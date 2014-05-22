-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 09:26 AM
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
-- Table structure for table `money_entry`
--

CREATE TABLE IF NOT EXISTS `money_entry` (
  `MoneyEntryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TrackingDate` date NOT NULL,
  `UserId` int(10) unsigned NOT NULL,
  `MoneyCategory` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(10) unsigned NOT NULL,
  PRIMARY KEY (`MoneyEntryId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `money_entry`
--

INSERT INTO `money_entry` (`MoneyEntryId`, `TrackingDate`, `UserId`, `MoneyCategory`, `Amount`) VALUES
(1, '2014-05-22', 2, 'Restaurant', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `time_entry`
--

CREATE TABLE IF NOT EXISTS `time_entry` (
  `TimeEntryId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TrackingDate` date NOT NULL,
  `UserId` int(10) unsigned NOT NULL,
  `TimeCategory` varchar(50) NOT NULL,
  `Seconds` int(10) unsigned NOT NULL,
  PRIMARY KEY (`TimeEntryId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `time_entry`
--

INSERT INTO `time_entry` (`TimeEntryId`, `TrackingDate`, `UserId`, `TimeCategory`, `Seconds`) VALUES
(1, '2014-05-21', 2, 'coding', 5),
(2, '2014-05-21', 2, 'serfing', 771),
(3, '2014-05-21', 2, 'coding', 121),
(4, '2014-05-21', 2, 'cooking', 19),
(5, '2014-05-22', 2, 'coding', 4);

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
