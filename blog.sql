-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2020 a las 16:21:09
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
  `iduser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idrespuesta`, `descripcion`, `idpublicacion`, `iduser`) VALUES
(73, '', 387, 196),
(76, 'Prueba', 387, 197),
(77, 'Prueba', 384, 197),
(78, 'Prueba', 383, 197),
(79, 'Prueba', 382, 197),
(86, 'Prueba', 389, 196);

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
(213, 387, 197),
(214, 384, 197),
(216, 383, 197),
(217, 382, 197),
(228, 387, 196),
(229, 384, 196),
(230, 383, 196),
(231, 382, 196);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idpublicacion` int(10) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `iduser` int(10) NOT NULL,
  `archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `likes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpublicacion`, `descripcion`, `iduser`, `archivo`, `likes`) VALUES
(382, 'Prueba documento', 196, 'Taller1_MiguelOcampo_07052020.pdf', 2),
(383, ' Prueba documento ', 196, 'NAT-ESTATICA-Y-DINAMICA-TRABAJOI.pdf', 2),
(384, 'Prueba imagen', 196, 'carro.jpg', 2),
(387, '  Prueba  ', 197, 'NULL', 2),
(389, ' Prueba', 196, 'carro.jpg', 0);

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
(196, 'miguel', 'miguel09', 'miguelocampoc@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MmouNS9ZRE9iOXZOMko2Rw$2Nmk91c1nh9d1eYy+kCelpt6YZZnnJgnRcWDUZ04KcE', '$2y$10$LRfveIU4uIYE4.3mLSadF.Z.flWtl9mhxZySXgxMZG7xRZsOUpJuu', 'fotouser196.jpg', '2020-05-21 13:21:00', '2020-05-21 13:21:00', 'Ocampo', '$argon2i$v=19$m=65536,t=4,p=1$VDNxZWdjdUZuOTBSaU5PRA$N8sO1dVfIvB5AepYFZr2lDnSyqR+OlIag+3TFJFG9sM', 'Activated', '', '0000-00-00', '', 10000, 'NULL'),
(197, 'mohamed', 'ashama09', 'ashama@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$R2FNTDR1L3p3czNaSkEwTw$ob87BP3O7KRxGDZeZR/Y955AFbrW5ZEkVDZMOQGij0A', 'NULL', 'fotouser197.jpg', '2020-05-26 23:32:00', '2020-05-26 23:32:00', 'asahma', '$argon2i$v=19$m=65536,t=4,p=1$dWRaUy5zQlU4Z0lUempCQQ$kKvlPM6DO2IJXd2TY2Bays/HcBe7AOb+Q5tnGVrZnlc', 'Activated', '', '0000-00-00', '', 10000, ''),
(222, 'julio', 'julio9', 'magelosac@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$T2NXVUsvQy5Oc0EzbC51TQ$HhDJsp55RbZXxMdUtSsP99yq5N3aSPbJj8XNT1VthF4', 'NULL', 'NULL', '2020-05-31 02:44:00', '2020-05-31 02:44:00', 'julio', 'NULL', 'Activated', '', '0000-00-00', '', 10000, '');

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
  MODIFY `idrespuesta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idpublicacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

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
