-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 01:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `as_id` bigint(11) NOT NULL,
  `as_Title` varchar(150) NOT NULL,
  `as_check` varchar(50) NOT NULL,
  `as_body` varchar(500) NOT NULL,
  `as_path` varchar(1000) DEFAULT NULL,
  `as_submit_path` varchar(1000) NOT NULL,
  `as_date` date NOT NULL,
  `as_time` time NOT NULL,
  `classroomid` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `teacher_id` bigint(100) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`as_id`, `as_Title`, `as_check`, `as_body`, `as_path`, `as_submit_path`, `as_date`, `as_time`, `classroomid`, `subject`, `teacher_id`, `posted_on`, `last_updated`) VALUES
(1, 'Assignment 1', 'checked', '10 sum.', 'http://localhost/portal/assignmentFile/5.png', '', '2021-11-30', '05:00:00', 'A', 'Mathematics', 1, '2021-11-22 14:34:13', '2021-11-30 15:57:13'),
(2, 'Assignment 2', '', '20sum', 'http://localhost/portal/assignmentFile/3.png', '', '2021-11-26', '04:00:00', 'A', 'Mathematics', 1, '2021-11-22 15:19:31', '2021-12-01 16:38:33'),
(9, 'Assignment 3', 'checked', 'asdadsa', 'http://localhost/portal/assignmentFile/2.png', '', '2021-11-25', '20:18:00', 'A', 'Mathematics', 1, '2021-11-22 16:46:14', '2021-11-30 15:22:46'),
(10, 'Assignment 4', '', 'dadad hdhad .. sdfs ef sfsdda', 'http://localhost/portal/assignmentFile/IMG_20171024_171258.jpg', '', '2021-11-18', '19:20:00', 'A', 'Mathematics', 1, '2021-11-22 17:18:41', '2021-12-11 15:02:25'),
(85, 'Airplane', '', '12485 85 555\" 5228 \"', 'http://localhost/portal/assignmentFile/6.png', '', '2021-12-01', '17:30:00', 'A', 'Mathematics', 1, '2021-11-29 16:27:14', '2021-11-30 15:22:36'),
(90, 'Maths Assignment ', '', 'From Ch:- 123456', 'http://localhost/portal/assignmentFile/IMG_20171024_164636.jpg', '', '2021-12-10', '14:00:00', 'B', 'Mathematics', 2, '2021-11-30 13:48:09', '2021-11-30 13:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` bigint(5) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_body` varchar(1000) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `place` varchar(250) NOT NULL,
  `teacher_id` bigint(100) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `event_title`, `event_body`, `event_date`, `event_time`, `place`, `teacher_id`, `posted_on`, `last_updated`) VALUES
(13, 'Annual Function', 'Need Volunteers ....', '2021-11-17', '15:00:00', 'Principal Office', 1596, '2021-11-16 14:47:07', '2021-11-22 12:52:35'),
(14, 'Maths Exam', 'Ch 1,2,3,4,5\r\n\r\nMarks : 50', '2021-11-24', '15:35:00', 'A', 1, '2021-11-16 15:29:33', '2021-11-27 22:48:35'),
(15, 'Maths Exam', 'Ch :- 5, 10, 11,12\r\nMarks:- 50', '2021-12-02', '10:00:00', 'A', 1, '2021-11-16 16:23:38', '2021-11-25 11:15:52'),
(16, 'Maths Exam', 'dfsa ffaef fefaefesfsdfas dfefsef ', '2021-11-26', '09:00:00', 'C', 3, '2021-11-16 17:53:26', '2021-11-22 12:52:35'),
(17, 'Science exam', 'asdawjkd jd idhadaada dahd ashd haasdawjkd jd idhadaada dahd ashd haasdawjkd jd idhadaada dahd ashd haasdawjkd jd idhadaada dahd ashd haasdawjkd jdd jd idhadaada dahd ashd ha', '2021-11-23', '12:00:00', 'A', 4, '2021-11-16 17:56:42', '2021-11-22 12:52:35'),
(18, 'Maths Exam 3', 'Ch 1,5,10,11\r\nMarks 10', '2021-11-26', '10:00:00', 'A', 1, '2021-11-17 10:52:43', '2021-11-22 12:52:35'),
(137, 'NAN', '', '2021-11-29', '23:30:00', '', 1, '2021-11-29 23:47:49', '2021-11-29 23:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `m_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `studentid` bigint(20) NOT NULL,
  `classroomid` varchar(10) NOT NULL,
  `exam_category` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `obtain_m` float NOT NULL,
  `total_m` float NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `event_date`, `studentid`, `classroomid`, `exam_category`, `subject`, `obtain_m`, `total_m`, `percentage`) VALUES
