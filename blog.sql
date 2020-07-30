-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2020 a las 17:13:09
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
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
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
(8, 'Gracias  compañero', 403, 224, 'NULL'),
(9, '#SOMOS UDI, disfruta del conocimiento', 409, 227, 'NULL'),
(10, 'Gracias por la informacion, muy util', 411, 227, 'NULL'),
(11, 'Merci mon pote pour l\'information.', 413, 227, 'NULL'),
(12, 'Gracias por la informacion', 415, 227, 'NULL'),
(13, 'Muy divertido, saludos', 417, 230, 'NULL'),
(14, 'Exelente meme ', 417, 229, 'NULL'),
(15, 'Prueba', 418, 227, 'NULL'),
(16, 'Prueba2', 418, 227, 'NULL');

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
(241, 395, 228),
(245, 403, 232),
(246, 402, 232),
(247, 395, 232),
(248, 393, 232),
(252, 417, 229),
(255, 409, 227),
(256, 403, 227),
(265, 417, 227),
(267, 416, 227),
(269, 415, 227),
(270, 413, 227);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idpublicacion` int(10) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `iduser` int(10) NOT NULL,
  `archivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `likes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpublicacion`, `descripcion`, `iduser`, `archivo`, `likes`) VALUES
(393, '  Bienvenidos a migsed, una red social que permite compartir nuestros conocimientos para lograr un mejor desempeño a nivel academico y profesional  ', 227, 'NULL', 2),
(395, ' Hola gracias por crear este gran espacio para el conocimiento', 228, 'NULL', 2),
(402, ' Hola comunidad, encontré el siguiente pdf en donde enseñan los conceptos básicos de la seguridad informática, el libro esta en ingles pero es muy sencillo y practico', 229, 'Pentesting.pdf', 1),
(403, 'Buenas noches, les comparto la siguiente información sobre una de las metodologias agiles para el desarrollo de software llamado scrum.', 230, 'scrumprocess.jpg', 2),
(409, '#SOMOS UDI', 227, 'udisomos.jpg', 1),
(411, '  Conocer sobre el deep learning es interesante, nos ayuda a entender como funcionan los mas modernos avances en inteligencia artificial, el siguiente ejemplo es de una red neuronal artificial', 228, 'deep-learning-proceso.png', 0),
(413, 'Apprendre le français, présenter progressif', 229, 'LE-PRESENT-PROGRESSIF.pptx', 1),
(415, ' El algebra de boole es importante porque nos ayuda a entender un poco mas a profundidad de donde provienen los teoremas matematicos.', 230, 'propiedas-algebra-de-boole.jpg', 1),
(416, ' Lenguajes de pogramacion mas demandados a nivel laboral', 227, 'lenguajespogramaicon.jpg', 1),
(417, ' Buenas , saludos ', 227, 'meme.jpeg', 2),
(418, '   Prueba', 227, '418-Pooexplicacion.jpg', 0);

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
(227, 'miguel', 'ocampo09', 'miguelocampoc@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3ExaEdyZzdUaDNrLjRxNg$1Iaty+B7bB25YMMW3j7fTWUfgFQWtnZjkW25AY2sj9U', 'NULL', 'fotouser227.png', '2020-06-09 20:12:00', '2020-06-09 20:12:00', 'ocampo', 'NULL', 'administrador', 'M', '0000-00-00', 'Soy un estudiante de ingenieria de sistema', 1, ''),
(228, 'andres', 'hernan09', 'woldengold@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MkNjN3JVTHp2WHhYZmovNQ$unJI4JvFHcqm7fa/zHw0yG+G5hGK6NJkBv0qD1G4li0', 'NULL', 'fotouser228.jpg', '2020-06-09 20:49:00', '2020-06-09 20:49:00', 'hernandez', 'NULL', 'Normal', '', '0000-00-00', '', 10000, ''),
(229, 'julio', 'gonzales09', 'infomigsed@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OWFjLjBxYkNmYlBHTTBYdw$k9jlLUwo9LhuvDPC77hAT5GDyS/SCvY1nbV6860PnMY', 'NULL', 'fotouser229.png', '2020-06-09 21:01:00', '2020-06-09 21:01:00', 'gonzales', 'NULL', 'administrador', '', '0000-00-00', '', 10000, ''),
(230, 'bernal', 'bernal09', 'miguelocampoch@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$OFdmN0xPa1VVNWQ3SnViVw$fLWwxZLll/QhYCi8Gs3kTNlUSaHub3bmTdW6ew3GL0E', 'NULL', 'NULL', '2020-06-09 21:08:00', '2020-06-09 21:08:00', 'andres', 'NULL', 'Normal', '', '0000-00-00', '', 10000, ''),
(231, 'giovanni', 'itsbygio', 'gioangil@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c1pNNlFKNUFvOW1aYVVJZA$Q70v3nsDgtQkijorFQifoX1ytTC2zzS6tIMiWy0hyaA', 'NULL', 'NULL', '2020-06-10 00:10:00', '2020-06-10 00:10:00', 'gill', 'NULL', 'Normal', '', '0000-00-00', '', 10000, ''),
(232, 'Estiven', 'estiven09', 'eruiz2@udi.edu.co', '$argon2i$v=19$m=65536,t=4,p=1$Vjh6ODAzRUdmOFFWNzczQQ$SZ3rE/j8O2nCfuFl/xkyr3vG/19q8ntYvfl+nDVAha8', 'NULL', 'fotouser232.png', '2020-06-10 03:07:00', '2020-06-10 03:07:00', 'Ruiz', 'NULL', 'administrador', 'M', '0000-00-00', 'Estudiante de ingenieria de sistemas', 1, '');

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
  MODIFY `idlike` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idpublicacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

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
