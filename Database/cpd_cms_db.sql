-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 10:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpd_cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpd_calendar_info`
--

CREATE TABLE `cpd_calendar_info` (
  `cal_id` int(10) NOT NULL,
  `cal_desc` varchar(255) DEFAULT NULL,
  `org_code` int(10) DEFAULT NULL,
  `event_name` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `reg_link` varchar(250) DEFAULT NULL,
  `venue_name` varchar(100) DEFAULT NULL,
  `enter_by` int(10) DEFAULT NULL,
  `enter_date` datetime DEFAULT NULL,
  `update_by` int(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `active_check` int(1) DEFAULT 1,
  `event_from_date` date DEFAULT NULL,
  `event_to_date` date DEFAULT NULL,
  `event_date_desc` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpd_catalog_info`
--

CREATE TABLE `cpd_catalog_info` (
  `catalog_id` int(10) NOT NULL,
  `catalog_desc` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `enter_by` int(10) DEFAULT NULL,
  `enter_date` datetime DEFAULT NULL,
  `update_by` int(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `active_check` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpd_event_held`
--

CREATE TABLE `cpd_event_held` (
  `held_id` int(10) NOT NULL,
  `cal_id` int(10) DEFAULT NULL,
  `presenter_name` varchar(100) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `enter_by` int(10) DEFAULT NULL,
  `enter_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpd_organization_info`
--

CREATE TABLE `cpd_organization_info` (
  `org_id` int(10) NOT NULL,
  `org_name` varchar(254) DEFAULT NULL,
  `enter_by` int(10) DEFAULT NULL,
  `enter_date` datetime DEFAULT NULL,
  `update_by` int(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `active_check` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpd_calendar_info`
--
ALTER TABLE `cpd_calendar_info`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indexes for table `cpd_catalog_info`
--
ALTER TABLE `cpd_catalog_info`
  ADD PRIMARY KEY (`catalog_id`);

--
-- Indexes for table `cpd_event_held`
--
ALTER TABLE `cpd_event_held`
  ADD PRIMARY KEY (`held_id`),
  ADD KEY `fk_cal_id` (`cal_id`);

--
-- Indexes for table `cpd_organization_info`
--
ALTER TABLE `cpd_organization_info`
  ADD PRIMARY KEY (`org_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpd_calendar_info`
--
ALTER TABLE `cpd_calendar_info`
  MODIFY `cal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cpd_catalog_info`
--
ALTER TABLE `cpd_catalog_info`
  MODIFY `catalog_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpd_event_held`
--
ALTER TABLE `cpd_event_held`
  MODIFY `held_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpd_organization_info`
--
ALTER TABLE `cpd_organization_info`
  MODIFY `org_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpd_event_held`
--
ALTER TABLE `cpd_event_held`
  ADD CONSTRAINT `fk_cal_id` FOREIGN KEY (`cal_id`) REFERENCES `cpd_calendar_info` (`cal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
