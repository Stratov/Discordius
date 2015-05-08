<?php defined('SYSPATH') or die('No direct script access.'); ?>

2014-05-02 14:04:40 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: Unknown column 'spawn_last_update' in 'field list' - SELECT ((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`items`)
JOIN `containers_items` ON (`containers_items`.`id_item` = `items`.`id`)
WHERE `containers_items`.`id_container` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:05:36 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: Unknown column 'spawn_last_update' in 'field list' - SELECT ((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`items`)
JOIN `containers_items` ON (`containers_items`.`id_item` = `items`.`id`)
WHERE `containers_items`.`id_container` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:06:35 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: Unknown column 'spawn_last_update' in 'field list' - SELECT ((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items, `1`
FROM (`items`)
JOIN `containers_items` ON (`containers_items`.`id_item` = `items`.`id`)
WHERE `containers_items`.`id_container` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:07:39 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: Unknown column 'items.id' in 'on clause' - SELECT ((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_item` = `items`.`id`)
WHERE `containers_items`.`id_container` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:13:51 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 79
2014-05-02 14:17:33 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 77
2014-05-02 14:18:29 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 77
2014-05-02 14:21:13 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 77
2014-05-02 14:24:05 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 78
2014-05-02 14:27:56 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 79
2014-05-02 14:29:22 +00:00 --- error: Uncaught PHP Error: Invalid argument supplied for foreach() dans le fichier modules/plugins/models/container.php à la ligne 79
2014-05-02 14:29:38 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: FUNCTION flipidingue.SFLOOR does not exist - SELECT SFLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:31:59 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: FUNCTION flipidingue.SFLOOR does not exist - SELECT SFLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:37:13 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'INTERNAL 5 second) WHERE id = 8' at line 1 - UPDATE containers SET spawn_last_update = DATE_ADD(spawn_lat_update, INTERNAL 5 second) WHERE id = 8 dans le fichier /var/www/virtual/flipidingue.fr.nf/htdocs/system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:37:31 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'INTERNAL 5 second) WHERE id = 8' at line 1 - UPDATE containers SET spawn_last_update = DATE_ADD(spawn_lat_update INTERNAL 5 second) WHERE id = 8 dans le fichier /var/www/virtual/flipidingue.fr.nf/htdocs/system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:38:21 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'INTERNAL 5 second) WHERE id = 8' at line 1 - UPDATE containers SET spawn_last_update = DATE_ADD(spawn_lat_update,INTERNAL 5 second) WHERE id = 8 dans le fichier /var/www/virtual/flipidingue.fr.nf/htdocs/system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:38:24 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'INTERNAL 5 second) WHERE id = 8' at line 1 - UPDATE containers SET spawn_last_update = DATE_ADD(spawn_lat_update,INTERNAL 5 second) WHERE id = 8 dans le fichier /var/www/virtual/flipidingue.fr.nf/htdocs/system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 14:38:49 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: Unknown column 'spawn_lat_update' in 'field list' - UPDATE containers SET spawn_last_update = DATE_ADD(spawn_lat_update,INTERVAL 5 second) WHERE id = 8 dans le fichier /var/www/virtual/flipidingue.fr.nf/htdocs/system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:08:22 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*)' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), `spawn_last_update)` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:08:51 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*)' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), `spawn_last_update )` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:09:21 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'spawn_last_update`)` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) ' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), ``spawn_last_update`)` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:10:16 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*)' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), `spawn_last_update) / 3` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:11:15 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*)' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), `+ spawn_last_update) / 3` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 15:11:32 +00:00 --- error: Uncaught Kohana_Database_Exception: L'erreur SQL suivante est survenue: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*)' at line 1 - SELECT TIMESTAMPDIFF(SECOND, NOW(), `spawn_last_update) / 3` AS `test`, FLOOR((NOW() - spawn_last_update) / spawn_time) AS nb_spawn, count(*) as nb_items
FROM (`containers`)
JOIN `containers_items` ON (`containers_items`.`id_container` = `containers`.`id`)
WHERE `containers`.`id` = '8' dans le fichier system/libraries/drivers/Database/Mysql.php à la ligne 371
2014-05-02 17:12:04 +00:00 --- error: Uncaught PHP Error: Missing argument 1 for Item_Controller::show() dans le fichier modules/game/controllers/item.php à la ligne 145
2014-05-02 17:27:17 +00:00 --- error: Uncaught Exception: Container not found dans le fichier modules/plugins/models/container.php à la ligne 22
2014-05-02 17:27:17 +00:00 --- error: Uncaught Exception: Container not found dans le fichier modules/plugins/models/container.php à la ligne 22
2014-05-02 17:27:19 +00:00 --- error: Uncaught Exception: Container not found dans le fichier modules/plugins/models/container.php à la ligne 22
