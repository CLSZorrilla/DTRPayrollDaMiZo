-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 08:29 PM
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
  `endTime` varchar(10) NOT NULL,
  `startRange` varchar(10) NOT NULL,
  `endRange` varchar(10) NOT NULL,
  `colorTheme` varchar(15) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `timeBasis` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `abbre`, `description`, `address`, `contactNo`, `startTime`, `endTime`, `startRange`, `endRange`, `colorTheme`, `logo`, `timeBasis`) VALUES
(1, 'Department of Agriculture', 'DA', 'Agriculture Sector', 'Elliptical Road, DIliman, Quezon City', '361-1325', '08:00', '17:00', '07:00:00', '08:00:00', '#6c9d4d', 'http://[::1]/payroll/companyLogo/Department_of_Agriculture_of_the_Philippines_svg1.png', 'Flexible');

-- --------------------------------------------------------

--
-- Table structure for table `deductionname`
--

CREATE TABLE IF NOT EXISTS `deductionname` (
  `deductionId` int(10) NOT NULL AUTO_INCREMENT,
  `deductionName` varchar(255) NOT NULL,
  PRIMARY KEY (`deductionId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `deductionname`
--

INSERT INTO `deductionname` (`deductionId`, `deductionName`) VALUES
(1, 'Land Bank of the Philippines Loan'),
(2, 'Pagibig Loan'),
(3, 'Healthcard Loan'),
(7, 'Housing Loan');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deductionNo` int(4) NOT NULL AUTO_INCREMENT,
  `empID` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `deductionName` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `mtp` int(5) NOT NULL,
  `monthsLeft` float NOT NULL,
  `dateApplied` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`deductionNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deductionNo`, `empID`, `fullName`, `deductionName`, `amount`, `mtp`, `monthsLeft`, `dateApplied`, `status`) VALUES
(14, '13-037-048', 'Zorrilla, Chris Lorenz Salac', 'Land Bank of the Philippines Loan', 10000, 5, 5, '2017-03-08', 'On-going');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `deptCode` int(10) NOT NULL AUTO_INCREMENT,
  `deptName` varchar(255) NOT NULL,
  PRIMARY KEY (`deptCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptCode`, `deptName`) VALUES
(1, 'Personnel'),
(2, 'Accounting'),
(3, 'IT');

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
  `dateHired` varchar(255) NOT NULL,
  `GSISNo` varchar(14) NOT NULL,
  `PhilHealthNo` varchar(14) NOT NULL,
  `TIN` varchar(14) NOT NULL,
  `VL` float NOT NULL,
  `SL` float NOT NULL,
  `picture` varchar(255) NOT NULL,
  `pictureTrained` varchar(255) NOT NULL,
  `TrainedFaces` int(10) NOT NULL,
  `activated` varchar(10) NOT NULL,
  `generated` int(10) NOT NULL,
  `absences` varchar(10) DEFAULT NULL,
  `date1` datetime DEFAULT NULL,
  `date2` datetime DEFAULT NULL,
  `daysWorked` int(11) DEFAULT NULL,
  `basicPay` int(10) NOT NULL,
  `toDeduct` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `empID` (`empID`),
  KEY `positionCode` (`positionCode`),
  KEY `deptCode` (`deptCode`),
  KEY `positionCode_2` (`positionCode`),
  KEY `positionCode_3` (`positionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `empID`, `password`, `acctType`, `positionCode`, `deptCode`, `pera`, `lname`, `fname`, `mname`, `address`, `maritalStatus`, `noOfDependents`, `emailAddress`, `birthDate`, `contactNo`, `sex`, `dateHired`, `GSISNo`, `PhilHealthNo`, `TIN`, `VL`, `SL`, `picture`, `pictureTrained`, `TrainedFaces`, `activated`, `generated`, `absences`, `date1`, `date2`, `daysWorked`, `basicPay`, `toDeduct`) VALUES
(67, '13-037-048', 'e118d11a9906a3ae654cd3678385a588b90e4dc90764f3f301a03f08dea285d472cb597972b44ab0c0798b8b3ad3a4ac62d079d5ea73599b22eb90bb11df999egn9bN9BsX28u8BzdlBog/2HIPLVNCUGP', 'HR', 1, 1, 2000, 'Zorrilla', 'Chris Lorenz', 'Salac', 'Cubao, Quezon City', 'Married', 1, 'christianlorenz.zorrilla@tup.edu.ph', '1995-12-28', '0936-312-9137', 'Male', '2017-06-06', '465465465-4878', '123134649-1354', '112324445-4687', 0.25, 1.25, 'http://[::1]/payroll//uploads/IanPassportPic1.png', '/TrainedFaces/face1.bmp', 1, 'TRUE', 0, '19', '2017-02-01 00:00:00', '2017-02-28 00:00:00', 1, 0, 0),
(68, '13-037-064', 'e2c6b9720cb29fb4245b6bfc19c50884e0f02de6a7a6b9e9cbd4e2809fb537c61afe2b8ec6fccf0cbc5ca928d2b9152fd681c975819d02f983432c5bcaedef5bzT0F6xt51yU1TNLQHrp6MCiGrFincYLc', 'Payroll Clerk', 3, 1, 2000, 'Dayaon', 'Froinand', 'Bugaiosan', 'Imus, Cavite', 'Divorced', 4, 'fbdayaon@gmail.com', '1997-10-19', '0936-312-9137', 'Male', '2017-06-06', '159753468-2468', '159753456-8546', '123466545-6432', 0.25, 1.25, 'http://[::1]/payroll//uploads/170224-0730AM(13-037-064).jpg', '/TrainedFaces/face4.bmp', 1, 'TRUE', 0, '20', '2017-02-01 00:00:00', '2017-02-28 00:00:00', 0, 0, 0),
(69, '13-037-060', '523a41e5d255f33baa5caffebf1ad39c1eb8381e595fc665caa44ab31618b552366cf16c47bc840a78c5f265d571f636ab07a05be934f950b5357e17942b8a39qUWoWHORBLF3WL++qEZBtlBfT9y2T6sz', 'Employee', 1, 3, 2000, 'Gozar', 'Zyrus Van Eyeck', 'Salazar', 'Alfonso, Cavite', 'Married', 2, 'zyrusvaneyeck@gmail.com', '1997-12-10', '0936-312-9137', 'Male', '2017-06-06', '156753468-2135', '132164651-2313', '165456153-5464', 0.25, 1.25, 'http://[::1]/payroll//uploads/WIN_20170130_10_08_56_Pro.jpg', '/TrainedFaces/face3.bmp', 1, 'TRUE', 0, '20', '2017-02-01 00:00:00', '2017-02-28 00:00:00', 0, 0, 0),
(70, '13-037-058', 'da6818be28fd692839855a0509fa03bec170dc38e7f350cc373917c55ed49f3876c4399af39d131db76d9624d72428036c4f502b93308f94e32ac2f450d15b82Gs2aez1yZTiQ4LDtNC8wKPKHctyNmBQw', 'Employee', 2, 1, 2000, 'Micoleta', 'Theresa', 'Zamudio', 'Imus, Cavite', 'Married', 4, 'theresamicoleta00@gmail.com', '1997-02-22', '0936-312-9137', 'Male', '2017-06-06', '156453486-4351', '513165416-5123', '321351351-3215', 0.25, 1.25, 'http://[::1]/payroll//uploads/Screenshot_(154).png', '/TrainedFaces/face2.bmp', 1, 'TRUE', 0, '20', '2017-02-01 00:00:00', '2017-02-28 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE IF NOT EXISTS `holiday` (
  `holidayId` int(11) NOT NULL AUTO_INCREMENT,
  `holidayName` varchar(255) NOT NULL,
  `holidayDate` varchar(255) NOT NULL,
  `holidayType` varchar(255) NOT NULL,
  PRIMARY KEY (`holidayId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holidayId`, `holidayName`, `holidayDate`, `holidayType`) VALUES
(1, 'New Years Day', '01/01/2017', 'Regular'),
(3, 'Chinese New Year', '01/28/2017', 'Special Non-working'),
(4, 'People Power Anniversary', '02/25/2017', 'Observance'),
(5, 'Araw ng Kagitingan', '04/09/2017', 'Regular'),
(6, 'Maundy Thursday', '04/13/2017', 'Regular'),
(7, 'Good Friday', '04/14/2017', 'Regular'),
(8, 'Black Saturday', '04/15/2017', 'Special Non-Working'),
(9, 'Easter Sunday', '04/16/2017', 'Observance'),
(10, 'Labor Day', '05/01/2017', 'Regular'),
(11, 'Independence Day', '06/12/2017', 'Regular'),
(12, 'Eid-Ul-Fitr', '06/27/2017', '-'),
(13, 'Ninoy Aquino Day', '08/21/2017', 'Special Non-Working'),
(14, 'National Heroes Day', '08/28/2017', 'Regular'),
(15, 'Eid Al-Adha', '09/01/2017', '-'),
(16, 'Public Holiday', '10/31/2017', 'Special Non-Working'),
(17, 'All Saints Day', '11/01/2017', 'Special Non-Working'),
(18, 'All Souls Day', '11/02/2017', 'Observance'),
(19, 'Bonifacio Day', '11/30/2017', 'Regular'),
(20, 'Christmas Eve', '12/24/2017', 'Observance'),
(21, 'Christmas Day', '12/25/2017', 'Regular'),
(22, 'Rizal Day', '12/30/2017', 'Regular'),
(23, 'New Years Eve', '12/31/2017', 'Special Non-Working');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `leaveID` int(10) NOT NULL AUTO_INCREMENT,
  `leaveName` varchar(255) NOT NULL,
  PRIMARY KEY (`leaveID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`leaveID`, `leaveName`) VALUES
(1, 'Vacation Leave'),
(2, 'Sick Leave'),
(3, 'Maternity Leave'),
(4, 'Paternal Leave'),
(5, 'Study Leave');

-- --------------------------------------------------------

--
-- Table structure for table `leavehistory`
--

CREATE TABLE IF NOT EXISTS `leavehistory` (
  `leaveNo` int(10) NOT NULL AUTO_INCREMENT,
  `empID` varchar(255) NOT NULL,
  `leaveType` int(10) NOT NULL,
  `startingDate` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `noOfDays` int(2) NOT NULL,
  `approvalDate` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`leaveNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paysheet`
--

CREATE TABLE IF NOT EXISTS `paysheet` (
  `paysheetNo` int(5) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `basicpay` int(7) NOT NULL,
  `pera` int(7) NOT NULL,
  `grosspay` int(7) NOT NULL,
  `philhealth` int(7) NOT NULL,
  `pagibig` int(7) NOT NULL,
  `gsis` int(7) NOT NULL,
  `tax` int(7) NOT NULL,
  `netpay` varchar(10) NOT NULL,
  `absences` int(5) NOT NULL,
  `daysWorked` varchar(12) NOT NULL,
  `hoursWorked` varchar(10) NOT NULL,
  `numOfLate` varchar(2) NOT NULL,
  `VL` varchar(10) NOT NULL,
  `SL` varchar(15) NOT NULL,
  `TIN` varchar(20) NOT NULL,
  `PhilHealthNo` varchar(20) NOT NULL,
  `GSISNo` varchar(20) NOT NULL,
  `firstHalf` varchar(20) NOT NULL,
  `secondHalf` varchar(20) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  PRIMARY KEY (`paysheetNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paysheetloan`
--

CREATE TABLE IF NOT EXISTS `paysheetloan` (
  `psl_id` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `empID` varchar(20) NOT NULL,
  `deductionName` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`psl_id`),
  KEY `payslipNo` (`Month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE IF NOT EXISTS `payslip` (
  `payslipNo` int(5) NOT NULL AUTO_INCREMENT,
  `empID` varchar(50) NOT NULL,
  `basicpay` varchar(7) NOT NULL,
  `pera` varchar(7) NOT NULL,
  `grosspay` varchar(7) NOT NULL,
  `philhealth` varchar(7) NOT NULL,
  `pagibig` varchar(7) NOT NULL,
  `gsis` varchar(7) NOT NULL,
  `tax` varchar(7) NOT NULL,
  `netpay` varchar(10) NOT NULL,
  `absences` int(5) NOT NULL,
  `noOfLates` varchar(20) NOT NULL,
  `daysWorked` varchar(20) NOT NULL,
  `hoursWorked` varchar(12) NOT NULL,
  `VL` varchar(20) NOT NULL,
  `SL` varchar(20) NOT NULL,
  `firstHalf` varchar(20) NOT NULL,
  `secondHalf` varchar(20) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  PRIMARY KEY (`payslipNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payslip`
--

INSERT INTO `payslip` (`payslipNo`, `empID`, `basicpay`, `pera`, `grosspay`, `philhealth`, `pagibig`, `gsis`, `tax`, `netpay`, `absences`, `noOfLates`, `daysWorked`, `hoursWorked`, `VL`, `SL`, `firstHalf`, `secondHalf`, `Month`, `Year`) VALUES
(3, '13-037-048', '24141.0', '272.71', '3496.04', '50.00', '100', '314.64', '0', '3031.4', 19, '0', '1', '7.5 Hours', '0.25', '1.25', '1515.7', '1515.7', 'Mar', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `paysliploan`
--

CREATE TABLE IF NOT EXISTS `paysliploan` (
  `psl_id` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(20) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `empID` varchar(20) NOT NULL,
  `deductionName` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`psl_id`),
  KEY `payslipNo` (`Month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `philhealth`
--

CREATE TABLE IF NOT EXISTS `philhealth` (
  `monthlySalaryBracket` int(3) NOT NULL,
  `startRange` double NOT NULL,
  `endRange` double NOT NULL,
  `totalMonthlyContribution` double(10,2) NOT NULL,
  `employeeShare` double(10,2) NOT NULL,
  `employerShare` double(10,2) NOT NULL,
  PRIMARY KEY (`monthlySalaryBracket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `philhealth`
--

INSERT INTO `philhealth` (`monthlySalaryBracket`, `startRange`, `endRange`, `totalMonthlyContribution`, `employeeShare`, `employerShare`) VALUES
(1, 0, 4999.99, 100.00, 50.00, 50.00),
(2, 5000, 5999.99, 125.00, 62.50, 62.50),
(3, 6000, 6999.99, 150.00, 75.00, 75.00),
(4, 7000, 7999.99, 175.00, 87.50, 87.50),
(5, 8000, 8999.99, 200.00, 100.00, 100.00),
(6, 9000, 9999.99, 225.00, 112.50, 112.50),
(7, 10000, 10999.99, 250.00, 125.00, 125.00),
(8, 11000, 11999.99, 275.00, 137.50, 137.50),
(9, 12000, 12999.99, 300.00, 150.00, 150.00),
(10, 13000, 13999.99, 325.00, 162.50, 162.50),
(11, 14000, 14999.99, 350.00, 175.00, 175.00),
(12, 15000, 15999.99, 375.00, 187.50, 187.50),
(13, 16000, 16999.99, 400.00, 200.00, 200.00),
(14, 17000, 17999.99, 425.00, 212.50, 212.50),
(15, 18000, 18999.99, 450.00, 225.00, 225.00),
(16, 19000, 19999.99, 475.00, 237.50, 237.50),
(17, 20000, 20999.99, 500.00, 250.00, 250.00),
(18, 21000, 21999.99, 525.00, 262.50, 262.50),
(19, 22000, 22999.99, 550.00, 275.00, 275.00),
(20, 23000, 23999.99, 575.00, 287.50, 287.50),
(21, 24000, 24999.99, 600.00, 300.00, 300.00),
(22, 25000, 999999.99, 625.00, 312.50, 312.50);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `positionCode` int(10) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(255) NOT NULL,
  `salaryGrade` varchar(255) NOT NULL,
  PRIMARY KEY (`positionCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionCode`, `positionName`, `salaryGrade`) VALUES
(1, 'Division Chief', '14'),
(2, 'Administrative Aide II', '12'),
(3, 'Administrative Aide I', '10'),
(4, 'Utility Worker', '2');

-- --------------------------------------------------------

--
-- Table structure for table `salarygrade`
--

CREATE TABLE IF NOT EXISTS `salarygrade` (
  `salaryGrade` int(3) NOT NULL,
  `step_1` double(10,2) NOT NULL,
  `step_2` double(10,2) NOT NULL,
  `step_3` double(10,2) NOT NULL,
  `step_4` double(10,2) NOT NULL,
  `step_5` double(10,2) NOT NULL,
  `step_6` double(10,2) NOT NULL,
  `step_7` double(10,2) NOT NULL,
  `step_8` double(10,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`salaryGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarygrade`
--

INSERT INTO `salarygrade` (`salaryGrade`, `step_1`, `step_2`, `step_3`, `step_4`, `step_5`, `step_6`, `step_7`, `step_8`, `remarks`) VALUES
(1, 9478.00, 9568.00, 9660.00, 9753.00, 9846.00, 9949.00, 10036.00, 10132.00, ''),
(2, 10159.00, 10255.00, 10351.00, 10449.00, 10547.00, 10674.00, 10747.00, 10848.00, ''),
(3, 10883.00, 10985.00, 11089.00, 11193.00, 11298.00, 11405.00, 11512.00, 11621.00, ''),
(4, 11658.00, 11767.00, 11878.00, 11990.00, 12103.00, 12217.00, 12333.00, 12448.00, ''),
(5, 12488.00, 12644.00, 12725.00, 12844.00, 12965.00, 13087.00, 13211.00, 13335.00, ''),
(6, 13378.00, 13504.00, 13630.00, 13759.00, 13889.00, 14020.00, 14152.00, 14285.00, ''),
(7, 14331.00, 14466.00, 14602.00, 14740.00, 14878.00, 15018.00, 15159.00, 15303.00, ''),
(8, 15368.00, 15519.00, 15670.00, 15823.00, 15978.00, 16133.00, 16291.00, 16450.00, ''),
(9, 16512.00, 16671.00, 16830.00, 16992.00, 17155.00, 17319.00, 17485.00, 17653.00, ''),
(10, 17730.00, 17900.00, 18071.00, 18245.00, 18420.00, 18634.00, 18775.00, 18955.00, ''),
(11, 19077.00, 19286.00, 19496.00, 19709.00, 19925.00, 20142.00, 20362.00, 20585.00, ''),
(12, 20651.00, 20870.00, 21091.00, 21315.00, 21540.00, 21769.00, 21999.00, 22232.00, ''),
(13, 22328.00, 22564.00, 22804.00, 23045.00, 23289.00, 23536.00, 23786.00, 24037.00, ''),
(14, 24141.00, 24396.00, 24655.00, 24916.00, 25180.00, 25447.00, 25717.00, 25989.00, ''),
(15, 26192.00, 26489.00, 26790.00, 27094.00, 27401.00, 27712.00, 28027.00, 28344.00, ''),
(16, 28417.00, 28740.00, 29066.00, 29396.00, 29729.00, 30066.00, 30408.00, 30752.00, ''),
(17, 30831.00, 31183.00, 31536.00, 31893.00, 32255.00, 32622.00, 32991.00, 33366.00, ''),
(18, 33452.00, 33831.00, 34215.00, 34603.00, 34996.00, 35393.00, 35795.00, 36201.00, ''),
(19, 36409.00, 36857.00, 37312.00, 37771.00, 38237.00, 38709.00, 39186.00, 39670.00, ''),
(20, 39768.00, 40259.00, 40755.00, 41258.00, 41766.00, 42281.00, 42802.00, 43330.00, ''),
(21, 43439.00, 43974.00, 44517.00, 45066.00, 45621.00, 46183.00, 46753.00, 47329.00, ''),
(22, 47448.00, 48032.00, 48625.00, 49224.00, 49831.00, 50445.00, 51067.00, 51697.00, ''),
(23, 51826.00, 52466.00, 53112.00, 53767.00, 54430.00, 55101.00, 55781.00, 56468.00, ''),
(24, 56610.00, 57308.00, 58014.00, 58730.00, 59453.00, 60187.00, 60928.00, 61679.00, ''),
(25, 61971.00, 62735.00, 63508.00, 64291.00, 65083.00, 65885.00, 66698.00, 67520.00, ''),
(26, 67690.00, 38524.00, 69369.00, 70224.00, 71090.00, 71967.00, 72855.00, 73751.00, ''),
(27, 73937.00, 74849.00, 75771.00, 76705.00, 77651.00, 78608.00, 79577.00, 80567.00, ''),
(28, 80760.00, 81756.00, 82764.00, 83784.00, 84817.00, 85862.00, 86921.00, 87993.00, ''),
(29, 88214.00, 89301.00, 90402.00, 91516.00, 92644.00, 93768.00, 94943.00, 96113.00, ''),
(30, 96354.00, 97543.00, 98745.00, 99962.00, 101195.00, 102442.00, 103705.00, 104984.00, ''),
(31, 117086.00, 118623.00, 120180.00, 121758.00, 123356.00, 124975.00, 126616.00, 128278.00, ''),
(32, 135376.00, 137174.00, 138996.00, 140843.00, 142714.00, 144610.00, 146531.00, 148478.00, ''),
(33, 160924.00, 165752.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '');

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
  PRIMARY KEY (`logno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`logno`, `empID`, `logdate`, `timeIn`, `amOut`, `pmIn`, `timeOut`, `countInOut`) VALUES
(1, '13-037-048', '2017-02-15', '07:00', '12:00', '13:30', '17:00', 4),
(5, '', '2017-03-08', '06:29 AM', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withholdingtax`
--

CREATE TABLE IF NOT EXISTS `withholdingtax` (
  `compensationLevel` varchar(25) NOT NULL,
  `exemption` double(10,2) NOT NULL,
  `status` double(10,2) NOT NULL,
  `Z` double(10,2) NOT NULL,
  `SME` double(10,2) NOT NULL,
  `ME1S1` double(10,2) NOT NULL,
  `ME2S2` double(10,2) NOT NULL,
  `ME3S3` double(10,2) NOT NULL,
  `ME4S4` double(10,2) NOT NULL,
  PRIMARY KEY (`compensationLevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withholdingtax`
--

INSERT INTO `withholdingtax` (`compensationLevel`, `exemption`, `status`, `Z`, `SME`, `ME1S1`, `ME2S2`, `ME3S3`, `ME4S4`) VALUES
('daily_1', 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00),
('daily_2', 0.00, 0.05, 0.00, 165.00, 248.00, 330.00, 413.00, 495.00),
('daily_3', 1.65, 0.10, 33.00, 198.00, 281.00, 363.00, 446.00, 528.00),
('daily_4', 8.25, 0.15, 99.00, 264.00, 347.00, 429.00, 512.00, 594.00),
('daily_5', 28.05, 0.20, 231.00, 396.00, 479.00, 561.00, 644.00, 726.00),
('daily_6', 74.26, 0.25, 462.00, 627.00, 710.00, 792.00, 875.00, 957.00),
('daily_7', 165.02, 0.30, 825.00, 990.00, 1073.00, 1155.00, 1238.00, 1320.00),
('daily_8', 412.54, 0.32, 1650.00, 1815.00, 1898.00, 1980.00, 2063.00, 2145.00),
('monthly_1', 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00),
('monthly_2', 0.00, 0.05, 0.00, 4167.00, 6250.00, 8333.00, 10417.00, 12500.00),
('monthly_3', 41.67, 0.10, 833.00, 5000.00, 7083.00, 9167.00, 11250.00, 13333.00),
('monthly_4', 208.33, 0.15, 2500.00, 6667.00, 8750.00, 10833.00, 12917.00, 15000.00),
('monthly_5', 708.33, 0.20, 5833.00, 10000.00, 12083.00, 14167.00, 16250.00, 18333.00),
('monthly_6', 1875.00, 0.25, 11667.00, 15833.00, 17917.00, 20000.00, 22083.00, 24167.00),
('monthly_7', 4166.67, 0.30, 20833.00, 25000.00, 27083.00, 29167.00, 31250.00, 33333.00),
('monthly_8', 10416.67, 0.32, 41667.00, 45833.00, 47917.00, 50000.00, 52083.00, 54167.00),
('semi_1', 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00),
('semi_2', 0.00, 0.05, 0.00, 2083.00, 3125.00, 4167.00, 5208.00, 6250.00),
('semi_3', 20.83, 0.10, 417.00, 2500.00, 3542.00, 4583.00, 5625.00, 6667.00),
('semi_4', 104.17, 0.15, 1250.00, 3333.00, 4375.00, 5417.00, 6458.00, 7500.00),
('semi_5', 354.17, 0.20, 2917.00, 5000.00, 6042.00, 7083.00, 8125.00, 9167.00),
('semi_6', 937.50, 0.25, 5833.00, 7917.00, 8958.00, 10000.00, 11042.00, 12083.00),
('semi_7', 2083.33, 0.30, 10417.00, 12500.00, 13542.00, 14583.00, 15625.00, 16667.00),
('semi_8', 5208.33, 0.32, 20833.00, 22917.00, 23958.00, 25000.00, 26042.00, 27083.00),
('weekly_1', 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00),
('weekly_2', 0.00, 0.05, 0.00, 962.00, 1442.00, 1923.00, 2404.00, 2885.00),
('weekly_3', 9.62, 0.10, 192.00, 1154.00, 1635.00, 2115.00, 2596.00, 3077.00),
('weekly_4', 48.08, 0.15, 577.00, 1538.00, 2019.00, 2500.00, 2981.00, 3462.00),
('weekly_5', 163.46, 0.20, 1346.00, 2308.00, 2788.00, 3269.00, 3750.00, 4231.00),
('weekly_6', 432.69, 0.25, 2692.00, 3654.00, 4135.00, 4615.00, 5096.00, 5577.00),
('weekly_7', 961.54, 0.30, 4808.00, 5769.00, 6250.00, 6731.00, 7212.00, 7692.00),
('weekly_8', 2403.85, 0.32, 9615.00, 10577.00, 11058.00, 11538.00, 12019.00, 12500.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
