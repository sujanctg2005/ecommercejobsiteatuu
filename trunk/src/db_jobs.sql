-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2011 at 12:58 AM
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
-- Table structure for table `tbl_business_type`
--

CREATE TABLE IF NOT EXISTS `tbl_business_type` (
  `BusinessTypeID` int(10) NOT NULL AUTO_INCREMENT,
  `BusinessType` varchar(20) NOT NULL,
  PRIMARY KEY (`BusinessTypeID`),
  KEY `BusinessTypeID` (`BusinessTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_business_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `CityID` int(10) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(30) NOT NULL,
  `CountryID` int(10) NOT NULL,
  PRIMARY KEY (`CityID`),
  KEY `CountryID` (`CountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_city`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `CountryID` int(10) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(30) NOT NULL,
  PRIMARY KEY (`CountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_country`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `MaritialStatus` varchar(5) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_employee`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer`
--

CREATE TABLE IF NOT EXISTS `tbl_employer` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(30) NOT NULL,
  `AlternativeCompanyName` varchar(30) NOT NULL,
  `CompanyAddress` varchar(30) NOT NULL,
  `CompanyPhone` varchar(20) NOT NULL,
  `CompanyEmail` varchar(30) NOT NULL,
  `CompanyURL` varchar(30) NOT NULL,
  `CompanyLogo` varchar(100) NOT NULL,
  `ContactPerson` varchar(30) NOT NULL,
  `ContactPersonDesignatation` varchar(20) NOT NULL,
  `CountryID` int(10) NOT NULL,
  `BusinessTypeID` varchar(10) NOT NULL,
  `BillingAddress` varchar(30) NOT NULL,
  `CityID` int(10) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserID` (`UserID`),
  KEY `CountryID` (`CountryID`),
  KEY `CityID` (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_employer`
--


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
  `JobCategoryID` int(20) NOT NULL,
  `JobPostDate` date NOT NULL,
  `ApplicationDeadline` datetime NOT NULL,
  `EmployeerID` int(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `HeightCompanyName` tinyint(1) NOT NULL,
  PRIMARY KEY (`JobID`),
  KEY `JobCategoryID` (`JobCategoryID`),
  KEY `EmployeerID` (`EmployeerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job_application`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_category`
--

CREATE TABLE IF NOT EXISTS `tbl_job_category` (
  `JobCategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `JobCategory` varchar(20) NOT NULL,
  PRIMARY KEY (`JobCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job_category`
--


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
  `EducationalQualificationalID` int(10) NOT NULL,
  `Experience` int(2) NOT NULL,
  `JobResponsibility` varchar(20) NOT NULL,
  `AdditionalJobRequirement` varchar(20) NOT NULL,
  `MinimumSalaryRange` int(10) NOT NULL,
  `MaximumSalaryRange` int(10) NOT NULL,
  `Benifits` varchar(10) NOT NULL,
  PRIMARY KEY (`JobRequirementID`),
  KEY `JobID` (`JobID`),
  KEY `EducationalQualificationalID` (`EducationalQualificationalID`)
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
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `LastLogonDateTime` datetime NOT NULL,
  PRIMARY KEY (`UserID`,`LastLogonDateTime`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `FromDate` date NOT NULL,
  `ToDate` date DEFAULT NULL,
  `Organization` varchar(20) NOT NULL,
  `OrganizationAddress` varchar(20) NOT NULL,
  `OgranizationTypeID` int(10) NOT NULL,
  `QualificationType` varchar(10) NOT NULL,
  PRIMARY KEY (`QualificationID`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `OgranizationTypeID` (`OgranizationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_qualification`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`UserID`, `Username`, `Password`, `UserType`, `CreatedOn`, `LastUpdatedOn`) VALUES
(1, 'amendra', 'amendra', 'employee', '2011-05-07 03:33:00', '2011-05-07 03:33:04');

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `tbl_employer_ibfk_2` FOREIGN KEY (`CountryID`) REFERENCES `tbl_country` (`CountryID`),
  ADD CONSTRAINT `tbl_employer_ibfk_3` FOREIGN KEY (`CityID`) REFERENCES `tbl_city` (`CityID`);

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`EmployeerID`) REFERENCES `tbl_employer` (`UserID`),
  ADD CONSTRAINT `tbl_job_ibfk_2` FOREIGN KEY (`JobCategoryID`) REFERENCES `tbl_job_category` (`JobCategoryID`);

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
  ADD CONSTRAINT `tbl_job_requirement_ibfk_1` FOREIGN KEY (`JobID`) REFERENCES `tbl_job` (`JobID`),
  ADD CONSTRAINT `tbl_job_requirement_ibfk_2` FOREIGN KEY (`EducationalQualificationalID`) REFERENCES `tbl_qualification` (`QualificationID`);

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
  ADD CONSTRAINT `tbl_qualification_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `tbl_employee` (`UserID`),
  ADD CONSTRAINT `tbl_qualification_ibfk_2` FOREIGN KEY (`OgranizationTypeID`) REFERENCES `tbl_business_type` (`BusinessTypeID`);
