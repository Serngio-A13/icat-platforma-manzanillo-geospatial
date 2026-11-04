<?php
declare(strict_types=1);
$pageTitle = 'Atlas digital del litoral de Manzanillo | PAPIIT IF100926';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Atlas digital del litoral de Manzanillo: visor geoespacial, modelos 3D, línea del tiempo, vulnerabilidad costera, resultados científicos y multimedia.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<!-- Bootstrap 5: sistema de cuadrícula responsiva para distribuir los módulos. -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Estilos propios del Atlas; se cargan después de Bootstrap para conservar la identidad visual. -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- Ajustes responsivos documentados para el visor geoespacial integrado. -->
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- Componentes visuales de la galería y del catálogo cartográfico real. -->
<link rel="stylesheet" href="assets/css/research-library.css">
<!-- El mapa tiene sus propias dependencias aisladas en un iframe. -->
<script defer src="assets/js/app.js"></script>
<script type="module" src="assets/js/pdf-viewer.js"></script>
</head>
<body>
<header class="site-header">
  <a class="brand" href="#inicio" aria-label="Atlas digital del litoral de Manzanillo, inicio">
    <span class="brand-mark">UNAM</span><span><strong>ATLAS DIGITAL DEL LITORAL</strong><small>Manzanillo · Colima · PAPIIT IF100926</small></span>
  </a>
  <button class="menu-toggle" aria-expanded="false" aria-controls="main-nav">Menú ☰</button>
  <nav id="main-nav" aria-label="Navegación principal">
    <a href="#inicio">Inicio</a><a href="#proyecto">El proyecto</a><a href="#visor">Visor geoespacial</a><a href="#modelos">Modelos 3D</a><a href="#tiempo">Línea del tiempo</a><a href="#vulnerabilidad">Vulnerabilidad</a><a href="#resultados">Datos y resultados</a><a href="#participantes">Participantes</a><a href="#multimedia">Multimedia</a>
  </nav>
</header>
<main>
<!-- Portada principal: presenta el propósito y la identidad del Atlas. -->
<section class="hero" id="inicio">
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-content">
    <p class="eyebrow">INFRAESTRUCTURA ACADÉMICA DIGITAL · PAPIIT IF100926</p>
    <h1>Atlas digital<br>del litoral de <span>Manzanillo</span></h1>
    <p class="lead">Una plataforma de consulta para explorar información geoespacial de la vulnerabilidad costera mediante SIG, fotogrametría, modelos 3D y análisis multitemporal.</p>
    <div class="actions"><a class="button primary" href="#visor">Explorar el atlas <span aria-hidden="true">↗</span></a><a class="button ghost" href="#proyecto">Conocer el proyecto</a></div>
    <div class="hero-meta">19°03′ N <i></i> 104°19′ O <i></i> OCÉANO PACÍFICO</div>
  </div>
  <div class="hero-aside">GEOSPATIAL COASTAL RESEARCH / IF100926</div>
  <div class="hero-bottom"><span>INFORMACIÓN · TERRITORIO · MEMORIA COSTERA</span><a href="#servicios" aria-label="Ver módulos">↓</a></div>
</section>
<!-- Accesos rápidos: enlazan con los módulos principales de la plataforma. -->
<section class="quick-links" id="servicios" aria-label="Módulos principales">
  <a href="#visor"><span class="module-icon">⌖</span><strong>Visor geoespacial</strong><small>Mapas y capas temáticas</small><b>↗</b></a>
  <a href="#modelos"><span class="module-icon">◇</span><strong>Modelos 3D</strong><small>Playas, acantilados y relieve</small><b>↗</b></a>
  <a href="#tiempo"><span class="module-icon">◷</span><strong>Línea del tiempo</strong><small>Cambios del litoral</small><b>↗</b></a>
  <a href="#vulnerabilidad"><span class="module-icon">≋</span><strong>Vulnerabilidad costera</strong><small>Variables y niveles de riesgo</small><b>↗</b></a>
  <a href="#resultados"><span class="module-icon">▤</span><strong>Datos y resultados</strong><small>Consulta de productos científicos</small><b>↗</b></a>
