-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 07:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'tech@demo.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `company_city` varchar(150) NOT NULL,
  `company_state` varchar(150) NOT NULL,
  `company_district` varchar(150) NOT NULL,
  `company_pincode` bigint(20) NOT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_lic1` varchar(150) NOT NULL,
  `company_lic2` varchar(150) NOT NULL,
  `company_start_date` varchar(15) NOT NULL,
  `company_end_date` varchar(15) NOT NULL,
  `company_logo` varchar(200) NOT NULL,
  `admin_roll_id` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_pincode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `admin_roll_id`, `date`) VALUES
(1, 'Challan System Company', 'qwerwqer, asgdfg, cvbcxn', 'Kolhapur', 'Maharashtra', 'Kolhapur', 444555, '9876543210', '9988776655', 'demo@mail.com', 'demo.com', '5r67fh', '996633', 'dfgh', 'dfgh', '04-05-2019', '30-11-2019', '', 1, '2019-11-22 05:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `gst_id` int(20) NOT NULL,
  `gst_per` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`gst_id`, `gst_per`) VALUES
(1, 5),
(2, 12),
(3, 18),
(4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `item_group`
--

CREATE TABLE `item_group` (
  `item_group_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `item_group_name` varchar(250) NOT NULL,
  `item_group_status` varchar(50) NOT NULL DEFAULT 'active',
  `item_group_addedby` varchar(50) DEFAULT NULL,
  `item_group_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_group`
--

INSERT INTO `item_group` (`item_group_id`, `company_id`, `item_group_name`, `item_group_status`, `item_group_addedby`, `item_group_date`) VALUES
(8, 1, 'Phonix', 'active', NULL, '2019-11-23 06:53:15'),
(9, 1, 'Contech', 'active', NULL, '2019-11-23 06:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_info_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `item_info_name` varchar(250) NOT NULL,
  `part_code` varchar(250) NOT NULL,
  `hsn_code` varchar(250) NOT NULL,
  `gst_slab` double NOT NULL,
  `party_id` bigint(20) NOT NULL,
  `item_group_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `inword_rate` double NOT NULL,
  `outword_rate` double NOT NULL,
  `ci_boring_weight` varchar(250) NOT NULL,
  `po_number` varchar(250) NOT NULL,
  `po_date` varchar(250) NOT NULL,
  `item_info_status` varchar(50) NOT NULL DEFAULT 'active',
  `item_info_addedby` varchar(50) DEFAULT NULL,
  `item_info_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_info_id`, `company_id`, `item_info_name`, `part_code`, `hsn_code`, `gst_slab`, `party_id`, `item_group_id`, `unit_id`, `inword_rate`, `outword_rate`, `ci_boring_weight`, `po_number`, `po_date`, `item_info_status`, `item_info_addedby`, `item_info_date`) VALUES
(3, 1, 'sound bar', '20', '21', 2, 4, 8, 4, 120, 2100, '10', '10', '14-11-2019', 'active', NULL, '2019-11-28 06:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `party_type_id` bigint(20) NOT NULL,
  `party_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `state_name` varchar(250) NOT NULL,
  `state_code` varchar(250) NOT NULL,
  `phone_no` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `vender_code` varchar(250) NOT NULL,
  `party_status` varchar(50) NOT NULL DEFAULT 'active',
  `party_addedby` varchar(50) DEFAULT NULL,
  `party_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `company_id`, `party_type_id`, `party_name`, `address`, `city`, `pincode`, `state_name`, `state_code`, `phone_no`, `mobile_no`, `gst_no`, `pan_no`, `vender_code`, `party_status`, `party_addedby`, `party_date`) VALUES
(2, 1, 1, 'Satyam plywood ', 'kolhapur ', 'kolhapur', '416002', 'KARNATAKA', '29', '1234567890', '12345679890', 'ABCd123456', '1234ADFSR', '14', 'active', NULL, '2019-11-27 12:35:30'),
(3, 1, 1, 'Hinge general Store', ' Kolhapur ', 'Kolhapur', '416001', 'MAHARASHTRA', '27', '9021182154', '9021182154', 'ABCd123456', '1234ADFSR', '15', 'active', NULL, '2019-11-27 12:40:16'),
(4, 1, 1, 'swaroop mobile shopy', 'kagal ', 'kolhapur', '416216', 'MAHARASHTRA', '27', '1234567890', '12345679890', 'ABCd123456', '1234ADFSR', '10', 'active', NULL, '2019-11-28 04:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `party_type`
--

CREATE TABLE `party_type` (
  `party_type_id` int(20) NOT NULL,
  `company_id` int(50) NOT NULL,
  `party_type_name` varchar(50) NOT NULL,
  `party_type_status` varchar(50) NOT NULL DEFAULT 'active',
  `party_type_addedby` varchar(50) NOT NULL,
  `party_type_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party_type`
--

INSERT INTO `party_type` (`party_type_id`, `company_id`, `party_type_name`, `party_type_status`, `party_type_addedby`, `party_type_date`) VALUES
(1, 1, 'general', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `remark_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `remark_name` varchar(250) NOT NULL,
  `remark_status` varchar(50) NOT NULL DEFAULT 'active',
  `remark_addedby` varchar(50) DEFAULT NULL,
  `remark_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(20) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_code`) VALUES
