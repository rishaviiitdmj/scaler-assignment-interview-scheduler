-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2022 at 06:18 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `ctc` int(6) DEFAULT NULL,
  `description` longtext,
  `doi` date DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `interview_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`cid`, `name`, `ctc`, `description`, `doi`, `createdon`, `interview_status`) VALUES
(45, 'Amazon', 44, 'Amazon.com is an American multinational technology company that focuses on e-commerce, cloud computing, online advertising, digital streaming, and artificial intelligence.', '2022-10-13', '2022-10-12 17:14:36', 0),
(98, 'Slice', 33, 'Slice is good company.', '2022-10-12', '2022-10-12 13:01:02', 0),
(88, 'Gameskraft', 37, 'It is game development company', '2022-10-07', '2022-10-12 15:25:22', 0),
(1310, 'Scaler', 21, 'Scaler is an online transformative upskilling platform for working tech professionals.', '2022-10-15', '2022-10-12 16:27:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `college` varchar(30) DEFAULT NULL,
  `cpi` int(11) DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `interview_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`,`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`cid`, `name`, `mail`, `college`, `cpi`, `starttime`, `endtime`, `interview_status`) VALUES
(11, 'Rishav Kumar', 'rishaviitian811311@gmail.com', 'pdpm', 6, '13:13:00', '14:03:00', 0),
(98, 'Rishav Kumar', 'rishaviitian811311@gmail.com', 'pdpm', 6, '19:00:00', '19:30:00', 1),
(98, 'Rishav Kumar', 'abc@gmail.com', 'pdpm', 8, '19:55:00', '21:00:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
