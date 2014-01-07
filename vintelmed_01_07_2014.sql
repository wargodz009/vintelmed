-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2014 at 07:56 AM
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
  `expire` date NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `lot_number` varchar(25) NOT NULL,
  `cavite_warehouse` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1- true, 0 - false',
  `status` enum('ordered','recieved','open') NOT NULL DEFAULT 'ordered',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `user_id`, `supplier_id`, `batch_id`, `item_count`, `sold_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `lot_number`, `cavite_warehouse`, `status`, `datetime`, `deleted`) VALUES
(2, 7, 4, 8, 'ph-73aa', 222, 3, '11/05/2013', '2013-12-31', '', '', '', 0, 'recieved', '2013-11-05 07:21:34', 0),
(3, 7, 4, 12, 'LGN177', 222, 2, '11/05/2013', '2013-12-31', '', '', '', 0, 'ordered', '2013-11-05 07:31:49', 0),
(5, 3, 1, 2, 'awaw', 2222, 6, '11/12/2013', '2014-12-31', '', '', '', 0, 'ordered', '2013-11-12 10:53:41', 1),
(6, 3, 1, 1, 'awaw', 11, 0, '11/06/2013', '2014-12-31', '', '', '', 0, 'ordered', '2013-11-27 07:49:23', 1),
(7, 9, 1, 2, 'sd32', 222, 0, '12/02/2013', '2013-12-31', '', '', '', 0, 'ordered', '2013-12-02 09:00:27', 0),
(8, 9, 2, 12, 'asdasd', 111, 0, '12/24/2013', '2015-12-31', '', '', '', 0, 'ordered', '2013-12-13 13:15:12', 0),
(9, 9, 2, 12, 'asdasd2', 22222, 0, '12/13/2013', '2015-12-31', '', '', '', 0, 'ordered', '2013-12-13 13:15:39', 0),
(10, 10, 2, 1, 'aaaaa', 10000, 3, '12/16/2013', '2013-12-29', '', '', '', 0, 'open', '2013-12-16 06:26:43', 0),
(11, 6, 2, 1, 'i00001', 1000, 3, '12/16/2013', '2013-12-28', '', '', '', 0, 'open', '2013-12-16 14:10:02', 0),
(12, 5, 2, 1, 'new11', 33, 3, '12/29/2013', '2013-12-30', '', '', '', 0, 'open', '2013-12-29 06:16:13', 0),
(13, 9, 1, 1, 'sadda', 22, 0, '12/29/2013', '2013-12-30', '', '', '', 0, 'ordered', '2013-12-30 12:13:36', 0),
(14, 8, 1, 8, 'fdfdfd', 1111, 0, '12/29/2013', '2013-12-31', '', '', '', 0, 'ordered', '2013-12-30 12:16:08', 0),
(15, 8, 1, 8, 'testbatch', 111, 0, '01/06/2014', '2015-01-31', '', '', '#111cd-24', 0, 'ordered', '2014-01-06 12:30:39', 0),
(16, 10, 1, 12, 'cvtewhse', 23232, 0, '01/07/2014', '2016-01-27', '', '', '#111cd-234', 1, 'ordered', '2014-01-07 06:47:27', 0);

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
  `status` enum('pending','declined','approved','completed','cancelled','returned') NOT NULL,
  `gm_approve_pre` int(255) NOT NULL DEFAULT '0' COMMENT 'first gm checkpoint',
  `gm_approve_post` int(255) NOT NULL DEFAULT '0' COMMENT '2nd gm checkpoint',
  `payment_type` varchar(255) NOT NULL DEFAULT '30_days',
  `form_number` varchar(255) NOT NULL,
  `date_completed` date NOT NULL,
  `date_cancelled` date NOT NULL,
  `return_id` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `item_batch_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `gm_approve_pre`, `gm_approve_post`, `payment_type`, `form_number`, `date_completed`, `date_cancelled`, `return_id`) VALUES
