-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 13:11:08
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
-- Base de datos: `masquecafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `rol` varchar(30) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` varchar(101) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `apellidos`, `nacimiento`, `rol`, `ciudad`, `genero`, `correo`, `clave`) VALUES
('Gabriel', 'Quevedo', '2006-11-08', 'Administrador', 'medellin', 'hombre', 'gabriel@gmail.com', 'e446ef258f8b20d78303ffa1be6ed621'),
('Jeffrey', 'Suarez', '2024-10-23', 'Administrador', 'medellin', 'hombre', 'jeffrey@gmail.com', '8068c76c7376bc08e2836ab26359d4a4'),
('santiago', 'londoño', '2007-07-19', 'Administrador', 'medellin', 'hombre', 'sattlon07@gmail.com', '85b4606870c042d3a810e9343c905803');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_producto` int(11) NOT NULL,
  `nombre_comprador` varchar(60) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `cantidad` int(200) DEFAULT NULL,
  `precio_unitario` int(200) DEFAULT NULL,
  `precio_total` int(200) DEFAULT NULL,
  `metodo_pago` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre` varchar(60) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `mensaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `correo`, `telefono`, `mensaje`) VALUES
('Juguete', 'jeffreysuarez232008@gmail.com', '4323', 'fdsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojadevidaaspirante`
--

