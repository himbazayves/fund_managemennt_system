-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2019 at 07:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `women_grobal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `applicant_id` int(40) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `applicant_status` varchar(100) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`applicant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `first_name`, `last_name`, `telephone`, `province`, `district`, `gender`, `id`, `password`, `email`, `category`, `applicant_status`) VALUES
(1, 'shema', 'shema', '+250729003160', 'NORTH', 'Gicumbi', 'female', '12345678910', 'shema', 'shema@gmail.com', '3', 'active'),
(2, 'hirwa', 'ivan', '0877777777', 'west', 'gasabo', 'female', '22222222222222222222', '12345', 'pattyshema@gmail.com', '3', 'active'),
(3, 'papa', 'kaka', '0788888888800', 'NORTH', 'gasabo', 'female', '12345678910', '1212', 'pattyshema@gmail.com', '3', 'active'),
(4, 'Ferdinand', 'IRADUKUNDA', '66777', 'north', 'gicumbi', 'female', '334565', '1', '', 'iradukunda@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `applicant_id` int(100) NOT NULL,
  `fund_id` int(100) NOT NULL,
  `attachment` varchar(100) NOT NULL DEFAULT 'no',
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `sub_date` varchar(100) NOT NULL,
  `application_id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicant_id`, `fund_id`, `attachment`, `status`, `sub_date`, `application_id`) VALUES
(1, 1, 'challenge.docx', 'accepted', '2019-10-09', 1),
(2, 1, 'CHAP2.docx', 'rejected', '2019-10-09', 2),
(3, 5, 'CONTEXT (level 0) DIAGRAM.docx', 'accepted', '2019-10-15', 3),
(1, 5, 'CHAP2.docx', 'rejected', '2019-10-16', 4),
(2, 5, 'challenge.docx', 'rejected', '2019-10-16', 5);

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

DROP TABLE IF EXISTS `fund`;
CREATE TABLE IF NOT EXISTS `fund` (
  `fund_id` int(30) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `publish_date` varchar(100) NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `fund_status` varchar(100) NOT NULL DEFAULT 'open',
  PRIMARY KEY (`fund_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`fund_id`, `title`, `description`, `publish_date`, `deadline`, `fund_status`) VALUES
(1, 'fund', '	fund fund', '2019-10-09', '2019-10-11', 'closed'),
(2, 'fbi', '	gggggggggggggggggggg', '2019-10-09', '2019-12-07', 'closed'),
(3, 'fghhjjhgggag', '	fghhjjj', '2019-10-15', '2019-11-15', 'closed'),
(4, 'ffdffggg', '	fdfghjj', '2019-10-15', '2019-11-15', 'closed'),
(5, 'fghhjjhgggag', '	fggghhh', '2019-10-15', '2019-11-16', 'closed'),
(6, 'sdfghj', '	ertyuio', '2019-10-16', '2019-11-16', 'closed'),
(7, 'dfghj', '	dfghj', '2019-10-16', '2019-10-17', 'open'),
(8, 'fghhjjhgggag', '	dfghyuio', '2019-10-16', '2019-10-16', 'open'),
(9, 'ddfghj', '	dfghjkl', '2019-10-16', '2019-12-18', 'open'),
(10, 'fghhjjhgggag', '	dfghujik', '2019-10-16', '2019-10-16', 'open'),
(11, 'drtyuio', '	fgtyuiop', '2019-10-16', '2019-10-17', 'open'),
(12, 'fghhjjhgggag', '	dfghjkl', '2019-10-16', '2019-11-16', 'open'),
(13, 'fgyhuio', '	fghuiop[', '2019-10-16', '2019-11-16', 'open');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
