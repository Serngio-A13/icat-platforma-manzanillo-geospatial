<?php
/** Página independiente del módulo: Vulnerabilidad costera. Se conserva el contenido existente y sus avisos de validación. */
$pageTitle = 'Vulnerabilidad costera | Atlas digital del litoral de Manzanillo';
$activePage = 'peligro-costero';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Vulnerabilidad costera del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head><body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section vulnerability-section" id="vulnerabilidad">
  <div class="section-heading"><div><div class="kicker">05 / EVALUACIÓN ESPACIAL</div><h2>Vulnerabilidad <span>costera</span></h2></div><p class="section-lead">Vista de referencia para un mapa temático de vulnerabilidad. La clasificación y los valores reales deben proceder del análisis científico, no de esta maqueta.</p></div>
  <div class="vulnerability-layout"><div class="vulnerability-map"><div class="vuln-map-grid"></div><div class="coast-shape"></div><div class="vulnerability-scale"><h3>Índice de vulnerabilidad</h3><span><i class="v-low"></i> Muy baja</span><span><i class="v-low2"></i> Baja</span><span><i class="v-mid"></i> Media</span><span><i class="v-high"></i> Alta</span><span><i class="v-high2"></i> Muy alta</span><small>LEYENDA ILUSTRATIVA</small></div><div class="vulnerability-callout"><small>SECTOR DE EJEMPLO</small><strong>Sin evaluación</strong><p>Los resultados se integrarán tras validación.</p></div></div>
    <aside class="variables-panel"><h3>Variables consideradas</h3><label><input type="checkbox" checked> Erosión costera</label><label><input type="checkbox" checked> Pendiente del terreno</label><label><input type="checkbox" checked> Tipo de roca / sedimento</label><label><input type="checkbox" checked> Oleaje y exposición</label><label><input type="checkbox" checked> Huracanes históricos</label><label><input type="checkbox" checked> Uso de suelo</label><div class="panel-rule"></div><h3>Metodología</h3><p>La interfaz se reserva para presentar las variables y el método multicriterio documentados por el equipo investigador.</p><span class="status-pill">Capa científica pendiente</span></aside>
  </div>
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body></html>