-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2019 at 02:04 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9563584_mycredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transferid` int(11) NOT NULL,
  `sentfrom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sentto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transferid`, `sentfrom`, `sentto`, `amount`, `time`, `date`) VALUES
(7, 'aniket', 'swadhin', 1000, '03:20:40 PM', '21-05-2019 Tuesday'),
(8, 'aniket', 'swagat', 450, '03:22:53 PM', '21-05-2019 Tuesday'),
(9, 'sameer', 'joe', 500, '03:49:16 PM', '21-05-2019 Tuesday'),
(10, 'aniket', 'swagat', 8, '03:51:18 PM', '21-05-2019 Tuesday'),
(11, 'aniket', 'swagat', 2199542, '03:52:59 PM', '21-05-2019 Tuesday'),
(12, 'swagat', 'aniket', 2199550, '03:55:06 PM', '21-05-2019 Tuesday'),
(13, 'aniket', 'swagat', 1, '03:55:42 PM', '21-05-2019 Tuesday'),
(14, 'chandler', 'sovagya', 2012, '05:57:09 PM', '21-05-2019 Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `credit`) VALUES
('aniket', 'aniketmallick@gmail.com', 2199549),
('chandler', 'chandlerben@gmail.com', 2997988),
('charlie', 'charlie43@gmail.com', 1700000),
('joe', 'joetriviani@gmail.com', 2400500),
('peter', 'peterparker@gmail.com', 2500000),
('sameer', 'sameer98@gmail.com', 179500),
('soumya', 'soumyark002@gmail.com', 500000),
('sovagya', 'sovagya32@gmail.com', 1502012),
('swadhin', 'swadhinkuumar@gmail.com', 2300000),
('swagat', 'swagatkumar001@gmail.com', 2000451);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transferid`),
  ADD KEY `sentfrom` (`sentfrom`),
  ADD KEY `sentto` (`sentto`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `transfer_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
