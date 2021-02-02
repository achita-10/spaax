-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2018 a las 05:56:41
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `imss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE `afiliado` (
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Sexo` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`NSS`, `Nombre`, `Apellido_P`, `Apellido_M`, `Fecha_Nac`, `Sexo`) VALUES
('0987654321', 'Elizabeth', 'Lara', 'Bustamante', '0000-00-00', ''),
('1234', 'Merary', 'Gallardo', 'Baxin', '0000-00-00', ''),
('1234321', 'Jose', 'Gallardo', 'Lezama', '0000-00-00', ''),
('12345', 'Daniel de Jesus', 'Valentin', 'Hernandez', '0000-00-00', ''),
('123454321', 'Abril', 'Herrera', 'Tolen', '0000-00-00', ''),
('123456', 'Karla', 'Razo', 'Valentin', '0000-00-00', ''),
('1234567', 'Maria', 'Parra', 'Bustamante', '0000-00-00', ''),
('12345678', 'Andrés', 'Pava', 'Xolo', '0000-00-00', ''),
('123456789', 'Francisco Javier', 'Xolo', 'Toto', '0000-00-00', ''),
('1234567890', 'David', 'Gallardo', 'Bustamante', '0000-00-00', ''),
('123456789012', 'Marysol', 'Hernanez', 'Pot', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_complicacion_intra`
--

CREATE TABLE `afiliado_complicacion_intra` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `PCI` text COLLATE utf8_spanish_ci NOT NULL,
  `SCI` text COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_domicilio`
--

CREATE TABLE `afiliado_domicilio` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Calle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Colonia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `CP` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Entidad_F` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Zona_Ads` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_empresa`
--

CREATE TABLE `afiliado_empresa` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Empresa_N` int(30) NOT NULL,
  `Vigencia_Derechos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Personal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado_empresa`
--

INSERT INTO `afiliado_empresa` (`ID`, `NSS`, `Empresa_N`, `Vigencia_Derechos`, `Fecha`, `Personal`) VALUES
(1, '123456', 1, 'Si', '2018-09-28', 0),
(2, '1234', 3, 'Si', '2018-09-29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_familiar`
--

CREATE TABLE `afiliado_familiar` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Familiar_N` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Familiar_P` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Familiar_D` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Poblacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliado_familiar`
--

INSERT INTO `afiliado_familiar` (`ID`, `NSS`, `Familiar_N`, `Familiar_P`, `Familiar_D`, `Poblacion`, `Estado`, `Telefono`, `Fecha`) VALUES
(1, '123456', 'Alberto Isair Campos Rivadeneira', 'Esposo', 'Independencia', 'San Andrés Tuxtla', 'Veracruz', '2941410616', '2018-09-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_familiar_r`
--

CREATE TABLE `afiliado_familiar_r` (
  `ID` int(11) NOT NULL,
  `NSS` int(20) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alta_hospitalaria`
--

CREATE TABLE `alta_hospitalaria` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Motivo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Envio_A` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PDE` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Programa_Atendio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Metodo_Planificacion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ramo_Seguro` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `N_Receta` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_urgencias`
--

CREATE TABLE `atencion_urgencias` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Resumen_Medico` text COLLATE utf8_spanish_ci NOT NULL,
  `Exploracion_Fisica` text COLLATE utf8_spanish_ci NOT NULL,
  `Diagnostico` text COLLATE utf8_spanish_ci NOT NULL,
  `Tratamiento` text COLLATE utf8_spanish_ci NOT NULL,
  `Consultorio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cama`
--

CREATE TABLE `cama` (
  `ID` int(11) NOT NULL,
  `Especialidad` varchar(50) NOT NULL,
  `Codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cama`
--

INSERT INTO `cama` (`ID`, `Especialidad`, `Codigo`) VALUES
(1, 'Ginecologia Y Obstetricia', '1'),
(2, 'Ginecologia Y Obstetricia', '2'),
(3, 'Ginecologia Y Obstetricia', '3'),
(4, 'Ginecologia Y Obstetricia', '4'),
(5, 'Ginecologia Y Obstetricia', '5'),
(6, 'Ginecologia Y Obstetricia', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defuncion_alta_hospitalaria`
--

CREATE TABLE `defuncion_alta_hospitalaria` (
  `ID` int(15) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `PD` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Autopsia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Razon_Social` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Poblacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Entidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID`, `Nombre`, `Razon_Social`, `Direccion`, `Poblacion`, `Entidad`, `Telefono`) VALUES
(1, 'sasaa', 'sasasas', 'sasasasa', '', '', 0),
(2, 'empresa', 'empresa', 'direccion', 'San Andrés Tuxtla', 'Veracruz', 2147483647),
(3, 'CONALEP', 'CONALEP', 'Aereopuerto', 'San Andrés Tuxtla', 'Veracruz', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_actual`
--

CREATE TABLE `especialidad_actual` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Cama` int(10) NOT NULL,
  `Medico` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad_A` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad_actual`
--

INSERT INTO `especialidad_actual` (`ID`, `NSS`, `Cama`, `Medico`, `Especialidad_A`, `Fecha`) VALUES
(1, '1234', 1, '12345678', 'Medicina Interna', '2018-09-22'),
(2, '123456', 3, '12345678', 'Cirugia General', '2018-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_egreso`
--

CREATE TABLE `especialidad_egreso` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `Cama` int(5) NOT NULL,
  `Medico` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad_E` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_ingreso`
--

CREATE TABLE `especialidad_ingreso` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Cama` int(11) NOT NULL,
  `Medico` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad_I` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad_ingreso`
--

INSERT INTO `especialidad_ingreso` (`ID`, `NSS`, `Cama`, `Medico`, `Especialidad_I`, `Fecha`) VALUES
(1, '1234', 1, '12345678', 'Medicina Interna', '2018-09-22'),
(2, '123456', 3, '12345678', 'Cirugia General', '2018-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_hospital`
--

CREATE TABLE `ingreso_hospital` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Especialidad_I` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `Matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_P` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido_M` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Colonia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CP` int(5) NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Entidad_F` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`Matricula`, `Nombre`, `Apellido_P`, `Apellido_M`, `Sexo`, `Calle`, `Colonia`, `CP`, `Ciudad`, `Entidad_F`) VALUES
('12345678', 'David', 'Gallardo', 'Bustamante', 'H', 'Cedros', 'El Mirador', 95770, 'San Andrés Tuxtla', 'Veracruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `primer_diagnostico`
--

CREATE TABLE `primer_diagnostico` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Cama` int(5) NOT NULL,
  `Medico` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Diagnostico_I` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `primer_diagnostico`
--

INSERT INTO `primer_diagnostico` (`ID`, `NSS`, `Cama`, `Medico`, `Diagnostico_I`, `Fecha`) VALUES
(1, '1234', 1, '12345678', 'sasasass', '2018-09-22'),
(2, '123456', 3, '12345678', 'sasas', '2018-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productividad`
--

CREATE TABLE `productividad` (
  `ID` int(11) NOT NULL,
  `Soluciones_P` varchar(50) NOT NULL,
  `Venoclisis` varchar(50) NOT NULL,
  `Nebulizacion` varchar(50) NOT NULL,
  `Saturas` varchar(50) NOT NULL,
  `I_M` varchar(50) NOT NULL,
  `I_V` varchar(50) NOT NULL,
  `R_X` varchar(50) NOT NULL,
  `Curaciones` varchar(50) NOT NULL,
  `Dextroxtix` varchar(50) NOT NULL,
  `Pasa_Hospital` varchar(50) NOT NULL,
  `Envio` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signos_vitales`
--

CREATE TABLE `signos_vitales` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Frecuencia_C` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Frecuencia_R` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Presion_A` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Peso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Talla` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Glucosa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Temperatura` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `signos_vitales`
--

INSERT INTO `signos_vitales` (`ID`, `NSS`, `Frecuencia_C`, `Frecuencia_R`, `Presion_A`, `Peso`, `Talla`, `Glucosa`, `Temperatura`, `Fecha`) VALUES
(1, '1234567', '150-200 lat/min', ' 25–40', '120/80 mmHg', '60 Kg', '30 ', '80', '100 °C', '0000-00-00'),
(2, '0987654321', '110-150 lat/min', '80–110', '1200/80 mmHg', '100 Kg', '28', '80', '120 °C', '0000-00-00'),
(3, '1234567890', '110-150 lat/min', '25–40', '1200/80 mmHg', '100 Kg', '30', '80', '100 °C', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_diagnostico_alta_hospitalaria`
--

CREATE TABLE `s_diagnostico_alta_hospitalaria` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `SDI` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SDE` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `triage`
--

CREATE TABLE `triage` (
  `ID` int(11) NOT NULL,
  `NSS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Salida_Triage` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Modelo_Triage` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Derivacion_P` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Procedimientos_R` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Matricula` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Egreso` date NOT NULL,
  `Privilegios` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Matricula`, `Usuario`, `Password`, `Fecha_Ingreso`, `Fecha_Egreso`, `Privilegios`) VALUES
(1, '123456789', 'Achita', '1234567', '2018-05-04', '0000-00-00', 'Pediatria'),
(2, '987654321', 'Cementera', '7654321', '2018-05-04', '0000-00-00', 'Ginecologia Y Obstetricia'),
(3, '12345678', 'Francisco', '123456', '2018-05-29', '0000-00-00', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`NSS`);

--
-- Indices de la tabla `afiliado_complicacion_intra`
--
ALTER TABLE `afiliado_complicacion_intra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `afiliado_domicilio`
--
ALTER TABLE `afiliado_domicilio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `afiliado_empresa`
--
ALTER TABLE `afiliado_empresa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `afiliado_familiar`
--
ALTER TABLE `afiliado_familiar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `afiliado_familiar_r`
--
ALTER TABLE `afiliado_familiar_r`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `alta_hospitalaria`
--
ALTER TABLE `alta_hospitalaria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `atencion_urgencias`
--
ALTER TABLE `atencion_urgencias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `cama`
--
ALTER TABLE `cama`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `defuncion_alta_hospitalaria`
--
ALTER TABLE `defuncion_alta_hospitalaria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `especialidad_actual`
--
ALTER TABLE `especialidad_actual`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`),
  ADD KEY `Cama` (`Cama`),
  ADD KEY `Medico` (`Medico`);

--
-- Indices de la tabla `especialidad_egreso`
--
ALTER TABLE `especialidad_egreso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`),
  ADD KEY `Cama` (`Cama`),
  ADD KEY `Medico` (`Medico`);

--
-- Indices de la tabla `especialidad_ingreso`
--
ALTER TABLE `especialidad_ingreso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`),
  ADD KEY `Cama` (`Cama`),
  ADD KEY `Medico` (`Medico`);

--
-- Indices de la tabla `ingreso_hospital`
--
ALTER TABLE `ingreso_hospital`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`),
  ADD KEY `Personal` (`Personal`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `primer_diagnostico`
--
ALTER TABLE `primer_diagnostico`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`),
  ADD KEY `Cama` (`Cama`),
  ADD KEY `Medico` (`Medico`);

--
-- Indices de la tabla `productividad`
--
ALTER TABLE `productividad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `s_diagnostico_alta_hospitalaria`
--
ALTER TABLE `s_diagnostico_alta_hospitalaria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `triage`
--
ALTER TABLE `triage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NSS` (`NSS`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado_complicacion_intra`
--
ALTER TABLE `afiliado_complicacion_intra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afiliado_domicilio`
--
ALTER TABLE `afiliado_domicilio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afiliado_empresa`
--
ALTER TABLE `afiliado_empresa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `afiliado_familiar`
--
ALTER TABLE `afiliado_familiar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `afiliado_familiar_r`
--
ALTER TABLE `afiliado_familiar_r`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alta_hospitalaria`
--
ALTER TABLE `alta_hospitalaria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `atencion_urgencias`
--
ALTER TABLE `atencion_urgencias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cama`
--
ALTER TABLE `cama`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `defuncion_alta_hospitalaria`
--
ALTER TABLE `defuncion_alta_hospitalaria`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidad_actual`
--
ALTER TABLE `especialidad_actual`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidad_egreso`
--
ALTER TABLE `especialidad_egreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad_ingreso`
--
ALTER TABLE `especialidad_ingreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingreso_hospital`
--
ALTER TABLE `ingreso_hospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `primer_diagnostico`
--
ALTER TABLE `primer_diagnostico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productividad`
--
ALTER TABLE `productividad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `s_diagnostico_alta_hospitalaria`
--
ALTER TABLE `s_diagnostico_alta_hospitalaria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `triage`
--
ALTER TABLE `triage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliado_complicacion_intra`
--
ALTER TABLE `afiliado_complicacion_intra`
  ADD CONSTRAINT `afiliado_complicacion_intra_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `afiliado_domicilio`
--
ALTER TABLE `afiliado_domicilio`
  ADD CONSTRAINT `afiliado_domicilio_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `afiliado_empresa`
--
ALTER TABLE `afiliado_empresa`
  ADD CONSTRAINT `afiliado_empresa_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `afiliado_familiar`
--
ALTER TABLE `afiliado_familiar`
  ADD CONSTRAINT `afiliado_familiar_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `alta_hospitalaria`
--
ALTER TABLE `alta_hospitalaria`
  ADD CONSTRAINT `alta_hospitalaria_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `atencion_urgencias`
--
ALTER TABLE `atencion_urgencias`
  ADD CONSTRAINT `atencion_urgencias_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `defuncion_alta_hospitalaria`
--
ALTER TABLE `defuncion_alta_hospitalaria`
  ADD CONSTRAINT `defuncion_alta_hospitalaria_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `especialidad_actual`
--
ALTER TABLE `especialidad_actual`
  ADD CONSTRAINT `especialidad_actual_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`),
  ADD CONSTRAINT `especialidad_actual_ibfk_2` FOREIGN KEY (`Cama`) REFERENCES `cama` (`ID`),
  ADD CONSTRAINT `especialidad_actual_ibfk_3` FOREIGN KEY (`Medico`) REFERENCES `medico` (`Matricula`);

--
-- Filtros para la tabla `especialidad_egreso`
--
ALTER TABLE `especialidad_egreso`
  ADD CONSTRAINT `especialidad_egreso_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`),
  ADD CONSTRAINT `especialidad_egreso_ibfk_2` FOREIGN KEY (`Cama`) REFERENCES `cama` (`ID`),
  ADD CONSTRAINT `especialidad_egreso_ibfk_3` FOREIGN KEY (`Medico`) REFERENCES `medico` (`Matricula`);

--
-- Filtros para la tabla `especialidad_ingreso`
--
ALTER TABLE `especialidad_ingreso`
  ADD CONSTRAINT `especialidad_ingreso_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`),
  ADD CONSTRAINT `especialidad_ingreso_ibfk_2` FOREIGN KEY (`Cama`) REFERENCES `cama` (`ID`),
  ADD CONSTRAINT `especialidad_ingreso_ibfk_3` FOREIGN KEY (`Medico`) REFERENCES `medico` (`Matricula`);

--
-- Filtros para la tabla `ingreso_hospital`
--
ALTER TABLE `ingreso_hospital`
  ADD CONSTRAINT `ingreso_hospital_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`),
  ADD CONSTRAINT `ingreso_hospital_ibfk_3` FOREIGN KEY (`Personal`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `primer_diagnostico`
--
ALTER TABLE `primer_diagnostico`
  ADD CONSTRAINT `primer_diagnostico_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`),
  ADD CONSTRAINT `primer_diagnostico_ibfk_2` FOREIGN KEY (`Cama`) REFERENCES `cama` (`ID`),
  ADD CONSTRAINT `primer_diagnostico_ibfk_3` FOREIGN KEY (`Medico`) REFERENCES `medico` (`Matricula`);

--
-- Filtros para la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  ADD CONSTRAINT `signos_vitales_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `s_diagnostico_alta_hospitalaria`
--
ALTER TABLE `s_diagnostico_alta_hospitalaria`
  ADD CONSTRAINT `s_diagnostico_alta_hospitalaria_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);

--
-- Filtros para la tabla `triage`
--
ALTER TABLE `triage`
  ADD CONSTRAINT `triage_ibfk_1` FOREIGN KEY (`NSS`) REFERENCES `afiliado` (`NSS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
