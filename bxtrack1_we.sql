-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2019 at 10:30 PM
-- Server version: 10.2.30-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bxtrack1_we`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_log`
--

CREATE TABLE `attendance_log` (
  `a_id` int(11) NOT NULL,
  `roster_id` varchar(25) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `attendance` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_log`
--

INSERT INTO `attendance_log` (`a_id`, `roster_id`, `student_id`, `course_id`, `teacher_id`, `attendance`, `date`) VALUES
(1, '5e011160ac36f', 1, 1, 1, 'Present', '2019-12-23'),
(2, '5e011160ac36f', 3, 1, 1, 'Present', '2019-12-23'),
(3, '5e011160ac36f', 5, 1, 1, 'Present', '2019-12-23'),
(4, '5e011160ac36f', 7, 1, 1, 'Absent', '2019-12-23'),
(5, '5e011160ac36f', 9, 1, 1, 'Absent', '2019-12-23'),
(6, '5e011160ac36f', 11, 1, 1, 'Absent', '2019-12-23'),
(7, '5e013259b3424', 1, 1, 1, 'Absent', '2019-12-23'),
(8, '5e013259b3424', 3, 1, 1, 'Present', '2019-12-23'),
(9, '5e013259b3424', 5, 1, 1, 'Present', '2019-12-23'),
(10, '5e013259b3424', 7, 1, 1, 'Present', '2019-12-23'),
(11, '5e013259b3424', 9, 1, 1, 'Present', '2019-12-23'),
(12, '5e013259b3424', 11, 1, 1, 'Absent', '2019-12-23'),
(13, '5e0134b09422a', 1, 1, 1, 'Present', '2019-12-23'),
(14, '5e0134b09422a', 3, 1, 1, 'Present', '2019-12-23'),
(15, '5e0134b09422a', 5, 1, 1, 'Present', '2019-12-23'),
(16, '5e0134b09422a', 7, 1, 1, 'Present', '2019-12-23'),
(17, '5e0134b09422a', 9, 1, 1, 'Present', '2019-12-23'),
(18, '5e0134b09422a', 11, 1, 1, 'Present', '2019-12-23'),
(19, '5e01b7b5b9e03', 1, 1, 1, 'Present', '2019-12-24'),
(20, '5e01b7b5b9e03', 3, 1, 1, 'Present', '2019-12-24'),
(21, '5e01b7b5b9e03', 5, 1, 1, 'Present', '2019-12-24'),
(22, '5e01b7b5b9e03', 7, 1, 1, 'Present', '2019-12-24'),
(23, '5e01b7b5b9e03', 9, 1, 1, 'Absent', '2019-12-24'),
(24, '5e01b7b5b9e03', 11, 1, 1, 'Absent', '2019-12-24'),
(25, '5e01b9224ec18', 2, 2, 2, 'Present', '2019-12-24'),
(26, '5e01b9224ec18', 4, 2, 2, 'Present', '2019-12-24'),
(27, '5e01b9224ec18', 6, 2, 2, 'Present', '2019-12-24'),
(28, '5e01b9224ec18', 8, 2, 2, 'Absent', '2019-12-24'),
(29, '5e01b9224ec18', 10, 2, 2, 'Absent', '2019-12-24'),
(30, '5e01b82758038', 1, 1, 1, 'Absent', '2019-12-24'),
(31, '5e01b82758038', 3, 1, 1, 'Absent', '2019-12-24'),
(32, '5e01b82758038', 5, 1, 1, 'Absent', '2019-12-24'),
(33, '5e01b82758038', 7, 1, 1, 'Present', '2019-12-24'),
(34, '5e01b82758038', 9, 1, 1, 'Present', '2019-12-24'),
(35, '5e01b82758038', 11, 1, 1, 'Present', '2019-12-24'),
(36, '5e01e0e596acc', 2, 2, 2, 'Present', '2019-12-24'),
(37, '5e01e0e596acc', 4, 2, 2, 'Present', '2019-12-24'),
(38, '5e01e0e596acc', 6, 2, 2, 'Present', '2019-12-24'),
(39, '5e01e0e596acc', 8, 2, 2, 'Present', '2019-12-24'),
(40, '5e01e0e596acc', 10, 2, 2, 'Present', '2019-12-24'),
(41, '5e01e2320ff7d', 1, 1, 1, 'Present', '2019-12-24'),
(42, '5e01e2320ff7d', 3, 1, 1, 'Present', '2019-12-24'),
(43, '5e01e2320ff7d', 5, 1, 1, 'Present', '2019-12-24'),
(44, '5e01e2320ff7d', 7, 1, 1, 'Present', '2019-12-24'),
(45, '5e01e2320ff7d', 9, 1, 1, 'Absent', '2019-12-24'),
(46, '5e01e2320ff7d', 11, 1, 1, 'Absent', '2019-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_title`, `course_description`) VALUES
(1, 'CS302', 'Web Engineering', 'Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem '),
(2, 'CS201', 'Algorithm & Data Structures', 'Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem Lorem ispem ');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `cs_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`cs_id`, `course_id`, `student_id`, `register_date`) VALUES
(1, 1, 1, '2019-12-22'),
(2, 1, 3, '2019-12-22'),
(3, 1, 5, '2019-12-22'),
(4, 1, 7, '2019-12-22'),
(5, 1, 9, '2019-12-22'),
(6, 1, 11, '2019-12-22'),
(7, 2, 2, '2019-12-22'),
(8, 2, 4, '2019-12-22'),
(9, 2, 6, '2019-12-22'),
(10, 2, 8, '2019-12-22'),
(11, 2, 10, '2019-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `ct_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `term` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`ct_id`, `course_id`, `teacher_id`, `term`) VALUES
(1, 1, 1, 'FA19'),
(2, 2, 2, 'FA19');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `r_id` int(11) NOT NULL,
  `roster_code` varchar(25) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`r_id`, `roster_code`, `course_id`, `teacher_id`, `date`, `active`) VALUES
