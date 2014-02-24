-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2014 at 04:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vintelmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE IF NOT EXISTS `cruds` (
  `crud_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`crud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`crud_id`, `name`) VALUES
(1, 'awaw'),
(2, 'awaw'),
(3, 'wawa');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `name`) VALUES
(1, 'South District'),
(2, 'Central District'),
(3, 'North District');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `item_type_id` int(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price_standard` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'enabled',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `item_type_id`, `generic_name`, `description`, `price_standard`, `status`, `datetime`) VALUES
(1, 'ALLUPORINOL', 1, 'ALLUJEN', '300-mg tab', '2', 'enabled', '2014-02-03 01:14:20'),
(2, 'ALLUJEN2', 1, 'ALLUJEN2', 'ALLUJEN2', '0', 'disabled', '2014-02-12 10:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `item_batch`
--

CREATE TABLE IF NOT EXISTS `item_batch` (
  `item_batch_id` int(255) NOT NULL AUTO_INCREMENT,
  `item_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `supplier_id` int(255) NOT NULL,
  `batch_id` varchar(50) NOT NULL,
  `item_count` int(255) NOT NULL,
  `sold_count` int(255) NOT NULL,
  `recieve_date` varchar(100) NOT NULL,
  `expire` date NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `lot_number` varchar(25) NOT NULL,
  `cavite_warehouse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1- true, 0 - false',
  `status` enum('ordered','recieved','open') NOT NULL DEFAULT 'ordered',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `user_id`, `supplier_id`, `batch_id`, `item_count`, `sold_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `lot_number`, `cavite_warehouse`, `status`, `datetime`, `deleted`) VALUES
