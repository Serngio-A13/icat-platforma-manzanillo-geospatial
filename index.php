<?php
/**
 * Entrada pública del Atlas: solo imagen principal, título y cinco accesos.
 */
$pageTitle = 'Atlas digital del litoral de Manzanillo | PAPIIT IF100926';
require __DIR__ . '/components/loader.php';
?>
<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Atlas digital del litoral de Manzanillo: acceso a información geoespacial, modelos 3D, línea del tiempo, vulnerabilidad costera y resultados científicos.">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/style.css"><link rel="stylesheet" href="assets/css/responsive.css"><link rel="stylesheet" href="assets/css/research-library.css"><link rel="stylesheet" href="assets/css/theme-light.css">
</head><body><?php require __DIR__ . '/components/hero.php'; ?></body></html>