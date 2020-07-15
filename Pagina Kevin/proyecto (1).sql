-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2020 a las 09:23:56
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `ID_Cat` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cat` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Cat`, `Nombre_Cat`) VALUES
(1, 'Short'),
(2, 'Camisa'),
(3, 'Falda'),
(4, 'Pantalón'),
(5, 'Sueter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
  `ID_Color` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Col` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Color`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`ID_Color`, `Nombre_Col`) VALUES
(1, 'Negro'),
(3, 'Blanco'),
(4, 'Rojo'),
(5, 'Azul'),
(6, 'Gris');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `ID_Com` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Com` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Mensaje_Com` varchar(255) NOT NULL,
  `Color_Com` varchar(40) NOT NULL,
  `Stock` int(60) NOT NULL,
  `Product` varchar(60) NOT NULL,
  `Imagen` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_Com`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID_Com`, `Fecha_Com`, `Mensaje_Com`, `Color_Com`, `Stock`, `Product`, `Imagen`) VALUES
(77, '2020-07-15 07:19:05', 'Se ha registrado una nueva compra por: ', '', 0, '', ''),
(79, '2020-07-15 07:30:52', 'Se ha registrado una nueva compra por: ', '', 0, '', ''),
(80, '2020-07-15 07:41:28', '', '1', 1, 'Camisa V', 'imagen/camisa.jpg'),
(81, '2020-07-15 07:47:14', '', '5', 5, 'Sueter Cuello v', 'imagen/sueter.jpg'),
(82, '2020-07-15 09:15:03', '', '1', 1, 'Camisa V', 'imagen/camisa.jpg'),
(83, '2020-07-15 09:15:09', '', '3', 10, 'Pantalon Vaquero', 'imagen/pantalon.jpg'),
(84, '2020-07-15 09:15:14', '', '5', 5, 'Sueter Cuello v', 'imagen/sueter.jpg');

--
-- Disparadores `compras`
--
DROP TRIGGER IF EXISTS `EliStock`;
DELIMITER //
CREATE TRIGGER `EliStock` BEFORE UPDATE ON `compras`
 FOR EACH ROW BEGIN
    UPDATE productos 
    SET productos.Stock_Pro = productos.Stock_Pro - Canti_Pro
    WHERE productos.ID_Pro = productos.ID_Pro;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `ID_Pro` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Pro` varchar(50) NOT NULL,
  `Imagen_Pro` varchar(250) NOT NULL,
  `Descrip_Pro` varchar(255) NOT NULL,
  `Categoria_FK` int(11) NOT NULL,
  `Color_FK` int(11) NOT NULL,
  `Stock_Pro` int(60) NOT NULL,
  `Canti_Pro` int(11) NOT NULL,
  PRIMARY KEY (`ID_Pro`),
  KEY `Categoria_FK` (`Categoria_FK`,`Color_FK`),
  KEY `Color_FK` (`Color_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Pro`, `Nombre_Pro`, `Imagen_Pro`, `Descrip_Pro`, `Categoria_FK`, `Color_FK`, `Stock_Pro`, `Canti_Pro`) VALUES
(8, 'Camisa V', 'imagen/camisa.jpg', 'Hermosa camisa con cuello v con mucho estilo y sensualidad', 2, 1, 60, 1),
(9, 'Pantalon Vaquero', 'imagen/pantalon.jpg', 'Un pantalón con mucho estilo, para verte del oeste pero sin verte tan corriente', 4, 3, 60, 10),
(11, 'Sueter Cuello v', 'imagen/sueter.jpg', 'Bonito sueter que te calentera muchisimo en invierno', 5, 5, 60, 5),
(15, 'Sueter de hombre', 'imagen/sueterhombre.jpg', 'Sueter estilo fit para poder pasarla caliente cuando sea', 5, 1, 60, 1),
(16, 'Camisa de Rock', 'imagen/camisarock.jpg', 'Camisa para poder presumirle a los reguetoneros', 2, 1, 60, 1),
(18, 'Falda Mujer', 'imagen/falda.jpg', 'Falda corta de mujer para poder mostrar los piesitos', 3, 1, 60, 1),
(19, 'Short Hombre', 'imagen/short.jpg', 'Short  para que puedas estar comodo en la casa', 1, 1, 60, 1);

--
-- Disparadores `productos`
--
DROP TRIGGER IF EXISTS `Tri_Color`;
DELIMITER //
CREATE TRIGGER `Tri_Color` AFTER UPDATE ON `productos`
 FOR EACH ROW INSERT INTO compras(Color_Com, Stock,Product,Imagen)
VALUES( new.Color_FK ,CONCAT(new.Canti_Pro),CONCAT(old.Nombre_Pro),CONCAT(old.Imagen_Pro))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_User` varchar(100) NOT NULL,
  `Correo_User` varchar(150) NOT NULL,
  `Contra_User` varchar(20) NOT NULL,
  `Tel_User` varchar(20) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_User`, `Nombre_User`, `Correo_User`, `Contra_User`, `Tel_User`, `Status`) VALUES
(1, 'Kevin Carrillo Cuevas', 'kevin_trollano@hotmail.com', 'hayabusa', '9983170269', 1),
(2, 'Alexis Carrillo Cuevas', 'alexis@hotmail.com', 'alexis', '9988776655', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Categoria_FK`) REFERENCES `categorias` (`ID_Cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`Color_FK`) REFERENCES `colores` (`ID_Color`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
