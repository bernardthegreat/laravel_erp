CREATE DATABASE  IF NOT EXISTS `dealer_erp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dealer_erp`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: dealer_erp
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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint unsigned NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time DEFAULT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendance_users_1_idx` (`created_by`),
  KEY `fk_attendance_users_2_idx` (`updated_by`),
  KEY `fk_attendance_employees_idx` (`employee_id`),
  CONSTRAINT `fk_attendance_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_attendance_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_attendance_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `client_debts_view`
--

DROP TABLE IF EXISTS `client_debts_view`;
/*!50001 DROP VIEW IF EXISTS `client_debts_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `client_debts_view` AS SELECT 
 1 AS `name_short`,
 1 AS `name_long`,
 1 AS `contact_no`,
 1 AS `has_debt`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) DEFAULT NULL,
  `name_long` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `payment_term` smallint unsigned NOT NULL DEFAULT '0' COMMENT 'Measurement unit for this column should be DAY.',
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_name_long` (`name_long`),
  KEY `fk_clients_users_1_idx` (`created_by`),
  KEY `fk_clients_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_clients_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_clients_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COMMENT='IMPORTANT: DO NOT DELETE ROW 1 -- WALK-IN CUSTOMER.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'WLKIN','Walk-In Customer','Unknown','Unknown',0,1,'2020-07-06 11:33:36',1,'2020-09-19 15:07:10','inactive'),(8,'','LONGKEE','CALOOCAN','.',7,2,'2020-09-19 13:14:01',2,'2020-09-19 13:14:01','active'),(18,NULL,'BESTFRIEND MORIONES','TONDO','.',7,2,'2020-09-19 13:31:30',2,'2020-09-19 13:31:30','active'),(19,NULL,'BESTFRIEND 5TH AVENUE','CALOOCAN','.',7,2,'2020-09-19 13:31:48',2,'2020-09-19 13:31:48','active'),(20,NULL,'BESTFRIEND SAMSON ROAD','MALABON','.',7,2,'2020-09-19 13:32:08',2,'2020-09-19 13:32:08','active'),(21,NULL,'8 SPOON','QUEZON CITY','.',15,2,'2020-09-19 13:32:36',2,'2020-09-19 13:32:36','active'),(22,NULL,'BLACKSCOOP BANAWE','BANAWE','.',7,2,'2020-09-19 13:33:01',2,'2020-09-19 13:33:01','active'),(23,NULL,'BLACKSCOOP LEAGRDA','LEAGRDA','.',15,2,'2020-09-19 13:33:17',2,'2020-09-19 13:33:17','active'),(24,NULL,'BLACKSCOOP RETIRO','BANAWE','.',15,2,'2020-09-19 13:33:34',2,'2020-09-19 13:33:34','active'),(25,NULL,'RED MITTENS','SAN JUAN','.',7,2,'2020-09-19 13:33:55',2,'2020-09-19 13:33:55','active'),(26,NULL,'JEWEL - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:19',2,'2020-09-19 13:34:19','active'),(27,NULL,'CONRAD - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:37',2,'2020-09-19 13:34:37','active'),(28,NULL,'ALLAN - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:51',2,'2020-09-19 13:34:51','active'),(29,NULL,'CARLOS CHAN','MANILA','.',30,2,'2020-09-19 13:35:04',2,'2020-09-19 13:35:04','active'),(30,NULL,'ALDON HUANG','MANILA','.',1,2,'2020-09-19 13:35:17',2,'2020-09-19 13:35:17','active'),(31,NULL,'CHERRY HUANG','MANILA','.',1,2,'2020-09-19 13:35:27',2,'2020-09-19 13:35:27','active'),(32,NULL,'MIRABELLE TAN','MANILA','.',7,2,'2020-09-19 13:35:45',2,'2020-09-19 13:35:45','active'),(33,NULL,'LACE','MANILA','.',7,2,'2020-09-19 13:35:59',2,'2020-09-19 13:35:59','active'),(34,NULL,'ROSE -MALABON CATERING','MALABON','.',15,2,'2020-09-19 13:37:06',2,'2020-09-19 13:37:06','active'),(35,NULL,'KSMET INC','MANILA','.',7,2,'2020-09-19 13:37:29',2,'2020-09-19 13:37:29','active');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `due_clients_view`
--

DROP TABLE IF EXISTS `due_clients_view`;
/*!50001 DROP VIEW IF EXISTS `due_clients_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `due_clients_view` AS SELECT 
 1 AS `name_long`,
 1 AS `debt_cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `code` char(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `name_suffix` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fullname` varchar(75) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_code` (`code`),
  UNIQUE KEY `uq_fullname` (`first_name`,`middle_name`,`last_name`,`name_suffix`),
  KEY `fk_employees_users_1_idx` (`created_by`),
  KEY `fk_employees_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_employees_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_employees_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'E202000001','HERNAN','M.','MALABANAN',NULL,'HERNAN M. MALABANAN','QUEZON CITY','.',2,'2020-09-19 13:20:52',2,'2020-09-19 13:20:52','DRIVER'),(2,'E202000002','JOMARIE','L.','LIMABO',NULL,'JOMARIE L. LIMABO','QUEZON CITY','444',2,'2020-09-19 13:21:13',2,'2020-09-19 13:21:13','HELPER');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `gross_expenses_today_view`
--

DROP TABLE IF EXISTS `gross_expenses_today_view`;
/*!50001 DROP VIEW IF EXISTS `gross_expenses_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_expenses_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `gross_expenses_view`
--

DROP TABLE IF EXISTS `gross_expenses_view`;
/*!50001 DROP VIEW IF EXISTS `gross_expenses_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_expenses_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `gross_income_today_view`
--

DROP TABLE IF EXISTS `gross_income_today_view`;
/*!50001 DROP VIEW IF EXISTS `gross_income_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_income_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `gross_income_view`
--

DROP TABLE IF EXISTS `gross_income_view`;
/*!50001 DROP VIEW IF EXISTS `gross_income_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_income_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interests` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` smallint unsigned NOT NULL,
  `qty_from` mediumint unsigned NOT NULL DEFAULT '1' COMMENT 'Quantity is measured in SACK.',
  `qty_to` mediumint unsigned NOT NULL DEFAULT '999' COMMENT 'Quantity is measured in SACK.',
  `rate` decimal(5,2) unsigned NOT NULL DEFAULT '8.00',
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_interests` (`item_id`,`qty_from`,`qty_to`,`rate`),
  KEY `fk_interests_items_idx` (`item_id`),
  KEY `fk_interests_user_1_idx` (`created_by`),
  KEY `fk_interests_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_interests_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_interests_user_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_interests_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (1,1,1,999,8.00,2,'2020-09-19 12:24:54',2,'2020-09-19 12:24:54',NULL),(2,2,1,999,8.00,2,'2020-09-19 12:25:13',2,'2020-09-19 12:25:13',NULL),(3,3,1,999,8.00,2,'2020-09-19 12:25:59',2,'2020-09-19 12:25:59',NULL),(4,4,1,999,8.00,2,'2020-09-19 12:26:12',2,'2020-09-19 12:26:12',NULL),(5,5,1,999,8.00,2,'2020-09-19 12:26:25',2,'2020-09-19 12:26:25',NULL),(6,6,1,999,8.00,2,'2020-09-19 12:26:56',2,'2020-09-19 12:26:56',NULL),(7,7,1,999,8.00,2,'2020-09-19 12:27:07',2,'2020-09-19 12:27:07',NULL),(8,8,1,999,8.00,2,'2020-09-19 12:40:42',2,'2020-09-19 12:40:42',NULL),(9,10,1,999,8.00,2,'2020-09-19 12:41:19',2,'2020-09-19 12:41:19',NULL),(10,11,1,999,8.00,2,'2020-09-19 12:43:07',2,'2020-09-19 12:43:07',NULL),(11,13,1,999,8.00,2,'2020-09-19 12:43:22',2,'2020-09-19 12:43:22',NULL),(12,14,1,999,8.00,2,'2020-09-19 14:26:39',2,'2020-09-19 14:26:39',NULL);
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `item_costs_history_view`
--

DROP TABLE IF EXISTS `item_costs_history_view`;
/*!50001 DROP VIEW IF EXISTS `item_costs_history_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `item_costs_history_view` AS SELECT 
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `cost_datetime`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` smallint unsigned NOT NULL,
  `name_short` varchar(20) DEFAULT NULL,
  `name_long` varchar(50) NOT NULL,
  `stock_qty` int unsigned NOT NULL DEFAULT '0',
  `unit` varchar(15) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_name_long` (`name_long`),
  KEY `fk_items_suppliers_idx` (`supplier_id`) USING BTREE,
  KEY `fk_items_users_1_idx` (`created_by`) USING BTREE,
  KEY `fk_items_users_2_idx` (`updated_by`) USING BTREE,
  CONSTRAINT `fk_items_suppliers` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `fk_items_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_items_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,NULL,'PUREGRAIN 25KG',19,'SACKS',2,'2020-09-19 12:24:54',2,'2020-09-19 15:17:44',NULL),(2,1,NULL,'PUREGRAIN 50KG',47,'SACKS',2,'2020-09-19 12:25:13',2,'2020-09-19 14:48:38',NULL),(3,1,NULL,'GOLDEN DRAGON 50KG',19,'SACKS',2,'2020-09-19 12:25:59',2,'2020-09-19 15:03:53',NULL),(4,1,NULL,'MINDORO AGUILA 25KG',18,'SACKS',2,'2020-09-19 12:26:12',2,'2020-09-19 14:48:32',NULL),(5,1,NULL,'ROOSTER 25KG',0,'SACKS',2,'2020-09-19 12:26:25',2,'2020-09-19 12:26:25',NULL),(6,1,NULL,'WATERLILY 50KG',44,'SACKS',2,'2020-09-19 12:26:56',2,'2020-09-19 14:48:51',NULL),(7,1,NULL,'RICE FLOWER 50 KG',1,'SACKS',2,'2020-09-19 12:27:07',2,'2020-09-19 14:47:38',NULL),(8,1,NULL,'BACHELOR 50KG',1,'SACKS',2,'2020-09-19 12:40:42',2,'2020-09-19 14:47:53',NULL),(10,1,NULL,'PURE JASMINE 25KG',12,'SACKS',2,'2020-09-19 12:41:19',2,'2020-09-19 12:58:20',NULL),(11,1,NULL,'ORCHID JASMINE 50 KG',2,'SACKS',2,'2020-09-19 12:43:07',2,'2020-09-19 14:47:46',NULL),(13,2,NULL,'FREETO OIL',93,'CAN',2,'2020-09-19 12:43:22',2,'2020-09-19 14:28:12',NULL),(14,1,NULL,'MONKEY KING',1,'SACKS',2,'2020-09-19 14:26:39',2,'2020-09-19 14:48:25',NULL);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `latest_salary_rates_view`
--

DROP TABLE IF EXISTS `latest_salary_rates_view`;
/*!50001 DROP VIEW IF EXISTS `latest_salary_rates_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `latest_salary_rates_view` AS SELECT 
 1 AS `employee_name`,
 1 AS `latest_rate`,
 1 AS `added_by`,
 1 AS `added_on`,
 1 AS `edited_by`,
 1 AS `edited_on`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `net_income_view`
--

DROP TABLE IF EXISTS `net_income_view`;
/*!50001 DROP VIEW IF EXISTS `net_income_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `net_income_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payroll` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint unsigned NOT NULL,
  `hours_worked` decimal(6,2) unsigned NOT NULL DEFAULT '0.00',
  `cost` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `addl_pay` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `deduction` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payroll_employees_idx` (`employee_id`),
  KEY `fk_payroll_users_1_idx` (`created_by`),
  KEY `fk_payroll_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_payroll_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_payroll_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_payroll_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payroll`
--

LOCK TABLES `payroll` WRITE;
/*!40000 ALTER TABLE `payroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `pending_purchases_view`
--

DROP TABLE IF EXISTS `pending_purchases_view`;
/*!50001 DROP VIEW IF EXISTS `pending_purchases_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pending_purchases_view` AS SELECT 
 1 AS `supplier`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `qty`,
 1 AS `purchase_datetime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `purchase_cost_today_view`
--

DROP TABLE IF EXISTS `purchase_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `purchase_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchase_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `item_id` smallint unsigned NOT NULL,
  `code` char(20) NOT NULL,
  `dr_no` varchar(30) DEFAULT NULL COMMENT 'Delivery Receipt Number',
  `cost` decimal(8,2) unsigned NOT NULL COMMENT 'Price should be per sack.',
  `qty` mediumint unsigned NOT NULL COMMENT 'Quantity is measured in SACK.',
  `received_at` datetime DEFAULT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchases_items_idx` (`item_id`),
  KEY `fk_purchases_users_1_idx` (`created_by`),
  KEY `fk_purchases_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_purchases_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_purchases_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_purchases_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='IMPORTANT: DO NOT EDIT `cost` and `qty` VALUES TO MAINTAIN DATA CONSISTENCY.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,6,'P2020091912504500006','907727',1675.00,12,'2020-09-19 12:58:26',2,'2020-09-19 12:50:45',2,'2020-09-19 12:58:26',NULL),(2,10,'P2020091912510600010','907727',950.00,12,'2020-09-19 12:58:20',2,'2020-09-19 12:51:06',2,'2020-09-19 12:58:20',NULL),(3,4,'P2020091912513200004','908174',1070.00,6,'2020-09-19 12:58:11',2,'2020-09-19 12:51:32',2,'2020-09-19 12:58:11',NULL),(4,6,'P2020091912515000006','908174',1675.00,2,'2020-09-19 12:58:02',2,'2020-09-19 12:51:50',2,'2020-09-19 12:58:02',NULL),(5,2,'P2020091912521200002','908174',1745.00,12,'2020-09-19 12:57:55',2,'2020-09-19 12:52:12',2,'2020-09-19 12:57:55',NULL),(6,6,'P2020091912523600006','913072',1605.00,7,'2020-09-19 12:57:51',2,'2020-09-19 12:52:36',2,'2020-09-19 12:57:51',NULL),(7,2,'P2020091912525700002','913072',1725.00,15,'2020-09-19 12:57:46',2,'2020-09-19 12:52:57',2,'2020-09-19 12:57:46',NULL),(8,6,'P2020091912531900006','913627',1605.00,15,'2020-09-19 12:57:41',2,'2020-09-19 12:53:19',2,'2020-09-19 12:57:41',NULL),(9,3,'P2020091912534000003','913627',1575.00,2,'2020-09-19 12:57:37',2,'2020-09-19 12:53:40',2,'2020-09-19 12:57:37',NULL),(10,2,'P2020091912541600002','913627',1725.00,5,'2020-09-19 12:57:32',2,'2020-09-19 12:54:16',2,'2020-09-19 12:57:32',NULL),(11,4,'P2020091912543400004','917056',985.00,10,'2020-09-19 12:57:26',2,'2020-09-19 12:54:34',2,'2020-09-19 12:57:26',NULL),(12,3,'P2020091912545000003','917056',1555.00,10,'2020-09-19 12:57:21',2,'2020-09-19 12:54:50',2,'2020-09-19 12:57:21',NULL),(13,1,'P2020091912555600001','917056',862.50,6,'2020-09-19 15:17:00',2,'2020-09-19 12:55:56',2,'2020-09-19 15:17:44',NULL),(14,11,'P2020091912562200011','917056',1835.00,1,'2020-09-19 12:57:08',2,'2020-09-19 12:56:22',2,'2020-09-19 12:57:08',NULL),(15,13,'P2020091912594500013','925466',740.50,60,'2020-09-19 15:17:00',2,'2020-09-19 12:59:45',2,'2020-09-19 15:17:20',NULL),(16,6,'P2020091914220600006','904426',1675.00,8,'2020-09-19 14:48:51',2,'2020-09-19 14:22:06',2,'2020-09-19 14:48:51',NULL),(17,3,'P2020091914230000003','907726',1735.00,6,'2020-09-19 14:48:44',2,'2020-09-19 14:23:00',2,'2020-09-19 14:48:44',NULL),(18,2,'P2020091914235000002','907726',1745.00,19,'2020-09-19 14:48:38',2,'2020-09-19 14:23:50',2,'2020-09-19 14:48:38',NULL),(19,1,'P2020091914244200001','907726',882.50,13,'2020-09-19 15:18:00',2,'2020-09-19 14:24:42',2,'2020-09-19 15:18:34',NULL),(20,4,'P2020091914261600004','907726',1065.00,2,'2020-09-19 14:48:32',2,'2020-09-19 14:26:16',2,'2020-09-19 14:48:32',NULL),(21,14,'P2020091914270000014','907726',1800.00,1,'2020-09-19 15:18:00',2,'2020-09-19 14:27:00',2,'2020-09-19 15:18:47',NULL),(22,13,'P2020091914275600013','903458',692.00,38,'2020-09-19 14:28:12',2,'2020-09-19 14:27:56',2,'2020-09-19 14:28:12',NULL),(23,8,'P2020091914290300008','907727',1900.00,1,'2020-09-19 14:47:53',2,'2020-09-19 14:29:03',2,'2020-09-19 14:47:53',NULL),(24,11,'P2020091914312500011','907726',1865.00,1,'2020-09-19 14:47:46',2,'2020-09-19 14:31:25',2,'2020-09-19 14:47:46',NULL),(25,7,'P2020091914321500007','907726',1800.00,1,'2020-09-19 14:47:38',2,'2020-09-19 14:32:15',2,'2020-09-19 14:47:38',NULL),(27,3,'P2020091915033300003','917975',1555.00,1,'2020-09-19 15:03:53',2,'2020-09-19 15:03:33',2,'2020-09-19 15:03:53',NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `purchases_view`
--

DROP TABLE IF EXISTS `purchases_view`;
/*!50001 DROP VIEW IF EXISTS `purchases_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchases_view` AS SELECT 
 1 AS `purchase_id`,
 1 AS `purchase_no`,
 1 AS `delivery_no`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `quantity`,
 1 AS `item_unit`,
 1 AS `total_cost`,
 1 AS `added_by`,
 1 AS `added_on`,
 1 AS `edited_by`,
 1 AS `edited_on`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `purchases_vs_sales_view`
--

DROP TABLE IF EXISTS `purchases_vs_sales_view`;
/*!50001 DROP VIEW IF EXISTS `purchases_vs_sales_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchases_vs_sales_view` AS SELECT 
 1 AS `purchase_date`,
 1 AS `purchase_no`,
 1 AS `dr_no`,
 1 AS `name_long`,
 1 AS `purchase_cost`,
 1 AS `purchase_qty`,
 1 AS `sold_qty`,
 1 AS `unsold_qty`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `received_purchases_view`
--

DROP TABLE IF EXISTS `received_purchases_view`;
/*!50001 DROP VIEW IF EXISTS `received_purchases_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `received_purchases_view` AS SELECT 
 1 AS `supplier`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `qty`,
 1 AS `reception_datetime`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `salary_cost_today_view`
--

DROP TABLE IF EXISTS `salary_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `salary_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `salary_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `salary_rates`
--

DROP TABLE IF EXISTS `salary_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salary_rates` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint unsigned NOT NULL,
  `hourly_fee` decimal(8,2) unsigned NOT NULL DEFAULT '50.00',
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_fee` (`employee_id`,`hourly_fee`),
  KEY `fk_salary_rates_employees_idx` (`employee_id`),
  KEY `fk_salary_rates_users_1_idx` (`created_by`),
  KEY `fk_salary_rates_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_salary_rates_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_salary_rates_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_salary_rates_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary_rates`
--

LOCK TABLES `salary_rates` WRITE;
/*!40000 ALTER TABLE `salary_rates` DISABLE KEYS */;
INSERT INTO `salary_rates` VALUES (1,1,50.00,2,'2020-09-19 13:20:52',2,'2020-09-19 13:20:52',NULL),(2,2,50.00,2,'2020-09-19 13:21:13',2,'2020-09-19 13:21:13',NULL);
/*!40000 ALTER TABLE `salary_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` smallint unsigned NOT NULL,
  `purchase_id` mediumint unsigned NOT NULL,
  `code` char(20) NOT NULL,
  `dr_no` varchar(30) DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `cost` decimal(8,2) unsigned NOT NULL DEFAULT '0.00' COMMENT 'Price should be per sack.',
  `qty` mediumint unsigned NOT NULL DEFAULT '0' COMMENT 'Quantity is measured in SACK.',
  `discount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `addl_fee` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `paid_on` datetime DEFAULT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_clients_idx` (`client_id`),
  KEY `fk_sales_users_1_idx` (`created_by`),
  KEY `fk_sales_users_2_idx` (`updated_by`),
  KEY `fk_sales_purchases_idx` (`purchase_id`),
  CONSTRAINT `fk_sales_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `fk_sales_purchases` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_sales_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_sales_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Latest product price is always used.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,22,1,'S2020091913515200022','0819','0',1880.00,5,0.00,0.00,'1970-01-01 08:00:00',2,'2020-09-19 13:51:52',2,'2020-09-19 15:05:12',NULL),(3,22,5,'S2020091914010800022','0819','0',2120.00,4,0.00,0.00,NULL,2,'2020-09-19 14:01:08',2,'2020-09-19 14:01:08',NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `sales_view`
--

DROP TABLE IF EXISTS `sales_view`;
/*!50001 DROP VIEW IF EXISTS `sales_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sales_view` AS SELECT 
 1 AS `sale_no`,
 1 AS `delivery_no`,
 1 AS `client_name`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `discount`,
 1 AS `additional_fee`,
 1 AS `quantity`,
 1 AS `total_cost`,
 1 AS `paid_on`,
 1 AS `added_by`,
 1 AS `added_on`,
 1 AS `edited_by`,
 1 AS `edited_on`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `sales_vs_purchases_view`
--

DROP TABLE IF EXISTS `sales_vs_purchases_view`;
/*!50001 DROP VIEW IF EXISTS `sales_vs_purchases_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `sales_vs_purchases_view` AS SELECT 
 1 AS `sale_date`,
 1 AS `sale_no`,
 1 AS `delivery_no`,
 1 AS `client_name`,
 1 AS `item_name`,
 1 AS `selling_cost`,
 1 AS `sold_qty`,
 1 AS `purchase_cost`,
 1 AS `interest_rate`,
 1 AS `net_income`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `stock_discrepancy_view`
--

DROP TABLE IF EXISTS `stock_discrepancy_view`;
/*!50001 DROP VIEW IF EXISTS `stock_discrepancy_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stock_discrepancy_view` AS SELECT 
 1 AS `item_id`,
 1 AS `discrepancy`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `stock_qty_fast_view`
--

DROP TABLE IF EXISTS `stock_qty_fast_view`;
/*!50001 DROP VIEW IF EXISTS `stock_qty_fast_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stock_qty_fast_view` AS SELECT 
 1 AS `item_id`,
 1 AS `item_name`,
 1 AS `qty`,
 1 AS `unit`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `stock_qty_slow_view`
--

DROP TABLE IF EXISTS `stock_qty_slow_view`;
/*!50001 DROP VIEW IF EXISTS `stock_qty_slow_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stock_qty_slow_view` AS SELECT 
 1 AS `item_id`,
 1 AS `item_name`,
 1 AS `qty`,
 1 AS `unit`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) DEFAULT NULL,
  `name_long` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_name_long` (`name_long`),
  KEY `fk_suppliers_users_1_idx` (`created_by`),
  KEY `fk_suppliers_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_suppliers_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_suppliers_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,NULL,'Rice Distributors Inc','Isabella City','09228881981',2,'2020-09-19 12:23:02',2,'2020-09-19 12:23:02',NULL),(2,NULL,'BGG Oil Manufacturing Corp','Binondo Manila','09228988156',2,'2020-09-19 12:23:42',2,'2020-09-19 12:23:42',NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `name_suffix` varchar(10) DEFAULT NULL,
  `fullname` varchar(75) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_fullname` (`first_name`,`middle_name`,`last_name`,`name_suffix`),
  KEY `fk_users_users_1_idx` (`created_by`),
  KEY `fk_users_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_users_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_users_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin',NULL,'Istrator',NULL,'Admin Istrator','admin','$2y$10$l5j2mskwfkayy4ptdascRu4N76FXU4Vh.Tq.2g4HYPjUr2zglPndm','admin',1,'2020-07-06 11:33:36',1,'2020-07-06 11:36:36',NULL),(2,'Huat Hok',NULL,'Rice Trading',NULL,'Huat Hok Rice Trading','huathok','$2y$10$DxEQQvgwTQ4Wj4QXgU3ex.SCNenRXd8yW9DeUsVBpg8xI0QXtqXou','',1,'2020-07-06 11:33:36',2,'2020-09-19 12:08:41',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilities`
--

DROP TABLE IF EXISTS `utilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilities` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `utility_type_id` smallint unsigned NOT NULL,
  `cost` decimal(8,2) unsigned NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_utilities_utility_types_idx` (`utility_type_id`),
  KEY `fk_utilities_users_1_idx` (`created_by`),
  KEY `fk_utilities_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_utilities_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_utilities_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_utilities_utility_types` FOREIGN KEY (`utility_type_id`) REFERENCES `utility_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `utility_cost_today_view`
--

DROP TABLE IF EXISTS `utility_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `utility_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `utility_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `utility_types`
--

DROP TABLE IF EXISTS `utility_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utility_types` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name_short` varchar(20) DEFAULT NULL,
  `name_long` varchar(50) NOT NULL,
  `created_by` smallint unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` smallint unsigned NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_name_long` (`name_long`),
  KEY `fk_utility_types_users_1_idx` (`created_by`),
  KEY `fk_utility_types_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_utility_types_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_utility_types_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_types`
--

LOCK TABLES `utility_types` WRITE;
/*!40000 ALTER TABLE `utility_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `utility_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dealer_erp'
--

--
-- Dumping routines for database 'dealer_erp'
--
/*!50003 DROP PROCEDURE IF EXISTS `insert_employee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_employee`(
	IN `param_first_name` VARCHAR(50),
	IN `param_middle_name` VARCHAR(50),
	IN `param_last_name` VARCHAR(50),
	IN `param_name_suffix` VARCHAR(10),
    IN `param_address` VARCHAR(255),
    IN `param_contact_no` VARCHAR(25),
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid param_first_name value
    -- Error Code 2 = Invalid param_last_name value
	-- Error Code 3 = Invalid param_address value
    -- Error Code 4 = Invalid param_contact_no value
    -- Error code 5 = Invalid param_user_id value
    -- Error code 6 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 6;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_first_name` = '') OR (`param_first_name` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_last_name` = '') OR (`param_last_name` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_address` = '') OR (`param_address` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;   
    
 	IF (`param_contact_no` = '') OR (`param_contact_no` IS NULL) THEN
		SET `param_error_code` = 4;
		LEAVE `this_sp`;
	END IF;    
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 5;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
	IF (`param_middle_name` = '') THEN
	   SET `param_middle_name` = NULL;
	END IF;
    
	IF (`param_name_suffix` = '') THEN
	   SET `param_name_suffix` = NULL;
	END IF;
    
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;
    
	-- Inner Block Level 1
	`try`: BEGIN
    
		DECLARE `var_latest_employee_id` SMALLINT UNSIGNED;
		DECLARE `var_code` VARCHAR(10);
		DECLARE `var_fullname` VARCHAR(75);

		START TRANSACTION READ WRITE;
			
            SELECT `e`.`id` INTO `var_latest_employee_id` FROM `dealer_erp`.`employees` `e` ORDER BY `e`.`id` DESC LIMIT 1;
            
	    		IF (`var_latest_employee_id` = '') OR (`var_latest_employee_id` IS NULL) THEN
				SET `var_latest_employee_id` = 0;
            END IF;
	    
			SET `var_code` = CONCAT("E", YEAR(CURRENT_TIMESTAMP), LPAD(`var_latest_employee_id` + 1, 5, 0));
			
            IF (`param_middle_name` IS NULL) THEN
				SET `var_fullname` = CONCAT(`param_first_name`, ' ', `param_last_name`);
			ELSE
				SET `var_fullname` = CONCAT(`param_first_name`, ' ', `param_middle_name`, ' ', `param_last_name`);
			END IF;
			
			IF (`param_name_suffix` IS NOT NULL) THEN
				SET `var_fullname` = CONCAT(`var_fullname`, ' ', `param_name_suffix`);
			END IF;
            
			INSERT INTO `dealer_erp`.`employees` (
				`code`,
				`first_name`,
                `middle_name`,
                `last_name`,
                `name_suffix`,
                `fullname`,
                `address`,
                `contact_no`,
                `created_by`,
                `updated_by`,
                `remarks`)
			VALUES (
				`var_code`,
				`param_first_name`,
                `param_middle_name`,
                `param_last_name`,
                `param_name_suffix`,
                `var_fullname`,
				`param_address`,
                `param_contact_no`,
                `param_user_id`,
                `param_user_id`,
                `param_remarks`);
                
			INSERT INTO `dealer_erp`.`salary_rates` (
				`employee_id`,
				`created_by`,
				`updated_by`)
			VALUES (
				LAST_INSERT_ID(),
				`param_user_id`,
				`param_user_id`
			);
                
            SET `param_error_code` = 0;
            
		COMMIT;
        
	END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_item` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_item`(
	IN `param_supplier_id` SMALLINT UNSIGNED,
    IN `param_name_short` VARCHAR(20),
    IN `param_name_long` VARCHAR(50),
    IN `param_unit` VARCHAR(15),
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid param_supplier_id value
    -- Error Code 2 = Invalid param_name_short value
	-- Error Code 3 = Invalid param_name_long value
	-- Error Code 4 = Invalid param_unit value
    -- Error code 5 = Invalid param_user_id value
    -- Error code 6 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 6;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_supplier_id` = '') OR (`param_supplier_id` = 0) OR (`param_supplier_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_name_short` = '') OR (`param_name_short` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_name_long` = '') OR (`param_name_long` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_name_short` = '') OR (`param_name_short` IS NULL) THEN
		SET `param_error_code` = 4;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_unit` = '') OR (`param_unit` IS NULL) THEN
		SET `param_error_code` = 5;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;
    
	-- Inner Block Level 1
	`try`: BEGIN
    
		START TRANSACTION READ WRITE;
            
            INSERT INTO `dealer_erp`.`items` (
				`supplier_id`,
				`name_short`,
                `name_long`,
                `unit`,
                `created_by`,
                `updated_by`,
                `remarks`)
			VALUES (
				`param_supplier_id`,
                UPPER(`param_name_short`),
                `param_name_long`,
				`param_unit`,
                `param_user_id`,
                `param_user_id`,
                `param_remarks`);
			
            INSERT INTO `dealer_erp`.`interests` (
				`item_id`,
				`created_by`,
				`updated_by`)
			VALUES (
				LAST_INSERT_ID(),
				`param_user_id`,
				`param_user_id`
			);
            
            SET `param_error_code` = 0;
            
		COMMIT;
        
	END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_payroll` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_payroll`(
	IN `param_employee_id` SMALLINT UNSIGNED,
	IN `param_addl_pay` DECIMAL(8,2) UNSIGNED,
	IN `param_deduction` DECIMAL(8,2) UNSIGNED,
	IN `param_from_date` DATE,
	IN `param_to_date` DATE,
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid param_employee_id value
    -- Error code 2 = Invalid param_addl_pay value
    -- Error code 3 = Invalid param_deduction value
    -- Error code 4 = Invalid param_user_id value
    -- Error code 5 = No attendance found value										   
    -- Error code 6 = No hourly fee found
    -- Error code 7 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 7;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_employee_id` = '') OR (`param_employee_id` = 0) OR (`param_employee_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;
										   
	IF (`param_addl_pay` = '') OR (`param_addl_pay` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
										   
	IF (`param_deduction` = '') OR (`param_deduction` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;
										   
    -- MySQL will raise an error if it detects invalid values for
    -- `param_from_date` and `param_to_date`.
    -- No need to handle that ourselves
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 4;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;
    
	-- Inner Block Level 1
	`try`: BEGIN
		
		DECLARE `var_hours_worked` DECIMAL(6,2) UNSIGNED;
		DECLARE `var_hourly_fee` DECIMAL(8,2) UNSIGNED;
    
		START TRANSACTION READ WRITE;
			
			SELECT SUM(((TIME_TO_SEC(IFNULL(`a`.`to_time`,'00:00')) - TIME_TO_SEC(IFNULL(`a`.`from_time`,'00:00'))) / 60) / 60)
			INTO `var_hours_worked`
			FROM `dealer_erp`.`attendance` `a`
			WHERE `a`.`employee_id` = `param_employee_id` AND DATE(`a`.`created_at`) BETWEEN `param_from_date` AND `param_to_date`
			GROUP BY `a`.`employee_id`; 
            
			IF (`var_hours_worked` = '') OR (`var_hours_worked` IS NULL) OR (`var_hours_worked` = 0) THEN
				SET `param_error_code` = 5;
				LEAVE `this_sp`;
			END IF;	
            
            SELECT `sr`.`hourly_fee` INTO `var_hourly_fee`
            FROM `dealer_erp`.`salary_rates` `sr`
            WHERE `sr`.`employee_id` = `param_employee_id`
            ORDER BY `sr`.`id` DESC
            LIMIT 1;
            
            IF (`var_hourly_fee` = '') OR (`var_hourly_fee` IS NULL) THEN
				SET `param_error_code` = 6;
				LEAVE `this_sp`;
			END IF;
            
            INSERT INTO `dealer_erp`.`payroll` (
				`employee_id`,
				`hours_worked`,
                `cost`,
                `addl_pay`,
                `deduction`,
                `from_date`,
                `to_date`,
                `created_by`,
                `updated_by`,
                `remarks`)
			VALUES (
				`param_employee_id`,
                `var_hours_worked`,
                `var_hourly_fee`,
                `param_addl_pay`,
                `param_deduction`,
				`param_from_date`,
                `param_to_date`,
                `param_user_id`,
                `param_user_id`,
                `param_remarks`);
                
            SET `param_error_code` = 0;
            
		COMMIT;
        
	END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_sale` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sale`(
	IN `param_client_id` SMALLINT UNSIGNED,
	IN `param_item_id`  SMALLINT UNSIGNED,
	IN `param_dr_no` VARCHAR(30),
	IN `param_invoice_no` VARCHAR(30),
    IN `param_cost` DECIMAL(8,2),
	IN `param_order_qty` INT UNSIGNED,
	IN `param_discount` DECIMAL(8,2) UNSIGNED,
	IN `param_addl_fee` DECIMAL(8,2) UNSIGNED,
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Insufficient Stocks
    -- Error code 2 = Invalid param_client_id value
    -- Error code 3 = Invalid param_item_id value
    -- Error code 4 = Invalid param_order_qty value
    -- Error code 5 = Invalid param_user_id value
    -- Error code 6 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 6;
			-- Cleanup Ops
			ROLLBACK;
			-- CREATE TABLE statement causes implicit commit hence won't
			-- be affected by a transaction rollback. Manual rollback is needed.
			DROP TEMPORARY TABLE IF EXISTS `temp_tb`;
		END;
    
    
	IF (`param_client_id` = '') OR (`param_client_id` = 0) OR (`param_client_id` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
    	IF (`param_item_id` = '') OR (`param_item_id` = 0) OR (`param_item_id` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_order_qty` = '') OR (`param_order_qty` = 0) OR (`param_order_qty` IS NULL) THEN
		SET `param_error_code` = 4;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 5;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
    -- No need to check for blank values for decimal types
    -- MySQL will raise an exception once a decimal type receives a blank value since STRICT_TRANS_TABLES is enabled by default
    -- NULL value is valid for decimal types though
	IF (`param_cost` IS NULL) THEN
	   SET `param_cost` = '0.00';
	END IF;
    
	IF (`param_discount` IS NULL) THEN
	   SET `param_discount` = '0.00';
	END IF;
    
	IF (`param_addl_fee` IS NULL) THEN
	   SET `param_addl_fee` = '0.00';
	END IF;
    
	IF (`param_dr_no` = '') THEN
        SET `param_dr_no` = NULL;
	END IF;
    
	IF (`param_invoice_no` = '') THEN
        SET `param_invoice_no` = NULL;
	END IF;
    
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;

	-- Inner Block Level 1
	`try`: BEGIN
		
        DECLARE `var_sale_code` CHAR(20);
        
        DECLARE `var_order_qty` INT UNSIGNED DEFAULT `param_order_qty`;
		DECLARE `var_unsold_order_qty` INT UNSIGNED DEFAULT `param_order_qty`;
		DECLARE `var_stock_qty` INT UNSIGNED;
		
		DECLARE `var_p_id` MEDIUMINT UNSIGNED;
		DECLARE `var_p_cost` DECIMAL(6,2) UNSIGNED;
		DECLARE `var_p_qty` INT UNSIGNED;
    
		DECLARE `var_interest_rate` DECIMAL(8,2) UNSIGNED;
        DECLARE `var_sell_cost` DECIMAL(8,2) UNSIGNED DEFAULT `param_cost`;
    
		START TRANSACTION READ WRITE;
			
			-- This SQL statement cannot be rolledback. Clean this up manually.
			CREATE TEMPORARY TABLE `temp_tb` (
			   `id` MEDIUMINT UNSIGNED NOT NULL,
			   `cost` DECIMAL(6,2) UNSIGNED NOT NULL,
			   `qty` INT UNSIGNED NOT NULL,
				-- DELETE operation isn't allowed without PK in MySQL 8.0
				PRIMARY KEY (`id`)
			);
			
          
            INSERT INTO `temp_tb` (`id`, `cost`, `qty`)
            SELECT * FROM

                (SELECT 
                    `_p`.`id`,
                    `_p`.`cost`,
                    (`_p`.`qty` - SUM(IFNULL(`_s`.`qty`, 0))) AS `qty`
                FROM
                    (`dealer_erp`.`purchases` `_p`
                    LEFT JOIN `dealer_erp`.`sales` `_s` ON ((`_s`.`purchase_id` = `_p`.`id`)))
                WHERE `_p`.`item_id` = `param_item_id` AND `_p`.`received_at` IS NOT NULL
                GROUP BY `_p`.`id`) AS `p`

            WHERE `p`.`qty` > 0;

			-- Check item stock sufficiency
			SELECT 
				SUM(`tmp`.`qty`)
			INTO `var_stock_qty` FROM
				`temp_tb` `tmp`;
			
            IF (`var_stock_qty` = '') OR (`var_stock_qty` IS NULL) THEN
				SET `var_stock_qty` = 0;
			END IF;
            
			IF (`var_unsold_order_qty` > `var_stock_qty`) THEN
				SET `param_error_code` = 1;
				LEAVE `try`;
			END IF;
			

			-- Inner Block Level 2
			`try_loop`: LOOP
                
				IF (`var_unsold_order_qty` = '') OR (`var_unsold_order_qty` = 0) OR (`var_unsold_order_qty` IS NULL) THEN
					LEAVE `try_loop`;
				END IF;
				
				-- Transfer puchase items into sold items
				SELECT * 
				INTO `var_p_id`, `var_p_cost`, `var_p_qty`
				FROM `temp_tb` LIMIT 1;
				
				-- Handle last remaining orders ("butal")
				IF (`var_p_qty` > `var_unsold_order_qty`) THEN
				   SET `var_p_qty` = `var_unsold_order_qty`;
				END IF;
				
                -- Generate sale number
				SET `var_sale_code` = REPLACE(CURRENT_TIMESTAMP, "-", "");
				SET `var_sale_code` = REPLACE(`var_sale_code`, " ", "");
				SET `var_sale_code` = REPLACE(`var_sale_code`, ":", "");
                SET `var_sale_code` = CONCAT("S", `var_sale_code`, LPAD(`param_client_id`, 5, 0));
                
                
                IF (`var_sell_cost` = '0.00') THEN
					-- Get interest rate of current item and order qty
					SELECT (`i`.`rate` / 100) INTO `var_interest_rate`
					FROM `dealer_erp`.`interests` `i`
					WHERE
						`i`.`item_id` = `param_item_id` AND
						`i`.`qty_from` <= `var_p_qty` AND `i`.`qty_to` >= `var_p_qty`;
					
					IF (`var_interest_rate` = '') OR (`var_interest_rate` IS NULL) THEN
						SET `var_interest_rate` = '0.00';
					END IF;
                    
                    SET `var_sell_cost` = `var_p_cost` + (`var_p_cost` * `var_interest_rate`);
				END IF;
                
                
				INSERT INTO `dealer_erp`.`sales` (
					`client_id`,
					`purchase_id`,
                    `code`,
                    `dr_no`,
                    `invoice_no`,
					`cost`,
					`qty`,
					`discount`,
					`addl_fee`,
					`created_by`,
					`updated_by`,
					`remarks`
				) VALUES (
					`param_client_id`,
					`var_p_id`,
                    `var_sale_code`,
                    `param_dr_no`,
					`param_invoice_no`,
					`var_sell_cost`,
					`var_p_qty`,
					`param_discount`,
					`param_addl_fee`,
					`param_user_id`,
					`param_user_id`,
					`param_remarks`
				);

				DELETE FROM `temp_tb` `tmp` WHERE `tmp`.`id` = `var_p_id`;
				SET `var_unsold_order_qty` = `var_unsold_order_qty` - `var_p_qty`;
			
				ITERATE `try_loop`;
				
			END LOOP `try_loop`;
			
			UPDATE `dealer_erp`.`items` SET `stock_qty` = `var_stock_qty` - `var_order_qty` WHERE `id` = `param_item_id`;
		
			SET `param_error_code` = 0;
            
        COMMIT;
        
	END `try`;
    
    -- This statement always gets executed except in MySQLException encounter
    -- It is assured that temporary table temp_tb exists at this point so
    -- IF EXIST condition can be omitted
	`finally`: BEGIN
        DROP TEMPORARY TABLE `temp_tb`;
	END `finally`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_update_attendance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_update_attendance`(
	IN `param_employee_code` CHAR(10),
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
	-- Error Code 1 = Employee code not found
    -- Error Code 2 = Invalid param_employee_code value
	-- Error code 3 = Invalid param_user_id value
    -- Error code 4 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 4;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_employee_code` = '') OR (`param_employee_code` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;
    
	-- Inner Block Level 1
	`try`: BEGIN
		
        DECLARE `var_employee_id` SMALLINT UNSIGNED;
        DECLARE `var_attendance_id` SMALLINT UNSIGNED;
		DECLARE `var_time_in` TIME;
        DECLARE `var_time_out` TIME;
        
        -- Assume employee code is not found
		SET `param_error_code` = 1;
        
		START TRANSACTION READ WRITE;
            
            SELECT `e`.`id` INTO `var_employee_id`
            FROM `dealer_erp`.`employees` `e`
            WHERE `e`.`code` = `param_employee_code`;
            
            IF (`var_employee_id` IS NOT NULL) THEN
            
				SELECT
					`a`.`id`,
					`a`.`from_time`,
					`a`.`to_time`
				INTO
					`var_attendance_id`,
					`var_time_in`,
					`var_time_out`
				FROM `dealer_erp`.`attendance` `a`
				WHERE
					`a`.`employee_id` = `var_employee_id` AND
					CAST(`a`.`created_at` AS DATE) = CURRENT_DATE()
				ORDER BY `a`.`id` DESC
				LIMIT 1;
				
				-- columns `from_time` and `to_time` can never have a value of '' or empty value. No need to check for that value.
				-- If employee has no time inS today...
				IF (`var_attendance_id` IS NULL) OR ((`var_time_in` IS NOT NULL) AND (`var_time_out` IS NOT NULL)) THEN
				
					INSERT INTO `dealer_erp`.`attendance` (
						`employee_id`,
						`from_time`,
						`created_by`,
						`updated_by`,
						`remarks`)
					VALUES (
						`var_employee_id`,
						CURRENT_TIME(),
						`param_user_id`,
						`param_user_id`,
						`param_remarks`);
				
				-- If employee has timed in but has yet to time out
				ELSEIF (`var_time_in` IS NOT NULL) AND (`var_time_out` IS NULL) THEN
				
					UPDATE `dealer_erp`.`attendance`
					SET
						`to_time` = CURRENT_TIME(),
						`updated_by` = `param_user_id`,
						`remarks` = `param_remarks`
					WHERE
						`id` = `var_attendance_id`;
					
				END IF;
				
				SET `param_error_code` = 0;

            END IF;
            
        COMMIT;

	END `try`;
    


END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_payroll` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_payroll`(
	IN `param_employee_id` SMALLINT UNSIGNED,
    IN `param_from_date` DATE,
    IN `param_to_date` DATE,
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid param_employee_id value
    -- Error code 2 = Invalid param_user_id value
    -- Error code 3 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 3;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_employee_id` = '') OR (`param_employee_id` = 0) OR (`param_employee_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;
    
    -- MySQL will raise an error if it detects invalid values for
    -- `param_from_date` and `param_to_date`.
    -- No need to handle that ourselves
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;
    
	-- Inner Block Level 1
	`try`: BEGIN
		
		DECLARE `var_hours_worked` DECIMAL(6,2) UNSIGNED;
    
		START TRANSACTION READ WRITE;
			
			SELECT SUM(((TIME_TO_SEC(IFNULL(`a`.`to_time`,'00:00')) - TIME_TO_SEC(IFNULL(`a`.`from_time`,'00:00'))) / 60) / 60)
				INTO `var_hours_worked`
			FROM `dealer_erp`.`attendance` `a`
			WHERE `a`.`employee_id` = `param_employee_id` AND DATE(`a`.`created_at`) BETWEEN `param_from_date` AND `param_to_date`
			GROUP BY `a`.`employee_id`; 
            
            UPDATE `dealer_erp`.`payroll` SET
				`hours_worked` = `var_hours_worked`,
                `from_date` = `param_from_date`,
                `to_date` = `param_to_date`,
                `created_by` = `param_user_id`,
                `updated_by` = `param_user_id`,
                `remarks` = `param_remarks`
			WHERE `employee_id` = `param_employee_id`;

            SET `param_error_code` = 0;
            
		COMMIT;
        
	END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `client_debts_view`
--

/*!50001 DROP VIEW IF EXISTS `client_debts_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `client_debts_view` AS select `c`.`name_short` AS `name_short`,`c`.`name_long` AS `name_long`,`c`.`contact_no` AS `contact_no`,if((sum(ifnull((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`),0)) > 0),1,0) AS `has_debt` from (`clients` `c` left join (select `_s`.`id` AS `id`,`_s`.`client_id` AS `client_id`,`_s`.`cost` AS `cost`,`_s`.`qty` AS `qty`,`_s`.`discount` AS `discount`,`_s`.`addl_fee` AS `addl_fee` from `sales` `_s` where (`_s`.`paid_on` is null)) `s` on((`s`.`client_id` = `c`.`id`))) group by `c`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `due_clients_view`
--

/*!50001 DROP VIEW IF EXISTS `due_clients_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `due_clients_view` AS select `c`.`name_long` AS `name_long`,format(`s`.`debt_cost`,2) AS `debt_cost` from (`clients` `c` left join (select `_s`.`client_id` AS `client_id`,(((sum(`_s`.`cost`) * sum(`_s`.`qty`)) - sum(`_s`.`discount`)) + sum(`_s`.`addl_fee`)) AS `debt_cost`,max(cast(`_s`.`created_at` as date)) AS `sale_date` from `sales` `_s` where (`_s`.`paid_on` is null) group by `_s`.`client_id`) `s` on((`s`.`client_id` = `c`.`id`))) where ((`c`.`payment_term` <> 0) and ((to_days(curdate()) - to_days(`s`.`sale_date`)) > `c`.`payment_term`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_expenses_today_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_expenses_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_expenses_today_view` AS select format((((select ifnull(sum(`u`.`cost`),0) from `utilities` `u` where (cast(`u`.`created_at` as date) = curdate())) + (select ifnull(sum((`p`.`cost` * `p`.`qty`)),0) from `purchases` `p` where (cast(`p`.`received_at` as date) = curdate()))) + (select sum(`b`.`_cost`) from (select (sum((((time_to_sec(`a`.`to_time`) - time_to_sec(`a`.`from_time`)) / 60) / 60)) * `sr`.`hourly_fee`) AS `_cost` from (`attendance` `a` left join `salary_rates` `sr` on((`sr`.`employee_id` = `a`.`employee_id`))) where (`sr`.`id` in (select max(`_sr`.`id`) AS `id` from `salary_rates` `_sr` group by `_sr`.`employee_id`) and (`a`.`from_time` is not null) and (`a`.`to_time` is not null) and (cast(`a`.`created_at` as date) = curdate())) group by `a`.`employee_id`) `b`)),2) AS `cost` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_expenses_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_expenses_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_expenses_view` AS select format((((select sum((`pu`.`cost` * `pu`.`qty`)) from `purchases` `pu`) + (select sum(`u`.`cost`) from `utilities` `u`)) + (select sum((`p`.`cost` * `p`.`hours_worked`)) from `payroll` `p`)),2) AS `cost` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_income_today_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_income_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_income_today_view` AS select format(sum(ifnull((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`),0)),2) AS `cost` from `sales` `s` where (cast(`s`.`created_at` as date) = cast(now() as date)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_income_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_income_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_income_view` AS select format(sum((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`)),2) AS `cost` from `sales` `s` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `item_costs_history_view`
--

/*!50001 DROP VIEW IF EXISTS `item_costs_history_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `item_costs_history_view` AS select `i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`created_at` AS `cost_datetime` from (`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) order by `p`.`item_id`,`p`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `latest_salary_rates_view`
--

/*!50001 DROP VIEW IF EXISTS `latest_salary_rates_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `latest_salary_rates_view` AS select concat(`e`.`first_name`,' ',`e`.`last_name`) AS `employee_name`,format(`sr`.`hourly_fee`,2) AS `latest_rate`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`sr`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`sr`.`updated_at` AS `edited_on`,`sr`.`remarks` AS `description` from (((`salary_rates` `sr` join `employees` `e` on((`e`.`id` = `sr`.`employee_id`))) join `users` `us_1` on((`us_1`.`id` = `sr`.`created_by`))) join `users` `us_2` on((`us_2`.`id` = `sr`.`updated_by`))) where `sr`.`id` in (select max(`_sr`.`id`) AS `_sr_id` from `salary_rates` `_sr` group by `_sr`.`employee_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `net_income_view`
--

/*!50001 DROP VIEW IF EXISTS `net_income_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `net_income_view` AS select format(((select sum((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`)) from `sales` `s`) - (((select sum((`pu`.`cost` * `pu`.`qty`)) from `purchases` `pu`) + (select sum(`u`.`cost`) from `utilities` `u`)) + (select sum((`p`.`cost` * `p`.`hours_worked`)) from `payroll` `p`))),2) AS `cost` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pending_purchases_view`
--

/*!50001 DROP VIEW IF EXISTS `pending_purchases_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pending_purchases_view` AS select `s`.`name_long` AS `supplier`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `qty`,`p`.`created_at` AS `purchase_datetime` from ((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `suppliers` `s` on((`s`.`id` = `i`.`supplier_id`))) where (`p`.`received_at` is null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchase_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `purchase_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchase_cost_today_view` AS select format(ifnull(sum((`p`.`cost` * `p`.`qty`)),0),2) AS `cost` from `purchases` `p` where (cast(`p`.`received_at` as date) = curdate()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_view`
--

/*!50001 DROP VIEW IF EXISTS `purchases_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_view` AS select `p`.`id` AS `purchase_id`,`p`.`code` AS `purchase_no`,`p`.`dr_no` AS `delivery_no`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `quantity`,`i`.`unit` AS `item_unit`,format((`p`.`cost` * `p`.`qty`),2) AS `total_cost`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`p`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`p`.`updated_at` AS `edited_on`,`p`.`remarks` AS `description` from (((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `users` `us_1` on((`us_1`.`id` = `p`.`created_by`))) left join `users` `us_2` on((`us_2`.`id` = `p`.`updated_by`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_vs_sales_view`
--

/*!50001 DROP VIEW IF EXISTS `purchases_vs_sales_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_vs_sales_view` AS select cast(`p`.`created_at` as date) AS `purchase_date`,`p`.`code` AS `purchase_no`,`p`.`dr_no` AS `dr_no`,`i`.`name_long` AS `name_long`,format(`p`.`cost`,2) AS `purchase_cost`,`p`.`qty` AS `purchase_qty`,sum(ifnull(`s`.`qty`,0)) AS `sold_qty`,(`p`.`qty` - sum(ifnull(`s`.`qty`,0))) AS `unsold_qty` from ((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `sales` `s` on((`s`.`purchase_id` = `p`.`id`))) group by `p`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `received_purchases_view`
--

/*!50001 DROP VIEW IF EXISTS `received_purchases_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `received_purchases_view` AS select `s`.`name_long` AS `supplier`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `qty`,`p`.`received_at` AS `reception_datetime` from ((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `suppliers` `s` on((`s`.`id` = `i`.`supplier_id`))) where (`p`.`received_at` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `salary_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `salary_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `salary_cost_today_view` AS select sum(`b`.`_cost`) AS `cost` from (select (sum((((time_to_sec(`a`.`to_time`) - time_to_sec(`a`.`from_time`)) / 60) / 60)) * `sr`.`hourly_fee`) AS `_cost` from (`attendance` `a` left join `salary_rates` `sr` on((`sr`.`employee_id` = `a`.`employee_id`))) where (`sr`.`id` in (select max(`_sr`.`id`) AS `id` from `salary_rates` `_sr` group by `_sr`.`employee_id`) and (`a`.`from_time` is not null) and (`a`.`to_time` is not null) and (cast(`a`.`created_at` as date) = curdate())) group by `a`.`employee_id`) `b` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_view`
--

/*!50001 DROP VIEW IF EXISTS `sales_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_view` AS select `s`.`code` AS `sale_no`,`s`.`dr_no` AS `delivery_no`,`c`.`name_long` AS `client_name`,`i`.`name_long` AS `item_name`,format(`s`.`cost`,2) AS `cost`,`s`.`discount` AS `discount`,`s`.`addl_fee` AS `additional_fee`,`s`.`qty` AS `quantity`,format((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`),2) AS `total_cost`,`s`.`paid_on` AS `paid_on`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`s`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`s`.`updated_at` AS `edited_on`,`s`.`remarks` AS `description` from (((((`sales` `s` left join `clients` `c` on((`c`.`id` = `s`.`client_id`))) left join `purchases` `p` on((`p`.`id` = `s`.`purchase_id`))) left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `users` `us_1` on((`us_1`.`id` = `s`.`created_by`))) left join `users` `us_2` on((`us_2`.`id` = `s`.`updated_by`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sales_vs_purchases_view`
--

/*!50001 DROP VIEW IF EXISTS `sales_vs_purchases_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sales_vs_purchases_view` AS select cast(`s`.`created_at` as date) AS `sale_date`,`s`.`code` AS `sale_no`,`s`.`dr_no` AS `delivery_no`,`c`.`name_long` AS `client_name`,`i`.`name_long` AS `item_name`,format(`s`.`cost`,2) AS `selling_cost`,`s`.`qty` AS `sold_qty`,format(`p`.`cost`,2) AS `purchase_cost`,concat(convert(format(ifnull((((`s`.`cost` - `p`.`cost`) / `p`.`cost`) * 100),0),2) using utf8mb4),'%') AS `interest_rate`,format(((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`) - (`p`.`cost` * `s`.`qty`)),2) AS `net_income` from (((`sales` `s` left join `clients` `c` on((`c`.`id` = `s`.`client_id`))) left join `purchases` `p` on((`p`.`id` = `s`.`purchase_id`))) left join `items` `i` on((`i`.`id` = `p`.`item_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_discrepancy_view`
--

/*!50001 DROP VIEW IF EXISTS `stock_discrepancy_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_discrepancy_view` AS select `sqfv`.`item_id` AS `item_id`,(`sqfv`.`qty` - `sqsv`.`qty`) AS `discrepancy` from ((select `i`.`id` AS `item_id`,`i`.`name_long` AS `item_name`,`i`.`stock_qty` AS `qty` from `items` `i`) `sqfv` join (select `i`.`id` AS `item_id`,`i`.`name_long` AS `item_name`,sum(ifnull(`s`.`_qty`,0)) AS `qty` from (`items` `i` left join (select `_p`.`item_id` AS `_item_id`,(`_p`.`qty` - sum(ifnull(`_s`.`qty`,0))) AS `_qty` from (`purchases` `_p` left join `sales` `_s` on((`_s`.`purchase_id` = `_p`.`id`))) where (`_p`.`received_at` is not null) group by `_p`.`id`) `s` on((`s`.`_item_id` = `i`.`id`))) group by `i`.`id`) `sqsv` on((`sqsv`.`item_id` = `sqfv`.`item_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_qty_fast_view`
--

/*!50001 DROP VIEW IF EXISTS `stock_qty_fast_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_qty_fast_view` AS select `i`.`id` AS `item_id`,`i`.`name_long` AS `item_name`,`i`.`stock_qty` AS `qty`,`i`.`unit` AS `unit` from `items` `i` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_qty_slow_view`
--

/*!50001 DROP VIEW IF EXISTS `stock_qty_slow_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_qty_slow_view` AS select `i`.`id` AS `item_id`,`i`.`name_long` AS `item_name`,sum(ifnull(`s`.`_qty`,0)) AS `qty`,`i`.`unit` AS `unit` from (`items` `i` left join (select `_p`.`item_id` AS `_item_id`,(`_p`.`qty` - sum(ifnull(`_s`.`qty`,0))) AS `_qty` from (`purchases` `_p` left join `sales` `_s` on((`_s`.`purchase_id` = `_p`.`id`))) where (`_p`.`received_at` is not null) group by `_p`.`id`) `s` on((`s`.`_item_id` = `i`.`id`))) group by `i`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `utility_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `utility_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `utility_cost_today_view` AS select format(ifnull(sum(`u`.`cost`),0),2) AS `cost` from `utilities` `u` where (cast(`u`.`created_at` as date) = curdate()) */;
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

-- Dump completed on 2020-09-19 15:23:41
