-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2019 a las 18:46:45
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
('3', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('3', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('3', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('4', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('4', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('4', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('5', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('5', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('5', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('6', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('6', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('6', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('7', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('7', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('7', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('8', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('1', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('1', 3, 'Año', 3, 'Incluye Uno (4) Usuarios');

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
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pay` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`cost`, `purchase_details_url`, `voucher_url`, `idempotency_token`, `order_id`, `terminal_id`, `purchase_description`, `user_ip_address`, `expires_at`, `IdUser`, `Timestamp`, `pay`) VALUES
(6, 'https://192.168.1.79/tpaga/pay/success/MQ==', 'https://192.168.1.79/tpaga/pay/detail/MQ==', 'MQ==-6-', '1', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T16:21:39.000-05:00', 2, '2019-06-07 16:25:27', 1),
(6, 'https://192.168.1.79/tpaga/pay/success/Mg==', 'https://192.168.1.79/tpaga/pay/detail/Mg==', 'Mg==-6-', '2', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T16:22:35.000-05:00', 2, '2019-06-07 16:25:10', 1),
(6, 'https://192.168.1.79/tpaga/pay/success/Mw==', 'https://192.168.1.79/tpaga/pay/detail/Mw==', 'Mw==-6-', '3', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T16:23:22.000-05:00', 2, '2019-06-05 21:23:22', 0),
(6, 'https://192.168.1.79/tpaga/pay/success/NA==', 'https://192.168.1.79/tpaga/pay/detail/NA==', 'NA==-6-', '4', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T16:29:28.000-05:00', 2, '2019-06-05 21:29:28', 0),
(6, 'https://192.168.1.79/tpaga/pay/success/NQ==', 'https://192.168.1.79/tpaga/pay/detail/NQ==', 'NQ==-6-', '5', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T16:36:13.000-05:00', 2, '2019-06-05 21:36:13', 0),
(6, 'https://192.168.1.79/tpaga/pay/success/Ng==', 'https://192.168.1.79/tpaga/pay/detail/Ng==', 'Ng==-6-', '6', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T17:13:43.000-05:00', 2, '2019-06-05 22:13:43', 0),
(6, 'https://192.168.1.79/tpaga/pay/success/Nw==', 'https://192.168.1.79/tpaga/pay/detail/Nw==', 'Nw==-6-', '7', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-06T17:16:25.000-05:00', 3, '2019-06-11 20:35:07', 1),
(3, 'https://192.168.1.79/tpaga/pay/success/OA==', 'https://192.168.1.79/tpaga/pay/detail/OA==', 'OA==-3-', '8', 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.62', '2019-06-08T12:51:29.000-05:00', 3, '2019-06-07 22:02:03', 1);

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
  `result` text COLLATE utf8_unicode_ci,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `result`
--

INSERT INTO `result` (`order_id`, `IdUser`, `result`, `Timestamp`, `id_respuesta`) VALUES
('4', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/NA==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/NA==\",\"idempotency_token\":\"NA==-6-\",\"order_id\":\"4\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 21:29:29', 1),
('5', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/NQ==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/NQ==\",\"idempotency_token\":\"NQ==-6-\",\"order_id\":\"5\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 21:36:14', 2),
('6', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/Ng==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/Ng==\",\"idempotency_token\":\"Ng==-6-\",\"order_id\":\"6\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 22:13:45', 3),
('7', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/Nw==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/Nw==\",\"idempotency_token\":\"Nw==-6-\",\"order_id\":\"7\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 22:16:26', 4),
('8', 3, '{\"miniapp_user_token\":null,\"cost\":\"3.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/OA==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/OA==\",\"idempotency_token\":\"OA==-3-\",\"order_id\":\"8\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"}],\"user_ip_address\":\"192.168.1.62\",\"merchant_user_id\":null,\"token\":\"pr-7d3d29b452c061126791e2adfdfdf0b1dae3b7adec453889ffdc0dd5c5cdd1edee06fc39\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTdkM2QyOWI0NTJjMDYxMTI2NzkxZTJhZGZkZmRmMGIxZGFlM2I3YWRlYzQ1Mzg4OWZmZGMwZGQ1YzVjZGQxZWRlZTA2ZmMzOSJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-08T12:51:29.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-07 17:51:30', 5);

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
('info@vacasenvuelo.com', 'd79d575ebfb2ca4d889fc0658a7832381a552eb6', 2, 99, NULL, 2147483647),
('avalo@dragonjar.org', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 0, NULL, 2147483647);

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
-- AUTO_INCREMENT de la tabla `result`
--
ALTER TABLE `result`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
