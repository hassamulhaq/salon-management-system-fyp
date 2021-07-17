-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2020 at 07:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `note` text NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `salon_id`, `stylist_id`, `user_id`, `appointment_date`, `appointment_time`, `note`, `status`, `created_date`) VALUES
(1, 1, 1, 3, '2020-04-30', '01:21:00', 'I want to hair treatment.', 1, '2020-04-10'),
(2, 1, 1, 3, '2020-05-31', '00:58:00', 'My Next Appointment. ', 0, '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hire_stylist_service`
--

CREATE TABLE `tbl_hire_stylist_service` (
  `hire_service_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hire_stylist_service`
--

INSERT INTO `tbl_hire_stylist_service` (`hire_service_id`, `salon_id`, `stylist_id`, `service_id`, `assign_date`) VALUES
(1, 1, 1, 1, '2020-04-10'),
(2, 1, 1, 2, '2020-04-10'),
(3, 2, 2, 5, '2020-04-10'),
(5, 1, 1, 1, '2020-04-10'),
(6, 1, 1, 4, '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salon`
--

CREATE TABLE `tbl_salon` (
  `salon_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo_image` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `create_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_salon`
--

INSERT INTO `tbl_salon` (`salon_id`, `name`, `contact_no`, `email`, `logo_image`, `country`, `province`, `city`, `address`, `zip_code`, `opening_time`, `closing_time`, `create_date`) VALUES
(1, 'Hadi', '056101010', 'hadi@salon.com', '../include_files/image/a-print (2).jpg', 'Pakistan', 'Punjab', 'Faisalbad', 'Str: 14 Faisalbad.', '54000', '01:22:00', '18:08:00', '2020-04-10'),
(2, 'Virtual Saloon', '55555555', 'vu@gmail.com', '../include_files/image/slider-1.jpg', 'India', 'Mumbai', 'Lahore', 'Pakistan: St: 45', '5400', '02:02:00', '08:00:00', '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stylist`
--

CREATE TABLE `tbl_stylist` (
  `stylist_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `services` int(11) DEFAULT NULL,
  `join_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stylist`
--

INSERT INTO `tbl_stylist` (`stylist_id`, `username`, `email`, `phone`, `address`, `gender`, `profile_image`, `password`, `services`, `join_date`) VALUES
(1, 'stylist Zain', 'stylist@gmail.com', '03330333333', 'Lahore', 'Male', '../include_files/image/5.png', 'stylist', 1, '2020-04-10'),
(2, 'Stylist Ayesha', 'stylist2@gmail.com', NULL, NULL, NULL, NULL, 'stylist', NULL, '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stylist_rate`
--

CREATE TABLE `tbl_stylist_rate` (
  `stylist_rate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stylist_rate`
--

INSERT INTO `tbl_stylist_rate` (`stylist_rate_id`, `user_id`, `stylist_id`, `rating`) VALUES
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stylist_services`
--

CREATE TABLE `tbl_stylist_services` (
  `service_id` int(11) NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `service_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stylist_services`
--

INSERT INTO `tbl_stylist_services` (`service_id`, `stylist_id`, `service`, `service_date`) VALUES
(1, 1, 'Nail Cutter', '2020-04-10'),
(2, 1, 'Hair Blanking', '2020-04-10'),
(4, 1, 'Up Coming', '2020-04-10'),
(5, 2, 'Hair Transplant', '2020-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `join_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `profile_image`, `gender`, `password`, `role`, `join_date`) VALUES
(2, 'admin', 'admin', '4510', 'admin@gmail.com', '../include_files/image/profile.jpg', 'male', 'admin', 'admin', '2019-12-25'),
(1, 'Super', 'Admin', '0561010366', 'super-admin@gmail.com', '../include_files/image/profile.jpg', 'male', 'super', 'super-admin', '2019-12-25'),
(3, 'User', 'One', '111111', 'user@gmail.com', '../include_files/image/profile.jpg', 'male', 'admin', 'user', '2020-04-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_hire_stylist_service`
--
ALTER TABLE `tbl_hire_stylist_service`
  ADD PRIMARY KEY (`hire_service_id`);

--
-- Indexes for table `tbl_salon`
--
ALTER TABLE `tbl_salon`
  ADD PRIMARY KEY (`salon_id`);

--
-- Indexes for table `tbl_stylist`
--
ALTER TABLE `tbl_stylist`
  ADD PRIMARY KEY (`stylist_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_stylist_rate`
--
ALTER TABLE `tbl_stylist_rate`
  ADD PRIMARY KEY (`stylist_rate_id`);

--
-- Indexes for table `tbl_stylist_services`
--
ALTER TABLE `tbl_stylist_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hire_stylist_service`
--
ALTER TABLE `tbl_hire_stylist_service`
  MODIFY `hire_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_salon`
--
ALTER TABLE `tbl_salon`
  MODIFY `salon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_stylist`
--
ALTER TABLE `tbl_stylist`
  MODIFY `stylist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stylist_rate`
--
ALTER TABLE `tbl_stylist_rate`
  MODIFY `stylist_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stylist_services`
--
ALTER TABLE `tbl_stylist_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
