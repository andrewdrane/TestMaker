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
-- Current Database: `questions`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `questions` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `questions`;

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
INSERT INTO `bookmarks` VALUES (1,2,1,7,0,NULL,'2011-09-25 12:23:38','0000-00-00 00:00:00'),(2,2,1,11,0,NULL,'2011-09-25 12:23:41','0000-00-00 00:00:00'),(3,2,1,1,0,NULL,'2011-09-25 12:23:44','0000-00-00 00:00:00'),(4,1,1,2,0,NULL,'2011-09-25 13:44:29','0000-00-00 00:00:00'),(5,1,1,6,0,NULL,'2011-09-25 13:44:29','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='questions';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,2,0,1,'what is your name','Bob',NULL,'2011-09-25 10:36:41','2011-09-25 10:36:41'),(2,2,0,1,'What is your quest','The holy grail',NULL,'2011-09-25 10:36:49','2011-09-25 10:36:49'),(3,2,0,1,'What is the average airspeed of a swallow','23 mph',NULL,'2011-09-25 10:37:01','2011-09-25 10:37:01'),(4,2,0,1,'weee','bar',NULL,'2011-09-25 10:43:33','2011-09-25 10:43:33'),(5,2,0,1,'ab','ce',NULL,'2011-09-25 10:43:54','2011-09-25 10:43:54'),(6,2,0,1,'abc','def',NULL,'2011-09-25 10:44:38','2011-09-25 10:44:38'),(7,2,0,1,'ab','ece',NULL,'2011-09-25 10:45:34','2011-09-25 10:45:34'),(8,2,0,1,'beer','wat',NULL,'2011-09-25 10:55:59','2011-09-25 10:55:59'),(9,2,0,1,'say','weee',NULL,'2011-09-25 10:56:02','2011-09-25 10:56:02'),(10,2,0,1,'Are beans good?','Yes',NULL,'2011-09-25 11:39:11','2011-09-25 11:39:11'),(11,2,0,0,'why','because',NULL,'2011-09-25 11:53:09','2011-09-25 11:53:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_content`
--

LOCK TABLES `test_content` WRITE;
/*!40000 ALTER TABLE `test_content` DISABLE KEYS */;
INSERT INTO `test_content` VALUES (1,1,1,8,0,NULL,'2011-09-25 10:55:59','2011-09-25 14:55:59'),(3,1,1,3,0,NULL,'2011-09-25 11:30:48','2011-09-25 15:30:48'),(5,1,1,1,0,NULL,'2011-09-25 11:32:07','0000-00-00 00:00:00'),(6,1,1,10,0,NULL,'2011-09-25 11:39:11','2011-09-25 15:39:11');
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='tests';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,2,NULL,'A basic Math test!!!!!!!1','2011-09-25 10:34:40','2011-09-25 11:39:23');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'max@test.com','29f5bc79da39de43270f32161be91dec5da4fe5f','Max','First','2011-09-25 00:54:58','2011-09-25 00:54:58'),(2,'andrew@andrewdrane.com','29f5bc79da39de43270f32161be91dec5da4fe5f','andrew','drane','2011-09-25 01:42:06','2011-09-25 01:42:06');
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

-- Dump completed on 2011-09-25 14:29:35
