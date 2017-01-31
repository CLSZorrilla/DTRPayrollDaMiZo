-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2017 at 01:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payrolldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `timelog`
--

CREATE TABLE IF NOT EXISTS `timelog` (
  `logno` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `logdate` date NOT NULL,
  `timeIn` varchar(10) NOT NULL,
  `amOut` varchar(10) NOT NULL,
  `pmIn` varchar(10) NOT NULL,
  `timeOut` varchar(10) NOT NULL,
  `countInOut` int(11) NOT NULL,
  `onTime_AM` tinyint(1) NOT NULL,
  `onTime_PM` tinyint(1) NOT NULL,
  `hrsWorked` int(10) NOT NULL,
  `minsWorked` int(10) NOT NULL,
  PRIMARY KEY (`logno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`logno`, `empID`, `logdate`, `timeIn`, `amOut`, `pmIn`, `timeOut`, `countInOut`, `onTime_AM`, `onTime_PM`, `hrsWorked`, `minsWorked`) VALUES
(17, '13-037-048', '2017-01-29', '07:30', '12:30', '13:30', '16:30', 4, 1, 0, 8, 0),
(31, '13-037-058', '2017-01-30', '12:48 PM', '12:55 PM', '12:57 PM', '13:14 PM', 4, 0, 0, 0, 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
