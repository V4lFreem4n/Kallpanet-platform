-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2023 a las 09:51:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kallpanet_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` varchar(20) NOT NULL,
  `nombre_actividad` varchar(50) NOT NULL,
  `fecha_activacion` date NOT NULL,
  `hora_activacion` time(6) NOT NULL,
  `fecha_cierre` date NOT NULL,
  `hora_cierre` time(6) NOT NULL,
  `ruta_archivo` varchar(60) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_silabo_actividad` varchar(20) NOT NULL,
  `id_tema` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre_actividad`, `fecha_activacion`, `hora_activacion`, `fecha_cierre`, `hora_cierre`, `ruta_archivo`, `descripcion`, `id_silabo_actividad`, `id_tema`) VALUES
('1', 'PC1', '2023-07-12', '00:00:15.000000', '0000-00-00', '00:00:15.000000', 'ruta', 'ASDAD', '1', '1'),
('3', 'PC3', '2023-06-14', '00:00:15.000000', '0000-00-00', '00:00:15.000000', 'ruta', 'ASDASDAD', '3', '1'),
('4', 'PC1', '2023-07-12', '10:16:15.000000', '0000-00-00', '00:00:15.000000', 'ruta', 'Suban!!', '4', '2'),
('5', 'PC2', '2023-08-17', '13:16:15.000000', '0000-00-00', '18:18:15.000000', 'ruta', 'Suban!!', '5', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_subidas_alumnos`
--