(1, 7, 3, 0, 3, '11', '2013-12-28 05:35:30', 11, 'completed', 1, 1, '30_days', 'sasasa', '2013-12-28', '0000-00-00', '0'),
(2, 7, 6, 0, 3, '7', '2013-12-27 05:35:47', 5, 'returned', 1, 1, '30_days', 'aaaaa', '2013-12-27', '2013-12-29', 'ret-001'),
(3, 7, 10, 0, 3, '55', '2013-12-29 05:36:13', 12, 'completed', 1, 1, '30_days', 'dddd', '2013-12-29', '0000-00-00', '0'),
(4, 8, 7, 0, 5, '8', '2013-12-29 05:53:45', 6, 'completed', 1, 1, '30_days', 'fffff', '2013-12-29', '0000-00-00', '0'),
(5, 10, 5, 0, 3, '5', '2013-12-29 06:15:30', 3, 'completed', 1, 1, '30_days', 'm1.1.1', '2013-12-29', '0000-00-00', '0'),
(6, 7, 3, 0, 3, '11', '2013-12-29 06:44:11', 5, 'completed', 1, 1, '30_days', 'cxcxcx', '2013-12-29', '0000-00-00', '0'),
(7, 8, 3, 0, 13, '11', '2013-12-29 06:45:44', 6, 'cancelled', 0, 0, '30_days', 'bogus2', '0000-00-00', '2013-12-29', '0'),
(8, 7, 6, 0, 100, '2', '2014-01-04 05:53:31', 5, 'pending', 0, 0, '30_days', '999xxx', '0000-00-00', '0000-00-00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `item_id`, `item_batch_id`, `quantity`, `status`) VALUES
(1, 2, 6, 11, 3, 'enabled'),
(2, 3, 10, 10, 3, 'enabled'),
(3, 1, 3, 5, 3, 'enabled'),
(4, 4, 7, 2, 3, 'enabled'),
(5, 4, 7, 3, 2, 'enabled'),
(6, 5, 5, 12, 3, 'enabled'),
(7, 6, 3, 5, 3, 'enabled');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_return`
--

INSERT INTO `order_return` (`orders_return_id`, `order_id`, `item_batch_id`, `return_quantity`, `remarks`, `datetime`, `status`) VALUES
(1, 2, 11, 3, 'failed', '2013-12-29 06:43:33', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `report_type`, `report_for`, `date_start`, `date_end`, `datetime`) VALUES
(1, 1, 'INVENTORY', '1', '12/27/2013', '12/31/2013', '2013-12-29 05:43:46'),
(2, 1, 'NEAR_EXPIRY', '', '12/30/2013', '', '2013-12-30 11:02:44'),
(3, 1, 'SUMMARY_OF_CRITICAL_STOCKS', '', '01/04/2014', '', '2014-01-04 05:19:59'),
(4, 1, 'MONTHLY_RETURN_GOODS_SLIP', '', '12/01/2013', '12/31/2013', '2014-01-06 11:19:42'),
(5, 1, 'MONTHLY_RETURN_GOODS_SLIP', '', '01/01/2014', '01/31/2014', '2014-01-06 12:42:02'),
(6, 1, 'MONTHLY_RETURN_GOODS_SLIP', '', '11/01/2013', '11/30/2013', '2014-01-06 12:43:17'),
(7, 1, 'MONTHLY_RETURN_GOODS_SLIP', '', '01/01/2014', '01/31/2014', '2014-01-06 12:44:33'),
(8, 1, 'MONTHLY_RETURN_GOODS_SLIP', '', '01/01/2014', '01/31/2014', '2014-01-06 12:46:53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(1, 1, 'login', '2013-12-29 05:35:07', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(2, 7, 'login', '2013-12-29 05:35:14', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(3, 7, 'login', '2013-12-29 05:36:19', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(4, 2, 'login', '2013-12-29 05:36:44', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(5, 2, 'order', '2013-12-29 05:39:30', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(6, 2, 'order', '2013-12-29 05:40:27', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(7, 2, 'order', '2013-12-29 05:40:39', 'update', '1', '::1', NULL, NULL, NULL, NULL),
(8, 2, 'login', '2013-12-29 05:42:15', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(9, 1, 'login', '2013-12-29 05:42:22', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(10, 1, 'login', '2013-12-29 05:42:35', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(11, 2, 'login', '2013-12-29 05:42:39', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(12, 2, 'order', '2013-12-29 05:42:55', 'completed an order', '2', '::1', NULL, NULL, NULL, NULL),
(13, 2, 'order', '2013-12-29 05:42:57', 'completed an order', '3', '::1', NULL, NULL, NULL, NULL),
(14, 2, 'order', '2013-12-29 05:43:00', 'completed an order', '1', '::1', NULL, NULL, NULL, NULL),
(15, 2, 'login', '2013-12-29 05:43:03', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(16, 1, 'login', '2013-12-29 05:43:08', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(17, 1, 'login', '2013-12-29 05:53:21', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(18, 8, 'login', '2013-12-29 05:53:26', NULL, 'login success', '::1', 'medrep2', NULL, NULL, NULL),
(19, 8, 'login', '2013-12-29 05:53:49', NULL, 'logout user', '::1', 'medrep2', NULL, NULL, NULL),
(20, 2, 'login', '2013-12-29 05:53:53', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(21, 2, 'order', '2013-12-29 05:54:09', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(22, 2, 'login', '2013-12-29 05:54:12', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(23, 1, 'login', '2013-12-29 05:54:16', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(24, 1, 'order', '2013-12-29 05:54:33', 'completed an order', '4', '::1', NULL, NULL, NULL, NULL),
(25, 1, 'login', '2013-12-29 06:15:06', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(26, 10, 'login', '2013-12-29 06:15:10', NULL, 'login success', '::1', 'medrep1.1', NULL, NULL, NULL),
(27, 10, 'login', '2013-12-29 06:15:34', NULL, 'logout user', '::1', 'medrep1.1', NULL, NULL, NULL),
(28, 2, 'login', '2013-12-29 06:15:38', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(29, 2, 'inventory item', '2013-12-29 06:16:13', 'create', '12', '::1', NULL, NULL, NULL, NULL),
(30, 2, 'order', '2013-12-29 06:16:23', 'update', '5', '::1', NULL, NULL, NULL, NULL),
(31, 2, 'login', '2013-12-29 06:16:31', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(32, 1, 'login', '2013-12-29 06:16:36', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(33, 1, 'order', '2013-12-29 06:16:45', 'completed an order', '5', '::1', NULL, NULL, NULL, NULL),
(34, 1, 'login', '2013-12-29 06:43:48', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(35, 7, 'login', '2013-12-29 06:43:53', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(36, 7, 'login', '2013-12-29 06:44:14', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(37, 2, 'login', '2013-12-29 06:44:18', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(38, 2, 'order', '2013-12-29 06:44:59', 'update', '6', '::1', NULL, NULL, NULL, NULL),
(39, 2, 'login', '2013-12-29 06:45:21', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(40, 8, 'login', '2013-12-29 06:45:28', NULL, 'login success', '::1', 'medrep2', NULL, NULL, NULL),
(41, 8, 'login', '2013-12-29 06:46:00', NULL, 'logout user', '::1', 'medrep2', NULL, NULL, NULL),
(42, 1, 'login', '2013-12-29 06:46:04', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(43, 1, 'order', '2013-12-29 06:46:19', 'completed an order', '6', '::1', NULL, NULL, NULL, NULL),
(44, 1, 'login', '2013-12-30 10:39:27', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(45, 1, 'inventory item', '2013-12-30 12:13:36', 'create', '13', '::1', NULL, NULL, NULL, NULL),
(46, 1, 'inventory item', '2013-12-30 12:16:08', 'create', '14', '::1', NULL, NULL, NULL, NULL),
(47, 1, 'login', '2014-01-04 05:12:35', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(48, 1, 'login', '2014-01-04 05:52:13', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(49, 0, 'login', '2014-01-04 05:52:23', NULL, 'login Failed - invalid username', '::1', 'medrep', NULL, NULL, NULL),
(50, 0, 'login', '2014-01-04 05:52:32', NULL, 'login Failed - invalid username', '::1', 'merep1', NULL, NULL, NULL),
(51, 1, 'login', '2014-01-04 05:52:36', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(52, 1, 'login', '2014-01-04 05:52:46', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(53, 7, 'login', '2014-01-04 05:52:50', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(54, 7, 'login', '2014-01-04 06:00:11', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(55, 1, 'login', '2014-01-04 06:00:14', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(56, 1, 'login', '2014-01-06 07:44:42', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(57, 1, 'login', '2014-01-06 10:53:23', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(58, 1, 'inventory item', '2014-01-06 12:30:39', 'create', '15', '::1', NULL, NULL, NULL, NULL),
(59, 1, '', '2014-01-06 12:42:02', 'create', '5', '::1', NULL, NULL, NULL, NULL),
(60, 1, '', '2014-01-06 12:43:17', 'create report for MONTHLY_RETURN_GOODS_SLIP', '6', '::1', NULL, NULL, NULL, NULL),
(61, 1, 'generate report', '2014-01-06 12:44:33', 'create report for MONTHLY_RETURN_GOODS_SLIP', '7', '::1', NULL, NULL, NULL, NULL),
(62, 1, 'generate report', '2014-01-06 12:46:53', 'create report', '8', '::1', NULL, NULL, NULL, NULL),
(63, 1, 'login', '2014-01-07 06:09:08', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(64, 1, 'inventory item', '2014-01-07 06:47:27', 'create', '16', '::1', NULL, NULL, NULL, NULL);

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
(7, 'medre1fname', 'medre1lname', 'medrep1', 'a857792ecd07fac5258be1bfac2fe980', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(8, 'user3', 'user8ln', 'medrep2', '796b1161cddfd62aadc656d51685d0dc', 'user8email@gmail.com', 3, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(9, '', '', 'medrep3', '3a85cff098f1a0ed93b4f9a1e6ce597c', '', 3, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(10, '', '', 'medrep1.1', '2107a5a8889395d43cb2ac07a2ab720a', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(11, '', '', 'medrep1.1.1', '0dad8005ad28928dba2e5818fcd80a27', '', 3, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'disabled'),
(12, 'cli1fname', 'cli1lname', 'client1', 'a165dd3c2e98d5d607181d0b87a4c66b', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(13, '', '', 'client2', '2c66045d4e4a90814ce9280272e510ec', '', 2, 1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(14, '', '', 'clientc', 'f162582f3429ccd5d48d97a5a66a88a0', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(15, '', '', 'clientn', '6aecf9182698283a29f3f9b16ea34e36', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(16, '', '', 'clientc2', 'c599ff8b9105024a61d22a2767ac349a', '', 2, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(17, '', '', 'clientcn', '7cb24b15c8e0839be75ca9a5e5a4b516', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
