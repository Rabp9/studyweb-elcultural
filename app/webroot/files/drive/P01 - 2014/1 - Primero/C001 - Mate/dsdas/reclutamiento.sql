CREATE DATABASE  IF NOT EXISTS `reclutamiento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `reclutamiento`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: reclutamiento
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `beneficios`
--

DROP TABLE IF EXISTS `beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficios` (
  `idbeneficios` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbeneficios`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficios`
--

LOCK TABLES `beneficios` WRITE;
/*!40000 ALTER TABLE `beneficios` DISABLE KEYS */;
INSERT INTO `beneficios` VALUES (1,'Seguro de vida','Activo'),(2,'Ingreso a Planillas','Activo'),(3,'AFP','Activo'),(4,'planillas','Activo');
/*!40000 ALTER TABLE `beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitacion`
--

DROP TABLE IF EXISTS `capacitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitacion` (
  `idcapacitacion` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(45) DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  PRIMARY KEY (`idcapacitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitacion`
--

LOCK TABLES `capacitacion` WRITE;
/*!40000 ALTER TABLE `capacitacion` DISABLE KEYS */;
INSERT INTO `capacitacion` VALUES (1,'qqqqqqqqq','2014-06-03','2014-06-05','30:00 Minutos','Activo',1),(2,'aaa','2014-06-04','2014-06-06','30:00 Minutos','Activo',1);
/*!40000 ALTER TABLE `capacitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcargo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'GERENTE','Activo'),(2,'INGENIERO DE SISTEMAS','Activo'),(3,'SECRETARIA DE VENTAS','Activo'),(4,'LIMPIEZA','Activo'),(5,'CONTADOR','Activo'),(6,'administrador','Activo');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrataciones`
--

DROP TABLE IF EXISTS `contrataciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrataciones` (
  `idcontrataciones` int(11) NOT NULL AUTO_INCREMENT,
  `idempleado` int(11) NOT NULL,
  `idtipocontrato` int(11) NOT NULL,
  `tipopago` varchar(45) DEFAULT NULL,
  `periodopago` varchar(45) DEFAULT NULL,
  `sueldo` varchar(45) DEFAULT NULL,
  `fecharegistrocontrato` date DEFAULT NULL,
  `fechainicioservicio` date DEFAULT NULL,
  `fechaceseservicio` date DEFAULT NULL,
  `rnd` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`idcontrataciones`),
  KEY `fk_contrataciones_tipocontrato1` (`idtipocontrato`),
  CONSTRAINT `fk_contrataciones_tipocontrato1` FOREIGN KEY (`idtipocontrato`) REFERENCES `tipocontrato` (`idtipocontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrataciones`
--

LOCK TABLES `contrataciones` WRITE;
/*!40000 ALTER TABLE `contrataciones` DISABLE KEYS */;
INSERT INTO `contrataciones` VALUES (1,1,1,'Soles','Semana','400','2014-06-10','2014-06-06','2014-06-19','8.667123337046263');
/*!40000 ALTER TABLE `contrataciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrataciones_beneficios`
--

DROP TABLE IF EXISTS `contrataciones_beneficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrataciones_beneficios` (
  `idcontrataciones_beneficios` int(11) NOT NULL AUTO_INCREMENT,
  `idcontrataciones` int(11) NOT NULL,
  `idbeneficios` int(11) NOT NULL,
  PRIMARY KEY (`idcontrataciones_beneficios`),
  KEY `fk_contrataciones_tipocontrato11` (`idcontrataciones`),
  KEY `fk_contrataciones_beneficios11` (`idbeneficios`),
  CONSTRAINT `fk_contrataciones_beneficios11` FOREIGN KEY (`idbeneficios`) REFERENCES `beneficios` (`idbeneficios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrataciones_tipocontrato11` FOREIGN KEY (`idcontrataciones`) REFERENCES `contrataciones` (`idcontrataciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrataciones_beneficios`
--

LOCK TABLES `contrataciones_beneficios` WRITE;
/*!40000 ALTER TABLE `contrataciones_beneficios` DISABLE KEYS */;
INSERT INTO `contrataciones_beneficios` VALUES (1,1,1);
/*!40000 ALTER TABLE `contrataciones_beneficios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convocatoria`
--

DROP TABLE IF EXISTS `convocatoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convocatoria` (
  `idconvocatoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(5000) DEFAULT NULL,
  `fechaconvocatoria` date DEFAULT NULL,
  `documentacion` varchar(120) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idconvocatoria`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convocatoria`
