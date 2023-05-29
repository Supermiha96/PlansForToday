-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2023 a las 20:36:08
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

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nom`) VALUES
(1, 'Restaurantes y Gastronomía'),
(2, 'Museos'),
(3, 'Parques'),
(4, 'Lugares históricos '),
(5, 'Lugares misteriosos'),
(6, 'Lugares con encanto'),
(7, 'Espectaculos'),
(8, 'Aventura y naturaleza'),
(17, 'Visitas guiadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL,
  `ciu_nom` varchar(50) NOT NULL,
  `ciu_lat` double NOT NULL,
  `ciu_long` double NOT NULL,
  `ciu_prov` varchar(30) NOT NULL,
  `ciu_pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_nom`, `ciu_lat`, `ciu_long`, `ciu_prov`, `ciu_pais`) VALUES
(1, 'Écija', 37.5422, -5.0826, 'Sevilla', 'España'),
(2, 'Sevilla', 37.38283, -5.97317, 'Sevilla', 'España'),
(3, 'Madrid', 40.4165, -3.70256, 'Madrid', 'España'),
(4, 'Barcelona', 41.38879, 2.15899, 'Barcelona', 'España'),
(5, 'Jaén', 37.76922, -3.79028, 'Andalucia', 'España');

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

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`com_id`, `com_tit`, `com_cuer`, `com_punt`, `com_fec`, `usu_cod`, `post_cod`) VALUES
(9, 'Visita', 'Buena visita no le doy un 10 por no explicar el motivo ', 8, '2023-05-26', 13, 2),
(11, 'Visita', 'Buena visita no le doy un 10 por no explicar el motivo ', 8, '2023-05-26', 13, 2),
(12, 'Visita', '😊', 5, '2023-05-26', 13, 2),
(21, 'Titulo del comentario', 'Contenido.', 10, '2023-05-27', 12, 15),
(22, 'Titulo del comentario', 'Contenido.', 10, '2023-05-27', 12, 15),
(51, 'aa', 'sa', 1, '2023-05-29', 14, 2),
(52, 'a', 'asd', 1, '2023-05-29', 11, 2),
(57, 'Súper Bien', 'Me ha encantado', 8, '2023-05-29', 12, 2),
(58, 'prueba2', 'prueba2', 2, '2023-05-29', 11, 2),
(59, 'Perfecto', 'Me ha encantado', 10, '2023-05-29', 11, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `img_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`img_id`, `img_url`, `id_post`, `id_usu`) VALUES
(6, './img/planes/6474efc8bc5cf.avif', 31, NULL),
(7, './img/planes/6474efc8bd90d.avif', 31, NULL),
(8, './img/planes/6474efc8bf77a.avif', 31, NULL);

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
  `post_addr` varchar(255) NOT NULL,
  `usu_cod` int(11) NOT NULL,
  `cat_cod` int(11) NOT NULL,
  `ciu_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `post_tit`, `post_desc`, `post_cont`, `post_pre`, `post_addr`, `usu_cod`, `cat_cod`, `ciu_cod`) VALUES
(2, 'Visita guiada por Écija', 'Palacios, plazas, iglesias y restos romanos están esperando a ser descubiertos en esta visita guiada por Écija. ¿Os apuntáis a indagar en el pasado de esta localidad sevillana?', 'Écija es una ciudad sorprendente. Llena de rincones bellos, plazas con encanto, palacios, torres e iglesias. Pero además de su belleza barroca, su historia esconde un importantísimo pasado romano que asombra al visitante.\r\n\r\nNuestros guías locales serán tus anfitriones en una magnífica visita guiada en la que descubrirás el Palacio de Benamejí, sede del museo de la ciudad que alberga un gran colección de mosaicos; el Palacio de Peñaflor, una joya barroca desde la que divisarás las mejores vistas de las torres; el Arca Real del Agua, curiosísimo y pequeño edificio del siglo XVI y el Estanque Romano en el corazón de la ciudad.\r\n\r\nLa mejor forma de conocer Écija al detalle y disfrutar de una experiencia inolvidable. Tenemos la llave de la historia de la ciudad, que te permitirá viajar a su pasado desde el interior de sus monumentos.', 10, '\r\nPalacio de Benamejí', 11, 17, 1),
(3, 'Tour por el Alcázar, la Catedral y la Giralda', 'En este tour os impregnaréis de la magia de la capital andaluza visitando los tres monumentos más importantes de Sevilla: el Real Alcázar, la catedral de Santa María de la Sede y la Giralda, el símbolo de la ciudad.', 'Conoce los principales monumentos de Sevilla. La Catedral, La Giralda y el Real Alcázar.\r\n\r\nCon la compañía de un guía turístico oficial de la ciudad, visite obras emblemáticas del patrimonio histórico y artístico andaluz.\r\n\r\nLa Catedral de Sevilla, llamada Santa María de la Sede, fue levantada en una antigua mezquita. Se trata del edificio de estilo gótico más grande del mundo.\r\n\r\nDentro recorreremos sus diferentes naves. Nos centraremos principalmente en la tumba de Cristóbal Colón y el retablo mayor.\r\n\r\nUna vez contemplada la catedral, podrás disfrutar de las mejores vistas de la ciudad de Sevilla subiendo a la emblemática torre de La Giralda, símbolo de la ciudad. Ánimo, “sólo” son 98 metros de altura.\r\n\r\n¡En el Real Alcázar de Sevilla visitarás el palacio real en uso más antiguo de Europa! Además, fue escenario de la serie Juego de Tronos, donde reconocerás los escenarios del Reino de Dorne.\r\n\r\nNos adentraremos en todas sus salas, la Puerta del León, la Sala de la Justicia, el Cuarto del Almirante, el Patio del Crucero, el Palacio Mudéjar, el Palacio Gótico, etc. \r\n\r\nPor último, disfrutaremos de los Jardines, con su famoso Estanque de Mercurio, la Galería de Grutesco, etc.\r\n\r\nDespués de este maravilloso tour podrás decir que eres todo un experto en la historia de estos monumentos de Sevilla.', 25, 'Calle Francos, 19', 11, 17, 2),
(4, 'Tour de tapas y vinos por Madrid', 'En este tour guiado recorreremos las zonas más emblemáticas de Madrid y visitaremos los mejores bares de tapas de la ciudad para experimentar los sabores de la gastronomía española mientras descubrimos los secretos de la capital.', 'Itinerario\r\n\r\nNos encontraremos a la hora seleccionada en la Plaza de Santa Ana, en pleno corazón de Madrid. Desde aquí, comenzaremos un recorrido gastronómico de dos horas y media de duración en el que conoceréis los secretos de la ciudad mientras disfrutáis de una degustación de tapas.\r\n\r\nRecorreremos el centro de Madrid, su casco histórico y el Madrid de los Austrias, algunas de las zonas más típicas para disfrutar de los sabores locales.\r\n\r\nDurante el recorrido, visitaremos algunos de los mejores bares de tapas de la ciudad, reconocidos por servir auténtica comida española desde principios del siglo pasado. Nos sentaremos a las mesas o permaneceremos de pie al más puro estilo madrileño para disfrutar de la cultura de las tapas, degustando una selección gourmet de las mejores tapas de jamón ibérico de bellota, gambas al ajillo, cazón en adobo y muchos otros productos típicos de la gastronomía española.\r\n\r\nDegustaremos estos productos maridados con vinos de las mejores Denominaciones de Origen de España, y además disfrutaréis de una consumición en cada local. \r\n\r\nLos guías son locales, enamorados de la cultura y la gastronomía local, y acompañarán el tour con infinidad de detalles y anécdotas sobre la historia y los secretos de Madrid. ¡Os encantará!', 80, 'Plaza de Santa Ana', 11, 1, 3),
(19, 'Visita guiada por el yacimiento arqueológico Plaza de Armas', 'En esta visita guiada por el yacimiento arqueológico Plaza de Armas descubriremos los orígenes de Écija. Veremos uno de los estucos mejor conservados del Imperio Romano y descubriremos cómo vivieron los musulmanes en esta población.', 'En esta visita guiada por el yacimiento arqueológico Plaza de Armas descubriremos los orígenes de Écija. Veremos uno de los estucos mejor conservados del Imperio Romano y descubriremos cómo vivieron los musulmanes en esta población.', 10, 'Yacimiento arqueológico Plaza de Armas', 12, 17, 1),
(31, 'PruebaImagenes', 'as', 'asd', 10, 'Calle del conde', 11, 17, 1);

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
  `usu_pass` varchar(255) NOT NULL,
  `usu_tel` int(15) DEFAULT NULL,
  `usu_ciu` varchar(30) DEFAULT NULL,
  `usu_pais` varchar(30) DEFAULT NULL,
  `usu_rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nom`, `usu_apes`, `usu_email`, `usu_pass`, `usu_tel`, `usu_ciu`, `usu_pais`, `usu_rol`) VALUES
(11, 'prueba2', NULL, 'b@b', '$2y$10$mIHK3viMoGCIW.X91ma2l.RAEPI0JAfcnHxJgkjmtBTe5/9K9gl5O', NULL, NULL, NULL, 0),
(12, 'Mihail', 'pistol', 'm@m', '$2y$10$Nbsx5/IV70loA5czp9fm6uUnefnwvy4E9iniv6q3x5.wVOLzqGl7O', 642366144, 'Ecija', 'España', 0),
(13, 'David', NULL, 'davidfolgosa89@gmail.com', '$2y$10$1q0Dvscov5/TaNad/acHWuzSe7ysz60lK4SGS3Ap8bUBhr1MyLSCW', NULL, NULL, NULL, 0),
(14, 'daniel', 'martin', 'daniel@gmail.com', '$2y$10$CnMCATzQzHuF1jryw8UjfOOiPkC.ed8vTZAgMqPE2nZv7XBiI/w6y', 642555999, 'Écija', 'España', 0);

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
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`img_id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`post_cod`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cat_cod`) REFERENCES `categoria` (`cat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`ciu_cod`) REFERENCES `ciudad` (`ciu_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
