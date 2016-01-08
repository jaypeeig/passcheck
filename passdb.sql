-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 08:26 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `passkeys` varchar(33) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`id`, `passkeys`, `date_created`) VALUES
(6, '7053c61022a99e6f1dd3432a0de0097e', '2016-01-08 17:39:29'),
(7, '1c63129ae9db9c60c3e8aa94d3e00495', '2016-01-08 17:39:36'),
(8, 'fe3462a735ff1a68846e7764249d1585', '2016-01-08 17:59:28'),
(9, '0b9d636a3e2ee1f2c533f261a19d52b8', '2016-01-08 18:32:15'),
(10, '3e598dc33a709349e91e564c7273dfca', '2016-01-08 18:33:37'),
(11, 'f34526f9d2cfeb3719db2dc69798e0cb', '2016-01-08 18:34:51'),
(12, '38c75d33daf765d5304d6d1d76141467', '2016-01-08 18:38:19'),
(13, '20af8415708cabbc120ee5802518e3b8', '2016-01-08 18:39:26'),
(14, 'beb25f36f2677efa15fd69bc398c0f76', '2016-01-08 18:51:32'),
(15, '0c96bba7044f02cbeaf297c5c8c24239', '2016-01-08 18:52:33'),
(16, 'd8131b09cadd9e029f3dd86ea2c083a6', '2016-01-08 18:56:18'),
(17, '286a6c61dd5132cfcb2541ad802686b7', '2016-01-08 18:58:57'),
(18, '431aa4a769906cac6d24a760c2807740', '2016-01-08 18:59:53'),
(19, '873a0904fac223a8af72b64035493256', '2016-01-08 19:02:27'),
(20, '57a02f25dcd7e6851733757ed1fc3641', '2016-01-08 19:03:19'),
(21, 'c562d3d0ec73f4c762a0322dfe2c7039', '2016-01-08 19:04:23'),
(22, 'b21264b79217df4419243bfc19f97bf5', '2016-01-08 19:09:33'),
(23, 'cfcd7a40a091a9ebd4e2b77fb9dd6ba7', '2016-01-08 19:10:49'),
(24, '9c1d91b9e15a9ff7053e663c0ea76238', '2016-01-08 19:16:37'),
(25, '6a8235654fde1ed40cb5fb3246109755', '2016-01-08 19:17:16'),
(26, '7bfc93d50a895dab9a7c23165157f8c2', '2016-01-08 19:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `event` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `event`) VALUES
(3, 'Duplicate'),
(4, 'Duplicate'),
(5, 'Weak'),
(6, 'Acceptable'),
(7, 'Good'),
(8, 'Strong'),
(9, 'Weak'),
(10, 'Weak'),
(11, 'Acceptable'),
(12, 'Strong'),
(13, 'Weak'),
(14, 'Acceptable'),
(15, 'Good'),
(16, 'Duplicate'),
(17, 'Weak'),
(18, 'Duplicate'),
(19, 'Strong'),
(20, 'Strong'),
(21, 'Strong'),
(22, 'Good'),
(23, 'Good'),
(24, 'Duplicate'),
(25, 'Strong'),
(26, 'Strong'),
(27, 'Good'),
(28, 'Weak'),
(29, 'Strong'),
(30, 'Good'),
(31, 'Strong'),
(32, 'Strong'),
(33, 'Good'),
(34, 'Good'),
(35, 'Good'),
(36, 'Strong'),
(37, 'Strong'),
(38, 'Good'),
(39, 'Good'),
(40, 'Strong'),
(41, 'Strong'),
(42, 'Acceptable'),
(43, 'Strong'),
(44, 'Good'),
(45, 'Weak'),
(46, 'Strong'),
(47, 'Weak'),
(48, 'Acceptable'),
(49, 'Duplicate'),
(50, 'Duplicate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
