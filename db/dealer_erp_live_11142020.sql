-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: dealer_erp_updated
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
-- Temporary view structure for view `attendance_with_fee_view`
--

DROP TABLE IF EXISTS `attendance_with_fee_view`;
/*!50001 DROP VIEW IF EXISTS `attendance_with_fee_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `attendance_with_fee_view` AS SELECT 
 1 AS `employee_id`,
 1 AS `fullname`,
 1 AS `date_worked`,
 1 AS `hours_worked`,
 1 AS `hourly_fee`,
 1 AS `remarks`*/;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COMMENT='IMPORTANT: DO NOT DELETE ROW 1 -- WALK-IN CUSTOMER.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'WLKIN','Walk-In Customer','Unknown','Unknown',0,1,'2020-07-06 11:33:36',1,'2020-09-19 15:07:10','inactive'),(8,'','LONGKEE','CALOOCAN','.',7,2,'2020-09-19 13:14:01',2,'2020-09-19 13:14:01','active'),(18,NULL,'BESTFRIEND MORIONES','TONDO','.',7,2,'2020-09-19 13:31:30',2,'2020-09-19 13:31:30','active'),(19,NULL,'BESTFRIEND 5TH AVENUE','CALOOCAN','.',7,2,'2020-09-19 13:31:48',2,'2020-09-19 13:31:48','active'),(20,NULL,'BESTFRIEND SAMSON ROAD','MALABON','.',7,2,'2020-09-19 13:32:08',2,'2020-09-19 13:32:08','active'),(21,NULL,'8 SPOON','QUEZON CITY','.',15,2,'2020-09-19 13:32:36',2,'2020-09-19 13:32:36','active'),(22,NULL,'BLACKSCOOP BANAWE','BANAWE','.',7,2,'2020-09-19 13:33:01',2,'2020-09-19 13:33:01','active'),(23,NULL,'BLACKSCOOP LEAGRDA','LEAGRDA','.',15,2,'2020-09-19 13:33:17',2,'2020-09-19 13:33:17','active'),(24,NULL,'BLACKSCOOP RETIRO','BANAWE','.',15,2,'2020-09-19 13:33:34',2,'2020-09-19 13:33:34','active'),(25,NULL,'RED MITTENS','SAN JUAN','.',7,2,'2020-09-19 13:33:55',2,'2020-09-19 13:33:55','active'),(26,NULL,'JEWEL - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:19',2,'2020-09-19 13:34:19','active'),(27,NULL,'CONRAD - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:37',2,'2020-09-19 13:34:37','active'),(28,NULL,'ALLAN - CARLOS CHAN','QUEZON CITY','.',30,2,'2020-09-19 13:34:51',2,'2020-09-19 13:34:51','active'),(29,NULL,'CARLOS CHAN','MANILA','.',30,2,'2020-09-19 13:35:04',2,'2020-09-19 13:35:04','active'),(30,NULL,'ALDON HUANG','MANILA','.',1,2,'2020-09-19 13:35:17',2,'2020-09-19 13:35:17','active'),(31,NULL,'CHERRY HUANG','MANILA','.',1,2,'2020-09-19 13:35:27',2,'2020-09-19 13:35:27','active'),(32,NULL,'MIRABELLE TAN','MANILA','.',7,2,'2020-09-19 13:35:45',2,'2020-09-19 13:35:45','active'),(33,NULL,'LACE','MANILA','.',7,2,'2020-09-19 13:35:59',2,'2020-09-19 13:35:59','active'),(34,NULL,'ROSE -MALABON CATERING','MALABON','.',15,2,'2020-09-19 13:37:06',2,'2020-09-19 13:37:06','active'),(35,NULL,'KSMET INC','MANILA','.',7,2,'2020-09-19 13:37:29',2,'2020-09-19 13:37:29','active'),(36,NULL,'MALABON CATERING','MALABON','.',15,2,'2020-09-19 15:49:52',2,'2020-09-19 15:49:52','active'),(37,NULL,'MARILYN YU','MANILA','.',7,2,'2020-09-19 16:20:49',2,'2020-09-19 16:20:49','active'),(38,NULL,'PEDRITO LIM','QUEZON CITY','.',1,2,'2020-09-19 16:22:10',2,'2020-09-19 16:22:10','active'),(39,NULL,'JOCELYN CHUA','CALOOCAN CITY','.',100,2,'2020-09-19 16:22:57',2,'2020-09-19 16:22:57','active'),(40,NULL,'SR iVAN','ROBINSONS PIONEER','.',1,2,'2020-09-19 16:25:06',2,'2020-09-19 16:25:06','active'),(41,NULL,'CAROL CHAN','QUEZON CITY','.',15,2,'2020-09-19 16:27:15',2,'2020-09-19 16:27:15','active'),(42,NULL,'ANALYN SY','SAN JUAN','.',30,2,'2020-09-19 16:29:07',2,'2020-09-19 16:29:07','active'),(43,NULL,'DELFIN VALENCIA','QUEZON CITY','.',7,2,'2020-09-19 16:37:22',2,'2020-09-19 16:37:22','active'),(44,NULL,'RETURN ITEMS','CALOOCAN','.',30,2,'2020-09-19 17:47:58',2,'2020-09-19 17:47:58','active'),(45,NULL,'BROTHER CHAN','QUEZON CITY','.',7,2,'2020-10-13 16:42:30',2,'2020-10-13 16:42:30','active'),(46,NULL,'MOTHER CHAN','QUEZON CITY','.',7,2,'2020-10-13 16:42:46',2,'2020-10-13 16:42:46','active'),(47,NULL,'RICHARD SALAZAR','SAMPALOC MANILA','.',7,2,'2020-10-13 16:44:03',2,'2020-10-13 16:44:03','active'),(48,NULL,'DAMIAN','CALOOCAN','.',7,2,'2020-10-13 16:53:37',2,'2020-10-13 16:53:37','active'),(49,NULL,'AVECANE YU','MALABON','.',7,2,'2020-10-13 16:55:28',2,'2020-10-13 16:55:28','active'),(50,NULL,'CRYSTAL BINONDO','BINONDO','.',7,2,'2020-10-13 16:56:54',2,'2020-10-13 16:56:54','active'),(51,NULL,'ANTONETTES','MAKATI','.',7,2,'2020-10-13 16:58:16',2,'2020-10-13 16:58:16','active'),(52,NULL,'CAFE TUAZON','BANAWE','.',1,2,'2020-10-31 23:21:33',2,'2020-10-31 23:21:33','active'),(53,NULL,'JOAN LIM SY','EASTWEST','.',1,2,'2020-10-31 23:24:50',2,'2020-10-31 23:24:50','active'),(54,NULL,'VICKY VALENCIA','HERMOSA','.',1,2,'2020-10-31 23:27:59',2,'2020-10-31 23:27:59','active'),(55,NULL,'WANDI','CALOOCAN','.',1,2,'2020-10-31 23:38:50',2,'2020-10-31 23:38:50','active'),(56,NULL,'DODNG','CALOOCAN','.',30,2,'2020-10-31 23:41:14',2,'2020-10-31 23:41:14','active'),(57,NULL,'CARLO TUHAO','QUEZON CITY','.',1,2,'2020-10-31 23:49:00',2,'2020-10-31 23:49:00','active'),(58,NULL,'JASMINE','BINONDO','.',1,2,'2020-10-31 23:51:16',2,'2020-10-31 23:51:16','active'),(59,NULL,'RONNIE- CARLOS','QUEZON CITY','.',1,2,'2020-10-31 23:56:50',2,'2020-10-31 23:56:50','active'),(60,NULL,'I-JAP RESTO','GREENHILLS','.',15,2,'2020-11-01 00:01:18',2,'2020-11-01 00:01:18','active'),(61,NULL,'QUIAPO VARIOUS','QUIAPO','.',30,2,'2020-11-01 00:06:23',2,'2020-11-01 00:06:23','active'),(62,NULL,'ORIENT','CALOOCAN','.',1,2,'2020-11-10 18:38:35',2,'2020-11-10 18:38:35','active'),(63,NULL,'OJAP','QUEZON CITY','.',5,2,'2020-11-10 19:34:34',2,'2020-11-10 19:34:34','active');
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
-- Temporary view structure for view `gross_expenses_this_month_view`
--

DROP TABLE IF EXISTS `gross_expenses_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `gross_expenses_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_expenses_this_month_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

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
-- Temporary view structure for view `gross_income_this_month_view`
--

DROP TABLE IF EXISTS `gross_income_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `gross_income_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `gross_income_this_month_view` AS SELECT 
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,NULL,'PUREGRAIN 25KG','SACKS',2,'2020-09-19 12:24:54',2,'2020-10-13 16:57:24',NULL),(2,1,NULL,'PUREGRAIN 50KG','SACKS',2,'2020-09-19 12:25:13',2,'2020-10-13 16:58:57',NULL),(3,1,NULL,'GOLDEN DRAGON 50KG','SACKS',2,'2020-09-19 12:25:59',2,'2020-10-13 16:39:47',NULL),(4,1,NULL,'MINDORO AGUILA 25KG','SACKS',2,'2020-09-19 12:26:12',2,'2020-10-13 16:50:57',NULL),(5,1,NULL,'ROOSTER 25KG','SACKS',2,'2020-09-19 12:26:25',2,'2020-09-19 17:47:13',NULL),(6,1,NULL,'WATERLILY 50KG','SACKS',2,'2020-09-19 12:26:56',2,'2020-09-19 17:48:52',NULL),(7,1,NULL,'RICE FLOWER 50 KG','SACKS',2,'2020-09-19 12:27:07',2,'2020-09-19 16:37:49',NULL),(8,1,NULL,'BACHELOR 50KG','SACKS',2,'2020-09-19 12:40:42',2,'2020-09-19 14:47:53',NULL),(10,1,NULL,'PURE JASMINE 25KG','SACKS',2,'2020-09-19 12:41:19',2,'2020-09-19 16:29:46',NULL),(11,1,NULL,'ORCHID JASMINE 50 KG','SACKS',2,'2020-09-19 12:43:07',2,'2020-09-19 14:47:46',NULL),(13,2,NULL,'FREETO OIL','CAN',2,'2020-09-19 12:43:22',2,'2020-10-13 16:54:41',NULL),(14,1,NULL,'MONKEY KING','SACKS',2,'2020-09-19 14:26:39',2,'2020-09-19 16:23:21',NULL),(15,1,NULL,'PRB','SACKS',2,'2020-10-31 22:45:07',2,'2020-10-31 22:45:23','DINURADO'),(16,1,NULL,'DJQ- 25KG','SACKS',2,'2020-10-31 22:52:29',2,'2020-10-31 22:52:29','JAP'),(17,1,NULL,'KABAYAN 50KG','SACKS',2,'2020-10-31 22:54:07',2,'2020-10-31 22:54:07','SINANDOMENG'),(18,1,NULL,'JAMBALAYA','SACKS',2,'2020-10-31 22:54:37',2,'2020-10-31 22:54:37','SINANDOMENG'),(19,1,NULL,'DJ','25 KG',2,'2020-11-10 18:22:55',2,'2020-11-10 18:22:55','JAR');
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
-- Temporary view structure for view `net_income_this_month_view`
--

