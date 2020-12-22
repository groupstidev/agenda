-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: agenda
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.16.04.1

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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitante` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `conexao` varchar(45) DEFAULT NULL,
  `gatekeeper` varchar(45) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sala` varchar(45) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,NULL,'teste',NULL,NULL,NULL,NULL,'#FFD700','2020-12-14 00:00:00','2020-12-15 00:00:00'),(2,'Fabio','Test de Conection',NULL,NULL,NULL,NULL,'#228B22','2020-12-15 00:00:00','2020-12-19 00:00:00'),(3,'aa','aa','Meet',NULL,NULL,NULL,'#0071c5','2020-12-15 00:00:00','2020-12-16 00:00:00'),(4,'adas','dada','Meet',NULL,'dada',NULL,'#A020F0','2020-12-16 00:00:00','2020-12-17 00:00:00'),(5,'eeew','eeeee','Scopia','eeee','',NULL,'#436EEE','2020-12-17 00:00:00','2020-12-18 00:00:00'),(6,'tretre','eterte','Meet','','tetertertretre',NULL,'#8B0000','2020-12-18 00:00:00','2020-12-19 00:00:00'),(7,'yyyyyyyyyyyyyy','yyyyyyyyyyy','Scopia','yyyyyyyyyy','','yyyyyyyyyyyyy','#8B4513','2020-12-13 00:00:00','2020-12-14 00:00:00'),(8,'teste Fabio','testde Assunto','Meet','','adada','','#8B4513','2020-12-01 00:00:00','2020-12-02 00:00:00');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-22 11:40:09
