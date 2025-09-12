/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.5.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: Ap5
-- ------------------------------------------------------
-- Server version	11.5.2-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `Ap5`
--
CREATE DATABASE IF NOT EXISTS `Ap5` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Ap5`;

--
-- Table structure for table `connections`
--

DROP TABLE IF EXISTS `connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `date_connection` datetime NOT NULL DEFAULT current_timestamp(),
  `server_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `connections_users_id_fk` (`user_id`),
  KEY `connections_servers_id_fk` (`server_id`),
  CONSTRAINT `connections_servers_id_fk` FOREIGN KEY (`server_id`) REFERENCES `servers` (`id`),
  CONSTRAINT `connections_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connections`
--

LOCK TABLES `connections` WRITE;
/*!40000 ALTER TABLE `connections` DISABLE KEYS */;
INSERT INTO `connections` VALUES
(1,1,'88.50.25.25','2023-10-25 10:44:10',6),
(2,1,'88.50.25.25','2023-10-25 11:00:44',5),
(3,1,'88.50.25.25','2023-10-23 11:05:26',7),
(4,3,'50.30.30.25','2023-12-22 16:46:39',1),
(5,3,'50.30.30.25','2023-12-22 20:45:36',3);
/*!40000 ALTER TABLE `connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `country_server` varchar(4) NOT NULL,
  `observation` text DEFAULT NULL,
  `domain` varchar(250) NOT NULL,
  `ip` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `servers_pk` (`url`),
  UNIQUE KEY `servers_pk_2` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servers`
--

LOCK TABLES `servers` WRITE;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
INSERT INTO `servers` VALUES
(1,'https://www.bbc.com/','UK','La British Broadcasting Corporation ​ es el servicio público de radio y televisión del Reino Unido.​ Tiene su sede en la Broadcasting House en Londres. La BBC opera bajo el mandato de una Carta Real que garantiza su independencia frente a controles de tipo político o comercial.','bbc.com','212.58.249.207'),
(2,'https://www.casareal.es/ES/Paginas/home.aspx','ES','La Casa de Su Majestad el Rey, también llamada Casa Real, ​​​ es el organismo español que, bajo la dependencia directa del rey, «tiene como misión servirle de apoyo en cuantas actividades se deriven de sus funciones como jefe de Estado».​','casareal.es','212.128.109.8'),
(3,'https://european-union.europa.eu/index_es','US','La Unión Europea es una comunidad política democrática y de derecho, ​ constituida en régimen sui géneris de organización internacional/supranacional​​ fundada para propiciar y acoger la integración y gobernanza en común de los Estados y las naciones de Europa.​','europa.eu','108.156.22.108'),
(4,'https://www.hostinger.com/','US','Hostinger Internacional, Ltd. es un proveedor de alojamiento web y dominios web. Fundada en el año 2004, Hostinger ahora posee más de 30 millones de usuarios, ​ en conjunto con filiales en 178 países.​','hostinger.com',NULL),
(5,'https://symfony.com/','IE','Symfony es un framework diseñado para desarrollar aplicaciones web basado en el patrón Modelo Vista Controlador. Para empezar, separa la lógica de negocio, la lógica de servidor y la presentación de la aplicación web. Proporciona varias herramientas y clases encaminadas a reducir el tiempo de desarrollo de una aplicación web compleja. Además, automatiza las tareas más comunes, permitiendo al desarrollador dedicarse por completo a los aspectos específicos de cada aplicación.','symfony.com',NULL),
(6,'https://www.php.net/','DE','¿Qué significa PHP? PHP significa PHP: Hypertext Preprocessor. Esto confunde a mucha gente porque la primera palabra del acrónimo es el acrónimo mismo. Este tipo de acrónimo se denomina \'acrónimo recursivo\'.','php.net','185.85.0.29'),
(7,'https://www.jetbrains.com/es-es/','US','JetBrains s.r.o. es una compañía de desarrollo de software cuyas herramientas están dirigidas a desarrolladores de software y gerentes de proyectos.','jetbrains.com','34.211.1.235'),
(8,'https://www.google.com/','US','Google LLC es una empresa de tecnología multinacional estadounidense que se centra en inteligencia artificial, publicidad en línea, tecnología de motores de búsqueda, computación en la nube, software, computación cuántica, comercio electrónico y electrónica de consumo.','google.com','216.239.32.27');
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_subname` varchar(100) NOT NULL,
  `second_subname` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `country` varchar(4) NOT NULL,
  `observation` text DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_pk` (`username`),
  UNIQUE KEY `email_pk` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Andrés','García','García','C/ Jaume I, 55',NULL,'Catarroja','ES',NULL,'angaga@email.com','Andrés'),
(2,'Bernardo','Martínez','Martínez',NULL,NULL,NULL,'ES',NULL,'bemama@email.com','Bernando'),
(3,'Charles','Brown',NULL,NULL,NULL,'London','UK',NULL,'cha.brown@email.com','Charles');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-08-21 10:13:30