CREATE TABLE `hojadevidaaspirante` (
  `apellidos` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `telefono` varchar(18) DEFAULT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `profesion` varchar(60) DEFAULT NULL,
  `estado_civil` varchar(60) DEFAULT NULL,
  `tiempo_experiencia` int(100) DEFAULT NULL,
  `tipo_documento` varchar(70) DEFAULT NULL,
  `numero_documento` int(10) NOT NULL,
  `expedida` varchar(100) DEFAULT NULL,
  `vehiculo` varchar(10) DEFAULT NULL,
  `licencia_conducir` varchar(20) DEFAULT NULL,
  `categoria` varchar(200) DEFAULT NULL,
  `perfil_laboral` longtext DEFAULT NULL,
  `trabaja_actualmente` varchar(30) DEFAULT NULL,
  `que_empresa` varchar(100) DEFAULT NULL,
  `empleado_independiente` varchar(60) DEFAULT NULL,
  `tipo_contrato` longtext DEFAULT NULL,
  `trabajo_antes` varchar(30) DEFAULT NULL,
  `solicito_antes` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `conoce_equipo` varchar(30) DEFAULT NULL,
  `nombre_conocido` varchar(60) DEFAULT NULL,
  `parientes_aqui` varchar(20) DEFAULT NULL,
  `nombre_pariente` varchar(60) DEFAULT NULL,
  `conocimiento_vacante` varchar(70) DEFAULT NULL,
  `trabajar_otro_lugar` varchar(50) DEFAULT NULL,
  `vive_en_casa` varchar(50) DEFAULT NULL,
  `nombre_arrendador` varchar(100) DEFAULT NULL,
  `telefono_arrendador` int(18) DEFAULT NULL,
  `tiempo_residencia` varchar(100) DEFAULT NULL,
  `ingreso_adicional` varchar(20) DEFAULT NULL,
  `cantidad` int(250) DEFAULT NULL,
  `obligaciones_mensuales` varchar(250) DEFAULT NULL,
  `porque_conceptos` longtext DEFAULT NULL,
  `aspiracion_salarial` int(250) DEFAULT NULL,
  `principal_aficion` varchar(250) DEFAULT NULL,
  `practica_deporte` varchar(20) DEFAULT NULL,
  `cual` varchar(250) DEFAULT NULL,
  `reconocimiento_actividades` longtext DEFAULT NULL,
  `cualDeporte` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hojadevidaaspirante`
--

INSERT INTO `hojadevidaaspirante` (`apellidos`, `nombre`, `nacimiento`, `lugar_nacimiento`, `direccion`, `ciudad`, `telefono`, `celular`, `correo`, `nacionalidad`, `profesion`, `estado_civil`, `tiempo_experiencia`, `tipo_documento`, `numero_documento`, `expedida`, `vehiculo`, `licencia_conducir`, `categoria`, `perfil_laboral`, `trabaja_actualmente`, `que_empresa`, `empleado_independiente`, `tipo_contrato`, `trabajo_antes`, `solicito_antes`, `fecha`, `conoce_equipo`, `nombre_conocido`, `parientes_aqui`, `nombre_pariente`, `conocimiento_vacante`, `trabajar_otro_lugar`, `vive_en_casa`, `nombre_arrendador`, `telefono_arrendador`, `tiempo_residencia`, `ingreso_adicional`, `cantidad`, `obligaciones_mensuales`, `porque_conceptos`, `aspiracion_salarial`, `principal_aficion`, `practica_deporte`, `cual`, `reconocimiento_actividades`, `cualDeporte`, `imagen`) VALUES
('eerwre', 'jeffrey', '2024-10-02', 'Medellin', 'dffsdfds', 'Medellin', '23423324', '324545443', 'g@gmail.com', 'Colombiana', 'hjh', 'Soltero', 456, 'CC', 76877, '2024-10-08', 'SI', 'SI', 'eerwr', 'rewrewewr', 'SI', 'erwerw', 'Empleado', 'rewrew', 'rweewrew', 'SI', '2024-10-23', 'SI', 'ewrwer', 'SI', 'rwewe', 'Anuncios', 'SI', 'Propia', 'rewrew', 234234, '23443223', 'SI', 42332432, 'ewrwer', 'ewrewewr', 2344432, 'ewrewr', 'SI', 'erwerw', 'SI', 'Academicos', 'uploads/aguacate.png'),
('reew', 'ewrewr', '2024-10-08', '', 'werew', '', '3244343', '324432432', 'g@gmail.com', '', 'werewrerw', 'Soltero', 324432, '', 324342, '2024-10-09', '', '', '324', 'erewr', '', 'rweewr', '', 'werre', 'werrew', '', '2024-10-23', '', 'ewrewr', '', 'rwewe', '', '', '', 'wre', 2323423, '234', '', 324324, '42343', 'rewewrwe', 342423, 'werewr', '', 'rewerw', '', '', 'uploads/Captura de pantalla 2024-10-07 175005.png'),
('fonfo', 'fonfo', '2024-10-07', 'Cali', 'dsfdsf', 'Medellin', '32423', '432324', 'koka@gmail.com', 'Colombiana', 'rewerwewr', 'Casado', 234432324, 'CC', 2342345, '2024-10-16', 'SI', 'SI', '423432', 'werewr', 'SI', 'rweewr', 'Empleado', 'rewewr', 'ewrewr', 'SI', '2024-10-30', 'SI', 'rwewer', 'SI', 'rewewr', 'Anuncios', 'SI', 'Propia', 'rewwerew', 42432234, '23424325', 'SI', 324324234, 'eewrwe', 'rewerwewr', 324423, '243ewr', 'NO', 'erwewrrew', 'NO', 'Academicos', 'uploads/cafefondo3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojadevidapersonal`
--

CREATE TABLE `hojadevidapersonal` (
  `foto` longblob DEFAULT NULL,
  `presentacion` longtext DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `TipoDocumento` varchar(50) DEFAULT NULL,
  `identificacion` int(10) NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `telefono` int(30) DEFAULT NULL,
  `celular` int(30) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `estudios` longtext DEFAULT NULL,
  `segundarios` longtext DEFAULT NULL,
  `universitarios` longtext DEFAULT NULL,
  `posgrados` longtext DEFAULT NULL,
  `experiencia` longtext DEFAULT NULL,
  `ReferenciaLaboral` longtext DEFAULT NULL,
  `ReferenciasPersonales` longtext DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hojadevidapersonal`
--

INSERT INTO `hojadevidapersonal` (`foto`, `presentacion`, `nombre`, `TipoDocumento`, `identificacion`, `FechaNacimiento`, `domicilio`, `telefono`, `celular`, `correo`, `estudios`, `segundarios`, `universitarios`, `posgrados`, `experiencia`, `ReferenciaLaboral`, `ReferenciasPersonales`, `imagen`) VALUES
(NULL, 'erwrwewrwe', 'werwe', 'CC', 324324, '2024-10-09', '34ewewr', 23432, 2147483647, 'rrr@gmail.com', 'fsdfds', 'ewrwer', 'erwew', 'rewewr', 'rewewr', 'erwewr', 'rewewr', 'uploads/Ca PhÃª Trung.png'),
(NULL, 'j', 'jjjj', 'CC', 2147483647, '2024-10-10', 'hjj', 55, 555, 'wr@gmail.com', '55jjj', 'jjj', 'jj', 'jj', 'jj', 'jj', 'jj', 'uploads/Ca PhÃª Trung.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `nombre` varchar(60) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `opinion` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`nombre`, `correo`, `telefono`, `opinion`) VALUES
('Jeffrey Suarez', 'jeffreysuarez232008@gmail.com', '32333', 'Me parece excelente.'),
('Emmanuel Ossa', 'ossa@gmail.com', '544345', 'Me parece excelente.'),
('Gabriel Quevedo', 'gab@gmail.com', '64564645', 'Me parece excelente.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `stock` varchar(250) DEFAULT NULL,
  `precio` longtext DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `stock`, `precio`, `descripcion`, `imagen`) VALUES
(1343, 'Americano', '100', '3.500', 'Se prepara añadiendo agua caliente al espresso, lo que le da una consistencia similar al café filtrado, pero con el aroma del espresso.', 'uploads/Americano.png'),
(3242, 'Camisa', '100', '20.000', 'Presentamos nuestra camisa la combinación perfecta de estilo y comodidad.', 'uploads/camisa.png'),
(3424, 'Mocha', '100', '4.600', 'Una mezcla deliciosa de espresso, chocolate y leche vaporizada, generalmente cubierto con crema batida.', 'uploads/mocha.png'),
(4244, 'Latte', '100', '4.000', 'Similar al cappuccino, pero con más leche vaporizada y menos espuma. Tiene un sabor más suave y cremoso.', 'uploads/Latte.png'),
(4324, 'Bolsita', '100', '1.500', 'Nuestra bolsa plástica es ligera, resistente y perfecta para transportar tus compras. Con asas ergonómicas es ideal para cualquier ocasión.', 'uploads/bolsita.png'),
(6534, 'CafÃ© Cortado', '100', '3.600', 'Un espresso con una pequeña cantidad de leche caliente o espuma, equilibrando la acidez del café con la dulzura de la leche.', 'uploads/Cortado.png'),
(6544, 'Tazas', '100', '10.000', 'Descubre nuestra taza, diseñada para disfrutar de tus bebidas favoritas.', 'uploads/taza.png'),
(7342, 'Cappussino', '100', '3.000', 'Combina espresso, leche vaporizada y una capa gruesa de espuma de leche. A menudo se decora con cacao o canela en la parte superior.', 'uploads/Cappuccino.png'),
(9565, 'Expresso', '100', '3.200', 'Un café concentrado y fuerte. Se prepara forzando agua caliente a alta presión a través de café molido fino. Es la base para muchas otras bebidas de café.', 'uploads/Espresso.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol` varchar(30) NOT NULL,
  `descripcion` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol`, `descripcion`) VALUES
('administrador', NULL),
('administradora', NULL),
('cliente', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `hojadevidaaspirante`
--
ALTER TABLE `hojadevidaaspirante`
  ADD PRIMARY KEY (`numero_documento`);

--
-- Indices de la tabla `hojadevidapersonal`
--
ALTER TABLE `hojadevidapersonal`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
