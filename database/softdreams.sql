-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 12:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softdreams`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(255) NOT NULL,
  `id_ticket` int(255) NOT NULL,
  `content` text NOT NULL,
  `created_by` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `id_ticket`, `content`, `created_by`, `created_at`) VALUES
(1, 3, 'Mauris aliquam massa risus', 0, '2019-07-26 15:58:55'),
(2, 3, 'Nam faucibus lacinia dictum', 1, '2019-07-26 15:59:13'),
(3, 4, 'Praesent tempus magna non nunc consequat, quis mollis nulla commodo. Curabitur metus nunc, cursus ut venenatis eget, pellentesque sed urna. ', 0, '2019-07-26 16:00:25'),
(4, 4, 'Praesent nisi neque, sodales id bibendum non.', 0, '2019-07-26 16:00:36'),
(5, 5, ' Quisque quis felis arcu. Vestibulum tempor ac diam eu congue. Praesent tempus magna non nunc consequat, quis mollis nulla commodo. ', 0, '2019-07-26 16:01:21'),
(6, 5, 'Sed fringilla lorem ut massa mollis suscipit. Fusce accumsan metus in sodales imperdiet.', 1, '2019-07-26 16:01:41'),
(7, 5, 'Sed fringilla lorem ut massa mollis suscipit. Fusce accumsan metus in sodales imperdiet.', 1, '2019-07-26 16:01:44'),
(12, 5, 'Nisl tincidunt eget nullam non nisi est sit amet facilisis. Turpis massa tincidunt dui ut ornare. ', 1, '2019-07-27 10:01:43'),
(13, 9, 'Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing.', 0, '2019-07-27 10:35:02'),
(14, 9, 'Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. Enim ut sem viverra aliquet eget sit amet.', 1, '2019-07-27 10:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(255) NOT NULL,
  `reference` varchar(7) NOT NULL,
  `department` varchar(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `reference`, `department`, `email`, `subject`, `message`, `created_at`, `status`) VALUES
(1, '8V-jZc4', '0', 'test@gmail.com', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at diam nisl. Suspendisse ullamcorper tincidunt metus, a dapibus sem rhoncus id. Nulla facilisi. Sed sodales sem vel elit fringilla ornare. Aenean consectetur lectus vitae erat dictum, vel dapibus augue sagittis. Nulla fringilla, dolor at facilisis semper, odio justo ultrices massa, nec pulvinar erat nisi ac turpis. Sed rutrum massa at nisi laoreet, vitae egestas diam fermentum.', '2019-07-26 15:54:48', 0),
(3, 'jK-dqTM', '1', 'test1@gmail.com', 'Donec ornare ex lorem', 'Donec ornare ex lorem, ut feugiat justo lacinia et. Aliquam erat volutpat. Ut risus quam, auctor nec velit vel, malesuada consectetur eros. Nam eros risus, convallis eu ex dapibus, rhoncus commodo arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. ', '2019-07-26 15:58:42', 0),
(4, 'Gf-QmpW', '0', 'test12@gmail.com', 'In eget ligula eu neque posuere', 'Aliquam erat volutpat. Nam faucibus lacinia dictum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque viverra porttitor leo, ut pretium quam gravida vel. Pellentesque ullamcorper hendrerit elit hendrerit convallis. In odio quam, euismod vitae massa vitae, dictum convallis metus. ', '2019-07-26 16:00:17', 1),
(5, 'Zj-sMvd', '', 'test123@gmail.com', ' Suspendisse potenti', ' Praesent tempus magna non nunc consequat, quis mollis nulla commodo. Curabitur metus nunc, cursus ut venenatis eget, pellentesque sed urna.', '2019-07-26 16:01:11', 0),
(6, 'bC-d5qX', '0', 'test12@gmail.com', 'Donec ornare ex lorem', 'Donec ornare ex lorem ornare ex lorem ornare ex lorem', '2019-07-27 09:30:39', 1),
(9, 'Is-n6Dc', '', 'test1@gmail.com', 'Lorem ipsum dolor sit amet', 'Quis enim lobortis scelerisque fermentum dui faucibus in. Tellus cras adipiscing enim eu turpis egestas pretium. Pellentesque id nibh tortor id aliquet lectus. Etiam non quam lacus suspendisse faucibus interdum. Proin libero nunc consequat interdum varius sit amet. Cras adipiscing enim eu turpis egestas pretium. Amet aliquam id diam maecenas. Hendrerit dolor magna eget est. Sed odio morbi quis commodo odio. ', '2019-07-27 10:34:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY` (`id_ticket`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
