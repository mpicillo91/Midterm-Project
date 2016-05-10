-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: storeinventory
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inventory` (
  `ItemName` varchar(20) DEFAULT NULL,
  `Category` varchar(20) DEFAULT NULL,
  `Supplier` varchar(20) DEFAULT NULL,
  `ItemNumber` int(11) NOT NULL,
  `InStock` varchar(1) NOT NULL,
  `Ordered` varchar(1) NOT NULL,
  `StillOffered` varchar(1) NOT NULL,
  `StockNumber` int(11) DEFAULT NULL,
  `LowWaterMark` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventory`
--

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;
INSERT INTO `Inventory` VALUES ('CoolWater','Food','Hydrate',1,'Y','Y','Y',21,20),('FruitWater','Food','Hydrate',2,'Y','Y','Y',25,20),('CrispyCrackers','Food','FoodTime',3,'Y','N','Y',30,20),('SuperCookies','Food','FoodTime',4,'N','Y','Y',24,20),('CrispyChocolate','Food','FoodTime',5,'Y','Y','Y',40,20),('CrispyChocolateP','Food','FoodTime',6,'Y','Y','Y',42,20),('CrispyChocolateC','Food','FoodTime',7,'N','Y','Y',21,20),('USMagazine','Book','USPublishing',8,'Y','Y','Y',35,20),('CelebCloseLook','Book','USPublishing',9,'Y','Y','Y',37,20),('WorldTravelWonders','Book','USPublishing',10,'Y','Y','Y',33,20),('GamerProListings','Book','MediaCorp',11,'Y','Y','Y',29,20),('FilmCulture','Book','MediaCorp',12,'Y','Y','Y',15,20),('SmokeStack','Cigarettes','Brians',13,'Y','Y','Y',25,20),('CapeTown','Cigarettes','Brians',14,'Y','Y','Y',18,20),('LittleGuys','Food','HenrysHouse',15,'Y','Y','Y',30,20),('SuperChips','Food','FoodTime',16,'Y','Y','Y',36,20),('NachoWorld','Food','HenrysHouse',17,'Y','N','Y',22,20),('NachoWorldDip','Food','HenrysHouse',18,'Y','N','Y',40,20),('MangoCity','Food','HenrysHouse',19,'Y','N','Y',32,20),('GoodBanana','Food','FreshestFarms',20,'Y','Y','Y',12,20),('GoodWatermelon','Food','FreshestFarms',21,'Y','Y','Y',17,20),('GoodApple','Food','FreshestFarms',22,'Y','Y','Y',21,20),('GoodGrapes','Food','FreshestFarms',23,'Y','Y','Y',26,20),('GoodCorn','Food','FreshestFarms',24,'Y','Y','Y',31,20),('GoodOlives','Food','FreshestFarms',25,'Y','Y','Y',42,20),('GoodBlueberries','Food','FreshestFarms',26,'Y','Y','Y',24,20),('GrandeVistas','Food','MediaCorp',27,'N','N','Y',30,20),('MountainViews','Food','MediaCorp',28,'N','Y','Y',15,20),('OceanAdventures','Book','MediaCorp',29,'N','Y','Y',20,20),('DeepSeaCreatures','Book','TallHat',30,'Y','N','Y',20,20),('LavaMonsters','Book','TallHat',31,'Y','Y','Y',17,20),('HealthyHouseIdeas','Book','TallHat',32,'Y','Y','Y',27,20);
/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `loginId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilegeLevel` int(11) DEFAULT NULL,
  `displayName` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`loginId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-21 20:48:11
