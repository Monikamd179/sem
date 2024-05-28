-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `subject_name` varchar(100) DEFAULT NULL,
  `subject_code` varchar(20) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `points` decimal(5,2) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_subjects`
--

INSERT INTO `additional_subjects` (`id`, `register_no`, `subject_name`, `subject_code`, `credits`, `points`, `marks`, `grade`, `semester`) VALUES
(1, '2235', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 89, 'B+', 1),
(2, '873983', 'Mathematics for Computer Science', 'CSCA 431', 3, '8.00', 78, 'B+', 1),
(3, '38928783', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 80, 'B', 1),
(4, '38928', 'Fundamentals of Cryptography', 'CSEL 441', 3, '8.00', 89, 'C', 1),
(5, '0987654321', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 89, 'P', 1),
(6, '0987', 'Mathematics for Computer Science', 'CSCA 431', 3, '8.00', 78, 'A+', 1),
(7, '244', 'Fundamentals of Cryptography', 'CSEL 441', 3, '9.00', 98, 'P', 1),
(8, '24', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 87, 'B+', 1),
(9, '2876', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 90, 'B', 1),
(10, '765764', 'Mathematics for Computer Science', 'CSCA 431', 3, '9.00', 89, 'B', 1),
(11, '223568', 'Fundamentals of Cryptography', 'CSEL 441', 3, '7.00', 77, 'A', 1),
(12, '5', 'Fundamentals of Cryptography', 'CSEL 441', 3, '7.00', 77, 'B+', 1),
(13, '7', 'Mathematics for Computer Science', 'CSCA 431', 3, '7.00', 77, 'A', 1),
(14, '89798', 'Software Project Management', 'CSEL 561', 3, '9.00', 78, 'B+', 1),
(16, '22352018', NULL, NULL, 0, '8.00', 87, 'A+', 1),
(17, '18', NULL, NULL, 0, '8.00', 88, 'A+', 1),
(18, '63', NULL, NULL, 0, '6.00', 56, 'A', 1),
(19, 'mogamaya', NULL, NULL, 0, '6.00', 56, 'A+', 1),
(20, '22352037', NULL, NULL, 0, '7.00', 76, 'B+', 1),
(21, '22352058', 'Mathematics for Computer Science', 'CSCA 431', 3, '7.00', 76, 'B+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_subjects`
--

