-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: eshop
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category`
(
    `id`        int unsigned NOT NULL AUTO_INCREMENT,
    `parent_id` int unsigned NOT NULL,
    `slug`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `slug` (`slug`(191))
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category`
    DISABLE KEYS */;
INSERT INTO `category`
VALUES (1, 0, 'laptops'),
       (2, 0, 'desktop-computers');
/*!40000 ALTER TABLE `category`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_description`
--

DROP TABLE IF EXISTS `category_description`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_description`
(
    `category_id` int unsigned                                                  NOT NULL,
    `language_id` int unsigned                                                  NOT NULL,
    `title`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `keywords`    varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `content`     text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    PRIMARY KEY (`category_id`, `language_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_description`
--

LOCK TABLES `category_description` WRITE;
/*!40000 ALTER TABLE `category_description`
    DISABLE KEYS */;
INSERT INTO `category_description`
VALUES (1, 1, 'Laptops', 'Shop the best laptops. See top laptop deals today.', 'Laptops, Notebooks',
        '<figure class=\"image\"><img src=\"/uploads/images/categories/laptops.png\"></figure><p>Shop the best laptops. See top laptop deals today.</p><p>Power your passions with premium, precision-crafted laptops with innovative features.</p><p>Work from anywhere with the world’s most intelligent and secure business laptops sustainably designed for productivity on the go.</p><p>Power your small business with laptops built to deliver security, performance and enhanced video conferencing.</p>'),
       (1, 2, 'Ноутбуки', 'Ноутбуки, Лэптопы', 'Ноутбуки, Портативные компютеры',
        '<figure class=\"image\"><img src=\"/uploads/images/categories/laptops.png\"></figure><p>Покупайте лучшие ноутбуки. Смотрите лучшие предложения ноутбуков сегодня.</p><p>Дайте волю своим увлечениям с помощью прецизионных ноутбуков премиум-класса с инновационными функциями.</p><p>Работайте из любой точки мира с помощью самых интеллектуальных и безопасных бизнес-ноутбуков в мире, разработанных для эффективной работы в пути.</p><p>Расширьте возможности своего малого бизнеса с помощью ноутбуков, обеспечивающих безопасность, производительность и расширенные возможности видеоконференций.</p>'),
       (2, 1, 'Desktop Computers', 'Shop desktop computers and all-in-one PCs', 'Desktop Computers, PC',
        '<figure class=\"image\"><img src=\"/uploads/images/categories/desctop.png\"></figure><p>Shop desktop computers and all-in-one PCs. See top desktop computer deals today.</p><p>Connect seamlessly with all-in-one desktops designed for easy set up and an enhanced video and audio experience.</p><p>Power your passions with premium desktops engineered for power and expandability.</p>'),
       (2, 2, 'Настольные Компьютеры', 'Покупайте настольные компьютеры и моноблоки', 'Настольные Компьютеры',
        '<figure class=\"image\"><img src=\"/uploads/images/categories/desctop.png\"></figure><p>Покупайте настольные компьютеры и моноблоки. Ознакомьтесь с лучшими предложениями настольных компьютеров сегодня.</p><p>Беспрепятственно подключайтесь к настольным компьютерам «все в одном», разработанным для простой настройки и улучшенного качества видео и аудио.</p><p>Дайте волю своим увлечениям с настольными компьютерами премиум-класса, разработанными для обеспечения мощности и расширяемости.</p>');
/*!40000 ALTER TABLE `category_description`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `download`
(
    `id`            int unsigned                                                  NOT NULL AUTO_INCREMENT,
    `filename`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `original_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `download`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download_description`
--

DROP TABLE IF EXISTS `download_description`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `download_description`
(
    `download_id` int unsigned                                                  NOT NULL,
    `language_id` int unsigned                                                  NOT NULL,
    `name`        varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`download_id`, `language_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download_description`
--

LOCK TABLES `download_description` WRITE;
/*!40000 ALTER TABLE `download_description`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `download_description`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language`
(
    `id`    int unsigned                                                 NOT NULL AUTO_INCREMENT,
    `code`  varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
    `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `base`  tinyint unsigned                                             NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language`
    DISABLE KEYS */;
INSERT INTO `language`
VALUES (1, 'en', 'English', 1),
       (2, 'ru', 'Русский', 0);
/*!40000 ALTER TABLE `language`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_download`
--

DROP TABLE IF EXISTS `order_download`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_download`
(
    `id`          int unsigned     NOT NULL AUTO_INCREMENT,
    `order_id`    int unsigned     NOT NULL,
    `user_id`     int unsigned     NOT NULL,
    `product_id`  int unsigned     NOT NULL,
    `download_id` int unsigned     NOT NULL,
    `status`      tinyint unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_download`
--

LOCK TABLES `order_download` WRITE;
/*!40000 ALTER TABLE `order_download`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `order_download`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_product`
(
    `id`         int unsigned                                                  NOT NULL AUTO_INCREMENT,
    `order_id`   int unsigned                                                  NOT NULL,
    `product_id` int unsigned                                                  NOT NULL,
    `title`      varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `qty`        int unsigned                                                  NOT NULL,
    `price`      double                                                        NOT NULL,
    `sum`        double                                                        NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders`
(
    `id`         int unsigned NOT NULL AUTO_INCREMENT,
    `user_id`    int unsigned          DEFAULT NULL,
    `status`     tinyint      NOT NULL DEFAULT '0',
    `note`       text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `total`      double       NOT NULL,
    `qty`        int unsigned          DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `orders`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page`
(
    `id`   int unsigned NOT NULL AUTO_INCREMENT,
    `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `slug` (`slug`(191))
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `page`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_description`
--

DROP TABLE IF EXISTS `page_description`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_description`
(
    `page_id`     int unsigned                                                  NOT NULL,
    `language_id` int unsigned                                                  NOT NULL,
    `title`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `content`     text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci         NOT NULL,
    `keywords`    varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`page_id`, `language_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_description`
--

LOCK TABLES `page_description` WRITE;
/*!40000 ALTER TABLE `page_description`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `page_description`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product`
(
    `id`          int unsigned                                                  NOT NULL AUTO_INCREMENT,
    `category_id` int unsigned                                                  NOT NULL,
    `slug`        varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `price`       double                                                        NOT NULL DEFAULT '0',
    `old_price`   double                                                        NOT NULL DEFAULT '0',
    `status`      tinyint                                                       NOT NULL DEFAULT '1',
    `hit`         tinyint                                                       NOT NULL DEFAULT '0',
    `img`         varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/no_image.jpg',
    `created_at`  timestamp                                                     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  timestamp                                                     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `is_download` tinyint                                                       NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `slug` (`slug`(191))
) ENGINE = InnoDB
  AUTO_INCREMENT = 12
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product`
    DISABLE KEYS */;
INSERT INTO `product`
VALUES (1, 1, 'xps-13-laptop', 1099, 0, 1, 1, '/uploads/images/products/XPS-13/XPS-13-main.png', '2023-08-02 01:09:50',
        '2023-08-05 00:41:54', 0),
       (2, 1, 'xps-15-laptop', 2499, 2799, 1, 1, '/uploads/images/products/XPS-15/XPS-15-main.png',
        '2023-08-03 01:52:10', '2023-08-03 01:52:10', 0),
       (3, 1, 'inspiron-15-laptop', 529, 0, 1, 1, '/uploads/images/products/Inspiron-15/main.png',
        '2023-08-03 03:13:09', '2023-08-03 03:13:09', 0),
       (4, 1, 'latitude-5540-laptop', 1289, 1986, 1, 0, '/uploads/images/products/Latitude-5540/Main.png',
        '2023-08-03 12:45:32', '2023-08-03 12:45:32', 0),
       (5, 1, 'vostro-7620-laptop', 1249, 1699, 1, 1, '/uploads/images/products/Vostro-7620/Vostro-7620-main.png',
        '2023-08-03 13:25:37', '2023-08-03 13:25:37', 0),
       (6, 1, 'hp-dragonfly-pro', 1549, 0, 1, 1, '/uploads/images/products/HP-Dragonfly-Pro/c08547192.png',
        '2023-08-03 16:29:13', '2023-08-03 16:29:13', 0),
       (7, 1, 'hp-envy-x360-2-in-1-laptop-15-ew1047nr', 1149, 0, 1, 1,
        '/uploads/images/products/HP-Envy-x360/c08464429.png', '2023-08-03 17:33:09', '2023-08-03 17:33:09', 0),
       (8, 1, 'hp-pavilion-laptop-15-6', 999, 0, 1, 0, '/uploads/images/products/HP-Pavilion/c08114744.png',
        '2023-08-03 19:11:12', '2023-08-03 19:11:12', 0),
       (9, 1, 'hp-spectre-x360-16-2-in-1-laptop', 1049, 1699, 1, 0,
        '/uploads/images/products/HP-Spectre-x360/c07871844.png', '2023-08-03 20:27:14', '2023-08-03 20:27:14', 0),
       (10, 2, 'optiplex-micro-form-factor', 879, 1349, 1, 0,
        '/uploads/images/products/OptiPlex-Micro-Form-Factor/desktop-optiplex-7010-main.png', '2023-08-03 21:42:04',
        '2023-08-03 21:42:04', 0),
       (11, 2, 'dell-vostro-small-form-factor', 959, 1591, 1, 0,
        '/uploads/images/products/Vostro-Small-Form-Factor/Dell-Vostro-Small-main.png', '2023-08-03 22:16:39',
        '2023-08-03 22:16:39', 0);
