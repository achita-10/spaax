-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 23:34:21
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spaax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl`
--

CREATE TABLE `acl` (
  `ai` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_actions`
--

CREATE TABLE `acl_actions` (
  `action_id` int(10) UNSIGNED NOT NULL,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_categories`
--

CREATE TABLE `acl_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_sessions`
--

CREATE TABLE `auth_sessions` (
  `id` varchar(40) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_sessions`
--

INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
('d264ac2396e5eda9581f2895203fcd259c64c236', 2147484848, '2019-11-26 13:39:45', '2019-11-26 21:27:56', '::1', 'Firefox 70.0 on Windows 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(30) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `Nombre`, `Apellido_P`, `Apellido_M`, `Telefono`, `Fecha_Nac`) VALUES
(1, 'dsds', 'dsdsd', 'dsds', '2941517605', '2019-03-21'),
(2, 'David', 'Gallardo', 'Bustamante', '2941517605', '2019-03-21'),
(3, 'asasa', 'sdcsdcsazc', 'cxzczcz', '2121212121', '2019-03-21'),
(4, 'Elizabeth', 'Lara', 'Bustamante', '2313231232', '2019-03-21'),
(5, 'Francisco Javier', 'Xolo', 'Toto', '2313231232', '2019-03-11'),
(6, 'dlhaslds', 'kasdjskd', 'sksdasdj', 'dsdsdsad', '2019-03-22'),
(7, 'Mariam', 'Carillo', 'Marquez', '2313231232', '2019-03-22'),
(8, 'Aurelia', 'Bustamante', 'Vela', '2941517605', '0000-00-00'),
(9, 'Abel', 'Gallardo', 'Bustamante', '2313231232', '1997-04-09'),
(10, 'Andres', 'Pava', 'Xolo', '2941517605', '2019-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_suspendidos`
--

CREATE TABLE `clientes_suspendidos` (
  `ID` int(11) NOT NULL,
  `Toma` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Fecha_Cancelacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes_suspendidos`
--

INSERT INTO `clientes_suspendidos` (`ID`, `Toma`, `Tipo`, `Status`, `Fecha_Cancelacion`) VALUES
(1, 3, 1, 1, '2019-05-01'),
(2, 6, 1, 1, '2019-05-20'),
(3, 7, 1, 0, '2019-05-22'),
(4, 7, 2, 1, '2019-05-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denied_access`
--

CREATE TABLE `denied_access` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_cliente`
--

CREATE TABLE `direccion_cliente` (
  `ID` int(30) NOT NULL,
  `ID_C` int(30) NOT NULL,
  `Calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Numero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Entidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `direccion_cliente`
--

INSERT INTO `direccion_cliente` (`ID`, `ID_C`, `Calle`, `Numero`, `Localidad`, `Municipio`, `Entidad`, `Fecha_Ingreso`) VALUES
(1, 1, 'dsds', '3', 'asasa', 'sasas', '2', '2019-03-21'),
(2, 2, 'czczc', '4', 'czcaaa', 'cczcaaa', '2', '2019-03-22'),
(3, 3, 'asASa', '2', 'dsdzzz', 'z&lt;&lt;z&lt;z<', '2', '2019-03-21'),
(4, 4, 'El Golfo', '4', 'San Andres Tuxtla', 'San Andres Tuxtla', '2', '2019-04-11'),
(5, 5, 'Av. San Martin', '2', 'Xogapan', 'San Andres Tuxtla', '2', '2019-05-25'),
(6, 6, 'sasa', '2', 'sasas', 'sasas', 'sasas', '2019-03-22'),
(7, 7, 'Maestros', '12', 'San Andres Tuxtla', 'San Andres Tuxtla', '2', '2019-03-22'),
(8, 8, 'Cedros', '13', 'San Andres Tuxtla', 'San Andres Tuxtla', '2', '2019-05-18'),
(9, 9, 'Cedros Esquina Pinos', '0', 'San Andres Tuxtla', 'San Andres Tuxtla', '2', '2019-05-25'),
(10, 10, '1 de Mayo', '12', 'San Andres Tuxtla', 'San Andres Tuxtla', '2', '2019-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) DEFAULT NULL,
  `Nombre_U` varchar(50) NOT NULL,
  `Apellido_P_U` varchar(50) NOT NULL,
  `Apellido_M_U` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `ID_User`, `Nombre_U`, `Apellido_P_U`, `Apellido_M_U`) VALUES
(1, NULL, 'David', 'Gallardo', 'Bustamante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Gasto` int(11) NOT NULL,
  `Fecha_Gasto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`ID`, `Descripcion`, `Gasto`, `Fecha_Gasto`) VALUES
(1, 'mantenimiento de la bomba electrica para el llenado del tanque de agua. hdhdhdhdhdhdhdkdjhasjdhasjdhsajdhasjdhasjdhsakjdhaskdjhasdjhsjdhsjdhsjdhas', 250, '2019-05-29'),
(2, 'tdsdsadsadsadsadas', 300, '2019-05-29'),
(3, 'asasasas', 400, '2019-05-29'),
(4, 'vzadsdsdsa', 100, '2019-05-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ips_on_hold`
--

CREATE TABLE `ips_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_errors`
--

CREATE TABLE `login_errors` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_errors`
--

INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
(5, '', '::1', '2019-11-26 13:39:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE `montos` (
  `ID` int(11) NOT NULL,
  `Monto` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Fecha_Mod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `montos`
--

INSERT INTO `montos` (`ID`, `Monto`, `Tipo`, `Fecha_Mod`) VALUES
(1, 80, 1, '2019-04-08'),
(2, 2000, 2, '2019-04-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_adeudos`
--

CREATE TABLE `pago_adeudos` (
  `ID` int(11) NOT NULL,
  `Toma` int(15) NOT NULL,
  `Monto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Bimestre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `Fecha_Adeudo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_adeudos`
--

INSERT INTO `pago_adeudos` (`ID`, `Toma`, `Monto`, `Bimestre`, `Status`, `Fecha_Adeudo`) VALUES
(1, 2, '12', '1', 1, '2019-04-11'),
(2, 3, '60', '1', 1, '2019-05-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_bimestral`
--

CREATE TABLE `pago_bimestral` (
  `ID` int(11) NOT NULL,
  `Toma` int(10) NOT NULL,
  `Monto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `Status_A` int(11) NOT NULL,
  `Bimestre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_bimestral`
--

INSERT INTO `pago_bimestral` (`ID`, `Toma`, `Monto`, `Status`, `Status_A`, `Bimestre`, `Fecha_Pago`) VALUES
(1, 4, '12', 1, 1, '6', '2019-05-11'),
(2, 8, '80', 1, 1, '1', '2019-05-22'),
(3, 8, '80', 1, 1, '2', '2019-05-22'),
(4, 8, '80', 1, 1, '3', '2019-05-22'),
(5, 8, '80', 1, 1, '4', '2019-05-22'),
(6, 8, '80', 1, 1, '5', '2019-05-22'),
(7, 8, '80', 1, 1, '6', '2019-05-22'),
(8, 5, '80', 1, 1, '1', '2019-05-22'),
(9, 5, '80', 1, 1, '2', '2019-05-22'),
(10, 5, '80', 1, 1, '3', '2019-05-22'),
(11, 5, '80', 1, 1, '4', '2019-05-22'),
(12, 5, '80', 1, 1, '5', '2019-05-22'),
(13, 5, '80', 1, 1, '6', '2019-05-22'),
(14, 4, '80', 1, 1, '1', '2019-05-22'),
(15, 4, '80', 1, 1, '2', '2019-05-22'),
(16, 4, '80', 1, 1, '3', '2019-05-22'),
(17, 4, '80', 1, 1, '4', '2019-05-22'),
(18, 4, '80', 1, 1, '5', '2019-05-22'),
(19, 2, '80', 1, 1, '2', '2019-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_ingreso`
--

CREATE TABLE `pago_ingreso` (
  `ID` int(11) NOT NULL,
  `Toma` int(11) NOT NULL,
  `Monto` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_ingreso`
--

INSERT INTO `pago_ingreso` (`ID`, `Toma`, `Monto`, `Fecha`) VALUES
(1, 7, '2000', '2019-05-11'),
(2, 8, '2000', '2019-05-22'),
(3, 5, '2000', '2019-05-22'),
(4, 4, '2000', '2019-05-22'),
(5, 2, '2000', '2019-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `toma`
--

CREATE TABLE `toma` (
  `Numero` int(30) NOT NULL,
  `ID_C` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `toma`
--

INSERT INTO `toma` (`Numero`, `ID_C`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `username_or_email_on_hold`
--

CREATE TABLE `username_or_email_on_hold` (
  `ai` int(10) UNSIGNED NOT NULL,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) UNSIGNED NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
(2147484848, 'Francisco', 'machete@gmail.com', 11, '0', '$2y$11$lASTnvzeDGJWcvynRVbj4eLyi8vzUhnicLbKW2Tq0FgvwQ6SD1VYC', NULL, NULL, NULL, '2019-11-26 13:39:45', '2019-03-12 22:20:30', '2019-11-26 19:39:45');

--
-- Disparadores `users`
--
DELIMITER $$
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NSS` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `RFC` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NSS`, `Nombre`, `Apellido_P`, `Apellido_M`, `Fecha_Nac`, `Fecha_Ingreso`, `RFC`) VALUES
('12345678901', 'David', 'Gallardo', 'Bustamante', '1991-12-09', '2018-06-09', 'rfc1234567890'),
('12345678909', 'Fernando', 'Molina', 'parra', '1997-04-12', '2018-06-09', '1212212121211');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`ai`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `acl_categories`
--
ALTER TABLE `acl_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_code` (`category_code`),
  ADD UNIQUE KEY `category_desc` (`category_desc`);

--
-- Indices de la tabla `auth_sessions`
--
ALTER TABLE `auth_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes_suspendidos`
--
ALTER TABLE `clientes_suspendidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Toma` (`Toma`);

--
-- Indices de la tabla `denied_access`
--
ALTER TABLE `denied_access`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `direccion_cliente`
--
ALTER TABLE `direccion_cliente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_C` (`ID_C`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `login_errors`
--
ALTER TABLE `login_errors`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `montos`
--
ALTER TABLE `montos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pago_adeudos`
--
ALTER TABLE `pago_adeudos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Toma` (`Toma`);

--
-- Indices de la tabla `pago_bimestral`
--
ALTER TABLE `pago_bimestral`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Toma` (`Toma`);

--
-- Indices de la tabla `pago_ingreso`
--
ALTER TABLE `pago_ingreso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Toma` (`Toma`);

--
-- Indices de la tabla `toma`
--
ALTER TABLE `toma`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `ID_C` (`ID_C`);

--
-- Indices de la tabla `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  ADD PRIMARY KEY (`ai`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NSS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acl`
--
ALTER TABLE `acl`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  MODIFY `action_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acl_categories`
--
ALTER TABLE `acl_categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes_suspendidos`
--
ALTER TABLE `clientes_suspendidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `denied_access`
--
ALTER TABLE `denied_access`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion_cliente`
--
ALTER TABLE `direccion_cliente`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ips_on_hold`
--
ALTER TABLE `ips_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_errors`
--
ALTER TABLE `login_errors`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `montos`
--
ALTER TABLE `montos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago_adeudos`
--
ALTER TABLE `pago_adeudos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago_bimestral`
--
ALTER TABLE `pago_bimestral`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pago_ingreso`
--
ALTER TABLE `pago_ingreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `toma`
--
ALTER TABLE `toma`
  MODIFY `Numero` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `username_or_email_on_hold`
--
ALTER TABLE `username_or_email_on_hold`
  MODIFY `ai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clientes_suspendidos`
--
ALTER TABLE `clientes_suspendidos`
  ADD CONSTRAINT `clientes_suspendidos_ibfk_1` FOREIGN KEY (`Toma`) REFERENCES `toma` (`Numero`);

--
-- Filtros para la tabla `direccion_cliente`
--
ALTER TABLE `direccion_cliente`
  ADD CONSTRAINT `direccion_cliente_ibfk_1` FOREIGN KEY (`ID_C`) REFERENCES `cliente` (`ID`);

--
-- Filtros para la tabla `pago_adeudos`
--
ALTER TABLE `pago_adeudos`
  ADD CONSTRAINT `pago_adeudos_ibfk_1` FOREIGN KEY (`Toma`) REFERENCES `toma` (`Numero`);

--
-- Filtros para la tabla `pago_bimestral`
--
ALTER TABLE `pago_bimestral`
  ADD CONSTRAINT `pago_bimestral_ibfk_1` FOREIGN KEY (`Toma`) REFERENCES `toma` (`Numero`);

--
-- Filtros para la tabla `pago_ingreso`
--
ALTER TABLE `pago_ingreso`
  ADD CONSTRAINT `pago_ingreso_ibfk_1` FOREIGN KEY (`Toma`) REFERENCES `toma` (`Numero`);

--
-- Filtros para la tabla `toma`
--
ALTER TABLE `toma`
  ADD CONSTRAINT `toma_ibfk_1` FOREIGN KEY (`ID_C`) REFERENCES `cliente` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
