<?php
/**
 * Página independiente del módulo: Modelos 3D.
 * El contenido existente se conserva; no se incorporan datos científicos nuevos.
 */
$pageTitle = 'Modelos 3D | Atlas digital del litoral de Manzanillo';
$activePage = 'modelos';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Modelos 3D del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section" id="modelos">
  <div class="section-heading"><div><div class="kicker">03 / EXPLORACIÓN TRIDIMENSIONAL</div><h2>Modelos <span>3D</span></h2></div><p class="section-lead">Catálogo preparado para modelos publicados en Sketchfab u otros visores autorizados, según los materiales que entregue el equipo.</p></div>
  <div class="catalog-layout"><aside class="category-panel"><h3>Categorías</h3><button class="category-button is-active" data-model-category="todos">Todas</button><button class="category-button" data-model-category="playas">Playas</button><button class="category-button" data-model-category="acantilados">Acantilados</button><button class="category-button" data-model-category="formaciones">Formaciones</button><button class="category-button" data-model-category="perfiles">Perfiles costeros</button><button class="category-button" data-model-category="fotogrametria">Fotogrametría aérea</button><button class="category-button" data-model-category="topografia">Modelos topográficos</button></aside>
    <div class="model-grid">
      <article class="model-card" data-model="playas,formaciones,fotogrametria"><div class="model-art art-coast"><span>MODELO 3D · PENDIENTE</span><b>◇</b></div><div class="model-card-body"><small>PLAYAS</small><h3>Playa La Audiencia</h3><p>Manzanillo, Colima · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
      <article class="model-card" data-model="acantilados,formaciones"><div class="model-art art-cliff"><span>MODELO 3D · PENDIENTE</span><b>△</b></div><div class="model-card-body"><small>ACANTILADOS</small><h3>Acantilado costero</h3><p>Manzanillo, Colima · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
      <article class="model-card" data-model="perfiles,topografia,fotogrametria"><div class="model-art art-terrain"><span>MODELO 3D · PENDIENTE</span><b>⌁</b></div><div class="model-card-body"><small>MODELOS TOPOGRÁFICOS</small><h3>Modelo topográfico costero</h3><p>Área por confirmar · Recurso por integrar</p><button class="outline-button" disabled>Modelo pendiente</button></div></article>
    </div>
  </div><p class="note">Los nombres son referencias de categorías para estructurar la interfaz, no una afirmación de que esos modelos estén ya disponibles.</p>
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body>
</html>