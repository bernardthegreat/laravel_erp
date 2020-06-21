-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.29-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for acctg
CREATE DATABASE IF NOT EXISTS `company_erp` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `company_erp`;

-- Dumping structure for table acctg.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_clients_users` (`created_by`),
  KEY `FK_clients_users_2` (`updated_by`),
  CONSTRAINT `FK_clients_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_clients_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.clients: ~3 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name_short`, `name_long`, `created_by`, `created_at`, `updated_by`, `updated_at`, `remarks`) VALUES
	(1, 'TCTCL', 'Tactical', 1, '2020-05-31 21:27:44', 1, '2020-05-31 21:27:44', NULL),
	(2, 'GLDN CPE', 'Golden Cape', 1, '2020-05-31 21:28:20', 1, '2020-05-31 21:28:23', NULL),
	(3, 'NE CTRNG', 'Ne Catering', 1, '2020-05-31 21:28:45', 1, '2020-05-31 21:28:48', NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table acctg.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` smallint(5) unsigned NOT NULL,
  `item_id` smallint(5) unsigned NOT NULL,
  `qty` mediumint(6) unsigned NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_expenses_suppliers` (`supplier_id`),
  KEY `FK_expenses_items` (`item_id`),
  KEY `FK_expenses_users` (`created_by`),
  KEY `FK_expenses_users_2` (`update_by`),
  CONSTRAINT `FK_expenses_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `FK_expenses_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `FK_expenses_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_expenses_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.expenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

-- Dumping structure for table acctg.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `unit_id` tinyint(3) unsigned NOT NULL,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `price` decimal(6,2) unsigned NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint(5) unsigned NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_items_units` (`unit_id`),
  KEY `FK_items_users` (`created_by`),
  KEY `FK_items_users_2` (`updated_by`),
  CONSTRAINT `FK_items_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  CONSTRAINT `FK_items_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_items_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.items: ~1 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `unit_id`, `name_short`, `name_long`, `price`, `created_by`, `created_at`, `updated_by`, `update_at`, `remarks`) VALUES
	(1, 1, 'BCHLR', 'Bachelor', 500.00, 1, '2020-05-31 21:15:33', 1, '2020-05-31 21:15:55', NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table acctg.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` smallint(5) unsigned NOT NULL,
  `item_id` smallint(5) unsigned NOT NULL,
  `qty` mediumint(6) unsigned NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sales_items` (`item_id`),
  KEY `FK_sales_users` (`created_by`),
  KEY `FK_sales_users_2` (`update_by`),
  KEY `FK_transactions_clients` (`client_id`),
  CONSTRAINT `FK_sales_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `FK_sales_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_sales_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_transactions_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Dumping structure for table acctg.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_suppliers_users` (`created_by`),
  KEY `FK_suppliers_users_2` (`update_by`),
  CONSTRAINT `FK_suppliers_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_suppliers_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.suppliers: ~0 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table acctg.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(10) NOT NULL,
  `name_long` varchar(30) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_units_users` (`created_by`),
  KEY `FK_units_users_2` (`updated_by`),
  CONSTRAINT `FK_units_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_units_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.units: ~2 rows (approximately)
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` (`id`, `name_short`, `name_long`, `created_by`, `created_at`, `updated_by`, `updated_at`, `remarks`) VALUES
	(1, 'sk', 'sack/s', 1, '2020-05-31 21:12:11', 1, '0000-00-00 00:00:00', NULL),
	(2, 'lt', 'liter/s', 1, '2020-05-31 21:12:11', 1, '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;

-- Dumping structure for table acctg.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `name_suffix` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `first_name` (`first_name`,`middle_name`,`last_name`,`name_suffix`),
  KEY `FK_users_users` (`created_by`),
  KEY `FK_users_users_2` (`updated_by`),
  CONSTRAINT `FK_users_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_users_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table acctg.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `name_suffix`, `username`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`, `remarks`) VALUES
	(1, 'Super', NULL, 'User', NULL, 'su', 'su', 1, '2020-05-31 21:04:40', 1, '2020-05-31 21:04:40', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