DROP TABLE IF EXISTS `net_income_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `net_income_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `net_income_this_month_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `net_income_today_view`
--

DROP TABLE IF EXISTS `net_income_today_view`;
/*!50001 DROP VIEW IF EXISTS `net_income_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `net_income_today_view` AS SELECT 
 1 AS `cost`*/;
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
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `cost` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `addl_pay` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `deduction` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
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
-- Temporary view structure for view `payroll_cost_this_month_view`
--

DROP TABLE IF EXISTS `payroll_cost_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `payroll_cost_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `payroll_cost_this_month_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `payroll_cost_today_view`
--

DROP TABLE IF EXISTS `payroll_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `payroll_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `payroll_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `payroll_cost_view`
--

DROP TABLE IF EXISTS `payroll_cost_view`;
/*!50001 DROP VIEW IF EXISTS `payroll_cost_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `payroll_cost_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `pending_purchases_view`
--

DROP TABLE IF EXISTS `pending_purchases_view`;
/*!50001 DROP VIEW IF EXISTS `pending_purchases_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `pending_purchases_view` AS SELECT 
 1 AS `purchase_no`,
 1 AS `delivery_no`,
 1 AS `supplier_name`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `qty`,
 1 AS `purchase_datetime`*/;
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
  `void` tinyint unsigned NOT NULL DEFAULT '0',
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_code` (`code`),
  KEY `fk_purchases_items_idx` (`item_id`),
  KEY `fk_purchases_users_1_idx` (`created_by`),
  KEY `fk_purchases_users_2_idx` (`updated_by`),
  CONSTRAINT `fk_purchases_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_purchases_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_purchases_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 COMMENT='IMPORTANT: DO NOT EDIT `cost` and `qty` VALUES TO MAINTAIN DATA CONSISTENCY.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,6,'P2020091912504500001','907727',1675.00,12,'2020-09-01 15:36:00',2,'2020-09-19 12:50:45',2,'2020-10-31 17:33:47',0,NULL),(2,10,'P2020091912510600002','907727',950.00,12,'2020-09-01 15:36:00',2,'2020-09-19 12:51:06',2,'2020-10-31 17:33:47',0,NULL),(3,4,'P2020091912513200003','908174',1070.00,6,'2020-09-03 15:38:00',2,'2020-09-19 12:51:32',2,'2020-10-31 17:33:47',0,NULL),(4,6,'P2020091912515000004','908174',1675.00,2,'2020-09-03 15:37:00',2,'2020-09-19 12:51:50',2,'2020-10-31 17:33:47',0,NULL),(5,2,'P2020091912521200005','908174',1745.00,12,'2020-09-03 15:37:00',2,'2020-09-19 12:52:12',2,'2020-10-31 17:33:47',0,NULL),(6,6,'P2020091912523600006','913072',1605.00,7,'2020-09-11 15:38:00',2,'2020-09-19 12:52:36',2,'2020-09-19 15:38:45',0,NULL),(7,2,'P2020091912525700007','913072',1725.00,15,'2020-09-11 15:38:00',2,'2020-09-19 12:52:57',2,'2020-11-01 15:58:54',0,NULL),(8,6,'P2020091912531900008','913627',1605.00,15,'2020-09-12 15:39:00',2,'2020-09-19 12:53:19',2,'2020-10-31 17:33:47',0,NULL),(9,3,'P2020091912534000009','913627',1575.00,2,'2020-09-12 15:39:00',2,'2020-09-19 12:53:40',2,'2020-10-31 17:33:47',0,NULL),(10,2,'P2020091912541600010','913627',1725.00,5,'2020-09-12 15:39:00',2,'2020-09-19 12:54:16',2,'2020-10-31 17:33:47',0,NULL),(11,4,'P2020091912543400011','917056',985.00,10,'2020-09-18 15:40:00',2,'2020-09-19 12:54:34',2,'2020-10-31 17:33:47',0,NULL),(12,3,'P2020091912545000012','917056',1555.00,10,'2020-09-18 15:40:00',2,'2020-09-19 12:54:50',2,'2020-10-31 17:33:47',0,NULL),(13,1,'P2020091912555600013','917056',862.50,6,'2020-09-18 15:40:00',2,'2020-09-19 12:55:56',2,'2020-10-31 17:33:47',0,NULL),(14,11,'P2020091912562200014','917056',1835.00,1,'2020-09-18 15:40:00',2,'2020-09-19 12:56:22',2,'2020-10-31 17:33:47',0,NULL),(15,13,'P2020091912594500015','925466',740.50,60,'2020-09-14 15:43:00',2,'2020-09-19 12:59:45',2,'2020-10-31 17:33:47',0,NULL),(16,6,'P2020091914220600016','904426',1675.00,8,'2020-09-19 14:48:51',2,'2020-09-19 14:22:06',2,'2020-10-31 17:33:47',0,NULL),(17,3,'P2020091914230000017','907726',1735.00,6,'2020-08-31 15:43:00',2,'2020-09-19 14:23:00',2,'2020-10-31 17:33:47',0,NULL),(18,2,'P2020091914235000018','907726',1745.00,19,'2020-09-19 17:34:00',2,'2020-09-19 14:23:50',2,'2020-11-01 15:45:21',0,NULL),(19,1,'P2020091914244200019','907726',882.50,13,'2020-08-31 15:42:00',2,'2020-09-19 14:24:42',2,'2020-10-31 17:33:47',0,NULL),(20,4,'P2020091914261600020','907726',1065.00,2,'2020-08-31 15:42:00',2,'2020-09-19 14:26:16',2,'2020-10-31 17:33:47',0,NULL),(21,14,'P2020091914270000021','907726',1800.00,1,'2020-08-31 15:42:00',2,'2020-09-19 14:27:00',2,'2020-10-31 17:33:47',0,NULL),(22,13,'P2020091914275600022','903458',692.00,38,'2020-08-31 15:43:00',2,'2020-09-19 14:27:56',2,'2020-10-31 17:33:47',0,NULL),(23,8,'P2020091914290300023','907727',1900.00,1,'2020-09-19 14:47:53',2,'2020-09-19 14:29:03',2,'2020-10-31 17:33:47',0,NULL),(25,7,'P2020091914321500025','907726',1800.00,1,'2020-08-31 15:41:00',2,'2020-09-19 14:32:15',2,'2020-10-31 17:33:47',0,NULL),(27,3,'P2020091915033300027','917975',1555.00,1,'2020-09-19 15:41:00',2,'2020-09-19 15:03:33',2,'2020-10-31 17:33:47',0,NULL),(29,5,'P2020091917254000029','907726',930.00,1,'2020-09-19 17:47:13',2,'2020-09-19 17:25:40',2,'2020-10-31 17:33:47',0,NULL),(30,3,'P2020091917470100030','0000',1555.00,8,'2020-09-19 17:47:00',2,'2020-09-19 17:47:01',2,'2020-11-01 15:59:10',0,NULL),(31,4,'P2020101316230000031','920724',985.00,10,'2020-09-27 16:23:00',2,'2020-09-27 16:23:00',2,'2020-10-31 22:27:51',0,NULL),(32,2,'P2020101316234700032','920724',1725.00,12,'2020-09-27 16:23:00',2,'2020-09-27 16:23:00',2,'2020-10-31 22:27:35',0,NULL),(33,1,'P2020101316241700033','920724',862.50,10,'2020-09-27 16:24:00',2,'2020-09-27 16:24:00',2,'2020-10-31 22:27:15',0,NULL),(34,2,'10-31-20','927467',1705.00,20,NULL,2,'2020-10-31 21:23:54',2,'2020-10-31 22:24:25',1,NULL),(45,1,'P2020103122422900035','927467',1705.00,20,'2020-10-30 22:42:00',2,'2020-10-06 00:00:00',2,'2020-11-01 15:19:35',0,NULL),(46,3,'P2020103122430400046','936137',1535.00,5,'2020-10-31 22:43:11',2,'2020-10-20 00:00:00',2,'2020-10-31 22:43:11',0,NULL),(47,15,'P2020103122455300047','936137',1765.00,8,'2020-10-31 22:46:04',2,'2020-10-20 00:00:00',2,'2020-10-31 22:46:04',0,NULL),(48,11,'P2020103122462700048','936137',1865.00,1,'2020-10-31 22:46:33',2,'2020-10-20 00:00:00',2,'2020-10-31 22:46:33',0,NULL),(49,3,'P2020103122470700049','930780',1535.00,5,'2020-10-31 22:47:14',2,'2020-10-12 00:00:00',2,'2020-10-31 22:47:14',0,NULL),(50,4,'P2020103122473700050','930780',990.00,10,'2020-10-31 22:47:43',2,'2020-10-12 00:00:00',2,'2020-10-31 22:47:43',0,NULL),(51,2,'P2020103122480700051','930780',1705.00,5,'2020-10-31 22:48:00',2,'2020-10-12 00:00:00',2,'2020-11-01 15:58:38',0,NULL),(52,1,'P2020103122483500052','930780',852.50,10,'2020-10-31 22:48:41',2,'2020-10-12 00:00:00',2,'2020-10-31 22:48:41',0,NULL),(53,3,'P2020103122491200053','937430',1535.00,15,'2020-10-31 22:49:40',2,'2020-10-22 00:00:00',2,'2020-10-31 22:49:40',0,NULL),(54,15,'P2020103122493300054','937430',1765.00,5,'2020-10-31 22:49:46',2,'2020-10-22 00:00:00',2,'2020-10-31 22:49:46',0,NULL),(55,3,'P2020103122501600055','940094',1535.00,2,'2020-10-31 22:50:22',2,'2020-10-27 00:00:00',2,'2020-10-31 22:50:22',0,NULL),(56,15,'P2020103122504500056','940094',1765.00,15,'2020-10-31 22:50:52',2,'2020-10-27 00:00:00',2,'2020-10-31 22:50:52',0,NULL),(57,11,'P2020103122511200057','940094',1905.00,1,'2020-10-31 22:51:25',2,'2020-10-27 00:00:00',2,'2020-10-31 22:51:25',0,NULL),(58,16,'P2020103122525600058','941817',890.00,10,'2020-10-31 22:53:00',2,'2020-10-30 00:00:00',2,'2020-11-01 15:58:05',0,NULL),(59,16,'P2020103122533400059','941604',890.00,1,'2020-10-31 22:53:41',2,'2020-10-29 00:00:00',2,'2020-10-31 22:53:41',0,NULL),(60,17,'P2020103122551200060','941918',1535.00,2,'2020-10-31 22:56:01',2,'2020-10-29 00:00:00',2,'2020-10-31 22:56:01',0,NULL),(61,17,'P2020103122553800061','941918',1535.00,8,'2020-10-31 22:55:00',2,'2020-10-30 00:00:00',2,'2020-11-01 15:58:11',0,NULL),(62,13,'P2020103122565500062','933214',764.00,70,'2020-10-31 22:57:11',2,'2020-10-15 00:00:00',2,'2020-10-31 22:57:11',0,NULL),(63,2,'P2020103123361800063','927468',1705.00,20,'2020-10-31 23:36:00',2,'2020-10-06 00:00:00',2,'2020-11-01 15:58:22',0,NULL),(64,2,'P2020110116052700064','88888',1705.00,3,'2020-11-01 16:05:51',2,'2020-10-20 00:00:00',2,'2020-11-01 16:05:51',0,NULL),(65,16,'P2020111018234500065','483760',885.00,30,'2020-11-10 18:23:54',2,'2020-11-03 00:00:00',2,'2020-11-10 18:23:54',0,NULL),(66,16,'P2020111018241500066','483760',925.00,10,'2020-11-10 18:24:22',2,'2020-11-03 00:00:00',2,'2020-11-10 18:24:22',0,NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `purchases_cost_this_month_view`
