-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2025 a las 19:14:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `Id` int(11) NOT NULL,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdPaises` int(11) NOT NULL,
  `Observaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaActual` date NOT NULL,
  `IdUsuarioSesion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`Id`, `Denominacion`, `IdPaises`, `Observaciones`, `FechaActual`, `IdUsuarioSesion`) VALUES
(1, 'AVEC Automotores', 4, '', '2025-05-11', 6),
(2, 'Mercado Libre Brasil', 2, '', '2025-05-12', 1),
(3, 'Pinturerias Tersuave', 1, '', '2025-05-13', 2),
(4, 'La Serena Automotores', 3, '', '2025-05-14', 1),
(8, 'sofiweb', 1, '', '2025-06-13', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id` int(11) NOT NULL,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`Id`, `Denominacion`) VALUES
(1, 'Analisis Iniciado'),
(2, 'En Desarrollo'),
(3, 'Terminado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `Id` int(11) NOT NULL,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`Id`, `Denominacion`, `Imagen`) VALUES
(1, 'Argentina', 'img/countries/ARG.jpg'),
(2, 'Brasil', 'img/countries/BRA.jpg'),
(3, 'Chile', 'img/countries/CHI.jpg'),
(4, 'Uruguay', 'img/countries/URU.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `Id` int(11) NOT NULL,
  `IdEmpresas` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `Observaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DenominacionProyecto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `FechaActual` date NOT NULL,
  `Prioridad` tinyint(1) NOT NULL,
  `IdUsuarioSesion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`Id`, `IdEmpresas`, `IdUsuarios`, `Observaciones`, `DenominacionProyecto`, `IdEstado`, `FechaActual`, `Prioridad`, `IdUsuarioSesion`) VALUES
(1, 1, 5, '', 'ECommerce RenovaciÃ³n', 3, '2025-02-01', 0, 0),
(2, 2, 2, '', 'GeneraciÃ³n APIs + DocumentaciÃ³n', 2, '2025-02-10', 0, 0),
(3, 3, 3, '', 'Adecuaciones en estructuras de Productos', 1, '2025-03-15', 0, 0),
(4, 2, 2, '', 'Cambios en seguridad al ingreso', 1, '2025-03-18', 0, 0),
(5, 4, 3, '', 'GestiÃ³n de FacturaciÃ³n Web', 4, '2025-04-25', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Denominacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Denominacion`) VALUES
(1, 'Administrador'),
(2, 'Lider'),
(3, 'Analista Funcional'),
(4, 'Programador/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `IdRoles` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `Foto`, `Usuario`, `Clave`, `IdRoles`) VALUES
(1, 'Mara', 'Ferrero', 'mferrero.jpg', 'mferrero', '1234', 4),
(2, 'Marcos', 'Gutierrez', 'mgutierrez.jpg', 'mgutierrez', '4567', 2),
(3, 'William', 'Jhonson', 'wjhonson.jpg', 'wjhonson', '1234', 2),
(4, 'Sue', 'Palacios', '', 'spalacios', '4567', 1),
(5, 'Anna', 'Rodriguez', 'arodriguez.jpg', 'arodriguez', '1234', 2),
(6, 'Carla', 'Sanabria', 'csanabria.jpg', 'csanabria', '4567', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
