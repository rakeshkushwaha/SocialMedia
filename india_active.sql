-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 09:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `india_active`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_like_status`
--

CREATE TABLE `activity_like_status` (
  `activity_like_status_id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `status_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_chate`
--

CREATE TABLE `online_chate` (
  `chat_id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `message` varchar(225) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` varchar(225) NOT NULL,
  `post_id` varchar(225) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
('2', '18', 'like'),
('2', '19', 'like'),
('2', '20', 'like'),
('2', '21', 'like'),
('2', '4', 'like'),
('3', '10', 'like'),
('3', '4', 'like'),
('3', '5', 'like'),
('4', '23', 'like'),
('5', '10', 'like'),
('5', '23', 'like'),
('5', '24', 'like'),
('5', '4', 'like'),
('5', '5', 'like'),
('5', '6', 'like'),
('5', '7', 'like'),
('6', '4', 'like'),
('6', '5', 'like'),
('6', '6', 'like'),
('rak@gmail.com', '4', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `account_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `gender`, `date_of_birth`, `country`, `mobile`, `email`, `password`, `account_date`, `status`) VALUES
(2, 'rakesh', 'male', '2019-07-08', 'india', '7047842297', 'rak@gmail.com', '1234', '2019-07-07 04:56:07', '0'),
(3, 'rocky kushwaha', 'male', '2019-07-02', 'india', '7999597656', 'rockyshriram915@gmail.com', '123456', '2019-07-07 18:28:26', '0'),
(4, 'ankit', 'male', '2019-07-10', 'india', '8982181428', 'ankit@gmail.com', '1234', '2019-07-24 16:20:05', '0'),
(5, 'pooja', 'female', '2019-07-01', 'india', '7665223562', 'pooja12@gmail.com', '1234', '2019-07-24 16:26:01', '0'),
(6, 'yashika panday', 'female', '2019-03-12', 'india', '7775298653', 'yashika32@gmail.com', '1234', '2019-07-24 16:40:03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer_activity`
--

CREATE TABLE `user_answer_activity` (
  `id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `user_q_qctivity_id` int(11) NOT NULL,
  `user_image_activity` varchar(225) NOT NULL,
  `user_answer` varchar(1500) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_answer_activity`
--

INSERT INTO `user_answer_activity` (`id`, `user_id`, `user_q_qctivity_id`, `user_image_activity`, `user_answer`, `datetime`, `status_like`) VALUES
(3, 'rak@gmail.com', 5, '', 'hi this is text area', '2019-07-19 17:04:35', 0),
(23, 'pooja12@gmail.com', 13, '', 'Madara was never stronger than Hashirama but in the war he evolved so much by using hashirama cells and everything that he surpassed him.', '2019-08-09 04:58:53', 0),
(24, 'ankit@gmail.com', 14, '', 'It doesn\'t have one but if u will live for long may be u will find one', '2019-08-09 05:01:58', 0),
(25, 'rak@gmail.com', 13, '', 'hello', '2019-08-09 07:05:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_image_activity`
--

CREATE TABLE `user_image_activity` (
  `user_activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_activity` varchar(225) NOT NULL,
  `dcutime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image_activity`
--

INSERT INTO `user_image_activity` (`user_activity_id`, `user_id`, `image_activity`, `dcutime`) VALUES
(2, 0, '‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0,\0\0\0J\0\0\0§i†\0\0 \0IDATxœì½w¸%U•6þ®½wUsî½çÆÎ\rMé\Z%#A‰ÂàÓŸ¢€c\Zp>1| A‚ƒiÆ0ãˆŒ	EZ ›%w»›ÎÝ7ß+ìµ~TÕ9unè¾=ê|Ï7Ï}y.}ï9U»ÖNk¯õ®µwÑYwž1‚é@P¡œ{œrô*\0P-\0\0%—ÿ˜Ó[î#D²Ÿ(éP¤¯›Õ·è¦¶Bw`APÕa„ÁZ<þÔ	xb7', '2019-08-07 19:22:27'),
(3, 0, '‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0,\0\0\0J\0\0\0§i†\0\0 \0IDATxœì½w¸%U•6þ®½wUsî½çÆÎ\rMé\Z%#A‰ÂàÓŸ¢€c\Zp>1| A‚ƒiÆ0ãˆŒ	EZ ›%w»›ÎÝ7ß+ìµ~TÕ9unè¾=ê|Ï7Ï}y.}ï9U»ÖNk¯õ®µwÑYwž1‚é@P¡œ{œrô*\0P-\0\0%—ÿ˜Ó[î#D²Ÿ(éP¤¯›Õ·è¦¶Bw`APÕa„ÁZ<þÔ	xb7', '2019-08-07 19:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_profile_id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `cudate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_profile_id`, `user_id`, `image`, `cudate`) VALUES
(10, 'rak@gmail.com', 'IMG20190501185323.jpg', '2019-07-07 09:11:40'),
(11, 'rak@gmail.com', 'meera  kushwaha.png', '2019-07-07 09:51:45'),
(12, 'rak@gmail.com', 'Free_Sample_By_Wix (1).jpg', '2019-07-07 10:10:47'),
(13, 'rockyshriram915@gmail.com', 'Free_Sample_By_Wix.jpg', '2019-07-07 18:39:49'),
(14, 'ankit@gmail.com', 'global_connectivity.jpg', '2019-07-24 16:21:54'),
(15, 'ankit@gmail.com', 'IMG20190501185323.jpg', '2019-07-24 16:23:34'),
(16, 'pooja12@gmail.com', 'interconnected.jpg', '2019-07-24 16:26:37'),
(17, 'yashika32@gmail.com', 'user_icon.png', '2019-07-24 16:44:34'),
(18, 'pooja12@gmail.com', 'meera  kushwaha.png', '2019-08-09 05:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_qustion_activity`
--

CREATE TABLE `user_qustion_activity` (
  `user_activity_id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `user_qustion` varchar(225) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_qustion_activity`
--

INSERT INTO `user_qustion_activity` (`user_activity_id`, `user_id`, `user_qustion`, `date_time`) VALUES
(4, 'rockyshriram915@gmail.com', 'pm teke a new action for less then 15000 salry per month , so deposit 200 rupee per pension in account', '2019-07-07 18:58:59'),
(13, 'rak@gmail.com', 'was Madara really stronger than Hashirama in the Fourth Great ninja war?', '2019-08-09 04:56:17'),
(14, 'pooja12@gmail.com', 'What is the meaning of Life?\r\n', '2019-08-09 05:00:09'),
(15, 'rak@gmail.com', '', '2019-08-09 06:58:32'),
(16, 'rak@gmail.com', 'hello jabalpur', '2019-08-09 07:00:38'),
(17, 'rak@gmail.com', 'hello jabalpur', '2019-08-09 07:01:37'),
(18, 'rak@gmail.com', 'hello jabalpur', '2019-08-09 07:06:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_like_status`
--
ALTER TABLE `activity_like_status`
  ADD PRIMARY KEY (`activity_like_status_id`);

--
-- Indexes for table `online_chate`
--
ALTER TABLE `online_chate`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answer_activity`
--
ALTER TABLE `user_answer_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image_activity`
--
ALTER TABLE `user_image_activity`
  ADD PRIMARY KEY (`user_activity_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_profile_id`);

--
-- Indexes for table `user_qustion_activity`
--
ALTER TABLE `user_qustion_activity`
  ADD PRIMARY KEY (`user_activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_like_status`
--
ALTER TABLE `activity_like_status`
  MODIFY `activity_like_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_chate`
--
ALTER TABLE `online_chate`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_answer_activity`
--
ALTER TABLE `user_answer_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_image_activity`
--
ALTER TABLE `user_image_activity`
  MODIFY `user_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_qustion_activity`
--
ALTER TABLE `user_qustion_activity`
  MODIFY `user_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
