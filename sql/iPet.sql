-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: eu-cdbr-west-02.cleardb.net
-- Tiempo de generación: 28-02-2019 a las 21:20:17
-- Versión del servidor: 5.6.42-log
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heroku_618b704f5a7b41e`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idEspecie` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idEspecie`, `nombre`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Ave'),
(4, 'Tortuga'),
(101, 'Especie de Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idEspecie` int(5) NOT NULL,
  `idRaza` int(5) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idMascota`, `nombre`, `idEspecie`, `idRaza`, `genero`, `color`, `imagen`, `usuario`) VALUES
(9, 'Dante', 2, 23, 'Macho', 'Grisaceo', '/path/to/image', 'xloxlolex'),
(11, 'Chicho', 1, 10, 'Macho', 'Blanco y marrón', '/path/to/image', 'xloxlolex'),
(31, 'Mascota de Prueba', 3, 34, 'Hembra', 'Verde', '/path/to/image', 'prueba2'),
(51, 'Animal de Usuaria', 3, 32, 'Hembra', 'Bordeo', '/path/to/image', 'usuaria'),
(71, 'Pucho', 1, 3, 'Macho', 'Marrón', '/path/to/image', 'admin'),
(81, 'Milena', 2, 23, 'Hembra', 'Gris', '/path/to/image', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `idRaza` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `idEspecie` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`idRaza`, `nombre`, `idEspecie`) VALUES
(2, 'Pastor Alemán', 1),
(3, 'Bulldog', 1),
(4, 'Caniche', 1),
(5, 'Labrador', 1),
(6, 'Beagle', 1),
(7, 'Mastín', 1),
(8, 'Golden Retriever', 1),
(9, 'Chihuahua', 1),
(10, 'Carlino', 1),
(11, 'Bóxer', 1),
(13, 'Husky Siberiano', 1),
(14, 'Shiba Inu', 1),
(15, 'Persa', 2),
(16, 'Siamés', 2),
(17, 'Maine Coon', 2),
(18, 'Sphynx', 2),
(19, 'Ragdoll', 2),
(20, 'Munchkin', 2),
(21, 'Abisino', 2),
(22, 'Angora Turco', 2),
(23, 'Bengala', 2),
(24, 'Bosque de Noruega', 2),
(25, 'Laúd', 4),
(26, 'Carey', 4),
(27, 'Cumberland', 4),
(28, 'Mediterránea', 4),
(29, 'De Florida', 4),
(30, 'Rusa', 4),
(31, 'Periquito', 3),
(32, 'Ninfa', 3),
(33, 'Rosella', 3),
(34, 'Loro', 3),
(35, 'Jilguero', 3),
(36, 'Cacatúa', 3),
(37, 'Verderón', 3),
(41, 'Raza de Prueba', 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(1) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idRol` int(1) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `email`, `contrasena`, `nombre`, `idRol`, `edad`, `genero`, `imagen`) VALUES
('admin', 'admin@admin.com', 'admin', 'Administrador', 1, NULL, NULL, 'https://www.knowmuhammad.org/img/noavatarn.png'),
('gonzaloivan121', 'gonzaloivan121@gmail.com', 'Rollinbaby1.', 'Gonzalo', 2, 20, 'masculino', '/path/to/image'),
('iescampanillas', 'campanillas@campanillas.com', 'iescampanillas', 'IES Campanillas', 2, 25, 'otro', '/path/to/image'),
('prueba', 'prueba@probando.com', 'prueba', 'Prueba Probando', 2, 20, 'otro', '/path/to/image'),
('prueba2', 'prueba2@probando.com', 'prueba2', 'Prueba Probando 2', 2, 20, 'masculino', '/path/to/image'),
('smao', 'smao@smao.com', 'smao', 'Sin Miedo al Océano', 2, 20, 'femenino', '/path/to/image'),
('user', 'user@gmail.com', 'user', 'Usuario de Prueba', 2, 20, 'masculino', '/path/to/image'),
('usuaria', 'usuaria@usuaria.com', 'usuaria', 'Usuaria', 2, 20, 'femenino', '/path/to/image'),
('usuario', 'usuario@usuario.com', 'usuario', 'Usuario', 2, 20, 'masculino', '/path/to/image'),
('xloxlolex', 'chaparro.gonzaloivan@gmail.com', 'contraseña', 'Gonzalo Iván Chaparro Barese', 2, 20, 'masculino', '/path/to/image');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `fk_usuario_mascota` (`usuario`),
  ADD KEY `fk_especie_mascota` (`idEspecie`),
  ADD KEY `fk_raza_mascota` (`idRaza`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`idRaza`),
  ADD KEY `fk_raza_especie` (`idEspecie`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_rol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `idRaza` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_especie_mascota` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`),
  ADD CONSTRAINT `fk_raza_mascota` FOREIGN KEY (`idRaza`) REFERENCES `raza` (`idRaza`),
  ADD CONSTRAINT `fk_usuario_mascota` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `fk_raza_especie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
