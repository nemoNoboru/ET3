-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2016 a las 22:17:29
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `GSTRDB`
--
CREATE DATABASE IF NOT EXISTS `GSTRDB` DEFAULT CHARACTER SET utf16 COLLATE utf16_spanish2_ci;
USE `GSTRDB`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administra`
--

DROP TABLE IF EXISTS `Administra`;
CREATE TABLE IF NOT EXISTS `Administra` (
  `user_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Apunte`
--

DROP TABLE IF EXISTS `Apunte`;
CREATE TABLE IF NOT EXISTS `Apunte` (
`apunte_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL,
  `anho_academico` int(4) NOT NULL,
  `apunte_name` varchar(24) COLLATE utf16_spanish2_ci NOT NULL,
  `ruta` varchar(32) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `Apunte`
--

INSERT INTO `Apunte` (`apunte_id`, `mat_id`, `anho_academico`, `apunte_name`, `ruta`, `user_id`) VALUES
(2, 4, 2015, 'eeeee', 'c319b5f8ffd17ac62abea906ab2a264c', 21),
(3, 6, 2011, 'ueehhuehue', 'c319b5f8ffd17ac62abea906ab2a264c', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comparte_Nota`
--

DROP TABLE IF EXISTS `Comparte_Nota`;
CREATE TABLE IF NOT EXISTS `Comparte_Nota` (
  `nota_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `Comparte_Nota`
--

INSERT INTO `Comparte_Nota` (`nota_id`, `user_id`) VALUES
(1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Funcionalidad`
--

DROP TABLE IF EXISTS `Funcionalidad`;
CREATE TABLE IF NOT EXISTS `Funcionalidad` (
`fun_id` int(11) NOT NULL,
  `fun_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `fun_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Funcionalidad`
--

INSERT INTO `Funcionalidad` (`fun_id`, `fun_name`, `fun_desc`) VALUES
(15, 'CER_Crear', 'crear entidades en cancerbero'),
(16, 'CER_Gestion', 'Gestionar en cancerbero'),
(17, 'CER_Modificar', 'modificar entidades en cancerbero'),
(18, 'CER_Administrar', 'Administrador total de cancerbero'),
(26, 'UsuarioApuntorium', 'Funcionalidades de un usuario promedio de apuntorium'),
(27, 'AP_Administrar', 'AdministraciÃ³n de Apuntorium'),
(28, 'AP_AdministrarMateria', 'APUNTORIUM'),
(24, 'modificarPass', 'modificar la pass de un usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

DROP TABLE IF EXISTS `Materia`;
CREATE TABLE IF NOT EXISTS `Materia` (
`mat_id` int(11) NOT NULL,
  `mat_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL,
  `tit_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `Materia`
--

INSERT INTO `Materia` (`mat_id`, `mat_name`, `tit_id`) VALUES
(4, 'ISII', 2),
(5, 'ISI', 2),
(6, 'AEDI', 2),
(7, 'CDA', 2),
(8, 'Quimica', 5),
(9, 'Biofisica', 5),
(11, 'Fisica', 3),
(13, 'Botanica', 3),
(14, 'Zoologia', 3),
(15, 'Metodos 1', 4),
(16, 'Metodos 2', 4),
(17, 'Termodinamica', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia_Usuario`
--

DROP TABLE IF EXISTS `Materia_Usuario`;
CREATE TABLE IF NOT EXISTS `Materia_Usuario` (
  `mat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Nota`
--

DROP TABLE IF EXISTS `Nota`;
CREATE TABLE IF NOT EXISTS `Nota` (
`nota_id` int(11) NOT NULL,
  `nota_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(1500) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `Nota`
--

INSERT INTO `Nota` (`nota_id`, `nota_name`, `fecha`, `contenido`, `user_id`) VALUES
(1, 'Titulito', '2016-01-06', '&lt;ul&gt;&lt;li&gt;ueeueueueu&lt;/li&gt;&lt;li&gt;aasdasd&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;strong&gt;DIOS&lt;/strong&gt;&lt;/p&gt;', 23),
(2, 'Huehuehueheu', '2016-01-14', '&lt;p&gt;Hola esto es una nota&lt;/p&gt;', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notificacion`
--

DROP TABLE IF EXISTS `Notificacion`;
CREATE TABLE IF NOT EXISTS `Notificacion` (
`notificacion_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(40) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pag_Fun`
--

DROP TABLE IF EXISTS `Pag_Fun`;
CREATE TABLE IF NOT EXISTS `Pag_Fun` (
  `pag_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Pag_Fun`
--

INSERT INTO `Pag_Fun` (`pag_id`, `fun_id`) VALUES
(2, 16),
(2, 18),
(3, 15),
(3, 18),
(4, 17),
(4, 18),
(5, 15),
(5, 18),
(6, 16),
(6, 18),
(7, 17),
(7, 18),
(8, 15),
(8, 18),
(9, 16),
(9, 18),
(10, 17),
(10, 18),
(11, 15),
(11, 18),
(12, 16),
(12, 18),
(13, 18),
(13, 24),
(14, 17),
(14, 18),
(15, 18),
(39, 27),
(40, 27),
(40, 28),
(41, 27),
(42, 26),
(43, 27),
(44, 26),
(45, 26),
(46, 26),
(47, 26),
(48, 26),
(49, 26),
(50, 26),
(51, 27),
(51, 28),
(52, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagina`
--

DROP TABLE IF EXISTS `Pagina`;
CREATE TABLE IF NOT EXISTS `Pagina` (
`pag_id` int(11) NOT NULL,
  `pag_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `pag_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Pagina`
--

INSERT INTO `Pagina` (`pag_id`, `pag_name`, `pag_desc`) VALUES
(2, 'CER_GestionFuncionalidades', 'CERBERUS GestiÃ³n de Funcionalidades (NO BORRAR)'),
(3, 'CER_CrearFuncionalidad', 'CERBERUS CreaciÃ³n de Funcionalidades (NO BORRAR)'),
(4, 'CER_ModificarFuncionalidad', 'CERBERUS ModificaciÃ³n de Funcionalidades (NO BORRAR)'),
(5, 'CER_CrearPagina', 'CERBERUS CreaciÃ³n de PÃ¡ginas (NO BORRAR)'),
(6, 'CER_GestionPaginas', 'CERBERUS GestiÃ³n de PÃ¡ginas (NO BORRAR)'),
(7, 'CER_ModificarPagina', 'CERBERUS ModificaciÃ³n de PÃ¡ginas'),
(8, 'CER_CrearRol', 'CERBERUS CreaciÃ³n de Roles'),
(9, 'CER_GestionRoles', 'CERBERUS GestiÃ³n de Roles (NO BORRAR)'),
(10, 'CER_ModificarRol', 'CERBERUS ModificaciÃ³n de Roles (NO BORRAR)'),
(11, 'CER_CrearUsuario', 'CERBERUS CreaciÃ³n de Usuarios (NO BORRAR)'),
(12, 'CER_GestionUsuarios', 'CERBERUS GestiÃ³n de Usuarios (NO BORRAR)'),
(13, 'CER_ModificarPass', 'CERBERUS ModificaciÃ³n de ContraseÃ±as'),
(14, 'CER_ModificarUsuario', 'CERBERUS ModificaciÃ³n de Usuarios'),
(15, 'CER_Menu', 'CERBERUS Acceso al MenÃº Principal'),
(51, 'AP_AdministrarMaterias', 'APUNTORIUM'),
(50, 'AP_NuevaNota', 'APUNTORIUM'),
(49, 'AP_MisTitulaciones', 'APUNTORIUM'),
(48, 'AP_MisNotas', 'APUNTORIUM'),
(47, 'AP_MisMaterias', 'APUNTORIUM'),
(46, 'AP_MisApuntes', 'APUNTORIUM'),
(45, 'AP_EditarNotaAjena', 'APUNTORIUM'),
(44, 'AP_EditarNota', 'APUNTORIUM'),
(43, 'AP_ConsultaTitulaciones', 'APUNTORIUM'),
(42, 'AP_CompartirNota', 'APUNTORIUM'),
(41, 'AP_AltaMateria', 'APUNTORIUM'),
(40, 'AP_AdminMateria', 'APUNTORIUM'),
(39, 'AP_AdministradoresMateria', 'APUNTORIUM'),
(52, 'AP_SubirApunte', 'APUNTORIUM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

DROP TABLE IF EXISTS `Rol`;
CREATE TABLE IF NOT EXISTS `Rol` (
`rol_id` int(11) NOT NULL,
  `rol_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `rol_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`rol_id`, `rol_name`, `rol_desc`) VALUES
(12, 'Usuario_normal', 'usuario '),
(14, 'Administrador_CER', 'administrador de cancerbero'),
(15, 'AdminApuntorium', 'Administrador de Apuntorium a efectos totales'),
(16, 'UsuarioApuntorium', 'Usuario genÃ©rico para apuntorium en su registro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol_Fun`
--

DROP TABLE IF EXISTS `Rol_Fun`;
CREATE TABLE IF NOT EXISTS `Rol_Fun` (
  `rol_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Rol_Fun`
--

INSERT INTO `Rol_Fun` (`rol_id`, `fun_id`) VALUES
(12, 24),
(12, 26),
(14, 18),
(15, 27),
(16, 24),
(16, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Titulacion`
--

DROP TABLE IF EXISTS `Titulacion`;
CREATE TABLE IF NOT EXISTS `Titulacion` (
`tit_id` int(11) NOT NULL,
  `tit_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `Titulacion`
--

INSERT INTO `Titulacion` (`tit_id`, `tit_name`) VALUES
(2, 'Informatica'),
(3, 'Ambientales'),
(4, 'Fisica'),
(5, 'Biologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Titulacion_Usuario`
--

DROP TABLE IF EXISTS `Titulacion_Usuario`;
CREATE TABLE IF NOT EXISTS `Titulacion_Usuario` (
  `tit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `U_Tiene_A`
--

DROP TABLE IF EXISTS `U_Tiene_A`;
CREATE TABLE IF NOT EXISTS `U_Tiene_A` (
  `apunte_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Fun`
--

DROP TABLE IF EXISTS `User_Fun`;
CREATE TABLE IF NOT EXISTS `User_Fun` (
  `user_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `User_Fun`
--

INSERT INTO `User_Fun` (`user_id`, `fun_id`) VALUES
(21, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Pag`
--

DROP TABLE IF EXISTS `User_Pag`;
CREATE TABLE IF NOT EXISTS `User_Pag` (
  `user_id` int(11) NOT NULL,
  `pag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `User_Pag`
--

INSERT INTO `User_Pag` (`user_id`, `pag_id`) VALUES
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 16),
(23, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Rol`
--

DROP TABLE IF EXISTS `User_Rol`;
CREATE TABLE IF NOT EXISTS `User_Rol` (
  `user_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `User_Rol`
--

INSERT INTO `User_Rol` (`user_id`, `rol_id`) VALUES
(10, 12),
(21, 12),
(21, 14),
(21, 15),
(21, 16),
(22, 16),
(23, 16),
(24, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_pass` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_email` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`user_id`, `user_name`, `user_pass`, `user_desc`, `user_email`) VALUES
(21, 'Admin', 'admin', 'administrador general', 'admin@admin.com'),
(10, 'pepe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'usuario sin permisos administrativos', 'pepe@wpawpa.com'),
(22, 'UsuarioTest', 'test', '', 'test@test.test'),
(23, 'user2', 'user', '', 'user@user.es'),
(24, 'AdminCancerbero', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin de cancerbero', 'cancerbero@cancerbero.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administra`
--
ALTER TABLE `Administra`
 ADD PRIMARY KEY (`user_id`,`mat_id`), ADD KEY `mat_id` (`mat_id`);

--
-- Indices de la tabla `Apunte`
--
ALTER TABLE `Apunte`
 ADD PRIMARY KEY (`apunte_id`), ADD KEY `mat_id` (`mat_id`), ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `Comparte_Nota`
--
ALTER TABLE `Comparte_Nota`
 ADD PRIMARY KEY (`nota_id`,`user_id`);

--
-- Indices de la tabla `Funcionalidad`
--
ALTER TABLE `Funcionalidad`
 ADD PRIMARY KEY (`fun_id`);

--
-- Indices de la tabla `Materia`
--
ALTER TABLE `Materia`
 ADD PRIMARY KEY (`mat_id`), ADD KEY `tit_id` (`tit_id`);

--
-- Indices de la tabla `Materia_Usuario`
--
ALTER TABLE `Materia_Usuario`
 ADD PRIMARY KEY (`mat_id`,`user_id`);

--
-- Indices de la tabla `Nota`
--
ALTER TABLE `Nota`
 ADD PRIMARY KEY (`nota_id`), ADD KEY `nota_id` (`nota_id`);

--
-- Indices de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
 ADD PRIMARY KEY (`notificacion_id`);

--
-- Indices de la tabla `Pag_Fun`
--
ALTER TABLE `Pag_Fun`
 ADD PRIMARY KEY (`pag_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `Pagina`
--
ALTER TABLE `Pagina`
 ADD PRIMARY KEY (`pag_id`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
 ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `Rol_Fun`
--
ALTER TABLE `Rol_Fun`
 ADD PRIMARY KEY (`rol_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `Titulacion`
--
ALTER TABLE `Titulacion`
 ADD PRIMARY KEY (`tit_id`);

--
-- Indices de la tabla `Titulacion_Usuario`
--
ALTER TABLE `Titulacion_Usuario`
 ADD PRIMARY KEY (`tit_id`,`user_id`);

--
-- Indices de la tabla `U_Tiene_A`
--
ALTER TABLE `U_Tiene_A`
 ADD PRIMARY KEY (`apunte_id`,`user_id`);

--
-- Indices de la tabla `User_Fun`
--
ALTER TABLE `User_Fun`
 ADD PRIMARY KEY (`user_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `User_Pag`
--
ALTER TABLE `User_Pag`
 ADD PRIMARY KEY (`user_id`,`pag_id`), ADD KEY `pag_id` (`pag_id`);

--
-- Indices de la tabla `User_Rol`
--
ALTER TABLE `User_Rol`
 ADD PRIMARY KEY (`user_id`,`rol_id`), ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Apunte`
--
ALTER TABLE `Apunte`
MODIFY `apunte_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Funcionalidad`
--
ALTER TABLE `Funcionalidad`
MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `Materia`
--
ALTER TABLE `Materia`
MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `Nota`
--
ALTER TABLE `Nota`
MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
MODIFY `notificacion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pagina`
--
ALTER TABLE `Pagina`
MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Titulacion`
--
ALTER TABLE `Titulacion`
MODIFY `tit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Administra`
--
ALTER TABLE `Administra`
ADD CONSTRAINT `Administra_ibfk_1` FOREIGN KEY (`mat_id`) REFERENCES `Materia` (`mat_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Apunte`
--
ALTER TABLE `Apunte`
ADD CONSTRAINT `Apunte_ibfk_1` FOREIGN KEY (`mat_id`) REFERENCES `Materia` (`mat_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Materia`
--
ALTER TABLE `Materia`
ADD CONSTRAINT `Materia_ibfk_1` FOREIGN KEY (`tit_id`) REFERENCES `Titulacion` (`tit_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Materia_Usuario`
--
ALTER TABLE `Materia_Usuario`
ADD CONSTRAINT `Materia_Usuario_ibfk_1` FOREIGN KEY (`mat_id`) REFERENCES `Materia` (`mat_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Titulacion_Usuario`
--
ALTER TABLE `Titulacion_Usuario`
ADD CONSTRAINT `Titulacion_Usuario_ibfk_1` FOREIGN KEY (`tit_id`) REFERENCES `Titulacion` (`tit_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `U_Tiene_A`
--
ALTER TABLE `U_Tiene_A`
ADD CONSTRAINT `U_Tiene_A_ibfk_1` FOREIGN KEY (`apunte_id`) REFERENCES `Apunte` (`apunte_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
