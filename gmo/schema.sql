-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gmo
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
-- Table structure for table `customer_agency`
--

DROP TABLE IF EXISTS `customer_agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_agency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `agency_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `customer_agency_customer_id_foreign` (`customer_id`),
  KEY `customer_agency_agency_id_foreign` (`agency_id`),
  CONSTRAINT `customer_agency_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `entrepreneurs` (`user_id`),
  CONSTRAINT `customer_agency_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `entrepreneurs` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_agency`
--

LOCK TABLES `customer_agency` WRITE;
/*!40000 ALTER TABLE `customer_agency` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domestic_certificate_request_examples`
--

DROP TABLE IF EXISTS `domestic_certificate_request_examples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domestic_certificate_request_examples` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domestic_certificate_request_id` int(10) unsigned NOT NULL,
  `plant_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plant_name_eng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plant_name_sci` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cert_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `export_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `export_qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `export_val` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `dcre_do_cert_req_id` (`domestic_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domestic_certificate_request_examples`
--

LOCK TABLES `domestic_certificate_request_examples` WRITE;
/*!40000 ALTER TABLE `domestic_certificate_request_examples` DISABLE KEYS */;
/*!40000 ALTER TABLE `domestic_certificate_request_examples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domestic_certificate_request_forms`
--

DROP TABLE IF EXISTS `domestic_certificate_request_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domestic_certificate_request_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domestic_certificate_request_id` int(10) unsigned NOT NULL,
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_th2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_en2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dcrf_do_cert_req_id` (`domestic_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domestic_certificate_request_forms`
--

LOCK TABLES `domestic_certificate_request_forms` WRITE;
/*!40000 ALTER TABLE `domestic_certificate_request_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `domestic_certificate_request_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domestic_certificate_requests`
--

DROP TABLE IF EXISTS `domestic_certificate_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domestic_certificate_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `signer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `domestic_certificate_request_reference_id_unique` (`reference_id`),
  KEY `domestic_certificate_requests_owner_id_foreign` (`owner_id`),
  KEY `domestic_certificate_requests_signer_id_foreign` (`signer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domestic_certificate_requests`
--

LOCK TABLES `domestic_certificate_requests` WRITE;
/*!40000 ALTER TABLE `domestic_certificate_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `domestic_certificate_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrepreneurs`
--

DROP TABLE IF EXISTS `entrepreneurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrepreneurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `is_agency` tinyint(1) NOT NULL,
  `is_company` tinyint(1) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address1` text COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entrepreneurs_user_id_foreign` (`user_id`),
  CONSTRAINT `entrepreneurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrepreneurs`
--

LOCK TABLES `entrepreneurs` WRITE;
/*!40000 ALTER TABLE `entrepreneurs` DISABLE KEYS */;
INSERT INTO `entrepreneurs` VALUES (20,1,0,0,'Wolfgang','Gangwolf','M','Thai','1987-11-11','123/45 Happy Meal, McDonalds, Starbuckss, Starbucks','Carbonara, The Pizza Company, 11111','Lat Yao','Thailand','wolfgang@gangwolf.co.th','02-345-6789','02-345-6790','087-654-3210','Bangkok','11111','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,2,1,0,'Wolfgang2','Gangwolf2','M','Thai','1987-11-11','123/45 Happy Meal, McDonalds, Starbuckss, Starbucks','Carbonara, The Pizza Company, 11111','Lat Yao','Thailand','wolfgang@gangwolf.co.th','02-345-6789','02-345-6790','087-654-3210','Bangkok','11111','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `entrepreneurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificate_request_examples`
--

DROP TABLE IF EXISTS `export_certificate_request_examples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificate_request_examples` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `export_certificate_request_form_id` int(10) unsigned NOT NULL,
  `type_of_example` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ecte_ex_cert_req_form_id` (`export_certificate_request_form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificate_request_examples`
--

LOCK TABLES `export_certificate_request_examples` WRITE;
/*!40000 ALTER TABLE `export_certificate_request_examples` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificate_request_examples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificate_request_forms`
--

DROP TABLE IF EXISTS `export_certificate_request_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificate_request_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `export_certificate_request_id` int(10) unsigned NOT NULL,
  `manufactory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufactory_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `warehouse_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purposes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin_of_plant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ecrf_ex_cert_req_id` (`export_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificate_request_forms`
--

LOCK TABLES `export_certificate_request_forms` WRITE;
/*!40000 ALTER TABLE `export_certificate_request_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificate_request_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificate_request_info_forms`
--

DROP TABLE IF EXISTS `export_certificate_request_info_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificate_request_info_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `export_certificate_request_id` int(10) unsigned NOT NULL,
  `common_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_or_consignee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_of_product` text COLLATE utf8_unicode_ci NOT NULL,
  `final_destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port_of_entry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ecrif_ex_cert_req_id_ecr` (`export_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificate_request_info_forms`
--

LOCK TABLES `export_certificate_request_info_forms` WRITE;
/*!40000 ALTER TABLE `export_certificate_request_info_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificate_request_info_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificate_requests`
--

DROP TABLE IF EXISTS `export_certificate_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificate_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner_id` int(10) unsigned NOT NULL,
  `signer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `export_certificate_requests_reference_id_unique` (`reference_id`),
  KEY `export_certificate_requests_owner_id_foreign` (`owner_id`),
  KEY `export_certificate_requests_signer_id_foreign` (`signer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificate_requests`
--

LOCK TABLES `export_certificate_requests` WRITE;
/*!40000 ALTER TABLE `export_certificate_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificate_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificate_tests`
--

DROP TABLE IF EXISTS `export_certificate_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificate_tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `export_certificate_id` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ect_ex_cert_id_ec` (`export_certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificate_tests`
--

LOCK TABLES `export_certificate_tests` WRITE;
/*!40000 ALTER TABLE `export_certificate_tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificate_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_certificates`
--

DROP TABLE IF EXISTS `export_certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_certificates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `export_certificate_request_id` int(10) unsigned NOT NULL,
  `sample_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conclusion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_certificate` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `export_certificates_reference_id_unique` (`reference_id`),
  KEY `export_certificates_export_certificate_request_id_foreign` (`export_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_certificates`
--

LOCK TABLES `export_certificates` WRITE;
/*!40000 ALTER TABLE `export_certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `request_reference_id` int(10) unsigned NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_reference_id_unique` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_task_assignments`
--

DROP TABLE IF EXISTS `lab_task_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_task_assignments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lab_task_id` int(10) unsigned NOT NULL,
  `assignee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lta_lab_task_id_lt` (`lab_task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_task_assignments`
--

LOCK TABLES `lab_task_assignments` WRITE;
/*!40000 ALTER TABLE `lab_task_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab_task_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_task_products`
--

DROP TABLE IF EXISTS `lab_task_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_task_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lab_task_id` int(10) unsigned NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `measure` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ltp_lab_task_id_lt` (`lab_task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_task_products`
--

LOCK TABLES `lab_task_products` WRITE;
/*!40000 ALTER TABLE `lab_task_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab_task_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_tasks`
--

DROP TABLE IF EXISTS `lab_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `export_certificate_request_id` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dna_extraction_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gene_separation_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endogenous` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transgene` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lab_tasks_reference_id_unique` (`reference_id`),
  KEY `lab_task_ex_cert_req_id_ecr` (`export_certificate_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_tasks`
--

LOCK TABLES `lab_tasks` WRITE;
/*!40000 ALTER TABLE `lab_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_09_29_145127_create_users_table',1),('2013_10_01_064612_create_entrepreneur_table',1),('2013_10_05_070655_schema_v1',1),('2013_10_09_110548_schema_v2',1),('2013_10_09_131059_schema_v3',1),('2013_10_10_161456_create_receipts_table',1),('2013_10_10_203255_schema_v4',1),('2013_11_22_102120_create_dmt_request',1),('2013_11_22_114954_schema_v5',1),('2013_11_22_132857_schema_v6',1),('2013_11_22_160527_create_upload_lab_task_table',1),('2013_11_25_011010_schema_v7',1),('2013_12_04_044716_AddInvoice',1),('2013_12_04_085331_add_foreign_key',1),('2013_12_04_122242_schema_v8',1),('2013_12_04_161042_schema_v9',1),('2013_12_09_084428_remove_price_total_price_from_receipts',1),('2013_12_12_142054_add_foreign_key_v2',1),('2013_12_12_153454_reverse_add_foreign_key_v2',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_reference_id` int(10) unsigned NOT NULL,
  `reference_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `receipts_reference_id_unique` (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_lab_task_files`
--

DROP TABLE IF EXISTS `upload_lab_task_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_lab_task_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `labtask_id` int(10) unsigned NOT NULL,
  `file1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ultf_labtask_id_ec` (`labtask_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_lab_task_files`
--

LOCK TABLES `upload_lab_task_files` WRITE;
/*!40000 ALTER TABLE `upload_lab_task_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_lab_task_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user0001','92d0152f2b388100f2307134e4d4b2fa','c0d347342cd0fd9a8b7813a5e7fefbd9','I am a Customer','Customer'),(2,'user0002','bc594ab795059e8c103c423282e1bb74','c0d347342cd0fd9a8b7813a5e7fefbd9','I am an Agency','Agency'),(3,'staff18473','648b60352f1a576ef13b14b3b06c877e','c0d347342cd0fd9a8b7813a5e7fefbd9','I am a Staff','GMO Staff'),(4,'lab72812','87be173d64566c051e4305ac829ea993','c0d347342cd0fd9a8b7813a5e7fefbd9','I am a Lab Staff','Lab Staff'),(5,'lab98172','daf5dc1db0a29f8735d56f2aedc638eb','c0d347342cd0fd9a8b7813a5e7fefbd9','I am a Lab (Head)','Lab Staff');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yy_running_numbers`
--

DROP TABLE IF EXISTS `yy_running_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yy_running_numbers` (
  `year` int(11) NOT NULL,
  `kind` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`year`,`kind`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yy_running_numbers`
--

LOCK TABLES `yy_running_numbers` WRITE;
/*!40000 ALTER TABLE `yy_running_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `yy_running_numbers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-13  8:50:09
