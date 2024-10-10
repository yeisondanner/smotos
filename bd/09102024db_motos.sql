-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2024 a las 06:01:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_motos`
--
CREATE DATABASE IF NOT EXISTS `db_motos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_motos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idMotos` int(11) DEFAULT NULL,
  `c_numeroEstrellas` double NOT NULL,
  `c_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`idCalificacion`, `idCliente`, `idMotos`, `c_numeroEstrellas`, `c_fechaRegistro`) VALUES
(1, 1, 3, 2, '2022-07-03 02:39:31'),
(2, 1, 2, 4, '2022-06-29 02:54:08'),
(3, 1, 7, 5, '2022-06-09 17:41:27'),
(4, 1, 1, 2, '2022-06-25 01:38:04'),
(5, 1, 16, 2, '2022-06-29 02:53:42'),
(6, 1, 20, 1, '2022-06-25 00:09:27'),
(7, 1, 21, 5, '2024-10-06 02:45:16'),
(8, 1, 8, 1, '2022-07-03 02:39:18'),
(9, 1, 15, 1, '2022-07-03 01:42:19'),
(10, 1, 11, 3, '2022-07-03 02:39:07'),
(11, 1, 23, 3, '2022-06-25 00:08:27'),
(12, 1, 6, 2, '2022-06-25 00:45:56'),
(13, 1, 9, 5, '2022-06-29 02:54:33'),
(14, 1, 5, 3, '2022-06-25 01:37:54'),
(15, 1, 10, 1, '2022-07-03 02:46:42'),
(16, 1, 18, 5, '2022-07-03 02:42:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `c_Categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `c_Categoria`) VALUES
(1, 'Sport'),
(2, 'Super Sport'),
(3, 'SCOOTER Y SEMIAUTOMÁTICA'),
(4, 'NAVI'),
(5, 'Todo Terreno'),
(6, 'Aventura'),
(7, 'Pisteras'),
(8, 'Enduro y Motocross'),
(9, 'Turismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `c_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `c_Estado` varchar(40) NOT NULL DEFAULT 'activo',
  `c_tipoUso` varchar(50) NOT NULL,
  `c_Experiencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idPersona`, `c_fechaRegistro`, `c_Estado`, `c_tipoUso`, `c_Experiencia`) VALUES
(1, 1, '2022-07-04 00:22:56', 'activo', 'Mixto', 'Principiante'),
(2, 3, '2022-07-03 03:30:27', 'activo', '', ''),
(4, 5, '2022-07-03 03:31:57', 'activo', '', ''),
(5, 8, '2022-07-04 00:20:18', 'activo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteusuario`
--

CREATE TABLE `clienteusuario` (
  `idClienteUsuario` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `cu_Usuario` text NOT NULL,
  `cu_Pasword` text NOT NULL,
  `cu_primeraVez` varchar(20) NOT NULL DEFAULT 'Si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clienteusuario`
--

INSERT INTO `clienteusuario` (`idClienteUsuario`, `idCliente`, `cu_Usuario`, `cu_Pasword`, `cu_primeraVez`) VALUES
(1, 1, 'yeison', '12345', 'No'),
(2, 2, '', '', 'Si'),
(3, 4, 'dsfsdf', 'sdfsdf', 'Si'),
(4, 5, 'sadsaddasdsadasdsa', 'asdsadsadsa', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `idColor` int(11) NOT NULL,
  `c_Color` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idColor`, `c_Color`) VALUES
(1, 'Azul'),
(2, 'Rojo'),
(3, 'Verde'),
(4, 'Amarillo'),
(5, 'Negro'),
(6, 'Gris'),
(7, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentarios` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idMotos` int(11) DEFAULT NULL,
  `c_Comentarios` text NOT NULL,
  `c_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentarios`, `idCliente`, `idMotos`, `c_Comentarios`, `c_fechaRegistro`) VALUES
(1, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus nulla tempore laudantium voluptates, ab id aperiam? Maxime maiores veniam delectus! Aut aliquid repellat non consequuntur eligendi natus velit quaerat.', '2022-05-14 22:14:28'),
(2, 1, 2, 'sdfsdfds', '2022-05-14 23:11:12'),
(3, 1, 3, 'la moto es muy pesada', '2022-06-10 01:21:50'),
(4, 1, 2, 'zdafssfdsfds', '2022-05-15 01:40:02'),
(5, 1, 2, 'Honda nos presenta el modelo 202\" de su producto de entrada al mundo del motociclismo urbano: Navi (aunque ya también manejamos la Honda XR190L). Denominado por la marca como un pequeño crossover pues nace a partir de la plataforma de un scooter, combinado con el diseño y comodidad de una motocicleta. De aspecto dinámico y deportivo, además de práctico por sus dimensiones, cuyo desarrollo y fabricación original provenían de India, pero por el gran nivel de demanda y la larga lista de espera, la producción se lleva a cabo ahora en la planta de El Salto, Jalisco, aunque algunos componentes importantes como el motor o la suspensión siguen siendo importados por el país de origen.', '2022-05-16 01:18:38'),
(6, 1, 1, 'Es una gran moto', '2022-06-09 17:49:28'),
(7, 1, 12, 'que asco de moto para enanos de mrda', '2022-06-16 01:10:36'),
(8, 1, 12, 'que asco de moto para enanos de mrda', '2022-06-16 01:10:52'),
(9, 1, 12, '', '2022-06-16 01:11:04'),
(10, 1, 20, '', '2022-06-16 01:24:26'),
(11, 1, 20, '', '2022-06-16 01:26:28'),
(12, 1, 20, 'ghjghj', '2022-06-16 01:27:35'),
(13, 1, 20, 'sddfsdfsd', '2022-06-16 01:27:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustos`
--

CREATE TABLE `gustos` (
  `idGustos` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `g_Year` double DEFAULT NULL,
  `g_Categoria` double DEFAULT NULL,
  `g_Color` double DEFAULT NULL,
  `g_Cilindrada` double DEFAULT NULL,
  `g_tipoTransmision` double DEFAULT NULL,
  `g_encendidoElectrico` double DEFAULT NULL,
  `g_encendidoManual` double DEFAULT NULL,
  `g_tipoMotor` double DEFAULT NULL,
  `g_tipoFrenoDelantero` double DEFAULT NULL,
  `g_tipoFrenoTrasero` double DEFAULT NULL,
  `g_Peso` double DEFAULT NULL,
  `g_velocidadMaxima` double DEFAULT NULL,
  `g_Aceleracion` double DEFAULT NULL,
  `g_Precio` double DEFAULT NULL,
  `g_totalCalificacion` double DEFAULT NULL,
  `g_totalVistas` double DEFAULT NULL,
  `g_fechaRegistroGusto` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gustos`
--

INSERT INTO `gustos` (`idGustos`, `idCliente`, `g_Year`, `g_Categoria`, `g_Color`, `g_Cilindrada`, `g_tipoTransmision`, `g_encendidoElectrico`, `g_encendidoManual`, `g_tipoMotor`, `g_tipoFrenoDelantero`, `g_tipoFrenoTrasero`, `g_Peso`, `g_velocidadMaxima`, `g_Aceleracion`, `g_Precio`, `g_totalCalificacion`, `g_totalVistas`, `g_fechaRegistroGusto`) VALUES
(10, 1, 2022, 4, 2, 109.19, 6, 0, 0, 17, 4, 4, 99, 85, 7.92, 5530, 5, 0, '2024-10-06 02:45:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialrecomendacion`
--

CREATE TABLE `historialrecomendacion` (
  `idHistorialRecomendacion` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `hr_Codigo` char(20) NOT NULL,
  `hr_fechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `idMotos` int(11) DEFAULT NULL,
  `i_Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idImagen`, `idMotos`, `i_Imagen`) VALUES
(13, 4, 'MOTO_4/CB_12_ ROJA 2022.png'),
(14, 4, 'MOTO_4/cb125f-twister-2022.jpg'),
(15, 3, 'MOTO_3/cb190r-repsol-2022.jpg'),
(16, 2, 'MOTO_2/navi-110-1.jpg'),
(17, 2, 'MOTO_2/NAVI-2.png'),
(18, 7, 'MOTO_7/honda-xr150le3.png'),
(19, 5, 'MOTO_5/honda-xr190ct-1.png'),
(20, 5, 'MOTO_5/honda-xr190l-1-negro-.png'),
(21, 1, 'MOTO_1/honda-xr190l-1-negro-.png'),
(22, 6, 'MOTO_6/x-blade-2021-1.png'),
(23, 6, 'MOTO_6/X-BLADE 2.jpg'),
(24, 8, 'MOTO_8/cb250-twister.png'),
(25, 14, 'MOTO_14/Honda-CRF250R-2022.jpg'),
(26, 13, 'MOTO_13/honda_crf450l-2020.jpg'),
(27, 13, 'MOTO_13/22-Honda-CRF450RWE_RHP.jpg'),
(28, 12, 'MOTO_12/HONDA_GOLD_WING.jpg'),
(29, 10, 'MOTO_10/Honda-Wave-110-S-Negra-Mate.png'),
(30, 11, 'MOTO_11/honda-wave-110scd.png'),
(31, 9, 'MOTO_9/honda-pcx160-2021-negro-39d471.png'),
(32, 19, 'MOTO_19/xr250tornado_1.png'),
(33, 18, 'MOTO_18/honda-xre300-abs-.png'),
(34, 17, 'MOTO_17/FOTO-MOTO-PRINCIPAL-230 crf.png'),
(35, 16, 'MOTO_16/crf250rx.jpg'),
(36, 15, 'MOTO_15/honda-crf300l-2021-rojo.jpg'),
(37, 22, 'MOTO_22/NAVI-ADVENTUR-MARRON.jpg'),
(38, 21, 'MOTO_21/navi-mix-Roja.png'),
(39, 20, 'MOTO_20/Colores_DIO_ROJA.jpg'),
(40, 23, 'MOTO_23/CRF110F-1.png'),
(41, 24, 'MOTO_24/GL 125 ROJA.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listarecomendacion`
--

CREATE TABLE `listarecomendacion` (
  `idListaRecomendacion` int(11) NOT NULL,
  `idHistorialRecomendacion` int(11) DEFAULT NULL,
  `idMotos` int(11) DEFAULT NULL,
  `lr_Peso` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

CREATE TABLE `motos` (
  `idMotos` int(11) NOT NULL,
  `m_Modelo` varchar(500) NOT NULL,
  `m_Year` char(5) NOT NULL,
  `m_Marca` varchar(20) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idColor` int(11) DEFAULT NULL,
  `m_Cilindrada` double NOT NULL,
  `idTipoTransmision` int(11) DEFAULT NULL,
  `m_encendidoElectrico` tinyint(1) NOT NULL,
  `m_encendidoManual` tinyint(1) NOT NULL,
  `idTipoMotor` int(11) DEFAULT NULL,
  `idTipoFrenoDelantero` int(11) DEFAULT NULL,
  `idTipoFrenoTrasero` int(11) DEFAULT NULL,
  `m_Peso` double NOT NULL,
  `m_Estado` text NOT NULL,
  `m_velocidadMaxima` double NOT NULL,
  `m_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `m_Aceleracion` double DEFAULT NULL,
  `idTrabajador` int(11) NOT NULL,
  `m_Precio` float NOT NULL,
  `m_Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`idMotos`, `m_Modelo`, `m_Year`, `m_Marca`, `idCategoria`, `idColor`, `m_Cilindrada`, `idTipoTransmision`, `m_encendidoElectrico`, `m_encendidoManual`, `idTipoMotor`, `idTipoFrenoDelantero`, `idTipoFrenoTrasero`, `m_Peso`, `m_Estado`, `m_velocidadMaxima`, `m_fechaRegistro`, `m_Aceleracion`, `idTrabajador`, `m_Precio`, `m_Descripcion`) VALUES
(1, 'XR190L', '2021', 'Honda', 5, 2, 185, 3, 1, 1, 1, 6, 5, 180, 'activo', 120, '2022-06-09 18:07:31', 10, 1, 13280, 'Para los que anhelan los desafíos del camino, llegó la XR190L, una agresiva compañera doble propósito con una resistencia y potencia inigualable, capaz de conquistar el pavimento y derrochar agilidad en esas difíciles carreteras cubiertas de imperfecciones. Resistente, ágil, potente y, sobre todo, económica.'),
(2, 'NAVI E3 ', '2022', 'Honda', 4, 2, 110, 1, 1, 1, 17, 4, 4, 101, 'activo', 81, '2022-06-15 17:05:17', 7.89, 1, 5697, 'La nueva Honda NAVI cuenta con un motor monocilíndrico de 4 tiempos refrigerado por aire. El sistema dual de encendido (electrónico y patada) aseguran el correcto funcionamiento de esta moto, que además, gracias a su pequeño motor de 110 centímetros cúbicos entrega una gran autonomía.'),
(3, 'CB 190R Repsol', '2022', 'Honda', 7, 1, 42.3, 2, 1, 1, 1, 6, 1, 190, 'activo', 190, '2022-06-09 18:06:37', 10, 1, 12651, 'La CB190R es una motocicleta que proyecta estilo desde todos sus ángulos inciando por su espectacular tanque aerodinámico hasta su posición de manejo deportiva que permite disfrutar de una maniobrabilidad extraordinaria para tener siempre el control del camino.'),
(4, 'CB125F TWISTER', '2022', 'Honda', 7, 2, 125, 3, 1, 1, 3, 1, 3, 117, 'activo', 100, '2022-06-09 17:33:58', 4, 1, 7692, 'La CB125F TWISTER es una moto sumamente ahorrativa. Ligera para desplazarse por la ciudad día a día y sobre todo económica para recorrer la mayor cantidad de kilómetros, con la menor cantidad de combustible. Con su tanque de 2.66 galones, esta moto es capaz de alcanzar una autonomía que bordea los 450 km.'),
(5, 'XR190CT', '2022', 'Honda', 5, 2, 185, 3, 0, 0, 5, 8, 7, 128, 'activo', 110, '2022-06-09 17:02:29', 15, 1, 15634, 'Dentro de la categoría \"todo terreno\" de baja cilindrada, se abre paso la XR190CT, una moto con la dureza, potencia y prestaciones suficientes para ser la moto ideal para los que buscan escaparse del tráfico día a día o los fines de semana en busca de nuevos caminos y aventuras.'),
(6, 'X-BLADE', '2021', 'Honda', 7, 5, 163, 3, 0, 0, 6, 9, 7, 142, 'activo', 115, '2022-06-09 17:04:49', 13.7, 1, 10583, 'La nueva X Blade de Honda es sin duda la más atrevida del segmento, dejando de lado las tendencias conservadoras y exhibiendo una moto con muchos más detalles, ángulos y formas que la mayoría de sus competidoras. Su iluminación led, frenos ABS e increíble potencia la hacen irresistible ante los ojos de cualquier motero.'),
(7, 'XR150LE3', '2022', 'Honda', 5, 5, 150, 3, 0, 0, 5, 8, 7, 128, 'activo', 110, '2022-06-09 17:20:02', 11.69, 1, 11530, 'Con un chasis alto, gran recorrido de suspensión y llantas tipo Trail, llega la XR150L, una moto doble propósito de baja cilindrada, que gracias a sus dimensiones es perfecta para quienes buscan una moto para el día a día en la ciudad, pero con las prestaciones suficientes para desafiar nuevos caminos los fines de semana.'),
(8, 'CB250 TWISTER', '2022', 'Honda', 7, 2, 250, 3, 0, 0, 6, 8, 9, 148, 'activo', 149, '2022-06-10 00:45:17', 22.1, 1, 16777, 'Agresiva de corazón, ágil de diseño. La nueva CB250 Twister es una motocicleta hecha para derrotar a todo lo que se cruce en su camino. Desarrollada para la ciudad, este misil urbano promete entregarte diversión todos los días y pasión por la aventura cuando te apetezca.'),
(9, 'PCX160', '2021', 'Honda', 3, 5, 156, 1, 0, 0, 10, 6, 6, 133, 'activo', 110, '2022-06-15 01:18:20', 13, 1, 15956, 'Esta es una de la moto más fashion de la categoría, ya que fue pensada para las personas que les gusta verse bien mientras manejan. Nace en Europa el 2009 y desde entonces ha liderado su segmento por encima de las demás. Todos los dueños de una PCX160 viven fascinados con ella.'),
(10, 'WAVE 110S', '2021', 'Honda', 3, 5, 109.1, 1, 0, 0, 5, 8, 10, 100, 'activo', 110, '2022-06-15 03:22:02', 8.11, 1, 5752, 'Proyecta un estilo mas deportivo y moderno, que harán que no pierdas tu personalidad mientras la conduces.'),
(11, 'WAVE 110S CD', '2022', 'Honda', 3, 2, 109, 1, 0, 0, 7, 12, 11, 110, 'activo', 110, '2022-06-15 02:00:02', 10, 1, 6576, 'Es una moto urbana que ha ido renovando a tus requerimientos actuales como motero.'),
(12, 'GOLDWING GL 1800', '2021', 'Honda', 9, 5, 1833, 5, 0, 0, 11, 15, 16, 383, 'activo', 185, '2022-06-15 02:25:21', 125, 1, 120713, 'El modelo insignia de la marca Honda ha sido completamente rediseñado con un chasis, motor y sistema de suspensión nuevos. El fabricante ha tenido cuidado con cada detalle buscando proporcionar a los usuarios la comodidad propia de una primera clase.'),
(13, 'CRF450R', '2020', 'Honda', 8, 2, 450, 3, 0, 0, 7, 17, 18, 110.6, 'activo', 200, '2022-06-15 02:54:36', 47, 1, 43354, 'Con una totalmente renovada CRF450R, Honda vuelve a ponerse al frente de la categoría. Su chasis mucho más ligero y el aumento de potencia en un 11%, colocan a esta Motocross en lo más alto del podio.'),
(14, 'CRF250F', '2022', 'Honda', 8, 2, 249, 4, 0, 0, 12, 6, 6, 114, 'activo', 120, '2022-06-15 03:12:04', 41.8, 1, 36085, 'La Honda CRF250R 2022 mejora en casi todas sus facetas, con especial atención en el chasis, la reducción de peso y el comportamiento de motor en bajos con innumerables modificaciones.'),
(15, 'CRF 300L', '2021', 'Honda', 8, 2, 286, 4, 0, 0, 13, 19, 20, 142, 'activo', 132, '2022-06-15 04:26:27', 26.95, 1, 22553, 'La Honda CRF300L es una trail enfocada a los usuarios del carnet A2 que, en su tercera generación, aumenta cilindrada, lo que supone una ganancia de potencia.'),
(16, 'CRF 250 RX', '2021', 'Honda', 8, 2, 249.6, 4, 0, 0, 14, 21, 22, 111, 'activo', 130, '2022-06-15 05:14:47', 27, 1, 37654, 'La Honda CRF250RX es la versión de enduro realizada sobre el modelo de cross, la CRF250R, que además se beneficia de todas las mejoras introducidas en 2022, como el nuevo chasis más ligero que procede de la CRF450RX. Pero no es el único cambio en esta peculiar montura que en sólo se puede homologar si se adquiere un kit opcional para poder matricularla.'),
(17, 'CRF 230F', '2021', 'Honda', 8, 2, 223.1, 4, 0, 0, 12, 14, 7, 108, 'activo', 120, '2022-06-15 05:51:17', 18, 1, 22618, 'Si estás aquí es por que has sentido el llamado de la tierra a hacerte uno solo con ella, y la compañera perfecta para acudir a ese llamado es la CRF230F. Una moto ideal para iniciarse en el apasionante mundo del Enduro y Motocross y que cuenta con la potencia ideal para aquellos principiantes que buscan llegar a ser los campeones del circuito.'),
(18, 'XRE300 ABS', '2021', 'Honda', 5, 3, 291, 3, 0, 0, 15, 23, 23, 146, 'activo', 150, '2022-06-15 06:01:04', 26, 1, 22806, 'La sucesora de la XR250 TORNADO llega con el nombre de XRE300. Una moto doble propósito que cuenta con una excelente maniobrabilidad, bajo peso y una rápida entrega de potencia tanto en bajas como altas revoluciones. Su excelente suspensión es una de las más suaves dentro de su categoría, logrando así ser una moto cómoda para viajes largos.'),
(19, 'XR 250 Tornado', '2022', 'Honda', 5, 7, 249, 3, 0, 0, 15, 2, 4, 134, 'activo', 130, '2022-06-15 06:18:10', 23, 1, 69478, 'La potencia y versatilidad de la Honda XR 250 Tornado la convierten en una motocicleta con dos personalidades que conviven en perfecta armonía. Se desplaza con total naturalidadven el día a día como una ágil moto de calle y ofrece una increíble explosión de adrenalina en cada salida off-road.'),
(20, 'DIO 110', '2021', 'Honda', 3, 2, 110, 6, 0, 0, 16, 4, 4, 105, 'activo', 83, '2022-06-15 16:42:05', 7.8, 1, 8909, 'Elegiste la Dio y ahora disfrutas de una motocicleta moderna, práctica, ágil y amigable en el manejo que te permite llevar el ritmo y control sobre tu día, te invita a salir de tu zona de confort, hacer cosas nuevas, reinventarte, independizarte, sentirte libre, con energía, con ganas de más, así de potente es la Dio y llegó para superar tus propios límites.'),
(21, 'NAVI MIX E3', '2022', 'Honda', 4, 2, 109.19, 6, 0, 0, 17, 4, 4, 99, 'activo', 85, '2022-06-15 17:03:21', 7.92, 1, 5530, 'La NAVI MIX viene con accesorios únicos los cuales te harán destacar en todas tus rodadas, es una moto única. No es eléctrica, cuenta con transmisión automática y con su tecnología HET que mejora la combustión y rendimiento de combustible, además ayuda a la duración del motor.'),
(22, 'NAVI ADVENTURE', '2022', 'Honda', 4, 6, 109.19, 6, 0, 0, 17, 4, 4, 99, 'activo', 86, '2022-06-15 17:12:07', 7.92, 1, 5630, 'La NAVI ADVENTURE viene con accesorios únicos los cuales te harán destacar en todas tus rodadas, es una moto única. No es eléctrica, cuenta con transmisión automática y con su tecnología HET que mejora la combustión y rendimiento de combustible, además ayuda a la duración del motor.'),
(23, 'CRF 110F', '2020', 'Honda', 8, 2, 109, 4, 0, 0, 7, 24, 24, 74, 'activo', 110, '2022-06-15 17:48:22', 7.2, 1, 9850, 'La moto Honda CRF110F del año 2020 fue elaborada por la empresa Honda y es de la serie de Honda crf 110 que engloba motos de diversas cilindradas.'),
(24, 'GL 125', '2022', 'Honda', 7, 2, 125, 3, 0, 0, 1, 7, 7, 107, 'activo', 103, '2022-06-15 17:55:53', 8, 1, 6900, 'La GL125 ha sido diseñada para destacar por su eficiente consumo de combustible y capacidad para recorrer cualquier tipo de terreno con gran desempeño y confort.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `p_Nombres` varchar(200) NOT NULL,
  `p_Apellidos` varchar(200) NOT NULL,
  `p_Correo` varchar(400) NOT NULL,
  `p_fechaNacimiento` date NOT NULL,
  `p_Sexo` varchar(100) NOT NULL,
  `p_estadoCivil` varchar(100) NOT NULL,
  `p_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `p_Nombres`, `p_Apellidos`, `p_Correo`, `p_fechaNacimiento`, `p_Sexo`, `p_estadoCivil`, `p_fechaRegistro`) VALUES
(1, 'Percy', 'Pachamora Becerra', 'percypachamora@gmail.com', '2000-09-08', 'Masculino', 'Soltero', '2022-06-09 15:21:58'),
(2, 'Marcos', 'Becerra Terrones', 'terrones@gmail.com', '2000-01-01', 'Masculino', 'Casado', '2022-06-09 15:21:16'),
(3, '', '', '', '0000-00-00', '', '', '2022-07-03 03:30:27'),
(5, 'sadsadsad', 'asdasdsa', 'vinina1788@weepm.com', '2022-07-21', 'Masculino', 'Casado', '2022-07-03 03:31:57'),
(8, 'wdsfsdfsdf', 'sdfsdfsd', 'vininsadsaa1788@weepm.com', '2022-07-21', 'Femenino', 'Soltero', '2022-07-04 00:20:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofreno`
--

CREATE TABLE `tipofreno` (
  `idTipoFreno` int(11) NOT NULL,
  `tf_tipoFreno` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipofreno`
--

INSERT INTO `tipofreno` (`idTipoFreno`, `tf_tipoFreno`) VALUES
(1, 'Disco Lobulado 320 mm con mordaza de 2 pistones. ABS'),
(2, 'Disco Lobulado de 240 mm con mordaza de 1 pistón. ABS'),
(3, 'Tambor 130 mm – Combinado'),
(4, 'Tambor 130 mm'),
(5, 'Disco con ABS'),
(6, 'Disco'),
(7, 'Tambor Mecánico con zapatas expandibles'),
(8, 'Disco Ventilado con cáliper de doble pistón'),
(9, 'Disco Ventilado y Lobulado con cáliper de doble pistón'),
(10, 'Tambor Mecánico con zapatas expandibles y sistema CBS'),
(11, 'Tambor Mecánico con sistema CBS'),
(12, 'Disco Ventilado con cáliper de tres pistones y sistema CBS'),
(13, 'Tambor Mecánico con zapatas expandibles y frenado combinado.'),
(14, 'Disco Ventilado con cáliper de 1 pistónn'),
(15, 'Dos discos flotantes de 320 mm con pinzas de 6 pistones de accionamiento hidráulico y 2 pastillas de metal sinterizado'),
(16, 'Disco ventilado de 316 mm de diámetro con pinza de accionamiento hidráulico y pastillas de metal sinterizado/incluye freno de estacionamiento.'),
(17, 'Disco, monta pinza de doble pistón'),
(18, 'Disco sistema hidráulico.'),
(19, 'Disco Lobulado de 256 mm con doble pistón.'),
(20, 'Disco Lobulado de 220 mm de 1 pistón.'),
(21, 'Disco wave 260mm, pinza y bomba Nissin doble pistón.'),
(22, 'Disco wave 240mm, pinza y bomba nissin doble pistón.'),
(23, 'Disco Ventilado Disco ventilado'),
(24, 'Tambor 95 mm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomotor`
--

CREATE TABLE `tipomotor` (
  `idTipoMotor` int(11) NOT NULL,
  `tm_tipoMotor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomotor`
--

INSERT INTO `tipomotor` (`idTipoMotor`, `tm_tipoMotor`) VALUES
(1, '4Tiempos OHC – Refrigerado por aire'),
(2, '4 Cilindros en línea 4 Val DOHC Refrigeración liquida'),
(3, '4T, 4 cilindros en línea, DOHC, 16 V.'),
(4, 'Bicilíndrico SOHC 8VAL Refrigeración líquida'),
(5, '4 tiempos OHC a cadenilla'),
(6, '4 tiempos SOHC a cadenilla'),
(7, '4 tiempos SOHC'),
(8, 'Tambor Mecánico con zapatas expandibles'),
(9, 'Disco Ventilado y Lobulado con cáliper de 1 pistón'),
(10, '4 tiempos SOHC con 2 valvulas'),
(11, 'cilindros horizontales 24 valvulas SOHC refrigerado por liquido'),
(12, '4 tiempos, motor mono cilíndrico'),
(13, 'Monocilíndrico DOHC, refrigeración líquida'),
(14, 'Mono cilíndrico 4 tiempos, válvulas DOHC y refrigeración liquida. '),
(15, '4 tiempos DOHC con 4 válvulas '),
(16, '4 tiempos OHC con 2 válvulas una cilindrada'),
(17, 'Mono-cilíndrico, 4 tiempos, 2 válvulas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransmision`
--

CREATE TABLE `tipotransmision` (
  `idTipoTransmision` int(11) NOT NULL,
  `tt_tipoTransmicion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipotransmision`
--

INSERT INTO `tipotransmision` (`idTipoTransmision`, `tt_tipoTransmicion`) VALUES
(1, 'Automática'),
(2, 'tipo retorno'),
(3, 'Mecánica'),
(4, 'Cadena'),
(5, 'Cardán'),
(6, 'Automática (V-Matic)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(11) NOT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `t_Estado` varchar(40) DEFAULT 'activo',
  `t_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idTrabajador`, `idPersona`, `t_Estado`, `t_fechaRegistro`) VALUES
(1, 2, 'activo', '2022-04-16 20:04:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariotrabajador`
--

CREATE TABLE `usuariotrabajador` (
  `idUsuarioTrabajador` int(11) NOT NULL,
  `idTrabajador` int(11) DEFAULT NULL,
  `ut_Usuario` varchar(400) DEFAULT NULL,
  `ut_Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariotrabajador`
--

INSERT INTO `usuariotrabajador` (`idUsuarioTrabajador`, `idTrabajador`, `ut_Usuario`, `ut_Password`) VALUES
(1, 1, 'enano', 'enano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vista`
--

CREATE TABLE `vista` (
  `idVista` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idMotos` int(11) DEFAULT NULL,
  `v_fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vista`
--

INSERT INTO `vista` (`idVista`, `idCliente`, `idMotos`, `v_fechaRegistro`) VALUES
(26, 1, 2, '2022-04-18 01:31:44'),
(27, 1, 3, '2022-04-18 01:31:49'),
(28, 1, 3, '2022-04-21 02:40:40'),
(29, 1, 2, '2022-04-21 02:46:46'),
(30, 1, 3, '2022-04-22 05:04:28'),
(31, 1, 2, '2022-04-27 01:04:31'),
(32, 1, 3, '2022-04-28 01:55:14'),
(33, 1, 2, '2022-05-04 03:06:27'),
(34, 1, 3, '2022-05-07 21:42:33'),
(35, 1, 2, '2022-05-09 19:45:17'),
(36, 1, 3, '2022-05-09 19:56:16'),
(37, 1, 3, '2022-05-14 20:35:43'),
(38, 1, 2, '2022-05-14 22:24:29'),
(39, 1, 2, '2022-05-16 01:16:11'),
(40, 1, 3, '2022-06-01 02:31:24'),
(41, 1, 2, '2022-06-01 02:31:36'),
(42, 1, 2, '2022-06-03 02:29:23'),
(43, 1, 4, '2022-06-09 15:33:52'),
(44, 1, 3, '2022-06-09 15:40:40'),
(45, 1, 5, '2022-06-09 17:22:51'),
(46, 1, 7, '2022-06-09 17:41:22'),
(47, 1, 1, '2022-06-09 17:41:52'),
(48, 1, 2, '2022-06-09 17:42:46'),
(49, 1, 1, '2022-06-13 23:48:45'),
(50, 1, 1, '2022-06-14 17:32:01'),
(51, 1, 4, '2022-06-14 19:31:41'),
(52, 1, 9, '2022-06-15 06:37:59'),
(53, 1, 16, '2022-06-15 17:14:44'),
(54, 1, 11, '2022-06-16 01:07:40'),
(55, 1, 3, '2022-06-16 01:08:27'),
(56, 1, 10, '2022-06-16 01:08:36'),
(57, 1, 2, '2022-06-16 01:08:42'),
(58, 1, 12, '2022-06-16 01:08:57'),
(59, 1, 1, '2022-06-16 01:23:38'),
(60, 1, 20, '2022-06-16 01:24:23'),
(61, 1, 20, '2022-06-23 03:29:57'),
(62, 1, 2, '2022-06-23 03:55:25'),
(63, 1, 16, '2022-06-23 04:00:15'),
(64, 1, 21, '2022-06-23 04:00:45'),
(65, 1, 8, '2022-06-23 04:01:07'),
(66, 1, 15, '2022-06-23 04:01:36'),
(67, 1, 11, '2022-06-24 23:58:19'),
(68, 1, 3, '2022-06-24 23:58:50'),
(69, 1, 23, '2022-06-25 00:08:23'),
(70, 1, 20, '2022-06-25 00:09:23'),
(71, 1, 16, '2022-06-25 00:09:41'),
(72, 1, 2, '2022-06-25 00:44:45'),
(73, 1, 1, '2022-06-25 00:45:28'),
(74, 1, 6, '2022-06-25 00:45:52'),
(75, 1, 9, '2022-06-25 01:37:38'),
(76, 1, 5, '2022-06-25 01:37:51'),
(77, 1, 18, '2022-06-25 03:19:38'),
(78, 1, 17, '2022-06-25 03:24:30'),
(79, 1, 11, '2022-06-29 02:52:34'),
(80, 1, 16, '2022-06-29 02:53:03'),
(81, 1, 2, '2022-06-29 02:54:04'),
(82, 1, 9, '2022-06-29 02:54:30'),
(83, 1, 10, '2022-07-03 01:41:57'),
(84, 1, 15, '2022-07-03 01:42:15'),
(85, 1, 11, '2022-07-03 02:39:04'),
(86, 1, 8, '2022-07-03 02:39:15'),
(87, 1, 3, '2022-07-03 02:39:28'),
(88, 1, 18, '2022-07-03 02:42:10'),
(89, 1, 23, '2024-10-06 02:44:50'),
(90, 1, 21, '2024-10-06 02:45:01'),
(91, 1, 8, '2024-10-06 02:45:26'),
(92, 1, 6, '2024-10-06 02:45:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idMotos` (`idMotos`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `clienteusuario`
--
ALTER TABLE `clienteusuario`
  ADD PRIMARY KEY (`idClienteUsuario`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `cu_Usuario` (`cu_Usuario`) USING HASH;

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idColor`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentarios`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idMotos` (`idMotos`);

--
-- Indices de la tabla `gustos`
--
ALTER TABLE `gustos`
  ADD PRIMARY KEY (`idGustos`),
  ADD UNIQUE KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `historialrecomendacion`
--
ALTER TABLE `historialrecomendacion`
  ADD PRIMARY KEY (`idHistorialRecomendacion`),
  ADD UNIQUE KEY `hr_Codigo` (`hr_Codigo`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idMotos` (`idMotos`);

--
-- Indices de la tabla `listarecomendacion`
--
ALTER TABLE `listarecomendacion`
  ADD PRIMARY KEY (`idListaRecomendacion`),
  ADD KEY `idHistorialRecomendacion` (`idHistorialRecomendacion`),
  ADD KEY `idMotos` (`idMotos`);

--
-- Indices de la tabla `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`idMotos`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idColor` (`idColor`),
  ADD KEY `idTipoTransmision` (`idTipoTransmision`),
  ADD KEY `idTipoMotor` (`idTipoMotor`),
  ADD KEY `idTipoFrenoDelantero` (`idTipoFrenoDelantero`),
  ADD KEY `idTipoFrenoTrasero` (`idTipoFrenoTrasero`),
  ADD KEY `motos_ibfk_7` (`idTrabajador`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `p_Correo` (`p_Correo`);

--
-- Indices de la tabla `tipofreno`
--
ALTER TABLE `tipofreno`
  ADD PRIMARY KEY (`idTipoFreno`);

--
-- Indices de la tabla `tipomotor`
--
ALTER TABLE `tipomotor`
  ADD PRIMARY KEY (`idTipoMotor`);

--
-- Indices de la tabla `tipotransmision`
--
ALTER TABLE `tipotransmision`
  ADD PRIMARY KEY (`idTipoTransmision`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`),
  ADD UNIQUE KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `usuariotrabajador`
--
ALTER TABLE `usuariotrabajador`
  ADD PRIMARY KEY (`idUsuarioTrabajador`),
  ADD UNIQUE KEY `ut_Usuario` (`ut_Usuario`),
  ADD UNIQUE KEY `idTrabajador` (`idTrabajador`) USING BTREE;

--
-- Indices de la tabla `vista`
--
ALTER TABLE `vista`
  ADD PRIMARY KEY (`idVista`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idMotos` (`idMotos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clienteusuario`
--
ALTER TABLE `clienteusuario`
  MODIFY `idClienteUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `gustos`
--
ALTER TABLE `gustos`
  MODIFY `idGustos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historialrecomendacion`
--
ALTER TABLE `historialrecomendacion`
  MODIFY `idHistorialRecomendacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `listarecomendacion`
--
ALTER TABLE `listarecomendacion`
  MODIFY `idListaRecomendacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motos`
--
ALTER TABLE `motos`
  MODIFY `idMotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipofreno`
--
ALTER TABLE `tipofreno`
  MODIFY `idTipoFreno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipomotor`
--
ALTER TABLE `tipomotor`
  MODIFY `idTipoMotor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipotransmision`
--
ALTER TABLE `tipotransmision`
  MODIFY `idTipoTransmision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuariotrabajador`
--
ALTER TABLE `usuariotrabajador`
  MODIFY `idUsuarioTrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vista`
--
ALTER TABLE `vista`
  MODIFY `idVista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idMotos`) REFERENCES `motos` (`idMotos`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `clienteusuario`
--
ALTER TABLE `clienteusuario`
  ADD CONSTRAINT `clienteusuario_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idMotos`) REFERENCES `motos` (`idMotos`);

--
-- Filtros para la tabla `gustos`
--
ALTER TABLE `gustos`
  ADD CONSTRAINT `gustos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `historialrecomendacion`
--
ALTER TABLE `historialrecomendacion`
  ADD CONSTRAINT `historialrecomendacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idMotos`) REFERENCES `motos` (`idMotos`);

--
-- Filtros para la tabla `listarecomendacion`
--
ALTER TABLE `listarecomendacion`
  ADD CONSTRAINT `listarecomendacion_ibfk_1` FOREIGN KEY (`idHistorialRecomendacion`) REFERENCES `historialrecomendacion` (`idHistorialRecomendacion`),
  ADD CONSTRAINT `listarecomendacion_ibfk_2` FOREIGN KEY (`idMotos`) REFERENCES `motos` (`idMotos`);

--
-- Filtros para la tabla `motos`
--
ALTER TABLE `motos`
  ADD CONSTRAINT `motos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `motos_ibfk_2` FOREIGN KEY (`idColor`) REFERENCES `color` (`idColor`),
  ADD CONSTRAINT `motos_ibfk_3` FOREIGN KEY (`idTipoTransmision`) REFERENCES `tipotransmision` (`idTipoTransmision`),
  ADD CONSTRAINT `motos_ibfk_4` FOREIGN KEY (`idTipoMotor`) REFERENCES `tipomotor` (`idTipoMotor`),
  ADD CONSTRAINT `motos_ibfk_5` FOREIGN KEY (`idTipoFrenoDelantero`) REFERENCES `tipofreno` (`idTipoFreno`),
  ADD CONSTRAINT `motos_ibfk_6` FOREIGN KEY (`idTipoFrenoTrasero`) REFERENCES `tipofreno` (`idTipoFreno`),
  ADD CONSTRAINT `motos_ibfk_7` FOREIGN KEY (`idTrabajador`) REFERENCES `trabajador` (`idTrabajador`);

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `usuariotrabajador`
--
ALTER TABLE `usuariotrabajador`
  ADD CONSTRAINT `usuariotrabajador_ibfk_1` FOREIGN KEY (`idTrabajador`) REFERENCES `trabajador` (`idTrabajador`);

--
-- Filtros para la tabla `vista`
--
ALTER TABLE `vista`
  ADD CONSTRAINT `vista_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `vista_ibfk_2` FOREIGN KEY (`idMotos`) REFERENCES `motos` (`idMotos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
