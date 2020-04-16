-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2020 a las 21:34:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_telefonia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_ventas`
--

CREATE TABLE `bitacora_ventas` (
  `ID_BITACORA_VENTAS` int(11) NOT NULL,
  `ID_FACTURA` int(11) NOT NULL,
  `FECHA_BITACORA` date DEFAULT NULL,
  `HORA_BITACORA` varchar(45) DEFAULT NULL,
  `TBL_CLIENTE_idTBL_CLIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora_ventas`
--

INSERT INTO `bitacora_ventas` (`ID_BITACORA_VENTAS`, `ID_FACTURA`, `FECHA_BITACORA`, `HORA_BITACORA`, `TBL_CLIENTE_idTBL_CLIENTE`) VALUES
(1, 1, '2020-01-29', '6:40 PM', 1),
(2, 2, '2020-03-12', '12:14 PM', 2),
(3, 3, '2020-01-21', '12:05 PM', 3),
(4, 4, '2020-01-29', '12:07 PM', 4),
(5, 5, '2020-03-24', '12:35 PM', 5),
(6, 6, '2020-03-03', '4:09 PM', 6),
(7, 7, '2020-02-07', '2:05 PM', 7),
(8, 8, '2020-01-29', '6:40 PM', 8),
(9, 9, '2020-03-12', '12:14 PM', 9),
(10, 10, '2020-01-22', '12:05 PM', 10),
(11, 11, '2020-01-29', '12:07 PM', 11),
(12, 12, '2020-03-25', '12:35 PM', 12),
(13, 13, '2020-03-03', '4:09 PM', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_repuestos`
--