</section>
<!-- Módulo 01: descripción, objetivos y metodología del proyecto. -->
<section class="section" id="proyecto">
  <div class="kicker">01 / EL PROYECTO</div>
  <div class="intro-layout"><div><p class="eyebrow">CIENCIA · TECNOLOGÍA · TERRITORIO</p><h2>Conocer el litoral.<br><span>Comprender sus cambios.</span></h2></div>
    <div class="intro-copy"><p>El proyecto PAPIIT IF100926 propone integrar productos geoespaciales y resultados científicos para apoyar el estudio de la vulnerabilidad costera en Manzanillo, Colima.</p><p>El atlas organiza la información del proyecto para su consulta por investigadores, estudiantes, instituciones y público interesado. Los contenidos científicos se incorporarán conforme el equipo de investigación los proporcione y valide.</p><a class="text-link" href="#resultados">Consultar módulos del atlas ↗</a></div>
  </div>
  <div class="project-tabs"><div class="tab-list" role="tablist" aria-label="Información del proyecto"><button class="tab-button is-active" role="tab" aria-selected="true" data-project-tab="introduccion">Introducción</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="objetivos">Objetivos</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="metodologia">Metodología</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="area">Área de estudio</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="productos">Productos</button></div>
    <div class="tab-panel" id="project-tab-panel" role="tabpanel"><h3>Introducción</h3><p>Consulta integrada de materiales geoespaciales, fotogramétricos y científicos relacionados con el litoral de Manzanillo. Esta versión es una maqueta funcional; los datos reales se cargarán tras su validación.</p></div>
  </div>
</section>
<section class="section map-section" id="visor">
  <!-- Encabezado del módulo: describe el contenido real disponible en esta versión. -->
  <div class="section-heading">
    <div>
      <div class="kicker">02 / EXPLORACIÓN ESPACIAL</div>
      <h2>Visor <span>geoespacial</span></h2>
    </div>
    <p class="section-lead">Explora los puntos de perfiles costeros y consulta las fotografías asociadas. La información se presenta tal como fue entregada; su interpretación científica debe seguir los criterios del equipo investigador.</p>
  </div>

  <!-- Bootstrap distribuye el panel informativo y el mapa en columnas adaptables. -->
  <div class="gis-layout row g-3">
    <aside class="layer-panel col-12 col-lg-3" aria-label="Información del mapa">
      <div class="kicker">CAPA DISPONIBLE</div>
      <h3>Perfiles de playa</h3>
      <p>El mapa contiene 31 puntos identificados de P01 a P31, con fotografías asociadas a cada perfil.</p>
      <div class="panel-rule"></div>
      <h3>Cómo explorar</h3>
      <ul class="tool-list">
        <li>Acercar o alejar con los controles del mapa.</li>
        <li>Arrastrar el mapa para desplazarse por la zona.</li>
        <li>Seleccionar un punto para consultar su fotografía.</li>
        <li>Usar el control de zoom para cambiar la escala.</li>
      </ul>
      <div class="panel-rule"></div>
      <p class="note">La capa visible corresponde al archivo recibido. No se presentan aquí índices de vulnerabilidad ni resultados multitemporales.</p>
    </aside>

    <!-- El iframe aísla las bibliotecas del mapa de los estilos y scripts del sitio principal. -->
    <div class="map-shell col-12 col-lg-9">
      <div class="map-toolbar">
        <span><i class="dot" aria-hidden="true"></i> MAPA INTERACTIVO · PERFILES DE PLAYA</span>
        <span>MANZANILLO, COLIMA</span>
      </div>
      <div class="map-frame-wrap">
        <iframe
          class="coastal-map-frame"
          src="assets/maps/perfiles-costero/index.html"
          title="Mapa interactivo de perfiles costeros de Manzanillo"
          loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin"></iframe>
      </div>
      <div class="map-legend">
        <span>Puntos de perfil y fotografías asociadas</span>
        <span>Cartografía satelital: atribución en el mapa</span>
      </div>
    </div>
  </div>

  <!-- Nota de trazabilidad: no confundir esta capa de perfiles con una evaluación de riesgo. -->
  <p class="note">La integración conserva los puntos y las fotografías del mapa recibido. Antes de la publicación institucional se deberán confirmar la procedencia, los metadatos y las condiciones de uso de la cartografía base.</p>
