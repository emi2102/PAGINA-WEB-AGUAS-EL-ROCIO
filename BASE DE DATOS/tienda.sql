-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2023 a las 21:34:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(10, 'Aguas'),
(11, 'Desinfectantes'),
(12, 'Detergentes'),
(13, 'Jabon'),
(14, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `usuario`, `clave`) VALUES
(1, 'emilmar', 'index', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `id_usuario`, `total`) VALUES
(1, 3, 35),
(2, 3, 35),
(3, 3, 65),
(4, 3, 65),
(5, 3, 65),
(6, 3, 65),
(7, 3, 65),
(8, 3, 65),
(9, 3, 65),
(10, 3, 65),
(11, 3, 65),
(12, 3, 65),
(13, 3, 65),
(14, 3, 65),
(15, 3, 40),
(16, 3, 182);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido-producto`
--

CREATE TABLE `pedido-producto` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioU` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `precio_rebajado` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `precio_rebajado`, `cantidad`, `imagen`, `id_categoria`) VALUES
(9, 'Dispensador', 'Dispensador de agua', '16.00', '10.00', 5, '20221018234610.jpg', 10),
(11, 'Recarga 5L', 'Recarga de envase de agua 5L', '10.00', '5.00', 100, '20221018235528.jpg', 10),
(12, 'Recarga 19L', 'Recarga de envase de 19 Litros', '15.00', '10.00', 100, '20221018235739.jpg', 10),
(13, 'Desinfectante ', 'Desinfectante olor a bebe', '26.00', '25.00', 50, '20221018235948.jpg', 11),
(14, 'Desinfectante', 'Desinfectante olor a fresa', '30.00', '28.00', 56, '20221019000124.jpg', 11),
(15, 'Detergente', 'Detergente aroma floral', '54.00', '50.00', 66, '20221019000608.jpg', 12),
(16, 'Detergente', 'Detergente con aroma a rosas', '56.00', '54.00', 45, '20221019000740.jpg', 12),
(17, 'Jabon para manos', 'Jabon para manos aroma a menta', '65.00', '64.00', 54, '20221019000933.jpg', 13),
(18, 'Lavaplatos ', 'Lavaplatos con aroma a limon', '45.00', '41.00', 100, '20221019001109.jpg', 13),
(19, 'Desengrasante', 'Desengrasante', '65.00', '60.00', 74, '20221019001351.jpg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `Nombre`, `Apellido`, `Direccion`, `Telefono`) VALUES
(3, 'emilmarpatricia@gmail.com', '$2y$10$CdPwDb8uEj68eG3gCxJ9Ye79Vq1ia8eBBhCt3XD03qzQCUJ3wY8ne', 'emilin', 'cuarez', 'sdsdwedwedfwefwefwef', '+58 414-7675878');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`) VALUES
(1, 'admin', 'Administrador', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido-producto`
--
ALTER TABLE `pedido-producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedido-producto`
--
ALTER TABLE `pedido-producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedido-producto`
--
ALTER TABLE `pedido-producto`
  ADD CONSTRAINT `pedido-producto_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `pedido-producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
