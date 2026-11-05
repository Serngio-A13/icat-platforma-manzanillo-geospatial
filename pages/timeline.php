<?php
/** Página independiente del módulo: Línea del tiempo. Se conserva el contenido existente y sus avisos de validación. */
$pageTitle = 'Línea del tiempo | Atlas digital del litoral de Manzanillo';
$activePage = 'timeline';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Línea del tiempo del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head><body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section timeline-section" id="tiempo">
  <div class="kicker">04 / ANÁLISIS MULTITEMPORAL</div><h2>Línea del tiempo <span>ambiental</span></h2><p class="section-lead">La arquitectura contempla comparar la evolución de la costa desde 2008 hasta la actualidad. El control siguiente demuestra la interacción; requiere imágenes satelitales validadas para mostrar cambios reales.</p>
  <div class="time-controls"><div class="year-track" role="group" aria-label="Seleccionar año de referencia"><button data-year="2008">2008</button><button data-year="2012">2012</button><button data-year="2015">2015</button><button class="is-active" data-year="2020">2020</button><button data-year="2024">2024</button><button data-year="actualidad">Actualidad</button></div><label class="range-label" for="comparison-slider"><span>Comparar imágenes</span><output id="comparison-output">50%</output></label><input id="comparison-slider" type="range" min="0" max="100" value="50" aria-label="Deslizador de comparación visual"><div class="comparison-demo"><div class="compare-pane compare-before"><span id="compare-left-label">IMAGEN A · REFERENCIA</span><div class="contour contour-a"></div><strong id="compare-left-year">2012</strong></div><div class="compare-pane compare-after"><span id="compare-right-label">IMAGEN B · REFERENCIA</span><div class="contour contour-b"></div><strong id="compare-right-year">2020</strong></div><div class="comparison-divider" id="comparison-divider"><span>↔</span></div><div class="demo-stamp">INTERFAZ DE DEMOSTRACIÓN · SIN IMÁGENES CIENTÍFICAS</div></div>
  <div class="timeline-bottom"><div><h3>Capas comparables</h3><label><input type="checkbox" checked> Línea de costa</label><label><input type="checkbox" checked> Erosión / acumulación</label><label><input type="checkbox"> Ortomosaicos</label><label><input type="checkbox"> Perfiles de playa</label></div><div><h3>Información del periodo</h3><p id="period-description">Periodo de demostración: 2012–2020. Las métricas de cambio se mostrarán cuando se integren los datos procesados.</p><p class="note">La ubicación y temporalidad de huracanes se incorporará con fuentes verificadas.</p></div></div>
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body></html>