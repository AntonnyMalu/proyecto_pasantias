-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para atencion
CREATE DATABASE IF NOT EXISTS `atencion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `atencion`;

-- Volcando estructura para tabla atencion.nomina_ubicaciones
CREATE TABLE IF NOT EXISTS `nomina_ubicaciones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.nomina_ubicaciones: ~34 rows (aproximadamente)
INSERT INTO `nomina_ubicaciones` (`id`, `tipo`, `nombre`, `band`) VALUES
	(1, 'geografica', 'CAMAGUAN', 1),
	(2, 'geografica', 'ROSCIO', 1),
	(3, 'geografica', 'MIRANDA', 1),
	(4, 'geografica', 'INFANTE', 1),
	(5, 'geografica', 'RIBAS', 1),
	(6, 'geografica', 'EL SOCORRO', 1),
	(7, 'geografica', 'GUAYABAL', 1),
	(8, 'geografica', 'GUARIBE', 1),
	(9, 'administrativa', 'PRESIDENCIA', 1),
	(10, 'administrativa', 'OPERACIONES Y LOGISTICA', 1),
	(11, 'administrativa', 'ADMINISTRACION Y COMERCIALIZACION', 1),
	(12, 'administrativa', 'SERVICIOS GENERALES', 1),
	(13, 'administrativa', 'BIENES', 1),
	(14, 'administrativa', 'CONTABILIDAD', 1),
	(15, 'administrativa', 'GMAS', 1),
	(16, 'administrativa', 'PRESUPUESTO Y PLANIFICACION', 1),
	(17, 'administrativa', 'CEAC', 1),
	(18, 'administrativa', 'TIENDA', 1),
	(19, 'administrativa', 'RRHH', 1),
	(20, 'administrativa', 'COMPRAS', 1),
	(21, 'administrativa', 'CONSULTORIA JURIDICA', 1),
	(22, 'administrativa', 'PLANIFICACION DISTRIBUCION Y ESTADISTICA', 1),
	(23, 'administrativa', 'FACTURACION', 1),
	(24, 'administrativa', 'CONTROL Y SEGUIMIENTO', 1),
	(25, 'administrativa', 'TECNOLOGIA Y SISTEMAS', 1),
	(26, 'administrativa', 'ATENCION AL CIUDADANO', 1),
	(27, 'administrativa', 'CAMPO SOBERANO', 1),
	(28, 'administrativa', 'RELACIONES PUBLICAS', 1),
	(29, 'administrativa', 'TESORERIA', 1),
	(30, 'administrativa', 'COBRANZA', 1),
	(31, 'administrativa', 'COMERCIALIZACION', 1),
	(32, 'administrativa', 'SEGURIDAD', 1),
	(33, 'administrativa', 'COCINA', 1),
	(34, 'administrativa', 'SEDE', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