--

DROP TABLE IF EXISTS `purchases_cost_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `purchases_cost_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchases_cost_this_month_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `purchases_cost_today_view`
--

DROP TABLE IF EXISTS `purchases_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `purchases_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchases_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `purchases_cost_view`
--

DROP TABLE IF EXISTS `purchases_cost_view`;
/*!50001 DROP VIEW IF EXISTS `purchases_cost_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `purchases_cost_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

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
 1 AS `received_on`,
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
 1 AS `item_name`,
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
 1 AS `purchase_no`,
 1 AS `delivery_no`,
 1 AS `supplier_name`,
 1 AS `item_name`,
 1 AS `cost`,
 1 AS `qty`,
 1 AS `reception_datetime`*/;
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
  `item_id` smallint unsigned NOT NULL,
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
  `void` tinyint unsigned NOT NULL DEFAULT '0',
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_code` (`code`),
  KEY `fk_sales_clients_idx` (`client_id`),
  KEY `fk_sales_users_1_idx` (`created_by`),
  KEY `fk_sales_users_2_idx` (`updated_by`),
  KEY `fk_sales_items_idx` (`item_id`),
  CONSTRAINT `fk_sales_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `fk_sales_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_sales_users_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_sales_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1 COMMENT='Latest product price is always used.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,22,6,'S2020091913515200002','0819','0',1880.00,5,0.00,0.00,'2020-10-09 00:00:00',2,'2020-09-19 13:51:52',2,'2020-10-31 17:33:47',0,NULL),(3,22,2,'S2020091914010800003','0819','0',2120.00,4,0.00,0.00,'2020-10-09 17:18:00',2,'2020-09-19 14:01:08',2,'2020-11-01 15:32:31',0,NULL),(4,8,1,'S2020091915474400004','0821','0',1100.00,3,0.00,0.00,'2020-09-21 17:12:00',2,'2020-09-19 15:47:44',2,'2020-11-01 15:33:10',0,NULL),(7,26,1,'S2020091916155700007','0822','0',1100.00,1,0.00,0.00,'2020-09-21 17:08:00',2,'2020-09-19 16:15:57',2,'2020-11-01 15:33:25',0,NULL),(8,19,3,'S2020091916163400008','0823','0',1850.00,3,0.00,0.00,'2020-09-21 17:07:00',2,'2020-09-19 16:16:34',2,'2020-11-01 15:39:19',0,NULL),(9,1,3,'S2020091916180600009','0824','0',2000.00,1,0.00,0.00,'2020-09-21 17:25:00',2,'2020-09-19 16:18:06',2,'2020-11-01 15:33:50',0,NULL),(10,23,2,'S2020091916183700010','0825','0',2120.00,1,0.00,0.00,'2020-09-21 17:31:00',2,'2020-09-19 16:18:37',2,'2020-11-01 15:34:07',0,NULL),(11,23,13,'S2020091916191100011','0825','0',880.00,2,0.00,0.00,'2020-09-21 17:31:00',2,'2020-09-19 16:19:11',2,'2020-10-31 17:33:47',0,NULL),(12,18,6,'S2020091916200200012','0826','0',1850.00,2,0.00,0.00,'2020-09-21 17:15:00',2,'2020-09-19 16:20:02',2,'2020-10-31 21:35:47',0,NULL),(13,29,4,'S2020091916203000013','0827','0',1300.00,1,0.00,0.00,'2020-09-21 17:21:00',2,'2020-09-19 16:20:30',2,'2020-10-31 17:33:47',0,NULL),(14,37,4,'S2020091916211800014','0828','0',1300.00,1,0.00,0.00,'2020-09-21 17:15:00',2,'2020-09-19 16:21:18',2,'2020-10-31 21:34:51',0,NULL),(15,21,13,'S2020091916214300015','0829','0',880.00,10,0.00,0.00,'2020-10-15 21:42:00',2,'2020-09-19 16:21:43',2,'2020-10-31 21:42:41',0,NULL),(16,38,3,'S2020091916224000016','0830','0',1900.00,1,0.00,0.00,'2020-09-21 17:23:00',2,'2020-09-19 16:22:40',2,'2020-11-10 19:28:38',0,NULL),(17,39,14,'S2020091916232100017','0830','0',1900.00,1,0.00,0.00,'2020-11-03 19:28:00',2,'2020-09-19 16:23:21',2,'2020-11-10 19:28:25',0,NULL),(18,24,13,'S2020091916235200018','0831','0',880.00,1,0.00,0.00,'2020-10-06 17:13:00',2,'2020-09-19 16:23:52',2,'2020-10-31 17:33:47',0,NULL),(19,24,2,'S2020091916243700019','0831','0',2120.00,1,0.00,0.00,'2020-10-06 17:13:00',2,'2020-09-19 16:24:37',2,'2020-11-01 15:34:55',0,NULL),(20,40,3,'S2020091916253400020','0832','0',1850.00,5,0.00,0.00,'2020-09-21 17:20:00',2,'2020-09-19 16:25:34',2,'2020-11-01 15:35:09',0,NULL),(21,20,6,'S2020091916255400021','0833','0',1850.00,2,0.00,0.00,'2020-09-21 17:04:00',2,'2020-09-19 16:25:54',2,'2020-10-31 21:33:02',0,NULL),(22,20,6,'S2020091916255500022','0833','0',1850.00,2,0.00,0.00,'2020-09-21 17:04:00',2,'2020-09-19 16:25:55',2,'2020-10-31 21:32:43',0,NULL),(23,36,2,'S2020091916263500023','0834','0',2050.00,10,0.00,0.00,NULL,2,'2020-09-19 16:26:35',2,'2020-10-31 17:33:47',0,NULL),(24,18,6,'S2020091916265500024','0835','0',1850.00,2,0.00,0.00,'2020-09-21 17:10:00',2,'2020-09-19 16:26:55',2,'2020-10-31 21:35:16',0,NULL),(25,41,6,'S2020091916274700025','0836','0',1850.00,5,0.00,0.00,'2020-09-30 17:13:00',2,'2020-09-19 16:27:47',2,'2020-10-31 21:37:11',0,NULL),(26,19,6,'S2020091916281300026','0837','0',1850.00,1,0.00,0.00,'2020-09-21 17:06:00',2,'2020-09-19 16:28:13',2,'2020-10-31 17:33:47',0,NULL),(27,8,1,'S2020091916284200027','0838','0',1100.00,2,0.00,0.00,'2020-09-24 17:05:00',2,'2020-09-19 16:28:42',2,'2020-11-01 15:36:08',0,NULL),(28,8,1,'S2020091916284200028','0838','0',1100.00,1,0.00,0.00,'2020-09-24 21:51:00',2,'2020-09-19 16:28:42',2,'2020-10-31 21:51:56',0,NULL),(29,42,10,'S2020091916294600029','0839','0',1075.00,2,0.00,0.00,'2020-09-30 21:40:00',2,'2020-09-19 16:29:46',2,'2020-10-31 21:40:06',0,NULL),(30,18,6,'S2020091916301700030','0841','0',1850.00,1,0.00,0.00,'2020-09-21 17:10:00',2,'2020-09-19 16:30:17',2,'2020-10-31 17:33:47',0,NULL),(31,21,13,'S2020091916304200031','0842','0',880.00,10,0.00,0.00,'2020-10-15 21:42:00',2,'2020-09-19 16:30:42',2,'2020-10-31 21:42:15',0,NULL),(32,35,6,'S2020091916311600032','0843','0',1900.00,8,0.00,0.00,'2020-09-21 17:07:00',2,'2020-09-19 16:31:16',2,'2020-10-31 21:33:12',0,NULL),(33,35,4,'S2020091916311600033','0843','0',1300.00,4,0.00,0.00,'2020-09-21 17:07:00',2,'2020-09-19 16:31:16',2,'2020-10-31 17:33:47',0,NULL),(34,26,1,'S2020091916365800034','0844','0',1100.00,1,0.00,0.00,'2020-10-12 19:30:00',2,'2020-09-19 16:36:58',2,'2020-11-10 19:30:59',0,NULL),(35,43,7,'S2020091916374900035','0845','0',2000.00,1,0.00,0.00,'2020-09-21 17:09:00',2,'2020-09-19 16:37:49',2,'2020-11-01 15:36:57',0,NULL),(36,36,2,'S2020091916381900036','0846','0',2050.00,8,0.00,0.00,NULL,2,'2020-09-19 16:38:19',2,'2020-10-31 17:33:46',0,NULL),(37,36,2,'S2020091916381900037','0846','0',2050.00,2,0.00,0.00,NULL,2,'2020-09-19 16:38:19',2,'2020-10-31 17:33:47',0,NULL),(38,34,1,'S2020091916384700038','0847','0',1050.00,3,0.00,0.00,NULL,2,'2020-09-19 16:38:47',2,'2020-10-31 17:33:47',0,NULL),(39,32,4,'S2020091916391000039','0848','0',1300.00,1,0.00,0.00,'2020-09-21 17:04:00',2,'2020-09-19 16:39:10',2,'2020-10-31 21:34:22',0,NULL),(40,1,1,'S2020091916393400040','0849','0',1200.00,1,0.00,0.00,'2020-09-21 17:11:00',2,'2020-09-19 16:39:34',2,'2020-11-01 15:37:35',0,NULL),(41,21,13,'S2020091916395300041','0850','0',880.00,8,0.00,0.00,'2020-10-20 21:43:00',2,'2020-09-19 16:39:53',2,'2020-10-31 21:43:50',0,NULL),(42,21,13,'S2020091917030300042','0816','0',880.00,8,0.00,0.00,'2020-10-09 17:08:00',2,'2020-09-19 17:03:03',2,'2020-10-31 21:40:28',0,NULL),(43,36,2,'S2020091917143500043','0820','0',2050.00,1,0.00,0.00,NULL,2,'2020-09-19 17:14:35',2,'2020-10-31 17:33:47',0,NULL),(44,36,2,'S2020091917143500044','0820','0',2050.00,5,0.00,0.00,NULL,2,'2020-09-19 17:14:35',2,'2020-10-31 17:33:47',0,NULL),(45,36,2,'S2020091917143500045','0820','0',2050.00,4,0.00,0.00,NULL,2,'2020-09-19 17:14:35',2,'2020-10-31 17:33:47',0,NULL),(46,25,4,'S2020091917183300046','0851','0',1250.00,3,0.00,150.00,'2020-11-11 19:37:00',2,'2020-09-19 17:18:33',2,'2020-11-10 19:37:16',0,NULL),(47,18,6,'S2020091917194500047','0817','0',1850.00,2,0.00,0.00,'2020-09-21 17:33:00',2,'2020-09-19 17:19:45',2,'2020-10-31 17:33:47',0,NULL),(49,18,6,'S2020091917372900049','0841','0',1850.00,1,0.00,0.00,'2020-09-21 17:09:00',2,'2020-09-19 17:37:29',2,'2020-10-31 21:35:06',0,NULL),(50,19,6,'S2020091917390800050','0837','0',1850.00,2,0.00,0.00,'2020-09-18 17:06:00',2,'2020-09-19 17:39:08',2,'2020-10-31 21:34:09',0,NULL),(51,30,6,'S2020091917460700051','0818','0',1900.00,3,0.00,0.00,'2020-09-21 17:22:00',2,'2020-09-19 17:46:07',2,'2020-10-31 17:33:47',0,NULL),(52,44,6,'S2020091917485200052','0000','0',1675.00,8,0.00,0.00,NULL,2,'2020-09-19 17:48:52',2,'2020-10-31 17:33:47',0,'REPLACE GOLDEN DRAGON'),(53,27,4,'S2020101316272200053','0852','0',1300.00,1,0.00,0.00,'2020-11-05 19:25:00',2,'2020-10-13 16:27:22',2,'2020-11-10 19:25:26',0,NULL),(54,18,3,'S2020101316290700054','853','0',1850.00,2,0.00,0.00,'2020-10-13 16:30:00',2,'2020-10-13 16:29:07',2,'2020-11-01 15:25:53',0,NULL),(55,20,3,'S2020101316394700055','854','0',1850.00,2,0.00,0.00,'2020-10-06 21:54:00',2,'2020-10-13 16:39:47',2,'2020-10-31 21:54:46',0,NULL),(56,20,3,'S2020101316394700056','854','0',1850.00,3,0.00,0.00,'2020-10-06 21:54:00',2,'2020-10-13 16:39:47',2,'2020-10-31 21:54:58',0,NULL),(57,46,4,'S2020101316431100057','855','0',1300.00,2,0.00,0.00,NULL,2,'2020-10-13 16:43:11',2,'2020-10-31 17:33:47',0,NULL),(58,47,1,'S2020101316443500058','856','0',1250.00,1,0.00,0.00,NULL,2,'2020-10-13 16:44:35',2,'2020-10-31 17:33:47',0,NULL),(59,8,1,'S2020101316484000059','857','0',1100.00,3,0.00,0.00,'2020-10-19 21:42:00',2,'2020-10-13 16:48:40',2,'2020-10-31 21:42:53',0,NULL),(60,8,1,'S2020101316492500060','858','0',1100.00,1,0.00,0.00,'2020-11-09 19:33:00',2,'2020-10-13 16:49:25',2,'2020-11-10 19:33:44',0,'MS ANITA'),(61,21,13,'S2020101316495400061','859','0',880.00,10,0.00,0.00,'2020-10-20 21:43:00',2,'2020-10-13 16:49:54',2,'2020-10-31 21:43:22',0,NULL),(62,30,4,'S2020101316505700062','860','0',1300.00,2,0.00,0.00,'2020-09-28 17:15:00',2,'2020-10-13 16:50:57',2,'2020-10-31 21:36:18',0,NULL),(63,36,2,'S2020101316523300063','861','0',2050.00,10,0.00,0.00,NULL,2,'2020-10-13 16:52:33',2,'2020-10-31 17:33:47',0,NULL),(64,36,2,'S2020101316523300064','861','0',2050.00,1,0.00,0.00,NULL,2,'2020-10-13 16:52:33',2,'2020-10-31 17:33:47',0,NULL),(65,48,1,'S2020101316541400065','862','0',1100.00,1,0.00,0.00,'2020-10-27 21:44:00',2,'2020-10-13 16:54:14',2,'2020-10-31 21:44:15',0,NULL),(66,21,13,'S2020101316544100066','863','0',880.00,5,0.00,0.00,'2020-10-20 21:43:00',2,'2020-10-13 16:54:41',2,'2020-10-31 21:43:07',0,NULL),(67,49,2,'S2020101316560000067','864','0',2200.00,2,0.00,0.00,'2020-09-29 17:14:00',2,'2020-10-13 16:56:00',2,'2020-11-01 15:27:23',0,NULL),(68,50,1,'S2020101316572400068','865','0',1150.00,1,0.00,0.00,'2020-09-29 17:14:00',2,'2020-10-13 16:57:24',2,'2020-11-01 15:27:46',0,NULL),(69,51,2,'S2020101316585700069','866','0',2050.00,4,0.00,0.00,NULL,2,'2020-10-13 16:58:57',2,'2020-10-31 17:33:47',0,NULL),(70,21,13,'S2020103118433800070','867','0',880.00,5,0.00,0.00,'2020-11-10 19:21:00',2,'2020-10-02 00:00:00',2,'2020-11-10 19:21:47',0,NULL),(71,44,2,'S2020103122443900071','936137','0',0.00,8,0.00,0.00,NULL,2,'2020-10-20 00:00:00',2,'2020-10-31 22:44:39',0,'change to prob'),(72,24,2,'S2020103123075300072','0868','0',2120.00,1,0.00,0.00,'2020-11-03 19:31:00',2,'2020-10-31 23:07:53',2,'2020-11-10 19:31:18',0,NULL),(73,24,13,'S2020103123085800073','0868','0',880.00,1,0.00,0.00,'2020-11-03 19:31:00',2,'2020-10-02 00:00:00',2,'2020-11-10 19:31:29',0,NULL),(74,25,4,'S2020103123111600074','0869','0',1250.00,3,0.00,150.00,'2020-11-11 19:36:00',2,'2020-10-02 00:00:00',2,'2020-11-10 19:37:01',0,NULL),(75,29,4,'S2020103123124100075','0870','0',1300.00,1,0.00,0.00,NULL,2,'2020-10-03 00:00:00',2,'2020-10-31 23:12:41',0,NULL),(76,21,13,'S2020103123142900076','0871','0',880.00,5,0.00,0.00,'2020-11-10 19:21:00',2,'2020-10-06 00:00:00',2,'2020-11-10 19:22:00',0,NULL),(77,8,1,'S2020103123153300077','0872','0',1100.00,3,0.00,0.00,'2020-10-19 14:54:00',2,'2020-10-06 00:00:00',2,'2020-11-01 14:54:37',0,NULL),(78,8,1,'S2020103123165800078','0873','0',1100.00,1,0.00,0.00,'2020-10-19 14:54:00',2,'2020-10-06 00:00:00',2,'2020-11-01 14:54:18',0,'MAM AMY'),(79,36,2,'S2020103123180500079','0874','0',2050.00,8,0.00,0.00,NULL,2,'2020-10-06 00:00:00',2,'2020-10-31 23:18:05',0,NULL),(80,41,3,'S2020103123185100080','0875','0',1850.00,5,0.00,0.00,'2020-10-28 14:55:00',2,'2020-10-07 00:00:00',2,'2020-11-01 14:55:28',0,NULL),(81,52,2,'S2020103123221200081','0876','0',2050.00,1,0.00,0.00,'2020-10-09 14:55:00',2,'2020-10-07 00:00:00',2,'2020-11-01 14:56:11',0,NULL),(82,21,13,'S2020103123235200082','0877','0',880.00,10,0.00,0.00,'2020-11-10 19:22:00',2,'2020-10-09 00:00:00',2,'2020-11-10 19:22:14',0,NULL),(83,53,1,'S2020103123253600083','0878','0',1130.00,1,0.00,0.00,'2020-10-09 15:00:00',2,'2020-10-09 00:00:00',2,'2020-11-01 15:00:43',0,NULL),(84,26,1,'S2020103123265800084','0879','0',1100.00,1,0.00,0.00,'2020-11-03 19:30:00',2,'2020-10-09 00:00:00',2,'2020-11-10 19:30:09',0,NULL),(85,20,3,'S2020103123273100085','0880','0',1850.00,3,0.00,0.00,'2020-11-05 19:24:00',2,'2020-10-12 00:00:00',2,'2020-11-10 19:24:28',0,NULL),(86,54,4,'S2020103123283500086','0881','0',1300.00,2,0.00,0.00,'2020-10-12 15:01:00',2,'2020-10-12 00:00:00',2,'2020-11-01 15:01:34',0,NULL),(87,44,1,'S2020103123344100087','927467','0',0.00,20,0.00,0.00,NULL,2,'2020-10-30 00:00:00',2,'2020-10-31 23:34:41',0,NULL),(88,36,2,'S2020103123372600088','0882','0',2050.00,5,0.00,0.00,NULL,2,'2020-10-12 00:00:00',2,'2020-10-31 23:37:26',0,NULL),(89,40,3,'S2020103123382300089','0883','0',1850.00,5,0.00,0.00,'2020-11-03 19:29:00',2,'2020-10-13 00:00:00',2,'2020-11-10 19:29:18',0,NULL),(90,55,4,'S2020103123393300090','0884','0',1300.00,1,0.00,0.00,'2020-10-13 15:02:00',2,'2020-10-13 00:00:00',2,'2020-11-01 15:02:33',0,NULL),(91,21,13,'S2020103123403200091','0885','0',880.00,10,0.00,0.00,'2020-11-10 19:20:00',2,'2020-10-15 00:00:00',2,'2020-11-10 19:20:11',0,NULL),(92,56,2,'S2020103123420200092','0886','0',2200.00,1,0.00,0.00,NULL,2,'2020-10-14 00:00:00',2,'2020-10-31 23:42:02',0,NULL),(93,39,13,'S2020103123432300093','0886','0',800.00,1,0.00,0.00,NULL,2,'2020-10-31 23:43:23',2,'2020-10-31 23:43:23',0,NULL),(94,39,3,'S2020103123432300094','0886','0',1600.00,1,0.00,0.00,NULL,2,'2020-10-14 00:00:00',2,'2020-10-31 23:43:23',0,NULL),(95,23,13,'S2020103123441900095','0887','0',880.00,2,0.00,0.00,'2020-10-27 15:03:00',2,'2020-10-31 23:44:19',2,'2020-11-01 15:03:51',0,NULL),(96,23,2,'S2020103123441900096','0887','0',2120.00,1,0.00,0.00,'2020-10-27 15:03:00',2,'2020-10-15 00:00:00',2,'2020-11-01 15:04:03',0,NULL),(97,8,1,'S2020103123450600097','0888','0',1100.00,3,0.00,0.00,'2020-11-09 19:32:00',2,'2020-10-17 00:00:00',2,'2020-11-10 19:32:50',0,NULL),(98,42,11,'S2020103123461100098','0889','0',2150.00,1,0.00,0.00,NULL,2,'2020-10-16 00:00:00',2,'2020-10-31 23:46:11',0,NULL),(99,36,2,'S2020103123470800099','0890','0',2050.00,6,0.00,0.00,NULL,2,'2020-10-19 00:00:00',2,'2020-10-31 23:47:08',0,NULL),(100,25,4,'S2020103123482700100','0891','0',1250.00,3,0.00,0.00,'2020-11-11 19:37:00',2,'2020-10-19 00:00:00',2,'2020-11-10 19:37:41',0,NULL),(101,57,3,'S2020103123493900101','0892','0',1750.00,2,0.00,0.00,'2020-10-22 15:04:00',2,'2020-10-20 00:00:00',2,'2020-11-01 15:04:26',0,NULL),(102,21,3,'S2020103123504000102','0893','0',1750.00,2,0.00,0.00,'2020-11-10 19:20:00',2,'2020-10-31 23:50:40',2,'2020-11-10 19:20:37',0,NULL),(103,21,13,'S2020103123504000103','0893','0',880.00,8,0.00,0.00,'2020-11-10 19:20:00',2,'2020-10-21 00:00:00',2,'2020-11-10 19:20:51',0,NULL),(104,58,3,'S2020103123515800104','0894','0',1800.00,5,0.00,0.00,'2020-10-23 15:04:00',2,'2020-10-22 00:00:00',2,'2020-11-01 16:08:12',0,NULL),(105,1,3,'S2020103123524400105','0895','0',1750.00,1,0.00,0.00,'2020-10-26 15:05:00',2,'2020-10-22 00:00:00',2,'2020-11-01 15:05:08',0,NULL),(106,36,15,'S2020103123532700106','0896','0',2050.00,8,0.00,0.00,NULL,2,'2020-10-24 00:00:00',2,'2020-10-31 23:53:27',0,NULL),(107,38,3,'S2020103123542600107','0897','0',1900.00,1,0.00,0.00,'2020-11-11 19:37:00',2,'2020-10-24 00:00:00',2,'2020-11-10 19:37:55',0,NULL),(108,41,3,'S2020103123552700108','0898','0',1850.00,3,0.00,0.00,'2020-10-27 14:54:00',2,'2020-10-24 00:00:00',2,'2020-11-01 14:54:56',0,NULL),(109,1,1,'S2020103123560100109','0899','0',1200.00,1,0.00,0.00,'2020-10-28 15:06:00',2,'2020-10-26 00:00:00',2,'2020-11-01 15:06:29',0,NULL),(110,59,4,'S2020103123573300110','0900','0',1300.00,1,0.00,0.00,NULL,2,'2020-10-26 00:00:00',2,'2020-10-31 23:57:33',0,NULL),(111,21,13,'S2020103123582400111','0901','0',880.00,10,0.00,0.00,'2020-11-10 19:21:00',2,'2020-10-27 00:00:00',2,'2020-11-10 19:21:05',0,NULL),(112,21,3,'S2020103123592400112','0902','0',1750.00,2,0.00,0.00,'2020-11-10 19:21:00',2,'2020-10-27 00:00:00',2,'2020-11-10 19:21:20',0,NULL),(113,8,1,'S2020110100000600113','0903','0',1100.00,3,0.00,0.00,'2020-11-09 19:33:00',2,'2020-10-27 00:00:00',2,'2020-11-10 19:33:08',0,NULL),(114,57,17,'S2020110100004700114','0904','0',1750.00,2,0.00,0.00,'2020-11-03 19:31:00',2,'2020-11-29 00:00:00',2,'2020-11-10 19:31:52',0,NULL),(115,60,16,'S2020110100020000115','0905','0',1200.00,10,0.00,0.00,'2020-11-03 19:25:00',2,'2020-11-30 00:00:00',2,'2020-11-10 19:25:48',0,NULL),(116,24,13,'S2020110100024500116','0906','0',880.00,2,0.00,0.00,NULL,2,'2020-10-30 00:00:00',2,'2020-11-01 00:02:45',0,NULL),(117,21,13,'S2020110100032800117','0907','0',880.00,10,0.00,0.00,NULL,2,'2020-10-31 00:00:00',2,'2020-11-01 00:03:28',0,NULL),(118,36,15,'S2020110100040600118','0908','0',2050.00,5,0.00,0.00,NULL,2,'2020-10-31 00:00:00',2,'2020-11-01 00:04:06',0,NULL),(119,37,4,'S2020110100045300119','0909','0',1300.00,2,0.00,0.00,'2020-11-05 19:24:00',2,'2020-10-31 00:00:00',2,'2020-11-10 19:24:48',0,NULL),(120,50,4,'S2020110100052900120','0910','0',1300.00,1,0.00,0.00,'2020-11-11 19:38:00',2,'2020-10-31 00:00:00',2,'2020-11-10 19:38:22',0,NULL),(121,61,10,'S2020110100070000121','0911','0',1200.00,4,0.00,0.00,NULL,2,'2020-10-31 00:00:00',2,'2020-11-01 00:07:00',0,NULL),(122,30,4,'S2020111018263400122','912','0',1300.00,2,0.00,0.00,'2020-11-05 19:25:00',2,'2020-11-04 00:00:00',2,'2020-11-10 19:25:06',0,NULL),(123,40,3,'S2020111018280000123','0913','0',1850.00,5,0.00,0.00,'2020-11-11 19:38:00',2,'2020-11-04 00:00:00',2,'2020-11-10 19:38:08',0,NULL),(124,27,1,'S2020111018284800124','0914','0',1100.00,1,0.00,0.00,NULL,2,'2020-11-04 00:00:00',2,'2020-11-10 18:28:48',0,NULL),(125,26,1,'S2020111018292400125','0914','0',1100.00,1,0.00,0.00,NULL,2,'2020-11-04 00:00:00',2,'2020-11-10 18:29:24',0,NULL),(126,21,13,'S2020111018301600126','0915','0',880.00,10,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:30:16',0,NULL),(127,21,1,'S2020111018315500127','0916','0',1100.00,3,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:31:55',0,NULL),(128,8,1,'S2020111018335300128','0917','0',1100.00,1,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:33:53',0,'MAM ANITA'),(129,36,15,'S2020111018345500129','0918','0',2050.00,5,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:34:55',0,NULL),(130,34,10,'S2020111018353800130','0919','0',1100.00,2,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:35:38',0,NULL),(131,55,4,'S2020111018360900131','0920','0',1300.00,1,0.00,0.00,'2020-11-09 19:33:00',2,'2020-11-06 00:00:00',2,'2020-11-10 19:33:23',0,NULL),(132,61,10,'S2020111018365100132','0921','0',1200.00,1,0.00,0.00,NULL,2,'2020-11-06 00:00:00',2,'2020-11-10 18:36:51',0,'REGGIE'),(133,21,17,'S2020111018380200133','0922','0',1750.00,2,0.00,0.00,NULL,2,'2020-11-07 00:00:00',2,'2020-11-10 18:38:02',0,NULL),(134,62,10,'S2020111018390600134','0923','0',1100.00,1,0.00,0.00,'2020-11-09 19:32:00',2,'2020-11-08 00:00:00',2,'2020-11-10 19:32:11',0,NULL),(135,36,15,'S2020111018394900135','0924','0',2050.00,5,0.00,0.00,NULL,2,'2020-11-10 00:00:00',2,'2020-11-10 18:39:49',0,NULL),(136,24,2,'S2020111018412500136','0925','0',0.00,0,0.00,0.00,NULL,2,'2020-11-10 18:41:25',2,'2020-11-10 18:50:16',0,NULL),(137,24,2,'S2020111018420300137','0925','0',2120.00,1,0.00,0.00,NULL,2,'2020-11-10 18:42:03',2,'2020-11-10 18:42:03',0,NULL),(138,24,13,'S2020111018420300138','0925','0',880.00,1,0.00,0.00,NULL,2,'2020-11-10 00:00:00',2,'2020-11-10 18:42:03',0,NULL),(139,63,16,'S2020111019351800139','0926','0',1200.00,4,0.00,0.00,NULL,2,'2020-11-10 19:35:18',2,'2020-11-10 19:35:18',0,NULL),(140,63,17,'S2020111019351800140','0926','0',1700.00,1,0.00,0.00,NULL,2,'2020-11-11 00:00:00',2,'2020-11-10 19:35:18',0,NULL),(141,39,16,'S2020111019360600141','0927','0',900.00,1,0.00,0.00,'2020-11-11 19:36:00',2,'2020-11-11 00:00:00',2,'2020-11-10 19:36:41',0,NULL);
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
 1 AS `sale_id`,
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
-- Temporary view structure for view `stock_qty_view`
--

DROP TABLE IF EXISTS `stock_qty_view`;
/*!50001 DROP VIEW IF EXISTS `stock_qty_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stock_qty_view` AS SELECT 
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
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `users_BEFORE_INSERT` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
   
    DECLARE `var_fullname` VARCHAR(75);
    
	IF (NEW.`middle_name` = '' OR NEW.`middle_name` IS NULL) THEN
		SET `var_fullname` = CONCAT(NEW.`first_name`, ' ', NEW.`last_name`);
	ELSE
		SET `var_fullname` = CONCAT(NEW.`first_name`, ' ', NEW.`middle_name`, ' ', NEW.`last_name`);
	END IF;
    
	IF (NEW.`name_suffix` <> '' AND NEW.`name_suffix` IS NOT NULL) THEN
		SET `var_fullname` = CONCAT(`var_fullname`, ' ', NEW.`name_suffix`);
	END IF;
    
    SET NEW.`fullname` = `var_fullname`;
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `users_BEFORE_UPDATE` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN

    DECLARE `var_fullname` VARCHAR(75);
    
	IF (NEW.`middle_name` = '' OR NEW.`middle_name` IS NULL) THEN
		SET `var_fullname` = CONCAT(NEW.`first_name`, ' ', NEW.`last_name`);
	ELSE
		SET `var_fullname` = CONCAT(NEW.`first_name`, ' ', NEW.`middle_name`, ' ', NEW.`last_name`);
	END IF;
    
	IF (NEW.`name_suffix` <> '' AND NEW.`name_suffix` IS NOT NULL) THEN
		SET `var_fullname` = CONCAT(`var_fullname`, ' ', NEW.`name_suffix`);
	END IF;
    
    SET NEW.`fullname` = `var_fullname`;
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `utilities`
--

DROP TABLE IF EXISTS `utilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilities` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `utility_type_id` smallint unsigned NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
INSERT INTO `utilities` VALUES (1,1,'2020-09-01','2020-09-30',900.00,2,'2020-09-19 16:52:16',2,'2020-10-31 20:58:04','SEPT 2020'),(2,2,'2020-09-01','2020-09-30',1000.00,2,'2020-09-19 16:52:38',2,'2020-10-31 20:58:21','SEPT 2020'),(3,3,'2020-09-01','2020-09-30',25000.00,2,'2020-09-19 16:52:58',2,'2020-10-31 19:14:47','SEPT 2020'),(4,5,'2020-09-01','2020-09-10',500.00,2,'2020-09-19 16:54:15',2,'2020-10-31 21:03:21','SEPT 01 2020'),(5,5,'2020-09-11','2020-09-18',500.00,2,'2020-09-19 16:54:31',2,'2020-10-31 20:59:14','SEPT 05 2020'),(6,5,'2020-09-19','2020-09-26',500.00,2,'2020-09-19 16:54:49',2,'2020-10-31 20:59:28','SEPT 12 2020'),(7,5,'2020-09-01','2020-09-30',500.00,2,'2020-09-19 16:55:19',1,'2020-10-31 18:00:04','SEPT 19 2020'),(8,3,'2020-10-01','2020-10-30',25000.00,2,'2020-10-31 19:15:04',2,'2020-10-31 19:15:04',NULL),(9,7,'2020-09-01','2020-09-30',3500.00,2,'2020-10-31 21:01:20',2,'2020-10-31 21:01:20',NULL),(10,8,'2020-09-01','2020-09-30',2500.00,2,'2020-10-31 21:01:40',2,'2020-10-31 21:01:40',NULL),(11,9,'2020-09-01','2020-09-30',19800.00,2,'2020-10-31 21:02:23',2,'2020-11-10 18:14:45',NULL),(12,1,'2020-10-01','2020-10-31',400.29,2,'2020-11-10 18:16:27',2,'2020-11-10 18:16:27',NULL),(13,2,'2020-10-01','2020-10-31',1000.00,2,'2020-11-10 18:16:44',2,'2020-11-10 18:16:44',NULL),(14,7,'2020-10-01','2020-10-31',3500.00,2,'2020-11-10 18:17:28',2,'2020-11-10 18:17:28',NULL),(15,8,'2020-10-01','2020-10-31',2500.00,2,'2020-11-10 18:17:47',2,'2020-11-10 18:17:47',NULL),(16,9,'2020-10-01','2020-10-31',20150.00,2,'2020-11-10 18:18:11',2,'2020-11-10 18:18:11',NULL),(17,5,'2020-10-01','2020-10-31',2450.00,2,'2020-11-10 18:20:33',2,'2020-11-10 18:20:33',NULL);
/*!40000 ALTER TABLE `utilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `utilities_cost_this_month_view`
--

