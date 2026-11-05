# Mapa interactivo de perfiles costeros

Este directorio contiene la exportación adaptada del mapa entregado en el repositorio [Mapa1](https://github.com/Serngio-A13/Mapa1).

## Archivos principales
- `index.html`: inicializa Leaflet, muestra la capa de puntos y define las ventanas emergentes.
- `data/PUNTOSDEPERFIL_1.js`: colección geográfica de perfiles exportada desde QGIS.
- `images/`: fotografías asociadas a los puntos de perfil.
- `css/` y `js/`: bibliotecas locales de Leaflet y herramientas auxiliares usadas por la exportación.

## Integración
La página principal la incorpora mediante un iframe desde la sección del visor. Esta separación evita que las dependencias de Leaflet o las reglas CSS de la exportación interfieran con los estilos de la plataforma.

## Consideraciones antes de producción
La capa satelital conserva la URL de mosaicos de la exportación original de QGIS. Antes de publicar el Atlas en el servidor de ICAT, el equipo debe verificar las condiciones de uso y atribución del proveedor de imágenes satelitales, o sustituirlo por un servicio cartográfico autorizado.

La integración técnica no constituye por sí misma una validación científica de las coordenadas, fotografías, fechas o interpretación de los perfiles.
