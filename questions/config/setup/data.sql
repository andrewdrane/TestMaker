-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: questions
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10

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
-- Table structure for table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `order` int(11) DEFAULT '0',
  `comment` text,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `question` (`content_id`),
  KEY `type` (`content_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmarks`
--

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;
INSERT INTO `bookmarks` VALUES (1,2,1,1,0,NULL,'2011-09-25 14:52:15','0000-00-00 00:00:00'),(2,2,1,2,0,NULL,'2011-09-25 14:52:16','0000-00-00 00:00:00'),(3,2,1,18,0,NULL,'2011-09-25 15:04:53','0000-00-00 00:00:00'),(4,2,1,17,0,NULL,'2011-09-25 15:04:54','0000-00-00 00:00:00'),(5,2,1,10,0,NULL,'2011-09-25 15:04:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `type` int(10) unsigned NOT NULL DEFAULT '0',
  `question` text,
  `sample_answer` text,
  `data` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='questions';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,0,0,'What is the capitol of Massachusetts','Boston',NULL,'2011-09-25 14:49:50','2011-09-25 14:49:50'),(2,1,0,0,'What is the capitol of Maine','Agusta',NULL,'2011-09-25 14:50:20','2011-09-25 14:50:20'),(3,1,0,0,'What is the capitol of New York','Albany',NULL,'2011-09-25 14:50:31','2011-09-25 14:50:31'),(4,2,0,1,'What is the largest state in the \"lower 48\"','Texas',NULL,'2011-09-25 14:51:51','2011-09-25 14:51:51'),(5,2,0,1,'What is the largest state in the whole USA','Alaska',NULL,'2011-09-25 14:52:02','2011-09-25 14:52:02'),(6,3,0,1,'1+1','2',NULL,'2011-09-25 14:53:15','2011-09-25 14:53:15'),(7,3,0,1,'3 * 7','21',NULL,'2011-09-25 14:53:20','2011-09-25 14:53:20'),(8,3,0,1,'5 * 8','40',NULL,'2011-09-25 14:53:49','2011-09-25 14:53:49'),(9,3,0,1,'100-23','77',NULL,'2011-09-25 14:53:56','2011-09-25 14:53:56'),(10,3,0,1,'How many in a dozen','12',NULL,'2011-09-25 14:54:06','2011-09-25 14:54:06'),(11,3,0,1,'inches in a foot','12',NULL,'2011-09-25 14:54:17','2011-09-25 14:54:17'),(12,3,0,1,'ounces in a pound','16',NULL,'2011-09-25 14:54:29','2011-09-25 14:54:29'),(13,3,0,1,'100%9','1',NULL,'2011-09-25 14:57:04','2011-09-25 14:57:04'),(14,3,0,1,'8*100','800',NULL,'2011-09-25 14:57:15','2011-09-25 14:57:15'),(15,3,0,1,'sqrt( 81 )','9',NULL,'2011-09-25 14:57:27','2011-09-25 14:57:27'),(16,3,0,1,'Formula for a circle area','PI * R^2',NULL,'2011-09-25 14:57:46','2011-09-25 14:57:46'),(17,3,0,1,'2^8','256',NULL,'2011-09-25 14:57:53','2011-09-25 14:57:53'),(18,3,0,1,'Volume of a cylinder','PI * R^2 * H',NULL,'2011-09-25 14:58:18','2011-09-25 14:58:18'),(19,3,0,1,'days in a year','365',NULL,'2011-09-25 15:02:58','2011-09-25 15:02:58');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_content`
--

DROP TABLE IF EXISTS `test_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `content_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `order` int(11) DEFAULT '0',
  `comment` text,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `test` (`test_id`),
  KEY `question` (`content_id`),
  KEY `type` (`content_type`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_content`
--

LOCK TABLES `test_content` WRITE;
/*!40000 ALTER TABLE `test_content` DISABLE KEYS */;
INSERT INTO `test_content` VALUES (1,1,1,3,0,NULL,'2011-09-25 14:51:30','0000-00-00 00:00:00'),(2,1,1,1,0,NULL,'2011-09-25 14:51:32','0000-00-00 00:00:00'),(3,1,1,4,0,NULL,'2011-09-25 14:51:51','2011-09-25 18:51:51'),(4,1,1,5,0,NULL,'2011-09-25 14:52:02','2011-09-25 18:52:02'),(5,2,1,6,0,NULL,'2011-09-25 14:53:15','2011-09-25 18:53:15'),(6,2,1,7,0,NULL,'2011-09-25 14:53:20','2011-09-25 18:53:20'),(7,2,1,8,0,NULL,'2011-09-25 14:53:49','2011-09-25 18:53:49'),(8,2,1,9,0,NULL,'2011-09-25 14:53:56','2011-09-25 18:53:56'),(9,2,1,10,0,NULL,'2011-09-25 14:54:06','2011-09-25 18:54:06'),(10,2,1,11,0,NULL,'2011-09-25 14:54:17','2011-09-25 18:54:17'),(11,2,1,12,0,NULL,'2011-09-25 14:54:29','2011-09-25 18:54:29'),(12,3,1,13,0,NULL,'2011-09-25 14:57:04','2011-09-25 18:57:04'),(13,3,1,14,0,NULL,'2011-09-25 14:57:15','2011-09-25 18:57:15'),(14,3,1,15,0,NULL,'2011-09-25 14:57:27','2011-09-25 18:57:27'),(15,3,1,16,0,NULL,'2011-09-25 14:57:46','2011-09-25 18:57:46'),(16,3,1,17,0,NULL,'2011-09-25 14:57:53','2011-09-25 18:57:53'),(17,3,1,18,0,NULL,'2011-09-25 14:58:18','2011-09-25 18:58:18'),(18,4,1,8,0,NULL,'2011-09-25 15:00:01','0000-00-00 00:00:00'),(19,4,1,9,0,NULL,'2011-09-25 15:00:12','0000-00-00 00:00:00'),(20,4,1,15,0,NULL,'2011-09-25 15:02:34','0000-00-00 00:00:00'),(21,4,1,13,0,NULL,'2011-09-25 15:02:35','0000-00-00 00:00:00'),(22,4,1,8,0,NULL,'2011-09-25 15:02:39','0000-00-00 00:00:00'),(23,4,1,16,0,NULL,'2011-09-25 15:02:48','0000-00-00 00:00:00'),(24,4,1,19,0,NULL,'2011-09-25 15:02:58','2011-09-25 19:02:58'),(25,5,1,2,0,NULL,'2011-09-25 15:03:27','0000-00-00 00:00:00'),(26,5,1,9,0,NULL,'2011-09-25 15:03:28','0000-00-00 00:00:00'),(27,5,1,8,0,NULL,'2011-09-25 15:03:28','0000-00-00 00:00:00'),(28,5,1,7,0,NULL,'2011-09-25 15:03:29','0000-00-00 00:00:00'),(29,5,1,14,0,NULL,'2011-09-25 15:03:31','0000-00-00 00:00:00'),(30,5,1,18,0,NULL,'2011-09-25 15:03:33','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `test_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='tests';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,2,'US Geography','Learn about the states','2011-09-25 14:51:07','2011-09-25 15:04:46'),(2,3,'Simple math concepts','Practice some basic arithmatic','2011-09-25 14:52:59','2011-09-25 14:54:35'),(3,3,'Advanced math concepts','Harder math','2011-09-25 14:54:35','2011-09-25 14:58:25'),(4,3,'Mixed Math','Super easy to make because I can reuse my old questions','2011-09-25 14:58:34','2011-09-25 15:03:02'),(5,3,'Multi-discipline','I like to mix math and state names','2011-09-25 14:59:19','2011-09-25 15:03:40');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'max@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Max','First','2011-09-25 00:54:58','2011-09-25 00:54:58'),(2,'andrew@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Andrew','Drane','2011-09-25 01:42:06','2011-09-25 01:42:06'),(3,'kurt@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Kurt','Hockman','2011-09-25 14:45:06','2011-09-25 14:45:06'),(4,'edwina@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Edwina','Ells','2011-09-25 14:45:06','2011-09-25 14:45:06'),(5,'max@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Max','Parenti','2011-09-25 14:45:06','2011-09-25 14:45:06'),(6,'hugh@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Hugh','Iddings','2011-09-25 14:45:06','2011-09-25 14:45:06'),(7,'fernando@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Fernando','Yeldell','2011-09-25 14:45:06','2011-09-25 14:45:06'),(8,'karina@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Karina','Amburgey','2011-09-25 14:45:06','2011-09-25 14:45:06'),(9,'alejandra@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Alejandra','Monico','2011-09-25 14:45:06','2011-09-25 14:45:06'),(10,'lance@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Lance','Nachman','2011-09-25 14:45:06','2011-09-25 14:45:06'),(11,'benita@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Benita','Mcglone','2011-09-25 14:45:06','2011-09-25 14:45:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-25 15:11:12