DROP TABLE IF EXISTS `utilities_cost_this_month_view`;
/*!50001 DROP VIEW IF EXISTS `utilities_cost_this_month_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `utilities_cost_this_month_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `utilities_cost_today_view`
--

DROP TABLE IF EXISTS `utilities_cost_today_view`;
/*!50001 DROP VIEW IF EXISTS `utilities_cost_today_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `utilities_cost_today_view` AS SELECT 
 1 AS `cost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `utilities_cost_view`
--

DROP TABLE IF EXISTS `utilities_cost_view`;
/*!50001 DROP VIEW IF EXISTS `utilities_cost_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `utilities_cost_view` AS SELECT 
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_types`
--

LOCK TABLES `utility_types` WRITE;
/*!40000 ALTER TABLE `utility_types` DISABLE KEYS */;
INSERT INTO `utility_types` VALUES (1,NULL,'MERALCO',2,'2020-09-19 15:29:45',2,'2020-09-19 15:29:45',NULL),(2,NULL,'MAYNILAD',2,'2020-09-19 15:31:49',2,'2020-09-19 15:31:49',NULL),(3,NULL,'RENTAL',2,'2020-09-19 15:31:56',2,'2020-09-19 15:31:56',NULL),(4,NULL,'PLDT',2,'2020-09-19 15:32:01',2,'2020-09-19 15:32:01',NULL),(5,NULL,'GASOLINE EXPENSES',2,'2020-09-19 15:32:11',2,'2020-09-19 15:32:11',NULL),(6,NULL,'CAR MAINTENANCE',2,'2020-09-19 15:32:20',2,'2020-09-19 15:32:20',NULL),(7,NULL,'BIR EXPENSES',2,'2020-09-19 16:53:21',2,'2020-09-19 16:53:21',NULL),(8,NULL,'ACCOUNTANT RETAINERS FEE',2,'2020-09-19 16:53:34',2,'2020-09-19 16:53:34',NULL),(9,NULL,'SALARY',2,'2020-10-31 21:02:02',2,'2020-10-31 21:02:02',NULL);
/*!40000 ALTER TABLE `utility_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dealer_erp_updated'
--

--
-- Dumping routines for database 'dealer_erp_updated'
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
			
            SELECT `e`.`id` INTO `var_latest_employee_id` FROM `dealer_erp_updated`.`employees` `e` ORDER BY `e`.`id` DESC LIMIT 1;
            
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
            
			INSERT INTO `dealer_erp_updated`.`employees` (
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
                
			INSERT INTO `dealer_erp_updated`.`salary_rates` (
				`employee_id`,
				`created_by`,
				`updated_by`)
			VALUES (
				LAST_INSERT_ID(),
				`param_user_id`,
				`param_user_id`
			);
                
            
		COMMIT;
        
		SET `param_error_code` = 0;
        
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
	IN `param_from_date` DATE,
	IN `param_to_date` DATE,
	IN `param_cost` DECIMAL(8,2) UNSIGNED,
	IN `param_addl_pay` DECIMAL(8,2) UNSIGNED,
	IN `param_deduction` DECIMAL(8,2) UNSIGNED,
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid param_employee_id value
    -- Error code 2 = Invalid param_user_id value									   
    -- Error code 3 = No hourly fee/attendance found
    -- Error code 4 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 4;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
	IF (`param_employee_id` = '') OR (`param_employee_id` = 0) OR (`param_employee_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;


    -- MySQL will raise an error if it detects invalid values for
    -- `param_from_date` and `param_to_date`.
    -- No need to for us to handle that ourselves
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
    
    -- No need to check for an "empty" value as it is not a valid decimal value. Only NULL is allowed for decimal datat types.
	IF (`param_addl_pay` IS NULL) THEN
		SET `param_addl_pay` = 0.00;
	END IF;

	IF (`param_deduction` IS NULL) THEN
		SET `param_deduction` = 0.00;
	END IF;
    
	IF (`param_remarks` = '') THEN
		SET `param_remarks` = NULL;
	END IF;
    

	-- Inner Block Level 1
	`try`: BEGIN
		
		DECLARE `var_cost` DECIMAL(8,2) UNSIGNED DEFAULT `param_cost`;

		START TRANSACTION READ WRITE;

			IF (`var_cost` = 0) OR (`var_cost` IS NULL) THEN
				
				SELECT 
		
					IFNULL(SUM(`dtr`.`hours_worked` * `sr`.`hourly_fee`), 0) INTO `var_cost`

				FROM

						(SELECT 
							`a`.`employee_id` AS `employee_id`,
							`a`.`date_worked` AS `date_worked`,
							`a`.`hours_worked` AS `hours_worked`,
							MAX(`_sr`.`id`) AS `sr_id`,
							`a`.`remarks` AS `remarks`
						FROM
							(SELECT 
								`_a`.`employee_id` AS `employee_id`,
								CAST(`_a`.`created_at` AS DATE) AS `date_worked`,
								SUM((((TIME_TO_SEC(`_a`.`to_time`) - TIME_TO_SEC(`_a`.`from_time`)) / 60) / 60)) AS `hours_worked`,
								`_a`.`remarks` AS `remarks`
							FROM
								`dealer_erp_updated`.`attendance` `_a`
							GROUP BY `_a`.`employee_id` , `date_worked`) `a`

						LEFT JOIN `dealer_erp_updated`.`salary_rates` `_sr` ON `a`.`employee_id` = `_sr`.`employee_id`
							AND `a`.`date_worked` >= CAST(`_sr`.`created_at` AS DATE)

						GROUP BY `a`.`employee_id` , `a`.`date_worked`) `dtr`

					LEFT JOIN `dealer_erp_updated`.`salary_rates` `sr` ON `dtr`.`sr_id` = `sr`.`id`
					
				WHERE `dtr`.`employee_id` = `param_employee_id` AND `dtr`.`date_worked` BETWEEN `param_from_date` AND `param_to_date`;

			END IF;

            
            IF (`var_cost` = 0) THEN
				SET `param_error_code` = 3;
				LEAVE `this_sp`;
			END IF;
            

            INSERT INTO `dealer_erp_updated`.`payroll` (
				`employee_id`,
				`from_date`,
                `to_date`,
				`cost`,
                `addl_pay`,
                `deduction`,
                `created_by`,
                `updated_by`,
                `remarks`)
			VALUES (
				`param_employee_id`,
				`param_from_date`,
                `param_to_date`,
                `var_cost`,
                `param_addl_pay`,
                `param_deduction`,
                `param_user_id`,
                `param_user_id`,
                `param_remarks`);
                
            
		COMMIT;
        
		SET `param_error_code` = 0;
        
	END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_purchase` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_purchase`(
	IN `param_item_id`  SMALLINT UNSIGNED,
	IN `param_dr_no` VARCHAR(30),
    IN `param_cost` DECIMAL(8,2),
	IN `param_order_qty` INT UNSIGNED,
	IN `param_user_id` SMALLINT UNSIGNED,
	IN `param_remarks` VARCHAR(100),
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error code 1 = Invalid param_item_id value
    -- Error code 2 = Invalid param_order_qty value
    -- Error code 3 = Invalid param_user_id value
    -- Error code 4 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 4;
			-- Cleanup Ops
			ROLLBACK;
		END;
    
    
    IF (`param_item_id` = '') OR (`param_item_id` = 0) OR (`param_item_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_order_qty` = '') OR (`param_order_qty` = 0) OR (`param_order_qty` IS NULL) THEN
		SET `param_error_code` = 2;
		LEAVE `this_sp`;
	END IF;
    
	IF (`param_user_id` = '') OR (`param_user_id` = 0) OR (`param_user_id` IS NULL) THEN
		SET `param_error_code` = 3;
		LEAVE `this_sp`;
	END IF;
    
    -- Correct invalid param values
    -- No need to check for blank values for decimal types
    -- MySQL will raise an exception once a decimal type receives a blank value since STRICT_TRANS_TABLES is enabled by default
    -- NULL value is valid for decimal types though
	IF (`param_cost` IS NULL) THEN
	   SET `param_cost` = '0.00';
	END IF;
    
	IF (`param_dr_no` = '') THEN
        SET `param_dr_no` = NULL;
	END IF;
    
	IF (`param_remarks` = '') THEN
	   SET `param_remarks` = NULL;
	END IF;

	`try`: BEGIN
	
		-- Variable Declarations
		DECLARE `var_latest_purchase_id` MEDIUMINT UNSIGNED;
		DECLARE `var_purchase_code` CHAR(20);

		START TRANSACTION READ WRITE;
		
			SELECT `p`.`id` INTO `var_latest_purchase_id` FROM `dealer_erp_updated`.`purchases` `p` ORDER BY `p`.`id` DESC LIMIT 1;
            
			IF (`var_latest_purchase_id` = '') OR (`var_latest_purchase_id` IS NULL) THEN
				SET `var_latest_purchase_id` = 0;	
			END IF;
			
			-- Generate sale code
			SET `var_purchase_code` = REPLACE(CURRENT_TIMESTAMP, "-", "");
			SET `var_purchase_code` = REPLACE(`var_purchase_code`, " ", "");
			SET `var_purchase_code` = REPLACE(`var_purchase_code`, ":", "");

			SET `var_purchase_code` = CONCAT("P", `var_purchase_code`, LPAD(`var_latest_purchase_id` + 1, 5, 0));

			INSERT INTO `dealer_erp_updated`.`purchases` (
				`item_id`,
                `code`,
				`dr_no`,
				`cost`,
				`qty`,
				`created_by`,
				`updated_by`,
				`remarks`
			) VALUES (
				`param_item_id`,
                `var_purchase_code`,
				`param_dr_no`,
				`param_cost`,
				`param_order_qty`,
				`param_user_id`,
				`param_user_id`,
				`param_remarks`
			);

		COMMIT;
		
		SET `param_error_code` = 0;

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

	`try`: BEGIN
	
		-- Variable Declarations
		DECLARE `var_latest_sale_id` MEDIUMINT UNSIGNED;
		DECLARE `var_sale_code` CHAR(20);
		DECLARE `var_stock_qty` INT UNSIGNED;

		START TRANSACTION READ WRITE;
		
		SELECT `s`.`id` INTO `var_latest_sale_id` FROM `dealer_erp_updated`.`sales` `s` ORDER BY `s`.`id` DESC LIMIT 1;
            
		IF (`var_latest_sale_id` = '') OR (`var_latest_sale_id` IS NULL) THEN
			SET `var_latest_sale_id` = 0;
		END IF;
        
		-- Generate sale code
		SET `var_sale_code` = REPLACE(CURRENT_TIMESTAMP, "-", "");
		SET `var_sale_code` = REPLACE(`var_sale_code`, " ", "");
		SET `var_sale_code` = REPLACE(`var_sale_code`, ":", "");

		SET `var_sale_code` = CONCAT("S", `var_sale_code`, LPAD(`var_latest_sale_id` + 1, 5, 0));

		-- Check item stock sufficiency
		SELECT 
			(`p`.`qty` - IFNULL(`s`.`qty`, 0)) INTO `var_stock_qty`
		FROM
			((SELECT 
				`_p`.`item_id` AS `item_id`, SUM(`_p`.`qty`) AS `qty`
			FROM
				`dealer_erp_updated`.`purchases` `_p`
			WHERE
				((`_p`.`void` = 0)
					AND (`_p`.`received_at` IS NOT NULL))
			GROUP BY `_p`.`item_id`) `p`
			LEFT JOIN (SELECT 
				`_s`.`item_id` AS `item_id`, SUM(`_s`.`qty`) AS `qty`
			FROM
				`dealer_erp_updated`.`sales` `_s`
			WHERE
				(`_s`.`void` = 0)
			GROUP BY `_s`.`item_id`) `s` ON ((`s`.`item_id` = `p`.`item_id`)))
		
		WHERE `p`.`item_id` = `param_item_id`;


		IF (`var_stock_qty` >= `param_order_qty`) THEN

			INSERT INTO `dealer_erp_updated`.`sales` (
				`client_id`,
				`item_id`,
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
				`param_item_id`,
                `var_sale_code`,
				`param_dr_no`,
				`param_invoice_no`,
				`param_cost`,
				`param_order_qty`,
				`param_discount`,
				`param_addl_fee`,
				`param_user_id`,
				`param_user_id`,
				`param_remarks`
			);

			COMMIT;

			SET `param_error_code` = 0;
            
		ELSE

			SET `param_error_code` = 1;
			LEAVE `try`;
			
		END IF;

    END `try`;

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
            FROM `dealer_erp_updated`.`employees` `e`
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
				FROM `dealer_erp_updated`.`attendance` `a`
				WHERE
					`a`.`employee_id` = `var_employee_id` AND
					CAST(`a`.`created_at` AS DATE) = CURRENT_DATE()
				ORDER BY `a`.`id` DESC
				LIMIT 1;
				
				-- columns `from_time` and `to_time` can never have a value of '' or empty value. No need to check for that value.
				-- If employee has no time inS today...
				IF (`var_attendance_id` IS NULL) OR ((`var_time_in` IS NOT NULL) AND (`var_time_out` IS NOT NULL)) THEN
				
					INSERT INTO `dealer_erp_updated`.`attendance` (
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
				
					UPDATE `dealer_erp_updated`.`attendance`
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
/*!50003 DROP PROCEDURE IF EXISTS `update_purchase_void` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_purchase_void`(
	IN `param_purchase_id` MEDIUMINT UNSIGNED,
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid purchase ID
    -- Error code 2 = Purchase record is already "received", cannot be voided anymore
    -- Error code 3 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 3;
			-- Cleanup Ops
			ROLLBACK;
		END;

	IF (`param_purchase_id` = '') OR (`param_purchase_id` = 0) OR (`param_purchase_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;

	-- Assume that the purchase has already been received
	SET `param_error_code` = 2;

	`try`: BEGIN
	
		-- Variable Declarations
		-- DATETIME datatype cannot be used here since it cannot accept a NULL value
		DECLARE `var_received_at` CHAR(19);

		START TRANSACTION READ WRITE;

			SELECT `p`.`received_at` INTO `var_received_at` FROM `dealer_erp_updated`.`purchases` `p` WHERE `p`.`id` = `param_purchase_id`;

			IF (`var_received_at` IS NOT NULL OR `var_received_at` != "") THEN
				LEAVE `try`;
			END IF;

			UPDATE `dealer_erp_updated`.`purchases` `p` SET `p`.`void` = 1 WHERE `p`.`id` = `param_purchase_id` AND `p`.`received_at` IS NULL;

		COMMIT;

		SET `param_error_code` = 0;

    END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_sale_void` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_sale_void`(
	IN `param_sale_id` MEDIUMINT UNSIGNED,
	OUT `param_error_code` TINYINT UNSIGNED
)
`this_sp`: BEGIN
	
    -- Error Code 0 = All went well
    -- Error Code 1 = Invalid sale ID
    -- Error code 2 = Sale record is already "paid", cannot be voided anymore
    -- Error code 3 = MySQLException is raised

	-- Handle MySQL Exceptions
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
		BEGIN
			SET `param_error_code` = 3;
			-- Cleanup Ops
			ROLLBACK;
		END;

	IF (`param_sale_id` = '') OR (`param_sale_id` = 0) OR (`param_sale_id` IS NULL) THEN
		SET `param_error_code` = 1;
		LEAVE `this_sp`;
	END IF;

	-- Assume that the sale is paid
	SET `param_error_code` = 2;

	`try`: BEGIN
	
		-- Variable Declarations
		-- DATETIME datatype cannot be used here since it cannot accept a NULL value
		DECLARE `var_paid_on` CHAR(19);

		START TRANSACTION READ WRITE;

			SELECT `s`.`paid_on` INTO `var_paid_on` FROM `dealer_erp_updated`.`sales` `s` WHERE `s`.`id` = `param_sale_id`;

			IF (`var_paid_on` IS NOT NULL OR `var_paid_on` != "") THEN
				LEAVE `try`;
			END IF;

			UPDATE `dealer_erp_updated`.`sales` `s` SET `s`.`void` = 1 WHERE `s`.`id` = `param_sale_id` AND `s`.`paid_on` IS NULL;
				
		COMMIT;

		SET `param_error_code` = 0;

    END `try`;

END `this_sp` ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `attendance_with_fee_view`
--

/*!50001 DROP VIEW IF EXISTS `attendance_with_fee_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `attendance_with_fee_view` AS select `e`.`id` AS `employee_id`,`e`.`fullname` AS `fullname`,ifnull(`dtr`.`date_worked`,'n/a') AS `date_worked`,ifnull(convert(format(`dtr`.`hours_worked`,2) using utf8mb4),'n/a') AS `hours_worked`,ifnull(`sr`.`hourly_fee`,'n/a') AS `hourly_fee`,`dtr`.`remarks` AS `remarks` from ((`employees` `e` left join (select `a`.`employee_id` AS `employee_id`,`a`.`date_worked` AS `date_worked`,`a`.`hours_worked` AS `hours_worked`,max(`_sr`.`id`) AS `sr_id`,`a`.`remarks` AS `remarks` from ((select `_a`.`employee_id` AS `employee_id`,cast(`_a`.`created_at` as date) AS `date_worked`,sum((((time_to_sec(`_a`.`to_time`) - time_to_sec(`_a`.`from_time`)) / 60) / 60)) AS `hours_worked`,`_a`.`remarks` AS `remarks` from `attendance` `_a` group by `_a`.`employee_id`,`date_worked`) `a` left join `salary_rates` `_sr` on(((`a`.`employee_id` = `_sr`.`employee_id`) and (`a`.`date_worked` >= cast(`_sr`.`created_at` as date))))) group by `a`.`employee_id`,`a`.`date_worked`) `dtr` on((`e`.`id` = `dtr`.`employee_id`))) left join `salary_rates` `sr` on((`dtr`.`sr_id` = `sr`.`id`))) order by `e`.`id`,`dtr`.`date_worked` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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
/*!50001 VIEW `client_debts_view` AS select `c`.`name_short` AS `name_short`,`c`.`name_long` AS `name_long`,`c`.`contact_no` AS `contact_no`,if((sum(ifnull((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`),0)) > 0),1,0) AS `has_debt` from (`clients` `c` left join (select `_s`.`id` AS `id`,`_s`.`client_id` AS `client_id`,`_s`.`cost` AS `cost`,`_s`.`qty` AS `qty`,`_s`.`discount` AS `discount`,`_s`.`addl_fee` AS `addl_fee` from `sales` `_s` where ((`_s`.`void` = 0) and (`_s`.`paid_on` is null))) `s` on((`s`.`client_id` = `c`.`id`))) group by `c`.`id` */;
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
/*!50001 VIEW `due_clients_view` AS select `c`.`name_long` AS `name_long`,format(`s`.`debt_cost`,2) AS `debt_cost` from (`clients` `c` left join (select `_s`.`client_id` AS `client_id`,(((sum(`_s`.`cost`) * sum(`_s`.`qty`)) - sum(`_s`.`discount`)) + sum(`_s`.`addl_fee`)) AS `debt_cost`,max(cast(`_s`.`created_at` as date)) AS `sale_date` from `sales` `_s` where ((`_s`.`void` = 0) and (`_s`.`paid_on` is null)) group by `_s`.`client_id`) `s` on((`s`.`client_id` = `c`.`id`))) where ((`c`.`payment_term` <> 0) and ((to_days(curdate()) - to_days(`s`.`sale_date`)) > `c`.`payment_term`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_expenses_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_expenses_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_expenses_this_month_view` AS select ((`p`.`cost` + `u`.`cost`) + `pay`.`cost`) AS `cost` from ((`purchases_cost_this_month_view` `p` join `utilities_cost_this_month_view` `u`) join `payroll_cost_this_month_view` `pay`) */;
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
/*!50001 VIEW `gross_expenses_today_view` AS select ((`p`.`cost` + `u`.`cost`) + `pay`.`cost`) AS `cost` from ((`purchases_cost_today_view` `p` join `utilities_cost_today_view` `u`) join `payroll_cost_today_view` `pay`) */;
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
/*!50001 VIEW `gross_expenses_view` AS select ((`p`.`cost` + `u`.`cost`) + `pay`.`cost`) AS `cost` from ((`purchases_cost_view` `p` join `utilities_cost_view` `u`) join `payroll_cost_view` `pay`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `gross_income_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `gross_income_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `gross_income_this_month_view` AS select ifnull(sum((((`s`.`cost` * `s`.`qty`) - `s`.`discount`) + `s`.`addl_fee`)),0) AS `cost` from `sales` `s` where ((`s`.`void` = 0) and (month(`s`.`paid_on`) = month(now()))) */;
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
/*!50001 VIEW `gross_income_today_view` AS select ifnull(sum((((`s`.`cost` * `s`.`qty`) - `s`.`discount`) + `s`.`addl_fee`)),0) AS `cost` from `sales` `s` where ((`s`.`void` = 0) and (cast(`s`.`paid_on` as date) = curdate())) */;
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
/*!50001 VIEW `gross_income_view` AS select ifnull(sum((((`s`.`cost` * `s`.`qty`) - `s`.`discount`) + `s`.`addl_fee`)),0) AS `cost` from `sales` `s` where ((`s`.`void` = 0) and (`s`.`paid_on` is not null)) */;
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
/*!50001 VIEW `latest_salary_rates_view` AS select concat(`e`.`first_name`,' ',`e`.`last_name`) AS `employee_name`,format(`sr`.`hourly_fee`,2) AS `latest_rate`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`sr`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`sr`.`updated_at` AS `edited_on`,`sr`.`remarks` AS `description` from (((`salary_rates` `sr` join `employees` `e` on((`e`.`id` = `sr`.`employee_id`))) join `users` `us_1` on((`us_1`.`id` = `sr`.`created_by`))) join `users` `us_2` on((`us_2`.`id` = `sr`.`updated_by`))) where `sr`.`id` in (select max(`_sr`.`id`) from `salary_rates` `_sr` group by `_sr`.`employee_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `net_income_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `net_income_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `net_income_this_month_view` AS select (`gi`.`cost` - `ge`.`cost`) AS `cost` from (`gross_income_this_month_view` `gi` join `gross_expenses_this_month_view` `ge`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `net_income_today_view`
--

/*!50001 DROP VIEW IF EXISTS `net_income_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `net_income_today_view` AS select (`gi`.`cost` - `ge`.`cost`) AS `cost` from (`gross_income_today_view` `gi` join `gross_expenses_today_view` `ge`) */;
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
/*!50001 VIEW `net_income_view` AS select (`gi`.`cost` - `ge`.`cost`) AS `cost` from (`gross_income_view` `gi` join `gross_expenses_view` `ge`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `payroll_cost_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `payroll_cost_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `payroll_cost_this_month_view` AS select ifnull(sum(((`pay`.`cost` + `pay`.`addl_pay`) - `pay`.`deduction`)),0) AS `cost` from `payroll` `pay` where (month(`pay`.`from_date`) = month(now())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `payroll_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `payroll_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `payroll_cost_today_view` AS select ifnull(sum(((`pay`.`cost` + `pay`.`addl_pay`) - `pay`.`deduction`)),0) AS `cost` from `payroll` `pay` where (`pay`.`from_date` = curdate()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `payroll_cost_view`
--

/*!50001 DROP VIEW IF EXISTS `payroll_cost_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `payroll_cost_view` AS select ifnull(sum(((`pay`.`cost` + `pay`.`addl_pay`) - `pay`.`deduction`)),0) AS `cost` from `payroll` `pay` */;
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
/*!50001 VIEW `pending_purchases_view` AS select `p`.`code` AS `purchase_no`,`p`.`dr_no` AS `delivery_no`,`s`.`name_long` AS `supplier_name`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `qty`,`p`.`created_at` AS `purchase_datetime` from ((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `suppliers` `s` on((`s`.`id` = `i`.`supplier_id`))) where ((`p`.`void` = 0) and (`p`.`received_at` is null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_cost_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `purchases_cost_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_cost_this_month_view` AS select ifnull(sum((`p`.`cost` * `p`.`qty`)),0) AS `cost` from `purchases` `p` where ((`p`.`void` = 0) and (month(`p`.`received_at`) = month(now()))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `purchases_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_cost_today_view` AS select ifnull(sum((`p`.`cost` * `p`.`qty`)),0) AS `cost` from `purchases` `p` where ((`p`.`void` = 0) and (cast(`p`.`received_at` as date) = curdate())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `purchases_cost_view`
--

/*!50001 DROP VIEW IF EXISTS `purchases_cost_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `purchases_cost_view` AS select ifnull(sum((`p`.`cost` * `p`.`qty`)),0) AS `cost` from `purchases` `p` where ((`p`.`void` = 0) and (`p`.`received_at` is not null)) */;
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
/*!50001 VIEW `purchases_view` AS select `p`.`id` AS `purchase_id`,`p`.`code` AS `purchase_no`,`p`.`dr_no` AS `delivery_no`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `quantity`,`i`.`unit` AS `item_unit`,format((`p`.`cost` * `p`.`qty`),2) AS `total_cost`,`p`.`received_at` AS `received_on`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`p`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`p`.`updated_at` AS `edited_on`,`p`.`remarks` AS `description` from (((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `users` `us_1` on((`us_1`.`id` = `p`.`created_by`))) left join `users` `us_2` on((`us_2`.`id` = `p`.`updated_by`))) where (`p`.`void` = 0) */;
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
/*!50001 VIEW `purchases_vs_sales_view` AS select cast(`p`.`created_at` as date) AS `purchase_date`,`p`.`code` AS `purchase_no`,`p`.`dr_no` AS `dr_no`,`i`.`name_long` AS `item_name`,ifnull(`p`.`qty`,0) AS `purchase_qty`,ifnull(`s`.`qty`,0) AS `sold_qty`,(ifnull(`p`.`qty`,0) - ifnull(`s`.`qty`,0)) AS `unsold_qty` from (((select `_p`.`id` AS `id`,`_p`.`item_id` AS `item_id`,`_p`.`code` AS `code`,`_p`.`dr_no` AS `dr_no`,`_p`.`cost` AS `cost`,sum(`_p`.`qty`) AS `qty`,`_p`.`created_at` AS `created_at` from `purchases` `_p` where ((`_p`.`void` = 0) and (`_p`.`received_at` is not null)) group by `_p`.`item_id`) `p` left join (select `_s`.`id` AS `id`,`_s`.`item_id` AS `item_id`,`_s`.`cost` AS `cost`,sum(`_s`.`qty`) AS `qty` from `sales` `_s` where (`_s`.`void` = 0) group by `_s`.`item_id`) `s` on((`s`.`item_id` = `p`.`item_id`))) left join `items` `i` on((`i`.`id` = `p`.`item_id`))) */;
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
/*!50001 VIEW `received_purchases_view` AS select `p`.`code` AS `purchase_no`,`p`.`dr_no` AS `delivery_no`,`s`.`name_long` AS `supplier_name`,`i`.`name_long` AS `item_name`,format(`p`.`cost`,2) AS `cost`,`p`.`qty` AS `qty`,`p`.`received_at` AS `reception_datetime` from ((`purchases` `p` left join `items` `i` on((`i`.`id` = `p`.`item_id`))) left join `suppliers` `s` on((`s`.`id` = `i`.`supplier_id`))) where ((`p`.`void` = 0) and (`p`.`received_at` is not null)) */;
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
/*!50001 VIEW `sales_view` AS select `s`.`id` AS `sale_id`,`s`.`code` AS `sale_no`,`s`.`dr_no` AS `delivery_no`,`c`.`name_long` AS `client_name`,`i`.`name_long` AS `item_name`,format(`s`.`cost`,2) AS `cost`,`s`.`discount` AS `discount`,`s`.`addl_fee` AS `additional_fee`,`s`.`qty` AS `quantity`,format((((`s`.`cost` * `s`.`qty`) + `s`.`addl_fee`) - `s`.`discount`),2) AS `total_cost`,`s`.`paid_on` AS `paid_on`,concat(`us_1`.`first_name`,' ',`us_1`.`last_name`) AS `added_by`,`s`.`created_at` AS `added_on`,concat(`us_2`.`first_name`,' ',`us_2`.`last_name`) AS `edited_by`,`s`.`updated_at` AS `edited_on`,`s`.`remarks` AS `description` from ((((`sales` `s` left join `clients` `c` on((`c`.`id` = `s`.`client_id`))) left join `items` `i` on((`i`.`id` = `s`.`item_id`))) left join `users` `us_1` on((`us_1`.`id` = `s`.`created_by`))) left join `users` `us_2` on((`us_2`.`id` = `s`.`updated_by`))) where (`s`.`void` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stock_qty_view`
--

/*!50001 DROP VIEW IF EXISTS `stock_qty_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stock_qty_view` AS select `i`.`id` AS `item_id`,`i`.`name_long` AS `item_name`,(ifnull(`p`.`qty`,0) - ifnull(`s`.`qty`,0)) AS `qty`,`i`.`unit` AS `unit` from ((`items` `i` left join (select `_p`.`item_id` AS `item_id`,sum(`_p`.`qty`) AS `qty` from `purchases` `_p` where ((`_p`.`void` = 0) and (`_p`.`received_at` is not null)) group by `_p`.`item_id`) `p` on((`p`.`item_id` = `i`.`id`))) left join (select `_s`.`item_id` AS `item_id`,sum(`_s`.`qty`) AS `qty` from `sales` `_s` where (`_s`.`void` = 0) group by `_s`.`item_id`) `s` on((`s`.`item_id` = `p`.`item_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `utilities_cost_this_month_view`
--

/*!50001 DROP VIEW IF EXISTS `utilities_cost_this_month_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `utilities_cost_this_month_view` AS select ifnull(sum(`u`.`cost`),0) AS `cost` from `utilities` `u` where (month(`u`.`from_date`) = month(now())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `utilities_cost_today_view`
--

/*!50001 DROP VIEW IF EXISTS `utilities_cost_today_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `utilities_cost_today_view` AS select ifnull(sum(`u`.`cost`),0) AS `cost` from `utilities` `u` where (`u`.`from_date` = curdate()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `utilities_cost_view`
--

/*!50001 DROP VIEW IF EXISTS `utilities_cost_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `utilities_cost_view` AS select ifnull(sum(`u`.`cost`),0) AS `cost` from `utilities` `u` */;
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

-- Dump completed on 2020-11-14 14:44:47