(1, 'MAHARASHTRA', 27),
(2, 'KARNATAKA', 29),
(3, 'GOA', 30);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `unit_name` varchar(250) NOT NULL,
  `unit_status` varchar(50) NOT NULL DEFAULT 'active',
  `unit_addedby` varchar(50) DEFAULT NULL,
  `unit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `company_id`, `unit_name`, `unit_status`, `unit_addedby`, `unit_date`) VALUES
(4, 1, 'pc', 'active', NULL, '2019-11-27 07:30:56'),
(5, 1, 'Kg', 'active', NULL, '2019-11-27 06:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT 1,
  `user_name` varchar(250) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `roll_id`, `user_name`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_addedby`, `user_date`) VALUES
(1, 1, 1, 'Admin', 'Kolhapur', 'demo@mail.com', '9876543210', '123456', 'active', 'Admin', '2019-11-22 05:18:39'),
(2, 1, 2, 'vaibhav', '', '', '9876543210', '123456', 'active', '', '2019-11-27 10:23:52'),
(3, 1, 2, 'datta', '', '', '9876543210', '123456', 'active', '', '2019-11-27 10:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

CREATE TABLE `user_roll` (
  `roll_id` int(20) NOT NULL,
  `company_id` int(50) NOT NULL,
  `roll_name` varchar(100) NOT NULL,
  `user_status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roll`
--

INSERT INTO `user_roll` (`roll_id`, `company_id`, `roll_name`, `user_status`) VALUES
(1, 1, 'admin', 'active'),
(2, 1, 'enginner', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `vehicle_number` varchar(250) NOT NULL,
  `vehicle_owner` varchar(250) NOT NULL,
  `charges` varchar(250) NOT NULL,
  `vehicle_status` varchar(50) NOT NULL DEFAULT 'active',
  `vehicle_addedby` varchar(50) DEFAULT NULL,
  `vehicle_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `company_id`, `vehicle_number`, `vehicle_owner`, `charges`, `vehicle_status`, `vehicle_addedby`, `vehicle_date`) VALUES
(3, 1, 'MH-09 DC-5055', 'Datta Mane', '90000', 'active', NULL, '2019-11-27 06:33:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`gst_id`);

--
-- Indexes for table `item_group`
--
ALTER TABLE `item_group`
  ADD PRIMARY KEY (`item_group_id`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_info_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `party_type`
--
ALTER TABLE `party_type`
  ADD PRIMARY KEY (`party_type_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`remark_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_roll`
--
ALTER TABLE `user_roll`
  ADD PRIMARY KEY (`roll_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_group`
--
ALTER TABLE `item_group`
  MODIFY `item_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `party_type`
--
ALTER TABLE `party_type`
  MODIFY `party_type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `remark_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `roll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
