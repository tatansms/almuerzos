-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2024 a las 00:10:02
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(15, 'Cerdo a la plancha', 'sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue'),
(16, 'Cerdo guisada', 'luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est'),
(17, 'Arroz de pollo', 'turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula'),
(18, 'Arroz trifasico', 'aliquet massa id lobortis convallis tortor risus dapibus augue vel'),
(19, 'Arroz de cerdo', 'donec dapibus duis at velit eu est congue elementum in hac'),
(20, 'Pescado', 'curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzos_en_menu`
--

CREATE TABLE `almuerzos_en_menu` (
  `ID_menu` int(11) NOT NULL,
  `ID_almuerzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(2, 16),
(3, 17),
(3, 18),
(5, 19),
(3, 20),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`ID_calificacion`, `ID_estudiante`, `ID_almuerzo`, `calificacion`, `descripcion`, `fecha_calificacion`) VALUES
(1, 25, 17, 1, 'velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum', '2023-12-08'),
(2, 23, 4, 2, 'pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget', '2023-12-14'),
(3, 17, 14, 0, 'volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed', '2023-12-08'),
(4, 13, 2, 5, 'nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in', '2023-06-21'),
(5, 17, 18, 3, 'donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia', '2023-09-15'),
(6, 33, 1, 1, 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est', '2023-11-21'),
(7, 28, 19, 2, 'ac lobortis vel dapibus at diam nam', '2023-02-13'),
(8, 32, 19, 2, 'augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus', '2023-02-18'),
(9, 25, 19, 4, 'ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet nullam', '2023-07-09'),
(10, 25, 11, 0, 'luctus et ultrices posuere cubilia curae duis', '2023-02-02'),
(11, 19, 14, 0, 'tempus vivamus in felis eu sapien cursus vestibulum proin eu mi', '2023-02-25'),
(12, 32, 6, 1, 'pellentesque volutpat dui maecenas tristique est et', '2023-01-08'),
(13, 19, 8, 4, 'lacinia eget tincidunt eget tempus vel', '2023-02-22'),
(14, 6, 5, 1, 'augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent', '2023-01-26'),
(15, 6, 6, 5, 'porttitor id consequat in consequat', '2023-06-17'),
(16, 24, 4, 2, 'ut mauris eget massa tempor convallis nulla neque libero convallis', '2023-12-20'),
(17, 9, 4, 0, 'amet lobortis sapien sapien non mi integer ac', '2023-02-23'),
(18, 6, 8, 2, 'curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien', '2023-07-18'),
(19, 32, 14, 1, 'turpis elementum ligula vehicula consequat morbi a ipsum integer a', '2023-04-22'),
(20, 25, 6, 4, 'pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit', '2023-03-14'),
(21, 2, 2, 3, '', '2024-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_almuerzos_estudiante`
--

CREATE TABLE `dias_almuerzos_estudiante` (
  `ID_dia` int(11) NOT NULL,
  `ID_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `dias_almuerzos_estudiante`
--

INSERT INTO `dias_almuerzos_estudiante` (`ID_dia`, `ID_estudiante`) VALUES
(3, 1),
(4, 2),
(4, 3),
(5, 4),
(3, 5),
(4, 6),
(2, 7),
(3, 8),
(1, 9),
(4, 10),
(3, 11),
(3, 12),
(1, 13),
(5, 14),
(5, 15),
(2, 16),
(4, 17),
(4, 18),
(3, 19),
(4, 20),
(1, 21),
(5, 22),
(4, 23),
(3, 24),
(1, 25),
(2, 26),
(1, 27),
(2, 28),
(3, 29),
(4, 30),
(5, 31),
(3, 32),
(1, 33),
(5, 1),
(2, 2),
(3, 3),
(2, 4),
(4, 5),
(5, 6),
(3, 7),
(4, 8),
(4, 9),
(5, 10),
(4, 11),
(4, 12),
(2, 13),
(4, 14),
(4, 15),
(3, 16),
(2, 17),
(6, 23),
(6, 30),
(6, 3),
(6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_almuerzo`
--

CREATE TABLE `dia_almuerzo` (
  `ID_dia` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`ID_donacion`, `ID_donante`, `ID_beneficiario`, `fecha`, `hora`, `ID_estado`) VALUES
(1, 12, 1, '2023-05-03', '04:28:12', 3),
(2, 3, 2, '2023-01-13', '02:46:42', 1),
(3, 25, 3, '2023-09-19', '12:25:47', 1),
(4, 7, 4, '2023-11-06', '03:19:37', 3),
(5, 27, 5, '2023-07-16', '21:26:46', 1),
(6, 10, 6, '2023-04-18', '20:03:28', 3),
(7, 14, 7, '2023-07-23', '19:22:29', 3),
(8, 10, 8, '2023-03-30', '19:34:12', 3),
(9, 11, 9, '2023-12-22', '11:44:37', 3),
(10, 5, 10, '2023-05-29', '19:16:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacionpendiente`
--

CREATE TABLE `donacionpendiente` (
  `ID_donacionPendiente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ID_donante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `donacionpendiente`
--

INSERT INTO `donacionpendiente` (`ID_donacionPendiente`, `fecha`, `ID_donante`) VALUES
(1, '2024-05-23', 6),
(2, '2024-05-23', 10),
(3, '2024-05-23', 17),
(4, '2023-11-24', 18),
(5, '2023-11-24', 20),
(6, '2023-11-24', 23),
(7, '2023-11-24', 30),
(8, '2023-11-24', 5),
(9, '2023-11-24', 8),
(10, '2023-11-24', 9),
(11, '2023-11-24', 3),
(17, '2023-11-25', 4),
(18, '2023-11-25', 14),
(19, '2023-11-25', 15),
(20, '2023-11-25', 22),
(21, '2023-11-25', 31),
(22, '2023-11-25', 1),
(23, '2023-11-25', 6),
(24, '2023-11-25', 10),
(25, '2023-11-25', 23),
(26, '2023-11-25', 30),
(41, '2023-08-03', 1),
(42, '2023-09-27', 2),
(43, '2023-10-23', 3),
(44, '2023-06-17', 4),
(45, '2023-06-06', 5),
(46, '2023-11-19', 6),
(47, '2023-08-27', 7),
(48, '2023-10-25', 8),
(49, '2023-08-18', 9),
(50, '2023-06-24', 10),
(51, '2023-10-25', 11),
(52, '2023-10-14', 12),
(53, '2023-09-26', 13),
(54, '2023-07-29', 14),
(55, '2023-11-11', 15),
(56, '2023-09-20', 16),
(57, '2023-08-22', 17),
(58, '2023-08-23', 18),
(59, '2023-09-28', 19),
(60, '2023-06-09', 20),
(61, '2023-07-15', 21),
(62, '2023-09-18', 22),
(63, '2023-06-27', 23),
(64, '2023-09-16', 24),
(65, '2023-09-29', 25),
(66, '2023-10-05', 26),
(67, '2023-08-18', 27),
(68, '2023-10-17', 28),
(69, '2023-10-08', 29),
(70, '2023-10-05', 30),
(71, '2023-07-25', 31),
(72, '2023-10-21', 32),
(73, '2023-11-06', 33),
(74, '2023-08-02', 34),
(75, '2023-10-23', 1),
(76, '2023-08-25', 2),
(77, '2023-09-16', 3),
(78, '2023-11-12', 4),
(79, '2023-09-03', 5),
(80, '2023-09-27', 6),
(81, '2023-11-01', 7),
(82, '2023-08-09', 8),
(83, '2023-06-25', 9),
(84, '2023-08-13', 10),
(85, '2023-10-17', 11),
(86, '2023-11-16', 12),
(87, '2023-10-22', 13),
(88, '2023-09-11', 14),
(89, '2023-11-08', 15),
(90, '2023-07-31', 16),
(91, '2023-10-14', 17),
(92, '2023-08-27', 18),
(93, '2023-06-08', 19),
(94, '2023-07-18', 20),
(95, '2023-09-17', 21),
(96, '2023-11-10', 22),
(97, '2023-10-20', 23),
(98, '2023-06-21', 24),
(99, '2023-09-24', 25),
(100, '2023-08-16', 26),
(101, '2023-08-02', 27),
(102, '2023-08-17', 28),
(103, '2023-10-11', 29),
(104, '2023-07-25', 30),
(105, '2023-09-29', 31),
(106, '2023-09-22', 32),
(107, '2023-08-24', 33),
(108, '2023-09-04', 34),
(109, '2023-06-16', 1),
(110, '2023-09-18', 2),
(111, '2023-07-30', 3),
(112, '2023-09-14', 4),
(113, '2023-06-26', 5),
(114, '2023-09-14', 6),
(115, '2023-11-10', 7),
(116, '2023-10-16', 8),
(117, '2023-07-23', 9),
(118, '2023-06-22', 10),
(119, '2023-09-09', 11),
(120, '2023-07-20', 12),
(121, '2023-09-28', 13),
(122, '2023-11-20', 14),
(123, '2023-11-17', 15),
(124, '2023-08-16', 16),
(125, '2023-06-02', 17),
(126, '2023-07-23', 18),
(127, '2023-09-10', 19),
(128, '2023-11-17', 20),
(129, '2023-10-10', 21),
(130, '2023-11-22', 22),
(131, '2023-06-26', 23),
(132, '2023-09-16', 24),
(133, '2023-07-20', 25),
(134, '2023-07-13', 26),
(135, '2023-10-14', 27),
(136, '2023-11-24', 28),
(137, '2023-10-14', 29),
(138, '2023-11-02', 30),
(139, '2023-06-01', 31),
(140, '2023-10-29', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_estado` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_estado`, `nombre`) VALUES
(1, 'Disponible'),
(2, 'En curso'),
(3, 'Recibido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_donacion`
--

CREATE TABLE `estado_donacion` (
  `ID_donacion` int(11) NOT NULL,
  `ID_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estado_donacion`
--

INSERT INTO `estado_donacion` (`ID_donacion`, `ID_estado`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 3),
(6, 2),
(7, 1),
(8, 1),
(9, 2),
(10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_en_fila`
--

CREATE TABLE `estudiantes_en_fila` (
  `ID_estudiante` int(11) NOT NULL,
  `ID_fila` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estudiantes_en_fila`
--

INSERT INTO `estudiantes_en_fila` (`ID_estudiante`, `ID_fila`, `turno`, `hora_ingreso`) VALUES
(1, 1, 1, '19:58:21'),
(2, 1, 2, '20:00:21'),
(3, 1, 3, '20:01:21'),
(4, 1, 4, '20:02:21'),
(5, 1, 5, '20:03:21'),
(6, 1, 6, '20:04:21'),
(7, 1, 7, '20:05:21'),
(8, 1, 8, '20:06:21'),
(9, 1, 9, '20:07:21'),
(10, 1, 10, '20:08:21'),
(11, 1, 11, '20:09:21'),
(12, 1, 12, '20:10:21'),
(13, 1, 13, '20:11:21'),
(14, 1, 14, '20:12:21'),
(15, 1, 15, '20:13:21'),
(16, 1, 16, '20:14:21'),
(17, 1, 17, '20:15:21'),
(18, 1, 18, '20:16:21'),
(19, 1, 19, '20:17:21'),
(20, 1, 20, '20:18:21'),
(21, 1, 21, '20:19:21'),
(22, 1, 22, '20:20:21'),
(23, 1, 23, '20:21:21'),
(24, 1, 24, '20:22:21'),
(25, 1, 25, '20:23:21'),
(26, 1, 26, '20:24:21'),
(27, 1, 27, '20:25:21'),
(28, 1, 28, '20:26:21'),
(29, 1, 29, '20:27:21'),
(30, 1, 30, '20:28:21'),
(31, 1, 31, '20:29:21'),
(32, 1, 32, '20:30:21'),
(33, 1, 33, '20:31:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `ID_facultad` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Estructura de tabla para la tabla `fila_virtual`
--

CREATE TABLE `fila_virtual` (
  `ID_fila` int(11) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `num_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `fila_virtual`
--

INSERT INTO `fila_virtual` (`ID_fila`, `fecha_realizacion`, `num_personas`) VALUES
(1, '2023-10-12', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `ID_menu` int(11) NOT NULL,
  `ID_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modificaciones_menu`
--

INSERT INTO `modificaciones_menu` (`ID_administrador`, `ID_menu`, `fecha`, `hora`) VALUES
(35, 2, '2023-11-21', '19:53:49'),
(34, 1, '2023-07-29', '19:11:20'),
(35, 5, '2023-07-29', '09:46:58'),
(34, 3, '2023-03-07', '21:55:43'),
(35, 4, '2023-03-26', '19:56:19'),
(34, 2, '2023-05-01', '06:08:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID_programa` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `ID_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `Nombre`) VALUES
(2, 'Administrador'),
(1, 'Estudiante');

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
  `ID_programa` int(11) DEFAULT NULL,
  `ID_rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_user`, `Nombre`, `Apellido`, `Email`, `Contrasena`, `Celular`, `ID_programa`, `ID_rol`) VALUES
(1, 'Judy', 'Stanex', 'jstanex0@vkontakte.ru', 'uT8`r>eTLN\'!WU.', '3062393065', 1, 1),
(2, 'Sharleen', 'Barfford', 'sbarfford1@npr.org', 'cW1=9@XRLf', '3110502728', 2, 1),
(3, 'Jori', 'Halt', 'jhalt2@moonfruit.com', 'zT8{4`KEXFrnhv', '3041988776', 4, 1),
(4, 'Caspar', 'Edleston', 'cedleston3@tripadvisor.com', 'mZ1#V\"Su<~ORrOV', '3057404690', 1, 1),
(5, 'Gay', 'Timmens', 'gtimmens4@craigslist.org', 'aB9>Ft@jgm4', '3067970238', 1, 1),
(6, 'Davidde', 'Fairham', 'dfairham5@cam.ac.uk', 'iM0*+N9KTePsKC', '3183247955', 2, 1),
(7, 'Mattie', 'Readett', 'mreadett6@netvibes.com', 'xB4Z*>H', '3141861957', 4, 1),
(8, 'Ingar', 'Woollons', 'iwoollons7@bluehost.com', 'kM4z?0!\'&', '3200748117', 6, 1),
(9, 'Dynah', 'Kelston', 'dkelston8@google.co.jp', 'uZ1,,n=6Y~7S', '3252793409', 2, 1),
(10, 'Fielding', 'Claesens', 'fclaesens9@marriott.com', 'bV6~PQ9f', '3193023471', 4, 1),
(11, 'Candide', 'Yurshev', 'cyursheva@geocities.com', 'hD4|Yec7hY<', '3134166325', 3, 1),
(12, 'Sam', 'Harrowsmith', 'sharrowsmithb@princeton.edu', 'kS4|SnE{q47r@', '3135057557', 7, 1),
(13, 'Fidelio', 'Lantaff', 'flantaffc@cbc.ca', 'aV2!/l=d`y\'m', '3260954496', 3, 1),
(14, 'Anthe', 'Colbeck', 'acolbeckd@newyorker.com', 'fF0<mFNQNW>', '3090949562', 5, 1),
(15, 'Dunn', 'Paybody', 'dpaybodye@ox.ac.uk', 'aF3?s}KIxJ%QZ', '3205862945', 5, 1),
(16, 'Naoma', 'Kilmister', 'nkilmisterf@clickbank.net', 'wL5|H_9y.', '3268475533', 1, 1),
(17, 'Rich', 'Capron', 'rcaprong@ihg.com', 'sJ0{s{q+', '3269816689', 7, 1),
(18, 'Rosaline', 'Weatherell', 'rweatherellh@usa.gov', 'dD3}B>s', '3136084593', 5, 1),
(19, 'Francis', 'Ruilton', 'fruiltoni@slate.com', 'fK0\'eH4', '3070839715', 8, 1),
(20, 'Tim', 'Mateescu', 'tmateescuj@umn.edu', 'aN8|!0WB2c', '3101301293', 5, 1),
(21, 'Annora', 'Grzesiak', 'agrzesiakk@networksolutions.com', 'bX0.t?9eQpN', '3258902485', 6, 1),
(22, 'Sherman', 'Oldman', 'soldmanl@nationalgeographic.com', 'fK0~\"LaweZt', '3069060119', 4, 1),
(23, 'Ulrika', 'Itshak', 'uitshakm@berkeley.edu', 'rN2=3x0@?Z!S~~', '3175181038', 1, 1),
(24, 'Jordan', 'Bagby', 'jbagbyn@simplemachines.org', 'xE6}s{SR<2m', '3011739998', 8, 1),
(25, 'Sukey', 'Golly', 'sgollyo@cdc.gov', 'aX1}ut_\'%utN8y*', '3116186696', 6, 1),
(26, 'Kaitlynn', 'Bassilashvili', 'kbassilashvilip@trellian.com', 'fO6_6$?|d%y\"Zl|<', '3103187324', 7, 1),
(27, 'Charlie', 'Nibley', 'cnibleyq@technorati.com', 'sG5_>I*=Eemp', '3100329939', 4, 1),
(28, 'Moreen', 'Crumpton', 'mcrumptonr@hud.gov', 'fD4\'~BJd0UWFL', '3115245371', 6, 1),
(29, 'Haley', 'Hanney', 'hhanneys@ebay.com', 'gF8@ceK}z_', '3147291389', 8, 1),
(30, 'Eddy', 'Yuryichev', 'eyuryichevt@digg.com', 'oO1}h*8>KDEV', '3211542866', 1, 1),
(31, 'Alano', 'Gillbee', 'agillbeeu@artisteer.com', 'yV4<*F#', '3238425305', 6, 1),
(32, 'Romonda', 'Greenlies', 'rgreenliesv@ox.ac.uk', 'pO6|t+A%', '3076489393', 1, 1),
(33, 'Kore', 'Adran', 'kadranw@sfgate.com', 'aJ2.\"Xu$nE`+', '3228889576', 3, 1),
(34, 'Grethel', 'Hawkeridge', 'ghawkeridgex@home.pl', 'uZ9~o*m!gvn<x\"t&', '3259716223', 3, 2),
(35, 'Conrade', 'Ruslin', 'e@e.com', '123456', '3179507288', 6, 2);

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
  ADD KEY `Estudiantes_En_Fila_fk1` (`ID_fila`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`ID_facultad`),
  ADD UNIQUE KEY `nombre` (`nombre`);

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
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

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
  MODIFY `ID_almuerzo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `ID_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `ID_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `donacionpendiente`
--
ALTER TABLE `donacionpendiente`
  MODIFY `ID_donacionPendiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `Estudiantes_En_Fila_fk1` FOREIGN KEY (`ID_fila`) REFERENCES `fila_virtual` (`ID_fila`);

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
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_fk0` FOREIGN KEY (`ID_programa`) REFERENCES `programa` (`ID_programa`) ON DELETE CASCADE,
  ADD CONSTRAINT `Usuario_fk1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
