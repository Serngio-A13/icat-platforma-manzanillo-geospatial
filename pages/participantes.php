<?php
/** Página independiente del módulo: Participantes. Se conserva el contenido existente y sus avisos de validación. */
$pageTitle = 'Participantes | Atlas digital del litoral de Manzanillo';
$activePage = 'participantes';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Participantes del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head><body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section participants-section" id="participantes">
  <div class="section-heading"><div><div class="kicker">07 / EQUIPO DEL PROYECTO</div><h2>Participantes <span>e instituciones</span></h2></div><p class="section-lead">Directorio preparado para reconocer al equipo de investigación y las instituciones participantes.</p></div>
  <div class="participant-tabs" role="group" aria-label="Filtrar participantes"><button class="is-active" data-person-category="todos">Todos</button><button data-person-category="investigadores">Investigadores</button><button data-person-category="tecnicos">Técnicos</button><button data-person-category="estudiantes">Estudiantes</button><button data-person-category="instituciones">Instituciones</button><button data-person-category="colaboradores">Colaboradores</button></div>
  <div class="participant-placeholder"><span class="module-icon">♙</span><h3>Directorio por integrar</h3><p>Se incorporarán nombres, adscripciones, roles y enlaces institucionales verificados. No se muestran nombres ficticios.</p><span class="status-pill">Información pendiente de validación</span></div>
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body></html>