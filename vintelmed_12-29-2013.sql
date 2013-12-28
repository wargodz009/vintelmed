-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2013 at 11:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `item_type_id`, `generic_name`, `description`, `price_standard`, `status`, `datetime`) VALUES
(3, 'ALLUJEN', 1, 'ALLOPURINOL', '300 MG-TAB', '11', 'enabled', '2013-10-28 22:13:17'),
(4, 'AMLITOR FORTE', 1, 'AMLODIPINE+ AT ORVASTATIN', '10MG/10MG TABLET', '22', 'enabled', '2013-10-29 03:09:21'),
(5, 'AMLITOR-A', 1, 'AMLODIPINE+ AT ORVASTATIN', '5MG/10MG TABLET', '5', 'enabled', '2013-10-29 00:14:00'),
(6, 'CALPINE', 1, 'AMLODEPINE BESILATE', '10 MG TABLET', '7', 'enabled', '2013-10-29 02:00:00'),
(7, 'CALPINE', 1, 'AMLODEPINE BESILATE', '5 MG TABLET', '8', 'enabled', '2013-10-27 16:11:00'),
(8, 'CLORZEF,250 MG', 1, 'CEFACLOR', '250mg/5ML SUSP, 60ML', '2', 'enabled', '2013-10-27 21:00:00'),
(9, 'REFAXIL 125 MG', 1, 'CEFALEXIN', '125mg/5ML SUSP, 60ML', '88', 'enabled', '2013-10-27 21:00:00'),
(10, 'CEFNAXL', 1, 'CEFDINIR', '300 MG-CAPSULE', '55', 'enabled', '2013-10-27 22:00:16'),
(13, 'dsadas', 1, 'dasdsa', 'dasdas', '0', 'disabled', '2013-11-27 07:45:39');

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
  `status` enum('ordered','recieved','open') NOT NULL DEFAULT 'ordered',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `user_id`, `supplier_id`, `batch_id`, `item_count`, `sold_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `status`, `datetime`, `deleted`) VALUES
(2, 7, 4, 8, 'ph-73aa', 222, 222, '11/05/2013', '11/30/2015', '', '', 'recieved', '2013-11-05 07:21:34', 0),
(3, 7, 4, 12, 'LGN177', 222, 2, '11/05/2013', '11/30/2016', '', '', 'ordered', '2013-11-05 07:31:49', 0),
(5, 3, 1, 2, 'awaw', 2222, 0, '11/12/2013', '11/25/2020', '', '', 'ordered', '2013-11-12 10:53:41', 1),
(6, 3, 1, 1, 'awaw', 11, 0, '11/06/2013', '11/21/2013', '', '', 'ordered', '2013-11-27 07:49:23', 1),
(7, 9, 1, 2, 'sd32', 222, 4, '12/02/2013', '12/24/2019', '', '', 'ordered', '2013-12-02 09:00:27', 0),
(8, 9, 2, 12, 'asdasd', 111, 0, '12/24/2013', '12/31/2017', '', '', 'ordered', '2013-12-13 13:15:12', 0),
(9, 9, 2, 12, 'asdasd2', 22222, 0, '12/13/2013', '12/31/2019', '', '', 'ordered', '2013-12-13 13:15:39', 0),
(10, 10, 2, 1, 'aaaaa', 10000, 0, '12/16/2013', '12/31/2013', '', '', 'open', '2013-12-16 06:26:43', 0),
(11, 6, 2, 1, 'i00001', 1000, 1, '12/16/2013', '12/31/2018', '', '', 'open', '2013-12-16 14:10:02', 0);

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
  `gm_approve_pre` int(255) NOT NULL DEFAULT '0' COMMENT 'first gm checkpoint',
  `gm_approve_post` int(255) NOT NULL DEFAULT '0' COMMENT '2nd gm checkpoint',
  `payment_type` varchar(255) NOT NULL DEFAULT '30_days',
  `form_number` varchar(255) NOT NULL,
  `date_completed` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `item_batch_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `gm_approve_pre`, `gm_approve_post`, `payment_type`, `form_number`, `date_completed`) VALUES
