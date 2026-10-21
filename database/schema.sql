CREATE DATABASE IF NOT EXISTS icat_manzanillo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE icat_manzanillo;

CREATE TABLE IF NOT EXISTS contenidos (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(180) NOT NULL,
  slug VARCHAR(200) NOT NULL UNIQUE,
  resumen TEXT NULL,
  cuerpo LONGTEXT NULL,
  estado ENUM('borrador','publicado','archivado') NOT NULL DEFAULT 'borrador',
  creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  actualizado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS archivos_multimedia (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(180) NOT NULL,
  descripcion TEXT NULL,
  tipo ENUM('imagen','video','documento','geojson','tour_3d','otro') NOT NULL DEFAULT 'otro',
  ruta VARCHAR(500) NOT NULL,
  fuente VARCHAR(250) NULL,
  fecha_recurso DATE NULL,
  visible TINYINT(1) NOT NULL DEFAULT 0,
  creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_multimedia_tipo (tipo),
  INDEX idx_multimedia_visible (visible)
) ENGINE=InnoDB;