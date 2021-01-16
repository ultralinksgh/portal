-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 06:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultralms`
--
CREATE DATABASE IF NOT EXISTS `ultralms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ultralms`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursecode` varchar(25) DEFAULT NULL,
  `coursetitle` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `trimester` varchar(15) DEFAULT NULL,
  `courselevel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_allocation`
--

DROP TABLE IF EXISTS `courses_allocation`;
CREATE TABLE `courses_allocation` (
  `id` int(11) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `courseid` varchar(25) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_mount`
--

DROP TABLE IF EXISTS `courses_mount`;
CREATE TABLE `courses_mount` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `trimester` int(11) DEFAULT NULL,
  `acadyear` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_objectives`
--

DROP TABLE IF EXISTS `courses_objectives`;
CREATE TABLE `courses_objectives` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_references`
--

DROP TABLE IF EXISTS `courses_references`;
CREATE TABLE `courses_references` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `reflink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_topics`
--

DROP TABLE IF EXISTS `courses_topics`;
CREATE TABLE `courses_topics` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_faqs`
--

DROP TABLE IF EXISTS `course_faqs`;
CREATE TABLE `course_faqs` (
  `id` int(11) NOT NULL,
  `dateadded` date DEFAULT curdate(),
  `courseid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facilitators`
--

DROP TABLE IF EXISTS `facilitators`;
CREATE TABLE `facilitators` (
  `id` int(11) NOT NULL,
  `staffid` varchar(25) DEFAULT NULL,
  `staffname` varchar(100) DEFAULT NULL,
  `centre` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'na@na.com',
  `phone` varchar(100) DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `courseid` int(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `theme` varchar(25) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(2) DEFAULT NULL COMMENT '1=First, 2=Second, 3 =Third',
  `dateadded` datetime DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files_submissions`
--

DROP TABLE IF EXISTS `files_submissions`;
CREATE TABLE `files_submissions` (
  `id` int(11) NOT NULL,
  `dateadded` date DEFAULT current_timestamp(),
  `courseid` int(11) DEFAULT NULL,
  `studentid` varchar(25) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `liveclass`
--

DROP TABLE IF EXISTS `liveclass`;
CREATE TABLE `liveclass` (
  `id` int(11) NOT NULL,
  `classdate` date DEFAULT NULL,
  `classtime` varchar(15) DEFAULT NULL,
  `classendtime` varchar(25) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `classid` varchar(25) DEFAULT 'NA',
  `classlink` varchar(255) DEFAULT 'NA',
  `remarks` int(5) DEFAULT 1 COMMENT '1=Pending,2=Done',
  `courseid` int(11) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE `noticeboard` (
  `id` int(11) NOT NULL,
  `dateadded` date DEFAULT curdate(),
  `notice` varchar(255) DEFAULT NULL,
  `issuedby` varchar(100) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL COMMENT '1=Urgent,2=Normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice_read`
--

DROP TABLE IF EXISTS `notice_read`;
CREATE TABLE `notice_read` (
  `id` int(11) NOT NULL,
  `noticeid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `dateread` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parkinglot`
--

DROP TABLE IF EXISTS `parkinglot`;
CREATE TABLE `parkinglot` (
  `id` int(11) NOT NULL,
  `lot` text DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `studentid` varchar(100) DEFAULT NULL,
  `studentname` varchar(100) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '1=Male,2=Female',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `slevel` varchar(15) DEFAULT NULL,
  `center` varchar(15) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(5) DEFAULT NULL,
  `regdate` date DEFAULT curdate(),
  `remarks` int(5) DEFAULT 3 COMMENT '1=Active,2=Suspend,3=Pending',
  `loginname` varchar(100) DEFAULT NULL,
  `loginpassword` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `acadyear` varchar(25) DEFAULT NULL,
  `trimester` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `loginusername` varchar(100) DEFAULT NULL,
  `loginpassword` varchar(100) DEFAULT NULL,
  `userrole` varchar(25) DEFAULT NULL,
  `remarks` varchar(25) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_courses_allocation`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_courses_allocation`;
CREATE TABLE `view_courses_allocation` (
`id` int(11)
,`staffid` int(11)
,`courseid` varchar(25)
,`acadyear` varchar(15)
,`trim` int(2)
,`coursecode` varchar(25)
,`coursetitle` varchar(255)
,`credit` int(11)
,`trimester` varchar(15)
,`courselevel` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_courses_mount`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_courses_mount`;
CREATE TABLE `view_courses_mount` (
`id` int(11)
,`courseid` int(11)
,`coursecode` varchar(25)
,`coursetitle` varchar(255)
,`mounttrimester` int(11)
,`acadyear` varchar(25)
,`courselevel` varchar(15)
,`coursetrimester` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_courses_allocation`
--
DROP TABLE IF EXISTS `view_courses_allocation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_courses_allocation`  AS  select `courses_allocation`.`id` AS `id`,`courses_allocation`.`staffid` AS `staffid`,`courses_allocation`.`courseid` AS `courseid`,`courses_allocation`.`acadyear` AS `acadyear`,`courses_allocation`.`trim` AS `trim`,`courses`.`coursecode` AS `coursecode`,`courses`.`coursetitle` AS `coursetitle`,`courses`.`credit` AS `credit`,`courses`.`trimester` AS `trimester`,`courses`.`courselevel` AS `courselevel` from (`courses_allocation` join `courses`) where `courses_allocation`.`courseid` = `courses`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_courses_mount`
--
DROP TABLE IF EXISTS `view_courses_mount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_courses_mount`  AS  select `courses_mount`.`id` AS `id`,`courses_mount`.`courseid` AS `courseid`,`courses`.`coursecode` AS `coursecode`,`courses`.`coursetitle` AS `coursetitle`,`courses_mount`.`trimester` AS `mounttrimester`,`courses_mount`.`acadyear` AS `acadyear`,`courses`.`courselevel` AS `courselevel`,`courses`.`trimester` AS `coursetrimester` from (`courses_mount` join `courses`) where `courses_mount`.`id` = `courses`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_allocation`
--
ALTER TABLE `courses_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_mount`
--
ALTER TABLE `courses_mount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_objectives`
--
ALTER TABLE `courses_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_references`
--
ALTER TABLE `courses_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_topics`
--
ALTER TABLE `courses_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_faqs`
--
ALTER TABLE `course_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitators`
--
ALTER TABLE `facilitators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_submissions`
--
ALTER TABLE `files_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liveclass`
--
ALTER TABLE `liveclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_read`
--
ALTER TABLE `notice_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkinglot`
--
ALTER TABLE `parkinglot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_allocation`
--
ALTER TABLE `courses_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_mount`
--
ALTER TABLE `courses_mount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_objectives`
--
ALTER TABLE `courses_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_references`
--
ALTER TABLE `courses_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_topics`
--
ALTER TABLE `courses_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_faqs`
--
ALTER TABLE `course_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilitators`
--
ALTER TABLE `facilitators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files_submissions`
--
ALTER TABLE `files_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liveclass`
--
ALTER TABLE `liveclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_read`
--
ALTER TABLE `notice_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parkinglot`
--
ALTER TABLE `parkinglot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
