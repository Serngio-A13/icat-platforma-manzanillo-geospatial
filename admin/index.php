<?php
declare(strict_types=1);
require_once __DIR__ . '/../php/admin/auth.php';
require_once __DIR__ . '/../php/config/database.php';
requireAdmin();

$dbReady = false;
$userCount = 0;
$contentCount = 0;
$mediaCount = 0;
try {
    $pdo = getDatabaseConnection();
    $dbReady = true;
    $userCount = (int)$pdo->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
    $contentCount = (int)$pdo->query('SELECT COUNT(*) FROM contenidos')->fetchColumn();
    $mediaCount = (int)$pdo->query('SELECT COUNT(*) FROM archivos_multimedia')->fetchColumn();
} catch (Throwable $e) {
    error_log('[ICAT admin dashboard] ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel administrativo | Atlas Digital Litoral</title>
  <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body class="admin-body">
  <header class="admin-topbar">
    <a class="brand-link" href="../">Atlas Digital Litoral <span>Administración</span></a>
    <form method="post" action="/admin/logout.php">
      <input type="hidden" name="csrf_token" value="<?= escapeHtml(adminCsrfToken()) ?>">
      <button class="button-secondary" type="submit">Cerrar sesión</button>
    </form>
  </header>
  <main class="admin-main">
    <p class="eyebrow">PANEL DE CONTROL</p>
    <h1>Hola, <?= escapeHtml($_SESSION['admin_name'] ?? $_SESSION['admin_username']) ?></h1>
    <p class="muted">Desde aquí se gestionará el contenido público de la plataforma. Este primer módulo establece el acceso seguro y la estructura general.</p>

    <div class="status-banner <?= $dbReady ? 'status-ok' : 'status-error' ?>">
      <strong><?= $dbReady ? 'Base de datos conectada' : 'Base de datos sin conexión' ?></strong>
      <span><?= $dbReady ? 'La conexión con MariaDB funciona.' : 'Revisa la configuración en php/config/database.php y las variables DB_*.' ?></span>
    </div>

    <section class="stats-grid" aria-label="Resumen del sistema">
      <article class="stat-card"><span>Cuentas registradas</span><strong><?= $userCount ?> / 3</strong><small>Las cuentas se preparan desde consola; no hay registro público.</small></article>
      <article class="stat-card"><span>Contenidos</span><strong><?= $contentCount ?></strong><small>Textos y secciones que podrán administrarse.</small></article>
      <article class="stat-card"><span>Archivos multimedia</span><strong><?= $mediaCount ?></strong><small>Imágenes, videos, documentos y recursos geoespaciales.</small></article>
    </section>

    <h2>Módulos previstos</h2>
    <section class="module-grid">
      <article class="module-card"><span class="module-icon">Aa</span><h3>Contenidos</h3><p>Editar textos, objetivos y metodología.</p><span class="module-status">Siguiente etapa</span></article>
      <article class="module-card"><span class="module-icon">▧</span><h3>Multimedia</h3><p>Agregar imágenes y documentos con fuente y descripción.</p><span class="module-status">Siguiente etapa</span></article>
      <article class="module-card"><span class="module-icon">⌖</span><h3>Capas geoespaciales</h3><p>Registrar GeoJSON y metadatos de las capas.</p><span class="module-status">Planeado</span></article>
      <article class="module-card"><span class="module-icon">◇</span><h3>Modelos 3D</h3><p>Administrar enlaces de recorridos y modelos.</p><span class="module-status">Planeado</span></article>
    </section>
    <p class="notice">Aviso: este panel es una primera base de trabajo. Los formularios para editar y cargar recursos todavía no están implementados.</p>
  </main>
</body>
</html>
