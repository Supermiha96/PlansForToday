-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 22:16:05
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
(4, 'Planes historicos'),
(5, 'Planes misteriosos'),
(6, 'Planes con encanto'),
(7, 'Espectaculos'),
(8, 'Aventura y naturaleza'),
(9, 'Visitas guiadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL,
  `ciu_nom` varchar(100) NOT NULL,
  `ciu_lat` double DEFAULT NULL,
  `ciu_long` double DEFAULT NULL,
  `ciu_prov` varchar(100) NOT NULL,
  `ciu_pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_nom`, `ciu_lat`, `ciu_long`, `ciu_prov`, `ciu_pais`) VALUES
(31, 'A Coruña', 43.37135, -8.396, 'A Coruña', 'España'),
(32, 'Almería', 36.83814, -2.45974, 'Almería', 'España'),
(33, 'Bilbao', 43.25, -2.91667, 'Vizcaya', 'España'),
(34, 'Huelva', 37.26638, -6.94004, 'Huelva', 'España'),
(35, 'Sevilla', 37.38283, -5.97317, 'Sevilla', 'España'),
(36, 'Ourense', 42.16667, -7.5, 'Ourense', 'España'),
(37, 'Santa Cruz de Tenerife', 28.46824, -16.25462, 'Santa Cruz de Tenerife', 'España'),
(38, 'Palma', 39.56951, 2.64745, 'Illes Balears', 'España'),
(39, 'Barcelona', 41.38879, 2.15899, 'Barcelona', 'España'),
(40, 'León', 42.60003, -5.57032, 'León', 'España'),
(41, 'Écija', 37.5422, -5.0826, 'Sevilla', 'España');

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
(78, '¡Genial!', 'Es una experiencia única!', 10, '2023-05-31', 15, 42),
(79, 'Perfecto', 'Genial', 8, '2023-05-31', 15, 42),
(80, '¡Genial!', 'Me ha encantado', 10, '2023-05-31', 17, 49);

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
(11, './img/planes/64751419d560d.avif', 42, 15),
(12, './img/planes/64751419d6493.avif', 42, 15),
(13, './img/planes/64751419d7f35.avif', 42, 15),
(17, './img/planes/64762edabcbe9.avif', 44, 15),
(18, './img/planes/64762edabda4d.avif', 44, 15),
(19, './img/planes/64762edabea50.avif', 44, 15),
(20, './img/planes/6476308d96a81.avif', 45, 15),
(21, './img/planes/6476308d97a76.avif', 45, 15),
(22, './img/planes/6476308d98bd3.avif', 45, 15),
(23, './img/planes/647631c62b81c.avif', 46, 15),
(24, './img/planes/647631c62c3c6.avif', 46, 15),
(25, './img/planes/647631c62d3a9.avif', 46, 15),
(26, './img/planes/6476325f3f18e.avif', 47, 15),
(27, './img/planes/6476325f3ff06.avif', 47, 15),
(28, './img/planes/6476325f40fbd.avif', 47, 15),
(29, './img/planes/647633eb6e269.jpg', 48, 15),
(30, './img/planes/647633eb6f574.jpg', 48, 15),
(31, './img/planes/647633eb7075a.jpg', 48, 15),
(32, './img/planes/64763640ac8cd.jfif', 49, 15),
(33, './img/planes/64763640adafb.jpg', 49, 15),
(34, './img/planes/64763640ae94f.jpg', 49, 15),
(35, './img/planes/6476385304c22.jpg', 50, 15),
(36, './img/planes/6476385305c0f.webp', 50, 15),
(37, './img/planes/6476385306c7f.jpg', 50, 15),
(38, './img/planes/64763b042d3a9.jpg', 51, 16),
(39, './img/planes/64763b042e9dc.webp', 51, 16),
(40, './img/planes/64763b042fab9.jpg', 51, 16),
(41, './img/planes/64763d3f59ed0.jpg', 52, 16),
(42, './img/planes/64763d3f5ae98.jpeg', 52, 16),
(43, './img/planes/64763d3f5c0df.jfif', 52, 16),
(44, './img/planes/64763f6d08ae2.jpg', 53, 16),
(45, './img/planes/64763f6d09ee7.avif', 53, 16),
(46, './img/planes/64763f6d0b3f4.jpg', 53, 16),
(47, './img/planes/64764177e64f2.jpg', 54, 16),
(48, './img/planes/64764177e766a.jpg', 54, 16),
(49, './img/planes/64764177e8a80.jfif', 54, 16),
(50, './img/planes/647646705f248.avif', 55, 16),
(51, './img/planes/64764670600b6.avif', 55, 16),
(52, './img/planes/6476467061075.avif', 55, 16),
(53, './img/planes/64764792811d1.avif', 56, 16),
(54, './img/planes/6476479282513.avif', 56, 16),
(55, './img/planes/64764792833e9.avif', 56, 16),
(56, './img/planes/64764948e7c2f.avif', 57, 16),
(57, './img/planes/64764948e8c15.avif', 57, 16),
(58, './img/planes/64764948e9d9c.avif', 57, 16),
(59, './img/planes/64764ae4e811e.jpg', 58, 16),
(60, './img/planes/64764ae4e8ffa.jfif', 58, 16),
(61, './img/planes/64764ae4e9e26.jpg', 58, 16),
(62, './img/planes/64764bb72fea0.jpg', 59, 16),
(63, './img/planes/64764bb731012.jpg', 59, 16),
(64, './img/planes/64764bb7322be.jpg', 59, 16),
(65, './img/planes/64764cc1d3d78.avif', 60, 16),
(66, './img/planes/64764cc1d4cc1.avif', 60, 16),
(67, './img/planes/64764cc1d5cf3.avif', 60, 16),
(68, './img/planes/64764d63060ff.avif', 61, 16),
(69, './img/planes/64764d6306fb2.avif', 61, 16),
(70, './img/planes/64764d6307e27.avif', 61, 16);

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
(42, 'Visita guiada por Écija', 'Palacios, plazas, iglesias y restos romanos están esperando a ser descubiertos en esta visita guiada por Écija. ¿Os apuntáis a indagar en el pasado de esta localidad sevillana?', 'Écija es una ciudad sorprendente. Llena de rincones bellos, plazas con encanto, palacios, torres e iglesias. Pero además de su belleza barroca, su historia esconde un importantísimo pasado romano que asombra al visitante.\r\n\r\nNuestros guías locales serán tus anfitriones en una magnífica visita guiada en la que descubrirás el Palacio de Benamejí, sede del museo de la ciudad que alberga un gran colección de mosaicos; el Palacio de Peñaflor, una joya barroca desde la que divisarás las mejores vistas de las torres; el Arca Real del Agua, curiosísimo y pequeño edificio del siglo XVI y el Estanque Romano en el corazón de la ciudad.\r\n\r\nLa mejor forma de conocer Écija al detalle y disfrutar de una experiencia inolvidable. Tenemos la llave de la historia de la ciudad, que te permitirá viajar a su pasado desde el interior de sus monumentos.', 10, 'Palacio de Benamejí', 15, 9, 41),
(44, 'Paseo en calesa por Sevilla', 'Vive una de las experiencias más auténticas de la capital andaluza. Recorre el centro histórico de Sevilla en coche de caballos, el medio de transporte con más encanto de la ciudad. ¡Pura esencia hispalense!', 'Vive una de las experiencias más auténticas de la capital andaluza. Recorre el centro histórico de Sevilla en coche de caballos, el medio de transporte con más encanto de la ciudad. ¡Pura esencia hispalense!', 79, 'Calle Arfe', 15, 8, 35),
(45, 'Paddle surf en el río Guadalquivir', '¿Te gustaría remar o hacer surf en el río Guadalquivir?, en este tour te divertirás remando por las aguas de Sevilla mientras admiras algunos de sus monumentos más famosos. ¡Un proyecto muy original!', '¿Queréis hacer paddle surf en el río Guadalquivir? Con este tour nos divertiremos remando por las aguas de Sevilla mientras admiramos algunos de sus monumentos más famosos. ¡Un plan muy original!', 29, 'Estación de autobuses de la Plaza de Armas.', 15, 8, 35),
(46, 'Tour de tapas por Sevilla', 'Satisfaga su paladar con un auténtico festín y descubra lo mejor de la cocina andaluza en este tour de tapas por Sevilla. ¡No te pierdas el bombo!', 'En este tour de tapas por Sevilla disfrutaremos de un auténtico festival para vuestro paladar y descubriremos los mejores platos andaluces. ¡No os lo podéis perder!', 40, 'Plaza del Altozano.', 15, 1, 35),
(47, 'Excursión a las bodegas Salado', 'Sumérgete en la cultura del vino andaluz en este tour a Bodegas Salado desde Sevilla. Conoce la finca y prueba sus tres platos estrella.', 'Adéntrate en la cultura del vino andaluz con esta excursión a las bodegas Salado desde Sevilla. Conocerás la finca y probarás tres de sus especialidades.', 72, 'Calle Trajano', 15, 1, 35),
(48, 'Museo de Bellas Artes de Sevilla', 'Un museo hermoso y bien distribuido con una colección de obras muy rica en un edificio muy hermoso.\r\n', 'Un museo precioso, bien distribuido, con una colección de obras muy amplia dentro de unas instalaciones que no estropean el conjunto porque el edificio es muy bonito. Puedes pasar horas allí sin ser consciente del tiempo. Y con tantas exposiciones itinerantes, siempre hay una nueva excusa para volver.', 0, 'Pl. del Museo', 15, 2, 35),
(49, 'Museo de las Ilusiones Sevilla', 'Fue una experiencia muy divertida y curiosa en un espacio muy bien diseñado. Perfecta para viajar con niños, familias y grupos de amigos.', 'Fue un espacio muy bien diseñado y una experiencia muy agradable y curiosa. Perfecta para viajar con niños, familias y grupos de amigos. Se pueden hacer muchas ilusiones ópticas con un teléfono móvil para tomar fotografías muy interesantes y divertidas. Además, el personal ayudará y tomará fotografías.', 12, 'San Eloy', 15, 2, 35),
(50, 'Parque de María Luisa', 'El parque María Luisa, un parque sevillano precioso para dar un paseo en una tarde fresca.', 'El Parque de María Luisa es el primer parque urbano de Sevilla y uno de los pulmones verdes de Sevilla. Fue declarado Bien de Interés Cultural en 1983 con la categoría de jardines históricos e inaugurado el 18 de abril de 1914 como Parque Municipal Infanta María Luisa Fernanda.', 0, 'P.º de las Delicias', 15, 3, 35),
(51, 'Parque de Miraflores', 'Parque de 90 hectáreas, el más grande de Sevilla, situado en torno a 2 huertas de la época romana.', 'Perfecto para andar, correr, sacar al perro o ir con amigos.', 0, 'Av. las Asociaciones de Vecinos', 16, 3, 35),
(52, 'Torre del Oro ', 'Una experiencia encantadora infiltrandote en un monumento historico.', 'La Torre del Oro de Sevilla fue construida en 1221 en la Torre de Alvarana en la margen izquierda del río Guadalquivir en la ciudad de Sevilla, Andalucía, España. Se trata de una torre que consta de tres cuerpos.', 0, 'P.º de Cristóbal Colón', 16, 4, 35),
(53, 'Visita La Giralda', 'Una visita guiada por la Giralda, uno de los monumentos más famosos de Sevilla.', 'Giralda es el nombre que recibe la torre campanario de la catedral de Santa María de la Sede de la ciudad de Sevilla, en Andalucía.', 25, 'Av. de la Constitución', 16, 9, 35),
(54, 'El Real Alcázar de Sevilla', 'El Alcázar de Sevilla es un conjunto palaciego amurallado construido en diferentes fases históricas. El palacio original fue construido a principios de la Edad Media. También hay algunas ruinas de arte islámico, incluyendo salas del palacio mudéjar y salas góticas de la conquista castellana.', 'El conjunto del Real Alcázar de Sevilla tiene su origen en la evolución que la antigua Hispalis romana, la Spali de tiempo de los godos, experimentó durante la Alta Edad Media, cuando la ciudad pasó a denominarse Ixbilia. Y más concretamente a comienzos del siglo X.', 13, 'Patio de Banderas', 16, 4, 35),
(55, 'Tour de misterios y leyendas de Triana', 'Florinda (La Cava), hija del conde Don Julián, cautivó desde el principio a Don Rodrigo, pero... Para conocer el final de esta y otras leyendas de Triana no puedes perderte esta visita guiada.', 'Itinerario A las 21:00 horas, comienza tu visita guiada a las leyendas de Triana, justo al lado del famoso Puente de Isabel II o Triana, junto a la Capilla del Carmen.\r\nTriana es uno de los barrios de Sevilla con mayor número de leyendas, anécdotas e historias.\r\nConocimos las terroríficas leyendas asociadas a este plato antes de continuar nuestro paseo por el barrio.\r\nEsta historia sirve de punto de partida para contar la historia de los gitanos de Triana. Su cante y baile fueron los orígenes del flamenco del siglo XVIII.', 12, 'Capilla del Carmen', 16, 5, 35),
(56, 'Tour de los misterios y leyendas de Sevilla', 'Santa Cruz, los alrededores de la Catedral y el Alcázar... Descubre en este tour nocturno por Sevilla la historia y el patrimonio de la ciudad hispalense.', 'Itinerario\r\nNos reuniremos a la hora indicada en la céntrica Plaza del Triunfo, junto a la escultura de la Inmaculada. Desde aquí comenzaremos un tour a pie de dos horas aproximadas de duración en el que intentaremos descifrar los enigmas de Sevilla, explicando también relevantes acontecimientos históricos.\r\n\r\nRealizaremos nuestra primera parada en las calles de Santa Cruz. Este barrio sevillano ha sido testigo de multitud de leyendas relacionadas con el pasado romano, árabe y judío de la ciudad. Conoceremos estas rocambolescas historias antes de proseguir con la ruta.\r\n\r\nEl siguiente punto en el que nos detendremos será la Calle Fabiola, también tendremos la oportunidad de conocer la historia de sus calles y edificios, de un gran patrimonio artístico y cultural.\r\n\r\nTras aprender amenas lecciones de Historia, nos dirigiremos hasta la Plaza de la Alfalfa, origen de un duelo a muerte cuyo relato no nos dejará indiferentes. Continuaremos contando más relatos por el centro histórico de Sevilla hasta llegar a la Calle Laraña. Aquí finalizará la ruta nocturna por Sevilla.', 10, 'Plaza del Triunfo', 16, 5, 35),
(57, 'Visita guiada por el Archivo de Indias', 'En esta visita guiada por el Archivo de Indias descubriremos la apasionante historia de la ciudad de Sevilla y su relación con las Américas. ¿Os lo vais a perder?', 'Nos encontraremos a la hora indicada frente al Archivo de Indias de Sevilla, donde comenzaremos una visita guiada por este edificio Patrimonio de la Humanidad.\r\nSeguiremos la visita guiada en el interior del Archivo de Indias para conocer su función y todo lo que atesora tras sus muros.', 12, 'Archivo de Indias', 16, 9, 35),
(58, 'Plaza del Cabildo', 'Se trata de una plaza semicircular poco conocida por los turistas e incluso para algunos sevillanos, pero con un encanto especial. ', 'Se dispone en torno a una fuente central con frondosa vegetación. Al otro lado del semicírculo la muralla almohade cierra la plaza. Especialmente bonitos son sus accesos mediante pasadizos. Los bajos de la plaza tienen una interesante solución de arcos sobre columnas que siguen el desarrollo curvo de la fachada. Además los voladizos están decorados con motivos florales pintados al fresco.', 0, 'Pl. del Cabildo', 16, 6, 35),
(59, 'Alameda de Hércules', 'Esta alargada plaza y su entorno se han convertido desde los años 90 en el escenario de la escena alternativa de la ciudad. ', 'Se podría definir como la zona bohemia de la ciudad, donde abunda la diversidad y la cultura urbana. Si queréis huir de lo típico sevillano, este es vuestro lugar. Sus calles están llenas de vida. Encontraréis bares de toda la vida y nuevos locales que ofrecen cocina innovadora, vegetariana o ecológica.', 0, 'Alameda de Hércules', 16, 6, 35),
(60, 'Espectáculo en el Museo del Baile Flamenco', 'Tradición, cultura y, por encima de todo, espectáculo. El flamenco es todo eso y mucho más. Ahora podéis disfrutar de un show único en el Museo del Baile Flamenco de Sevilla. ¡Arte en estado puro!', 'Bienvenidos al Museo del Baile Flamenco. A la hora que elijáis, este edificio del siglo XVIII os abrirá las puertas de su patio para ofreceros un espectáculo que os dejará enamorados de por vida del arte flamenco. ¡Empieza el show!\r\n\r\nVestidos largos, ritmos ardientes, movimientos sensuales, castañuelas... Coreografías espectaculares y perfectamente acompasadas con música en vivo y una iluminación muy cuidada.\r\nDurante una hora, la imponente puesta en escena de esta función hará que entendáis por qué nadie quiere perderse este arte popular. ¡Un imprescindible si estáis en Sevilla!', 25, 'Museo del Baile Flamenco', 16, 7, 35),
(61, 'Espectáculo flamenco en barco', 'En esta actividad disfrutaréis de un espectáculo de flamenco a bordo de un barco en el río Guadalquivir. Descubriréis los secretos de este arte de una forma diferente y amena mientras os enamoráis de Sevilla desde el agua. ¡Querréis repetir!', 'Antes de comenzar el paseo en barco, cuatro artistas realizarán dos shows de aproximadamente 20 minutos cada uno. Poco a poco, empezaremos a escuchar los primeros acordes de guitarra. ¡Olé, qué arte! En el descanso entre los espectáculos, os serviremos una copa de sangría para brindar por la experiencia. \r\n\r\nLos bailaores y músicos flamencos os envolverán con su duende haciéndoos vivir un momento realmente mágico a bordo del barco. Una vez haya finalizado el show flamenco, a las 23:00 horas, empezaremos a surcar las aguas del río Guadalquivir. ¡El broche de oro perfecto!', 28, 'P.º Alcalde Marqués del Contadero', 16, 7, 35),
(65, 'Prueba', 'sad', 'asd', 2, 'sad', 15, 1, 41);

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
(15, 'Mihail', NULL, 'smr2pim@gmail.com', '$2y$10$F4R68MYwRNbDMIgVn56T8eQsEOBNiPEjJ7skf3ucFeWo/eL7FVQjC', NULL, NULL, NULL, 1),
(16, 'Paula', NULL, 'villaecijadiazp@gmail.com', '$2y$10$/iv6hQmMwRvvZiRnZMqrpeoO6lSraLn0NIEd5eoyfSLmSlRGlLlry', NULL, NULL, NULL, 0),
(17, 'Mihail', NULL, 'm@gmail.com', '$2y$10$uIXyC74a4Y3KCtY.Iq6Eluq5MQMAm1hpADOorXHLtLks8Fhqx3Z/i', NULL, NULL, NULL, 0),
(18, 'Mihail', 'Pistol', 'mihail@manualuso.com', '$2y$10$TmXSn4Bcrj3jD2GMcCSlredyub4.3CuuwJeisyS1QL7iAsMglAGCO', 666999888, 'Écija', 'España', 0);

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
  ADD KEY `post_cod` (`post_cod`),
  ADD KEY `usu_cod` (`usu_cod`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `ciu_cod` (`ciu_cod`),
  ADD KEY `cat_cod` (`cat_cod`),
  ADD KEY `usu_cod` (`usu_cod`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`post_cod`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`usu_cod`) REFERENCES `usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_3` FOREIGN KEY (`id_post`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`cat_cod`) REFERENCES `categoria` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`usu_cod`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`ciu_cod`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
