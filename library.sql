-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 07:12 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `b_id`, `m_id`, `c_date`, `r_date`) VALUES
(0, 45622, 123, '2020-10-10 16:20:56', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:21:17', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:24:15', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:24:56', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:25:08', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:25:44', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:26:00', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:26:31', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:27:52', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:28:16', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:30:09', ' 1-10-2020'),
(0, 45622, 123, '2020-10-10 16:30:54', ' 1-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `f_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`id`, `b_id`, `m_id`, `f_date`, `f_amount`) VALUES
(1, 45622, 123, '2020-10-10 16:39:26', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE IF NOT EXISTS `tbl_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `author` varchar(300) NOT NULL,
  `publisher` varchar(300) NOT NULL,
  `copyroght` varchar(300) NOT NULL,
  `eddition` varchar(300) NOT NULL,
  `pages` int(11) NOT NULL,
  `ISBN` varchar(300) NOT NULL,
  `noCopies` int(11) NOT NULL,
  `libName` varchar(300) NOT NULL,
  `shelf_no` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `subject`, `title`, `author`, `publisher`, `copyroght`, `eddition`, `pages`, `ISBN`, `noCopies`, `libName`, `shelf_no`, `date`) VALUES
(1, 'java', 'computer Reference', 'kerry', 'conth tech', 'Author', '4', 504, '45622', 5, 'public library', 35, '2020-10-10 11:35:24'),
(2, 'java', 'computer Reference', 'kerry', 'conth tech', 'Author', '4', 504, '45622', 5, 'public library', 35, '2020-10-10 16:45:15'),
(3, 'java', 'computer Reference', 'kerry', 'conth tech', 'Author', '4', 504, '45622', 5, 'public library', 35, '2020-10-10 16:53:07'),
(4, 'java', 'computer Reference', 'kerry', 'conth tech', 'Author', '4', 504, '45622', 5, 'public library', 35, '2020-10-10 16:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `street` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `m_id`, `name`, `address`, `street`, `city`, `phone`, `email`, `pass`, `date`, `age`) VALUES
(1, 123, 'arman', 'raozan', '202', 'ctg', 1234567891, 'arman@gmail.com', '123', '2020-10-10 13:20:14', '0000-00-00'),
(3, 123, 'arman', 'raozan', '202', 'ctg', 1234567891, 'arman@gmail.com', '123', '2020-10-10 13:28:33', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
