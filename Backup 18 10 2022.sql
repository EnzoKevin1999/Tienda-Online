-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema
CREATE DATABASE IF NOT EXISTS `sistema` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `sistema`;

-- Volcando estructura para tabla sistema.color
CREATE TABLE IF NOT EXISTS `color` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.color: ~7 rows (aproximadamente)
INSERT INTO `color` (`Id`, `nombre`) VALUES
	(1, 'azul'),
	(2, 'verde'),
	(3, 'naranja'),
	(5, 'rosado'),
	(6, 'Rojo'),
	(7, 'negro'),
	(8, 'gris'),
	(9, 'blanco');

-- Volcando estructura para tabla sistema.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroventa` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Idcliente` int(11) NOT NULL,
  `observaciones` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Idestado` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Idestado` (`Idestado`),
  KEY `Idcliente` (`Idcliente`),
  CONSTRAINT `FK_compras_estado` FOREIGN KEY (`Idestado`) REFERENCES `estado` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Idcliente`) REFERENCES `usuarios` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.compras: ~5 rows (aproximadamente)
INSERT INTO `compras` (`Id`, `numeroventa`, `fecha`, `Idcliente`, `observaciones`, `Idestado`, `total`) VALUES
	(1, 1, '2022-08-16 22:33:54', 1, '', 7, 0),
	(5, 2, '2022-08-16 22:34:01', 2, '', 8, 0),
	(6, 3, '2022-10-18 22:03:53', 3, '', 7, 0),
	(7, 3, '2022-10-18 22:36:18', 4, '', 7, 0),
	(13, 4, '2022-10-17 14:44:58', 2, ' prueba', 7, 13179);

-- Volcando estructura para tabla sistema.detalle_compra
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Idcompra` int(11) NOT NULL,
  `Idproducto` int(11) NOT NULL,
  `Idcolor` int(11) NOT NULL,
  `Idtalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Idtalle` (`Idtalle`),
  KEY `Idcolor` (`Idcolor`),
  KEY `Idproducto` (`Idproducto`),
  KEY `Idcompra` (`Idcompra`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`Idtalle`) REFERENCES `talle` (`Id`),
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`Idcolor`) REFERENCES `color` (`Id`),
  CONSTRAINT `detalle_compra_ibfk_3` FOREIGN KEY (`Idproducto`) REFERENCES `producto` (`Id`),
  CONSTRAINT `detalle_compra_ibfk_4` FOREIGN KEY (`Idcompra`) REFERENCES `compras` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.detalle_compra: ~4 rows (aproximadamente)
INSERT INTO `detalle_compra` (`Id`, `Idcompra`, `Idproducto`, `Idcolor`, `Idtalle`, `cantidad`, `precio_unitario`, `subtotal`, `nombre`) VALUES
	(1, 1, 4, 3, 2, 2, 20000, 40000, 'Zapatilla Olimpicus XX'),
	(2, 1, 2, 3, 2, 1, 12000, 12000, 'Otra Zapa Nike'),
	(3, 13, 4, 8, 1, 1, 8179, 8179, 'Zapatillas Olympikus Mujer Anyway'),
	(4, 13, 1, 2, 1, 1, 5000, 5000, 'Zapatillas Olimpikus hombre traction ej');

-- Volcando estructura para tabla sistema.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.estado: ~3 rows (aproximadamente)
INSERT INTO `estado` (`Id`, `Estado`) VALUES
	(7, 'Pendiente'),
	(8, 'Entregado'),
	(9, 'Cancelado');

-- Volcando estructura para tabla sistema.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.marca: ~6 rows (aproximadamente)
INSERT INTO `marca` (`Id`, `nombre`) VALUES
	(1, 'Olimpikus'),
	(2, 'Nike'),
	(3, 'Topper'),
	(4, 'Adidas'),
	(5, 'LaGear'),
	(6, 'Avia'),
	(7, 'Fila');

