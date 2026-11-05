<?php
/** Página independiente del módulo: Datos y resultados. Se conserva el contenido existente y sus avisos de validación. */
$pageTitle = 'Datos y resultados | Atlas digital del litoral de Manzanillo';
$activePage = 'resultados';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Datos y resultados del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head><body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section results-section" id="resultados">
  <div class="section-heading"><div><div class="kicker">06 / REPOSITORIO CIENTÍFICO</div><h2>Datos y <span>resultados</span></h2></div><p class="section-lead">Catálogo consultable para productos, informes, perfiles topográficos y conjuntos de datos, con filtros y metadatos.</p></div>
  <div class="repository-layout"><aside class="filter-panel"><h3>Filtrar por</h3><label for="filter-type">Tipo de producto</label><select id="filter-type"><option value="todos">Todos</option><option value="mapa">Mapa / SIG</option><option value="perfil">Perfil de playa</option><option value="ortomosaico">Ortomosaico</option><option value="datos">Datos científicos</option><option value="documento">Documento</option></select><label for="filter-site">Playa / sitio</label><select id="filter-site"><option value="todos">Todos</option><option value="manzanillo">Manzanillo</option><option value="miramar">Miramar</option><option value="audiencia">La Audiencia</option><option value="santiago">Santiago</option><option value="ventanas">Ventanas</option></select><label for="filter-year">Año</label><select id="filter-year"><option value="todos">Todos</option><option>2024</option><option>2023</option><option>2020</option><option>2012</option></select><button class="outline-button" id="clear-filters">Limpiar filtros</button></aside>
    <div class="repository"><div class="repository-head"><div><h3>Mapas temáticos disponibles</h3><p>Documentos cartográficos recibidos en el repositorio de trabajo Mapa1.</p></div><span>5 mapas PDF</span></div>
    <div class="research-map-grid">
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de batimetría" data-map-title="Mapa de batimetría" data-map-url="../assets/maps/documentos/batimetria.pdf">⌁</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de batimetría</h3><p>Representación de profundidades y relieve submarino.</p><button type="button" class="map-open-button" data-map-title="Mapa de batimetría" data-map-url="../assets/maps/documentos/batimetria.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de clima" data-map-title="Mapa de clima" data-map-url="../assets/maps/documentos/clima.pdf">☼</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de clima</h3><p>Documento cartográfico de variables climáticas.</p><button type="button" class="map-open-button" data-map-title="Mapa de clima" data-map-url="../assets/maps/documentos/clima.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de crecimiento urbano" data-map-title="Mapa de crecimiento urbano" data-map-url="../assets/maps/documentos/crecimiento-urbano.pdf">⌂</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de crecimiento urbano</h3><p>Material para consultar la expansión urbana representada en el mapa.</p><button type="button" class="map-open-button" data-map-title="Mapa de crecimiento urbano" data-map-url="../assets/maps/documentos/crecimiento-urbano.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de uso y cambio de suelo" data-map-title="Mapa de uso y cambio de suelo" data-map-url="../assets/maps/documentos/uso-cambio-suelo.pdf">▦</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de uso y cambio de suelo</h3><p>Documento relacionado con el uso del suelo y sus cambios.</p><button type="button" class="map-open-button" data-map-title="Mapa de uso y cambio de suelo" data-map-url="../assets/maps/documentos/uso-cambio-suelo.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de puntos de Manzanillo" data-map-title="Mapa de puntos de Manzanillo" data-map-url="../assets/maps/documentos/puntos-manzanillo.pdf">⌖</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de puntos de Manzanillo</h3><p>Mapa de referencia de los puntos del área de estudio.</p><button type="button" class="map-open-button" data-map-title="Mapa de puntos de Manzanillo" data-map-url="../assets/maps/documentos/puntos-manzanillo.pdf">Consultar mapa ↗</button></div></article>
    </div><p class="note">Los documentos se consultan desde el repositorio fuente. Antes de publicarlos institucionalmente, confirma la autorización de difusión, la autoría y los metadatos de cada mapa.</p></div>
  </div>
</section></main>
<!-- Ventana emergente de mapas: permite consultar el PDF y descargarlo sin abandonar el Atlas. -->
<div class="map-modal" id="research-map-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="research-map-title">
  <div class="map-modal-backdrop" data-map-close></div>
  <section class="map-modal-panel" role="document">
    <header class="map-modal-header"><div><small>REPOSITORIO CARTOGRÁFICO</small><h2 id="research-map-title">Mapa temático</h2></div><button type="button" class="map-modal-close" data-map-close aria-label="Cerrar y regresar al sitio">×</button></header>
    <div class="map-modal-actions"><a id="research-map-download" class="button primary" href="#" download>Abrir PDF ↗</a><button type="button" class="button ghost" data-map-close>Regresar al atlas ↗</button></div>
    <div class="pdf-viewer" id="research-pdf-viewer" aria-live="polite"><div class="pdf-viewer-toolbar"><button type="button" id="pdf-prev" disabled>← Anterior</button><span id="pdf-page-status">Preparando visor…</span><button type="button" id="pdf-next" disabled>Siguiente →</button><button type="button" id="pdf-zoom-out" aria-label="Reducir zoom">−</button><button type="button" id="pdf-zoom-in" aria-label="Aumentar zoom">+</button></div><div class="pdf-canvas-wrap" id="pdf-canvas-wrap"><p class="pdf-loading" id="pdf-loading">Cargando documento…</p><canvas id="pdf-canvas" hidden></canvas></div></div>
    <p class="map-modal-note">La vista previa usa PDF.js. Si el servidor de archivos de origen bloquea la lectura del PDF, utiliza «Abrir PDF» para consultarlo en otra pestaña.</p>
  </section>
</div>
<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body></html>