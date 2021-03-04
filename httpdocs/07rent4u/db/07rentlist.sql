-- phpMyAdmin SQL Dump
-- version 4.0.10.16
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2018 at 01:06 PM
-- Server version: 5.1.73
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jabusch`
--

-- --------------------------------------------------------

--
-- Table structure for table `07rentlist`
--

CREATE TABLE IF NOT EXISTS `07rentlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(1000) NOT NULL,
  `type` varchar(300) NOT NULL,
  `town` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(250) NOT NULL,
  `beds` int(2) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `07rentlist`
--

INSERT INTO `07rentlist` (`id`, `address`, `type`, `town`, `description`, `image`, `beds`, `Price`) VALUES
(1, '4 Shandon Parklane Road', 'Terrace', 'Stranmillis', 'This this exclusive development\r\nof only three detached family\r\nhomes offers fantastic\r\naccommodation over three floors\r\nto suit most family\r\nrequirements.\r\n', '4415000.jpg', 3, 1100),
(2, '89 English Street', 'Town House', 'Lisburn Rd', 'Accommodation comprises of a\nlarge reception, kitchen/dining,\nutility, ground floor WC, 3\nbedrooms (master en-suite) and\nfamily bathroom.\n', '7294980.jpg', 4, 1500),
(3, '208 Belfast Rd', 'Bungalow', 'Malone', 'We are delighted to offer this\nbeautiful detached bungalow to\nthe rental market, which is\nsituated just outside Armagh\nCity.\n', '6542715.jpg', 2, 1090),
(4, '3 Dublin Street', 'Terrace', 'Holylands', 'Terrace, in a closed Crescent,\nbuilt in the early 20th century.\nThe view is towards the Ormeau rd.\n', '1332594.jpg', 2, 650),
(5, '25 The Stand ', 'Apartment', 'Lisburn Rd', 'The latest and most\nprestigious residential\ndevelopment overlooking the lively road.', '5839975.jpg', 2, 800);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
