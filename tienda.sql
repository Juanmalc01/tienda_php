-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-01-2021 a las 18:48:02
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_1`
--

CREATE TABLE `compras_1` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras_1`
--

INSERT INTO `compras_1` (`producto_id`, `cantidad`, `total`, `fecha`) VALUES
(6, 3, '378.00', '2021-01-19 15:57:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_2`
--

CREATE TABLE `compras_2` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras_2`
--

INSERT INTO `compras_2` (`producto_id`, `cantidad`, `total`, `fecha`) VALUES
(3, 1, '345.00', '2021-01-14 19:33:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_3`
--

CREATE TABLE `compras_3` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_4`
--

CREATE TABLE `compras_4` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_5`
--

CREATE TABLE `compras_5` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_6`
--

CREATE TABLE `compras_6` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `descripcion`, `precio`) VALUES
(6, 'Flauta', 'Viento', 'Larga', '126.00'),
(7, 'Guitarra', 'Cuerda', 'No incluye cuerdas', '134.00'),
(8, 'Banjo', 'Cuerda', 'Disponible en varios colores', '350.00'),
(9, 'Tambor', 'Percusion', '', '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `email`, `password`, `admin`) VALUES
(1, 'prueba', 'prueba@gmail.com', '$2y$10$7FaelVRzzrUWmcCmXL2qJ.zqv/Y/xEmvuzjjErb7CTnPR48VDbSW2', 0),
(2, 'admin', 'admin@gmail.com', '$2y$10$0AMwWk96QV4smsQv2WIWuuD5cniOX5W4jHDzZEnJd1Y.uct/.Ezzy', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras_1`
--
ALTER TABLE `compras_1`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `compras_2`
--
ALTER TABLE `compras_2`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `compras_3`
--
ALTER TABLE `compras_3`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `compras_4`
--
ALTER TABLE `compras_4`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `compras_5`
--
ALTER TABLE `compras_5`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `compras_6`
--
ALTER TABLE `compras_6`
  ADD KEY `fk_compra_producto` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras_1`
--
ALTER TABLE `compras_1`
  ADD CONSTRAINT `fk_compra_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
