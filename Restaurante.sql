CREATE DATABASE  IF NOT EXISTS `restaurante` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restaurante`;
-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurante
-- ------------------------------------------------------
-- Server version	5.7.24-log

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
-- Table structure for table `carta`
--

DROP TABLE IF EXISTS `carta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carta` (
  `idMenu` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carta`
--

LOCK TABLES `carta` WRITE;
/*!40000 ALTER TABLE `carta` DISABLE KEYS */;
/*!40000 ALTER TABLE `carta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartacategoria`
--

DROP TABLE IF EXISTS `cartacategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartacategoria` (
  `Carta_idMenu` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `PrecioVenta` smallint(6) DEFAULT NULL,
  KEY `fk_CartaCategoria_Carta1_idx` (`Carta_idMenu`),
  KEY `fk_CartaCategoria_Productos1_idx` (`Productos_idProductos`),
  CONSTRAINT `fk_CartaCategoria_Carta1` FOREIGN KEY (`Carta_idMenu`) REFERENCES `carta` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CartaCategoria_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartacategoria`
--

LOCK TABLES `cartacategoria` WRITE;
/*!40000 ALTER TABLE `cartacategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartacategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Carne');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comanda`
--

DROP TABLE IF EXISTS `comanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comanda` (
  `idComanda` int(11) NOT NULL AUTO_INCREMENT,
  `horaPedido` datetime DEFAULT NULL,
  `horaEntrega` datetime DEFAULT NULL,
  `Mesas_idMesas` int(11) NOT NULL,
  `Venta_idVenta` int(11) DEFAULT NULL,
  `Empleado_rut` varchar(10) NOT NULL,
  PRIMARY KEY (`idComanda`),
  KEY `fk_Comanda_Mesas1_idx` (`Mesas_idMesas`),
  KEY `fk_Comanda_Venta1_idx` (`Venta_idVenta`),
  KEY `fk_Comanda_Empleado1_idx` (`Empleado_rut`),
  CONSTRAINT `fk_Comanda_Empleado1` FOREIGN KEY (`Empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_Mesas1` FOREIGN KEY (`Mesas_idMesas`) REFERENCES `mesas` (`idMesas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_Venta1` FOREIGN KEY (`Venta_idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comanda`
--

LOCK TABLES `comanda` WRITE;
/*!40000 ALTER TABLE `comanda` DISABLE KEYS */;
/*!40000 ALTER TABLE `comanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comandaproducto`
--

DROP TABLE IF EXISTS `comandaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comandaproducto` (
  `Comanda_idComanda` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `cantidad` tinyint(4) DEFAULT NULL,
  `precio` mediumint(9) DEFAULT NULL,
  KEY `fk_Comanda_has_Productos_Comanda1_idx` (`Comanda_idComanda`),
  KEY `fk_Comanda_has_Productos_Productos1_idx` (`Productos_idProductos`),
  CONSTRAINT `fk_Comanda_has_Productos_Comanda1` FOREIGN KEY (`Comanda_idComanda`) REFERENCES `comanda` (`idComanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_has_Productos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comandaproducto`
--

LOCK TABLES `comandaproducto` WRITE;
/*!40000 ALTER TABLE `comandaproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `comandaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepago`
--

DROP TABLE IF EXISTS `detallepago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepago` (
  `iddetallePago` int(11) NOT NULL AUTO_INCREMENT,
  `MedioPago_idMedioPago` int(11) NOT NULL,
  `Venta_idVenta` int(11) NOT NULL,
  `monto` smallint(6) DEFAULT NULL,
  `comprobante` varchar(30) DEFAULT NULL,
  `banco` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iddetallePago`),
  KEY `fk_MedioPago_has_Venta_MedioPago1_idx` (`MedioPago_idMedioPago`),
  KEY `fk_MedioPago_has_Venta_Venta1_idx` (`Venta_idVenta`),
  CONSTRAINT `fk_MedioPago_has_Venta_MedioPago1` FOREIGN KEY (`MedioPago_idMedioPago`) REFERENCES `mediopago` (`idMedioPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MedioPago_has_Venta_Venta1` FOREIGN KEY (`Venta_idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepago`
--

LOCK TABLES `detallepago` WRITE;
/*!40000 ALTER TABLE `detallepago` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `rut` varchar(10) NOT NULL,
  `pass` varchar(5) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidoPaterno` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `sueldo` mediumint(9) DEFAULT NULL,
  `fechaContrato` date DEFAULT NULL,
  `Perfil_idPerfil` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_Empleado_Perfil1_idx` (`Perfil_idPerfil`),
  CONSTRAINT `fk_Empleado_Perfil1` FOREIGN KEY (`Perfil_idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('1','1234','Administrador','G','G',45546,200,'2018-11-22',1,NULL),('2','1234','cocinero12','c','c',222,22222,'2018-11-25',4,'Activo');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos`
--

DROP TABLE IF EXISTS `insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos` (
  `idInsumos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `stock` tinyint(4) DEFAULT NULL,
  `costo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idInsumos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos`
--

LOCK TABLES `insumos` WRITE;
/*!40000 ALTER TABLE `insumos` DISABLE KEYS */;
INSERT INTO `insumos` VALUES (1,'carne de cerdo',6,5000),(5,'carne de vacuno',5,1400);
/*!40000 ALTER TABLE `insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mediopago`
--

DROP TABLE IF EXISTS `mediopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mediopago` (
  `idMedioPago` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idMedioPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mediopago`
--

LOCK TABLES `mediopago` WRITE;
/*!40000 ALTER TABLE `mediopago` DISABLE KEYS */;
/*!40000 ALTER TABLE `mediopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesas`
--

DROP TABLE IF EXISTS `mesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesas` (
  `idMesas` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(8) DEFAULT NULL,
  `numeroMesa` tinyint(4) DEFAULT NULL,
  `Empleado_rut1` varchar(10) NOT NULL,
  PRIMARY KEY (`idMesas`),
  KEY `fk_Mesas_Empleado1_idx` (`Empleado_rut1`),
  CONSTRAINT `fk_Mesas_Empleado1` FOREIGN KEY (`Empleado_rut1`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesas`
--

LOCK TABLES `mesas` WRITE;
/*!40000 ALTER TABLE `mesas` DISABLE KEYS */;
INSERT INTO `mesas` VALUES (1,'abierta',1,'1'),(2,'cerrada',2,'1');
/*!40000 ALTER TABLE `mesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador'),(2,'Cajera'),(3,'Garzon'),(4,'Cocinero');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `costo` smallint(6) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `fk_Productos_Categoria1_idx` (`Categoria_idCategoria`),
  CONSTRAINT `fk_Productos_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'carne',1400,'dd',1,'Inactivo'),(2,'carne',1400,'dd',1,'Inactivo'),(3,'carne3',1400,'la carne rica',1,'Inactivo'),(4,'Carne Cocida de cerdo',2500,'1 porcion de carne de cerdo',1,'Activo'),(5,'carne de vacuno',2000,'1 porcion de carne de Vacuno',1,'Activo');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receta`
--

DROP TABLE IF EXISTS `receta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receta` (
  `idReceta` int(11) NOT NULL AUTO_INCREMENT,
  `medida` decimal(10,0) DEFAULT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `Insumos_idInsumos` int(11) NOT NULL,
  PRIMARY KEY (`idReceta`),
  KEY `fk_Receta_Productos1_idx` (`Productos_idProductos`),
  KEY `fk_Receta_Insumos1_idx` (`Insumos_idInsumos`),
  CONSTRAINT `fk_Receta_Insumos1` FOREIGN KEY (`Insumos_idInsumos`) REFERENCES `insumos` (`idInsumos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Receta_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receta`
--

LOCK TABLES `receta` WRITE;
/*!40000 ALTER TABLE `receta` DISABLE KEYS */;
INSERT INTO `receta` VALUES (1,200,1,1);
/*!40000 ALTER TABLE `receta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(20) DEFAULT NULL,
  `apellidoPaternoCliente` varchar(20) DEFAULT NULL,
  `apellidoMaternoCliente` varchar(20) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `cantidadPersonas` tinyint(4) DEFAULT NULL,
  `fechaReservada` date DEFAULT NULL,
  `fechaIngresoReserva` datetime DEFAULT NULL,
  `Observaciones` longtext,
  `Empleado_rut` varchar(10) NOT NULL,
  `Mesas_idMesas` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `fk_Reserva_Empleado1_idx` (`Empleado_rut`),
  KEY `fk_Reserva_Mesas1_idx` (`Mesas_idMesas`),
  CONSTRAINT `fk_Reserva_Empleado1` FOREIGN KEY (`Empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Mesas1` FOREIGN KEY (`Mesas_idMesas`) REFERENCES `mesas` (`idMesas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'g','g','g',1,1,'2018-11-07','2018-11-07 00:00:00','gggggg','1',1),(4,NULL,NULL,NULL,55555,NULL,NULL,NULL,NULL,'1',1),(5,NULL,NULL,NULL,988246182,NULL,NULL,NULL,NULL,'1',1),(8,NULL,NULL,NULL,988246182,NULL,NULL,NULL,NULL,'1',1),(9,NULL,NULL,NULL,55555,NULL,NULL,NULL,NULL,'1',1),(10,NULL,NULL,NULL,988246182,NULL,NULL,NULL,NULL,'1',1),(11,NULL,NULL,NULL,55555,NULL,NULL,NULL,NULL,'1',1),(12,NULL,NULL,NULL,988246182,NULL,NULL,NULL,NULL,'1',1),(13,'A',NULL,NULL,988246182,NULL,NULL,NULL,NULL,'1',1),(14,'A',NULL,NULL,988246182,1,'2018-11-07','2018-11-07 00:00:00','Sin Restricciones','1',1),(18,'Zepeda',NULL,NULL,444,2,'2018-11-09','2018-11-07 00:00:00','Sin Restricciones','1',1);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `totalVenta` smallint(6) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `propina` smallint(6) DEFAULT NULL,
  `numeroBoleta` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-25  3:08:02
