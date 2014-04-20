-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 at 01:43 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `item_type_id`, `generic_name`, `description`, `price_standard`, `status`, `datetime`) VALUES
(1, 'SUMPILIN', 2, 'AMPICILLIN', '500MG', '0', 'enabled', '2014-02-11 18:57:36'),
(2, 'SUMPILIN', 2, 'AMPICILLIN', '250MG', '0', 'enabled', '2014-02-11 18:58:09'),
(3, 'UNASAN', 2, 'AMPICILLIN SODIUM+SULBACTAM SODIUM', '500MG/ 250MG', '0', 'enabled', '2014-02-11 18:59:49'),
(4, 'UNASAN', 2, 'AMPICILLIN SODIUM+SULBACTAM SODIUM', '1G/ 500MG', '0', 'enabled', '2014-02-11 19:00:32'),
(5, 'ASCORBIN', 2, 'ASCORBIC ACID', '100MG/ ML (500MG/ 5ML)- AMPOULE', '2.50', 'enabled', '2014-02-11 19:01:56'),
(6, 'HAZOLIN', 2, 'CEFAZOLIN SODIUM', '1G', '0', 'enabled', '2014-02-11 19:02:25'),
(7, 'EXTEMAX', 2, 'CEFEPIME HYDROCHLORIDE', '1G', '0', 'enabled', '2014-02-11 19:03:08'),
(8, 'LAC-XIM', 2, 'CEFOTAXIME', '1G', '0', 'enabled', '2014-02-11 19:03:54'),
(9, 'TAXIM', 2, 'CEFOTAXIME SODIUM', '1G', '0', 'enabled', '2014-02-11 19:04:20'),
(10, 'ZERONE', 2, 'CEFTRIAXONE SODIUM', '1G', '0', 'enabled', '2014-02-11 19:04:43'),
(11, 'COSEF', 2, 'CEFUROXIME SODIUM', '750MG', '0', 'enabled', '2014-02-11 19:05:15'),
(12, 'FUMERIX-750', 2, 'CEFUROXIME SODIUM', '750MG', '0', 'enabled', '2014-02-11 19:05:56'),
(13, 'KAFTAX', 2, 'CEFUROXIME SODIUM', '750MG', '0', 'enabled', '2014-02-11 19:06:24'),
(14, 'YUROCEF', 2, 'CEFUROXIME SODIUM', '750MG', '0', 'enabled', '2014-02-11 19:06:59'),
(15, 'PROSELOC I.V.', 2, 'CIPROFLOXACIN', '2MG/ ML- 100ML', '0', 'enabled', '2014-02-11 19:07:45'),
(16, 'ZYNDES', 2, 'CITICOLINE', '1G (250MG/ ML)- 4ML', '0', 'enabled', '2014-02-11 19:08:25'),
(17, 'DALACLIN', 2, 'CLINDAMYCIN PHOSPHATE', '150MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:09:17'),
(18, 'VHERDEX', 2, 'DEXAMETHASONE SODIUM', '4MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:10:24'),
(19, 'SEDATEL', 2, 'DIPHENHYDRAMINE HYDROCHLORIDE', '25MG/ ML', '0', 'enabled', '2014-02-11 19:11:08'),
(20, 'CARDOMIN', 2, 'DOBUTAMINE HYDROCHLORIDE', '12.5MG/ ML (250MG/ 20ML)', '0', 'enabled', '2014-02-11 19:12:06'),
(21, 'DOPAMAX', 2, 'DOPAMINE HYDROCHLORIDE', '40MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:12:57'),
(22, 'MYOCARD', 2, 'DOPAMINE HYDROCHLORIDE', '40MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:13:49'),
(23, 'DOPNAX', 2, 'DOPAMINE HYDROCHLORIDE', '40MG/ ML', '0', 'enabled', '2014-02-11 19:14:14'),
(24, 'VHERMID', 2, 'FUROSEMIDE', '10MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:14:43'),
(25, 'GENTAXIN', 2, 'GENTAMICIN SULFATE', '40MG/ ML', '0', 'enabled', '2014-02-11 19:15:40'),
(26, 'HYCORT', 2, 'HYDROCORTISONE SODIUM SUCCINATE', '100MG', '0', 'enabled', '2014-02-11 19:16:23'),
(27, 'KETOSEA', 2, 'KETOROLAC TROMETAMOL', '30MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:17:08'),
(28, 'PENTOLAC', 2, 'KETOROLAC TROMETHAMOL', '30MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:17:45'),
(29, 'MEROSAN 1000', 2, 'MEROPENEM', '1G', '0', 'enabled', '2014-02-11 19:18:13'),
(30, 'METROCOR', 2, 'METRONIDAZOLE', '5MG/ ML- 100ML', '0', 'enabled', '2014-02-11 19:18:49'),
(31, 'ERZOL', 2, 'METRONIDAZOLE', '5MG/ ML- 100ML', '0', 'enabled', '2014-02-11 19:19:32'),
(32, 'ULCEZE', 2, 'OMEPRAZOLE', '40MG', '0', 'enabled', '2014-02-11 19:19:52'),
(33, 'SUPREZOL', 2, 'OMEPRAZOLE', '40MG', '0', 'enabled', '2014-02-11 19:20:12'),
(34, 'FEVERIN', 2, 'PARACETAMOL', '150MG/ ML- AMPOULE', '0', 'enabled', '2014-02-11 19:20:44'),
(35, 'CLESSOL', 2, 'PANTOPRAZOLE SODIUM', '40MG', '0', 'enabled', '2014-02-11 19:21:08'),
(36, 'BACTAZ', 2, 'PIPERACILLIN SODIUM+TAZOBACTAM SODIUM', '4G/ 500MG', '0', 'enabled', '2014-02-11 19:22:15'),
(37, 'CONTRACID', 2, 'RANITIDINE HYDROCHLORIDE', '25MG/ ML (50MG/ 2ML)', '0', 'enabled', '2014-02-11 19:23:04'),
(38, 'VHERADOL', 2, 'TRAMADOL HYDROCHLORIDE', '100MG', '0', 'enabled', '2014-02-11 19:23:30'),
(39, 'NEUROBE', 2, 'VITAMIN B1+B6+B12', '100MG/ 100MG/ 1MG- 3ML', '0', 'enabled', '2014-02-11 19:24:13'),
(40, 'SUMPILIN', 2, 'SUMPILIN', '500MG', '2', 'disabled', '2014-04-13 17:20:52'),
(41, 'sample', 1, 'sample', 'sample', '11', 'enabled', '2014-04-13 17:22:18');

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
-- Table structure for table `item_batch_history`
--

