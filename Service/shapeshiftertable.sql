-- Sample for Creating the Database Table
--
--
--
-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `INSERT_DATABASE_NAME_HERE`
--

-- --------------------------------------------------------

--
-- Table structure for table `INSERT_NAME_HERE`
--

CREATE TABLE IF NOT EXISTS `INSERT_NAME_HERE` (
`id` int(11) NOT NULL,
  `coin` varchar(255) NOT NULL,
  `rate_btc` varchar(255) DEFAULT NULL,
  `rate_alt` varchar(222) DEFAULT NULL,
  `limit` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22645 DEFAULT CHARSET=latin1;

--
-- Indexes for table `INSERT_NAME_HERE`
--
ALTER TABLE `INSERT_NAME_HERE`
 ADD PRIMARY KEY (`id`);

