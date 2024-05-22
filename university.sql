-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 12:31 PM
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
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `register_no` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `register_no`, `session`, `programme`, `specialization`) VALUES
(1, 'John Doe', 'PU12345', '2024-2025', 'MCA', 'Information Security'),
(2, 'Jane Smith', 'PU54321', '2024-2025', 'MCA', 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `credits`) VALUES
(1, 'CSCA 411', 'Data Structures and Algorithms', 3),
(2, 'CSCA 412', 'Object Oriented Programming', 3),
(3, 'CSCA 413', 'Database Management Systems', 3),
(4, 'CSCA 414', 'Data Structures and Algorithms Lab', 2),
(5, 'CSCA 415', 'Object Oriented Programming Lab', 2),
(6, 'CSCA 416', 'Database Management Systems Lab', 2),
(7, 'CSCA 421', 'Computer Networks', 3),
(8, 'CSCA 422', 'Operating Systems', 3),
(9, 'CSCA 423', 'Communication Skills', 2),
(10, 'CSCA 424', 'Computer Networks Lab', 2),
(11, 'CSCA 425', 'Operating Systems Lab', 2),
(12, 'CSCA 511', 'Software Engineering', 3),
(13, 'CSCA 512', 'Internet and Web Technologies', 3),
(14, 'CSCA 513', 'Mini Project', 2),
(15, 'CSCA 514', 'Internet and Web Technologies Lab', 2),
(16, 'CSCA 515', 'Academic Out-Reach Programme', 1),
(17, 'CSCA 521', 'Project Work', 4),
(18, 'CSCA 522', 'Project Seminar', 4),
(19, 'CSCA 523', 'Project Report and Viva-voce', 4),
(20, 'CSCA 431', 'Mathematics for Computer Science', 3),
(21, 'CSCA 432', 'Management Concepts and Strategies', 3),
(22, 'CSEL 530', 'Online / Certification Courses', 2),
(23, 'CSEL 531', 'Simulation and Modeling Tools (SCI Lab)', 2),
(24, 'CSEL 532', 'Mobile Application Development', 2),
(25, 'CSEL 533', 'Software Testing Tools', 2),
(26, 'CSEL 534', 'Multimedia Tools', 2),
(27, 'CSEL 535', 'Python Programming', 2),
(28, 'CSEL 441', 'Fundamentals of Cryptography', 3),
(29, 'CSEL 442', 'Database and Application Security', 3),
(30, 'CSEL 443', 'Mobile and Digital Forensics', 3),
(31, 'CSEL 444', 'Malware Analysis', 3),
(32, 'CSEL 445', 'Information System Audit', 3),
(33, 'CSEL 446', 'Information Security Management Compliance', 3),
(34, 'CSEL 447', 'Cloud Security', 3),
(35, 'CSEL 551', 'Data Mining Techniques', 3),
(36, 'CSEL 552', 'Big Data Analytics', 3),
(37, 'CSEL 553', 'Machine Learning Techniques', 3),
(38, 'CSEL 554', 'Predictive Analytics', 3),
(39, 'CSEL 555', 'Deep Learning', 3),
(40, 'CSEL 556', 'Natural Language Processing', 3),
(41, 'CSEL 557', 'Time Series Analysis', 3),
(42, 'CSEL 561', 'Software Project Management', 3),
(43, 'CSEL 562', 'Software Quality Assurance', 3),
(44, 'CSEL 563', 'Agile Methodologies', 3),
(45, 'CSEL 564', 'Software Architecture', 3),
(46, 'CSEL 565', 'DevOps', 3),
(47, 'CSEL 566', 'Requirements Engineering', 3),
(48, 'CSEL 567', 'Software Testing', 3),
(49, 'CSEL 571', 'Introduction to Business Analytics', 3),
(50, 'CSEL 572', 'Marketing Analytics', 3),
(51, 'CSEL 573', 'Financial Analytics', 3),
(52, 'CSEL 574', 'HR Analytics', 3),
(53, 'CSEL 575', 'Supply Chain Analytics', 3),
(54, 'CSEL 576', 'Customer Analytics', 3),
(55, 'CSEL 577', 'Risk Analytics', 3),
(56, 'CSEL 581', 'Principles of Distributed Computing', 3),
(57, 'CSEL 582', 'Introduction to Parallel Computing', 3),
(58, 'CSEL 583', 'Network Design and Management', 3),
(59, 'CSEL 584', 'Web Services Computing', 3),
(60, 'CSEL 585', 'Pervasive and Ubiquitous Computing', 3),
(61, 'CSEL 586', 'Cloud Computing', 3),
(62, 'CSEL 587', 'Internet of Things', 3),
(63, 'CSEL 591', 'Introduction to A.I. and Expert Systems', 3),
(64, 'CSEL 592', 'Neural Networks', 3),
(65, 'CSEL 593', 'Fuzzy Logic', 3),
(66, 'CSEL 594', 'Decision Support Systems', 3),
(67, 'CSEL 595', 'Introduction to Machine Learning', 3),
(68, 'CSEL 596', 'Introduction to Robotics', 3),
(69, 'CSEL 597', 'Soft Computing', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_no` (`register_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
