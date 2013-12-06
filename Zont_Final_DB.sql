-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2013 at 02:28 AM
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
  `country_of_origin` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `idJobSeeker` int(11) NOT NULL,
  PRIMARY KEY (`idEducationalQualification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `educational_qualification`
--

INSERT INTO `educational_qualification` (`idEducationalQualification`, `type`, `course_name`, `name_of_institution`, `country_of_origin`, `start_date`, `end_date`, `result`, `idJobSeeker`) VALUES
(1, 'MSc.', 'MSc Computer Science', 'Kings College', 'Great Britain', '2012-11-22', '2013-11-12', 'Merits', 2),
(2, 'PhD.', 'PhD Atrophysics', 'UCL', 'Great Britain', '2010-12-01', '2013-12-01', 'Merits', 3),
(3, 'MSc.', 'MSc business strategies', 'Kingston University', 'Great Britain', '2012-01-01', '2014-01-31', 'Merits', 4),
(4, 'BSc.', 'Web Design', 'Kings College', 'Great Britain', '2010-01-01', '2011-01-01', 'Distinctions', 5),
(5, 'MSc.', 'Web Design', 'Kings College', 'Great Britain', '2012-01-01', '2013-01-01', 'Distinctions', 5),
(6, 'BSc.', 'Software Engineering With management Studies', 'Kingston University', 'United Kingdom', '2013-12-06', '2013-12-06', 'Distinction', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`idEmployer`, `first_name`, `last_name`, `organisation_name`, `password`, `idSector`, `town`, `address1`, `address2`, `postcode`, `email`, `phone_number`, `fax`) VALUES
(3, 'Bill', 'Gates', 'Microsoft', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 6, 'Silicon Valley', '13 MicroPlex', '', 'SE1234', 'microsoft@hotmail.com', '01245215', '01245852'),
(4, 'Tim', 'Cook', 'Apple Co', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 6, 'Cupertino', 'Apple Headquarters', '', 'C12345', 'Apple@itunes.com', '062525155', '054741555'),
(5, 'Kingston', 'University', 'Kingston University', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 10, 'Kingston-Upon-Thames', '135 Penhryn Road', '', 'KT11AA', 'ku@kingston.ac.uk', '04501212121', '04160666611'),
(6, 'John', 'Lewis', 'Waitrose', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 11, 'Birmingham', 'Waitrose HQ', '', 'BUK123', 'Waitrose@Wshops.co.uk', '0454411404', '015404545404'),
(7, 'Allison', 'Parker', 'Lloyds TSB', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'London', '11 Loyds TSB HR', '', 'IG2342', 'lloyds-recruit@loydstsb.co.uk', '04154051221', '01215405441'),
(8, 'Baldor', 'Longman', 'Baldor Inc.', '83a54e095304a85c332b724d2ba7bf208f5af826', 6, 'Ibadan', 'Ayandiji Ojo Crescent', 'Ologuneru', '23402', 'baldoroloruntoba@gmail.com', '+2348063778581', '344312');

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
  `years_of_experience` varchar(20) NOT NULL,
  `contract_type` varchar(50) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `idJobTitle` int(11) NOT NULL,
  PRIMARY KEY (`idJobAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `job_ad`
--

INSERT INTO `job_ad` (`idJobAd`, `start_date`, `end_date`, `location`, `description`, `salary_amount`, `salary_type`, `educational_level`, `years_of_experience`, `contract_type`, `idEmployer`, `idJobTitle`) VALUES
(6, '2013-12-01', '2013-12-10', 'London', 'C++ Senior Developer needed to join a team of developers, run meetings, and follow the product lifecycle, reporting to our team leader and scrum master.\r\nThis job is not suitable for graduates.', '50000', 'Annually', 'Post Graduate', 'Three Years', 'Permanent', 3, 70),
(7, '2013-12-04', '2013-12-11', 'London', 'Great opportunity for a graduate MSc to join an agile team of software developers in London. Training provided to the successful candidate.', '26000', 'Annually', 'Post Graduate', 'One Year', 'Permanent', 3, 71),
(8, '2013-12-04', '2013-12-11', 'Manchester', 'Great opportunity for a graduate BSc to work as a software developer on Itunes and IWork, 2 years contract with the opportunity to extend to a full time job.', '50000', 'Annually', 'Bsc.', 'Two Years', 'Temporary', 4, 72),
(9, '2013-12-04', '2013-12-11', 'Covent Garden, London', 'Salesman for Covent Garden Apple Store needed, 1 year of experience in sales is required.', '15', 'Hourly', 'Bsc.', 'One Year', 'Part_time', 4, 73),
(10, '2013-12-04', '2013-12-11', 'Kingston', 'Kingston University is looking for an experienced Arts Teacher to be in charge of a full time MBA course.', '20000', 'Annually', 'Post Graduate', 'Five Years', 'Permanent', 5, 74),
(11, '2013-12-04', '2013-12-11', 'Kingston-Upon-Thames', 'Looking for a vendor for Kingston Waitrose shop, 1year experience needed.', '18000', 'Annually', 'High School', 'One Year', 'Permanent', 6, 75),
(12, '2013-12-05', '2013-12-19', 'London', 'Bank office cashier needed, requirements : accountancy skills, good customer relationship abilities, perfect english communication.', '100', 'Daily', 'High School', 'Three Years', 'Part_time', 7, 76);

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
  `country` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `eligibility_to_work` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `interests` text NOT NULL,
  PRIMARY KEY (`idJobSeeker`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`idJobSeeker`, `username`, `password`, `title`, `first_name`, `last_name`, `date_of_birth`, `address1`, `address2`, `town`, `postcode`, `country`, `email`, `phone_number`, `eligibility_to_work`, `description`, `interests`) VALUES
(2, 'davidj@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Mr.', 'David', 'James', '1985-02-06', '123 Wood Street', 'Wood House', 'Brighton', 'BR123ND', 'Great Britain', 'davidj@gmail.com', '04061011404545', 0, 'MSc Student in Software engineering', ''),
(3, 'janies@hotmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Mrs.', 'janie', 'split', '1972-02-16', '10 bike borough', '', 'Liverpool', 'LE1232', 'Great Britain', 'janies@hotmail.com', '020640115111', 0, 'young doctor in astrophysics', ''),
(4, 'mholtby@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Mr.', 'Marcus', 'Holtby', '1986-06-19', '133 kingsmeadow east', 'marble house 1', 'Guildford', 'GSW33123', 'Great Britain', 'mholtby@gmail.com', '05044440445', 0, 'student', ''),
(5, 'vladimirc@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Mr.', 'Vladimir', 'Chires', '1986-03-07', '33 bynum road', '', 'Woodford', 'IG67EE', 'Great Britain', 'vladimirc@gmail.com', '0410515315151', 0, 'expert in web development see my online portfolio http://vlad.wordpress.com', 'Web development, web design, e commerce'),
(6, 'sarahsig@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Miss.', 'Sarah', 'Sigorsson', '1991-02-06', '23 Brick Lane Road', '', 'London', 'ES2342', 'Great Britain', 'sarahsig@gmail.com', '0155150111', 0, 'experienced vendor looking for a part time job', ''),
(7, 'ckdaf2000@yahoo.co.uk', '83a54e095304a85c332b724d2ba7bf208f5af826', '1', 'Oloruntoba', 'Ojo', '1991-02-03', '31 Howard Road', '', 'Surbiton', 'KT5 8SA', 'United Kingdom', 'ckdaf2000@yahoo.co.uk', '447456470730', 0, 'Hire Me or I Hunt You!!! -_-', 'Truth be told... ');

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE IF NOT EXISTS `job_title` (
  `idJobTitle` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `idSector` int(11) NOT NULL,
  PRIMARY KEY (`idJobTitle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `job_title`
--

INSERT INTO `job_title` (`idJobTitle`, `name`, `idSector`) VALUES
(1, 'Credit Control Officer', 1),
(2, 'Bookeeping Clerk', 1),
(3, 'Finance Manager', 1),
(4, 'Cashier', 1),
(5, 'Financial Controller', 1),
(6, 'CAD', 2),
(7, 'Chemical Engineer', 2),
(8, 'Consultant', 2),
(9, 'Design Engineer', 2),
(10, 'Rail Engineer', 2),
(11, 'Fashion Designer', 3),
(12, 'Industrial Designer', 3),
(13, 'Landscape Gardener', 3),
(14, 'Consultant', 3),
(15, 'Interior Designer', 3),
(16, 'Hospitality Consultant', 4),
(17, 'Domestic Cleaner', 4),
(18, 'Catering Attendant', 4),
(19, 'Travel & Tourism Retail Officer', 4),
(20, 'Hotel Catering Officer', 4),
(21, 'Pharmaceutical Specialist', 5),
(22, 'Clothing & Fashion Retailer', 5),
(23, 'Consultant', 5),
(24, 'Food & Drink', 5),
(25, 'Traditional Craft Specialist', 5),
(26, 'Business Intelligence Analyst', 6),
(27, 'Database Administrator', 6),
(28, 'Hardware Designer', 6),
(29, 'Networking Officer', 6),
(30, 'IT Security Officer', 6),
(31, 'In House Legal Officer', 7),
(32, 'Lawyer', 7),
(33, 'Legal Executive', 7),
(34, 'Legal Secretarial', 7),
(35, 'Paralegal', 7),
(36, 'Advertising', 8),
(37, 'Consultant', 8),
(38, 'Public Relations Officer', 8),
(39, 'Market Researcher', 8),
(40, 'Product Developmer', 8),
(41, 'Ambulance & Paramedic Agent', 9),
(42, 'Burial & Cremation Facilitator', 9),
(43, 'Complementary Therapist', 9),
(44, 'Dentist', 9),
(45, 'Health & Safety Officer', 9),
(46, 'Clerical officer', 10),
(47, 'Secretarial Assistant', 10),
(48, 'Senior Secretarial Assistant', 10),
(49, 'Personal Assistant', 10),
(50, 'Call Centre Staff', 11),
(51, 'Customer Service Officer', 11),
(52, 'Sales and Related Services Officer', 11),
(53, 'Telesales, Media Sales & B2B Advisor', 11),
(54, 'Wholesale Assistant', 11),
(55, 'Beauty Therapy', 12),
(56, 'Betting & Gaming officer', 12),
(57, 'Hairdresser', 12),
(58, 'Sport & Recreation Manager', 12),
(59, 'Sport Support Staff', 12),
(60, 'Air Traffic Control Officer', 13),
(61, 'Distribution & Logistics Analyst', 13),
(62, 'Rail Transport Officer', 13),
(63, 'Warehouse Agent', 13),
(64, 'Chartering & Broker', 13),
(65, 'Other', 1),
(70, 'Senior Software Engineer - Excellent Benefits', 6),
(71, 'Junior Software Developer  Entry Level', 6),
(72, '2 year contract - Software Developer - Great benef', 6),
(73, 'Sales person', 6),
(74, 'Senior Arts Teacher', 10),
(75, 'Waitrose Vendor - Urgent', 11),
(76, 'Bank Office Cashier', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `professional_qualifications`
--

INSERT INTO `professional_qualifications` (`idProfessionalQualifications`, `name`, `awarding_body`, `year_obtained`, `result`, `idSector`, `idJobSeeker`) VALUES
(1, 'Agile Foundation Membership Certificate', 'DSDM Consortium', '2013-12-27', '88%', 6, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referee`
--

INSERT INTO `referee` (`idReferee`, `title`, `first_name`, `last_name`, `email`, `phone_number`, `relationship`, `permission_to_contact`, `idJobSeeker`) VALUES
(1, 'Mr', 'John', 'Duff', 'jd@kings.ac.uk', '0540454115', 'Supervisor', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `idSector` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idSector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`idSector`, `name`) VALUES
(1, 'Accountancy & Finance'),
(2, 'Civil Engineering'),
(3, 'Design & Architecture'),
(4, 'Hospitality, Tourism'),
(5, 'Industrial & Manufacturing'),
(6, 'IT, Internet & Telecoms'),
(7, 'Legal'),
(8, 'Marketing & Advertising'),
(9, 'Medical & Health'),
(10, 'Office & Secretarial'),
(11, 'Sales & Retail'),
(12, 'Sports, Fitness & Beauty'),
(13, 'Transport & Logistics');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`idSkill`, `name`, `level`, `idJobSeeker`) VALUES
(1, 'PHP', 'Expert', 5),
(2, 'HTML', 'Expert', 5),
(3, 'CSS', 'Expert', 5),
(4, 'Javascript', 'Advanced', 5),
(5, 'C++', 'Intermediate', 5),
(6, 'JavaScript', 'Intermediate', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`idWorkExperience`, `position_name`, `start_date`, `end_date`, `name_of_organisation`, `organisation_location`, `key_duties`, `idJobSeeker`, `idJobTitle`) VALUES
(1, 'Software Developer', '2013-09-04', '2013-12-01', 'CapGemini', 'London', 'C++ junior consultant', 2, 8),
(2, 'Web Developer', '2013-08-08', '2013-12-13', 'Twitter', 'Manchester', 'PHP, HTML5 / CSS webdeveloper', 5, 9),
(3, 'Web designer', '2012-01-31', '2013-08-01', 'facebook', 'Manchester', 'CVS and PHP web development and web design leader', 5, 9),
(4, 'Apprentice Cashier', '2012-01-01', '2013-12-01', 'Tesco', 'London', 'cashier stuff', 6, 4),
(5, 'Application Developer', '2013-12-06', '2013-12-06', 'Kingston University Service Company', 'Kingston Upon Thames, London', 'de', 7, 37);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
