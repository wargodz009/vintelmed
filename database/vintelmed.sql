-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 05:34 AM
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
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `item_type_id`, `generic_name`, `description`, `price_standard`, `datetime`) VALUES
(3, 'ALLUJEN', 1, 'ALLOPURINOL', '300 MG-TAB', '11', '2013-10-28 22:13:17'),
(4, 'AMLITOR FORTE', 1, 'AMLODIPINE+ AT ORVASTATIN', '10MG/10MG TABLET', '22', '2013-10-29 03:09:21'),
(5, 'AMLITOR-A', 1, 'AMLODIPINE+ AT ORVASTATIN', '5MG/10MG TABLET', '5', '2013-10-29 00:14:00'),
(6, 'CALPINE', 1, 'AMLODEPINE BESILATE', '10 MG TABLET', '7', '2013-10-29 02:00:00'),
(7, 'CALPINE', 1, 'AMLODEPINE BESILATE', '5 MG TABLET', '8', '2013-10-27 16:11:00'),
(8, 'CLORZEF,250 MG', 1, 'CEFACLOR', '250mg/5ML SUSP, 60ML', '2', '2013-10-27 21:00:00'),
(9, 'REFAXIL 125 MG', 1, 'CEFALEXIN', '125mg/5ML SUSP, 60ML', '88', '2013-10-27 21:00:00'),
(10, 'CEFNAXL', 1, 'CEFDINIR', '300 MG-CAPSULE', '55', '2013-10-27 22:00:16');

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
  `expire` varchar(50) NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `status` enum('ordered','recieved') NOT NULL DEFAULT 'ordered',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `user_id`, `supplier_id`, `batch_id`, `item_count`, `sold_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `status`, `datetime`, `deleted`) VALUES
(2, 7, 4, 8, 'ph-73aa', 222, 0, '11/05/2013', '11/30/2015', '', '', 'recieved', '2013-11-05 07:21:34', 0),
(3, 7, 4, 12, 'LGN177', 222, 0, '11/05/2013', '11/30/2016', '', '', 'ordered', '2013-11-05 07:31:49', 0),
(5, 3, 1, 2, 'awaw', 2222, 0, '11/12/2013', '11/25/2020', '', '', 'ordered', '2013-11-12 10:53:41', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(12, 7, 14);

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
  `status` enum('pending','declined','approved','completed','cancelled') NOT NULL,
  `form_number` varchar(255) NOT NULL,
  `date_completed` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `item_batch_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `form_number`, `date_completed`) VALUES
