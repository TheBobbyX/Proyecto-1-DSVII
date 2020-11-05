-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 22:30:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestaproyecto`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarPreguntas` (IN `idin` INT)  NO SQL
delete from encuestas where id = idin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarRespuestas` (IN `idin` INT)  NO SQL
delete from respuestas where idenc = idin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarVoto` (IN `idin` INT)  NO SQL
select votos from respuestas where id = idin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultID` ()  NO SQL
SELECT id FROM encuestas ORDER BY fecha$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarPregunta` (IN `idpreg` INT)  NO SQL
select * from encuestas WHERE id=idpreg$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarRespuesta` (IN `idPreg` INT)  NO SQL
select * from respuestas where idenc = idpreg$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `encuesta` ()  NO SQL
((SELECT * from encuestas as enc
WHERE enc.titulo = 'Sexo'
OR enc.titulo = 'Provincia'
OR enc.titulo = 'Rango de edad'
OR enc.titulo = 'Rango Salarial')
union all
(SELECT * from encuestas as enc1
WHERE enc1.titulo <> 'Sexo'
AND enc1.titulo <> 'Provincia'
AND enc1.titulo <> 'Rango de edad'
AND enc1.titulo <> 'Rango Salarial'
ORDER BY RAND()
LIMIT 6)ORDER BY RAND())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `guardarPreguntaEditada` (IN `nueva` VARCHAR(250), IN `vieja` VARCHAR(250))  NO SQL
update encuestas 
set titulo = nueva
where titulo = vieja$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `guardarRespuestaEditada` (IN `valor` VARCHAR(250), IN `idin` INT)  NO SQL
update respuestas
set texto = valor
where id = idin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `guardarVoto` (IN `votoin` INT, IN `idin` INT)  NO SQL
UPDATE respuestas
SET votos = votoin
WHERE id = idin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEncuesta` (IN `tituloin` VARCHAR(250), IN `fechain` DATE, IN `opcionin` BOOLEAN)  NO SQL
insert into encuestas(titulo,fecha,opcion) values (tituloin,fechain,opcionin)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRespuesta` (IN `textoin` VARCHAR(250), IN `votosin` INT, IN `idencin` INT)  NO SQL
INSERT INTO respuestas(texto,votos,idenc) values (textoin,votosin,idencin)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarEncuesta` ()  NO SQL
select * FROM encuestas as enc1
WHERE enc1.titulo <> 'Sexo'
AND enc1.titulo <> 'Provincia'
AND enc1.titulo <> 'Rango de edad'
AND enc1.titulo <> 'Rango Salarial'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarRespuesta` ()  NO SQL
select * from respuestas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte` ()  NO SQL
select * FROM encuestas$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `titulo`, `fecha`, `opcion`) VALUES
(1, 'Rango de edad', '2020-11-04', 0),
(2, 'Sexo', '2020-11-04', 0),
(3, 'Provincia', '2020-11-04', 0),
(4, 'Rango Salarial', '2020-11-04', 0),
(5, '¿Usted ha realizado compras por Internet?', '2020-11-05', 0),
(6, '¿Desde que dispositivo realiza sus compras?', '2020-11-05', 1),
(7, '¿Usted ha recibido mercancía defectuosa ? ', '2020-11-05', 0),
(8, '¿Que tan frecuente compra por Internet?', '2020-11-05', 0),
(9, '¿Usted prefiere realizar sus compras desde una tienda física o prefiere comprar por Internet?', '2020-11-05', 0),
(10, '¿Cuándo compra por Internet sus compras le demoran mas de un 1 mes en llegar?', '2020-11-05', 0),
(11, '¿Cuánto dinero gastaste en tu última compra?', '2020-11-05', 0),
(12, '¿Realizaste algún cambio, devolución o cancelación del producto al recibirlo?', '2020-11-05', 0),
(13, '¿Cuántas compras has realizado por Internet durante el último año?', '2020-11-05', 0),
(14, '¿Para quién realizas las compras por Internet?', '2020-11-05', 0),
(15, '¿Siempre encuentra lo que busca comprar por Internet?', '2020-11-05', 0),
(16, '¿Cuál de las siguientes categorías les son de interés?', '2020-11-05', 1),
(17, '¿Que paginas utiliza para comprar por Internet?', '2020-11-05', 1),
(18, '¿Que método de pago utiliza para comprar por Internet?', '2020-11-05', 1),
(19, '¿Que tal es su experiencia comprando por Internet?', '2020-11-05', 1),
(20, '¿Recomienda usted comprar por Internet?', '2020-11-05', 0),
(21, '¿Que tan seguro se siente comprando en Internet?', '2020-11-05', 0),
(22, '¿Le gusta comprar por Internet?', '2020-11-05', 0),
(23, '¿Esta satisfecho con el tiempo de entrega?', '2020-11-05', 0),
(24, '¿Como conoció las comprar por Internet?', '2020-11-05', 1),
(25, '¿Volvería usted a comprar por Internet?', '2020-11-05', 0),
(26, '¿De qué país usualmente son sus productos?', '2020-11-05', 0),
(27, '¿Qué factores influyen en su decisión de compra?', '2020-11-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `texto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `votos` int(5) NOT NULL,
  `idenc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `texto`, `votos`, `idenc`) VALUES
(1, '18 - 25 años', 6, 1),
(2, '26 - 35 años', 1, 1),
(3, '36 - 45 años', 0, 1),
(4, '46 - 55 años', 0, 1),
(5, '55 años o mas', 1, 1),
(6, 'Masculino', 8, 2),
(7, 'Femenino', 0, 2),
(8, 'Otro', 0, 2),
(9, 'Bocas del Toro', 2, 3),
(10, 'Cocle', 1, 3),
(11, 'Colon', 0, 3),
(12, 'Chiriqui', 0, 3),
(13, 'Darien', 0, 3),
(14, 'Herrera', 0, 3),
(15, 'Los Santos', 0, 3),
(16, 'Panama', 2, 3),
(17, 'Veraguas', 0, 3),
(18, 'Panama Oeste', 0, 3),
(19, 'Menos de $300', 2, 4),
(20, '$300 a $500', 1, 4),
(21, '$500 a $1000', 1, 4),
(22, 'Mas de $1000', 1, 4),
(23, 'Si', 4, 5),
(24, 'No', 0, 5),
(25, 'Celular', 3, 6),
(26, 'Computadora', 0, 6),
(27, 'Tablet', 1, 6),
(28, 'Si', 2, 7),
(29, 'No', 0, 7),
(30, 'Nunca he comprado por Internet', 1, 8),
(31, 'Muy pocas veces realizo compras por Internet', 0, 8),
(32, 'Siempre realizo mis compras por Internet', 1, 8),
(33, 'Prefiero las tiendas físicas', 1, 9),
(34, 'Prefiero comprar por Internet', 0, 9),
(35, 'Ambas', 1, 9),
(36, 'Si', 2, 10),
(37, 'No', 0, 10),
(38, 'Menos de $25', 0, 11),
(39, '$26 - $75', 0, 11),
(40, '$76 - $100', 0, 11),
(41, 'Entre $100 - $200', 0, 11),
(42, 'Otros', 0, 11),
(43, 'Si', 0, 12),
(44, 'No', 0, 12),
(45, 'Ninguna', 0, 13),
(46, 'No recuerdo', 0, 13),
(47, '1 a 5', 0, 13),
(48, '6 a 10', 0, 13),
(49, 'Otros', 0, 13),
(50, 'Un amigo', 0, 14),
(51, 'Para mi', 0, 14),
(52, 'Para un familiar', 0, 14),
(53, 'Por trabajo', 0, 14),
(54, 'Otros', 0, 14),
(55, 'Si', 0, 15),
(56, 'No', 0, 15),
(57, 'Algunas veces', 0, 15),
(58, 'Juegos', 0, 16),
(59, 'Deportes', 0, 16),
(60, 'Artes', 0, 16),
(61, 'Cuidado personal', 0, 16),
(62, 'Otros', 0, 16),
(63, 'Amazon', 0, 17),
(64, 'Ebay', 0, 17),
(65, 'Walmart', 0, 17),
(66, 'Alibaba', 0, 17),
(67, 'AliExpress', 0, 17),
(68, 'Otras', 0, 17),
(69, 'PayPal', 0, 18),
(70, 'Tarjeta Bancaria', 0, 18),
(71, 'Contra reembolso', 0, 18),
(72, 'Transferencias Bancarias', 0, 18),
(73, 'Moneda virtual', 0, 18),
(74, 'Excelente', 0, 19),
(75, 'Buena', 0, 19),
(76, 'Regular', 0, 19),
(77, 'Mala', 0, 19),
(78, 'Si', 0, 20),
(79, 'No', 0, 20),
(80, 'Muy seguro', 0, 21),
(81, 'Seguro', 0, 21),
(82, 'Poco seguro', 0, 21),
(83, 'Inseguro', 0, 21),
(84, 'Si', 0, 22),
(85, 'No', 0, 22),
(86, 'Si', 0, 23),
(87, 'No', 0, 23),
(88, 'TV', 0, 24),
(89, 'Periodico', 0, 24),
(90, 'Redes Sociales', 0, 24),
(91, 'Buscador de Internet', 0, 24),
(92, 'Recomendación de un amigo', 0, 24),
(93, 'Si', 0, 25),
(94, 'No', 0, 25),
(95, 'Estados Unidos', 0, 26),
(96, 'China', 0, 26),
(97, 'Canadá', 0, 26),
(98, 'Otros', 0, 26),
(99, 'El precio', 0, 27),
(100, 'Paginas de confianza', 0, 27),
(101, 'Valoración de los otros usuarios', 0, 27),
(102, 'Imágenes', 0, 27),
(103, 'Reputación del vendedor', 0, 27);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