(6, '2021-11-24', 2, 'A', 'Main', 'Mathematics', 90, 100, 90),
(7, '2021-11-24', 1, 'A', 'Main', 'Mathematics', 56, 100, 56),
(49, '2021-11-24', 8, 'A', 'Main', 'Mathematics', 85, 100, 85),
(50, '2021-11-24', 28, 'A', 'Main', 'Mathematics', 89, 100, 89),
(51, '2021-11-30', 1, 'A', 'Main', 'History', 65, 100, 65),
(52, '2021-11-30', 2, 'A', 'Main', 'History', 75, 100, 75),
(53, '2021-11-30', 8, 'A', 'Main', 'History', 82, 100, 82),
(54, '2021-11-30', 28, 'A', 'Main', 'History', 79, 100, 79),
(55, '2021-11-28', 1, 'A', 'Main', 'Science', 70, 100, 70),
(56, '2021-11-28', 2, 'A', 'Main', 'Science', 80, 100, 80),
(57, '2021-11-28', 8, 'A', 'Main', 'Science', 70, 100, 70),
(58, '2021-11-28', 28, 'A', 'Main', 'Science', 90, 100, 90),
(59, '2021-11-30', 5, 'B', 'Main', 'History', 69, 100, 69),
(60, '2021-11-30', 6, 'B', 'Main', 'History', 87, 100, 87),
(61, '2021-11-30', 7, 'B', 'Main', 'History', 88, 100, 88),
(62, '2021-11-30', 25, 'B', 'Main', 'History', 75, 100, 75),
(63, '2021-11-28', 5, 'B', 'Main', 'Science', 98, 100, 98),
(64, '2021-11-28', 6, 'B', 'Main', 'Science', 82, 100, 82),
(65, '2021-11-28', 7, 'B', 'Main', 'Science', 72, 100, 72),
(66, '2021-11-28', 25, 'B', 'Main', 'Science', 89, 100, 89),
(67, '2021-11-24', 5, 'B', 'Main', 'Mathematics', 83, 100, 83),
(68, '2021-11-24', 6, 'B', 'Main', 'Mathematics', 88, 100, 88),
(69, '2021-11-24', 7, 'B', 'Main', 'Mathematics', 98, 100, 98),
(70, '2021-11-24', 25, 'B', 'Main', 'Mathematics', 88, 100, 88),
(75, '2021-11-30', 60, 'C', 'Main', 'History', 69, 100, 69),
(76, '2021-11-30', 70, 'C', 'Main', 'History', 50, 100, 50),
(77, '2021-11-28', 60, 'C', 'Main', 'Science', 97, 100, 97);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` bigint(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Image_path` varchar(150) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `classroomid` varchar(5) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` bigint(15) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `firstname`, `lastname`, `dob`, `gender`, `Image_path`, `standard`, `classroomid`, `batch`, `email`, `contact_no`, `password`, `register_date`) VALUES
(1, 'Nayan', 'Sorathiya', '1999-10-14', 'male', 'http://localhost/portal/upload/IMG_20180707_213047.jpg', '5', 'A', '2021', 'nayansorathiya3@gmail.com', 9664919955, '12345678', '2021-11-12 11:01:52'),
(2, 'Parth', 'Sabhadiya', '1999-11-05', 'male', 'http://localhost/portal/upload/IMG_20191226_145216.jpg', '5', 'A', '2021', 'parth@gmail.com', 7046429193, '12345678', '2021-11-12 11:09:24'),
(3, 'Vaikunth', 'Desai', '1999-11-11', 'male', '', '5', 'C', '2021', 'vd@gmail.com', 9587415623, '12345678', '2021-11-12 18:17:54'),
(4, 'Palav', 'Desai', '2000-01-11', 'female', 'http://localhost/portal/upload/666491_indian-army-hd-wallpapers-1080p1.jpg', '5', 'C', '2021', 'palav123@gmail.com', 9874515784, '12345678', '2021-11-12 11:46:37'),
(5, 'jaydev', 'suriya', '1999-09-01', 'male', 'http://localhost/portal/upload/ARMY.jpg', '5', 'B', '2021', 'jaydev@gmail.com', 9548547616, '12345678', '2021-11-12 12:18:27'),
(6, 'SP', 'sabhadiya', '2021-11-03', 'male', 'http://localhost/portal/upload/SERVE.jpg', '5', 'B', '2021', 'sp@mail.com', 9546851568, '12345678', '2021-11-13 11:12:52'),
(7, 'Jaydeep', 'purabiya', '2021-06-11', 'male', 'http://localhost/portal/upload/IMG_20171024_171643.jpg', '5', 'B', '2021', 'jaydeep@gmail.com', 9541568258, '12345678', '2021-11-13 11:30:32'),
(8, 'Parth', 'Trapasiya', '1999-06-12', 'male', 'http://localhost/portal/upload/WhatsApp_Image_2020-03-11_at_09_52_54.jpeg', '5', 'A', '2021', 'parthtrapasiya@gmail.com', 9548516254, '12345678', '2021-11-17 09:44:15'),
(25, 'kali', 'fsdfsdffs', '2021-11-04', 'female', '', '5', 'B', '2021', '1596', 9584581585, '12345678', '2021-11-19 16:20:29'),
(28, 'Milind', 'Doha', '2006-01-20', 'male', '', '5', 'A', '2021', 'adkbh@gmail.com', 9858475852, '12345678', '2021-11-25 16:09:29'),
(31, 'Rajkumar', 'Sorathiya', '1998-02-16', 'male', '', '5', 'B', '2021', 'raj@gmail.com', 9658748562, '12345678', '2021-11-19 16:37:42'),
(50, '50Name', '50Last', '1998-12-29', 'male', '', '5', 'A', '2021', '1596', 5050505050, '123', '2021-12-02 14:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `sa_id` bigint(20) NOT NULL,
  `as_id` bigint(20) NOT NULL,
  `studentid` bigint(20) NOT NULL,
  `filter` tinyint(4) NOT NULL DEFAULT 0,
  `as_path` varchar(500) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_assignments`
