#
# SQL Export
# Created by Querious (300053)
# Created: 20. January 2021 at 11:28:02 CET
# Encoding: Unicode (UTF-8)
#


SET @ORIG_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;

SET @ORIG_UNIQUE_CHECKS = @@UNIQUE_CHECKS;
SET UNIQUE_CHECKS = 0;

SET @ORIG_TIME_ZONE = @@TIME_ZONE;
SET TIME_ZONE = '+00:00';

SET @ORIG_SQL_MODE = @@SQL_MODE;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';



DROP DATABASE IF EXISTS `endproject`;
CREATE DATABASE `endproject` DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE `endproject`;




DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `service`;
DROP TABLE IF EXISTS `role_user`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `permission_user`;
DROP TABLE IF EXISTS `permission_role`;
DROP TABLE IF EXISTS `permissions`;
DROP TABLE IF EXISTS `password_resets`;
DROP TABLE IF EXISTS `migrations`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `equipment`;
DROP TABLE IF EXISTS `address`;


CREATE TABLE `address` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `equipment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `equip_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase` date NOT NULL,
  `maintenance` date DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `service` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `equipment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_submission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Has not been set yet',
  `user_id` int(11) NOT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `certification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noofdives` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




LOCK TABLES `address` WRITE;
INSERT INTO `address` (`id`, `created_at`, `updated_at`, `country`, `city`, `zip`, `street`, `user_id`) VALUES 
	(1,'2021-01-18 18:26:10','2021-01-18 18:26:10','Deutschland','Stuttgart','71229','Heckenrosenweg 7',1),
	(2,'2021-01-19 10:10:48','2021-01-19 10:10:48','Austria','Vienna','1150','Musterstreet 4',6);
UNLOCK TABLES;


LOCK TABLES `equipment` WRITE;
INSERT INTO `equipment` (`id`, `created_at`, `updated_at`, `equip_type`, `brand`, `condition`, `purchase`, `maintenance`, `info`, `user_id`) VALUES 
	(1,'2021-01-18 18:26:37','2021-01-18 18:27:35','jacket','jacketbrand','as-new','2001-10-10','2021-10-10','infooo',5),
	(2,'2021-01-19 11:15:12','2021-01-19 11:18:07','jacket','Jacket brand','as-new','2020-01-01','2021-01-01','Infooo',6),
	(3,'2021-01-19 15:49:43','2021-01-19 15:49:43','dive-computer','brand computer','as-new','2010-10-10','2021-10-10','info',1);
UNLOCK TABLES;


LOCK TABLES `failed_jobs` WRITE;
UNLOCK TABLES;


LOCK TABLES `migrations` WRITE;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES 
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2020_10_26_092329_laratrust_setup_tables',1),
	(5,'2020_12_02_161640_create_equipment_table',1),
	(6,'2020_12_02_180928_add_user_id_to_equipment',1),
	(7,'2021_01_05_100356_create_service_table',1),
	(8,'2021_01_05_104428_add_user_id_to_service',1),
	(9,'2021_01_09_081330_create_address_table',1),
	(10,'2021_01_09_095931_add_user_id_to_address',1),
	(11,'2021_01_15_160259_add_equipment_id_to_service',1);
UNLOCK TABLES;


LOCK TABLES `password_resets` WRITE;
UNLOCK TABLES;


