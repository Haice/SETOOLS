-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2013 at 11:14 AM
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
-- Table structure for table `job_title`
--

CREATE TABLE IF NOT EXISTS `job_title` (
  `idJobTitle` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `idSector` int(11) NOT NULL,
  PRIMARY KEY (`idJobTitle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

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
(65, 'Other', 1);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
