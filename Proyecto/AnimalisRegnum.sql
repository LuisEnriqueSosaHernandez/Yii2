-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: animalisregnum
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `idAnimal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `FechaR` date DEFAULT NULL,
  `IdTipo` int(11) NOT NULL,
  `IdStatus` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdSexo` int(11) NOT NULL,
  `IdFoto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Foto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idAnimal`),
  KEY `fk_Animal_Tipo1_idx` (`IdTipo`),
  KEY `fk_Animal_Status1_idx` (`IdStatus`),
  KEY `fk_Animal_Categoria1_idx` (`IdCategoria`),
  KEY `fk_Animal_Sexo1_idx` (`IdSexo`),
  KEY `fk_Animal_Foto1_idx` (`IdFoto`),
  KEY `fk_animal_user1_idx` (`user_id`),
  CONSTRAINT `fk_Animal_Categoria1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animal_Foto1` FOREIGN KEY (`IdFoto`) REFERENCES `foto` (`IdFoto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animal_Sexo1` FOREIGN KEY (`IdSexo`) REFERENCES `sexo` (`IdSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animal_Status1` FOREIGN KEY (`IdStatus`) REFERENCES `status` (`IdStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Animal_Tipo1` FOREIGN KEY (`IdTipo`) REFERENCES `tipo` (`IdTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(9) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Mascota'),(2,'Abandono'),(3,'Extinción');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `IdEstado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Veracruz'),(2,'Sonora'),(3,'Pachuca'),(4,'Monterrey');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `IdFoto` int(11) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`IdFoto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (1,'default.jpg'),(2,'default2.jpg');
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8 NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `IdMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `IdEstado` int(11) NOT NULL,
  PRIMARY KEY (`IdMunicipio`),
  KEY `fk_Municipios_Estados_idx` (`IdEstado`),
  CONSTRAINT `fk_Municipios_Estados` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'Xalapa',1),(2,'Veracruz',1),(4,'Boca del río',1),(5,'Guaymas',2),(6,'Nuevo Leon',4);
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexo` (
  `IdSexo` int(11) NOT NULL AUTO_INCREMENT,
  `Sexo` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IdSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'M'),(2,'H');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `IdStatus` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IdStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Vivo'),(2,'Vegetal'),(3,'Muerto');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(12) CHARACTER SET tis620 NOT NULL,
  PRIMARY KEY (`IdTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (4,'Pez'),(5,'Ave'),(6,'Reptil'),(7,'Anfibio'),(8,'Mamifero');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `Curp` varchar(18) CHARACTER SET utf8 NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ApPat` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ApMat` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `FechaN` date NOT NULL,
  `FechaR` date NOT NULL,
  `IdStatus` int(11) NOT NULL,
  `IdFoto` int(11) NOT NULL,
  `IdMunicipio` int(11) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `IdSexo` int(11) NOT NULL,
  `Foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `Curp_UNIQUE` (`Curp`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `fk_user_status1_idx` (`IdStatus`),
  KEY `fk_user_foto1_idx` (`IdFoto`),
  KEY `fk_user_municipios1_idx` (`IdMunicipio`),
  KEY `fk_user_estados1_idx` (`IdEstado`),
  KEY `fk_user_sexo1_idx` (`IdSexo`),
  CONSTRAINT `fk_user_estados1` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_foto1` FOREIGN KEY (`IdFoto`) REFERENCES `foto` (`IdFoto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_municipios1` FOREIGN KEY (`IdMunicipio`) REFERENCES `municipios` (`IdMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_sexo1` FOREIGN KEY (`IdSexo`) REFERENCES `sexo` (`IdSexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_status1` FOREIGN KEY (`IdStatus`) REFERENCES `status` (`IdStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (28,'kerina','0aqQ66SuvCdQn0iUUfzmuKPoHeZT69zL','$2y$13$NJqDXJWQlUEPo3s0Zsz/8um/O0L4hh51gNkFYNZgdiwerhCrylCv.',NULL,'kerina@gmail.com',10,1528133612,1528133612,'KRCE951030JUKQWE03','Karina','Cervantes','Romero','Guaymas','5212291766675','2000-02-10','2018-06-04',1,1,5,2,1,'https://vignette.wikia.nocookie.net/harrypotter/images/c/ca/Evanna_Lynch_by_Faye_Thomas_2014.jpg/revision/latest?cb=20150213101624');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-05 22:03:06