LOCK TABLES `permissions` WRITE;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES 
	(1,'users-create','Create Users','Create Users','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(2,'users-read','Read Users','Read Users','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(3,'users-update','Update Users','Update Users','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(4,'users-delete','Delete Users','Delete Users','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(5,'payments-create','Create Payments','Create Payments','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(6,'payments-read','Read Payments','Read Payments','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(7,'payments-update','Update Payments','Update Payments','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(8,'payments-delete','Delete Payments','Delete Payments','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(9,'profile-read','Read Profile','Read Profile','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(10,'profile-update','Update Profile','Update Profile','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(11,'module_1_name-create','Create Module_1_name','Create Module_1_name','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(12,'module_1_name-read','Read Module_1_name','Read Module_1_name','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(13,'module_1_name-update','Update Module_1_name','Update Module_1_name','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(14,'module_1_name-delete','Delete Module_1_name','Delete Module_1_name','2021-01-18 18:41:25','2021-01-18 18:41:25');
UNLOCK TABLES;


LOCK TABLES `permission_role` WRITE;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES 
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
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(9,2),
	(10,2),
	(9,3),
	(10,3),
	(11,4),
	(12,4),
	(13,4),
	(14,4);
UNLOCK TABLES;


LOCK TABLES `permission_user` WRITE;
UNLOCK TABLES;


LOCK TABLES `roles` WRITE;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES 
	(1,'superadministrator','Superadministrator','Superadministrator','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(2,'administrator','Administrator','Administrator','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(3,'user','User','User','2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(4,'role_name','Role Name','Role Name','2021-01-18 18:41:25','2021-01-18 18:41:25');
UNLOCK TABLES;


LOCK TABLES `role_user` WRITE;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES 
	(1,1,'App\\Models\\User'),
	(2,2,'App\\Models\\User'),
	(3,3,'App\\Models\\User'),
	(3,5,'App\\Models\\User'),
	(3,6,'App\\Models\\User'),
	(4,4,'App\\Models\\User');
UNLOCK TABLES;


LOCK TABLES `service` WRITE;
INSERT INTO `service` (`id`, `created_at`, `updated_at`, `equipment_type`, `service_type`, `service_submission`, `info`, `status`, `cost`, `user_id`, `equipment_id`) VALUES 
	(1,'2021-01-18 18:54:05','2021-01-19 14:01:04','jacket','repair','service_shipping','info',1,'40 Euro',5,1),
	(2,'2021-01-19 15:50:01','2021-01-19 16:23:04','dive-computer','repair','service_shipping','qswdfghj',2,'40 Euro',1,3);
UNLOCK TABLES;


LOCK TABLES `users` WRITE;
INSERT INTO `users` (`id`, `name`, `surname`, `gender`, `dob`, `phone`, `certification`, `noofdives`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES 
	(1,'Superadministrator','surname','Male','2000-01-23',18003,'2','2','superadministrator@app.com',NULL,'$2y$10$jQVZhxJ4FGn3SD/c2z4kq..wra4pmmaB1teNxnSq.kfPjYCcBCL/q',NULL,'2021-01-18 18:41:25','2021-01-19 10:02:29'),
	(2,'Administrator','surname','gender','2000-01-23',18003,'certification','noofdives','administrator@app.com',NULL,'$2y$10$Je23555zVXcjrso72MSPGO.eT9JtVMdzsV59ejOlOg5RBIleFifBO',NULL,'2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(3,'User','surname','gender','2000-01-23',18003,'certification','noofdives','user@app.com',NULL,'$2y$10$R7RCZHt01rMBo8gbVkOvVevODr/EVwPd8GrCQ8FU4bn0RrznS2JD6',NULL,'2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(4,'Role Name','surname','gender','2000-01-23',18003,'certification','noofdives','role_name@app.com',NULL,'$2y$10$tba4loFumkTX41ScXlzHxusJTlRL2.Bfz8VymK0mvuu8XKR9nqgKi',NULL,'2021-01-18 18:41:25','2021-01-18 18:41:25'),
	(5,'Testuser','Test','Female','2010-10-10',1234,'1','1','s@mail.com',NULL,'$2y$10$OLDf822DuYvtyBkD8nKp8OS1nt2oeJ8kHtGFx3ZSgpSgAhR65AY/y',NULL,'2021-01-18 18:26:10','2021-01-18 18:26:10'),
	(6,'Max','Muster','Male','2000-01-01',12345,'4','3','mm@mail.com',NULL,'$2y$10$VTWeZzBOMs3K56aOhFzZ/eHkDxA5oQk0CNamaOEu5.vesyGy0YY6S',NULL,'2021-01-19 10:10:48','2021-01-19 10:10:48');
UNLOCK TABLES;






SET FOREIGN_KEY_CHECKS = @ORIG_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS = @ORIG_UNIQUE_CHECKS;

SET @ORIG_TIME_ZONE = @@TIME_ZONE;
SET TIME_ZONE = @ORIG_TIME_ZONE;

SET SQL_MODE = @ORIG_SQL_MODE;



# Export Finished: 20. January 2021 at 11:28:02 CET