CREATE TABLE `actividades_subidas_alumnos` (
  `id_actividades_subidas_alumnos` int(20) NOT NULL,
  `orden_actividad_pertenencia` varchar(20) NOT NULL,
  `ruta_archivo` varchar(60) DEFAULT NULL,
  `nota` varchar(20) DEFAULT NULL,
  `procesado` varchar(20) DEFAULT NULL,
  `dni_alumno` varchar(20) NOT NULL,
  `id_actividad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades_subidas_alumnos`
--

INSERT INTO `actividades_subidas_alumnos` (`id_actividades_subidas_alumnos`, `orden_actividad_pertenencia`, `ruta_archivo`, `nota`, `procesado`, `dni_alumno`, `id_actividad`) VALUES
(1, '0', 'ruta', '20', 'si', '12345670', '1'),
(2, '2', 'ruta', '10', 'si', '12345670', '3'),
(3, '0', 'ruta', '14', 'si', '12345679', '4'),
(4, '1', 'ruta', '5', 'si', '12345679', '5'),
(5, '0', 'ruta', '17', 'si', '89012345', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `dni_administrador` varchar(20) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `cod_institucion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dni_administrador`, `nombre`, `apellido`, `usuario`, `contrasena`, `cod_institucion`) VALUES
('12345678', 'Sofia Valentina ', 'Castro Soto', 'user1', 'pass123', 'INST001'),
('74589631', 'Sebastian Andres ', 'Ramirez Rojas', 'coolcat45', 'catlosr21', 'INST001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni_alumno` varchar(20) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `cod_seccion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni_alumno`, `nombre`, `apellido`, `usuario`, `contrasena`, `cod_seccion`) VALUES
('1234567', 'Ethan', 'Lee', 'ethlee', '987654321\r', 1),
('12345670', 'Mia ', 'Roberts', 'miaroberts', 'qwertyuiop\r', 1),
('12345678', 'John', 'Doe', 'johndoe', 'password123\r', 8),
('12345679', 'Sophia', 'Thompson', 'sophiathomp', 'mysecret\r', 8),
('1234568', 'Mason', 'Young', 'masonyoun', 'hello123\r', 1),
('12458904', 'Aldair', 'Crisanto', 'aldaircrisant', 'secretpass', 1),
('23456780', 'James', 'Harris', 'jamesharr', 'ilovecoding\r', 1),
('23456781', 'Ethan', 'White', 'ethanwhit', 'letmein123\r', 1),
('23456789', 'Jane', 'Smith', 'janessmith', 'secret456\r', 1),
('34567890', 'Alice', 'Johnson', 'alicejohnson', 'mypassword\r', 1),
('34567891', 'Lily', 'Robinson', 'lilyrobin', '1q2w3e4r\r', 8),
('34567892', 'Ava', 'Johnson', 'avajohnson', 'secretword\r', 1),
('45678901', 'Bob', 'Brown', 'bobbrown', '123abc\r', 1),
('45678902', 'Noah', 'Hall', 'noahhall', 'p@ssw0rd\r', 1),
('45678903', 'Jacob', 'Hall', 'jacobhall', 'abc123\r', 1),
('56789012', 'Sarah', 'Davis', 'sarahdavis', 'letmein987\r', 1),
('56789013', 'Ava', 'Clark', 'avaclark', 'letmein\r', 1),
('56789014', 'Sophia', 'Turner', 'sophiaturner', 'password1\r', 1),
('67890120', 'Mateo', 'Mendoza', 'mateomendz', '123456\r', 1),
('67890123', 'Michael', 'Wilson', 'michaelwil', 'abcdefg\r', 8),
('67890124', 'Ethan ', 'Turner', 'ethanturner', '12345\r', 1),
('78901234', 'Emily', 'Taylor', 'emilytay', 'qwerty123\r', 8),
('78901235', 'Chloe', 'Scott', 'chloscott', 'password321\r', 0),
('78901261', 'Jose', 'Rivera', 'joserivera', 'hallo124\r', 1),
('89012345', 'David', 'Anderson', 'davand', 'pass321\r', 8),
('89012346', 'Liam', 'Phillips', 'liamphilli', 'mypass123\r', 0),
('89101030', 'Cristhian', 'Merino', 'cristhianmer', 'mypass125\r', 8),
('90123456', 'Olivia', 'Miller', 'olimill', 'securepwd\r', 8),
('90123457', 'Emma', 'King', 'emmking', '987654abc\r', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(20) NOT NULL,
  `nombre_asistencia` varchar(40) DEFAULT NULL,
  `id_sesion` int(20) NOT NULL,
  `dni_alumno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cod_curso` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `area` varchar(30) DEFAULT NULL,
  `dni_profesor` varchar(20) NOT NULL,
  `cod_seccion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `nombre`, `area`, `dni_profesor`, `cod_seccion`) VALUES
('0', 'Raz. Matemático', '', '23232323', 0),
('1', 'Algebra', '', '23232323', 1),
('3', 'Geografia', '', '12345678', 1),
('4', 'Logica', '', '88009087', 7),
('5', 'Ciencia y Tecnología', '', '95552112', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `cod_grado` int(20) NOT NULL,
  `nombre_grado` varchar(30) NOT NULL,
  `cod_institucion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`cod_grado`, `nombre_grado`, `cod_institucion`) VALUES
(1, '1er Grado secundaria', 'INST001'),
(2, '2do Grado secundaria', 'INST001'),
(6, '6to grado', 'INST001'),
(7, '4to grado', 'INST001'),
(8, '3ro Grado de Primaria', 'INST001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `elementos_agregados` varchar(20) DEFAULT NULL,
  `elementos_eliminados` varchar(20) DEFAULT NULL,
  `dni_administrador` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `fecha`, `hora`, `accion`, `elementos_agregados`, `elementos_eliminados`, `dni_administrador`) VALUES
(2, '2023-07-10', '20:41:23.000000', 'AGREGAR - GRADOS', '6to grado', 'NA', '12345678'),
(5, '2023-07-15', '04:54:37.000000', 'AGREGAR - GRADOS', '1er Grado primaria', 'NA', '12345678'),
(7, '2023-07-15', '05:03:10.000000', 'ELIMINAR - GRADOS', 'NA', '5to Grado', '12345678'),
(8, '2023-07-15', '05:07:29.000000', 'ELIMINAR - GRADOS', 'NA', '1er Grado primaria', '12345678'),
(9, '2023-07-15', '06:16:26.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION A', '12345678'),
(10, '2023-07-14', '23:19:13.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION C', '12345678'),
(11, '2023-07-14', '23:25:02.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION C-', '12345678'),
(12, '2023-07-14', '23:26:45.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION D-', '12345678'),
(13, '2023-07-14', '23:28:10.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION B-', '12345678'),
(14, '2023-07-14', '23:32:52.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION B-1er Grado ', '12345678'),
(15, '2023-07-14', '23:33:21.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION D-1er Grado ', '12345678'),
(16, '2023-07-14', '23:34:22.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION D-2do Grado ', '12345678'),
(17, '2023-07-14', '23:44:52.000000', 'ELIMINAR - SECCIÓN', 'NA', 'SECCION C-1er Grado ', '12345678'),
(18, '2023-07-14', '23:44:59.000000', 'AGREGAR - SECCIÓN', '-2do Grado secundari', 'NA', '12345678'),
(19, '2023-07-15', '11:41:51.000000', 'AGREGAR - CURSO', 'Gramatica-[object HT', 'NA', '12345678'),
(20, '2023-07-15', '14:56:58.000000', 'AGREGAR - CURSO', 'Geografia-[object HT', 'NA', '12345678'),
(21, '2023-07-15', '15:06:24.000000', 'ELIMINAR - CURSO', 'NA', 'Gramatica-SECCION-2d', '12345678'),
(23, '2023-07-15', '16:20:29.000000', 'ELIMINAR - PROFESOR', 'NA', '88007890', '12345678'),
(24, '2023-07-15', '16:21:13.000000', 'AGREGAR - PROFESOR', '32321123', 'NA', '12345678'),
(25, '2023-07-16', '17:41:06.000000', 'ELIMINAR - PROFESOR', 'NA', '88004321', '12345678'),
(26, '2023-07-18', '21:24:32.000000', 'AGREGAR - GRADOS', '', 'NA', '12345678'),
(27, '2023-07-18', '21:25:28.000000', 'ELIMINAR - GRADOS', 'NA', '', '12345678'),
(28, '2023-07-18', '21:25:37.000000', 'AGREGAR - GRADOS', '4to grado', 'NA', '12345678'),
(29, '2023-07-18', '21:26:59.000000', 'AGREGAR - CURSO', 'Logica-[object HTMLS', 'NA', '12345678'),
(30, '2023-07-18', '21:28:36.000000', 'ELIMINAR - SECCIÓN', '29', '', '12345678'),
(31, '2023-07-18', '21:28:39.000000', 'ELIMINAR - SECCIÓN', 'NA', '45678901', '12345678'),
(32, '2023-07-18', '21:28:41.000000', 'ELIMINAR - SECCIÓN', 'NA', '12345670', '12345678'),
(33, '2023-07-18', '21:28:42.000000', 'ELIMINAR - SECCIÓN', 'NA', '34567892', '12345678'),
(34, '2023-07-18', '21:28:43.000000', 'ELIMINAR - SECCIÓN', 'NA', '12345678', '12345678'),
(35, '2023-07-18', '21:28:43.000000', 'ELIMINAR - SECCIÓN', 'NA', '12345679', '12345678'),
(36, '2023-07-18', '21:28:44.000000', 'ELIMINAR - SECCIÓN', 'NA', '1234568', '12345678'),
(37, '2023-07-18', '21:28:44.000000', 'ELIMINAR - SECCIÓN', 'NA', '12458904', '12345678'),
(38, '2023-07-18', '21:28:45.000000', 'ELIMINAR - SECCIÓN', 'NA', '23456780', '12345678'),
(39, '2023-07-18', '21:28:45.000000', 'ELIMINAR - SECCIÓN', 'NA', '23456780', '12345678'),
(40, '2023-07-18', '21:28:45.000000', 'ELIMINAR - SECCIÓN', 'NA', '23456781', '12345678'),
(41, '2023-07-18', '21:28:46.000000', 'ELIMINAR - SECCIÓN', 'NA', '23456789', '12345678'),
(42, '2023-07-18', '21:28:46.000000', 'ELIMINAR - SECCIÓN', 'NA', '34567890', '12345678'),
(43, '2023-07-18', '21:28:47.000000', 'ELIMINAR - SECCIÓN', 'NA', '34567891', '12345678'),
(44, '2023-07-18', '21:28:47.000000', 'ELIMINAR - SECCIÓN', 'NA', '45678902', '12345678'),
(45, '2023-07-18', '21:28:48.000000', 'ELIMINAR - SECCIÓN', 'NA', '45678903', '12345678'),
(46, '2023-07-18', '21:28:48.000000', 'ELIMINAR - SECCIÓN', 'NA', '56789012', '12345678'),
(47, '2023-07-18', '21:28:48.000000', 'ELIMINAR - SECCIÓN', 'NA', '56789012', '12345678'),
(48, '2023-07-18', '21:28:49.000000', 'ELIMINAR - SECCIÓN', 'NA', '56789013', '12345678'),
(49, '2023-07-18', '21:28:49.000000', 'ELIMINAR - SECCIÓN', 'NA', '56789014', '12345678'),
(50, '2023-07-18', '21:28:50.000000', 'ELIMINAR - SECCIÓN', 'NA', '67890120', '12345678'),
(51, '2023-07-18', '21:28:52.000000', 'ELIMINAR - SECCIÓN', 'NA', '78901261', '12345678'),
(52, '2023-07-18', '21:28:53.000000', 'ELIMINAR - SECCIÓN', 'NA', '1234567', '12345678'),
(53, '2023-07-18', '21:28:54.000000', 'ELIMINAR - SECCIÓN', 'NA', '67890124', '12345678'),
(54, '2023-07-18', '21:29:16.000000', 'ELIMINAR - SECCIÓN', '29', '', '12345678'),
(55, '2023-07-18', '22:23:58.000000', 'AGREGAR - GRADOS', '3ro Grado de Primari', 'NA', '12345678'),
(56, '2023-07-18', '22:24:17.000000', 'AGREGAR - SECCIÓN', '-3ro Grado de Primar', 'NA', '12345678'),
(57, '2023-07-18', '22:25:25.000000', 'AGREGAR - PROFESOR', '95552112', 'NA', '12345678'),
(58, '2023-07-18', '22:26:26.000000', 'AGREGAR - CURSO', 'Ciencia y Tecnología', 'NA', '12345678'),
(59, '2023-07-18', '22:26:42.000000', 'ELIMINAR - SECCIÓN', 'NA', '78901234', '12345678'),
(60, '2023-07-18', '22:26:42.000000', 'ELIMINAR - SECCIÓN', 'NA', '67890123', '12345678'),
(61, '2023-07-18', '22:26:43.000000', 'ELIMINAR - SECCIÓN', 'NA', '89012345', '12345678'),
(62, '2023-07-18', '22:26:43.000000', 'ELIMINAR - SECCIÓN', 'NA', '89101030', '12345678'),
(63, '2023-07-18', '22:26:44.000000', 'ELIMINAR - SECCIÓN', 'NA', '12345679', '12345678'),
(64, '2023-07-18', '22:26:44.000000', 'ELIMINAR - SECCIÓN', 'NA', '12345678', '12345678'),
(65, '2023-07-18', '22:26:45.000000', 'ELIMINAR - SECCIÓN', 'NA', '90123456', '12345678'),
(66, '2023-07-18', '22:26:49.000000', 'ELIMINAR - SECCIÓN', 'NA', '34567891', '12345678'),
(67, '2023-07-18', '22:27:14.000000', 'ELIMINAR - SECCIÓN', '29', '', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `cod_institucion` varchar(30) NOT NULL,
  `cod_modular` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tipo_ie` varchar(50) NOT NULL,
  `dre` varchar(50) NOT NULL,
  `resolucion` varchar(50) NOT NULL,
  `anexo` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) NOT NULL,
  `ugel` varchar(50) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `centro_poblado` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`cod_institucion`, `cod_modular`, `nombre`, `departamento`, `direccion`, `tipo_ie`, `dre`, `resolucion`, `anexo`, `provincia`, `ugel`, `distrito`, `centro_poblado`, `director`) VALUES
('INST001', 'MOD001', 'Colegio San Pedro', ' Lima', 'Av. Principal 123', 'Público', 'DRE Lima', 'RES-001', 'A', 'Lima', 'UGEL1', 'Miraflores', 'Miraflores', 'Juan Pérez'),
('INST002', 'MOD002', 'Colegio Santa Rosa', 'Arequipa', 'Calle Principal 45', 'Privado', 'DRE Arequipa', 'RES-002', 'B', 'Arequipa  ', 'UGEL2', 'Yanahuara', 'Cayma', 'Ana López'),
('INST003', 'MOD003', 'I.E. Manuel González', 'Cusco', 'Av. Central 789', 'Público', 'DRE Cusco', 'RES-003', NULL, 'Cusco', 'UGEL3', 'San Sebastian', 'Los Girasoles', 'Carlos Vargas'),
('INST004', 'MOD004', 'Colegio San Juan', 'Lima', 'Jr. Principal 321', 'Privado', 'DRE Lima', 'RES-004', 'B', 'Lima', 'UGEL4', 'San Borja', 'Gallito de las Rocas', 'Laura Gómez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `dni_profesor` varchar(20) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`dni_profesor`, `nombre`, `apellido`, `usuario`, `contrasena`) VALUES
('12345678', 'Victor', 'Purizaca', 'victor123', 'victor321'),
('23232323', 'Freddie', 'Marquez', 'fredi123', 'fredi321'),
('32321123', 'Alejandro', 'Lopez', 'ale123', 'ale321'),
('88001234', 'Juan', 'Perez', 'juanperez', 'ABC123'),
('88004567', 'Laura', 'Mendoza', 'lauramendoza', 'DEF123'),
('88005678', 'Pedro', 'García', 'pedrogarcia', 'DEF456'),
('88009087', 'Gabriel', 'Vega', 'gabrielvega', 'ABC456'),
('88009876', 'Carlos', 'Martínez', 'carlosmartinez', 'QWE789'),
('95552112', 'Cesar', 'Chuquillanqui', 'cesar123', 'cesar321'),
('95655454', 'Luis Alonso', 'Cordova P', 'luis123', 'luis321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `cod_seccion` int(20) NOT NULL,
  `nombre_seccion` varchar(30) NOT NULL,
  `cod_grado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`cod_seccion`, `nombre_seccion`, `cod_grado`) VALUES
(0, 'SECCION A', 1),
(1, 'SECCION B', 1),
(3, 'SECCION A', 2),
(5, 'SECCION D', 6),
(6, 'SECCION A', 6),
(7, 'SECCION C', 2),
(8, 'SECCION A', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(20) NOT NULL,
  `nombre_sesion` varchar(60) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `cod_curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `nombre_sesion`, `fecha`, `cod_curso`) VALUES
(3, 'SESION 1', '2023-07-19', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silabo_actividad`
--

CREATE TABLE `silabo_actividad` (
  `id_silabo_actividad` varchar(20) NOT NULL,
  `orden_silabo_curso` varchar(20) NOT NULL,
  `nombre_actividad` varchar(50) NOT NULL,
  `peso` float NOT NULL,
  `estado_uso` varchar(20) NOT NULL,
  `cod_curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `silabo_actividad`
--

INSERT INTO `silabo_actividad` (`id_silabo_actividad`, `orden_silabo_curso`, `nombre_actividad`, `peso`, `estado_uso`, `cod_curso`) VALUES
('1', '0', 'PC1', 6, 'si', '3'),
('2', '1', 'PC2', 10, 'no', '3'),
('3', '2', 'PC3', 12, 'si', '3'),
('4', '0', 'PC1', 10, 'si', '5'),
('5', '1', 'PC2', 7, 'si', '5'),
('6', '2', 'PC3', 3, 'no', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtema`
--

CREATE TABLE `subtema` (
  `id_subtema` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `ruta` varchar(50) NOT NULL,
  `id_tema` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subtema`
--

INSERT INTO `subtema` (`id_subtema`, `nombre`, `fecha`, `hora`, `ruta`, `id_tema`) VALUES
('1', 'subtema 1', '2023-07-19', '04:33:45.000000', 'archivos/subtema/1_ojo-abierto.png', '1'),
('2', 'SUBTEMA 1', '2023-07-19', '05:28:55.000000', 'archivos/subtema/2_Actividad.docx', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `super_administrador`
--

CREATE TABLE `super_administrador` (
  `cod_super_administrador` int(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `super_administrador`
--

INSERT INTO `super_administrador` (`cod_super_administrador`, `usuario`, `contrasena`) VALUES
(1, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `cod_curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `nombre`, `fecha`, `hora`, `cod_curso`) VALUES
('1', 'tema 1', '2023-07-19', '04:33:25.000000', '3'),
('2', 'TEMA 01', '2023-07-19', '05:28:31.000000', '5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_silabo_actividad` (`id_silabo_actividad`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `actividades_subidas_alumnos`
--
ALTER TABLE `actividades_subidas_alumnos`
  ADD PRIMARY KEY (`id_actividades_subidas_alumnos`),
  ADD KEY `dni_alumno` (`dni_alumno`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dni_administrador`),
  ADD KEY `cod_institucion` (`cod_institucion`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni_alumno`),
  ADD KEY `cod_seccion` (`cod_seccion`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `dni_alumno` (`dni_alumno`),
  ADD KEY `id_sesion` (`id_sesion`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`),
  ADD KEY `dni_profesor` (`dni_profesor`),
  ADD KEY `cod_seccion` (`cod_seccion`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`cod_grado`),
  ADD KEY `cod_institucion` (`cod_institucion`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `dni_administrador` (`dni_administrador`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`cod_institucion`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`dni_profesor`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`cod_seccion`),
  ADD KEY `cod_grado` (`cod_grado`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Indices de la tabla `silabo_actividad`
--
ALTER TABLE `silabo_actividad`
  ADD PRIMARY KEY (`id_silabo_actividad`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Indices de la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD PRIMARY KEY (`id_subtema`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `super_administrador`
--
ALTER TABLE `super_administrador`
  ADD PRIMARY KEY (`cod_super_administrador`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `cod_grado` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `super_administrador`
--
ALTER TABLE `super_administrador`
  MODIFY `cod_super_administrador` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`id_silabo_actividad`) REFERENCES `silabo_actividad` (`id_silabo_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividades_subidas_alumnos`
--
ALTER TABLE `actividades_subidas_alumnos`
  ADD CONSTRAINT `actividades_subidas_alumnos_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_subidas_alumnos_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`cod_institucion`) REFERENCES `instituciones` (`cod_institucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `cod_seccion_alumnos_fk1` FOREIGN KEY (`cod_seccion`) REFERENCES `secciones` (`cod_seccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesiones_fk2` FOREIGN KEY (`id_sesion`) REFERENCES `sesiones` (`id_sesion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cod_seccion_cursos_fk1` FOREIGN KEY (`cod_seccion`) REFERENCES `secciones` (`cod_seccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`dni_profesor`) REFERENCES `profesor` (`dni_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`cod_institucion`) REFERENCES `instituciones` (`cod_institucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`dni_administrador`) REFERENCES `administrador` (`dni_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `cod_grado_seccion_fk1` FOREIGN KEY (`cod_grado`) REFERENCES `grados` (`cod_grado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `silabo_actividad`
--
ALTER TABLE `silabo_actividad`
  ADD CONSTRAINT `silabo_actividad_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD CONSTRAINT `subtema_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
