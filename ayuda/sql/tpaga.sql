-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2019 a las 00:18:42
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

--
-- Volcado de datos para la tabla `invoicedetail`
--

INSERT INTO `invoicedetail` (`order_id`, `IdPlans`, `Name`, `Cost`, `Includ`) VALUES
('1', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('1', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios');

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

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`cost`, `purchase_details_url`, `voucher_url`, `idempotency_token`, `order_id`, `terminal_id`, `purchase_description`, `user_ip_address`, `expires_at`, `IdUser`, `Timestamp`) VALUES
(3, 'https://192.168.1.79/tpaga/pay/success/MQ==', 'https://192.168.1.79/tpaga/pay/detail/MQ==', 'MQ==-3-', '1', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-01T17:16:42.000-05:00', 2, '2019-05-31 22:16:42');

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
  `result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `result`
--

INSERT INTO `result` (`order_id`, `IdUser`, `result`, `Timestamp`, `id_respuesta`) VALUES
('1', 2, '{\"miniapp_user_token\":null,\"cost\":\"3.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MQ==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MQ==\",\"idempotency_token\":\"MQ==-3-\",\"order_id\":\"1\",\"terminal_id\":\"https:\\/\\/192.1', '2019-05-31 22:16:43', 0);

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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Email`, `Password`, `IdUser`, `Tipo`, `Nickname`, `Phone`) VALUES
('info@vacasenvuelo.com', 'd79d575ebfb2ca4d889fc0658a7832381a552eb6', 2, 0, NULL, 2147483647);

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
-- Indices de la tabla `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_respuesta`);

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
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
