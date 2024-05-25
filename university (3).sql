-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 12:22 PM
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
-- Table structure for table `additional_subjects`
--

CREATE TABLE `additional_subjects` (
  `id` int(11) NOT NULL,
  `register_no` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `points` decimal(5,2) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_subjects`
--

INSERT INTO `additional_subjects` (`id`, `register_no`, `subject`, `points`, `marks`, `grade`, `semester`) VALUES
(1, '2235', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 89, 'B+', 1),
(2, '873983', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 8.00, 78, 'B+', 1),
(3, '38928783', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 80, 'B', 1),
(4, '38928', 'CSEL 441 - Fundamentals of Cryptography (3 Credits)', 8.00, 89, 'C', 1),
(5, '0987654321', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 89, 'P', 1),
(6, '0987', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 8.00, 78, 'A+', 1),
(7, '244', 'CSEL 441 - Fundamentals of Cryptography (3 Credits)', 9.00, 98, 'P', 1),
(8, '24', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 87, 'B+', 1),
(9, '2876', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 90, 'B', 1),
(10, '765764', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 9.00, 89, 'B', 1),
(11, '223568', 'CSEL 441 - Fundamentals of Cryptography (3 Credits)', 7.00, 77, 'A', 1),
(12, '5', 'CSEL 441 - Fundamentals of Cryptography (3 Credits)', 7.00, 77, 'B+', 1),
(13, '7', 'CSCA 431 - Mathematics for Computer Science (3 Credits)', 7.00, 77, 'A', 1),
(14, '89798', 'CSEL 561 - Software Project Management (3 Credits)', 9.00, 78, 'B+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_subjects`
--

CREATE TABLE `core_subjects` (
  `id` int(11) NOT NULL,
  `register_no` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `points` decimal(4,2) NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_subjects`
--

INSERT INTO `core_subjects` (`id`, `register_no`, `subject`, `points`, `marks`, `grade`, `semester`, `created_at`) VALUES
(1, '0987654321', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 8.00, 78.00, 'A', 1, '2024-05-24 23:24:49'),
(2, '0987654321', 'CSCA 412 - Object Oriented Programming (3 Credits)', 7.00, 78.00, 'B', 1, '2024-05-24 23:24:49'),
(3, '0987654321', 'CSCA 413 - Database Management Systems (3 Credits)', 7.00, 89.00, 'C', 1, '2024-05-24 23:24:49'),
(4, '0987654321', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 8.00, 89.00, 'B', 1, '2024-05-24 23:24:49'),
(5, '0987654321', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 9.00, 78.00, 'B+', 1, '2024-05-24 23:24:49'),
(6, '0987654321', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 8.00, 87.00, 'B+', 1, '2024-05-24 23:24:49'),
(7, '0987', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 89.00, 'A', 1, '2024-05-24 23:30:58'),
(8, '0987', 'CSCA 412 - Object Oriented Programming (3 Credits)', 7.00, 89.00, 'B+', 1, '2024-05-24 23:30:58'),
(9, '0987', 'CSCA 413 - Database Management Systems (3 Credits)', 7.00, 89.00, 'B+', 1, '2024-05-24 23:30:58'),
(10, '0987', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 7.00, 89.00, 'B+', 1, '2024-05-24 23:30:58'),
(11, '0987', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 7.00, 89.00, 'B+', 1, '2024-05-24 23:30:58'),
(12, '0987', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 89.00, 'A', 1, '2024-05-24 23:30:58'),
(13, '244', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 98.00, 'B+', 1, '2024-05-24 23:41:09'),
(14, '244', 'CSCA 412 - Object Oriented Programming (3 Credits)', 8.00, 89.00, 'A', 1, '2024-05-24 23:41:09'),
(15, '244', 'CSCA 413 - Database Management Systems (3 Credits)', 9.00, 89.00, 'B', 1, '2024-05-24 23:41:09'),
(16, '244', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 8.00, 98.00, 'B', 1, '2024-05-24 23:41:09'),
(17, '244', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 9.00, 76.00, 'B+', 1, '2024-05-24 23:41:09'),
(18, '244', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 89.00, 'B+', 1, '2024-05-24 23:41:09'),
(19, '24', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 98.00, 'B+', 1, '2024-05-24 23:46:47'),
(20, '24', 'CSCA 412 - Object Oriented Programming (3 Credits)', 9.00, 89.00, 'O', 1, '2024-05-24 23:46:47'),
(21, '24', 'CSCA 413 - Database Management Systems (3 Credits)', 9.00, 78.00, 'C', 1, '2024-05-24 23:46:47'),
(22, '24', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 9.00, 87.00, 'B+', 1, '2024-05-24 23:46:47'),
(23, '24', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 9.00, 87.00, 'B+', 1, '2024-05-24 23:46:47'),
(24, '24', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 87.00, 'B', 1, '2024-05-24 23:46:47'),
(25, '2876', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 98.00, 'A', 1, '2024-05-24 23:52:00'),
(26, '2876', 'CSCA 412 - Object Oriented Programming (3 Credits)', 9.00, 98.00, 'B', 1, '2024-05-24 23:52:00'),
(27, '2876', 'CSCA 413 - Database Management Systems (3 Credits)', 9.00, 98.00, 'C', 1, '2024-05-24 23:52:00'),
(28, '2876', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 9.00, 98.00, 'B+', 1, '2024-05-24 23:52:00'),
(29, '2876', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 9.00, 87.00, 'B', 1, '2024-05-24 23:52:00'),
(30, '2876', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 9.00, 89.00, 'B+', 1, '2024-05-24 23:52:00'),
(31, '2223523', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 78.00, 'B+', 1, '2024-05-25 00:17:52'),
(32, '2223523', 'CSCA 412 - Object Oriented Programming (3 Credits)', 9.00, 78.00, 'B+', 1, '2024-05-25 00:17:52'),
(33, '2223523', 'CSCA 413 - Database Management Systems (3 Credits)', 9.00, 98.00, 'A', 1, '2024-05-25 00:17:52'),
(34, '2223523', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 7.00, 89.00, 'A', 1, '2024-05-25 00:17:52'),
(35, '2223523', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 8.00, 89.00, 'P', 1, '2024-05-25 00:17:52'),
(36, '2223523', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 89.00, 'B', 1, '2024-05-25 00:17:52'),
(37, '765764', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 8.00, 77.00, 'A+', 1, '2024-05-25 00:34:17'),
(38, '765764', 'CSCA 412 - Object Oriented Programming (3 Credits)', 7.00, 78.00, 'P', 1, '2024-05-25 00:34:17'),
(39, '765764', 'CSCA 413 - Database Management Systems (3 Credits)', 7.00, 78.00, 'O', 1, '2024-05-25 00:34:17'),
(40, '765764', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 9.00, 89.00, 'P', 1, '2024-05-25 00:34:17'),
(41, '765764', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 7.00, 78.00, 'A+', 1, '2024-05-25 00:34:17'),
(42, '765764', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 8.00, 78.00, 'A+', 1, '2024-05-25 00:34:17'),
(43, '223568', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 9.00, 99.00, 'O', 1, '2024-05-25 02:40:23'),
(44, '223568', 'CSCA 412 - Object Oriented Programming (3 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 02:40:23'),
(45, '223568', 'CSCA 413 - Database Management Systems (3 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 02:40:23'),
(46, '223568', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 7.00, 77.00, 'A', 1, '2024-05-25 02:40:23'),
(47, '223568', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 7.00, 77.00, 'A', 1, '2024-05-25 02:40:23'),
(48, '223568', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 6.00, 66.00, 'B+', 1, '2024-05-25 02:40:23'),
(49, '5', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 7.00, 77.00, 'A', 1, '2024-05-25 04:10:32'),
(50, '5', 'CSCA 412 - Object Oriented Programming (3 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 04:10:32'),
(51, '5', 'CSCA 413 - Database Management Systems (3 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 04:10:32'),
(52, '5', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 9.00, 99.00, 'O', 1, '2024-05-25 04:10:32'),
(53, '5', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 9.00, 99.00, 'A+', 1, '2024-05-25 04:10:32'),
(54, '5', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 04:10:32'),
(55, '7', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 7.00, 77.00, 'A', 1, '2024-05-25 04:15:18'),
(56, '7', 'CSCA 412 - Object Oriented Programming (3 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 04:15:18'),
(57, '7', 'CSCA 413 - Database Management Systems (3 Credits)', 8.00, 88.00, 'A', 1, '2024-05-25 04:15:18'),
(58, '7', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 8.00, 88.00, 'A', 1, '2024-05-25 04:15:18'),
(59, '7', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 8.00, 88.00, 'A+', 1, '2024-05-25 04:15:18'),
(60, '7', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 77.00, 'A', 1, '2024-05-25 04:15:18'),
(61, '89798', 'CSCA 411 - Data Structures and Algorithms (3 Credits)', 8.00, 98.00, 'B', 1, '2024-05-25 08:52:47'),
(62, '89798', 'CSCA 412 - Object Oriented Programming (3 Credits)', 9.00, 78.00, 'A', 1, '2024-05-25 08:52:47'),
(63, '89798', 'CSCA 413 - Database Management Systems (3 Credits)', 6.00, 78.00, 'B+', 1, '2024-05-25 08:52:47'),
(64, '89798', 'CSCA 414 - Data Structures and Algorithms Lab (2 Credits)', 7.00, 87.00, 'B', 1, '2024-05-25 08:52:47'),
(65, '89798', 'CSCA 415 - Object Oriented Programming Lab (2 Credits)', 7.00, 78.00, 'B+', 1, '2024-05-25 08:52:47'),
(66, '89798', 'CSCA 416 - Database Management Systems Lab (2 Credits)', 7.00, 89.00, 'A', 1, '2024-05-25 08:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `register_no` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `session` varchar(20) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`register_no`, `name`, `date_of_birth`, `session`, `programme`, `specialization`) VALUES
('0987', 'udhayakumar', '2024-05-17', '2024', 'cs', 'mca'),
('0987654321', 'udhayakumar', '2024-05-17', '2024', 'cs', 'mca'),
('12345', 'Monika', '2024-03-15', '2024', 'cs', 'mca'),
('2223523', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('222352303', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2223523038', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2235', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('2235254', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('223566', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('223568', 'Monika', '2024-03-07', '2024', 'cs', 'gg'),
('24', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('244', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2876', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('38928', 'udhayakumar', '2024-05-17', '2024', 'cs', 'mca'),
('38928783', 'udhay', '2024-05-17', '2024', 'cs', 'mca'),
('5', 'Gd', '2024-05-09', 'may', 'mca', 'mca'),
('7', 'Gd', '2024-05-07', '2024', 'mca', 'mca'),
('75', 'archu', '2024-02-16', '2024', 'cs', 'mca'),
('765764', 'maya', '2024-05-12', '2024', 'cs', 'mca'),
('873983', 'hemachandran', '2024-05-09', '2024', 'cs', 'mca'),
('89798', 'Monika', '2024-05-11', '2024', 'cs', 'mca'),
('90', 'archu', '2024-02-16', '2024', 'cs', 'mca');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `credits`, `type`) VALUES
('CSCA431', 'Mathematics for Computer Science', 3, 'H'),
('CSCA432', 'Management Concepts and Strategies', 3, 'S'),
('CSCA531', 'Soft Skills Training', 3, 'S'),
('CSCA532', 'Technical Writing', 3, 'S'),
('CSCA533', 'Presentation Skills', 3, 'S'),
('CSEL441', 'Fundamentals of Cryptography', 3, 'H'),
('CSEL442', 'Database and Application Security', 3, 'H'),
('CSEL530', 'Online / Certification Courses', 3, 'S'),
('CSEL531', 'Simulation and Modeling Tools (SCI Lab)', 3, 'H'),
('CSEL532', 'Mobile Application Development', 3, 'H'),
('CSEL533', 'Software Testing Tools', 3, 'H'),
('CSEL534', 'Multimedia Tools', 3, 'S'),
('CSEL535', 'Python Programming', 3, 'H'),
('CSEL551', 'Data Mining Techniques', 3, 'H'),
('CSEL552', 'Big Data Analytics', 3, 'H'),
('CSEL561', 'Software Project Management', 3, 'S'),
('CSEL562', 'Software Quality Assurance', 3, 'S'),
('CSEL571', 'Introduction to Business Analytics', 3, 'S'),
('CSEL572', 'Marketing Analytics', 3, 'S'),
('CSEL581', 'Principles of Distributed Computing', 3, 'H'),
('CSEL582', 'Introduction to Parallel Computing', 3, 'H'),
('CSEL591', 'Introduction to A.I. and Expert Systems', 3, 'S'),
('CSEL592', 'Neural Networks', 3, 'H');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_subjects`
--
ALTER TABLE `additional_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_subjects`
--
ALTER TABLE `core_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_no` (`register_no`);

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
-- AUTO_INCREMENT for table `additional_subjects`
--
ALTER TABLE `additional_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `core_subjects`
--
ALTER TABLE `core_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `core_subjects`
--
ALTER TABLE `core_subjects`
  ADD CONSTRAINT `core_subjects_ibfk_1` FOREIGN KEY (`register_no`) REFERENCES `students` (`register_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
