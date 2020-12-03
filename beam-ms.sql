-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2020 at 07:03 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beam-ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `teacher` int NOT NULL,
  `time` text COLLATE utf8_czech_ci NOT NULL,
  `avg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `id_class` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Elearning`
--

CREATE TABLE `Elearning` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `content` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int NOT NULL,
  `time` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `question` text COLLATE utf8_czech_ci NOT NULL,
  `correct_answer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homeworks_user`
--

CREATE TABLE `homeworks_user` (
  `id_home` int NOT NULL,
  `id_user` int NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `in_time` tinyint(1) NOT NULL DEFAULT '0',
  `answer` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int NOT NULL,
  `time` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `question` text COLLATE utf8_czech_ci NOT NULL,
  `correct_answer` text COLLATE utf8_czech_ci NOT NULL,
  `answer` text COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_usr`
--

CREATE TABLE `test_usr` (
  `id_user` int NOT NULL,
  `id_test` int NOT NULL,
  `completed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answers` text COLLATE utf8_czech_ci NOT NULL,
  `mark` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `auth` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pwd`, `email`, `role`, `auth`) VALUES
(7, 'merlin', '$2y$10$fAHlk4bnPSfgcp7OnQmnYeDMCr3D.d1RL9xs5wdl2xVNalyLPysYe', 'stekrt18@gmail.com', 1, 0),
(8, 'merlin', '$2y$10$bauciy0D64EsrdWRS6XNkuhq3hItdJ/uwN79D.V02lE3CJM8odkiy', 'stekrt18@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `Elearning`
--
ALTER TABLE `Elearning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeworks_user`
--
ALTER TABLE `homeworks_user`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_home` (`id_home`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_usr`
--
ALTER TABLE `test_usr`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_test` (`id_test`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Elearning`
--
ALTER TABLE `Elearning`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `id_class` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `Elearning`
--
ALTER TABLE `Elearning`
  ADD CONSTRAINT `id_user2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `homeworks_user`
--
ALTER TABLE `homeworks_user`
  ADD CONSTRAINT `id_home` FOREIGN KEY (`id_home`) REFERENCES `homeworks` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_user3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `test_usr`
--
ALTER TABLE `test_usr`
  ADD CONSTRAINT `id_test` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_usr` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
