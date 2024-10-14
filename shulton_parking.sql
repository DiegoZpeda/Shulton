-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 01:42:59
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
-- Base de datos: `shulton_parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `nombre`, `message`, `created_on`, `user_id`) VALUES
(19, 'ecuinelmalo@hotmail.com', 'Hola', '2024-10-03 18:19:42', 0),
(20, 'ugbuni99@gmail.com', 'Hola', '2024-10-03 18:20:25', 0),
(21, 'ugbuni99@gmail.com', 'Hola', '2024-10-03 18:24:22', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `rating_question_1` varchar(20) NOT NULL,
  `rating_question_2` varchar(20) NOT NULL,
  `rating_question_3` varchar(20) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `feedback`
--

INSERT INTO `feedback` (`id`, `rating_question_1`, `rating_question_2`, `rating_question_3`, `comment`) VALUES
(5, 'Bueno', 'Bueno', 'Bueno', 'kioiioo'),
(6, 'Excelente', 'Excelente', 'Excelente', 'es un buen sistema solo que el gordo solo echado pasa  '),
(7, 'Excelente', 'Excelente', 'Excelente', 'es un buen sistema solo que el gordo solo echado pasa  '),
(8, 'Excelente', 'Excelente', 'Excelente', 'es un buen sistema solo que el gordo solo echado pasa  '),
(9, 'Excelente', 'Excelente', 'Excelente', 'es un buen sistema solo que el gordo solo echado pasa  '),
(10, 'Malo', 'Malo', 'Malo', 'Pongan a trabajar al gordoo'),
(11, 'Excelente', 'Excelente', 'Excelente', 'esta bien bueno'),
(12, 'Muy Malo', 'Muy Malo', 'Muy Malo', 'Malo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `passwor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_somos`
--

CREATE TABLE `quienes_somos` (
  `id` int(11) NOT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quienes_somos`
--

