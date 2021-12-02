-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 19:42:40
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_appbcn`
--
CREATE DATABASE IF NOT EXISTS `bd_appbcn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_appbcn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`email`, `pass`, `nombre`, `apellido`) VALUES
('david@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'David', 'Alvarez Rodriguez'),
('xavi@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Xavi', 'Gomez Gallego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `capactual` int(3) NOT NULL,
  `capmax` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_eventos`
--

INSERT INTO `tbl_eventos` (`id`, `titulo`, `descripcion`, `fecha`, `hora`, `img`, `capactual`, `capmax`) VALUES
(1, 'VI CARRERA CONTRA EL CÁNCER', '¡Únete a la carrera anual contra el cáncer! Contra el cáncer nadie lucha en solitario, nadie está solo. Apoya en la lucha contra el cáncer.', '2021-12-25', '20:00:00', '../img/cursa1.jpg', 0, 3),
(2, 'CARRERA LUCHA CONTRA EL VIH', '¡Unete a la carrera anual contra el VIH!\r\nTodos juntos podemos parar el sida. Apoya en la lucha contra el VIH.', '2022-01-01', '17:00:00', '../img/cursa2.jpg', 0, 3),
(3, 'CARRERA POR LA ESPERANZA', '¡Unete a la carrera anual contra el COVID!\r\nLa carrera contra el virus, en busca de la vacuna. Apoya en la lucha contra el COVID.', '2022-01-06', '13:00:00', '../img/cursa3.jpg', 0, 3),
(4, 'IV CARRERA SOLIDARIA A FAVOR DE L@S JÓVENES', 'Unete a la carreara solidaria a favor de los jovenes', '2022-02-09', '10:00:00', '../img/cursa4.jpg', 0, 3),
(5, 'VI MARCHA POR LAS ENFERMEDADES RARAS', 'Carrera para sensibilizar sobre las enfermedades raras a través del deporte.', '2022-02-25', '12:00:00', '../img/cursa5.jpg', 0, 3),
(6, 'GLOBAL6KFORWATER', 'Carrera de seis kilómetros, la misma distancia promedio que personas (por lo general mujeres y niñas) deben caminar en busca de agua en países en vías de desarrollo.', '2022-03-10', '09:00:00', '../img/cursa6.jpg', 0, 3),
(7, '24º CARRERA POR LA INCLUSIÓN ', 'Carrera por la plena inclusión de las personas con discapacidad.', '2022-03-31', '11:00:00', '../img/cursa7.jpg', 0, 3),
(8, 'CARRERA MENUDOS CORAZONES ', 'Carrera a favor de los niños con problemas del corazón.', '2022-04-22', '10:00:00', '../img/cursa8.jpg', 0, 3),
(9, 'CARRERA SOLIDARIA DOWN', 'Carrera para visibilizar a las personas con discapacidad intelectual.', '2022-05-30', '08:00:00', '../img/cursa9.jpg', 0, 3),
(10, 'EDREAMS MARATÓN SOCIAL', 'Carrera para impulsar acciones sociales a través del deporte.', '2022-06-08', '07:00:00', '../img/cursa10.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registroevento`
--

CREATE TABLE `tbl_registroevento` (
  `id` int(11) NOT NULL,
  `dni` char(9) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voluntario`
--

CREATE TABLE `tbl_voluntario` (
  `dni` char(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_registroevento`
--
ALTER TABLE `tbl_registroevento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dni_evento` (`dni`),
  ADD KEY `fk_evento` (`id_evento`);

--
-- Indices de la tabla `tbl_voluntario`
--
ALTER TABLE `tbl_voluntario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_registroevento`
--
ALTER TABLE `tbl_registroevento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
