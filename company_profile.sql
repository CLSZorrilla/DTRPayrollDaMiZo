-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 11:41 AM
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
-- Table structure for table `company_profile`
--

CREATE TABLE IF NOT EXISTS `company_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `abbre` varchar(10) NOT NULL,
  `description` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `startRange` varchar(10) NOT NULL,
  `endTime` varchar(10) NOT NULL,
  `endRange` varchar(10) NOT NULL,
  `colorTheme` varchar(15) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `timeBasis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `abbre`, `description`, `address`, `contactNo`, `startTime`, `startRange`, `endTime`, `endRange`, `colorTheme`, `logo`, `timeBasis`) VALUES
(1, 'Land Transportation Office', 'LTO', 'Transportation Sector', 'LTO Compound,East Ave., Quezon City East ', '361-1325', '07:00', '9:00', '16:00', '18:00', '#337ab7', 'http://[::1]/payroll/companyLogo/LTO-logo.png', 'Flexible');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
