# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.20)
# Database: plt
# Generation Time: 2020-01-25 01:24:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table plt
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plt`;

CREATE TABLE `plt` (
  `id_plt` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `fecha` timestamp NULL DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT NULL,
  `ejemplo` text,
  `estado` varchar(1) DEFAULT NULL,
  `idioma` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_plt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table plt_asig
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plt_asig`;

CREATE TABLE `plt_asig` (
  `id_plt` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL DEFAULT '0',
  `usuario` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_plt`,`id_concepto`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table plt_concepto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plt_concepto`;

CREATE TABLE `plt_concepto` (
  `id_plt` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL DEFAULT '0',
  `concepto` varchar(50) NOT NULL DEFAULT '',
  `cant_usuarios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_plt`,`id_concepto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table plt_resp
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plt_resp`;

CREATE TABLE `plt_resp` (
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `id_plt` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `tiempo` int(3) DEFAULT NULL,
  PRIMARY KEY (`usuario`,`id_plt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table plt_resp_detalle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plt_resp_detalle`;

CREATE TABLE `plt_resp_detalle` (
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `id_plt` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `nro_resp` int(11) NOT NULL,
  `resp` varchar(100) DEFAULT NULL,
  `t0` timestamp NULL DEFAULT NULL,
  `t1` timestamp NULL DEFAULT NULL,
  `t2` timestamp NULL DEFAULT NULL,
  `estado_val` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_plt`,`usuario`,`id_concepto`,`nro_resp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `registro_sujeto_ejemplo`;
CREATE TABLE `registro_sujeto_ejemplo` (
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `id_plt` int(11) NOT NULL,
  `fecha_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usuario`,`id_plt` )
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `plt_resp_detalle_codif`;
CREATE TABLE `plt_resp_detalle_codif` (
  `codificador` varchar(200) NOT NULL DEFAULT '',
  `usuario` varchar(200) NOT NULL DEFAULT '',
 `id_plt` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `nro_resp` int(11) NOT NULL,
  `id_codigo` int(11) NOT NULL,
  `codigo` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`codificador`,`id_plt`,`usuario`,`id_concepto`,`nro_resp`,`id_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `usuario_plt`;
CREATE TABLE `usuario_plt` (
  `id_plt` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `nro_conceptos` int(11) DEFAULT NULL,
    PRIMARY KEY (`id_plt`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dump of table usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario` varchar(200) NOT NULL DEFAULT '',
  `contrasenna` varchar(50) DEFAULT '',
  `activo` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido` varchar(500) DEFAULT NULL,
  `idioma` int(2) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuario` WRITE;



/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;

INSERT INTO `usuario` (`usuario`, `contrasenna`, `activo`, `id_rol`, `nombre`, `apellido`, `idioma`)
VALUES
	('admin','YWRtaW4=',1,1,'Administrador',NULL,NULL),
	('codif','Y29kaWY= ',1,3,'Codificador','',NULL),
        ('codif1','Y29kaWYx',1,4,'Codificador 1','',NULL),
        ('codif2','Y29kaWYy',1,4,'Codificador 2','',NULL) 
        ;

/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
