<?php
/**
 * Página independiente del módulo: El proyecto.
 * El contenido existente se conserva; no se incorporan datos científicos nuevos.
 */
$pageTitle = 'El proyecto | Atlas digital del litoral de Manzanillo';
$activePage = 'proyecto';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="El proyecto del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section" id="proyecto">
  <div class="kicker">01 / EL PROYECTO</div>
  <div class="intro-layout"><div><p class="eyebrow">CIENCIA · TECNOLOGÍA · TERRITORIO</p><h2>Conocer el litoral.<br><span>Comprender sus cambios.</span></h2></div>
    <div class="intro-copy"><p>El proyecto PAPIIT IF100926 propone integrar productos geoespaciales y resultados científicos para apoyar el estudio de la vulnerabilidad costera en Manzanillo, Colima.</p><p>El atlas organiza la información del proyecto para su consulta por investigadores, estudiantes, instituciones y público interesado. Los contenidos científicos se incorporarán conforme el equipo de investigación los proporcione y valide.</p><a class="text-link" href="resultados.php">Consultar módulos del atlas ↗</a></div>
  </div>
  <div class="project-tabs"><div class="tab-list" role="tablist" aria-label="Información del proyecto"><button class="tab-button is-active" role="tab" aria-selected="true" data-project-tab="introduccion">Introducción</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="objetivos">Objetivos</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="metodologia">Metodología</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="area">Área de estudio</button><button class="tab-button" role="tab" aria-selected="false" data-project-tab="productos">Productos</button></div>
    <div class="tab-panel" id="project-tab-panel" role="tabpanel"><h3>Introducción</h3><p>Consulta integrada de materiales geoespaciales, fotogramétricos y científicos relacionados con el litoral de Manzanillo. Esta versión es una maqueta funcional; los datos reales se cargarán tras su validación.</p></div>
  </div>
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body>
</html>