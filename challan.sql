-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 05:21 AM
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

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_statecode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `admin_roll_id`, `date`) VALUES
(2, 'Challan System Company', 'vdsfg dsfgdfg dfgdsfg sdsdfgdsfg sdfgdsfg', 'Kolhapur', 'Maharashtra', 'Kolhapur', 27, '9876543210', '', 'demo@mail.com', 'demo.com', '5r67fh', '996633', '111', 'dfgh', '04-12-2019', '31-12-2019', '', 1, '2019-12-03 04:44:45');

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

--
-- Dumping data for table `inword`
--

INSERT INTO `inword` (`inword_id`, `company_id`, `inword_dc_num`, `inword_date`, `party_id`, `inword_basic_amt`, `inword_gst`, `inword_net_amount`, `vehicle_id`, `inword_trip`, `inword_trans`, `inword_status`, `inword_addedby`, `is_delete`, `date`) VALUES
(1, 2, 1, '04-12-2019', 1, 229749.5, 3569.94, 233320, 1, '2', 'Asdf Basd', 'active', '5', 0, '2019-12-04 12:10:29'),
(2, 2, 2, '05-12-2019', 2, 265000, 14300, 279300, 2, '1', 'dfljh okfjh', 'active', '5', 0, '2019-12-04 12:33:09'),
(3, 2, 4, '06-12-2019', 1, 24000, 2880, 26880, 1, '1', 'fgh', 'active', '5', 0, '2019-12-04 12:33:15'),
(4, 2, 5, '04-12-2019', 1, 5400, 648, 6048, 2, '3', 'fgh', 'active', '5', 1, '2019-12-04 12:10:41');

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

--
-- Dumping data for table `inword_details`
--

INSERT INTO `inword_details` (`inword_details_id`, `inword_id`, `item_info_id`, `remark_id`, `qty`, `bal_qty`, `rate`, `gst`, `gst_amount`, `amount`, `inword_details_status`, `inword_details_addedby`, `is_delete`, `date`) VALUES
(1, 1, 1, 1, 100, 100, 300.5, 12, 3569.94, 29749.5, 'active', NULL, 0, '2019-12-04 12:10:55'),
(2, 1, 3, 2, 50, 50, 4000, 0, 0, 200000, 'active', NULL, 0, '2019-12-03 05:21:23'),
(3, 2, 1, 1, 50, 50, 300, 12, 1800, 15000, 'active', NULL, 0, '2019-12-04 12:16:30'),
(4, 2, 2, 2, 100, 100, 2500, 5, 12500, 250000, 'active', NULL, 0, '2019-12-03 05:22:22'),
(5, 3, 1, 2, 50, 50, 300, 12, 1800, 15000, 'active', NULL, 0, '2019-12-04 12:16:21'),
(6, 3, 1, 1, 30, 30, 300, 12, 1080, 9000, 'active', NULL, 0, '2019-12-04 12:16:24'),
(7, 4, 1, 2, 18, 18, 300, 12, 648, 5400, 'active', NULL, 1, '2019-12-04 08:06:37');

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
(1, 2, 'ASDF', 'active', NULL, '2019-12-03 04:49:49'),
(2, 2, 'QWER', 'active', NULL, '2019-12-03 04:49:55');

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
(1, 2, 'Ram', 'RM', '11', 3, 1, 1, 1, 300.5, 400.5, '100', '23', '02-12-2019', 'active', NULL, '2019-12-04 07:33:24'),
(2, 2, 'Mother Board', 'MB', '66', 2, 2, 2, 2, 2500, 3000, '500', '89', '01-12-2019', 'active', NULL, '2019-12-03 05:18:38'),
(3, 2, 'Hard Disk Drive', 'HDD', '63', 1, 1, 2, 2, 4000, 4500, '700', '12', '20-11-2019', 'active', NULL, '2019-12-03 05:19:30');

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

--
-- Dumping data for table `outword`
--