(2, '5e011160ac36f', 1, 1, '2019-12-23', 0),
(4, '5e013259b3424', 1, 1, '2019-12-23', 0),
(5, '5e0134b09422a', 1, 1, '2019-12-23', 0),
(7, '5e01b7b5b9e03', 1, 1, '2019-12-24', 0),
(8, '5e01b82758038', 1, 1, '2019-12-24', 0),
(9, '5e01b9224ec18', 2, 2, '2019-12-24', 0),
(10, '5e01e0e596acc', 2, 2, '2019-12-24', 0),
(11, '5e01e2320ff7d', 1, 1, '2019-12-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(55) NOT NULL,
  `student_reg_no` varchar(14) NOT NULL,
  `student_email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_reg_no`, `student_email`) VALUES
(1, 'Muhammad Umer Sheikh', 'SP17-BSE-075', 'umer@bxtrack.com'),
(2, 'Syed Ali Gilani', 'SP17-BSE-079', 'ali@bxtrack.com'),
(3, 'Muhammad Mansha', 'SP17-BSE-074', 'mansha@bxtrack.com'),
(4, 'Muhammad Aqib', 'SP17-BSE-072', 'aqib@bxtrack.com'),
(5, 'Alex Hales', 'SP17-BSE-071', 'alex@bxtrack.com'),
(6, 'John Doe', 'SP17-BSE-070', 'john@bxtrack.com'),
(7, 'Jane Doe', 'SP17-BSE-089', 'jane@bxtrack.com'),
(8, 'Mike Tyson', 'SP17-BSE-088', 'mike@bxtrack,com'),
(9, 'Alexa Burg', 'SP17-BSE-100', 'alexa@bxtrack.com'),
(10, 'Christopher McCandles', 'SP17-BSE-120', 'chris@bxtrack.com'),
(11, 'Walter White', 'SP17-BSE-189', 'walter@bxtrack.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `teacher_name` varchar(55) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `email`, `teacher_name`, `password`) VALUES
(1, 'hasan@bxtrack.com', 'Hasan Ali Khattak', 'hasan123'),
(2, 'yasir@bxtrack.com', 'Yasir Faheem', 'yasir123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `roster_code` (`roster_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
