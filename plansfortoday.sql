-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 13:49:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plansfortoday`
--
DROP DATABASE IF EXISTS `plansfortoday`;
CREATE DATABASE IF NOT EXISTS `plansfortoday` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `plansfortoday`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL,
  `ciu_nom` varchar(50) NOT NULL,
  `ciu_lat` int(50) NOT NULL,
  `ciu_long` int(50) NOT NULL,
  `ciu_prov` varchar(30) NOT NULL,
  `ciu_pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `com_id` int(11) NOT NULL,
  `com_tit` varchar(60) NOT NULL,
  `com_cuer` text NOT NULL,
  `com_punt` int(2) NOT NULL,
  `com_fec` date NOT NULL,
  `usu_cod` int(11) NOT NULL,
  `post_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `img_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_tit` varchar(255) NOT NULL,
  `post_desc` text NOT NULL,
  `post_cont` text NOT NULL,
  `post_pre` int(4) DEFAULT NULL,
  `usu_cod` int(11) NOT NULL,
  `cat_cod` int(11) NOT NULL,
  `ciu_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(40) NOT NULL,
  `usu_apes` varchar(50) DEFAULT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_pass` varchar(20) NOT NULL,
  `usu_tel` int(15) DEFAULT NULL,
  `usu_ciu` varchar(30) DEFAULT NULL,
  `usu_pais` varchar(30) DEFAULT NULL,
  `usu_rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nom`, `usu_apes`, `usu_email`, `usu_pass`, `usu_tel`, `usu_ciu`, `usu_pais`, `usu_rol`) VALUES
(1, 'Mihail', 'Pistol', 'a@a.com', '1234', 666999888, 'Écija', 'España', 1),
(2, 'pepe', NULL, 'pepe@pepe.com', '$1$rasmusle$uwzLzKVW', NULL, NULL, NULL, 0),
(3, 'dasdasd', NULL, 'dasda@dsad.com', '$1$rasmusle$uwzLzKVW', NULL, NULL, NULL, 0),
(4, 'pepe', NULL, 'pepe@pepe.com', '$1$rasmusle$uwzLzKVW', NULL, NULL, NULL, 0),
(5, 'bn', NULL, 'bnbn@sad', '$1$rasmusle$Y8//MfaD', NULL, NULL, NULL, 0),
(6, 'pepe', NULL, 'pepe@pepe.com', '$1$rasmusle$uwzLzKVW', NULL, NULL, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciu_id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`com_id`),
  ADD UNIQUE KEY `usu_cod` (`usu_cod`,`post_cod`),
  ADD KEY `post_cod` (`post_cod`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `id_post` (`id_post`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `usu_cod` (`usu_cod`,`cat_cod`,`ciu_cod`),
  ADD KEY `cat_cod` (`cat_cod`),
  ADD KEY `ciu_cod` (`ciu_cod`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usu_cod`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`post_cod`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`usu_cod`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cat_cod`) REFERENCES `categoria` (`cat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`ciu_cod`) REFERENCES `ciudad` (`ciu_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
