-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2016 a las 05:22:48
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `menegrande`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_propietario` int(5) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `id_propietario`, `nombre`, `correo`, `telefono`) VALUES
(1, 2, 'Javier Hidalgo', 'gabrielcaraballo1907@gmail.com', '04262858771'),
(2, 3, 'JosÃ© MartÃ­nez', '', ''),
(3, 4, 'Blanca Lugo', '', ''),
(4, 5, 'Marilis Clermont', '', ''),
(5, 6, 'Arelis Rangel', '', ''),
(6, 7, 'Carlos RodrÃ­guez', '', ''),
(7, 8, 'Ã“scar Ayala', '', ''),
(8, 9, 'Evanlucy Figueroa', '', ''),
(9, 10, 'Juan PernÃ­a', '', ''),
(10, 11, 'Carlos LÃ³pez', '', ''),
(11, 12, 'Alberto Ramos', '', ''),
(12, 13, 'Jorge Morillo', '', ''),
(13, 14, 'Alida Vargas', '', ''),
(14, 15, 'JesÃºs Lugo', '', ''),
(15, 16, 'Jairo RondÃ³n', '', ''),
(16, 17, 'Ricardo Reyes', '', ''),
(17, 18, 'Ricardo Reyes', '', ''),
(18, 19, 'Reina de GuillÃ©n', '', ''),
(19, 20, 'Daniela Romero', '', ''),
(20, 21, 'Pedro Aguilera', '', ''),
(21, 22, 'AlÃ­ Aponte', '', ''),
(22, 23, 'Luis Joel GonzÃ¡lez', '', ''),
(23, 24, 'Juan Mendoza', '', ''),
(24, 25, 'VÃ­ctor Videaux', '', ''),
(25, 26, 'JosÃ© LÃ³pez', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE IF NOT EXISTS `inmueble` (
  `id_inmueble` int(3) NOT NULL AUTO_INCREMENT,
  `inmueble` varchar(5) NOT NULL,
  `propietario` varchar(100) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `saldo` int(11) NOT NULL,
  `id_rol` int(1) NOT NULL,
  `id_estatus` int(1) NOT NULL,
  PRIMARY KEY (`id_inmueble`),
  UNIQUE KEY `inmueble` (`inmueble`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `inmueble`, `propietario`, `cedula`, `email`, `telefono`, `clave`, `saldo`, `id_rol`, `id_estatus`) VALUES
(1, 'admin', 'AdministraciÃ³n', '---', 'urbanizacionmenegrande@gmail.com', '0424-8536733', 'mene123', 0, 99, 1),
(3, 'A-01', 'JosÃ© MartÃ­nez', '', '', '', 'a012016', 480, 1, 1),
(4, 'A-02', 'Blanca Lugo', '', '', '', 'BL_022016', 1440, 1, 1),
(5, 'A-03', 'Marilis Clermont', '', '', '', 'A_03_2016', 120, 1, 1),
(6, 'A-04', 'Arelis Rangel', '', '', '', 'AR.A04.16', 240, 1, 1),
(7, 'A-05', 'Carlos RodrÃ­guez', '', '', '', 'CAR_A05', 3980, 1, 1),
(8, 'A-06', 'Ã“scar Ayala', '', '', '', 'oscar_a06', 520, 1, 1),
(9, 'A-07', 'Evanlucy Figueroa', '', '', '', 'EVA2016', 0, 1, 1),
(10, 'A-08', 'Juan PernÃ­a', '', '', '', 'JP_A08_08', 1580, 1, 1),
(11, 'A-09', 'Carlos LÃ³pez', '', '', '', 'CL_A09', 120, 1, 1),
(12, 'A-10', 'Alberto Ramos', '', '', '', 'AR.A10', 1440, 1, 1),
(13, 'A-11', 'Jorge Morillo', '', '', '', 'JM-A11', 480, 1, 1),
(14, 'A-12', 'Alida Vargas', '', '', '', 'Alida_A12', 240, 1, 1),
(15, 'B-01', 'JesÃºs Lugo', '', '', '', 'JL_B01', 0, 1, 1),
(16, 'B-02', 'Jairo RondÃ³n', '', '', '', 'JR.B02', 1800, 1, 1),
(17, 'B-03', 'JosÃ© PÃ©rez', '', '', '', '', 0, 1, 1),
(18, 'B-04', 'Ricardo Reyes', '', '', '', 'rr-b04', 840, 1, 1),
(19, 'B-05', 'Reina de GuillÃ©n', '', '', '', 'RdeG_B05', 480, 1, 1),
(20, 'B-06', 'Daniela Romero', '', '', '', 'DR_B06', 4080, 1, 1),
(21, 'B-07', 'Pedro Aguilera', '', '', '', 'PA.B07', 1440, 1, 1),
(22, 'B-08', 'AlÃ­ Aponte', '', '', '', 'AP-B08', 360, 1, 1),
(23, 'B-09', 'Luis Joel GonzÃ¡lez', '', '', '', 'LJG_B09', 1500, 1, 1),
(24, 'B-10', 'Juan Mendoza', '', '', '', 'JM_B10', 1480, 1, 1),
(25, 'B-11', 'VÃ­ctor Videaux', '', '', '', 'VV_B11', 120, 1, 1),
(26, 'B-12', 'JosÃ© LÃ³pez', '', '', '', 'JL_B-12', 1500, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta`
--

CREATE TABLE IF NOT EXISTS `renta` (
  `id_renta` int(11) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_renta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `renta`
--

INSERT INTO `renta` (`id_renta`, `mes`, `ano`, `monto`) VALUES
(1, 6, 2016, '1000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
