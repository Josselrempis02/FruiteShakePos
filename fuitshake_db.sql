-- MySQL dump 10.13  Distrib 8.0.40, for macos14 (x86_64)
--
-- Host: 127.0.0.1    Database: fruitshake_db
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_12_13_060919_create_roles_table',1),(5,'2024_12_13_061047_add_role_id_to_users_table',1),(7,'2025_01_08_073852_create_products_table',2),(9,'2025_01_09_105447_create_stock_logs_table',3),(10,'2025_01_11_071014_create_orders_table',4),(11,'2025_01_11_071036_create_order_items_table',5),(12,'2025_01_12_092630_add_discount_to_orders_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,2,'kainin',150.00,1,'2025-01-10 23:59:51','2025-01-10 23:59:51'),(2,2,'William Stout',340.00,1,'2025-01-10 23:59:51','2025-01-10 23:59:51'),(3,3,'kainin',150.00,3,'2025-01-11 00:04:04','2025-01-11 00:04:04'),(4,3,'Yvonne Trevino',113.00,3,'2025-01-11 00:04:04','2025-01-11 00:04:04'),(5,4,'Orli Thompson',953.00,1,'2025-01-11 00:09:34','2025-01-11 00:09:34'),(6,4,'Riley Rhodes',907.00,1,'2025-01-11 00:09:34','2025-01-11 00:09:34'),(7,5,'Yvonne Trevino',113.00,1,'2025-01-11 00:11:11','2025-01-11 00:11:11'),(8,5,'kainin',150.00,1,'2025-01-11 00:11:11','2025-01-11 00:11:11'),(9,5,'William Stout',340.00,1,'2025-01-11 00:11:11','2025-01-11 00:11:11'),(10,6,'kainin',150.00,1,'2025-01-11 00:13:34','2025-01-11 00:13:34'),(11,6,'Yvonne Trevino',113.00,1,'2025-01-11 00:13:34','2025-01-11 00:13:34'),(12,6,'William Stout',340.00,1,'2025-01-11 00:13:34','2025-01-11 00:13:34'),(13,7,'kainin',150.00,1,'2025-01-11 00:13:44','2025-01-11 00:13:44'),(14,7,'Yvonne Trevino',113.00,1,'2025-01-11 00:13:44','2025-01-11 00:13:44'),(15,7,'William Stout',340.00,1,'2025-01-11 00:13:44','2025-01-11 00:13:44'),(16,8,'Orli Thompson',953.00,1,'2025-01-11 00:14:35','2025-01-11 00:14:35'),(17,8,'William Stout',340.00,1,'2025-01-11 00:14:35','2025-01-11 00:14:35'),(18,9,'Orli Thompson',953.00,1,'2025-01-11 00:18:46','2025-01-11 00:18:46'),(19,9,'William Stout',340.00,1,'2025-01-11 00:18:46','2025-01-11 00:18:46'),(20,10,'Orli Thompson',953.00,1,'2025-01-11 00:20:41','2025-01-11 00:20:41'),(21,10,'William Stout',340.00,1,'2025-01-11 00:20:41','2025-01-11 00:20:41'),(22,10,'Vincent Hebert',549.00,1,'2025-01-11 00:20:41','2025-01-11 00:20:41'),(23,11,'Orli Thompson',953.00,1,'2025-01-11 00:21:10','2025-01-11 00:21:10'),(24,11,'William Stout',340.00,1,'2025-01-11 00:21:10','2025-01-11 00:21:10'),(25,12,'kainin',150.00,1,'2025-01-11 00:24:07','2025-01-11 00:24:07'),(26,12,'Yvonne Trevino',113.00,1,'2025-01-11 00:24:07','2025-01-11 00:24:07'),(27,12,'William Stout',340.00,1,'2025-01-11 00:24:07','2025-01-11 00:24:07'),(28,12,'Orli Thompson',953.00,1,'2025-01-11 00:24:07','2025-01-11 00:24:07'),(29,13,'Yvonne Trevino',113.00,1,'2025-01-11 00:29:37','2025-01-11 00:29:37'),(30,14,'Orli Thompson',953.00,1,'2025-01-11 00:33:03','2025-01-11 00:33:03'),(31,14,'William Stout',340.00,1,'2025-01-11 00:33:03','2025-01-11 00:33:03'),(32,15,'William Stout',340.00,1,'2025-01-11 01:08:30','2025-01-11 01:08:30'),(33,16,'William Stout',340.00,16,'2025-01-11 23:53:06','2025-01-11 23:53:06'),(34,16,'Yvonne Trevino',113.00,14,'2025-01-11 23:53:06','2025-01-11 23:53:06'),(35,16,'Orli Thompson',953.00,17,'2025-01-11 23:53:06','2025-01-11 23:53:06'),(36,17,'Orli Thompson',953.00,2,'2025-01-11 23:59:47','2025-01-11 23:59:47'),(37,18,'Riley Rhodes',907.00,8,'2025-01-12 00:00:20','2025-01-12 00:00:20'),(38,19,'Riley Rhodes',907.00,4,'2025-01-12 00:00:30','2025-01-12 00:00:30'),(39,20,'Riley Rhodes',907.00,4,'2025-01-12 00:00:43','2025-01-12 00:00:43'),(40,21,'Riley Rhodes',907.00,4,'2025-01-12 00:01:42','2025-01-12 00:01:42'),(41,22,'Riley Rhodes',907.00,4,'2025-01-12 00:01:51','2025-01-12 00:01:51'),(42,23,'Riley Rhodes',907.00,4,'2025-01-12 00:03:42','2025-01-12 00:03:42'),(43,24,'Riley Rhodes',907.00,4,'2025-01-12 00:03:49','2025-01-12 00:03:49'),(44,25,'Riley Rhodes',907.00,4,'2025-01-12 00:05:00','2025-01-12 00:05:00'),(45,26,'Riley Rhodes',907.00,5,'2025-01-12 00:18:16','2025-01-12 00:18:16'),(46,27,'William Stout',340.00,3,'2025-01-12 00:19:46','2025-01-12 00:19:46'),(47,27,'Orli Thompson',953.00,2,'2025-01-12 00:19:46','2025-01-12 00:19:46'),(48,27,'Riley Rhodes',907.00,1,'2025-01-12 00:19:46','2025-01-12 00:19:46'),(49,28,'Orli Thompson',953.00,1,'2025-01-12 00:20:18','2025-01-12 00:20:18'),(50,28,'William Stout',340.00,1,'2025-01-12 00:20:18','2025-01-12 00:20:18'),(51,28,'Riley Rhodes',907.00,1,'2025-01-12 00:20:18','2025-01-12 00:20:18'),(52,28,'Vincent Hebert',549.00,1,'2025-01-12 00:20:18','2025-01-12 00:20:18'),(53,29,'Orli Thompson',953.00,2,'2025-01-12 00:20:48','2025-01-12 00:20:48'),(54,30,'Riley Rhodes',907.00,1,'2025-01-12 00:33:27','2025-01-12 00:33:27'),(55,30,'Vincent Hebert',549.00,1,'2025-01-12 00:33:27','2025-01-12 00:33:27'),(56,30,'Blake Barber',586.00,1,'2025-01-12 00:33:27','2025-01-12 00:33:27'),(57,30,'Joan Armstrong',695.00,1,'2025-01-12 00:33:27','2025-01-12 00:33:27'),(58,31,'William Stout',340.00,1,'2025-01-12 01:29:48','2025-01-12 01:29:48'),(59,31,'Yvonne Trevino',113.00,1,'2025-01-12 01:29:48','2025-01-12 01:29:48'),(60,31,'Kyle Macdonald',62.00,1,'2025-01-12 01:29:48','2025-01-12 01:29:48'),(61,31,'Vincent Hebert',549.00,1,'2025-01-12 01:29:48','2025-01-12 01:29:48'),(62,31,'Mallory Hoffman',518.00,1,'2025-01-12 01:29:48','2025-01-12 01:29:48'),(63,32,'William Stout',340.00,1,'2025-01-12 01:30:47','2025-01-12 01:30:47'),(64,33,'Orli Thompson',953.00,1,'2025-01-12 01:33:06','2025-01-12 01:33:06'),(65,34,'Yvonne Trevino',113.00,1,'2025-01-12 06:54:33','2025-01-12 06:54:33'),(66,35,'Yvonne Trevino',113.00,3,'2025-01-12 06:54:42','2025-01-12 06:54:42'),(67,36,'Orli Thompson',953.00,1,'2025-01-12 20:51:43','2025-01-12 20:51:43'),(68,36,'William Stout',340.00,1,'2025-01-12 20:51:43','2025-01-12 20:51:43'),(69,37,'Mango(Meduim)',65.00,1,'2025-01-12 22:35:05','2025-01-12 22:35:05'),(70,38,'Mango(Meduim)',65.00,1,'2025-01-12 22:35:17','2025-01-12 22:35:17'),(71,39,'Mango(Meduim)',65.00,2,'2025-01-12 22:35:45','2025-01-12 22:35:45'),(72,40,'Mango(Small)',50.00,5,'2025-01-12 23:34:26','2025-01-12 23:34:26'),(73,40,'Mango(Large)',80.00,4,'2025-01-12 23:34:26','2025-01-12 23:34:26'),(74,41,'Mango(Small)',50.00,2,'2025-01-13 05:35:38','2025-01-13 05:35:38'),(75,41,'Mango(Large)',80.00,1,'2025-01-13 05:35:38','2025-01-13 05:35:38'),(76,42,'Mango(Small)',50.00,2,'2025-01-13 05:43:47','2025-01-13 05:43:47'),(77,42,'Mango(Large)',80.00,1,'2025-01-13 05:43:47','2025-01-13 05:43:47'),(78,43,'Mango(Small)',50.00,1,'2025-01-15 02:57:39','2025-01-15 02:57:39'),(79,43,'Mango(Large)',80.00,1,'2025-01-15 02:57:39','2025-01-15 02:57:39');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'95725455','Quinlan Melendez','Commodi autem praese',490.00,NULL,338.10,'Cash','2025-01-10 23:59:34','2025-01-10 23:59:34'),(2,'70156616','Quinlan Melendez','Commodi autem praese',490.00,NULL,338.10,'Cash','2025-01-10 23:59:51','2025-01-10 23:59:51'),(3,'80670925','Zachery Levy','Quo illo ut modi ull',789.00,NULL,777.00,'Cash','2025-01-11 00:04:04','2025-01-11 00:04:04'),(4,'92802417','Hanna Barnes','Nobis cum labore ut',1860.00,NULL,1860.00,'Cash','2025-01-11 00:09:34','2025-01-11 00:09:34'),(5,'74647405','Yvonne Hensley','Corrupti possimus',603.00,NULL,603.00,'Cash','2025-01-11 00:11:11','2025-01-11 00:11:11'),(6,'40387357','Perry Jarvis','Mollit consectetur',603.00,NULL,0.00,'Cash','2025-01-11 00:13:34','2025-01-11 00:13:34'),(7,'59833163','Brenden Bell','Velit veniam dolor',603.00,NULL,0.00,'Cash','2025-01-11 00:13:44','2025-01-11 00:13:44'),(8,'31696491','Brian Ferguson','Qui aspernatur qui v',1293.00,NULL,1281.00,'Cash','2025-01-11 00:14:35','2025-01-11 00:14:35'),(9,'83684786','Hunter Gross','Harum enim aliquid e',1293.00,NULL,1293.00,'Cash','2025-01-11 00:18:46','2025-01-11 00:18:46'),(10,'15191311','Brynn Compton','Lorem impedit ex al',1842.00,NULL,1822.00,'Cash','2025-01-11 00:20:41','2025-01-11 00:20:41'),(11,'30998408','Scott Moran','Dolor ut vitae autem',1293.00,NULL,1273.00,'Cash','2025-01-11 00:21:10','2025-01-11 00:21:10'),(12,'98563847','Dominic Richardson','Dolore quas officiis',1556.00,NULL,1522.00,'Cash','2025-01-11 00:24:07','2025-01-11 00:24:07'),(13,'94499041','Arthur Stewart','Voluptate rerum odio',113.00,NULL,113.00,'Cash','2025-01-11 00:29:37','2025-01-11 00:29:37'),(14,'97451383','Virginia Cross','Et qui cumque labori',1293.00,NULL,1293.00,'Cash','2025-01-11 00:33:03','2025-01-11 00:33:03'),(15,'39312788','Alea Villarreal','Ut aut minus nemo et',340.00,NULL,340.00,'Cash','2025-01-11 01:08:30','2025-01-11 01:08:30'),(16,'74695703','Liberty Fowler','Aperiam velit assume',23223.00,NULL,23223.00,'Cash','2025-01-11 23:53:06','2025-01-11 23:53:06'),(17,'43233243','Gloria Hunt','Ex occaecat placeat',1906.00,NULL,0.00,'Cash','2025-01-11 23:59:47','2025-01-11 23:59:47'),(18,'96600466','Keegan Patrick','Rerum laborum iusto',7256.00,NULL,7256.00,'Cash','2025-01-12 00:00:20','2025-01-12 00:00:20'),(19,'41955083','Judith Lindsey','Ad ex vel minim haru',3628.00,NULL,3628.00,'Cash','2025-01-12 00:00:30','2025-01-12 00:00:30'),(20,'82016060','Dawn Hammond','Veritatis magna quia',3628.00,NULL,3628.00,'Cash','2025-01-12 00:00:43','2025-01-12 00:00:43'),(21,'61057057','Joseph Calhoun','Ut voluptatem placea',3628.00,NULL,3628.00,'Cash','2025-01-12 00:01:42','2025-01-12 00:01:42'),(22,'55388252','Lillith Daugherty','Tempore velit nesc',3628.00,NULL,3628.00,'Cash','2025-01-12 00:01:51','2025-01-12 00:01:51'),(23,'25219605','Lee Swanson','Ut laborum Recusand',3628.00,NULL,3628.00,'Cash','2025-01-12 00:03:42','2025-01-12 00:03:42'),(24,'25018371','Rhoda Acevedo','In laboriosam in qu',3628.00,NULL,3628.00,'Cash','2025-01-12 00:03:49','2025-01-12 00:03:49'),(25,'76381628','Lacey Cox','Error labore totam d',3628.00,NULL,3628.00,'Cash','2025-01-12 00:05:00','2025-01-12 00:05:00'),(26,'81304189','Germaine Mccarthy','Possimus hic et nos',4535.00,NULL,4535.00,'Cash','2025-01-12 00:18:16','2025-01-12 00:18:16'),(27,'69617518','Lev Gomez','Quis id quaerat ipsu',3833.00,NULL,3066.40,'Cash','2025-01-12 00:19:46','2025-01-12 00:19:46'),(28,'12849946','Shaeleigh Collins','Aut laborum Ut numq',2749.00,NULL,2719.00,'Cash','2025-01-12 00:20:18','2025-01-12 00:20:18'),(29,'84305672','Stone Hart','Commodi in accusanti',1906.00,NULL,1906.00,'Cash','2025-01-12 00:20:48','2025-01-12 00:20:48'),(30,'82289054','Knox Hill','Sint ullam dolorem o',2737.00,NULL,2737.00,'Cash','2025-01-12 00:33:27','2025-01-12 00:33:27'),(31,'36408706','Thane Turner','Ullamco magni non se',1582.00,NULL,1382.00,'Cash','2025-01-12 01:29:48','2025-01-12 01:29:48'),(32,'24832373','Lucas Fields','Consectetur et cons',340.00,100.00,240.00,'Cash','2025-01-12 01:30:47','2025-01-12 01:30:47'),(33,'59375157','Logan Greer','Quo et exercitation',953.00,190.60,762.40,'Cash','2025-01-12 01:33:06','2025-01-12 01:33:06'),(34,'59527534','Piper Rios','Sint vel suscipit l',113.00,0.00,113.00,'Cash','2025-01-12 06:54:33','2025-01-12 06:54:33'),(35,'60536426','Noah Shelton','Et qui ad sit ab dol',339.00,0.00,339.00,'Cash','2025-01-12 06:54:42','2025-01-12 06:54:42'),(36,'52963802','Jolie Wheeler','At eveniet temporib',1293.00,200.00,1093.00,'Cash','2025-01-12 20:51:43','2025-01-12 20:51:43'),(37,'90710371','Cyrus Compton','Dolores dignissimos',65.00,6.50,58.50,'Cash','2025-01-12 22:35:05','2025-01-12 22:35:05'),(38,'44567964','Skyler Brewer','Vero qui ut architec',65.00,6.50,58.50,'Cash','2025-01-12 22:35:17','2025-01-12 22:35:17'),(39,'40448845','Imelda Carter','Excepturi dolorum ea',130.00,26.00,104.00,'Cash','2025-01-12 22:35:45','2025-01-12 22:35:45'),(40,'23245862','Zelenia Larsen','Esse odit quos est i',570.00,285.00,285.00,'Cash','2025-01-12 23:34:26','2025-01-12 23:34:26'),(41,'98027722','Kiona Blackburn','Quo enim et quis vol',180.00,36.00,144.00,'Cash','2025-01-13 05:35:38','2025-01-13 05:35:38'),(42,'25475574','KUPAL','lakas makahingi ng discount',180.00,100.00,80.00,'Cash','2025-01-13 05:43:47','2025-01-13 05:43:47'),(43,'77106804','Cassidy Powell','Maxime minima aut de',130.00,13.00,117.00,'Cash','2025-01-15 02:57:39','2025-01-15 02:57:39');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (20,'Mango(Small)','Mango(Small)',50.00,95,'Fruit Shake','2025-01-12 20:56:20','2025-01-15 02:57:39'),(21,'Mango(Large)','Mango(Large)',80.00,93,'Fruit Shake','2025-01-12 20:57:05','2025-01-15 02:57:39'),(22,'Mango(Meduim)','Mango(Meduim)',65.00,96,'Fruit Shake','2025-01-12 20:58:07','2025-01-12 22:35:45'),(23,'Nata','Nata',25.00,100,'Add Ons','2025-01-12 20:58:36','2025-01-12 20:58:36'),(24,'Pearl','Pearl',25.00,100,'Add Ons','2025-01-12 20:58:59','2025-01-12 20:58:59'),(25,'Oreo','Oreo',25.00,100,'Add Ons','2025-01-12 20:59:24','2025-01-12 20:59:24'),(26,'Strawberry(Small)','Strawberry(Small)',50.00,105,'Fruit Shake','2025-01-12 23:36:19','2025-01-12 23:36:45');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'superadmin',NULL,'2025-01-07 23:04:17','2025-01-07 23:04:17'),(2,'admin',NULL,'2025-01-07 23:04:17','2025-01-07 23:04:17'),(3,'staff',NULL,'2025-01-07 23:04:17','2025-01-07 23:04:17');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('ay5fm9Ihjvb51D6VOYWiNbAxXiifxkBTlue6kwAB',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNVRKbEo2Yk1xRWhSTWlRSm4yanJrVjNROU13cGV6Y3hxNXUyVURPdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdGFmZi9yZWNlaXB0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyNjoiNHlUbFRES3Uzb0pPZnpEX2NhcnRfaXRlbXMiO2E6MDp7fX0=',1736938954);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_logs`
--

DROP TABLE IF EXISTS `stock_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `added_stock` int NOT NULL,
  `previous_stock` int DEFAULT NULL,
  `new_stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_logs_product_id_foreign` (`product_id`),
  CONSTRAINT `stock_logs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_logs`
--

LOCK TABLES `stock_logs` WRITE;
/*!40000 ALTER TABLE `stock_logs` DISABLE KEYS */;
INSERT INTO `stock_logs` VALUES (6,26,5,100,105,'2025-01-12 23:36:45','2025-01-12 23:36:45'),(7,20,5,95,100,'2025-01-13 05:25:26','2025-01-13 05:25:26');
/*!40000 ALTER TABLE `stock_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Super Admin','superadmin@superadmin.com',NULL,'$2y$12$jmztXdXsCd.Bcipi0.bQE.14jW00K6nvYra0EKBYdkBdxFFR1.cFa',NULL,'2025-01-07 23:08:52','2025-01-07 23:08:52'),(2,2,'Admin User','admin@admin.com',NULL,'$2y$12$WwziLA9Uyyn3qQd2G5RyXu2vk83D6ZqleubIT5b/owtyh/Vo1dZly',NULL,'2025-01-07 23:08:53','2025-01-07 23:08:53'),(9,3,'Staff Name','staff@example.com',NULL,'$2y$12$FbfqWX0I7Chboen8xCSTmOrcTsgJoT4JdLKHcU5j6PTIpNAa2ATDm',NULL,'2025-01-09 23:41:14','2025-01-10 00:03:30'),(11,3,'Vivien Blair','bomupav@mailinator.com',NULL,'$2y$12$9g6BeZQ9HSeM8/nUOnxYKu4YlO0j38IMBUbpLhOX7AdpCu8dPnljW',NULL,'2025-01-09 23:43:09','2025-01-09 23:43:09'),(13,3,'Ivan Key','mazu@mailinator.com',NULL,'$2y$12$X2109nt0CRccYkJYW6kc7u8v8O7D2g4FM3LQV3tdNRjnHb7Gr/bY6',NULL,'2025-01-09 23:43:51','2025-01-09 23:43:51'),(14,3,'Cha','staff@staff.com',NULL,'$2y$12$aXsqVPNBYRQXS6/3hybkBe36cZKg.lZKSqzXFa5Go/xsNawrAU1Om',NULL,'2025-01-09 23:44:12','2025-01-15 02:12:29'),(15,3,'Summer Reed','rekyziki@mailinator.com',NULL,'$2y$12$.VfQChegnA.FH1eMG1RPv.c8MWC.ZsqP7zhAj89ue.RIQeMbBarHG',NULL,'2025-01-09 23:53:38','2025-01-09 23:53:38'),(16,3,'AJ Rempis','josselrempis02@gmail.com',NULL,'$2y$12$rcNNXNwwt2rgdYy3ynsSKewnB5TA8hZuXgBswV5NFfR9y/GlTQrOi',NULL,'2025-01-12 23:38:27','2025-01-12 23:38:27');
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

-- Dump completed on 2025-01-15 19:03:59
