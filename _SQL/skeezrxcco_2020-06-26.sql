# ************************************************************
# Sequel Pro SQL dump
# Version (null)
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 8.0.20)
# Database: skeezrxcco
# Generation Time: 2020-06-26 21:21:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(2,NULL,1,'design','design','2020-06-12 21:36:48','2020-06-19 16:29:29'),
	(5,NULL,1,'movies','movies','2020-06-12 22:01:22','2020-06-12 22:01:22'),
	(6,NULL,1,'hactivismo','hactivismo','2020-06-19 16:28:08','2020-06-19 16:28:08'),
	(7,NULL,1,'life','life','2020-06-19 16:29:42','2020-06-19 16:29:42'),
	(8,NULL,1,'seleção','selecao','2020-06-19 16:30:08','2020-06-19 16:30:08'),
	(9,NULL,1,'musica','musica','2020-06-19 16:30:17','2020-06-19 16:30:17'),
	(10,NULL,1,'ténis','tenis','2020-06-19 16:30:41','2020-06-19 16:30:41'),
	(11,NULL,1,'black lives matter','black-lives-matter','2020-06-19 16:31:06','2020-06-19 16:31:06'),
	(12,NULL,1,'LGBT','lgbt','2020-06-19 16:31:17','2020-06-19 16:31:17'),
	(13,NULL,1,'filmes','filmes','2020-06-19 16:31:25','2020-06-19 16:31:25'),
	(14,NULL,1,'Estilos','estilo','2020-06-19 20:49:32','2020-06-19 20:49:54'),
	(15,NULL,1,'Vidas','vidas','2020-06-19 20:51:44','2020-06-19 20:51:44'),
	(16,NULL,1,'Negócios','negocios','2020-06-19 20:58:08','2020-06-19 20:58:08');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `commentable_id` int NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `content`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`)
VALUES
	(15,'dddddd',1,9,'App\\Post','2020-06-26 12:47:11','2020-06-26 12:47:11'),
	(16,'ohhhhh shiiiittttt',1,9,'App\\Post','2020-06-26 12:47:48','2020-06-26 12:47:48'),
	(17,'Your email address will not be published',1,16,'App\\Comment','2020-06-26 12:47:58','2020-06-26 12:47:58'),
	(18,'lol',1,15,'App\\Comment','2020-06-26 12:55:04','2020-06-26 12:55:04'),
	(19,'yeap',1,16,'App\\Comment','2020-06-26 12:55:14','2020-06-26 12:55:14');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`)
