// Visor PDF integrado con PDF.js. Los documentos de trabajo se sirven desde el repositorio de recursos.
import * as pdfjsLib from 'https://cdn.jsdelivr.net/npm/pdfjs-dist@4.10.38/build/pdf.min.mjs';

pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdn.jsdelivr.net/npm/pdfjs-dist@4.10.38/build/pdf.worker.min.mjs';

const canvas = document.getElementById('pdf-canvas');
const context = canvas?.getContext('2d');
const loading = document.getElementById('pdf-loading');
const status = document.getElementById('pdf-page-status');
const previous = document.getElementById('pdf-prev');
const next = document.getElementById('pdf-next');
const zoomIn = document.getElementById('pdf-zoom-in');
const zoomOut = document.getElementById('pdf-zoom-out');
const wrap = document.getElementById('pdf-canvas-wrap');

let pdfDocument = null;
let pageNumber = 1;
let scale = 1;
let renderTask = null;
let loadToken = 0;

function showMessage(message) {
  if (loading) {
    loading.hidden = false;
    loading.textContent = message;
  }
  if (canvas) canvas.hidden = true;
  if (status) status.textContent = 'Vista previa no disponible';
  if (previous) previous.disabled = true;
  if (next) next.disabled = true;
}

async function renderPage() {
  if (!pdfDocument || !canvas || !context) return;
  if (renderTask) {
    try { renderTask.cancel(); } catch (_) {}
  }
  const page = await pdfDocument.getPage(pageNumber);
  const baseViewport = page.getViewport({ scale: 1 });
  const availableWidth = Math.max(280, (wrap?.clientWidth || 900) - 32);
  const fitScale = Math.min(1.5, availableWidth / baseViewport.width);
  const viewport = page.getViewport({ scale: fitScale * scale });
  const outputScale = window.devicePixelRatio || 1;
  canvas.width = Math.floor(viewport.width * outputScale);
  canvas.height = Math.floor(viewport.height * outputScale);
  canvas.style.width = Math.floor(viewport.width) + 'px';
  canvas.style.height = Math.floor(viewport.height) + 'px';
  canvas.hidden = false;
  if (loading) loading.hidden = true;
  context.setTransform(outputScale, 0, 0, outputScale, 0, 0);
  renderTask = page.render({ canvasContext: context, viewport });
  try {
    await renderTask.promise;
  } catch (error) {
    if (error?.name !== 'RenderingCancelledException') throw error;
  }
  if (status) status.textContent = 'Página ' + pageNumber + ' de ' + pdfDocument.numPages;
  if (previous) previous.disabled = pageNumber <= 1;
  if (next) next.disabled = pageNumber >= pdfDocument.numPages;
}

async function openPdf(url) {
  const token = ++loadToken;
  pdfDocument = null;
  pageNumber = 1;
  scale = 1;
  showMessage('Cargando documento PDF…');
  try {
    const loadingTask = pdfjsLib.getDocument({ url });
    const documentProxy = await loadingTask.promise;
    if (token !== loadToken) {
      await documentProxy.destroy();
      return;
    }
    pdfDocument = documentProxy;
    await renderPage();
  } catch (error) {
    console.error('No fue posible mostrar el PDF:', error);
    showMessage('No se pudo cargar la vista previa. Comprueba tu conexión o usa “Abrir PDF” para consultar el archivo.');
  }
}

document.addEventListener('atlas:open-pdf', event => {
  if (event.detail?.url) openPdf(event.detail.url);
});
document.addEventListener('atlas:close-pdf', () => {
  loadToken++;
  if (renderTask) {
    try { renderTask.cancel(); } catch (_) {}
  }
  pdfDocument?.destroy().catch(() => {});
  pdfDocument = null;
  showMessage('Selecciona un mapa para visualizarlo.');
});
previous?.addEventListener('click', () => {
  if (pdfDocument && pageNumber > 1) {
    pageNumber--;
    renderPage().catch(error => { console.error(error); showMessage('Error al renderizar esta página.'); });
  }
});
next?.addEventListener('click', () => {
  if (pdfDocument && pageNumber < pdfDocument.numPages) {
    pageNumber++;
    renderPage().catch(error => { console.error(error); showMessage('Error al renderizar esta página.'); });
  }
});
zoomIn?.addEventListener('click', () => {
  if (pdfDocument) { scale = Math.min(2.5, scale + 0.2); renderPage().catch(console.error); }
});
zoomOut?.addEventListener('click', () => {
  if (pdfDocument) { scale = Math.max(0.6, scale - 0.2); renderPage().catch(console.error); }
});
window.addEventListener('resize', () => {
  if (pdfDocument) renderPage().catch(console.error);
});
