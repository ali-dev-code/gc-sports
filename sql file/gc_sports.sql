-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 12:58 PM
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
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`, `image`, `details`) VALUES
(10, 'Badminton', 'sport_bedminton.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo assumenda, placeat porro alias quos vitae odit et sapiente! Ut eveniet repellendus impedit blanditiis sequi, sint exercitationem laboriosam quas velit'),
(11, 'Hockey', 'sport_hockey.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo assumenda, placeat porro alias quos vitae odit et sapiente! Ut eveniet repellendus impedit blanditiis sequi, sint exercitationem laboriosam quas velit'),
(12, 'Volleyball', 'sport_volleyball.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo assumenda, placeat porro alias quos vitae odit et sapiente! Ut eveniet repellendus impedit blanditiis sequi, sint exercitationem laboriosam quas velit'),
(13, 'Basketball', 'sport_basketball.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo assumenda, placeat porro alias quos vitae odit et sapiente! Ut eveniet repellendus impedit blanditiis sequi, sint exercitationem laboriosam quas velit'),
(14, 'Football', 'sport_football.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo assumenda, placeat porro alias quos vitae odit et sapiente! Ut eveniet repellendus impedit blanditiis sequi, sint exercitationem laboriosam quas velit'),
(15, 'Cricket', 'sport_cricket.jpg', 'heloo');

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
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `details`, `short_details`, `image`, `password`, `phone`, `email`, `sport_id`) VALUES
(11, 'Mr. Nabeel Haider', 'COACH , Badminton', 'GC University', 'coach_bedminton.jpg', '123456', '03111111111', 'example1@gmail.com', 10),
(12, 'Mr. Afaaq', 'COACH , Hockey', 'GC University', 'coach_hockey.jpg', '123456', '03111111111', 'example2@gmail.com', 11),
(13, 'Mr. Umer ', 'COACH , Volley Ball', 'GC University', 'coach_volley_ball.jpg', '123456', '03111111111', 'example3@gmail.com', 12),
(14, 'Mr. Ali', 'COACH , Footbal', 'GC University', 'coach_foootball.jpg', '123456', '123456', 'example4@gmail.com', 14),
(17, 'Mr. Saqlain ALi', 'COACH , Cricket', 'GC University', 'coach_cricket.jpg', '123456', '03111111111', 'example5@gmail.com', 15),
(18, 'Mr. Abid Ali ', 'COACH , Basket Ball', 'GC University', 'coach_backet_ball.jpg', '123456', '123456', 'example6@gmail.com', 13);

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
  `status` text DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_enroll`
--

INSERT INTO `teacher_enroll` (`id`, `student_name`, `student_email`, `teacher`, `sport`, `status`, `teacher_id`, `user_id`, `sport_id`) VALUES
(15, 'ali hassan', 'alihassan@gmail.com', 'Mr. Nabeel Haider', 'Badminton', 'it is my pleasure to inform you that our today practice timing is 4 pm', 11, 4, 10),
(17, 'ali hassan', 'alihassan@gmail.com', 'Mr. Ali ', 'Football ', 'it is my pleasure to inform you that our matches will start form next Monday!', 14, 4, 14),
(18, 'Hassan Raza', 'hassanraza@hotmail.com', 'Mr. Nabeel Haider ', 'Badminton ', 'it is my pleasure to inform you that our today practice timing is 4 pm', 11, 5, 10),
(19, 'Hassan Raza', 'hassanraza@hotmail.com', 'Mr. Saqlain ALi ', 'Cricket ', NULL, 17, 5, 15),
(20, 'Ali Asghar', 'aliasgr216@gmail.com', 'Mr. Ali', 'Football', 'it is my pleasure to inform you that our matches will start form next Monday!', 14, 6, 14),
(21, 'Ali Asghar', 'aliasgr216@gmail.com', 'Mr. Abid Ali  ', 'Basketball ', NULL, 18, 6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_sports`
--

CREATE TABLE `upcoming_sports` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `days_left` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_sports`
--

INSERT INTO `upcoming_sports` (`id`, `image`, `sport_name`, `details`, `date`, `days_left`) VALUES
(1, 'sport_cricket.jpg', 'Cricket', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'October 23', '10 days left'),
(2, 'sport_football.jpg', 'Football', 'Lorem ipsum dolor sit amet, consectetur adipisicin..', 'October 23', '10 days left'),
(3, 'sport_bedminton.jpg', 'Badminton', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'October 23', '10 days left'),
(4, 'sport_basketball.jpg', 'Basketball', 'December 23', 'December 23', '4 days left'),
(5, 'sport_hockey.jpg', 'Hockey', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'January 26', '5 days left'),
(6, 'sport_volleyball.jpg', 'Volleyball', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'April 14', '8 days left');

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
(4, 'ali hassan', 'alihassan@gmail.com', ' 4763927', 1, '123456'),
(5, 'Hassan Raza', 'hassanraza@hotmail.com', '123456', 1, '123456'),
(6, 'Ali Asghar', 'aliasgr216@gmail.com', ' 123456', 1, '123456');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indexes for table `teacher_enroll`
--
ALTER TABLE `teacher_enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indexes for table `upcoming_sports`
--
ALTER TABLE `upcoming_sports`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher_enroll`
--
ALTER TABLE `teacher_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `upcoming_sports`
--
ALTER TABLE `upcoming_sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_enroll`
--
ALTER TABLE `teacher_enroll`
  ADD CONSTRAINT `teacher_enroll_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_enroll_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_enroll_ibfk_3` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