-- Volcando estructura para tabla sistema.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Id_marca` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fkidmarca` (`Id_marca`),
  CONSTRAINT `FK_producto_marca` FOREIGN KEY (`Id_marca`) REFERENCES `marca` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.producto: ~9 rows (aproximadamente)
INSERT INTO `producto` (`Id`, `codigo`, `nombre`, `descripcion`, `imagen`, `Id_marca`, `precio`) VALUES
	(1, 'Olimphombretrac', 'Zapatillas Olimpikus hombre traction ej', 'Calzado de hombre para outdoor marca Olympikus. El modelo todo amante de los deportes al aire libre necesita. Son flexibles, ligeras y cuentan con una suela adaptable a cualquier tipo de terreno.', 'zapatilla1.jpeg', 1, 5000),
	(2, 'NikeAirmax', 'Zapatillas Nike Air Max 270 React Se', 'Con las Zapatillas Nike Air Max 270 React Se, iniciar tu jornada de ejercicio con comodidad y estilo, la espuma suave, su cámara de aire con una estética llamativa y visible te dará una mejor amortiguación en cada paso y mejor tracción cuando corrés o caminás.', 'zapatilla2.jpeg', 2, 35999),
	(3, 'topperfasthombre', 'Zapatillas Topper Hombre Fast azul', 'Calzado de hombre para running marca Topper. Diseño y elegancia en un calzado de performance para corredores exigentes que priorizan la sujeción y el bajo peso, sin sacrificar velocidad. Capellada de open mesh, con apliques de film y pieza lateral plástica calada para aumentar la protección y minimizar el peso. Suela con T-Cushion para reducir la presión y mejorar la absorción del impacto. Diseño específico de la base de suela para un óptimo agarre. Goma resistente a la abrasión.', 'zapatilla3.jpeg', 3, 13799),
	(4, 'Olimpanywaymujer', 'Zapatillas Olympikus Mujer Anyway', 'Calzado de mujer para fitness marca Olympikus. Desarrolladas para mujeres que buscan comodidad y protección en su rutina de entrenamiento. Tiene una parte superior de textil y además de tecnologías exclusivas, también cuenta con una suela de Eva antideslizante.', 'zapatilla4.jpeg', 1, 8179),
	(5, 'Adidasforumlow', 'Zapatillas adidas Forum Low rosado', 'Con un estilo urbano y para recorrer diferentes lugares, las zapatillas Adidas Forum Low están confeccionadas en cuero sintético y suela de goma para un mayor agarre sobre la superficie. Su ajuste con cordones y velcro le dan un toque retro, inspirado en 1984 cuando las Forum salieron por primera vez a conquistar canchas de básquet y el mundo del hip-hop. Usalas todo el día, las calles de tu ciudad las estaban esperando.', 'zapatilla5.jpeg', 4, 23999),
	(6, 'LaGearsilverlakemujer', 'Zapatillas LA Gear Mujer Silver Lake', 'Calzado de mujer marca LA Gear. Con capellada textil de poliester, suela de eva, logo lateral y aporte de TPU.', 'zapatilla6.jpg', 5, 12299),
	(7, 'LaGearvenicemujer', 'Zapatillas LA Gear Mujer Venice negro', 'Calzado urbano de mujer marca LA Gear. Modelo de linea clásica, con capellada confeccionada con materiales perforados. Cuenta con una lengüeta confortable, plantilla acolchada y suela de caucho.', 'zapatilla7.jpg', 5, 10799),
	(8, 'Aviasmashtennishombre', 'Zapatillas Avia Hombre Smash Tennis Mesh PU EVA', 'Calzado de hombre para tenis marca Avia. Ideales para tener buen agarre, frescura y resistencia a los impactos. Con capellada realizada en mesh con refuerzos en PU aplicado con Heatseal en la puntera, en el lateral y en las zonas donde se produce el mayor desgaste del calzado. La entresuela es muy liviana y de gran amortiguación ya que es de EVA inyectada con shank de TPU que proporciona estabilidad en la pisada y la suela es de goma para obtener adherencia y tracción en cualquier superficie. ', 'zapatilla8.jpg', 6, 22990),
	(9, 'Filatrendhombre', 'Zapatillas Fila Hombre Trend 2.0', 'Calzado urbano de hombre marca Fila. Posee un sistema de ajuste Slip-On y su capellada está confeccionada con un tejido con tecnología Engineered-Mesh, también elástico en el lateral del pie y un contrafuerte reforzado de doble espuma. Entresuela monobloc con Energized Rubber de anatomía diferenciada. Plantilla de confort Super-Foam. ', 'zapatilla9.jpg', 7, 14160),
	(10, 'Filaforcehombreazul', 'Zapatillas Fila Hombre Force azul', 'Calzado deportivo de hombre marca Fila. Con un diseño delicado y minimalista, su parte superior está fabricada con tejido de malla y piezas de TPU fusionadas para garantizar la transpirabilidad y la suavidad. La suela cuenta con la tecnología ENERGIZED RUBBER (compuesta por EVA de densidad media), que transforma el impacto de la pisada en propulsión', 'zapatilla10.jpg', 7, 12529);

