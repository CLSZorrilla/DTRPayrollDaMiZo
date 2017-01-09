-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 03:16 PM
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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `positionCode` int(10) NOT NULL,
  `deptCode` int(10) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `maritalStatus` varchar(15) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `sex` char(6) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateHired` varchar(255) NOT NULL,
  `GSISNo` varchar(12) NOT NULL,
  `PhilHealthNo` varchar(12) NOT NULL,
  `TIN` varchar(12) NOT NULL,
  `leaveCredits` int(5) NOT NULL,
  `picture` blob NOT NULL,
  `pictureTrained` blob NOT NULL,
  `TrainedFaces` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `positionCode` (`positionCode`),
  KEY `deptCode` (`deptCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `empID`, `password`, `positionCode`, `deptCode`, `lname`, `fname`, `mname`, `address`, `maritalStatus`, `emailAddress`, `birthDate`, `contactNo`, `sex`, `status`, `dateHired`, `GSISNo`, `PhilHealthNo`, `TIN`, `leaveCredits`, `picture`, `pictureTrained`, `TrainedFaces`) VALUES
(14, '13-037-048', '$2y$12$Nj5xcfA4fUvV68sf9u1YNeGhCsYEZpJejo.8oKptiiujdPXTRRJe2', 1, 1, 'Zorrilla', 'Christian Lorenz', 'Salac', 'Cubao Quezon City', 'married', 'CLSZorrilla@gmail.com', '1995-12-28', '09363129137', 'Male', 'Regular', '2017-06-06', '121212121212', '121212121212', '121212121212', 12, '', '', 0),
(15, '13-037-064', '$2y$12$n85oSnNkCFrGkXRPOxyMq.BJ9BEhw/6JHOFLPrDhOptiwEi4DO90a', 1, 1, 'Dayaon', 'Froinand', 'B', 'Imus Cavite', 'married', 'froinandbdayaon@gmail.com', '1995-12-28', '09363169137', 'Male', 'Regular', '2018-08-06', '121212131212', '121213121212', '121312121212', 1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timelog`
--

CREATE TABLE IF NOT EXISTS `timelog` (
  `counting` varchar(255) NOT NULL,
  `logno` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `logdate` date NOT NULL,
  `am_IN` varchar(50) NOT NULL,
  `am_Out` varchar(50) NOT NULL,
  `pm_In` varchar(50) NOT NULL,
  `pm_Out` varchar(50) NOT NULL,
  `hoursWorked` int(11) NOT NULL,
  `minsWorked` int(11) NOT NULL,
  `countINOUT` int(11) NOT NULL,
  PRIMARY KEY (`logno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`counting`, `logno`, `empID`, `logdate`, `am_IN`, `am_Out`, `pm_In`, `pm_Out`, `hoursWorked`, `minsWorked`, `countINOUT`) VALUES
('2', 1, 'COUNTING ROW', '0000-00-00', '', '', '', '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