CREATE TABLE IF NOT EXISTS `item_batch_history` (
  `item_batch_history_id` int(255) NOT NULL AUTO_INCREMENT,
  `item_batch_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_batch_history_id`)
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
(1, 'vial'),
(2, 'oral');

-- --------------------------------------------------------

--
-- Table structure for table `msr_clients`
--

CREATE TABLE IF NOT EXISTS `msr_clients` (
  `msr_client_id` int(255) NOT NULL AUTO_INCREMENT,
  `msr_id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  PRIMARY KEY (`msr_client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `notify_type` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notify_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `discount` int(10) NOT NULL DEFAULT '0',
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
  `invoice_id` varchar(255) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `check_number` varchar(100) NOT NULL,
  `check_full_amount` varchar(100) NOT NULL,
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
(6, 'human resource');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `status`) VALUES
(1, 'SKPD JEN INC.', 1),
(2, 'AMBICA INTERNATIONAL TRADING CORP.', 1),
(3, 'SUHITAS PHARMACEUTICALS INC.', 1),
(4, 'EUROHEALTHCARE EXPONENTS', 1),
(5, 'ELLEBASY MEDICALE TRADING', 1),
(6, 'BERACAH PHARMA PHILS., INC.', 1),
(7, 'AR-LY PHARMA DISTRIBUTION', 1),
(8, 'ZUNECA INC.', 1),
(9, 'ST. MARTIN PHARMACEUTICAL LAB INC.', 1),
(10, 'FORAMEN PRODUCTS CORP.', 1),
(11, 'SEL-J', 1),
(12, 'GENPHARMA INC.', 1),
(13, 'BETTER OPTIONS PHARMACEUTICALS INC.', 1),
(14, 'GROWRICH MANUFACTURING INC.', 1),
(15, 'MEDETHIX INC.', 1),
(16, 'CANOMED CORP.', 1),
(17, 'ENDURE MEDICAL INC.', 1),
(18, 'PLANETARIUM ENTERPRISE', 1),
(19, 'FERJ''S PHARMACY', 1),
(20, 'PHARMA JOY DRUG TRADING INC.', 1),
(21, 'VHERMANN PHARMACEUTICAL INC.', 1),
(22, 'MARZAN PHARMA CORP.', 1),
(23, 'TRIPLE TACT IMPORT & EXPORT CORP.', 1),
(24, 'GREENCORE PHARMA INC.', 1),
(25, 'SAVERMED MARKETING CORP.', 1),
(26, 'I.E. MEDICA', 1),
(27, 'STEINBACH', 1),
(28, 'KYLEMED INCORPORATED', 1),
(29, 'MEDICAL GENERICS MARKETING CO.', 1),
(30, 'INTERLINK PHARMA MARKETING CORP.', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`setting_id`, `name`, `type`, `option`, `group`, `display_name`, `value`) VALUES
(1, 'time_open', 'time', '', 'system settings', 'Time Open', '06:00 am'),
(2, 'time_close', 'time', '', 'system setting', 'Time Close', '05:59 pm'),
(3, 'time_zone', 'select', 'Asia/Manila,Asia/Macao,Asia/Bangkok', 'system settings', 'Time Zone', 'Asia/Manila'),
(4, 'expire_near', 'text', '', 'items', 'Near Expire (months)', '2'),
(5, 'empty_near', 'text', '', 'items', 'Critical limit', '300'),
(6, 'critical_percent', 'text', '', 'items', 'Critical %', '10');

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
  `quota` int(11) NOT NULL DEFAULT '0',
  `district_id` int(255) NOT NULL,
  `area` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `role_id`, `quota`, `district_id`, `area`, `hospital`, `hospital_address`, `outlet`, `outlet_address`, `owner`, `owner_landline`, `owner_mobile`, `recipient_firstname`, `recipient_middlename`, `recipient_lastname`, `position`, `recipient_landline`, `recipient_mobile`, `address_number`, `address_street`, `address_municipality`, `civil_status`, `residence_type`, `residence_years`, `residence_months`, `home_telephone`, `mobile_number`, `spouse_firstname`, `spouse_middlename`, `spouse_lastname`, `spouse_birthdate`, `spouse_business`, `spouse_business_address`, `spouse_telephone`, `spouse_position`, `spouse_employment_tenure_years`, `spouse_employment_tenure_months`, `status`) VALUES
