-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2013 at 11:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zont`
--
CREATE DATABASE IF NOT EXISTS `zont` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zont`;

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualification`
--

CREATE TABLE IF NOT EXISTS `educational_qualification` (
  `idEducationalQualification` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `name_of_institution` varchar(100) NOT NULL,
  `country_of_origin` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  PRIMARY KEY (`idEducationalQualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `idEmployer` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `organisation_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idSector` int(11) NOT NULL,
  `town` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  PRIMARY KEY (`idEmployer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_ad`
--

CREATE TABLE IF NOT EXISTS `job_ad` (
  `idJobAd` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `salary_amount` varchar(50) NOT NULL,
  `salary_type` varchar(50) NOT NULL,
  `educational_level` varchar(50) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `contract_type` varchar(50) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `idJobTitle` int(11) NOT NULL,
  PRIMARY KEY (`idJobAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_preference`
--

CREATE TABLE IF NOT EXISTS `job_preference` (
  `idJobTitle` int(11) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  UNIQUE KEY `idJobTitle` (`idJobTitle`,`idJobSeeker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE IF NOT EXISTS `job_seeker` (
  `idJobSeeker` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `eligibility_to_work` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `interests` text NOT NULL,
  PRIMARY KEY (`idJobSeeker`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE IF NOT EXISTS `job_title` (
  `idJobTitle` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `idSector` int(11) NOT NULL,
  PRIMARY KEY (`idJobTitle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Table structure for table `professional_qualifications`
--

CREATE TABLE IF NOT EXISTS `professional_qualifications` (
  `idProfessionalQualifications` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `awarding_body` varchar(50) NOT NULL,
  `year_obtained` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `idSector` int(11) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  PRIMARY KEY (`idProfessionalQualifications`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE IF NOT EXISTS `referee` (
  `idReferee` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `permission_to_contact` tinyint(1) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  PRIMARY KEY (`idReferee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `idSector` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idSector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `idSkill` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  PRIMARY KEY (`idSkill`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `idWorkExperience` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `name_of_organisation` varchar(50) NOT NULL,
  `organisation_location` varchar(50) NOT NULL,
  `key_duties` text NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  `idJobTitle` int(11) NOT NULL,
  PRIMARY KEY (`idWorkExperience`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
