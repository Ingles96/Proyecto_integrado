-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para dietplus+
CREATE DATABASE IF NOT EXISTS `dietplus+` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dietplus+`;


-- Volcando estructura para tabla dietplus+.dietas
CREATE TABLE IF NOT EXISTS `dietas` (
  `idDietas` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idDietas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dietplus+.dietas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `dietas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dietas` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.ejercicios_videos
CREATE TABLE IF NOT EXISTS `ejercicios_videos` (
  `idEjercicios_Videos` int(11) NOT NULL,
  `Duracion` varchar(50) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idEjercicios_Videos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dietplus+.ejercicios_videos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ejercicios_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejercicios_videos` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticias` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(45) NOT NULL,
  `Subtitulo` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idNoticias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dietplus+.noticias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.noticias_usuarios
CREATE TABLE IF NOT EXISTS `noticias_usuarios` (
  `Noticias_idNoticias` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`Noticias_idNoticias`,`Usuarios_idUsuarios`),
  KEY `fk_Noticias_has_Usuarios_Noticias1` (`Noticias_idNoticias`),
  KEY `fk_Noticias_has_Usuarios_Usuarios1` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Noticias_has_Usuarios_Noticias1` FOREIGN KEY (`Noticias_idNoticias`) REFERENCES `noticias` (`idNoticias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Noticias_has_Usuarios_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dietplus+.noticias_usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias_usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Foto` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Pass` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `rol` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Sexo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Altura` float NOT NULL,
  `Peso` float NOT NULL,
  `ActividadDiaria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `ProblemasSalud` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `DescripcionActividadDiaria` text COLLATE latin1_spanish_ci,
  `ProblemasSaludDescripcion` text COLLATE latin1_spanish_ci,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla dietplus+.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.usuarios_dietas
CREATE TABLE IF NOT EXISTS `usuarios_dietas` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Dietas_idDietas` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_idUsuarios`,`Dietas_idDietas`),
  KEY `fk_Usuarios_has_Dietas_Usuarios1` (`Usuarios_idUsuarios`),
  KEY `fk_Usuarios_has_Dietas_Dietas1` (`Dietas_idDietas`),
  CONSTRAINT `fk_Usuarios_has_Dietas_Dietas1` FOREIGN KEY (`Dietas_idDietas`) REFERENCES `dietas` (`idDietas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Dietas_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla dietplus+.usuarios_dietas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_dietas` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_dietas` ENABLE KEYS */;


-- Volcando estructura para tabla dietplus+.usuarios_ejerciciosvideos
CREATE TABLE IF NOT EXISTS `usuarios_ejerciciosvideos` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `EjerciciosVideos_idEjerciciosVideos` int(11) NOT NULL,
  PRIMARY KEY (`Usuarios_idUsuarios`,`EjerciciosVideos_idEjerciciosVideos`),
  KEY `fk_Usuarios_has_Ejercicios-Videos_Usuarios1` (`Usuarios_idUsuarios`),
  KEY `fk_Usuarios_has_Ejercicios-Videos_Ejercicios-Videos1` (`EjerciciosVideos_idEjerciciosVideos`),
  CONSTRAINT `fk_Usuarios_has_Ejercicios-Videos_Ejercicios-Videos1` FOREIGN KEY (`EjerciciosVideos_idEjerciciosVideos`) REFERENCES `ejercicios_videos` (`idEjercicios_Videos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Ejercicios-Videos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla dietplus+.usuarios_ejerciciosvideos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_ejerciciosvideos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_ejerciciosvideos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
