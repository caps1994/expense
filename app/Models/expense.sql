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
  `band` int(11) DEFAULT NULL,
  `post` int(11) DEFAULT NULL,
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `fk_client_users_1_idx` (`root_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_client_users`
--

LOCK TABLES `expense_client_users` WRITE;
/*!40000 ALTER TABLE `expense_client_users` DISABLE KEYS */;
INSERT INTO `expense_client_users` VALUES (7,1,'Christopher','Caplan','ccaplan@hotmail.co.uk',NULL,NULL,'2016-05-13',0,0,0),(8,1,'Dave','Meh','ccaplan@hotmail.co.uk',NULL,NULL,'2016-04-28',4,2,NULL),(9,1,'Bill','Meh','bil@meh.co.uk',NULL,NULL,'2016-05-03',1,1,NULL),(10,1,'Tom','Lloyd','tom.lloyd@meh.com',NULL,NULL,'2016-05-12',1,1,NULL);
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
  `salt` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_root_account`
--

LOCK TABLES `expense_root_account` WRITE;
/*!40000 ALTER TABLE `expense_root_account` DISABLE KEYS */;
INSERT INTO `expense_root_account` VALUES (1,'Christopher','Caplan','Ultimatefinance','ccaplan@hotmail.co.uk','$2y$10$FSjb4FCIk.5hFNeRpdX87O2C19zAZCZwV3yR7zMQvO14xBwUbjuVq','','0000-00-00',''),(2,'Chris','Caplan','Meh','christopher.caplan@gmail.com','$2y$10$SGqhKMnI1P8GTpo6OwCVfO.6XinYQVL1zex6La8ISLc8Il0bphpiK','','2016-04-26','');
/*!40000 ALTER TABLE `expense_root_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-13 15:49:59