INSERT INTO `quienes_somos` (`id`, `contenido`, `fecha_creacion`) VALUES
(5, 'HOLA MUNDO', '2024-04-23 23:32:25'),
(6, 'hola', '2024-04-24 01:59:00'),
(7, '', '2024-04-24 02:03:10'),
(8, 'hola', '2024-04-26 05:33:53'),
(9, 'bhbvvv', '2024-05-11 02:53:59'),
(10, 'bhbvvvHOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2024-05-14 01:58:32'),
(11, 'bhbvvvHOLAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAA', '2024-05-14 01:59:56'),
(12, 'Shulton Parking es una plataforma web diseñada para simplificar la búsqueda', '2024-05-14 03:14:48'),
(13, 'Shulton Parking es una plataforma web diseñada para simplificar la búsqueda\r\nde estacionamiento seguro para tu automóvil o motocicleta en el municipio \r\nde Usulután.Nuestro objetivo es contribuir a reducir las grandes congestiones \r\nde tráfico, ofreciendo información sobre diversas opciones de estacionamiento. \r\nAdemás, somos una herramienta ideal para extranjeros que no están familiarizados \r\ncon los estacionamientos seguros en Usulután.\r\nFundada en 2024 por Support Manager, Shulton Parking es un proyecto en crecimiento\r\ncreado por un grupo de estudiantes de ingeniería en sistemas y redes informáticas de la Universidad \r\nGerardo Barrios, como parte de su proyecto de cátedra de ingeniería de software.\r\nEl equipo de support Manager esta conformado por:\r\nEdwin López, líder del equipo.\r\nGustavo Cerna, Tester.\r\nDiego Zepeda, desarrollador.\r\nFernando López, desarrollador.\r\nCarin Sánchez, UX/UI.\r\nLesly Bermudez, UX/UI.', '2024-05-14 03:16:57'),
(14, 'Shulton Parking es una plataforma web diseñada para simplificar la búsquedade estacionamiento seguro para tu automóvil o motocicleta en el municipio de Usulután.Nuestro objetivo es contribuir a reducir las grandes congestiones de tráfico, ofreciendo información sobre diversas opciones de estacionamiento. Además, somos una herramienta ideal para extranjeros que no están familiarizados con los estacionamientos seguros en Usulután.Fundada en 2024 por Support Manager, Shulton Parking es un proyecto en crecimientocreado por un grupo de estudiantes de ingeniería en sistemas y redes informáticas de la Universidad Gerardo Barrios, como parte de su proyecto de cátedra de ingeniería de software.El equipo de support Manager esta conformado por:Edwin López, líder del equipo.Gustavo Cerna, Tester.Diego Zepeda, desarrollador.Fernando López, desarrollador.Carin Sánchez, UX/UI.Lesly Bermudez, UX/UI. Somos tu mejor opcion!', '2024-05-14 11:28:32'),
(15, 'Shulton Parking es una plataforma web diseñada para simplificar la búsquedade estacionamiento seguro para tu automóvil o motocicleta en el municipio de Usulután.Nuestro objetivo es contribuir a reducir las grandes congestiones de tráfico, ofreciendo información sobre diversas opciones de estacionamiento. Además, somos una herramienta ideal para extranjeros que no están familiarizados con los estacionamientos seguros en Usulután.Fundada en 2024 por Support Manager, Shulton Parking es un proyecto en crecimientocreado por un grupo de estudiantes de ingeniería en sistemas y redes informáticas de la Universidad Gerardo Barrios, como parte de su proyecto de cátedra de ingeniería de software.El equipo de support Manager esta conformado por:Edwin López, líder del equipo.Gustavo Cerna, Tester.Diego Zepeda, desarrollador.Fernando López, desarrollador.Carin Sánchez, UX/UI.Lesly Bermudez, UX/UI. Somos tu mejor opcion!SHI', '2024-06-22 03:15:27'),
(16, 'Shulton Parking es una plataforma web diseñada para simplificar la búsquedade estacionamiento seguro para tu automóvil o motocicleta en el municipio de Usulután.Nuestro objetivo es contribuir a reducir las grandes congestiones de tráfico, ofreciendo información sobre diversas opciones de estacionamiento. Además, somos una herramienta ideal para extranjeros que no están familiarizados con los estacionamientos seguros en Usulután.Fundada en 2024 por Support Manager, Shulton Parking es un proyecto en crecimientocreado por un grupo de estudiantes de ingeniería en sistemas y redes informáticas de la Universidad Gerardo Barrios, como parte de su proyecto de cátedra de ingeniería de software.El equipo de support Manager esta conformado por:Edwin López, líder del equipo.Gustavo Cerna, Tester.Diego Zepeda, desarrollador.Fernando López, desarrollador.Carin Sánchez, UX/UI.Lesly Bermudez, UX/UI. Somos tu mejor opcion!', '2024-06-22 03:15:53'),
(17, 'Shulton Parking es una plataforma web diseñada para simplificar la búsquedade estacionamiento seguro para tu automóvil o motocicleta en el municipio de Usulután.Nuestro objetivo es contribuir a reducir las grandes congestiones de tráfico, ofreciendo información sobre diversas opciones de estacionamiento. Además, somos una herramienta ideal para extranjeros que no están familiarizados con los estacionamientos seguros en Usulután.Fundada en 2024 por Support Manager, Shulton Parking es un proyecto en crecimientocreado por un grupo de estudiantes de ingeniería en sistemas y redes informáticas de la Universidad Gerardo Barrios, como parte de su proyecto de cátedra de ingeniería de software.El equipo de support Manager esta conformado por:Edwin López, líder del equipo.Gustavo Cerna, Tester.Diego Zepeda, desarrollador.Fernando López, desarrollador.Carin Sánchez, UX/UI.Lesly Bermudez, UX/UI. Somos tu mejor opcion!AVECES', '2024-08-04 18:50:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mapa`
--

CREATE TABLE `tbl_mapa` (
  `mapa_id` int(11) NOT NULL,
  `registro` datetime NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `latitud` varchar(40) NOT NULL,
  `longitud` varchar(40) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `capacidad` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `favoritos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_mapa`
--

INSERT INTO `tbl_mapa` (`mapa_id`, `registro`, `nombre`, `latitud`, `longitud`, `precio`, `imagen`, `horario`, `capacidad`, `descripcion`, `favoritos`) VALUES
(64, '0000-00-00 00:00:00', 'UGB', '13.341175777681876', '-88.41854378131949', '$1 por hora', './uploads/c7cc413c127a7d4e3c3a776575b2e36f.png', '7AM a 6PM', '10', 'Es la Universidad', 0),
(65, '0000-00-00 00:00:00', 'Ozatlan', '13.38455558682056', '-88.50446282524497', '$1 por hora', './uploads/c0795da666b93722aacd5a836c4c6f1c.jpg', '7AM a 6PM', '10', 'Es Ozatlan', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `passwor` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `favoritos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `edad`, `correo`, `passwor`, `id_rol`, `reset_token_hash`, `reset_token_expires_at`, `foto`, `favoritos`) VALUES
(73, 'Ecuin', 'Lopez', '87', 'ecuinelmalo@hotmail.com', '$2y$10$cR78Resr1DzBVkMFIdpxAuRIzGuV9L/7o5TmIbEytqyKJPOIWErNW', 1, NULL, NULL, '', ''),
(86, 'Diego', 'Zepeda', '21', 'ugbuni99@gmail.com', '$2y$10$E54ZtssEfPoMpU6Sysr/3eVaGT80LNLFm6WEIrf510HG1Cij.vBNS', 2, NULL, NULL, 'uploads/Screenshot_11.jpg', '26,65,64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_prueba`
--

CREATE TABLE `usuarios_prueba` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quienes_somos`
--
ALTER TABLE `quienes_somos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mapa`
--
ALTER TABLE `tbl_mapa`
  ADD PRIMARY KEY (`mapa_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`) USING BTREE,
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `usuarios_prueba`
--
ALTER TABLE `usuarios_prueba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `quienes_somos`
--
ALTER TABLE `quienes_somos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_mapa`
--
ALTER TABLE `tbl_mapa`
  MODIFY `mapa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `usuarios_prueba`
--
ALTER TABLE `usuarios_prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_prueba`
--
ALTER TABLE `usuarios_prueba`
  ADD CONSTRAINT `usuarios_prueba_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
