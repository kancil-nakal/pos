-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: pos_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Aghna Mumtaz','L','082326423807','Komplek Dutamas Fatmawati Blok B2/26, Cipete Utara, Kebayoran Baru','2021-08-17 15:27:52','2021-08-17 10:33:33'),(3,'Raline Qairina Yasmin','P','082326423807','Komplek Dutamas Fatmawati Blok B2/26, Cipete Utara, Kebayoran Baru','2021-08-17 15:34:10','2021-08-17 10:34:21');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_categories`
--

DROP TABLE IF EXISTS `p_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_categories`
--

LOCK TABLES `p_categories` WRITE;
/*!40000 ALTER TABLE `p_categories` DISABLE KEYS */;
INSERT INTO `p_categories` VALUES (1,'T-Shirt','2021-08-17 16:25:59','2021-08-17 11:26:09'),(5,'Shoes','2021-08-17 16:37:40','2021-08-17 13:12:00');
/*!40000 ALTER TABLE `p_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_items`
--

DROP TABLE IF EXISTS `p_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `category_id` (`category_id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `p_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_categories` (`category_id`),
  CONSTRAINT `p_items_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_units` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_items`
--

LOCK TABLES `p_items` WRITE;
/*!40000 ALTER TABLE `p_items` DISABLE KEYS */;
INSERT INTO `p_items` VALUES (3,'TINE10','Work is Never End',1,1,120000,36,'item-210818-6b1a4fa124.jpg','2021-08-18 14:54:42','2021-08-18 15:18:42'),(5,'TINE09','Time is Never End',1,1,120000,24,'item-210818-e9274b3762.jpg','2021-08-18 15:04:18','2021-08-18 15:26:31'),(10,'TINE11','Wasting Time',1,1,120000,0,'item-210818-c843ea1b3f.jpg','2021-08-18 19:46:32',NULL),(13,'C21001','Alivess Collection I',1,1,100000,12,'item-210819-9f7634ca97.jpg','2021-08-19 17:39:58','2021-08-19 12:40:57'),(14,'C21002','Alivess Collection II',1,1,100000,0,'item-210819-419d5c5ab7.jpg','2021-08-19 17:40:37',NULL),(15,'C21003','Alivess Collection III',1,1,100000,0,'item-210819-6ac8671670.jpg','2021-08-19 17:41:35',NULL),(16,'C21004','Alivess Collection IV',1,1,100000,24,'item-210819-8cdc63c02e.jpg','2021-08-19 17:42:15',NULL),(17,'C21005','Alivess Collection V',1,1,100000,0,'item-210819-7174ffe48d.jpg','2021-08-19 17:42:40',NULL),(18,'C21006','Alivess Collection VI',1,1,100000,0,'item-210819-476271cddd.jpg','2021-08-19 17:43:16',NULL),(19,'C21007','Alivess Collection VII',1,1,100000,0,'item-210819-882c16ea4c.jpg','2021-08-19 17:43:54',NULL),(20,'C21008','Alivess Collection VII',1,1,100000,0,'item-210819-cdddda39ef.jpg','2021-08-19 17:44:31','2021-08-19 13:37:43');
/*!40000 ALTER TABLE `p_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_units`
--

DROP TABLE IF EXISTS `p_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p_units` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_units`
--

LOCK TABLES `p_units` WRITE;
/*!40000 ALTER TABLE `p_units` DISABLE KEYS */;
INSERT INTO `p_units` VALUES (1,'Pcs','2021-08-17 16:25:59','2021-08-17 13:07:32'),(5,'Lusin','2021-08-17 16:37:40','2021-08-17 13:12:05');
/*!40000 ALTER TABLE `p_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Mazriza Store','082328423807','Bandung','ATK','2021-08-16 11:55:54','2021-08-16 06:54:13'),(2,'Alivess Store','082326423807','Jakarta','Clothing','2021-08-16 11:55:54','2021-08-16 06:54:13'),(4,'DJK Store','082326423333','Ciwaruga',NULL,'2021-08-16 15:05:32','2021-08-17 13:09:24');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_stock`
--

DROP TABLE IF EXISTS `t_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `type` enum('in','out') DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `t_stock_FK_1` (`supplier_id`),
  KEY `t_stock_FK` (`item_id`),
  KEY `t_stock_FK_2` (`user_id`),
  CONSTRAINT `t_stock_FK` FOREIGN KEY (`item_id`) REFERENCES `p_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_stock_FK_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`),
  CONSTRAINT `t_stock_FK_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_stock`
--

LOCK TABLES `t_stock` WRITE;
/*!40000 ALTER TABLE `t_stock` DISABLE KEYS */;
INSERT INTO `t_stock` VALUES (1,3,'in','Konveksi',NULL,24,'2021-09-03',NULL,NULL),(2,3,'in','Konveksi',NULL,24,'2021-09-03',NULL,NULL),(3,5,'in','Konveksi',4,24,'2021-09-03','0000-00-00 00:00:00',NULL),(4,3,'in','Konveksi',NULL,12,'2021-09-03',NULL,NULL),(5,13,'in','Konveksi',2,12,'2021-09-03','2021-09-03 08:43:54',NULL),(6,16,'in','Garment',1,24,'2021-09-03','2021-09-03 08:57:01',NULL);
/*!40000 ALTER TABLE `t_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1 admin, 2 kasir',
  `is_active` int(1) NOT NULL COMMENT '1 active, 0 non active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'irsyad','$2y$10$0lvkpHwzfd.rv1Ok.WvsM.rGrvlLK3qS45tJjORhg2WNtpzhAzKzq','Irsyad Al Fahriza','irsyad@gmail.com','Brebes, Indonesia',1,1),(9,'sasa','$2y$10$vNxuyxzTqKkM/XZhN5donuivu4l2SV7x7PWkFKhtqY2dVpbG6xaI2','Safira Rizki Anindya','safira.rizkianindya@gmail.com','Medan, indonesia',2,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pos_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-03 14:10:28
