-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: zavrsni
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,'Testiranje','2021-05-13 21:29:03','2021-05-13 21:29:03'),(3,'Testiranje 2','2021-05-14 11:52:24','2021-05-14 11:52:24'),(4,'Testiranje 3','2021-05-16 16:35:51','2021-05-16 16:35:51'),(5,'Nova cjelina','2021-05-20 06:24:56','2021-05-20 06:24:56');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_level`
--

DROP TABLE IF EXISTS `level_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `level_level` (
  `level_1` bigint unsigned DEFAULT NULL,
  `level_0` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `level_level_level_1_foreign` (`level_1`),
  KEY `level_level_level_0_foreign` (`level_0`),
  CONSTRAINT `level_level_level_0_foreign` FOREIGN KEY (`level_0`) REFERENCES `levels` (`id`),
  CONSTRAINT `level_level_level_1_foreign` FOREIGN KEY (`level_1`) REFERENCES `levels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_level`
--

LOCK TABLES `level_level` WRITE;
/*!40000 ALTER TABLE `level_level` DISABLE KEYS */;
INSERT INTO `level_level` VALUES (5,1,NULL,NULL),(5,2,NULL,NULL),(6,3,NULL,NULL),(6,4,NULL,NULL),(7,5,NULL,NULL),(7,6,NULL,NULL),(14,12,'2021-05-16 16:37:03','2021-05-16 16:37:03'),(14,13,'2021-05-16 16:37:03','2021-05-16 16:37:03'),(17,15,'2021-05-20 06:25:38','2021-05-20 06:25:38'),(17,16,'2021-05-20 06:25:38','2021-05-20 06:25:38');
/*!40000 ALTER TABLE `level_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lesson` bigint unsigned NOT NULL,
  `complexity` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `levels_id_lesson_foreign` (`id_lesson`),
  CONSTRAINT `levels_id_lesson_foreign` FOREIGN KEY (`id_lesson`) REFERENCES `lessons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Level 1',1,0,'2021-05-13 21:29:13','2021-05-13 21:29:13'),(2,'Level 2',1,0,'2021-05-13 21:31:23','2021-05-13 21:31:23'),(3,'Level 3',1,0,'2021-05-13 21:33:07','2021-05-13 21:33:07'),(4,'Level 4',1,0,'2021-05-13 21:34:41','2021-05-13 21:34:41'),(5,'Level 5',1,1,'2021-05-13 21:36:43','2021-05-13 21:36:43'),(6,'Level 6',1,1,'2021-05-13 21:39:11','2021-05-13 21:39:11'),(7,'Level 7',1,1,'2021-05-13 21:42:13','2021-05-13 21:42:13'),(11,'Jednostavan 1',3,0,'2021-05-14 11:52:33','2021-05-14 11:52:33'),(12,'Level 1',4,0,'2021-05-16 16:36:04','2021-05-16 16:36:04'),(13,'Level 2',4,0,'2021-05-16 16:36:53','2021-05-16 16:36:53'),(14,'Level 3',4,1,'2021-05-16 16:37:02','2021-05-16 16:37:02'),(15,'1. Level',5,0,'2021-05-20 06:25:09','2021-05-20 06:25:09'),(16,'2. Level',5,0,'2021-05-20 06:25:24','2021-05-20 06:25:24'),(17,'3. Level',5,1,'2021-05-20 06:25:37','2021-05-20 06:25:37');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (125,'2014_10_12_000000_create_users_table',1),(126,'2014_10_12_100000_create_password_resets_table',1),(127,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(128,'2019_08_19_000000_create_failed_jobs_table',1),(129,'2019_12_14_000001_create_personal_access_tokens_table',1),(130,'2021_03_22_181443_create_sessions_table',1),(131,'2021_03_25_154622_create_lessons_table',1),(132,'2021_03_25_154827_create_levels_table',1),(133,'2021_03_25_155458_create_tasks_table',1),(134,'2021_03_25_155606_create_user_tasks_table',1),(135,'2021_03_30_151629_create_level_level_table',1),(136,'2021_05_12_103007_create_user_answered_tasks_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
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
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('1Ou1jx7cHxqYB983H7EWh1EdO3CeahbbmlHcnqt7',NULL,'192.168.10.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiY0tQQkVRQWxLdWppTTZwckhFQjZVRUVlRXlkbTByOFNFSUxtRmNHdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1621519891),('NNQ78PfXIeran0ZGLy2ys7hMXgrx8kTextap0FUj',17,'192.168.10.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoicWVmdkh2NEZyRFo4MG96V1F4MkRxUHNxYTBiN2NuQ1BFcTJwenRHYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9ob21lc3RlYWQudGVzdC90YXNrcy9kZWxldGUvMjciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEVqNTR0YmtsY283NUVnTXNnY3JUbmVhb1VvOVRjMHBnVTBtQUVsMGt4RmJUa21wWmNaWGZxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRFajU0dGJrbGNvNzVFZ01zZ2NyVG5lYW9VbzlUYzBwZ1UwbUFFbDBreEZiVGttcFpjWlhmcSI7czo5OiJpZF9sZXNzb24iO3M6MToiNSI7czo4OiJpZF9sZXZlbCI7czoyOiIxNyI7fQ==',1621526763);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bodyText` longtext COLLATE utf8mb4_unicode_ci,
  `bodyImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thirdAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourthAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci,
  `bodyImageInstructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_level_foreign` (`level`),
  CONSTRAINT `tasks_level_foreign` FOREIGN KEY (`level`) REFERENCES `levels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'1','1) Izračunaj: 1 + 2 = ?',NULL,'3','x','x','x','1','1+ 2 = 3',NULL,1,'2021-05-13 21:30:01','2021-05-13 21:30:01'),(2,'2','2) Izračunaj: 3 + 4 = ?',NULL,'x','7','x','x','2','3 + 4 = 7',NULL,1,'2021-05-13 21:30:33','2021-05-13 21:30:33'),(3,'3','3) Izračunaj: 1 + 5 = ?',NULL,'x','x','x','6','4','1 + 5 = 6',NULL,1,'2021-05-13 21:31:06','2021-05-13 21:31:06'),(4,'4','4) Izračunaj: 1 - 5 = ?',NULL,'x','-4','x','x','2','1 - 5 = -4',NULL,2,'2021-05-13 21:31:56','2021-05-13 21:31:56'),(5,'5','5)  Izračunaj: 7 - 2 = ?',NULL,'x','x','5','x','3','7 - 2 = 5',NULL,2,'2021-05-13 21:32:24','2021-05-13 21:32:24'),(6,'6','6) Izračunaj: 10 - 6 = ?',NULL,'4','x','x','x','1','10 - 6 = 4',NULL,2,'2021-05-13 21:32:56','2021-05-13 21:32:56'),(7,'7','7) Izračunaj: 7 * 2 = ?',NULL,'x','14','x','x','2','7 * 2 = 14',NULL,3,'2021-05-13 21:33:35','2021-05-13 21:33:35'),(8,'8','8) Izračunaj: 5 * 3 = ?',NULL,'15','x','x','x','1','5 * 3 = 15',NULL,3,'2021-05-13 21:34:02','2021-05-13 21:34:02'),(9,'9','9) Izračunaj: 3 * 4 = ?',NULL,'x','x','x','12','4','3 * 4 = 12',NULL,3,'2021-05-13 21:34:30','2021-05-13 21:34:30'),(10,'10','10) Izračunaj: 8/2 = ?',NULL,'x','x','4','x','3','8 / 2 = 4',NULL,4,'2021-05-13 21:35:16','2021-05-13 21:35:16'),(11,'11','11) Izračunaj: 16 / 2 = ?',NULL,'8','x','x','x','1','16 / 2 = 8',NULL,4,'2021-05-13 21:35:53','2021-05-13 21:35:53'),(12,'12','12) Izračunaj: 6 / 3 = ?',NULL,'x','x','x','2','4','6 / 3 = 2',NULL,4,'2021-05-13 21:36:27','2021-05-13 21:36:27'),(13,'13','13) Izračunaj: 7 - 2 + 5 = ?',NULL,'x','10','x','x','2','7 - 2 = 5 + 5 = 10',NULL,5,'2021-05-13 21:37:35','2021-05-13 21:37:35'),(14,'14','14) Izračunaj: 1 + 4 - 2 = ?',NULL,'x','x','3','x','3','1 + 4 = 5 - 2 = 3',NULL,5,'2021-05-13 21:38:24','2021-05-13 21:38:24'),(15,'15','15) Izračunaj: 10 - 4 + 1 = ?',NULL,'x','x','x','7','4','10 - 4 = 6 + 1 = 7',NULL,5,'2021-05-13 21:38:52','2021-05-13 21:38:52'),(16,'16','16) Izračunaj: 1 * 4 / 2 = ?',NULL,'x','2','x','x','2','1 * 4 = 4 / 2 = 2',NULL,6,'2021-05-13 21:40:32','2021-05-13 21:40:32'),(17,'17','17 ) Izračunaj: 5 * 5 / 1 = ?',NULL,'x','x','25','x','3','5 * 5 = 25 / 1 = 25',NULL,6,'2021-05-13 21:41:18','2021-05-13 21:41:18'),(18,'18','18) Izračunaj: 0 * 1 / 2 = ?',NULL,'x','x','x','0','4','0 * x = 0',NULL,6,'2021-05-13 21:42:00','2021-05-13 21:42:00'),(19,'19','19) Izračunaj: [(1 + 4) * (3 - 1)] / 2 = ?',NULL,'x','5','x','x','2','1 + 4 = 5\r\n3 - 1 = 2\r\n5 * 2 = 10\r\n10 / 2 = 5',NULL,7,'2021-05-13 21:43:53','2021-05-13 21:43:53'),(20,'20','20) Izračunaj: [(2 + 6) * (2 - 1)] / 4 = ?',NULL,'x','x','x','2','4','2 + 6 = 8\r\n2 - 1 = 1\r\n8 * 1 = 8\r\n8 / 4 = 2',NULL,7,'2021-05-13 21:45:04','2021-05-13 21:45:04'),(21,'21','21)  Izračunaj: [(7 + 3) * (1 - 2)] / 2 = ?','images/tasks/task21','x','x','x','-5','4','7 + 3 = 10\r\n1 - 2 = -1\r\n10 * -1 = -10\r\n-10 / 2 = -5','images/instructions/instructions21',7,'2021-05-13 21:47:35','2021-05-13 21:47:35'),(22,'1.','da',NULL,'da','a','a','a','1','da',NULL,15,'2021-05-20 06:25:58','2021-05-20 06:25:58'),(23,'2.',NULL,'images/tasks/task23','da','a','a','a','1','da',NULL,15,'2021-05-20 06:26:25','2021-05-20 06:26:25'),(24,'3.','fafafa',NULL,'da','a','a','a','1','da',NULL,16,'2021-05-20 06:26:54','2021-05-20 06:26:54'),(25,'4.','ghgzjzwe',NULL,'aa','da','a','a','2','da',NULL,16,'2021-05-20 06:27:15','2021-05-20 06:27:15'),(26,'5.','hgjnvncvb',NULL,'a','a','da','a','3','da',NULL,17,'2021-05-20 06:27:44','2021-05-20 06:27:44'),(27,'6.','dfgdfgdf',NULL,'aa','a','da','a','3','da',NULL,17,'2021-05-20 06:28:01','2021-05-20 06:28:01');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_answered_tasks`
--

DROP TABLE IF EXISTS `user_answered_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_answered_tasks` (
  `id_user` bigint unsigned NOT NULL,
  `id_answered_task` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `user_answered_tasks_id_user_foreign` (`id_user`),
  KEY `user_answered_tasks_id_answered_task_foreign` (`id_answered_task`),
  CONSTRAINT `user_answered_tasks_id_answered_task_foreign` FOREIGN KEY (`id_answered_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `user_answered_tasks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_answered_tasks`
--

LOCK TABLES `user_answered_tasks` WRITE;
/*!40000 ALTER TABLE `user_answered_tasks` DISABLE KEYS */;
INSERT INTO `user_answered_tasks` VALUES (1,3,'2021-05-14 11:35:03','2021-05-14 11:35:03'),(1,1,'2021-05-14 11:35:06','2021-05-14 11:35:06'),(1,4,'2021-05-14 11:35:09','2021-05-14 11:35:09'),(1,5,'2021-05-14 11:35:12','2021-05-14 11:35:12'),(1,8,'2021-05-14 11:35:19','2021-05-14 11:35:19'),(1,9,'2021-05-14 11:35:30','2021-05-14 11:35:30'),(1,7,'2021-05-14 11:35:33','2021-05-14 11:35:33'),(1,10,'2021-05-14 11:35:36','2021-05-14 11:35:36'),(1,12,'2021-05-14 11:35:39','2021-05-14 11:35:39'),(1,15,'2021-05-14 11:35:47','2021-05-14 11:35:47'),(1,13,'2021-05-14 11:35:50','2021-05-14 11:35:50'),(1,16,'2021-05-14 11:35:55','2021-05-14 11:35:55'),(1,17,'2021-05-14 11:36:18','2021-05-14 11:36:18'),(1,21,'2021-05-14 11:36:27','2021-05-14 11:36:27'),(1,19,'2021-05-14 11:36:31','2021-05-14 11:36:31'),(1,20,'2021-05-14 11:47:40','2021-05-14 11:47:40'),(1,22,'2021-05-20 06:28:13','2021-05-20 06:28:13'),(1,23,'2021-05-20 06:28:18','2021-05-20 06:28:18'),(1,25,'2021-05-20 06:28:22','2021-05-20 06:28:22'),(1,24,'2021-05-20 06:28:26','2021-05-20 06:28:26'),(1,26,'2021-05-20 06:28:30','2021-05-20 06:28:30'),(1,27,'2021-05-20 06:28:34','2021-05-20 06:28:34');
/*!40000 ALTER TABLE `user_answered_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tasks`
--

DROP TABLE IF EXISTS `user_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tasks` (
  `id_user` bigint unsigned NOT NULL,
  `id_task` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `user_tasks_id_user_foreign` (`id_user`),
  KEY `user_tasks_id_task_foreign` (`id_task`),
  CONSTRAINT `user_tasks_id_task_foreign` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`),
  CONSTRAINT `user_tasks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tasks`
--

LOCK TABLES `user_tasks` WRITE;
/*!40000 ALTER TABLE `user_tasks` DISABLE KEYS */;
INSERT INTO `user_tasks` VALUES (1,3,'2021-05-14 11:35:03','2021-05-14 11:35:03'),(1,1,'2021-05-14 11:35:06','2021-05-14 11:35:06'),(1,4,'2021-05-14 11:35:09','2021-05-14 11:35:09'),(1,5,'2021-05-14 11:35:12','2021-05-14 11:35:12'),(1,8,'2021-05-14 11:36:05','2021-05-14 11:36:05'),(1,9,'2021-05-14 11:36:08','2021-05-14 11:36:08'),(1,12,'2021-05-14 11:36:10','2021-05-14 11:36:10'),(1,10,'2021-05-14 11:36:13','2021-05-14 11:36:13'),(1,22,'2021-05-20 06:28:13','2021-05-20 06:28:13'),(1,23,'2021-05-20 06:28:18','2021-05-20 06:28:18'),(1,25,'2021-05-20 06:28:22','2021-05-20 06:28:22'),(1,24,'2021-05-20 06:28:26','2021-05-20 06:28:26'),(1,26,'2021-05-20 06:28:30','2021-05-20 06:28:30'),(1,27,'2021-05-20 06:28:34','2021-05-20 06:28:34');
/*!40000 ALTER TABLE `user_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','admin','2021-05-20 14:27:37','$2y$10$4lWVEhfMyaQmpC0YUaiziu3bLhUeRZqcTxYSQoF4/L9BbZKkpnUMS',NULL,NULL,NULL,NULL,NULL,'2021-05-13 21:23:53','2021-05-20 14:27:37'),(9,'Hana','hana@example.com','user','2021-05-16 18:01:06','$2y$10$pnHRJWOVn2aXadII/BNIourUfsDPF1nCShqXKGWmtaLjFtmLK2PFG',NULL,NULL,NULL,NULL,NULL,'2021-05-16 17:51:37','2021-05-16 18:01:06'),(17,'Hana','lergahana@gmail.com','admin','2021-05-20 15:32:25','$2y$10$Ej54tbklco75EgMsgcrTneaoUo9Tc0pgU0mAEl0kxFbTkmpZcZXfq',NULL,NULL,NULL,NULL,NULL,'2021-05-20 15:18:08','2021-05-20 15:32:25');
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

-- Dump completed on 2021-05-20 16:20:11