/*!40000 ALTER TABLE `product`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_description`
--

DROP TABLE IF EXISTS `product_description`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_description`
(
    `product_id`  int unsigned                                                  NOT NULL,
    `language_id` int unsigned                                                  NOT NULL,
    `title`       varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `content`     text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `excerpt`     varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `keywords`    varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`product_id`, `language_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_description`
--

LOCK TABLES `product_description` WRITE;
/*!40000 ALTER TABLE `product_description`
    DISABLE KEYS */;
INSERT INTO `product_description`
VALUES (1, 1, 'Dell XPS 13 Laptop',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>12th Gen Intel® Core™ i7-1250U (12 MB cache, 10 cores, 12 threads, up to 4.70 GHz Turbo)</td></tr><tr><td>Operating System</td><td>Windows 11 Home, English</td></tr><tr><td>Graphics Card</td><td>Intel® Iris® Xe Graphics</td></tr><tr><td>Display</td><td>13.4\", FHD+ 1920 x 1200, 60Hz, Non-Touch, Anti-Glare, 500 nit, InfinityEdge</td></tr><tr><td>Memory</td><td>16 GB, LPDDR5, 5200 MHz, integrated, dual-channel</td></tr><tr><td>Storage</td><td>512 GB, PCIe NVMe x2 NVMe, SSD integrated</td></tr><tr><td>Case</td><td>Sky</td></tr><tr><td>Keyboard</td><td>Sky Backlit English Keyboard with Fingerprint Reader</td></tr><tr><td>Ports</td><td>2 x Thunderbolt™ 4 (USB Type-C™ with DisplayPort and Power Delivery)<br>USB-C to USB-A 3.0 adapter (included in the box)<br>USB-C to 3.5mm headset adapter (included in the box)</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height : 0.55 in. (13.99 mm)<br>Width: 11.63 in. (295.4 mm)<br>Depth: 7.86 in. (199.4 mm)<br>Weight (minimum): 2.59 lb (1.17 kg)<br>&nbsp;</td></tr><tr><td>Camera</td><td>720p at 30 fps HD RGB camera, 400p at 30 fps IR camera, dual-array microphones</td></tr><tr><td>Audio and Speakers</td><td>Dual stereo speakers (tweeter + woofer), Realtek ALC1319D, 2 W x 2 = 4 W total</td></tr><tr><td>Exterior Chassis Materials</td><td>Aluminum</td></tr><tr><td>Wireless</td><td>Intel® Killer™ Wi-Fi 6E 1675 (AX211), 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Primary Battery</td><td>3 Cell, 51 Wh, integrated</td></tr></tbody></table></figure>',
        '12ᵗʰ Gen Intel® Core™ i7-1250U, 13.4\" (1900X1200) <br> 16 GB LPDDR5, 512 GB, PCIe NVMe x2 NVMe, SSD',
        'XPS 13 Laptop', 'XPS 13 Laptop'),
       (1, 2, 'Dell XPS 13 Ноутбук',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>12th Gen Intel® Core™ i7-1250U (12 MB cache, 10 cores, 12 threads, up to 4.70 GHz Turbo)</td></tr><tr><td>Операционная система</td><td>Windows 11 Home, Английская</td></tr><tr><td>Графическая карта</td><td>Intel® Iris® Xe Graphics</td></tr><tr><td>Дисплей</td><td>13.4\", FHD+ 1920 x 1200, 60Hz, Non-Touch, Anti-Glare, 500 nit, InfinityEdge</td></tr><tr><td>Оперативная память</td><td>16 GB, LPDDR5, 5200 MHz, integrated, dual-channel</td></tr><tr><td>Постоянная память</td><td>512 GB, PCIe NVMe x2 NVMe, SSD integrated</td></tr><tr><td>Корпус</td><td>Sky</td></tr><tr><td>Клавиатура</td><td>Sky Backlit English Keyboard with Fingerprint Reader</td></tr><tr><td>Порты</td><td>2 x Thunderbolt™ 4 (USB Type-C™ with DisplayPort and Power Delivery)<br>USB-C to USB-A 3.0 adapter (included in the box)<br>USB-C to 3.5mm headset adapter (included in the box)</td></tr><tr><td>Размеры и вес</td><td>Высота : 0.55 in. (13.99 mm)<br>Ширина: 11.63 in. (295.4 mm)<br>Глубина: 7.86 in. (199.4 mm)<br>Вес (минимально): 2.59 lb (1.17 kg)</td></tr><tr><td>Камера</td><td>720p at 30 fps HD RGB camera, 400p at 30 fps IR camera, dual-array microphones</td></tr><tr><td>Аудио и колонки</td><td>Двойные стереодинамики (tweeter + woofer), Realtek ALC1319D, 2 Вт x 2 = 4 Вт всего</td></tr><tr><td>Материал корпуса</td><td>Алюминий</td></tr><tr><td>Беспроводная связь</td><td>Intel® Killer™ Wi-Fi 6E 1675 (AX211), 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Основной аккумулятор</td><td>3 Cell, 51 Вт/ч, интегрирована</td></tr><tr><td>Питание</td><td>45W AC Adapter Type-C</td></tr></tbody></table></figure>',
        '12ᵗʰ Gen Intel® Core™ i7-1250U, 13.4\" (1900X1200) <br> 16 GB LPDDR5, 512 GB, PCIe NVMe x2 NVMe, SSD',
        'XPS 13 Ноутбук', 'XPS 13 Ноутбук'),
       (2, 1, 'Dell XPS 15 Laptop',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>13th Gen Intel® Core™ i9-13900H (24 MB cache, 14 cores, up to 5.40 GHz Turbo)</td></tr><tr><td>Operating System</td><td>Windows 11 Home, English</td></tr><tr><td>Graphics Card</td><td>NVIDIA® GeForce® RTX™ 4060 with 8GB GDDR6</td></tr><tr><td>Display</td><td>15.6\" OLED 3.5K (3456x2160) InfinityEdge Touch Anti-Reflective 400-Nit Display</td></tr><tr><td>Memory</td><td>32 GB, 2 x 16 GB, DDR5, 4800 MHz</td></tr><tr><td>Storage</td><td>1 TB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Case</td><td>Platinum Silver exterior, Black interior</td></tr><tr><td>Keyboard</td><td>Backlit Black English Keyboard w/ Fingerprint Reader</td></tr><tr><td>Ports</td><td>1 USB 3.2 Gen 2 Type-C port with DisplayPort<br>2 Thunderbolt™ 4 (USB Type-C™ 3.2 Gen 2) ports<br>1 headset (headphone and microphone combo) port<br>(1) USB-C to USB-A v3.0 &amp; HDMI v2.0 adapter (included in the box) 1 SD-card slot 1 Wedge-shaped lock slot</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height : 0.71 in. (18 mm)<br>Width: 13.57 in. (344.72 mm)<br>Depth: 9.06 in. (230.14 mm)<br>Starting weight:<br>4.21lbs. (1.86kg) for FHD+<br>4.23lbs. (1.92kg) for OLED</td></tr><tr><td>Camera</td><td>720p at 30 fps, HD camera. Dual-array microphones</td></tr><tr><td>Audio and Speakers</td><td>Stereo woofer 2.5 W x 2 and stereo tweeter 1.5 W x 2 = 8 W total peak</td></tr><tr><td>Exterior Chassis Materials</td><td>CNC machined aluminum with carbon fiber palm rest</td></tr><tr><td>Wireless</td><td>Intel® Killer™ Wi-Fi 6 1675 (AX211), 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Primary Battery</td><td>6 Cell, 86 Wh, integrated</td></tr><tr><td>Power</td><td>130 Watt Type-C Adapter</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i9-13900H 15.6-in.(3456X2160)<br> NVIDIA® GeForce RTX™ 4060, 32 GB DDR5, 1 TB SSD',
        'i9-13900H', '13ᵗʰ Gen Intel® Core™ i9-13900H'),
       (2, 2, 'Dell XPS 15 Ноутбук',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>13th Gen Intel® Core™ i9-13900H (24 MB cache, 14 cores, up to 5.40 GHz Turbo)</td></tr><tr><td>Операционная система</td><td>Windows 11 Home, Английская</td></tr><tr><td>Графическая карта</td><td>NVIDIA® GeForce® RTX™ 4060 with 8GB GDDR6</td></tr><tr><td>Дисплей</td><td>15.6\" OLED 3.5K (3456x2160) InfinityEdge Touch Anti-Reflective 400-Nit Display</td></tr><tr><td>Оперативная память</td><td>32 GB, 2 x 16 GB, DDR5, 4800 MHz</td></tr><tr><td>Постоянная память</td><td>1 TB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Корпус</td><td>Platinum Silver exterior, Black interior</td></tr><tr><td>Клавиатура</td><td>Platinum Silver exterior, Black interior</td></tr><tr><td>Порты</td><td>1 USB 3.2 Gen 2 Type-C port with DisplayPort<br>2 Thunderbolt™ 4 (USB Type-C™ 3.2 Gen 2) ports<br>1 headset (headphone and microphone combo) port<br>(1) USB-C to USB-A v3.0 &amp; HDMI v2.0 adapter (included in the box) 1 SD-card slot 1 Wedge-shaped lock slot</td></tr><tr><td>Размеры и вес</td><td>Высота : 0.71 in. (18 mm)<br>Ширина: 13.57 in. (344.72 mm)<br>Глубина: 9.06 in. (230.14 mm)<br>Вес (минимально):<br>4.21lbs. (1.86kg) for FHD+<br>4.23lbs. (1.92kg) for OLED</td></tr><tr><td>Камера</td><td>720p at 30 fps, HD camera. Dual-array microphones</td></tr><tr><td>Аудио и колонки</td><td>Stereo woofer 2.5 Вт x 2 and stereo tweeter 1.5 W x 2 = 8 Вт всего</td></tr><tr><td>Материал корпуса</td><td>Алюминий</td></tr><tr><td>Беспроводная связь</td><td>Intel® Killer™ Wi-Fi 6 1675 (AX211), 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Основной аккумулятор</td><td>6 Cell, 86 Wh, integrated</td></tr><tr><td>Питание</td><td>130 Watt Type-C Adapter</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i9-13900H 15.6-in.(3456X2160)<br> NVIDIA® GeForce RTX™ 4060, 32 GB DDR5, 1 TB SSD',
        'i9-13900H', '13ᵗʰ Gen Intel® Core™ i9-13900H'),
       (3, 1, 'Dell Inspiron 15 Laptop',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>11th Gen Intel® Core™ i5-1135G7 (8 MB cache, 4 cores, 8 threads, up to 4.20 GHz Turbo)</td></tr><tr><td>Operating System</td><td>Windows 11 Home, English</td></tr><tr><td>Graphics Card</td><td>Intel® UHD Graphics</td></tr><tr><td>Display</td><td>15.6\", FHD 1920x1080, 120Hz, WVA, Non-Touch, Anti-Glare, 250 nit, Narrow Border, LED-Backlit</td></tr><tr><td>Memory</td><td>8 GB, 1 x 8 GB, DDR4, 3200 MHz</td></tr><tr><td>Storage</td><td>1 TB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Case</td><td>Carbon Black</td></tr><tr><td>Keyboard</td><td>English US non-backlit keyboard</td></tr><tr><td>Ports</td><td>1 USB 3.2 Gen 1 Type-C® port with DisplayPort 1.4 (on 12th Gen Processor configured with Type-C®)<br>1 USB 3.2 Gen 1 port (on systems configured with Type-C®)<br>2 USB 3.2 Gen 1 ports (on systems configured with non Type-C®)<br>1 USB 2.0 port<br>1 Power Jack<br>1 headset (headphone and microphone combo) port<br>1 HDMI 1.4 port<br>HDMI 1.4 (Maximum resolution supported over HDMI is 1920x1080 @60Hz. No 4K/2K output)<br>Slots:<br>1 M.2 2230 slot for WiFi and Bluetooth card<br>1 M.2 2230/2280 slot for solid-state drive<br>1 SD-card slot</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height: 0.83 in. (21.07 mm)<br>Width: 14.11 in. (358.50 mm)<br>Depth: 9.27 in. (235.56 mm)<br>Weight (minimum): 3.65 lbs. (1.65 kg)</td></tr><tr><td>Camera</td><td>720p at 30 fps HD camera Single integrated microphone</td></tr><tr><td>Audio and Speakers</td><td>Stereo speakers, 2 W x 2 = 4 W total</td></tr><tr><td>Exterior Chassis Materials</td><td>Plastic</td></tr><tr><td>Wireless</td><td>Realtek Wi-Fi 5 RTL8821CE, 1x1, 802.11ac, MU-MIMO, Bluetooth® wireless card</td></tr><tr><td>Primary Battery</td><td>3 Cell, 41 Wh, integrated</td></tr><tr><td>Power</td><td>65 Watt AC Adapter</td></tr></tbody></table></figure>',
        '11ᵗʰ Gen Intel® Core™ i5-1135G7, 15.6\" (1920X1080)<br> Intel® UHD Graphics 8 GB DDR4, 256 GB SSD', 'i5-1335U',
        'Product Safety, EMC and Environmental Datasheets'),
       (3, 2, 'Dell Inspiron 15 Ноутбук',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>11th Gen Intel® Core™ i5-1135G7 (8 MB cache, 4 cores, 8 threads, up to 4.20 GHz Turbo)</td></tr><tr><td>Операционная система</td><td>Windows 11 Home, Английская</td></tr><tr><td>Графическая карта</td><td>Intel® UHD Graphics</td></tr><tr><td>Дисплей</td><td>15.6\", FHD 1920x1080, 120Hz, WVA, Non-Touch, Anti-Glare, 250 nit, Narrow Border, LED-Backlit</td></tr><tr><td>Оперативная память</td><td>8 GB, 1 x 8 GB, DDR4, 3200 MHz</td></tr><tr><td>Постоянная память</td><td>256 GB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Корпус</td><td>Carbon Black</td></tr><tr><td>Клавиатура</td><td>English US non-backlit keyboard</td></tr><tr><td>Порты</td><td>1 USB 3.2 Gen 1 Type-C® port with DisplayPort 1.4 (on 12th Gen Processor configured with Type-C®)<br>1 USB 3.2 Gen 1 port (on systems configured with Type-C®)<br>2 USB 3.2 Gen 1 ports (on systems configured with non Type-C®)<br>1 USB 2.0 port<br>1 Power Jack<br>1 headset (headphone and microphone combo) port<br>1 HDMI 1.4 port<br>HDMI 1.4 (Maximum resolution supported over HDMI is 1920x1080 @60Hz. No 4K/2K output)<br>Slots:<br>1 M.2 2230 slot for WiFi and Bluetooth card<br>1 M.2 2230/2280 slot for solid-state drive<br>1 SD-card slot<br>&nbsp;</td></tr><tr><td>Размеры и вес</td><td>Высота : 0.83 in. (21.07 mm)<br>Ширина: 14.11 in. (358.50 mm)<br>Глубина: 9.27 in. (235.56 mm) Вес (минимально): 3.65 lbs. (1.65 kg)</td></tr><tr><td>Камера</td><td>720p at 30 fps HD camera Single integrated microphone</td></tr><tr><td>Аудио и колонки</td><td>Стереодинамики, 2 W x 2 = 4 Вт всего</td></tr><tr><td>Материал корпуса</td><td>Пластик</td></tr><tr><td>Беспроводная связь</td><td>Realtek Wi-Fi 5 RTL8821CE, 1x1, 802.11ac, MU-MIMO, Bluetooth® wireless card</td></tr><tr><td>Основной аккумулятор</td><td>3 Cell, 41 Wh, integrated</td></tr><tr><td>Питание</td><td>65 Watt AC Adapter</td></tr></tbody></table></figure>',
        '11ᵗʰ Gen Intel® Core™ i5-1135G7, 15.6\" (1920X1080)<br> Intel® UHD Graphics 8 GB DDR4, 256 GB SSD', 'i5-1335U',
        'Ноутбук'),
       (4, 1, 'Dell Latitude 5540 Laptop',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>13th Gen Intel® Core™ i5-1335U (12 MB cache, 10 cores, 12 threads, up to 4.60 GHz Turbo)</td></tr><tr><td>Operating System</td><td>Windows 11 Pro, English</td></tr><tr><td>Graphics Card</td><td>Intel 13th Generation i5-1335U Trans., Intel Integrated Graphics, TBT4</td></tr><tr><td>Display</td><td>15.6\" FHD (1920x1080) Non-Touch, AG, IPS, 250 nits, FHD Cam, WLAN</td></tr><tr><td>Memory</td><td>16 GB, 2 x 8 GB, DDR4, 3200 MT/s, dual-channel, Non-ECC</td></tr><tr><td>Storage</td><td>M.2 2230 PCIe NVMe Gen4x4 256GB SSD Class 35</td></tr><tr><td>Case</td><td>N/A</td></tr><tr><td>Keyboard</td><td>English US backlit keyboard with numeric keypad, 99-key</td></tr><tr><td>Ports</td><td>2 Thunderbolt™ 4 port with Power Delivery and DisplayPort<br>1 USB 3.2 Gen 1 port with PowerShare<br>1 USB 3.2 Gen 1 port<br>1 HDMI 2.0 port<br>1 Universal audio port<br>1 RJ-45 Ethernet port<br>Slots<br>1 microSD-card slot<br>1 wedge-shaped lock slot<br>1 nano-SIM card slot (optional)<br>1 Smart card reader slot (optional)</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height: 0.83 in. (21.07 mm)<br>Width: 14.11 in. (358.50 mm)<br>Depth: 9.27 in. (235.56 mm)<br>Weight (minimum): 3.65 lbs. (1.65 kg)</td></tr><tr><td>Camera</td><td>1080p at 30 fps, widescreen FHD RGB camera, Dual-array microphones<br>1080p at 30 fps, widescreen FHD RGB + IR camera, Dual-array microphones</td></tr><tr><td>Audio and Speakers</td><td>Stereo speakers with Realtek Waves MaxxAudio 12.0, 2 W x 2 W = 4 W total</td></tr><tr><td>Exterior Chassis Materials</td><td>N/A</td></tr><tr><td>Wireless</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Primary Battery</td><td>3- cell, 54Wh Battery, Express Charge, Express Charge Boost capable</td></tr><tr><td>Power</td><td>65W AC adapter, USB Type-C, TCO Gen9 compliant</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i5-1335U, 15.6\" (1920X1080)<br> 16 GB, 2 x 8 GB, DDR4, M.2 2230 PCIe NVMe 256GB SSD',
        'i5-1335U', '13ᵗʰ Gen Intel® Core™ i5-1335U'),
       (4, 2, 'Dell Latitude 5540 Ноутбук',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>13th Gen Intel® Core™ i5-1335U (12 MB cache, 10 cores, 12 threads, up to 4.60 GHz Turbo)</td></tr><tr><td>Операционная система</td><td>Windows 11 Про, Английская</td></tr><tr><td>Графическая карта</td><td>Intel 13th Generation i5-1335U Trans., Intel Integrated Graphics, TBT4</td></tr><tr><td>Дисплей</td><td>15.6\" FHD (1920x1080) Non-Touch, AG, IPS, 250 nits, FHD Cam, WLAN</td></tr><tr><td>Оперативная память</td><td>16 GB, 2 x 8 GB, DDR4, 3200 MT/s, dual-channel, Non-ECC</td></tr><tr><td>Постоянная память</td><td>M.2 2230 PCIe NVMe Gen4x4 256GB SSD Class 35</td></tr><tr><td>Корпус</td><td>N/A</td></tr><tr><td>Клавиатура</td><td>English US backlit keyboard with numeric keypad, 99-key</td></tr><tr><td>Порты</td><td>2 Thunderbolt™ 4 порта с зарядкой и порт дисплэя<br>1 USB 3.2 Gen 1 порт with PowerShare<br>1 USB 3.2 Gen 1 порт<br>1 HDMI 2.0 порт<br>1 Уневерсальный аудио порт<br>1 RJ-45 Интернет порт<br>Слоты<br>1 microSD-кард слот<br>1 wedge-shaped lock слот<br>1 nano-SIM кард слот (optional)<br>1 Smart кард reader слот (optional)</td></tr><tr><td>Размеры и вес</td><td>Высота (сзади): 0.90 in. (22.80 mm)<br>Ширина (спереди): 0.82 in. (20.80 mm)<br>Ширина: 14.09 in. (357.80 mm)<br>Глубина: 9.19 in. (233.30 mm)<br>Стартовый вес: 3.56 lb (1.613 kg)</td></tr><tr><td>Камера</td><td>1080p at 30 fps, widescreen FHD RGB camera, Dual-array microphones<br>1080p at 30 fps, widescreen FHD RGB + IR camera, Dual-array microphones</td></tr><tr><td>Аудио и колонки</td><td>Стереодинамики with Realtek Waves MaxxAudio 12.0, 2 W x 2 W = 4 Вт всего</td></tr><tr><td>Материал корпуса</td><td>N/A</td></tr><tr><td>Беспроводная связь</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Основной аккумулятор</td><td>3- cell, 54Wh Battery, Express Charge, Express Charge Boost capable</td></tr><tr><td>Питание</td><td>65W AC adapter, USB Type-C, TCO Gen9 compliant</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i5-1335U, 15.6\" (1920X1080)<br> 16 GB, 2 x 8 GB, DDR4, M.2 2230 PCIe NVMe 256GB SSD',
        'i5-1335U', '13ᵗʰ Gen Intel® Core™ i5-1335U'),
       (5, 1, 'Dell Vostro 7620 Laptop',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>12th Gen Intel® Core™ i7-12700H (24 MB cache, 14 cores, 20 threads, up to 4.70 GHz Turbo)</td></tr><tr><td>Operating System</td><td>Windows 11 Pro, English</td></tr><tr><td>Graphics Card</td><td>NVIDIA® GeForce RTX™ 3050 Ti, 4 GB GDDR6</td></tr><tr><td>Display</td><td>16\", FHD+ 1920 x 1200, 60Hz, WVA, Non-Touch, Anti-Glare, 250 nit, ComfortView</td></tr><tr><td>Memory</td><td>24 GB, 8 GB, DDR5, 4800 MHz, integrated + 1 x 16 GB, DDR5, 4800 MHz</td></tr><tr><td>Storage</td><td>1 TB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Case</td><td>Black</td></tr><tr><td>Keyboard</td><td>Carbon Black Backlit Keyboard with Numeric Keypad, English US</td></tr><tr><td>Ports</td><td>2 USB 3.2 Gen 1 ports<br>1 Thunderbolt™ 4 port with DisplayPort™ and Power Delivery<br>1 Universal headset jack<br>1 HDMI 2.0 port<br>1 power-adapter port<br>1 RJ45 Ethernet port<br>Slots:<br>1 SD-card slot<br>&nbsp;</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height: 0.75 in. (18.99 mm)<br>Width: 14.05 in. (356.78 mm)<br>Depth: 9.92 in. (251.90 mm)<br>Weight (minimum): 4.32 lb (1.96 kg)</td></tr><tr><td>Camera</td><td>1080p at 30 fps FHD camera Dual-array microphones</td></tr><tr><td>Audio and Speakers</td><td>Stereo speakers with Waves MaxxAudio® Pro, 2 W x 4 = 8 W total</td></tr><tr><td>Exterior Chassis Materials</td><td>Black: Precision mylar-touchpad</td></tr><tr><td>Wireless</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Primary Battery</td><td>3 Cell, 56 Wh, integrated</td></tr><tr><td>Power</td><td>130W AC Adapter</td></tr></tbody></table></figure>',
        '12ᵗʰ Gen Intel® Core™ i7-12700H, 16.0\" (1920X1200) NVIDIA® GeForce RTX™ 3050 Ti, 24 GB DDR5, 1 TB SSD',
        'i7-12700H', 'Vostro 7620 Laptop'),
       (5, 2, 'Dell Vostro 7620 Ноутбук',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>12th Gen Intel® Core™ i7-12700H (24 MB cache, 14 cores, 20 threads, up to 4.70 GHz Turbo)</td></tr><tr><td>Операционная система</td><td>Windows 11 Про, Английская</td></tr><tr><td>Графическая карта</td><td>NVIDIA® GeForce RTX™ 3050 Ti, 4 GB GDDR6</td></tr><tr><td>Дисплей</td><td>16\", FHD+ 1920 x 1200, 60Hz, WVA, Non-Touch, Anti-Glare, 250 nit, ComfortView</td></tr><tr><td>Оперативная память</td><td>24 GB, 8 GB, DDR5, 4800 MHz, integrated + 1 x 16 GB, DDR5, 4800 MHz</td></tr><tr><td>Постоянная память</td><td>1 TB, M.2, PCIe NVMe, SSD</td></tr><tr><td>Корпус</td><td>Чёрный</td></tr><tr><td>Клавиатура</td><td>Carbon Black Backlit Keyboard with Numeric Keypad, English US</td></tr><tr><td>Порты</td><td>2 USB 3.2 Gen 1 ports<br>1 Thunderbolt™ 4 port with DisplayPort™ and Power Delivery<br>1 Universal headset jack<br>1 HDMI 2.0 port<br>1 power-adapter port<br>1 RJ45 Ethernet port<br>Slots:<br>1 SD-card slot<br>&nbsp;</td></tr><tr><td>Размеры и вес</td><td>Высота: &nbsp;0.75 in. (18.99 mm)<br>Ширина: 14.05 in. (356.78 mm)<br>Глубина: 9.92 in. (251.90 mm)<br>Стартовый вес: 4.32 lb (1.96 kg)</td></tr><tr><td>Камера</td><td>1080p at 30 fps FHD camera Dual-array microphones</td></tr><tr><td>Аудио и колонки</td><td>Стереодинамики with with Waves MaxxAudio® Pro, 2 W x 4 = 8 Вт всего</td></tr><tr><td>Материал корпуса</td><td>Black: Precision mylar-touchpad</td></tr><tr><td>Беспроводная связь</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card</td></tr><tr><td>Основной аккумулятор</td><td>3 Cell, 56 Wh, integrated</td></tr><tr><td>Питание</td><td>130W AC Adapter</td></tr></tbody></table></figure>',
        '12ᵗʰ Gen Intel® Core™ i7-12700H, 16.0\" (1920X1200) NVIDIA® GeForce RTX™ 3050 Ti, 24 GB DDR5, 1 TB SSD',
        'i7-12700H', 'Vostro 7620 Ноутбук'),
       (6, 1, 'HP Dragonfly Pro',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Advanced features</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Processor</td>\n                <td>AMD Ryzen™ 7 7736U (up to 4.7 GHz max boost clock, 16 MB L3 cache, 8 cores, 16 threads)</td>\n            </tr>\n            <tr>\n                <td>Operating System</td>\n                <td>Windows 11 Pro, English</td>\n            </tr>\n            <tr>\n                <td>Graphics Card</td>\n                <td>Integrated: AMD Radeon™ Graphics</td>\n            </tr>\n            <tr>\n                <td>Display</td>\n                <td>\n                    14” diagonal, WUXGA (1920 x 1200), multitouch-enabled, IPS, edge-to-edge glass,<br>\n                    micro-edge, anti-reflection Corning®️ Gorilla®️ Glass NBT™️, 400 nits, 100% sRGB\n                </td>\n            </tr>\n            <tr>\n                <td>Memory</td>\n                <td>32 GB LPDDR5-6400 MHz RAM (onboard)</td>\n            </tr>\n            <tr>\n                <td>Storage</td>\n                <td>1 TB PCIe® NVMe™ M.2 SSD</td>\n            </tr>\n            <tr>\n                <td>Case</td>\n                <td>Sparkling black aluminum cover, sparkling black magnesium base and keyboard frame</td>\n            </tr>\n            <tr>\n                <td>Keyboard</td>\n                <td>Full-size, backlit, sparkling black keyboard</td>\n            </tr>\n            <tr>\n                <td>Ports</td>\n                <td>\n                    2 Thunderbolt™ 3 (40Gbps signaling rate) with USB Type-C® 10Gbps signaling rate<br> \n                    (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)<br>\n                    1 USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\n                </td>\n            </tr>\n            <tr>\n                <td>Dimensions & Weight</td>\n                <td>\n                    Height: 0.72 in.<br>\n                    Width: 12.39 in.<br>\n                    Depth: 8.78 in.<br>\n                    Weight: 3.42 lb.\n                </td>\n            </tr>\n            <tr>\n                <td>Camera</td>\n                <td>\n                    5 MP RGB-IR camera with electronic shutter and integrated wide-range microphone array<br>\n                    (1 front-facing individual, 1 world-facing conference mode)\n                </td>\n            </tr>\n            <tr>\n                <td>Audio and Speakers</td>\n                <td>Audio by Bang & Olufsen; Quad speakers</td>\n            </tr>\n            <tr>\n                <td>Wireless</td>\n                <td>Qualcomm®️ Wi-Fi 6E WCN685x (2x2) and Bluetooth®️ 5.2 wireless card</td>\n            </tr>\n            <tr>\n                <td>Primary Battery</td>\n                <td>4-cell, 64.6 Wh Li-ion polymer. Up to 15 hours. 50% in 30 minutes</td>\n            </tr>\n            <tr>\n                <td>Power</td>\n                <td>96 W USB Type-C® power adapter</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        'AMD Ryzen™ 7 processor 14” WUXGA (1920 x 1200)<br> AMD Radeon™ Graphics 32 GB RAM 1 TB SSD', '7736U',
        'HP Dragonfly Pro'),
       (6, 2, 'HP Dragonfly Pro',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Расширенные характеристики:</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Процессор</td>\n                <td>AMD Ryzen™ 7 7736U (up to 4.7 GHz max boost clock, 16 MB L3 cache, 8 cores, 16 threads)</td>\n            </tr>\n            <tr>\n                <td>Операционная система</td>\n                <td>Windows 11 Про, Английская</td>\n            </tr>\n            <tr>\n                <td>Графическая карта</td>\n                <td>Интегрирована: AMD Radeon™ Graphics</td>\n            </tr>\n            <tr>\n                <td>Дисплей</td>                \n                <td>\n                    14” diagonal, WUXGA (1920 x 1200), multitouch-enabled, IPS, edge-to-edge glass,<br>\n                    micro-edge, anti-reflection Corning®️ Gorilla®️ Glass NBT™️, 400 nits, 100% sRGB\n                </td>\n            </tr>\n            <tr>\n                <td>Оперативная память</td>\n                <td>32 GB LPDDR5-6400 MHz RAM (впаянная)</td>\n            </tr>\n            <tr>\n                <td>Постоянная память</td>\n                <td>1 TB PCIe® NVMe™ M.2 SSD</td>\n            </tr>\n            <tr>\n                <td>Корпус</td>\n                <td>Sparkling black aluminum cover, sparkling black magnesium base and keyboard frame</td>\n            </tr>\n            <tr>\n                <td>Клавиатура</td>\n                <td>Full-size, backlit, sparkling black keyboard</td>\n            </tr>\n            <tr>\n                <td>Порты</td>\n                <td>\n                    2 Thunderbolt™ 3 (40Gbps signaling rate) with USB Type-C® 10Gbps signaling rate<br> \n                    (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)<br>\n                    1 USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\n                </td>\n            </tr>\n            <tr>\n                <td>Размеры и вес</td>\n                <td>\n                    Высота: 12.39 in.<br>\n                    Ширина: 0.72 in.<br>\n                    Глубина: 8.78 in.<br>\n                    Вес: 3.42 lb.\n                </td>\n            </tr>\n            <tr>\n                <td>Камера</td>\n                <td>\n                    5 MP RGB-IR camera with electronic shutter and integrated wide-range microphone array<br>\n                    (1 front-facing individual, 1 world-facing conference mode)\n                </td>\n            </tr>\n            <tr>\n                <td>Аудио и колонки</td>\n                <td>Квадродинамики Audio by Bang & Olufsen</td>\n            </tr>\n            <tr>\n                <td>Беспроводная связь</td>\n                <td>Qualcomm®️ Wi-Fi 6E WCN685x (2x2) and Bluetooth®️ 5.2 wireless card</td>\n            </tr>\n            <tr>\n                <td>Основной аккумулятор</td>\n                <td>4-cell, 64.6 Wh Li-ion полимер. Работа до 15 часов 50% за 30 минут</td>\n            </tr>\n            <tr>\n                <td>Питание</td>\n                <td>96 W USB Type-C® power adapter</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        'AMD Ryzen™ 7 processor 14” WUXGA (1920 x 1200)<br> AMD Radeon™ Graphics 32 GB RAM 1 TB SSD', '7736U',
        'HP Dragonfly Pro'),
       (7, 1, 'HP Envy x360 2-in-1 Laptop 15',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Advanced features</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Processor</td>\n                <td>Intel® Core™ i5-1335U (up to 4.6 GHz with Intel®, 12 MB L3 cache, 10 cores, 12 threads)</td>\n            </tr>\n            <tr>\n                <td>Operating System</td>\n                <td>Windows 11 Pro, English</td>\n            </tr>\n            <tr>\n                <td>Graphics Card</td>\n                <td>Integrated: Intel® Iris® Xᵉ Graphics</td>\n            </tr>\n            <tr>\n                <td>Display</td>\n                <td>\n                    15.6\" diagonal, FHD (1920 x 1080), multitouch-enabled, IPS, edge-to-edge glass,<br>\n                    micro-edge, 400 nits, low power, 100% sRGB\n                </td>\n            </tr>\n            <tr>\n                <td>Memory</td>\n                <td>16 GB DDR4-3200 MHz RAM (2 x 8 GB)</td>\n            </tr>\n            <tr>\n                <td>Storage</td>\n                <td>1 TB PCIe® Gen4 NVMe™ TLC M.2 SSD</td>\n            </tr>\n            <tr>\n                <td>Case</td>\n                <td>Mineral silver aluminum</td>\n            </tr>\n            <tr>\n                <td>Keyboard</td>\n                <td>Full-size, backlit, moonstone grey keyboard</td>\n            </tr>\n            <tr>\n                <td>Ports</td>\n                <td>\n                    1 USB Type-A 10Gbps signaling rate<br>\n                    1 USB Type-A 10Gbps signaling rate (HP Sleep and Charge)<br>\n                    2 Thunderbolt™ 4 with USB Type-C® 40Gbps signaling rate<br>\n                    1 HDMI 2.1; 1 headphone/microphone combo<br>\n                    slots:<br>\n                    1 multi-format SD media card reader\n                </td>\n            </tr>\n            <tr>\n                <td>Dimensions & Weight</td>\n                <td>\n                    Height: 0.73 in.<br>\n                    Width: 14.13 in.<br>\n                    Depth: 9.02 in.<br>\n                    Weight: 4 lb.\n                </td>\n            </tr>\n            <tr>\n                <td>Camera</td>\n                <td>\n                    5 MP RGB-IR camera with electronic shutter and integrated wide-range microphone array<br>\n                    (1 front-facing individual, 1 world-facing conference mode)\n                </td>\n            </tr>\n            <tr>\n                <td>Audio and Speakers</td>\n                <td>Audio by Bang & Olufsen; Dual speakers; HP Audio Boost</td>\n            </tr>\n            <tr>\n                <td>Wireless</td>\n                <td>Intel® Wi-Fi 6E AX211 (2x2) and Bluetooth® 5.3 wireless card</td>\n            </tr>\n            <tr>\n                <td>Primary Battery</td>\n                <td>3-cell, 51 Wh Li-ion polymer. Up to 12 hours. 50% in 30 minutes</td>\n            </tr>\n            <tr>\n                <td>Power</td>\n                <td>65 W USB Type-C® power adapter</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        '13th Intel® Core™ i5, 15.6\" FHD (1920 x 1080)<br> Intel® Iris® Xᵉ Graphics, 16 GB RAM, 1 TB SSD', 'i5-1335U',
        'HP Envy x360 2-in-1 Laptop 15-ew1047nr'),
       (7, 2, 'HP Envy x360 2-в-1 Ноутбук 15',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Расширенные характеристики:</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Процессор</td>\n                <td>Intel® Core™ i5-1335U (up to 4.6 GHz with Intel®, 12 MB L3 cache, 10 cores, 12 threads)</td>\n            </tr>\n            <tr>\n                <td>Операционная система</td>\n                <td>Windows 11 Про, Английская</td>\n            </tr>\n            <tr>\n                <td>Графическая карта</td>\n                <td>Интегрирована: Intel® Iris® Xᵉ Graphics</td>\n            </tr>\n            <tr>\n                <td>Дисплей</td>                \n                <td>\n                    15.6\" diagonal, FHD (1920 x 1080), multitouch-enabled, IPS, edge-to-edge glass,<br>\n                    micro-edge, 400 nits, low power, 100% sRGB\n                </td>\n            </tr>\n            <tr>\n                <td>Оперативная память</td>\n                <td>16 GB DDR4-3200 MHz RAM (2 x 8 GB)</td>\n            </tr>\n            <tr>\n                <td>Постоянная память</td>\n                <td>1 TB PCIe® Gen4 NVMe™ TLC M.2 SSD</td>\n            </tr>\n            <tr>\n                <td>Корпус</td>\n                <td>Минеральный серебрянный алюминиум</td>\n            </tr>\n            <tr>\n                <td>Клавиатура</td>\n                <td>Full-size, backlit, moonstone grey keyboard</td>\n            </tr>\n            <tr>\n                <td>Порты</td>\n                <td>\n                    1 USB Type-A 10Gbps signaling rate<br>\n                    1 USB Type-A 10Gbps signaling rate (HP Sleep and Charge)<br>\n                    2 Thunderbolt™ 4 with USB Type-C® 40Gbps signaling rate<br>\n                    1 HDMI 2.1; 1 headphone/microphone combo<br>\n                    Слоты:<br>\n                    1 multi-format SD media card reader\n                </td>\n            </tr>\n            <tr>\n                <td>Размеры и вес</td>\n                <td>\n                    Высота: 0.73 in.<br>\n                    Ширина: 14.13 in.<br>\n                    Глубина: 9.02 in.<br>\n                    Вес: 4 lb.\n                </td>\n            </tr>\n            <tr>\n                <td>Камера</td>\n                <td>\n                    HP True Vision 5MP IR camera with camera shutter, temporal noise reduction<br>\n                    and integrated dual array digital microphones\n                </td>\n            </tr>\n            <tr>\n                <td>Аудио и колонки</td>\n                <td>Audio by Bang & Olufsen; Двойные стереодинамики; HP Audio Boost</td>\n            </tr>\n            <tr>\n                <td>Беспроводная связь</td>\n                <td>Intel® Wi-Fi 6E AX211 (2x2) and Bluetooth® 5.3 wireless card</td>\n            </tr>\n            <tr>\n                <td>Основной аккумулятор</td>\n                <td>3-cell, 51 Wh Li-ion полимер. Работа до 12 часов, 50% за 30 минут</td>\n            </tr>\n            <tr>\n                <td>Питание</td>\n                <td>65 W USB Type-C® power adapter</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        '13th Intel® Core™ i5, 15.6\" FHD (1920 x 1080)<br> Intel® Iris® Xᵉ Graphics, 16 GB RAM, 1 TB SSD', 'i5-1335U',
        'HP Envy x360 2-в-1 Ноутбук 15-ew1047nr'),
       (8, 1, 'HP Pavilion Laptop 15.6\"',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>Intel® Core™ i7-1355U (up to 5.0 GHz, 12 MB L3 cache, 10 cores, 12 threads)</td></tr><tr><td>Operating System</td><td>Windows 11 Pro, English</td></tr><tr><td>Graphics Card</td><td>Integrated: Intel® Iris® Xe Graphics</td></tr><tr><td>Display</td><td>15.6\" diagonal, FHD (1920 x 1080), IPS, micro-edge, BrightView, 250 nits</td></tr><tr><td>Memory</td><td>16 GB DDR4-3200 SDRAM (2 x 8 GB)</td></tr><tr><td>Storage</td><td>1 TB PCIe® NVMe™ M.2 SSD</td></tr><tr><td>Case</td><td>Aluminium. Natural silver</td></tr><tr><td>Keyboard</td><td>Full-size, backlit, natural silver keyboard with numeric keypad</td></tr><tr><td>Ports</td><td>1 USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)<br>2 USB Type-A 5Gbps signaling rate<br>1 HDMI 2.1; 1 AC smart pin<br>1 headphone/microphone comboophone combo</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height: 0.7 in.<br>Width: 14.18 in.<br>Depth: 9.21 in.<br>Weight: 3.86 lb.</td></tr><tr><td>Camera</td><td>HP Wide Vision 720p HD camera with temporal noise reduction<br>and integrated dual array digital microphones.</td></tr><tr><td>Audio and Speakers</td><td>Audio by Bang &amp; Olufsen; Dual speakers; HP Audio Boost</td></tr><tr><td>Wireless</td><td>MediaTek Wi-Fi 6 MT7921 (2x2) and Bluetooth® 5.3 wireless card</td></tr><tr><td>Primary Battery</td><td>3-cell, 41 Wh Lithium-ion prismatic Battery. 50% in 30 minutes</td></tr><tr><td>Power</td><td>65 W Smart AC power adapter</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i7-1355U 15.6\" (1920 x 1080)<br> Intel® Iris® Xe Graphics, 16 GB RAM 1 TB SSD',
        'i7-1355U', 'HP Pavilion Laptop 15t-eg300, 15.6\"'),
       (8, 2, 'HP Pavilion Ноутбук 15.6\"',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>Intel® Core™ i7-1355U (up to 5.0 GHz, 12 MB L3 cache, 10 cores, 12 threads)</td></tr><tr><td>Операционная система</td><td>Windows 11 Про, Английская</td></tr><tr><td>Графическая карта</td><td>Интегрирована: Intel® Iris® Xe Graphics</td></tr><tr><td>Дисплей</td><td>15.6\" diagonal, FHD (1920 x 1080), IPS, micro-edge, BrightView, 250 nits</td></tr><tr><td>Оперативная память</td><td>16 GB DDR4-3200 SDRAM (2 x 8 GB)</td></tr><tr><td>Постоянная память</td><td>1 TB PCIe® NVMe™ M.2 SSD</td></tr><tr><td>Корпус</td><td>Алюминиум Натуральный серебрянный</td></tr><tr><td>Клавиатура</td><td>Full-size, backlit, natural silver keyboard with numeric keypad</td></tr><tr><td>Порты</td><td>1 USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)<br>2 USB Type-A 5Gbps signaling rate<br>1 HDMI 2.1; 1 AC smart pin<br>1 headphone/microphone comboophone combo</td></tr><tr><td>Размеры и вес</td><td>Высота: 0.7 in.<br>Ширина: 14.18 in.<br>Глубина: 9.21 in.<br>Вес: 3.86 lb.</td></tr><tr><td>Камера</td><td>HP Wide Vision 720p HD camera with temporal noise reduction<br>and integrated dual array digital microphones.</td></tr><tr><td>Аудио и колонки</td><td>Audio by Bang &amp; Olufsen; Двойные стереодинамики; HP Audio Boost</td></tr><tr><td>Беспроводная связь</td><td>MediaTek Wi-Fi 6 MT7921 (2x2) and Bluetooth® 5.3 wireless card</td></tr><tr><td>Основной аккумулятор</td><td>3-cell, 41 Wh Lithium-ion полимер. 50% за 45 минут</td></tr><tr><td>Питание</td><td>65 W Smart AC power adapter</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i7-1355U 15.6\" (1920 x 1080)<br> Intel® Iris® Xe Graphics, 16 GB RAM 1 TB SSD',
        'i7-1355U', 'HP Pavilion Laptop 15t-eg300, 15.6\"'),
       (9, 1, 'HP Spectre x360 16\" 2-in-1 Laptop',
        '<p>Intel® Core™ i7-13700H 16\" UHD+ (3840 x 2400)&lt;br&gt;<br>Intel® Arc™ A370M Graphics 4 GB, 32 Gb RAM, 1TB SSD</p>',
        'Intel® Core™ i7-13700H 16\" UHD+ (3840 x 2400)<br> Intel® Arc™ A370M Graphics 4 GB, 32 Gb RAM, 1TB SSD',
        'i7-1360P', 'HP Spectre x360 16\" 2-in-1 Laptop'),
       (9, 2, 'HP Spectre x360 16\" 2-in-1 Ноутбук',
        '<p>Intel® Core™ i7-13700H 16\" UHD+ (3840 x 2400)&lt;br&gt;<br>Intel® Arc™ A370M Graphics 4 GB, 32 Gb RAM, 1TB SSD</p>',
        'Intel® Core™ i7-13700H 16\" UHD+ (3840 x 2400)<br> Intel® Arc™ A370M Graphics 4 GB, 32 Gb RAM, 1TB SSD',
        'i7-1360P', 'HP Spectre x360 16\" 2-in-1 Ноутбук'),
       (10, 1, 'Dell OptiPlex Micro Form Factor',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Advanced features</i></th></tr></thead><tbody><tr><td>Processor</td><td>13th Gen Intel® Core™ i5-13500T (24 MB cache, 14 cores, 20 threads,<br>1.60 GHz to 4.60 GHz Turbo, 35W)</td></tr><tr><td>Operating System</td><td>Windows 11 Pro, English</td></tr><tr><td>Graphics Card</td><td>Integrated: Intel® Iris® Xe Graphics</td></tr><tr><td>Memory</td><td>16 GB DDR4-3200 SDRAM (2 x 8 GB)</td></tr><tr><td>Storage</td><td>256 GB, M.2 2230, PCIe NVMe, SSD, Class 35</td></tr><tr><td>Keyboard</td><td>English US non-backlit Dell keyboard KB216</td></tr><tr><td>Ports</td><td>Front:<br>2 USB 3.2 Gen 1 ports<br>1 Universal audio ports<br>Rear:<br>1 RJ45 Ethernet port<br>1 optional video port (HDMI 2.1b/DisplayPort 1.4a (HBR3)/VGA/USB<br>Type-C with DisplayPort Alt mode + power in)<br>1 optional PS2/Serial port<br>1 USB 2.0 port<br>1 USB 2.0 port with Smart Power On<br>2 USB 3.2 Gen 1 ports<br>1 DisplayPort 1.4a (HBR2)<br>1 HDMI 1.4b port (1920x1200@60Hz)<br>1 power-adapter port</td></tr><tr><td>Slots</td><td>1 M.2 2230 slot for Wi-Fi and Bluetooth card<br>1 slot for M.2 2230 or M.2 2280 SSD<br>1 SATA slot for 2.5-inch HDD</td></tr><tr><td>Dimensions &amp; Weight</td><td>Height: 7.17 in. (182 mm)<br>Width: 1.42 in. (36 mm)<br>Depth: 7.01 in. (178 mm)<br>Weight: 2.41 lb (1.09 kg)</td></tr><tr><td>Wireless</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card, internal antenna</td></tr><tr><td>Power</td><td>90 W AC adapter, 4.5 mm barrel</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i5-13500T<br>16 GB DDR4, 256 GB SSD', 'i5-13500T', 'OptiPlex Micro Form Factor'),
       (10, 2, 'Dell OptiPlex Micro Form Factor',
        '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><i>Расширенные характеристики:</i></th></tr></thead><tbody><tr><td>Процессор</td><td>13th Gen Intel® Core™ i5-13500T (24 MB cache, 14 cores, 20 threads,<br>1.60 GHz to 4.60 GHz Turbo, 35W)</td></tr><tr><td>Операционная система</td><td>Windows 11 Про, Английская</td></tr><tr><td>Графическая карта</td><td>Интегрирована: Intel® Iris® Xe Graphics</td></tr><tr><td>Оперативная память</td><td>16 GB, 1 x 16 GB, DDR4</td></tr><tr><td>Постоянная память</td><td>1 TB PCIe® NVMe™ M.2 SSD</td></tr><tr><td>Клавиатура</td><td>English US non-backlit Dell keyboard KB216</td></tr><tr><td>Порты</td><td>Front:<br>2 USB 3.2 Gen 1 ports<br>1 Universal audio ports<br>Rear:<br>1 RJ45 Ethernet port<br>1 optional video port (HDMI 2.1b/DisplayPort 1.4a (HBR3)/VGA/USB<br>Type-C with DisplayPort Alt mode + power in)<br>1 optional PS2/Serial port<br>1 USB 2.0 port<br>1 USB 2.0 port with Smart Power On<br>2 USB 3.2 Gen 1 ports<br>1 DisplayPort 1.4a (HBR2)<br>1 HDMI 1.4b port (1920x1200@60Hz)<br>1 power-adapter port</td></tr><tr><td>Slots</td><td>1 M.2 2230 slot for Wi-Fi and Bluetooth card<br>1 slot for M.2 2230 or M.2 2280 SSD<br>1 SATA slot for 2.5-inch HDD</td></tr><tr><td>Размеры и вес</td><td>Высота: 7.17 in. (182 mm)<br>Ширина: 1.42 in. (36 mm)<br>Глубина: 7.01 in. (178 mm)<br>Вес: 2.41 lb (1.09 kg)</td></tr><tr><td>Беспроводная связь</td><td>Intel® Wi-Fi 6E AX211, 2x2, 802.11ax, Bluetooth® wireless card, internal antenna</td></tr><tr><td>Питание</td><td>90 W AC adapter, 4.5 mm barrel</td></tr></tbody></table></figure>',
        '13ᵗʰ Gen Intel® Core™ i5-13500T<br>16 GB DDR4, 256 GB SSD', 'i5-13500T', 'OptiPlex Micro Form Factor'),
       (11, 1, 'Dell Vostro Small Form Factor',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Advanced features</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Processor</td>\n                <td>\n                    12th Gen Intel® Core™ i7-12700 (25 MB cache, 12 cores, 20 threads,\n                    2.10 GHz to 4.80 GHz Turbo)\n                </td>\n            </tr>\n            <tr>\n                <td>Operating System</td>\n                <td>Windows 11 Pro, English</td>\n            </tr>\n            <tr>\n                <td>Graphics Card</td>\n                <td>Integrated: Intel® UHD Graphics 770</td>\n            </tr>\n            <tr>\n                <td>Memory</td>\n                <td>16 GB, 1 x 16 GB, DDR4, 3200 MHz</td>\n            </tr>\n            <tr>\n                <td>Storage</td>\n                <td>512 GB, M.2, PCIe NVMe, SSD</td>\n            </tr>\n            <tr>\n                <td>Keyboard</td>\n                <td>Dell Multimedia Keyboard-KB216 Black (English)</td>\n            </tr>\n            <tr>\n                <td>Ports</td>\n                <td>\n                    Front:<br>\n                    2 USB 2.0 ports<br>\n                    2 USB 3.2 Gen 1 ports<br>\n                    1 Global headset jack<br>\n                    Back:<br>\n                    2 USB 2.0 ports with Smart Power<br>\n                    2 USB 3.2 Gen 1 ports<br>\n                    1 Audio line-out port<br>\n                    1 RJ-45 Ethernet port<br>\n                    1 AC power-supply port<br>\n                    1 HDMI 1.4b port\n                </td>\n            </tr>\n            <tr>\n                <td>Slots</td>\n                <td>\n                    1 SATA 3.0 ports<br>\n                    1 SATA 2.0 ports<br>\n                    1 PCIe x16 half-height slot<br>\n                    1 PCIe x1 half-height slot<br>\n                    1 M.2 2230 card slot for WiFi/Bluetooth combo card<br>\n                    1 M.2 2230/2280 card slots for solid-state drive\n                </td>\n            </tr>\n            <tr>\n                <td>Dimensions & Weight</td>\n                <td>\n                    Height: 11.42 in. (290 mm)<br>\n                    Width: 3.65 in. (926 mm)<br>\n                    Depth: 11.53 in. (293 mm)<br>\n                    Weight: 9.96 lbs. (4.52kg)\n                </td>\n            </tr>\n            <tr>\n                <td>Wireless</td>\n                <td>Realtek Wi-Fi 5 RTL8821CE, 1x1, 802.11ac, MU-MIMO, Bluetooth® wireless card</td>\n            </tr>\n            <tr>\n                <td>Power</td>\n                <td>180 W internal Power Supply Unit (PSU)</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        '12ᵗʰ Gen Intel® Core™ i7-12700<br> Intel® UHD Graphics 770, 16 GB DDR4, 512 GB SSD', 'i7-12700',
        'Dell Vostro Small Form Factor'),
       (11, 2, 'Dell Vostro Small Form Factor',
        '<div class=\"table-responsive cart-table\">\n    <table class=\"table text-start\">\n        <thead>\n        <tr>\n            <th colspan=\"2\" scope=\"col\"><i>Расширенные характеристики:</i></th>\n        </tr>\n        </thead>\n        <tbody>\n            <tr class=\"align-middle\">\n                <td>Процессор</td>\n                <td>\n                    12th Gen Intel® Core™ i7-12700 (25 MB cache, 12 cores, 20 threads,\n                    2.10 GHz to 4.80 GHz Turbo)\n                </td>\n            </tr>\n            <tr>\n                <td>Операционная система</td>\n                <td>Windows 11 Про, Английская</td>\n            </tr>\n            <tr>\n                <td>Графическая карта</td>\n                <td>Интегрирована: Intel® UHD Graphics 770</td>\n            </tr>\n            <tr>\n                <td>Оперативная память</td>\n                <td>16 GB, 1 x 16 GB, DDR4, 3200 MHz</td>\n            </tr>\n            <tr>\n                <td>Постоянная память</td>\n                <td>512 GB, M.2, PCIe NVMe, SSD</td>\n            </tr>\n            <tr>\n                <td>Клавиатура</td>\n                <td>Dell Multimedia Keyboard-KB216 Black (English)</td>\n            </tr>\n            <tr>\n                <td>Порты</td>\n                <td>\n                    Спереди:<br>\n                    2 USB 2.0 порт<br>\n                    2 USB 3.2 Gen 1 порт<br>\n                    1 Global headset jack<br>\n                    Сзади:<br>\n                    2 USB 2.0 порт with Smart Power<br>\n                    2 USB 3.2 Gen 1 порт<br>\n                    1 Audio line-out порт<br>\n                    1 RJ-45 Ethernet порт<br>\n                    1 AC power-supply порт<br>\n                    1 HDMI 1.4b порт<br>\n                </td>\n            </tr>\n            <tr>\n                <td>Слоты</td>\n                <td>\n                    1 SATA 3.0 порт<br>\n                    1 SATA 2.0 порт<br>\n                    1 PCIe x16 half-height слот<br>\n                    1 PCIe x1 half-height слот<br>\n                    1 M.2 2230 card слот for WiFi/Bluetooth combo card<br>\n                    1 M.2 2230/2280 card слот for solid-state drive\n                </td>\n            </tr>\n            <tr>\n                <td>Размеры и вес</td>\n                <td>\n                    Высота: 11.42 in. (290 mm)<br>\n                    Ширина: 3.65 in. (926 mm)<br>\n                    Глубина: 11.53 in. (293 mm)<br>\n                    Вес: 9.96 lbs. (4.52kg)\n                </td>\n            </tr>\n            <tr>\n                <td>Беспроводная связь</td>\n                <td>Realtek Wi-Fi 5 RTL8821CE, 1x1, 802.11ac, MU-MIMO, Bluetooth® wireless card</td>\n            </tr>\n            <tr>\n                <td>Питание</td>\n                <td>180 W internal Power Supply Unit (PSU)</td>\n            </tr>\n        </tbody>\n    </table>\n</div>',
        '12ᵗʰ Gen Intel® Core™ i7-12700<br> Intel® UHD Graphics 770, 16 GB DDR4, 512 GB SSD', 'i7-12700',
        'Dell Vostro Small Form Factor');
/*!40000 ALTER TABLE `product_description`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_download`
--

DROP TABLE IF EXISTS `product_download`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_download`
(
    `product_id`  int unsigned NOT NULL,
    `download_id` int unsigned NOT NULL,
    PRIMARY KEY (`product_id`, `download_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_download`
--

LOCK TABLES `product_download` WRITE;
/*!40000 ALTER TABLE `product_download`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `product_download`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_gallery`
--

DROP TABLE IF EXISTS `product_gallery`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_gallery`
(
    `id`         int unsigned                                                  NOT NULL AUTO_INCREMENT,
    `product_id` int unsigned                                                  NOT NULL,
    `img`        varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 73
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_gallery`
--

LOCK TABLES `product_gallery` WRITE;
/*!40000 ALTER TABLE `product_gallery`
    DISABLE KEYS */;
INSERT INTO `product_gallery`
VALUES (1, 1, '/uploads/images/products/XPS-13/XPS-13-1.png'),
       (2, 1, '/uploads/images/products/XPS-13/XPS-13-2.png'),
       (3, 1, '/uploads/images/products/XPS-13/XPS-13-3.png'),
       (4, 1, '/uploads/images/products/XPS-13/XPS-13-4.png'),
       (5, 1, '/uploads/images/products/XPS-13/XPS-13-5.png'),
       (6, 1, '/uploads/images/products/XPS-13/XPS-13-6.png'),
       (7, 1, '/uploads/images/products/XPS-13/XPS-13-7.png'),
       (8, 1, '/uploads/images/products/XPS-13/XPS-13-8.png'),
       (9, 2, '/uploads/images/products/XPS-15/XPS-15-1.png'),
       (10, 2, '/uploads/images/products/XPS-15/XPS-15-2.png'),
       (11, 2, '/uploads/images/products/XPS-15/XPS-15-3.png'),
       (12, 2, '/uploads/images/products/XPS-15/XPS-15-4.png'),
       (13, 2, '/uploads/images/products/XPS-15/XPS-15-5.png'),
       (14, 3, '/uploads/images/products/Inspiron-15/imprision-15-1.png'),
       (15, 3, '/uploads/images/products/Inspiron-15/imprision-15-2.png'),
       (16, 3, '/uploads/images/products/Inspiron-15/imprision-15-3.png'),
       (17, 3, '/uploads/images/products/Inspiron-15/imprision-15-4.png'),
       (18, 3, '/uploads/images/products/Inspiron-15/imprision-15-5.png'),
       (19, 3, '/uploads/images/products/Inspiron-15/imprision-15-6.png'),
       (20, 3, '/uploads/images/products/Inspiron-15/imprision-15-7.png'),
       (21, 3, '/uploads/images/products/Inspiron-15/imprision-15-8.png'),
       (22, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-1.png'),
       (23, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-2.png'),
       (24, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-3.png'),
       (25, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-4.png'),
       (26, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-5.png'),
       (27, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-6.png'),
       (28, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-7.png'),
       (29, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-8.png'),
       (30, 4, '/uploads/images/products/Latitude-5540/Latitude%203540-9.png'),
       (31, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-1.png'),
       (32, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-2.png'),
       (33, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-3.png'),
       (34, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-4.png'),
       (35, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-5.png'),
       (36, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-6.png'),
       (37, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-7.png'),
       (38, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-8.png'),
       (39, 5, '/uploads/images/products/Vostro-7620/Vostro-7620-main-9.png'),
       (40, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08547210.png'),
       (41, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08547240.png'),
       (42, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08547270.png'),
       (43, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08539588.png'),
       (44, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08539699.png'),
       (45, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08547301.png'),
       (46, 6, '/uploads/images/products/HP-Dragonfly-Pro/c08547331.png'),
       (47, 7, '/uploads/images/products/HP-Envy-x360/c08464459.png'),
       (48, 7, '/uploads/images/products/HP-Envy-x360/c08464399.png'),
       (49, 7, '/uploads/images/products/HP-Envy-x360/c08520388.png'),
       (50, 7, '/uploads/images/products/HP-Envy-x360/c08464489.png'),
       (51, 7, '/uploads/images/products/HP-Envy-x360/c08464279.png'),
       (52, 7, '/uploads/images/products/HP-Envy-x360/c08522866.png'),
       (53, 7, '/uploads/images/products/HP-Envy-x360/c08522835.png'),
       (54, 8, '/uploads/images/products/HP-Pavilion/c06723390.png'),
       (55, 8, '/uploads/images/products/HP-Pavilion/c08114715.png'),
       (56, 8, '/uploads/images/products/HP-Pavilion/c08396244.png'),
       (57, 8, '/uploads/images/products/HP-Pavilion/c06723336.png'),
       (58, 8, '/uploads/images/products/HP-Pavilion/c07961523.png'),
       (59, 9, '/uploads/images/products/HP-Spectre-x360/c07833371.png'),
       (60, 9, '/uploads/images/products/HP-Spectre-x360/c07871902.png'),
       (61, 9, '/uploads/images/products/HP-Spectre-x360/c08347193.png'),
       (62, 9, '/uploads/images/products/HP-Spectre-x360/c08347244.png'),
       (63, 9, '/uploads/images/products/HP-Spectre-x360/c08410726.png'),
       (64, 9, '/uploads/images/products/HP-Spectre-x360/c07760496.png'),
       (65, 9, '/uploads/images/products/HP-Spectre-x360/c07760633.png'),
       (66, 10, '/uploads/images/products/OptiPlex-Micro-Form-Factor/desktop-optiplex-7010-1.png'),
       (67, 10, '/uploads/images/products/OptiPlex-Micro-Form-Factor/desktop-optiplex-7010-2.png'),
       (68, 10, '/uploads/images/products/OptiPlex-Micro-Form-Factor/desktop-optiplex-7010-3.png'),
       (69, 10, '/uploads/images/products/OptiPlex-Micro-Form-Factor/desktop-optiplex-7010-4.png'),
       (70, 11, '/uploads/images/products/Vostro-Small-Form-Factor/Dell-Vostro-Small-2.png'),
       (71, 11, '/uploads/images/products/Vostro-Small-Form-Factor/Dell-Vostro-Small-3.png'),
       (72, 11, '/uploads/images/products/Vostro-Small-Form-Factor/Dell-Vostro-Small-4.png');
/*!40000 ALTER TABLE `product_gallery`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider`
(
    `id`  int unsigned                                                  NOT NULL AUTO_INCREMENT,
    `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider`
    DISABLE KEYS */;
INSERT INTO `slider`
VALUES (1, '/uploads/images/slider/1.jpg'),
       (2, '/uploads/images/slider/2.jpg'),
       (3, '/uploads/images/slider/3.jpg'),
       (4, '/uploads/images/slider/4.jpg');
/*!40000 ALTER TABLE `slider`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user`
(
    `id`       int unsigned                                                           NOT NULL AUTO_INCREMENT,
    `email`    varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci           NOT NULL,
    `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci          NOT NULL,
    `name`     varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci          NOT NULL,
    `address`  varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci          NOT NULL,
    `role`     enum ('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user`
    DISABLE KEYS */;
INSERT INTO `user`
VALUES (1, 'admin@mail.com',
        '$argon2i$v=19$m=65536,t=4,p=1$ZWIySTAyVXcveUlaeDY4RQ$FRAG3Ar+zv8N887TBN1hzgk8J5HoosWneLkuXhFy8OU',
        'James Bond', 'PO BOX 10077B', 'admin');
/*!40000 ALTER TABLE `user`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2023-08-29 22:26:23
