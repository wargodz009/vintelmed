-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2013 at 09:07 AM
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
  `supplier_id` int(255) NOT NULL,
  `batch_id` varchar(50) NOT NULL,
  `item_count` int(255) NOT NULL,
  `recieve_date` varchar(100) NOT NULL,
  `expire` varchar(50) NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `supplier_id`, `batch_id`, `item_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `datetime`) VALUES
(2, 6, 8, 'ph-73aa', 222, '11/05/2013', '11/30/2015', '', '', '2013-11-05 07:21:34'),
(3, 7, 12, 'LGN177', 2222, '11/05/2013', '11/30/2016', '', '', '2013-11-05 07:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE IF NOT EXISTS `item_order` (
  `item_order_id` int(255) NOT NULL AUTO_INCREMENT,
  `item_id` int(255) NOT NULL,
  `batch_id` int(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `quantity` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msr_client_id` int(255) NOT NULL,
  `status` enum('pending','declined','approved','cancelled') NOT NULL,
  `form_number` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `form_number`) VALUES
(4, 7, 3, 2, '11', '2013-11-08 06:21:09', 11, 'pending', '12345'),
(5, 7, 10, 1, '55', '2013-11-08 06:21:41', 5, 'pending', '123cl1'),
(6, 7, 4, 1, '22', '2013-11-08 06:25:26', 12, 'pending', 'cl3-223'),
(7, 11, 8, 1, '2', '2013-11-08 08:00:19', 4, 'pending', 'so001');

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
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`) VALUES
(1, 'SKPD JEN INC'),
(2, 'AMBICA INTERNATIONAL TRADING CORP.'),
(3, 'SUHITAS PHARMACEUTICALS INC.'),
(4, 'EUROHEALTHCARE EXPONENTS'),
(5, 'ELLEBASY MEDICALE'),
(6, 'BERACAH PHARMA PHILS INC'),
(7, 'AR-LY PHARMA DISTRIBUTION'),
(8, 'ZUNECA INC'),
(9, 'FERJ''S PHARMACY'),
(10, 'MARAN PHARMA CORP'),
(11, 'CANOMED CORP'),
(12, 'SEL-J'),
(13, 'ENDURE MEDICAL INC'),
(14, 'PLANETARIUM'),
(15, 'VHERMANN PHARMACEUTICAL INC'),
(17, 'AMBICA INTERNATIONAL TRADING CORP.');

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE IF NOT EXISTS `system_logs` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `type` enum('login','inventory','report','user','admin','others','order') DEFAULT 'others',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(255) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `fingerprint` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `item_id` int(255) DEFAULT NULL,
  `transaction_id` int(255) DEFAULT NULL,
  `report_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(4, 0, 'login', '2013-10-24 03:56:10', '', 'login Failed - invalid username', '::1', 'administrator', 0, 0, 0),
