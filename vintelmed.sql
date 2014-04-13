-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2014 at 10:05 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_batch`
--

INSERT INTO `item_batch` (`item_batch_id`, `item_id`, `user_id`, `supplier_id`, `batch_id`, `item_count`, `sold_count`, `recieve_date`, `expire`, `buy_price`, `sell_price`, `lot_number`, `cavite_warehouse`, `status`, `datetime`, `deleted`) VALUES
(1, 5, 44, 1, 'b-1223x', 10000, 4111, '04/11/2014', '2017-04-28', '', '2.50', '', 1, 'recieved', '2014-04-11 12:03:53', 0),
(2, 5, 44, 1, 'b-122xx', 5000, 3000, '04/11/2014', '2019-04-29', '', '2.9', '', 0, 'recieved', '2014-04-12 14:05:54', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `msr_clients`
--

INSERT INTO `msr_clients` (`msr_client_id`, `msr_id`, `client_id`) VALUES
(8, 28, 35),
(9, 42, 34),
(10, 42, 34),
(11, 42, 32),
(12, 28, 30),
(16, 28, 30),
(20, 37, 32),
(21, 37, 34),
(22, 37, 35),
(23, 37, 36),
(24, 37, 41),
(25, 40, 32),
(26, 40, 34),
(27, 38, 34),
(28, 28, 29),
(29, 31, 29),
(30, 33, 29),
(31, 37, 29);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `msr_id`, `item_id`, `item_batch_id`, `quantity`, `price`, `datetime`, `msr_client_id`, `status`, `gm_approve_pre`, `gm_approve_post`, `payment_type`, `form_number`, `date_completed`, `date_cancelled`, `return_id`) VALUES
(1, 37, 5, 0, 5000, '2', '2014-04-11 12:04:41', 20, 'returned', 1, 0, '30_days', 'so0001', '2014-04-11', '2014-04-11', ''),
(2, 37, 5, 0, 3000, '2', '2014-04-12 14:11:40', 24, 'completed', 1, 1, '30_days', 'so0011', '2014-04-12', '0000-00-00', ''),
(3, 28, 5, 0, 1000, '2', '2014-04-12 18:16:28', 12, 'completed', 1, 1, '30_days', 'so0001', '2014-04-12', '0000-00-00', ''),
(4, 37, 5, 0, 1000, '2', '2014-04-12 19:07:11', 20, 'completed', 1, 1, '30_days', 'so0999', '2014-04-13', '0000-00-00', ''),
(5, 40, 5, 0, 1111, '2', '2014-04-12 19:08:44', 26, 'completed', 1, 1, '30_days', 'so677', '2014-04-13', '0000-00-00', ''),
(6, 28, 5, 0, 1000, '2', '2014-04-13 17:29:00', 12, 'completed', 1, 1, '30_days', 'asdas', '2014-04-13', '0000-00-00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `item_id`, `item_batch_id`, `quantity`, `status`) VALUES
(1, 1, 5, 1, 5000, 'enabled'),
(2, 2, 5, 2, 3000, 'enabled'),
(3, 3, 5, 1, 1000, 'enabled'),
(4, 4, 5, 1, 1000, 'enabled'),
(5, 5, 5, 1, 1111, 'enabled'),
(6, 6, 5, 1, 1000, 'enabled');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_pay`
--

