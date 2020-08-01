-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2020 a las 06:04:12
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viveamazonas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_comite`
--

CREATE TABLE `asignacion_comite` (
  `ID_Trabajador` int(11) NOT NULL,
  `ID_Comite` int(11) NOT NULL,
  `codigo_concurso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacion_comite`
--

INSERT INTO `asignacion_comite` (`ID_Trabajador`, `ID_Comite`, `codigo_concurso`) VALUES
(12345678, 2, 'CON-01'),
(68439751, 2, 'CON-01'),
(76439144, 2, 'CON-01'),
(76684375, 2, 'CON-01'),
(76984225, 1, 'CON-01'),
(79964321, 1, 'CON-01'),
(87654321, 1, 'CON-01'),
(87656789, 1, 'CON-01'),
(89456123, 2, 'CON-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_financiera`
--

CREATE TABLE `asignacion_financiera` (
  `codigo_concurso` varchar(20) NOT NULL,
  `cod_ent_financiera` varchar(20) NOT NULL,
  `monto_entidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_criterios`
--

CREATE TABLE `calificacion_criterios` (
  `cod_criterio` varchar(50) NOT NULL,
  `cod_postulacion` varchar(50) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `ID_Trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion_criterios`
--

INSERT INTO `calificacion_criterios` (`cod_criterio`, `cod_postulacion`, `calificacion`, `comentario`, `ID_Trabajador`) VALUES
('1', 'CON-01-1', 2, 'todo correcto', 76984225),
('10', 'CON-01-1', 3, 'todo correcto', 12345678),
('11', 'CON-01-1', 3, 'todo correcto', 68439751),
('12', 'CON-01-1', 3, 'todo correcto', 76439144),
('13', 'CON-01-1', 3, 'todo correcto', 76684375),
('14', 'CON-01-1', 0, '', 76819482),
('2', 'CON-01-1', 2, 'todo correcto', 79964321),
('3', 'CON-01-1', 2, 'todo correcto', 87654321),
('4', 'CON-01-1', 2, 'todo correcto', 87656789),
('5', 'CON-01-1', 2, 'todo correcto', 76984225),
('6', 'CON-01-1', 2, 'todo correcto', 79964321),
('7', 'CON-01-1', 2, 'todo correcto', 87654321),
('8', 'CON-01-1', 2, 'todo correcto', 87656789),
('9', 'CON-01-1', 3, 'todo correcto', 89456123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concursos`
--

CREATE TABLE `concursos` (
  `cod_concurso` varchar(20) NOT NULL,
  `nombre_concurso` varchar(30) NOT NULL,
  `fecha_postulacion_inicio` date NOT NULL,
  `fecha_postulacion_fin` date NOT NULL,
  `bases_concurso` varchar(30) NOT NULL,
  `anuncio_concurso` varchar(30) NOT NULL,
  `tipo_monto` int(11) NOT NULL,
  `cod_ganador` int(11) NOT NULL,
  `informe_CTI` varchar(50) NOT NULL,
  `comunicado_DE` varchar(50) NOT NULL,
  `ID_Trabajador` int(11) NOT NULL,
  `etapa_concurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `concursos`
--

INSERT INTO `concursos` (`cod_concurso`, `nombre_concurso`, `fecha_postulacion_inicio`, `fecha_postulacion_fin`, `bases_concurso`, `anuncio_concurso`, `tipo_monto`, `cod_ganador`, `informe_CTI`, `comunicado_DE`, `ID_Trabajador`, `etapa_concurso`) VALUES
('CON-02', 'Revive tu selva', '2020-07-02', '2020-07-24', 'por entregar', 'por entregar', 2, 0, 'por entregar', 'por entregar', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `cod_consulta` varchar(50) NOT NULL,
  `cod_usuario` varchar(50) NOT NULL,
  `id_trabajador` varchar(50) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `estado_consulta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterios_eva`
--

CREATE TABLE `criterios_eva` (
  `codigo_criterio` int(50) NOT NULL,
  `num_etapa` int(11) NOT NULL,
  `criterios_etapa` varchar(100) NOT NULL,
  `plantilla_invitacion` varchar(50) NOT NULL,
  `plantilla_nego` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `criterios_eva`
--

INSERT INTO `criterios_eva` (`codigo_criterio`, `num_etapa`, `criterios_etapa`, `plantilla_invitacion`, `plantilla_nego`) VALUES
(1, 1, 'Revisión de expedientes completos', '', ''),
(2, 2, 'Experiencia en la temática de la convocatoria', '', ''),
(3, 2, 'Inscripción en Registros Públicos', '', ''),
(4, 2, 'Representante en registros públicos', '', ''),
(5, 2, 'Aprobación de representante', '', ''),
(6, 2, 'Filtro deudor de la SBS', '', ''),
(7, 2, 'Estándares fiduciarios', '', ''),
(8, 2, 'Políticas ambientales, sociales y de género', '', ''),
(9, 3, 'Gestion de proyectos ', '', ''),
(10, 3, 'Cambio climático ', '', ''),
(11, 3, 'Área temática', '', ''),
(12, 3, 'Salvaguardas ambientales', '', ''),
(13, 3, 'Salvaguardas sociales y de género', '', ''),
(14, 4, 'Ratificación DE', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_postulante`
--

CREATE TABLE `documentos_postulante` (
  `cod_postulacion` varchar(50) NOT NULL,
  `doc_postulacion` varchar(50) NOT NULL,
  `expediente` varchar(100) NOT NULL,
  `ficha_inscripcion` date NOT NULL,
  `informe_tecnico` varchar(100) NOT NULL,
  `ficha_legal` varchar(100) NOT NULL,
  `aprobacion_rep_legal` varchar(100) NOT NULL,
  `experiencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente financiera`
--

CREATE TABLE `fuente financiera` (
  `cod_ent_financiera` varchar(20) NOT NULL,
  `tipo_donatario` varchar(20) NOT NULL,
  `es_actor_nacional` int(11) NOT NULL,
  `presupuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes_etapa`
--

CREATE TABLE `informes_etapa` (
  `cod_postulacion` varchar(50) NOT NULL,
  `num_etapa` int(11) NOT NULL,
  `informe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_comites`
--

CREATE TABLE `maestro_comites` (
  `ID_comite` int(11) NOT NULL,
  `nombre_comite` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestro_comites`
--

INSERT INTO `maestro_comites` (`ID_comite`, `nombre_comite`, `estado`) VALUES
(1, 'CTI', 'Activo'),
(2, 'CTE', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `ID_Perfil` int(11) NOT NULL,
  `Nombre_perfil` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`ID_Perfil`, `Nombre_perfil`, `estado`) VALUES
(1, 'Postulante', 'Activo'),
(2, 'AND', 'Activo'),
(3, 'CD', 'Activo'),
(4, 'DIGE', 'Activo'),
(5, 'DAF', 'Activo'),
(6, 'DIME', 'Activo'),
(7, 'Administrador', 'Activo'),
(8, 'DE', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfile_usuarios`
--

CREATE TABLE `perfile_usuarios` (
  `ID_Perfil` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfile_usuarios`
--

INSERT INTO `perfile_usuarios` (`ID_Perfil`, `ID_Usuario`) VALUES
(1, 72310783),
(2, 77349656),
(3, 74049952),
(4, 76984225),
(4, 87656789),
(5, 79964321),
(5, 87654321),
(6, 12345678),
(6, 68439751),
(6, 76439144),
(6, 76684375),
(6, 89456123),
(8, 76819482);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `cod_postulante` int(11) NOT NULL,
  `nombre_postulante` varchar(30) NOT NULL,
  `apellido_postulante` varchar(30) NOT NULL,
  `genero_postulante` char(1) NOT NULL,
  `ciudad_postulante` varchar(30) NOT NULL,
  `pais_postulante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`cod_postulante`, `nombre_postulante`, `apellido_postulante`, `genero_postulante`, `ciudad_postulante`, `pais_postulante`) VALUES
(72310783, 'Johann', 'Gonzales', 'M', 'Arequipa', 'Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `cod_postulacion` varchar(50) NOT NULL,
  `cod_postulante` varchar(50) NOT NULL,
  `cod_concurso` varchar(50) NOT NULL,
  `nombre_proyecto` varchar(50) NOT NULL,
  `etapa_postulacion` int(11) NOT NULL,
  `fecha_postulacion` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `Estado_postulacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`cod_postulacion`, `cod_postulante`, `cod_concurso`, `nombre_proyecto`, `etapa_postulacion`, `fecha_postulacion`, `fecha_fin`, `Estado_postulacion`) VALUES
('CON-01-1', '72310783', 'CON-01', 'Salva tu selva peruana', 4, '2020-06-25', '0000-00-00', 'Seleccionado'),
('CON-01-2', '72310783', 'CON-01', 'Salva tu selva peruana', 4, '2020-06-25', '0000-00-00', 'Por revisar'),
('CON-02-2', '72310783', 'CON-02', 'Salva tu selva colombiana', 1, '2020-06-25', '0000-00-00', 'Por revisar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `ID_Trabajador` int(11) NOT NULL,
  `nombre_trabajador` varchar(50) NOT NULL,
  `apellido_trabajador` varchar(50) NOT NULL,
  `Area` int(11) NOT NULL,
  `cargo_trabajador` varchar(50) NOT NULL,
  `declaracion_jurada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`ID_Trabajador`, `nombre_trabajador`, `apellido_trabajador`, `Area`, `cargo_trabajador`, `declaracion_jurada`) VALUES
(12345678, 'Prueba', 'Prueba', 6, 'Especialista_cambio', ''),
(68439751, 'Jose', 'Vizcarra', 6, 'Especialista_tematica', ''),
(74049952, 'Kareen', 'Flores', 3, 'Director', ''),
(76439144, 'Martin', 'Vizcarra', 6, 'Especialista_salva_amb', ''),
(76684375, 'Luis', 'Valladares', 6, 'Especialista_salva_soc', ''),
(76819482, 'Roman', 'Riquelme', 8, 'Director', ''),
(76984225, 'Mario', 'Granda', 4, 'Oficial de proyectos', ''),
(77349656, 'Laura', 'Pajares', 2, 'Director', ''),
(79964321, 'Jimena', 'Saenz', 5, 'Analista', ''),
(87654321, 'Manuel', 'Rojas', 5, 'Analista', ''),
(87656789, 'Rolando', 'Arellano', 4, 'Analista', ''),
(89456123, 'Veronica', 'Mendoza', 6, 'Especialista_gestion', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_usuario` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Fecha_nacimiento` varchar(10) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` int(11) NOT NULL,
  `Fecha Creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre_usuario`, `Apellido`, `Fecha_nacimiento`, `Correo`, `Password`, `Fecha Creacion`) VALUES
(12345678, 'Prueba', 'Prueba', '1998-05-02', 'prueba@gmail.com', 1111, '0000-00-00'),
(68439751, 'Jose', 'Rodriguez', '1985-04-15', 'jose.rodriguez@gmail.com', 1111, '2020-06-25'),
(72310783, 'Johann', 'Gonzales', '1998-05-07', 'johann.gonzales@pucp.pe', 9997, '0000-00-00'),
(74049952, 'Kareen', 'Flores', '1997-02-04', 'kareen.flores@gmail.com', 3998, '0000-00-00'),
(76439144, 'Martin', 'Vizcarra', '1985-08-27', 'martin.vizcarra@gmail.com', 1111, '2020-06-25'),
(76684375, 'Luis', 'Valladares', '1993-04-17', 'luis.valladares@gmail.com', 1111, '2020-06-25'),
(76819482, 'Roman', 'Riquelme', '1995-06-28', 'roman.riquelme@gmail.com', 1111, '2020-06-28'),
(76984225, 'Mario', 'Granda', '1987-01-30', 'mario.granda@gmail.com', 1111, '2020-06-25'),
(77349656, 'Laura', 'Pajares', '1998-05-02', 'laura.pajares@gmail.com', 9992, '0000-00-00'),
(79964321, 'Jimena', 'Saenz', '1995-07-27', 'jimena.rodriguez@gmail.com', 1111, '2020-06-25'),
(87654321, 'Manuel', 'Rojas', '2000-01-01', 'manuel.rojas@gmail.com', 1111, '0000-00-00'),
(87656789, 'Rolando', 'Arellano', '1998-02-15', 'rolando.arellano@gmail.com', 1111, '2020-06-24'),
(89456123, 'Veronica', 'Mendoza', '1998-11-05', 'veronica.mendoza@gmail.com', 1111, '2020-06-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_comite`
--
ALTER TABLE `asignacion_comite`
  ADD UNIQUE KEY `ID_Trabajador_2` (`ID_Trabajador`),
  ADD KEY `ID_Trabajador` (`ID_Trabajador`,`ID_Comite`,`codigo_concurso`);

--
-- Indices de la tabla `calificacion_criterios`
--
ALTER TABLE `calificacion_criterios`
  ADD PRIMARY KEY (`cod_criterio`,`cod_postulacion`);

--
-- Indices de la tabla `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`cod_concurso`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`cod_consulta`);

--
-- Indices de la tabla `criterios_eva`
--
ALTER TABLE `criterios_eva`
  ADD PRIMARY KEY (`codigo_criterio`);

--
-- Indices de la tabla `documentos_postulante`
--
ALTER TABLE `documentos_postulante`
  ADD PRIMARY KEY (`cod_postulacion`);

--
-- Indices de la tabla `fuente financiera`
--
ALTER TABLE `fuente financiera`
  ADD PRIMARY KEY (`cod_ent_financiera`);

--
-- Indices de la tabla `informes_etapa`
--
ALTER TABLE `informes_etapa`
  ADD PRIMARY KEY (`cod_postulacion`,`num_etapa`);

--
-- Indices de la tabla `maestro_comites`
--
ALTER TABLE `maestro_comites`
  ADD PRIMARY KEY (`ID_comite`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`ID_Perfil`);

--
-- Indices de la tabla `perfile_usuarios`
--
ALTER TABLE `perfile_usuarios`
  ADD PRIMARY KEY (`ID_Perfil`,`ID_Usuario`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`cod_postulante`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD UNIQUE KEY `cod_postulacion` (`cod_postulacion`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`ID_Trabajador`,`Area`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `criterios_eva`
--
ALTER TABLE `criterios_eva`
  MODIFY `codigo_criterio` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `maestro_comites`
--
ALTER TABLE `maestro_comites`
  MODIFY `ID_comite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `ID_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
