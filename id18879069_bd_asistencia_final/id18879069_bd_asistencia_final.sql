-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-06-2022 a las 03:48:08
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id18879069_bd_asistencia_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumno`
--

CREATE TABLE `tb_alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(50) NOT NULL DEFAULT '',
  `correo` varchar(50) NOT NULL DEFAULT '',
  `idCurso` int(11) NOT NULL,
  `idParalelo` int(11) NOT NULL,
  `jornada` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_alumno`
--

INSERT INTO `tb_alumno` (`idAlumno`, `nombres`, `apellidos`, `cedula`, `edad`, `direccion`, `telefono`, `correo`, `idCurso`, `idParalelo`, `jornada`, `estado`) VALUES
(3, 'Jorge', 'Reyes', '0927977454', 10, 'Daule', '090024001234', 'silvia@gmail.com', 8, 3, 'vespertino', 1),
(4, 'Roberto Alexander', 'Pachay Yepez', '0123456789', 15, 'Los Lojas ', '09784512382', 'rpachayQ@gmail.com', 8, 3, 'vespertino', 1),
(5, 'Silvia ', 'Salas', '0937283331', 32, 'La T', '0926354285', 'silvia@gmail.com', 9, 3, 'vespertino', 1),
(6, 'Nicole Nayeli', 'Alvarado Camba', '0976543265', 75, 'La t', '0954257958', 'Nayeli2006', 9, 1, 'matutino', 1),
(7, 'Nallely Fortuna ', 'Alvarado Ronquillo ', '092578474747', 16, 'Daule', '0954257958', 'Fortunata@gmail.com', 9, 1, 'matutino', 1),
(8, 'Elian Jose', 'Alvarado Loor', '0915721725', 17, 'Las maravillas', '0963637373', 'Elian@gmail.com', 9, 1, 'matutino', 1),
(9, 'Franklin Joel', 'Torres Quinto', '0975443576', 15, 'Las maravillas', '09776435', 'Franjoel@gmail.com', 9, 1, 'matutino', 1),
(10, 'Patricio jose', 'Camba Vargas', '0915721725', 17, 'Piñal de abajo ', '09653685478', 'Ppcv09765@gmail.com', 9, 1, 'matutino', 1),
(11, 'Roberto Alexander ', 'Pachay yepez', '0916728596', 14, 'Los lojas', '09675426854', 'Yespezpachay@gmail.com', 9, 1, 'matutino', 1),
(12, 'Yonela anai', 'Vargas pluas', '0946743681', 17, 'Piñal de abajo ', '0975432578', 'Yonev@gmail.com', 9, 1, 'matutino', 1),
(13, 'Reina Michell', 'Alvarado torres', '09754357479', 18, 'Piñal de abajo ', '097764358', 'Reinamchlltrrs@gmail.com', 9, 1, 'matutino', 1),
(14, 'Kamila Kiara', 'Franco Fiallo', '0957321456', 15, 'Limonal ', '0962627351571', 'Kamifrnco21@gmail.com ', 9, 1, 'matutino', 1),
(15, 'Ruth lilibeth', 'Alvarado Bonilla', '0900076543', 15, 'Limonal ', '09653685478', 'Ruth00679@outlook.com', 9, 1, 'matutino', 1),
(16, 'Samuel Gerardo', 'Delgado Briones ', '0960808725', 15, 'Daule', '0980876025', 'Samudelagd05@gmail.com ', 10, 1, 'matutino', 1),
(17, 'Heidy Anais', 'Camba Vargas', '0964374747', 15, 'Piñal de abajo ', '0965325758', 'Hiedy15@gmail.com ', 10, 1, 'matutino', 1),
(18, 'Brenda azucena', 'Alvarado torres', '09536463646', 14, 'Limonal ', '09776435', 'Brenda@gmail.com', 10, 1, 'matutino', 1),
(19, 'Jorge josue ', 'Alvarado Camba', '0964364747', 15, 'La elvira', '0964278426', 'Jordy@gmail.com', 10, 1, 'matutino', 1),
(20, 'Adrian adolfo', 'Chonillo cortez', '0964353268', 16, 'La t', '097544357', 'Adri@gmail', 10, 1, 'matutino', 1),
(21, 'Betsaida Getsemani', 'Fiallo Camba', '0964848494', 15, 'Piñal de abajo ', '0977743214', 'Betsaida25@gmail.com ', 10, 1, 'matutino', 1),
(22, 'Nayda Alexandra', 'Vasquez peñafiel', '0965478765', 16, 'Piñal de arriba', '09653278643', 'Peñavazquez@gmail.com', 10, 1, 'matutino', 1),
(23, 'Joice pamela ', 'Camba Olvera ', '0954335854', 17, 'La elvira', '09754345357', 'Pameeee@gmail.com ', 10, 1, 'matutino', 1),
(24, 'Keysel adriana', 'Vargas Guaranda', '0964226858', 17, 'Piñal de abajo ', '0975425754', 'Pamadriaana@gmail.com', 10, 1, 'matutino', 1),
(25, 'Daniel elias', 'Gia Fiallo', '0965421895', 15, 'Limonal ', '0964225778', 'Eliasgia@gmail.com ', 10, 1, 'matutino', 1),
(27, 'Melany', 'F Fiallo', '0927977454', 15, 'limonal', '0960808725', 'sildnff@gmail.com', 9, 1, 'matutino', 1),
(28, 'Jorge', 'Guerrero', '0942807462', 22, 'guayaquil', '0960808725', 'jorgegue1999@gmail.com', 8, 1, 'matutino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistencia_alumno`
--