CREATE TABLE `core_subjects` (
  `id` int(11) NOT NULL,
  `register_no` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `credits` int(11) NOT NULL,
  `points` decimal(4,2) NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_subjects`
--

INSERT INTO `core_subjects` (`id`, `register_no`, `subject_name`, `subject_code`, `credits`, `points`, `marks`, `grade`, `semester`, `created_at`) VALUES
(1, '0987654321', 'Data Structures and Algorithms', 'CSCA 411', 3, '8.00', '78.00', 'A', 1, '2024-05-24 23:24:49'),
(2, '0987654321', 'Object Oriented Programming', 'CSCA 412', 3, '7.00', '78.00', 'B', 1, '2024-05-24 23:24:49'),
(3, '0987654321', 'Database Management Systems', 'CSCA 413', 3, '7.00', '89.00', 'C', 1, '2024-05-24 23:24:49'),
(4, '0987654321', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '8.00', '89.00', 'B', 1, '2024-05-24 23:24:49'),
(5, '0987654321', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '78.00', 'B+', 1, '2024-05-24 23:24:49'),
(6, '0987654321', 'Database Management Systems Lab', 'CSCA 416', 2, '8.00', '87.00', 'B+', 1, '2024-05-24 23:24:49'),
(7, '0987', 'Data Structures and Algorithms', 'CSCA 411', 3, '9.00', '89.00', 'A', 1, '2024-05-24 23:30:58'),
(8, '0987', 'Object Oriented Programming', 'CSCA 412', 3, '7.00', '89.00', 'B+', 1, '2024-05-24 23:30:58'),
(9, '0987', 'Database Management Systems', 'CSCA 413', 3, '7.00', '89.00', 'B+', 1, '2024-05-24 23:30:58'),
(10, '0987', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '7.00', '89.00', 'B+', 1, '2024-05-24 23:30:58'),
(11, '0987', 'Object Oriented Programming Lab', 'CSCA 415', 2, '7.00', '89.00', 'B+', 1, '2024-05-24 23:30:58'),
(12, '0987', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '89.00', 'A', 1, '2024-05-24 23:30:58'),
(13, '244', 'Data Structures and Algorithms', 'CSCA 411', 3, '9.00', '98.00', 'B+', 1, '2024-05-24 23:41:09'),
(14, '244', 'Object Oriented Programming', 'CSCA 412', 3, '8.00', '89.00', 'A', 1, '2024-05-24 23:41:09'),
(15, '244', 'Database Management Systems', 'CSCA 413', 3, '9.00', '89.00', 'B', 1, '2024-05-24 23:41:09'),
(16, '244', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '8.00', '98.00', 'B', 1, '2024-05-24 23:41:09'),
(17, '244', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '76.00', 'B+', 1, '2024-05-24 23:41:09'),
(18, '244', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '89.00', 'B+', 1, '2024-05-24 23:41:09'),
(19, '24', 'Data Structures and Algorithms', 'CSCA 411', 3, '9.00', '98.00', 'B+', 1, '2024-05-24 23:46:47'),
(20, '24', 'Object Oriented Programming', 'CSCA 412', 3, '9.00', '89.00', 'O', 1, '2024-05-24 23:46:47'),
(21, '24', 'Database Management Systems', 'CSCA 413', 3, '9.00', '78.00', 'C', 1, '2024-05-24 23:46:47'),
(22, '24', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '9.00', '87.00', 'B+', 1, '2024-05-24 23:46:47'),
(23, '24', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '87.00', 'B+', 1, '2024-05-24 23:46:47'),
(24, '24', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '87.00', 'B', 1, '2024-05-24 23:46:47'),
(25, '2876', 'Data Structures and Algorithms', 'CSCA 411', 3, '9.00', '98.00', 'A', 1, '2024-05-24 23:52:00'),
(26, '2876', 'Object Oriented Programming', 'CSCA 412', 3, '9.00', '98.00', 'B', 1, '2024-05-24 23:52:00'),
(27, '2876', 'Database Management Systems', 'CSCA 413', 3, '9.00', '98.00', 'C', 1, '2024-05-24 23:52:00'),
(28, '2876', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '9.00', '98.00', 'B+', 1, '2024-05-24 23:52:00'),
(29, '2876', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '87.00', 'B', 1, '2024-05-24 23:52:00'),
(30, '2876', 'Database Management Systems Lab', 'CSCA 416', 2, '9.00', '89.00', 'B+', 1, '2024-05-24 23:52:00'),
(31, '2223523', 'Data Structures and Algorithms', 'CSCA 411', 3, '9.00', '87.00', 'B+', 1, '2024-05-25 00:02:11'),
(32, '2223523', 'Object Oriented Programming', 'CSCA 412', 3, '8.00', '89.00', 'B+', 1, '2024-05-25 00:02:11'),
(33, '2223523', 'Database Management Systems', 'CSCA 413', 3, '9.00', '87.00', 'B+', 1, '2024-05-25 00:02:11'),
(34, '2223523', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '9.00', '89.00', 'B+', 1, '2024-05-25 00:02:11'),
(35, '2223523', 'Object Oriented Programming Lab', 'CSCA 415', 2, '8.00', '98.00', 'B+', 1, '2024-05-25 00:02:11'),
(36, '2223523', 'Database Management Systems Lab', 'CSCA 416', 2, '9.00', '76.00', 'A', 1, '2024-05-25 00:02:11'),
(55, '22352018', 'Data Structures and Algorithms', 'CSCA 411', 3, '8.00', '88.00', 'A+', 1, '2024-05-26 07:51:27'),
(56, '22352018', 'Object Oriented Programming', 'CSCA 412', 3, '7.00', '77.00', 'A', 1, '2024-05-26 07:51:27'),
(57, '22352018', 'Database Management Systems', 'CSCA 413', 3, '9.00', '94.00', 'A+', 1, '2024-05-26 07:51:27'),
(58, '22352018', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '10.00', '100.00', 'O', 1, '2024-05-26 07:51:27'),
(59, '22352018', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '97.00', 'O', 1, '2024-05-26 07:51:27'),
(66, '22352018', 'Database Management Systems Lab', 'CSCA 416', 2, '10.00', '100.00', 'O', 1, '2024-05-26 07:51:27'),
(67, '18', 'Data Structures and Algorithms', 'CSCA 411', 3, '8.00', '88.00', 'A+', 1, '2024-05-26 07:58:58'),
(68, '18', 'Object Oriented Programming', 'CSCA 412', 3, '8.00', '88.00', 'A+', 1, '2024-05-26 07:58:58'),
(69, '18', 'Database Management Systems', 'CSCA 413', 3, '7.00', '77.00', 'A', 1, '2024-05-26 07:58:58'),
(70, '18', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '10.00', '100.00', 'O', 1, '2024-05-26 07:58:58'),
(71, '18', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '98.00', 'A+', 1, '2024-05-26 07:58:58'),
(72, '18', 'Database Management Systems Lab', 'CSCA 416', 2, '10.00', '100.00', 'O', 1, '2024-05-26 07:58:58'),
(79, '63', 'Data Structures and Algorithms', 'CSCA 411', 3, '7.99', '78.00', 'P', 1, '2024-05-28 06:04:07'),
(80, '63', 'Object Oriented Programming', 'CSCA 412', 3, '9.00', '67.00', 'A+', 1, '2024-05-28 06:04:07'),
(81, '63', 'Database Management Systems', 'CSCA 413', 3, '6.00', '67.00', 'A', 1, '2024-05-28 06:04:07'),
(82, '63', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '7.00', '67.00', 'A+', 1, '2024-05-28 06:04:07'),
(83, '63', 'Object Oriented Programming Lab', 'CSCA 415', 2, '8.00', '67.00', '', 1, '2024-05-28 06:04:07'),
(84, '63', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '89.00', 'B', 1, '2024-05-28 06:04:07'),
(85, '63', 'Data Structures and Algorithms', 'CSCA 411', 3, '7.99', '78.00', 'P', 1, '2024-05-28 06:04:07'),
(86, '63', 'Object Oriented Programming', 'CSCA 412', 3, '9.00', '67.00', 'A+', 1, '2024-05-28 06:04:07'),
(87, '63', 'Database Management Systems', 'CSCA 413', 3, '6.00', '67.00', 'A', 1, '2024-05-28 06:04:07'),
(88, '63', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '7.00', '67.00', 'A+', 1, '2024-05-28 06:04:07'),
(89, '63', 'Object Oriented Programming Lab', 'CSCA 415', 2, '8.00', '67.00', '', 1, '2024-05-28 06:04:07'),
(90, '63', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '89.00', 'B', 1, '2024-05-28 06:04:07'),
(91, 'mogamaya', 'Data Structures and Algorithms', 'CSCA 411', 3, '7.00', '67.00', 'B+', 1, '2024-05-28 06:09:45'),
(92, 'mogamaya', 'Object Oriented Programming', 'CSCA 412', 3, '6.00', '65.00', 'A+', 1, '2024-05-28 06:09:45'),
(93, 'mogamaya', 'Database Management Systems', 'CSCA 413', 3, '8.00', '67.00', 'A+', 1, '2024-05-28 06:09:45'),
(94, 'mogamaya', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '6.00', '67.00', 'A', 1, '2024-05-28 06:09:45'),
(95, 'mogamaya', 'Object Oriented Programming Lab', 'CSCA 415', 2, '6.00', '56.00', 'A', 1, '2024-05-28 06:09:45'),
(96, 'mogamaya', 'Database Management Systems Lab', 'CSCA 416', 2, '6.00', '56.00', 'A+', 1, '2024-05-28 06:09:45'),
(97, 'mogamaya', 'Data Structures and Algorithms', 'CSCA 411', 3, '7.00', '67.00', 'B+', 1, '2024-05-28 06:09:45'),
(98, 'mogamaya', 'Object Oriented Programming', 'CSCA 412', 3, '6.00', '65.00', 'A+', 1, '2024-05-28 06:09:45'),
(99, 'mogamaya', 'Database Management Systems', 'CSCA 413', 3, '8.00', '67.00', 'A+', 1, '2024-05-28 06:09:45'),
(100, 'mogamaya', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '6.00', '67.00', 'A', 1, '2024-05-28 06:09:45'),
(101, 'mogamaya', 'Object Oriented Programming Lab', 'CSCA 415', 2, '6.00', '56.00', 'A', 1, '2024-05-28 06:09:45'),
(102, 'mogamaya', 'Database Management Systems Lab', 'CSCA 416', 2, '6.00', '56.00', 'A+', 1, '2024-05-28 06:09:45'),
(103, '22352037', 'Data Structures and Algorithms', 'CSCA 411', 3, '6.00', '56.00', 'C', 1, '2024-05-28 06:16:16'),
(104, '22352037', 'Object Oriented Programming', 'CSCA 412', 3, '5.00', '65.00', 'A', 1, '2024-05-28 06:16:16'),
(105, '22352037', 'Database Management Systems', 'CSCA 413', 3, '6.00', '67.00', 'B+', 1, '2024-05-28 06:16:16'),
(106, '22352037', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '8.00', '67.00', 'A', 1, '2024-05-28 06:16:16'),
(107, '22352037', 'Object Oriented Programming Lab', 'CSCA 415', 2, '8.00', '78.00', 'B+', 1, '2024-05-28 06:16:16'),
(108, '22352037', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '76.00', 'B+', 1, '2024-05-28 06:16:16'),
(109, '22352037', 'Data Structures and Algorithms', 'CSCA 411', 3, '6.00', '56.00', 'C', 1, '2024-05-28 06:16:16'),
(110, '22352037', 'Object Oriented Programming', 'CSCA 412', 3, '5.00', '65.00', 'A', 1, '2024-05-28 06:16:16'),
(111, '22352037', 'Database Management Systems', 'CSCA 413', 3, '6.00', '67.00', 'B+', 1, '2024-05-28 06:16:16'),
(112, '22352037', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '8.00', '67.00', 'A', 1, '2024-05-28 06:16:16'),
(113, '22352037', 'Object Oriented Programming Lab', 'CSCA 415', 2, '8.00', '78.00', 'B+', 1, '2024-05-28 06:16:16'),
(114, '22352037', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '76.00', 'B+', 1, '2024-05-28 06:16:16'),
(115, '22352078', 'Data Structures and Algorithms', 'CSCA 411', 3, '3.00', '89.00', 'B', 1, '2024-05-28 06:25:19'),
(116, '22352078', 'Object Oriented Programming', 'CSCA 412', 3, '9.00', '90.00', 'A+', 1, '2024-05-28 06:25:19'),
(117, '22352078', 'Database Management Systems', 'CSCA 413', 3, '9.00', '89.00', 'A+', 1, '2024-05-28 06:25:19'),
(118, '22352078', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '9.00', '89.00', 'B+', 1, '2024-05-28 06:25:19'),
(119, '22352078', 'Object Oriented Programming Lab', 'CSCA 415', 2, '9.00', '89.00', 'O', 1, '2024-05-28 06:25:19'),
(120, '22352078', 'Database Management Systems Lab', 'CSCA 416', 2, '9.00', '89.00', 'B+', 1, '2024-05-28 06:25:19'),
(121, '22352058', 'Data Structures and Algorithms', 'CSCA 411', 3, '8.00', '65.00', 'A', 1, '2024-05-28 06:31:23'),
(122, '22352058', 'Object Oriented Programming', 'CSCA 412', 3, '6.00', '65.00', 'B', 1, '2024-05-28 06:31:23'),
(123, '22352058', 'Database Management Systems', 'CSCA 413', 3, '8.00', '76.00', 'B', 1, '2024-05-28 06:31:23'),
(124, '22352058', 'Data Structures and Algorithms Lab', 'CSCA 414', 2, '7.00', '65.00', 'B', 1, '2024-05-28 06:31:23'),
(125, '22352058', 'Object Oriented Programming Lab', 'CSCA 415', 2, '7.00', '67.00', 'A', 1, '2024-05-28 06:31:23'),
(126, '22352058', 'Database Management Systems Lab', 'CSCA 416', 2, '7.00', '78.00', 'A', 1, '2024-05-28 06:31:23');

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
('18', 'Gd', '2002-04-22', '2024', 'cs', 'mca'),
('2223523', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('222352303', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2223523038', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2235', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('22352018', 'Dheepan G', '2002-04-22', '2024', 'cs', 'mca'),
('22352037', 'mogamaya', '2024-05-07', '2024', 'mca', 'cs'),
('22352058', 'santhosh', '2024-05-01', '2024', 'mca', 'cs'),
('22352078', 'udhay', '2024-05-07', '2024', 'mca', 'cs'),
('2235254', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('223566', 'mala', '2024-05-03', '2024', 'cs', 'mca'),
('223568', 'Monika', '2024-03-07', '2024', 'cs', 'gg'),
('24', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('244', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('2876', 'Monika', '2024-05-18', '2023', 'cs', 'mca'),
('38928', 'udhayakumar', '2024-05-17', '2024', 'cs', 'mca'),
('38928783', 'udhay', '2024-05-17', '2024', 'cs', 'mca'),
('63', 'Siva', '2001-10-20', '2024', 'cs', 'mca'),
('75', 'archu', '2024-02-16', '2024', 'cs', 'mca'),
('765764', 'maya', '2024-05-12', '2024', 'cs', 'mca'),
('873983', 'hemachandran', '2024-05-09', '2024', 'cs', 'mca'),
('89798', 'Monika', '2024-05-11', '2024', 'cs', 'mca'),
('90', 'archu', '2024-02-16', '2024', 'cs', 'mca'),
('mogamaya', '22352037', '2024-05-07', '2024', 'mca', 'cs');

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
('CSCA411', 'Data Structures and Algorithms', 3, 'H'),
('CSCA412', 'Object Oriented Programming', 3, 'H'),
('CSCA413', 'Database Management Systems', 3, 'H'),
('CSCA414', 'Data Structures and Algorithms Lab', 2, 'H'),
('CSCA415', 'Object Oriented Programming Lab', 2, 'H'),
('CSCA416', 'Database Management Systems Lab', 2, 'H'),
('CSCA421', 'Computer Networks', 3, 'H'),
('CSCA422', 'Operating Systems', 3, 'H'),
('CSCA423', 'Communication Skills', 2, 'H'),
('CSCA424', 'Computer Networks Lab', 2, 'H'),
('CSCA425', 'Operating Systems Lab', 2, 'H'),
('CSCA431', 'Mathematics for Computer Science', 3, 'H'),
('CSCA432', 'Management Concepts and Strategies', 3, 'S'),
('CSCA511', 'Software Engineering', 3, 'H'),
('CSCA512', 'Internet and Web Technologies', 3, 'H'),
('CSCA513', 'Mini Project', 2, 'H'),
('CSCA514', 'Internet and Web Technologies Lab', 2, 'H'),
('CSCA515', 'Academic Out-Reach Programme', 1, 'H'),
('CSCA521', 'Project Work', 4, 'H'),
('CSCA522', 'Project Seminar', 4, 'H'),
('CSCA523', 'Project Report and Viva-voce', 4, 'H'),
('CSCA524', 'Compulsory Subject Name', 3, 'H'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `core_subjects`
--
ALTER TABLE `core_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
