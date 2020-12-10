-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: imdb
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `activitylogs`
--

DROP TABLE IF EXISTS `activitylogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitylogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitylogs`
--

LOCK TABLES `activitylogs` WRITE;
/*!40000 ALTER TABLE `activitylogs` DISABLE KEYS */;
INSERT INTO `activitylogs` VALUES (1,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 07:58:29','2020-12-10 07:58:29'),(2,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 08:03:48','2020-12-10 08:03:48'),(3,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 08:04:08','2020-12-10 08:04:08'),(4,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 08:04:16','2020-12-10 08:04:16'),(5,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Login','2020-12-10 08:04:47','2020-12-10 08:04:47'),(6,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Logout','2020-12-10 08:04:56','2020-12-10 08:04:56'),(7,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Login','2020-12-10 08:18:23','2020-12-10 08:18:23'),(8,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Logout','2020-12-10 08:27:07','2020-12-10 08:27:07'),(9,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 08:27:12','2020-12-10 08:27:12'),(10,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 08:30:29','2020-12-10 08:30:29'),(11,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Login','2020-12-10 08:32:26','2020-12-10 08:32:26'),(12,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Logout','2020-12-10 08:33:09','2020-12-10 08:33:09'),(13,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 08:33:14','2020-12-10 08:33:14'),(14,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 08:34:08','2020-12-10 08:34:08'),(15,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Login','2020-12-10 08:55:31','2020-12-10 08:55:31'),(16,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Logout','2020-12-10 08:58:34','2020-12-10 08:58:34'),(17,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 08:58:39','2020-12-10 08:58:39'),(18,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 09:00:34','2020-12-10 09:00:34'),(19,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Login','2020-12-10 09:00:40','2020-12-10 09:00:40'),(20,'ekagabo17@alustudent.com','Chrome','127.0.0.1','Logout','2020-12-10 09:02:34','2020-12-10 09:02:34'),(21,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 09:02:40','2020-12-10 09:02:40'),(22,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 09:05:14','2020-12-10 09:05:14'),(23,'pharmacist@gmail.com','Chrome','127.0.0.1','Login','2020-12-10 10:35:48','2020-12-10 10:35:48'),(24,'pharmacist@gmail.com','Chrome','127.0.0.1','Logout','2020-12-10 10:35:52','2020-12-10 10:35:52');
/*!40000 ALTER TABLE `activitylogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0: Pending, 1: Active, 2: Revoked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medicine_qty_unique` (`qty`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicines`
--

LOCK TABLES `medicines` WRITE;
/*!40000 ALTER TABLE `medicines` DISABLE KEYS */;
INSERT INTO `medicines` VALUES (1,'Adderall','200','Adderall contains a combination of amphetamine and dextroamphetamine. Amphetamine and dextroamphetamine are central nervous system stimulants that affect chemicals in the brain and nerves that contribute to hyperactivity and impulse control.','Pakistan','0','2020-12-09 07:44:42','2020-12-09 07:44:42','1607507082.jpg'),(2,'Imbruvica','20','Imbruvica (ibrutinib) is a cancer medicine that interferes with the growth and spread of cancer cells in the body.\r\n\r\nImbruvica is used to treat mantle cell lymphoma, marginal zone lymphoma, Wal','Rwanda','1','2020-12-09 09:58:55','2020-12-09 09:58:55','1607515135.jpg');
/*!40000 ALTER TABLE `medicines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_12_08_133357_create_medicine_table',1),(5,'2020_12_09_084053_add_picture_to_medicine_table',2),(6,'2020_12_10_094954_create_activitylogs_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0: Pending, 1: Active, 2: Revoked',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1: Pharmacist, 99: Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Elie Kagabo',NULL,'ekagabo17@alustudent.com',NULL,'$2y$10$CbPc10ILEOEUgfiPWtaiZe7GEcyXq3icrdvuqAPv1TMcXBb6Ukwei','1','99',NULL,'2020-12-08 11:42:12','2020-12-08 11:42:12'),(2,'Regis Ishimwe',NULL,'rishimwe17@alustudent.com',NULL,'$2y$10$UrPtYR9v/fP.ToH7G96QC.Twmug596REmknG1nX/Hy58LQjbWNA1W','0','99',NULL,'2020-12-08 11:51:38','2020-12-08 11:51:38'),(3,'Imana Irikumwe','Male','admin@gmail.com',NULL,'$2y$10$bZyD/aEAFTbC7nDe23HSYe02NdDuKmKO/v76JSizf4nPfoZChCOf6','1','99',NULL,'2020-12-09 14:48:47','2020-12-09 14:48:47'),(4,'Elijah Gash','Female','pharmacist@gmail.com',NULL,'$2y$10$ifiwfhJoJF/k0wUwtluelOl3.gYDjOvFwnyh/Yb9gv4MDrLsmQHh2','1','1',NULL,'2020-12-09 15:01:52','2020-12-09 15:01:52'),(6,'Pharmacist 2','Male','pharmacist2@gmail.com',NULL,'$2y$10$hllHDkN/tpZ6q7XLy3tC5OcydkD8ZXRsAUJg04SLaSnmLeDCqPK4i','1','1',NULL,'2020-12-09 15:28:26','2020-12-09 15:28:26');
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

-- Dump completed on 2020-12-10 15:20:29
