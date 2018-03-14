-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 02:11 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt3_group_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `intervals`
--

CREATE TABLE `intervals` (
  `interval_id` int(11) NOT NULL,
  `interval_name` varchar(100) DEFAULT NULL,
  `interval_description` varchar(255) DEFAULT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `interval_color` varchar(50) DEFAULT NULL,
  `fk_media_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intervals`
--

INSERT INTO `intervals` (`interval_id`, `interval_name`, `interval_description`, `length`, `interval_color`, `fk_media_id`, `fk_user_id`) VALUES
(3, '70% power run fo sho', 'over 4k method 70% power run very very run', 120, NULL, 1, 7),
(4, '12312412124', '124124124124', 12312, 'asfasfs', NULL, 7),
(5, 'h', 'h', 20, '', NULL, 5),
(6, 'weer', 'wer', 123, 'black', NULL, 5),
(7, 'bl', 'bl', 45, 'bl', NULL, 5),
(8, 'aa', 'aa', 21, '', NULL, 5),
(9, 'aaaaaaaa', 'aaaaaaaaaa', 12, '', NULL, 5),
(10, '3', '2', 2, '2', NULL, 5),
(11, 'what', 'what', 120, '2', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `interval_media`
--

CREATE TABLE `interval_media` (
  `fk_interval_id` int(11) NOT NULL,
  `fk_media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interval_tags`
--

CREATE TABLE `interval_tags` (
  `fk_tag_id` int(11) NOT NULL,
  `fk_interval_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `src` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `set_id` int(11) NOT NULL,
  `set_name` varchar(50) DEFAULT NULL,
  `set_description` varchar(255) DEFAULT NULL,
  `set_color` varchar(60) DEFAULT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`set_id`, `set_name`, `set_description`, `set_color`, `fk_user_id`) VALUES
(2, 'weight training', 'super ez', '#414af4', 4),
(13, 'asdasgfasfas', 'gadgdfgdf', NULL, 6),
(14, 'gdfgdfg', 'gdfgdf', NULL, 6),
(15, 'asdfafa', '123', NULL, 7),
(16, 'l;hkj', 'hjkhjk', NULL, 5),
(17, 'asdadasd', 'asdsadasd', NULL, 5),
(18, '234', 'ggff', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sets_intervals`
--

CREATE TABLE `sets_intervals` (
  `fk_set_id` int(11) NOT NULL,
  `fk_interval_id` int(11) NOT NULL,
  `order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sets_intervals`
--

INSERT INTO `sets_intervals` (`fk_set_id`, `fk_interval_id`, `order`) VALUES
(13, 4, 1),
(18, 6, 1),
(18, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `set_tags`
--

CREATE TABLE `set_tags` (
  `fk_tag_id` int(11) NOT NULL,
  `fk_set_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'mohammed', 'mohammed@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'martin', 'martin@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(4, 'primoz2', 'primoz@gmail.com', ''),
(5, 'lorand', 'lorand.kovacs@gmail.com', '8ce1cfd564cd2a254cfd15d52a99b9d1b56296f0fb705aa860def6de0966d017'),
(6, 'lorand', 'lorand.kovacs024@gmail.com', '8ce1cfd564cd2a254cfd15d52a99b9d1b56296f0fb705aa860def6de0966d017'),
(7, 'primoz', 'pri@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(8, 'david', 'david@gmail.com', '1411242b2139f9fa57a802e1dc172e3e1ca7655ac2d06d83b22958951072261b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intervals`
--
ALTER TABLE `intervals`
  ADD PRIMARY KEY (`interval_id`),
  ADD KEY `fk_media_id` (`fk_media_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `interval_media`
--
ALTER TABLE `interval_media`
  ADD KEY `fk_interval_id` (`fk_interval_id`),
  ADD KEY `fk_media_id` (`fk_media_id`);

--
-- Indexes for table `interval_tags`
--
ALTER TABLE `interval_tags`
  ADD KEY `fk_tag_id` (`fk_tag_id`),
  ADD KEY `fk_interval_id` (`fk_interval_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`set_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `sets_intervals`
--
ALTER TABLE `sets_intervals`
  ADD KEY `fk_set_id` (`fk_set_id`),
  ADD KEY `fk_interval_id` (`fk_interval_id`) USING BTREE;

--
-- Indexes for table `set_tags`
--
ALTER TABLE `set_tags`
  ADD KEY `fk_tag_id` (`fk_tag_id`),
  ADD KEY `fk_set_id` (`fk_set_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userEmail` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intervals`
--
ALTER TABLE `intervals`
  MODIFY `interval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intervals`
--
ALTER TABLE `intervals`
  ADD CONSTRAINT `intervals_ibfk_1` FOREIGN KEY (`fk_media_id`) REFERENCES `media` (`media_id`),
  ADD CONSTRAINT `intervals_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `interval_media`
--
ALTER TABLE `interval_media`
  ADD CONSTRAINT `interval_media_ibfk_1` FOREIGN KEY (`fk_interval_id`) REFERENCES `intervals` (`interval_id`),
  ADD CONSTRAINT `interval_media_ibfk_2` FOREIGN KEY (`fk_media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `interval_tags`
--
ALTER TABLE `interval_tags`
  ADD CONSTRAINT `interval_tags_ibfk_1` FOREIGN KEY (`fk_tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `interval_tags_ibfk_2` FOREIGN KEY (`fk_interval_id`) REFERENCES `intervals` (`interval_id`);

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `sets_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sets_intervals`
--
ALTER TABLE `sets_intervals`
  ADD CONSTRAINT `sets_intervals_ibfk_1` FOREIGN KEY (`fk_set_id`) REFERENCES `sets` (`set_id`),
  ADD CONSTRAINT `sets_intervals_ibfk_2` FOREIGN KEY (`fk_interval_id`) REFERENCES `intervals` (`interval_id`);

--
-- Constraints for table `set_tags`
--
ALTER TABLE `set_tags`
  ADD CONSTRAINT `set_tags_ibfk_1` FOREIGN KEY (`fk_tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `set_tags_ibfk_2` FOREIGN KEY (`fk_set_id`) REFERENCES `sets` (`set_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