(1, 7, 3, 0, 1, '11', '2013-12-16 13:47:13', 11, 'completed', 1, 1, '30_days', 's00001', ''),
(2, 7, 6, 0, 1, '7', '2013-12-16 14:08:46', 5, 'completed', 1, 1, '30_days', 's00002', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `item_id`, `item_batch_id`, `quantity`, `status`) VALUES
(1, 1, 3, 5, 0, 'enabled'),
(2, 2, 6, 11, 1, 'enabled');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_pay`
--

INSERT INTO `order_pay` (`order_id`, `order_pay_id`, `amount`, `datetime`, `status`) VALUES
(1, 1, 5, '2013-12-16 14:12:03', 0),
(1, 2, 5, '2013-12-16 14:12:14', 0),
(1, 3, 1, '2013-12-16 14:12:19', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(20, 'sasa2', 0),
(21, 'awaw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE IF NOT EXISTS `system_logs` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `type` enum('login','inventory','report','user','admin','others','order','supplier','inventory item','setting','upload') DEFAULT 'others',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `fingerprint` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `item_id` int(255) DEFAULT NULL,
  `transaction_id` int(255) DEFAULT NULL,
  `report_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=231 ;

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
(51, 1, 'login', '2013-11-19 09:30:19', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(52, 1, 'login', '2013-11-25 04:32:38', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(53, 1, 'login', '2013-11-27 07:37:05', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(54, 1, 'user', '2013-11-27 07:38:09', 'delete', '11', '::1', NULL, NULL, NULL, NULL),
(55, 1, 'inventory', '2013-11-27 07:38:55', 'create', '11', '::1', NULL, NULL, NULL, NULL),
(56, 1, 'inventory', '2013-11-27 07:38:59', 'delete', '11', '::1', NULL, NULL, NULL, NULL),
(57, 1, 'inventory', '2013-11-27 07:39:37', 'create', '12', '::1', NULL, NULL, NULL, NULL),
(58, 1, 'inventory', '2013-11-27 07:39:45', 'delete', '12', '::1', NULL, NULL, NULL, NULL),
(59, 1, 'inventory', '2013-11-27 07:45:39', 'create', '13', '::1', NULL, NULL, NULL, NULL),
(60, 1, 'inventory', '2013-11-27 07:45:50', 'delete', '13', '::1', NULL, NULL, NULL, NULL),
(61, 1, 'supplier', '2013-11-27 07:48:39', 'create', '21', '::1', NULL, NULL, NULL, NULL),
(62, 1, 'supplier', '2013-11-27 07:48:45', 'delete', '21', '::1', NULL, NULL, NULL, NULL),
(63, 1, 'inventory item', '2013-11-27 07:49:23', 'create', '6', '::1', NULL, NULL, NULL, NULL),
(64, 1, 'inventory item', '2013-11-27 07:49:33', 'delete', '6', '::1', NULL, NULL, NULL, NULL),
(65, 1, 'login', '2013-11-29 02:51:12', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(66, 1, 'login', '2013-11-29 03:05:03', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(67, 7, 'login', '2013-11-29 03:05:08', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(68, 7, 'login', '2013-11-29 04:11:13', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(69, 1, 'login', '2013-11-29 04:11:17', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(70, 1, 'login', '2013-11-29 09:48:51', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(71, 1, 'login', '2013-12-02 03:30:18', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(72, 1, 'login', '2013-12-02 08:59:04', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(73, 8, 'login', '2013-12-02 08:59:10', NULL, 'login success', '::1', 'medrep2', NULL, NULL, NULL),
(74, 8, 'login', '2013-12-02 08:59:46', NULL, 'logout user', '::1', 'medrep2', NULL, NULL, NULL),
(75, 1, 'login', '2013-12-02 08:59:50', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(76, 1, 'inventory item', '2013-12-02 09:00:27', 'create', '7', '::1', NULL, NULL, NULL, NULL),
(77, 1, 'order', '2013-12-02 09:01:13', 'completed an order', '8', '::1', NULL, NULL, NULL, NULL),
(78, 1, 'upload', '2013-12-02 09:04:10', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(79, 1, 'upload', '2013-12-02 09:04:25', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(80, 1, 'login', '2013-12-04 14:43:34', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(81, 1, 'login', '2013-12-06 10:41:08', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(82, 1, 'upload', '2013-12-06 10:41:48', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(83, 1, 'upload', '2013-12-06 10:51:05', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(84, 1, 'upload', '2013-12-06 10:53:43', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(85, 1, 'login', '2013-12-07 06:29:09', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(86, 1, 'login', '2013-12-09 06:23:51', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(87, 1, 'upload', '2013-12-09 09:09:29', 'uploaded a file', '14', '::1', NULL, NULL, NULL, NULL),
(88, 1, 'login', '2013-12-09 09:57:07', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(89, 5, 'login', '2013-12-09 09:57:11', NULL, 'login success', '::1', 'manager', NULL, NULL, NULL),
(90, 5, 'login', '2013-12-09 09:57:15', NULL, 'logout user', '::1', 'manager', NULL, NULL, NULL),
(91, 7, 'login', '2013-12-09 09:57:18', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(92, 7, 'login', '2013-12-09 09:58:53', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(93, 1, 'login', '2013-12-09 09:58:56', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(94, 1, 'login', '2013-12-10 11:14:26', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(95, 1, 'login', '2013-12-10 11:14:49', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(96, 12, 'login', '2013-12-10 11:14:58', NULL, 'emergency login success', '::1', 'client1', NULL, NULL, NULL),
(97, 12, 'login', '2013-12-10 11:15:04', NULL, 'logout user', '::1', 'client1', NULL, NULL, NULL),
(98, 7, 'login', '2013-12-10 11:15:09', NULL, 'emergency login success', '::1', 'medrep1', NULL, NULL, NULL),
(99, 7, 'login', '2013-12-10 11:15:31', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(100, 1, 'login', '2013-12-10 11:15:38', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(101, 1, 'login', '2013-12-10 11:16:11', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(102, 1, 'login', '2013-12-11 06:55:58', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(103, 1, 'login', '2013-12-11 13:18:45', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(104, 1, 'login', '2013-12-12 07:55:47', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(105, 1, 'login', '2013-12-12 13:26:36', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(106, 1, 'login', '2013-12-12 13:27:57', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(107, 1, 'login', '2013-12-12 13:28:03', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(108, 1, 'login', '2013-12-12 13:28:07', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(109, 1, 'login', '2013-12-12 13:28:11', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(110, 1, 'login', '2013-12-12 13:31:04', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(111, 1, 'login', '2013-12-12 13:31:14', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(112, 0, 'login', '2013-12-12 13:31:24', NULL, 'login Failed - invalid username', '::1', 'medrep', NULL, NULL, NULL),
(113, 1, 'login', '2013-12-12 13:31:37', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(114, 1, 'login', '2013-12-13 09:36:55', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(115, 1, 'login', '2013-12-13 09:43:54', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(116, 7, 'login', '2013-12-13 09:44:00', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(117, 7, 'login', '2013-12-13 09:45:41', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(118, 1, 'login', '2013-12-13 09:45:44', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(119, 1, 'login', '2013-12-13 11:21:27', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(120, 1, 'login', '2013-12-13 11:22:54', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(121, 2, 'login', '2013-12-13 11:23:00', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(122, 1, 'login', '2013-12-13 11:23:43', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(123, 1, 'setting', '2013-12-13 11:24:05', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(124, 1, 'login', '2013-12-13 11:24:09', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(125, 2, 'login', '2013-12-13 11:24:12', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(126, 4, 'login', '2013-12-13 11:24:36', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(127, 2, 'login', '2013-12-13 11:28:18', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(128, 2, 'login', '2013-12-13 11:29:02', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(129, 7, 'login', '2013-12-13 11:29:05', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(130, 7, 'login', '2013-12-13 11:29:43', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(131, 4, 'login', '2013-12-13 11:30:23', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(132, 4, 'login', '2013-12-13 11:30:30', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(133, 3, 'login', '2013-12-13 11:31:02', NULL, 'login success', '::1', 'client', NULL, NULL, NULL),
(134, 3, 'login', '2013-12-13 11:31:06', NULL, 'logout user', '::1', 'client', NULL, NULL, NULL),
(135, 3, 'login', '2013-12-13 11:31:19', NULL, 'login success', '::1', 'client', NULL, NULL, NULL),
(136, 3, 'login', '2013-12-13 11:31:24', NULL, 'logout user', '::1', 'client', NULL, NULL, NULL),
(137, 1, 'login', '2013-12-13 11:31:27', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(138, 1, 'login', '2013-12-13 12:24:37', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(139, 2, 'login', '2013-12-13 12:24:41', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(140, 2, 'login', '2013-12-13 12:30:08', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(141, 1, 'login', '2013-12-13 12:30:12', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(142, 1, 'login', '2013-12-13 12:30:22', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(143, 2, 'login', '2013-12-13 12:31:02', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(144, 1, 'login', '2013-12-13 13:02:27', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(145, 1, 'login', '2013-12-13 13:02:35', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(146, 0, 'login', '2013-12-13 13:02:46', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(147, 0, 'login', '2013-12-13 13:02:53', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(148, 1, 'login', '2013-12-13 13:02:56', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(149, 1, 'login', '2013-12-13 13:03:02', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(150, 2, 'login', '2013-12-13 13:03:09', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(151, 2, 'inventory item', '2013-12-13 13:15:12', 'create', '8', '::1', NULL, NULL, NULL, NULL),
(152, 2, 'inventory item', '2013-12-13 13:15:39', 'create', '9', '::1', NULL, NULL, NULL, NULL),
(153, 2, 'login', '2013-12-13 13:18:58', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(154, 4, 'login', '2013-12-13 13:19:07', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(155, 4, 'inventory item', '2013-12-13 13:22:45', 'update', '8', '::1', NULL, NULL, NULL, NULL),
(156, 4, 'inventory item', '2013-12-13 13:23:02', 'update', '9', '::1', NULL, NULL, NULL, NULL),
(157, 4, 'login', '2013-12-13 13:23:10', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(158, 2, 'login', '2013-12-13 13:23:13', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(159, 1, 'login', '2013-12-16 04:45:00', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(160, 1, 'login', '2013-12-16 04:47:05', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(161, 2, 'login', '2013-12-16 04:47:08', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(162, 2, 'login', '2013-12-16 04:57:57', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(163, 5, 'login', '2013-12-16 04:58:02', NULL, 'login success', '::1', 'manager', NULL, NULL, NULL),
(164, 5, 'login', '2013-12-16 04:59:10', NULL, 'logout user', '::1', 'manager', NULL, NULL, NULL),
(165, 2, 'login', '2013-12-16 04:59:13', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(166, 2, 'login', '2013-12-16 05:01:38', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(167, 1, 'login', '2013-12-16 05:01:41', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(168, 1, 'login', '2013-12-16 06:24:20', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(169, 8, 'login', '2013-12-16 06:24:25', NULL, 'login success', '::1', 'medrep2', NULL, NULL, NULL),
(170, 8, 'login', '2013-12-16 06:24:47', NULL, 'logout user', '::1', 'medrep2', NULL, NULL, NULL),
(171, 1, 'login', '2013-12-16 06:24:51', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(172, 1, 'login', '2013-12-16 06:25:08', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(173, 2, 'login', '2013-12-16 06:25:11', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(174, 2, 'inventory item', '2013-12-16 06:26:43', 'create', '10', '::1', NULL, NULL, NULL, NULL),
(175, 2, 'login', '2013-12-16 06:26:56', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(176, 1, 'login', '2013-12-16 06:27:00', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(177, 1, 'login', '2013-12-16 06:36:51', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(178, 2, 'login', '2013-12-16 06:36:53', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(179, 2, 'login', '2013-12-16 06:40:41', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(180, 2, 'login', '2013-12-16 06:40:49', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(181, 2, 'login', '2013-12-16 06:42:58', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(182, 4, 'login', '2013-12-16 06:43:02', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(183, 4, 'login', '2013-12-16 06:43:07', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(184, 2, 'login', '2013-12-16 06:43:11', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(185, 2, 'login', '2013-12-16 06:49:06', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(186, 1, 'login', '2013-12-16 06:49:09', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(187, 2, 'login', '2013-12-16 13:36:00', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(188, 2, 'login', '2013-12-16 13:36:51', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(189, 1, 'login', '2013-12-16 13:36:57', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(190, 1, 'login', '2013-12-16 13:45:44', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(191, 1, 'login', '2013-12-16 13:46:34', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(192, 1, 'login', '2013-12-16 13:46:38', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(193, 0, 'login', '2013-12-16 13:46:44', NULL, 'login Failed - invalid username', '::1', 'medrep', NULL, NULL, NULL),
(194, 7, 'login', '2013-12-16 13:46:54', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(195, 7, 'login', '2013-12-16 13:48:37', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(196, 0, 'login', '2013-12-16 13:48:44', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(197, 0, 'login', '2013-12-16 13:48:53', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(198, 0, 'login', '2013-12-16 13:48:58', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(199, 2, 'login', '2013-12-16 13:49:36', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(200, 2, 'order', '2013-12-16 14:04:59', 'completed an order', '1', '::1', NULL, NULL, NULL, NULL),
(201, 2, 'login', '2013-12-16 14:08:27', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(202, 7, 'login', '2013-12-16 14:08:32', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(203, 7, 'login', '2013-12-16 14:08:49', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(204, 2, 'login', '2013-12-16 14:08:58', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(205, 2, 'inventory item', '2013-12-16 14:10:02', 'create', '11', '::1', NULL, NULL, NULL, NULL),
(206, 2, 'order', '2013-12-16 14:11:24', 'completed an order', '2', '::1', NULL, NULL, NULL, NULL),
(207, 1, 'login', '2013-12-17 07:56:25', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(208, 1, 'upload', '2013-12-17 08:02:01', 'uploaded a file', '1', '::1', NULL, NULL, NULL, NULL),
(209, 1, 'upload', '2013-12-17 08:08:11', 'uploaded a file', '2', '::1', NULL, NULL, NULL, NULL),
(210, 1, 'upload', '2013-12-17 08:08:18', 'uploaded a file', '3', '::1', NULL, NULL, NULL, NULL),
(211, 1, '', '2013-12-17 08:08:28', 'delete an upload file', '3', '::1', NULL, NULL, NULL, NULL),
(212, 1, '', '2013-12-17 08:09:03', 'delete an upload file', '2', '::1', NULL, NULL, NULL, NULL),
(213, 1, 'upload', '2013-12-17 08:09:27', 'uploaded a file', '4', '::1', NULL, NULL, NULL, NULL),
(214, 1, '', '2013-12-17 08:09:34', 'delete an upload file', '4', '::1', NULL, NULL, NULL, NULL),
(215, 1, 'upload', '2013-12-17 08:10:02', 'uploaded a file', '5', '::1', NULL, NULL, NULL, NULL),
(216, 1, '', '2013-12-17 08:10:10', 'delete an upload file', '5', '::1', NULL, NULL, NULL, NULL),
(217, 1, 'upload', '2013-12-17 08:12:32', 'uploaded a file', '6', '::1', NULL, NULL, NULL, NULL),
(218, 1, '', '2013-12-17 08:12:42', 'delete an upload file', '6', '::1', NULL, NULL, NULL, NULL),
(219, 1, 'upload', '2013-12-17 08:12:55', 'uploaded a file', '7', '::1', NULL, NULL, NULL, NULL),
(220, 1, '', '2013-12-17 08:13:03', 'delete an upload file', '7', '::1', NULL, NULL, NULL, NULL),
(221, 1, 'upload', '2013-12-17 08:14:00', 'uploaded a file', '8', '::1', NULL, NULL, NULL, NULL),
(222, 1, 'upload', '2013-12-17 08:15:18', 'uploaded a file', '9', '::1', NULL, NULL, NULL, NULL),
(223, 1, '', '2013-12-17 08:15:27', 'delete an upload file', '9', '::1', NULL, NULL, NULL, NULL),
(224, 1, '', '2013-12-17 08:15:31', 'delete an upload file', '8', '::1', NULL, NULL, NULL, NULL),
(225, 1, 'login', '2013-12-20 07:15:35', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(226, 1, 'login', '2013-12-23 02:01:39', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(227, 1, 'login', '2013-12-27 04:30:50', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(228, 1, 'user', '2013-12-27 05:32:52', 'update', '8', '::1', NULL, NULL, NULL, NULL),
(229, 1, 'login', '2013-12-27 14:05:03', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(230, 1, 'login', '2013-12-28 22:17:21', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL);

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
(8, 'user3', 'user8ln', 'medrep2', '796b1161cddfd62aadc656d51685d0dc', 'user8email@gmail.com', 3, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(9, '', '', 'medrep3', '3a85cff098f1a0ed93b4f9a1e6ce597c', '', 3, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(10, '', '', 'medrep1.1', '2107a5a8889395d43cb2ac07a2ab720a', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(11, '', '', 'medrep1.1.1', '0dad8005ad28928dba2e5818fcd80a27', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'disabled'),
(12, '', '', 'client1', 'a165dd3c2e98d5d607181d0b87a4c66b', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(13, '', '', 'client2', '2c66045d4e4a90814ce9280272e510ec', '', 2, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(14, '', '', 'clientc', 'f162582f3429ccd5d48d97a5a66a88a0', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(15, '', '', 'clientn', '6aecf9182698283a29f3f9b16ea34e36', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(16, '', '', 'clientc2', 'c599ff8b9105024a61d22a2767ac349a', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(17, '', '', 'clientcn', '7cb24b15c8e0839be75ca9a5e5a4b516', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
