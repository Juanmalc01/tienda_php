-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2020 a las 17:45:17
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `practica_1`
--
CREATE DATABASE IF NOT EXISTS `practica_1` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `practica_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nick` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `confirmpass` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `mail`, `pass`, `confirmpass`) VALUES
('prueba', 'prueba@gmail.com', 'prueba123', 'prueba123'),
('prueba2', 'prueba2@gmail.com', 'prueba2', '123421341234'),
('prueba3', 'prueba3@gmail.com', 'prueba3', '134qw123'),
('prueba4', 'prueba4@gmail.com', 'prueba4', '123412342qewes3'),
('prueba5', 'prueba5@gmail.com', 'prueba5', '213ews23r32'),
('a', 'a@gmail.com', 'a123', 'a123'),
('asdf', 'asdf@asdf', 'asdf', 'asdf'),
('q', 'q@q', 'q123', 'q123'),
('z', 'z@z', 'z123', 'z123'),
('w', 'w@w', 'w123', 'w123'),
('alex', 'alex@gmail', 'alex123', 'alex123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
