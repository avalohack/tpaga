-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 18:41:56
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
('9', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/NA==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/NA==\",\"idempotency_token\":\"NA==-6-\",\"order_id\":\"4\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-18 16:02:36', 1),
('5', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/NQ==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/NQ==\",\"idempotency_token\":\"NQ==-6-\",\"order_id\":\"5\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 21:36:14', 2),
('6', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/Ng==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/Ng==\",\"idempotency_token\":\"Ng==-6-\",\"order_id\":\"6\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 22:13:45', 3),
('7', 2, '{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/Nw==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/Nw==\",\"idempotency_token\":\"Nw==-6-\",\"order_id\":\"7\",\"terminal_id\":\"https:\\/\\/192.1', '2019-06-05 22:16:26', 4),
('2', 3, '{\"miniapp_user_token\":null,\"cost\":\"3.0\",\"purchase_details_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/success\\/OA==\",\"voucher_url\":\"https:\\/\\/192.168.1.79\\/tpaga\\/pay\\/detail\\/OA==\",\"idempotency_token\":\"OA==-3-\",\"order_id\":\"8\",\"terminal_id\":\"https:\\/\\/192.168.1.79\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"IdPlans\":\"3\",\"Name\":\"A\\u00f1o\",\"Cost\":\"3\",\"Includ\":\"Incluye Uno (4) Usuarios\"}],\"user_ip_address\":\"192.168.1.62\",\"merchant_user_id\":null,\"token\":\"pr-7d3d29b452c061126791e2adfdfdf0b1dae3b7adec453889ffdc0dd5c5cdd1edee06fc39\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTdkM2QyOWI0NTJjMDYxMTI2NzkxZTJhZGZkZmRmMGIxZGFlM2I3YWRlYzQ1Mzg4OWZmZGMwZGQ1YzVjZGQxZWRlZTA2ZmMzOSJ9fQ==\",\"status\":\"created\",\"expires_at\":\"2019-06-08T12:51:29.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}', '2019-06-18 16:02:40', 5),
('9', 2, '{\"error_code\":3,\"error_message\":\"Idempotency error: The payment request was already created\",\"data\":{\"miniapp_user_token\":null,\"cost\":\"6.0\",\"purchase_details_url\":\"https:\\/\\/vacasenvuelo.com\\/tpaga\\/pay\\/success\\/OQ==\",\"voucher_url\":\"https:\\/\\/vacasenvuelo.com\\/tpaga\\/pay\\/detail\\/OQ==\",\"idempotency_token\":\"OQ==-6-\",\"order_id\":\"9\",\"terminal_id\":\"https:\\/\\/vacasenvuelo.com\\/tpaga\\/\",\"purchase_description\":\"compar wifi Company servicios\",\"purchase_items\":[{\"Cost\":\"3\",\"Name\":\"A\\u00f1o\",\"Includ\":\"Incluye Uno (4) Usuarios\",\"IdPlans\":\"3\"},{\"Cost\":\"3\",\"Name\":\"A\\u00f1o\",\"Includ\":\"Incluye Uno (4) Usuarios\",\"IdPlans\":\"3\"}],\"user_ip_address\":\"190.60.254.249\",\"merchant_user_id\":null,\"token\":\"pr-388d22aaca36e71cd71c05285702693fa1d39cc357e93c98ac6cad73bda05685d9b0be8b\",\"tpaga_payment_url\":\"https:\\/\\/w.tpaga.co\\/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTM4OGQyMmFhY2EzNmU3MWNkNzFjMDUyODU3MDI2OTNmYTFkMzljYzM1N2U5M2M5OGFjNmNhZDczYmRhMDU2ODVkOWIwYmU4YiJ9fQ==\",\"status\":\"expired\",\"expires_at\":\"2019-06-08T19:24:17.000-05:00\",\"cancelled_at\":null,\"checked_by_merchant_at\":null,\"delivery_notification_at\":null}}', '2019-06-18 14:40:12', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `result`
--
ALTER TABLE `result`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
