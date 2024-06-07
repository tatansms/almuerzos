-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 10:58:30
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
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `ID_almuerzo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almuerzo`
--

INSERT INTO `almuerzo` (`ID_almuerzo`, `nombre`, `descripcion`) VALUES
(1, 'Carne molida', 'fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet'),
(2, 'Carne asada', 'tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi'),
(3, 'Carne bistec', 'accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam'),
(4, 'Carne frita', 'ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit'),
(5, 'Carne a la plancha', 'aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi'),
(6, 'Carne guisada', 'sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus'),
(7, 'Pollo asada', 'varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non'),
(8, 'Pollo bistec', 'nullam orci pede venenatis non sodales sed tincidunt eu felis fusce'),
(9, 'Pollo frita', 'mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed'),
(10, 'Pollo a la plancha', 'maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum'),
(11, 'Pollo guisada', 'adipiscing elit proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum'),
(12, 'Cerdo asada', 'rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta'),
(13, 'Cerdo bistec', 'ac est lacinia nisi venenatis tristique fusce congue diam id'),
(14, 'Cerdo frita', 'pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu'),
(15, 'Cerdo a la plancha', 'sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzos_en_menu`
--

CREATE TABLE `almuerzos_en_menu` (
  `ID_menu` int(11) NOT NULL,
  `ID_almuerzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almuerzos_en_menu`
--

INSERT INTO `almuerzos_en_menu` (`ID_menu`, `ID_almuerzo`) VALUES
(3, 1),
(4, 2),
(2, 3),
(3, 4),
(2, 5),
(2, 6),
(1, 7),
(2, 8),
(3, 9),
(2, 10),
(5, 11),
(2, 12),
(3, 13),
(2, 14),
(5, 15),
(3, 1),
(2, 2),
(3, 3),
(5, 4),
(1, 5),
(4, 6),
(4, 7),
(1, 8),
(5, 9),
(5, 10),
(2, 11),
(4, 12),
(2, 13),
(2, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `ID_calificacion` int(11) NOT NULL,
  `ID_estudiante` int(11) NOT NULL,
  `ID_almuerzo` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_calificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_almuerzos_estudiante`
--

CREATE TABLE `dias_almuerzos_estudiante` (
  `ID_dia` int(11) NOT NULL,
  `ID_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_almuerzo`
--

CREATE TABLE `dia_almuerzo` (
  `ID_dia` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dia_almuerzo`
--

INSERT INTO `dia_almuerzo` (`ID_dia`, `nombre`) VALUES
(4, 'Jueves'),
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(6, 'Sabado'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `ID_donacion` int(11) NOT NULL,
  `ID_donante` int(11) NOT NULL,
  `ID_beneficiario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ID_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacionpendiente`
--

CREATE TABLE `donacionpendiente` (
  `ID_donacionPendiente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ID_donante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_estado` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_donacion`
--

CREATE TABLE `estado_donacion` (
  `ID_donacion` int(11) NOT NULL,
  `ID_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_en_fila`
--

CREATE TABLE `estudiantes_en_fila` (
  `ID_estudiante` int(11) NOT NULL,
  `ID_fila` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `hora_ingreso` time NOT NULL,
  `ID_qr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes_en_fila`
--

INSERT INTO `estudiantes_en_fila` (`ID_estudiante`, `ID_fila`, `turno`, `hora_ingreso`, `ID_qr`) VALUES
(6, 1, 1, '10:40:33', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excusa`
--

CREATE TABLE `excusa` (
  `ID_excusa` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` date NOT NULL,
  `convocatoria` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `excusa`
--

INSERT INTO `excusa` (`ID_excusa`, `descripcion`, `fecha`, `convocatoria`) VALUES
(1, 'Me dio diarrea\r\n', '2023-01-01', 'Convocatoria 2024-1 ESTUDIANTES PREGRADO PRESENCIAL'),
(2, 'Cita médica', '2023-01-02', ''),
(3, 'Problema familiar', '2023-01-03', ''),
(4, 'Viaje', '2023-01-04', ''),
(5, 'Enfermedad', '2023-01-05', ''),
(6, 'Cita médica', '2023-01-06', ''),
(7, 'Problema familiar', '2023-01-07', ''),
(8, 'Viaje', '2023-01-08', ''),
(9, 'Enfermedad', '2023-01-09', ''),
(10, 'Cita médica', '2023-01-10', ''),
(11, 'Problema familiar', '2023-01-11', ''),
(12, 'Viaje', '2023-01-12', ''),
(13, 'Enfermedad', '2023-01-13', ''),
(14, 'Cita médica', '2023-01-14', ''),
(15, 'Problema familiar', '2023-01-15', ''),
(16, 'Viaje', '2023-01-16', ''),
(17, 'Enfermedad', '2023-01-17', ''),
(18, 'Cita médica', '2023-01-18', ''),
(19, 'Problema familiar', '2023-01-19', ''),
(20, 'Viaje', '2023-01-20', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excusa_dia_almuerzo`
--

CREATE TABLE `excusa_dia_almuerzo` (
  `ID_excusa_dia_almuerzo` int(11) NOT NULL,
  `ID_dia` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_excusa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `excusa_dia_almuerzo`
--

INSERT INTO `excusa_dia_almuerzo` (`ID_excusa_dia_almuerzo`, `ID_dia`, `ID_user`, `ID_excusa`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `ID_facultad` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`ID_facultad`, `nombre`) VALUES
(3, 'Ciencias Básicas'),
(6, 'Ciencias de la Educación'),
(5, 'Ciencias de la Salud'),
(1, 'Ciencias Empresariales y Económicas'),
(4, 'Humanidades'),
(2, 'Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falla`
--

CREATE TABLE `falla` (
  `ID_falla` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `falla`
--

INSERT INTO `falla` (`ID_falla`, `fecha`) VALUES
(1, '2023-01-01 05:00:00'),
(2, '2023-01-02 05:00:00'),
(3, '2023-01-03 05:00:00'),
(4, '2023-01-04 05:00:00'),
(5, '2023-01-05 05:00:00'),
(6, '2023-01-06 05:00:00'),
(7, '2023-01-07 05:00:00'),
(8, '2023-01-08 05:00:00'),
(9, '2023-01-09 05:00:00'),
(10, '2023-01-10 05:00:00'),
(11, '2023-01-11 05:00:00'),
(12, '2023-01-12 05:00:00'),
(13, '2023-01-13 05:00:00'),
(14, '2023-01-14 05:00:00'),
(15, '2023-01-15 05:00:00'),
(16, '2023-01-16 05:00:00'),
(17, '2023-01-17 05:00:00'),
(18, '2023-01-18 05:00:00'),
(19, '2023-01-19 05:00:00'),
(20, '2023-01-20 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falla_dia_almuerzo`
--

CREATE TABLE `falla_dia_almuerzo` (
  `ID_falla_dia_almuerzo` int(11) NOT NULL,
  `ID_dia` int(11) DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_falla` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `falla_dia_almuerzo`
--

INSERT INTO `falla_dia_almuerzo` (`ID_falla_dia_almuerzo`, `ID_dia`, `ID_user`, `ID_falla`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fila_virtual`
--

CREATE TABLE `fila_virtual` (
  `ID_fila` int(11) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `num_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fila_virtual`
--

INSERT INTO `fila_virtual` (`ID_fila`, `fecha_realizacion`, `num_personas`) VALUES
(1, '2024-06-07', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `ID_menu` int(11) NOT NULL,
  `ID_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`ID_menu`, `ID_dia`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificaciones_menu`
--

CREATE TABLE `modificaciones_menu` (
  `ID_administrador` int(11) NOT NULL,
  `ID_menu` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID_programa` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `ID_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`ID_programa`, `nombre`, `ID_facultad`) VALUES
(1, 'Administración de Empresas', 1),
(2, 'Agronómica', 2),
(3, 'Biología', 3),
(4, 'Antropología', 4),
(5, 'Enfermería', 5),
(6, 'Licenciatura en Artes', 6),
(7, 'Contaduría Pública', 1),
(8, 'Sistemas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qr`
--

CREATE TABLE `qr` (
  `ID_qr` int(11) NOT NULL,
  `Url_img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `qr`
--

INSERT INTO `qr` (`ID_qr`, `Url_img`) VALUES
(1, 'https://example.com/qr1.png'),
(2, 'https://example.com/qr2.png'),
(3, 'https://example.com/qr3.png'),
(4, 'https://example.com/qr4.png'),
(5, 'https://example.com/qr5.png'),
(6, 'https://example.com/qr6.png'),
(7, 'https://example.com/qr7.png'),
(8, 'https://example.com/qr8.png'),
(9, 'https://example.com/qr9.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `Nombre`) VALUES
(2, 'Administrador'),
(3, 'Asistente de ventanilla'),
(1, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `ID_user` int(11) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_user` int(11) NOT NULL,
  `Nombre` varchar(32) NOT NULL,
  `Apellido` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Contrasena` varchar(32) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `ID_programa` int(11) DEFAULT NULL,
  `ID_rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_user`, `Nombre`, `Apellido`, `Email`, `Contrasena`, `Celular`, `Codigo`, `ID_programa`, `ID_rol`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@example.com', 'password123', '555-1234', 0, 1, 1),
(2, 'María', 'García', 'maria.garcia@example.com', 'password123', '555-5678', 0, 2, 1),
(3, 'Carlos', 'Sánchez', 'carlos.sanchez@example.com', 'password123', '555-9876', 0, 1, 1),
(4, 'Ana', 'López', 'ana.lopez@example.com', 'password123', '555-6543', 0, 2, 1),
(5, 'Luis', 'Martínez', 'luis.martinez@example.com', 'password123', '555-3210', 0, 1, 1),
(6, 'Elena', 'Torres', 'elena.torres@example.com', 'password123', '555-7890', 0, 2, 1),
(7, 'José', 'Ramírez', 'jose.ramirez@example.com', 'password123', '555-4321', 0, 1, 1),
(8, 'Laura', 'Fernández', 'laura.fernandez@example.com', 'password123', '555-8765', 0, 2, 1),
(9, 'Miguel', 'González', 'miguel.gonzalez@example.com', 'password123', '555-2109', 0, 1, 1),
(10, 'Sara', 'Rodríguez', 'sara.rodriguez@example.com', 'password123', '555-5432', 0, 2, 1),
(11, 'Daniel', 'Hernández', 'daniel.hernandez@example.com', 'password123', '555-6789', 0, 1, 1),
(12, 'Natalia', 'Jiménez', 'natalia.jimenez@example.com', 'password123', '555-0987', 0, 2, 1),
(13, 'David', 'Ruiz', 'david.ruiz@example.com', 'password123', '555-5674', 0, 1, 1),
(14, 'Paula', 'Díaz', 'paula.diaz@example.com', 'password123', '555-4329', 0, 2, 1),
(15, 'Jorge', 'Morales', 'jorge.morales@example.com', 'password123', '555-3218', 0, 1, 1),
(16, 'Claudia', 'Vega', 'claudia.vega@example.com', 'password123', '555-8761', 0, 2, 1),
(17, 'Alberto', 'Rojas', 'alberto.rojas@example.com', 'password123', '555-2190', 0, 1, 1),
(18, 'Marta', 'Castro', 'marta.castro@example.com', 'password123', '555-7654', 0, 2, 1),
(19, 'Pablo', 'Mendoza', 'pablo.mendoza@example.com', 'password123', '555-1209', 0, 1, 1),
(20, 'Silvia', 'Ortiz', 'silvia.ortiz@example.com', 'password123', '555-6547', 0, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD PRIMARY KEY (`ID_almuerzo`);

--
-- Indices de la tabla `almuerzos_en_menu`
--
ALTER TABLE `almuerzos_en_menu`
  ADD KEY `Almuerzos_En_Menu_fk0` (`ID_menu`),
  ADD KEY `Almuerzos_En_Menu_fk1` (`ID_almuerzo`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`ID_calificacion`),
  ADD KEY `Calificacion_fk0` (`ID_estudiante`),
  ADD KEY `Calificacion_fk1` (`ID_almuerzo`);

--
-- Indices de la tabla `dias_almuerzos_estudiante`
--
ALTER TABLE `dias_almuerzos_estudiante`
  ADD KEY `Dias_Almuerzos_Estudiantes_fk0` (`ID_dia`),
  ADD KEY `Dias_Almuerzos_Estudiantes_fk1` (`ID_estudiante`);

--
-- Indices de la tabla `dia_almuerzo`
--
ALTER TABLE `dia_almuerzo`
  ADD PRIMARY KEY (`ID_dia`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`ID_donacion`),
  ADD KEY `Donación_fk0` (`ID_donante`),
  ADD KEY `Donación_fk1` (`ID_beneficiario`),
  ADD KEY `Donación_fk2` (`ID_estado`);

--
-- Indices de la tabla `donacionpendiente`
--
ALTER TABLE `donacionpendiente`
  ADD PRIMARY KEY (`ID_donacionPendiente`),
  ADD KEY `DonacionPendiente_fk0` (`ID_donante`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Indices de la tabla `estado_donacion`
--
ALTER TABLE `estado_donacion`
  ADD KEY `Estado_Donacion_fk0` (`ID_donacion`),
  ADD KEY `Estado_Donacion_fk1` (`ID_estado`);

--
-- Indices de la tabla `estudiantes_en_fila`
--
ALTER TABLE `estudiantes_en_fila`
  ADD KEY `Estudiantes_En_Fila_fk0` (`ID_estudiante`),
  ADD KEY `Estudiantes_En_Fila_fk1` (`ID_fila`),
  ADD KEY `Estudiantes_En_Fila_fk2` (`ID_qr`);

--
-- Indices de la tabla `excusa`
--
ALTER TABLE `excusa`
  ADD PRIMARY KEY (`ID_excusa`);

--
-- Indices de la tabla `excusa_dia_almuerzo`
--
ALTER TABLE `excusa_dia_almuerzo`
  ADD PRIMARY KEY (`ID_excusa_dia_almuerzo`),
  ADD KEY `ID_dia` (`ID_dia`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_excusa` (`ID_excusa`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`ID_facultad`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `falla`
--
ALTER TABLE `falla`
  ADD PRIMARY KEY (`ID_falla`);

--
-- Indices de la tabla `falla_dia_almuerzo`
--
ALTER TABLE `falla_dia_almuerzo`
  ADD PRIMARY KEY (`ID_falla_dia_almuerzo`),
  ADD KEY `ID_dia` (`ID_dia`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_falla` (`ID_falla`);

--
-- Indices de la tabla `fila_virtual`
--
ALTER TABLE `fila_virtual`
  ADD PRIMARY KEY (`ID_fila`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_menu`);

--
-- Indices de la tabla `modificaciones_menu`
--
ALTER TABLE `modificaciones_menu`
  ADD KEY `Modificaciones_Menu_fk0` (`ID_administrador`),
  ADD KEY `Modificaciones_Menu_fk1` (`ID_menu`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`ID_programa`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `Programa_fk0` (`ID_facultad`);

--
-- Indices de la tabla `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`ID_qr`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Celular` (`Celular`),
  ADD KEY `Usuario_fk0` (`ID_programa`),
  ADD KEY `Usuario_fk1` (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  MODIFY `ID_almuerzo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `ID_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `ID_donacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donacionpendiente`
--
ALTER TABLE `donacionpendiente`
  MODIFY `ID_donacionPendiente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `ID_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fila_virtual`
--
ALTER TABLE `fila_virtual`
  MODIFY `ID_fila` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `ID_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almuerzos_en_menu`
--
ALTER TABLE `almuerzos_en_menu`
  ADD CONSTRAINT `Almuerzos_En_Menu_fk0` FOREIGN KEY (`ID_menu`) REFERENCES `menu` (`ID_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Almuerzos_En_Menu_fk1` FOREIGN KEY (`ID_almuerzo`) REFERENCES `almuerzo` (`ID_almuerzo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `Calificacion_fk0` FOREIGN KEY (`ID_estudiante`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Calificacion_fk1` FOREIGN KEY (`ID_almuerzo`) REFERENCES `almuerzo` (`ID_almuerzo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dias_almuerzos_estudiante`
--
ALTER TABLE `dias_almuerzos_estudiante`
  ADD CONSTRAINT `Dias_Almuerzos_Estudiantes_fk0` FOREIGN KEY (`ID_dia`) REFERENCES `dia_almuerzo` (`ID_dia`) ON DELETE CASCADE,
  ADD CONSTRAINT `Dias_Almuerzos_Estudiantes_fk1` FOREIGN KEY (`ID_estudiante`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `Donación_fk0` FOREIGN KEY (`ID_donante`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Donación_fk1` FOREIGN KEY (`ID_beneficiario`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Donación_fk2` FOREIGN KEY (`ID_estado`) REFERENCES `estado` (`ID_estado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `donacionpendiente`
--
ALTER TABLE `donacionpendiente`
  ADD CONSTRAINT `DonacionPendiente_fk0` FOREIGN KEY (`ID_donante`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estado_donacion`
--
ALTER TABLE `estado_donacion`
  ADD CONSTRAINT `Estado_Donacion_fk0` FOREIGN KEY (`ID_donacion`) REFERENCES `donacion` (`ID_donacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `Estado_Donacion_fk1` FOREIGN KEY (`ID_estado`) REFERENCES `estado` (`ID_estado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estudiantes_en_fila`
--
ALTER TABLE `estudiantes_en_fila`
  ADD CONSTRAINT `Estudiantes_En_Fila_fk0` FOREIGN KEY (`ID_estudiante`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Estudiantes_En_Fila_fk1` FOREIGN KEY (`ID_fila`) REFERENCES `fila_virtual` (`ID_fila`),
  ADD CONSTRAINT `Estudiantes_En_Fila_fk2` FOREIGN KEY (`ID_qr`) REFERENCES `qr` (`ID_qr`);

--
-- Filtros para la tabla `excusa_dia_almuerzo`
--
ALTER TABLE `excusa_dia_almuerzo`
  ADD CONSTRAINT `excusa_dia_almuerzo_ibfk_1` FOREIGN KEY (`ID_dia`) REFERENCES `dia_almuerzo` (`ID_dia`),
  ADD CONSTRAINT `excusa_dia_almuerzo_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `usuario` (`ID_user`),
  ADD CONSTRAINT `excusa_dia_almuerzo_ibfk_3` FOREIGN KEY (`ID_excusa`) REFERENCES `excusa` (`ID_excusa`);

--
-- Filtros para la tabla `falla_dia_almuerzo`
--
ALTER TABLE `falla_dia_almuerzo`
  ADD CONSTRAINT `falla_dia_almuerzo_ibfk_1` FOREIGN KEY (`ID_dia`) REFERENCES `dia_almuerzo` (`ID_dia`),
  ADD CONSTRAINT `falla_dia_almuerzo_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `usuario` (`ID_user`),
  ADD CONSTRAINT `falla_dia_almuerzo_ibfk_3` FOREIGN KEY (`ID_falla`) REFERENCES `falla` (`ID_falla`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `Menu_fk0` FOREIGN KEY (`ID_menu`) REFERENCES `dia_almuerzo` (`ID_dia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `modificaciones_menu`
--
ALTER TABLE `modificaciones_menu`
  ADD CONSTRAINT `Modificaciones_Menu_fk0` FOREIGN KEY (`ID_administrador`) REFERENCES `usuario` (`ID_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `Modificaciones_Menu_fk1` FOREIGN KEY (`ID_menu`) REFERENCES `menu` (`ID_menu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `Programa_fk0` FOREIGN KEY (`ID_facultad`) REFERENCES `facultad` (`ID_facultad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `Token_fk0` FOREIGN KEY (`ID_user`) REFERENCES `usuario` (`ID_user`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_fk0` FOREIGN KEY (`ID_programa`) REFERENCES `programa` (`ID_programa`) ON DELETE CASCADE,
  ADD CONSTRAINT `Usuario_fk1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
