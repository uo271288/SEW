-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2021 a las 19:46:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carworkshop`
--
CREATE DATABASE IF NOT EXISTS `carworkshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `carworkshop`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `dni` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clientname` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clientsurname` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `dni`, `clientname`, `clientsurname`) VALUES
(1, '1', 'alex', 'alvarez'),
(2, '2', 'ivan', 'rubio'),
(3, '123', 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `platenumber` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `make` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `model` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `vehicletype_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehicle`
--

INSERT INTO `vehicle` (`id`, `platenumber`, `make`, `model`, `client_id`, `vehicletype_id`) VALUES
(1, '1', 'seat', 'ibiza', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL,
  `typename` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `priceperhour` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `typename`, `priceperhour`) VALUES
(1, 'furgoneta', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workorder`
--

CREATE TABLE `workorder` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `workdate` date DEFAULT NULL,
  `workorderdescription` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `workorder`
--

INSERT INTO `workorder` (`id`, `vehicle_id`, `workdate`, `workorderdescription`, `amount`) VALUES
(1, 1, '2021-12-01', 'pierde aceite', 34.21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_unique` (`dni`);

--
-- Indices de la tabla `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `platenumber_unique` (`platenumber`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `vehicletype_id` (`vehicletype_id`);

--
-- Indices de la tabla `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typename_unique` (`typename`);

--
-- Indices de la tabla `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date_vehicle` (`workdate`,`vehicle_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `workorder`
--
ALTER TABLE `workorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`vehicletype_id`) REFERENCES `vehicletype` (`id`);

--
-- Filtros para la tabla `workorder`
--
ALTER TABLE `workorder`
  ADD CONSTRAINT `workorder_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
