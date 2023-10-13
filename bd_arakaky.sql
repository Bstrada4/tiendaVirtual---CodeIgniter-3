-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-08-2020 a las 06:25:30
-- Versión del servidor: 5.6.48-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_arakaky`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(3) NOT NULL,
  `interna` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `atributos` longtext COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `interna`, `atributos`) VALUES
(1, 'sistema', '{\"sisInfoTituloEmpresa\":\"Arakaky&#039;s\",\"sisInfoCorreo\":\"alf27_95@hotmail.com\",\"sisPieDePagina\":\"Arakaky&#039;s - Todos los derechos reservados\",\"sisFavicon\":\"favicon_1594533415.png\"}'),
(2, 'instalacion', '{\"intentoError\":\"4\",\"tiempoBloqueo\":\"5\",\"duracionCaptcha\":\"240\"}'),
(3, 'contacto_1', '{\"correo\":\"consultas-pedidos@arakakyschicken.com\",\"direccion\":\"Calle Los cedros Mz 6&deg; Urb. Shangrila &ndash; Puente piedra\",\"whatshapp_value\":\"51994698307\",\"whatshapp_name\":\"(+51) 994698307\",\"telefono_c_value\":\"51999999999\",\"telefono_c_name\":\"(+51) 999 999 999\",\"telefono_i1_value\":\"994698307\",\"telefono_i1_name\":\"(+51) 994698307\",\"telefono_i2_value\":\"994698307\",\"telefono_i2_name\":\"(+51) 933739892\"}'),
(4, 'sociales', '{\"instagram\":\"\",\"twitter\":\"https:\\/\\/twitter.com\\/ArakakyS\",\"facebook\":\"https:\\/\\/www.facebook.com\\/frescomarketarakakys\",\"youtube\":\"https:\\/\\/www.youtube.com\\/channel\\/UCge6tzsbnTFpOt5mEiQF11w\"}'),
(5, 'contacto_2', '{\"direccion\":\"Calle Los cedros Mz 6&deg; Urb. Shangrila &ndash; Puente piedra\",\"telefono_i1_value\":\"51994698307\",\"telefono_i1_name\":\"(+51) 994698307\",\"telefono_i2_value\":\"994698307\",\"telefono_i2_name\":\"(+51) 933739892\"}'),
(6, 'contacto_3', '{\"direccion\":\"Calle Los cedros Mz 6&deg; Urb. Shangrila &ndash; Puente piedra\",\"telefono_i1_value\":\"51994698307\",\"telefono_i1_name\":\"(+51) 994698307\",\"telefono_i2_value\":\"994698307\",\"telefono_i2_name\":\"(+51) 933739892\"}'),
(7, 'maps', '{\"latitud_1\":\"77.080353\",\"longitud_1\":\"11.930681\",\"latitud_2\":\"77.084972\",\"longitud_2\":\"11.927609\",\"latitud_3\":\"77.086506\",\"longitud_3\":\"11.933876\",\"latitud_4\":\"\",\"longitud_4\":\"\",\"latitud_5\":\"\",\"longitud_5\":\"\",\"latitud_6\":\"\",\"longitud_6\":\"\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(5) NOT NULL,
  `agente` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_ip` varchar(16) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(10) NOT NULL,
  `usuario_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_error`
--

CREATE TABLE `logs_error` (
  `id` int(5) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `desbloqueo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `skin` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `modulo` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `titulo`, `skin`, `modulo`, `eliminacion_logica`) VALUES
(201, 'Editor', 'btn-success', '{\"panel\":1,\"acceso\":1,\"perfil\":1,\"observar\":1,\"listar\":1,\"agregar\":1,\"editar\":1,\"permitir\":1,\"denegar\":1,\"remover\":0,\"configurar\":0}', 1),
(500, 'Administrador', 'btn-danger', '{\"panel\":1,\"acceso\":1,\"perfil\":1,\"observar\":1,\"listar\":1,\"agregar\":1,\"editar\":1,\"permitir\":1,\"denegar\":1,\"remover\":1,\"configurar\":1}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(160) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `rol_id` int(1) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL,
  `usuario_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `correo`, `clave`, `nombre`, `apellido`, `imagen`, `fecha_registro`, `fecha_modificacion`, `rol_id`, `eliminacion_logica`, `usuario_id`) VALUES