--

LOCK TABLES `convocatoria` WRITE;
/*!40000 ALTER TABLE `convocatoria` DISABLE KEYS */;
INSERT INTO `convocatoria` VALUES (1,'Se necesita ingeniero de sistemas','2014-06-22','algo.pdf','Activo'),(2,'se necesita choferes urgente categoria A-III','2014-07-17',NULL,'Activo'),(3,'SE NECESITA TERRAMOZAS ','2014-07-22',NULL,'Activo'),(20,'asdsda','2014-10-10','apis_a_strategy_guide.pdf','Activo'),(21,'dsajdiasjsdioa','2014-10-10','ibm_rational_clearcase_7.0.pdf','Activo');
/*!40000 ALTER TABLE `convocatoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculum` (
  `idcurriculum` int(11) NOT NULL AUTO_INCREMENT,
  `idpostulante` int(11) NOT NULL,
  `gradoinstruccion` varchar(45) DEFAULT NULL,
  `descripcionestudios` varchar(4500) DEFAULT NULL,
  `descripcionexperiencia` varchar(4500) DEFAULT NULL,
  `descripcionreferencia` varchar(4500) DEFAULT NULL,
  `fechacurriculun` date DEFAULT NULL,
  PRIMARY KEY (`idcurriculum`),
  KEY `fk_curriculum_postulante1` (`idpostulante`),
  CONSTRAINT `fk_curriculum_postulante1` FOREIGN KEY (`idpostulante`) REFERENCES `postulante` (`idpostulante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum`
--

LOCK TABLES `curriculum` WRITE;
/*!40000 ALTER TABLE `curriculum` DISABLE KEYS */;
INSERT INTO `curriculum` VALUES (1,1,'Superior','unt - UCV','jaja','unt','2014-06-03');
/*!40000 ALTER TABLE `curriculum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `cbo1` varchar(45) DEFAULT NULL,
  `puntaje` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idpostulante` int(11) NOT NULL,
  `cbo2` varchar(45) DEFAULT NULL,
  `cbo3` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`),
  KEY `fk_evaluacion_postulante1` (`idpostulante`),
  CONSTRAINT `fk_evaluacion_postulante1` FOREIGN KEY (`idpostulante`) REFERENCES `postulante` (`idpostulante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (1,'Psicologico','10','aaaaaaaaaaaaaaaaaaa',1,'Conocimiento','Aptitud','2014-06-18');
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluar_desempeno`
--

DROP TABLE IF EXISTS `evaluar_desempeno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluar_desempeno` (
  `idevaluar_desempeno` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(45) DEFAULT NULL,
  `puntaje` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  `PersonaCodigo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idevaluar_desempeno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluar_desempeno`
--

LOCK TABLES `evaluar_desempeno` WRITE;
/*!40000 ALTER TABLE `evaluar_desempeno` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluar_desempeno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcion` (
  `nOpCodigo` int(11) NOT NULL,
  `cOpDescripcion` varchar(50) DEFAULT NULL,
  `cOpRecurso` varchar(100) DEFAULT NULL,
  `nApCodigo` int(11) DEFAULT NULL,
  `nOpEstado` int(1) DEFAULT NULL,
  `nOpDependencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`nOpCodigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
INSERT INTO `opcion` VALUES (1,'MANTENEDORES','#',2,3,0),(2,'REGISTRAR CARGO  ','cargo.php',2,3,1),(3,'REGISTRAR TIPO CONTRATO ','tipocontrato.php',2,3,1),(4,'REGISTRAR CONVOCATORIA','convocatoria.php',2,3,1),(5,'REGISTRAR BENEFICIOS','beneficios.php',2,3,1),(6,'REGISTRAR POSTULANTE','postulante.php',2,3,1),(7,'REGISTRAR CURRICULUM','curriculum.php',2,3,1),(8,'REGISTRAR PERSONAL','personal.php',2,3,1),(9,'REGISTRAR USUARIO','usuario.php',2,3,1),(10,'PERMISOS','privilegios.php',2,3,1),(11,'PROCESOS','#',2,3,0),(12,'REGISTRAR CONTRATACIONES','contrataciones.php',2,3,11),(13,'REGISTRAR CAPACITACIONES','capacitaciones.php',2,3,11),(14,'REGISTRAR EMPELADO','empleado.php',2,3,11),(15,'REGISTRAR EVALUACION','evaluacion.php',2,3,11),(16,'EVALUAR  DESEMPEÑO','desempeno.php',2,3,11),(17,'REPORTES','#',2,3,0),(18,'REPORTAR EMPLEADO ','re_empleado.php',2,3,17),(19,'REPORTAR CONTRATACIONES','re_contrataciones.php',2,3,17),(20,'REPORTAR CAPACITACIONES ','re_capacitaciones.php',2,3,17),(21,'REPORTAR POSTULANTE','repostulante.php',2,3,17),(22,'REPORTAR EVALUACION','reevaluacion.php',2,3,17);
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `PersonaCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `PersonaNombre` varchar(45) DEFAULT NULL,
  `PersonaApellidos` varchar(45) DEFAULT NULL,
  `PersonaDireccion` varchar(50) DEFAULT NULL,
  `PersonaEmail` varchar(50) DEFAULT NULL,
  `PersonaCelular` varchar(50) DEFAULT NULL,
  `PersonaEstado` varchar(45) DEFAULT NULL,
  `idcargo` int(11) NOT NULL,
  `PersonaNacimiento` varchar(45) DEFAULT NULL,
  `PersonaNacionalidad` varchar(45) DEFAULT NULL,
  `PersonaInstruccion` varchar(45) DEFAULT NULL,
  `PersonaEstadoCivil` varchar(45) DEFAULT NULL,
  `PersonaSexo` varchar(45) DEFAULT NULL,
  `PersonaDni` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PersonaCodigo`),
  KEY `fk_persona_cargo1` (`idcargo`),
  CONSTRAINT `fk_persona_cargo1` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'GianCarlo','Saldarriaga Alza','Urb.Vista Hermoza n°1232','gsa.1202@hotmail.com','944632322','Activo',1,'2013/11/18','Peruana','Superior','Soltero','Masculino','43221026'),(2,'Juan Francisco','Pacheco Torres','Av los incas 9569','jfpacheco@hotmail.com','974743748','Activo',2,'1970-06-11','Peruano','Superior','Casado','Masculino','47348843');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_opcion`
--

DROP TABLE IF EXISTS `persona_opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_opcion` (
  `PersonaCodigo` int(11) DEFAULT NULL,
  `nOpCodigo` int(11) DEFAULT NULL,
  `nPerOpEstado` int(12) DEFAULT NULL,
  KEY `fk_Persona_Opcion_Persona1` (`PersonaCodigo`),
  KEY `fk_Persona_Opcion_Opcion1` (`nOpCodigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_opcion`
--

LOCK TABLES `persona_opcion` WRITE;
/*!40000 ALTER TABLE `persona_opcion` DISABLE KEYS */;
INSERT INTO `persona_opcion` VALUES (1,1,3),(1,2,3),(1,3,3),(1,4,3),(1,5,3),(1,6,3),(1,7,3),(1,8,3),(1,9,3),(1,10,3),(1,11,3),(1,12,3),(1,13,3),(1,14,3),(1,15,3),(1,16,3),(1,17,3),(1,18,3),(1,19,3),(1,20,3),(1,21,3),(1,22,3);
/*!40000 ALTER TABLE `persona_opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulante`
--

DROP TABLE IF EXISTS `postulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postulante` (
  `idpostulante` int(11) NOT NULL AUTO_INCREMENT,
  `datospersonales` varchar(150) DEFAULT NULL,
  `direcion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `PersonaCodigo` int(11) NOT NULL,
  `idconvocatoria` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `fechapostulacion` date DEFAULT NULL,
  `puestocargo` varchar(45) DEFAULT NULL,
  `Dni` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpostulante`),
  KEY `fk_postulante_persona1` (`PersonaCodigo`),
  KEY `fk_postulante_convocatoria1` (`idconvocatoria`),
  CONSTRAINT `fk_postulante_convocatoria1` FOREIGN KEY (`idconvocatoria`) REFERENCES `convocatoria` (`idconvocatoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_postulante_persona1` FOREIGN KEY (`PersonaCodigo`) REFERENCES `persona` (`PersonaCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulante`
--

LOCK TABLES `postulante` WRITE;
/*!40000 ALTER TABLE `postulante` DISABLE KEYS */;
INSERT INTO `postulante` VALUES (1,'Jose Luis Mantilla Villares','Trujillo','938893933','Masculino','1980-06-12',1,1,'jmantilla.villar@hotmail.com','Peruana','2014-06-03','1','43221027'),(2,'Juan Flores Paredes Castro','Av los Almendros 345','987655444','Masculino','1996-07-02',1,2,'jflores2@hotmail.com','Peruano','2014-07-17','4','56567454'),(3,'MARCELO RODRIGUEZ CARRANZA','Av los incas 564','932774743','Masculino','1985-07-16',1,1,'marcelo_rodri474@hotmail.com','peruano','2014-07-17','5','89838938');
/*!40000 ALTER TABLE `postulante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrar_empleado`
--

DROP TABLE IF EXISTS `registrar_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrar_empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `idpostulante` int(11) NOT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrar_empleado`
--

LOCK TABLES `registrar_empleado` WRITE;
/*!40000 ALTER TABLE `registrar_empleado` DISABLE KEYS */;
INSERT INTO `registrar_empleado` VALUES (1,3),(2,1),(3,1);
/*!40000 ALTER TABLE `registrar_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocontrato`
--

DROP TABLE IF EXISTS `tipocontrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocontrato` (
  `idtipocontrato` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipocontrato`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocontrato`
--

LOCK TABLES `tipocontrato` WRITE;
/*!40000 ALTER TABLE `tipocontrato` DISABLE KEYS */;
INSERT INTO `tipocontrato` VALUES (1,'CONTRATO Tiempo Completo','Activo'),(2,'CONTRATO TIEMPO PARCIAL','Activo'),(3,'CONTRATO INDETERMINADO','Activo'),(4,'CONTRATO RECIBOS POR HONORARIOS','Activo');
/*!40000 ALTER TABLE `tipocontrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `UsuarioCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `UsuarioClave` varchar(100) DEFAULT NULL,
  `UsuarioEstado` varchar(45) DEFAULT NULL,
  `UsuarioNombre` varchar(45) DEFAULT NULL,
  `PersonaCodigo` int(11) NOT NULL,
  PRIMARY KEY (`UsuarioCodigo`),
  KEY `fk_usuario_persona1` (`PersonaCodigo`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`PersonaCodigo`) REFERENCES `persona` (`PersonaCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'d25eb2bfff6d479942694a95389e547e','Activo','giancarlo',1),(2,'21232f297a57a5a743894a0e4a801fc3','Activo','admin',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'reclutamiento'
--

--
-- Dumping routines for database 'reclutamiento'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-25  0:12:56
