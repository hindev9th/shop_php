-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'username','5f4dcc3b5aa765d61d8327deb882cf99','firstname','lastname','email@email.com','092821923','2023-10-31 13:35:29','2023-10-31 13:35:29');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'SAMSUNG','2023-10-30 08:40:44','2023-10-30 08:40:44'),(2,'IPHONE','2023-10-30 08:40:44','2023-10-30 08:40:44'),(3,'XIAOMI','2023-10-30 08:40:44','2023-10-30 08:40:44'),(4,'OPPO','2023-10-30 08:40:44','2023-10-30 08:40:44'),(5,'ONEPLUS','2023-10-30 08:40:44','2023-10-30 08:40:44'),(6,'VIVO','2023-10-30 08:40:44','2023-10-30 08:40:44'),(7,'REALME','2023-10-30 08:40:44','2023-10-30 08:40:44'),(8,'NOTHING','2023-10-30 08:40:44','2023-10-30 08:40:44');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Điện thoại','2023-10-30 08:42:34','2023-10-30 08:42:34'),(2,'Tablet','2023-10-30 08:42:34','2023-10-30 08:42:34'),(3,'Laptop','2023-10-30 08:42:34','2023-10-30 08:42:34'),(4,'Smartwatch','2023-10-30 08:42:34','2023-10-30 08:42:34'),(5,'Phụ kiện','2023-10-30 08:42:34','2023-10-30 08:42:34'),(7,'dasf2331aaaa1c','2023-11-07 10:07:54','2023-11-07 15:32:53'),(8,'fdsfcvx','2023-11-07 10:07:54','2023-11-07 10:07:54'),(9,'2edcv','2023-11-07 10:07:54','2023-11-07 10:07:54'),(10,'vxcvqwd','2023-11-07 10:07:54','2023-11-07 10:07:54'),(11,'vcv3v','2023-11-07 10:07:54','2023-11-07 10:07:54'),(12,'bfgh','2023-11-07 10:07:54','2023-11-07 10:07:54'),(13,'bdfg2','2023-11-07 10:07:54','2023-11-07 10:07:54'),(14,'vxcb34','2023-11-07 10:07:54','2023-11-07 10:07:54'),(15,'bcvb3gb','2023-11-07 10:07:54','2023-11-07 10:07:54'),(16,'vxc4g','2023-11-07 10:07:54','2023-11-07 10:07:54'),(17,' dg4t','2023-11-07 10:07:54','2023-11-07 10:07:54'),(18,'cv34g','2023-11-07 10:07:54','2023-11-07 10:07:54'),(19,'vxcb35','2023-11-07 10:07:54','2023-11-07 10:07:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_type_id` int NOT NULL,
  `product_color_id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_to_color` (`product_color_id`),
  KEY `product_id` (`product_id`,`product_type_id`),
  KEY `user_id` (`user_id`),
  KEY `product_type_id` (`product_type_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,6,6,5,'fsdf','fsgda',1,'1342445','abc@ABC.COM','dasdasd','da','Chờ duyệt','2023-11-09 06:52:28','2023-11-09 06:52:28'),(2,1,6,6,5,'fsdf','fsgda',2,'1342445','abc@ABC.COM','dasdas','1','Chờ duyệt','2023-11-09 06:54:10','2023-11-09 06:54:10'),(3,1,1,1,1,'fsdf','fsgda',1,'1342445','abc@ABC.COM','dasdas','1','Chờ duyệt','2023-11-09 06:54:10','2023-11-09 06:54:10'),(4,1,5,5,9,'fsdf','fsgda',1,'1342445','abc@ABC.COM','dasdas','1','Chờ duyệt','2023-11-09 06:54:10','2023-11-09 06:54:10');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `color_belong_to_product` (`product_id`),
  KEY `product_code` (`product_id`),
  CONSTRAINT `product_colors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colors`
