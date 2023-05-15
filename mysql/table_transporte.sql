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

-- Volcando estructura para tabla atencion.choferes
CREATE TABLE IF NOT EXISTS `choferes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `empresas_id` int NOT NULL,
  `vehiculos_id` int DEFAULT NULL,
  `cedula` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.choferes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla atencion.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rif` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.empresas: ~4 rows (aproximadamente)

-- Volcando estructura para tabla atencion.guias
CREATE TABLE IF NOT EXISTS `guias` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `guias_tipos_id` int NOT NULL,
  `tipos_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_id` int NOT NULL,
  `vehiculos_tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_marca` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_placa_batea` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_placa_chuto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `vehiculos_capacidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `choferes_id` int NOT NULL,
  `choferes_cedula` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `choferes_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `choferes_telefono` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `territorios_origen` int NOT NULL,
  `territorios_destino` int NOT NULL,
  `rutas_id` int NOT NULL,
  `rutas_origen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rutas_destino` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rutas_ruta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `users_id` int NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `auditoria` text COLLATE utf8mb4_spanish_ci,
  `deleted_at` date DEFAULT NULL,
  `pdf_id` int DEFAULT '1',
  `pdf_impreso` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.guias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla atencion.guias_carga
CREATE TABLE IF NOT EXISTS `guias_carga` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `guias_id` int NOT NULL,
  `cantidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.guias_carga: ~0 rows (aproximadamente)

-- Volcando estructura para tabla atencion.guias_formatos_pdf
CREATE TABLE IF NOT EXISTS `guias_formatos_pdf` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.guias_formatos_pdf: ~1 rows (aproximadamente)
INSERT INTO `guias_formatos_pdf` (`id`, `nombre`) VALUES
	(1, 'guia_1.php');

-- Volcando estructura para tabla atencion.guias_tipos
CREATE TABLE IF NOT EXISTS `guias_tipos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.guias_tipos: ~2 rows (aproximadamente)
INSERT INTO `guias_tipos` (`id`, `nombre`, `codigo`) VALUES
	(1, 'BOLSAS CLAP', 'BC'),
	(2, 'RUBROS', 'RB');

-- Volcando estructura para tabla atencion.rutas
CREATE TABLE IF NOT EXISTS `rutas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `origen` int unsigned NOT NULL,
  `destino` int unsigned NOT NULL,
  `ruta` text COLLATE utf8mb4_spanish_ci,
  `band` int DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.rutas: ~1 rows (aproximadamente)

-- Volcando estructura para tabla atencion.rutas_territorio
CREATE TABLE IF NOT EXISTS `rutas_territorio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `municipio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `parroquia` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.rutas_territorio: ~0 rows (aproximadamente)
INSERT INTO `rutas_territorio` (`id`, `municipio`, `parroquia`) VALUES
	(1, 'JUAN GERMÁN ROSCIO NIEVES CAPITAL', 'SAN JUAN DE LOS MORROS'),
	(2, 'ORTIZ', 'SAN JOSÉ DE TIZNADO');

-- Volcando estructura para tabla atencion.vehiculos
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresas_id` int NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `placa_batea` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `placa_chuto` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `capacidad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.vehiculos: ~2 rows (aproximadamente)

-- Volcando estructura para tabla atencion.vehiculos_tipo
CREATE TABLE IF NOT EXISTS `vehiculos_tipo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla atencion.vehiculos_tipo: ~2 rows (aproximadamente)
INSERT INTO `vehiculos_tipo` (`id`, `nombre`) VALUES
	(1, 'GANDOLA PLATAFORMA'),
	(2, 'CAMIÓN PLATAFORMA'),
	(3, 'CAMIÓN CAVA');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
