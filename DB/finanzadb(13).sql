-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 17:27:05
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `finanzadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE IF NOT EXISTS `kardex` (
  `id_kardex` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `movimiento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `vunitario` float NOT NULL,
  `cantidads` int(11) NOT NULL,
  `vunitarios` float NOT NULL,
  `vtotals` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`id_kardex`, `id_producto`, `fecha`, `descripcion`, `movimiento`, `cantidad`, `vunitario`, `cantidads`, `vunitarios`, `vtotals`) VALUES
(7, 3, '2019-01-21', 'Primer ingreso de productos.', 1, 10, 350, 10, 350, 3500),
(8, 2, '2019-01-21', 'Primer ingreso de productos.', 1, 4, 600, 4, 600, 2400),
(9, 4, '2019-01-21', 'Primer ingreso de productos.', 1, 5, 400, 5, 400, 2000),
(10, 3, '2019-01-21', 'Venta de producto.', 2, 3, 402.5, 7, 327.5, 2292.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tactivo`
--

CREATE TABLE IF NOT EXISTS `tactivo` (
  `id_activo` int(10) NOT NULL,
  `id_tipo` int(10) NOT NULL,
  `id_departamento` int(10) NOT NULL,
  `id_encargado` int(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `correlativo` varchar(50) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `marca` varchar(50) NOT NULL,
  `depreciacionacum` double NOT NULL,
  `tipo_adquicicion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tactivo`
--

INSERT INTO `tactivo` (`id_activo`, `id_tipo`, `id_departamento`, `id_encargado`, `id_proveedor`, `correlativo`, `fecha_adquisicion`, `descripcion`, `estado`, `precio`, `marca`, `depreciacionacum`, `tipo_adquicicion`) VALUES
(1, 1, 1, 1, 1, '101-201 - 301-401 - 0001', '2019-08-01', 'computadora HD', '1', 1600, 'Samnsung', 0, 'Nuevo'),
(2, 2, 2, 2, 2, '101-202 - 301-402 - 0002', '2018-12-06', 'silla nuevas', '1', 500, 'Hander', 100, 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarrito`
--

CREATE TABLE IF NOT EXISTS `tcarrito` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcartera`
--

CREATE TABLE IF NOT EXISTS `tcartera` (
  `id_categoria` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcartera`
--

INSERT INTO `tcartera` (`id_categoria`, `nombre`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'c'),
(4, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcategoria`
--

CREATE TABLE IF NOT EXISTS `tcategoria` (
  `id_categoria` int(10) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcategoria`
--

INSERT INTO `tcategoria` (`id_categoria`, `categoria`, `estado`) VALUES
(1, 'Linea Blanca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclasificacion`
--

CREATE TABLE IF NOT EXISTS `tclasificacion` (
  `id_clasificaion` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correlativo` varchar(50) NOT NULL,
  `tiempo_depreciacion` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tclasificacion`
--

INSERT INTO `tclasificacion` (`id_clasificaion`, `nombre`, `correlativo`, `tiempo_depreciacion`) VALUES
(1, 'Mobiliario y Equipo', '301', 2),
(2, 'Terrenos', '302', 0),
(3, 'Edificios', '303', 20),
(4, 'Equipo de Computo', '304', 4),
(5, 'Equipo de Reparto', '305', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes`
--

CREATE TABLE IF NOT EXISTS `tclientes` (
  `id_cliente` int(10) NOT NULL,
  `id_cartera` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `dui` varchar(20) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `profecion` varchar(50) NOT NULL,
  `tipo_ingreso` varchar(50) NOT NULL,
  `salario` float NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tclientes`
--

INSERT INTO `tclientes` (`id_cliente`, `id_cartera`, `nombre`, `apellido`, `direccion`, `dui`, `nit`, `profecion`, `tipo_ingreso`, `salario`, `telefono`, `celular`, `correo`, `observaciones`) VALUES
(3, 4, 'Jessica Abigail ', 'Rosales', 'Santo tomas abajo cantos los hernandez, apastepeque San vicente', '12832738-7', '1278-372883-827-8', '2783-7827', 'Remesa', 500, '2389-2898', '7787-8788', 'jessica@gmail.com', 'jksjkfjkdsh'),
(4, 2, 'Fernando Josue', 'Hernandez Arevalo', 'COl san benito #45 san Isisdro San salavador', '29389829-8', '7281-728738-273-4', '9999-9999', 'Salario', 1500, '2239-8928', '7887-8788', 'fernando97@gmai.com', 'una persona con posibilidad de pagar el credito'),
(5, 4, 'Maria Azucena', 'Garcia Mata', 'Colonia el manantial #45 SUchitoto', '28298398-9', '7876-767565-777-7', '9999-9999', 'Salario', 600, '2342-2222', '7837-8738', 'MariaAzu@hotmail.com', 'buena condicion de pago'),
(10, 1, 'Sandra Liseth', 'Arevalo Carranza', 'Colonia la monserrath, san esteban obrajuelo San Otrillo', '12321112-2', '2342-342342-221-1', 'Lic. Contadora', 'Salario', 800, '2332-3232', '7899-8989', 'Sandra@gmail.com', 'el cliente cumple con los requisitos'),
(11, 2, 'Erick ', 'Ticas', 'apastepeque', '05294607-4', '6534-345566-778-8', 'gyujfgvjhl', 'Salario', 100, '2345-6778', '7342-3124', 'eticas@gmail.com', 'kljh;ljycdykxsdtyikljjhgff'),
(12, 4, 'Kike jesus', 'Jovel', 'Bxndjd', '62737737-7', '6262-3627-277-23', 'Hkgbgh', 'Remesa', 800, '989-8686', '686867', 'Kgjjkll', 'Jfhdbfnkuec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes_fiador`
--

CREATE TABLE IF NOT EXISTS `tclientes_fiador` (
  `id_clientes_fiador` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_fiador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcompras`
--

CREATE TABLE IF NOT EXISTS `tcompras` (
  `id_compras` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcompras`
--

INSERT INTO `tcompras` (`id_compras`, `id_producto`, `id_proveedor`, `fecha`, `precio`, `cantidad`) VALUES
(21, 2, 1, '2019-01-08', 3.25, 10),
(22, 2, 1, '2019-01-08', 3.5, 10),
(23, 2, 1, '2019-01-08', 2.5, 10),
(24, 2, 1, '2019-01-09', 38, 23),
(25, 2, 1, '2019-01-11', 59, 3),
(26, 3, 2, '2019-01-20', 600, 10),
(27, 3, 2, '2019-01-21', 350, 10),
(28, 2, 1, '2019-01-21', 600, 4),
(29, 4, 2, '2019-01-21', 400, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdepartamento`
--

CREATE TABLE IF NOT EXISTS `tdepartamento` (
  `id_departamento` int(10) NOT NULL,
  `id_institucion` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correlativo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdepartamento`
--

INSERT INTO `tdepartamento` (`id_departamento`, `id_institucion`, `nombre`, `correlativo`) VALUES
(1, 1, 'Ventas', '101-201'),
(2, 1, 'Produccion', '101-202'),
(3, 1, 'Administracion', '101-203'),
(4, 2, 'Finanzas', '102-204');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_compra`
--

CREATE TABLE IF NOT EXISTS `tdetalle_compra` (
  `id_cliente` int(10) NOT NULL,
  `id_venta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetalle_venta`
--

CREATE TABLE IF NOT EXISTS `tdetalle_venta` (
  `id_detalleventa` int(11) NOT NULL,
  `id_venta` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciovendido` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdetalle_venta`
--

INSERT INTO `tdetalle_venta` (`id_detalleventa`, `id_venta`, `id_producto`, `cantidad`, `preciovendido`) VALUES
(2, 13, 3, 3, 402.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdevolucion`
--

CREATE TABLE IF NOT EXISTS `tdevolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templeados`
--

CREATE TABLE IF NOT EXISTS `templeados` (
  `id_empleado` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `zona` varchar(100) NOT NULL,
  `dui` varchar(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `rol` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `templeados`
--

INSERT INTO `templeados` (`id_empleado`, `nombre`, `apellido`, `zona`, `dui`, `usuario`, `pass`, `rol`) VALUES
(1, 'Jose Isamael', 'Hernandez Amaya', 'ventas', '1289283-4', 'nestor', 'hola', ''),
(2, 'kevin Alexander', 'Jovel Arevalo', 'san sebastian, San V', '23482773-9', 'kevin123', 'holamundo', 'Administrador'),
(3, 'Erick Alexander', 'kjhkhkhk', 'hkhkkjh', '87987987-9', 'sdhj3', 'jskdh', ''),
(4, 'Roberto Enrique', 'Rivas Alfaro', 'san benito', '23234234-3', 'roberto123', 'hola', 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfiador`
--

CREATE TABLE IF NOT EXISTS `tfiador` (
  `id_fiador` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `dui` varchar(15) NOT NULL,
  `nit` varchar(16) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `profecion` varchar(40) NOT NULL,
  `salario` float NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tfiador`
--

INSERT INTO `tfiador` (`id_fiador`, `nombre`, `apellido`, `direccion`, `dui`, `nit`, `correo`, `profecion`, `salario`, `telefono`, `celular`) VALUES
(1, 'kevin', 'jovel', 'san sebas', '2838329', '3989283', 'kevin@gmail.com', 'estudiante', 500, '2233234', '777777'),
(2, 'Jose de la Cruz', 'Flores Garcia', 'col santa fe pol e casa $34', '298899-9', '289-234232-234-2', 'jose@gmail.com', 'ingeniero de Sistemas', 1600, '23334433', '78773667'),
(3, 'Erick Alexander', 'Ticas', 'mjfjsgdxj', '09687644-5', '7643-368907-653-', 'gdj@gmail.com', 'yyyyyyyyyy', 700, '2222-2222', '7777-7777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstitucion`
--

CREATE TABLE IF NOT EXISTS `tinstitucion` (
  `id_institucion` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correlativo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tinstitucion`
--

INSERT INTO `tinstitucion` (`id_institucion`, `nombre`, `correlativo`) VALUES
(1, 'Sucursal San Vicente', '101'),
(2, 'Sucursal San Salvador', '102'),
(3, 'Sucursal Cojutepeque', '103');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinventario`
--

CREATE TABLE IF NOT EXISTS `tinventario` (
  `id_inventario` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpago`
--

CREATE TABLE IF NOT EXISTS `tpago` (
  `id_pago` int(10) NOT NULL,
  `id_venta` int(10) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpago`
--

INSERT INTO `tpago` (`id_pago`, `id_venta`, `monto`, `fecha`) VALUES
(13, 13, 1364.48, '2019-01-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tplan_pago`
--

CREATE TABLE IF NOT EXISTS `tplan_pago` (
  `id_plan` int(10) NOT NULL,
  `id_cartera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tasa` float NOT NULL,
  `cuotas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tplan_pago`
--

INSERT INTO `tplan_pago` (`id_plan`, `id_cartera`, `nombre`, `tasa`, `cuotas`) VALUES
(1, 1, 'Contado', 0, 1),
(2, 2, 'Contado', 0, 1),
(3, 3, 'Contado', 0, 1),
(4, 4, 'Contado', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE IF NOT EXISTS `tproducto` (
  `id_producto` int(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `margen` float NOT NULL,
  `stock_minimo` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproducto`
--

INSERT INTO `tproducto` (`id_producto`, `id_proveedor`, `id_categoria`, `nombre`, `descripcion`, `precio_compra`, `precio_venta`, `margen`, `stock_minimo`, `stock`, `codigo`, `estado`) VALUES
(2, 1, 1, 'Lavadora LG', 'Lavadora con capacidad de 20 libras, extra clean.', 600, 630, 5, 20, 4, 'HKJH9000', 1),
(3, 2, 1, 'Refrigeradora', 'sjdfkshd', 350, 402.5, 15, 20, 7, 'HKJH6937', 1),
(4, 2, 1, 'Cocina', 'sjdkshfes', 400, 480, 20, 15, 5, 'HKJH9695', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE IF NOT EXISTS `tproveedor` (
  `id_proveedor` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `representante` varchar(75) NOT NULL,
  `dui` varchar(20) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproveedor`
--

INSERT INTO `tproveedor` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `representante`, `dui`, `nit`, `celular`, `email`) VALUES
(1, 'SIMmAN', 'Blv. santa cruz #42 Santa Tecla, La Libertad', '2342-3212', 'Jose ignacio Martinez Zavala', '83829898-9', '2001-299399-901-0', '7829-9388', 'Jose234@gmail.com'),
(2, 'CACAOOPERA ', 'el paso', '2939-9299', 'oscar', '23989898-9', '2817-287987-287-9', '7876-5524', 'oscar@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_activo`
--

CREATE TABLE IF NOT EXISTS `ttipo_activo` (
  `id_tipo` int(10) NOT NULL,
  `id_clasificacion` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correlativo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ttipo_activo`
--

INSERT INTO `ttipo_activo` (`id_tipo`, `id_clasificacion`, `nombre`, `correlativo`) VALUES
(1, 1, 'Computadora', '301-401'),
(2, 1, 'Sillas', '301-402'),
(3, 5, 'Camion', '305-403'),
(4, 1, 'Mesa', '301-404');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE IF NOT EXISTS `tusuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`id_usuario`, `id_empleado`, `usuario`, `pass`) VALUES
(1, 4, 'Roberto', '123'),
(2, 2, 'kevin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tventas`
--

CREATE TABLE IF NOT EXISTS `tventas` (
  `id_venta` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `id_plan` int(10) NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `prestamo_original` float NOT NULL,
  `saldo_actual` float NOT NULL,
  `mora_acumulada` float NOT NULL,
  `intereses_acumulados` float NOT NULL,
  `estado` varchar(20) NOT NULL,
  `proximo_pago` date NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tventas`
--

INSERT INTO `tventas` (`id_venta`, `id_cliente`, `codigo`, `id_plan`, `id_empleado`, `prestamo_original`, `saldo_actual`, `mora_acumulada`, `intereses_acumulados`, `estado`, `proximo_pago`, `fecha`) VALUES
(13, 4, '0013', 2, 4, 1364.48, 0, 0, 0, 'Cancelada', '2019-01-21', '2019-01-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id_kardex`), ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `tactivo`
--
ALTER TABLE `tactivo`
  ADD PRIMARY KEY (`id_activo`), ADD KEY `fk_tipo` (`id_tipo`), ADD KEY `fk_departamento` (`id_departamento`), ADD KEY `fk_usuario` (`id_encargado`), ADD KEY `fk_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `tcarrito`
--
ALTER TABLE `tcarrito`
  ADD PRIMARY KEY (`id_carrito`), ADD KEY `fk_productocarrito` (`id_producto`);

--
-- Indices de la tabla `tcartera`
--
ALTER TABLE `tcartera`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tcategoria`
--
ALTER TABLE `tcategoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tclasificacion`
--
ALTER TABLE `tclasificacion`
  ADD PRIMARY KEY (`id_clasificaion`);

--
-- Indices de la tabla `tclientes`
--
ALTER TABLE `tclientes`
  ADD PRIMARY KEY (`id_cliente`), ADD KEY `fk_cartera` (`id_cartera`);

--
-- Indices de la tabla `tclientes_fiador`
--
ALTER TABLE `tclientes_fiador`
  ADD PRIMARY KEY (`id_clientes_fiador`), ADD KEY `fk_clientefiador` (`id_cliente`), ADD KEY `fk_fiadorcliente` (`id_fiador`);

--
-- Indices de la tabla `tcompras`
--
ALTER TABLE `tcompras`
  ADD PRIMARY KEY (`id_compras`), ADD KEY `fk_productocompra` (`id_producto`), ADD KEY `fk_proveedorcompra` (`id_proveedor`);

--
-- Indices de la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
  ADD PRIMARY KEY (`id_departamento`), ADD KEY `fk_institucion` (`id_institucion`);

--
-- Indices de la tabla `tdetalle_compra`
--
ALTER TABLE `tdetalle_compra`
  ADD KEY `fk_cliente` (`id_cliente`), ADD KEY `fk_venta` (`id_venta`);

--
-- Indices de la tabla `tdetalle_venta`
--
ALTER TABLE `tdetalle_venta`
  ADD PRIMARY KEY (`id_detalleventa`), ADD KEY `fk_ventas` (`id_venta`), ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `tdevolucion`
--
ALTER TABLE `tdevolucion`
  ADD PRIMARY KEY (`id_devolucion`), ADD KEY `fk_devpro` (`id_producto`), ADD KEY `fk_devprov` (`id_proveedor`);

--
-- Indices de la tabla `templeados`
--
ALTER TABLE `templeados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `tfiador`
--
ALTER TABLE `tfiador`
  ADD PRIMARY KEY (`id_fiador`);

--
-- Indices de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `tinventario`
--
ALTER TABLE `tinventario`
  ADD PRIMARY KEY (`id_inventario`), ADD KEY `fk_productos` (`id_producto`);

--
-- Indices de la tabla `tpago`
--
ALTER TABLE `tpago`
  ADD PRIMARY KEY (`id_pago`), ADD KEY `fk_ventapro` (`id_venta`);

--
-- Indices de la tabla `tplan_pago`
--
ALTER TABLE `tplan_pago`
  ADD PRIMARY KEY (`id_plan`), ADD KEY `fk_carterapago` (`id_cartera`);

--
-- Indices de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`id_producto`), ADD KEY `fk_proveedores` (`id_proveedor`), ADD KEY `fk_categoria` (`id_categoria`);

--
-- Indices de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `ttipo_activo`
--
ALTER TABLE `ttipo_activo`
  ADD PRIMARY KEY (`id_tipo`), ADD KEY `fk_clasificacion` (`id_clasificacion`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`id_usuario`), ADD KEY `fk_empleadousuario` (`id_empleado`);

--
-- Indices de la tabla `tventas`
--
ALTER TABLE `tventas`
  ADD PRIMARY KEY (`id_venta`), ADD KEY `id_plan` (`id_plan`), ADD KEY `fk_idempleado` (`id_empleado`), ADD KEY `fk_clienteventa` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id_kardex` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tactivo`
--
ALTER TABLE `tactivo`
  MODIFY `id_activo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tcarrito`
--
ALTER TABLE `tcarrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tcartera`
--
ALTER TABLE `tcartera`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tcategoria`
--
ALTER TABLE `tcategoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tclasificacion`
--
ALTER TABLE `tclasificacion`
  MODIFY `id_clasificaion` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tclientes`
--
ALTER TABLE `tclientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tclientes_fiador`
--
ALTER TABLE `tclientes_fiador`
  MODIFY `id_clientes_fiador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tcompras`
--
ALTER TABLE `tcompras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
  MODIFY `id_departamento` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tdetalle_venta`
--
ALTER TABLE `tdetalle_venta`
  MODIFY `id_detalleventa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tdevolucion`
--
ALTER TABLE `tdevolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `templeados`
--
ALTER TABLE `templeados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tfiador`
--
ALTER TABLE `tfiador`
  MODIFY `id_fiador` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  MODIFY `id_institucion` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tinventario`
--
ALTER TABLE `tinventario`
  MODIFY `id_inventario` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tpago`
--
ALTER TABLE `tpago`
  MODIFY `id_pago` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tplan_pago`
--
ALTER TABLE `tplan_pago`
  MODIFY `id_plan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  MODIFY `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ttipo_activo`
--
ALTER TABLE `ttipo_activo`
  MODIFY `id_tipo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tventas`
--
ALTER TABLE `tventas`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
ADD CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`);

--
-- Filtros para la tabla `tactivo`
--
ALTER TABLE `tactivo`
ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `tdepartamento` (`id_departamento`),
ADD CONSTRAINT `fk_encargado` FOREIGN KEY (`id_encargado`) REFERENCES `templeados` (`id_empleado`),
ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `tproveedor` (`id_proveedor`),
ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `ttipo_activo` (`id_tipo`);

--
-- Filtros para la tabla `tcarrito`
--
ALTER TABLE `tcarrito`
ADD CONSTRAINT `fk_productocarrito` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`);

--
-- Filtros para la tabla `tclientes`
--
ALTER TABLE `tclientes`
ADD CONSTRAINT `fk_cartera` FOREIGN KEY (`id_cartera`) REFERENCES `tcartera` (`id_categoria`);

--
-- Filtros para la tabla `tclientes_fiador`
--
ALTER TABLE `tclientes_fiador`
ADD CONSTRAINT `fk_clientefiador` FOREIGN KEY (`id_cliente`) REFERENCES `tclientes` (`id_cliente`),
ADD CONSTRAINT `fk_fiadorcliente` FOREIGN KEY (`id_fiador`) REFERENCES `tfiador` (`id_fiador`);

--
-- Filtros para la tabla `tcompras`
--
ALTER TABLE `tcompras`
ADD CONSTRAINT `fk_productocompra` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`),
ADD CONSTRAINT `fk_proveedorcompra` FOREIGN KEY (`id_proveedor`) REFERENCES `tproveedor` (`id_proveedor`);

--
-- Filtros para la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
ADD CONSTRAINT `fk_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `tinstitucion` (`id_institucion`);

--
-- Filtros para la tabla `tdetalle_compra`
--
ALTER TABLE `tdetalle_compra`
ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tclientes` (`id_cliente`),
ADD CONSTRAINT `fk_venta` FOREIGN KEY (`id_venta`) REFERENCES `tventas` (`id_venta`);

--
-- Filtros para la tabla `tdetalle_venta`
--
ALTER TABLE `tdetalle_venta`
ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`),
ADD CONSTRAINT `fk_ventas` FOREIGN KEY (`id_venta`) REFERENCES `tventas` (`id_venta`);

--
-- Filtros para la tabla `tdevolucion`
--
ALTER TABLE `tdevolucion`
ADD CONSTRAINT `fk_devpro` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`),
ADD CONSTRAINT `fk_devprov` FOREIGN KEY (`id_proveedor`) REFERENCES `tproveedor` (`id_proveedor`);

--
-- Filtros para la tabla `tinventario`
--
ALTER TABLE `tinventario`
ADD CONSTRAINT `fk_productos` FOREIGN KEY (`id_producto`) REFERENCES `tproducto` (`id_producto`);

--
-- Filtros para la tabla `tpago`
--
ALTER TABLE `tpago`
ADD CONSTRAINT `fk_ventapro` FOREIGN KEY (`id_venta`) REFERENCES `tventas` (`id_venta`);

--
-- Filtros para la tabla `tplan_pago`
--
ALTER TABLE `tplan_pago`
ADD CONSTRAINT `fk_carterapago` FOREIGN KEY (`id_cartera`) REFERENCES `tcartera` (`id_categoria`);

--
-- Filtros para la tabla `tproducto`
--
ALTER TABLE `tproducto`
ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tcategoria` (`id_categoria`),
ADD CONSTRAINT `fk_proveedores` FOREIGN KEY (`id_proveedor`) REFERENCES `tproveedor` (`id_proveedor`);

--
-- Filtros para la tabla `ttipo_activo`
--
ALTER TABLE `ttipo_activo`
ADD CONSTRAINT `fk_clasificacion` FOREIGN KEY (`id_clasificacion`) REFERENCES `tclasificacion` (`id_clasificaion`);

--
-- Filtros para la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
ADD CONSTRAINT `fk_empleadousuario` FOREIGN KEY (`id_empleado`) REFERENCES `templeados` (`id_empleado`);

--
-- Filtros para la tabla `tventas`
--
ALTER TABLE `tventas`
ADD CONSTRAINT `fk_clienteventa` FOREIGN KEY (`id_cliente`) REFERENCES `tclientes` (`id_cliente`),
ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `templeados` (`id_empleado`),
ADD CONSTRAINT `fk_plan` FOREIGN KEY (`id_plan`) REFERENCES `tplan_pago` (`id_plan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
