document.addEventListener('DOMContentLoaded', () => {
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

  const mapElement = document.getElementById('coastal-map');
  if (mapElement && typeof L !== 'undefined') {
    const map = L.map(mapElement, {scrollWheelZoom: false}).setView([19.05, -104.32], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    const demoLayers = {};
    fetch('data/geojson/demo-manzanillo.geojson').then(r => {
      if (!r.ok) throw new Error('GeoJSON de demostración no disponible');
      return r.json();
    }).then(data => {
      demoLayers.costa = L.geoJSON(data, {
        style: {color: '#8dd9c5', weight: 2, fillColor: '#8dd9c5', fillOpacity: 0.12},
        onEachFeature: (feature, target) => target.bindPopup('<strong>Geometría de demostración</strong><br>Ficticia; no es un dato científico validado.')
      }).addTo(map);
      if (demoLayers.costa.getBounds().isValid()) map.fitBounds(demoLayers.costa.getBounds().pad(0.35));
      document.querySelectorAll('[data-demo-layer]').forEach(input => {
        input.addEventListener('change', () => {
          const layer = demoLayers[input.dataset.demoLayer];
          if (layer) input.checked ? map.addLayer(layer) : map.removeLayer(layer);
          else if (input.checked) {
            input.checked = false;
            alert('Esta capa es parte de la arquitectura prevista, pero aún no se ha integrado un archivo científico validado.');
          }
        });
      });
    }).catch(error => {
      console.warn(error);
      L.circleMarker([19.05, -104.32], {radius: 7, color: '#8dd9c5'}).addTo(map)
        .bindPopup('Manzanillo, Colima<br>Marcador de referencia para demostración.');
    });
    setTimeout(() => map.invalidateSize(), 250);
  }

  document.querySelectorAll('[data-model-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-model-category]').forEach(b => b.classList.toggle('is-active', b === button));
    document.querySelectorAll('[data-model]').forEach(card => {
      card.hidden = button.dataset.modelCategory !== 'todos' && card.dataset.model !== button.dataset.modelCategory;
    });
  }));

  const slider = document.getElementById('comparison-slider');
  const divider = document.getElementById('comparison-divider');
  const output = document.getElementById('comparison-output');
  if (slider && divider && output) {
    const updateComparison = () => {
      const value = Number(slider.value);
      divider.style.left = value + '%';
      output.value = value + '%';
      output.textContent = value + '%';
    };
    slider.addEventListener('input', updateComparison);
    updateComparison();
  }
  const years = ['2008','2012','2015','2020','2024','actualidad'];
  document.querySelectorAll('[data-year]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-year]').forEach(b => b.classList.toggle('is-active', b === button));
    const index = years.indexOf(button.dataset.year);
    const left = years[Math.max(0, index - 1)];
    document.getElementById('compare-left-year').textContent = left === 'actualidad' ? 'Actualidad' : left;
    document.getElementById('compare-right-year').textContent = button.dataset.year === 'actualidad' ? 'Actualidad' : button.dataset.year;
    document.getElementById('period-description').textContent = 'Periodo de demostración: ' + left + '–' + button.dataset.year + '. Las métricas de cambio se mostrarán cuando se integren los datos procesados.';
  }));

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

  document.querySelectorAll('[data-person-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-person-category]').forEach(b => b.classList.toggle('is-active', b === button));
  }));
  document.querySelectorAll('[data-media-category]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-media-category]').forEach(b => b.classList.toggle('is-active', b === button));
    document.querySelectorAll('[data-media]').forEach(card => {
      card.hidden = button.dataset.mediaCategory !== 'todos' && card.dataset.media !== button.dataset.mediaCategory;
    });
  }));
});