-- MySQL dump 10.13  Distrib 5.6.21, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pollux
-- ------------------------------------------------------
-- Server version	5.6.21-1~dotdeb.1

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
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metakey_id` int(11) NOT NULL DEFAULT '0',
  `publication_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta`
--

LOCK TABLES `meta` WRITE;
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
INSERT INTO `meta` VALUES (1,2,1,0,'2013-03-03 07:41:49','2014-11-15 11:41:40','Star Trek: The Motion Picture'),(2,3,1,0,'2013-03-03 07:41:49','2014-11-15 11:41:40','DVD'),(3,4,1,0,'2013-03-03 07:41:49','2014-11-15 11:41:40','Science-Fiction'),(4,5,1,0,'2013-03-03 07:41:49','2014-11-15 11:41:40','Robert Wise'),(5,6,1,0,'2013-03-03 07:41:49','2014-11-15 11:41:40','William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei'),(6,9,1,0,'2013-03-03 07:49:37','2014-11-15 11:41:40',' Die U.S.S. Enterprise™ startet wieder in die unendlichen Weiten des Universums - in diesem neuen, hervorragend restaurierten Director\'s Cut des original Star Trek™-Films. Diese neue Fassung des legendären Regisseurs Robert Wise enthält verbesserte visuelle Effekte und einen neuen Sound. Als unbekannte Außerirdische drei mächtige klingonische Schiffe zerstören, kehrt Captain James T. Kirk auf die frisch umgebaute U.S.S. Enterprise™ zurück, um das Kommando zu übernehmen. Leonard Nimoy, DeForest Kelly und die Original-Besatzung der beliebten Star Trek™-Serie nehmen mit Warp-Geschwindigkeit den Kampf auf, um die außerirdischen Eindringlinge auf ihrem erbarmungslosen Weg zur Erde zu stoppen.'),(7,8,1,0,'2013-03-03 07:49:37','2014-11-15 11:41:40','131'),(8,2,2,0,'2013-03-03 07:56:31','2014-11-15 11:41:40','Star Trek II: The Wrath Of Khan'),(9,3,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','DVD'),(10,4,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','Science-Fiction'),(11,5,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','Nicholas Meyer'),(12,9,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','Im 23. Jahrhundert: Das Föderationsraumschiff U.S.S. Enterprise befindet sich auf einem Routine-Manöver. Admiral Kirk scheint bedrückt, da diese Inspektion wahrscheinlich die letzte seiner Laufbahn sein wird. Doch Khan ist zurückgekehrt: Unterstützt von einer Gruppe verbannter Mutanten hat er die Weltraumstation Regula One überfallen, die Top-Secret-Vorrichtung namens Projekt Genesis gestohlen und die Kontrolle eines Föderationsraumschiffs an sich gerissen. Nun plant Khan eine tödliche Falle für seinen alten Feind Kirk ... und droht dem gesamten Universum mit dem Untergang! In einer Nebenrolle Kirstie Alley (Cheers™) in ihrem grandiosem Filmdebüt.'),(13,6,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei'),(14,8,2,0,'2013-03-03 08:02:07','2014-11-15 11:41:40','108'),(15,10,1,0,'2013-03-03 11:39:50','2014-11-15 11:41:40','1979'),(16,10,2,0,'2013-03-03 11:39:50','2014-11-15 11:41:40','1982'),(17,7,1,0,'2013-03-03 11:47:49','2014-11-15 11:41:40','GeneRoddenberry, Alan Dean Foster, Harold Livingston'),(18,7,2,0,'2013-03-03 11:49:14','2014-11-15 11:41:40','Gene Roddenberry, Harve Bennett, Jack B Sowards, Samuel A. Peeples, Nicholas Meyer, Ramon Sanchez'),(19,2,3,0,'2013-07-05 20:59:56','2014-11-15 11:41:40','Star Trek III: The Search For Spock'),(20,3,3,0,'2013-07-05 21:00:21','2014-11-15 11:41:40','DVD'),(21,4,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','Science-Fiction'),(22,5,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','Leonard Nimoy'),(23,6,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei, Walter Koenig, Nichelle Nichols'),(24,7,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','Harve Bennet, Gene Roddenberry'),(25,8,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','101'),(26,9,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','Admiral Kirks Sieg über Khan und die Erschaffung des Planeten Genesis sind teuer erkauft: Spock ist tot und McCoy offensichtlich verrückt geworden. Der unerwartete Besuch von Sarek, Spocks Vater, liefert eine überaschende Offenbarung: Spocks Lebensessenz ist in McCoys Körper übergegangen. Um seinen Freunden zu helfen, stiehl Kirk die U.S.S. Enterprise und missachtet die Sternenflotten-Quarantäne für Genesis. Doch die Klingonen haben das Geheimnis von Genesis entdeckt und sind auf dem Weg zu einem tödlichen Rendevous mit Kirk...'),(27,10,3,0,'2013-07-05 21:13:02','2014-11-15 11:41:40','1984'),(28,1,1,0,'2014-11-15 11:44:25','0000-00-00 00:00:00','Star Trek: Der Film'),(29,1,2,0,'2014-11-15 11:46:11','0000-00-00 00:00:00','Star Trek II: Der Zorn des Khan'),(30,1,3,0,'2014-11-15 11:46:11','2014-11-15 11:46:25','Star Trek III: Auf der Suche nach Mr. Spock'),(31,1,4,0,'2014-11-15 11:49:52','0000-00-00 00:00:00','Star Trek IV: Zurück in die Vergangenheit'),(32,1,5,0,'2014-11-15 11:49:52','0000-00-00 00:00:00','Star Trek V: Am Rande des Universums'),(33,1,6,0,'2014-11-15 11:49:52','0000-00-00 00:00:00','Star Trek VI: Das unentdeckte Land');
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`10.13.16.100`*/ /*!50003 TRIGGER `meta_BUPD` BEFORE UPDATE ON `meta` FOR EACH ROW
BEGIN
	SET NEW.last_modified = NOW();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `metakey`
--

DROP TABLE IF EXISTS `metakey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metakey` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publication_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `keyname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metakey`
--

LOCK TABLES `metakey` WRITE;
/*!40000 ALTER TABLE `metakey` DISABLE KEYS */;
INSERT INTO `metakey` VALUES (1,1,0,'2014-11-14 18:42:48','0000-00-00 00:00:00','title'),(2,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','original_title'),(3,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','medium'),(4,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','genre'),(5,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','director'),(6,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','starring'),(7,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','writers'),(8,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','duration'),(9,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','blurb'),(10,1,0,'2014-11-14 18:44:03','0000-00-00 00:00:00','release');
/*!40000 ALTER TABLE `metakey` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `metakey_BUPD` BEFORE UPDATE ON `metakey` FOR EACH ROW
BEGIN
	SET NEW.last_modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publication` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publication_type_id` int(10) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
INSERT INTO `publication` VALUES (1,1,'2013-03-03 07:31:25','0000-00-00 00:00:00'),(2,1,'2013-03-03 07:31:25','0000-00-00 00:00:00'),(3,1,'2013-03-03 07:31:25','0000-00-00 00:00:00'),(4,1,'2013-07-09 07:45:24','2013-07-09 07:45:24'),(5,1,'2013-07-09 07:52:04','2013-07-09 07:52:04'),(6,1,'2013-08-16 12:47:54','2013-08-16 00:47:54');
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `media_BUPD` BEFORE UPDATE ON `publication` FOR EACH ROW
begin
	SET NEW.last_modified = NOW();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `publication_type`
--

DROP TABLE IF EXISTS `publication_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publication_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication_type`
--

LOCK TABLES `publication_type` WRITE;
/*!40000 ALTER TABLE `publication_type` DISABLE KEYS */;
INSERT INTO `publication_type` VALUES (1,'2013-07-06 09:00:00','0000-00-00 00:00:00','movie'),(2,'2013-07-06 09:00:00','0000-00-00 00:00:00','book');
/*!40000 ALTER TABLE `publication_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `mediatype_BUPD` BEFORE UPDATE ON `publication_type` FOR EACH ROW
begin
	SET NEW.last_modified = NOW();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `rental`
--

DROP TABLE IF EXISTS `rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rental` (
  `person_id` int(10) unsigned NOT NULL,
  `publication_id` int(10) unsigned NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `since` date DEFAULT NULL,
  `due` date DEFAULT NULL,
  PRIMARY KEY (`person_id`,`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rental`
--

LOCK TABLES `rental` WRITE;
/*!40000 ALTER TABLE `rental` DISABLE KEYS */;
/*!40000 ALTER TABLE `rental` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `rental_BUPD` BEFORE UPDATE ON `rental` FOR EACH ROW
BEGIN
	SET NEW.last_modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `can_login` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `user_BUPD` BEFORE UPDATE ON `user` FOR EACH ROW
BEGIN
	SET NEW.last_modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-10 19:01:13
