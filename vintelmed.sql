-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2014 at 11:01 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(1, 1, 'upload', '2014-01-20 05:47:00', 'uploaded a file', '3', '::1', NULL, 8, NULL, NULL),
(2, 1, 'login', '2014-01-20 05:58:32', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(3, 7, 'login', '2014-01-20 05:58:41', NULL, 'login success', '::1', 'medrep1', NULL, NULL, NULL),
(4, 7, 'login', '2014-01-20 06:00:08', NULL, 'logout user', '::1', 'medrep1', NULL, NULL, NULL),
(5, 4, 'login', '2014-01-20 06:00:12', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(6, 4, 'login', '2014-01-20 06:00:33', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(7, 2, 'login', '2014-01-20 06:00:47', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(8, 2, 'login', '2014-01-20 06:01:32', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(9, 1, 'login', '2014-01-20 08:18:03', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(17, '', '', 'clientcn', '7cb24b15c8e0839be75ca9a5e5a4b516', '', 2, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(18, '', '', 'sample_new_user', '43c40e97f17e53cb59a4c2fbe5c3c1f3', '', 3, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(19, '', '', 'sampleclient1', 'sampleclient1', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(20, '', '', 'sampleclient2', 'sampleclient2', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(21, '', '', 'dsada', '0df01ae7dd51cec48fed56952f40842b', '', 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'disabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
