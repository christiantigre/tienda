-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2016 a las 18:26:48
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `availables`
--

CREATE TABLE `availables` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `availables`
--

INSERT INTO `availables` (`id`, `name`) VALUES
(5, 'Azul'),
(4, 'Blanco'),
(7, 'Café'),
(6, 'Celeste'),
(3, 'Negro'),
(1, 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `availables_products`
--

CREATE TABLE `availables_products` (
  `id` int(11) NOT NULL,
  `availables_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `availables_products`
--

INSERT INTO `availables_products` (`id`, `availables_id`, `products_id`) VALUES
(2, 4, 60),
(3, 3, 60),
(4, 1, 60),
(5, 4, 61),
(6, 3, 61),
(7, 1, 61),
(8, 4, 63),
(9, 3, 63),
(10, 1, 63),
(11, 4, 64),
(12, 3, 64),
(13, 1, 64),
(14, 4, 65),
(15, 3, 65),
(16, 1, 65),
(17, 4, 66),
(18, 3, 66),
(19, 1, 66),
(20, 4, 67),
(21, 3, 67),
(22, 1, 67),
(23, 4, 70),
(24, 3, 70),
(25, 4, 74),
(26, 3, 74),
(27, 1, 74),
(28, 1, 75),
(29, 1, 76),
(30, 4, 77),
(31, 3, 77),
(32, 3, 78),
(33, 4, 79),
(34, 1, 79),
(35, 1, 80),
(36, 4, 81),
(37, 3, 81),
(38, 4, 82),
(39, 3, 82),
(40, 1, 82),
(41, 3, 83),
(42, 4, 84),
(43, 3, 84),
(44, 1, 85),
(45, 4, 86),
(46, 3, 86),
(47, 4, 87),
(48, 1, 88),
(49, 3, 89),
(50, 4, 90),
(51, 3, 90),
(52, 4, 95),
(53, 4, 96),
(54, 4, 98),
(62, 4, 1),
(63, 3, 1),
(67, 5, 100),
(68, 4, 100),
(69, 7, 100),
(70, 6, 100),
(71, 3, 100),
(72, 1, 100),
(73, 4, 46),
(74, 7, 46),
(75, 3, 46),
(76, 7, 94),
(77, 3, 94);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isactive_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `brand`, `created_at`, `updated_at`, `isactive_id`) VALUES
(1, 'Converse', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 1),
(2, 'Adidas', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 1),
(3, 'Nike', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 0),
(4, 'Vans', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 0),
(5, 'Timberland', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 0),
(6, 'Levis', '2016-05-28 07:29:10', '2016-05-28 07:29:10', 0),
(7, 'Venus', NULL, NULL, 1),
(8, 'Style', NULL, NULL, 0),
(9, 'Mafya', NULL, NULL, 1),
(10, 'Panda', NULL, NULL, 1),
(11, 'Ovin', NULL, NULL, 0),
(12, 'Otros', NULL, NULL, 1),
(13, 'Legin', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Zapatos', 'description of zapatos', '2016-05-28 07:29:10', '2016-05-28 07:29:10'),
(2, 'pantalones varón', 'description of pantalones', '2016-05-28 07:29:10', '2016-05-28 07:29:10'),
(3, 'shirt', 'description of shirt', '2016-05-28 07:29:10', '2016-05-28 07:29:10'),
(4, 'sweater', 'description of sweater', '2016-05-28 07:29:10', '2016-05-28 07:29:10'),
(5, 'Medias Hombre Adulto', 'Medias para adultos', NULL, NULL),
(6, 'Medias mujer adulta', 'Medias para mujer adulta', NULL, NULL),
(7, 'Medias niña', 'Medias de niñas entre 5 a 9 años de edad', NULL, NULL),
(8, 'Medias niño', 'Medias para niños entre 3 a 5 años de edad, en la marca style medias. mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', NULL, NULL),
(9, 'Medias bebe', '', NULL, NULL),
(10, 'Camisas de hombre', '', NULL, NULL),
(11, 'Camisas de mujer', '', NULL, NULL),
(12, 'Camisas de bebe', '', NULL, NULL),
(13, 'Chompas', '', NULL, NULL),
(15, 'Bufandas varon', '', NULL, NULL),
(17, 'Casacas de cuero', 'Casacas de cuero importado.', NULL, NULL),
(18, 'VESTIDOS DE MUJER', '', NULL, NULL),
(19, 'Camisetas', '', NULL, NULL),
(20, 'VÁRIOS', '', NULL, NULL),
(21, 'Casacas de cuero para mujer', '', NULL, NULL),
(22, 'Pantalones mujer', '', NULL, NULL),
(23, 'Pantalones para mujer', '', NULL, NULL),
(24, 'Abrigos', '', NULL, NULL),
(25, 'Blazers', '', NULL, NULL),
(26, 'Bermudas', '', NULL, NULL),
(27, 'Carteras', '', NULL, NULL),
(28, 'Mochilas de niño', '', NULL, NULL),
(29, 'Mochilas de niña', '', NULL, NULL),
(30, 'Camisas de niños', '', NULL, NULL),
(31, 'Pantalones para niño', '', NULL, NULL),
(32, 'Zapatos deportivos hombre', '', NULL, NULL),
(33, 'Zapatos deportivos mujer', '', NULL, NULL),
(34, 'Zapatos casuales', '', NULL, NULL),
(35, 'Zapatos para hombre', '', NULL, NULL),
(36, 'Zapatos para mujer', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  `fechanacimiento` varchar(45) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dir1` varchar(45) NOT NULL,
  `dir2` varchar(45) NOT NULL,
  `provincia_idprovincia` int(11) NOT NULL,
  `activo_idactivo` int(11) NOT NULL,
  `users_id` int(10) NOT NULL,
  `lt` varchar(45) NOT NULL DEFAULT '-2.8411279944959444',
  `lg` varchar(45) NOT NULL DEFAULT '-79.04033959374999',
  `imagen` char(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `apellidos`, `cedula`, `ruc`, `fechanacimiento`, `genero`, `telefono`, `celular`, `email`, `dir1`, `dir2`, `provincia_idprovincia`, `activo_idactivo`, `users_id`, `lt`, `lg`, `imagen`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Christian', 'Tigre', '099909898', NULL, '12/17/1991', NULL, NULL, NULL, 'storelinect@gmail.com', '', '', 0, 0, 1, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-06-21 04:46:00', '2016-06-21 04:46:00'),
(2, 'Christian', 'Tigre C.', '0105118509', '0105118509001', '05/17/1991', '2', '2203584', '0979262364', 'andrescondo17@gmail.com', '3 de Noviembre', 'Cesar cueva', 24, 0, 2, '-2.8552', '-78.7787334', '', '28img curriculum.PNG', '2016-06-21 04:47:26', '2016-07-26 21:00:30'),
(3, 'Erika', 'Torres A.', '0105239925', '0105239925', '03/25/1994', 'Femenino', '', '0984375379', 'naomi672@gmail.com', 'Cuenca', 'Vazquez Correa', 9, 0, 3, '-2.8909646', '-78.9876586', '', '', '2016-06-29 20:23:45', '2016-06-29 20:32:38'),
(4, 'Andres', 'Condo', '0106374440', '0106374440001', '12/17/1991', 'Masculino', '2203584', '0979262364', 'andrestigre69@gmail.com', '3  de noviembre', 'Cesar cueva', 9, 0, 4, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-01 01:11:29', '2016-07-01 02:01:18'),
(5, 'Jessica', 'Nugra', '0105237663', '', '04/21/1995', 'Femenino', '3010095', '0987566157', 'nrodriguezjessy@gmail.com', 'Sigsig', 'Sigsig', 9, 0, 5, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-01 11:12:00', '2016-07-01 11:16:22'),
(6, 'silvia patricia', 'Velez zuñiga', '0105551188', '', '12/17/1991', 'Femenino', '', '0979384797', 'silvia-patricia25@hotmail.com', 'Gualaceo', '', 9, 0, 6, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-01 11:22:19', '2016-07-01 11:29:14'),
(7, 'Axel', 'Tigre C.', '0104260112', '', '07/27/1990', 'Masculino', '2203584', '0979262364', 'chantigre@sudamericano.edu.ec', '', '', 9, 0, 7, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-04 20:25:27', '2016-07-04 20:31:10'),
(8, 'libia', 'Rocano', '0105130744', '', '11/16/1991', 'Femenino', '2203485', '0984232352', 'lmrcondo@yahoo.com', '3 de Noviembre', '', 9, 0, 8, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-22 05:34:04', '2016-07-22 05:39:30'),
(9, 'alam91', NULL, NULL, NULL, '07/24/1997', NULL, NULL, NULL, 'alam91@yahoo.com', '', '', 0, 0, 9, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-07-22 07:00:31', '2016-07-22 07:00:31'),
(10, 'Andres', 'Condo', '0100094648', '', '12/17/1991', '2', '2203584', '0979262364', 'andrescondo17@yahoo.com', '3 de Noviembre', 'Cesar Cueva', 24, 0, 10, '-2.8411279944959444', '-79.04033959374999', '', '54índice.jpg', '2016-07-22 07:35:24', '2016-07-27 04:23:54'),
(12, 'Andres', 'Condo', '0105118408', '0105118508001', '12/17/1991', '2', '2203584', '0979262364', 'andrescondo_17@outlook.com', '3 de Noviembre', 'Cesar Cueva', 9, 0, 12, '-2.8411279944959444', '-79.04033959374999', '', '', '2016-11-02 00:51:41', '2016-11-02 23:23:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nation` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `country`, `nation`, `created_at`, `updated_at`) VALUES
(1, 'ECUADOR', '', NULL, NULL),
(2, 'COLOMBIA', '', NULL, NULL),
(3, 'MEXICO', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `depart` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `depart`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRACIÓN', NULL, NULL),
(2, 'BODEGA', NULL, NULL),
(3, 'DESPACHOS', NULL, NULL),
(4, 'CAJA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employes`
--

CREATE TABLE `employes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechanacimiento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `isactive_id` int(10) UNSIGNED NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estcivil` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sld` double(15,2) NOT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `employes`
--

INSERT INTO `employes` (`id`, `nombres`, `apellidos`, `fechanacimiento`, `genero`, `cedula`, `cargo_id`, `department_id`, `country_id`, `province_id`, `isactive_id`, `telefono`, `celular`, `email`, `img`, `dir`, `estcivil`, `sld`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'christian andres', 'tigre condo', '17/12/1991', '2', '0105118509', 3, 3, 1, 24, 1, '2203584', '0979262364', 'andrescondo17@gmail.com', '', '', '0.00', 350.00, 'christian andres', '$2y$10$J5pfg320edjhFENvlVhXtefhuf.9', '4MjsYzYwfYtaEHkcTKbFjca2ESpa6NDaa18kdd4VO7BOF', '2016-10-11 08:34:01', '2016-10-11 08:34:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empress`
--

CREATE TABLE `empress` (
  `id` int(11) NOT NULL,
  `nom` char(45) DEFAULT NULL,
  `ruc` char(13) DEFAULT NULL,
  `tlfun` char(15) DEFAULT NULL,
  `tlfds` char(15) DEFAULT NULL,
  `cel` char(15) DEFAULT NULL,
  `fax` char(15) DEFAULT NULL,
  `dir` char(99) DEFAULT NULL,
  `pagweb` char(150) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `ln` varchar(45) DEFAULT NULL,
  `lg` varchar(45) DEFAULT NULL,
  `prop` varchar(45) DEFAULT NULL,
  `gernt` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `observ` varchar(255) DEFAULT NULL,
  `prov` varchar(45) DEFAULT NULL,
  `ciu` varchar(45) DEFAULT NULL,
  `count` varchar(45) DEFAULT NULL,
  `razonsoc` varchar(300) DEFAULT NULL,
  `codestablecimiento` varchar(3) NOT NULL,
  `codpntemision` varchar(3) NOT NULL,
  `dirmatriz` varchar(150) NOT NULL,
  `ambiente` varchar(1) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  `iva_id` int(11) NOT NULL,
  `pathcertificate` varchar(255) NOT NULL,
  `passcertificate` varchar(255) NOT NULL,
  `obligadocontbl` tinyint(1) NOT NULL DEFAULT '0',
  `tip_contrib` char(45) NOT NULL,
  `num_contrib` char(45) NOT NULL,
  `tip_emision` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empress`
--

INSERT INTO `empress` (`id`, `nom`, `ruc`, `tlfun`, `tlfds`, `cel`, `fax`, `dir`, `pagweb`, `img`, `ln`, `lg`, `prop`, `gernt`, `email`, `observ`, `prov`, `ciu`, `count`, `razonsoc`, `codestablecimiento`, `codpntemision`, `dirmatriz`, `ambiente`, `moneda_id`, `iva_id`, `pathcertificate`, `passcertificate`, `obligadocontbl`, `tip_contrib`, `num_contrib`, `tip_emision`) VALUES
(1, 'StoreLine', '0105118509001', '2203584', '2203485', '0979262364', '2203599', '3 de Noviembre y Cesar Cueva', 'www.storeline.com', 'https://es.shopify.com/herramientas/generador-logos/mostrar/NDh6OS96ZEppMEUrOFFmdjBPb1gvZz09LS1MTEluaWJVa1ZYcGV2NWtrYTdvNVNnPT0=--3f00cc928fdb90c61654f792e6db46b708a704e0.png', '-2.8552448999999998', '-78.7786246', 'TIGRE CONDO CHRISTIAN ANDRES', 'Andres Condo', 'storelinect@gmail.com', 'Empresa de venta en linea de cualquier producto.', 'Azuay', 'Cuenca', 'Ecuador', 'Christian Andres Tigre Condo', '001', '001', 'Remigio Crespo y Lorenzo Piedra', '1', 1, 3, 'christian_andres_tigre_condo.p12', 'Christian0105', 0, '', '', 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emps`
--

CREATE TABLE `emps` (
  `id` int(11) NOT NULL,
  `nombres` char(45) DEFAULT NULL,
  `apellidos` char(45) DEFAULT NULL,
  `fechanacimiento` char(10) DEFAULT NULL,
  `genero` char(9) DEFAULT NULL,
  `cedula` char(10) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `isactive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `estcivil` decimal(15,2) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `sld` decimal(15,2) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emps`
--

INSERT INTO `emps` (`id`, `nombres`, `apellidos`, `fechanacimiento`, `genero`, `cedula`, `cargo_id`, `department_id`, `country_id`, `province_id`, `isactive_id`, `created_at`, `updated_at`, `telefono`, `celular`, `email`, `img`, `estcivil`, `dir`, `sld`, `username`, `password`, `remember_token`) VALUES
(1, 'christian andres', 'tigre condo', '17/12/1991', '2', '0105118509', 3, 3, 1, 24, 1, '2016-10-11 08:34:01', '2016-10-11 08:34:01', '2203584', '0979262364', 'andrescondo17@gmail.com', '', '0.00', '', '350.00', NULL, '$2y$10$J5pfg320edjhFENvlVhXtefhuf.9489Zz8llPruRLF.ks8lk2qlu2', NULL),
(2, 'Andres', 'condo', '12/17/1991', '2', '0105118500', 1, 1, 1, 24, 1, '2016-10-15 00:10:35', '2016-10-15 07:47:41', '2203584', '0979262364', 'andrescondo18@gmail.com', '', '0.00', '3 de Noviembre', '350.00', NULL, '$2y$10$2SFX2qaASALVoNOQEwBHve3XKepT79073OJcVheiBihK/Gx2qVjgm', NULL),
(3, 'Juan', 'Perez', '12/17/1991', '2', '0909009898', 3, 1, 1, 9, 1, '2016-10-26 21:57:58', '2016-10-26 21:57:58', '2203584', '0979262364', 'aincram1971@gmail.com', '', '0.00', '3 de Noviembre', '0.00', NULL, '$2y$10$wS7wTSd7T/vGAFeQ7HtwYu6gNsbGZ5Pz8QtUr8Aas3NeRuGx50qGO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE `intentos` (
  `id` int(2) NOT NULL,
  `intentos` int(2) NOT NULL,
  `isactive_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`id`, `intentos`, `isactive_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isactives`
--

CREATE TABLE `isactives` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `val` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `isactives`
--

INSERT INTO `isactives` (`id`, `name`, `val`, `created_at`, `updated_at`) VALUES
(1, 'Active', '1', '2016-05-28 07:29:10', '2016-05-28 07:29:10'),
(2, 'Inactive', '0', '2016-05-28 07:29:10', '2016-05-28 07:29:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itempedido`
--

CREATE TABLE `itempedido` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `prec` double(12,1) DEFAULT NULL,
  `cant` int(3) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `size` varchar(45) DEFAULT NULL,
  `preference` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `descuento` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itempedido`
--

INSERT INTO `itempedido` (`id`, `products_id`, `prec`, `cant`, `pedido_id`, `size`, `preference`, `number`, `descuento`) VALUES
(1, 14, 15.0, 2, 1, '', '', '', 0.00),
(2, 12, 20.0, 1, 1, '', '', '', 0.00),
(3, 11, 17.5, 3, 3, '', '', '', 0.00),
(4, 11, 17.5, 2, 4, '', '', '', 0.00),
(5, 11, 17.5, 2, 5, '', '', '', 0.00),
(6, 11, 17.5, 2, 6, '', '', '', 0.00),
(7, 3, 43.5, 1, 7, '', '', '', 0.00),
(8, 11, 17.5, 1, 7, '', '', '', 0.00),
(9, 11, 17.5, 1, 8, '', '', '', 0.00),
(10, 12, 20.0, 1, 8, '', '', '', 0.00),
(11, 12, 20.0, 4, 9, '', '', '', 0.00),
(12, 12, 20.0, 2, 10, '', '', '', 0.00),
(13, 14, 15.0, 2, 10, '', '', '', 0.00),
(14, 11, 17.5, 1, 10, '', '', '', 0.00),
(15, 6, 60.1, 2, 11, '', '', '', 0.00),
(16, 6, 60.1, 2, 12, '', '', '', 0.00),
(17, 11, 17.5, 1, 12, '', '', '', 0.00),
(18, 7, 70.9, 1, 12, '', '', '', 0.00),
(19, 14, 15.0, 1, 12, '', '', '', 0.00),
(20, 14, 15.0, 2, 13, '', '', '', 0.00),
(21, 12, 20.0, 2, 13, '', '', '', 0.00),
(22, 11, 17.5, 1, 13, '', '', '', 0.00),
(23, 14, 15.0, 1, 14, '', '', '', 0.00),
(24, 14, 15.0, 1, 15, '', '', '', 0.00),
(25, 11, 17.5, 5, 16, '', '', '', 0.00),
(26, 14, 15.0, 1, 17, '', '', '', 0.00),
(27, 12, 20.0, 1, 17, '', '', '', 0.00),
(28, 12, 20.0, 2, 18, '', '', '', 0.00),
(29, 11, 17.5, 2, 18, '', '', '', 0.00),
(30, 7, 70.9, 1, 19, '', '', '', 0.00),
(31, 14, 15.0, 1, 19, '', '', '', 0.00),
(32, 100, 30.0, 2, 26, '', '', '', 0.00),
(33, 99, 36.0, 4, 26, '', '', '', 0.00),
(34, 100, 30.0, 3, 27, '', '', '', 0.00),
(35, 100, 30.0, 4, 28, 'Pequeño', 'Blanco', '35', 0.00),
(36, 100, 30.0, 4, 29, 'Pequeño', 'Blanco', '35', 0.00),
(37, 100, 30.0, 5, 30, 'Pequeño', 'Celeste', '35', 0.00),
(38, 100, 30.0, 1, 32, 'Pequeño', 'Celeste', '', 0.00),
(39, 100, 30.0, 1, 33, 'Pequeño', 'Celeste', '', 0.00),
(40, 100, 30.0, 1, 34, 'Pequeño', 'Celeste', '', 0.00),
(41, 46, 30.0, 3, 35, '', 'Blanco', '40', 0.00),
(42, 100, 30.0, 1, 35, 'Pequeño', 'Blanco', '35', 0.00),
(43, 94, 43.0, 9, 35, '', 'Negro', '40', 0.00),
(44, 46, 30.0, 3, 36, '', 'Blanco', '40', 0.00),
(45, 100, 30.0, 1, 36, 'Pequeño', 'Blanco', '35', 0.00),
(46, 94, 43.0, 9, 36, '', 'Negro', '40', 0.00),
(47, 46, 30.0, 3, 37, '', 'Blanco', '40', 0.00),
(48, 100, 30.0, 1, 37, 'Pequeño', 'Blanco', '35', 0.00),
(49, 94, 43.0, 9, 37, '', 'Negro', '40', 0.00),
(50, 46, 30.0, 3, 38, '', 'Blanco', '40', 0.00),
(51, 100, 30.0, 1, 38, 'Pequeño', 'Blanco', '35', 0.00),
(52, 94, 43.0, 9, 38, '', 'Negro', '40', 0.00),
(53, 46, 30.0, 3, 39, '', 'Blanco', '40', 0.00),
(54, 100, 30.0, 1, 39, 'Pequeño', 'Blanco', '35', 0.00),
(55, 94, 43.0, 9, 39, '', 'Negro', '40', 0.00),
(56, 100, 30.0, 1, 40, 'Pequeño', 'Celeste', '35', 0.00),
(57, 97, 30.0, 3, 41, 'Mediano', '', '', 0.00),
(58, 97, 30.0, 3, 42, 'Mediano', '', '', 0.00),
(59, 97, 30.0, 3, 43, 'Mediano', '', '', 0.00),
(60, 100, 30.0, 3, 44, 'Pequeño', 'Blanco', '', 0.00),
(61, 99, 36.0, 2, 44, 'Grande', '', '', 0.00),
(62, 100, 30.0, 3, 45, 'Pequeño', 'Blanco', '', 0.00),
(63, 99, 36.0, 2, 45, 'Grande', '', '', 0.00),
(64, 99, 36.0, 1, 46, 'Grande', '', '', 0.00),
(65, 99, 36.0, 1, 47, 'Grande', '', '', 0.00),
(66, 99, 36.0, 3, 48, 'Grande', '', '', 0.00),
(67, 99, 36.0, 3, 49, 'Grande', '', '', 0.00),
(68, 99, 36.0, 3, 50, 'Grande', '', '', 0.00),
(69, 99, 36.0, 4, 51, 'Grande', '', '', 0.00),
(70, 99, 36.0, 4, 52, 'Grande', '', '', 0.00),
(71, 99, 36.0, 4, 53, 'Grande', '', '', 0.00),
(72, 99, 36.0, 4, 54, 'Grande', '', '', 0.00),
(73, 99, 36.0, 4, 55, 'Grande', '', '', 0.00),
(74, 99, 36.0, 4, 56, 'Grande', '', '', 0.00),
(75, 99, 36.0, 4, 57, 'Grande', '', '', 0.00),
(76, 99, 36.0, 4, 58, 'Grande', '', '', 0.00),
(77, 99, 36.0, 4, 59, 'Grande', '', '', 0.00),
(78, 99, 36.0, 4, 60, 'Grande', '', '', 0.00),
(79, 99, 36.0, 4, 61, 'Grande', '', '', 0.00),
(80, 99, 36.0, 4, 62, 'Grande', '', '', 0.00),
(81, 99, 36.0, 4, 63, 'Grande', '', '', 0.00),
(82, 98, 36.0, 2, 64, 'Grande', 'Blanco', '', 0.00),
(83, 98, 36.0, 2, 65, 'Grande', 'Blanco', '', 0.00),
(84, 98, 36.0, 2, 66, 'Grande', 'Blanco', '', 0.00),
(85, 100, 30.0, 1, 67, 'Pequeño', '', '', 0.00),
(86, 99, 36.0, 2, 67, 'Mediano', '', '', 0.00),
(87, 94, 43.0, 2, 67, '', 'Café', '38', 0.00),
(88, 82, 15.0, 3, 68, 'Pequeño', 'Rojo', '', 0.00),
(89, 81, 10.0, 2, 68, 'Pequeño', 'Blanco', '', 0.00),
(90, 80, 10.0, 2, 68, 'Pequeño', 'Rojo', '', 0.00),
(91, 99, 36.0, 3, 69, 'Mediano', '', '', 0.00),
(92, 100, 30.0, 2, 71, 'Pequeño', 'Blanco', '', 0.00),
(93, 96, 36.0, 2, 71, '', 'Blanco', '40', 0.00),
(94, 99, 36.0, 3, 71, 'Grande', '', '', 0.00),
(95, 100, 30.0, 2, 72, 'Pequeño', 'Blanco', '', 0.00),
(96, 96, 36.0, 2, 72, '', 'Blanco', '40', 0.00),
(97, 99, 36.0, 3, 72, 'Grande', '', '', 0.00),
(98, 100, 30.0, 2, 73, 'Pequeño', 'Blanco', '', 0.00),
(99, 96, 36.0, 2, 73, '', 'Blanco', '40', 0.00),
(100, 99, 36.0, 3, 73, 'Grande', '', '', 0.00),
(101, 100, 30.0, 2, 74, 'Pequeño', 'Blanco', '', 0.00),
(102, 96, 36.0, 2, 74, '', 'Blanco', '40', 0.00),
(103, 99, 36.0, 3, 74, 'Grande', '', '', 0.00),
(104, 100, 30.0, 2, 75, 'Pequeño', 'Blanco', '', 0.00),
(105, 96, 36.0, 2, 75, '', 'Blanco', '40', 0.00),
(106, 99, 36.0, 2, 75, 'Grande', '', '', 0.00),
(107, 100, 30.0, 2, 76, 'Pequeño', 'Blanco', '', 0.00),
(108, 96, 36.0, 1, 76, '', 'Blanco', '40', 0.00),
(109, 99, 36.0, 2, 76, 'Grande', '', '', 0.00),
(110, 100, 30.0, 1, 77, 'Pequeño', 'Blanco', '', 0.00),
(111, 96, 36.0, 1, 77, '', 'Blanco', '40', 0.00),
(112, 99, 36.0, 2, 77, 'Grande', '', '', 0.00),
(113, 100, 30.0, 1, 78, 'Pequeño', 'Blanco', '', 0.00),
(114, 96, 36.0, 1, 78, '', 'Blanco', '40', 0.00),
(115, 99, 36.0, 2, 78, 'Grande', '', '', 0.00),
(116, 100, 30.0, 1, 79, 'Pequeño', 'Blanco', '', 0.00),
(117, 96, 36.0, 1, 79, '', 'Blanco', '40', 0.00),
(118, 99, 36.0, 2, 79, 'Grande', '', '', 0.00),
(119, 100, 30.0, 1, 80, 'Pequeño', 'Blanco', '', 0.00),
(120, 96, 36.0, 1, 80, '', 'Blanco', '40', 0.00),
(121, 99, 36.0, 2, 80, 'Grande', '', '', 0.00),
(122, 95, 30.0, 2, 81, '', 'Blanco', '38', 0.00),
(123, 94, 43.0, 2, 81, '', 'Café', '38', 0.00),
(124, 83, 62.7, 1, 82, 'Mediano', 'Negro', '', 0.00),
(125, 83, 62.7, 2, 83, 'Mediano', 'Negro', '', 0.00),
(126, 83, 62.7, 2, 84, 'Mediano', 'Negro', '', 0.00),
(127, 83, 62.7, 2, 85, 'Mediano', 'Negro', '', 0.00),
(128, 83, 62.7, 2, 86, 'Mediano', 'Negro', '', 0.00),
(129, 83, 62.7, 2, 87, 'Mediano', 'Negro', '', 0.00),
(130, 83, 62.7, 2, 88, 'Mediano', 'Negro', '', 0.00),
(131, 83, 62.7, 2, 89, 'Mediano', 'Negro', '', 0.00),
(132, 83, 62.7, 2, 90, 'Mediano', 'Negro', '', 0.00),
(133, 83, 62.7, 2, 91, 'Mediano', 'Negro', '', 0.00),
(134, 83, 62.7, 2, 92, 'Mediano', 'Negro', '', 0.00),
(135, 83, 62.7, 2, 93, 'Mediano', 'Negro', '', 0.00),
(136, 83, 62.7, 2, 94, 'Mediano', 'Negro', '', 0.00),
(137, 83, 62.7, 2, 95, 'Mediano', 'Negro', '', 0.00),
(138, 83, 62.7, 2, 96, 'Mediano', 'Negro', '', 0.00),
(139, 83, 62.7, 2, 97, 'Mediano', 'Negro', '', 0.00),
(140, 83, 62.7, 2, 98, 'Mediano', 'Negro', '', 0.00),
(141, 83, 62.7, 2, 99, 'Mediano', 'Negro', '', 0.00),
(142, 83, 62.7, 2, 100, 'Mediano', 'Negro', '', 0.00),
(143, 83, 62.7, 2, 101, 'Mediano', 'Negro', '', 0.00),
(144, 100, 30.0, 2, 102, 'Pequeño', 'Azul', '', 0.00),
(145, 99, 36.0, 1, 102, 'Grande', '', '', 0.00),
(146, 100, 30.0, 2, 103, 'Pequeño', 'Azul', '', 0.00),
(147, 99, 36.0, 1, 103, 'Grande', '', '', 0.00),
(148, 100, 30.0, 2, 104, 'Pequeño', 'Azul', '', 0.00),
(149, 99, 36.0, 1, 104, 'Grande', '', '', 0.00),
(150, 100, 30.0, 2, 105, 'Pequeño', 'Azul', '', 0.00),
(151, 99, 36.0, 1, 105, 'Grande', '', '', 0.00),
(152, 100, 30.0, 2, 106, 'Pequeño', 'Azul', '', 0.00),
(153, 99, 36.0, 1, 106, 'Grande', '', '', 0.00),
(154, 100, 30.0, 2, 107, 'Pequeño', 'Azul', '', 0.00),
(155, 99, 36.0, 1, 107, 'Grande', '', '', 0.00),
(156, 100, 30.0, 2, 108, 'Pequeño', 'Azul', '', 0.00),
(157, 99, 36.0, 1, 108, 'Grande', '', '', 0.00),
(158, 100, 30.0, 2, 109, 'Pequeño', 'Azul', '', 0.00),
(159, 99, 36.0, 1, 109, 'Grande', '', '', 0.00),
(160, 95, 55.0, 2, 110, '', 'Blanco', '38', 0.00),
(161, 83, 62.7, 2, 111, 'Mediano', 'Negro', '', 0.00),
(162, 83, 62.7, 2, 112, 'Mediano', 'Negro', '', 0.00),
(163, 83, 62.7, 2, 113, 'Mediano', 'Negro', '', 0.00),
(164, 83, 62.7, 2, 114, 'Mediano', 'Negro', '', 0.00),
(165, 83, 62.7, 2, 115, 'Mediano', 'Negro', '', 0.00),
(166, 83, 62.7, 2, 116, 'Mediano', 'Negro', '', 0.00),
(167, 83, 62.7, 2, 117, 'Mediano', 'Negro', '', 0.00),
(168, 83, 62.7, 4, 118, 'Mediano', 'Negro', '', 0.00),
(169, 99, 36.0, 2, 119, 'Grande', '', '', 0.00),
(170, 83, 62.7, 2, 120, 'Grande', 'Negro', '', 0.00),
(171, 83, 62.7, 2, 121, 'Grande', 'Negro', '', 0.00),
(172, 62, 30.0, 2, 121, '', '', '', 0.00),
(173, 83, 62.7, 3, 122, 'Grande', 'Negro', '', 0.00),
(174, 62, 30.0, 3, 122, '', '', '', 0.00),
(175, 83, 62.7, 3, 123, 'Grande', 'Negro', '', 0.00),
(176, 62, 30.0, 3, 123, '', '', '', 0.00),
(177, 83, 62.7, 3, 124, 'Grande', 'Negro', '', 0.00),
(178, 62, 30.0, 3, 124, '', '', '', 0.00),
(179, 83, 62.7, 3, 125, 'Grande', 'Negro', '', 0.00),
(180, 62, 30.0, 3, 125, '', '', '', 0.00),
(181, 100, 30.0, 3, 126, 'Pequeño', 'Azul', '35', 0.00),
(182, 100, 30.0, 4, 127, 'Pequeño', 'Azul', '35', 0.00),
(183, 100, 30.0, 4, 128, 'Pequeño', 'Azul', '35', 0.00),
(184, 99, 36.0, 1, 128, 'Grande', '', '', 0.00),
(185, 100, 30.0, 4, 129, 'Pequeño', 'Azul', '35', 0.00),
(186, 99, 36.0, 2, 129, 'Grande', '', '', 0.00),
(187, 100, 30.0, 3, 130, 'Pequeño', 'Azul', '35', 0.00),
(188, 99, 36.0, 2, 130, 'Grande', '', '', 0.00),
(189, 100, 30.0, 2, 131, 'Pequeño', 'Azul', '35', 0.00),
(190, 99, 36.0, 2, 131, 'Grande', '', '', 0.00),
(191, 100, 30.0, 2, 132, 'Pequeño', 'Azul', '35', 0.00),
(192, 99, 36.0, 2, 132, 'Grande', '', '', 0.00),
(193, 100, 30.0, 1, 133, 'Pequeño', 'Azul', '35', 0.00),
(194, 99, 36.0, 2, 133, 'Grande', '', '', 0.00),
(195, 100, 30.0, 2, 134, 'Pequeño', 'Azul', '35', 0.00),
(196, 99, 36.0, 1, 134, 'Grande', '', '', 0.00),
(197, 100, 30.0, 2, 135, 'Pequeño', 'Azul', '35', 0.00),
(198, 99, 36.0, 1, 135, 'Grande', '', '', 0.00),
(199, 100, 30.0, 2, 136, 'Pequeño', 'Azul', '35', 0.00),
(200, 99, 36.0, 1, 136, 'Grande', '', '', 0.00),
(201, 100, 30.0, 2, 137, 'Pequeño', 'Azul', '35', 0.00),
(202, 99, 36.0, 1, 137, 'Grande', '', '', 0.00),
(203, 100, 30.0, 2, 138, 'Pequeño', 'Azul', '35', 0.00),
(204, 99, 36.0, 2, 138, 'Grande', '', '', 0.00),
(205, 100, 30.0, 2, 139, 'Pequeño', 'Azul', '35', 0.00),
(206, 99, 36.0, 2, 139, 'Grande', '', '', 0.00),
(207, 100, 30.0, 1, 140, 'Pequeño', 'Azul', '35', 0.00),
(208, 99, 36.0, 2, 140, 'Grande', '', '', 0.00),
(209, 100, 30.0, 1, 141, 'Pequeño', 'Azul', '35', 0.00),
(210, 99, 36.0, 2, 141, 'Grande', '', '', 0.00),
(211, 100, 30.0, 2, 142, 'Pequeño', 'Azul', '35', 0.00),
(212, 99, 36.0, 3, 142, 'Grande', '', '', 0.00),
(213, 100, 30.0, 2, 143, 'Pequeño', 'Azul', '35', 0.00),
(214, 99, 36.0, 4, 143, 'Grande', '', '', 0.00),
(215, 100, 30.0, 2, 144, 'Pequeño', 'Azul', '35', 0.00),
(216, 99, 36.0, 4, 144, 'Grande', '', '', 0.00),
(217, 98, 36.0, 1, 144, 'Mediano', 'Blanco', '', 0.00),
(218, 100, 30.0, 1, 145, 'Pequeño', 'Azul', '35', 0.00),
(219, 99, 36.0, 2, 145, 'Grande', '', '', 0.00),
(220, 98, 36.0, 1, 145, 'Mediano', 'Blanco', '', 0.00),
(221, 100, 30.0, 2, 146, 'Pequeño', 'Azul', '35', 0.00),
(222, 99, 36.0, 2, 146, 'Grande', '', '', 0.00),
(223, 98, 36.0, 1, 146, 'Mediano', 'Blanco', '', 0.00),
(224, 100, 30.0, 2, 147, 'Pequeño', 'Azul', '35', 0.00),
(225, 99, 36.0, 2, 147, 'Grande', '', '', 0.00),
(226, 98, 36.0, 1, 147, 'Mediano', 'Blanco', '', 0.00),
(227, 100, 30.0, 2, 148, 'Pequeño', 'Azul', '35', 0.00),
(228, 99, 36.0, 2, 148, 'Grande', '', '', 0.00),
(229, 98, 36.0, 1, 148, 'Mediano', 'Blanco', '', 0.00),
(230, 100, 30.0, 2, 149, 'Pequeño', 'Azul', '35', 0.00),
(231, 99, 36.0, 2, 149, 'Grande', '', '', 0.00),
(232, 98, 36.0, 1, 149, 'Mediano', 'Blanco', '', 0.00),
(233, 99, 36.0, 2, 150, 'Grande', '', '', 0.00),
(234, 98, 36.0, 1, 150, 'Mediano', 'Blanco', '', 0.00),
(235, 99, 36.0, 2, 151, 'Grande', '', '', 0.00),
(236, 98, 36.0, 2, 151, 'Mediano', 'Blanco', '', 0.00),
(237, 99, 36.0, 2, 152, 'Grande', '', '', 0.00),
(238, 98, 36.0, 2, 152, 'Mediano', 'Blanco', '', 0.00),
(239, 99, 36.0, 2, 153, 'Grande', '', '', 0.00),
(240, 98, 36.0, 2, 153, 'Mediano', 'Blanco', '', 0.00),
(241, 99, 36.0, 3, 154, 'Grande', '', '', 0.00),
(242, 98, 36.0, 2, 154, 'Mediano', 'Blanco', '', 0.00),
(243, 99, 36.0, 4, 155, 'Grande', '', '', 0.00),
(244, 98, 36.0, 2, 155, 'Mediano', 'Blanco', '', 0.00),
(245, 99, 36.0, 1, 156, 'Grande', '', '', 0.00),
(246, 98, 36.0, 2, 156, 'Mediano', 'Blanco', '', 0.00),
(247, 99, 36.0, 2, 157, 'Grande', '', '', 0.00),
(248, 98, 36.0, 2, 157, 'Mediano', 'Blanco', '', 0.00),
(249, 99, 36.0, 3, 158, 'Grande', '', '', 0.00),
(250, 98, 36.0, 2, 158, 'Mediano', 'Blanco', '', 0.00),
(251, 99, 36.0, 3, 159, 'Grande', '', '', 0.00),
(252, 98, 36.0, 3, 159, 'Mediano', 'Blanco', '', 0.00),
(253, 99, 36.0, 4, 160, 'Grande', '', '', 0.00),
(254, 98, 36.0, 3, 160, 'Mediano', 'Blanco', '', 0.00),
(255, 99, 36.0, 1, 161, 'Grande', '', '', 0.00),
(256, 98, 36.0, 3, 161, 'Mediano', 'Blanco', '', 0.00),
(257, 99, 36.0, 1, 162, 'Grande', '', '', 0.00),
(258, 98, 36.0, 2, 162, 'Mediano', 'Blanco', '', 0.00),
(259, 100, 30.0, 3, 163, 'Pequeño', 'Blanco', '', 0.00),
(260, 98, 36.0, 1, 163, 'Mediano', 'Blanco', '', 0.00),
(261, 100, 30.0, 3, 164, 'Pequeño', 'Blanco', '', 0.00),
(262, 98, 36.0, 1, 164, 'Mediano', 'Blanco', '', 0.00),
(263, 100, 30.0, 3, 165, 'Pequeño', 'Blanco', '', 0.00),
(264, 98, 36.0, 1, 165, 'Mediano', 'Blanco', '', 0.00),
(265, 100, 30.0, 3, 166, 'Pequeño', 'Blanco', '', 0.00),
(266, 98, 36.0, 1, 166, 'Mediano', 'Blanco', '', 0.00),
(267, 100, 30.0, 3, 167, 'Pequeño', 'Blanco', '', 0.00),
(268, 98, 36.0, 1, 167, 'Mediano', 'Blanco', '', 0.00),
(269, 100, 30.0, 3, 168, 'Pequeño', 'Blanco', '', 0.00),
(270, 98, 36.0, 1, 168, 'Mediano', 'Blanco', '', 0.00),
(271, 100, 30.0, 3, 169, 'Pequeño', 'Blanco', '', 0.00),
(272, 98, 36.0, 1, 169, 'Mediano', 'Blanco', '', 0.00),
(273, 100, 30.0, 2, 170, 'Pequeño', 'Blanco', '', 0.00),
(274, 98, 36.0, 1, 170, 'Mediano', 'Blanco', '', 0.00),
(275, 100, 30.0, 2, 171, 'Pequeño', 'Blanco', '', 0.00),
(276, 98, 36.0, 1, 171, 'Mediano', 'Blanco', '', 0.00),
(277, 100, 30.0, 4, 172, 'Pequeño', 'Blanco', '', 0.00),
(278, 98, 36.0, 1, 172, 'Mediano', 'Blanco', '', 0.00),
(279, 100, 30.0, 4, 173, 'Pequeño', 'Blanco', '', 0.00),
(280, 98, 36.0, 1, 173, 'Mediano', 'Blanco', '', 0.00),
(281, 100, 30.0, 4, 174, 'Pequeño', 'Blanco', '', 0.00),
(282, 98, 36.0, 1, 174, 'Mediano', 'Blanco', '', 0.00),
(283, 100, 30.0, 4, 175, 'Pequeño', 'Blanco', '', 0.00),
(284, 98, 36.0, 2, 175, 'Mediano', 'Blanco', '', 0.00),
(285, 100, 30.0, 2, 176, 'Pequeño', 'Blanco', '', 0.00),
(286, 98, 36.0, 2, 176, 'Mediano', 'Blanco', '', 0.00),
(287, 100, 30.0, 1, 177, 'Pequeño', 'Blanco', '', 0.00),
(288, 98, 36.0, 2, 177, 'Mediano', 'Blanco', '', 0.00),
(289, 100, 30.0, 1, 178, 'Pequeño', 'Blanco', '', 0.00),
(290, 98, 36.0, 2, 178, 'Mediano', 'Blanco', '', 0.00),
(291, 98, 36.0, 4, 179, 'Mediano', 'Blanco', '', 0.00),
(292, 98, 36.0, 4, 180, 'Mediano', 'Blanco', '', 0.00),
(293, 98, 36.0, 3, 181, 'Mediano', 'Blanco', '', 0.00),
(294, 98, 36.0, 2, 182, 'Mediano', 'Blanco', '', 0.00),
(295, 98, 36.0, 2, 183, 'Mediano', 'Blanco', '', 0.00),
(296, 98, 36.0, 3, 184, 'Mediano', 'Blanco', '', 0.00),
(297, 98, 36.0, 4, 185, 'Mediano', 'Blanco', '', 0.00),
(298, 98, 36.0, 4, 186, 'Mediano', 'Blanco', '', 0.00),
(299, 98, 36.0, 4, 187, 'Mediano', 'Blanco', '', 0.00),
(300, 98, 36.0, 4, 188, 'Mediano', 'Blanco', '', 0.00),
(301, 96, 36.0, 1, 188, '', 'Blanco', '40', 0.00),
(302, 98, 36.0, 4, 189, 'Mediano', 'Blanco', '', 0.00),
(303, 96, 36.0, 1, 189, '', 'Blanco', '40', 0.00),
(304, 98, 36.0, 2, 190, 'Mediano', 'Blanco', '', 0.00),
(305, 96, 36.0, 1, 190, '', 'Blanco', '40', 0.00),
(306, 98, 36.0, 2, 191, 'Mediano', 'Blanco', '', 0.00),
(307, 96, 36.0, 1, 191, '', 'Blanco', '40', 0.00),
(308, 98, 36.0, 2, 192, 'Mediano', 'Blanco', '', 0.00),
(309, 96, 36.0, 2, 192, '', 'Blanco', '40', 0.00),
(310, 98, 36.0, 1, 193, 'Mediano', 'Blanco', '', 0.00),
(311, 96, 36.0, 2, 193, '', 'Blanco', '40', 0.00),
(312, 98, 36.0, 1, 194, 'Mediano', 'Blanco', '', 0.00),
(313, 96, 36.0, 2, 194, '', 'Blanco', '40', 0.00),
(314, 98, 36.0, 2, 195, 'Mediano', 'Blanco', '', 0.00),
(315, 96, 36.0, 2, 195, '', 'Blanco', '40', 0.00),
(316, 98, 36.0, 2, 196, 'Mediano', 'Blanco', '', 0.00),
(317, 96, 36.0, 1, 196, '', 'Blanco', '40', 0.00),
(318, 98, 36.0, 2, 197, 'Mediano', 'Blanco', '', 0.00),
(319, 96, 36.0, 2, 197, '', 'Blanco', '40', 0.00),
(320, 98, 36.0, 2, 198, 'Mediano', 'Blanco', '', 0.00),
(321, 96, 36.0, 2, 198, '', 'Blanco', '40', 0.00),
(322, 98, 36.0, 2, 199, 'Mediano', 'Blanco', '', 0.00),
(323, 96, 36.0, 2, 199, '', 'Blanco', '40', 0.00),
(324, 98, 36.0, 2, 200, 'Mediano', 'Blanco', '', 0.00),
(325, 96, 36.0, 2, 200, '', 'Blanco', '40', 0.00),
(326, 98, 36.0, 2, 201, 'Mediano', 'Blanco', '', 0.00),
(327, 96, 36.0, 2, 201, '', 'Blanco', '40', 0.00),
(328, 98, 36.0, 2, 202, 'Mediano', 'Blanco', '', 0.00),
(329, 96, 36.0, 2, 202, '', 'Blanco', '40', 0.00),
(330, 98, 36.0, 2, 203, 'Mediano', 'Blanco', '', 0.00),
(331, 96, 36.0, 2, 203, '', 'Blanco', '40', 0.00),
(332, 98, 36.0, 2, 204, 'Mediano', 'Blanco', '', 0.00),
(333, 96, 36.0, 2, 204, '', 'Blanco', '40', 0.00),
(334, 98, 36.0, 1, 205, 'Mediano', 'Blanco', '', 0.00),
(335, 96, 36.0, 2, 205, '', 'Blanco', '40', 0.00),
(336, 98, 36.0, 3, 206, 'Mediano', 'Blanco', '', 0.00),
(337, 96, 36.0, 2, 206, '', 'Blanco', '40', 0.00),
(338, 98, 36.0, 3, 207, 'Mediano', 'Blanco', '', 0.00),
(339, 96, 36.0, 2, 207, '', 'Blanco', '40', 0.00),
(340, 98, 36.0, 3, 208, 'Mediano', 'Blanco', '', 0.00),
(341, 96, 36.0, 2, 208, '', 'Blanco', '40', 0.00),
(342, 98, 36.0, 2, 209, 'Mediano', 'Blanco', '', 0.00),
(343, 96, 36.0, 2, 209, '', 'Blanco', '40', 0.00),
(344, 98, 36.0, 2, 210, 'Mediano', 'Blanco', '', 0.00),
(345, 96, 36.0, 2, 210, '', 'Blanco', '40', 0.00),
(346, 98, 36.0, 2, 211, 'Mediano', 'Blanco', '', 0.00),
(347, 96, 36.0, 2, 211, '', 'Blanco', '40', 0.00),
(348, 98, 36.0, 2, 212, 'Mediano', 'Blanco', '', 0.00),
(349, 96, 36.0, 2, 212, '', 'Blanco', '40', 0.00),
(350, 98, 36.0, 2, 213, 'Mediano', 'Blanco', '', 0.00),
(351, 96, 36.0, 2, 213, '', 'Blanco', '40', 0.00),
(352, 98, 36.0, 2, 214, 'Mediano', 'Blanco', '', 0.00),
(353, 96, 36.0, 2, 214, '', 'Blanco', '40', 0.00),
(354, 98, 36.0, 2, 215, 'Mediano', 'Blanco', '', 0.00),
(355, 96, 36.0, 2, 215, '', 'Blanco', '40', 0.00),
(356, 98, 36.0, 2, 216, 'Mediano', 'Blanco', '', 0.00),
(357, 96, 36.0, 2, 216, '', 'Blanco', '40', 0.00),
(358, 98, 36.0, 2, 217, 'Mediano', 'Blanco', '', 0.00),
(359, 96, 36.0, 1, 217, '', 'Blanco', '40', 0.00),
(360, 98, 36.0, 2, 218, 'Mediano', 'Blanco', '', 0.00),
(361, 96, 36.0, 1, 218, '', 'Blanco', '40', 0.00),
(362, 98, 36.0, 2, 219, 'Mediano', 'Blanco', '', 0.00),
(363, 96, 36.0, 1, 219, '', 'Blanco', '40', 0.00),
(364, 98, 36.0, 2, 220, 'Mediano', 'Blanco', '', 0.00),
(365, 96, 36.0, 1, 220, '', 'Blanco', '40', 0.00),
(366, 98, 36.0, 2, 221, 'Mediano', 'Blanco', '', 0.00),
(367, 96, 36.0, 1, 221, '', 'Blanco', '40', 0.00),
(368, 98, 36.0, 2, 222, 'Mediano', 'Blanco', '', 0.00),
(369, 96, 36.0, 2, 222, '', 'Blanco', '40', 0.00),
(370, 98, 36.0, 3, 223, 'Mediano', 'Blanco', '', 0.00),
(371, 96, 36.0, 2, 223, '', 'Blanco', '40', 0.00),
(372, 98, 36.0, 3, 224, 'Mediano', 'Blanco', '', 0.00),
(373, 96, 36.0, 2, 224, '', 'Blanco', '40', 0.00),
(374, 98, 36.0, 1, 225, 'Mediano', 'Blanco', '', 0.00),
(375, 96, 36.0, 2, 225, '', 'Blanco', '40', 0.00),
(376, 98, 36.0, 1, 226, 'Mediano', 'Blanco', '', 0.00),
(377, 96, 36.0, 3, 226, '', 'Blanco', '40', 0.00),
(378, 98, 36.0, 2, 227, 'Mediano', 'Blanco', '', 0.00),
(379, 96, 36.0, 3, 227, '', 'Blanco', '40', 0.00),
(380, 98, 36.0, 2, 228, 'Mediano', 'Blanco', '', 0.00),
(381, 96, 36.0, 3, 228, '', 'Blanco', '40', 0.00),
(382, 98, 36.0, 2, 229, 'Mediano', 'Blanco', '', 0.00),
(383, 96, 36.0, 3, 229, '', 'Blanco', '40', 0.00),
(384, 82, 15.0, 2, 230, 'Mediano', 'Blanco', '', 0.00),
(385, 70, 46.0, 1, 230, '', 'Blanco', '', 0.00),
(386, 82, 15.0, 1, 231, 'Mediano', 'Blanco', '', 0.00),
(387, 70, 46.0, 2, 231, '', 'Blanco', '', 0.00),
(388, 82, 15.0, 1, 232, 'Mediano', 'Blanco', '', 0.00),
(389, 70, 46.0, 2, 232, '', 'Blanco', '', 0.00),
(390, 82, 15.0, 2, 233, 'Mediano', 'Blanco', '', 0.00),
(391, 70, 46.0, 2, 233, '', 'Blanco', '', 0.00),
(392, 82, 15.0, 3, 234, 'Mediano', 'Blanco', '', 0.00),
(393, 70, 46.0, 2, 234, '', 'Blanco', '', 0.00),
(394, 82, 15.0, 3, 235, 'Mediano', 'Blanco', '', 0.00),
(395, 70, 46.0, 2, 235, '', 'Blanco', '', 0.00),
(396, 82, 15.0, 3, 236, 'Mediano', 'Blanco', '', 0.00),
(397, 70, 46.0, 3, 236, '', 'Blanco', '', 0.00),
(398, 82, 15.0, 2, 237, 'Mediano', 'Blanco', '', 0.00),
(399, 70, 46.0, 3, 237, '', 'Blanco', '', 0.00),
(400, 82, 15.0, 4, 238, 'Mediano', 'Blanco', '', 0.00),
(401, 70, 46.0, 3, 238, '', 'Blanco', '', 0.00),
(402, 82, 15.0, 4, 239, 'Mediano', 'Blanco', '', 0.00),
(403, 70, 46.0, 3, 239, '', 'Blanco', '', 0.00),
(404, 82, 15.0, 4, 240, 'Mediano', 'Blanco', '', 0.00),
(405, 70, 46.0, 3, 240, '', 'Blanco', '', 0.00),
(406, 82, 15.0, 4, 241, 'Mediano', 'Blanco', '', 0.00),
(407, 70, 46.0, 3, 241, '', 'Blanco', '', 0.00),
(408, 17, 36.0, 1, 241, '', '', '', 0.00),
(409, 82, 15.0, 4, 242, 'Mediano', 'Blanco', '', 0.00),
(410, 70, 46.0, 3, 242, '', 'Blanco', '', 0.00),
(411, 17, 36.0, 1, 242, '', '', '', 0.00),
(412, 82, 15.0, 3, 243, 'Mediano', 'Blanco', '', 0.00),
(413, 70, 46.0, 3, 243, '', 'Blanco', '', 0.00),
(414, 17, 36.0, 2, 243, '', '', '', 0.00),
(415, 82, 15.0, 3, 244, 'Mediano', 'Blanco', '', 0.00),
(416, 70, 46.0, 3, 244, '', 'Blanco', '', 0.00),
(417, 17, 36.0, 2, 244, '', '', '', 0.00),
(418, 70, 46.0, 3, 245, '', 'Blanco', '', 0.00),
(419, 17, 36.0, 2, 245, '', '', '', 0.00),
(420, 70, 46.0, 3, 246, '', 'Blanco', '', 0.00),
(421, 17, 36.0, 2, 246, '', '', '', 0.00),
(422, 70, 46.0, 3, 247, '', 'Blanco', '', 0.00),
(423, 17, 36.0, 2, 247, '', '', '', 0.00),
(424, 70, 46.0, 3, 248, '', 'Blanco', '', 0.00),
(425, 17, 36.0, 3, 248, '', '', '', 0.00),
(426, 70, 46.0, 3, 249, '', 'Blanco', '', 0.00),
(427, 17, 36.0, 3, 249, '', '', '', 0.00),
(428, 70, 46.0, 4, 250, '', 'Blanco', '', 0.00),
(429, 17, 36.0, 3, 250, '', '', '', 0.00),
(430, 70, 46.0, 3, 251, '', 'Blanco', '', 0.00),
(431, 17, 36.0, 3, 251, '', '', '', 0.00),
(432, 70, 46.0, 3, 252, '', 'Blanco', '', 0.00),
(433, 17, 36.0, 4, 252, '', '', '', 0.00),
(434, 70, 46.0, 3, 253, '', 'Blanco', '', 0.00),
(435, 17, 36.0, 4, 253, '', '', '', 0.00),
(436, 70, 46.0, 3, 254, '', 'Blanco', '', 0.00),
(437, 17, 36.0, 5, 254, '', '', '', 0.00),
(438, 70, 46.0, 2, 255, '', 'Blanco', '', 0.00),
(439, 17, 36.0, 3, 255, '', '', '', 0.00),
(440, 70, 46.0, 2, 256, '', 'Blanco', '', 0.00),
(441, 17, 36.0, 3, 256, '', '', '', 0.00),
(442, 70, 46.0, 2, 257, '', 'Blanco', '', 0.00),
(443, 17, 36.0, 2, 257, '', '', '', 0.00),
(444, 70, 46.0, 2, 258, '', 'Blanco', '', 0.00),
(445, 17, 36.0, 2, 258, '', '', '', 0.00),
(446, 70, 46.0, 2, 259, '', 'Blanco', '', 0.00),
(447, 17, 36.0, 2, 259, '', '', '', 0.00),
(448, 70, 46.0, 2, 260, '', 'Blanco', '', 0.00),
(449, 17, 36.0, 2, 260, '', '', '', 0.00),
(450, 70, 46.0, 2, 261, '', 'Blanco', '', 0.00),
(451, 17, 36.0, 2, 261, '', '', '', 0.00),
(452, 70, 46.0, 3, 262, '', 'Blanco', '', 0.00),
(453, 17, 36.0, 2, 262, '', '', '', 0.00),
(454, 70, 46.0, 3, 263, '', 'Blanco', '', 0.00),
(455, 17, 36.0, 2, 263, '', '', '', 0.00),
(456, 70, 46.0, 5, 264, '', 'Blanco', '', 0.00),
(457, 95, 55.0, 3, 266, '', 'Blanco', '37', 0.00),
(458, 100, 30.0, 3, 267, 'Pequeño', 'Azul', '', 0.00),
(459, 95, 55.0, 3, 268, '', 'Blanco', '38', 0.00),
(460, 95, 55.0, 3, 269, '', 'Blanco', '38', 0.00),
(461, 95, 55.0, 4, 270, '', 'Blanco', '38', 0.00),
(462, 95, 55.0, 4, 271, '', 'Blanco', '38', 0.00),
(463, 95, 55.0, 2, 272, '', 'Blanco', '38', 0.00),
(464, 95, 55.0, 3, 273, '', 'Blanco', '38', 0.00),
(465, 95, 55.0, 4, 274, '', 'Blanco', '38', 0.00),
(466, 95, 55.0, 4, 275, '', 'Blanco', '38', 0.00),
(467, 95, 55.0, 4, 276, '', 'Blanco', '38', 0.00),
(468, 95, 55.0, 4, 277, '', 'Blanco', '38', 0.00),
(469, 95, 55.0, 5, 278, '', 'Blanco', '38', 0.00),
(470, 95, 55.0, 4, 279, '', 'Blanco', '38', 0.00),
(471, 95, 55.0, 4, 280, '', 'Blanco', '38', 0.00),
(472, 71, 36.0, 2, 281, '', '', '', 0.00),
(473, 71, 36.0, 2, 282, '', '', '', 0.00),
(474, 71, 36.0, 4, 283, '', '', '', 0.00),
(475, 71, 36.0, 4, 284, '', '', '', 0.00),
(476, 64, 30.0, 2, 284, 'Pequeño', 'Blanco', '', 0.00),
(477, 71, 36.0, 4, 285, '', '', '', 0.00),
(478, 64, 30.0, 2, 285, 'Pequeño', 'Blanco', '', 0.00),
(479, 71, 36.0, 4, 286, '', '', '', 0.00),
(480, 64, 30.0, 2, 286, 'Pequeño', 'Blanco', '', 0.00),
(481, 71, 36.0, 4, 287, '', '', '', 0.00),
(482, 64, 30.0, 2, 287, 'Pequeño', 'Blanco', '', 0.00),
(483, 71, 36.0, 4, 288, '', '', '', 0.00),
(484, 64, 30.0, 2, 288, 'Pequeño', 'Blanco', '', 0.00),
(485, 71, 36.0, 4, 289, '', '', '', 0.00),
(486, 64, 30.0, 2, 289, 'Pequeño', 'Blanco', '', 0.00),
(487, 94, 43.0, 2, 290, '', 'Negro', '38', 0.00),
(488, 70, 46.0, 3, 291, '', 'Blanco', '', 0.00),
(489, 2, 175.0, 2, 292, '', '', '', 0.00),
(490, 2, 175.0, 2, 293, '', '', '', 0.00),
(491, 66, 30.0, 1, 294, 'Mediano', 'Negro', '', 0.00),
(492, 66, 30.0, 1, 295, 'Mediano', 'Negro', '', 0.00),
(493, 66, 30.0, 1, 296, 'Mediano', 'Negro', '', 0.00),
(494, 96, 36.0, 1, 297, '', 'Blanco', '40', 0.00),
(495, 96, 36.0, 1, 298, '', 'Blanco', '40', 0.00),
(496, 96, 36.0, 1, 299, '', 'Blanco', '40', 0.00),
(497, 100, 30.0, 1, 300, 'Pequeño', 'Azul', '35', 0.00),
(498, 98, 36.0, 1, 301, 'Mediano', 'Blanco', '', 0.00),
(499, 98, 36.0, 1, 302, 'Mediano', 'Blanco', '', 0.00),
(500, 98, 36.0, 1, 303, 'Mediano', 'Blanco', '', 0.00),
(501, 98, 36.0, 1, 304, 'Mediano', 'Blanco', '', 0.00),
(502, 98, 36.0, 1, 305, 'Mediano', 'Blanco', '', 0.00),
(503, 98, 36.0, 3, 306, 'Mediano', 'Blanco', '', 0.00),
(504, 98, 36.0, 3, 307, 'Mediano', 'Blanco', '', 0.00),
(505, 98, 36.0, 3, 308, 'Mediano', 'Blanco', '', 0.00),
(506, 98, 36.0, 3, 309, 'Mediano', 'Blanco', '', 0.00),
(507, 98, 36.0, 3, 310, 'Mediano', 'Blanco', '', 0.00),
(508, 98, 36.0, 3, 311, 'Mediano', 'Blanco', '', 0.00),
(509, 98, 36.0, 1, 312, 'Mediano', 'Blanco', '', 0.00),
(510, 100, 30.0, 1, 313, 'Pequeño', 'Azul', '35', 0.00),
(511, 10, 9.5, 4, 317, NULL, NULL, NULL, 0.00),
(512, 98, 36.0, 3, 318, NULL, NULL, NULL, 0.00),
(513, 99, 36.0, 1, 319, 'Mediano', '', '', 0.00),
(514, 98, 36.0, 3, 320, 'Mediano', 'Blanco', '', 0.00),
(515, 98, 36.0, 1, 321, 'Mediano', 'Blanco', '', 0.00),
(516, 98, 36.0, 1, 322, 'Mediano', 'Blanco', '', 0.00),
(517, 98, 36.0, 1, 323, 'Mediano', 'Blanco', '', 0.00),
(518, 83, 62.7, 2, 324, 'Mediano', 'Negro', '', 0.00),
(519, 83, 62.7, 2, 325, 'Mediano', 'Negro', '', 0.00),
(520, 83, 62.7, 2, 326, 'Mediano', 'Negro', '', 0.00),
(521, 83, 62.7, 2, 327, 'Mediano', 'Negro', '', 0.00),
(522, 83, 62.7, 2, 328, 'Mediano', 'Negro', '', 0.00),
(523, 83, 62.7, 2, 329, 'Mediano', 'Negro', '', 0.00),
(524, 83, 62.7, 2, 330, 'Mediano', 'Negro', '', 0.00),
(525, 17, 36.0, 3, 330, NULL, NULL, NULL, 0.00),
(526, 83, 62.7, 2, 331, 'Mediano', 'Negro', '', 0.00),
(527, 17, 36.0, 3, 331, NULL, NULL, NULL, 0.00),
(528, 83, 62.7, 2, 332, 'Mediano', 'Negro', '', 0.00),
(529, 17, 36.0, 2, 332, NULL, NULL, NULL, 0.00),
(530, 83, 62.7, 1, 333, 'Mediano', 'Negro', '', 0.00),
(531, 17, 36.0, 2, 333, NULL, NULL, NULL, 0.00),
(532, 83, 62.7, 2, 334, 'Mediano', 'Negro', '', 0.00),
(533, 17, 36.0, 1, 334, '', '', '', 0.00),
(534, 83, 62.7, 2, 335, '', '', '', 0.00),
(535, 17, 36.0, 4, 335, '', '', '', 0.00),
(536, 83, 62.7, 2, 336, 'Mediano', 'Negro', '', 0.00),
(537, 17, 36.0, 1, 336, '', '', '', 0.00),
(538, 83, 62.7, 2, 337, 'Mediano', 'Negro', '', 0.00),
(539, 17, 36.0, 1, 337, '', '', '', 0.00),
(540, 83, 62.7, 2, 338, 'Mediano', 'Negro', '', 0.00),
(541, 17, 36.0, 1, 338, '', '', '', 0.00),
(542, 83, 62.7, 2, 339, 'Mediano', 'Negro', '', 0.00),
(543, 17, 36.0, 3, 339, '', '', '', 0.00),
(544, 83, 62.7, 2, 340, 'Mediano', 'Negro', '', 0.00),
(545, 17, 36.0, 3, 340, '', '', '', 0.00),
(546, 83, 62.7, 2, 341, 'Mediano', 'Negro', '', 0.00),
(547, 17, 36.0, 3, 341, '', '', '', 0.00),
(548, 83, 62.7, 2, 342, 'Mediano', 'Negro', '', 0.00),
(549, 17, 36.0, 3, 342, '', '', '', 0.00),
(550, 83, 62.7, 2, 343, 'Mediano', 'Negro', '', 0.00),
(551, 17, 36.0, 3, 343, '', '', '', 0.00),
(552, 83, 62.7, 2, 344, 'Mediano', 'Negro', '', 0.00),
(553, 17, 36.0, 3, 344, '', '', '', 0.00),
(554, 83, 62.7, 1, 345, 'Mediano', 'Negro', '', 0.00),
(555, 17, 36.0, 2, 345, '', '', '', 0.00),
(556, 83, 62.7, 1, 346, 'Mediano', 'Negro', '', 0.00),
(557, 83, 62.7, 1, 347, 'Mediano', 'Negro', '', 0.00),
(558, 83, 62.7, 1, 348, 'Mediano', 'Negro', '', 0.00),
(559, 1, 55.0, 1, 349, 'Mediano', 'Negro', '35', 0.00),
(560, 70, 46.0, 2, 350, '', 'Negro', '', 0.00),
(561, 89, 40.0, 2, 351, 'Grande', 'Negro', '', 0.00),
(562, 89, 40.0, 2, 352, 'Grande', 'Negro', '', 0.00),
(563, 72, 46.0, 2, 352, '', '', '', 0.00),
(564, 89, 40.0, 2, 353, 'Grande', 'Negro', '', 0.00),
(565, 72, 46.0, 2, 353, '', '', '', 0.00),
(566, 50, 36.0, 2, 353, '', '', '', 0.00),
(567, 80, 10.0, 1, 354, 'Mediano', 'Rojo', '', 0.00),
(568, 85, 40.0, 2, 354, 'Grande', 'Rojo', '', 0.00),
(569, 66, 30.0, 3, 355, 'Mediano', 'Blanco', '', 0.00),
(570, 66, 30.0, 1, 356, 'Mediano', 'Blanco', '', 0.00),
(571, 95, 55.0, 2, 356, '', 'Blanco', '37', 0.00),
(572, 87, 20.0, 4, 357, 'Mediano', 'Blanco', '', 0.00),
(573, 94, 43.0, 3, 358, '', 'Café', '38', 0.00),
(574, 63, 30.0, 3, 359, 'Pequeño', 'Negro', '', 0.00),
(575, 63, 30.0, 1, 360, 'Pequeño', 'Negro', '', 0.00),
(576, 8, 33.0, 3, 360, '', '', '', 0.00),
(577, 94, 43.0, 2, 361, '', 'Negro', '38', 0.00),
(578, 89, 40.0, 1, 362, 'Mediano', 'Negro', '', 0.00),
(579, 87, 20.0, 1, 362, 'Grande', 'Blanco', '', 0.00),
(580, 77, 20.0, 1, 362, 'Mediano', 'Negro', '', 0.00),
(581, 49, 22.0, 3, 363, '', '', '', 0.00),
(582, 68, 30.0, 1, 364, '', '', '', 0.00),
(583, 64, 30.0, 1, 364, 'Mediano', 'Blanco', '', 0.00),
(584, 75, 30.0, 1, 365, 'Mediano', 'Rojo', '', 0.00),
(585, 95, 55.0, 1, 366, '', 'Blanco', '38', 0.00),
(586, 88, 10.0, 2, 367, 'Grande', 'Rojo', '', 0.00),
(587, 76, 36.0, 2, 367, 'Pequeño', 'Rojo', '', 0.00),
(588, 65, 30.0, 1, 367, 'Mediano', 'Negro', '', 0.00),
(589, 36, 50.0, 2, 368, '', '', '', 0.00),
(590, 97, 30.0, 3, 369, 'Pequeño', '', '', 0.00),
(591, 97, 30.0, 1, 370, 'Pequeño', '', '', 0.00),
(592, 45, 56.0, 2, 370, '', '', '', 0.00),
(593, 80, 10.0, 2, 371, 'Pequeño', 'Rojo', '', 0.00),
(594, 3, 43.5, 1, 371, '', '', '', 0.00),
(595, 66, 30.0, 1, 371, 'Pequeño', 'Blanco', '', 0.00),
(596, 100, 30.0, 3, 372, 'Pequeño', 'Azul', '35', 0.00),
(597, 100, 30.0, 3, 373, 'Pequeño', 'Azul', '35', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `iva` double(4,2) NOT NULL,
  `codporcentaje` int(11) NOT NULL,
  `isactive_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `iva`, `codporcentaje`, `isactive_id`) VALUES
(1, 0.00, 0, 1),
(2, 12.00, 2, 1),
(3, 14.00, 3, 1),
(4, 16.12, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved`, `reserved_at`, `available_at`, `created_at`) VALUES
(134, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database",{"--queue":"backup"}]}', 43, 0, NULL, 1477788274, 1477788274),
(135, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database",{"--queue":"backup"}]}', 43, 0, NULL, 1477788278, 1477788278),
(136, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database",{"--queue":"backup"}]}', 43, 0, NULL, 1477788282, 1477788282),
(137, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database",{"--queue":"backup"}]}', 0, 0, NULL, 1477788847, 1477788847),
(138, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database",{"--queue":"backup"}]}', 0, 0, NULL, 1477788870, 1477788870),
(139, 'default', '{"job":"Illuminate\\\\Foundation\\\\Console\\\\QueuedJob","data":["backup:database"]}', 0, 0, NULL, 1477791534, 1477791534);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locationstest`
--

CREATE TABLE `locationstest` (
  `id` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `ubiclt` varchar(45) NOT NULL,
  `ubiclg` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locationstest`
--

INSERT INTO `locationstest` (`id`, `city`, `ubiclt`, `ubiclg`) VALUES
(28, 'rajtop', '-4.0078909', '-79.211276'),
(101, 'surat', '-2.8552', '-78.7787334');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `accion` char(45) DEFAULT NULL,
  `date` char(45) DEFAULT NULL,
  `users_id` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_27_223955_create_categories_table', 1),
('2016_05_27_224031_create_status_table', 1),
('2016_05_27_224054_create_countries_table', 1),
('2016_05_27_224219_create_positions_table', 1),
('2016_05_27_224239_create_departments_table', 1),
('2016_05_27_224325_create_brands_table', 1),
('2016_05_27_224345_create_provinces_table', 1),
('2016_05_27_224427_create_isactives_table', 1),
('2016_05_27_224506_create_paymethods_table', 1),
('2016_05_27_224623_create_products_table', 1),
('2016_05_27_224654_create_employs_table', 1),
('2016_05_27_224721_create_clients_table', 1),
('2016_06_07_174621_alter_brands_table', 2),
('2016_06_07_180551_create_tags_table', 3),
('2016_06_07_183959_create_brand_table', 4),
('2016_06_07_184612_add_isactive_id_to_brands_table', 5),
('2016_06_07_220044_Proveedor', 6),
('2016_06_10_144031_create_emp_table', 7),
('2016_06_10_145616_create_emps_table', 7),
('2016_07_18_161044_create_administrators_table', 7),
('2016_07_19_225010_create_personals_table', 8),
('2016_10_03_064705_create_jobs_table', 8),
('2016_10_03_064830_create_failed_jobs_table', 8),
('2016_10_11_151808_create_employes_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `id` int(11) NOT NULL,
  `moneda` varchar(45) NOT NULL,
  `isactive_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `moneda`, `isactive_id`) VALUES
(1, 'DOLAR', 1),
(2, 'EUROS', 1),
(3, 'PESOS', 1),
(4, 'YEN', 1),
(5, 'FRANCO', 1),
(6, 'CORONA', 1),
(7, 'RUBRO', 1),
(8, 'COLÓN', 1),
(9, 'QUETZAL', 1),
(10, 'LEMPIRA', 1),
(11, 'CÓRDOBA', 1),
(12, 'BALBOA', 1),
(13, 'KINA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notify`
--

CREATE TABLE `notify` (
  `idnotify` int(11) NOT NULL,
  `min_prod` int(5) NOT NULL DEFAULT '5',
  `val_sale` double(10,2) NOT NULL DEFAULT '50.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notify`
--

INSERT INTO `notify` (`idnotify`, `min_prod`, `val_sale`) VALUES
(1, 5, 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numbersizes`
--

CREATE TABLE `numbersizes` (
  `id` int(11) NOT NULL,
  `number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numbersizes`
--

INSERT INTO `numbersizes` (`id`, `number`) VALUES
(1, '35'),
(2, '37'),
(3, '38'),
(5, '40'),
(6, '42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andrescondo17@gmail.com', 'e10713cb915f7d4d2dcaaa8d6b018b745ce2b47315dc4b70fbda5000456158cf', '2016-08-18 04:25:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymethods`
--

CREATE TABLE `paymethods` (
  `id` int(10) UNSIGNED NOT NULL,
  `namemethod` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nomtitular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `numcuent` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paymethods`
--

INSERT INTO `paymethods` (`id`, `namemethod`, `nomtitular`, `numcuent`, `institution`, `created_at`, `updated_at`) VALUES
(1, 'Contra entrega', 'StoreLine', '', '', '2016-06-26 05:00:00', '2016-06-26 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `subtotal` double(12,2) DEFAULT NULL,
  `total` double(12,2) DEFAULT NULL,
  `iva` double(12,2) DEFAULT NULL,
  `entrega` varchar(45) DEFAULT '1',
  `ubiclg` varchar(45) DEFAULT NULL,
  `ubiclt` varchar(45) DEFAULT NULL,
  `users_id` int(10) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `date` char(45) DEFAULT NULL,
  `paymethods_id` int(11) NOT NULL DEFAULT '1',
  `descuento` decimal(5,2) NOT NULL,
  `propina` double(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `porc` decimal(5,2) NOT NULL,
  `rango` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `subtotal`, `total`, `iva`, `entrega`, `ubiclg`, `ubiclt`, `users_id`, `status_id`, `date`, `paymethods_id`, `descuento`, `propina`, `created_at`, `updated_at`, `porc`, `rango`) VALUES
(1, 43.85, 49.99, 6.14, 'Ubicacion actual', '-2.7957205', '-78.76745619999997', 4, 7, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(3, 46.05, 52.50, 6.45, 'Ubicacion actual', '-2.9280917', '-78.7787889', 4, 1, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(4, 30.70, 35.00, 4.30, 'Ubicacion actual', '-3.0510692', '-78.79578559999999', 4, 1, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(5, 30.70, 35.00, 4.30, 'Ubicacion actual', '-2.9001285', '-79.0058965', 4, 1, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(6, 30.70, 35.00, 4.30, 'Ubicacion actual', '-2.883556177097446', '-78.77430365924681', 4, 2, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(7, 53.51, 61.00, 7.49, 'Retiro personal', '-2.899635605520964', '-78.9959186824646', 2, 1, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(8, 32.89, 37.49, 4.60, 'Ubicacion actual', '-2.8552', '-78.7787334', 2, 5, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(9, 70.14, 79.96, 9.82, '2', '-2.8552', '-78.7787334', 2, 1, '19/06/2016', 1, '0.00', 0.00, '2016-06-19 23:54:00', NULL, '0.00', '2016-06-19'),
(10, 76.74, 87.48, 10.74, 'Domicilio', '-2.8552', '-78.7787334', 2, 2, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(11, 105.47, 120.24, 14.77, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(12, 196.16, 223.62, 27.46, 'Retiro personal', '0', '0', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(13, 76.74, 87.48, 10.74, 'Retiro personal', '-2.8552', '-78.7787334', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(14, 13.16, 15.00, 1.84, 'Ubicacion actual', '-2.8551994', '-78.77869129999999', 2, 5, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(15, 13.16, 15.00, 1.84, 'Ubicacion actual', '-2.8933948', '-78.7786411', 3, 5, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(16, 76.75, 87.50, 10.75, 'Ubicacion actual', '-2.8983555', '-78.99758609999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(17, 30.69, 34.99, 4.30, 'Ubicacion actual', '-2.893445', '-78.7788437', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(18, 65.77, 74.98, 9.21, 'Ubicacion actual', '-2.8552909', '-78.7786989', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(19, 75.33, 85.88, 10.55, 'Retiro personal', '-2.8552931999999998', '-78.77870639999999', 8, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(20, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551732', '-78.77861639999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(21, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551732', '-78.77861639999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(22, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551732', '-78.77861639999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(23, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551732', '-78.77861639999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(24, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551412999999997', '-78.77864249999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(25, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551412999999997', '-78.77864249999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(26, 178.89, 203.94, 25.05, 'Retiro personal', '-2.8551412999999997', '-78.77864249999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(27, 78.92, 89.97, 11.05, 'Retiro personal', '-2.8552656', '-78.7787055', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(28, 105.23, 119.96, 14.73, 'Retiro personal', '-2.8552635', '-78.7787111', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(29, 105.23, 119.96, 14.73, 'Retiro personal', '-2.8552635', '-78.7787111', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(30, 131.54, 149.95, 18.41, 'Retiro personal', '-2.8552412', '-78.77870519999999', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(31, 0.00, 0.00, 0.00, 'Retiro personal', '-2.8552412', '-78.77870519999999', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(32, 26.31, 29.99, 3.68, 'Ubicacion actual', '-2.855203', '-78.7786266', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(33, 26.31, 29.99, 3.68, 'Ubicacion actual', '-2.855203', '-78.7786266', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(34, 26.31, 29.99, 3.68, 'Ubicacion actual', '-2.855203', '-78.7786266', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(35, 444.70, 506.96, 62.26, 'Retiro personal', '-2.8552820999999997', '-78.7783731', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(36, 444.70, 506.96, 62.26, 'Retiro personal', '-2.8552820999999997', '-78.7783731', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(37, 444.70, 506.96, 62.26, 'Retiro personal', '-2.8552820999999997', '-78.7783731', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(38, 444.70, 506.96, 62.26, 'Retiro personal', '-2.8552820999999997', '-78.7783731', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(39, 444.70, 506.96, 62.26, 'Retiro personal', '-2.8552820999999997', '-78.7783731', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(40, 26.31, 29.99, 3.68, 'Domicilio', '-2.8552', '-78.7787334', 2, 6, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(41, 78.92, 89.97, 11.05, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(42, 78.92, 89.97, 11.05, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(43, 78.92, 89.97, 11.05, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(44, 142.06, 161.95, 19.89, 'Retiro personal', '-2.8552953999999997', '-78.7787163', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(45, 142.06, 161.95, 19.89, 'Retiro personal', '-2.8552953999999997', '-78.7787163', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(46, 31.57, 35.99, 4.42, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(47, 31.57, 35.99, 4.42, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 1, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(48, 94.71, 107.97, 13.26, 'Retiro personal', '-2.8552804', '-78.7787227', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(49, 94.71, 107.97, 13.26, 'Retiro personal', '-2.8552804', '-78.7787227', 2, 8, '25/06/2016', 1, '0.00', 0.00, '2016-06-25 23:54:00', NULL, '0.00', '2016-06-25'),
(50, 94.71, 107.97, 13.26, 'Retiro personal', '-2.8552804', '-78.7787227', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(51, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(52, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(53, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(54, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(55, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552953999999997', '-78.7787163', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(56, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552706', '-78.7787256', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(57, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552518', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(58, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552518', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(59, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552518', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(60, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552518', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(61, 126.28, 143.96, 17.68, 'Retiro personal', '-2.8552518', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(62, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(63, 126.28, 143.96, 17.68, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(64, 63.14, 71.98, 8.84, 'Retiro personal', '-2.8552681', '-78.7787199', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(65, 63.14, 71.98, 8.84, 'Retiro personal', '-2.8552304', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(66, 63.14, 71.98, 8.84, 'Retiro personal', '-2.8552304', '-78.7787294', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(67, 164.89, 187.97, 23.08, 'Retiro personal', '-2.8552834', '-78.7786553', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(68, 74.53, 84.96, 10.43, 'Retiro personal', '-2.8553237', '-78.77869799999999', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(69, 94.71, 107.97, 13.26, 'Retiro personal', '-4.0078909', '-79.2112769', 2, 8, '25/07/2016', 1, '0.00', 0.00, '2016-07-25 23:54:00', NULL, '0.00', '2016-07-25'),
(70, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(71, 210.46, 239.93, 29.47, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(72, 210.46, 239.93, 29.47, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(73, 210.46, 239.93, 29.47, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(74, 210.46, 239.93, 29.47, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(75, 178.89, 203.94, 25.05, 'Retiro personal', '-2.85524', '-78.77873029999999', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(76, 147.32, 167.95, 20.63, 'Retiro personal', '-2.8552505999999997', '-78.7786611', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(77, 121.02, 137.96, 16.94, 'Retiro personal', '-2.8552408', '-78.77863789999999', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(78, 121.02, 137.96, 16.94, 'Retiro personal', '-2.8552408', '-78.77863789999999', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(79, 121.02, 137.96, 16.94, 'Retiro personal', '-2.8552408', '-78.77863789999999', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(80, 121.02, 137.96, 16.94, 'Retiro personal', '-2.8552408', '-78.77863789999999', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(81, 128.05, 145.98, 17.93, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(82, 55.00, 62.70, 7.70, 'Retiro personal', '0', '0', 2, 1, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(83, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(84, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(85, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(86, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(87, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(88, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(89, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(90, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(91, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(92, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(93, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(94, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(95, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(96, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(97, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(98, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(99, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/07/2016', 1, '0.00', 0.00, '2016-07-28 23:54:00', NULL, '0.00', '2016-07-28'),
(100, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(101, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(102, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(103, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(104, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(105, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(106, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(107, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(108, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(109, 84.18, 95.97, 11.79, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(110, 96.49, 110.00, 13.51, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(111, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(112, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(113, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(114, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(115, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(116, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(117, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(118, 220.00, 250.80, 30.80, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(119, 63.14, 71.98, 8.84, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(120, 110.00, 125.40, 15.40, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(121, 162.61, 185.38, 22.77, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(122, 243.92, 278.07, 34.15, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(123, 243.92, 278.07, 34.15, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(124, 243.92, 278.07, 34.15, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '0.00', '2016-08-28'),
(125, 243.92, 278.07, 34.15, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(126, 78.92, 89.97, 11.05, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(127, 105.23, 119.96, 14.73, 'Ubicacion actual', '-4.0078909', '-79.2112769', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(128, 136.80, 155.95, 19.15, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(129, 168.37, 191.94, 23.57, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(130, 142.06, 161.95, 19.89, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(131, 115.75, 131.96, 16.21, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(132, 115.75, 131.96, 16.21, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(133, 89.45, 101.97, 12.52, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(134, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(135, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(136, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(137, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(138, 115.75, 131.96, 16.21, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(139, 115.75, 131.96, 16.21, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(140, 89.45, 101.97, 12.52, 'Ubicacion actual', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(141, 89.45, 101.97, 12.52, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(142, 147.32, 167.95, 20.63, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(143, 178.89, 203.94, 25.05, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(144, 210.46, 239.93, 29.47, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(145, 121.02, 137.96, 16.94, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(146, 147.32, 167.95, 20.63, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(147, 147.32, 167.95, 20.63, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(148, 147.32, 167.95, 20.63, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(149, 147.32, 167.95, 20.63, 'Retiro personal', '0', '0', 2, 8, '28/08/2016', 1, '0.00', 0.00, '2016-08-28 23:54:00', NULL, '14.00', '2016-08-28'),
(150, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(151, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(152, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(153, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(154, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(155, 189.42, 215.94, 26.52, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(156, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(157, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(158, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(159, 189.42, 215.94, 26.52, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(160, 220.99, 251.93, 30.94, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(161, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(162, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(163, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(164, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(165, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(166, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(167, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(168, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(169, 110.49, 125.96, 15.47, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(170, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(171, 84.18, 95.97, 11.79, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(172, 136.80, 155.95, 19.15, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(173, 136.80, 155.95, 19.15, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(174, 136.80, 155.95, 19.15, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(175, 168.37, 191.94, 23.57, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(176, 115.75, 131.96, 16.21, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(177, 89.45, 101.97, 12.52, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(178, 89.45, 101.97, 12.52, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(179, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(180, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(181, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(182, 63.14, 71.98, 8.84, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(183, 63.14, 71.98, 8.84, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(184, 94.71, 107.97, 13.26, 'Domicilio', '-2.8552', '-78.7787334', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(185, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(186, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(187, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(188, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(189, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(190, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(191, 94.71, 107.97, 13.26, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(192, 126.28, 143.96, 17.68, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(193, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(194, 94.71, 107.97, 13.26, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(195, 126.28, 143.96, 17.68, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(196, 94.71, 107.97, 13.26, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(197, 126.28, 143.96, 17.68, 'Ubicacion actual', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(198, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(199, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/08/2016', 1, '0.00', 0.00, '2016-08-15 23:54:00', NULL, '14.00', '2016-08-15'),
(200, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(201, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(202, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(203, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(204, 126.28, 143.96, 17.68, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(205, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(206, 157.85, 179.95, 22.10, 'Retiro personal', '-2.8550663', '-78.77893139999999', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(207, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(208, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(209, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(210, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(211, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(212, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(213, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(214, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(215, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(216, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(217, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(218, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(219, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(220, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(221, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(222, 126.28, 143.96, 17.68, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(223, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(224, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(225, 94.71, 107.97, 13.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(226, 126.28, 143.96, 17.68, 'Ubicacion actual', '-2.8552546', '-78.778644', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(227, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(228, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(229, 157.85, 179.95, 22.10, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(230, 66.66, 75.99, 9.33, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(231, 93.84, 106.98, 13.14, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(232, 93.84, 106.98, 13.14, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(233, 107.00, 121.98, 14.98, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(234, 120.16, 136.98, 16.82, 'Ubicacion actual', '-2.8552776', '-78.7786421', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(235, 120.16, 136.98, 16.82, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(236, 160.50, 182.97, 22.47, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(237, 147.34, 167.97, 20.63, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(238, 173.66, 197.97, 24.31, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(239, 173.66, 197.97, 24.31, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(240, 173.66, 197.97, 24.31, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(241, 205.23, 233.96, 28.73, 'Retiro personal', '-2.8551717', '-78.7787757', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(242, 205.23, 233.96, 28.73, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(243, 223.64, 254.95, 31.31, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(244, 223.64, 254.95, 31.31, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(245, 184.17, 209.95, 25.78, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(246, 184.17, 209.95, 25.78, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(247, 184.17, 209.95, 25.78, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(248, 215.74, 245.94, 30.20, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(249, 215.74, 245.94, 30.20, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(250, 256.08, 291.93, 35.85, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(251, 215.74, 245.94, 30.20, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(252, 247.31, 281.93, 34.62, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(253, 247.31, 281.93, 34.62, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(254, 278.88, 317.92, 39.04, 'Retiro personal', '-2.8552356999999997', '-78.7787282', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(255, 175.39, 199.95, 24.56, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(256, 175.39, 199.95, 24.56, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(257, 143.82, 163.96, 20.14, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(258, 143.82, 163.96, 20.14, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(259, 143.82, 163.96, 20.14, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(260, 143.82, 163.96, 20.14, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(261, 143.82, 163.96, 20.14, 'Retiro personal', '-2.8551561999999997', '-78.77868629999999', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(262, 184.17, 209.95, 25.78, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(263, 184.17, 209.95, 25.78, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(264, 201.71, 229.95, 28.24, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(265, 144.74, 165.00, 20.26, 'Retiro personal', '-2.8552155', '-78.7786465', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(266, 144.74, 165.00, 20.26, 'Retiro personal', '-2.8551908999999998', '-78.7786971', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(267, 78.92, 89.97, 11.05, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(268, 144.74, 165.00, 20.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(269, 144.74, 165.00, 20.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(270, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(271, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(272, 96.49, 110.00, 13.51, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(273, 144.74, 165.00, 20.26, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(274, 192.98, 220.00, 27.02, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(275, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(276, 192.98, 220.00, 27.02, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(277, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(278, 241.23, 275.00, 33.77, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(279, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(280, 192.98, 220.00, 27.02, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(281, 63.14, 71.98, 8.84, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(282, 63.14, 71.98, 8.84, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(283, 126.28, 143.96, 17.68, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(284, 178.89, 203.94, 25.05, 'Ubicacion actual', '-2.8552', '-78.7787334', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(285, 178.89, 203.94, 25.05, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(286, 178.89, 203.94, 25.05, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(287, 178.89, 203.94, 25.05, 'Retiro personal', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(288, 178.89, 203.94, 25.05, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(289, 178.89, 203.94, 25.05, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(290, 75.44, 86.00, 10.56, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(291, 121.03, 137.97, 16.94, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(292, 307.02, 350.00, 42.98, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(293, 307.02, 350.00, 42.98, 'Domicilio', '-2.8552', '-78.7787334', 2, 6, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(294, 26.31, 29.99, 3.68, 'Ubicacion actual', '0', '0', 2, 1, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(295, 26.31, 29.99, 3.68, 'Ubicacion actual', '0', '0', 2, 1, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(296, 26.31, 29.99, 3.68, 'Ubicacion actual', '0', '0', 2, 1, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(297, 31.57, 35.99, 4.42, 'Ubicacion actual', '-4.0078909', '-79.2112769', 2, 1, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(298, 31.57, 35.99, 4.42, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(299, 31.57, 35.99, 4.42, 'Ubicacion actual', '0', '0', 2, 8, '15/09/2016', 1, '0.00', 0.00, '2016-09-15 23:54:00', NULL, '14.00', '2016-09-15'),
(300, 26.31, 29.99, 3.68, 'Ubicacion actual', '-2.8411279944959444', '-79.04033959374999', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(301, 31.57, 35.99, 4.42, 'Retiro personal', '0', '0', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(302, 31.57, 35.99, 4.42, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(303, 31.57, 35.99, 4.42, 'Ubicacion actual', '0', '0', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(304, 31.57, 35.99, 4.42, 'Ubicacion actual', '0', '0', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(305, 31.57, 35.99, 4.42, 'Ubicacion actual', '-2.8552475', '-78.77867839999999', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(306, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552344', '-78.77862999999999', 4, 6, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(307, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552443', '-78.7787282', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(308, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552586', '-78.7786552', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(309, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552578', '-78.77860470000002', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(310, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552578', '-78.77860470000002', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(311, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552583', '-78.7787355', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(312, 31.57, 35.99, 4.42, 'Ubicacion actual', '-2.8552581999999997', '-78.7786544', 4, 8, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(313, 26.31, 29.99, 3.68, 'Ubicacion actual', '-2.8552467999999998', '-78.7786662', 4, 4, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(314, 33.33, 38.00, 4.67, 'Retiro personal', '0', '0', 4, 1, '15/10/2016', 1, '0.00', 0.00, '2016-10-15 23:54:00', NULL, '14.00', '2016-10-15'),
(315, 33.33, 38.00, 4.67, 'Retiro personal', '0', '0', 4, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(316, 33.33, 38.00, 4.67, 'Retiro personal', '0', '0', 4, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(317, 33.33, 38.00, 4.67, 'Retiro personal', '0', '0', 4, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(318, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552366', '-78.7787109', 4, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(319, 31.57, 35.99, 4.42, 'Ubicacion actual', '-4.0078909', '-79.2112769', 4, 6, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(320, 94.71, 107.97, 13.26, 'Ubicacion actual', '-2.8552623', '-78.77864919999999', 4, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(321, 31.57, 35.99, 4.42, 'Ubicacion actual', '-2.8546811', '-78.7791341', 4, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(322, 31.57, 35.99, 4.42, 'Ubicacion actual', '-2.8552523', '-78.77873690000001', 4, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(323, 31.57, 35.99, 4.42, 'Retiro personal', '0', '0', 4, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(324, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552644999999997', '-78.7786437', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(325, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552926999999997', '-78.77871320000001', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(326, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552752999999997', '-78.7786837', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(327, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552752999999997', '-78.7786837', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19');
INSERT INTO `pedido` (`id`, `subtotal`, `total`, `iva`, `entrega`, `ubiclg`, `ubiclt`, `users_id`, `status_id`, `date`, `paymethods_id`, `descuento`, `propina`, `created_at`, `updated_at`, `porc`, `rango`) VALUES
(328, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552752999999997', '-78.7786837', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(329, 110.00, 125.40, 15.40, 'Ubicacion actual', '-2.8552752999999997', '-78.7786837', 3, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(330, 204.71, 233.37, 28.66, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 5, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(331, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.855267', '-78.7786544', 6, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(332, 173.14, 197.38, 24.24, 'Ubicacion actual', '-2.8552606', '-78.7787259', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(333, 118.14, 134.68, 16.54, 'Ubicacion actual', '-2.8552657', '-78.7786781', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(334, 141.57, 161.39, 19.82, 'Ubicacion actual', '-2.8552465', '-78.778705', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(335, 236.28, 269.36, 33.08, 'Ubicacion actual', '-2.8552508999999997', '-78.77873890000001', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(336, 141.57, 161.39, 19.82, 'Ubicacion actual', '-2.8552586', '-78.7786496', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(337, 141.57, 161.39, 19.82, 'Ubicacion actual', '-2.8552684999999998', '-78.7786568', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(338, 141.57, 161.39, 19.82, 'Ubicacion actual', '-2.8552684999999998', '-78.7786568', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(339, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552682', '-78.7786563', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(340, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552562999999997', '-78.7786737', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(341, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552389', '-78.7786558', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(342, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552674', '-78.77864490000002', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(343, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552674', '-78.77864490000002', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(344, 204.71, 233.37, 28.66, 'Ubicacion actual', '-2.8552674', '-78.77864490000002', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(345, 118.14, 134.68, 16.54, 'Ubicacion actual', '-2.8552690999999997', '-78.77865179999999', 7, 8, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(346, 55.00, 62.70, 7.70, 'Retiro personal', '-2.855265', '-78.7786398', 7, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(347, 55.00, 62.70, 7.70, 'Retiro personal', '0', '0', 7, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(348, 55.00, 62.70, 7.70, 'Retiro personal', '0', '0', 7, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:00', NULL, '14.00', '2016-10-19'),
(349, 48.25, 55.00, 6.75, 'Retiro personal', '0', '0', 7, 1, '19/10/2016', 1, '0.00', 0.00, '2016-10-19 23:54:21', NULL, '14.00', '2016-10-19'),
(350, 80.68, 91.98, 11.30, 'Ubicacion actual', '-2.8552599', '-78.7787302', 8, 6, '20/10/2016', 1, '0.00', 0.00, '2016-10-20 18:36:06', NULL, '14.00', '2016-10-20'),
(351, 70.16, 79.98, 9.82, 'Ubicacion actual', '-2.8553045', '-78.77869430000001', 7, 6, '20/10/2016', 1, '0.00', 0.00, '2016-10-20 21:18:05', NULL, '14.00', '2016-10-20'),
(352, 150.84, 171.96, 21.12, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 6, 6, '20/10/2016', 1, '0.00', 0.00, '2016-10-20 21:21:10', NULL, '14.00', '2016-10-20'),
(353, 213.98, 243.94, 29.96, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 5, 6, '20/10/2016', 1, '0.00', 0.00, '2016-10-20 21:23:33', NULL, '14.00', '2016-10-20'),
(354, 78.92, 89.97, 11.05, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 3, 6, '20/10/2016', 1, '0.00', 0.00, '2016-10-20 21:28:11', NULL, '14.00', '2016-10-20'),
(355, 78.92, 89.97, 11.05, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 10, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-21 18:57:32', NULL, '14.00', '2016-10-21'),
(356, 122.80, 139.99, 17.19, 'Ubicacion actual', '-2.8552779999999998', '-78.7786878', 10, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-21 20:04:19', NULL, '14.00', '2016-10-21'),
(357, 70.14, 79.96, 9.82, 'Ubicacion actual', '-2.8552684', '-78.778655', 4, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-21 20:08:13', NULL, '14.00', '2016-10-21'),
(358, 113.16, 129.00, 15.84, 'Ubicacion actual', '-2.8552595000000003', '-78.77866139999999', 2, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-21 20:11:52', NULL, '14.00', '2016-10-21'),
(359, 78.92, 89.97, 11.05, 'Ubicacion actual', '-2.8552505999999997', '-78.77874589999999', 10, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-22 07:27:00', NULL, '14.00', '2016-10-22'),
(360, 113.12, 128.96, 15.84, 'Ubicacion actual', '-2.8551881', '-78.77870639999999', 3, 8, '21/10/2016', 1, '0.00', 0.00, '2016-10-22 07:33:12', NULL, '14.00', '2016-10-22'),
(361, 75.44, 86.00, 10.56, 'Ubicacion actual', '-2.8553192999999997', '-78.7786982', 4, 8, '26/10/2016', 1, '0.00', 0.00, '2016-10-26 18:04:09', NULL, '14.00', '2016-10-26'),
(362, 70.15, 79.97, 9.82, 'Ubicacion actual', '-2.8552435999999997', '-78.7787113', 4, 8, '27/10/2016', 1, '0.00', 0.00, '2016-10-27 23:46:20', NULL, '14.00', '2016-10-27'),
(363, 57.89, 66.00, 8.11, 'Domicilio', '-2.8909646', '-78.9876586', 3, 1, '28/10/2016', 1, '0.00', 0.00, '2016-10-28 22:42:18', NULL, '14.00', '2016-10-28'),
(364, 52.61, 59.98, 7.37, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 5, 8, '28/10/2016', 1, '0.00', 0.00, '2016-10-29 03:17:40', NULL, '14.00', '2016-10-28'),
(365, 26.31, 29.99, 3.68, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 6, 5, '28/10/2016', 1, '0.00', 0.00, '2016-10-29 03:18:50', NULL, '14.00', '2016-10-28'),
(366, 48.25, 55.00, 6.75, 'Ubicacion actual', '-2.8552519999999997', '-78.7786478', 8, 8, '28/10/2016', 1, '0.00', 0.00, '2016-10-29 03:29:05', NULL, '14.00', '2016-10-28'),
(367, 106.90, 121.87, 14.97, 'Ubicacion actual', '-2.8553337', '-78.7786489', 4, 8, '28/10/2016', 1, '0.00', 0.00, '2016-10-29 04:08:29', NULL, '14.00', '2016-10-28'),
(368, 87.70, 99.98, 12.28, 'Ubicacion actual', '-2.8552595000000003', '-78.7787262', 4, 6, '29/10/2016', 1, '0.00', 0.00, '2016-10-29 18:51:37', NULL, '14.00', '2016-10-29'),
(369, 78.92, 89.97, 11.05, 'Domicilio', '-2.8909646', '-78.9876586', 3, 8, '29/10/2016', 1, '0.00', 0.00, '2016-10-29 18:54:05', NULL, '14.00', '2016-10-29'),
(370, 124.54, 141.97, 17.43, 'Domicilio', '-2.8411279944959444', '-79.04033959374999', 5, 8, '29/10/2016', 1, '0.00', 0.00, '2016-10-29 19:24:44', NULL, '14.00', '2016-10-29'),
(371, 81.99, 93.47, 11.48, 'Domicilio', '-2.903183', '-78.8287299', 6, 8, '29/10/2016', 1, '0.00', 0.00, '2016-10-29 19:31:25', NULL, '14.00', '2016-10-29'),
(372, 78.92, 89.97, 11.05, 'Ubicacion actual', '-2.8537418', '-78.7803224', 12, 3, '02/11/2016', 1, '0.00', 0.00, '2016-11-03 02:58:09', NULL, '14.00', '2016-11-02'),
(373, 78.92, 89.97, 11.05, 'Ubicacion actual', '-2.8552488', '-78.7786685', 12, 8, '03/11/2016', 1, '0.00', 0.00, '2016-11-03 16:53:38', NULL, '14.00', '2016-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `id` int(11) NOT NULL,
  `nombres` char(45) DEFAULT NULL,
  `apellidos` char(45) DEFAULT NULL,
  `fechanacimiento` char(10) DEFAULT NULL,
  `genero` char(9) DEFAULT NULL,
  `cedula` char(10) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `isactive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `estcivil` decimal(15,2) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `sld` decimal(15,2) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `positions_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `comfirm_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `poss` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`id`, `poss`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', NULL, NULL),
(2, 'USUARIO', NULL, NULL),
(3, 'DESPACHADOR', NULL, NULL),
(4, 'BODEGUERO', NULL, NULL),
(5, 'VENDEDOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `codbarra` varchar(15) DEFAULT NULL,
  `cant` int(5) DEFAULT NULL,
  `pre_com` double(8,2) DEFAULT NULL,
  `pre_ven` double(8,2) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `prgr_tittle` varchar(300) DEFAULT NULL,
  `nuevo` tinyint(1) DEFAULT NULL,
  `promocion` tinyint(1) DEFAULT NULL,
  `catalogo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `isactive_id` int(2) NOT NULL,
  `sections_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `path`, `slug`, `codbarra`, `cant`, `pre_com`, `pre_ven`, `img`, `prgr_tittle`, `nuevo`, `promocion`, `catalogo`, `created_at`, `updated_at`, `category_id`, `brand_id`, `isactive_id`, `sections_id`) VALUES
(1, 'Zapato crv', '1471461259.jpg', '1234567890123', '1234567890123', 7, 25.50, 55.00, '1471461259.jpg', 'Los zapatos mas livianos que tendras la oportunidad de ponerte...', 0, 1, 1, '2016-05-28 12:29:10', '2016-10-21 02:47:43', 1, 1, 1, 1),
(2, 'Casaca ', '1471461243.png', '1234561234561', '1234561234561', 7, 120.00, 175.00, '1471461243.png', 'Casaca de cuero par dias especiales', 1, 1, 1, '2016-06-09 06:52:46', '2016-08-18 00:14:03', 17, 3, 2, 1),
(3, 'Bufanda ploma', '1471461221.jpg', '1234123412341', '1234123412341', 8, 35.87, 43.50, '1471461221.jpg', 'Bufanda para frio', 0, 0, 1, '2016-06-09 06:58:05', '2016-10-29 19:31:25', 15, 6, 1, 5),
(4, 'Sweater para frio', '1471461187.jpg', '1234567123456', '1234567123456', 4, 75.99, 85.99, '1471461187.jpg', 'Sweater para temporada de hielo', 0, 0, 1, '2016-06-09 07:00:48', '2016-08-18 00:13:07', 4, 4, 1, 1),
(6, 'Zapatos cafes', '1471461162.jpg', '9876565678909', '9876565678909', 4, 45.99, 60.12, '1471461162.jpg', 'Zapatos elegantes', 0, 0, 1, '2016-06-09 07:21:09', '2016-08-18 00:12:42', 1, 4, 1, 1),
(7, 'Casaca estilo', '1471461140.jpg', '1232123212321', '1232123212321', 6, 65.30, 70.88, '1471461140.jpg', 'CASACA ESTILO', 0, 1, 1, '2016-06-14 08:49:41', '2016-08-18 00:12:20', 21, 11, 1, 2),
(8, 'Vestidos primavera', '1471461115.jpg', '6565453456545', '6565453456545', 6, 27.99, 32.99, '1471461115.jpg', 'Vestido Primavera', 0, 0, 1, '2016-06-14 08:54:17', '2016-10-22 07:33:12', 18, 11, 1, 2),
(9, 'Vestido Azul', '1471461097.jpg', '67656765456', '67656765456', 5, 35.00, 43.99, '1471461097.jpg', 'Para ocasiones especiales...', 0, 0, 1, '2016-06-14 08:58:28', '2016-08-18 00:11:37', 18, 8, 1, 2),
(10, 'Camisa rayas', '1471907377.jpg', '0090909899', '0090909899', 0, 8.00, 9.50, '1471907377.jpg', 'Camisa elagante para ocasiones especiales', 1, 1, 1, '2016-06-16 01:09:24', '2016-08-23 04:09:37', 12, 5, 1, 3),
(11, 'Camisa niño', '1471461058.jpg', '8787878788', '8787878788', 5, 13.99, 17.50, '1471461058.jpg', 'Camisas para niños', 1, 0, 1, '2016-06-16 01:14:12', '2016-08-18 00:10:58', 10, 6, 1, 3),
(12, 'Pantalon varon', '1471460526.jpg', '1234561234111', '1234561234111', 4, 10.00, 20.01, '1471460526.jpg', 'Pantalones', 1, 0, 1, '2016-06-16 01:19:27', '2016-08-18 00:02:06', 2, 6, 1, 1),
(13, 'pantalon de hombre', '1471460507.jpg', '987622278909', '987622278909', 6, 29.00, 35.99, '1471460507.jpg', 'Pantalones resistentes', 0, 0, 1, '2016-06-16 01:23:39', '2016-08-18 00:01:47', 2, 6, 1, 1),
(14, 'Pantalon de mujer', '1471460488.jpg', '22223334423', '22223334423', 9, 12.00, 15.00, '1471460488.jpg', 'Moda de mujer', 1, 1, 1, '2016-06-16 01:26:43', '2016-08-18 00:01:28', 23, 8, 1, 2),
(15, 'Camiseta', '1471460473.jpg', '0767542312321', '0767542312321', 45, 5.00, 7.99, '1471460473.jpg', 'Camiseta ', 1, 1, 1, '2016-07-28 04:40:09', '2016-08-18 23:00:36', 19, 10, 1, 1),
(16, 'Camisetas', '1471460456.jpg', '1234323232123', '1234323232123', 12, 10.00, 14.50, '1471460456.jpg', 'Camisetas ', 1, 1, 1, '2016-07-28 00:42:56', '2016-08-18 00:00:56', 19, 1, 1, 1),
(17, 'Casaca cafe', '1471460414.jpg', '1232343432123', '1232343432123', 5, 30.00, 35.99, '1471460414.jpg', 'Casaca cafe', 0, 0, 1, '2016-07-28 01:05:51', '2016-10-19 22:36:48', 21, 6, 1, 2),
(18, 'Vestidos de niña', '1471460374.jpg', '123451234543212', '123451234543212', 3, 15.00, 22.85, '1471460374.jpg', 'Vestido', 1, 1, 1, '2016-07-28 19:45:53', '2016-08-17 23:59:34', 18, 4, 1, 4),
(19, 'Camiseta rosada', '1471460340.jpg', '343432321233221', '343432321233221', 5, 9.00, 12.50, '1471460340.jpg', 'Camiseta', 1, 1, 1, '2016-07-28 19:47:30', '2016-08-17 23:59:00', 19, 1, 1, 4),
(23, 'gafas ray ban', '1471460278.png', '878766566644', '878766566644', 3, 99.50, 130.99, '1471460278.png', 'gafas ray ban', 1, 1, 1, '2016-08-10 21:22:09', '2016-08-23 03:59:42', 20, 1, 1, 6),
(28, 'Casaca azul niña', '1471460243.jpg', '12341232176511', '12341232176511', 5, 8.00, 12.00, '1471460243.jpg', 'Casaca de niña', 1, 1, 1, '2016-08-17 22:49:42', '2016-08-17 23:57:23', 20, 1, 1, 4),
(29, 'Zapatos de mocasin', '1471538597.jpg', '546556434987656', '546556434987656', 15, 35.00, 49.99, '1471538597.jpg', 'Elegantes zapatos de mocasin', 1, 1, 1, '2016-08-18 21:43:17', '2016-08-18 21:43:17', 1, 12, 1, 1),
(30, 'Zapatos de mocasin negros', '1471538671.jpg', '98987676565345', '98987676565345', 15, 39.00, 52.55, '1471538671.jpg', 'Elegantes zapatos de mocasin negros', 1, 1, 1, '2016-08-18 21:44:31', '2016-08-18 21:44:31', 1, 12, 1, 1),
(31, 'Zapatos de caña baja', '1471538735.jpg', '8798767654535', '8798767654535', 15, 35.00, 45.80, '1471538735.jpg', 'Elegantes zapatos negros', 1, 1, 1, '2016-08-18 21:45:35', '2016-08-18 23:01:48', 1, 12, 1, 1),
(32, 'botines negros', '1471538872.jpg', '878765754643', '878765754643', 15, 45.00, 55.00, '1471538872.jpg', 'Botines negros', 1, 1, 1, '2016-08-18 21:47:52', '2016-08-18 21:47:52', 1, 12, 1, 1),
(33, 'Botines con detalles', '1471539055.jpg', '98987876576', '98987876576', 15, 35.00, 49.99, '1471539055.jpg', 'Botines con detalles', 1, 1, 1, '2016-08-18 21:48:28', '2016-08-18 21:50:55', 1, 12, 1, 1),
(34, 'Pantalón café', '1471541688.jpg', '86876553635479', '86876553635479', 15, 35.00, 40.99, '1471541688.jpg', 'Pantalón café', 1, 1, 1, '2016-08-18 22:34:48', '2016-08-18 22:34:48', 2, 6, 1, 1),
(35, 'Pantalón lacre', '1471541822.jpg', '12348124812476', '12348124812476', 15, 35.00, 49.99, '1471541822.jpg', 'Pantalón lacre', 1, 1, 1, '2016-08-18 22:37:02', '2016-08-18 22:51:02', 2, 6, 1, 1),
(36, 'Pantalón deportivo', '1471541867.jpg', '879876765443', '879876765443', 13, 35.00, 49.99, '1471541867.jpg', 'Pantalón deportivo plomo', 1, 1, 1, '2016-08-18 22:37:47', '2016-10-29 18:51:37', 2, 3, 1, 1),
(37, 'Pantalón tinturado', '1471541933.jpg', '879876765111', '879876765111', 15, 35.00, 49.99, '1471541933.jpg', 'Pantalón tinturado negro', 1, 1, 1, '2016-08-18 22:38:53', '2016-08-18 22:50:43', 2, 6, 1, 1),
(38, 'Pantalón tinturado azul', '1471542543.jpg', '8798768787', '8798768787', 15, 35.00, 49.99, '1471542543.jpg', 'Pantalón tinturado azul', 1, 1, 1, '2016-08-18 22:39:27', '2016-08-18 22:49:03', 2, 6, 1, 1),
(39, 'Sweater combinado plomo', '1471542825.jpg', '8798767652321', '8798767652321', 15, 35.00, 49.99, '1471542825.jpg', 'Sweater combinado plomo', 1, 1, 1, '2016-08-18 22:53:29', '2016-08-18 22:53:45', 4, 6, 1, 1),
(40, 'Sweater plomo simple', '1471542870.jpg', '879876121211', '879876121211', 15, 35.00, 49.99, '1471542870.jpg', 'Sweater plomo simple', 1, 1, 1, '2016-08-18 22:54:30', '2016-08-18 22:54:30', 4, 6, 1, 1),
(41, 'Sweater rayas', '1471542912.jpg', '878765121111', '878765121111', 15, 35.00, 49.99, '1471542912.jpg', 'Sweater plomo simple rayas', 1, 1, 1, '2016-08-18 22:55:12', '2016-08-18 22:55:12', 4, 6, 1, 1),
(42, 'Camisa azul', '1471543103.jpg', '9898766777787', '9898766777787', 15, 35.00, 52.55, '1471543103.jpg', 'Camisa azul', 1, 1, 1, '2016-08-18 22:58:23', '2016-08-18 22:58:23', 10, 5, 1, 1),
(43, 'Camisa blanca', '1471543153.jpg', '12348124812000', '12348124812000', 15, 35.00, 52.55, '1471543153.jpg', 'Camisa blanca', 1, 1, 1, '2016-08-18 22:59:13', '2016-08-18 22:59:13', 10, 5, 1, 1),
(44, 'Camisa rosada', '1471543189.jpg', '868765536351111', '868765536351111', 15, 35.00, 49.99, '1471543189.jpg', 'Camisa rosada', 1, 1, 1, '2016-08-18 22:59:50', '2016-08-18 22:59:50', 10, 5, 1, 1),
(45, 'Blazer negro', '1471564716.jpg', '099794748439474', '099794748439474', 13, 45.00, 55.99, '1471564716.jpg', 'Blazer negro', 1, 1, 1, '2016-08-19 04:58:36', '2016-10-29 19:24:47', 25, 12, 1, 2),
(46, 'Zapatos de cuero', '1471567652.jpg', '3456778876655', '3456778876655', 20, 25.00, 29.99, '1471567652.jpg', 'zapatos', 1, 1, 1, '2016-08-19 05:47:01', '2016-08-19 05:48:37', 1, 12, 1, 1),
(47, 'Vestido casual', '1471568605.jpg', '0987363646473', '0987363646473', 10, 25.00, 29.99, '1471568605.jpg', 'vestido', 1, 0, 1, '2016-08-19 06:03:25', '2016-08-19 06:09:58', 18, 12, 1, 2),
(48, 'Vestido demin ', '1471568815.jpg', '34567867866', '34567867866', 25, 30.00, 35.99, '1471568815.jpg', 'vestido', 0, 0, 1, '2016-08-19 06:06:55', '2016-08-19 06:07:47', 18, 12, 1, 2),
(49, 'Vestido manga sisa', '1471569518.jpg', '83458754938328', '83458754938328', 5, 19.00, 22.00, '1471569518.jpg', '25.99', 1, 1, 1, '2016-08-19 06:18:39', '2016-10-28 22:42:19', 18, 12, 1, 1),
(50, 'casaca roja', '1471569938.jpg', '2456787654345', '2456787654345', 0, 29.00, 35.99, '1471569938.jpg', 'casaca', 1, 1, 1, '2016-08-19 06:25:12', '2016-10-20 21:23:35', 17, 12, 1, 2),
(51, 'Pantalon tinturado negro', '1471901648.jpg', '98999889878777', '98999889878777', 5, 15.00, 22.00, '1471901648.jpg', 'Pantalon tinturado negro.', 1, 1, 1, '2016-08-23 02:34:09', '2016-08-23 02:34:09', 23, 3, 1, 3),
(52, 'Bermudas playera', '1471901841.jpg', '887878566445434', '887878566445434', 5, 5.00, 22.00, '1471901841.jpg', 'Bermuda playera', 1, 1, 1, '2016-08-23 02:37:21', '2016-08-23 02:37:21', 26, 6, 1, 1),
(53, 'Bermuda llana', '1471901981.jpg', '899999999988989', '899999999988989', 10, 15.00, 29.99, '1471901981.jpg', 'Bermuda llana', 1, 1, 1, '2016-08-23 02:39:41', '2016-08-23 02:39:41', 26, 6, 1, 1),
(54, 'Camiseta blanca para mujer', '1471906505.jpg', '00001122223212', '00001122223212', 10, 15.00, 29.99, '1471906505.jpg', 'Camiseta blanca con detalles', 1, 1, 1, '2016-08-23 02:47:20', '2016-08-23 03:55:05', 19, 6, 1, 2),
(55, 'Camiseta azul para niñas', '1471904643.jpg', '555544443333212', '555544443333212', 10, 15.00, 29.99, '1471904643.jpg', 'Camiseta para niñas', 1, 1, 1, '2016-08-23 03:24:03', '2016-08-23 03:24:03', 19, 1, 1, 4),
(56, 'Camiseta para niñas', '1471904939.jpg', '55554444311111', '55554444311111', 10, 15.00, 29.99, '1471904939.jpg', 'Camiseta para niñas', 1, 1, 1, '2016-08-23 03:28:59', '2016-08-23 03:28:59', 19, 1, 1, 4),
(57, 'Camiseta de niño', '1471905766.jpg', '090098998787656', '090098998787656', 5, 15.00, 29.99, '1471905766.jpg', 'camiseta', 1, 1, 1, '2016-08-23 03:42:46', '2016-08-23 03:42:46', 19, 1, 1, 3),
(58, 'Camiseta para niños', '1471905908.jpg', '656655654543432', '656655654543432', 10, 15.00, 29.99, '1471905908.jpg', 'Camiseta', 1, 1, 1, '2016-08-23 03:45:08', '2016-08-23 03:56:32', 19, 1, 1, 3),
(59, 'Camiseta de niño tela verde', '1471906281.jpg', '888888888111212', '888888888111212', 15, 15.00, 29.99, '1471906281.jpg', 'Camiseta de niño', 1, 1, 1, '2016-08-23 03:51:21', '2016-08-23 03:51:21', 19, 2, 1, 3),
(60, 'Camiseta de niña', '1471906454.jpg', '787766556565646', '787766556565646', 10, 5.00, 12.00, '1471906454.jpg', 'Camiseta de niña ', 1, 1, 1, '2016-08-23 03:54:14', '2016-08-23 03:54:14', 19, 2, 1, 4),
(61, 'Pantalon de niña', '1471906995.jpg', '767654645345', '767654645345', 10, 15.00, 29.99, '1471906995.jpg', 'Pantalos de niña', 1, 1, 1, '2016-08-23 04:03:16', '2016-08-23 04:03:16', 22, 2, 1, 4),
(62, 'Pantalon legin de niña ', '1471907059.jpg', '1989998767656', '1989998767656', 10, 15.00, 29.99, '1471907059.jpg', 'Legin de niñas', 1, 1, 1, '2016-08-23 04:04:19', '2016-08-23 04:04:19', 22, 2, 1, 4),
(63, 'Camisa de niño', '1471907347.jpg', '222222333333232', '222222333333232', 6, 15.00, 29.99, '1471907347.jpg', 'Camisa de niño', 1, 1, 1, '2016-08-23 04:09:07', '2016-10-22 07:33:12', 10, 1, 1, 3),
(64, 'Pantalos de niño', '1471907525.jpg', '989836364868', '989836364868', 9, 15.00, 29.99, '1471907525.jpg', 'Pantalon de niño', 1, 1, 1, '2016-08-23 04:12:05', '2016-10-29 03:17:40', 31, 1, 1, 3),
(65, 'Pantalos plomo de niño ', '1471907578.jpg', '09098987787767', '09098987787767', 4, 15.00, 29.99, '1471907578.jpg', 'Pantalone s deniño', 1, 1, 1, '2016-08-23 04:12:58', '2016-10-29 04:08:30', 31, 1, 1, 3),
(66, 'Pantalon deportivo de niño', '1471907705.jpg', '99999911112221', '99999911112221', 0, 15.00, 29.99, '1471907705.jpg', 'Pantalones', 1, 1, 1, '2016-08-23 04:15:05', '2016-10-29 19:31:25', 31, 1, 1, 3),
(67, 'Cartera ', '1471908134.jpg', '5555444454545', '5555444454545', 5, 15.00, 35.99, '1471908134.jpg', 'Cartera para mujer', 1, 1, 1, '2016-08-23 04:22:14', '2016-08-23 04:22:14', 27, 1, 1, 6),
(68, 'Cartera rosada', '1471908198.jpg', '878576745431', '878576745431', 9, 15.00, 29.99, '1471908198.jpg', 'Cartera', 1, 1, 1, '2016-08-23 04:23:18', '2016-10-29 03:17:40', 27, 1, 1, 6),
(69, 'Cartera para mujer', '1471908304.jpg', '5445334342312', '5445334342312', 5, 15.00, 35.99, '1471908304.jpg', 'Cartera', 1, 1, 1, '2016-08-23 04:25:04', '2016-08-23 04:25:04', 27, 1, 1, 6),
(70, 'Mochila de niño', '1471908421.jpg', '1111111212121', '1111111212121', 8, 25.00, 45.99, '1471908421.jpg', 'Mochilas', 1, 1, 1, '2016-08-23 04:27:01', '2016-10-20 18:36:09', 28, 1, 1, 6),
(71, 'Mochila de nilo estilo', '1471908459.jpg', '999911112211212', '999911112211212', 10, 15.00, 35.99, '1471908459.jpg', 'mochila', 1, 1, 1, '2016-08-23 04:27:39', '2016-08-23 04:27:39', 28, 1, 1, 6),
(72, 'Mochila de niña', '1471908551.jpg', '2323232323231', '2323232323231', 6, 25.00, 45.99, '1471908551.jpg', 'Mochilas', 1, 1, 1, '2016-08-23 04:29:11', '2016-10-20 21:23:35', 29, 1, 1, 6),
(73, 'Mochila de niña', '1471908756.jpg', '22222222323443', '22222222323443', 6, 15.00, 29.99, '1471908756.jpg', 'Mochila', 1, 1, 1, '2016-08-23 04:32:36', '2016-08-23 04:32:36', 29, 1, 1, 6),
(74, 'Falda de mujer', '1471909219.jpg', '6565643635467', '6565643635467', 15, 25.00, 35.99, '1471909219.jpg', 'Falda azul', 1, 1, 1, '2016-08-23 04:40:20', '2016-08-23 04:40:20', 18, 1, 1, 4),
(75, 'camiseta  rosa', '1471910655.jpg', '102345675312375', '102345675312375', 12, 25.00, 29.99, '1471910655.jpg', 'camiseta', 1, 1, 1, '2016-08-23 05:04:15', '2016-10-29 03:18:50', 19, 12, 1, 2),
(76, 'jean skinny', '1471910913.jpg', '104538729843609', '104538729843609', 21, 30.00, 35.95, '1471910913.jpg', 'jean mujer', 1, 1, 1, '2016-08-23 05:08:33', '2016-10-29 04:08:30', 22, 12, 1, 2),
(77, 'camiseta negra', '1471911219.jpg', '12324565786467', '12324565786467', 11, 15.00, 19.99, '1471911219.jpg', 'camiseta', 1, 1, 1, '2016-08-23 05:13:39', '2016-10-27 23:46:20', 10, 12, 1, 1),
(78, 'chaquetas', '1471911444.jpg', '094539238098326', '094539238098326', 13, 60.00, 64.99, '1471911444.jpg', 'chaqueta', 1, 1, 1, '2016-08-23 05:17:24', '2016-08-23 05:17:24', 13, 12, 1, 1),
(79, 'buso estampado', '1471911625.jpg', '349834094823894', '349834094823894', 15, 20.00, 25.00, '1471911625.jpg', 'buso deportivo', 1, 1, 1, '2016-08-23 05:20:25', '2016-08-23 05:20:25', 10, 12, 1, 1),
(80, 'camiseta minnie', '1471911952.jpg', '454623435768550', '454623435768550', 7, 9.00, 9.99, '1471911952.jpg', 'camiseta niñas', 1, 1, 1, '2016-08-23 05:25:10', '2016-10-29 19:31:25', 11, 12, 1, 4),
(81, 'falda blanca', '1471912228.jpg', '123235465785093', '123235465785093', 10, 9.00, 9.99, '1471912228.jpg', 'falda estampada', 1, 1, 1, '2016-08-23 05:30:28', '2016-08-23 05:30:48', 23, 12, 1, 4),
(82, 'camiseta cars', '1471912517.jpg', '223445655789907', '223445655789907', 15, 10.00, 15.00, '1471912517.jpg', 'camiseta cars', 1, 1, 1, '2016-08-23 05:35:17', '2016-08-23 05:35:38', 19, 12, 1, 3),
(83, 'zapatos sneaker simples', '1471978945.jpg', '675644567764532', '675644567764532', 4, 45.00, 62.70, '1471978945.jpg', 'zapatos', 0, 1, 1, '2016-08-23 05:39:28', '2016-10-19 23:47:12', 35, 12, 1, 7),
(84, 'vestidos', '1471912951.jpg', '667476123243554', '667476123243554', 20, 25.00, 29.99, '1471912951.jpg', 'vestido blanco y negro', 1, 1, 1, '2016-08-23 05:42:31', '2016-08-23 05:42:31', 18, 12, 1, 2),
(85, 'vestido de tiras', '1471913323.jpg', '334335446557668', '334335446557668', 18, 30.00, 39.99, '1471913323.jpg', 'vestido casual', 1, 1, 1, '2016-08-23 05:48:44', '2016-10-20 21:28:11', 18, 12, 1, 2),
(86, 'boxer strech', '1471913596.jpg', '44355655787787', '44355655787787', 5, 5.00, 5.99, '1471913596.jpg', 'boxer negro', 1, 1, 1, '2016-08-23 05:53:16', '2016-08-23 05:53:16', 20, 12, 1, 1),
(87, 'bufanda tricolor', '1471913832.jpg', '667668778943356', '667668778943356', 5, 18.00, 19.99, '1471913832.jpg', 'bufandas varon', 1, 1, 1, '2016-08-23 05:57:12', '2016-10-27 23:46:20', 15, 12, 1, 1),
(88, 'bufanda roja', '1471914067.jpg', '444555666777888', '444555666777888', 3, 8.99, 9.99, '1471914067.jpg', 'bufanda', 1, 1, 1, '2016-08-23 06:01:07', '2016-10-29 04:08:30', 15, 12, 1, 1),
(89, 'casaca negra', '1471914470.jpg', '223454376898675', '223454376898675', 13, 35.99, 39.99, '1471914470.jpg', 'casaca cuero', 1, 1, 1, '2016-08-23 06:07:50', '2016-10-27 23:46:20', 17, 12, 1, 1),
(90, 'Legin ', '1471926151.jpg', '8767564534234', '8767564534234', 5, 15.00, 29.99, '1471926151.jpg', 'Legin', 1, 1, 1, '2016-08-23 09:22:32', '2016-08-23 09:22:32', 23, 13, 1, 2),
(91, 'Legin', '1471926195.jpg', '878777666655555', '878777666655555', 5, 15.00, 29.99, '1471926195.jpg', 'Legin', 1, 1, 1, '2016-08-23 09:23:15', '2016-08-23 09:23:15', 23, 13, 1, 2),
(92, 'Legin', '1471926322.jpg', '333344445533435', '333344445533435', 5, 15.00, 29.99, '1471926322.jpg', 'Legin deportivo', 1, 1, 1, '2016-08-23 09:25:22', '2016-08-23 09:25:22', 23, 13, 1, 2),
(93, 'Legin deportivo con detalles', '1471926377.jpg', '87777888656', '87777888656', 8, 15.00, 29.99, '1471926377.jpg', 'Legin deportivo', 1, 1, 1, '2016-08-23 09:26:17', '2016-08-23 09:26:17', 23, 13, 1, 2),
(94, 'Zapatos casuales', '1471977772.jpg', '0000111111111', '0000111111111', 4, 25.00, 43.00, '1471977772.jpg', 'Zapatos casuales', 0, 1, 1, '2016-08-23 23:42:52', '2016-10-26 18:04:09', 34, 12, 1, 7),
(95, 'Calzado sneakers ', '1471977857.jpg', '998888998899898', '998888998899898', 2, 15.00, 55.00, '1471977857.jpg', 'Zapatos sneakers', 0, 1, 1, '2016-08-23 23:44:17', '2016-10-29 03:29:05', 35, 1, 1, 7),
(96, 'Zapatos sneakers', '1471977979.jpg', '7676767676676', '7676767676676', 5, 15.00, 35.99, '1471977979.jpg', 'Zapatos sneakers', 1, 1, 1, '2016-08-23 23:46:20', '2016-08-23 23:46:20', 1, 1, 1, 7),
(97, 'Abrigo para mujer', '1471979738.jpg', '56563545246387', '56563545246387', 8, 15.00, 29.99, '1471979738.jpg', 'Abrigos con estilo', 1, 1, 1, '2016-08-24 00:15:38', '2016-10-29 19:24:46', 24, 1, 1, 2),
(98, 'Abrigos sin cuello para mujer ', '1471979854.jpg', '333322223232323', '333322223232323', 5, 15.00, 35.99, '1471979854.jpg', 'Abrigos sin cuello', 1, 1, 1, '2016-08-24 00:17:34', '2016-08-25 19:23:41', 24, 1, 1, 2),
(99, 'Abrigos para mujer', '1471979892.jpg', '656454651208357', '656454651208357', 6, 15.00, 35.99, '1471979892.jpg', 'Abrigos para mujer', 1, 1, 1, '2016-08-24 00:18:12', '2016-08-24 00:18:12', 24, 1, 1, 2),
(100, 'Vestido azul de niña', '1472078400.jpg', '333333333344444', '333333333344444', 12, 15.50, 29.99, '1472078400.jpg', 'Vestido de niña', 1, 1, 1, '2016-08-24 03:44:41', '2016-11-03 16:53:38', 18, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_numbersizes`
--

CREATE TABLE `products_numbersizes` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `numbersizes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products_numbersizes`
--

INSERT INTO `products_numbersizes` (`id`, `products_id`, `numbersizes_id`) VALUES
(1, 94, 2),
(2, 94, 3),
(3, 94, 5),
(4, 94, 6),
(5, 95, 2),
(6, 95, 3),
(7, 96, 5),
(8, 96, 6),
(35, 100, 1),
(36, 1, 1),
(37, 1, 2),
(38, 1, 3),
(39, 1, 5),
(40, 46, 2),
(41, 46, 3),
(42, 46, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`) VALUES
(3, 58, 1),
(4, 58, 2),
(5, 58, 3),
(6, 58, 4),
(7, 60, 1),
(8, 60, 2),
(9, 60, 3),
(10, 60, 4),
(11, 61, 1),
(12, 61, 2),
(13, 61, 3),
(14, 61, 4),
(15, 63, 1),
(16, 63, 2),
(17, 63, 3),
(18, 63, 4),
(19, 64, 1),
(20, 64, 2),
(21, 64, 3),
(22, 64, 4),
(23, 65, 1),
(24, 65, 2),
(25, 65, 3),
(26, 65, 4),
(27, 66, 1),
(28, 66, 2),
(29, 66, 3),
(30, 66, 4),
(31, 74, 1),
(32, 74, 2),
(33, 74, 3),
(34, 74, 4),
(35, 75, 1),
(36, 75, 2),
(37, 75, 3),
(38, 76, 1),
(39, 76, 2),
(40, 76, 3),
(41, 77, 2),
(42, 77, 3),
(43, 77, 4),
(44, 78, 3),
(45, 78, 4),
(46, 79, 2),
(47, 79, 3),
(48, 80, 1),
(49, 80, 2),
(50, 81, 1),
(51, 81, 2),
(52, 82, 1),
(53, 82, 2),
(54, 82, 3),
(55, 83, 2),
(56, 83, 3),
(57, 84, 2),
(58, 84, 3),
(59, 85, 2),
(60, 85, 3),
(61, 86, 3),
(62, 86, 4),
(63, 87, 2),
(64, 87, 3),
(65, 88, 2),
(66, 88, 3),
(67, 89, 2),
(68, 89, 3),
(69, 89, 4),
(70, 90, 1),
(71, 90, 2),
(72, 90, 3),
(73, 90, 4),
(74, 92, 2),
(75, 92, 3),
(76, 93, 1),
(77, 97, 1),
(78, 97, 2),
(79, 97, 3),
(80, 98, 2),
(81, 98, 3),
(106, 100, 1),
(107, 99, 2),
(108, 99, 3),
(109, 1, 1),
(110, 1, 2),
(111, 1, 3),
(112, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedors`
--

CREATE TABLE `proveedors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_compania` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ruc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fecharegistro` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `codigopostal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `pagweb` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `prov_id` int(10) UNSIGNED NOT NULL,
  `isactive_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedors`
--

INSERT INTO `proveedors` (`id`, `nom_compania`, `ruc`, `telefono`, `celular`, `fax`, `fecharegistro`, `direccion`, `codigopostal`, `email`, `pagweb`, `observacion`, `logo`, `country_id`, `prov_id`, `isactive_id`, `created_at`, `updated_at`) VALUES
(1, 'Jeans company', '1234567890123', '2204535', '0979262364', '0978627289', '', '', '1232', 'jeanscompany@gmail.com', 'www.jeancompany.com.ec', '', 'http://waterbuckpump.com/wp-content/uploads/2013/12/jeans-logo.jpg', 1, 15, 1, '2016-06-07 10:00:00', '2016-06-07 10:00:00'),
(2, 'Ovins company', '1234567890124', '2204544', '0979262444', '0978627444', '', '', '1233', 'ovinscompany@gmail.com', 'www.ovinscompany.com.ec', '', '', 1, 15, 1, '2016-06-07 10:00:00', '2016-06-07 10:00:00'),
(3, 'Venus corporation', '1234123412340', '2202250', '0979262364', '2202250', '', 'Davila Chica y cesar cueva', '0987', 'venuscorporation@gmail.com', 'venuscorporation.com', 'Distrib', '', 1, 9, 2, NULL, NULL),
(5, 'chomp''s corporation', '09876543277', '2203477', '0979262377', '2202277', '', 'Davila Chica y cesar cuevax', '9897', 'chomcorp@gmail.com', 'comcorpx.com.ec', 'chompas de lana', '', 1, 24, 1, NULL, NULL),
(7, 'CONFETEXA', '098765432765', '2203444', '0979262364', '2202277', '', 'Londrees', '0988', 'andrestigre69@gmail.com', 'contefexa.com.mx', '', 'http://fabricantes.gamarra.com.pe/wp-content/uploads/2015/10/logo.jpg', 3, 24, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `prov` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`id`, `prov`, `created_at`, `updated_at`) VALUES
(1, 'Carchi', NULL, NULL),
(2, 'Imbabura', NULL, NULL),
(3, 'Pichincha', NULL, NULL),
(4, 'Cotopaxi', NULL, NULL),
(5, 'Tungurahua', NULL, NULL),
(6, 'Bolívar', NULL, NULL),
(7, 'Chimborazo', NULL, NULL),
(8, 'Cañar', NULL, NULL),
(9, 'Azuay', NULL, NULL),
(10, 'Loja', NULL, NULL),
(11, 'Sto. Domingo de los Tsach', NULL, NULL),
(12, 'Sucumbíos', NULL, NULL),
(13, 'Napo', NULL, NULL),
(14, 'Pastaza', NULL, NULL),
(15, 'Orellana', NULL, NULL),
(16, 'Morona Santiago', NULL, NULL),
(17, 'Zamora Chinchipe', NULL, NULL),
(18, 'Esmeraldas', NULL, NULL),
(19, 'Manabí', NULL, NULL),
(20, 'Guayas', NULL, NULL),
(21, 'Los Ríos', NULL, NULL),
(22, 'El Oro', NULL, NULL),
(23, 'Santa Elena', NULL, NULL),
(24, 'Galápagos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `numfactura` varchar(11) NOT NULL,
  `claveacceso` varchar(50) NOT NULL DEFAULT '0',
  `gen_xml` tinyint(1) NOT NULL DEFAULT '0',
  `fir_xml` tinyint(1) NOT NULL DEFAULT '0',
  `aut_xml` tinyint(1) NOT NULL DEFAULT '0',
  `convrt_ride` tinyint(1) NOT NULL DEFAULT '0',
  `send_xml` tinyint(1) NOT NULL DEFAULT '0',
  `send_pdf` tinyint(1) NOT NULL,
  `num_autoriz` char(45) NOT NULL,
  `fech_autoriz` char(45) NOT NULL,
  `estado_aprob` char(15) NOT NULL,
  `mensaje` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `pedido_id`, `numfactura`, `claveacceso`, `gen_xml`, `fir_xml`, `aut_xml`, `convrt_ride`, `send_xml`, `send_pdf`, `num_autoriz`, `fech_autoriz`, `estado_aprob`, `mensaje`) VALUES
(1, 43, '00000001', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(2, 45, '00000002', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(3, 48, '00000003', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(4, 49, '00000004', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(5, 50, '00000005', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(6, 51, '00000006', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(7, 52, '00000007', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(8, 53, '00000008', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(9, 54, '00000009', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(10, 55, '000000010', '0', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(11, 56, '000000011', '01092016010101887676554130900100000001161126701', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(12, 57, '000000012', '010920160101018876765541309001000000012660156241', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(13, 58, '000000013', '010920160101018876765541309001000000013118964991', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(14, 59, '000000014', '010920160101018876765541309001000000014793155891', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(15, 60, '000000015', '010920160101018876765541309001000000015473515211', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(16, 61, '000000016', '010920160101018876765541309001000000016541932371', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(17, 62, '000000017', '010920160101018876765541309001000000017315979971', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(18, 63, '000000018', '0109201601010188767655413090010000000188945846817', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(19, 64, '000000019', '0309201601010188767655413090010000000193219154410', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(20, 65, '000000020', '0309201601010188767655413090010000000207417287419', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 66, '000000021', '0309201601010188767655413090010000000213993362213', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(22, 67, '000000022', '0309201601010188767655413090010000000225974936411', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(23, 68, '000000023', '0509201601010188767655413090010000000234818213317', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(24, 69, '000000024', '0809201601010188767655413090010000000242937946612', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(25, 71, '000000025', '2209201601010511850900110010010000000259759273614', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(26, 72, '000000026', '2309201601010511850900110010010000000268294869713', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(27, 73, '000000027', '2309201601010511850900110010010000000278631547419', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(28, 74, '000000028', '2309201601010511850900110010010000000284257381919', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(29, 75, '000000029', '2309201601010511850900110010010000000291522563613', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(30, 76, '000000030', '2309201601010511850900110010010000000302491417917', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(31, 77, '000000031', '2309201601010511850900110010010000000312813615316', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(32, 78, '000000032', '2309201601010511850900110010010000000326334938918', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(33, 80, '000000033', '2209201601010511850900110010010000000331459423110', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(34, 81, '000000034', '2709201601010511850900110010010000000347114372315', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(35, 83, '000000035', '2709201601010511850900110010010000000352325898511', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(36, 84, '000000036', '2709201601010511850900110010010000000361999119711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(37, 85, '000000037', '2709201601010511850900110010010000000371433143610', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(38, 86, '000000038', '2709201601010511850900110010010000000387345265513', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(39, 87, '000000039', '2709201601010511850900110010010000000394759953711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(40, 88, '000000040', '2709201601010511850900110010010000000408745223817', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(41, 89, '000000041', '2709201601010511850900110010010000000417895418615', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(42, 90, '000000042', '2709201601010511850900110010010000000427998417711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(43, 91, '000000043', '2709201601010511850900110010010000000433628522115', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(44, 92, '000000044', '2709201601010511850900110010010000000443174931411', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(45, 93, '000000045', '2709201601010511850900110010010000000455679665917', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(46, 94, '000000046', '2709201601010511850900110010010000000462539439913', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(47, 95, '000000047', '2709201601010511850900110010010000000479389235516', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(48, 96, '000000048', '2709201601010511850900110010010000000487814119919', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(49, 97, '000000049', '2709201601010511850900110010010000000492323379815', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(50, 98, '000000050', '2709201601010511850900110010010000000505418188116', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(51, 99, '000000051', '2709201601010511850900110010010000000518474274917', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(52, 100, '000000052', '2709201601010511850900110010010000000521249739111', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(53, 101, '000000053', '2709201601010511850900110010010000000539673889911', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(54, 102, '000000054', '2809201601010511850900110010010000000542652615912', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(55, 103, '000000055', '2809201601010511850900110010010000000553769315113', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(56, 104, '000000056', '2809201601010511850900110010010000000564345434513', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(57, 105, '000000057', '2809201601010511850900110010010000000578399174712', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(58, 106, '000000058', '2809201601010511850900110010010000000582374656310', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(59, 107, '000000059', '2809201601010511850900110010010000000598711956813', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(60, 108, '000000060', '2809201601010511850900110010010000000605655867418', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(61, 109, '000000061', '2809201601010511850900110010010000000614314955611', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(62, 110, '000000062', '2809201601010511850900110010010000000625156438213', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(63, 111, '000000063', '2809201601010511850900110010010000000638665156213', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(64, 112, '000000064', '2809201601010511850900110010010000000642473681311', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(65, 113, '000000065', '2809201601010511850900110010010000000654512682711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(66, 114, '000000066', '2809201601010511850900110010010000000661926354117', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(67, 115, '000000067', '2809201601010511850900110010010000000671497884310', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(68, 116, '000000068', '2809201601010511850900110010010000000685489243811', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(69, 117, '000000069', '2809201601010511850900110010010000000693327777513', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(70, 118, '000000070', '2809201601010511850900110010010000000706246866311', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(71, 119, '000000071', '2909201601010511850900110010010000000718263432816', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(72, 120, '000000072', '2909201601010511850900110010010000000721892158817', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(73, 121, '000000073', '2909201601010511850900110010010000000734411374516', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(74, 122, '000000074', '2909201601010511850900110010010000000743645574313', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(75, 123, '000000075', '2909201601010511850900110010010000000754335952816', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(76, 124, '000000076', '2909201601010511850900110010010000000769169717215', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(77, 125, '000000077', '2909201601010511850900110010010000000777687155819', 0, 0, 0, 0, 0, 0, '2909201601107701051185090010000000770', '2016-09-29T11:08:14-05:00', 'AUTORIZADO', ''),
(78, 126, '000000078', '0210201601010511850900110010010000000786858825115', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(79, 127, '000000079', '0210201601010511850900110010010000000799134976711', 0, 0, 0, 0, 0, 0, '0210201601107901051185090010000000795', '2016-10-02T20:10:19-05:00', 'AUTORIZADO', ''),
(80, 128, '000000080', '0210201601010511850900110010010000000809773972410', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(81, 129, '000000081', '0210201601010511850900110010010000000811252338711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(82, 130, '000000082', '0210201601010511850900110010010000000828447252313', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(83, 131, '000000083', '0210201601010511850900110010010000000835448756419', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(84, 132, '000000084', '0210201601010511850900110010010000000842631343219', 0, 0, 0, 0, 0, 0, '0210201601108401051185090010000000842', '2016-10-02T21:26:32-05:00', 'AUTORIZADO', ''),
(85, 133, '000000085', '0210201601010511850900110010010000000859598238919', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(86, 134, '000000086', '0210201601010511850900110010010000000862295684216', 0, 0, 0, 0, 0, 0, '0210201601108601051185090010000000868', '2016-10-02T22:01:42-05:00', 'AUTORIZADO', ''),
(87, 135, '000000087', '0210201601010511850900110010010000000875326386116', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(88, 136, '000000088', '0210201601010511850900110010010000000885624766512', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(89, 137, '000000089', '0210201601010511850900110010010000000894335436619', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(90, 138, '000000090', '0210201601010511850900110010010000000907261354415', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(91, 139, '000000091', '0210201601010511850900110010010000000914437437114', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(92, 140, '000000092', '0210201601010511850900110010010000000921446942715', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(93, 141, '000000093', '0210201601010511850900110010010000000935836518516', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(94, 142, '000000094', '0210201601010511850900110010010000000941121354117', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(95, 143, '000000095', '0210201601010511850900110010010000000953859455110', 0, 0, 0, 0, 0, 0, '0210201601109501051185090010000000956', '2016-10-02T22:31:41-05:00', 'AUTORIZADO', ''),
(96, 144, '000000096', '0210201601010511850900110010010000000968119581918', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(97, 145, '000000097', '0210201601010511850900110010010000000979371198819', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(98, 146, '000000098', '0210201601010511850900110010010000000981687757113', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(99, 147, '000000099', '0210201601010511850900110010010000000999216988911', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(100, 148, '000000100', '0210201601010511850900110010010000001007181461515', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(101, 149, '000000101', '0210201601010511850900110010010000001016812539812', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(102, 150, '000000102', '0210201601010511850900110010010000001023395359217', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(103, 151, '000000103', '0210201601010511850900110010010000001037936568915', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(104, 152, '000000104', '0210201601010511850900110010010000001041436253311', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(105, 153, '000000105', '0210201601010511850900110010010000001053848461911', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(106, 154, '000000106', '0210201601010511850900110010010000001066994371412', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(107, 155, '000000107', '0210201601010511850900110010010000001078223485112', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(108, 156, '000000108', '0210201601010511850900110010010000001089825283318', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(109, 157, '000000109', '0210201601010511850900110010010000001096928643718', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(110, 158, '000000110', '0310201601010511850900110010010000001109225584417', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(111, 159, '000000111', '0310201601010511850900110010010000001114198449719', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(112, 160, '000000112', '0310201601010511850900110010010000001124128426318', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(113, 161, '000000113', '0310201601010511850900110010010000001137355527214', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(114, 162, '000000114', '0310201601010511850900110010010000001144149885216', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(115, 163, '000000115', '0310201601010511850900110010010000001153841987311', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(116, 164, '000000116', '0310201601010511850900110010010000001164272682215', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(117, 165, '000000117', '0310201601010511850900110010010000001173143529711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(118, 166, '000000118', '0310201601010511850900110010010000001183368166514', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(119, 167, '000000119', '0310201601010511850900110010010000001198866164615', 0, 0, 0, 0, 0, 0, '0310201601111901051185090010000001199', '2016-10-03T11:29:53-05:00', 'AUTORIZADO', ''),
(120, 168, '000000120', '0310201601010511850900110010010000001202892488116', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(121, 169, '000000121', '0310201601010511850900110010010000001211219467610', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(122, 170, '000000122', '0310201601010511850900110010010000001222139494619', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(123, 171, '000000123', '0310201601010511850900110010010000001236962289711', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(124, 172, '000000124', '0310201601010511850900110010010000001242839289510', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(125, 173, '000000125', '0310201601010511850900110010010000001257558841416', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(126, 174, '000000126', '0310201601010511850900110010010000001266684467715', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(127, 175, '000000127', '0310201601010511850900110010010000001279189214112', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(128, 176, '000000128', '0310201601010511850900110010010000001281162924716', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(129, 177, '000000129', '0310201601010511850900110010010000001291811345319', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(130, 178, '000000130', '0310201601010511850900110010010000001305848275516', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(131, 179, '000000131', '0310201601010511850900110010010000001315454669913', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(132, 180, '000000132', '0310201601010511850900110010010000001322139326117', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(133, 181, '000000133', '0310201601010511850900110010010000001335414236918', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(134, 182, '000000134', '0310201601010511850900110010010000001343971124513', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(135, 183, '000000135', '0310201601010511850900110010010000001358532739215', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(136, 184, '000000136', '0310201601010511850900110010010000001366711727214', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(137, 185, '000000137', '0310201601010511850900110010010000001379873294715', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(138, 186, '000000138', '0310201601010511850900110010010000001385758614511', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(139, 187, '000000139', '0310201601010511850900110010010000001391235836918', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(140, 188, '000000140', '0310201601010511850900110010010000001409529393514', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(141, 189, '000000141', '0310201601010511850900110010010000001416123157719', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(142, 190, '000000142', '0310201601010511850900110010010000001423558964213', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(143, 191, '000000143', '0310201601010511850900110010010000001436371847617', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(144, 192, '000000144', '0310201601010511850900110010010000001448612297913', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(145, 193, '000000145', '0310201601010511850900110010010000001456589975316', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(146, 194, '000000146', '0310201601010511850900110010010000001468678532418', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(147, 195, '000000147', '0310201601010511850900110010010000001478999192517', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(148, 196, '000000148', '0310201601010511850900110010010000001488526269917', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(149, 197, '000000149', '0310201601010511850900110010010000001496318891615', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(150, 198, '000000150', '0310201601010511850900110010010000001508889811412', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(151, 199, '000000151', '0310201601010511850900110010010000001516693796914', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(152, 200, '000000152', '0310201601010511850900110010010000001522563433615', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(153, 201, '000000153', '0310201601010511850900110010010000001532627229117', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(154, 202, '000000154', '0310201601010511850900110010010000001549718963115', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(155, 203, '000000155', '0310201601010511850900110010010000001554481113311', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(156, 204, '000000156', '0310201601010511850900110010010000001562123149615', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(157, 205, '000000157', '0310201601010511850900110010010000001575976475614', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(158, 206, '000000158', '0310201601010511850900110010010000001581639628514', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(159, 207, '000000159', '0310201601010511850900110010010000001593466581418', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(160, 208, '000000160', '0310201601010511850900110010010000001601871784817', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(161, 209, '000000161', '0310201601010511850900110010010000001617852531316', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(162, 210, '000000162', '0310201601010511850900110010010000001622188824411', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(163, 211, '000000163', '0310201601010511850900110010010000001637466985214', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(164, 212, '000000164', '0310201601010511850900110010010000001642273487318', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(165, 213, '000000165', '0310201601010511850900110010010000001653798531115', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(166, 214, '000000166', '0310201601010511850900110010010000001666535746111', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(167, 215, '000000167', '0310201601010511850900110010010000001679285158515', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(168, 216, '000000168', '0310201601010511850900110010010000001684697448910', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(169, 217, '000000169', '0310201601010511850900110010010000001693726613410', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(170, 218, '000000170', '0310201601010511850900110010010000001702236454917', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(171, 219, '000000171', '0310201601010511850900110010010000001716622369518', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(172, 220, '000000172', '0310201601010511850900110010010000001729578916111', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(173, 221, '000000173', '0310201601010511850900110010010000001739295659612', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(174, 222, '000000174', '0310201601010511850900110010010000001748478367318', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(175, 223, '000000175', '0310201601010511850900110010010000001755312322312', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(176, 224, '000000176', '0310201601010511850900110010010000001761849117316', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(177, 225, '000000177', '0310201601010511850900110010010000001777122923917', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(178, 226, '000000178', '0310201601010511850900110010010000001784423472712', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(179, 227, '000000179', '0310201601010511850900110010010000001791957676311', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(180, 228, '000000180', '0310201601010511850900110010010000001804953528817', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(181, 229, '000000181', '0310201601010511850900110010010000001813322451511', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(182, 230, '000000182', '0310201601010511850900110010010000001822833979813', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(183, 231, '000000183', '0310201601010511850900110010010000001831115637113', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(184, 232, '000000184', '0310201601010511850900110010010000001843514563512', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(185, 233, '000000185', '0310201601010511850900110010010000001855787379712', 1, 0, 1, 1, 0, 0, '0310201601118501051185090010000001854', '2016-10-03T21:20:07-05:00', 'AUTORIZADO', ''),
(186, 234, '000000186', '0310201601010511850900110010010000001863671985316', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(187, 235, '000000187', '0310201601010511850900110010010000001879684444717', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(188, 236, '000000188', '0310201601010511850900110010010000001881198655311', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(189, 237, '000000189', '0310201601010511850900110010010000001893179954711', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(190, 238, '000000190', '0310201601010511850900110010010000001908723847816', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(191, 239, '000000191', '0310201601010511850900110010010000001913851846613', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(192, 240, '000000192', '0310201601010511850900110010010000001923154363618', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(193, 241, '000000193', '0310201601010511850900110010010000001931662225312', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(194, 242, '000000194', '0310201601010511850900110010010000001941142953515', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(195, 243, '000000195', '0310201601010511850900110010010000001951197985217', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(196, 244, '000000196', '0310201601010511850900110010010000001966613122115', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(197, 245, '000000197', '0310201601010511850900110010010000001972296753511', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(198, 246, '000000198', '0410201601010511850900110010010000001982587424213', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(199, 247, '000000199', '0410201601010511850900110010010000001999343853317', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(200, 248, '000000200', '0410201601010511850900110010010000002004511663318', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(201, 249, '000000201', '0410201601010511850900110010010000002013426325119', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(202, 250, '000000202', '0410201601010511850900110010010000002026837498914', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(203, 251, '000000203', '0410201601010511850900110010010000002036319167810', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(204, 252, '000000204', '0410201601010511850900110010010000002043459623715', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(205, 253, '000000205', '0410201601010511850900110010010000002051934221212', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(206, 254, '000000206', '0410201601010511850900110010010000002062418577517', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(207, 255, '000000207', '0410201601010511850900110010010000002071192586118', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(208, 256, '000000208', '0410201601010511850900110010010000002089529369110', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(209, 257, '000000209', '0410201601010511850900110010010000002092563768319', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(210, 258, '000000210', '0410201601010511850900110010010000002103786127211', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(211, 259, '000000211', '0410201601010511850900110010010000002119887357813', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(212, 260, '000000212', '0410201601010511850900110010010000002127796542610', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(213, 261, '000000213', '0410201601010511850900110010010000002137486397810', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(214, 262, '000000214', '0410201601010511850900110010010000002143516371412', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(215, 263, '000000215', '0410201601010511850900110010010000002155214877714', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(216, 264, '000000216', '0410201601010511850900110010010000002163117296114', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(217, 266, '000000217', '0410201601010511850900110010010000002174855873314', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(218, 267, '000000218', '0410201601010511850900110010010000002181599488511', 1, 1, 1, 1, 0, 0, '0410201601121801051185090010000002185', '2016-10-04T07:43:29-05:00', 'AUTORIZADO', ''),
(219, 268, '000000219', '0610201601010511850900110010010000002196613321611', 1, 1, 1, 1, 0, 0, '0610201601121901051185090010000002197', '2016-10-06T11:47:10-05:00', 'AUTORIZADO', ''),
(220, 269, '000000220', '0610201601010511850900110010010000002203589358319', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(221, 270, '000000221', '0610201601010511850900110010010000002213474426316', 1, 0, 1, 1, 1, 1, '0610201601122101051185090010000002216', '2016-10-06T12:21:56-05:00', 'AUTORIZADO', ''),
(222, 271, '000000222', '0610201601010511850900110010010000002229598539414', 1, 0, 1, 0, 0, 0, '', '', '', ''),
(223, 272, '000000223', '0610201601010511850900110010010000002235263984715', 1, 0, 1, 1, 0, 0, '0610201601122301051185090010000002231', '2016-10-06T12:31:41-05:00', 'AUTORIZADO', ''),
(224, 273, '000000224', '0610201601010511850900110010010000002245597759319', 1, 0, 1, 1, 0, 0, '0610201601122401051185090010000002244', '2016-10-06T12:51:00-05:00', 'AUTORIZADO', ''),
(225, 274, '000000225', '0610201601010511850900110010010000002255843219618', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(226, 275, '000000226', '0610201601010511850900110010010000002265459446319', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(227, 276, '000000227', '0610201601010511850900110010010000002275244282310', 1, 0, 1, 1, 1, 1, '0610201601122701051185090010000002272', '2016-10-06T15:49:47-05:00', 'AUTORIZADO', ''),
(228, 277, '000000228', '0610201601010511850900110010010000002289732431512', 1, 1, 1, 1, 0, 0, '', '', '', ''),
(229, 278, '000000229', '0610201601010511850900110010010000002298916765412', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(230, 279, '000000230', '0610201601010511850900110010010000002305696156319', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(231, 280, '000000231', '0610201601010511850900110010010000002315735613612', 1, 0, 1, 1, 1, 1, '0610201601123101051185090010000002317', '2016-10-06T16:19:06-05:00', 'AUTORIZADO', ''),
(232, 281, '000000232', '0610201601010511850900110010010000002323615625911', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(233, 282, '000000233', '0610201601010511850900110010010000002332832166312', 1, 0, 1, 1, 1, 1, '0610201601123301051185090010000002332', '2016-10-06T19:59:51-05:00', 'AUTORIZADO', ''),
(234, 283, '000000234', '0610201601010511850900110010010000002348169586918', 1, 0, 1, 1, 1, 1, '0610201601123401051185090010000002345', '2016-10-06T20:11:14-05:00', 'AUTORIZADO', ''),
(235, 284, '000000235', '0610201601010511850900110010010000002359885932519', 1, 0, 1, 1, 1, 1, '0610201601123501051185090010000002358', '2016-10-06T20:37:00-05:00', 'AUTORIZADO', ''),
(236, 285, '000000236', '0610201601010511850900110010010000002369996556910', 1, 0, 1, 1, 1, 1, '0610201601123601051185090010000002360', '2016-10-06T20:51:48-05:00', 'AUTORIZADO', ''),
(237, 286, '000000237', '0610201601010511850900110010010000002373585937813', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(238, 287, '000000238', '0610201601010511850900110010010000002385496438410', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(239, 288, '000000239', '0610201601010511850900110010010000002395432919917', 1, 0, 1, 1, 1, 1, '0610201601123901051185090010000002399', '2016-10-06T21:06:33-05:00', 'AUTORIZADO', ''),
(240, 289, '000000240', '0610201601010511850900110010010000002406193578918', 1, 1, 1, 1, 1, 1, '0610201601124001051185090010000002405', '2016-10-06T22:19:59-05:00', 'AUTORIZADO', ''),
(241, 290, '000000241', '0710201601010511850900110010010000002417519521519', 1, 1, 1, 1, 1, 1, '0710201601124101051185090010000002412', '2016-10-07T09:09:40-05:00', 'AUTORIZADO', ''),
(242, 291, '000000242', '0710201601010511850900110010010000002425845757312', 1, 1, 1, 1, 1, 1, '0710201601124201051185090010000002425', '2016-10-07T17:19:59-05:00', 'AUTORIZADO', ''),
(243, 292, '000000243', '1010201601010511850900110010010000002431919932911', 1, 1, 1, 1, 1, 1, '1010201601124301051185090010000002431', '2016-10-10T09:20:34-05:00', 'AUTORIZADO', ''),
(244, 293, '000000244', '1010201601010511850900110010010000002444211356613', 1, 0, 1, 1, 1, 1, '1010201601124401051185090010000002442', '2016-10-10T09:28:24-05:00', 'AUTORIZADO', ''),
(249, 245, '000000246', '1010201601010511850900110010010000002465551882211', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(259, 296, '000000246', '1010201601010511850900110010010000002463265753515', 1, 1, 1, 1, 1, 1, '1010201601124601051185090010000002468', '2016-10-10T14:00:09-05:00', 'AUTORIZADO', ''),
(260, 297, '000000247', '1010201601010511850900110010010000002471391757812', 1, 1, 1, 1, 0, 1, '1010201601124701051185090010000002470', '2016-10-10T16:05:40-05:00', 'AUTORIZADO', ''),
(261, 298, '000000248', '1010201601010511850900110010010000002489418768516', 1, 1, 1, 1, 1, 1, '1010201601124801051185090010000002483', '2016-10-10T16:11:07-05:00', 'AUTORIZADO', ''),
(262, 299, '000000249', '1010201601010511850900110010010000002497377266317', 1, 1, 1, 1, 1, 1, '1010201601124901051185090010000002496', '2016-10-10T16:30:53-05:00', 'AUTORIZADO', ''),
(263, 306, '000000250', '1310201601010511850900110010010000002509346387411', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(264, 307, '000000251', '1310201601010511850900110010010000002513281625811', 1, 0, 1, 1, 1, 1, '1310201601125101051185090010000002519', '2016-10-13T10:42:20-05:00', 'AUTORIZADO', ''),
(265, 308, '000000252', '1310201601010511850900110010010000002521121157318', 1, 0, 1, 1, 1, 1, '1310201601125201051185090010000002521', '2016-10-13T10:59:30-05:00', 'AUTORIZADO', ''),
(266, 309, '000000253', '1310201601010511850900110010010000002538982721613', 1, 1, 0, 0, 0, 0, '', '', '', ''),
(267, 310, '000000254', '1310201601010511850900110010010000002548458444616', 1, 0, 1, 1, 1, 1, '1310201601125401051185090010000002547', '2016-10-13T11:11:06-05:00', 'AUTORIZADO', ''),
(268, 311, '000000255', '1310201601010511850900110010010000002552415835716', 1, 1, 1, 1, 1, 1, '1310201601125501051185090010000002551', '2016-10-13T11:14:23-05:00', 'AUTORIZADO', ''),
(269, 205, '000000256', '1310201601010511850900110010010000002569597557910', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(270, 312, '000000257', '1310201601010511850900110010010000002575852953116', 1, 1, 1, 1, 1, 1, '1310201601125701051185090010000002575', '2016-10-13T11:34:11-05:00', 'AUTORIZADO', ''),
(271, 317, '000000258', '1710201601010511850900110010010000002586678584319', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(272, 271, '000000259', '1810201601010511850900110010010000002599364517713', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(273, 271, '000000260', '1810201601010511850900110010010000002602352471816', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(274, 318, '000000261', '1810201601010511850900110010010000002612554467417', 1, 1, 1, 1, 1, 1, '1810201601126101051185090010000002612', '2016-10-18T07:44:02-05:00', 'AUTORIZADO', ''),
(275, 271, '000000262', '1810201601010511850900110010010000002629482612611', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(276, 319, '000000263', '1810201601010511850900110010010000002633963667816', 1, 1, 1, 1, 1, 1, '1810201601126301051185090010000002638', '2016-10-18T08:01:02-05:00', 'AUTORIZADO', ''),
(277, 320, '000000264', '1810201601010511850900110010010000002646465635111', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(278, 321, '000000265', '1810201601010511850900110010010000002654122393913', 1, 1, 1, 1, 1, 1, '1810201601126501051185090010000002653', '2016-10-18T21:11:14-05:00', 'AUTORIZADO', ''),
(279, 322, '000000266', '1810201601010511850900110010010000002668564161818', 1, 0, 0, 0, 0, 0, '', '', '', ''),
(280, 322, '000000267', '1810201601010511850900110010010000002672723712216', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(281, 322, '000000268', '1810201601010511850900110010010000002688649875918', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(282, 322, '000000269', '1810201601010511850900110010010000002691477539814', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(283, 323, '000000270', '1810201601010511850900110010010000002704174939911', 1, 1, 1, 1, 1, 1, '1810201601127001051185090010000002700', '2016-10-18T22:10:58-05:00', 'AUTORIZADO', ''),
(284, 324, '000000271', '1910201601010511850900110010010000002712122899811', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(285, 325, '000000272', '1910201601010511850900110010010000002727142756313', 1, 1, 1, 1, 1, 1, '1910201601127201051185090010000002720', '2016-10-19T07:41:36-05:00', 'AUTORIZADO', ''),
(286, 326, '000000273', '1910201601010511850900110010010000002734491883213', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(287, 327, '000000274', '1910201601010511850900110010010000002743514169512', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(288, 328, '000000275', '1910201601010511850900110010010000002751321442710', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(289, 329, '000000276', '1910201601010511850900110010010000002766913411610', 1, 1, 1, 1, 1, 1, '1910201601127601051185090010000002761', '2016-10-19T07:56:56-05:00', 'AUTORIZADO', ''),
(290, 330, '000000277', '1910201601010511850900110010010000002773214327619', 1, 1, 1, 1, 1, 1, '1910201601127701051185090010000002774', '2016-10-19T08:03:27-05:00', 'AUTORIZADO', ''),
(291, 331, '000000278', '1910201601010511850900110010010000002786918117916', 1, 1, 1, 1, 1, 1, '1910201601127801051185090010000002787', '2016-10-19T08:08:44-05:00', 'AUTORIZADO', ''),
(292, 332, '000000279', '1910201601010511850900110010010000002795137971112', 1, 1, 1, 1, 1, 1, '1910201601127901051185090010000002791', '2016-10-19T08:19:23-05:00', 'AUTORIZADO', ''),
(293, 333, '000000280', '1910201601010511850900110010010000002806126626611', 1, 1, 1, 1, 1, 1, '1910201601128001051185090010000002806', '2016-10-19T09:30:42-05:00', 'AUTORIZADO', ''),
(294, 334, '000000281', '1910201601010511850900110010010000002811527724812', 1, 1, 1, 1, 1, 1, '1910201601128101051185090010000002819', '2016-10-19T10:25:55-05:00', 'AUTORIZADO', ''),
(295, 335, '000000282', '1910201601010511850900110010010000002827838614615', 1, 1, 1, 1, 1, 1, '1910201601128201051185090010000002821', '2016-10-19T10:38:59-05:00', 'AUTORIZADO', ''),
(296, 336, '000000283', '1910201601010511850900110010010000002831228685917', 1, 1, 1, 1, 1, 1, '1910201601128301051185090010000002834', '2016-10-19T11:33:02-05:00', 'AUTORIZADO', ''),
(297, 337, '000000284', '1910201601010511850900110010010000002844224771910', 1, 1, 1, 1, 1, 1, '1910201601128401051185090010000002847', '2016-10-19T11:43:37-05:00', 'AUTORIZADO', ''),
(298, 338, '000000285', '1910201601010511850900110010010000002855124845617', 1, 1, 1, 1, 1, 1, '1910201601128501051185090010000002851', '2016-10-19T11:51:40-05:00', 'AUTORIZADO', ''),
(299, 339, '000000286', '1910201601010511850900110010010000002862688642216', 1, 1, 1, 1, 1, 1, '1910201601128601051185090010000002862', '2016-10-19T12:01:57-05:00', 'AUTORIZADO', ''),
(300, 340, '000000287', '1910201601010511850900110010010000002879115957913', 1, 1, 1, 1, 1, 1, '1910201601128701051185090010000002875', '2016-10-19T12:11:13-05:00', 'AUTORIZADO', ''),
(301, 341, '000000288', '1910201601010511850900110010010000002887913648612', 1, 1, 1, 1, 1, 1, '1910201601128801051185090010000002888', '2016-10-19T12:21:00-05:00', 'AUTORIZADO', ''),
(302, 342, '000000289', '1910201601010511850900110010010000002895424427614', 1, 1, 1, 1, 1, 1, '1910201601128901051185090010000002890', '2016-10-19T12:24:56-05:00', 'AUTORIZADO', ''),
(303, 344, '000000290', '1910201601010511850900110010010000002903727761617', 1, 1, 1, 1, 1, 1, '1910201601129001051185090010000002907', '2016-10-19T12:34:11-05:00', 'AUTORIZADO', ''),
(304, 345, '000000291', '1910201601010511850900110010010000002915857582518', 1, 1, 1, 1, 1, 1, '1910201601129101051185090010000002911', '2016-10-19T12:36:55-05:00', 'AUTORIZADO', ''),
(305, 350, '000000292', '2010201601010511850900110010010000002922541777510', 1, 1, 1, 1, 1, 1, '2010201601129201051185090010000002925', '2016-10-20T08:37:02-05:00', 'AUTORIZADO', ''),
(306, 351, '000000293', '2010201601010511850900110010010000002935285786714', 1, 1, 1, 1, 1, 1, '2010201601129301051185090010000002938', '2016-10-20T11:18:45-05:00', 'AUTORIZADO', ''),
(307, 352, '000000294', '2010201601010511850900110010010000002948171737114', 1, 1, 1, 1, 1, 1, '2010201601129401051185090010000002940', '2016-10-20T11:21:18-05:00', 'AUTORIZADO', ''),
(308, 353, '000000295', '2010201601010511850900110010010000002951981457811', 1, 1, 1, 1, 1, 1, '2010201601129501051185090010000002953', '2016-10-20T11:24:12-05:00', 'AUTORIZADO', ''),
(309, 354, '000000296', '2010201601010511850900110010010000002967642433417', 1, 1, 1, 1, 1, 1, '2010201601129601051185090010000002966', '2016-10-20T11:28:40-05:00', 'AUTORIZADO', ''),
(310, 355, '000000297', '2110201601010511850900110010010000002978935214414', 1, 1, 1, 1, 1, 1, '2110201601129701051185090010000002973', '2016-10-21T08:57:59-05:00', 'AUTORIZADO', ''),
(311, 356, '000000298', '2110201601010511850900110010010000002986167324811', 1, 1, 1, 1, 1, 1, '2110201601129801051185090010000002986', '2016-10-21T10:04:36-05:00', 'AUTORIZADO', ''),
(312, 357, '000000299', '2110201601010511850900110010010000002993744382111', 1, 1, 1, 1, 1, 1, '2110201601129901051185090010000002999', '2016-10-21T10:08:20-05:00', 'AUTORIZADO', ''),
(313, 358, '000000300', '2110201601010511850900110010010000003005723471412', 1, 1, 1, 1, 1, 1, '2110201601130001051185090010000003000', '2016-10-21T10:12:01-05:00', 'AUTORIZADO', ''),
(314, 359, '000000301', '2110201601010511850900110010010000003013752274319', 1, 1, 1, 1, 1, 1, '2110201601130101051185090010000003013', '2016-10-21T21:27:29-05:00', 'AUTORIZADO', ''),
(315, 360, '000000302', '2110201601010511850900110010010000003025479364510', 1, 1, 1, 1, 1, 1, '2110201601130201051185090010000003026', '2016-10-21T21:33:22-05:00', 'AUTORIZADO', ''),
(316, 361, '000000303', '2610201601010511850900110010010000003039975967717', 1, 1, 1, 1, 1, 1, '2610201601130301051185090010000003031', '2016-10-26T08:04:37-05:00', 'AUTORIZADO', ''),
(317, 362, '000000304', '2710201601010511850900110010010000003048391446816', 1, 1, 1, 1, 1, 1, '2710201601130401051185090010000003049', '2016-10-27T13:46:36-05:00', 'AUTORIZADO', ''),
(318, 363, '000000305', '2810201601010511850900110010010000003056327322914', 1, 1, 0, 0, 0, 0, '', '', '', ''),
(319, 318, '000000306', '2810201601010511850900110010010000003063165348619', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(320, 318, '000000307', '2810201601010511850900110010010000003078691617419', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(321, 318, '000000308', '2810201601010511850900110010010000003083454322319', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(322, 318, '000000309', '2810201601010511850900110010010000003092572114312', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(323, 318, '000000310', '2810201601010511850900110010010000003109624628212', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(324, 318, '000000311', '2810201601010511850900110010010000003116616847610', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(325, 364, '000000312', '2810201601010511850900110010010000003122157291310', 1, 1, 1, 1, 1, 1, '2810201601131201051185090010000003129', '2016-10-28T17:30:45-05:00', 'AUTORIZADO', ''),
(326, 365, '000000313', '2810201601010511850900110010010000003134295858516', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(327, 365, '000000314', '2810201601010511850900110010010000003145795122712', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(328, 365, '000000315', '2810201601010511850900110010010000003153855525113', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(329, 366, '000000316', '2810201601010511850900110010010000003161984995714', 1, 1, 1, 1, 1, 1, '2810201601131601051185090010000003161', '2016-10-28T17:52:11-05:00', 'AUTORIZADO', ''),
(330, 365, '000000317', '2810201601010511850900110010010000003173742146915', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(331, 367, '000000318', '2810201601010511850900110010010000003181975216215', 1, 1, 1, 1, 1, 1, '2810201601131801051185090010000003185', '2016-10-28T18:08:35-05:00', 'AUTORIZADO', ''),
(332, 363, '000000319', '2810201601010511850900110010010000003195345771211', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(333, 318, '000000320', '2810201601010511850900110010010000003207941651515', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(334, 365, '000000321', '2810201601010511850900110010010000003214244248415', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(335, 368, '000000322', '2910201601010511850900110010010000003224968241919', 1, 1, 1, 1, 1, 1, '2910201601132201051185090010000003224', '2016-10-29T08:51:50-05:00', 'AUTORIZADO', ''),
(336, 369, '000000323', '2910201601010511850900110010010000003237988498813', 1, 1, 1, 1, 1, 1, '2910201601132301051185090010000003237', '2016-10-29T08:54:12-05:00', 'AUTORIZADO', ''),
(337, 370, '000000324', '2910201601010511850900110010010000003242517173111', 1, 1, 1, 1, 1, 1, '2910201601132401051185090010000003241', '2016-10-29T09:27:05-05:00', 'AUTORIZADO', ''),
(338, 371, '000000325', '2910201601010511850900110010010000003258353549311', 1, 1, 1, 1, 1, 1, '2910201601132501051185090010000003252', '2016-10-29T09:31:32-05:00', 'AUTORIZADO', ''),
(339, 372, '000000326', '0211201601010511850900110010010000003263763437716', 1, 1, 1, 0, 0, 0, '', '', '', ''),
(340, 373, '000000327', '0311201601010511850900110010010000003274678676716', 1, 1, 1, 1, 1, 1, '0311201601100100100000032701051185095', '2016-11-03T11:54:09-05:00', 'AUTORIZADO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `name`, `descripcion`) VALUES
(1, 'HOMBRES', 'Sección para articulos para varónes'),
(2, 'MUJERES', 'Sección para artículos de Mujer.'),
(3, 'NIÑOS', 'Sección para artículos de Niño.'),
(4, 'NIÑAS', 'Seccion para artículos de niñas.'),
(5, 'VÁRIOS', 'Sección para ários articulos'),
(6, 'ACCESORIOS', ''),
(7, 'CALZADO', ''),
(8, 'Comida', 'Sección de comida.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id` int(11) NOT NULL,
  `seguridad` varchar(45) DEFAULT NULL,
  `fechaconfig` char(10) DEFAULT NULL,
  `intentos_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id`, `seguridad`, `fechaconfig`, `intentos_id`) VALUES
(1, 'Default', NULL, 10),
(2, 'nuevo', NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `abreviatura` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `abreviatura`) VALUES
(1, 'Pequeño', 'S'),
(2, 'Mediano', 'M'),
(3, 'Grande', 'L'),
(4, 'Extra Grande', 'XL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `statu` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `statu`, `created_at`, `updated_at`) VALUES
(1, 'PENDIENTE', NULL, NULL),
(2, 'PAGADO', NULL, NULL),
(3, 'CANCELADO', NULL, NULL),
(4, 'PREPARACIÓN', NULL, NULL),
(5, 'ENVIADO', NULL, NULL),
(6, 'FINALIZADO', NULL, NULL),
(7, 'RECHAZADO', NULL, NULL),
(8, 'APROBADO', '2016-07-03 05:00:00', '2016-07-03 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(1, 'Tela jeans', 1),
(2, 'tela algodon', 1),
(3, 'tela', 1),
(4, 'tela', 1),
(5, 'tela', 1),
(6, 'tela', 1),
(7, 'tela', 1),
(8, 'tela', 1),
(9, 'tela', 1),
(10, 'tela', 2),
(11, 'tela', 2),
(12, 'tela', 2),
(13, 'tela', 2),
(14, 'tela', 2),
(15, 'tela', 2),
(16, 'tela', 2),
(17, 'tela', 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `subsections`
--
CREATE TABLE `subsections` (
`category_id` int(11)
,`Category` varchar(45)
,`sections_id` int(11)
,`Section` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `comfirm_token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` int(1) NOT NULL,
  `actividad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `comfirm_token`, `status`, `is_admin`, `created_at`, `updated_at`, `rol`, `actividad`) VALUES
(1, 'Christian', 'storelinect@gmail.com', '$2y$10$pFcukE4vmF4yyPOAmPxQweTvogPfnAUxhc7lJFLVu0tS09gP46xC2', 'iRJ5xAmPfx741f2cT1qCBD3IhiRkbsLCk2JkvV94LTxKquzrVjThVIgJBLah', '9rJDSLXaaYuGuxNUryxB7wcYnhiSQ1THWqyfVfcjNWbJyde6dnv8W3Dbjv5cTHyOckDzERMceLIHCuHhgPJqRkfpffX1E335QAyO9lQHp7EGcOlz1fm38HWTC8S4KE9mFJHWiCrtbhAXzyTbfuMXb1O4S7YP7YNmTM2rW1V3KRPzsWe43MRKeJA0etNAK40ZrY9ho1T2eCCr2uQiBosxvVnSiWliWdbh2Nu46klLau74hQPUSPt4sOw8tsQBFof', 1, 1, '2016-06-21 04:46:00', '2016-11-01 16:02:20', 1, '2016-10-28'),
(2, 'Christian', 'andrescondo17@gmail.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'ROQuVe8a5BH0zL1O5wMI5VDtiBY5rHhHnSZRnhpfbsLsAzJipyay2yQQzqID', 'zHP4INpjFUVjTJK41StFU1fITuDsmZmGjbregxkH66pssa6W8likDoCIs9w8KbGUFGFjIQgNAfKJ35mNqg8ZrATsfpjI13MWAxhluiaiBezDUU5heIJS5IFgU68t2NDa8ZC3IVNQvyvxQu3dV2ArYGa777SQsOJHEdY5sPyUY16lYkehkHnYgBeV6yVCGEeloXT2aYzQa4Pfrfm91R8iJ5jPYxAsO4Qk76Y2yk94vwdZNubFHcU7ZAMzejXTgna', 1, 1, '2016-06-21 04:47:26', '2016-10-28 22:15:46', 3, '2016-10-21'),
(3, 'Erika', 'naomi672@gmail.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'eClwSk4pkABY34BShWnzNBwHNqyOnRhJavT5SIrFXU1ppDGHRF3FKDtktXBy', 'XS088lYiYrPDd91P6Ijt0MyAsF3bUii1al4uDzrMaDRXXMwS7Ge4anKb0k7rahiCzJNu21n0srs8awwEjrJsIkZgVivpcFp39qmuXMHWbi8qkLzJizUo1ddIUrnnDfHPFLIeusya0GOnPeCwLUg1lfmka073J2kDOxBgunztohJUZeqwsKBeFG5sT5VwdoccFjlfHUQdB8pq3ci1jec3GZSWeN6PFFa2bfHvQOPe6jFosvdi6cl84lc7MJzbarx', 1, 0, '2016-06-29 20:23:45', '2016-10-29 19:21:39', 0, '2016-10-29'),
(4, 'Andres', 'andrestigre69@gmail.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'Q7VxvAaFp4BfUHwUk1RAVnKyCXsEZS7V0xq6DRbfbyiqY7nRCsGK7k81dEbL', '9AgnsZN78JZHBgpr5NwmzcV3Aeb70jKfOxxrtPqXEVvXkHRAgNvzNCNlXjKAW643jzY8CO3f18giHNnNAnnklGYAo315bO9vCT3z2iU6nZ2E9ijhjzlRqqsGDShHQiXI10sFYviWlmA2YGH8TAemI07EWTjT6YG1y22PeCqdCQdORwQPAUOthnNOlhtjPFGNl0rPJUdxKxU3faqan2G62REq6a3Uxp235pgDOgaf5oYARZrVpVINHFXT5BDPBF7', 1, 0, '2016-07-01 01:11:29', '2016-10-29 18:52:32', 0, '2016-10-29'),
(5, 'Jessica', 'nrodriguezjessy@gmail.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'yfRcA21trd07EcdPNPVrEPYBJX0EfDyi5WxkKYcnywvC4zCGoengiXdtWH2R', 'nk7NxvONUay3kUk53XZHy6Sph8I2w0Xlgs67X7j1LDF5naTCjaO99ob7OMsQZ77RZQw8R0URLbx8xNysf8ZFPrnHOixPkS1JPrmxgxrwXy5cr4vf15PlmJ3Jx4e8XZL8jcIqAo144tBCyVcc1IHQoDCR27MyZ6fYBMlof3t77iVMovNC9xGPJgWQrc5bTkol5CNHVDLqMs5jgDCLdn308WYoRygYDtPhFsbNeBPiPkd92CippJoixdD5F1LJdUn', 1, 0, '2016-07-01 11:12:00', '2016-10-29 19:30:25', 0, '2016-10-29'),
(6, 'silviavelez', 'silvia-patricia25@hotmail.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'IJ659k08hyJks8zyOWjuOaq4NBdIxF4Rrakkpxs43QFLTgcxjCjh5hg0jRh2', 'ecsI0Bs4p1I76V6ClqnzSSgQ3LWx3P7v1AliYEjmydHWH5MnuYoZNjNvUv2a9FAOMJIIekZLSVc4RlbeohzD8lnWig4FGY0xkCu56GHSC8a2gWJO6fAtMsHwwo4GEZ9zoqDodBv2onOVwL736a3Xw8KLTkTXYFQe0fY535fhaFWARTq3Svz4tgjSXvEPiBT45ZRuE0vNVQeGWoyL5M3S214mRTyxVdXzGj5wcLpJeTYKbAdqrPUbiBlQf7AmYIb', 1, 0, '2016-07-01 11:22:19', '2016-10-29 03:19:11', 0, '2016-10-29'),
(7, 'Axel', 'chantigre@sudamericano.edu.ec', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', '1dR4iiprqH6AYTZuVOMjzl0XVuveu4U0rTPlGDWHXgt8NGlg1Q8s0xVaOGUt', 'HlCrRKWfvyxV5fGp5dppleX7eHURjSSswXUV3hxo2UWD8MPWSticsV9yIF6PRoo519GqUtnCn6KydhOpygXty5OnURT5j9cYhGTKKVHMYG4ucEJj9ltkori1XNalDzMLiqanPoYaJUnv2oDpuokYjDW2OUAG37jPiFxOIA6tTfeLBXpe1kTtcvFPDQ3oFraOxSTA56Q7t3aWecOLCwy8KKFn4SCoKHCA6KZ5lvzWok6ytzzK4tV6Q3kDzCyFWpg', 1, 0, '2016-07-04 20:25:27', '2016-10-20 21:19:42', 0, '2016-10-20'),
(8, 'libia', 'lmrcondo@yahoo.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'rAzNppxVnqp25bYYa73iO36LPyvnalMDiI7XmZwt6pnazkhVGDqImc5nMhAB', 'ui8I3cSsiEyd1JtuGuUYW9lfqqA0psQsf4jy5VIPfUEmtsJu3B2VkyPNayO8vqTkgS1LjNnU1OhUqQydfdTGZ6xLdQvy4Q2F3FFHSvXtK5VnN3Su3OfQrci7ibq6AEKz7BUVxLHgoG7anacHoNauE6SAEZ96QaNuvz2Nhd0ZiKkHDhAmd1MejyNoztC76RrEWGiJxsYvnzSQEoPzyRH0LfADMFPERx8z7odObjeRKI3AEe06kqvvEZhspZCaEIG', 1, 0, '2016-07-22 05:34:04', '2016-10-29 03:29:12', 0, '2016-10-28'),
(9, 'alam91', 'alam91@yahoo.com', '$2y$10$yO5fUW8lUip6Zi91eVaVn.XCT0ffSjD1Yp5UUjdZcfJAF6AdXs0Cu', NULL, 'tEt6tjeFI86W5Ts7bFB4UN2sKNuTGlbMJrOcBlS4vIqrxIYUcNbTU14pWRzXr5zAoZm4yVKtMgaE8bSyrzcc4N7KgfHy9gpJisHbX7HH6I6yR4JDHJSHIW9bOB12TZa5edNujDadXOjQ4hmsn2ypSa2UIkviYWbis9pFFyxhcKlIlVm0IIRHhlwLL45tnrp3dWq1W11ZEXMDisx9qdguckXh1nX7dy7nkqK2fUOkFYyjzkb4Amnvx3229fpbs9Q', 0, 0, '2016-07-22 07:00:30', '2016-07-22 07:00:30', 0, '2016-02-22'),
(10, 'Andres', 'andrescondo17@yahoo.com', '$2y$10$T7ZrJbtjzo3dXNTCGEfPB.D3E5sXRwB5xpofGkKWgNTQmbLBwGEJC', 'krQMB9zBLrCSKNg5KAPTlrhTtTQ9K3TLOn9s6hkDQT9vL1AbYc2jW7Dg8BkF', 'DzsIRxYLjHAaGaj2a1L5O4RukW1l3ZdnRzEa60xwM3OXEFpOFSAbIjRGVLU3NgA4OeLSfOVGbXAnUAwobmZnqzWF7yjIuniq7CDV1WC4eCkqyS4FsIxqKyPsQncwUNrmgO5UmVwJ6xRIucAiqd3WyBQcbIuH24waIgAhOcUv3SNw0EJ7zQxwTzqEefscAW5kHqC02ORedeFVcj2tFPI79UgBGZxFfo4kvN0Lj0QFfUN89IN3J9tJrm8e4N4LELA', 1, 0, '2016-07-22 07:35:24', '2016-10-22 07:29:26', 0, '2016-10-21'),
(11, 'Juan', 'aincram1971@gmail.com', '$2y$10$9EDLF.jyGwXUz7X0hLYH0uLGksRY/y1TAhQALUvbK5omt8wezuSg.', 'KW7d4X3H895ASqfKXkzQ8NRtL7j4DOSnM6kBCHzLLl4IyHH1naRfUWvN2ykN', '', 1, 1, '2016-10-26 21:57:58', '2016-10-29 03:27:49', 4, '2016-10-28'),
(12, 'Andres', 'andrescondo_17@outlook.com', '$2y$10$w1TKI1jhymG.DS1dV7zYY.KY4OBJmgXi3kwQTeiwsHtSZ8lThFG26', 'oQGtnr73UTNOyHuTmvPOqkxdih2em13jLB5LeLsxcWStDwWzlEov3wJH05db', '63MedLkZPiyN6dF3IiSqEukKaldg6x0zof440TW1b810oCscbraeM8GwFdZM7XloYmCk48U94duBe60qHTTyrD5OSUkNQu33wFrvkssA6I9c1rxLPXFybiDIzh3gYr0Y3HQFwtaaBcs8IbYFSguz4ub4Ww6UB7eh0FT7yfdCHOrpdRa8czPeuH96hSwMffd8a5mVUIeGKJwjhSX0bjruqOF4vA37pdWlvYcaQkzbU2p02Sg1UnT4dnhvCX9x7mD', 1, 0, '2016-11-02 00:51:40', '2016-11-03 03:09:57', 0, '2016-11-03');

-- --------------------------------------------------------

--
-- Estructura para la vista `subsections`
--
DROP TABLE IF EXISTS `subsections`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subsections`  AS  select `p`.`category_id` AS `category_id`,`c`.`name` AS `Category`,`p`.`sections_id` AS `sections_id`,`s`.`name` AS `Section` from (`sections` `s` left join (`products` `p` left join `categories` `c` on((`p`.`category_id` = `c`.`id`))) on((`p`.`sections_id` = `s`.`id`))) where ((`p`.`category_id` = `c`.`id`) and (`p`.`sections_id` = `s`.`id`) and (`p`.`catalogo` = '1')) group by `p`.`category_id` order by `p`.`category_id` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `availables`
--
ALTER TABLE `availables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indices de la tabla `availables_products`
--
ALTER TABLE `availables_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_availables_has_products_products1_idx` (`products_id`),
  ADD KEY `fk_availables_has_products_availables1_idx` (`availables_id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`,`provincia_idprovincia`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employes_email_unique` (`email`),
  ADD UNIQUE KEY `employes_username_unique` (`username`),
  ADD UNIQUE KEY `employes_password_unique` (`password`),
  ADD KEY `employes_cargo_id_foreign` (`cargo_id`),
  ADD KEY `employes_department_id_foreign` (`department_id`),
  ADD KEY `employes_country_id_foreign` (`country_id`),
  ADD KEY `employes_province_id_foreign` (`province_id`),
  ADD KEY `employes_isactive_id_foreign` (`isactive_id`);

--
-- Indices de la tabla `empress`
--
ALTER TABLE `empress`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`),
  ADD UNIQUE KEY `remember_token_UNIQUE` (`remember_token`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `isactives`
--
ALTER TABLE `isactives`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `itempedido`
--
ALTER TABLE `itempedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- Indices de la tabla `locationstest`
--
ALTER TABLE `locationstest`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`idnotify`);

--
-- Indices de la tabla `numbersizes`
--
ALTER TABLE `numbersizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number_UNIQUE` (`number`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `paymethods`
--
ALTER TABLE `paymethods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`),
  ADD UNIQUE KEY `remember_token_UNIQUE` (`remember_token`);

--
-- Indices de la tabla `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories1_idx` (`category_id`),
  ADD KEY `fk_products_brands1_idx` (`brand_id`),
  ADD KEY `fk_products_isactives1_idx` (`isactive_id`),
  ADD KEY `fk_products_sections1_idx` (`sections_id`);

--
-- Indices de la tabla `products_numbersizes`
--
ALTER TABLE `products_numbersizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_has_numbersizes_numbersizes1_idx` (`numbersizes_id`),
  ADD KEY `fk_products_has_numbersizes_products1_idx` (`products_id`);

--
-- Indices de la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_has_sizes_products` (`product_id`),
  ADD KEY `fk_products_has_sizes_sizes1` (`size_id`);

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_pedido1_idx` (`pedido_id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcategories_categories1_idx` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `availables`
--
ALTER TABLE `availables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `availables_products`
--
ALTER TABLE `availables_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `emps`
--
ALTER TABLE `emps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `isactives`
--
ALTER TABLE `isactives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `itempedido`
--
ALTER TABLE `itempedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;
--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT de la tabla `locationstest`
--
ALTER TABLE `locationstest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `notify`
--
ALTER TABLE `notify`
  MODIFY `idnotify` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `numbersizes`
--
ALTER TABLE `numbersizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `paymethods`
--
ALTER TABLE `paymethods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;
--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `products_numbersizes`
--
ALTER TABLE `products_numbersizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `availables_products`
--
ALTER TABLE `availables_products`
  ADD CONSTRAINT `fk_availables_has_products_availables1` FOREIGN KEY (`availables_id`) REFERENCES `availables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_availables_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `employes_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `employes_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `employes_isactive_id_foreign` FOREIGN KEY (`isactive_id`) REFERENCES `isactives` (`id`),
  ADD CONSTRAINT `employes_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Filtros para la tabla `products_numbersizes`
--
ALTER TABLE `products_numbersizes`
  ADD CONSTRAINT `fk_products_has_numbersizes_numbersizes1` FOREIGN KEY (`numbersizes_id`) REFERENCES `numbersizes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_has_numbersizes_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `fk_products_has_sizes_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_has_sizes_sizes1` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
