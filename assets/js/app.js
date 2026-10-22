// Espera a que el documento esté construido antes de enlazar controles e interacciones.
document.addEventListener('DOMContentLoaded', () => {
  // Controla la apertura y el cierre del menú en pantallas pequeñas.
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('#main-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      nav.classList.toggle('is-open', !open);
    });
    nav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }));
  }

  // Define el contenido de cada pestaña informativa del proyecto.
  const projectTabs = document.querySelectorAll('[data-project-tab]');
  const projectCopy = {
    introduccion: ['Introducción', 'Consulta integrada de materiales geoespaciales, fotogramétricos y científicos relacionados con el litoral de Manzanillo. Esta versión es una maqueta funcional; los datos reales se cargarán tras su validación.'],
    objetivos: ['Objetivos', 'Organizar y facilitar la consulta pública de productos digitales geoespaciales relacionados con la vulnerabilidad costera, de acuerdo con los objetivos y entregables definidos por el equipo de investigación.'],
    metodologia: ['Metodología', 'La investigación contempla SIG, fotogrametría, modelado 3D, análisis de información multitemporal y el estudio de variables sedimentológicas y geomorfológicas. Esta sección debe documentarse con el texto validado del proyecto.'],
    area: ['Área de estudio', 'La zona de estudio corresponde al litoral de Manzanillo, Colima. La delimitación y las localidades se mostrarán mediante datos cartográficos validados por el equipo.'],
    productos: ['Productos del proyecto', 'El atlas contempla capas geoespaciales, modelos 3D, línea del tiempo ambiental, productos de vulnerabilidad, informes y recursos multimedia. Los archivos estarán disponibles cuando sean entregados y autorizados.']
  };
  projectTabs.forEach(button => button.addEventListener('click', () => {
    projectTabs.forEach(b => { b.classList.toggle('is-active', b === button); b.setAttribute('aria-selected', String(b === button)); });
    const [title, copy] = projectCopy[button.dataset.projectTab];
    const panel = document.getElementById('project-tab-panel');
    panel.innerHTML = '';
    const h = document.createElement('h3'); h.textContent = title;
    const p = document.createElement('p'); p.textContent = copy;
    panel.append(h, p);
  }));

  // El visor de perfiles costeros se carga en assets/maps/perfiles-costero/index.html.
  // Se usa un iframe para aislar Leaflet, sus estilos y las bibliotecas generadas por QGIS.
  // Por eso el sitio principal ya no inicializa aquí un segundo mapa de demostración.

  // Filtra las tarjetas de modelos 3D según la categoría seleccionada.
  document.querySelectorAll('[data-model-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-model-category]').forEach(b => b.classList.toggle('is-active', b === button));
    document.querySelectorAll('[data-model]').forEach(card => {
      card.hidden = button.dataset.modelCategory !== 'todos' && !card.dataset.model.split(',').includes(button.dataset.modelCategory);
    });
  }));

  // Controla el divisor visual de la línea del tiempo de demostración.
  const slider = document.getElementById('comparison-slider');
  const divider = document.getElementById('comparison-divider');
  const output = document.getElementById('comparison-output');
  if (slider && divider && output) {
    const updateComparison = () => {
      const value = Number(slider.value);
      divider.style.left = value + '%';
      const afterPane = document.querySelector('.compare-after');
      if (afterPane) afterPane.style.clipPath = 'inset(0 0 0 ' + value + '%)';
      output.value = value + '%';
      output.textContent = value + '%';
    };
    slider.addEventListener('input', updateComparison);
    updateComparison();
  }
  // Años disponibles en la maqueta; no representan por sí mismos datos científicos cargados.
  const years = ['2008','2012','2015','2020','2024','actualidad'];
  document.querySelectorAll('[data-year]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-year]').forEach(b => b.classList.toggle('is-active', b === button));
    const index = years.indexOf(button.dataset.year);
    const left = years[Math.max(0, index - 1)];
    document.getElementById('compare-left-year').textContent = left === 'actualidad' ? 'Actualidad' : left;
    document.getElementById('compare-right-year').textContent = button.dataset.year === 'actualidad' ? 'Actualidad' : button.dataset.year;
    document.getElementById('period-description').textContent = 'Periodo de demostración: ' + left + '–' + button.dataset.year + '. Las métricas de cambio se mostrarán cuando se integren los datos procesados.';
  }));

  // Referencias a los filtros del catálogo de productos científicos.
  const filterType = document.getElementById('filter-type');
  const filterSite = document.getElementById('filter-site');
  const filterYear = document.getElementById('filter-year');
  const resultRows = [...document.querySelectorAll('#results-body tr')];
  const resultCount = document.getElementById('result-count');
  const filterResults = () => {
    let count = 0;
    resultRows.forEach(row => {
      const match = (filterType.value === 'todos' || row.dataset.type === filterType.value) &&
        (filterSite.value === 'todos' || row.dataset.site === filterSite.value) &&
        (filterYear.value === 'todos' || row.dataset.year === filterYear.value);
      row.hidden = !match;
      if (match) count++;
    });
    resultCount.textContent = count + ' registros de muestra';
  };
  [filterType, filterSite, filterYear].forEach(select => select.addEventListener('change', filterResults));
  document.getElementById('clear-filters')?.addEventListener('click', () => {
    filterType.value = filterSite.value = filterYear.value = 'todos';
    filterResults();
  });

  // Marca la categoría seleccionada en el directorio de participantes.
  document.querySelectorAll('[data-person-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-person-category]').forEach(b => b.classList.toggle('is-active', b === button));
  }));
  // Filtra las tarjetas de recursos multimedia por tipo de contenido.
  document.querySelectorAll('[data-media-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-media-category]').forEach(b => b.classList.toggle('is-active', b === button));
    document.querySelectorAll('[data-media]').forEach(card => {
      // Algunas tarjetas pertenecen a más de una categoría, por eso se separan por espacios.
      const categorias = card.dataset.media.split(/\\s+/);
      card.hidden = button.dataset.mediaCategory !== 'todos' && !categorias.includes(button.dataset.mediaCategory);
    });
  }));
});