</section>
<!-- Módulo 03: catálogo de modelos tridimensionales. -->
<section class="section" id="modelos">
  <div class="section-heading"><div><div class="kicker">03 / EXPLORACIÓN TRIDIMENSIONAL</div><h2>Modelos <span>3D</span></h2></div><p class="section-lead">Catálogo preparado para modelos publicados en Sketchfab u otros visores autorizados, según los materiales que entregue el equipo.</p></div>
  <div class="catalog-layout"><aside class="category-panel"><h3>Categorías</h3><button class="category-button is-active" data-model-category="todos">Todas</button><button class="category-button" data-model-category="playas">Playas</button><button class="category-button" data-model-category="acantilados">Acantilados</button><button class="category-button" data-model-category="formaciones">Formaciones</button><button class="category-button" data-model-category="perfiles">Perfiles costeros</button><button class="category-button" data-model-category="fotogrametria">Fotogrametría aérea</button><button class="category-button" data-model-category="topografia">Modelos topográficos</button></aside>
    <div class="model-grid">
      <article class="model-card" data-model="playas,formaciones,fotogrametria"><div class="model-art art-coast"><span>MODELO 3D · PENDIENTE</span><b>◇</b></div><div class="model-card-body"><small>PLAYAS</small><h3>Playa La Audiencia</h3><p>Manzanillo, Colima · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
      <article class="model-card" data-model="acantilados,formaciones"><div class="model-art art-cliff"><span>MODELO 3D · PENDIENTE</span><b>△</b></div><div class="model-card-body"><small>ACANTILADOS</small><h3>Acantilado costero</h3><p>Manzanillo, Colima · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
      <article class="model-card" data-model="perfiles,topografia,fotogrametria"><div class="model-art art-terrain"><span>MODELO 3D · PENDIENTE</span><b>⌁</b></div><div class="model-card-body"><small>MODELOS TOPOGRÁFICOS</small><h3>Modelo topográfico costero</h3><p>Área por confirmar · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
    </div>
  </div><p class="note">Los nombres son referencias de categorías para estructurar la interfaz, no una afirmación de que esos modelos estén ya disponibles.</p>
