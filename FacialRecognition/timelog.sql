-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2017 at 09:01 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`logno`, `empID`, `logdate`, `timeIn`, `amOut`, `pmIn`, `timeOut`, `countInOut`, `onTime_AM`, `onTime_PM`, `hrsWorked`, `minsWorked`) VALUES
(56, '13-037-058', '2017-01-28', '08:00 AM', '12:31 PM', '01:31 PM', '05:34 PM', 4, 1, 0, 8, 34);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
