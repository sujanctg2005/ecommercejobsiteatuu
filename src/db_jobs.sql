-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2011 at 07:21 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_qualification`
--

CREATE TABLE IF NOT EXISTS `tbl_academic_qualification` (
  `EmployeeID` int(11) NOT NULL,
  `LevelOfEducation` varchar(20) NOT NULL,
  `Degree` varchar(20) NOT NULL,
  `Major` varchar(20) NOT NULL,
  `InstitutionName` varchar(30) NOT NULL,
  `Grade` float NOT NULL,
  `YearOfPassing` int(11) NOT NULL,
  `Duration` float NOT NULL,
  `SecondLevelOfEducation` varchar(11) NOT NULL,
  `SecondDegree` varchar(20) NOT NULL,
  `SecondMajor` varchar(20) NOT NULL,
  `SecondInstitutionName` varchar(30) NOT NULL,
  `SecondGrade` char(1) NOT NULL,
  `SecondYearOfPassing` int(11) NOT NULL,
  `SecondDuration` float NOT NULL,
  KEY `EmployeeID` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_qualification`
--

INSERT INTO `tbl_academic_qualification` (`EmployeeID`, `LevelOfEducation`, `Degree`, `Major`, `InstitutionName`, `Grade`, `YearOfPassing`, `Duration`, `SecondLevelOfEducation`, `SecondDegree`, `SecondMajor`, `SecondInstitutionName`, `SecondGrade`, `SecondYearOfPassing`, `SecondDuration`) VALUES
(94, 'Doctorial', 'Computer Science & E', 'asfkljsal', 'aklsfjlaskdjf', 4, 1950, 4, 'Doctorial', 'Computer Science & E', 'asklfj', 'askldfjksajdflk', '3', 1950, 4),
(94, 'Doctorial', 'Computer Science & E', 'asfkljsal', 'aklsfjlaskdjf', 4, 1950, 4, 'Doctorial', 'Computer Science & E', 'asklfj', 'askldfjksajdflk', '3', 1950, 4),
(94, 'Doctorial', 'Computer Science & E', 'asfkljsal', 'aklsfjlaskdjf', 4, 1950, 4, 'Doctorial', 'Computer Science & E', 'asklfj', 'askldfjksajdflk', '3', 1950, 4),
(94, 'Doctorial', 'Computer Science & E', 'asfkljsal', 'aklsfjlaskdjf', 4, 1950, 4, 'Doctorial', 'Computer Science & E', 'asklfj', 'askldfjksajdflk', '3', 1950, 4),
(75, 'Doctorial', 'Computer Science & E', 'Computer Science', 'Kathmandu University', 4, 1950, 4, 'Doctorial', 'BioMedical', 'Computer Science', 'Uppsala University', '4', 1950, 4),
(95, 'Doctorial', 'Computer Science & E', 'english', 'inst1111111', 3, 1950, 3, 'Doctorial', 'Computer Science & E', 'nepali', 'inst2', '4', 1950, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_type`
--

CREATE TABLE IF NOT EXISTS `tbl_business_type` (
  `BusinessTypeID` int(10) NOT NULL AUTO_INCREMENT,
  `BusinessType` varchar(20) NOT NULL,
  PRIMARY KEY (`BusinessTypeID`),
  UNIQUE KEY `BusinessType_UNIQUE` (`BusinessType`),
  UNIQUE KEY `BusinessType` (`BusinessType`),
  UNIQUE KEY `BusinessType_2` (`BusinessType`),
  KEY `BusinessTypeID` (`BusinessTypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_business_type`
--

INSERT INTO `tbl_business_type` (`BusinessTypeID`, `BusinessType`) VALUES
(1, 'accounting'),
(3, 'Banks'),
(2, 'Computer Science'),
(4, 'Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `CityID` int(10) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(30) NOT NULL,
  `CountryID` int(10) NOT NULL,
  PRIMARY KEY (`CityID`),
  UNIQUE KEY `CityName` (`CityName`),
  KEY `CountryID` (`CountryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`CityID`, `CityName`, `CountryID`) VALUES