-- Volcando estructura para tabla sistema.producto_color
CREATE TABLE IF NOT EXISTS `producto_color` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_color` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_producto` (`Id_producto`),
  KEY `Id_color` (`Id_color`),
  CONSTRAINT `producto_color_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id`),
  CONSTRAINT `producto_color_ibfk_2` FOREIGN KEY (`Id_color`) REFERENCES `color` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.producto_color: ~11 rows (aproximadamente)
INSERT INTO `producto_color` (`Id`, `Id_color`, `Id_producto`) VALUES
	(2, 2, 1),
	(3, 2, 2),
	(4, 8, 4),
	(5, 5, 4),
	(6, 9, 5),
	(7, 6, 5),
	(8, 7, 6),
	(84, 1, 3),
	(85, 3, 3),
	(86, 5, 3),
	(87, 2, 3);

-- Volcando estructura para tabla sistema.prod_talle
CREATE TABLE IF NOT EXISTS `prod_talle` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_talle` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_talle` (`Id_talle`),
  KEY `Id_producto` (`Id_producto`),
  CONSTRAINT `prod_talle_ibfk_1` FOREIGN KEY (`Id_talle`) REFERENCES `talle` (`Id`),
  CONSTRAINT `prod_talle_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.prod_talle: ~7 rows (aproximadamente)
INSERT INTO `prod_talle` (`Id`, `Id_talle`, `Id_producto`) VALUES
	(2, 1, 1),
	(3, 1, 2),
	(4, 1, 4),
	(5, 2, 4),
	(6, 1, 5),
	(167, 1, 3),
	(168, 2, 3),
	(169, 3, 3);

-- Volcando estructura para tabla sistema.talle
CREATE TABLE IF NOT EXISTS `talle` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.talle: ~5 rows (aproximadamente)
INSERT INTO `talle` (`Id`, `numero`) VALUES
	(1, 40),
	(2, 41),
	(3, 42),
	(4, 43),
	(8, 44);

-- Volcando estructura para tabla sistema.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sistema.usuarios: ~5 rows (aproximadamente)
INSERT INTO `usuarios` (`Id`, `nombre`, `correo`, `usuario`, `clave`, `tipo_usuario`) VALUES
	(1, '', '0', 'admin', 'adminroot', 1),
	(2, 'Enzo', 'enzokevinscognetti@gmail.com', 'Enzo', '1234', 1),
	(3, 'test', 'test@test.com', 'test', 'test', 0),
	(4, 'Anselma', 'Ansel21morinigo@gmail.com', 'Ansel1961', '1234', 0),
	(5, 'Daniel', 'DanielOscarScognetti@gmail.com', 'Daniel1960', '1234', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
