-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 02:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL,
  `register_no` varchar(50) DEFAULT NULL,
  `subject_code` varchar(50) DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `register_no` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `session` varchar(50) NOT NULL,
  `programme` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_type` enum('Core','Supportive Core','Domain Specific Elective','Open Elective','Skill Enhancement') NOT NULL,
  `hardcore_softcore` enum('H','S') NOT NULL DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `subject_type`, `hardcore_softcore`) VALUES
('CSCA 411', 'Data Structures and Algorithms', 'Core', 'H'),
('CSCA 412', 'Object Oriented Programming', 'Core', 'H'),
('CSCA 413', 'Database Management Systems', 'Core', 'H'),
('CSCA 414', 'Data Structures and Algorithms Lab', 'Core', 'H'),
('CSCA 415', 'Object Oriented Programming Lab', 'Core', 'H'),
('CSCA 416', 'Database Management Systems Lab', 'Core', 'H'),
('CSCA 421', 'Computer Networks', 'Core', 'H'),
('CSCA 422', 'Operating Systems', 'Core', 'H'),
('CSCA 423', 'Communication Skills', 'Core', 'H'),
('CSCA 424', 'Computer Networks Lab', 'Core', 'H'),
('CSCA 425', 'Operating Systems Lab', 'Core', 'H'),
('CSCA 431', 'Mathematics for Computer Science', 'Supportive Core', 'S'),
('CSCA 432', 'Management Concepts and Strategies', 'Supportive Core', 'S'),
('CSCA 433', 'Business Communication Skills', 'Supportive Core', 'S'),
('CSCA 511', 'Software Engineering', 'Core', 'H'),
('CSCA 512', 'Internet and Web Technologies', 'Core', 'H'),
('CSCA 513', 'Mini Project', 'Core', 'H'),
('CSCA 514', 'Internet and Web Technologies Lab', 'Core', 'H'),
('CSCA 515', 'Academic Out-Reach Programme', 'Core', 'H'),
('CSCA 521', 'Project Work', 'Core', 'H'),
('CSCA 522', 'Project Seminar', 'Core', 'H'),
('CSCA 523', 'Project Report and Viva-voce', 'Core', 'H'),
('CSCA 531', 'Soft Skills Training', 'Skill Enhancement', 'S'),
('CSCA 532', 'Technical Writing', 'Skill Enhancement', 'S'),
('CSCA 533', 'Presentation Skills', 'Skill Enhancement', 'S'),
('CSEL 441', 'Fundamentals of Cryptography', 'Domain Specific Elective', 'H'),
('CSEL 442', 'Database and Application Security', 'Domain Specific Elective', 'H'),
('CSEL 530', 'Online / Certification Courses', 'Open Elective', 'H'),
('CSEL 531', 'Simulation and Modeling Tools (SCI Lab)', 'Open Elective', 'H'),
('CSEL 532', 'Mobile Application Development', 'Open Elective', 'H'),
('CSEL 533', 'Software Testing Tools', 'Open Elective', 'H'),
('CSEL 534', 'Multimedia Tools', 'Open Elective', 'H'),
('CSEL 535', 'Python Programming', 'Open Elective', 'H'),
('CSEL 551', 'Data Mining Techniques', 'Domain Specific Elective', 'H'),
('CSEL 552', 'Big Data Analytics', 'Domain Specific Elective', 'H'),
('CSEL 561', 'Software Project Management', 'Domain Specific Elective', 'H'),
('CSEL 562', 'Software Quality Assurance', 'Domain Specific Elective', 'H'),
('CSEL 571', 'Introduction to Business Analytics', 'Domain Specific Elective', 'H'),
('CSEL 572', 'Marketing Analytics', 'Domain Specific Elective', 'H'),
('CSEL 581', 'Principles of Distributed Computing', 'Domain Specific Elective', 'H'),
('CSEL 582', 'Introduction to Parallel Computing', 'Domain Specific Elective', 'H'),
('CSEL 591', 'Introduction to A.I. and Expert Systems', 'Domain Specific Elective', 'H'),
('CSEL 592', 'Neural Networks', 'Domain Specific Elective', 'H');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `register_no` (`register_no`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`register_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`register_no`) REFERENCES `students` (`register_no`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `subjects` (`subject_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