--

INSERT INTO `student_assignments` (`sa_id`, `as_id`, `studentid`, `filter`, `as_path`, `add_time`) VALUES
(1, 1, 1, 0, 'http://localhost/portal/assignmentFile/1.png', '2021-12-03 16:26:38'),
(2, 9, 1, 1, 'http://localhost/portal/assignmentFile/3.png', '2021-12-03 16:27:47'),
(4, 10, 2, 1, 'http://localhost/portal/assignmentFile/demo.xlsx', '2021-12-03 18:41:14'),
(5, 9, 2, 1, 'http://localhost/portal/assignmentFile/6.png', '2021-12-03 18:41:21'),
(8, 2, 1, 1, 'http://localhost/portal/assignmentFile/Nayan_Resume.docx', '2021-12-04 10:01:59'),
(9, 9, 1, 1, 'http://localhost/portal/assignmentFile/Manhattan_1000.pdf', '2021-12-04 10:13:07'),
(12, 10, 1, 1, 'http://localhost/portal/studentFiles/DSC000442.JPG', '2021-12-06 10:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` int(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subject`) VALUES
(1, 'History'),
(2, 'Mathematics'),
(3, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subjectid` int(30) NOT NULL,
  `classroomid` varchar(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(150) NOT NULL,
  `contact_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `password`, `subjectid`, `classroomid`, `firstname`, `lastname`, `dob`, `created_at`, `email`, `contact_no`) VALUES
(1, '123', 2, 'A', 'Manan', 'Desai', '2001-11-01', '2021-11-11 00:00:00', 'manan@desai.com', 2545695215),
(2, '123', 2, 'B', 'Manav', 'pal', '2001-11-01', '2021-11-11 00:00:00', 'manav@pal.com', 1234567890),
(3, '123', 2, 'C', 'Mangal', 'shah', '2001-11-01', '2021-11-11 00:00:00', 'mangal@s.com', 2541528459),
(4, '123', 3, 'A', 'Shital', 'Pandya', '2001-11-01', '2021-11-11 00:00:00', 'shital@gmail.com', 4581589623),
(5, '123', 3, 'B', 'Siddharth ', 'Shah', '2001-11-01', '2021-11-11 00:00:00', 'siddharth@gmail.com', 9874521562),
(6, '123', 3, 'C', 'Shyam', 'patel', '2001-11-01', '2021-11-11 00:00:00', 'shyam@gmail.com', 4781592360),
(7, '123', 1, 'A', 'Hitesh', 'parekh', '2001-11-01', '2021-11-11 00:00:00', 'hitesh@gmail.com', 9764875892),
(8, '123', 1, 'B', 'Hardik', 'dholariya', '2001-11-01', '2021-11-11 00:00:00', 'hardik@gmail.com', 9874547851),
(9, '123', 1, 'C', 'Harish', 'prajapati', '2001-11-01', '2021-11-11 00:00:00', 'harish@gmail.com', 8745648745),
(50, '123', 2, 'C', 'Siddharth', 'Shah', '2021-05-05', '2021-11-19 16:18:06', 'jajhaj.com', 54534354),
(1596, '12345678', 2, 'ALL', 'Vivek', 'Akbari', '2021-11-12', '2021-11-12 12:37:45', 'vivek.tatvamasi@gmail.com', 9537774031);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `as_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `sa_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
