-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2017 at 02:38 PM
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
  `description` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `endTime` varchar(10) NOT NULL,
  `colorTheme` varchar(15) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `abbre` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `description`, `address`, `contactNo`, `startTime`, `endTime`, `colorTheme`, `logo`, `abbre`) VALUES
(1, 'Land Transportation Office', 'Transportation Sector', 'East Avenue, Quezon City', '361-1325', '08:00', '17:00', '#337ab7', 'http://[::1]/payroll/companyLogo/LTO-logo.png', 'LTO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