INSERT INTO `outword` (`outword_id`, `company_id`, `outword_dc_num`, `outword_date`, `outword_E_no`, `outword_E_date`, `party_id`, `vehicle_id`, `outword_trans`, `outword_trip`, `outword_title`, `outword_basic_amt`, `outword_gst`, `outword_net_amount`, `outword_status`, `outword_addedby`, `is_delete`, `date`) VALUES
(2, 2, '1', '01-12-2019', '1', '02-12-2019', 1, 1, 'gfdfgh', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:13:58'),
(3, 2, '2', '01-12-2019', '`', '03-12-2019', 1, 1, 'dfg', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:28:14'),
(4, 2, '3', '01-12-2019', '1', '11-12-2019', 1, 1, 'asdfsdf', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:29:39'),
(5, 2, '4', '04-12-2019', '1', '02-12-2019', 1, 1, 'asdf', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:30:25'),
(6, 2, '4', '04-12-2019', '1', '02-12-2019', 1, 1, 'asdf', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:32:19'),
(7, 2, '4', '04-12-2019', '1', '02-12-2019', 1, 1, 'asdf', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:32:46'),
(8, 2, '4', '04-12-2019', '1', '02-12-2019', 1, 1, 'asdf', 1, 'LABOUR CHARGES ONLY', 44055, 5286.6, 49342, 'active', '5', 0, '2019-12-04 12:33:24');

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

--
-- Dumping data for table `outword_details`
--

INSERT INTO `outword_details` (`outword_details_id`, `outword_id`, `item_info_id`, `remark_id`, `qty`, `rate`, `gst`, `gst_amount`, `amount`, `outword_details_status`, `outword_details_addedby`, `is_delete`, `date`) VALUES
(2, 2, 1, 2, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:13:58'),
(3, 3, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:28:14'),
(4, 4, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:29:39'),
(5, 5, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:30:25'),
(6, 6, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:32:19'),
(7, 7, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:32:46'),
(8, 8, 1, 1, 110, 400.5, 12, 5286.6, 44055, 'active', NULL, 0, '2019-12-04 12:33:24');

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

--
-- Dumping data for table `outword_ref`
--

INSERT INTO `outword_ref` (`ref_id`, `outword_id`, `outword_details_id`, `inword_id`, `inword_details_id`, `item_info_id`, `qty_used`, `date`) VALUES
(10, 2, 2, 3, 6, 1, 30, '2019-12-04 12:13:58'),
(11, 2, 2, 3, 5, 1, 50, '2019-12-04 12:13:58'),
(12, 2, 2, 2, 3, 1, 30, '2019-12-04 12:13:58');

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
(1, 2, 1, 'demo Party', 'dfgdfg sdfgdfg', 'kop', '555666', 'Maharashtra', '27', '9966332211', '9988774455', '7890', '7890', '36', 'active', NULL, '2019-12-03 05:14:31'),
(2, 2, 1, 'Afghfgh Mkiuyg', 'fghg dfgh dfgh dfgh', 'kop', '666333', 'Karnataka', '29', '9519519510', '9519519510', '996633', '998877', '55', 'active', NULL, '2019-12-04 04:24:25');

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
(1, 'Vendor', 'active', '', '');

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

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`remark_id`, `company_id`, `remark_name`, `remark_status`, `remark_addedby`, `remark_date`) VALUES
(1, 2, 'Aertyu', 'active', NULL, '2019-12-03 04:51:28'),
(2, 2, 'Njghfgh', 'active', NULL, '2019-12-03 04:51:35');

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

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `company_id`, `unit_name`, `unit_status`, `unit_addedby`, `unit_date`) VALUES
(1, 2, 'Unit1', 'active', NULL, '2019-12-03 05:08:51'),
(2, 2, 'Gram', 'active', NULL, '2019-12-03 05:08:57'),
(3, 2, 'Kilo', 'active', NULL, '2019-12-03 05:09:05');

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `roll_id`, `user_name`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(5, 2, 1, 'Admin', 'Kolhapur', 'demo@mail.com', '9876543210', '123456', 'active', 'Admin', '2019-12-03 05:04:23', 1);

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
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `company_id`, `vehicle_number`, `vehicle_owner`, `charges`, `vehicle_status`, `vehicle_addedby`, `vehicle_date`) VALUES
(1, 2, 'MH 99 ZZ 9999', 'Sahagah Hsydfg', '5000', 'active', NULL, '2019-12-03 04:50:46'),
(2, 2, 'MH 98 XX 9090', 'Tkjfgh Kdfjh', '3000', 'active', NULL, '2019-12-03 04:51:12');

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
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inword`
--
ALTER TABLE `inword`
  MODIFY `inword_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inword_details`
--
ALTER TABLE `inword_details`
  MODIFY `inword_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_group`
--
ALTER TABLE `item_group`
  MODIFY `item_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_info_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `outword`
--
ALTER TABLE `outword`
  MODIFY `outword_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outword_details`
--
ALTER TABLE `outword_details`
  MODIFY `outword_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outword_ref`
--
ALTER TABLE `outword_ref`
  MODIFY `ref_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `state_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `roll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