INSERT INTO `order_pay` (`order_id`, `order_pay_id`, `amount`, `invoice_id`, `bank`, `check_number`, `check_full_amount`, `datetime`, `status`) VALUES
(2, 1, 2, '', '', '', '', '2014-04-13 19:19:40', 0),
(3, 2, 2, '', '', '', '', '2014-04-13 19:19:58', 0),
(4, 3, 2000, '', '', '', '', '2014-04-13 19:20:11', 0);

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
(1, 1, 1, 5000, 'expired', '2014-04-11 12:05:40', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `report_type`, `report_for`, `date_start`, `date_end`, `datetime`) VALUES
(1, 44, 'INVENTORY', '1', '04/01/2014', '04/30/2014', '2014-04-13 16:41:29'),
(2, 44, 'INVENTORY', '2', '04/01/2014', '04/30/2014', '2014-04-13 16:41:49');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `user_id`, `type`, `date`, `action`, `response`, `fingerprint`, `username`, `item_id`, `transaction_id`, `report_id`) VALUES
(1, 43, 'login', '2014-04-11 12:03:22', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(2, 44, 'login', '2014-04-11 12:03:26', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(3, 44, 'inventory item', '2014-04-11 12:03:53', 'create', '1', '::1', NULL, NULL, NULL, NULL),
(4, 44, 'login', '2014-04-11 12:04:06', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(5, 43, 'login', '2014-04-11 12:04:09', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(6, 43, 'login', '2014-04-11 12:04:46', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(7, 1, 'login', '2014-04-11 12:04:49', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(8, 1, 'login', '2014-04-11 12:04:56', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(9, 43, 'login', '2014-04-11 12:04:59', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(10, 43, 'login', '2014-04-11 12:05:03', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(11, 44, 'login', '2014-04-11 12:05:12', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(12, 43, 'order', '2014-04-11 12:05:26', 'completed an order', '1', '::1', NULL, NULL, NULL, NULL),
(13, 44, 'login', '2014-04-12 13:01:44', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(14, 44, 'login', '2014-04-12 13:12:12', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(15, 1, 'login', '2014-04-12 13:12:16', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(16, 1, 'login', '2014-04-12 13:12:32', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(17, 44, 'login', '2014-04-12 13:12:35', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(18, 44, 'login', '2014-04-12 13:24:07', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(19, 1, 'login', '2014-04-12 13:24:11', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(20, 1, 'login', '2014-04-12 13:29:56', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(21, 44, 'login', '2014-04-12 13:29:59', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(22, 44, 'inventory item', '2014-04-12 14:05:54', 'create', '2', '::1', NULL, NULL, NULL, NULL),
(23, 44, 'login', '2014-04-12 14:10:45', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(24, 43, 'login', '2014-04-12 14:10:49', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(25, 43, 'login', '2014-04-12 14:11:44', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(26, 1, 'login', '2014-04-12 14:11:47', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(27, 1, 'login', '2014-04-12 14:11:55', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(28, 43, 'login', '2014-04-12 14:11:58', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(29, 43, 'order', '2014-04-12 14:12:08', 'completed an order', '2', '::1', NULL, NULL, NULL, NULL),
(30, 43, 'login', '2014-04-12 14:12:13', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(31, 44, 'login', '2014-04-12 14:12:16', NULL, 'login success', '::1', 'warehouseman', NULL, NULL, NULL),
(32, 44, 'login', '2014-04-12 14:30:00', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(33, 1, 'login', '2014-04-12 14:30:04', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(34, 1, 'setting', '2014-04-12 14:30:41', 'update', '6', '::1', NULL, NULL, NULL, NULL),
(35, 1, 'login', '2014-04-12 14:34:53', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(36, 43, 'login', '2014-04-12 14:34:56', NULL, 'login success', '::1', 'accountant', NULL, NULL, NULL),
(37, 43, 'login', '2014-04-12 14:51:45', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(38, 1, 'login', '2014-04-12 14:51:49', NULL, 'login success', '::1', 'admin', NULL, NULL, NULL),
(39, 1, 'login', '2014-04-12 16:00:18', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(40, 1, 'login', '2014-04-12 17:57:52', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(41, 44, 'login', '2014-04-12 17:57:56', NULL, 'emergency login success', '::1', 'warehouseman', NULL, NULL, NULL),
(42, 44, 'login', '2014-04-12 17:58:04', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(43, 43, 'login', '2014-04-12 17:58:10', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(44, 43, 'login', '2014-04-12 18:00:32', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(45, 44, 'login', '2014-04-12 18:00:37', NULL, 'emergency login success', '::1', 'warehouseman', NULL, NULL, NULL),
(46, 44, 'inventory item', '2014-04-12 18:01:02', 'update', '1', '::1', NULL, NULL, NULL, NULL),
(47, 44, 'inventory item', '2014-04-12 18:01:52', 'update', '1', '::1', NULL, NULL, NULL, NULL),
(48, 44, 'login', '2014-04-12 18:10:02', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(49, 1, 'login', '2014-04-12 18:10:07', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(50, 1, 'login', '2014-04-12 18:14:48', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(51, 1, 'login', '2014-04-12 18:14:52', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(52, 1, 'login', '2014-04-12 18:15:13', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(53, 43, 'login', '2014-04-12 18:15:17', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(54, 43, 'login', '2014-04-12 18:16:31', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(55, 1, 'login', '2014-04-12 18:16:35', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(56, 1, 'login', '2014-04-12 18:18:29', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(57, 43, 'login', '2014-04-12 18:18:33', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(58, 43, 'login', '2014-04-12 18:19:41', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(59, 1, 'login', '2014-04-12 18:19:46', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(60, 1, 'order', '2014-04-12 18:20:10', 'completed an order', '3', '::1', NULL, NULL, NULL, NULL),
(61, 1, 'login', '2014-04-12 18:47:57', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(62, 43, 'login', '2014-04-12 18:48:05', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(63, 43, 'login', '2014-04-12 18:48:41', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(64, 1, 'login', '2014-04-12 18:48:46', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(65, 0, 'login', '2014-04-12 19:03:41', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(66, 0, 'login', '2014-04-12 19:03:46', NULL, 'login Failed - invalid username', '::1', 'accounting', NULL, NULL, NULL),
(67, 1, 'login', '2014-04-12 19:03:57', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(68, 43, 'login', '2014-04-12 19:04:10', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(69, 43, 'login', '2014-04-12 19:04:24', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(70, 43, 'login', '2014-04-12 19:09:00', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(71, 1, 'login', '2014-04-13 16:39:27', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(72, 1, 'login', '2014-04-13 16:40:59', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(73, 44, 'login', '2014-04-13 16:41:04', NULL, 'emergency login success', '::1', 'warehouseman', NULL, NULL, NULL),
(74, 44, 'generate report', '2014-04-13 16:41:29', 'create report', '1', '::1', NULL, NULL, NULL, NULL),
(75, 44, 'generate report', '2014-04-13 16:41:49', 'create report', '2', '::1', NULL, NULL, NULL, NULL),
(76, 44, 'login', '2014-04-13 16:44:49', NULL, 'logout user', '::1', 'warehouseman', NULL, NULL, NULL),
(77, 43, 'login', '2014-04-13 16:44:54', NULL, 'emergency login success', '::1', 'accountant', NULL, NULL, NULL),
(78, 43, 'login', '2014-04-13 16:53:32', NULL, 'logout user', '::1', 'accountant', NULL, NULL, NULL),
(79, 1, 'login', '2014-04-13 16:53:38', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL),
(80, 1, 'user', '2014-04-13 16:56:58', 'update', '28', '::1', NULL, NULL, NULL, NULL),
(81, 1, 'user', '2014-04-13 16:57:56', 'update', '31', '::1', NULL, NULL, NULL, NULL),
(82, 1, 'user', '2014-04-13 16:58:15', 'update', '33', '::1', NULL, NULL, NULL, NULL),
(83, 1, 'user', '2014-04-13 16:58:34', 'update', '37', '::1', NULL, NULL, NULL, NULL),
(84, 1, 'user', '2014-04-13 16:58:53', 'update', '38', '::1', NULL, NULL, NULL, NULL),
(85, 1, 'user', '2014-04-13 16:59:10', 'update', '39', '::1', NULL, NULL, NULL, NULL),
(86, 1, 'user', '2014-04-13 16:59:37', 'update', '40', '::1', NULL, NULL, NULL, NULL),
(87, 1, 'user', '2014-04-13 16:59:55', 'update', '42', '::1', NULL, NULL, NULL, NULL),
(88, 1, 'user', '2014-04-13 17:00:18', 'update', '43', '::1', NULL, NULL, NULL, NULL),
(89, 1, 'user', '2014-04-13 17:00:59', 'update', '23', '::1', NULL, NULL, NULL, NULL),
(90, 1, 'user', '2014-04-13 17:01:20', 'update', '24', '::1', NULL, NULL, NULL, NULL),
(91, 1, 'user', '2014-04-13 17:01:55', 'update', '25', '::1', NULL, NULL, NULL, NULL),
(92, 1, 'user', '2014-04-13 17:18:43', 'create', '48', '::1', NULL, NULL, NULL, NULL),
(93, 1, 'user', '2014-04-13 17:19:24', 'delete', '48', '::1', NULL, NULL, NULL, NULL),
(94, 1, 'inventory', '2014-04-13 17:20:52', 'create', '40', '::1', NULL, NULL, NULL, NULL),
(95, 1, 'inventory', '2014-04-13 17:21:09', 'delete', '40', '::1', NULL, NULL, NULL, NULL),
(96, 1, 'inventory', '2014-04-13 17:22:18', 'create', '41', '::1', NULL, NULL, NULL, NULL),
(97, 1, 'order', '2014-04-13 17:29:08', 'completed an order', '6', '::1', NULL, NULL, NULL, NULL),
(98, 1, 'order', '2014-04-13 17:29:10', 'completed an order', '5', '::1', NULL, NULL, NULL, NULL),
(99, 1, 'order', '2014-04-13 17:29:12', 'completed an order', '4', '::1', NULL, NULL, NULL, NULL),
(100, 1, 'user', '2014-04-13 17:36:24', 'update', '28', '::1', NULL, NULL, NULL, NULL),
(101, 1, 'user', '2014-04-13 17:36:36', 'update', '31', '::1', NULL, NULL, NULL, NULL),
(102, 1, 'user', '2014-04-13 17:36:43', 'update', '33', '::1', NULL, NULL, NULL, NULL),
(103, 1, 'user', '2014-04-13 17:36:52', 'update', '37', '::1', NULL, NULL, NULL, NULL),
(104, 1, 'user', '2014-04-13 17:37:01', 'update', '38', '::1', NULL, NULL, NULL, NULL),
(105, 1, 'user', '2014-04-13 17:37:11', 'update', '40', '::1', NULL, NULL, NULL, NULL),
(106, 1, 'user', '2014-04-13 17:37:18', 'update', '40', '::1', NULL, NULL, NULL, NULL),
(107, 1, 'user', '2014-04-13 17:37:26', 'update', '42', '::1', NULL, NULL, NULL, NULL),
(108, 1, 'login', '2014-04-13 18:57:06', NULL, 'logout user', '::1', 'admin', NULL, NULL, NULL),
(109, 1, 'login', '2014-04-13 18:57:10', NULL, 'emergency login success', '::1', 'admin', NULL, NULL, NULL);

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
(2, 'time_close', 'time', '', 'system setting', 'Time Close', '11:59 pm'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `role_id`, `quota`, `district_id`, `area`, `hospital`, `hospital_address`, `outlet`, `outlet_address`, `owner`, `owner_landline`, `owner_mobile`, `recipient_firstname`, `recipient_middlename`, `recipient_lastname`, `position`, `recipient_landline`, `recipient_mobile`, `address_number`, `address_street`, `address_municipality`, `civil_status`, `residence_type`, `residence_years`, `residence_months`, `home_telephone`, `mobile_number`, `spouse_firstname`, `spouse_middlename`, `spouse_lastname`, `spouse_birthdate`, `spouse_business`, `spouse_business_address`, `spouse_telephone`, `spouse_position`, `spouse_employment_tenure_years`, `spouse_employment_tenure_months`, `status`) VALUES
(1, 'jay-ar', 'mundala', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jayar_mundala@yahoo.com', 1, 0, 0, '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(23, 'fnac2', 'lnac2', 'southoffice', '0c1fd7bdf14dc944acdff6dc3709e0bc', 'accountant1@gmail.com', 5, 0, 1, 's2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(24, 'can1', 'lncan1', 'centraloffice', '5be2bc09fde5c8d51910c09cd4d94c4f', 'lncan1@gmail.com', 5, 0, 2, 'c1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(25, 'ac3fn', 'ac3ln', 'northoffice', '968357c6ddfba2922aec1c9551401284', 'ac3@gmail.com', 5, 0, 3, 'n1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(26, '', '', 'stocksoffice', 'bc6049c67508d4ac07c4413f5a4e928d', '', 4, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(27, 'Rich', 'abejuela', 'hrd', 'b9ce93b9d5dfff0fd5bc7fc464e82f7c', 'rich@email.com', 6, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'single', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(28, 'Dexter', 'Ballester', 'centralmsr', '832947fabba50c8946bd4aea16168258', 'dexter@gmail.com', 3, 500000, 2, 's1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(29, 'Sta. Cruz Hospital', ' ', 'centralbul1', '5d71d17382aebb3bec77d348a009efc5', '', 2, 0, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
(30, 'Sta. Cruz', ' Hospital', 'centralbulacan1', '5d71d17382aebb3bec77d348a009efc5', '', 2, 0, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'enabled'),
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
