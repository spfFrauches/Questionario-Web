-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: localhost    Database: qst10
-- ------------------------------------------------------
-- Server version	5.6.45

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
-- Table structure for table `A001QST`
--

DROP TABLE IF EXISTS `A001QST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `A001QST` (
  `CodQst` int(11) NOT NULL AUTO_INCREMENT,
  `NomQst` varchar(145) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `DatCri` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StatusQst` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`CodQst`),
  UNIQUE KEY `NomQst_UNIQUE` (`NomQst`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `A001QST`
--

LOCK TABLES `A001QST` WRITE;
/*!40000 ALTER TABLE `A001QST` DISABLE KEYS */;
INSERT INTO `A001QST` VALUES (2,'Titulo do QuestionÃ¡rio 2','2020-12-30 18:24:55','em_criacao'),(4,'TÃ­tulo do QuestionÃ¡rio QuestionÃ¡rio 3','2020-12-30 18:53:43','em_criacao');
/*!40000 ALTER TABLE `A001QST` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `A002PEG`
--

DROP TABLE IF EXISTS `A002PEG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `A002PEG` (
  `CodPeg` int(11) NOT NULL AUTO_INCREMENT,
  `CodQst` int(11) NOT NULL,
  `SeqPeg` int(11) NOT NULL,
  `PegQst` varchar(200) NOT NULL,
  `PegTip` varchar(45) NOT NULL,
  PRIMARY KEY (`CodPeg`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `A002PEG`
--

LOCK TABLES `A002PEG` WRITE;
/*!40000 ALTER TABLE `A002PEG` DISABLE KEYS */;
INSERT INTO `A002PEG` VALUES (2,2,1,'Qual o seu nome?','inputHTML'),(4,2,2,'VocÃª Ã© programador?','selectHTML'),(6,4,1,'Qual o seu nome?','inputHTML'),(8,4,2,'Qual sua idade? ','inputHTML'),(10,4,3,'Porque vocÃª esta aqui?','inputHTML');
/*!40000 ALTER TABLE `A002PEG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `A003PEG`
--

DROP TABLE IF EXISTS `A003PEG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `A003PEG` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CodQst` int(11) DEFAULT NULL,
  `CodPeg` int(11) DEFAULT NULL,
  `DesOpc` varchar(100) DEFAULT NULL,
  `SeqOpc` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `A003PEG`
--

LOCK TABLES `A003PEG` WRITE;
/*!40000 ALTER TABLE `A003PEG` DISABLE KEYS */;
INSERT INTO `A003PEG` VALUES (32,2,4,'Sim',0),(33,2,4,'NÃ£o',1);
/*!40000 ALTER TABLE `A003PEG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `A004ENVRES`
--

DROP TABLE IF EXISTS `A004ENVRES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `A004ENVRES` (
  `CodEnv` int(11) NOT NULL AUTO_INCREMENT,
  `DataEnv` date DEFAULT NULL,
  `CodQst` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodEnv`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `A004ENVRES`
--

LOCK TABLES `A004ENVRES` WRITE;
/*!40000 ALTER TABLE `A004ENVRES` DISABLE KEYS */;
INSERT INTO `A004ENVRES` VALUES (2,'2020-12-31',2),(4,'2020-12-31',2),(6,'2020-12-31',4),(8,'2020-12-31',2);
/*!40000 ALTER TABLE `A004ENVRES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `A004RES`
--

DROP TABLE IF EXISTS `A004RES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `A004RES` (
  `CodRes` int(11) NOT NULL AUTO_INCREMENT,
  `CodEnv` int(11) NOT NULL,
  `CodQst` int(11) NOT NULL,
  `CodPeg` int(11) NOT NULL,
  `DesPeg` varchar(245) DEFAULT NULL,
  `Resposta` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`CodRes`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `A004RES`
--

LOCK TABLES `A004RES` WRITE;
/*!40000 ALTER TABLE `A004RES` DISABLE KEYS */;
INSERT INTO `A004RES` VALUES (1,2,2,2,'Qual o seu nome?','Saulo'),(2,2,2,4,'VocÃª Ã© programador?','Sim'),(3,4,2,2,'Qual o seu nome?','Diogo'),(4,4,2,4,'VocÃª Ã© programador?','Sim'),(5,6,4,6,'Qual o seu nome?','Greidson'),(6,6,4,8,'Qual sua idade? ','24'),(7,6,4,10,'Porque vocÃª esta aqui?','Sou programador'),(8,8,2,2,'Qual o seu nome?','Frauches'),(9,8,2,4,'VocÃª Ã© programador?','NÃ£o');
/*!40000 ALTER TABLE `A004RES` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-31 11:15:43
