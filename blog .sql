-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 01:35:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idcarrera` int(5) NOT NULL,
  `carrera` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idcarrera`, `carrera`) VALUES
(1, 'INGENIERIA DE SISTEMAS'),
(2, 'INGENIERIA INDUSTRIAL'),
(3, 'INGENIERIA ELECTRONICA'),
(4, 'ADMINISTRACION DE EMPRESAS'),
(5, 'PSICOLOGIA'),
(6, 'DISEÑO GRAFICO'),
(10000, 'NINGUNA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idrespuesta` int(10) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idpublicacion` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `file` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idrespuesta`, `descripcion`, `idpublicacion`, `iduser`, `file`) VALUES
(1, 'Hola. mucho gusto. Espero poder  sacarle un gran provecho a esta red social ', 393, 224, 'NULL'),
(2, 'Es una buena iniciativa para compartir conocimiento de interés que permita mejorar nuestros conocimientos de una forma divertida y sencilla ', 393, 228, 'NULL'),
(3, 'Gracias a ti por pertenecer a esta valiosa comunidad', 395, 227, 'NULL'),
(4, 'Gracias compañero, disfruta del conocimiento', 395, 224, 'NULL'),
(5, 'Gracias esa informacion tan  valiosa para la comunidad', 402, 227, 'NULL'),
(6, 'Gracias compañero.', 402, 224, 'NULL'),
(7, 'Gracias por el aporte, Saludos', 403, 227, 'NULL'),
(8, 'Gracias  compañero', 403, 224, 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `idlike` int(10) NOT NULL,
  `idpublicacion` int(10) NOT NULL,
  `iduser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`idlike`, `idpublicacion`, `iduser`) VALUES
(240, 393, 224),
(241, 395, 228);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idpublicacion` int(10) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `iduser` int(10) NOT NULL,
  `archivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `likes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpublicacion`, `descripcion`, `iduser`, `archivo`, `likes`) VALUES
(393, '  Bienvenidos a migsed, una red social que permite compartir nuestros conocimientos para lograr un mejor desempeño a nivel academico y profesional  ', 227, 'NULL', 1),
(395, ' Hola gracias por crear este gran espacio para el conocimiento', 228, 'NULL', 1),
(402, ' Hola comunidad, encontré el siguiente pdf en donde enseñan los conceptos básicos de la seguridad informática, el libro esta en ingles pero es muy sencillo y practico', 229, 'Pentesting.pdf', 0),
(403, 'Buenas noches, les comparto la siguiente información sobre una de las metodologias agiles para el desarrollo de software llamado scrum.', 230, 'scrumprocess.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DateTimeRecover` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `apellidos` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `TokenActivate` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `cumpleaños` date NOT NULL,
  `biografia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idcarrera` int(5) NOT NULL,
  `tokenUpdateEmail` varchar(160) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nombre`, `usuario`, `email`, `clave`, `token`, `foto`, `DateTimeRecover`, `data_register`, `apellidos`, `TokenActivate`, `tipo`, `genero`, `cumpleaños`, `biografia`, `idcarrera`, `tokenUpdateEmail`) VALUES
(224, 'ricardo', 'ricardo09', 'magelosac@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WFZJa1ZyRkI3THNQRjJqQg$APCQhpJyzDDwVexRFMzPurS8V4whDDwyC0co/1lmZ94', 'NULL', 'fotouser224.jpg', '2020-06-09 20:01:00', '2020-06-09 20:01:00', 'andres', 'NULL', 'Normal', '', '0000-00-00', '', 10000, ''),
(227, 'miguel', 'ocampo09', 'miguelocampoc@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$em90bi9TbVRZQXpsaDhLWQ$LHYCxpnRV56yMtmidyCcgXb7watURSr49G3jLQoLNGc', 'NULL', 'fotouser227.jpg', '2020-06-09 20:12:00', '2020-06-09 20:12:00', 'ocampo', 'NULL', 'administrador', '', '0000-00-00', '', 10000, ''),
(228, 'andres', 'hernan09', 'woldengold@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MkNjN3JVTHp2WHhYZmovNQ$unJI4JvFHcqm7fa/zHw0yG+G5hGK6NJkBv0qD1G4li0', 'NULL', 'fotouser228.jpg', '2020-06-09 20:49:00', '2020-06-09 20:49:00', 'hernandez', 'NULL', 'Normal', '', '0000-00-00', '', 10000, ''),
(229, 'julio', 'gonzales09', 'infomigsed@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OWFjLjBxYkNmYlBHTTBYdw$k9jlLUwo9LhuvDPC77hAT5GDyS/SCvY1nbV6860PnMY', 'NULL', 'fotouser229.png', '2020-06-09 21:01:00', '2020-06-09 21:01:00', 'gonzales', 'NULL', 'administrador', '', '0000-00-00', '', 10000, ''),
(230, 'bernal', 'bernal09', 'miguelocampoch@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OFdmN0xPa1VVNWQ3SnViVw$fLWwxZLll/QhYCi8Gs3kTNlUSaHub3bmTdW6ew3GL0E', 'NULL', 'NULL', '2020-06-09 21:08:00', '2020-06-09 21:08:00', 'andres', 'NULL', 'Normal', '', '0000-00-00', '', 10000, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idcarrera`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `idpublicacion` (`idpublicacion`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idlike`),
  ADD KEY `idpublicacion` (`idpublicacion`),
  ADD KEY `idusuario` (`iduser`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idpublicacion`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idcarrera` (`idcarrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idcarrera` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idrespuesta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idpublicacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idpublicacion`) REFERENCES `publicaciones` (`idpublicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idpublicacion`) REFERENCES `publicaciones` (`idpublicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`idcarrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
