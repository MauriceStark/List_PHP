-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2013 a las 07:29:06
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `imagen` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`imagen`, `iid`) VALUES
('46228_271892106266138_2021862281_n.jpg', 1),
('Vector_Mario_Bros1_UP_Mushroom_by_chris_a.jpg', 2),
('Neo-Bullet-Stop.jpg', 3),
('By~KissOfParis (2).png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parrafos`
--

CREATE TABLE IF NOT EXISTS `parrafos` (
  `uid` int(11) NOT NULL,
  `texto` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `parrafos`
--

INSERT INTO `parrafos` (`uid`, `texto`, `status`, `pid`) VALUES
(30, 'prueba 30', 0, 3),
(32, 'hola mundo', 1, 4),
(32, 'tengo cosas que hacer', 0, 5),
(32, 'hola soy el usuario 23', 0, 6),
(32, 'Maurice', 0, 11),
(32, 'hola mundo', 0, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_registro`
--

CREATE TABLE IF NOT EXISTS `tabla_registro` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `USER` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `PASSWORD` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `tabla_registro`
--

INSERT INTO `tabla_registro` (`ID`, `NOMBRE`, `USER`, `PASSWORD`, `EMAIL`) VALUES
(1, 'Mauricio', 'Mauricio', 'Mauricio', 'Mauricio'),
(29, 'Mauricio', 'Mauricio', '7f7b79d60a839f158b40d69bfc7e1c2e', 'Mauricio'),
(30, 'pepe', 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 'pepe'),
(31, 'hola', 'hola', '4d186321c1a7f0f354b297e8914ab240', 'hola'),
(32, 'maurice', 'maurice', 'dd099c2f017f990e68f5c90a413abc5d', 'maurice');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
