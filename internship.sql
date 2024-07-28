-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `Challenges` varchar(255) NOT NULL,
  `Solutions` varchar(255) DEFAULT NULL,
  `Date_and_Time` date NOT NULL,
  `Images` varchar(2082) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `description`, `Challenges`, `Solutions`, `Date_and_Time`, `Images`, `student_id`, `institution_id`) VALUES
(1, 'nn', 'n', 'n', '2024-07-03', NULL, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `institution_id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `institution_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution_id`, `institution_name`, `address`, `institution_email`) VALUES
(1, 'Mbarara University of Science and Technology', 'Mbarara, P.O.Box 24', 'must@gmail.com'),
(2, 'Kabale UNiversity', 'Kabalee', 'info@kabale.com'),
(3, 'University of St Joseph', 'Mbarara', 'stjoseph@gmail.com'),
(4, 'Mubs', 'Nakawa', 'llee@mubs.ac.ug');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Student_level` varchar(45) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `student_email`, `Gender`, `Contact`, `Student_level`, `institution_id`, `Password`) VALUES
(13, 'Adriko Patricia', 'simo22@gmail.com', 'Male', '0705197700', 'Undergraduate', 1, '$2y$10$PYSOefTyHkZuhIXOxh3ALuHmuOQ.yUfdUUkJ.SJV/0yM1sXjmcIde');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_supervisor`
--

CREATE TABLE `student_has_supervisor` (
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `institution_email` varchar(255) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `name`, `institution_email`, `Contact`, `institution_id`, `Password`, `Gender`) VALUES
(1, 'Patty', 'patty@gmail.com', '0706793388', 1, '$2y$10$PYSOefTyHkZuhIXOxh3ALuHmuOQ.yUfdUUkJ.SJV/0yM1sXjmcIde', NULL),
(2, 'Adriko Patricia', 'simo22@gmail.com', '0705197700', 1, '$2y$10$5hShhKyj3FEZXM.X/tXg9.KlZK6WuMwPfIw2QbJFuAPkLnMAGlmuO', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`) VALUES
(1, 'Admin', 'admin', 779555558, 'stan@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `User_name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `User_name`, `Email`, `Password`, `role_id`) VALUES
(0, 'admin', 'admin@gmail.com', '$2y$10$PYSOefTyHkZuhIXOxh3ALuHmuOQ.yUfdUUkJ.SJV/0yM1sXjmcIde', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`,`student_id`,`institution_id`),
  ADD KEY `fk_activity_student1_idx` (`student_id`,`institution_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institution_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `idRole_UNIQUE` (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`,`institution_id`),
  ADD UNIQUE KEY `student_email_UNIQUE` (`student_email`(191));

--
-- Indexes for table `student_has_supervisor`
--
ALTER TABLE `student_has_supervisor`
  ADD PRIMARY KEY (`student_id`,`supervisor_id`),
  ADD KEY `fk_student_has_supervisor_supervisor1_idx` (`supervisor_id`),
  ADD KEY `fk_student_has_supervisor_student1_idx` (`student_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`,`institution_id`),
  ADD KEY `fk_supervisor_institution1_idx` (`institution_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_users_Role_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `institution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_activity_student1` FOREIGN KEY (`student_id`,`institution_id`) REFERENCES `student` (`student_id`, `institution_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_institution1` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_has_supervisor`
--
ALTER TABLE `student_has_supervisor`
  ADD CONSTRAINT `fk_student_has_supervisor_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_supervisor_supervisor1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`supervisor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `fk_supervisor_institution1` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_Role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
