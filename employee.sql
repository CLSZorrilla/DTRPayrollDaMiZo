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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acctType` varchar(255) NOT NULL,
  `positionCode` int(10) NOT NULL,
  `deptCode` int(10) NOT NULL,
  `pera` int(5) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `maritalStatus` varchar(15) NOT NULL,
  `noOfDependents` int(3) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `contactNo` varchar(14) NOT NULL,
  `sex` char(6) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateHired` varchar(255) NOT NULL,
  `GSISNo` varchar(14) NOT NULL,
  `PhilHealthNo` varchar(14) NOT NULL,
  `TIN` varchar(14) NOT NULL,
  `VL` float NOT NULL,
  `SL` float NOT NULL,
  `toDeduct` float NOT NULL,
  `grossPay` float NOT NULL,
  `picture` varchar(255) NOT NULL,
  `pictureTrained` varchar(255) NOT NULL,
  `TrainedFaces` int(10) NOT NULL,
  `activated` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `empID` (`empID`),
  KEY `positionCode` (`positionCode`),
  KEY `deptCode` (`deptCode`),
  KEY `positionCode_2` (`positionCode`),
  KEY `positionCode_3` (`positionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `empID`, `password`, `acctType`, `positionCode`, `deptCode`, `pera`, `lname`, `fname`, `mname`, `address`, `maritalStatus`, `noOfDependents`, `emailAddress`, `birthDate`, `contactNo`, `sex`, `status`, `dateHired`, `GSISNo`, `PhilHealthNo`, `TIN`, `VL`, `SL`, `toDeduct`, `grossPay`, `picture`, `pictureTrained`, `TrainedFaces`, `activated`) VALUES
(1, '13-037-058', '', '', 0, 0, 0, 'Micoleta', 'Theresa', 'Zamudio', '', '', 0, '', '', '', '', 'Regular', '', '', '', '', 0, 0, 0, 0, 'http://[::1]/payroll//uploads/download.jpg', '/TrainedFaces/face3.bmp', 3, 'TRUE'),
(3, '13-037-048', '155a638f9b4153658918d05d255d2a1a0259ff34584ab63e3caa225f8d647191c14e5ba316a0f326182e390c2d6693c7375326156cab05b126744e469807bf54SYbywsoz7s4iS8zyMaG2DUx4Fl69LFUr', 'HR', 0, 1, 2000, 'Zorrilla', 'Christian Lorenz', 'Salac', 'Cubao, Quezon City', 'Married', 0, 'CLSZorrilla@gmail.com', '1995-12-28', '0936-312-9137', 'Male', 'Contractual', '2017-06-06', '159752416-5465', '161564651-6516', '111555685-1231', 1.25, 1.25, 0, 0, 'http://[::1]/payroll//uploads/WIN_20161027_11_33_08_Pro.jpg', '/TrainedFaces/face1.bmp', 1, 'TRUE'),
(10, '13-037-071', '449a2d4271765549129f22dbaf365d56bd63dcbc2a65a76498d6a5494df60a537456cb0d888fca2a084dc1e478a053c82a399b50882a6153de0cfb4166465cbcK/NnnbGrgFNxpnc1hSXezPhxzPfAz0GZ', 'Payroll Clerk', 1, 1, 2000, 'Carinan', 'Wilmar Paul', 'Abella', 'Pasay City', 'Married', 1, 'wpcarinan@gmail.com', '1995-02-10', '0936-312-9137', 'Male', 'Contractual', '2017-06-06', '159753167-4822', '154871515-4518', '216843584-1515', 1.25, 1.25, 0, 0, '', '', 0, 'TRUE');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `emp.dept.deptcode` FOREIGN KEY (`deptCode`) REFERENCES `department` (`deptCode`),
  ADD CONSTRAINT `emp.pos.poscode` FOREIGN KEY (`positionCode`) REFERENCES `positions` (`positionCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
