-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-12-2025 a las 20:49:24
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u116678039_jcdurodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_pais`
--

CREATE TABLE `visitas_pais` (
  `id` int(11) NOT NULL,
  `iso_pais` char(2) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT 0,
  `ultima_visita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitas_pais`
--

INSERT INTO `visitas_pais` (`id`, `iso_pais`, `pais`, `visitas`, `ultima_visita`) VALUES
(1, 'CO', 'CO', 95, '2025-12-21 15:30:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `visitas_pais`
--
ALTER TABLE `visitas_pais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iso_pais` (`iso_pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visitas_pais`
--
ALTER TABLE `visitas_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