</section>
<!-- Módulo 04: interfaz prevista para el análisis multitemporal. -->
<section class="section timeline-section" id="tiempo">
  <div class="kicker">04 / ANÁLISIS MULTITEMPORAL</div><h2>Línea del tiempo <span>ambiental</span></h2><p class="section-lead">La arquitectura contempla comparar la evolución de la costa desde 2008 hasta la actualidad. El control siguiente demuestra la interacción; requiere imágenes satelitales validadas para mostrar cambios reales.</p>
  <div class="time-controls"><div class="year-track" role="group" aria-label="Seleccionar año de referencia"><button data-year="2008">2008</button><button data-year="2012">2012</button><button data-year="2015">2015</button><button class="is-active" data-year="2020">2020</button><button data-year="2024">2024</button><button data-year="actualidad">Actualidad</button></div><label class="range-label" for="comparison-slider"><span>Comparar imágenes</span><output id="comparison-output">50%</output></label><input id="comparison-slider" type="range" min="0" max="100" value="50" aria-label="Deslizador de comparación visual"><div class="comparison-demo"><div class="compare-pane compare-before"><span id="compare-left-label">IMAGEN A · REFERENCIA</span><div class="contour contour-a"></div><strong id="compare-left-year">2012</strong></div><div class="compare-pane compare-after"><span id="compare-right-label">IMAGEN B · REFERENCIA</span><div class="contour contour-b"></div><strong id="compare-right-year">2020</strong></div><div class="comparison-divider" id="comparison-divider"><span>↔</span></div><div class="demo-stamp">INTERFAZ DE DEMOSTRACIÓN · SIN IMÁGENES CIENTÍFICAS</div></div>
  <div class="timeline-bottom"><div><h3>Capas comparables</h3><label><input type="checkbox" checked> Línea de costa</label><label><input type="checkbox" checked> Erosión / acumulación</label><label><input type="checkbox"> Ortomosaicos</label><label><input type="checkbox"> Perfiles de playa</label></div><div><h3>Información del periodo</h3><p id="period-description">Periodo de demostración: 2012–2020. Las métricas de cambio se mostrarán cuando se integren los datos procesados.</p><p class="note">La ubicación y temporalidad de huracanes se incorporará con fuentes verificadas.</p></div></div>
</section>
<!-- Módulo 05: estructura de consulta para la vulnerabilidad costera. -->
<section class="section vulnerability-section" id="vulnerabilidad">
  <div class="section-heading"><div><div class="kicker">05 / EVALUACIÓN ESPACIAL</div><h2>Vulnerabilidad <span>costera</span></h2></div><p class="section-lead">Vista de referencia para un mapa temático de vulnerabilidad. La clasificación y los valores reales deben proceder del análisis científico, no de esta maqueta.</p></div>
  <div class="vulnerability-layout"><div class="vulnerability-map"><div class="vuln-map-grid"></div><div class="coast-shape"></div><div class="vulnerability-scale"><h3>Índice de vulnerabilidad</h3><span><i class="v-low"></i> Muy baja</span><span><i class="v-low2"></i> Baja</span><span><i class="v-mid"></i> Media</span><span><i class="v-high"></i> Alta</span><span><i class="v-high2"></i> Muy alta</span><small>LEYENDA ILUSTRATIVA</small></div><div class="vulnerability-callout"><small>SECTOR DE EJEMPLO</small><strong>Sin evaluación</strong><p>Los resultados se integrarán tras validación.</p></div></div>
    <aside class="variables-panel"><h3>Variables consideradas</h3><label><input type="checkbox" checked> Erosión costera</label><label><input type="checkbox" checked> Pendiente del terreno</label><label><input type="checkbox" checked> Tipo de roca / sedimento</label><label><input type="checkbox" checked> Oleaje y exposición</label><label><input type="checkbox" checked> Huracanes históricos</label><label><input type="checkbox" checked> Uso de suelo</label><div class="panel-rule"></div><h3>Metodología</h3><p>La interfaz se reserva para presentar las variables y el método multicriterio documentados por el equipo investigador.</p><span class="status-pill">Capa científica pendiente</span></aside>
  </div>
