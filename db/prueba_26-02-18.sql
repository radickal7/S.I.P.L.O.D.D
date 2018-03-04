-- MySQL dump 10.11
--
-- Host: localhost    Database: alcaldia
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt-log

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
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `cod_dep` int(10) NOT NULL,
  `nomb_dep` varchar(225) default NULL,
  PRIMARY KEY  (`cod_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docu_depa`
--

DROP TABLE IF EXISTS `docu_depa`;
CREATE TABLE `docu_depa` (
  `cod_dep` int(10) NOT NULL,
  `cod_doc` int(10) NOT NULL default '0',
  `fech_reg` date default NULL,
  `respuesta` varchar(255) default NULL,
  PRIMARY KEY  (`cod_dep`,`cod_doc`),
  KEY `cod_doc` (`cod_doc`),
  CONSTRAINT `docu_depa_ibfk_1` FOREIGN KEY (`cod_dep`) REFERENCES `departamentos` (`cod_dep`) ON UPDATE CASCADE,
  CONSTRAINT `docu_depa_ibfk_2` FOREIGN KEY (`cod_doc`) REFERENCES `documentos` (`cod_doc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docu_depa`
--

LOCK TABLES `docu_depa` WRITE;
/*!40000 ALTER TABLE `docu_depa` DISABLE KEYS */;
/*!40000 ALTER TABLE `docu_depa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `cod_doc` int(10) NOT NULL auto_increment,
  `num_doc` varchar(20) default NULL,
  `cod_resp` int(10) default NULL,
  `cod_origen` int(10) default NULL,
  `fech_reg` date default NULL,
  `hora_reg` time default NULL,
  `esta_doc` varchar(50) default NULL,
  `tipo_doc` varchar(50) default NULL,
  `desc_doc` varchar(225) default NULL,
  `adju_doc` varchar(255) default NULL,
  PRIMARY KEY  (`cod_doc`),
  KEY `cod_resp` (`cod_resp`),
  KEY `cod_origen` (`cod_origen`),
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`cod_resp`) REFERENCES `responsables` (`cod_resp`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`cod_origen`) REFERENCES `origen` (`cod_origen`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,'23',1,1,'2017-11-14','12:59:00','Enviado','Orden de Compras','ytdyt',NULL),(2,'23',1,1,'2017-11-14','12:59:00','Enviado','Orden de Compras','ytdyt',NULL),(3,'23',1,1,'2017-11-14','12:59:00','Enviado','Orden de Compras','ytdyt',NULL),(4,'22',1,5,'2017-11-06','23:59:00','Enviado','Resoluciones','sytxdytasdy',NULL),(5,'132',1,2,'2018-01-23','14:35:00','Enviado','ComunicaciÃ³n','Descripcion aqui','eea522321a4f4c97e021bde15d55621b.pdf'),(6,'321',1,2,'2018-01-10','05:46:00','Enviado','Orden de Compras','dgsyhsrys','403aaa062b6a16a467a9ec79590b3353.jpg'),(7,'132',1,2,'2018-01-03','17:02:00','Enviado','ComunicaciÃ³n','gssdg','eea522321a4f4c97e021bde15d55621b.pdf');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origen`
--

DROP TABLE IF EXISTS `origen`;
CREATE TABLE `origen` (
  `cod_origen` int(10) NOT NULL auto_increment,
  `nomb_origen` varchar(225) default NULL,
  PRIMARY KEY  (`cod_origen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `origen`
--

LOCK TABLES `origen` WRITE;
/*!40000 ALTER TABLE `origen` DISABLE KEYS */;
INSERT INTO `origen` VALUES (1,'DESPACHO'),(2,'PRESUPUESTO'),(3,'COMPRAS'),(4,'gotu'),(5,'caracas');
/*!40000 ALTER TABLE `origen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsables`
--

DROP TABLE IF EXISTS `responsables`;
CREATE TABLE `responsables` (
  `cod_resp` int(10) NOT NULL auto_increment,
  `nomb_resp` varchar(25) default NULL,
  `apellido_resp` varchar(50) default NULL,
  `cedu_resp` varchar(25) default NULL,
  `clave` varchar(25) default NULL,
  `tipo_usuario` varchar(25) default NULL,
  PRIMARY KEY  (`cod_resp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `responsables`
--

LOCK TABLES `responsables` WRITE;
/*!40000 ALTER TABLE `responsables` DISABLE KEYS */;
INSERT INTO `responsables` VALUES (1,'Carlos','Belandria','23722790','12345','Administrador'),(2,'Katerin','Arciniegas','12345678','1234','Recepcionista'),(3,'genesis','rojas','12345634','1234','Administrador');
/*!40000 ALTER TABLE `responsables` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-26 19:39:34
