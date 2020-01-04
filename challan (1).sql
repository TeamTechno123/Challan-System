-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 05:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
(1, 'Techno', 'info@technothinksup.com', 'Techno@2019');

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
  `company_statecode` bigint(20) NOT NULL,
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
(1, 0),
(2, 5),
(3, 12),
(4, 18),
(5, 28);

-- --------------------------------------------------------

--
-- Table structure for table `inword`
--

CREATE TABLE `inword` (
  `inword_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `inword_dc_num` bigint(20) NOT NULL,
  `inword_date` varchar(20) NOT NULL,
  `party_id` int(11) NOT NULL,
  `inword_basic_amt` double DEFAULT NULL,
  `inword_gst` double DEFAULT NULL,
  `inword_net_amount` double DEFAULT NULL,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `inword_trip` varchar(20) DEFAULT NULL,
  `inword_trans` varchar(250) DEFAULT NULL,
  `inword_status` varchar(20) NOT NULL DEFAULT 'active',
  `inword_addedby` varchar(50) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inword_details`
--

CREATE TABLE `inword_details` (
  `inword_details_id` bigint(20) NOT NULL,
  `inword_id` bigint(20) NOT NULL,
  `item_info_id` bigint(20) NOT NULL,
  `remark_id` bigint(20) NOT NULL,
  `qty` double NOT NULL,
  `bal_qty` double NOT NULL,
  `rate` double NOT NULL,
  `gst` double DEFAULT NULL,
  `gst_amount` double DEFAULT NULL,
  `amount` double NOT NULL,
  `inword_details_status` varchar(20) NOT NULL DEFAULT 'active',
  `inword_details_addedby` varchar(100) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `outword`
--

CREATE TABLE `outword` (
  `outword_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `outword_dc_num` varchar(50) NOT NULL,
  `outword_date` varchar(20) NOT NULL,
  `outword_E_no` varchar(250) DEFAULT NULL,
  `outword_E_date` varchar(20) DEFAULT NULL,
  `party_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `outword_trans` varchar(250) NOT NULL,
  `outword_trip` int(11) DEFAULT NULL,
  `outword_title` varchar(250) NOT NULL,
  `outword_basic_amt` double DEFAULT NULL,
  `outword_gst` double DEFAULT NULL,
  `outword_net_amount` double DEFAULT NULL,
  `outword_status` varchar(20) NOT NULL DEFAULT 'active',
  `outword_addedby` varchar(50) DEFAULT NULL COMMENT 'User Id',
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outword_details`
--

CREATE TABLE `outword_details` (
  `outword_details_id` bigint(20) NOT NULL,
  `outword_id` bigint(20) NOT NULL,
  `item_info_id` bigint(20) NOT NULL,
  `remark_id` bigint(20) NOT NULL,
  `qty` double NOT NULL,
  `rate` double NOT NULL,
  `gst` double DEFAULT NULL,
  `gst_amount` double DEFAULT NULL,
  `amount` double NOT NULL,
  `outword_details_status` varchar(20) NOT NULL DEFAULT 'active',
  `outword_details_addedby` varchar(100) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outword_ref`
--

CREATE TABLE `outword_ref` (
  `ref_id` bigint(20) NOT NULL,
  `outword_id` bigint(20) NOT NULL,
  `outword_details_id` bigint(20) NOT NULL,
  `inword_id` bigint(20) NOT NULL,
  `inword_details_id` bigint(20) NOT NULL,
  `item_info_id` bigint(20) DEFAULT NULL,
  `qty_used` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `party_type`
--

CREATE TABLE `party_type` (
  `party_type_id` int(20) NOT NULL,
  `party_type_name` varchar(50) NOT NULL,
  `party_type_status` varchar(50) NOT NULL DEFAULT 'active',
  `party_type_addedby` varchar(50) NOT NULL,
  `party_type_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party_type`
--

INSERT INTO `party_type` (`party_type_id`, `party_type_name`, `party_type_status`, `party_type_addedby`, `party_type_date`) VALUES
(1, 'Customer', 'active', '', '');

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
  `state_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_code`) VALUES
(1, 'Maharashtra', '27'),
(2, 'Karnataka', '29'),
(3, 'Goa', '30'),
(4, 'Gujarat', '24'),
(5, 'Madhya Pradesh', '23'),
(6, 'Delhi', '07');

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
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 2, 'User', 'active');

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
-- Indexes for table `inword`
--
ALTER TABLE `inword`
  ADD PRIMARY KEY (`inword_id`);

--
-- Indexes for table `inword_details`
--
ALTER TABLE `inword_details`
  ADD PRIMARY KEY (`inword_details_id`);

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
-- Indexes for table `outword`
--
ALTER TABLE `outword`
  ADD PRIMARY KEY (`outword_id`);

--
-- Indexes for table `outword_details`
--
ALTER TABLE `outword_details`
  ADD PRIMARY KEY (`outword_details_id`);

--
-- Indexes for table `outword_ref`
--
ALTER TABLE `outword_ref`
  ADD PRIMARY KEY (`ref_id`);

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
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inword`
--
ALTER TABLE `inword`
  MODIFY `inword_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inword_details`
--
ALTER TABLE `inword_details`
  MODIFY `inword_details_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_group`
--
ALTER TABLE `item_group`
  MODIFY `item_group_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_info_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outword`
--
ALTER TABLE `outword`
  MODIFY `outword_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outword_details`
--
ALTER TABLE `outword_details`
  MODIFY `outword_details_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outword_ref`
--
ALTER TABLE `outword_ref`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_type`
--
ALTER TABLE `party_type`
  MODIFY `party_type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `remark_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `roll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
