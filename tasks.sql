-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 03:11 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machinetest`
--

-- --------------------------------------------------------


INSERT INTO `tasks` (`ID`, `task_name`, `duration`, `dependency`, `additional_days`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SRS_CREATION', 12, 'NULL', 0, 'Task can start without any lag', '2019-04-30 18:30:00', '2019-04-30 18:30:00'),
(2, 'WIREFRAMING', 12, '1START', 4, 'Task can onlyy start 4 days after dependency task started', '2019-04-30 18:30:00', '2019-04-30 18:30:00'),
(3, 'UX_DESIGNS', 12, '1END', 0, 'description', '2019-04-30 18:30:00', '2019-04-30 18:30:00'),
(4, 'UI_HTML', 12, '3START', 4, 'description', '2019-04-30 18:30:00', '2019-04-30 18:30:00'),
(5, 'ALGORITHM DESIGN', 12, '3END', 0, 'description', '2019-04-30 18:30:00', '2019-04-30 18:30:00'),
(6, 'CONCEPT_SIGNOFF', 3, '1END,2END,3END,4END,5END', 4, 'TASK dESCRIPTION', '2019-04-30 18:30:00', '2019-04-30 18:30:00');

--
-- Indexes for dumped tables
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;