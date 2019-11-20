-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 02:37 PM
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
-- Database: `gc_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ali Asghar ', 'aliasgr216@gmail.com', 'aliyahoo');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(1, 'Cricket'),
(2, 'Football'),
(3, 'Hockey'),
(4, 'Volley Ball'),
(5, 'Bedminton'),
(6, 'BasketBall');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `short_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `details`, `short_details`, `image`, `sport`, `password`) VALUES
(1, 'Ahsan', 'COACH , Cricket', 'GC University', 'coach.jpg', 'cricket  ', '123456'),
(3, 'Imran Ali', 'COACH , Footbal', 'GC University', 'coach.jpg', 'Football  ', '123456'),
(4, 'Jabraan ALi', 'COACH , Hockey', 'GC University', 'coach.jpg', 'Hockey  ', '123456'),
(5, 'Aqeel Raza', 'COACH , Basket Ball', 'GC University', 'coach.jpg', 'BasketBall  ', '123456'),
(6, 'Asad Ali', 'COACH , Bedminton', 'GC University', 'coach.jpg', 'Bedminton  ', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_enroll`
--

CREATE TABLE `teacher_enroll` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_enroll`
--

INSERT INTO `teacher_enroll` (`id`, `student_name`, `student_email`, `teacher`, `sport`, `user_id`) VALUES
(1, 'ALI ASGHAR', 'aliasgharabcd@gmail.com', 'Imran Ali ', 'Football   ', 1),
(2, 'ALI ASGHAR', 'aliasgharabcd@gmail.com', 'Jabraan ALi ', 'Hockey   ', 1),
(3, 'taskeen haider', 'taskeenhaider514@gmail.com', 'Ahsan ', 'cricket   ', 2),
(4, 'taskeen haider', 'taskeenhaider514@gmail.com', 'Imran Ali ', 'Football   ', 2),
(5, 'jabraan', 'jabraan@gmail.com', 'Imran Ali ', 'Football   ', 3),
(6, 'jabraan', 'jabraan@gmail.com', 'Ahsan ', 'cricket   ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `reg`, `status`, `password`) VALUES
(1, 'ALI ASGHAR  ', 'aliasgharabcd@gmail.com', ' 4763927', 1, '123456'),
(2, 'taskeen haider', 'taskeenhaider514@gmail.com', ' 43763829', 1, '123456'),
(3, 'jabraan', 'jabraan@gmail.com', ' 123456', 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_enroll`
--
ALTER TABLE `teacher_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_enroll`
--
ALTER TABLE `teacher_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
