<?php
/** Navegación común de páginas interiores; la portada conserva solo sus cinco accesos. */
?>
<header class="site-header">
  <a class="brand" href="<?= htmlspecialchars($atlasBaseUrl . '/index.php', ENT_QUOTES, 'UTF-8') ?>" aria-label="Regresar a la portada del Atlas">
    <span class="brand-mark">UNAM</span><span><strong>ATLAS DIGITAL DEL LITORAL</strong><small>Manzanillo · Colima · PAPIIT IF100926</small></span>
  </a>
  <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav">Menú ☰</button>
  <nav id="main-nav" aria-label="Navegación de módulos">
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/index.php', ENT_QUOTES, 'UTF-8') ?>">Portada</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/proyecto.php', ENT_QUOTES, 'UTF-8') ?>">El proyecto</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/visor.php', ENT_QUOTES, 'UTF-8') ?>">Visor geoespacial</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/modelos.php', ENT_QUOTES, 'UTF-8') ?>">Modelos 3D</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/timeline.php', ENT_QUOTES, 'UTF-8') ?>">Línea del tiempo</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/peligro-costero.php', ENT_QUOTES, 'UTF-8') ?>">Vulnerabilidad</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/resultados.php', ENT_QUOTES, 'UTF-8') ?>">Datos y resultados</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/multimedia.php', ENT_QUOTES, 'UTF-8') ?>">Multimedia</a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/participantes.php', ENT_QUOTES, 'UTF-8') ?>">Participantes</a>
  </nav>
</header>