(5, 0, 'login', '2013-10-24 04:00:36', '', 'login Failed - invalid username', '::1', 'administrator', 0, 0, 0),
(6, 0, 'login', '2013-10-24 04:11:48', '', 'login Failed - invalid username', '::1', 'testuser', 0, 0, 0),
(7, 0, 'login', '2013-10-24 04:11:52', '', 'login Failed - incorrect password', '::1', 'admin', 0, 0, 0),
(8, 1, 'login', '2013-10-24 04:11:58', '', 'login success', '::1', 'admin', 0, 0, 0),
(9, 1, 'login', '2013-10-24 05:35:17', '', 'logout user', '::1', 'admin', 0, 0, 0),
(10, 1, 'login', '2013-10-24 05:49:54', '', 'login success', '::1', 'admin', 0, 0, 0),
(11, 1, 'login', '2013-10-24 06:35:41', '', 'logout user', '::1', 'admin', 0, 0, 0),
(12, 1, 'login', '2013-10-24 06:37:26', '', 'login success', '::1', 'admin', 0, 0, 0),
(13, 1, 'login', '2013-10-25 02:21:01', '', 'login success', '::1', 'admin', 0, 0, 0),
(14, 1, 'login', '2013-10-29 03:58:15', '', 'login success', '::1', 'admin', 0, 0, 0),
(15, 1, 'login', '2013-10-29 04:25:55', '', 'logout user', '::1', 'admin', 0, 0, 0),
(16, 3, 'login', '2013-10-29 04:26:00', '', 'login success', '::1', 'client', 0, 0, 0),
(17, 3, 'login', '2013-10-29 04:26:08', '', 'logout user', '::1', 'client', 0, 0, 0),
(18, 0, 'login', '2013-10-29 04:33:11', '', 'login Failed - incorrect password', '::1', '0', 0, 0, 0),
(19, 1, 'login', '2013-10-29 04:33:14', '', 'login success', '::1', 'admin', 0, 0, 0),
(20, 1, 'user', '2013-10-29 04:47:45', 'delete', '8', '::1', NULL, NULL, NULL, NULL),
(21, 1, 'user', '2013-10-29 04:48:02', 'create', '9', '::1', NULL, NULL, NULL, NULL),
(22, 1, 'user', '2013-10-29 04:48:24', 'update', '9', '::1', NULL, NULL, NULL, NULL),
(23, 1, 'user', '2013-10-29 04:48:29', 'delete', '9', '::1', NULL, NULL, NULL, NULL),
(24, 1, 'inventory', '2013-10-29 04:52:27', 'create', '11', '::1', NULL, NULL, NULL, NULL),
(25, 1, 'inventory', '2013-10-29 04:52:34', 'update', '11', '::1', NULL, NULL, NULL, NULL),
(26, 1, 'inventory', '2013-10-29 04:52:37', 'delete', '11', '::1', NULL, NULL, NULL, NULL),
(27, 1, 'inventory', '2013-10-29 07:24:58', 'create', '12', '::1', NULL, NULL, NULL, NULL),
(28, 1, 'inventory', '2013-10-29 07:25:06', 'update', '12', '::1', NULL, NULL, NULL, NULL),
(29, 1, 'inventory', '2013-10-29 07:25:11', 'update', '12', '::1', NULL, NULL, NULL, NULL),
(30, 1, 'inventory', '2013-10-29 07:25:14', 'delete', '12', '::1', NULL, NULL, NULL, NULL),
(31, 1, 'login', '2013-10-30 04:23:22', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(32, 1, 'login', '2013-10-30 04:48:29', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(33, 0, 'login', '2013-10-30 04:48:33', NULL, 'login Failed - invalid username', '::1', 'jayar', NULL, NULL, NULL),
(34, 1, 'login', '2013-10-30 04:48:37', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(35, 1, 'login', '2013-10-30 05:18:33', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(36, 1, 'login', '2013-10-30 05:18:37', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(37, 1, 'inventory', '2013-10-30 05:19:22', 'create', '11', '::1', NULL, NULL, NULL, NULL),
(38, 1, 'inventory', '2013-10-30 05:19:32', 'delete', '11', '::1', NULL, NULL, NULL, NULL),
(39, 1, 'inventory', '2013-10-30 05:22:49', 'create', '12', '::1', NULL, NULL, NULL, NULL),
(40, 1, 'inventory', '2013-10-30 05:22:59', 'update', '12', '::1', NULL, NULL, NULL, NULL),
(41, 1, 'inventory', '2013-10-30 05:23:03', 'delete', '12', '::1', NULL, NULL, NULL, NULL),
(42, 1, 'inventory', '2013-10-30 05:27:23', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(43, 1, 'inventory', '2013-10-30 05:27:53', 'update', '10', '::1', NULL, NULL, NULL, NULL),
(44, 1, 'inventory', '2013-10-30 05:28:03', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(45, 1, 'inventory', '2013-10-30 05:29:03', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(46, 1, 'inventory', '2013-10-30 05:29:26', 'update', '4', '::1', NULL, NULL, NULL, NULL),
(47, 1, 'inventory', '2013-10-30 05:55:54', 'create', '13', '::1', NULL, NULL, NULL, NULL),
(48, 1, 'inventory', '2013-10-30 05:56:03', 'delete', '13', '::1', NULL, NULL, NULL, NULL),
(49, 1, 'login', '2013-10-30 09:54:37', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(50, 1, 'user', '2013-10-30 10:33:23', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(51, 1, 'user', '2013-10-30 10:34:26', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(52, 1, 'user', '2013-10-30 10:34:34', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(53, 1, 'user', '2013-10-30 10:34:46', 'update', '2', '::1', NULL, NULL, NULL, NULL),
(54, 1, 'login', '2013-10-31 03:02:22', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(55, 1, 'user', '2013-10-31 03:34:15', 'create', '6', '::1', NULL, NULL, NULL, NULL),
(56, 1, 'user', '2013-10-31 03:34:45', 'delete', '6', '::1', NULL, NULL, NULL, NULL),
(57, 1, 'user', '2013-10-31 03:43:49', 'delete', '4', '::1', NULL, NULL, NULL, NULL),
(58, 1, 'user', '2013-10-31 03:43:54', 'activate', '4', '::1', NULL, NULL, NULL, NULL),
(59, 1, 'user', '2013-10-31 03:44:00', 'delete', '1', '::1', NULL, NULL, NULL, NULL),
(60, 1, 'user', '2013-10-31 03:44:04', 'activate', '1', '::1', NULL, NULL, NULL, NULL),
(61, 1, 'user', '2013-10-31 03:44:08', 'delete', '5', '::1', NULL, NULL, NULL, NULL),
(62, 1, 'user', '2013-10-31 03:44:11', 'activate', '5', '::1', NULL, NULL, NULL, NULL),
(63, 1, 'user', '2013-10-31 03:47:05', 'delete', '5', '::1', NULL, NULL, NULL, NULL),
(64, 1, 'login', '2013-10-31 03:47:11', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(65, 5, 'login', '2013-10-31 03:47:21', NULL, 'login failed. user disabled', '::1', 'manager', NULL, NULL, NULL),
(66, 5, 'login', '2013-10-31 03:47:42', NULL, 'logout user', '::1', 'manager', NULL, NULL, NULL),
(67, 1, 'login', '2013-10-31 03:47:47', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(68, 1, 'login', '2013-10-31 03:48:47', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(69, 5, 'login', '2013-10-31 03:48:52', NULL, 'login failed. user disabled', '::1', 'manager', NULL, NULL, NULL),
(70, 1, 'login', '2013-10-31 03:49:00', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(71, 1, 'user', '2013-10-31 03:49:15', 'activate', '5', '::1', NULL, NULL, NULL, NULL),
(72, 1, 'user', '2013-10-31 04:02:01', 'create', '7', '::1', NULL, NULL, NULL, NULL),
(73, 1, 'user', '2013-10-31 04:02:15', 'create', '8', '::1', NULL, NULL, NULL, NULL),
(74, 1, 'user', '2013-10-31 04:02:31', 'create', '9', '::1', NULL, NULL, NULL, NULL),
(75, 1, 'user', '2013-10-31 04:04:56', 'create', '10', '::1', NULL, NULL, NULL, NULL),
(76, 1, 'user', '2013-10-31 04:07:11', 'create', '11', '::1', NULL, NULL, NULL, NULL),
(77, 1, 'user', '2013-10-31 04:58:09', 'create', '12', '::1', NULL, NULL, NULL, NULL),
(78, 1, 'user', '2013-10-31 04:58:54', 'create', '13', '::1', NULL, NULL, NULL, NULL),
(79, 1, 'user', '2013-10-31 04:59:07', 'create', '14', '::1', NULL, NULL, NULL, NULL),
(80, 1, 'user', '2013-10-31 04:59:20', 'create', '15', '::1', NULL, NULL, NULL, NULL),
(81, 1, 'user', '2013-10-31 04:59:34', 'create', '16', '::1', NULL, NULL, NULL, NULL),
(82, 1, 'user', '2013-10-31 04:59:54', 'create', '17', '::1', NULL, NULL, NULL, NULL),
(83, 1, 'login', '2013-11-04 06:19:02', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(84, 1, 'login', '2013-11-05 03:58:05', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(85, 1, 'login', '2013-11-05 07:12:59', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(86, 3, 'login', '2013-11-05 07:13:05', NULL, 'login success', '::1', 'client', NULL, NULL, NULL),
(87, 3, 'login', '2013-11-05 07:13:13', NULL, 'logout user', '::1', 'client', NULL, NULL, NULL),
(88, 1, 'login', '2013-11-05 07:13:16', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(89, 1, 'login', '2013-11-05 07:14:20', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(90, 4, 'login', '2013-11-05 07:14:30', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(91, 4, 'login', '2013-11-05 07:15:07', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(92, 4, 'login', '2013-11-05 07:15:11', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(93, 1, 'login', '2013-11-06 04:38:13', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(95, 7, 'login', '2013-11-06 08:24:36', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(96, 7, 'login', '2013-11-06 08:47:43', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(97, 1, 'login', '2013-11-06 08:47:46', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(98, 1, 'login', '2013-11-06 08:49:22', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(99, 7, 'login', '2013-11-06 08:49:31', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(100, 1, 'login', '2013-11-07 00:28:58', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(101, 1, 'login', '2013-11-07 02:57:59', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(102, 1, 'user', '2013-11-07 03:52:48', 'update', '1', '::1', NULL, NULL, NULL, NULL),
(103, 1, 'login', '2013-11-07 08:36:01', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(104, 1, 'login', '2013-11-07 08:36:26', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(105, 3, 'login', '2013-11-07 08:36:29', NULL, 'login success', '::1', 'client', NULL, NULL, NULL),
(106, 3, 'user', '2013-11-07 09:00:01', 'update', '3', '::1', NULL, NULL, NULL, NULL),
(107, 3, 'login', '2013-11-07 09:12:16', NULL, 'logout user', '::1', 'client', NULL, NULL, NULL),
(108, 1, 'login', '2013-11-07 09:12:55', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(109, 1, 'login', '2013-11-07 09:13:11', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(110, 0, 'login', '2013-11-07 09:13:19', NULL, 'login Failed - incorrect password', '::1', 'accountant', NULL, NULL, NULL),
(111, 2, 'login', '2013-11-07 09:13:27', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(112, 7, 'login', '2013-11-08 02:37:27', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(113, 7, 'login', '2013-11-08 07:52:11', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(114, 8, 'login', '2013-11-08 07:52:18', NULL, 'login success', '::1', 'medrep2', NULL, NULL, NULL),
(115, 8, 'login', '2013-11-08 07:55:31', NULL, 'logout user', '::1', 'medrep2', NULL, NULL, NULL),
(116, 11, 'login', '2013-11-08 07:55:37', NULL, 'login success', '::1', 'medrep1.1.1', NULL, NULL, NULL),
(117, 11, 'login', '2013-11-08 08:00:25', NULL, 'logout user', '::1', 'medrep1.1.1', NULL, NULL, NULL),
(118, 7, 'login', '2013-11-08 08:00:29', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL);

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
(1, 'time_open', 'time', '', 'system settings', 'Time Open', '8:00 AM'),
(2, 'time_close', 'time', '', 'system setting', 'Time Close:', '6:00 PM'),
(3, 'time_zone', 'select', 'Asia/Manila,Asia/Macao,Asia/Bangkok', 'system settings', 'Time Zone', 'Asia/Manila'),
(4, 'expire_near', 'text', '', 'items', 'Near Expire (months)', '6'),
(5, 'empty_near', 'text', '', 'items', 'Critical limit', '200');

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
