-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: demo_rce
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `Id` int NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Secret_numb` int NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'kuuga','caa539922a84b2cfb04ca7b0e9d2f1b2',345635040),(2,'agito','dac9aa94dcd3a3e7d9d87e253153f21c',126850578),(3,'ryuki','d9165c464255258ad9cad45dc2af716c',940489824),(4,'faiz','a226a450eb6f26168cced6af9829e7e3',707261857),(5,'blade','0cb15e0df6a3cc3d2246f731858548f4',446421021),(6,'hibiki','2a3eb74460a922668081281915942068',411665351),(7,'kabuto','cee7fcdc98a4ad69ccbb8708b47212e6',180722249),(8,'den-o','1a2a690eeeacc2390b1a98187d572a71',113382654),(9,'kiva','fdec855dd2fe12a956de5fe7f6302ae2',705318687),(10,'decade','1aa4271661523c26491d66d4a81c5d74',209878288),(11,'double','cfc97b5e63922ec843f283ba0f491844',932647969),(12,'ooo','0b55cabf462e65d907e87c7d96cc5fdf',153223060),(13,'fourze','75056351bd8e245a95937e946e28c496',869544878),(14,'wizard','3c5b966a654eab5c2bc1d0376c6d1126',184308447),(15,'gaim','c373630d4d2b01e7e25a3ce4cd13b087',542860758),(16,'drive','2fcd96ff150b5d65949144ffd6450f38',627006717),(17,'ghost','b86f82347a3f73eae4a4ed12f285c78f',270537510),(18,'ex-aid','afa362dcd2d5f1be010df72017426873',246679550),(19,'build','0d5dc9b5def515b88c13c3022f33866f',177803183),(20,'zi-o','98f8e4c1d61e7aa40a143252c01ead36',765082244),(21,'zero-one','04611e58d1fa07977e0f75d00d78e9a3',156312072),(22,'saber','32004c1c6f61c7d4a4e3ea7709e55376',110563021);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-16  6:17:00