</section>
<!-- Módulo 06: repositorio de datos y productos científicos. -->
<section class="section results-section" id="resultados">
  <div class="section-heading"><div><div class="kicker">06 / REPOSITORIO CIENTÍFICO</div><h2>Datos y <span>resultados</span></h2></div><p class="section-lead">Catálogo consultable para productos, informes, perfiles topográficos y conjuntos de datos, con filtros y metadatos.</p></div>
  <div class="repository-layout"><aside class="filter-panel"><h3>Filtrar por</h3><label for="filter-type">Tipo de producto</label><select id="filter-type"><option value="todos">Todos</option><option value="mapa">Mapa / SIG</option><option value="perfil">Perfil de playa</option><option value="ortomosaico">Ortomosaico</option><option value="datos">Datos científicos</option><option value="documento">Documento</option></select><label for="filter-site">Playa / sitio</label><select id="filter-site"><option value="todos">Todos</option><option value="manzanillo">Manzanillo</option><option value="miramar">Miramar</option><option value="audiencia">La Audiencia</option><option value="santiago">Santiago</option><option value="ventanas">Ventanas</option></select><label for="filter-year">Año</label><select id="filter-year"><option value="todos">Todos</option><option>2024</option><option>2023</option><option>2020</option><option>2012</option></select><button class="outline-button" id="clear-filters">Limpiar filtros</button></aside>
    <div class="repository"><div class="repository-head"><div><h3>Mapas temáticos disponibles</h3><p>Documentos cartográficos recibidos en el repositorio de trabajo Mapa1.</p></div><span>5 mapas PDF</span></div>
    <div class="research-map-grid">
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de batimetría" data-map-title="Mapa de batimetría" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20BATIMETRIA.pdf">⌁</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de batimetría</h3><p>Representación de profundidades y relieve submarino.</p><button type="button" class="map-open-button" data-map-title="Mapa de batimetría" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20BATIMETRIA.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de clima" data-map-title="Mapa de clima" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20CLIMA.pdf">☼</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de clima</h3><p>Documento cartográfico de variables climáticas.</p><button type="button" class="map-open-button" data-map-title="Mapa de clima" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20CLIMA.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de crecimiento urbano" data-map-title="Mapa de crecimiento urbano" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20CRECIMIENTO%20URBANO.pdf">⌂</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de crecimiento urbano</h3><p>Material para consultar la expansión urbana representada en el mapa.</p><button type="button" class="map-open-button" data-map-title="Mapa de crecimiento urbano" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20CRECIMIENTO%20URBANO.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de uso y cambio de suelo" data-map-title="Mapa de uso y cambio de suelo" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20USO%20DE%20CAMBIO%20DE%20SUELO.pdf">▦</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de uso y cambio de suelo</h3><p>Documento relacionado con el uso del suelo y sus cambios.</p><button type="button" class="map-open-button" data-map-title="Mapa de uso y cambio de suelo" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20DE%20USO%20DE%20CAMBIO%20DE%20SUELO.pdf">Consultar mapa ↗</button></div></article>
      <article class="research-map-card"><button type="button" class="research-map-icon map-icon-button" aria-label="Abrir mapa de puntos de Manzanillo" data-map-title="Mapa de puntos de Manzanillo" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20PUNTOS%20MANZANILLO%20%281%29.pdf">⌖</button><div><small>CARTOGRAFÍA · PDF</small><h3>Mapa de puntos de Manzanillo</h3><p>Mapa de referencia de los puntos del área de estudio.</p><button type="button" class="map-open-button" data-map-title="Mapa de puntos de Manzanillo" data-map-url="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Mapas/MAPA%20PUNTOS%20MANZANILLO%20%281%29.pdf">Consultar mapa ↗</button></div></article>
    </div><p class="note">Los documentos se consultan desde el repositorio fuente. Antes de publicarlos institucionalmente, confirma la autorización de difusión, la autoría y los metadatos de cada mapa.</p></div>
  </div>
</section>
<!-- Módulo 07: directorio de participantes e instituciones. -->
<section class="section participants-section" id="participantes">
  <div class="section-heading"><div><div class="kicker">07 / EQUIPO DEL PROYECTO</div><h2>Participantes <span>e instituciones</span></h2></div><p class="section-lead">Directorio preparado para reconocer al equipo de investigación y las instituciones participantes.</p></div>
  <div class="participant-tabs" role="group" aria-label="Filtrar participantes"><button class="is-active" data-person-category="todos">Todos</button><button data-person-category="investigadores">Investigadores</button><button data-person-category="tecnicos">Técnicos</button><button data-person-category="estudiantes">Estudiantes</button><button data-person-category="instituciones">Instituciones</button><button data-person-category="colaboradores">Colaboradores</button></div>
  <div class="participant-placeholder"><span class="module-icon">♙</span><h3>Directorio por integrar</h3><p>Se incorporarán nombres, adscripciones, roles y enlaces institucionales verificados. No se muestran nombres ficticios.</p><span class="status-pill">Información pendiente de validación</span></div>
