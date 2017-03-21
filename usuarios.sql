-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2017 a las 23:46:37
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `id_usuario`, `comentario`) VALUES
(1, 1, 'Hola, como estan?'),
(2, 3, 'Hey chico!!'),
(39, 19, 'ggg'),
(42, 1, 'Fermin esta loco'),
(41, 19, 'Soy josefa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `contraseña` varchar(60) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'AbigailRijo', 'abigailrijo9@gmail.com', 'pukita66'),
(2, 'Fermin', 'fermin@hotmail.com', '123'),
(3, 'priscilamorales', 'prisci@outlook.com', '123'),
(4, 'karilin', 'karilin543@gmail.com', '123'),
(5, 'Guillermo Rijo', 'elguille123@gmail.es', '123'),
(6, 'carlos Rijo', 'elmalocorita123@gmail.es', '123'),
(7, 'paolaAlmonte', 'paola@hotmail.es', '123'),
(8, 'persido', 'persido4@gmail.com', '123'),
(9, 'LolaMaria', 'lola@gmail.com', '123'),
(10, 'MariaLopez', 'marialopez@hotmail.es', '123'),
(11, 'lauramercedes', 'laurita@gmail.com', '123'),
(12, 'Loida', 'loida@gmail.com', '123'),
(13, 'aby', 'abigail@gmail.com', '123'),
(14, 'isabela', 'isabela@gmail.com', '123'),
(15, 'sadan', 'rijo9@gmail.com', '123'),
(16, 'isnael', 'ismail3@gmail.com', '123'),
(17, 'hermer', 'hermer@hotmail.com', '123'),
(18, 'alberto', 'alberto@gmail.com', '123'),
(19, 'joseEscoboso', 'jos5555e@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `id_comentario`, `id_usuario`, `respuesta`) VALUES
(1, 1, 10, 'Estamos bien, gracias por preguntar'),
(2, 2, 1, 'klk'),
(8, 1, 19, 'Hola'),
(14, 1, 19, 'Esto vuela bajito'),
(18, 42, 1, 'Estoy respondiendo'),
(17, 39, 19, 'Muy feo la verdad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
