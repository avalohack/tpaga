-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 22:28:20
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
('1', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('13', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('13', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('13', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('15', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('15', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('15', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('16', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('16', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('16', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('18', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('18', 3, 'Año', 3, 'Incluye Uno (4) Usuarios'),
('18', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('19', 1, 'Semanal', 1, 'Incluye Uno (1) Usuarios'),
('19', 2, 'Mensual', 2, 'Incluye Uno (2) Usuarios'),
('19', 3, 'Año', 3, 'Incluye Uno (4) Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `cost` int(10) NOT NULL,
  `purchase_details_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idempotency_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `terminal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pay` int(1) NOT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`cost`, `purchase_details_url`, `voucher_url`, `idempotency_token`, `order_id`, `terminal_id`, `purchase_description`, `user_ip_address`, `expires_at`, `IdUser`, `Timestamp`, `pay`, `idAdmin`) VALUES
(3, 'https://192.168.1.79/tpaga/pay/success/MQ==', 'https://192.168.1.79/tpaga/pay/detail/MQ==', 'MQ==-3-', 12, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T14:25:44.000-05:00', 2, '2019-06-18 19:27:37', 0, NULL),
(6, 'https://192.168.1.79/tpaga/pay/success/MTM=', 'https://192.168.1.79/tpaga/pay/detail/MTM=', 'MTM=-6-', 13, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T14:27:57.000-05:00', 2, '2019-06-18 19:27:57', 0, NULL),
(0, 'https://192.168.1.79/tpaga/pay/success/MTQ=', 'https://192.168.1.79/tpaga/pay/detail/MTQ=', 'MTQ=-0-', 14, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T14:29:26.000-05:00', 2, '2019-06-18 19:29:26', 0, NULL),
(6, 'https://192.168.1.79/tpaga/pay/success/MTU=', 'https://192.168.1.79/tpaga/pay/detail/MTU=', 'MTU=-6-', 15, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T14:29:54.000-05:00', 2, '2019-06-18 19:29:54', 0, NULL),
(6, 'https://192.168.1.79/tpaga/pay/success/MTY=', 'https://192.168.1.79/tpaga/pay/detail/MTY=', 'MTY=-6-', 16, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T15:06:07.000-05:00', 4, '2019-06-18 20:06:07', 0, NULL),
(0, 'https://192.168.1.79/tpaga/pay/success/MTc=', 'https://192.168.1.79/tpaga/pay/detail/MTc=', 'MTc=-0-', 17, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T15:11:33.000-05:00', 2, '2019-06-18 20:11:33', 0, NULL),
(6, 'https://192.168.1.79/tpaga/pay/success/MTg=', 'https://192.168.1.79/tpaga/pay/detail/MTg=', 'MTg=-6-', 18, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T15:13:58.000-05:00', 2, '2019-06-18 20:13:58', 0, NULL),
(6, 'https://192.168.1.79/tpaga/pay/success/MTk=', 'https://192.168.1.79/tpaga/pay/detail/MTk=', 'MTk=-6-', 19, 'https://192.168.1.79/tpaga/', 'compar wifi Company servicios', '192.168.1.79', '2019-06-19T15:22:56.000-05:00', 5, '2019-06-18 20:22:56', 0, NULL);

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
('1', 2, '{\"error_code\":3,\"error_message\":\"Idempotency error: The payment request was already created\",\"data\":{\"miniapp_user_token\":null,\"cost\":\"3.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MQ==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MQ==\",\"idempotency_token\":\"MQ==-3-\",\"order_id\":\"1\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"Cost\":\"1\",\"Name\":\"Semanal\",\"Includ\":\"Incluye Uno (1) Usuarios\",\"IdPlans\":\"1\",\"cantidad\":\"1\"},{\"Cost\":\"2\",\"Name\":\"Mensual\",\"Includ\":\"Incluye Uno (2) Usuarios\",\"IdPlans\":\"2\",\"cantidad\":\"2\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-4938b192d9c11cd69a7b0ef6592ee12b19e1e4cb39772ab643dbed389959a97c604986cf\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTQ5MzhiMTkyZDljMTFjZDY5YTdiMGVmNjU5MmVlMTJiMTllMWU0Y2IzOTc3MmFiNjQzZGJlZDM4OTk1OWE5N2M2MDQ5ODZjZiJ9fQ==\",\"status\":\"expired\",\"expires_at\":\"2019-06-01T17:16:42.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}}', '2019-06-18 19:25:45', 1),
('13', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MTM=\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MTM=\",\"idempotency_token\":\"MTM=-6-\",\"order_id\":\"13\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"2\",\"Name\":\"Mensual\",\"Cost\":\"2\",\"Includ\":\"Incluye Uno (2) Usuarios\"},{\"IdPlans\":\"1\",\"Name\":\"Semanal\",\"Cost\":\"1\",\"Includ\":\"Incluye Uno (1) Usuarios\"},{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-06895425021bbb6ead820db305f28d074ca49ef2ac9e40c11c370702109598f1d494f386\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTA2ODk1NDI1MDIxYmJiNmVhZDgyMGRiMzA1ZjI4ZDA3NGNhNDllZjJhYzllNDBjMTFjMzcwNzAyMTA5NTk4ZjFkNDk0ZjM4NiJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-19T14:27:57.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 19:27:58', 2),
('14', 2, '{\"error_code\":1,\"error_message\":\"Input error: must be greater than 0\",\"field_name\":\"cost\",\"rejected_value\":0}', '2019-06-18 19:29:26', 3),
('15', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MTU=\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MTU=\",\"idempotency_token\":\"MTU=-6-\",\"order_id\":\"15\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"},{\"IdPlans\":\"2\",\"Name\":\"Mensual\",\"Cost\":\"2\",\"Includ\":\"Incluye Uno (2) Usuarios\"},{\"IdPlans\":\"1\",\"Name\":\"Semanal\",\"Cost\":\"1\",\"Includ\":\"Incluye Uno (1) Usuarios\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-c405483ac7c249d69dd848ae1cc43f0c59e538666664416b075e6565c53e6fa256287255\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLWM0MDU0ODNhYzdjMjQ5ZDY5ZGQ4NDhhZTFjYzQzZjBjNTllNTM4NjY2NjY0NDE2YjA3NWU2NTY1YzUzZTZmYTI1NjI4NzI1NSJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-19T14:29:54.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 19:29:54', 4),
('16', 4, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MTY=\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MTY=\",\"idempotency_token\":\"MTY=-6-\",\"order_id\":\"16\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"2\",\"Name\":\"Mensual\",\"Cost\":\"2\",\"Includ\":\"Incluye Uno (2) Usuarios\"},{\"IdPlans\":\"1\",\"Name\":\"Semanal\",\"Cost\":\"1\",\"Includ\":\"Incluye Uno (1) Usuarios\"},{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-800064dafd5efa827c69b20252a51996ec8c59e5d560084c7da53451a95424717eaecf98\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTgwMDA2NGRhZmQ1ZWZhODI3YzY5YjIwMjUyYTUxOTk2ZWM4YzU5ZTVkNTYwMDg0YzdkYTUzNDUxYTk1NDI0NzE3ZWFlY2Y5OCJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-19T15:06:07.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 20:06:08', 5),
('17', 2, 'null', '2019-06-18 20:11:33', 6),
('18', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MTg=\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MTg=\",\"idempotency_token\":\"MTg=-6-\",\"order_id\":\"18\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"2\",\"Name\":\"Mensual\",\"Cost\":\"2\",\"Includ\":\"Incluye Uno (2) Usuarios\"},{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"},{\"IdPlans\":\"1\",\"Name\":\"Semanal\",\"Cost\":\"1\",\"Includ\":\"Incluye Uno (1) Usuarios\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-eeda559d472b4a1d0dbc562396ff44ecd9ec7971b9b008299382f20e0af8cc33a079aeda\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLWVlZGE1NTlkNDcyYjRhMWQwZGJjNTYyMzk2ZmY0NGVjZDllYzc5NzFiOWIwMDgyOTkzODJmMjBlMGFmOGNjMzNhMDc5YWVkYSJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-19T15:13:58.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 20:13:59', 7),
('19', 5, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/MTk=\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/MTk=\",\"idempotency_token\":\"MTk=-6-\",\"order_id\":\"19\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"1\",\"Name\":\"Semanal\",\"Cost\":\"1\",\"Includ\":\"Incluye Uno (1) Usuarios\"},{\"IdPlans\":\"2\",\"Name\":\"Mensual\",\"Cost\":\"2\",\"Includ\":\"Incluye Uno (2) Usuarios\"},{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"}],\"user_ip_address\":\"192.168.1.79\",\"merchant_user_id\":null,\"token\":\"pr-95b44503e0131a6ba94fbd14a0340804650c2f695d67777af9ef1e310895b97d134fb83b\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTk1YjQ0NTAzZTAxMzFhNmJhOTRmYmQxNGEwMzQwODA0NjUwYzJmNjk1ZDY3Nzc3YWY5ZWYxZTMxMDg5NWI5N2QxMzRmYjgzYiJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-19T15:22:56.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 20:22:57', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reversepay`
--

CREATE TABLE `reversepay` (
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` text COLLATE utf8_unicode_ci,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idAdmin` int(1) NOT NULL
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Email`, `Password`, `IdUser`, `Tipo`, `Nickname`, `Phone`) VALUES
('info@vacasenvuelo.com', 'd79d575ebfb2ca4d889fc0658a7832381a552eb6', 2, 99, NULL, 2147483647),
('a@a.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 0, '123456', 99999987);

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
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
