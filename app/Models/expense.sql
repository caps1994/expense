-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: expense
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `expense_band_groups`
--

DROP TABLE IF EXISTS `expense_band_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_band_groups` (
  `band_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `root_account_id` int(11) NOT NULL,
  `band_group_name` varchar(45) NOT NULL,
  `max_spend` varchar(45) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`band_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_band_groups`
--

LOCK TABLES `expense_band_groups` WRITE;
/*!40000 ALTER TABLE `expense_band_groups` DISABLE KEYS */;
INSERT INTO `expense_band_groups` VALUES (5,1,'Testband','1500','Test band ',1),(6,1,'Test','2500','yrdy45y54y5',0);
/*!40000 ALTER TABLE `expense_band_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_client_logins`
--

DROP TABLE IF EXISTS `expense_client_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_client_logins` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `user_key_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_client_logins`
--

LOCK TABLES `expense_client_logins` WRITE;
/*!40000 ALTER TABLE `expense_client_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_client_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_client_users`
--

DROP TABLE IF EXISTS `expense_client_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_client_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `root_account_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL,
  `band` int(11) DEFAULT '0',
  `enabled` int(11) NOT NULL DEFAULT '1',
  `job_title` varchar(45) NOT NULL,
  `is_manager` tinyint(4) NOT NULL DEFAULT '1',
  `manager` int(11) DEFAULT '0',
  `department` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_client_users_1_idx` (`root_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_client_users`
--

LOCK TABLES `expense_client_users` WRITE;
/*!40000 ALTER TABLE `expense_client_users` DISABLE KEYS */;
INSERT INTO `expense_client_users` VALUES (60,1,'Meh','Meh','meh@meh.com',NULL,NULL,'2016-05-27',0,0,'meh',0,0,0),(64,1,'Chris','Caplan','christopher.caplan@gmail.com','$2y$10$4y34cat4WsoGo1F/AWD8WOs9uWZ2AxWUKkskURUw23UUxkwxOGldq',NULL,'2016-05-27',0,0,'It Support Technician',1,60,0);
/*!40000 ALTER TABLE `expense_client_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_items`
--

DROP TABLE IF EXISTS `expense_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`,`receipt_id`),
  KEY `fk_items_1_idx` (`receipt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_items`
--

LOCK TABLES `expense_items` WRITE;
/*!40000 ALTER TABLE `expense_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_password_reset`
--

DROP TABLE IF EXISTS `expense_password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_password_reset` (
  `reset_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  PRIMARY KEY (`reset_id`),
  UNIQUE KEY `reset_token_UNIQUE` (`reset_token`),
  KEY `fk_password_reset_1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_password_reset`
--

LOCK TABLES `expense_password_reset` WRITE;
/*!40000 ALTER TABLE `expense_password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_receipt`
--

DROP TABLE IF EXISTS `expense_receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `notes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`receipt_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_receipt`
--

LOCK TABLES `expense_receipt` WRITE;
/*!40000 ALTER TABLE `expense_receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_root_account`
--

DROP TABLE IF EXISTS `expense_root_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_root_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL,
  `level` varchar(45) DEFAULT NULL,
  `enabled` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_root_account`
--

LOCK TABLES `expense_root_account` WRITE;
/*!40000 ALTER TABLE `expense_root_account` DISABLE KEYS */;
INSERT INTO `expense_root_account` VALUES (1,'Christopher','Caplan','Ultimatefinance','ccaplan@hotmail.co.uk','$2y$10$FSjb4FCIk.5hFNeRpdX87O2C19zAZCZwV3yR7zMQvO14xBwUbjuVq','','0000-00-00','','0');
/*!40000 ALTER TABLE `expense_root_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_user_activation_tokens`
--

DROP TABLE IF EXISTS `expense_user_activation_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_user_activation_tokens` (
  `activation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token_key` varchar(32) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`activation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_user_activation_tokens`
--

LOCK TABLES `expense_user_activation_tokens` WRITE;
/*!40000 ALTER TABLE `expense_user_activation_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_user_activation_tokens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-27 14:28:33
