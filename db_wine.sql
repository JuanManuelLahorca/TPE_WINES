-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 01:01:07
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_wine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `id_store` int(11) NOT NULL,
  `NameStore` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`id_store`, `NameStore`) VALUES
(4, 'Rutini'),
(5, 'Luigi Bosca'),
(6, 'Familia Lopez'),
(7, 'Nieto Senetier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `NameUser` varchar(40) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`NameUser`, `Password`) VALUES
('bernardo', '$2y$10$psDdz0bogwKUMGFLR6gDieX4NSDjpx2eEYF3BEIdAwIklIH2r61YG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wines`
--

CREATE TABLE `wines` (
  `id_Wine` int(11) NOT NULL,
  `NameWine` varchar(100) NOT NULL,
  `Style` varchar(100) NOT NULL,
  `id_store` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wines`
--

INSERT INTO `wines` (`id_Wine`, `NameWine`, `Style`, `id_store`, `Price`) VALUES
(4, 'Malbec', 'Tinto', 5, '400'),
(5, 'Cabernet-Malbec', 'Tinto', 4, '250'),
(6, 'Pinot Grigio', 'Blanco', 4, '220'),
(8, 'Vasco Viejo Blend', 'Tinto', 6, '150'),
(9, 'Chardonay', 'Blanco', 5, '300'),
(10, 'Sauvignon', 'Blanco', 4, '230'),
(11, 'Trumpeter Rerserve Rose', 'Rosado', 4, '400'),
(12, 'Rose', 'Rosado', 5, '145');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id_store`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NameUser`);

--
-- Indices de la tabla `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`id_Wine`),
  ADD KEY `id_store` (`id_store`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `id_store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `wines`
--
ALTER TABLE `wines`
  MODIFY `id_Wine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `wines`
--
ALTER TABLE `wines`
  ADD CONSTRAINT `wines_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `stores` (`id_store`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
