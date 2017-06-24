-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.6.35-log

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
-- Table structure for table `book_category_relationship`
--

DROP TABLE IF EXISTS `book_category_relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_category_relationship` (
  `_book_id` int(11) DEFAULT NULL,
  `_cat_id` int(11) DEFAULT NULL,
  KEY `bookID_idx` (`_book_id`),
  KEY `catID_idx` (`_cat_id`),
  CONSTRAINT `bookID` FOREIGN KEY (`_book_id`) REFERENCES `books` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catID` FOREIGN KEY (`_cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category_relationship`
--

LOCK TABLES `book_category_relationship` WRITE;
/*!40000 ALTER TABLE `book_category_relationship` DISABLE KEYS */;
INSERT INTO `book_category_relationship` VALUES (2,11),(3,11),(4,11),(5,11),(6,11),(7,11),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(1,11),(1,4),(8,11),(14,3),(15,1),(15,4),(16,21),(17,4),(17,6),(18,5),(19,8),(19,11);
/*!40000 ALTER TABLE `book_category_relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_title` varchar(45) NOT NULL,
  `author_name` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `release_year` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `product_id_UNIQUE` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'The Philosopher\'s Stone','J. K. Rowling','UK',1997),(2,'The Chamber of Secrets','J. K. Rowling','UK',1998),(3,'The Prisoner of Azkaban','J. K. Rowling','UK',1999),(4,'The Goblet of Fire','J. K. Rowling','UK',2000),(5,'The Order of the Phoenix','J. K. Rowling','UK',2003),(6,'The Half-Blood Prince','J. K. Rowling','UK',2005),(7,'The Deathly Hallows','J. K. Rowling','UK',2007),(8,'American Gods','Neil Gaiman','UK',2001),(14,'Introduction to Algorithms','Thomas H. Cormen','USA',1990),(15,'The Underground Railroad','Colson Whitehead','USA',2016),(16,'The Magic','Rhonda Byrne','USA',2012),(17,'Srikanta','Sarat Chandra Chattopadhyay','India',1917),(18,'CyberStorm','Matthew Mather','USA',2013),(19,'Alice in Wonderland','Lewis Carroll','UK',1865);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(45) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id_UNIQUE` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Award Winners'),(2,'Biographies and Memoirs'),(3,'Computers and Technology'),(4,'Literature and Fiction'),(5,'Mystery, Thriller and Suspense'),(6,'Romance'),(8,'Children Book'),(9,'Health, Fitness and Dieting '),(10,'Science and Math'),(11,'Fantasy'),(19,'Test Preperation'),(21,'Self-Help');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-23 20:14:55
