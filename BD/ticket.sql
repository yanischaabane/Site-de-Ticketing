-- MySQL dump 10.17  Distrib 10.3.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ticket
-- ------------------------------------------------------
-- Server version	10.3.18-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `T_COMMENTAIRE`
--

DROP TABLE IF EXISTS `T_COMMENTAIRE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_COMMENTAIRE` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `TIC_ID` int(11) NOT NULL,
  PRIMARY KEY (`COM_ID`),
  KEY `fk_com_bil` (`TIC_ID`),
  CONSTRAINT `fk_com_bil` FOREIGN KEY (`TIC_ID`) REFERENCES `T_TICKET` (`TIC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_COMMENTAIRE`
--

LOCK TABLES `T_COMMENTAIRE` WRITE;
/*!40000 ALTER TABLE `T_COMMENTAIRE` DISABLE KEYS */;
INSERT INTO `T_COMMENTAIRE` VALUES (5,'2020-03-21 10:55:47','Utilisateur Lambda','Ce serait pas mal effectivement, ça nous fera oublier la douleur de configurer .htaccess',16),(6,'2020-03-21 10:56:03','Modérateur ','Même pas en rêve.',16),(7,'2020-03-21 10:57:38','Modérateur 2','Déjà en test.',17);
/*!40000 ALTER TABLE `T_COMMENTAIRE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `T_ETATS`
--

DROP TABLE IF EXISTS `T_NIVEAU`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_NIVEAU` (
  `idniveau` int(11) NOT NULL AUTO_INCREMENT,
  `nomniveau` varchar(30) NOT NULL,
  PRIMARY KEY (`idniveau`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_ETATS`
--

LOCK TABLES `T_NIVEAU` WRITE;
/*!40000 ALTER TABLE `T_ETATS` DISABLE KEYS */;
INSERT INTO `T_NIVEAU` VALUES (0,'unassigned'),(1,'Ouverte'),(2,'En développement'),(3,'En test'),(4,'En Beta'),(5,'Fermé');
/*!40000 ALTER TABLE `T_ETATS` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`user`@`localhost`*/ /*!50003 TRIGGER `ProtectTickets` BEFORE DELETE ON `T_ETATS` FOR EACH ROW
BEGIN 
UPDATE T_TICKET SET TIC_ETAT = 0 WHERE TIC_ETAT = OLD.idetat;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `T_TICKET`
--

DROP TABLE IF EXISTS `T_TICKET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `T_TICKET` (
  `TIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(100) NOT NULL,
  `TIC_CONTENU` varchar(400) NOT NULL,
  `TIC_NIVEAU` int(11) NOT NULL,
  PRIMARY KEY (`TIC_ID`),
  KEY `TIC_NIVEAU` (`TIC_NIVEAU`),
  CONSTRAINT `T_TICKET_ibfk_1` FOREIGN KEY (`TIC_NIVEAU`) REFERENCES `T_ETATS` (`idetat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `T_TICKET`
--

LOCK TABLES `T_TICKET` WRITE;
/*!40000 ALTER TABLE `T_TICKET` DISABLE KEYS */;
INSERT INTO `T_TICKET` VALUES (16,'2020-03-21 10:55:03','Ajoutez un fond d\'écran','Ce serait pas mal d\'ajouter un fond d\'écran de potit chat non ?',3),(17,'2020-03-21 10:56:52','Ajout Framework','Quand est ce que vous mettez à jour le site avec le Framework maison ?',1);
/*!40000 ALTER TABLE `T_TICKET` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-08 15:38:59
