-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: secure_hood
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGrupo` varchar(45) NOT NULL,
  `descricao` text,
  `codigoGrupo` mediumtext,
  `grupoAtivo` tinyint(1) NOT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `mensagem` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
INSERT INTO `mensagem` VALUES (1,'HELLO','msg',2,'2018-03-26 00:09:35'),(2,'HELLO2','msg2',0,'2018-03-26 00:17:23');
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem-grupo`
--

DROP TABLE IF EXISTS `mensagem-grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem-grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensagem-grupo_mensagem1_idx` (`mensagem_id`),
  KEY `fk_mensagem-grupo_grupo1_idx` (`grupo_id`),
  CONSTRAINT `fk_mensagem-grupo_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagem-grupo_mensagem1` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem-grupo`
--

LOCK TABLES `mensagem-grupo` WRITE;
/*!40000 ALTER TABLE `mensagem-grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem-grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem-usuario`
--

DROP TABLE IF EXISTS `mensagem-usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem-usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remetente_id` int(11) NOT NULL,
  `destinatario_id` int(11) NOT NULL,
  `lida` tinyint(1) NOT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensagem-usuario_usuario1_idx` (`remetente_id`),
  KEY `fk_mensagem-usuario_usuario2_idx` (`destinatario_id`),
  CONSTRAINT `fk_mensagem-usuario_usuario1` FOREIGN KEY (`remetente_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagem-usuario_usuario2` FOREIGN KEY (`destinatario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem-usuario`
--

LOCK TABLES `mensagem-usuario` WRITE;
/*!40000 ALTER TABLE `mensagem-usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem-usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `primeiroNome` varchar(45) DEFAULT NULL,
  `ultimoNome` varchar(45) DEFAULT NULL,
  `msgPanicoPadrao` text,
  `usuarioAtivo` tinyint(1) DEFAULT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  `caminhoFotoPerfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'matheus','teste@teste.com','admin',NULL,NULL,NULL,1,NULL,NULL),(2,'teste','teste@teste.com','698dc19d489c4e4db73e28a713eab07b',NULL,NULL,NULL,NULL,NULL,NULL),(3,'matheus','matheusrf96@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,'Socorro!',1,'2018-03-29 01:24:05',NULL),(4,'oi','oi@oi','a2e63ee01401aaeca78be023dfbb8c59',NULL,NULL,'Socorro!',1,'2018-03-29 01:25:23',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario-grupo`
--

DROP TABLE IF EXISTS `usuario-grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario-grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `dataEntrada` datetime DEFAULT NULL,
  `membroAceito` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario-grupo_usuario_idx` (`usuario_id`),
  KEY `fk_usuario-grupo_grupo1_idx` (`grupo_id`),
  CONSTRAINT `fk_usuario-grupo_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario-grupo_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario-grupo`
--

LOCK TABLES `usuario-grupo` WRITE;
/*!40000 ALTER TABLE `usuario-grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario-grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario-mensagem`
--

DROP TABLE IF EXISTS `usuario-mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario-mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `mensagem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario-mensagem_usuario1_idx` (`usuario_id`),
  KEY `fk_usuario-mensagem_mensagem1_idx` (`mensagem_id`),
  CONSTRAINT `fk_usuario-mensagem_mensagem1` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario-mensagem_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario-mensagem`
--

LOCK TABLES `usuario-mensagem` WRITE;
/*!40000 ALTER TABLE `usuario-mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario-mensagem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-15 18:47:14