(1, 'admin', 'alf199527@gmail.com', '$2y$10$sET63w3bqVzEADIjNhM8i.SVaDPT7FcoqAIVRaMjFFu5D4cHuAOfG', 'Luis', 'Lopez', '', 1568339307, 1576268482, 500, 1, 0),
(2, 'daniel', 'daniel01@gmail.com', '$2y$10$P47MIyZhOBUOgcEvjHA.r.FIr5XCqifca6Xug9loG4aQ0wM5xlmEa', 'Daniel', 'Velazco', '', 1576511587, 1595043996, 201, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_categoria`
--

CREATE TABLE `web_categoria` (
  `id` int(1) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_categoria`
--

INSERT INTO `web_categoria` (`id`, `titulo`, `subtitulo`, `slug`, `imagen`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'Fresco Entero', '', 'fresco-entero', 'categoria1_1595642850.jpg', 1, 1595142618, 1595642850, 1, 1),
(2, 'Frescos', '', 'frescos', 'categoria2_1595643123.jpg', 2, 1595142675, 1595643123, 1, 1),
(3, 'Preparados', '', 'preparados', 'categoria5_1595643914.jpg', 5, 1595142729, 1595643914, 1, 1),
(4, 'Huevos', '', 'huevos', '', 6, 1595142736, 0, 1, 1),
(5, 'Otras Carnes', '', 'otras-carnes', 'categoria3_1595643192.jpg', 4, 1595142744, 1595643192, 1, 1),
(6, 'Complementos', '', 'complementos', '', 7, 1595142752, 0, 1, 1),
(7, 'Trozados', '', 'trozados', 'categoria4_1595643266.jpg', 3, 1595643266, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_clasificacion`
--

CREATE TABLE `web_clasificacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_clasificacion`
--

INSERT INTO `web_clasificacion` (`id`, `titulo`, `slug`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'Rollitos de pollo 1', 'rollitos-de-pollo-1', 1, 1594543564, 1594777794, 1, 1),
(2, 'Rollitos de pollo 2', 'rollitos-de-pollo-2', 2, 1594591597, 1594778170, 1, 1),
(3, 'Rollitos de pollo 3', 'rollitos-de-pollo-3', 3, 1594778181, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_clientes`
--

CREATE TABLE `web_clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(220) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `celular` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(160) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL,
  `llave` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_clientes`
--

INSERT INTO `web_clientes` (`id`, `nombre`, `celular`, `direccion`, `email`, `usuario`, `clave`, `imagen`, `fecha_registro`, `fecha_modificacion`, `eliminacion_logica`, `llave`) VALUES
(1, 'Luis Alfredo', '99999999', '', 'alf199527@gmail.com', 'alf199527@gmail.com', '$2y$10$4mRL.dx.OLzyUoim8QtRAuBofdSmDPvUVb0ezjhdyMA/CihxHU87S', '', 1595655144, 1595661361, 1, '8dca636f33886ba74de7f3950311def8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_cotizacion`
--

CREATE TABLE `web_cotizacion` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pedido_id` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `total` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_cotizacion`
--

INSERT INTO `web_cotizacion` (`id`, `customer_id`, `pedido_id`, `nombre`, `telefono`, `email`, `direccion`, `mensaje`, `total`, `fecha_registro`, `fecha_modificacion`, `estado`, `eliminacion_logica`) VALUES
(1, 1, '', 'Luis Alfredo', '99999999', 'alf199527@gmail.com', 'Carabayllo', '', '42', 1595655868, 0, 0, 0),
(2, 1, '', 'Luis Alfredo', '99999999', 'alf199527@gmail.com', 'Carabayllo', '', '62', 1595656633, 0, 0, 0),
(3, 1, '', 'Luis Alfredo', '99999999', 'alf199527@gmail.com', 'Carabayllo', '', '62', 1595657047, 0, 0, 0),
(4, 1, '', 'Luis Alfredo', '99999999', 'alf199527@gmail.com', 'Carabayllo', '', '62', 1595657261, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_cotizacion_item`
--

CREATE TABLE `web_cotizacion_item` (
  `id` int(11) NOT NULL,
  `cotizacion_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` decimal(5,0) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_cotizacion_item`
--

INSERT INTO `web_cotizacion_item` (`id`, `cotizacion_id`, `producto_id`, `titulo`, `precio`, `cantidad`) VALUES
(1, 1, 2, 'Pollo Entero sin menudencia', 22, 1),
(2, 1, 5, 'Filete de Pechuga Especial', 20, 1),
(3, 2, 2, 'Pollo Entero sin menudencia', 22, 1),
(4, 2, 5, 'Filete de Pechuga Especial', 20, 1),
(5, 2, 4, 'Pierna con encuentro', 20, 1),
(6, 3, 2, 'Pollo Entero sin menudencia', 22, 1),
(7, 3, 5, 'Filete de Pechuga Especial', 20, 1),
(8, 3, 4, 'Pierna con encuentro', 20, 1),
(9, 4, 2, 'Pollo Entero sin menudencia', 22, 1),
(10, 4, 5, 'Filete de Pechuga Especial', 20, 1),
(11, 4, 4, 'Pierna con encuentro', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_icon`
--

CREATE TABLE `web_icon` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `icono` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_icon`
--

INSERT INTO `web_icon` (`id`, `titulo`, `icono`, `eliminacion_logica`) VALUES
(1, 'Inyección', 'fa-syringe', 1),
(2, 'Pollo', 'fa-turkey', 1),
(3, 'Huevo frito', 'fa-egg-fried', 1),
(4, 'Persona', 'fa-user', 1),
(5, 'Huevo', 'fa-egg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_mitos`
--

CREATE TABLE `web_mitos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `icono_id` int(11) NOT NULL,
  `icono` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen_home` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_mitos`
--

INSERT INTO `web_mitos` (`id`, `titulo`, `subtitulo`, `slug`, `descripcion`, `icono_id`, `icono`, `imagen`, `imagen_home`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'MITO N° 1', '&ldquo;La yema no se debe comer porque tiene mucho colesterol&rdquo;', 'mito-n0-1', '<p>&iexcl;No! Nosotros buscamos siempre el bienestar de nuestros pollos, de ninguna manera los tenemos bajo condiciones de maltrato, enfermedad, desnutrici&oacute;n o estr&eacute;s.</p>\r\n\r\n<p>Las aves requieren de las mejores condiciones posibles para su desarrollo; por ello, nosotros las alojamos en granjas donde se monitorean sus necesidades y se busca su confort, con el equipamiento para su alimentaci&oacute;n e hidrataci&oacute;n adecuada, y bajo la supervisi&oacute;n de veterinarios.</p>\r\n', 1, '<i class=»fad fa-turkey«></i>', 'mito1_1594943731.jpg', '', 1, 1594943731, 1596211083, 1, 1),
(2, 'MITO N° 2', '&ldquo;Los pollos sufren graves maltratos y trato inhumano&rdquo;', 'mito-n0-2', '<p>&iexcl;No! Nosotros buscamos siempre el bienestar de nuestros pollos, de ninguna manera los tenemos bajo condiciones de maltrato, enfermedad, desnutrici&oacute;n o estr&eacute;s.</p>\r\n\r\n<p>Las aves requieren de las mejores condiciones posibles para su desarrollo; por ello, nosotros las alojamos en granjas donde se monitorean sus necesidades y se busca su confort, con el equipamiento para su alimentaci&oacute;n e hidrataci&oacute;n adecuada, y bajo la supervisi&oacute;n de veterinarios.</p>\r\n', 1, '<i class=»fad fa-turkey«></i>', 'mito1_1594943761.jpg', '', 2, 1594943761, 1596211071, 1, 1),
(3, 'MITO N° 3', '&ldquo;El huevo engorda&rdquo;', 'mito-n0-3', '<p>&iexcl;No! Nosotros buscamos siempre el bienestar de nuestros pollos, de ninguna manera los tenemos bajo condiciones de maltrato, enfermedad, desnutrici&oacute;n o estr&eacute;s.</p>\r\n\r\n<p>Las aves requieren de las mejores condiciones posibles para su desarrollo; por ello, nosotros las alojamos en granjas donde se monitorean sus necesidades y se busca su confort, con el equipamiento para su alimentaci&oacute;n e hidrataci&oacute;n adecuada, y bajo la supervisi&oacute;n de veterinarios.</p>\r\n', 1, '<i class=»fad fa-turkey«></i>', 'mito1_1594943785.jpg', '', 3, 1594943785, 1596211058, 1, 1),
(4, 'MITO N° 4', '“A los pollos les inyectan hormonas para que engorden más”', 'mito-n0-4', '<p>&iexcl;No! Nosotros buscamos siempre el bienestar de nuestros pollos, de ninguna manera los tenemos bajo condiciones de maltrato, enfermedad, desnutrici&oacute;n o estr&eacute;s.</p>\r\n\r\n<p>Las aves requieren de las mejores condiciones posibles para su desarrollo; por ello, nosotros las alojamos en granjas donde se monitorean sus necesidades y se busca su confort, con el equipamiento para su alimentaci&oacute;n e hidrataci&oacute;n adecuada, y bajo la supervisi&oacute;n de veterinarios.</p>\r\n', 2, '<i class=»fad fa-turkey«></i>', 'mito1_1594943880.jpg', '', 4, 1594943880, 1596211445, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_nosotros`
--

CREATE TABLE `web_nosotros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_1` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_2` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_3` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje_1` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje_2` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje_3` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje_4` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje_5` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_nosotros`
--

INSERT INTO `web_nosotros` (`id`, `titulo`, `descripcion_1`, `descripcion_2`, `descripcion_3`, `mensaje_1`, `mensaje_2`, `mensaje_3`, `mensaje_4`, `mensaje_5`, `imagen`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'test', '<p>Arakaky&rsquo;s fue creada en el a&ntilde;o 1999, venimos trabajando en conjunto con nuestros clientes, consumidores mayoristas y minoristas, es por ustedes que hoy en d&iacute;a seguimos trabajando con mucho esfuerzo mejorando e innovando, para brindarles la mejor calidad en todos nuestros productos, llegando a todos los hogares.</p>\r\n', '<p>Estar siempre a la vanguardia de la industria de alimentos, cumplir las exigencias del mercado nacional de productos c&aacute;rnicos y sus complementos, ya que la sociedad avanza hacia una vida m&aacute;s saludable, a trav&eacute;s de nuestra filosof&iacute;a calidad a precios justos.</p>\r\n', '<p>Ser la mayor cadena distribuidora de productos c&aacute;rnicos, llegar a todas las familias peruanas, a trav&eacute;s de los lineamientos y pol&iacute;ticas de la empresa que realizan el trabajo en equipo.</p>\r\n', 'Seguimos todos los protocolos establecidos', 'Simple y pr&aacute;ctico', 'Nuestras certificaciones nos respaldan', 'Todos los d&iacute;as, desde las mejores granjas', 'Para todas las familias, mayoristas y minoristas', 'nosotros_1595046766.png', 1595033715, 1596162951, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_nutricion`
--

CREATE TABLE `web_nutricion` (
  `id` int(5) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_corta` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(350) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen_home` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(5) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_nutricion`
--

INSERT INTO `web_nutricion` (`id`, `titulo`, `slug`, `descripcion`, `descripcion_corta`, `imagen`, `imagen_home`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'POLLOS', 'pollos', '<p>El pollo es una de las carnes m&aacute;s ricas, es muy sana, y accesible a todos los bolsillos.</p>\r\n\r\n<ul>\r\n	<li><strong>El pollo es una muy buena fuente de prote&iacute;na magra de alta calidad</strong>, es decir es una prote&iacute;na limpia muy baja en grasas. La prote&iacute;na es esencial para el crecimiento y desarrollo.</li>\r\n	<li><strong>Como es una carne baja en grasa, el pollo es ideal para controlar el peso</strong>. La mejor forma es comerlo a la plancha o cocido y eliminar la piel por su contenido graso. La pechuga de pollo es la parte que contiene menos grasa.</li>\r\n	<li><strong>Es una fuente de minerales</strong>. El pollo aporta potasio, magnesio, calcio, f&oacute;sforo, hierro, zinc y selenio. Estos minerales contribuyen a un buen estado neuromuscular y facilitan el trabajo de contracci&oacute;n de los m&uacute;sculos, as&iacute; como la transmisi&oacute;n del impulso nervioso. El pollo adem&aacute;s es muy rico en vitaminas, sobre todo vitaminas del complejo B.</li>\r\n	<li><strong>Es una carne muy vers&aacute;til</strong>&nbsp;ya que se puede preparar en muchas preparaciones y combina muy bien con otros alimentos.</li>\r\n	<li><strong>Es una carne de muy f&aacute;cil digesti&oacute;n</strong>&nbsp;por su bajo aporte en grasas, por eso puede ser consumida sin problemas por ni&ntilde;os, adultos y ancianos.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>&nbsp;Carne alta en prote&iacute;nas</li>\r\n	<li>&nbsp;Bajo en grasas</li>\r\n	<li>&nbsp;Contiene potasio, calcio, magnesio...</li>\r\n	<li>&nbsp;Fuente de minerales</li>\r\n</ul>\r\n', 'pollo_contenido_1594539528.jpg', 'pollo_1594777056.png', 1, 1594538152, 1594777056, 1, 1),
(2, 'HUEVOS', 'huevos', '<p>El pollo es una de las carnes m&aacute;s ricas, es muy sana, y accesible a todos los bolsillos.</p>\r\n\r\n<ul>\r\n	<li><strong>El pollo es una muy buena fuente de prote&iacute;na magra de alta calidad</strong>, es decir es una prote&iacute;na limpia muy baja en grasas. La prote&iacute;na es esencial para el crecimiento y desarrollo.</li>\r\n	<li><strong>Como es una carne baja en grasa, el pollo es ideal para controlar el peso</strong>. La mejor forma es comerlo a la plancha o cocido y eliminar la piel por su contenido graso. La pechuga de pollo es la parte que contiene menos grasa.</li>\r\n	<li><strong>Es una fuente de minerales</strong>. El pollo aporta potasio, magnesio, calcio, f&oacute;sforo, hierro, zinc y selenio. Estos minerales contribuyen a un buen estado neuromuscular y facilitan el trabajo de contracci&oacute;n de los m&uacute;sculos, as&iacute; como la transmisi&oacute;n del impulso nervioso. El pollo adem&aacute;s es muy rico en vitaminas, sobre todo vitaminas del complejo B.</li>\r\n	<li><strong>Es una carne muy vers&aacute;til</strong>&nbsp;ya que se puede preparar en muchas preparaciones y combina muy bien con otros alimentos.</li>\r\n	<li><strong>Es una carne de muy f&aacute;cil digesti&oacute;n</strong>&nbsp;por su bajo aporte en grasas, por eso puede ser consumida sin problemas por ni&ntilde;os, adultos y ancianos</li>\r\n</ul>\r\n', '<ul>\r\n	<li>&nbsp;Carne alta en prote&iacute;nas</li>\r\n	<li>&nbsp;Bajo en grasas</li>\r\n	<li>&nbsp;Contiene potasio, calcio, magnesio...</li>\r\n	<li>&nbsp;Fuente de minerales</li>\r\n</ul>\r\n', 'huevos_min__1__1596301281.jpg', 'huevo_1594777173.png', 2, 1594777173, 1596301281, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_productos`
--

CREATE TABLE `web_productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subtitulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `oferta` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_productos`
--

INSERT INTO `web_productos` (`id`, `titulo`, `subtitulo`, `slug`, `descripcion`, `precio`, `oferta`, `imagen`, `categoria_id`, `cantidad`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, 'Pollo trozado en 8 Sin Menudencia', 'Rango de peso entre 1.8 - 2Kg', 'pollo-trozado-en-8-sin-menudencia', '<p>Su esencia Scooter se refleja en su f&aacute;cil manejo, maniobrabilidad y ligeraza. Una moto ideal para principiantes que har&aacute; de la conducci&oacute;n un verdadero disfrute, gracias a su transmisi&oacute;n.</p>\r\n', 25.00, '', 'producto1_1595290297.jpg', 2, 0, 1, 1595290297, 1595644739, 1, 1),
(2, 'Pollo Entero sin menudencia', 'Rango de peso entre 1.8 - 2Kg', 'pollo-entero-sin-menudencia', '<p>Su esencia Scooter se refleja en su f&aacute;cil manejo, maniobrabilidad y ligeraza. Una moto ideal para principiantes que har&aacute; de la conducci&oacute;n un verdadero disfrute, gracias a su transmisi&oacute;n.</p>\r\n', 22.00, '', 'producto2_1595290661.jpg', 1, 0, 1, 1595290661, 1595638667, 1, 1),
(3, 'Muslos', 'Rango de peso entre 1.8 - 2Kg', 'muslos', '<p>Su esencia Scooter se refleja en su f&aacute;cil manejo, maniobrabilidad y ligeraza. Una moto ideal para principiantes que har&aacute; de la conducci&oacute;n un verdadero disfrute, gracias a su transmisi&oacute;n.</p>\r\n', 30.00, '', 'producto3_1595290720.jpg', 1, 0, 3, 1595290720, 1595638675, 1, 1),
(4, 'Pierna con encuentro', 'Rango de peso entre 1.8 - 2Kg', 'pierna-con-encuentro', '', 20.00, '', 'producto4_1595290766.jpg', 1, 0, 4, 1595290766, 0, 1, 1),
(5, 'Filete de Pechuga Especial', 'Rango de peso entre 1.8 - 2Kg', 'filete-de-pechuga-especial', '', 20.00, '', 'producto5_1595290809.jpg', 1, 0, 2, 1595290809, 0, 1, 1),
(6, 'TIGER EXPLORER XCX', 'Rango de peso entre 1.8 - 2Kg', 'tiger-explorer-xcx', '', 20.00, '', 'producto6_1595290863.jpg', 1, 0, 5, 1595290863, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_recetas`
--

CREATE TABLE `web_recetas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `eliminacion_logica` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_recetas`
--

INSERT INTO `web_recetas` (`id`, `titulo`, `subtitulo`, `slug`, `descripcion`, `categoria_id`, `imagen`, `posicion`, `fecha_registro`, `fecha_modificacion`, `usuario_id`, `eliminacion_logica`) VALUES
(1, ' Rollitos de pollo con jamón y queso 1', '800 - 1400 kcal', 'rollitos-de-pollo-con-jamon-y-queso-1', '<p>Ingredientes para 4 personas</p>\r\n\r\n<ul>\r\n	<li>Filetes de pechuga de pollo finos</li>\r\n	<li>Jam&oacute;n serrano</li>\r\n	<li>Queso crema</li>\r\n	<li>Harina</li>\r\n	<li>Huevo</li>\r\n	<li>Sal</li>\r\n</ul>\r\n\r\n<p>Comenzamos colocando los filetes de pechuga sobre una superficie plana (como una tabla de cortar) bien extendidos. A continuaci&oacute;n, los untaremos con una capita de queso crema y pondremos una loncha de jam&oacute;n encima (m&aacute;s peque&ntilde;a que el filete).</p>\r\n\r\n<p>Ahora iremos enrollando los filetes y pincharemos con un palillo el pliegue para que no se desenrollen.</p>\r\n\r\n<p>Finalizado el paso anterior, sazonaremos los rollitos (aunque sin pasarnos porque el jam&oacute;n va a aportar salaz&oacute;n) y los iremos pasando por harina, huevo batido y pan rallado.</p>\r\n\r\n<p>En este momento pondremos un cazo o una sart&eacute;n al fuego con abundante aceite y cuando est&eacute; caliente iremos friendo los rollitos a fuego medio hasta que el empanado quede bien dorado y crujiente.</p>\r\n\r\n<p>Seg&uacute;n se vayan haciendo, sacaremos los rollitos de pechuga a un plato con un papel absorbente para quitar el exceso de grasa. Luego es cuesti&oacute;n de llevarlos a la mesa para comerlos.</p>\r\n', 1, 'receta1_1594778317.jpg', 1, 1594587641, 1594862714, 1, 1),
(2, ' Rollitos de pollo con jamón y queso 3', '800 - 1400 kcal', 'rollitos-de-pollo-con-jamon-y-queso-3', '<p><strong>Paso1:</strong>&nbsp;Corta el pollo creando lonchas finas. Sazona las pechugas con una pastilla de Avecrem Caldo de Pollo desmenuzada. Corta las lonchas de jam&oacute;n y el queso de las misma forma. Extiende una lonchita de jam&oacute;n y una de queso sobre cada uno de los rect&aacute;ngulos de pechuga de pollo. Enr&oacute;llalas sobre s&iacute; mismas...</p>\r\n', 1, 'receta1_1594778470.jpg', 2, 1594588155, 1594778470, 1, 1),
(3, ' Rollitos de pollo con jamón y queso 2', '800 - 1400 kcal', 'rollitos-de-pollo-con-jamon-y-queso-2', '<p><strong>Paso1:</strong>&nbsp;Corta el pollo creando lonchas finas. Sazona las pechugas con una pastilla de Avecrem Caldo de Pollo desmenuzada. Corta las lonchas de jam&oacute;n y el queso de las misma forma. Extiende una lonchita de jam&oacute;n y una de queso sobre cada uno de los rect&aacute;ngulos de pechuga de pollo. Enr&oacute;llalas sobre s&iacute; mismas...</p>\r\n', 2, 'receta1_1594778409.jpg', 1, 1594591627, 1594778409, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_slider`
--

CREATE TABLE `web_slider` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(370) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_modificacion` int(11) NOT NULL,
  `eliminacion_logica` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `web_slider`
--

INSERT INTO `web_slider` (`id`, `titulo`, `url`, `imagen`, `posicion`, `fecha_registro`, `fecha_modificacion`, `eliminacion_logica`, `usuario_id`) VALUES
(2, 'slider 2', '', 'slider2_1594532052.jpg', 2, 1594532052, 0, 1, 1),
(3, 'slider3', '', 'slider5_min_1596300790.jpg', 3, 1596161225, 1596300790, 1, 1),
(4, 'Slider4', '', 'slider6_min_1596300807.jpg', 4, 1596161265, 1596300808, 1, 1),
(5, 'Slider5', '', 'slider4_min_1596300740.jpg', 1, 1596161292, 1596300740, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs_error`
--
ALTER TABLE `logs_error`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_categoria`
--
ALTER TABLE `web_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_clasificacion`
--
ALTER TABLE `web_clasificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_clientes`
--
ALTER TABLE `web_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_cotizacion`
--
ALTER TABLE `web_cotizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_cotizacion_item`
--
ALTER TABLE `web_cotizacion_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_icon`
--
ALTER TABLE `web_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_mitos`
--
ALTER TABLE `web_mitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_nosotros`
--
ALTER TABLE `web_nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_nutricion`
--
ALTER TABLE `web_nutricion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_productos`
--
ALTER TABLE `web_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_recetas`
--
ALTER TABLE `web_recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `web_slider`
--
ALTER TABLE `web_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `logs_error`
--
ALTER TABLE `logs_error`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_categoria`
--
ALTER TABLE `web_categoria`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `web_clasificacion`
--
ALTER TABLE `web_clasificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `web_clientes`
--
ALTER TABLE `web_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_cotizacion`
--
ALTER TABLE `web_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `web_cotizacion_item`
--
ALTER TABLE `web_cotizacion_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `web_icon`
--
ALTER TABLE `web_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `web_mitos`
--
ALTER TABLE `web_mitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `web_nosotros`
--
ALTER TABLE `web_nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `web_nutricion`
--
ALTER TABLE `web_nutricion`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `web_productos`
--
ALTER TABLE `web_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `web_recetas`
--
ALTER TABLE `web_recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `web_slider`
--
ALTER TABLE `web_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
