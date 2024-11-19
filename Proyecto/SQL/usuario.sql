-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 03:39:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDENTIFICACION` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO1` varchar(50) NOT NULL,
  `APELLIDO2` varchar(50) DEFAULT NULL,
  `CORREO` varchar(100) NOT NULL,
  `PERFIL` varchar(20) NOT NULL,
  `CONTRASENA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDENTIFICACION`, `NOMBRE`, `APELLIDO1`, `APELLIDO2`, `CORREO`, `PERFIL`, `CONTRASENA`) VALUES
(345, 'maria', 'sal', 'asasd', 'asd@g.com', 'admin', '654987'),
(456, 'ROBERTO', 'ARIAS', 'PASTRANO', 'roberto@h.com', 'SUPERUSER', 'ASD12356'),
(12345, 'Juan', 'Pérez', 'Gómez', 'juan.perez@example.com', 'Administrador', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDENTIFICACION`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
