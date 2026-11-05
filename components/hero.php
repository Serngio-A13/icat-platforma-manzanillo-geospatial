<?php
/**
 * Portada principal: fotografía, título y cinco accesos SVG.
 * Los módulos completos se consultan en páginas independientes.
 */
?>
<main class="home-landing">
  <section class="hero" id="inicio" aria-labelledby="home-title">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-content">
      <p class="eyebrow">INFRAESTRUCTURA ACADÉMICA DIGITAL · PAPIIT IF100926</p>
      <h1 id="home-title">Atlas digital<br>del litoral de <span>Manzanillo</span></h1>
    </div>
  </section>
  <!-- Se conservan los cinco símbolos SVG originales como navegación principal. -->
  <section class="quick-links home-quick-links" aria-label="Accesos principales del Atlas">
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/visor.php', ENT_QUOTES, 'UTF-8') ?>"><span class="module-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><path d="M16 28s10-9.2 10-16A10 10 0 0 0 6 12c0 6.8 10 16 10 16Z"/><circle cx="16" cy="12" r="3.2"/></svg></span><strong>Visor geoespacial</strong></a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/modelos.php', ENT_QUOTES, 'UTF-8') ?>"><span class="module-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><path d="m16 2.8 12 6.5v13.4L16 29.2 4 22.7V9.3L16 2.8Z"/><path d="m4.4 9.5 11.6 6.4 11.6-6.4M16 16v13"/></svg></span><strong>Modelos 3D</strong></a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/timeline.php', ENT_QUOTES, 'UTF-8') ?>"><span class="module-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><circle cx="16" cy="16" r="13"/><path d="M16 8v8l5.5 3"/></svg></span><strong>Línea del tiempo</strong></a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/peligro-costero.php', ENT_QUOTES, 'UTF-8') ?>"><span class="module-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><path d="M2 10c4.7-6 8.5-6 13.2 0s8.5 6 14.8 0M2 17c4.7-6 8.5-6 13.2 0s8.5 6 14.8 0M2 24c4.7-6 8.5-6 13.2 0s8.5 6 14.8 0"/></svg></span><strong>Vulnerabilidad costera</strong></a>
    <a href="<?= htmlspecialchars($atlasBaseUrl . '/pages/resultados.php', ENT_QUOTES, 'UTF-8') ?>"><span class="module-icon" aria-hidden="true"><svg viewBox="0 0 32 32" focusable="false"><ellipse cx="16" cy="6.5" rx="11.5" ry="4"/><path d="M4.5 6.5v19c0 2.2 5.2 4 11.5 4s11.5-1.8 11.5-4v-19M4.5 16c0 2.2 5.2 4 11.5 4s11.5-1.8 11.5-4"/></svg></span><strong>Datos y resultados</strong></a>
  </section>
</main>