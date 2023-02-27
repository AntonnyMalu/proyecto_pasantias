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


-- Volcando estructura de base de datos para alguarisa
CREATE DATABASE IF NOT EXISTS `alguarisa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `alguarisa`;

-- Volcando estructura para tabla alguarisa.casos
CREATE TABLE IF NOT EXISTS `casos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personas_id` int NOT NULL,
  `fecha` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `hora` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `donativo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.casos: ~14 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.firmantes
CREATE TABLE IF NOT EXISTS `firmantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `band` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.firmantes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.instituciones
CREATE TABLE IF NOT EXISTS `instituciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rif` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.instituciones: ~4 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.oficios
CREATE TABLE IF NOT EXISTS `oficios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instituciones_id` int NOT NULL,
  `personas_id` int NOT NULL,
  `fecha` date NOT NULL,
  `requerimientos` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `band` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.oficios: ~9 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.personas: ~11 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `casos_id` int NOT NULL,
  `producto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `band` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla alguarisa.productos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla alguarisa.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `band` int NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla alguarisa.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `email`, `password`, `name`, `role`, `band`, `created_at`, `updated_at`) VALUES
	(1, 'leothan522@gmail.com', '20025623', 'Yonathan Castillo', 100, 1, '2023-01-22', '2023-01-22'),
	(2, 'gabrielmalu15@gmail.com', '1234am', ' antonny maluenga', 100, 1, '2023-01-22', '2023-01-22'),
	(3, 'hola@gmail.com', '20025623', 'hola', 0, 1, '2023-02-16', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