</section>
<!-- Módulo 08: catálogo de recursos multimedia del litoral. -->
<section class="section multimedia-section" id="multimedia">
  <div class="section-heading"><div><div class="kicker">08 / ARCHIVO VISUAL</div><h2>Multimedia <span>del litoral</span></h2></div><p class="section-lead">Fotografías, videos y material audiovisual del trabajo de campo y laboratorio, organizados por tipo de recurso.</p></div>
  <div class="media-filters" role="group" aria-label="Filtrar multimedia"><button class="is-active" data-media-category="todos">Todos</button><button data-media-category="fotografias">Fotografías</button><button data-media-category="campo">Trabajo de campo</button></div>
  <div class="multimedia-grid research-photo-grid">
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05.jpg" loading="lazy" alt="Registro costero de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Registro costero</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05%20%281%29.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05%20%281%29.jpg" loading="lazy" alt="Observación del litoral de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Observación del litoral</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-05%20%281%29.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06.jpg" loading="lazy" alt="Trabajo de campo de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Trabajo de campo</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06%20%281%29.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06%20%281%29.jpg" loading="lazy" alt="Registro de campo de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Registro de campo</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-08-34-06%20%281%29.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-08.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-08.jpg" loading="lazy" alt="Detalle del sitio de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Detalle del sitio</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-08.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-09.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-09.jpg" loading="lazy" alt="Archivo de campo de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Archivo de campo</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-09.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-13.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-13.jpg" loading="lazy" alt="Registro fotográfico de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Registro fotográfico</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-09-12-13.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-39-57.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-39-57.jpg" loading="lazy" alt="Documentación visual de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Documentación visual</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-39-57.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49.jpg" loading="lazy" alt="Observación costera de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Observación costera</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49%20%281%29.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49%20%281%29.jpg" loading="lazy" alt="Registro complementario de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Registro complementario</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-40-49%20%281%29.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
    <article data-media="fotografias campo"><a class="research-photo" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-47-10.jpg" target="_blank" rel="noopener noreferrer"><img src="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-47-10.jpg" loading="lazy" alt="Archivo del litoral de Manzanillo"></a><small>FOTOGRAFÍA · TRABAJO DE CAMPO</small><h3>Archivo del litoral</h3><p>Imagen de la colección recibida en el repositorio de investigación.</p><a class="text-link" href="https://raw.githubusercontent.com/Serngio-A13/Mapa1/main/MAPA%20INTERACTIVO/Fotos/PHOTO-2026-04-09-11-47-10.jpg" target="_blank" rel="noopener noreferrer">Ver imagen ↗</a></article>
  </div><p class="note">La galería muestra las fotografías JPG de tamaño moderado del repositorio fuente. Los archivos HEIC y una fotografía de aproximadamente 10 MB quedan pendientes de conversión y optimización para mantener tiempos de carga adecuados.</p>
</section>
</main>
<footer id="contacto"><div class="footer-top"><a class="brand" href="#inicio"><span class="brand-mark">UNAM</span><span><strong>ATLAS DIGITAL DEL LITORAL</strong><small>Manzanillo · Colima · PAPIIT IF100926</small></span></a><p>Infraestructura académica digital para consulta y divulgación de información costera.</p><a href="#inicio">VOLVER ARRIBA ↑</a></div><div class="footer-bottom"><span>PROYECTO DE RESIDENCIA · ICAT / UNAM</span><span>Prototipo de interfaz · datos científicos pendientes de integración</span></div></footer>

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
</body></html>