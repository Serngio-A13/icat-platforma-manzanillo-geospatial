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

-- Máximo previsto: tres cuentas individuales para el equipo investigador.
-- Las contraseñas se guardan únicamente como hashes generados por password_hash().
CREATE TABLE IF NOT EXISTS usuarios (
  id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
  nombre_completo VARCHAR(120) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  rol ENUM('investigador') NOT NULL DEFAULT 'investigador',
  activo TINYINT(1) NOT NULL DEFAULT 1,
  ultimo_acceso DATETIME NULL,
  creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  actualizado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS auditoria_admin (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  usuario_id TINYINT UNSIGNED NULL,
  accion VARCHAR(80) NOT NULL,
  entidad VARCHAR(80) NOT NULL,
  entidad_id VARCHAR(80) NULL,
  detalle VARCHAR(500) NULL,
  ip_hash CHAR(64) NULL,
  creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_auditoria_usuario (usuario_id),
  INDEX idx_auditoria_fecha (creado_en),
  CONSTRAINT fk_auditoria_usuario FOREIGN KEY (usuario_id)
    REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB;
