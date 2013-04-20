-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2012 at 01:49 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpvms`
--

-- --------------------------------------------------------

--
-- Table structure for table `vawards_awards`
--

CREATE TABLE IF NOT EXISTS `vawards_awards` (
  `awd_id` int(11) NOT NULL AUTO_INCREMENT,
  `typ_id` int(11) NOT NULL,
  `awd_name` varchar(150) NOT NULL,
  `awd_desc` varchar(250) NOT NULL,
  `awd_image` text NOT NULL,
  PRIMARY KEY (`awd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vawards_grants`
--

CREATE TABLE IF NOT EXISTS `vawards_grants` (
  `grt_id` int(11) NOT NULL AUTO_INCREMENT,
  `grt_pilotid` int(11) NOT NULL,
  `grt_awdid` int(11) NOT NULL,
  `grt_dategrant` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`grt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vawards_types`
--

CREATE TABLE IF NOT EXISTS `vawards_types` (
  `typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `typ_name` varchar(150) NOT NULL,
  PRIMARY KEY (`typ_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