CREATE TABLE `compra_repuestos` (
  `ID_COMPRA_REPUESTOS` int(11) NOT NULL,
  `FECHA_PEDIDO` date DEFAULT NULL,
  `PAIS_PIEZA` varchar(45) DEFAULT NULL,
  `FECHA_LLEGADA` date DEFAULT NULL,
  `PRECIO_LEMPIRAS` varchar(30) DEFAULT NULL,
  `PRECIO_DOLARES` varchar(30) DEFAULT NULL,
  `ID_EXPEDIENTE_REPARACION` int(11) NOT NULL,
  `ID_FACTURAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra_repuestos`
--

INSERT INTO `compra_repuestos` (`ID_COMPRA_REPUESTOS`, `FECHA_PEDIDO`, `PAIS_PIEZA`, `FECHA_LLEGADA`, `PRECIO_LEMPIRAS`, `PRECIO_DOLARES`, `ID_EXPEDIENTE_REPARACION`, `ID_FACTURAS`) VALUES
(1, '2020-01-08', 'CHINA, PANTALLA HTC', '2020-02-13', 'L 578.25', '$ 23.13', 3, 1),
(2, '2020-03-13', 'USA, PLACA SAMSUNG S6', '2020-05-12', 'L 1736.75', '$ 69.47', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `ID_DETALLE_COMPRA` double NOT NULL,
  `UNIDADES` int(11) NOT NULL,
  `TOTAL_COMPRA` varchar(30) DEFAULT NULL,
  `COSTO_X_UNIDAD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`ID_DETALLE_COMPRA`, `UNIDADES`, `TOTAL_COMPRA`, `COSTO_X_UNIDAD`) VALUES
(1, 36, '18720', '$195'),
(2, 25, '$942.36', '$37.7'),
(3, 20, '$837.2', '$41.86'),
(4, 3, '$3429.23', '$489.89'),
(5, 8, '$2792', '$349'),
(6, 15, '$6335.28', '$440'),
(7, 9, '$2040', '$225'),
(8, 50, '$397', '$7.94'),
(9, 12, '$1859.88', '$154.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacoras_empleados`
--

CREATE TABLE `tbl_bitacoras_empleados` (
  `ID_BITACORA` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_TIPO_BITACORA` int(11) NOT NULL,
  `FECHA_HORA_BITACORA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo_empleado`
--

CREATE TABLE `tbl_cargo_empleado` (
  `ID_CARGO_EMPLEADO` int(11) NOT NULL,
  `DESCRIPCION_CARGO_EMPLEADO` varchar(180) DEFAULT NULL,
  `REQUISITOS_CARGO_EMPLEADO` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cargo_empleado`
--

INSERT INTO `tbl_cargo_empleado` (`ID_CARGO_EMPLEADO`, `DESCRIPCION_CARGO_EMPLEADO`, `REQUISITOS_CARGO_EMPLEADO`) VALUES
(1, 'Gerente', 'A Criterio del Dueño'),
(2, 'Cajero', 'Conocimientos en contabilidad mas un año de experiencia'),
(3, 'Vendedor', 'Experiencia en ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `ID_CLIENTE` int(11) NOT NULL,
  `CORREO_ELECTRONICO` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`ID_CLIENTE`, `CORREO_ELECTRONICO`) VALUES
(8, 'dwiersma0@purevolume.com'),
(9, 'jskillett1@zdnet.com'),
(10, 'omueller2@ycombinator.com'),
(11, 'smacevilly3@goo.ne.jp'),
(12, 'fdutch4@newyorker.com'),
(13, 'ssammut5@issuu.com'),
(14, 'fogilvy6@prnewswire.com'),
(15, 'vbaldack7@sciencedirect.com'),
(16, 'vklemencic8@guardian.com'),
(17, 'jbartolic9@pbs.com'),
(18, 'mstanleya@t.com'),
(19, 'hdensellb@marriott.com'),
(20, 'rashfordc@redcross.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compras`
--

CREATE TABLE `tbl_compras` (
  `ID_COMPRA` int(11) NOT NULL,
  `DETALLE_COMPRAS_UNIDADES` double NOT NULL,
  `FECHA_COMPRA` date DEFAULT NULL,
  `DESCRIPCION` varchar(30) DEFAULT NULL,
  `TOTAL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_compras`
--

INSERT INTO `tbl_compras` (`ID_COMPRA`, `DETALLE_COMPRAS_UNIDADES`, `FECHA_COMPRA`, `DESCRIPCION`, `TOTAL`) VALUES
(1, 1, '2020-01-08', 'Celular Samsung A20 64gb ', '$18720'),
(2, 2, '0000-00-00', 'Pantalla Samsung s10', '$942.36'),
(3, 3, '2020-02-03', 'Pantalla Lg9', '$837.02'),
(4, 4, '2020-02-15', 'Celular Htc U12 plus 128gb', '$3429.23'),
(5, 5, '2020-01-03', 'Celular Iphone 8 plus 64gb', '$2792.00'),
(6, 6, '2020-02-15', 'Celular Huawei Y9 Prime 128gb', '$6335.28'),
(7, 7, '2020-03-03', 'Celular Xiaomi mi A3', '$2040.00'),
(8, 8, '2020-02-03', 'Bateria Samsung s7', '$397.00'),
(9, 9, '2020-01-03', 'Tablet samsung galaxy tab 4', '$1859.88');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_descuentos`
--

CREATE TABLE `tbl_descuentos` (
  `ID_DESCUENTO` int(11) NOT NULL,
  `TIPO_DESCUENTO` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_descuentos`
--

INSERT INTO `tbl_descuentos` (`ID_DESCUENTO`, `TIPO_DESCUENTO`, `DESCRIPCION`) VALUES
(1, '15%', 'Tercera Edad'),
(2, '10%', 'Por mayor'),
(3, 'Criterio del Gerente', 'Por temporada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalles_factura`
--

CREATE TABLE `tbl_detalles_factura` (
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO` varchar(30) DEFAULT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_FACTURAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_detalles_factura`
--

INSERT INTO `tbl_detalles_factura` (`CANTIDAD`, `PRECIO`, `ID_PRODUCTO`, `ID_FACTURAS`) VALUES
(1, 'L 1615.58', 1, 1),
(2, 'L 4169.09', 1, 2),
(1, 'L 146.85', 1, 3),
(1, 'L 750.04', 1, 4),
(1, 'L 5358.11', 1, 5),
(1, 'L 68.96', 1, 6),
(1, 'L 4180.43', 1, 7),
(1, 'L 4100.29', 3, 8),
(1, 'L 4105.86', 3, 9),
(10, 'L 6063.42', 1, 10),
(1, 'L 3175.11', 1, 11),
(1, 'L 7780.72', 2, 12),
(1, 'L 931.50', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_SUCURSAL` int(11) NOT NULL,
  `ID_ESTATUS_EMPLEADO` int(11) NOT NULL,
  `ID_TITULACION` int(11) NOT NULL,
  `ID_CARGO_EMPLEADO` int(11) NOT NULL,
  `FECHA_CONTRATO` varchar(45) NOT NULL,
  `CORREO_EMPLEADO` varchar(60) NOT NULL,
  `CLAVE_EMPLEADO` varchar(65) NOT NULL,
  `OBSERVACIONES_EMPLEADO` varchar(150) DEFAULT NULL,
  `FOTOGRAFIA_EMPLEADO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`ID_EMPLEADO`, `ID_SUCURSAL`, `ID_ESTATUS_EMPLEADO`, `ID_TITULACION`, `ID_CARGO_EMPLEADO`, `FECHA_CONTRATO`, `CORREO_EMPLEADO`, `CLAVE_EMPLEADO`, `OBSERVACIONES_EMPLEADO`, `FOTOGRAFIA_EMPLEADO`) VALUES
(1, 1, 1, 2, 3, '24/04/2018 ', 'dsimanenko0@gmail.com', 'Lincoln', NULL, NULL),
(2, 1, 1, 2, 3, '23/04/2013 ', 'mjune1@gmail.com', 'BMW', NULL, NULL),
(3, 1, 1, 2, 3, '05/06/2017 ', 'elyokhin2@gmai.com', 'Mercury', NULL, NULL),
(4, 1, 1, 2, 2, '21/10/2016 ', 'sgasking3@gmail.com', 'Dodge', NULL, NULL),
(5, 2, 1, 2, 3, '21/11/2015 ', 'blemanu4@gmail.com', 'Land Rover', NULL, NULL),
(6, 2, 1, 2, 3, '05/07/2013 ', 'halejandre5@gmail.com', 'GMC', NULL, NULL),
(7, 2, 1, 2, 2, '26/04/2017 ', 'cfoli6@gmail.com', 'Infiniti', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_civil`
--

CREATE TABLE `tbl_estado_civil` (
  `ID_ESTADO_CIVIL` int(11) NOT NULL,
  `ESTADO_CIVIL` varchar(20) NOT NULL,
  `ABREV_ESTADO_CIVIL` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado_civil`
--

INSERT INTO `tbl_estado_civil` (`ID_ESTADO_CIVIL`, `ESTADO_CIVIL`, `ABREV_ESTADO_CIVIL`) VALUES
(1, 'Soltero/a', ''),
(2, 'Casado/a', ''),
(3, 'Comprometido/a', ''),
(4, 'Unión Libre', ''),
(5, 'Separado/a', ''),
(6, 'Divorciado/a', ''),
(7, 'Viudo/a', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estatus_empleado`
--

CREATE TABLE `tbl_estatus_empleado` (
  `ID_ESTATUS_EMPLEADO` int(11) NOT NULL,
  `STATUS` varchar(45) NOT NULL,
  `DESCRIPCION_ESTATUS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estatus_empleado`
--

INSERT INTO `tbl_estatus_empleado` (`ID_ESTATUS_EMPLEADO`, `STATUS`, `DESCRIPCION_ESTATUS`) VALUES
(1, 'Tiempo Completo', 'Empleado contratado Permanetemente'),
(2, 'Contrato', 'Empleado contratado por tiempo determinado en la empresa'),
(3, 'Inactivo', 'Empleados con licencia o alejados de las tareas laborales debido a una discapacidad, voluntarios o personal contratado para trabajos independientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_expediente_reparacion`
--

CREATE TABLE `tbl_expediente_reparacion` (
  `ID_EXPEDIENTE_REPARACION` int(11) NOT NULL,
  `ID_SUCURSAL` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_GARANTIA` int(11) NOT NULL,
  `FECHA_INGRESO` date NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `DIAGNOSTICO` varchar(255) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `COSTO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_expediente_reparacion`
--

INSERT INTO `tbl_expediente_reparacion` (`ID_EXPEDIENTE_REPARACION`, `ID_SUCURSAL`, `ID_EMPLEADO`, `ID_PRODUCTO`, `ID_GARANTIA`, `FECHA_INGRESO`, `FECHA_ENTREGA`, `DIAGNOSTICO`, `ID_CLIENTE`, `COSTO`) VALUES
(1, 1, 1, 1, 4, '2020-01-20', '2020-01-29', 'Liberación', 7, 'L1350.00'),
(2, 1, 6, 2, 1, '2020-02-03', '2020-02-16', 'Reparación Placa', 9, 'L600.00'),
(3, 2, 5, 3, 3, '2020-02-20', '2020-02-23', 'Intalación de pantalla', 13, 'L250.00'),
(4, 1, 1, 4, 3, '2020-03-06', '2020-03-10', 'Intalación de pantalla', 15, 'L200.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas`
--

CREATE TABLE `tbl_facturas` (
  `ID_FACTURA` int(11) NOT NULL,
  `ID_DESCUENTOS` int(11) DEFAULT NULL,
  `ID_MODOS_DE_PAGO` int(11) NOT NULL,
  `FECHA_FACTURA` date DEFAULT NULL,
  `IMPUESTO` varchar(5) DEFAULT NULL,
  `TOTAL_NETP` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_facturas`
--

INSERT INTO `tbl_facturas` (`ID_FACTURA`, `ID_DESCUENTOS`, `ID_MODOS_DE_PAGO`, `FECHA_FACTURA`, `IMPUESTO`, `TOTAL_NETP`) VALUES
(1, 1, 1, '2020-01-28', '18%', 'L4590.00'),
(2, NULL, 1, '2020-03-05', '18%', 'L5500.00'),
(3, NULL, 2, '2020-01-21', '18%', 'L3150.00'),
(4, NULL, 1, '2020-01-28', '18%', 'L6514.00'),
(5, 2, 2, '2020-03-27', '18%', 'L5798.00'),
(6, 3, 1, '2020-03-02', '18%', 'L8680.00'),
(7, 1, 1, '2020-02-06', '18%', 'L3236.00'),
(8, NULL, 1, '2020-02-28', '18%', 'L3590.00'),
(9, NULL, 1, '2020-03-05', '18%', 'L4500.00'),
(10, NULL, 2, '2020-02-21', '18%', 'L6150.00'),
(11, NULL, 1, '2020-03-28', '18%', 'L7514.00'),
(12, NULL, 2, '2020-01-27', '18%', 'L5798.00'),
(13, NULL, 1, '2020-01-02', '18%', 'L7680.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_garantias`
--

CREATE TABLE `tbl_garantias` (
  `ID_GARANTIA` int(11) NOT NULL,
  `GARANTIA_ARTICULO` varchar(100) NOT NULL,
  `DIAS_GARANTIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_garantias`
--

INSERT INTO `tbl_garantias` (`ID_GARANTIA`, `GARANTIA_ARTICULO`, `DIAS_GARANTIA`) VALUES
(1, 'Repacion Celular', 90),
(2, 'Reparacion Tablet', 90),
(3, 'Instalación repuesto', 30),
(4, 'Liberación de Celular ', 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

CREATE TABLE `tbl_generos` (
  `ID_GENERO` int(11) NOT NULL,
  `GENERO` varchar(20) NOT NULL,
  `ABREVIATURA` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`ID_GENERO`, `GENERO`, `ABREVIATURA`) VALUES
(1, 'Masculino', 'M'),
(2, 'Femenino', 'F'),
(3, 'Otros', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas`
--

CREATE TABLE `tbl_marcas` (
  `ID_marca` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_marcas`
--

INSERT INTO `tbl_marcas` (`ID_marca`, `Descripcion`) VALUES
(1, 'Samsung'),
(2, 'Iphone'),
(3, 'Xiaomi'),
(4, 'Htc'),
(5, 'Huawei'),
(6, 'LG'),
(7, 'Nokia'),
(8, 'Motorola'),
(9, 'Sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_modos_de_pago`
--

CREATE TABLE `tbl_modos_de_pago` (
  `ID_MODOS_DE_PAGO` int(11) NOT NULL,
  `TIPO_PAGO` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_modos_de_pago`
--

INSERT INTO `tbl_modos_de_pago` (`ID_MODOS_DE_PAGO`, `TIPO_PAGO`, `DESCRIPCION`) VALUES
(1, 'Efectivo', 'Dinero en forma de monedas o papel moneda (billetes) para realizar pago'),
(2, 'Tarjeta de Debito', 'Pago por medio de Tarjeta bancaria de plástico con una banda magnética, un microchip'),
(3, 'Tarjeta de Credito', 'Pago por medio de Tarjeta bancaria de plástico con una banda magnética, un microchip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notificaciones_clientes`
--

CREATE TABLE `tbl_notificaciones_clientes` (
  `ID_NOTIF_CLIENTE` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_TIPO_NOTIFICACION` int(11) NOT NULL,
  `DESCRIPCION_NOTIFICACION` varchar(200) DEFAULT NULL,
  `FECHA_NOTIFICACION_CLI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_notificaciones_clientes`
--

INSERT INTO `tbl_notificaciones_clientes` (`ID_NOTIF_CLIENTE`, `ID_CLIENTE`, `ID_TIPO_NOTIFICACION`, `DESCRIPCION_NOTIFICACION`, `FECHA_NOTIFICACION_CLI`) VALUES
(1, 8, 1, 'Ya esta reparado su dispositivo movil puede pasar por la tienda recogiéndolo', '2019-06-17'),
(2, 9, 1, 'Ya esta reparado su dispositivo movil puede pasar por la tienda recogiéndolo', '2019-05-17'),
(3, 13, 1, 'Ya esta reparado su dispositivo movil puede pasar por la tienda recogiéndolo', '2019-07-05'),
(4, 15, 1, 'Ya esta reparado su dispositivo movil puede pasar por la tienda recogiéndolo', '2019-12-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notificaciones_empleados`
--

CREATE TABLE `tbl_notificaciones_empleados` (
  `ID_NOTIF_EMPLEADO` int(11) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `ID_TIPO_NOTIFICACION` int(11) NOT NULL,
  `DESCRIPCION_NOTIFICACION` varchar(200) DEFAULT NULL,
  `FECHA_NOTIFICACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_notificaciones_empleados`
--

INSERT INTO `tbl_notificaciones_empleados` (`ID_NOTIF_EMPLEADO`, `ID_EMPLEADO`, `ID_TIPO_NOTIFICACION`, `DESCRIPCION_NOTIFICACION`, `FECHA_NOTIFICACION`) VALUES
(1, 1, 1, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(2, 2, 1, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(3, 3, 3, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(4, 4, 1, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(5, 5, 1, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(6, 6, 3, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29'),
(7, 7, 1, 'Se le Comunica que estarn aplazadas sus funciones laborales por la sitacion que pasa el país', '2020-02-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `ID_PERSONA` int(11) NOT NULL,
  `DNI` varchar(25) DEFAULT NULL,
  `ID_GENERO` int(11) NOT NULL,
  `ID_ESTADO_CIVIL` int(11) NOT NULL,
  `NOMBRE_PERSONA` varchar(60) NOT NULL,
  `APELLIDO_PERSONA` varchar(60) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `EDAD` int(11) DEFAULT NULL,
  `DIRECCION` varchar(150) NOT NULL,
  `TELEFONO` varchar(25) DEFAULT NULL,
  `CELULAR` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`ID_PERSONA`, `DNI`, `ID_GENERO`, `ID_ESTADO_CIVIL`, `NOMBRE_PERSONA`, `APELLIDO_PERSONA`, `FECHA_NACIMIENTO`, `EDAD`, `DIRECCION`, `TELEFONO`, `CELULAR`) VALUES
(1, '0801-1985-2936', 1, 1, 'Prescott', 'Baline', '1985-01-22', 35, 'Col. San Miguel', '(504) 9714-2297', '(504) 2311762'),
(2, '0801-1984-9573', 1, 1, 'Maurise', 'Tanser', '1984-11-05', 36, 'Altos del Trapiche', '(504) 8813-266', '(504) 2674-2592'),
(3, '0801-1992-2509', 1, 1, 'Eddie', 'Houchin', '1992-04-15', 28, 'Col. Kennedy', '(504) 9843-5251', ''),
(4, '0801-1990-6357', 1, 1, 'Rudie', 'Olliver', '1990-07-06', 30, 'Santa Lucia', '(504) 8177-9448', ''),
(5, '0801-1992-6481', 1, 1, 'Broddy', 'Goodlake', '1992-06-25', 28, 'Valle de Angeles', '(504) 3791-6766', '(504) 2227-4965'),
(6, '0801-1989-6022', 1, 1, 'Levi', 'Flament', '1989-01-22', 31, 'Residencial Plaza', '(504) 8722-621', '40'),
(7, '0801-1975-2191', 1, 1, 'Stillmann', 'Petrushanko', '1975-01-01', 45, 'Col. Villa Nueva', '(504) 9904-6349', '(504) 2341-2381'),
(8, '0801-1979-8660', 1, 1, 'Horacio', 'Davisson', '1979-09-22', 41, 'Residencial Prados Universitario', '(504) 8317-7188', '(504) 2324-4245'),
(9, '0801-1981-5338', 1, 1, 'Rickie', 'Barcroft', '1981-05-18', 39, 'Residencial Nueva Armedia ', '(504) 9227-5373', '(504) 2765-8437'),
(10, '1501-1997-4333', 2, 2, 'Cameron', 'Albro', '1978-01-14', 42, 'Residencial Aleman', '(504) 3289-3723', ''),
(11, '1501-1999-8175', 1, 1, 'Jonah', 'Kubera', '1990-09-07', 30, 'Col. Hato de Enmedio', '(504) 3945-8537', ''),
(12, '1501-1994-6155', 1, 2, 'Dunstan', 'Kinkaid', '1994-11-26', 26, 'Col. Los Llanos', '(504) 3308-9674', '(504) 2222-5485'),
(13, '1501-2002-7082', 1, 1, 'Hodge', 'Osinin', '2002-03-26', 18, 'Col. San Jose', '(504) 9935-7391', '(504)2228-2541'),
(14, '0703-1996-1767', 1, 1, 'Troy', 'Rainton', '1996-05-20', 23, 'Col. Kennedy', '(504) 8869-9691', '(504) 2294-3497'),
(15, '0703-1953-1525', 2, 1, 'Micah', 'Krystof', '1953-04-16', 67, 'Col. Bambino', '(504) 9739-3333', '(504) 2222-2222'),
(16, '0703-1950-6147', 2, 1, 'Alexei', 'Harsum', '1950-05-24', 70, 'Residencial Honduras', '(504) 9745-6377', ''),
(17, '0703-1971-0065', 1, 1, 'Bernei', 'Petken', '1971-05-20', 49, 'Col. Kennedy', '(504) 3224-9717', ''),
(18, '0703-1998-9819', 1, 1, 'Vincenz', 'Armor', '1998-05-07', 22, 'Col. Kennedy', '(504) 8811-9689', ''),
(19, '0703-2000-6837', 1, 1, 'Dru', 'Waghorne', '2000-02-26', 20, 'Col. San Miguel', '(504) 9775-3209', '(504) 2224-2247'),
(20, '0703-2001-9850', 2, 2, 'Ana', 'Blackaller', '2001-05-01', 18, 'Santa Lucia', '(504) 9723-2079', '(504) 2214-2946');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `TIPO_PRODUCTO` varchar(45) DEFAULT NULL,
  `ID_marca` int(11) NOT NULL,
  `PRECIO_COMPRA` varchar(30) DEFAULT NULL,
  `PRECIO_VENTA` varchar(30) DEFAULT NULL,
  `FECHA_INGRESO` date DEFAULT NULL,
  `CATEGORIA` varchar(45) DEFAULT NULL,
  `DETALLE_COMPRAS_UNIDADES` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`ID_PRODUCTO`, `TIPO_PRODUCTO`, `ID_marca`, `PRECIO_COMPRA`, `PRECIO_VENTA`, `FECHA_INGRESO`, `CATEGORIA`, `DETALLE_COMPRAS_UNIDADES`) VALUES
(1, 'Celular', 1, '$395.00', 'L5460.00', '2020-03-27', 'Telefonia', 1),
(2, 'Celular', 2, '$489.89', 'L11757.00', '2020-03-11', 'Telefonia', 4),
(3, 'Celular', 3, '$349.00', 'L8376', '2020-03-22', 'Telefonia', 5),
(4, 'Celular', 4, '$440.00', 'L10560.00', '2020-03-27', 'Telefonia', 6),
(5, 'Celular', 5, '$225.00', 'L5400.00', '2020-03-11', 'Telefonia', 7),
(6, 'Pantalla', 6, '$37.70', 'L905.00', '2020-03-22', 'Repuesto', 2),
(7, 'Pantalla', 1, '$41.86', 'L1004.00', '2020-03-27', 'Repuesto', 3),
(8, 'Bateria', 1, '$7.94', 'L200.00', '2020-03-11', 'Repuesto', 8),
(9, 'Tablet', 1, '$154.99', 'L3720.00', '2020-03-22', 'Notebooks', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_x_proveedor`
--

CREATE TABLE `tbl_producto_x_proveedor` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_PROVEEDOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto_x_proveedor`
--

INSERT INTO `tbl_producto_x_proveedor` (`ID_PRODUCTO`, `ID_PROVEEDOR`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 3),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL,
  `ID_TIPO_PROVEEDOR` int(11) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`ID_PROVEEDOR`, `ID_TIPO_PROVEEDOR`, `NOMBRE_PROVEEDOR`, `DIRECCION`) VALUES
(1, 1, 'Mundo Digital NYC', 'Miami, Florida'),
(2, 2, 'HTGCelulares', 'Buenos Aires, Argentina'),
(3, 3, 'VirtualZone', 'Miami, Florida, USA'),
(4, 3, 'Gol Mobile', 'Doral, Florida, USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursales`
--

CREATE TABLE `tbl_sucursales` (
  `ID_SUCURSAL` int(11) NOT NULL,
  `NOMBRE_SUCURSAL` varchar(45) NOT NULL,
  `DIRECCION_SUCURSAL` varchar(180) NOT NULL,
  `TELEFONO_SUCURSAL` varchar(20) NOT NULL,
  `FAX_SUCURSAL` varchar(45) DEFAULT NULL,
  `CORREO_SUCURSAL` varchar(60) NOT NULL,
  `FECHA_CREACION_SUCURSAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sucursales`
--

INSERT INTO `tbl_sucursales` (`ID_SUCURSAL`, `NOMBRE_SUCURSAL`, `DIRECCION_SUCURSAL`, `TELEFONO_SUCURSAL`, `FAX_SUCURSAL`, `CORREO_SUCURSAL`, `FECHA_CREACION_SUCURSAL`) VALUES
(1, 'Mund2 #1', 'Colonia San Miguel', '(504) 9955-5540', NULL, 'reparacionesmundo2@gmail.com', '2012-02-02'),
(2, 'Mund2 #2', 'Colonia La Esperanza', '(504) 9955-5540', NULL, 'reparacionesmundo2@gmail.com', '2016-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_bitacora`
--

CREATE TABLE `tbl_tipo_bitacora` (
  `ID_TIPO_BITACORA` int(11) NOT NULL,
  `BITACORA` varchar(40) NOT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_notificacion`
--

CREATE TABLE `tbl_tipo_notificacion` (
  `ID_TIPO_NOTIFICACION` int(11) NOT NULL,
  `TIPO_NOTIFICACION` varchar(45) NOT NULL,
  `DESCRIPCION_TIPO_NOTIF` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_notificacion`
--

INSERT INTO `tbl_tipo_notificacion` (`ID_TIPO_NOTIFICACION`, `TIPO_NOTIFICACION`, `DESCRIPCION_TIPO_NOTIF`) VALUES
(1, 'Notificación Por Llamda', 'Se reliza una llamada ya sea a número personal, de trabajo o cualquiera que pueda tener acceso'),
(2, 'Notificación Por Mensaje de texto', 'Se envia un mensaje via telefonia al numero personal'),
(3, 'Notificación Por Correo', 'Se envia un mensaje al correo electronico ya sea personal o no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_proveedor`
--

CREATE TABLE `tbl_tipo_proveedor` (
  `ID_TIPO_PROVEEDOR` int(11) NOT NULL,
  `TIPO_PROVEEDOR` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_proveedor`
--

INSERT INTO `tbl_tipo_proveedor` (`ID_TIPO_PROVEEDOR`, `TIPO_PROVEEDOR`, `DESCRIPCION`) VALUES
(1, 'Celulares', 'Exclusivo para la compra celulare'),
(2, 'Respuesto', 'Exclusivo para la compra de repuestos para celular'),
(3, 'Accesorios y Celulares', 'Compra de celulares y sus accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_titulaciones`
--

CREATE TABLE `tbl_titulaciones` (
  `ID_TITULACION` int(11) NOT NULL,
  `TITULACION` varchar(80) NOT NULL,
  `DESCRIPCION` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_titulaciones`
--

INSERT INTO `tbl_titulaciones` (`ID_TITULACION`, `TITULACION`, `DESCRIPCION`) VALUES
(1, 'Primaria', 'Culminación de estudios básicos'),
(2, 'Secundaria', 'Carrera Tecnica o Bachiller'),
(3, 'Superior', 'Carrera Univerisitaria'),
(4, 'Curso', 'Titulacion por agluna empresa lejan del sistema educativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timestamps`
--

CREATE TABLE `timestamps` (
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora_ventas`
--
ALTER TABLE `bitacora_ventas`
  ADD PRIMARY KEY (`ID_BITACORA_VENTAS`),
  ADD KEY `fk_BITACORA_VENTAS_TBL_FACTURAS1_idx` (`ID_FACTURA`);

--
-- Indices de la tabla `compra_repuestos`
--
ALTER TABLE `compra_repuestos`
  ADD PRIMARY KEY (`ID_COMPRA_REPUESTOS`),
  ADD KEY `fk_COMPRA_REPUESTOS_TBL_EXPEDIENTE_REPARACION1_idx` (`ID_EXPEDIENTE_REPARACION`),
  ADD KEY `fk_COMPRA_REPUESTOS_TBL_FACTURAS1_idx` (`ID_FACTURAS`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`ID_DETALLE_COMPRA`);

--
-- Indices de la tabla `tbl_bitacoras_empleados`
--
ALTER TABLE `tbl_bitacoras_empleados`
  ADD PRIMARY KEY (`ID_BITACORA`),
  ADD KEY `fk_TBL_BITACORAS_EMPLEADOS_TBL_TIPO_BITACORA1_idx` (`ID_TIPO_BITACORA`),
  ADD KEY `fk_TBL_BITACORAS_EMPLEADOS_TBL_EMPLEADOS1_idx` (`ID_EMPLEADO`);

--
-- Indices de la tabla `tbl_cargo_empleado`
--
ALTER TABLE `tbl_cargo_empleado`
  ADD PRIMARY KEY (`ID_CARGO_EMPLEADO`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `fk_TBL_CLIENTE_TBL_PERSONAS1_idx` (`ID_CLIENTE`);

--
-- Indices de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD PRIMARY KEY (`ID_COMPRA`),
  ADD KEY `fk_TBL_COMPRAS_DETALLE_COMPRAS1_idx` (`DETALLE_COMPRAS_UNIDADES`);

--
-- Indices de la tabla `tbl_descuentos`
--
ALTER TABLE `tbl_descuentos`
  ADD PRIMARY KEY (`ID_DESCUENTO`);

--
-- Indices de la tabla `tbl_detalles_factura`
--
ALTER TABLE `tbl_detalles_factura`
  ADD PRIMARY KEY (`ID_FACTURAS`,`ID_PRODUCTO`),
  ADD KEY `fk_TBL_DETALLES_FACTURA_TBL_PRODUCTO1_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_TBL_DETALLES_FACTURA_TBL_FACTURAS1_idx` (`ID_FACTURAS`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD KEY `fk_TBL_EMPLEADOS_TBL_SUCURSALES1_idx` (`ID_SUCURSAL`),
  ADD KEY `fk_TBL_EMPLEADOS_TBL_PERSONAS1_idx` (`ID_EMPLEADO`),
  ADD KEY `fk_TBL_EMPLEADOS_TBL_ESTATUS_EMPLEADO1_idx` (`ID_ESTATUS_EMPLEADO`),
  ADD KEY `fk_TBL_EMPLEADOS_TBL_TITULACIONES1_idx` (`ID_TITULACION`),
  ADD KEY `fk_TBL_EMPLEADOS_TBL_CARGO_EMPLEADO1_idx` (`ID_CARGO_EMPLEADO`);

--
-- Indices de la tabla `tbl_estado_civil`
--
ALTER TABLE `tbl_estado_civil`
  ADD PRIMARY KEY (`ID_ESTADO_CIVIL`);

--
-- Indices de la tabla `tbl_estatus_empleado`
--
ALTER TABLE `tbl_estatus_empleado`
  ADD PRIMARY KEY (`ID_ESTATUS_EMPLEADO`);

--
-- Indices de la tabla `tbl_expediente_reparacion`
--
ALTER TABLE `tbl_expediente_reparacion`
  ADD PRIMARY KEY (`ID_EXPEDIENTE_REPARACION`),
  ADD KEY `fk_TBL_EXPEDIENTE_REPARACION_TBL_SUCURSALES1_idx` (`ID_SUCURSAL`),
  ADD KEY `fk_TBL_EXPEDIENTE_REPARACION_TBL_PRODUCTO1_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_TBL_EXPEDIENTE_REPARACION_TBL_EMPLEADOS1_idx` (`ID_EMPLEADO`),
  ADD KEY `fk_TBL_EXPEDIENTE_REPARACION_TBL_GARANTIAS1_idx` (`ID_GARANTIA`);

--
-- Indices de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `fk_TBL_FACTURAS_TBL_MODOS_DE_PAGO1_idx` (`ID_MODOS_DE_PAGO`),
  ADD KEY `fk_TBL_FACTURAS_TBL_DESCUENTOS1_idx` (`ID_DESCUENTOS`);

--
-- Indices de la tabla `tbl_garantias`
--
ALTER TABLE `tbl_garantias`
  ADD PRIMARY KEY (`ID_GARANTIA`);

--
-- Indices de la tabla `tbl_generos`
--
ALTER TABLE `tbl_generos`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `tbl_marcas`
--
ALTER TABLE `tbl_marcas`
  ADD PRIMARY KEY (`ID_marca`);

--
-- Indices de la tabla `tbl_modos_de_pago`
--
ALTER TABLE `tbl_modos_de_pago`
  ADD PRIMARY KEY (`ID_MODOS_DE_PAGO`);

--
-- Indices de la tabla `tbl_notificaciones_clientes`
--
ALTER TABLE `tbl_notificaciones_clientes`
  ADD PRIMARY KEY (`ID_NOTIF_CLIENTE`),
  ADD KEY `fk_TBL_NOTIFICACIONES_CLIENTES_TBL_CLIENTE1_idx` (`ID_CLIENTE`),
  ADD KEY `fk_TBL_NOTIFICACIONES_CLIENTES_TBL_TIPO_NOTIFICACION1_idx` (`ID_TIPO_NOTIFICACION`);

--
-- Indices de la tabla `tbl_notificaciones_empleados`
--
ALTER TABLE `tbl_notificaciones_empleados`
  ADD PRIMARY KEY (`ID_NOTIF_EMPLEADO`),
  ADD KEY `fk_TBL_NOTIFICACIONES_EMPLEADOS_TBL_EMPLEADOS1_idx` (`ID_EMPLEADO`),
  ADD KEY `fk_TBL_NOTIFICACIONES_EMPLEADOS_TBL_TIPO_NOTIFICACION1_idx` (`ID_TIPO_NOTIFICACION`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`ID_PERSONA`),
  ADD KEY `fk_TBL_PERSONAS_TBL_GENERO1_idx` (`ID_GENERO`),
  ADD KEY `fk_TBL_PERSONAS_TBL_ESTADO_CIVIL1_idx` (`ID_ESTADO_CIVIL`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `fk_TBL_PRODUCTO_DETALLE_COMPRAS1_idx` (`DETALLE_COMPRAS_UNIDADES`),
  ADD KEY `ID_marca` (`ID_marca`);

--
-- Indices de la tabla `tbl_producto_x_proveedor`
--
ALTER TABLE `tbl_producto_x_proveedor`
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  ADD KEY `ID_PROVEEDOR` (`ID_PROVEEDOR`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`ID_PROVEEDOR`),
  ADD KEY `fk_TBL_PROVEEDOR_TBL_TIPO_PROVEEDOR1_idx` (`ID_TIPO_PROVEEDOR`);

--
-- Indices de la tabla `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  ADD PRIMARY KEY (`ID_SUCURSAL`);

--
-- Indices de la tabla `tbl_tipo_bitacora`
--
ALTER TABLE `tbl_tipo_bitacora`
  ADD PRIMARY KEY (`ID_TIPO_BITACORA`);

--
-- Indices de la tabla `tbl_tipo_notificacion`
--
ALTER TABLE `tbl_tipo_notificacion`
  ADD PRIMARY KEY (`ID_TIPO_NOTIFICACION`);

--
-- Indices de la tabla `tbl_tipo_proveedor`
--
ALTER TABLE `tbl_tipo_proveedor`
  ADD PRIMARY KEY (`ID_TIPO_PROVEEDOR`);

--
-- Indices de la tabla `tbl_titulaciones`
--
ALTER TABLE `tbl_titulaciones`
  ADD PRIMARY KEY (`ID_TITULACION`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora_ventas`
--
ALTER TABLE `bitacora_ventas`
  MODIFY `ID_BITACORA_VENTAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--

-- AUTO_INCREMENT de la tabla `compra_repuestos`
--
ALTER TABLE `compra_repuestos`
  MODIFY `ID_compra_repuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `ID_detalle_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_bitacoras_empleados`
--
ALTER TABLE `tbl_bitacoras_empleados`
  MODIFY `ID_BITACORA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_cargo_empleado`
--
ALTER TABLE `tbl_cargo_empleado`
  MODIFY `ID_CARGO_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_descuentos`
--
ALTER TABLE `tbl_descuentos`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  
--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;  
   

--
-- AUTO_INCREMENT de la tabla `tbl_estado_civil`
--
ALTER TABLE `tbl_estado_civil`
  MODIFY `ID_ESTADO_CIVIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_estatus_empleado`
--
ALTER TABLE `tbl_estatus_empleado`
  MODIFY `ID_ESTATUS_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_expediente_reparacion`
--
ALTER TABLE `tbl_expediente_reparacion`
  MODIFY `id_expediente_reparacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;    
  
-- AUTO_INCREMENT de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
-- AUTO_INCREMENT de la tabla `tbl_garantias`
--
ALTER TABLE `tbl_garantias`
  MODIFY `id_garantia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;  

--
-- AUTO_INCREMENT de la tabla `tbl_generos`
--
ALTER TABLE `tbl_generos`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_marcas`
--
ALTER TABLE `tbl_marcas`
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- AUTO_INCREMENT de la tabla `tbl_modos_de_pago`
--
ALTER TABLE `tbl_modos_de_pago`
  MODIFY `id_modos_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5; 
  
-- AUTO_INCREMENT de la tabla `tbl_notificaciones_clientes`
--
ALTER TABLE `tbl_notificaciones_clientes`
  MODIFY `id_notif_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5; 

--
-- AUTO_INCREMENT de la tabla `tbl_notificaciones_empleados`
--
ALTER TABLE `tbl_notificaciones_empleados`
  MODIFY `ID_NOTIF_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  MODIFY `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10; 

-- AUTO_INCREMENT de la tabla `tbl_tipo_proveedor`
--
ALTER TABLE `tbl_tipo_proveedor`
  MODIFY `id_tipo_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4; 

--
-- AUTO_INCREMENT de la tabla `tbl_sucursales`
--
ALTER TABLE `tbl_sucursales`
  MODIFY `ID_SUCURSAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_bitacora`
--
ALTER TABLE `tbl_tipo_bitacora`
  MODIFY `ID_TIPO_BITACORA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_notificacion`
--
ALTER TABLE `tbl_tipo_notificacion`
  MODIFY `ID_TIPO_NOTIFICACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_titulaciones`
--
ALTER TABLE `tbl_titulaciones`
  MODIFY `ID_TITULACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora_ventas`
--
ALTER TABLE `bitacora_ventas`
  ADD CONSTRAINT `fk_BITACORA_VENTAS_TBL_FACTURAS1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `tbl_facturas` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_repuestos`
--
ALTER TABLE `compra_repuestos`
  ADD CONSTRAINT `fk_COMPRA_REPUESTOS_TBL_EXPEDIENTE_REPARACION1` FOREIGN KEY (`ID_EXPEDIENTE_REPARACION`) REFERENCES `tbl_expediente_reparacion` (`ID_EXPEDIENTE_REPARACION`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_COMPRA_REPUESTOS_TBL_FACTURAS1` FOREIGN KEY (`ID_FACTURAS`) REFERENCES `tbl_facturas` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bitacoras_empleados`
--
ALTER TABLE `tbl_bitacoras_empleados`
  ADD CONSTRAINT `fk_TBL_BITACORAS_EMPLEADOS_TBL_EMPLEADOS1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `tbl_empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_BITACORAS_EMPLEADOS_TBL_TIPO_BITACORA1` FOREIGN KEY (`ID_TIPO_BITACORA`) REFERENCES `tbl_tipo_bitacora` (`ID_TIPO_BITACORA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD CONSTRAINT `fk_TBL_CLIENTE_TBL_PERSONAS1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `tbl_personas` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD CONSTRAINT `fk_TBL_COMPRAS_DETALLE_COMPRAS1` FOREIGN KEY (`DETALLE_COMPRAS_UNIDADES`) REFERENCES `detalle_compras` (`ID_DETALLE_COMPRA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_detalles_factura`
--
ALTER TABLE `tbl_detalles_factura`
  ADD CONSTRAINT `fk_TBL_DETALLES_FACTURA_TBL_FACTURAS1` FOREIGN KEY (`ID_FACTURAS`) REFERENCES `tbl_facturas` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_DETALLES_FACTURA_TBL_PRODUCTO1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `fk_TBL_EMPLEADOS_TBL_CARGO_EMPLEADO1` FOREIGN KEY (`ID_CARGO_EMPLEADO`) REFERENCES `tbl_cargo_empleado` (`ID_CARGO_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EMPLEADOS_TBL_ESTATUS_EMPLEADO1` FOREIGN KEY (`ID_ESTATUS_EMPLEADO`) REFERENCES `tbl_estatus_empleado` (`ID_ESTATUS_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EMPLEADOS_TBL_PERSONAS1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `tbl_personas` (`ID_PERSONA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EMPLEADOS_TBL_SUCURSALES1` FOREIGN KEY (`ID_SUCURSAL`) REFERENCES `tbl_sucursales` (`ID_SUCURSAL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EMPLEADOS_TBL_TITULACIONES1` FOREIGN KEY (`ID_TITULACION`) REFERENCES `tbl_titulaciones` (`ID_TITULACION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_expediente_reparacion`
--
ALTER TABLE `tbl_expediente_reparacion`
  ADD CONSTRAINT `fk_TBL_EXPEDIENTE_REPARACION_TBL_EMPLEADOS1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `tbl_empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EXPEDIENTE_REPARACION_TBL_GARANTIAS1` FOREIGN KEY (`ID_GARANTIA`) REFERENCES `tbl_garantias` (`ID_GARANTIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EXPEDIENTE_REPARACION_TBL_PRODUCTO1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_EXPEDIENTE_REPARACION_TBL_SUCURSALES1` FOREIGN KEY (`ID_SUCURSAL`) REFERENCES `tbl_sucursales` (`ID_SUCURSAL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD CONSTRAINT `fk_TBL_FACTURAS_TBL_DESCUENTOS1` FOREIGN KEY (`ID_DESCUENTOS`) REFERENCES `tbl_descuentos` (`ID_DESCUENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_FACTURAS_TBL_MODOS_DE_PAGO1` FOREIGN KEY (`ID_MODOS_DE_PAGO`) REFERENCES `tbl_modos_de_pago` (`ID_MODOS_DE_PAGO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_notificaciones_clientes`
--
ALTER TABLE `tbl_notificaciones_clientes`
  ADD CONSTRAINT `fk_TBL_NOTIFICACIONES_CLIENTES_TBL_CLIENTE1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `tbl_clientes` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_NOTIFICACIONES_CLIENTES_TBL_TIPO_NOTIFICACION1` FOREIGN KEY (`ID_TIPO_NOTIFICACION`) REFERENCES `tbl_tipo_notificacion` (`ID_TIPO_NOTIFICACION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_notificaciones_empleados`
--
ALTER TABLE `tbl_notificaciones_empleados`
  ADD CONSTRAINT `fk_TBL_NOTIFICACIONES_EMPLEADOS_TBL_EMPLEADOS1` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `tbl_empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_NOTIFICACIONES_EMPLEADOS_TBL_TIPO_NOTIFICACION1` FOREIGN KEY (`ID_TIPO_NOTIFICACION`) REFERENCES `tbl_tipo_notificacion` (`ID_TIPO_NOTIFICACION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `fk_TBL_PERSONAS_TBL_ESTADO_CIVIL1` FOREIGN KEY (`ID_ESTADO_CIVIL`) REFERENCES `tbl_estado_civil` (`ID_ESTADO_CIVIL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TBL_PERSONAS_TBL_GENERO1` FOREIGN KEY (`ID_GENERO`) REFERENCES `tbl_generos` (`ID_GENERO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `fk_TBL_PRODUCTO_DETALLE_COMPRAS1` FOREIGN KEY (`DETALLE_COMPRAS_UNIDADES`) REFERENCES `detalle_compras` (`ID_DETALLE_COMPRA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`ID_marca`) REFERENCES `tbl_marcas` (`ID_marca`);

--
-- Filtros para la tabla `tbl_producto_x_proveedor`
--
ALTER TABLE `tbl_producto_x_proveedor`
  ADD CONSTRAINT `tbl_producto_x_proveedor_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `tbl_producto_x_proveedor_ibfk_2` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `tbl_proveedor` (`ID_PROVEEDOR`);

--
-- Filtros para la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD CONSTRAINT `fk_TBL_PROVEEDOR_TBL_TIPO_PROVEEDOR1` FOREIGN KEY (`ID_TIPO_PROVEEDOR`) REFERENCES `tbl_tipo_proveedor` (`ID_TIPO_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
