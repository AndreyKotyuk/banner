-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2018 at 04:50 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banner`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `description`, `status`) VALUES
(1, 'TV2', 'lol@mail.ru', 'create TV controller', 1),
(2, 'PC1', 'asdasd@mail.com1', 'Create PC model1', 1),
(3, 'name 3', 'email3@mail.com', 'asdasdfasdfasdfasdfadsf', 0),
(4, 'name4', 'email4@mail.com', 'asdasdasdasdasd', 0),
(5, 'name5', 'email5@mail.com', 'saasdfasdfgadsf', 0),
(6, 'name6', 'email6@mail.com', 'adsfgasfdasdfasdf', 0),
(9, 'lera', 'lera', 'asdasdasd', 0),
(10, 'aaaa', 'aaaa', 'aaaaa', 0),
(11, 'aaaa', 'aaaa', 'aaaaa', 0),
(12, 'aaaa', 'aaaa', 'aaaaa', 0),
(13, 'qqqqq', 'qqqq', 'qqqqq', 0),
(14, 'qwe', '', '', 0),
(15, 'asd', 'asdasd@asdasd', 'asd', 0),
(16, 'asd', 'asdasd@asdasd', 'asd', 0),
(17, 'asd', 'asdasd@asdasd', 'asd', 0),
(18, 'asd', 'asdasd@asdasd', 'asd', 0),
(19, 'asd22', 'asdasd@asdasd22', 'asd222', 0),
(20, 'ertert', 'ertert', 'ertert', 0),
(21, 'ertert', 'ertert', 'ertert', 0),
(22, 'ertert', 'ertert', 'ertert', 0),
(23, 'ertert', 'ertert', 'ertert', 0),
(24, 'ertert', 'ertert', 'ertert', 0),
(25, 'ertert', 'ertert', 'ertert', 0),
(26, 'ertert', 'ertert', 'ertert', 0),
(27, 'ertert', 'ertert', 'ertert', 0),
(28, 'ertert', 'ertert', 'ertert', 0),
(29, 'ertert', 'ertert', 'ertert', 0),
(30, '1111', '1111', '11111', 0),
(31, '1111', '1111', '11111', 0),
(32, '1111', '1111', '11111', 0),
(33, '1111', '1111', '11111', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