--

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;
INSERT INTO `product_colors` VALUES (1,1,'Titan Trắng','fff','2023-10-30 09:40:55','2023-10-30 09:49:02'),(2,1,'Titan Xanh','5A697E','2023-10-30 09:40:55','2023-10-30 09:49:05'),(3,1,'Titan Đen','000','2023-10-30 09:40:55','2023-10-30 09:49:07'),(4,1,'Titan Tự nhiên','D4CABD','2023-10-30 09:40:55','2023-10-30 09:49:10'),(5,6,'Titan Trắng','fff','2023-10-30 09:40:55','2023-10-30 09:49:02'),(6,6,'Titan Xanh','5A697E','2023-10-30 09:40:55','2023-10-30 09:49:05'),(7,6,'Titan Đen','000','2023-10-30 09:40:55','2023-10-30 09:49:07'),(8,6,'Titan Tự nhiên','D4CABD','2023-10-30 09:40:55','2023-10-30 09:49:10'),(9,5,'Trắng ','FFF','2023-11-08 05:01:48','2023-11-08 05:01:48');
/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_types`
--

DROP TABLE IF EXISTS `product_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `price_discount` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_type_belong_to_product` (`product_id`),
  CONSTRAINT `product_types_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_types`
--

LOCK TABLES `product_types` WRITE;
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;
INSERT INTO `product_types` VALUES (1,1,'128GB',28990000,28490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(2,1,'256GB',31990000,31490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(3,1,'512GB',37990000,37490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(4,1,'1TB',43990000,42490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(5,5,'256',15600000,14600000,5,'2023-11-08 04:43:49','2023-11-08 04:43:49'),(6,6,'128GB',28990000,28490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(7,6,'256GB',31990000,31490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(8,6,'512GB',37990000,37490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10'),(9,6,'1TB',43990000,42490000,10,'2023-10-30 10:00:10','2023-10-30 10:00:10');
/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `highlights` tinyint(1) NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `information` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_to_category` (`category_id`),
  KEY `product_to_brand` (`brand_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,2,'iPhone 15 Pro',0,'iPhone 15 Pro  vẫn giữ kiểu dáng vuông vắn và góc cạnh giống như những phiên bản trước đây, cách làm này mang đến cái nhìn sang trọng và thời thượng nhằm giúp bạn tỏa sáng dù ở bất kỳ nơi đâu mỗi khi cầm điện thoại trên tay.','Màn hình:\r\n\r\nOLED6.7\"Super Retina XDR','iphone14.webp','2023-10-30 08:57:12','2023-11-08 08:52:10'),(5,1,3,'Xiaomi 13T',0,'1','2','xiami-13t-xanh-la-01-doc-quyen.webp;xiaomi_13t_pro_-_1.webp;xiaomi_13t_pro_-_4.webp','2023-11-08 03:34:34','2023-11-08 03:35:14'),(6,1,2,'iPhone 15',0,'iPhone 15  vẫn giữ kiểu dáng vuông vắn và góc cạnh giống như những phiên bản trước đây, cách làm này mang đến cái nhìn sang trọng và thời thượng nhằm giúp bạn tỏa sáng dù ở bất kỳ nơi đâu mỗi khi cầm điện thoại trên tay.','d','iphone14.webp','2023-11-08 04:47:46','2023-11-08 09:43:27');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permission` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$RMwo8G/QdSs6Eucamx9d2.3PlILcliRRy1pEk0SXyrI93n15ZtiTq','fsdf','fsgda','abc@ABC.COM','1342445','2023-11-07 04:50:46','2023-11-07 06:55:18',1),(2,'$2y$10$IcL5k49ete5pJiy/i3wjWuNyVggCkOXXSYJnqWbaigErwvPfYK8XS','le nguyen ','hien','hien@gmail.com',NULL,'2023-11-08 14:30:54','2023-11-08 14:30:54',0),(3,'$2y$10$6/mRBQFdyJLUr8TLphjX.O7kPH/uGDfNamRTN8jc9EkGdCNiTrGYO','le nguyen 1','dasd','abc@abcd.com',NULL,'2023-11-08 14:36:37','2023-11-08 14:36:37',0),(4,'$2y$10$FkLp1U4ADiOZvByFX9X4aOAlJRIJ3N4jYO6nqEuiPuTA7X./yCI.a','fasd','fasf','vc@cz.com',NULL,'2023-11-08 14:40:59','2023-11-08 14:40:59',0),(5,'$2y$10$3NW0zGN7ETMLcEZuKIwNfetISxVNkYHNL4WE4GbZ1fFKUgflj18Oi','fasd2','fasf2','vc2@cz.com',NULL,'2023-11-08 14:41:36','2023-11-08 14:41:36',0),(6,'$2y$10$wJ8D.n1u6dNYK31fagsj7ueq05P/U1kbLyGvF/Pa8FHwTK4Wv/iBG','cxc','czx','c@c.com',NULL,'2023-11-08 14:42:22','2023-11-08 14:42:22',0),(7,'$2y$10$uh78EYqLcS1tEoReswb5heeXzlYaJG/ZrLXI16zDxGf/CTg.8NPR.','czxc','xzczxc','zxcz@czxc.com',NULL,'2023-11-08 14:44:36','2023-11-08 14:44:36',0),(8,'$2y$10$5/Kc.knZ86VF2gO2r0SKuukbNHadqF8yfX4Gjr6JdR54pNJ5UwofW','czcx1','dasdc','asd@dasd.com',NULL,'2023-11-08 14:45:46','2023-11-08 14:45:46',0),(9,'$2y$10$9wj4uQ06tWp1Rb18TpskQ.g3a4EevlN.Kce1dvXrUzxL09TP6ySUa','Lê Nguyên','Hiện','hien1@gmail.com',NULL,'2023-11-08 14:46:43','2023-11-08 14:46:43',0);
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

-- Dump completed on 2023-11-09 14:05:37
