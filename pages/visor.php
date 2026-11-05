<?php
/**
 * Página independiente del módulo: Visor geoespacial.
 * El contenido existente se conserva; no se incorporan datos científicos nuevos.
 */
$pageTitle = 'Visor geoespacial | Atlas digital del litoral de Manzanillo';
$activePage = 'visor';
require __DIR__ . '/../components/loader.php';
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Visor geoespacial del Atlas digital del litoral de Manzanillo.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css"><link rel="stylesheet" href="../assets/css/responsive.css"><link rel="stylesheet" href="../assets/css/research-library.css"><link rel="stylesheet" href="../assets/css/theme-light.css">
</head>
<body>
<?php require __DIR__ . '/../components/navbar.php'; ?>
<main class="atlas-page"><section class="section map-section" id="visor">
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
          src="../assets/maps/perfiles-costero/index.html"
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
</section></main>

<?php require __DIR__ . '/../components/footer.php'; ?>
<?php require __DIR__ . '/../components/scripts.php'; ?>
</body>
</html>