-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2025 a las 03:12:46
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
-- Base de datos: `bpmsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Jarvis', 'admin', 3232464472, 'joansneider.gp@hotmail.com', '751cb3f4aa17c36186f4856c8982bf27', '2019-07-25 06:21:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint(11) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Services`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(8, '496532914', 'Roman Garcia', 'rgarcia@cweb.com', 3211076843, '1/23/2020', '6:30pm', 'Fruit Facial', '2020-01-23 23:50:09', 'Excelente Cliente', '1', '2020-01-23 23:52:03'),
(9, '304302609', 'Lucia grajales', 'lgrajales@cweb.com', 3065439781, '1/24/2020', '9:00am', 'Fruit Facial', '2020-01-24 13:56:31', 'La srta realizÃ³ el proceso correspondiente.', '1', '2020-01-24 13:57:43'),
(10, '604686038', 'JUAN ARANGO', 'JARANGO@CWEB.COM', 3147641979, '1/24/2020', '1:00pm', 'Masaje Facial', '2020-01-24 14:54:02', 'Excelente cliente, recomendado', '1', '2020-01-24 14:54:57'),
(11, '932355891', 'Dilan cabal', 'DCABAL@CWEB.COM', 3178674931, '1/24/2020', '10:30am', 'Masaje Facial', '2020-01-24 15:11:49', 'Se realizÃ³ el pedido a satisfacciÃ³n.', '1', '2020-01-24 15:12:54'),
(12, '182457009', 'Juan Gallego', 'JGALLEGO@CWEB.COM', 3163798467, '1/24/2020', '1:30am', 'Masaje Facial', '2020-01-24 16:20:12', 'Acepto', '1', '2020-01-24 16:21:20'),
(42, '878693522', 'samuel gil ', 'samuel.gp@hotmail.com', 3232464400, NULL, NULL, 'Improntas', '2025-07-29 23:31:30', 'ok se llama al cliente para cordinar', '1', '2025-07-29 23:31:59'),
(43, '904407248', 'samuel gil ', 'samuel.gp@hotmail.com', 3232464400, NULL, NULL, 'traspaso', '2025-07-29 23:36:31', 'ok', '2', '2025-07-29 23:37:17'),
(44, '864782359', 'samuel gil ', 'samuel.gp@hotmail.com', 3232464400, NULL, NULL, 'traspaso', '2025-07-29 23:37:42', 'no', '2', '2025-07-29 23:37:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Placa` varchar(10) DEFAULT NULL,
  `Ciudad` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Gender` enum('Mujer','Hombre','No definido') DEFAULT NULL,
  `Details` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblcustomers`
--

INSERT INTO `tblcustomers` (`ID`, `Name`, `Email`, `Placa`, `Ciudad`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`) VALUES
(1, 'JOANSNEIDER', 'joansneider.gp@hotmail.com', 'QDS39G', 'Bogota', 3232464472, 'Hombre', 'Cliente de Bogota Vehiculo de Mosquera', '2019-07-26 11:09:10', '2025-07-29 20:40:51'),
(2, 'Edith Velazco', 'dgarzon@cweb.com', NULL, NULL, 3014673497814, 'Mujer', 'Taken haircut by him', '2019-07-26 11:10:02', '2020-01-24 15:08:42'),
(3, 'Daniel Garzon', 'dgarzon@cweb.com', NULL, NULL, 3126743476978, 'Hombre', 'Buen Cliente', '2019-07-26 11:10:28', '2020-01-24 15:08:50'),
(4, 'Adrian Narvaez', 'anarvaez@cweb.com', NULL, NULL, 3149874625789, 'Hombre', 'Taking Body Spa', '2019-08-19 13:38:58', '2020-01-24 15:08:07'),
(5, 'Norman Palao', 'npalao@cweb.com', NULL, NULL, 3169463781497, 'Hombre', 'Cliente frecuente,  le gusta los servicios premium tenerlo muy en cuenta', '2019-08-21 16:24:53', '2020-01-24 15:08:58'),
(6, 'Roberto GalÃ¡n', 'rgalan@cweb.com', NULL, NULL, 3172232526, 'Hombre', 'Interesante cliente', '2020-01-24 14:56:35', '2020-01-24 18:12:27'),
(7, 'Humberto Gonzalez', 'hgonzalez@cweb.com', NULL, NULL, 3179768047, 'Hombre', 'Creado satisfactoriamente', '2020-01-24 17:06:53', '2020-01-24 17:09:40'),
(8, 'JOAN', 'giraldooscar707@gmail.com', 'ABC123', 'BOGOTA					', 3142853949, 'Hombre', '', '2025-07-29 01:24:41', NULL),
(9, 'JOAN', 'giraldooscar707@gmail.com', 'ABC123', 'BOGOTA					', 3142853949, 'Mujer', '', '2025-07-29 18:49:59', NULL),
(10, 'Samuel Gil Becerra', 'samuel.gp@hotmail.com', 'ABC123', 'Barranquilla', 3232464400, 'Hombre', '', '2025-07-29 23:33:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(26, 1, 1, 535139230, '2020-01-23 23:55:32'),
(27, 6, 1, 232733358, '2020-01-24 14:58:47'),
(28, 4, 10, 635394484, '2020-01-24 16:51:26'),
(29, 4, 15, 609822877, '2020-01-24 17:02:06'),
(30, 4, 16, 609822877, '2020-01-24 17:02:06'),
(31, 1, 1, 756364490, '2025-07-29 01:30:33'),
(32, 1, 1, 413839265, '2025-07-29 01:41:26'),
(33, 1, 1, 178376075, '2025-07-29 01:43:55'),
(34, 8, 1, 199204159, '2025-07-29 01:46:51'),
(35, 8, 16, 199204159, '2025-07-29 01:46:51'),
(44, 10, 1, 447923370, '2025-07-29 23:34:12'),
(45, 10, 4, 447923370, '2025-07-29 23:34:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `Placa` varchar(10) DEFAULT NULL,
  `Ciudad` varchar(20) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `Placa`, `Ciudad`, `Cost`, `CreationDate`) VALUES
(1, 'Traspaso', 'Vehiculo', 'Bogota', 218000, '2019-07-25 11:22:38'),
(2, 'Traspaso Moto', 'Moto', 'Bogota', 125000, '2019-07-25 11:22:53'),
(3, 'Traspaso Indeterminado', 'Vehiculos', 'Bogota', 214000, '2019-07-25 11:23:10'),
(4, 'Cambio Color', 'Vehiculos', 'Bogota					', 261000, '2019-07-25 11:23:34'),
(5, 'Duplicado Placas', 'Vehiculo		', 'Bogota', 342000, '2019-07-25 11:23:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
