-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2025 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `teams`;
DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `team_users`;
SET FOREIGN_KEY_CHECKS = 1;

--
-- Database: `apprise_db`
--
CREATE DATABASE IF NOT EXISTS `apprise_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `apprise_db`;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--


CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `documentation_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('Finished','In Progress','On Hold','Abandoned') NOT NULL DEFAULT 'In Progress',
  `due_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

REPLACE INTO `projects` (`project_id`, `project_name`, `description`, `documentation_link`, `created_at`, `status`, `due_date`, `updated_at`, `team_id`) VALUES
(1, 'Apprise Website', 'Apprise Website', 'https://github.com/Endaashdw/Apprise.git', '2025-10-15 16:02:38', 'In Progress', '2025-11-02 20:07:13', '2025-11-02 16:02:38', 1),
(2, 'GAME PROG', 'dummy text', 'http://localhost/phpmyadmin/', '2025-11-02 17:43:58', 'In Progress', '2025-11-02 20:07:13', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--


CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `task_status` enum('Incomplete','For Review','Completed','Not Started','On Hold') NOT NULL,
  `due_date` datetime DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

REPLACE INTO `tasks` (`task_id`, `task_name`, `description`, `category`, `task_status`, `due_date`, `project_id`, `user_id`) VALUES
(2, 'Remind to work', 'Remind to work on game programming', NULL, 'For Review', '2025-11-02 20:30:45', 2, 26),
(7, 'Traversal', 'Traversal between spawns', 'PROGRAMMING', 'Not Started', '2025-11-03 00:00:00', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--


CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

REPLACE INTO `teams` (`team_id`, `team_name`, `description`, `created_at`) VALUES
(1, 'Apprise', 'Apprise Developers of USLS', '2025-10-27 21:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `team_users`
--


CREATE TABLE `team_users` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_users`
--

REPLACE INTO `team_users` (`team_id`, `user_id`, `role`) VALUES
(1, 26, 'PROGRAMMING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

REPLACE INTO `users` (`user_id`, `name`, `email`, `username`, `user_password`) VALUES
(26, 'Todd Howard', 'th@apprise.com', 'ToddHoward', '$2y$10$cYwLK7KcZtk0GhkTK.mgWO4b4RocDrLrqvd6NRkpGnH5p0RtPf7nm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_users`
--
ALTER TABLE `team_users`
  ADD PRIMARY KEY (`team_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `team_users`
--
ALTER TABLE `team_users`
  ADD CONSTRAINT `team_users_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
