# Host: localhost  (Version 8.0.18)
# Date: 2020-12-20 17:45:00
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(190) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (2,'Eletrodomésticos','2020-12-18 23:28:00',NULL),(3,'Celulares','2020-12-18 23:28:00',NULL),(4,'Alimentos','2020-12-18 23:28:00',NULL),(5,'Informática','2020-12-18 23:28:00',NULL);

#
# Structure for table "produtos"
#

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(100) NOT NULL DEFAULT '',
  `preco` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id_in_categoria` (`categoria_id`),
  CONSTRAINT `categoria_id_in_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "produtos"
#

INSERT INTO `produtos` VALUES (1,3,'Samsung Galaxy A 10',800.00,'2020-12-19 03:08:11','2020-12-19 13:52:34'),(2,2,'Geladeira Frostfree 60 L',1250.00,'2020-12-19 03:10:06','2020-12-20 19:40:46'),(3,2,'Açucar União 5KG',5.00,'2020-12-19 03:10:22','2020-12-20 20:09:15'),(4,3,'Motorola G 8',900.00,'2020-12-19 03:19:54','2020-12-20 19:02:55'),(6,2,'Fogao 4 x Bocas Brastemp',550.00,'2020-12-19 03:27:16','2020-12-19 14:00:47'),(9,3,'Celular Motorola G4',500.00,'2020-12-19 14:00:25','2020-12-19 14:00:25');