CREATE TABLE `tb_asistencia_alumno` (
  `idAsistenciaAlumno` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_asistencia_alumno`
--

INSERT INTO `tb_asistencia_alumno` (`idAsistenciaAlumno`, `idAlumno`, `fecha`, `hora`, `status`, `estado`) VALUES
(1, 1, '2022-05-03', '04:23:38', 'PRESENTE', 1),
(2, 1, '2022-05-05', '09:50:38', 'PRESENTE', 1),
(3, 2, '2022-05-05', '11:40:58', 'PRESENTE', 1),
(4, 1, '2022-05-06', NULL, NULL, 1),
(5, 2, '2022-05-06', NULL, NULL, 1),
(6, 1, '2022-05-11', '03:10:21', 'PRESENTE', 1),
(7, 2, '2022-05-11', NULL, NULL, 1),
(10, 1, '2022-05-12', '02:06:11', 'PRESENTE', 1),
(11, 2, '2022-05-12', NULL, NULL, 1),
(12, 1, '2022-05-13', '12:45:14', 'PRESENTE', 1),
(13, 2, '2022-05-13', NULL, NULL, 1),
(14, 1, '2022-06-01', '02:09:17', 'PRESENTE', 1),
(15, 2, '2022-06-01', NULL, NULL, 1),
(16, 2, '2022-06-08', NULL, NULL, 1),
(17, 3, '2022-06-08', '03:38:15', 'PRESENTE', 1),
(18, 2, '2022-06-23', '01:13:58', 'PRESENTE', 1),
(19, 3, '2022-06-23', '02:17:05', 'PRESENTE', 1),
(20, 3, '2022-06-24', '10:08:54', 'PRESENTE', 1),
(21, 4, '2022-06-24', '04:33:51', 'PRESENTE', 1),
(22, 5, '2022-06-24', '10:07:31', 'hello', 1),
(23, 6, '2022-06-24', '10:05:33', 'PRESENTE', 1),
(24, 7, '2022-06-24', '04:33:48', 'PRESENTE', 1),
(25, 8, '2022-06-24', '04:33:41', 'PRESENTE', 1),
(26, 3, '2022-06-25', NULL, NULL, 1),
(27, 4, '2022-06-25', NULL, NULL, 1),
(28, 5, '2022-06-25', NULL, NULL, 1),
(29, 6, '2022-06-25', NULL, NULL, 1),
(30, 7, '2022-06-25', NULL, NULL, 1),
(31, 8, '2022-06-25', NULL, NULL, 1),
(32, 9, '2022-06-25', NULL, NULL, 1),
(33, 10, '2022-06-25', NULL, NULL, 1),
(34, 11, '2022-06-25', NULL, NULL, 1),
(35, 12, '2022-06-25', NULL, NULL, 1),
(36, 13, '2022-06-25', NULL, NULL, 1),
(37, 14, '2022-06-25', NULL, NULL, 1),
(38, 15, '2022-06-25', NULL, NULL, 1),
(39, 16, '2022-06-25', NULL, NULL, 1),
(40, 17, '2022-06-25', NULL, NULL, 1),
(41, 18, '2022-06-25', NULL, NULL, 1),
(42, 19, '2022-06-25', NULL, NULL, 1),
(43, 20, '2022-06-25', NULL, NULL, 1),
(44, 21, '2022-06-25', NULL, NULL, 1),
(45, 22, '2022-06-25', NULL, NULL, 1),
(46, 23, '2022-06-25', NULL, NULL, 1),
(47, 24, '2022-06-25', NULL, NULL, 1),
(48, 25, '2022-06-25', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistencia_docente`
--

CREATE TABLE `tb_asistencia_docente` (
  `idAsistenciaDocente` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL DEFAULT 0,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT '00:00:00',
  `status` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_asistencia_docente`
--

INSERT INTO `tb_asistencia_docente` (`idAsistenciaDocente`, `idDocente`, `fecha`, `hora`, `status`, `estado`) VALUES
(1, 1, '2022-05-05', '09:50:11', 'PRESENTE', 1),
(2, 2, '2022-05-05', '09:50:08', 'PRESENTE', 1),
(3, 1, '2022-05-06', NULL, NULL, 1),
(4, 2, '2022-05-06', NULL, NULL, 1),
(5, 3, '2022-05-06', NULL, NULL, 1),
(6, 4, '2022-05-06', NULL, NULL, 1),
(7, 5, '2022-05-06', NULL, NULL, 1),
(8, 6, '2022-05-06', NULL, NULL, 1),
(9, 1, '2022-05-11', '01:39:32', 'PRESENTE', 1),
(10, 2, '2022-05-11', '01:35:37', 'PRESENTE', 1),
(11, 3, '2022-05-11', '01:35:39', 'PRESENTE', 1),
(12, 4, '2022-05-11', '01:35:41', 'PRESENTE', 1),
(13, 5, '2022-05-11', '01:43:15', 'PRESENTE', 1),
(14, 6, '2022-05-11', '01:43:20', 'PRESENTE', 1),
(15, 1, '2022-05-13', NULL, NULL, 1),
(16, 2, '2022-05-13', NULL, NULL, 1),
(17, 3, '2022-05-13', NULL, NULL, 1),
(18, 4, '2022-05-13', NULL, NULL, 1),
(19, 5, '2022-05-13', NULL, NULL, 1),
(20, 6, '2022-05-13', NULL, NULL, 1),
(21, 7, '2022-05-13', NULL, NULL, 1),
(22, 1, '2022-06-01', '02:08:07', 'PRESENTE', 1),
(23, 2, '2022-06-01', '02:08:12', 'PRESENTE', 1),
(24, 3, '2022-06-01', '02:08:16', 'PRESENTE', 1),
(25, 4, '2022-06-01', NULL, NULL, 1),
(26, 5, '2022-06-01', NULL, NULL, 1),
(27, 6, '2022-06-01', NULL, NULL, 1),
(28, 7, '2022-06-01', NULL, NULL, 1),
(29, 1, '2022-06-08', '03:33:56', 'PRESENTE', 1),
(30, 2, '2022-06-08', '03:34:03', 'PRESENTE', 1),
(31, 3, '2022-06-08', '03:34:14', 'PRESENTE', 1),
(32, 4, '2022-06-08', NULL, NULL, 1),
(33, 6, '2022-06-08', NULL, NULL, 1),
(34, 7, '2022-06-08', NULL, NULL, 1),
(35, 8, '2022-06-08', NULL, NULL, 1),
(36, 1, '2022-06-23', '12:42:17', 'PRESENTE', 1),
(37, 2, '2022-06-23', '01:08:47', 'PRESENTE', 1),
(38, 3, '2022-06-23', '02:05:30', 'PRESENTE', 1),
(39, 4, '2022-06-23', '02:05:38', 'PRESENTE', 1),
(40, 6, '2022-06-23', '02:05:44', 'PRESENTE', 1),
(41, 7, '2022-06-23', '02:48:00', 'PRESENTE', 1),
(42, 8, '2022-06-23', NULL, NULL, 1),
(43, 1, '2022-06-25', NULL, NULL, 1),
(44, 2, '2022-06-25', NULL, NULL, 1),
(45, 3, '2022-06-25', NULL, NULL, 1),
(46, 4, '2022-06-25', NULL, NULL, 1),
(47, 6, '2022-06-25', NULL, NULL, 1),
(48, 7, '2022-06-25', NULL, NULL, 1),
(49, 8, '2022-06-25', NULL, NULL, 1),
(50, 9, '2022-06-25', NULL, NULL, 1),
(51, 10, '2022-06-25', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_curso`
--

CREATE TABLE `tb_curso` (
  `idCurso` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_curso`
--

INSERT INTO `tb_curso` (`idCurso`, `descripcion`, `estado`) VALUES
(1, 'INICIAL 2', 1),
(2, 'PRIMERO', 1),
(4, 'TERCERO', 1),
(5, 'CUARTO', 1),
(6, 'QUINTO', 1),
(7, 'SEXTO', 1),
(8, 'SEPTIMO', 1),
(9, 'PRIMERO BACHILLERATO CIENCIAS', 1),
(10, 'PRIMERO BACHILLERATO CONTABILIDAD', 1),
(11, 'SEGUNDO BACHILLERATO CIENCIAS', 1),
(12, 'SEGUNDO BACHILLERATO CONTABILIDAD ', 1),
(13, 'SEGUNDO BACHILLERATO CONTABILIDAD ', 1),
(14, 'TERCERO BACHILLERATO CIENCIAS ', 1),
(15, 'TERCERO BACHILLERATO CONTABILIDAD ', 1),
(16, 'INCIAL 1', 1),
(17, 'OCTAVO', 1),
(18, 'NOVENO', 1),
(19, 'DECIMO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_docente`
--

CREATE TABLE `tb_docente` (
  `idDocente` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idParalelo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_docente`
--

INSERT INTO `tb_docente` (`idDocente`, `nombres`, `apellidos`, `correo`, `cedula`, `idCurso`, `idParalelo`, `estado`) VALUES
(1, 'Leonardo', 'Salas', 'merino@gmail.com', '0937283331', 1, 1, 1),
(2, 'Maria ', 'Zambrano Peñafiel', 'mariazp012@gmail.com', '0937283331', 1, 1, 1),
(3, 'Jaime', 'duque', 'jamduq2735@gmail.com', '0963653627', 4, 3, 1),
(4, 'Silvia ', 'Salas Bajaña', 'silvia@gmail.com', '09253698124', 8, 2, 1),
(6, 'Melany', 'Franco Fiallo', 'melany@gmail.com', '09235367829', 5, 1, 1),
(7, 'Ariana', 'Bajaña', 'melany@gmail.com', '0937283331', 2, 1, 1),
(8, 'Melany', 'Fiallo', 'silvia@gmail.com', '0927977454', 8, 3, 1),
(9, 'Roberto', 'Pachay', 'pachay@gmail.com', '0937283331', 4, 2, 1),
(10, 'Glenda', 'Coloma', 'glendclm@gmail.com', '00000000000', 8, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paralelo`
--

CREATE TABLE `tb_paralelo` (
  `idParalelo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_paralelo`
--

INSERT INTO `tb_paralelo` (`idParalelo`, `descripcion`, `estado`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuario`
--

CREATE TABLE `tb_tipo_usuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tipo_usuario`
--

INSERT INTO `tb_tipo_usuario` (`idTipoUsuario`, `descripcion`, `estado`) VALUES
(1, 'administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `nombre`, `apellido`, `correo`, `password`, `idTipoUsuario`, `estado`) VALUES
(2, 'Silvia', 'Salas', 'silvia@gmail.com', '12345', 1, 1),
(4, 'Rita', 'Camba Alvarado', 'rca011@gmail.com', '4567', 1, 1),
(6, 'Clarita', 'Bajaña', 'silvia@gmail.com', '1234567', 1, 1),
(7, 'Melany', 'Franco FIllo', 'melany@gmail.com', 'mmfff', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_alumno`
--
ALTER TABLE `tb_alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `tb_asistencia_alumno`
--
ALTER TABLE `tb_asistencia_alumno`
  ADD PRIMARY KEY (`idAsistenciaAlumno`);

--
-- Indices de la tabla `tb_asistencia_docente`
--
ALTER TABLE `tb_asistencia_docente`
  ADD PRIMARY KEY (`idAsistenciaDocente`);

--
-- Indices de la tabla `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `tb_paralelo`
--
ALTER TABLE `tb_paralelo`
  ADD PRIMARY KEY (`idParalelo`);

--
-- Indices de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_alumno`
--
ALTER TABLE `tb_alumno`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tb_asistencia_alumno`
--
ALTER TABLE `tb_asistencia_alumno`
  MODIFY `idAsistenciaAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tb_asistencia_docente`
--
ALTER TABLE `tb_asistencia_docente`
  MODIFY `idAsistenciaDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_docente`
--
ALTER TABLE `tb_docente`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_paralelo`
--
ALTER TABLE `tb_paralelo`
  MODIFY `idParalelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
