-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2018 at 11:57 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `OWNER_ID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `MEMBERS` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `OWNER_ID`, `TITLE`, `DESCRIPTION`, `MEMBERS`, `DATE`) VALUES
(9, 2, 'test', 'test', 0, '2018-03-04'),
(10, 2, 'Test group 2', 'test test\r\n\r\n\r\n\r\n\r\ntest\r\n\r\n\r\nmodify', 0, '2018-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `USER_ID` int(11) NOT NULL,
  `GROUP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`USER_ID`, `GROUP_ID`) VALUES
(3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `ID` int(11) NOT NULL,
  `OWNER_ID` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `COMPANY` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `SALARY` varchar(100) NOT NULL,
  `EXPERIENCE_REQUIRED` varchar(500) NOT NULL,
  `LOCATION` varchar(500) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `OWNER_ID`, `TITLE`, `COMPANY`, `DESCRIPTION`, `SALARY`, `EXPERIENCE_REQUIRED`, `LOCATION`, `DATE`) VALUES
(13, 2, '1', '2', '5', '3', '6', '4', '0000-00-00'),
(14, 2, 'test', '1', 'jordan', '2', 'test', '3', '2018-03-19'),
(16, 3, 'test', 'test', 'test', 'test', 'test', 'test', '2018-04-04'),
(17, 4, 'test', 'test', 'test1', 'test', 'test', 'test', '2018-04-04'),
(18, 5, 'test', 'test', 'test', 'test', 'test', 'test', '2018-04-04'),
(23, 2, 'test', 'test', 'test', 'test', 'test', 'test', '2018-04-04'),
(24, 2, 'test', 'test', 'test', 'test', 'test', 'test', '2018-04-04'),
(25, 2, 'test', 'test', 'test', 'test', 'test', 'test', '2018-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `USER_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `ROLE` varchar(50) DEFAULT NULL,
  `OBJECTIVE` varchar(500) DEFAULT NULL,
  `EDUCATION_1` varchar(100) DEFAULT NULL,
  `EDUCATION_2` varchar(100) DEFAULT NULL,
  `EDUCATION_3` varchar(100) DEFAULT NULL,
  `SKILLS` varchar(500) DEFAULT NULL,
  `EXPERIENCE_1` varchar(100) DEFAULT NULL,
  `EXPERIENCE_2` varchar(100) DEFAULT NULL,
  `EXPERIENCE_3` varchar(100) DEFAULT NULL,
  `REFERENCES` varchar(100) DEFAULT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`USER_ID`, `FIRSTNAME`, `LASTNAME`, `ROLE`, `OBJECTIVE`, `EDUCATION_1`, `EDUCATION_2`, `EDUCATION_3`, `SKILLS`, `EXPERIENCE_1`, `EXPERIENCE_2`, `EXPERIENCE_3`, `REFERENCES`, `DATE`) VALUES
(2, 'jordan', 'riley', 'Business Owner', NULL, NULL, '2', '3', NULL, '2', '1', '3', '8', '0000-00-00'),
(3, '', '', 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(5, '', '', 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-03'),
(6, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11'),
(7, 'jordan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `RIGHTS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMAIL`, `PASSWORD`, `RIGHTS`) VALUES
(2, 'jordanr3@live.com', 'password', 2),
(3, 'test@live.com', 'password', 0),
(4, 'testaccount@live.com', 'password', 0),
(5, 'testlol@live.com', 'password', 0),
(6, 'test', 'test', 0),
(7, 'test', 'test', 0),
(8, 'test', 'test', 0),
(9, 'test', 'test', 2),
(10, 'test', 'test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_OWNERID` (`OWNER_ID`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `GROUP_ID` (`GROUP_ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_OWNER_ID` (`OWNER_ID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_OWNERID` FOREIGN KEY (`OWNER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `fk_GROUP_ID` FOREIGN KEY (`GROUP_ID`) REFERENCES `groups` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_GROUP_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_OWNER_ID` FOREIGN KEY (`OWNER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `fk_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
