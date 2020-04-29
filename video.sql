-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 07:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `reply_id`, `user_id`, `video_id`, `body`, `created_at`) VALUES
(66, 0, 2, 18, 'virker du?', '2020-04-28 13:41:19'),
(117, 0, 2, 24, 'I think it is a Dwarf pygmy goby because it is so small', '2020-04-29 06:56:27'),
(118, 117, 3, 24, 'It might eventuelt just be a pygmy goby it is not that small', '2020-04-29 06:57:28'),
(119, 118, 2, 24, 'maybe?', '2020-04-29 06:57:46'),
(120, 0, 1, 24, 'I think it is a trout', '2020-04-29 06:58:14'),
(121, 119, 1, 24, 'Assad er min ven. Og du er en dum sild din smutsling basse bum bit uyts', '2020-04-29 06:58:43'),
(122, 121, 1, 24, 'asas', '2020-04-29 06:58:52'),
(123, 121, 1, 24, 'asdasd', '2020-04-29 06:58:56'),
(124, 123, 1, 24, 'asdasd', '2020-04-29 06:58:58'),
(125, 124, 1, 24, 'sadasda', '2020-04-29 06:59:01'),
(126, 125, 1, 24, 'asdasdasd', '2020-04-29 06:59:03'),
(127, 126, 1, 24, 'asdasdasd', '2020-04-29 06:59:06'),
(128, 127, 1, 24, 'asdasd', '2020-04-29 06:59:09'),
(129, 128, 1, 24, 'asdasdasd', '2020-04-29 06:59:13'),
(130, 129, 1, 24, 'asdasd', '2020-04-29 06:59:16'),
(131, 0, 2, 24, 'hey you are nice', '2020-04-29 07:28:16'),
(132, 131, 3, 24, 'Yes you are', '2020-04-29 07:28:38'),
(133, 0, 2, 26, 's', '2020-04-29 07:30:06'),
(134, 0, 2, 24, 'hej', '2020-04-29 11:27:57'),
(135, 134, 2, 24, 'hej', '2020-04-29 11:28:03'),
(136, 0, 2, 26, 'hej', '2020-04-29 15:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roi_id` int(11) NOT NULL,
  `classification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `video_id`, `user_id`, `roi_id`, `classification`) VALUES
(1, 26, 2, 0, 'Trout'),
(2, 26, 2, 0, 'Trout'),
(4, 26, 2, 0, '23'),
(5, 26, 2, 0, '2'),
(6, 26, 2, 0, 'trout'),
(7, 26, 2, 0, '44'),
(8, 26, 2, 0, '23'),
(9, 26, 2, 1, 'Trout'),
(10, 26, 2, 3, 'trout');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_videos`
--

CREATE TABLE `uploaded_videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `roiAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_videos`
--

INSERT INTO `uploaded_videos` (`id`, `name`, `url`, `time`, `roiAmount`) VALUES
(24, '2019-02-20_19-01-02to2019-02-20_19-01-13_1 (1).mp4', 'http://localhost/MiniProject/Uploaded/2019-02-20_19-01-02to2019-02-20_19-01-13_1 (1).mp4', '2020-04-29 06:54:21', 2),
(25, '2019-02-20_19-19-23to2019-02-20_19-19-40_1.mp4', 'http://localhost/MiniProject/Uploaded/2019-02-20_19-19-23to2019-02-20_19-19-40_1.mp4', '2020-04-29 06:54:32', 1),
(26, '2019-02-20_19-01-02to2019-02-20_19-01-13_1 (1).mp4', 'http://localhost/MiniProject/Uploaded/2019-02-20_19-01-02to2019-02-20_19-01-13_1 (1).mp4', '2020-04-29 06:54:52', 3),
(27, '2019-02-20_19-19-23to2019-02-20_19-19-40_1.mp4', 'http://localhost/MiniProject/Uploaded/2019-02-20_19-19-23to2019-02-20_19-19-40_1.mp4', '2020-04-29 06:55:07', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `ip`, `created_at`) VALUES
(1, '192.168.87.192', '2020-04-28 11:05:12'),
(2, '::1', '2020-04-28 11:05:17'),
(3, '192.168.87.138', '2020-04-28 15:03:06'),
(4, '192.168.87.181', '2020-04-28 15:03:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_videos`
--
ALTER TABLE `uploaded_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uploaded_videos`
--
ALTER TABLE `uploaded_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
