-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 12:38 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(15) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `credit` int(5) DEFAULT NULL,
  `trimester` int(5) DEFAULT NULL,
  `course_level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit`, `trimester`, `course_level`) VALUES
(1, 'ite101', 'introduction to ict', 3, 1, '100'),
(2, 'ite102', 'introduction to java programming', 3, 1, '100'),
(3, 'ITE102', 'INTRODUCTION TO APPLICATION SYSTEMS', 3, 1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `facilitators`
--

CREATE TABLE `facilitators` (
  `id` int(11) NOT NULL,
  `staffid` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilitators`
--

INSERT INTO `facilitators` (`id`, `staffid`, `name`, `email`, `phone`) VALUES
(1, 'empty', 'facilitator one', 'noemail@ccod.edu.gh', '0546847775'),
(2, 's101', 'facilitator one', 'noemail@ccod.edu.gh', '0546847775'),
(3, 'S102', 'facilitator two', 'noemail@ccod.edu.gh', '0500419629'),
(4, 'S103', 'FACILITATOR THREE', 'facilitator@ccod.edu.gh', '0500419629'),
(5, 's104', 'FACILITATOR FOUR', 'noemail@ccod.edu.gh', '0546847775');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentid` varchar(25) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `academic_year` varchar(15) DEFAULT NULL,
  `centre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentid`, `name`, `email`, `phone`, `level`, `program`, `academic_year`, `centre`) VALUES
(1, '5131040043', 'student test name', 'kdarkohatobrah@gmail.com', '0546847775', '200', 'BSc OD', '2020/2021', 'Sunyani'),
(2, '5131040044', 'student test name two', 'kdarkohatobrah@gmail.com', '0500419629', '200', 'BSc OD', '2020/2021', 'Tamale'),
(3, '5131040045', 'STUDENT TEST NAME THREE', 'kwame.atobrah@yahoo.com', '0500419629', '100', 'BSc OD', '2020/2021', 'SUNYANI');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '$2y$10$fFUehlMYDH/..3WKhwmkPuw8TWyfvaA/4IYg3FukCOn8Z7oIAgEM6', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitators`
--
ALTER TABLE `facilitators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facilitators`
--
ALTER TABLE `facilitators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
