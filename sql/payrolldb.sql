-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2017 at 02:03 AM
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
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `deptCode` varchar(2) NOT NULL,
  `deptName` varchar(255) NOT NULL,
  PRIMARY KEY (`deptCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptCode`, `deptName`) VALUES
('0', 'Catacombs'),
('1', 'Aminus');

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
  `contactNo` varchar(14) NOT NULL,
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
  `counting` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `positionCode` (`positionCode`),
  KEY `deptCode` (`deptCode`),
  KEY `positionCode_2` (`positionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `empID`, `password`, `positionCode`, `deptCode`, `lname`, `fname`, `mname`, `address`, `maritalStatus`, `emailAddress`, `birthDate`, `contactNo`, `sex`, `status`, `dateHired`, `GSISNo`, `PhilHealthNo`, `TIN`, `leaveCredits`, `picture`, `pictureTrained`, `TrainedFaces`, `counting`) VALUES
(1, 'COUNTING ROW', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 0, 1),
(22, '13-037-064', '$2y$12$MILaoFFI4yYvX/pV2yNeLODO1Xi7QXKYKZ.K051SFIYC5gKleNHrm', 0, 1, 'Dayaon', 'Froinand', 'B', 'Imus, Cavite', 'married', 'fbdayaon@gmail.com', '1996-10-19', '0936-312-91', 'Male', 'Parttime', '2017-06-06', '453452342-34', '456456456-34', '456782783-78', 11, '', '', 0, 0),
(23, '13-037-048', '$2y$12$azd/d7NTuy9AS6uKhpj15uc8qfBzj8yMPIYlfB4pFYB3fo9aBf.92', 1, 0, 'Zorrilla', 'Christian Lorenz', 'Salac', 'Cubao, Quezon City', 'married', 'CLSZorrilla@gmail.com', '81995-02-12', '0936-312-91', 'Male', 'Regular', '2017-06-06', '111111111-11', '111111111-11', '111111111-11', 11, '', '', 0, 0),
(24, '13-037-058', '$2y$12$o.UdVJRTnD2kS7qMczseie509lXjl3jpUKTgTgVnZoRbqog0qsKeq', 2, 1, 'Micoleta', 'Theresa', 'Z', 'Imus, Cavite', 'married', 'theresazmicoleta@gmail.com', '1111-11-11', '0936-312-91', 'Female', 'Regular', '2017-06-06', '112312312-31', '112312513-51', '124512312-51', 11, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `positionCode` varchar(255) NOT NULL,
  `positionName` varchar(255) NOT NULL,
  `salaryGrade` varchar(255) NOT NULL,
  PRIMARY KEY (`positionCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionCode`, `positionName`, `salaryGrade`) VALUES
('0', 'Guild Master', '1'),
('1', 'Guild Moderator', '2'),
('2', 'Guild Member', '3');

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
