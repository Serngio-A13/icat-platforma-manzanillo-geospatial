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
  const mapElement = document.getElementById('coastal-map');
  if (!mapElement || typeof L === 'undefined') return;
  const map = L.map(mapElement, {scrollWheelZoom: false}).setView([19.05, -104.32], 11);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  fetch('data/geojson/demo-manzanillo.geojson').then(r => {
    if (!r.ok) throw new Error('GeoJSON de demostración no disponible');
    return r.json();
  }).then(data => {
    const layer = L.geoJSON(data, {
      style: {color: '#d8b477', weight: 2, fillColor: '#d8b477', fillOpacity: 0.18},
      onEachFeature: (feature, target) => target.bindPopup('<strong>Área ilustrativa</strong><br>Geometría de prueba, no es un dato científico validado.')
    }).addTo(map);
    if (layer.getBounds().isValid()) map.fitBounds(layer.getBounds().pad(0.35));
  }).catch(error => {
    console.warn(error);
    L.circleMarker([19.05, -104.32], {radius: 7, color: '#8dd9c5'}).addTo(map)
      .bindPopup('Manzanillo, Colima<br>Marcador de referencia para demostración.');
  });
  setTimeout(() => map.invalidateSize(), 200);
});