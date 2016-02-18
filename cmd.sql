-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2016 a las 09:03:19
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cif` varchar(45) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `cp` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `personaPrincipal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombre`, `cif`, `direccion`, `municipio`, `provincia`, `cp`, `telefono`, `email`, `personaPrincipal`) VALUES
(1, 'Rodriguez Abogados S.L.', '', 'C/Balmes 34', '', '', '28345', '934212345', 'info@abogados-rod.cat', 1),
(2, 'A&A Marketing', '', 'C/Rosello 56', '', '', '28098', '937897542', 'info@aamarketing.ccom', 2),
(3, 'pepe', '', '', '', '', '', '', '', 29),
(4, 'PEPE JEANS', 'C/Travessera 34', 'Girona', '936541245', '56456456456', 'Girona', '25858', 'pepe@email.com', 21),
(8, 'luís', '', '', '', '', '', '', '', 3),
(14, 'BI Management', '', '', '', '', '', '', '', 0),
(17, 'Wallapop', 'C/ ENTENÇA', 'Barcelona', '9876543', '234234234', 'Barcelona', '28983', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoexpediente`
--

CREATE TABLE `estadoexpediente` (
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estadoexpediente`
--

INSERT INTO `estadoexpediente` (`estado`, `idEstado`) VALUES
('Oportunidad', 1),
('Aceptado', 2),
('Producción', 3),
('Pendiente cliente', 4),
('Pendiente cobro', 5),
('Pendiente juicio', 6),
('Rechazado', 7),
('Cerrado', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosfacturacion`
--

CREATE TABLE `estadosfacturacion` (
  `idEstadoFacturacion` int(11) NOT NULL,
  `estadoFacturacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estadosfacturacion`
--

INSERT INTO `estadosfacturacion` (`idEstadoFacturacion`, `estadoFacturacion`) VALUES
(1, 'No facturado'),
(2, 'Emitido parcialmente'),
(3, 'Cobrada parcialmente'),
(4, 'Emitida'),
(5, 'Cobrada'),
(6, 'Reclamada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `idExpediente` int(45) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDeCaso` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `idPersona` int(11) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `consultor` int(11) NOT NULL,
  `analistaPrincipal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` int(11) NOT NULL,
  `fechaOportunidad` date NOT NULL,
  `fechaAceptacion` date NOT NULL,
  `fechaCierre` date NOT NULL,
  `estadoFacturacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`idExpediente`, `nombre`, `tipoDeCaso`, `estado`, `cliente`, `idPersona`, `presupuesto`, `consultor`, `analistaPrincipal`, `prioridad`, `fechaOportunidad`, `fechaAceptacion`, `fechaCierre`, `estadoFacturacion`, `observaciones`) VALUES
(101400, 'cifer', 'Adveración', 'Producción', 'BIMBA LOLA', 2, 2000, 1, '2', 2, '2016-02-09', '0000-00-00', '0000-00-00', 'Cobrada parcialmente', 'Tema urgente'),
(101401, 'silos', 'Forense', 'Aceptado', 'A&A Marketing', 3, 3000, 1, '2', 1, '2016-02-01', '2016-02-17', '0000-00-00', 'Cobrada parcialmente', 'Esta pendiente enviarle una segunda factura con el borrador'),
(101402, 'merge', 'Auditoría/Readiness', 'Rechazado', 'Rodriguez Abogados S.L.', 2, 7000, 2, '3', 3, '2015-12-08', '2016-02-01', '2016-02-01', 'No facturado', 'No aceptado por precio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `idFactura` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `honorarios` float NOT NULL,
  `totalFactura` float NOT NULL,
  `idExpediente` int(11) NOT NULL,
  `fechaFactura` int(11) NOT NULL,
  `fechaReclamacion` int(11) NOT NULL,
  `fechaCobro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`idFactura`, `honorarios`, `totalFactura`, `idExpediente`, `fechaFactura`, `fechaReclamacion`, `fechaCobro`) VALUES
('200201/2016', 20000, 23000, 101400, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nomEmpresa` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `telefono2` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombre`, `apellidos`, `nomEmpresa`, `telefono`, `telefono2`, `email`, `observaciones`) VALUES
(1, 'Pedro', ' Rodriguez', 'A&A Marketing', '677885599', 677885508, 'prodriguez@abogados-rod.cat', ''),
(2, 'Rosa', 'Benitez', 'PEPE JEANS', '688776655', 0, 'rbenitez@gmail.com', ''),
(3, 'Pepe', '', 'Rodriguez Abogados S.L.', '677885599', 0, 'prodriguez@abogados-rod.cat', ''),
(4, 'José', 'Ruiz', 'PEPE JEANS', '688776655', 936547858, 'rbenitez@gmail.com', 'No llamar nunca al fijo'),
(16, 'Josefa', 'Sufrategui', 'PEPE JEANS', '622558877', 978524125, 'juy@persons.es', 'No llamar al móvil, prefiere email'),
(17, '', '', '', '', 0, '', ''),
(18, '', '', 'pepe', '', 0, '', ''),
(19, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(20, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(21, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(22, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(23, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(24, 'Miriam', 'Zamora', 'PEPE JEANS', '685987443', 0, '', ''),
(25, '', '', '', '', 0, '', ''),
(26, '', '', 'pepe', '', 0, '', ''),
(27, '', '', 'pepe', '', 0, '', ''),
(28, '', '', 'pepe', '', 0, '', ''),
(29, '', '', 'pepe', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridadexpediente`
--

CREATE TABLE `prioridadexpediente` (
  `idPrioridad` int(11) NOT NULL,
  `prioridad` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prioridadexpediente`
--

INSERT INTO `prioridadexpediente` (`idPrioridad`, `prioridad`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdecaso`
--

CREATE TABLE `tiposdecaso` (
  `idTipoDeCaso` int(11) NOT NULL,
  `tipoDeCaso` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiposdecaso`
--

INSERT INTO `tiposdecaso` (`idTipoDeCaso`, `tipoDeCaso`) VALUES
(1, 'Forense'),
(2, 'Investigación digital'),
(3, 'Scada'),
(4, 'Incident Response'),
(5, 'Trazabilidad'),
(6, 'Adveración'),
(7, 'Auditoría/Readiness'),
(8, 'Bolsa horas'),
(9, 'Funcional/Proyecto'),
(10, 'Android/iPhone'),
(11, 'Logs/e-discovery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `nombre`, `puesto`, `username`, `password`) VALUES
(1, 'Abraham', 'Consultor', 'apasamar', ''),
(2, 'Araceli', 'Analista', 'agonzalez', ''),
(3, 'Oriol', 'Consultor', 'oroses', ''),
(4, 'Manel', 'Analista', 'mcardona', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadorexpediente`
--

CREATE TABLE `trabajadorexpediente` (
  `idTrabajador` int(11) NOT NULL,
  `idExpediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajadorexpediente`
--

INSERT INTO `trabajadorexpediente` (`idTrabajador`, `idExpediente`) VALUES
(4, 101400),
(4, 101400),
(1, 101400);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `idEMPRESA` (`idEmpresa`),
  ADD UNIQUE KEY `nombre` (`nombre`,`cif`),
  ADD KEY `idPERSONA_idx` (`personaPrincipal`);

--
-- Indices de la tabla `estadoexpediente`
--
ALTER TABLE `estadoexpediente`
  ADD PRIMARY KEY (`estado`),
  ADD UNIQUE KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `estadosfacturacion`
--
ALTER TABLE `estadosfacturacion`
  ADD PRIMARY KEY (`estadoFacturacion`),
  ADD UNIQUE KEY `idEstadoFacturacion` (`idEstadoFacturacion`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`idExpediente`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idExpediente` (`idExpediente`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `prioridadexpediente`
--
ALTER TABLE `prioridadexpediente`
  ADD PRIMARY KEY (`idPrioridad`);

--
-- Indices de la tabla `tiposdecaso`
--
ALTER TABLE `tiposdecaso`
  ADD PRIMARY KEY (`tipoDeCaso`),
  ADD UNIQUE KEY `idTipoDeCaso` (`idTipoDeCaso`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `estadosfacturacion`
--
ALTER TABLE `estadosfacturacion`
  MODIFY `idEstadoFacturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `idExpediente` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101403;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `prioridadexpediente`
--
ALTER TABLE `prioridadexpediente`
  MODIFY `idPrioridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tiposdecaso`
--
ALTER TABLE `tiposdecaso`
  MODIFY `idTipoDeCaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