(1, 'jay-ar', 'mundala', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jayar_mundala@yahoo.com', 1, 0, 0, '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(26, '', '', 'stocksoffice', 'bc6049c67508d4ac07c4413f5a4e928d', '', 4, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(27, 'Rich', 'abejuela', 'hrd', '4bf31e6f4b818056eaacb83dff01c9b8', 'rich@email.com', 6, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'single', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(28, 'Dexter', 'Ballester', 'centralmsr', '832947fabba50c8946bd4aea16168258', 'dexter@gmail.com', 3, 500000, 2, 's1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(29, 'Sta. Cruz Hospital', ' ', 'centralbul1', '5d71d17382aebb3bec77d348a009efc5', 'stacruz@rmail.com', 2, 0, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123', 'somewhere street', 'some municipality', 'single', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(31, 'Carlos', 'Dela Cruz Jr', 'msrcarlos', '3a00d2023de1583a70f521f34fcc99f5', 'delacruz@gmail.com', 3, 500000, 2, 's2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(32, 'Norman', 'Rabago', 'norman', '9ac915832a9a1c970c1564708917c3aa', '', 2, 0, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(33, 'Gratechen', 'Llanes', 'chen', 'a1a8887793acfc199182a649e905daab', 'llandes@gmail.com', 3, 500000, 3, 'n1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(34, 'Sta. Teresita ', 'Hospital', 'teresita', '959b6c3fdc6ce4e08176e783d01ffc5d', '', 2, 0, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(35, 'Dra. Ma. Elena', 'Sayo', 'Elena', '6413f966377526ba85ec57b1ad748901', '', 2, 0, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(36, 'Jesus of Nazareth Hospital', 'Nazareth', 'Hospital', 'cc2ab63fd3eb564be64b4f21bd083bc7', '', 2, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(37, 'Omar', 'Adora', 'Adora', 'a3612d766a08326e6e200835ec374588', 'omar@gmail.com', 3, 500000, 1, 's3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(38, 'Jnae', 'Morillo', 'Morillo', '827cb61aa9f0d8849b4913993d4f6bfa', 'jane@gmail.com', 3, 500000, 1, 's4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(39, 'Reynaldo', 'Ramos', 'Ramos', '9d790c636ca1469d3f978cdda99c7439', 'ramos@gmail.com', 3, 0, 1, 's5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(40, 'Dondee', 'Eusebio', 'Eusebio', 'a537bf9344f6b768b22bfb2be8df2c0a', 'dondee@gmail.com', 3, 500000, 1, 's6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(41, 'Our Lady of Caysasay Medical Center', 'Caysasay', 'Caysasay', '15210736863913bae417ad295903e082', '', 2, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(42, 'Efren', 'Alicuman', 'efren', 'da4d2cec137363860d4dffb359708aa2', 'efren@gmail.com', 3, 500000, 3, 'n2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(43, 'accountant', 'mundala', 'accountant', '56f97f482ef25e2f440df4a424e2ab1e', 'accountant@gmail.com', 5, 0, 1, 's1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(44, 'warehouseman', 'mundala', 'warehouseman', 'b56b651bd46d63f3f0fad79a98ae66d5', '', 4, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
