-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2013 at 12:37 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lemcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE IF NOT EXISTS `chart` (
  `chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_date` datetime NOT NULL,
  `sale` int(11) NOT NULL,
  PRIMARY KEY (`chart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`chart_id`, `sale_date`, `sale`) VALUES
(1, '2013-02-06 01:16:28', 20),
(2, '2013-02-06 04:22:09', 4),
(3, '2013-02-06 06:31:21', 47),
(4, '2013-02-06 13:16:49', 22),
(5, '2013-02-06 21:11:31', 78),
(6, '2013-02-05 01:47:51', 43),
(7, '2013-02-05 03:23:54', 78),
(8, '2013-02-05 15:08:29', 10),
(9, '2013-02-05 21:49:51', 25),
(10, '2012-02-06 00:00:00', 45),
(11, '2012-12-09 00:00:00', 56),
(12, '2013-01-16 00:00:00', 27),
(13, '2013-01-27 00:00:00', 56),
(14, '2013-02-01 00:00:00', 67),
(15, '2013-01-30 00:00:00', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'lemcon', 'lemcon', 'Santhosh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
