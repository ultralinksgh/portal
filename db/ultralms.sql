-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2021 at 11:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultralms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(25) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `trimester` varchar(15) DEFAULT NULL,
  `course_level` varchar(15) DEFAULT NULL,
  `is_optional` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit`, `trimester`, `course_level`, `is_optional`, `created_at`) VALUES
(1, '123', 'PROGRAMMING CONCEPT', 3, '1', '100', 0, '2021-01-19 10:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `courses_allocation`
--

CREATE TABLE `courses_allocation` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `academic_year` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_mount`
--

CREATE TABLE `courses_mount` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `trimester` int(11) DEFAULT NULL,
  `academic_year` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_objectives`
--

CREATE TABLE `courses_objectives` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_references`
--

CREATE TABLE `courses_references` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `reflink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_topics`
--

CREATE TABLE `courses_topics` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_faqs`
--

CREATE TABLE `course_faqs` (
  `id` int(11) NOT NULL,
  `dateadded` date DEFAULT curdate(),
  `courseid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_registrations`
--

CREATE TABLE `course_registrations` (
  `id` int(11) NOT NULL,
  `courseid` int(11) DEFAULT NULL,
  `trimester` int(11) DEFAULT NULL,
  `academic_year` varchar(25) DEFAULT NULL,
  `is_late_registration` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_registration_settings`
--

CREATE TABLE `course_registration_settings` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(25) NOT NULL,
  `start_registration_date` date NOT NULL,
  `end_registration_date` date NOT NULL,
  `late_start_date` date NOT NULL,
  `late_end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facilitators`
--

CREATE TABLE `facilitators` (
  `id` int(11) NOT NULL,
  `staffid` varchar(25) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `centre` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'na@na.com',
  `phone` varchar(100) DEFAULT 'NA',
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilitators`
--

INSERT INTO `facilitators` (`id`, `staffid`, `name`, `centre`, `email`, `phone`, `password`, `status`, `created_at`) VALUES
(1, '123', 'OBENG FRANK', NULL, 'obeng@gmail.com', '0542398441', '$2y$10$5LQdgD.BS0YmMteR8HlvP.ncrAT7EIMUEpB7OmymZBXbKEywbRu62', 1, '2021-01-19 10:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

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

CREATE TABLE `parkinglot` (
  `id` int(11) NOT NULL,
  `lot` text DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `acadyear` varchar(15) DEFAULT NULL,
  `trim` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(25) DEFAULT NULL,
  `trimester` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT '1=Male,2=Female',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `center` varchar(15) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `academic_year` varchar(15) DEFAULT NULL,
  `trimester` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT 3 COMMENT '1=Active,2=Suspend,3=Pending',
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userrole` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `fullname`, `username`, `password`, `userrole`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$LMMQWe.gFKPosx0R.jvKM.RbQa5QMrvA56virk9hE2BsC9MJw6b1i', 'admin', 'active', '2021-01-19 09:48:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `courses_allocation`
--
ALTER TABLE `courses_allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `courses_mount`
--
ALTER TABLE `courses_mount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseid` (`courseid`);

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
-- Indexes for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `course_registration_settings`
--
ALTER TABLE `course_registration_settings`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_registration_settings`
--
ALTER TABLE `course_registration_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses_allocation`
--
ALTER TABLE `courses_allocation`
  ADD CONSTRAINT `courses_allocation_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `facilitators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_allocation_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses_mount`
--
ALTER TABLE `courses_mount`
  ADD CONSTRAINT `courses_mount_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD CONSTRAINT `course_registrations_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
