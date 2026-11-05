<?php
/** Carga los scripts compartidos; PDF.js se reserva para Datos y resultados. */
?>
<script defer src="<?= htmlspecialchars($atlasBaseUrl . '/assets/js/app.js', ENT_QUOTES, 'UTF-8') ?>"></script>
<?php if (($activePage ?? '') === 'resultados'): ?>
<script type="module" src="<?= htmlspecialchars($atlasBaseUrl . '/assets/js/pdf-viewer.js', ENT_QUOTES, 'UTF-8') ?>"></script>
<?php endif; ?>