(1, 'Kathmandu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `CountryID` int(10) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(30) NOT NULL,
  PRIMARY KEY (`CountryID`),
  UNIQUE KEY `CompanyName` (`CountryName`),
  UNIQUE KEY `CountryName` (`CountryName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`CountryID`, `CountryName`) VALUES
(10, '1'),
(2, 'Australia'),
(5, 'Denmark'),
(4, 'England'),
(3, 'Finland'),
(1, 'Nepal'),
(6, 'Sweden');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `UserID` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `MaritialStatus` varchar(10) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Religion` varchar(20) DEFAULT NULL,
  `CurrentAddress` varchar(50) NOT NULL,
  `PermanentAddress` varchar(50) NOT NULL,
  `HomePhone` varchar(15) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `OfficePhone` varchar(15) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `AlternativeEmail` varchar(30) DEFAULT NULL,
  `ImagePath` varchar(100) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`UserID`, `Name`, `DateOfBirth`, `Gender`, `MaritialStatus`, `Nationality`, `Religion`, `CurrentAddress`, `PermanentAddress`, `HomePhone`, `Mobile`, `OfficePhone`, `Email`, `AlternativeEmail`, `ImagePath`) VALUES
(75, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0.gif'),
(76, 'Suman Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_15.gif'),
(77, 'Testing', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_12.gif'),
(79, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(80, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(82, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(83, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(84, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(85, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(86, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(87, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(88, 'Amendra Shrestha', '2011-05-31', 'Male', 'Single', 'Nepal', 'Hindu', 'Uppsala', 'Nepal', '9879879', '897', '98798', 'amendrashrestha@gmail.com', 'aminshrestha@gmail.com', '/ecom/public/../uploads/Image_0_7.gif'),
(90, 'testing', '2011-05-31', 'Male', 'Single', 'lasjdfkl', 'kljasklfj', 'ljaslkfj', 'ljaslfkj', '87897987', '897897987', '897987987', 'aslfj@algjas.com', 'asjf@aslfj.com', '/ecom/public/../uploads/Image_0_20.gif'),
(91, 'uppsala', '2011-05-31', 'Male', 'Single', 'Nepal', 'laskdfj', 'laskfjkl', 'lkasjdflk', '879879', '878978979', '7987897', 'aslfj@algjas.com', 'sw@laisf.com', '/ecom/public/../uploads/Image_0_21.gif'),
(92, 'Ekta', '2011-06-23', 'Male', 'Single', 'Nepal', 'aslkfj', 'lasjl', 'lkajsf', '8787897', '987897897', '89789789', 'slakj@asl.com', 'sakfj@askfj.com', '/ecom/public/../uploads/Image_0_23.gif'),
(93, 'aslkfjl', '2011-06-15', 'Male', 'Single', 'slkadfjkla', 'lajsldkfj', 'lkjasfd', 'lkjasf', '099809', '098098', '08098', 'lsajflk@gaklsjd.com', 'asjf@aslfj.com', '/ecom/public/../uploads/Image_0_24.gif'),
(94, 'Suman Shresetha', '2011-05-13', 'Male', 'Single', 'askldfj', 'lkasjf', 'lkasjf', 'lkajsf', '98789', '98779', '798798', 'aslfj@algjas.com', 'asjf@aslfj.com', '/ecom/public/../uploads/Image_0_25.gif'),
(95, 'asdf', '2011-06-15', 'Male', 'Single', 'asdfadsf', 'asdf', 'asdf', 'asdf', '332222', '23233223', '232323', 'asdf@ssdf.com', 'sdfs@sdf.com', '/jjjjjj/public/../uploads/Image_0.gif'),
(96, 'adsf', '2011-06-01', 'Male', 'Single', 'adsf', 'asdfadsf', 'asdfasdf', 'asdf', '23332', '32323', '32232', '323232@sdf.com', 'asdf@asdlf.com', '/jjjjjj/public/../uploads/Image_0_2.gif'),
(97, 'adsf', '2011-06-16', 'Male', 'Single', 'asdf', 'asdfasdf', 'asdf', 'asdfa', '222222', '222222', '222222', 'asdf@dsdsf.com', 'asldf@asdlf.com', '/jjjjjj/public/../uploads/Image_0_2.gif'),
(98, 'asdf', '2011-06-08', 'Male', 'Single', 'asdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', '222', '2222', '222', 'asdf@com.com', 'asdf@dfsf.com', '/jjjjjj/public/../uploads/Image_0_3.gif'),
(99, 'asdf', '2011-05-03', 'Male', 'Single', 'asdf', 'asdf', 'asdf', 'asdf', '2', '2222', '222', 'asdf@com.com', 'asdf@dsf.com', '/jjjjjj/public/../uploads/Image_0_3.gif'),
(100, 'asdf', '2011-05-03', 'Male', 'Single', 'asdf', 'asdf', 'asdf', 'asdf', '2', '2222', '222', 'asdf@com.com', 'asdf@dsf.com', '/jjjjjj/public/../uploads/Image_0_3.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer`
--

CREATE TABLE IF NOT EXISTS `tbl_employer` (
  `UserID` int(10) NOT NULL,
  `CompanyName` varchar(30) NOT NULL,
  `AlternativeCompanyName` varchar(30) NOT NULL,
  `CompanyAddress` varchar(30) NOT NULL,
  `CompanyPhone` varchar(20) NOT NULL,
  `CompanyEmail` varchar(30) NOT NULL,
  `CompanyURL` varchar(30) NOT NULL,
  `CompanyLogo` varchar(100) NOT NULL,
  `ContactPerson` varchar(30) NOT NULL,
  `ContactPersonDesignatation` varchar(20) NOT NULL,
  `CountryID` varchar(30) NOT NULL,
  `BusinessTypeID` varchar(30) NOT NULL,
  `BillingAddress` varchar(30) NOT NULL,
  `CityID` int(10) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `CountryID_2` (`CountryID`),
  UNIQUE KEY `CountryID_3` (`CountryID`),
  KEY `UserID` (`UserID`),
  KEY `CountryID` (`CountryID`),
  KEY `CityID` (`CityID`),
  KEY `CountryID_4` (`CountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employer`
--

INSERT INTO `tbl_employer` (`UserID`, `CompanyName`, `AlternativeCompanyName`, `CompanyAddress`, `CompanyPhone`, `CompanyEmail`, `CompanyURL`, `CompanyLogo`, `ContactPerson`, `ContactPersonDesignatation`, `CountryID`, `BusinessTypeID`, `BillingAddress`, `CityID`) VALUES
(54, 'BAC', 'skdfj', 'laksjf', 'lkjasf', 'ljasf', 'lasdfj', 'lajsd', 'ljasf', 'ljasf', '1', 'lkdfjsdkl', 'lkasjfl', 1),
(101, 'mesfin', 'mesfin', 'asdf', '2332332', 'asdf@dsf.com', 'www.hotmail.com', 'logo', 'mesfin', 'mesfin', 'Denmark', 'Banks', 'asdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employerpaymentstatus`
--

CREATE TABLE IF NOT EXISTS `tbl_employerpaymentstatus` (
  `ServicePaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployerId` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `Status` varchar(100) DEFAULT '0',
  PRIMARY KEY (`ServicePaymentID`),
  KEY `Fk_serviceId` (`ServiceId`),
  KEY `fk_employerId` (`EmployerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_employerpaymentstatus`
--

INSERT INTO `tbl_employerpaymentstatus` (`ServicePaymentID`, `EmployerId`, `ServiceId`, `Status`) VALUES
(1, NULL, NULL, NULL),
(19, 10, 1, '0'),
(18, 10, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expertise`
--

CREATE TABLE IF NOT EXISTS `tbl_expertise` (
  `ExpertiseID` int(10) NOT NULL AUTO_INCREMENT,
  `ExpertiseDescription` varchar(20) NOT NULL,
  PRIMARY KEY (`ExpertiseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_expertise`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE IF NOT EXISTS `tbl_job` (
  `JobID` int(10) NOT NULL AUTO_INCREMENT,
  `JobTitle` varchar(20) NOT NULL,
  `NoOfVacancy` int(100) NOT NULL,
  `JobCategoryID` varchar(30) NOT NULL,
  `JobPostDate` date NOT NULL,
  `ApplicationDeadline` datetime NOT NULL,
  `EmployeerID` int(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `HeightCompanyName` tinyint(1) NOT NULL,
  PRIMARY KEY (`JobID`),
  KEY `JobCategoryID` (`JobCategoryID`),
  KEY `EmployeerID` (`EmployeerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1226 ;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`JobID`, `JobTitle`, `NoOfVacancy`, `JobCategoryID`, `JobPostDate`, `ApplicationDeadline`, `EmployeerID`, `Designation`, `CompanyName`, `HeightCompanyName`) VALUES
(2, 'Nurse', 2, 'Medical', '2011-05-10', '2011-05-27 11:26:08', 54, 'Doctor', 'BMC', 1),
(123, 'kjkfh', 0, 'IT', '2011-05-18', '2011-05-12 04:16:48', 54, 'hkaim', 'ABC', 0),
(1223, 'kjkfh', 1, 'IT', '2011-05-18', '2011-05-12 04:16:48', 54, 'hkaim', 'ABC', 0),
(1224, 'bhj', 87, 'IT', '2011-07-19', '2011-07-19 00:00:00', 54, '', '', 0),
(1225, 'ghkj', 7, 'Accounting', '2011-07-19', '2011-07-19 00:00:00', 54, 's', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_application`
--

CREATE TABLE IF NOT EXISTS `tbl_job_application` (
  `JobApplicationID` int(10) NOT NULL AUTO_INCREMENT,
  `JobID` int(10) NOT NULL,
  `EmployeeID` int(10) NOT NULL,
  `ApplicationDate` date NOT NULL,
  PRIMARY KEY (`JobApplicationID`),
  KEY `JobID` (`JobID`),
  KEY `EmployeeID` (`EmployeeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_job_application`
--

INSERT INTO `tbl_job_application` (`JobApplicationID`, `JobID`, `EmployeeID`, `ApplicationDate`) VALUES
(10, 123, 95, '2011-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_category`
--

CREATE TABLE IF NOT EXISTS `tbl_job_category` (
  `JobCategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `JobCategory` varchar(20) NOT NULL,
  PRIMARY KEY (`JobCategoryID`),
  UNIQUE KEY `JobCategory` (`JobCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_job_category`
--

INSERT INTO `tbl_job_category` (`JobCategoryID`, `JobCategory`) VALUES
(5, 'Accounting'),
(6, 'Data Entry'),
(4, 'Engineer'),
(1, 'IT'),
(3, 'Mechanics'),
(2, 'Medical');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_requirement`
--

CREATE TABLE IF NOT EXISTS `tbl_job_requirement` (
  `JobRequirementID` int(10) NOT NULL AUTO_INCREMENT,
  `JobID` int(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `MinimumAgeLimit` int(2) NOT NULL,
  `MaximumAgeLimit` int(2) NOT NULL,
  `JobType` varchar(20) NOT NULL,
  `EducationalQualificationalID` char(100) NOT NULL,
  `Experience` int(2) NOT NULL,
  `JobResponsibility` varchar(20) NOT NULL,
  `AdditionalJobRequirement` varchar(20) NOT NULL,
  `MinimumSalaryRange` int(10) NOT NULL,
  `MaximumSalaryRange` int(10) NOT NULL,
  `Benifits` varchar(10) NOT NULL,
  PRIMARY KEY (`JobRequirementID`),
  KEY `JobID` (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job_requirement`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_requirement_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_job_requirement_detail` (
  `RequirementID` int(10) NOT NULL,
  `ExpertiseID` int(10) NOT NULL,
  PRIMARY KEY (`RequirementID`,`ExpertiseID`),
  KEY `RequirementID` (`RequirementID`),
  KEY `ExpertiseID` (`ExpertiseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_requirement_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_login_detail` (
  `UserID` int(20) NOT NULL,
  `LastLogonDateTime` datetime NOT NULL,
  PRIMARY KEY (`UserID`,`LastLogonDateTime`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile_view_stats`
--

CREATE TABLE IF NOT EXISTS `tbl_profile_view_stats` (
  `ProfileViewStatsID` int(10) NOT NULL AUTO_INCREMENT,
  `EmployeeID` int(10) NOT NULL,
  `EmployerID` int(10) NOT NULL,
  `ViewDate` date NOT NULL,
  PRIMARY KEY (`ProfileViewStatsID`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `EmployerID` (`EmployerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_profile_view_stats`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

CREATE TABLE IF NOT EXISTS `tbl_qualification` (
  `QualificationID` int(10) NOT NULL AUTO_INCREMENT,
  `EmployeeID` int(10) NOT NULL,
  `FromDate` int(11) NOT NULL,
  `ToDate` int(11) DEFAULT NULL,
  `Organization` varchar(20) NOT NULL,
  `OrganizationAddress` varchar(20) NOT NULL,
  `SecondOrganization` varchar(20) DEFAULT NULL,
  `SecondOrganizationAddress` varchar(20) DEFAULT NULL,
  `SecondFromDate` int(11) DEFAULT NULL,
  `SecondToDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`QualificationID`),
  KEY `EmployeeID` (`EmployeeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_qualification`
--

INSERT INTO `tbl_qualification` (`QualificationID`, `EmployeeID`, `FromDate`, `ToDate`, `Organization`, `OrganizationAddress`, `SecondOrganization`, `SecondOrganizationAddress`, `SecondFromDate`, `SecondToDate`) VALUES
(1, 94, 1950, 1950, 'kalsjflk', 'lkajsfls', 'asfskflj', 'asfkasjf', 1950, 1950),
(7, 94, 1950, 1950, 'kalsjflk', 'lkajsfls', 'asfskflj', 'asfkasjf', 1950, 1950),
(8, 94, 1950, 1950, 'kalsjflk', 'lkajsfls', 'asfskflj', 'asfkasjf', 1950, 1950),
(9, 75, 1950, 1950, 'D2Hawkeye Services P', 'Kathmandu', 'adsfadsf', 'dasfasdfadfs', 1950, 1950),
(10, 95, 1950, 1950, '', '', '', '', 1950, 1950);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification_expertise_association`
--

CREATE TABLE IF NOT EXISTS `tbl_qualification_expertise_association` (
  `QualifictionID` int(10) NOT NULL,
  `ExpertiseID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qualification_expertise_association`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_charge`
--

CREATE TABLE IF NOT EXISTS `tbl_service_charge` (
  `ServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceType` varchar(100) NOT NULL,
  `ServiceFee` decimal(8,2) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ServiceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_service_charge`
--

INSERT INTO `tbl_service_charge` (`ServiceId`, `ServiceType`, `ServiceFee`, `Description`) VALUES
(1, 'Online Job Posting/Announcement', 2000.00, '2000 Kr for each job postion at category/ classified section'),
(2, 'Hot Job Announcement', 3000.00, '3000 Kr for each job postion at category/ classified section'),
(3, 'Online CV Bank Access', 3000.00, '3000 Kr for each job postion at category/ classified section'),
(4, 'Executive Search Service', 4000.00, '3000 Kr for each job postion at category/ classified section');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE IF NOT EXISTS `tbl_user_info` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `LastUpdatedOn` datetime NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`UserID`, `Username`, `Password`, `UserType`, `CreatedOn`, `LastUpdatedOn`) VALUES
(23, 'rupesh', 'ffki0V4oJ6TBc', 'admin', '2011-06-05 17:11:50', '2011-06-05 17:11:53'),
(54, 'amendra', '39vfYkFNsAEl. ', 'Employer', '2011-05-15 00:00:00', '2011-05-15 00:00:00'),
(75, 'amendrashrestha', '39vfYkFNsAEl. ', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(76, 'SumanShrestha', 'b5cZlrMSZkmm2', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(77, 'Testing', 'd4rBwtAKocqwA', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(79, 'testing1234', 'aelMTl885So/w', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(80, 'testing9089', 'aelMTl885So/w', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(82, 'amendra8687678', '39vfYkFNsAEl.', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(83, 'lasjflksjaf97897', '39vfYkFNsAEl.', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(84, 'updatebaba', 'd4rBwtAKocqwA', 'Employee', '2011-05-29 00:00:00', '2011-05-29 00:00:00'),
(85, 'amendra3', 'd4rBwtAKocqwA', 'Employee', '2011-05-30 00:00:00', '2011-05-30 00:00:00'),
(86, 'Tension', 'd4rBwtAKocqwA', 'Employee', '2011-05-30 00:00:00', '2011-05-30 00:00:00'),
(87, 'alsifjlasjdflkj', 'd4rBwtAKocqwA', 'Employee', '2011-05-30 00:00:00', '2011-05-30 00:00:00'),
(88, 'askfjklasflkjl', 'd4rBwtAKocqwA', 'Employee', '2011-05-30 00:00:00', '2011-05-30 00:00:00'),
(90, 'testing789', 'd4rBwtAKocqwA', 'Employee', '2011-05-31 00:00:00', '2011-05-31 00:00:00'),
(91, 'Uppsala', 'd4rBwtAKocqwA', 'Employee', '2011-05-31 00:00:00', '2011-05-31 00:00:00'),
(92, 'ektashrestha', 'd4rBwtAKocqwA', 'Employee', '2011-06-01 00:00:00', '2011-06-01 00:00:00'),
(93, 'Captcha', 'd4rBwtAKocqwA', 'Employee', '2011-06-01 00:00:00', '2011-06-01 00:00:00'),
(94, 'sumandai', 'd4rBwtAKocqwA', 'Employee', '2011-06-01 00:00:00', '2011-06-01 00:00:00'),
(95, 'twotwo', 'ffki0V4oJ6TBc', 'Employee', '2011-06-05 00:00:00', '2011-06-05 00:00:00'),
(96, 'computer', 'd4rBwtAKocqwA', 'Employee', '2011-06-05 00:00:00', '2011-06-05 00:00:00'),
(97, 'testing22', 'd4rBwtAKocqwA', 'Employee', '2011-06-06 00:00:00', '2011-06-06 00:00:00'),
(98, 'asdfasdfasdf', 'd4rBwtAKocqwA', 'Employee', '2011-06-06 00:00:00', '2011-06-06 00:00:00'),
(99, 'amendrafinal', 'ffki0V4oJ6TBc', 'Employee', '2011-06-06 00:00:00', '2011-06-06 00:00:00'),
(100, 'amendrafinal1', 'ffki0V4oJ6TBc', 'Employee', '2011-06-06 00:00:00', '2011-06-06 00:00:00'),
(101, 'mesfin', 'e5CD/foRZVu52', 'Employer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_academic_qualification`
--
ALTER TABLE `tbl_academic_qualification`
  ADD CONSTRAINT `tbl_academic_qualification_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `tbl_user_info` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `tbl_country` (`CountryID`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbl_user_info` (`UserID`);

--
-- Constraints for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  ADD CONSTRAINT `tbl_employer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tbl_user_info` (`UserID`),
  ADD CONSTRAINT `tbl_employer_ibfk_2` FOREIGN KEY (`CountryID`) REFERENCES `tbl_country` (`CountryName`);

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`EmployeerID`) REFERENCES `tbl_employer` (`UserID`),
  ADD CONSTRAINT `tbl_job_ibfk_2` FOREIGN KEY (`JobCategoryID`) REFERENCES `tbl_job_category` (`JobCategory`);

--
-- Constraints for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  ADD CONSTRAINT `tbl_job_application_ibfk_1` FOREIGN KEY (`JobID`) REFERENCES `tbl_job` (`JobID`),
  ADD CONSTRAINT `tbl_job_application_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `tbl_employee` (`UserID`);

--
-- Constraints for table `tbl_job_requirement`
--
ALTER TABLE `tbl_job_requirement`
  ADD CONSTRAINT `tbl_job_requirement_ibfk_1` FOREIGN KEY (`JobID`) REFERENCES `tbl_job` (`JobID`);

--
-- Constraints for table `tbl_job_requirement_detail`
--
ALTER TABLE `tbl_job_requirement_detail`
  ADD CONSTRAINT `tbl_job_requirement_detail_ibfk_1` FOREIGN KEY (`RequirementID`) REFERENCES `tbl_job_requirement` (`JobRequirementID`),
  ADD CONSTRAINT `tbl_job_requirement_detail_ibfk_2` FOREIGN KEY (`ExpertiseID`) REFERENCES `tbl_expertise` (`ExpertiseID`);

--
-- Constraints for table `tbl_profile_view_stats`
--
ALTER TABLE `tbl_profile_view_stats`
  ADD CONSTRAINT `tbl_profile_view_stats_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `tbl_employee` (`UserID`),
  ADD CONSTRAINT `tbl_profile_view_stats_ibfk_2` FOREIGN KEY (`EmployerID`) REFERENCES `tbl_employer` (`UserID`);

--
-- Constraints for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD CONSTRAINT `tbl_qualification_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `tbl_employee` (`UserID`);
