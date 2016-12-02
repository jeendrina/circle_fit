-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 02:52 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circle_fit`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `name`, `description`, `user_id`, `status`) VALUES
(1, 'Activity 1', 'Strength Training', 1, 'Active'),
(2, 'Activity 2', 'Pilates', 2, 'Active'),
(3, 'Activity 3', 'Yoga', 0, 'active'),
(4, 'Activity 4', 'Running', 0, 'deleted'),
(5, 'q', 'q', 0, 'deleted'),
(6, 'Activity 4', 'Kick Boxing', 0, 'active'),
(7, 'Activity 7', 'vhhfvh', 0, 'active'),
(8, 'edgbwrnbhwetyhnb', 'wrnbtynwtyntnwt', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `activities_alt`
--

CREATE TABLE `activities_alt` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities_alt`
--

INSERT INTO `activities_alt` (`activity_id`, `name`, `description`, `user_id`, `status`) VALUES
(1, 'Activity 1', 'Weight Lifting', 1, 'deleted'),
(2, 'Activity 2', 'Aerobics', 1, 'deleted'),
(3, 'Activity 3', 'Pilates', 1, 'deleted'),
(4, 'Activity 4', 'rtun', 0, 'deleted'),
(5, 'Activity 4', 'Yoga', 0, 'active'),
(6, 'Activity 5', 'Boxing Class', 0, 'active'),
(7, 'Activity jhn', 'kjoim', 0, 'deleted'),
(8, 'vsdvsdfvbfd', 'dvcsxv', 0, 'deleted'),
(9, 'DS', 'DSV', 0, 'deleted'),
(10, 'Activity 11111', 'a cool one', 0, 'deleted'),
(11, 'Activity 1', 'mennnn', 0, 'deleted'),
(12, 'zdfhgsdfh', 'sdhsrthnsrtnj', 0, 'active'),
(13, 'fsdvf', 'cx ', 0, 'active'),
(14, 'Activity 333', '123dcba', 0, 'active'),
(15, 'Activity 333', '123dcba', 0, 'deleted'),
(16, '1', '2', 0, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `booking_date`, `status`, `user_id`, `activity_id`) VALUES
(1, '2016-11-01 00:00:00', 'active', 1, 1),
(2, '2016-11-11 00:00:00', 'pending', 2, 2),
(3, '2016-11-14 00:00:00', 'pending', 3, 3),
(4, '2016-12-01 00:00:00', 'pending', 4, 4),
(5, '2016-12-01 00:00:00', 'pending', 1, 0),
(8, '2016-12-02 00:00:00', 'pending', 0, 0),
(9, '2016-12-02 00:00:00', 'pending', 0, 0),
(10, '2016-12-03 00:00:00', 'pending', 0, 0),
(11, '2016-12-02 00:00:00', 'pending', 0, 0),
(12, '2016-12-08 00:00:00', 'pending', 0, 0),
(13, '2016-12-28 00:00:00', 'pending', 0, 0),
(14, '2016-12-02 00:00:00', 'pending', 0, 0),
(15, '2016-12-03 00:00:00', 'pending', 0, 0),
(16, '2016-12-06 00:00:00', 'pending', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, 'Phil ', 'Heat', 'philheat@email.com', 'password123', ''),
(2, 'Zyzz ', 'Brah', 'zyzzbrah@email.com', 'password123', ''),
(3, 'Jeff ', 'Seid', '', '', ''),
(4, 'Page', 'Hathaway', '', '', 'deleted'),
(5, 'bruh', '123', 'boo@email.com', 'password123', 'active'),
(6, 'Jeremy ', 'Buendia', '', '', 'deleted'),
(7, 'Vicky', 'Smith', '', '', 'active'),
(8, 'Vicky', 'dada', '', '', 'active'),
(9, 'james', 'boo', '', '', 'active'),
(10, 'ADD', 'ASD', '', '', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `activities_alt`
--
ALTER TABLE `activities_alt`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id_index` (`user_id`),
  ADD KEY `status_index` (`status`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `class_date_index` (`booking_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `status` (`status`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `activities_alt`
--
ALTER TABLE `activities_alt`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