(4, 7, 6, 2, 2, '11', '2013-11-08 06:21:09', 11, 'cancelled', '12345', ''),
(5, 7, 7, 3, 224, '55', '2013-11-08 06:21:41', 5, 'pending', '123cl1', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports_inventory`
--

CREATE TABLE IF NOT EXISTS `reports_inventory` (
  `reports_inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_type` varchar(255) NOT NULL COMMENT 'Inventory of Near Expiry Products,Summary of Critical Stocks,Summary of Returned Goods Slip,Weekly Inventory Report-Orals,Weekly Inventory Report-Vials',
  `param` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`reports_inventory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reports_inventory`
--

INSERT INTO `reports_inventory` (`reports_inventory_id`, `report_type`, `param`, `datetime`, `user_id`) VALUES
(2, 'INVENTORY_OF_NEAR_EXPIRY_PRODUCTS', '', '2013-11-05 10:13:14', 4),
(3, 'SUMMARY_OF_CRITICAL_STOCKS', '', '2013-11-05 10:15:27', 4),
(4, 'SUMMARY_OF_RETURNED_GOODS_SLIP', '', '2013-11-05 10:15:35', 4),
(5, 'WEEKLY_INVENTORY_REPORT_ORALS', '', '2013-11-05 10:15:51', 4),
(6, 'WEEKLY_INVENTORY_REPORT_VIALS', '', '2013-11-05 10:15:57', 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'manager'),
(2, 'client'),
(3, 'medical representative'),
(4, 'warehouseman'),
(5, 'accountant');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `status`) VALUES
(1, 'SKPD JEN INC', 1),
(2, 'AMBICA INTERNATIONAL TRADING CORP.', 1),
(3, 'SUHITAS PHARMACEUTICALS INC.', 1),
(4, 'EUROHEALTHCARE EXPONENTS', 1),
(5, 'ELLEBASY MEDICALE', 1),
(6, 'BERACAH PHARMA PHILS INC', 1),
(7, 'AR-LY PHARMA DISTRIBUTION', 1),
(8, 'ZUNECA INC', 1),
(9, 'FERJ''S PHARMACY', 1),
(10, 'MARAN PHARMA CORP', 1),
(11, 'CANOMED CORP', 1),
(12, 'SEL-J', 1),
(13, 'ENDURE MEDICAL INC', 1),
(14, 'PLANETARIUM', 1),
(15, 'VHERMANN PHARMACEUTICAL INC', 1),
(17, 'AMBICA INTERNATIONAL TRADING CORP.', 1),
(20, 'sasa2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE IF NOT EXISTS `system_logs` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `type` enum('login','inventory','report','user','admin','others','order','supplier','inventory item','setting') DEFAULT 'others',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `fingerprint` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `item_id` int(255) DEFAULT NULL,
  `transaction_id` int(255) DEFAULT NULL,
  `report_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(1, 1, 'supplier', '2013-11-12 10:40:48', 'create', '20', '::1', NULL, NULL, NULL, NULL),
(2, 1, 'supplier', '2013-11-12 10:40:57', 'edit', '20', '::1', NULL, NULL, NULL, NULL),
(3, 1, 'supplier', '2013-11-12 10:41:02', 'delete', '20', '::1', NULL, NULL, NULL, NULL),
(4, 1, 'inventory item', '2013-11-12 10:50:11', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(5, 1, 'inventory item', '2013-11-12 10:50:17', 'delete', '4', '::1', NULL, NULL, NULL, NULL),
(6, 1, 'inventory item', '2013-11-12 10:53:41', 'create', '5', '::1', NULL, NULL, NULL, NULL),
(7, 1, 'inventory item', '2013-11-12 10:53:48', 'update', '5', '::1', NULL, NULL, NULL, NULL),
(8, 1, 'inventory item', '2013-11-12 10:53:53', 'delete', '5', '::1', NULL, NULL, NULL, NULL),
(9, 1, 'login', '2013-11-13 08:30:03', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(11, 1, 'setting', '2013-11-13 09:29:13', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(12, 1, 'login', '2013-11-13 09:52:37', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(13, 7, 'login', '2013-11-13 09:52:42', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(14, 7, 'login', '2013-11-13 10:04:06', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(15, 10, 'login', '2013-11-13 10:04:11', NULL, 'login success', '::1', 'medrep1.1', NULL, NULL, NULL),
(16, 10, 'login', '2013-11-13 10:04:21', NULL, 'logout user', '::1', 'medrep1.1', NULL, NULL, NULL),
(17, 1, 'login', '2013-11-13 10:04:42', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(18, 1, 'setting', '2013-11-13 10:06:08', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(19, 0, 'login', '2013-11-13 10:20:21', NULL, 'logout user', '::1', '0', NULL, NULL, NULL),
(20, 1, 'login', '2013-11-13 10:21:44', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(21, 1, 'login', '2013-11-13 10:21:48', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(22, 1, 'login', '2013-11-13 10:22:09', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(23, 1, 'login', '2013-11-13 10:22:39', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(24, 1, 'login', '2013-11-13 10:22:49', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(25, 1, 'setting', '2013-11-13 10:23:15', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(26, 1, 'login', '2013-11-13 10:27:34', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(27, 1, 'login', '2013-11-13 10:28:20', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(28, 1, 'setting', '2013-11-13 10:28:46', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(29, 1, 'login', '2013-11-13 10:34:04', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(30, 1, 'login', '2013-11-13 10:34:28', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(31, 1, 'setting', '2013-11-13 10:34:51', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(32, 0, 'login', '2013-11-13 10:37:56', NULL, 'login Failed - incorrect password', '::1', 'admin', NULL, NULL, NULL),
(33, 0, 'login', '2013-11-13 10:38:32', NULL, 'login Failed - incorrect password', '::1', 'admin', NULL, NULL, NULL),
(34, 1, 'login', '2013-11-13 10:38:39', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(35, 1, 'login', '2013-11-14 05:29:08', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(36, 1, 'login', '2013-11-14 05:33:08', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(37, 1, 'login', '2013-11-14 05:33:11', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(38, 1, 'login', '2013-11-14 05:33:40', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(39, 4, 'login', '2013-11-14 05:33:44', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(40, 4, 'inventory', '2013-11-14 05:41:36', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(41, 4, 'inventory', '2013-11-14 05:41:44', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(42, 4, 'inventory', '2013-11-14 05:42:54', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(43, 4, 'inventory', '2013-11-14 05:43:03', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(44, 4, 'login', '2013-11-14 06:10:53', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(45, 3, 'login', '2013-11-14 06:10:58', NULL, 'login success', '::1', 'client', NULL, NULL, NULL),
(46, 3, 'login', '2013-11-14 06:11:02', NULL, 'logout user', '::1', 'client', NULL, NULL, NULL),
(47, 7, 'login', '2013-11-14 06:11:07', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(48, 7, 'login', '2013-11-14 06:39:55', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(49, 1, 'login', '2013-11-14 06:39:59', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(50, 1, 'login', '2013-11-18 05:34:39', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(51, 1, 'login', '2013-11-19 09:30:19', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL);

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
(2, 'time_close', 'time', '', 'system setting', 'Time Close', '06:36 pm'),
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
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `role_id`, `district_id`, `hospital`, `hospital_address`, `outlet`, `outlet_address`, `owner`, `owner_landline`, `owner_mobile`, `recipient_firstname`, `recipient_middlename`, `recipient_lastname`, `position`, `recipient_landline`, `recipient_mobile`, `address_number`, `address_street`, `address_municipality`, `civil_status`, `residence_type`, `residence_years`, `residence_months`, `home_telephone`, `mobile_number`, `spouse_firstname`, `spouse_middlename`, `spouse_lastname`, `spouse_birthdate`, `spouse_business`, `spouse_business_address`, `spouse_telephone`, `spouse_position`, `spouse_employment_tenure_years`, `spouse_employment_tenure_months`, `status`) VALUES
(1, 'jay-ar', 'mundala', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jayar_mundala@yahoo.com', 1, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(2, '', '', 'accountant', '56f97f482ef25e2f440df4a424e2ab1e', '', 5, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(3, 'clifname', 'clilname', 'client', '62608e08adc29a8d6dbc9754e659f125', 'client1_mail@mail.com', 2, 1, 'cl1 hospital', '#2312, hospital address', 'client 1 outlet', '0', 'client1', '115487', '09090909', 'recipient of client1', 'recepient mname', 'recipient lname', 'owner', '0499659', '0090909', '#22 comom', 'sdsa street', 'metro manila', 'married', 0, '1990', '12', '09659', '09090909', 'spouse fname', 'spouse mname', 'spouse lname', '19/19/19', 'owner self', 'addres spouse', '426568', 'owner', '10', '42', 'enabled'),
(4, '', '', 'warehouseman', 'b56b651bd46d63f3f0fad79a98ae66d5', '', 4, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(5, '', '', 'manager', '1d0258c2440a8d19e716292b231e3190', '', 1, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(7, '', '', 'medrep1', 'a857792ecd07fac5258be1bfac2fe980', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(8, '', '', 'medrep2', '796b1161cddfd62aadc656d51685d0dc', '', 3, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(9, '', '', 'medrep3', '3a85cff098f1a0ed93b4f9a1e6ce597c', '', 3, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(10, '', '', 'medrep1.1', '2107a5a8889395d43cb2ac07a2ab720a', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(11, '', '', 'medrep1.1.1', '0dad8005ad28928dba2e5818fcd80a27', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(12, '', '', 'client1', 'a165dd3c2e98d5d607181d0b87a4c66b', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(13, '', '', 'client2', '2c66045d4e4a90814ce9280272e510ec', '', 2, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(14, '', '', 'clientc', 'f162582f3429ccd5d48d97a5a66a88a0', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(15, '', '', 'clientn', '6aecf9182698283a29f3f9b16ea34e36', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(16, '', '', 'clientc2', 'c599ff8b9105024a61d22a2767ac349a', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(17, '', '', 'clientcn', '7cb24b15c8e0839be75ca9a5e5a4b516', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
