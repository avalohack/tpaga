-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2019 a las 23:42:14
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpaga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdPlans` int(2) NOT NULL,
  `Name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Cost` int(8) NOT NULL,
  `Includ` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `cost` int(10) NOT NULL,
  `purchase_details_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idempotency_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terminal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

CREATE TABLE `plans` (
  `IdPlans` int(2) NOT NULL,
  `Name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Cost` int(8) NOT NULL,
  `Includ` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `plans`
--

INSERT INTO `plans` (`IdPlans`, `Name`, `Cost`, `Includ`) VALUES
(1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
(2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
(3, 'Año', 3, 'Incluye Uno (4) Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

CREATE TABLE `result` (
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdUser` int(11) NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL,
  `Nickname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`IdPlans`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plans`
--
ALTER TABLE `plans`
  MODIFY `IdPlans` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
