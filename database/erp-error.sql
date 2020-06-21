CREATE DATABASE  IF NOT EXISTS `company_erp` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `company_erp`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: company_erp
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `fk_clients_users_1_idx` (`created_by`) /*!80000 INVISIBLE */,
  KEY `fk_clients_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_clients_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_clients_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'TCTCL','Tactical',1,'2020-05-31 21:27:44',1,'2020-05-31 21:27:44',NULL),(2,'GLDN CPE','Golden Cape',1,'2020-05-31 21:28:20',1,'2020-05-31 21:28:23',NULL),(3,'NE CTRNG','Ne Catering',1,'2020-05-31 21:28:45',1,'2020-05-31 21:28:48',NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8 COLLATE utf8 DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `name_suffix` varchar(10) CHARACTER SET utf8 COLLATE utf8 DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `full_name` (`first_name`,`middle_name`,`last_name`,`name_suffix`),
  KEY `fk_employees_users_1_idx` (`created_by`),
  KEY `fk_employees_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_employees_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_employees_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` smallint unsigned NOT NULL,
  `item_id` smallint unsigned NOT NULL,
  `qty` mediumint unsigned NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_expenses_suppliers_idx` (`supplier_id`),
  KEY `FK_expenses_items_idx` (`item_id`) /*!80000 INVISIBLE */,
  KEY `FK_expenses_users_1_idx` (`created_by`),
  KEY `FK_expenses_users_2_idx` (`update_by`),
  CONSTRAINT `FK_expenses_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `FK_expenses_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `FK_expenses_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_expenses_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `unit_id` tinyint unsigned NOT NULL,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `price` decimal(6,2) unsigned NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_items_units_idx` (`unit_id`),
  KEY `FK_items_users_1_idx` (`created_by`),
  KEY `FK_items_users_2_idx` (`updated_by`),
  CONSTRAINT `FK_items_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  CONSTRAINT `FK_items_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_items_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,'BCHLR','Bachelor',500.00,1,'2020-05-31 21:15:33',1,'2020-05-31 21:15:55',NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `overview`
--

DROP TABLE IF EXISTS `overview`;
/*!50001 DROP VIEW IF EXISTS `overview`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8 */;
/*!50001 CREATE VIEW `overview` AS SELECT 
 1 AS `id`,
 1 AS `client_id`,
 1 AS `name_long`,
 1 AS `invoice`,
 1 AS `amount`,
 1 AS `remarks`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `payroll` (
  `id` smallint unsigned NOT NULL,
  `employee_id` smallint unsigned NOT NULL,
  `amount` decimal(6,2) unsigned NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payroll_employees_idx` (`employee_id`),
  KEY `fk_payroll_users_1_idx` (`created_by`),
  KEY `fk_payroll_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_payroll_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_payroll_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_payroll_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payroll`
--

LOCK TABLES `payroll` WRITE;
/*!40000 ALTER TABLE `payroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` smallint unsigned NOT NULL,
  `item_id` smallint unsigned NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `qty` mediumint unsigned NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sales_items` (`item_id`),
  KEY `FK_sales_users_1_idx` (`created_by`),
  KEY `FK_sales_users_2_idx` (`update_by`),
  KEY `FK_sales_clients_idx` (`client_id`),
  CONSTRAINT `FK_sales_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `FK_sales_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  CONSTRAINT `FK_sales_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_sales_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) NOT NULL,
  `name_long` varchar(50) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_suppliers_users_1_idx` (`created_by`),
  KEY `FK_suppliers_users_2_idx` (`update_by`),
  CONSTRAINT `FK_suppliers_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_suppliers_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(10) NOT NULL,
  `name_long` varchar(30) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_short` (`name_short`),
  UNIQUE KEY `name_long` (`name_long`),
  KEY `FK_units_users_1_idx` (`created_by`),
  KEY `FK_units_users_2_idx` (`updated_by`),
  CONSTRAINT `FK_units_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_units_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'sk','sack/s',1,'2020-05-31 21:12:11',1,'0000-00-00 00:00:00',NULL),(2,'lt','liter/s',1,'2020-05-31 21:12:11',1,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `name_suffix` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `first_name` (`first_name`,`middle_name`,`last_name`,`name_suffix`),
  KEY `FK_users_users_1_idx` (`created_by`),
  KEY `FK_users_users_2_idx` (`updated_by`),
  CONSTRAINT `FK_users_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_users_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super',NULL,'User',NULL,'su','$2y$10$jvalQXEO3K4Vcbe5kExjeOVEsrDmHrVpGLRkKMRqxFfT8TEaTebuS',1,'2020-05-31 21:04:40',1,'2020-05-31 21:04:40',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'company_erp'
--

--
-- Dumping routines for database 'company_erp'
--

--
-- Final view structure for view `overview`
--

/*!50001 DROP VIEW IF EXISTS `overview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8 */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `overview` AS select `s`.`id` AS `id`,`s`.`client_id` AS `client_id`,`i`.`name_long` AS `name_long`,`s`.`invoice` AS `invoice`,(`s`.`qty` * `i`.`price`) AS `amount`,`s`.`remarks` AS `remarks` from (`sales` `s` join `items` `i` on((`i`.`id` = `s`.`item_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-01 11:33:46
