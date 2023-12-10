-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2023 a las 22:17:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbblogestructurado`
--
CREATE DATABASE IF NOT EXISTS `dbblogestructurado` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbblogestructurado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Juegos'),
(2, 'Anime'),
(3, 'Peliculas'),
(4, 'Cartoons');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(3000) DEFAULT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id`, `titulo`, `descripcion`, `fecha`, `usuario_id`, `categoria_id`) VALUES
(1, 'GTA Vice City', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-15', 1, 1),
(2, 'Attack on Titan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-15', 2, 2),
(3, 'Medal of Honor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-10', 2, 1),
(4, 'Jujutsu Kaisen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-22', 1, 2),
(5, 'Django', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-07', 1, 3),
(6, 'Invencible', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a felis nec eros imperdiet faucibus. Etiam efficitur lectus quam, vitae consectetur nulla eleifend ut. Maecenas ut ex fringilla, molestie justo ut, tempor tellus. Donec ornare, nunc sed tempus pellentesque, libero lorem semper turpis, rutrum accumsan mauris ligula et ex. Aenean ultricies nibh vel turpis feugiat, a bibendum felis maximus. Aenean mattis neque et neque euismod, nec vulputate ligula luctus. Sed viverra nulla risus, vitae sodales leo rutrum id. In lacus ex, molestie quis orci sed, vehicula placerat augue. In sed maximus est. Cras non sem in turpis commodo ornare. Nam ut consectetur dui, sit amet ultricies purus. Suspendisse sed est elit. Ut sed dui vel urna dictum vestibulum. Nullam a ultricies libero. Pellentesque non dolor a nisl congue varius ut id libero. ', '2021-07-16', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `clave`, `fecha`) VALUES
(1, 'Daniel', 'Alvarez', 'daniel@ejemplo.local', '$2y$04$9Q99/g.lFuB69JJr0DWc2ex.WyGV14BuDEn7KoWpgXzgobkPMCZXK', '2021-07-13'),
(2, 'Esteban', 'Alvarez', 'esteban@ejemplo.local', '$2y$04$YmeUbLptDuCcUT3FDtDvaebHc7pHMBINlyEuk95DcJxoUBGARilmG', '2021-07-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`,`usuario_id`,`categoria_id`),
  ADD KEY `fk_entrada_usuario_idx` (`usuario_id`),
  ADD KEY `fk_entrada_categoria1_idx` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fk_entrada_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