VALUES
	(1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),
	(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),
	(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),
	(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),
	(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),
	(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),
	(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),
	(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),
	(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),
	(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
	(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
	(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),
	(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),
	(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),
	(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),
	(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),
	(22,4,'id','number','ID',1,0,0,0,0,0,'{}',1),
	(23,4,'parent_id','select_dropdown','Parent',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),
	(24,4,'order','text','Order',1,1,1,1,1,1,'{\"default\":1}',3),
	(25,4,'name','text','Name',1,1,1,1,1,1,'{}',4),
	(26,4,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),
	(27,4,'created_at','timestamp','Created At',0,0,1,0,0,0,'{}',6),
	(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),
	(29,5,'id','number','ID',1,0,0,0,0,0,'{}',1),
	(30,5,'author_id','text','Author',1,0,1,1,0,1,'{}',2),
	(31,5,'category_id','text','Category',0,0,1,1,1,0,'{}',3),
	(32,5,'title','text','Title',1,1,1,1,1,1,'{}',4),
	(33,5,'excerpt','text_area','Excerpt',0,0,1,1,1,1,'{}',5),
	(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,'{}',6),
	(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),
	(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),
	(37,5,'meta_description','text_area','Meta Description',0,0,1,1,1,1,'{}',9),
	(38,5,'meta_keywords','text_area','Meta Keywords',0,0,1,1,1,1,'{}',10),
	(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),
	(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',12),
	(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),
	(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,'{}',14),
	(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,'{}',15),
	(44,6,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(45,6,'author_id','text','Author',1,0,0,0,0,0,NULL,2),
	(46,6,'title','text','Title',1,1,1,1,1,1,NULL,3),
	(47,6,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,4),
	(48,6,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,5),
	(49,6,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),
	(50,6,'meta_description','text','Meta Description',1,0,1,1,1,1,NULL,7),
	(51,6,'meta_keywords','text','Meta Keywords',1,0,1,1,1,1,NULL,8),
	(52,6,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),
	(53,6,'created_at','timestamp','Created At',1,1,1,0,0,0,NULL,10),
	(54,6,'updated_at','timestamp','Updated At',1,0,0,0,0,0,NULL,11),
	(55,6,'image','image','Page Image',0,1,1,1,1,1,NULL,12),
	(56,5,'post_belongstomany_tag_relationship','relationship','tags',0,1,1,1,1,1,'{\"model\":\"App\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"post_tag\",\"pivot\":\"1\",\"taggable\":\"on\"}',16),
	(57,7,'id','text','Id',1,0,0,0,0,0,'{}',1),
	(58,7,'name','text','Name',1,1,1,1,1,1,'{}',2),
	(59,7,'slug','text','Slug',1,1,1,1,1,1,'{}',3),
	(60,7,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),
	(61,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),
	(62,5,'post_belongsto_category_relationship','relationship','categories',0,1,1,0,0,1,'{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',17),
	(63,5,'link','text','Link',0,1,1,1,1,1,'{}',16);

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`)
VALUES
	(1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(4,'categories','categories','Category','Categories','sss','TCG\\Voyager\\Models\\Category',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-06-12 21:36:48','2020-06-12 22:15:31'),
	(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy',NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-06-12 21:36:48','2020-06-12 22:11:42'),
	(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(7,'tags','tags','Tag','Tags','voyager-tag','App\\Tag',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-06-12 21:55:25','2020-06-12 22:13:59');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`)
VALUES
	(1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2020-06-12 21:36:48','2020-06-12 21:36:48','voyager.dashboard',NULL),
	(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2020-06-12 21:36:48','2020-06-12 22:06:28','voyager.media.index',NULL),
	(3,1,'Users','','_self','voyager-person',NULL,NULL,6,'2020-06-12 21:36:48','2020-06-12 22:06:28','voyager.users.index',NULL),
	(4,1,'Roles','','_self','voyager-lock',NULL,3,1,'2020-06-12 21:36:48','2020-06-12 21:56:21','voyager.roles.index',NULL),
	(5,1,'Tools','','_self','voyager-tools',NULL,NULL,8,'2020-06-12 21:36:48','2020-06-12 22:06:28',NULL,NULL),
	(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2020-06-12 21:36:48','2020-06-12 21:55:41','voyager.menus.index',NULL),
	(7,1,'Database','','_self','voyager-data',NULL,5,2,'2020-06-12 21:36:48','2020-06-12 21:55:41','voyager.database.index',NULL),
	(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2020-06-12 21:36:48','2020-06-12 21:55:41','voyager.compass.index',NULL),
	(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2020-06-12 21:36:48','2020-06-12 21:55:41','voyager.bread.index',NULL),
	(10,1,'Settings','','_self','voyager-settings',NULL,NULL,9,'2020-06-12 21:36:48','2020-06-12 22:06:28','voyager.settings.index',NULL),
	(11,1,'Categories','','_self','voyager-categories',NULL,NULL,3,'2020-06-12 21:36:48','2020-06-12 22:06:30','voyager.categories.index',NULL),
	(12,1,'Posts','','_self','voyager-news',NULL,NULL,2,'2020-06-12 21:36:48','2020-06-12 21:55:52','voyager.posts.index',NULL),
	(13,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2020-06-12 21:36:48','2020-06-12 22:06:28','voyager.pages.index',NULL),
	(14,1,'Hooks','','_self','voyager-hook',NULL,5,5,'2020-06-12 21:36:48','2020-06-12 21:55:41','voyager.hooks',NULL),
	(15,1,'Tags','','_self',NULL,NULL,NULL,4,'2020-06-12 21:55:25','2020-06-12 22:06:30','voyager.tags.index',NULL);

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2020-06-12 21:36:48','2020-06-12 21:36:48');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2016_01_01_000000_add_voyager_user_fields',1),
	(4,'2016_01_01_000000_create_data_types_table',1),
	(5,'2016_01_01_000000_create_pages_table',1),
	(6,'2016_01_01_000000_create_posts_table',1),
	(7,'2016_02_15_204651_create_categories_table',1),
	(8,'2016_05_19_173453_create_menu_table',1),
	(9,'2016_10_21_190000_create_roles_table',1),
	(10,'2016_10_21_190000_create_settings_table',1),
	(11,'2016_11_30_135954_create_permission_table',1),
	(12,'2016_11_30_141208_create_permission_role_table',1),
	(13,'2016_12_26_201236_data_types__add__server_side',1),
	(14,'2017_01_13_000000_add_route_to_menu_items_table',1),
	(15,'2017_01_14_005015_create_translations_table',1),
	(16,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),
	(17,'2017_03_06_000000_add_controller_to_data_types_table',1),
	(18,'2017_04_11_000000_alter_post_nullable_fields_table',1),
	(19,'2017_04_21_000000_add_order_to_data_rows_table',1),
	(20,'2017_07_05_210000_add_policyname_to_data_types_table',1),
	(21,'2017_08_05_000000_add_group_to_settings_table',1),
	(22,'2017_11_26_013050_add_user_role_relationship',1),
	(23,'2017_11_26_015000_create_user_roles_table',1),
	(24,'2018_03_11_000000_add_user_settings',1),
	(25,'2018_03_14_000000_add_details_to_data_types_table',1),
	(26,'2018_03_16_000000_make_settings_value_nullable',1),
	(27,'2018_06_30_113500_create_comments_table',1),
	(28,'2019_08_19_000000_create_failed_jobs_table',1),
	(29,'2020_06_12_154140_create_tags_table',1),
	(31,'2020_06_12_213745_create_post_tag_table',2),
	(32,'2020_06_26_100650_create_comments_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`)
VALUES
	(1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2020-06-12 21:36:48','2020-06-12 21:36:48');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`)
VALUES
	(1,'browse_admin',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(2,'browse_bread',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(3,'browse_database',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(4,'browse_media',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(5,'browse_compass',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(6,'browse_menus','menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(7,'read_menus','menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(8,'edit_menus','menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(9,'add_menus','menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(10,'delete_menus','menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(11,'browse_roles','roles','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(12,'read_roles','roles','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(13,'edit_roles','roles','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(14,'add_roles','roles','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(15,'delete_roles','roles','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(16,'browse_users','users','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(17,'read_users','users','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(18,'edit_users','users','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(19,'add_users','users','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(20,'delete_users','users','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(21,'browse_settings','settings','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(22,'read_settings','settings','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(23,'edit_settings','settings','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(24,'add_settings','settings','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(25,'delete_settings','settings','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(26,'browse_categories','categories','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(27,'read_categories','categories','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(28,'edit_categories','categories','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(29,'add_categories','categories','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(30,'delete_categories','categories','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(31,'browse_posts','posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(32,'read_posts','posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(33,'edit_posts','posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(34,'add_posts','posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(35,'delete_posts','posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(36,'browse_pages','pages','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(37,'read_pages','pages','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(38,'edit_pages','pages','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(39,'add_pages','pages','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(40,'delete_pages','pages','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(41,'browse_hooks',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(42,'browse_tags','tags','2020-06-12 21:55:25','2020-06-12 21:55:25'),
	(43,'read_tags','tags','2020-06-12 21:55:25','2020-06-12 21:55:25'),
	(44,'edit_tags','tags','2020-06-12 21:55:25','2020-06-12 21:55:25'),
	(45,'add_tags','tags','2020-06-12 21:55:25','2020-06-12 21:55:25'),
	(46,'delete_tags','tags','2020-06-12 21:55:25','2020-06-12 21:55:25');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table post_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_tag`;

CREATE TABLE `post_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table post_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_types`;

CREATE TABLE `post_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `post_types` WRITE;
/*!40000 ALTER TABLE `post_types` DISABLE KEYS */;

INSERT INTO `post_types` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'musica','musica','2020-06-22 07:03:20','2020-06-22 07:03:20'),
	(2,'tenis','tenis','2020-06-22 07:03:41','2020-06-22 07:03:41'),
	(3,'novidades','novidades','2020-06-22 07:03:52','2020-06-22 07:03:52'),
	(4,'hacktivismo','hacktivismo','2020-06-22 07:09:47','2020-06-22 07:09:47');

/*!40000 ALTER TABLE `post_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postType_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `link`, `postType_id`)
VALUES
	(5,1,9,'Billie Eilish Slams Body Shamers in Powerful Short Film',NULL,'Not My Responsibility. The video originally debuted in March during her Where Do We Go? world tour and sends a powerful message about body positivity.','<div class=\"ad-in-post-slot ad-in-post-slot--hidden\" style=\"box-sizing: border-box; border-width: 1px 0px; border-image: initial; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; opacity: 0; transition: opacity 0.35s ease-out 0s; height: 0px; overflow: hidden; position: relative; color: #2e2e2e; padding: 0px !important; border-color: #d6d6d6 initial #d6d6d6 initial; border-style: solid initial solid initial; margin: 0px !important 0px !important 2.82353rem 0px !important;\">\r\n<div style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">\r\n<div id=\"ad-in-post-74\" class=\"ad-inline-creative\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">The video was written and produced by Eilish. In the clip, the Grammy-winner is seen alone in the dark, where she strips down from her signature loose clothes before being submerged in black water, while a voiceover addressed the commentary she has faced based on her style and perceived body type.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">&ldquo;Some people hate what I wear, some people praise it. Some people use it to shame others, some people use it to shame me. But I feel you watching, always. And nothing I do goes unseen,&rdquo; Eilish says&nbsp;as she sheds the layers.&nbsp;&ldquo;If I wear what is comfortable, I am not a woman.&nbsp;If I shed the layers, I&rsquo;m a slut. Though you&rsquo;ve never seen my body, you still judge it and judge me for it.&rdquo;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Towards the end, before she disappears Eilish asks&nbsp;&ldquo;Would you like me to be smaller? Weaker? Softer? Taller? Would you like me to be quiet? Do my shoulders provoke you?&rdquo;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Watch the powerful clip below.</p>','posts/June2020/3CIxSuiOqzbCnZbqs6kA.jpg','billie-eilish-slams-body-shamers-in-powerful-short-film',NULL,NULL,'PUBLISHED',1,'2020-06-19 17:16:59','2020-06-19 20:46:56',NULL,1),
	(6,1,8,'Bjarke Ingels on Audemars Piguet & Designing for the Year 2175',NULL,'not just aspiration — claiming good health, success, and even love can be achieved with a #lifehack. To do things any other way is regarded as old-fashioned, or even odd.','<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e;\">Speed and ephemerality are&nbsp;at the core of contemporary culture. We buy clothes with a built-in expiration date, showing them off on an app where the photo deletes after 24 hours, sent using a phone that will soon be obsolete. Targeted adverts preach efficiency &mdash; not just aspiration &mdash; claiming good health, success, and even love can be achieved with a #lifehack. To do things any other way is regarded as old-fashioned, or even odd.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e;\">Lifestyles have become fluid, allowing us to rebound between jobs, apartments, and countries. Meanwhile on the news, crisis supercedes crisis, so much so that stability feels like a quaint ideal. Only a deadly pandemic affords us respite from the relentless immediacy of &ldquo;right now.&rdquo;</p>\r\n<div class=\"slider-element element element--align-normal\" style=\"box-sizing: border-box; margin: 2.82353rem auto; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; max-width: 40rem; clear: both; color: #2e2e2e;\">\r\n<figure class=\"slider-single-image\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; position: relative;\" data-behavior=\"zoomable\" data-view=\"image-element\">\r\n<div class=\"aspect-ratio-placeholder  image responsive-image\" style=\"box-sizing: border-box; margin: 0px auto; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; position: relative; max-width: 1200px;\">&nbsp;</div>\r\n</figure>\r\n</div>\r\n<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">But there are others attuned to thinking outside the bubble, working in light-years and unafraid to contend with weighty subjects like permanence and forever. People like Danish architect Bjarke Ingels and the master craftsmen at Audemars Piguet.</p>','posts/June2020/0hu8DCWT8axBiBVX20yO.jpg','bjarke-ingels-on-audemars-piguet-and-designing-for-the-year-2175',NULL,NULL,'PUBLISHED',0,'2020-06-19 20:44:46','2020-06-19 20:44:46',NULL,1),
	(7,1,7,'Meet @Vendelali, the Fashion Model Slaying Enemies as a ‘Battlefield’ Soldier',NULL,'#GramGen is a series profiling the most radical characters in youth culture, who continue to shape trend behavior and spark controversy through their avant fashion sense and candid social media personalities.','<div class=\"ad-in-post-slot ad-in-post-slot--hidden\" style=\"box-sizing: border-box; border-width: 1px 0px; border-image: initial; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; opacity: 0; transition: opacity 0.35s ease-out 0s; height: 0px; overflow: hidden; position: relative; color: #2e2e2e; padding: 0px !important; border-color: #d6d6d6 initial #d6d6d6 initial; border-style: solid initial solid initial; margin: 0px !important 0px !important 2.82353rem 0px !important;\">\r\n<div style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">\r\n<div id=\"ad-in-post-76\" class=\"ad-inline-creative\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">It&rsquo;s only been just over year since Swedish/Brazilian beauty Vendelali pitched up in Los Angeles, California, but already the young star is making the most of her entrepreneurial talents. While other models stick to safer, more familiar fashion projects, that just isn&rsquo;t Vendelali&rsquo;s style.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Most notably, this summer she became the star of EA&rsquo;s new video game,&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px;\"><a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.highsnobiety.com/2016/05/06/battlefield-1-reveal-trailer/\" target=\"_blank\" rel=\"noopener\">Battlefield 1: In the Name of the Tsar</a></em>. Vendelali stars as the leader of Russia&rsquo;s infamous Women&rsquo;s Battalion of Death, a terrifying all-female combat unit used in World War I.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">We caught up with Vendelali to discuss the game, her new city and why it&rsquo;s important for models to take risks.</p>','posts/June2020/oWv96E7cpsTGxqhQYgaK.jpg','meet-vendelali-the-fashion-model-slaying-enemies-as-a-battlefield-soldier',NULL,NULL,'PUBLISHED',1,'2020-06-19 20:46:29','2020-06-19 20:46:29',NULL,3),
	(8,1,2,'This Month’s Best in Luxury Features Wax-Splattered Shirts & Wild Slides',NULL,'It can be hard to keep tabs on new high-end arrivals, but ourselves and MATCHESFASHION are here to help. So, without further ado, we’ll let you get shopping June best pieces.','<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\"><em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px;\">New in Luxury, Presented by&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"http://www.matchesfashion.com/\" target=\"_blank\" rel=\"noopener\">MATCHESFASHION</a>&nbsp;is a collaborative series in which we guide you through the latest arrivals in the world of luxury fashion, sneakers, and accessories. The London-based retailer is a go-to for its curation of the world&rsquo;s biggest and best fashion labels, and you&rsquo;ll find our joint-effort monthly selections in the hub&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"http://New%20in%20Luxury,%20Presented%20by%20MATCHESFASHION%20is%20a%20collaborative%20series%20in%20which%20we%20guide%20you%20through%20the%20latest%20arrivals%20in%20the%20world%20of%20luxe%20clothing,%20sneakers,%20and%20accessories.%20The%20London-based%20retailer%20is%20a%20go-to%20for%20its%20curation%20of%20the%20world%E2%80%99s%20biggest%20and%20best%20fashion%20labels,%20and%20you%E2%80%99ll%20find%20our%20joint-effort%20monthly%20selections%20in%20the%20hub%20here./\" target=\"_blank\" rel=\"noopener\">here</a>.</em></p>\r\n<div class=\"ad-in-post-slot ad-in-post-slot--hidden\" style=\"box-sizing: border-box; border-width: 1px 0px; border-image: initial; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; opacity: 0; transition: opacity 0.35s ease-out 0s; height: 0px; overflow: hidden; position: relative; color: #2e2e2e; padding: 0px !important; border-color: #d6d6d6 initial #d6d6d6 initial; border-style: solid initial solid initial; margin: 0px !important 0px !important 2.82353rem 0px !important;\">\r\n<div style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">\r\n<div id=\"ad-in-post-73\" class=\"ad-inline-creative\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Summer is in full swing, and this month&rsquo;s round-up continues with more luxe slides and sandals &mdash; courtesy of Birkenstock and Loewe. Other highlights include shirts from Japan&rsquo;s NOMA T.D. and a new addition to Needles&rsquo; much-loved line-up of track jackets.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">&nbsp;</p>','posts/June2020/RMuaYWitHlpN8M0WYkLs.jpg','this-month-s-best-in-luxury-features-wax-splattered-shirts-and-wild-slides',NULL,NULL,'PUBLISHED',1,'2020-06-19 20:50:17','2020-06-19 20:50:17',NULL,4),
	(9,1,15,'Philipp Plein Is Using Black Lives Matter to Get Out suit',NULL,'It then went on to specifically reference “performers making sexual innuendos and using Ferrari’s cars as props in a manner which is per se distasteful.”','<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; max-width: 40rem;\"><span style=\"color: #2e2e2e; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem;\">Anyone who has indulged themselves in the masochistic act of scrolling through Philipp Plein&rsquo;s Instagram feed will know that this is a guy in love with his fleet of Ferraris. At least, that was the case until the company fired off a legal letter and asked him to </span><a style=\"font-family: inherit; box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.thefashionlaw.com/ferrari-doesnt-want-philipp-plein-putting-his-wares-alongside-its-cars/\" target=\"_blank\" rel=\"noopener\">back the hell down</a><span style=\"color: #2e2e2e; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem;\">&nbsp;from using their luxury cars as props. The pair have been going at it ever since, but the past seven days has seen the dispute wind up in sensitive territory.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e;\">The beef goes back to July 2019, when Plein &mdash; a man who, in a mind-curdling alternate universe far, far away, is renowned for his minimalist approach and penchant for refined aesthetics &mdash; uploaded a post featuring a pair of his&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://medias.fashionnetwork.com/image/upload/v1/medias/a26201899d8e6f33943c89f7901376a93169297.jpg\" target=\"_blank\" rel=\"noopener\">$800 PHANTOM KICK$</a> perched atop the roof of&nbsp;a&nbsp;gaudy green Ferrari 812 Superfast. Understandably, Ferrari didn&rsquo;t take too kindly to the fact its famous word mark and (legally-protected) prancing horse logo was bang slap in the middle of the photo, and in a letter awash with tea sip-worthy legalese, claimed that Plein&rsquo;s images aligned Ferrari &ldquo;with a&nbsp; lifestyle [that is] totally inconsistent with [its] brand perception.&rdquo;&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div class=\"element element--align-normal embed-element\" style=\"box-sizing: border-box; margin: 1.88235rem auto; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; max-width: 40rem; text-align: center; color: #2e2e2e;\">&nbsp;</div>\r\n<p>&nbsp;</p>','posts/June2020/DHqeZdi2d4w3TghcF24W.jpg','philipp-plein-is-using-black-lives-matter-to-get-out-of-his-ferrari-lawsuit',NULL,NULL,'PUBLISHED',1,'2020-06-19 20:52:57','2020-06-19 20:52:57',NULL,1),
	(10,1,9,'Pop Smoke’s Family Reveals ‘Shoot for the Stars’ Foundation & Album Title',NULL,'“Given recent events, we have decided to delay the release of his album out of respect for the movement,” he went on to add. “Make It Rain will be released this Friday, June 12th. The album will be released on July 3rd. Please join us in celebrating Pop Smoke’s legacy.”','<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">The family of&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.highsnobiety.com/tag/pop-smoke/\" target=\"_blank\" rel=\"noopener\">Pop Smoke</a>&nbsp;&ndash;&nbsp;real name Bashar Jackson &ndash; has announced&nbsp;the Shoot for the Stars foundation set up by the rapper before his passing. In doing so, they also revealed the title of his&nbsp;posthumous debut album.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Shoot for the Stars&rsquo; mission is to help&nbsp;kids reach their goals&nbsp;despite living in difficult circumstances. It aligns with the title of Pop&rsquo;s forthcoming album:&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px;\">Shoot for the Stars, Aim for the Moon.</em></p>\r\n<div class=\"element element--align-normal embed-element\" style=\"box-sizing: border-box; margin: 1.88235rem auto; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 17px; max-width: 1200px; color: #2e2e2e;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">The foundation will be led by the late rapper&rsquo;s mother and realizes his vision to &ldquo;help urban youth everywhere turn their pain into champagne.&rdquo; In a&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.instagram.com/p/CBljlOZpaIi/?utm_source=ig_web_copy_link\" target=\"_blank\" rel=\"noopener\">statement</a>, Ms. Jackson shared, &ldquo;As [Bashar] traveled around the city, he realized that the technology he had access to during his school years was not the norm for urban schools [&hellip;] It was great fun brainstorming and planning [Shoot for the Stars] with him. I am looking forward to working with the team he put together before he was so tragically taken from us.&rdquo;</p>','posts/June2020/FZRzxLpixW7l97ikP5uv.jpg','pop-smoke-s-family-reveals-shoot-for-the-stars-foundation-and-album-title',NULL,NULL,'PUBLISHED',1,'2020-06-19 20:54:53','2020-06-19 20:54:53',NULL,2),
	(11,1,12,'Shangela Talks Black Lives Matter, Pride & Overcoming Adversity',NULL,'Today, Shangela appears on HBO’s We’re Here (recently picked up for a second season) alongside former Drag Race personalities Bob the Drag Queen and Eureka O’Hara, in which they travel to small towns across the United States transforming locals into drag queens.','<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e;\">As one of the most beloved contestants in the herstory of&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px;\">Rupaul&rsquo;s Drag Race</em>, Shangela transcends LGBTQ+ media. With a role in&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px;\">A Star Is Born</em>&nbsp;and vocals featured on Ariana Grande&rsquo;s &ldquo;NASA&rdquo; &mdash; to name just a few highlights &mdash; she is a bonafide part of pop culture.&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.youtube.com/watch?v=iNp9d88zh_w\" target=\"_blank\" rel=\"noopener\">Halleloo</a>.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px auto 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; max-width: 40rem; color: #2e2e2e;\"><span style=\"font-size: 1.11765rem;\">Of course, drag has always been more than entertainment &mdash; it&rsquo;s a commentary on identity politics and freedom of expression, which couldn&rsquo;t be more salient during this time of social upheaval. We caught up with Shangela to talk about</span><span style=\"font-size: 1.11765rem;\">&nbsp;</span><a style=\"font-family: inherit; box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.highsnobiety.com/badge/black-lives-matter/\" target=\"_blank\" rel=\"noopener\">Black Lives Matter</a><span style=\"font-size: 1.11765rem;\">, what Pride means this year, and</span><span style=\"font-size: 1.11765rem;\">&nbsp;</span><a style=\"font-family: inherit; box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.feedthequeens.com/\" target=\"_blank\" rel=\"noopener\">Feed The Queens</a><span style=\"font-size: 1.11765rem;\">, an initiative she recently launched to provide food for drag queens in America whose livelihoods have been affected by Covid-19.</span></p>','posts/June2020/U1NkfL4UhLLsJe1ZOb3N.jpg','shangela-talks-black-lives-matter-pride-and-overcoming-adversity',NULL,NULL,'PUBLISHED',0,'2020-06-19 20:56:56','2020-06-19 20:56:56',NULL,1),
	(12,1,8,'Tesla Is Officially the World’s Most Valuable Car Company',NULL,'Tesla has increased its value by 375 percent since this time last year. Following a stock surge in January, the company became worth more than Ford and GM combined. Visual Capitalist also points out that Tesla sold more cars in 2019 than it did the two previous years combined.','<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\"><a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.highsnobiety.com/tag/tesla/\" target=\"_blank\" rel=\"noopener\">Tesla</a>&nbsp;has surpassed Toyota to become the most valuable automaker in the world. According to&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.visualcapitalist.com/tesla-is-now-the-worlds-most-valuable-automaker/\" target=\"_blank\" rel=\"noopener\">Visual Capitalist</a>, the&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.highsnobiety.com/tag/elon-musk/\" target=\"_blank\" rel=\"noopener\">Elon Musk</a>-led outfit is currently valued at $183 billion, while Toyota is now the second most valuable car company at $176 billion.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Volkswagen and its $84 billion currently sit in third position, while Honda and Daimler round out the top five at $45 billion and $44 billion, respectively.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\"><span style=\"font-size: 1.11765rem;\">A large reason why Tesla&rsquo;s value continues to skyrocket is an increase in its production capacity. While the company remains steadfast in opening new factories in the US, it is also expanding globally with Gigafactories in Berlin and Shanghai.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">Furthermore, Musk and Tesla remain focused on producing electric semi-trucks. They aren&rsquo;t the only ones, however, as rival electric car company, Nikola, eyes the same goal. Nikola has yet to produce a vehicle, but is already valued at $24 billion.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 1.35294rem; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.5; font-family: Univers, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 1.11765rem; color: #2e2e2e;\">For more on Tesla and its $183 billion valuation, follow on over to&nbsp;<a style=\"box-sizing: border-box; -webkit-user-drag: none; text-decoration-line: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 19px; outline: 0px; -webkit-tap-highlight-color: transparent; color: #155c99; transition: color 0.11s ease-out 0s;\" href=\"https://www.visualcapitalist.com/tesla-is-now-the-worlds-most-valuable-automaker/\" target=\"_blank\" rel=\"noopener\">Visual Capitalist</a>.</p>','posts/June2020/f7Wlksc8xqFHgSz7oEzD.jpg','tesla-is-officially-the-world-s-most-valuable-car-company',NULL,NULL,'PUBLISHED',1,'2020-06-19 20:58:42','2020-06-19 20:58:42',NULL,4),
	(13,1,2,'post1',NULL,NULL,'<p>post1</p>','posts/June2020/PFWYzbzrVVY2bCmnsol8.jpg','post1',NULL,NULL,'PUBLISHED',1,'2020-06-22 07:40:58','2020-06-22 07:40:58',NULL,1),
	(14,1,2,'post2',NULL,NULL,'<p>post12</p>','posts/June2020/JQy2ODhwhAoenCHaxZSz.jpg','post12',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:41:11','2020-06-22 07:41:11',NULL,1),
	(15,1,2,'post3',NULL,NULL,'<p>post2</p>','posts/June2020/VawaQZB7PSOkCb6sLCUV.jpg','post2',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:41:36','2020-06-22 07:41:36',NULL,3),
	(16,1,2,'post4',NULL,NULL,'<p>post3</p>','posts/June2020/GB8lPMH9pWVK5hI1kE1y.jpg','post3',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:41:56','2020-06-22 07:41:56',NULL,4),
	(17,1,2,'post5',NULL,NULL,'<p>post4</p>','posts/June2020/sCLzskxSm7boBsYlRWyi.jpg','post4',NULL,NULL,'PUBLISHED',1,'2020-06-22 07:42:10','2020-06-22 07:42:10',NULL,1),
	(18,1,2,'post6',NULL,NULL,'<p>post5</p>','posts/June2020/7tgfubhGDUDKSpFkovq8.jpg','post5',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:42:27','2020-06-22 07:42:27',NULL,2),
	(19,1,2,'post7',NULL,NULL,'<p>post6</p>','posts/June2020/URgUzRkpqihUTaFSi3es.jpg','post6',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:42:48','2020-06-22 07:42:48',NULL,3),
	(20,1,2,'post8',NULL,NULL,'<p>post7</p>','posts/June2020/3u2yM8i8DuSxeTesAkx3.jpg','post7',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:43:07','2020-06-22 07:43:07',NULL,4),
	(21,1,2,'post9',NULL,NULL,'<p>post8</p>','posts/June2020/RjnQk6OmyzHxHjITCCcX.jpg','post8',NULL,NULL,'PUBLISHED',1,'2020-06-22 07:43:42','2020-06-22 07:43:42',NULL,1),
	(22,1,2,'post10',NULL,NULL,'<p>post11</p>','posts/June2020/c2qQJxf5LYAvOQ8zzPpz.jpg','post11',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:43:56','2020-06-22 07:43:56',NULL,2),
	(23,1,2,'post11',NULL,NULL,'<p>post22</p>','posts/June2020/p0IXPzCYLhYfeqJlSosY.jpg','post22',NULL,NULL,'PUBLISHED',0,'2020-06-22 07:44:08','2020-06-22 07:44:08',NULL,3);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Administrator','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(2,'user','Normal User','2020-06-12 21:36:48','2020-06-12 21:36:48');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`)
VALUES
	(1,'site.title','Site Title','Skeezrxcco','','text',1,'Site'),
	(2,'site.description','Site Description','NexTGenX Blog','','text',2,'Site'),
	(3,'site.logo','Site Logo','','','image',3,'Site'),
	(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),
	(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),
	(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),
	(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),
	(8,'admin.loader','Admin Loader','','','image',3,'Admin'),
	(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),
	(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(4,'hip hop','hip-hop','2020-06-12 22:02:38','2020-06-12 22:02:38'),
	(5,'','',NULL,NULL),
	(6,'Billie Eilish','Billie-Eilish','2020-06-19 16:23:57','2020-06-19 16:23:57'),
	(7,'bjarke','bjarke','2020-06-19 16:24:23','2020-06-19 16:24:23'),
	(8,'ea-games','ea-games','2020-06-19 16:25:13','2020-06-19 16:25:13'),
	(9,'noma','noma','2020-06-19 16:25:32','2020-06-19 16:25:32'),
	(10,'plein','plein','2020-06-19 16:25:53','2020-06-19 16:25:53'),
	(11,'pop smoke','pop smoke','2020-06-19 16:26:12','2020-06-19 16:26:12'),
	(12,'shangela','shangela','2020-06-19 16:26:46','2020-06-19 16:26:46'),
	(13,'tesla','tesla','2020-06-19 16:27:00','2020-06-19 16:27:00'),
	(14,'travis scott','travis-scott','2020-06-19 16:27:19','2020-06-19 16:27:19');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`)
VALUES
	(1,'data_types','display_name_singular',5,'pt','Post','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(2,'data_types','display_name_singular',6,'pt','Página','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(3,'data_types','display_name_singular',1,'pt','Utilizador','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(4,'data_types','display_name_singular',4,'pt','Categoria','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(5,'data_types','display_name_singular',2,'pt','Menu','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(6,'data_types','display_name_singular',3,'pt','Função','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(7,'data_types','display_name_plural',5,'pt','Posts','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(8,'data_types','display_name_plural',6,'pt','Páginas','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(9,'data_types','display_name_plural',1,'pt','Utilizadores','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(10,'data_types','display_name_plural',4,'pt','Categorias','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(11,'data_types','display_name_plural',2,'pt','Menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(12,'data_types','display_name_plural',3,'pt','Funções','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(13,'categories','slug',1,'pt','categoria-1','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(14,'categories','name',1,'pt','Categoria 1','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(15,'categories','slug',2,'pt','categoria-2','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(16,'categories','name',2,'pt','Categoria 2','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(17,'pages','title',1,'pt','Olá Mundo','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(18,'pages','slug',1,'pt','ola-mundo','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(20,'menu_items','title',1,'pt','Painel de Controle','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(21,'menu_items','title',2,'pt','Media','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(22,'menu_items','title',12,'pt','Publicações','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(23,'menu_items','title',3,'pt','Utilizadores','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(24,'menu_items','title',11,'pt','Categorias','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(25,'menu_items','title',13,'pt','Páginas','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(26,'menu_items','title',4,'pt','Funções','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(27,'menu_items','title',5,'pt','Ferramentas','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(28,'menu_items','title',6,'pt','Menus','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(29,'menu_items','title',7,'pt','Base de dados','2020-06-12 21:36:48','2020-06-12 21:36:48'),
	(30,'menu_items','title',10,'pt','Configurações','2020-06-12 21:36:48','2020-06-12 21:36:48');

/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`)
VALUES
	(1,1,'Admin','admin@admin.com','users/default.png',NULL,'$2y$10$kI29yOXg.ElIVXzjOtTzu.PyroqcbgCZ2e8SWpBy9SLSO1GgyYcGC','RDu7vgAg0ymdnegU8oCEGS8SmQovsUAdNrDDQ4y831XAdQYKmAQIwjAShkmq',NULL,'2020-06-12 21:36:48','2020-06-12 21:36:48');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
