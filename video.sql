-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 12:09 PM
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
(136, 0, 2, 26, 'hej', '2020-04-29 15:00:13'),
(137, 0, 1, 25, 'hey', '2020-04-30 16:13:47'),
(138, 0, 1, 27, 'dsd', '2020-04-30 16:25:55'),
(139, 0, 2, 24, 'hej', '2020-05-01 10:41:54');

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
(1, 24, 2, 1, 'Trout'),
(2, 24, 2, 1, 'Trout'),
(3, 24, 2, 1, 'Salmon'),
(4, 24, 2, 1, 'Salmon'),
(5, 24, 2, 1, 'Salmon'),
(6, 24, 2, 1, 'Test'),
(7, 24, 2, 1, 'Test'),
(8, 24, 2, 1, 'Salmon'),
(9, 24, 2, 1, 'Hi'),
(10, 24, 2, 1, 'hi'),
(11, 24, 2, 1, 'Hi'),
(12, 24, 2, 1, 'Trout'),
(13, 24, 2, 1, 'Trout'),
(14, 24, 2, 1, 'Test'),
(15, 24, 2, 1, 'Salmon'),
(16, 24, 2, 1, 'Salmon'),
(17, 24, 2, 1, 'Salmon'),
(18, 24, 2, 1, 'Hi'),
(19, 24, 2, 1, 'Salmon'),
(20, 24, 2, 1, 'Morten'),
(21, 24, 1, 1, 'hi'),
(22, 24, 1, 1, 'hi'),
(23, 24, 2, 1, 'Test'),
(24, 24, 1, 1, 'hi'),
(25, 24, 2, 2, 'Hi'),
(26, 24, 1, 1, 'hi'),
(27, 24, 1, 1, 'hi'),
(28, 24, 2, 1, 'Test'),
(29, 24, 1, 1, 'hi'),
(30, 24, 1, 1, 'hi'),
(31, 24, 1, 1, 'hi'),
(32, 24, 1, 1, 'hi'),
(33, 24, 1, 1, 'hi'),
(34, 24, 1, 1, 'hi'),
(35, 24, 1, 1, 'hi'),
(36, 24, 1, 1, 'hi'),
(37, 24, 1, 1, 'hi'),
(38, 24, 1, 1, 'hi'),
(39, 24, 1, 1, 'hi'),
(40, 24, 1, 1, 'hi'),
(41, 24, 1, 1, 'hi'),
(42, 24, 1, 1, 'hi'),
(43, 24, 1, 1, 'hi'),
(44, 24, 1, 1, 'hi'),
(45, 24, 1, 1, 'hi'),
(46, 24, 1, 1, 'hi'),
(47, 24, 1, 1, 'hi'),
(48, 24, 1, 1, 'hi'),
(49, 24, 1, 1, 'hi'),
(50, 24, 1, 1, 'hi'),
(51, 24, 1, 1, 'hi'),
(52, 24, 1, 1, 'hi'),
(53, 24, 1, 1, 'hi'),
(54, 24, 1, 1, 'hi'),
(55, 24, 1, 1, 'hi'),
(56, 24, 1, 1, 'hi'),
(57, 24, 1, 1, 'hi'),
(58, 24, 2, 1, 'Test'),
(59, 24, 1, 1, 'hi'),
(60, 24, 2, 1, 'Hi'),
(61, 24, 2, 1, 'Hi'),
(62, 24, 2, 1, 'Hi'),
(63, 24, 2, 1, 'Hi'),
(64, 24, 2, 1, 'Hi'),
(65, 24, 1, 1, 'hi'),
(66, 24, 1, 1, 'hi'),
(67, 24, 2, 1, 'Hi'),
(68, 24, 1, 1, 'hi'),
(69, 24, 1, 1, 'hi'),
(70, 24, 1, 1, 'hi'),
(71, 24, 1, 1, 'hi'),
(72, 24, 1, 1, 'hi'),
(73, 24, 1, 1, 'hi'),
(74, 24, 1, 1, 'hi'),
(75, 24, 1, 1, 'hi'),
(76, 24, 1, 1, 'hi'),
(77, 24, 1, 1, 'hi'),
(78, 24, 1, 1, 'hi'),
(79, 24, 1, 1, 'hi'),
(80, 24, 1, 1, 'hi'),
(81, 24, 1, 1, 'hi'),
(82, 24, 1, 1, 'hi'),
(83, 24, 1, 1, 'hi'),
(84, 24, 1, 1, 'hi'),
(85, 24, 1, 1, 'hi'),
(86, 24, 1, 1, 'hi'),
(87, 24, 1, 1, 'hi'),
(88, 24, 1, 1, 'hi'),
(89, 24, 1, 1, 'hi'),
(90, 24, 1, 1, 'hi'),
(91, 24, 1, 1, 'hi'),
(92, 24, 1, 1, 'hi'),
(93, 24, 1, 1, 'hi'),
(94, 24, 1, 1, 'hi'),
(95, 24, 1, 1, 'hi'),
(96, 24, 1, 1, 'hi'),
(97, 24, 1, 1, 'hi'),
(98, 24, 1, 1, 'hi'),
(99, 24, 1, 1, 'hi'),
(100, 24, 1, 1, 'hi'),
(101, 24, 1, 1, 'hi'),
(102, 24, 1, 1, 'hi'),
(103, 24, 1, 1, 'hi'),
(104, 24, 1, 1, 'hi'),
(105, 24, 2, 1, 'Test'),
(106, 24, 2, 1, 'Test'),
(107, 24, 1, 1, 'hi'),
(108, 24, 1, 1, 'hi'),
(109, 24, 1, 1, 'hi'),
(110, 24, 1, 1, 'hi'),
(111, 24, 1, 1, 'hi'),
(112, 24, 1, 1, 'hi'),
(113, 24, 1, 1, 'hi'),
(114, 24, 1, 1, 'hi'),
(115, 24, 1, 1, 'hi'),
(116, 24, 1, 1, 'hi'),
(117, 24, 1, 1, 'hi'),
(118, 24, 1, 1, 'hi'),
(119, 24, 1, 1, 'hi'),
(120, 24, 2, 1, 'Test'),
(121, 24, 1, 1, 'hi'),
(122, 24, 1, 1, 'hi'),
(123, 24, 1, 1, 'hi'),
(124, 24, 1, 1, 'hi'),
(125, 24, 1, 1, 'hi'),
(126, 24, 1, 1, 'hi'),
(127, 24, 2, 1, 'Test'),
(128, 24, 1, 1, 'hi'),
(129, 24, 1, 1, 'hi'),
(130, 24, 1, 1, 'hi'),
(131, 24, 1, 1, 'hi'),
(132, 24, 1, 1, 'hi'),
(133, 24, 1, 1, 'hi'),
(134, 24, 1, 1, 'hi'),
(135, 24, 1, 1, 'hi'),
(136, 24, 1, 1, 'hi'),
(137, 24, 1, 1, 'hi'),
(138, 24, 2, 1, 'Test'),
(139, 24, 1, 1, 'hi'),
(140, 24, 1, 1, 'hi'),
(141, 24, 1, 1, 'hi'),
(142, 24, 1, 1, 'hi'),
(143, 24, 1, 1, 'hi'),
(144, 24, 1, 1, 'hi'),
(145, 24, 1, 1, 'hi'),
(146, 24, 1, 1, 'hi'),
(147, 24, 2, 1, 'Hi'),
(148, 24, 1, 1, 'hi'),
(149, 24, 1, 1, 'hi'),
(150, 24, 1, 1, 'hi'),
(151, 24, 1, 1, 'hi'),
(152, 24, 1, 1, 'hi'),
(153, 24, 1, 1, 'hi'),
(154, 24, 1, 1, 'hi'),
(155, 24, 1, 1, 'hi'),
(156, 24, 1, 1, 'hi'),
(157, 24, 1, 1, 'hi'),
(158, 24, 1, 1, 'hi'),
(159, 24, 1, 1, 'hi'),
(160, 24, 1, 1, 'hi'),
(161, 24, 1, 1, 'hi'),
(162, 24, 1, 1, 'hi'),
(163, 24, 1, 1, 'hi'),
(164, 24, 1, 1, 'hi'),
(165, 24, 1, 1, 'hi'),
(166, 24, 1, 1, 'hi'),
(167, 24, 1, 1, 'hi'),
(168, 24, 1, 1, 'hi'),
(169, 24, 1, 1, 'hi'),
(170, 24, 1, 1, 'hi'),
(171, 24, 1, 1, 'hi'),
(172, 24, 1, 1, 'hi'),
(173, 24, 1, 1, 'hi'),
(174, 24, 1, 1, 'hi'),
(175, 24, 1, 1, 'hi'),
(176, 24, 1, 1, 'hi'),
(177, 24, 1, 1, 'hi'),
(178, 24, 1, 1, 'hi'),
(179, 24, 1, 1, 'hi'),
(180, 24, 1, 1, 'hi'),
(181, 24, 1, 1, 'hi'),
(182, 24, 1, 1, 'hi'),
(183, 24, 1, 1, 'hi'),
(184, 24, 1, 1, 'hi'),
(185, 24, 1, 1, 'hi'),
(186, 24, 1, 1, 'hi'),
(187, 24, 1, 1, 'hi'),
(188, 24, 1, 1, 'hi'),
(189, 24, 1, 1, 'hi'),
(190, 24, 1, 1, 'hi'),
(191, 24, 1, 1, 'hi'),
(192, 24, 1, 1, 'hi'),
(193, 24, 1, 1, 'hi'),
(194, 24, 1, 1, 'hi'),
(195, 24, 1, 1, 'hi'),
(196, 24, 1, 1, 'hi'),
(197, 24, 1, 1, 'hi'),
(198, 24, 1, 1, 'Hi'),
(199, 24, 1, 1, 'hi'),
(200, 24, 1, 1, 'hi'),
(201, 24, 1, 1, 'hi'),
(202, 24, 1, 1, 'hi'),
(203, 24, 1, 1, 'hi'),
(204, 24, 2, 1, 'Morten'),
(205, 24, 1, 1, 'hi'),
(206, 24, 2, 1, 'hi'),
(207, 24, 2, 1, 'salmon'),
(208, 24, 1, 1, 'salmon'),
(209, 25, 1, 1, 'trt'),
(210, 24, 1, 1, 'hi'),
(211, 24, 1, 1, 'test'),
(212, 24, 1, 1, 'hi'),
(213, 24, 1, 1, 'test'),
(214, 24, 1, 1, 'hi'),
(215, 24, 1, 1, 'hi'),
(216, 24, 1, 1, 'hi'),
(217, 24, 1, 1, 'hi'),
(218, 24, 1, 1, 'hi'),
(219, 24, 1, 1, 'hi'),
(220, 24, 1, 1, 'hi'),
(221, 24, 1, 1, 'hi'),
(222, 24, 1, 1, 'hi'),
(223, 24, 1, 1, 'test'),
(224, 24, 1, 1, 'hi'),
(225, 24, 1, 1, 'test'),
(226, 24, 1, 1, 'trout'),
(227, 24, 1, 2, 'hi'),
(228, 25, 2, 1, 'trt'),
(229, 26, 2, 3, 'Other'),
(230, 27, 3, 1, 'Trout'),
(231, 27, 3, 1, 'Trout'),
(232, 27, 4, 1, 'herring'),
(233, 27, 4, 1, 'herring'),
(234, 27, 5, 1, 'garfish'),
(235, 27, 5, 1, 'garfish'),
(236, 27, 6, 1, 'mullet'),
(237, 27, 6, 1, 'mullet'),
(238, 24, 3, 1, 'trout'),
(239, 24, 4, 1, 'ret'),
(240, 25, 4, 1, 'trt'),
(241, 27, 2, 3, 'This is my suggestion'),
(242, 27, 1, 3, 'this is my suggestion'),
(243, 27, 2, 2, 'This is my suggestion'),
(244, 27, 2, 4, 'This is my suggestion'),
(245, 30, 2, 1, 'Salmon');

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
(29, 'Video1.mp4', 'http://localhost/MiniProject/Uploaded/Video1.mp4', '2020-05-01 15:51:38', 2),
(30, 'Video2.mp4', 'http://localhost/MiniProject/Uploaded/Video2.mp4', '2020-05-01 15:51:46', 2),
(31, 'Video3.mp4', 'http://localhost/MiniProject/Uploaded/Video3.mp4', '2020-05-01 15:51:50', 2),
(32, 'Video4.mp4', 'http://localhost/MiniProject/Uploaded/Video4.mp4', '2020-05-01 15:51:54', 3),
(33, 'Video5.mp4', 'http://localhost/MiniProject/Uploaded/Video5.mp4', '2020-05-01 15:51:59', 1);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `uploaded_videos`
--
ALTER TABLE `uploaded_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