(1, 1, 1, 1, 'b-1223x', 10000, 1000, '02/03/2014', '2017-02-28', '', '2.50', 'L1200', 0, 'ordered', '2014-02-03 01:17:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE IF NOT EXISTS `item_types` (
  `item_type_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`item_type_id`, `name`) VALUES
(1, 'oral'),
(2, 'vial');

-- --------------------------------------------------------

--
-- Table structure for table `msr_clients`
--

CREATE TABLE IF NOT EXISTS `msr_clients` (
  `msr_client_id` int(255) NOT NULL AUTO_INCREMENT,
  `msr_id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  PRIMARY KEY (`msr_client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `msr_clients`
--

INSERT INTO `msr_clients` (`msr_client_id`, `msr_id`, `client_id`) VALUES
(3, 10, 3),
(4, 11, 3),
(5, 7, 12),
(6, 8, 13),
(7, 8, 14),
(8, 11, 12),
(9, 9, 17),
(10, 9, 15),
(11, 7, 3),
(12, 7, 14),
(13, 7, 13),
(14, 7, 15),
(15, 7, 16),
(16, 10, 22),
(17, 10, 21),
(18, 18, 3),
(19, 18, 12),
(20, 18, 13),
(21, 18, 14),
(22, 18, 22),
(23, 27, 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `msr_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `item_batch_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msr_client_id` int(255) NOT NULL,
  `status` enum('pending','declined','approved','completed','cancelled','returned') NOT NULL,
  `gm_approve_pre` int(255) NOT NULL DEFAULT '0' COMMENT 'first gm checkpoint',
  `gm_approve_post` int(255) NOT NULL DEFAULT '0' COMMENT '2nd gm checkpoint',
  `payment_type` varchar(255) NOT NULL DEFAULT '30_days',
  `form_number` varchar(255) NOT NULL,
  `date_completed` date NOT NULL,
  `date_cancelled` date NOT NULL,
  `return_id` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `item_batch_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `gm_approve_pre`, `gm_approve_post`, `payment_type`, `form_number`, `date_completed`, `date_cancelled`, `return_id`) VALUES
(1, 7, 1, 0, 1, '1', '2014-02-10 05:21:27', 13, 'pending', 0, 0, '30_days', 'cl2so', '0000-00-00', '0000-00-00', ''),
(2, 18, 1, 0, 1, '1', '2014-02-10 05:27:15', 21, 'pending', 0, 0, '30_days', 'clcso', '0000-00-00', '0000-00-00', ''),
(3, 10, 1, 0, 1, '1', '2014-02-10 06:04:57', 16, 'pending', 0, 0, '30_days', 'medrep1.1jayarmundala', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_details_id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `item_batch_id` int(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'enabled',
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_files`
--

CREATE TABLE IF NOT EXISTS `order_files` (
  `order_files_id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`order_files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_pay`
--

CREATE TABLE IF NOT EXISTS `order_pay` (
  `order_id` int(255) NOT NULL,
  `order_pay_id` int(255) NOT NULL AUTO_INCREMENT,
  `amount` int(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_return`
--

CREATE TABLE IF NOT EXISTS `order_return` (
  `orders_return_id` int(250) NOT NULL AUTO_INCREMENT,
  `order_id` int(250) NOT NULL,
  `item_batch_id` int(255) NOT NULL,
  `return_quantity` int(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orders_return_id`),
  KEY `orders_return_id` (`orders_return_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `report_for` varchar(50) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'manager'),
(2, 'client'),
(3, 'medical representative'),
(4, 'warehouseman'),
(5, 'accountant'),
(6, 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `status`) VALUES
(1, 'SKPD JEN INC', 1),
(2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE IF NOT EXISTS `system_logs` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `type` enum('login','inventory','report','user','admin','others','order','supplier','inventory item','setting','upload','generate report') DEFAULT 'others',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `fingerprint` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `item_id` int(255) DEFAULT NULL,
  `transaction_id` int(255) DEFAULT NULL,
  `report_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(1, 2, 'login', '2014-02-10 05:04:57', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(2, 1, 'login', '2014-02-10 05:05:03', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(3, 1, 'login', '2014-02-10 05:08:22', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(4, 2, 'login', '2014-02-10 05:08:26', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(5, 2, 'login', '2014-02-10 05:11:11', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(6, 2, 'login', '2014-02-10 05:11:13', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(7, 2, 'user', '2014-02-10 07:13:03', 'create', '23', '::1', NULL, NULL, NULL, NULL),
(8, 2, 'login', '2014-02-10 08:55:03', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(9, 4, 'login', '2014-02-10 08:55:07', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(10, 4, 'login', '2014-02-10 09:09:40', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(11, 1, 'login', '2014-02-10 09:09:45', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(12, 1, 'user', '2014-02-10 09:10:32', 'create', '24', '::1', NULL, NULL, NULL, NULL),
(13, 1, 'login', '2014-02-10 09:12:05', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(14, 24, 'login', '2014-02-10 09:13:06', NULL, 'login success', '::1', 'hrd', NULL, NULL, NULL),
(15, 24, 'user', '2014-02-10 09:23:12', 'create', '25', '::1', NULL, NULL, NULL, NULL),
(16, 24, 'login', '2014-02-10 09:26:46', NULL, 'logout user', '::1', 'hrd', NULL, NULL, NULL),
(17, 1, 'login', '2014-02-10 09:26:53', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(18, 1, 'login', '2014-02-10 09:31:34', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(19, 24, 'login', '2014-02-11 08:07:46', NULL, 'login success', '::1', 'hrd', NULL, NULL, NULL),
(20, 24, 'login', '2014-02-11 08:15:45', NULL, 'logout user', '::1', 'hrd', NULL, NULL, NULL),
(21, 2, 'login', '2014-02-11 08:15:49', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(22, 2, 'login', '2014-02-11 08:27:00', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(23, 1, 'login', '2014-02-11 08:27:04', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(24, 1, 'login', '2014-02-11 08:48:39', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(25, 2, 'login', '2014-02-11 08:48:42', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(26, 2, 'login', '2014-02-11 08:48:50', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(27, 24, 'login', '2014-02-11 08:48:55', NULL, 'login success', '::1', 'hrd', NULL, NULL, NULL),
(28, 24, 'login', '2014-02-11 09:04:49', NULL, 'logout user', '::1', 'hrd', NULL, NULL, NULL),
(29, 24, 'login', '2014-02-11 09:04:51', NULL, 'login success', '::1', 'hrd', NULL, NULL, NULL),
(30, 24, 'login', '2014-02-11 09:05:06', NULL, 'logout user', '::1', 'hrd', NULL, NULL, NULL),
(31, 1, 'login', '2014-02-11 09:05:10', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(32, 1, 'login', '2014-02-12 09:13:16', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(33, 1, 'login', '2014-02-12 09:28:08', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(34, 2, 'login', '2014-02-12 09:28:12', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(35, 2, 'user', '2014-02-12 09:28:46', 'create', '26', '::1', NULL, NULL, NULL, NULL),
(36, 2, 'user', '2014-02-12 09:29:05', 'create', '27', '::1', NULL, NULL, NULL, NULL),
(37, 2, 'login', '2014-02-12 10:00:14', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(38, 2, 'login', '2014-02-12 10:00:17', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(39, 2, 'login', '2014-02-12 10:00:19', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(40, 1, 'login', '2014-02-12 10:00:22', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(41, 1, 'user', '2014-02-12 10:27:05', 'create', '28', '::1', NULL, NULL, NULL, NULL),
(42, 1, 'user', '2014-02-12 10:31:20', 'create', '31', '::1', NULL, NULL, NULL, NULL),
(43, 1, 'user', '2014-02-12 10:34:32', 'delete', '18', '::1', NULL, NULL, NULL, NULL),
(44, 1, 'user', '2014-02-12 10:36:40', 'activate', '18', '::1', NULL, NULL, NULL, NULL),
(45, 1, 'user', '2014-02-12 10:36:43', 'delete', '18', '::1', NULL, NULL, NULL, NULL),
(46, 1, 'user', '2014-02-12 10:36:45', 'delete', '18', '::1', NULL, NULL, NULL, NULL),
(47, 1, 'user', '2014-02-12 10:36:51', 'delete', '11', '::1', NULL, NULL, NULL, NULL),
(48, 1, 'user', '2014-02-12 10:36:53', 'delete', '10', '::1', NULL, NULL, NULL, NULL),
(49, 1, 'user', '2014-02-12 10:36:55', 'delete', '9', '::1', NULL, NULL, NULL, NULL),
(50, 1, 'user', '2014-02-12 10:36:57', 'delete', '5', '::1', NULL, NULL, NULL, NULL),
(51, 1, 'user', '2014-02-12 10:36:58', 'delete', '4', '::1', NULL, NULL, NULL, NULL),
(52, 1, 'user', '2014-02-12 10:37:00', 'delete', '2', '::1', NULL, NULL, NULL, NULL),
(53, 1, 'user', '2014-02-12 10:38:20', 'delete', '13', '::1', NULL, NULL, NULL, NULL),
(54, 1, 'user', '2014-02-12 10:38:27', 'delete', '14', '::1', NULL, NULL, NULL, NULL),
(55, 1, 'user', '2014-02-12 10:40:56', 'activate', '21', '::1', NULL, NULL, NULL, NULL),
(56, 1, 'user', '2014-02-12 10:41:02', 'delete', '20', '::1', NULL, NULL, NULL, NULL),
(57, 1, 'user', '2014-02-12 10:41:07', 'delete', '20', '::1', NULL, NULL, NULL, NULL),
(58, 1, 'user', '2014-02-12 10:41:14', 'delete', '19', '::1', NULL, NULL, NULL, NULL),
(59, 1, 'user', '2014-02-12 10:41:19', 'delete', '21', '::1', NULL, NULL, NULL, NULL),
(60, 1, 'user', '2014-02-12 10:41:21', 'delete', '17', '::1', NULL, NULL, NULL, NULL),
(61, 1, 'user', '2014-02-12 10:41:24', 'delete', '16', '::1', NULL, NULL, NULL, NULL),
(62, 1, 'user', '2014-02-12 10:41:27', 'delete', '15', '::1', NULL, NULL, NULL, NULL),
(63, 1, 'supplier', '2014-02-12 10:45:13', 'delete', '2', '::1', NULL, NULL, NULL, NULL),
(64, 1, 'inventory', '2014-02-12 10:50:13', 'create', '2', '::1', NULL, NULL, NULL, NULL),
(65, 1, 'inventory', '2014-02-12 10:50:18', 'delete', '2', '::1', NULL, NULL, NULL, NULL),
(66, 1, 'login', '2014-02-17 03:03:20', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE IF NOT EXISTS `system_setting` (
  `setting_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `option` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`setting_id`, `name`, `type`, `option`, `group`, `display_name`, `value`) VALUES
(1, 'time_open', 'time', '', 'system settings', 'Time Open', '06:00 am'),
(2, 'time_close', 'time', '', 'system setting', 'Time Close', '11:59 pm'),
(3, 'time_zone', 'select', 'Asia/Manila,Asia/Macao,Asia/Bangkok', 'system settings', 'Time Zone', 'Asia/Manila'),
(4, 'expire_near', 'text', '', 'items', 'Near Expire (months)', '7'),
(5, 'empty_near', 'text', '', 'items', 'Critical limit', '300');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  `district_id` int(255) NOT NULL,
  `hospital` varchar(250) NOT NULL,
  `hospital_address` varchar(250) NOT NULL,
  `outlet` varchar(250) NOT NULL,
  `outlet_address` varchar(250) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `owner_landline` varchar(250) NOT NULL,
  `owner_mobile` varchar(250) NOT NULL,
  `recipient_firstname` varchar(250) NOT NULL,
  `recipient_middlename` varchar(250) NOT NULL,
  `recipient_lastname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `recipient_landline` varchar(250) NOT NULL,
  `recipient_mobile` varchar(250) NOT NULL,
  `address_number` varchar(250) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_municipality` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `residence_type` int(255) NOT NULL,
  `residence_years` varchar(255) NOT NULL,
  `residence_months` varchar(255) NOT NULL,
  `home_telephone` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `spouse_firstname` varchar(255) NOT NULL,
  `spouse_middlename` varchar(255) NOT NULL,
  `spouse_lastname` varchar(255) NOT NULL,
  `spouse_birthdate` varchar(255) NOT NULL,
  `spouse_business` varchar(255) NOT NULL,
  `spouse_business_address` varchar(255) NOT NULL,
  `spouse_telephone` varchar(255) NOT NULL,
  `spouse_position` varchar(255) NOT NULL,
  `spouse_employment_tenure_years` varchar(255) NOT NULL,
  `spouse_employment_tenure_months` varchar(255) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `role_id`, `district_id`, `hospital`, `hospital_address`, `outlet`, `outlet_address`, `owner`, `owner_landline`, `owner_mobile`, `recipient_firstname`, `recipient_middlename`, `recipient_lastname`, `position`, `recipient_landline`, `recipient_mobile`, `address_number`, `address_street`, `address_municipality`, `civil_status`, `residence_type`, `residence_years`, `residence_months`, `home_telephone`, `mobile_number`, `spouse_firstname`, `spouse_middlename`, `spouse_lastname`, `spouse_birthdate`, `spouse_business`, `spouse_business_address`, `spouse_telephone`, `spouse_position`, `spouse_employment_tenure_years`, `spouse_employment_tenure_months`, `status`) VALUES
(1, 'jay-ar', 'mundala', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jayar_mundala@yahoo.com', 1, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(3, 'clifname', 'clilname', 'client', '62608e08adc29a8d6dbc9754e659f125', 'client1_mail@mail.com', 2, 1, 'cl1 hospital', '#2312, hospital address', 'client 1 outlet', '0', 'client1', '115487', '09090909', 'recipient of client1', 'recepient mname', 'recipient lname', 'owner', '0499659', '0090909', '#22 comom', 'sdsa street', 'metro manila', 'married', 0, '1990', '12', '09659', '09090909', 'spouse fname', 'spouse mname', 'spouse lname', '19/19/19', 'owner self', 'addres spouse', '426568', 'owner', '10', '42', 'enabled'),
(7, 'medre1fname', 'medre1lname', 'medrep1', 'a857792ecd07fac5258be1bfac2fe980', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(8, 'user3', 'user8ln', 'medrep2', '796b1161cddfd62aadc656d51685d0dc', 'user8email@gmail.com', 3, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(12, 'cli1fname', 'cli1lname', 'client1', 'a165dd3c2e98d5d607181d0b87a4c66b', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(22, 'jayar', 'mundala2', 'jmundala2', '473a9a95a67cc23a697718afd5e39796', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(24, 'jay', 'ar', 'hrd', '4bf31e6f4b818056eaacb83dff01c9b8', '', 6, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(25, 'aaaa', 'aaaa', 'aaaa', '74b87337454200d4d33f80c4663dc5e5', '', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(26, 'cs1', 'cs1', 'cs1', 'b12efe4e2b53de51a261421f77a3cbef', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(27, 'ms1', 'ms1', 'ms1', 'c498c329342daa376732d7a809d416ef', '', 3, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(28, 'csd1', 'csd1', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(31, 'some hospital sd c', '', 'some hospital sd c', 'some hospital sd c', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
