<?php
/**
 * Inicialización compartida del Atlas.
 * Determina la ruta base para que los recursos funcionen en la raíz y en /pages.
 */
$rutaActual = str_replace(chr(92), '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
$atlasBaseUrl = (strpos($rutaActual, '/pages/') !== false) ? '..' : '.';
$pageTitle = $pageTitle ?? 'Atlas digital del litoral de Manzanillo | PAPIIT IF100926';
$activePage = $activePage ?? '';
?>