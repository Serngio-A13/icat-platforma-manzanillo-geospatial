# Plataforma geoespacial de vulnerabilidad costera — ICAT

Base de demostración en PHP, CSS y JavaScript nativo; no requiere React en tiempo de ejecución.

## Ejecutar localmente con XAMPP
1. Coloca la carpeta del proyecto dentro de `C:\\xampp\\htdocs\\`.
2. Inicia **Apache** y **MySQL** desde el panel de XAMPP.
3. Abre `http://localhost/icat-platforma-manzanillo-geospatial-feat-homepage-php-gis/` (ajusta el nombre de la ruta si tu carpeta tiene otro nombre).
4. Leaflet y el mapa base requieren Internet y acceso a los CDN/servidores de mosaicos.

## Base de datos local
1. En phpMyAdmin, importa `database/schema.sql`. Se creará `icat_manzanillo` y sus tablas.
2. Copia `php/config/database.local.example.php` como `php/config/database.local.php`. Revisa usuario y contraseña según tu XAMPP. Este archivo local está excluido de Git.
3. El endpoint de prueba es `/php/api/health.php`, anteponiendo la ruta de tu proyecto local.

## Panel administrativo (primera etapa)
- Acceso: `/admin/login.php`, anteponiendo la ruta de tu proyecto local.
- El panel está protegido por sesión y no tiene registro público.
- Para crear las tres cuentas iniciales, consulta [docs/ADMINISTRACION.md](docs/ADMINISTRACION.md). El script de creación solo funciona desde CLI y requiere que la tabla `usuarios` esté vacía.
- Las contraseñas se almacenan con `password_hash()`; nunca guardes contraseñas reales en GitHub.
- El panel por ahora ofrece autenticación y un tablero inicial. Los formularios para editar contenido y subir archivos se implementarán en la siguiente etapa.

## Importante
El GeoJSON incluido es ficticio y sirve exclusivamente para probar la carga de capas. No representa resultados científicos ni una delimitación oficial. Antes de producción deben integrarse datos autorizados, el tour 3DVista real, almacenamiento de archivos y credenciales seguras del servidor.


## Mapa de perfiles costeros integrado
- El visor se encuentra en `assets/maps/perfiles-costero/index.html` y se carga desde la sección `#visor` mediante un iframe.
- Se conservan las 31 ubicaciones, sus fotografías asociadas y las bibliotecas locales necesarias para Leaflet.
- La página del mapa y el CSS responsivo incluyen comentarios en español para facilitar el mantenimiento.
- Bootstrap 5 se utiliza en la página principal para la cuadrícula adaptable del panel y el mapa; los estilos propios mantienen la identidad visual del Atlas.
- El mapa conserva la capa satelital de la exportación recibida. Antes de publicar en el servidor de ICAT, debe confirmarse que la fuente de mosaicos y su atribución cumplan las condiciones de uso correspondientes.
- La integración no convierte los perfiles en un índice de vulnerabilidad ni valida científicamente los datos; esa validación corresponde al equipo de investigación.


## Galería y mapas temáticos integrados
- La sección Multimedia presenta fotografías JPG desde la carpeta `MAPA INTERACTIVO/Fotos` del repositorio fuente `Serngio-A13/Mapa1`, usando carga diferida para reducir las descargas iniciales.
- La sección Datos y resultados ahora contiene enlaces a los cinco mapas PDF disponibles: batimetría, clima, crecimiento urbano, uso/cambio de suelo y puntos de Manzanillo.
- Los recursos siguen alojados en el repositorio fuente y se consumen mediante URLs de GitHub Raw; esto evita duplicar por ahora los archivos binarios en este repositorio, aunque la publicación final debería migrarlos a almacenamiento institucional controlado.
- Los archivos HEIC y una fotografía JPG de aproximadamente 10 MB no se muestran todavía en la galería: deben convertirse/optimizarse para garantizar compatibilidad y rendimiento.
- Antes de publicar, confirmar permisos de difusión, autoría, metadatos y permanencia de las URLs fuente. Las descripciones de tarjetas son orientativas, no metadatos científicos validados.

## Tema visual claro del Atlas
- La paleta clara se implementa en `assets/css/theme-light.css`, una hoja independiente para evitar mezclar los ajustes visuales con los estilos estructurales originales.
- `index.php` carga esta hoja después de `style.css`, `responsive.css` y `research-library.css`; por ello, sus reglas sobrescriben colores y fondos sin sustituir la estructura ni las funciones JavaScript.
- Colores principales: fondo blanco frío `#F5F7F8`, superficies `#FFFFFF`, azul profundo `#123B50`, azul oceánico `#168AAD` y azul niebla `#DCEEF2`.
- La portada conserva la fotografía aérea y su superposición oscura para mantener el contraste del título. Los mapas Leaflet conservan su proveedor de mosaicos; solo se actualizan los controles y las ventanas emergentes.
- Al modificar la paleta, actualizar los comentarios de `theme-light.css` y esta sección del README. Comprobar escritorio, móvil, navegación, tarjetas, visor Leaflet y ventana PDF antes de publicar.


### Fotografía principal de la portada

La portada utiliza la imagen `assets/images/hero-playa-drone.webp` como fondo. Para sustituirla por otra fotografía, conserva exactamente ese nombre y formato WebP; no es necesario modificar la referencia de la hoja de estilos.

El archivo `assets/css/style.css` controla el encuadre y las capas de contraste de la fotografía. El ajuste más reciente reduce la intensidad de los degradados oscuros y elimina el degradado duplicado del pseudo-elemento `.hero:before`, manteniendo únicamente una retícula técnica muy tenue. En pantallas pequeñas se aplica un encuadre independiente dentro de `@media (max-width: 700px)`.

Si se vuelve a modificar la portada, comprobar la legibilidad del título, botones y metadatos tanto en escritorio como en móvil. La imagen debe permanecer en `assets/images/hero-playa-drone.webp` y el tema claro `assets/css/theme-light.css` debe seguir cargándose después de las hojas de estilo generales.


## Portada inmersiva, accesos e identidad visual

- La portada incorpora un marcador circular animado mediante el pseudo-elemento `.hero::after` de `assets/css/theme-light.css`. El efecto es decorativo: no solicita geolocalización del navegador ni representa coordenadas GPS en tiempo real.
- El marcador utiliza CSS, por lo que no agrega bibliotecas ni archivos multimedia adicionales. Su animación se desactiva cuando el visitante tiene activada la preferencia de movimiento reducido.
- La fotografía `assets/images/hero-playa-drone.webp` continúa como fondo principal. La hoja de estilos queda preparada para que, cuando el equipo proporcione un video aéreo autorizado, pueda incorporarse como fondo con la fotografía actual como respaldo.
- Los cinco accesos rápidos conservan sus destinos funcionales: visor geoespacial, modelos 3D, línea del tiempo, vulnerabilidad costera y datos/resultados. Se aumentó el tamaño de sus símbolos actuales y se les dio un contenedor visual consistente.
- La correspondencia exacta de los iconos con el sitio de referencia deberá confirmarse con los archivos gráficos originales o una captura clara del bloque de accesos; no se deben sustituir por iconos aproximados si el equipo exige reproducirlos literalmente.
- Se reforzó el contraste y el tamaño de textos de navegación, descripciones, tarjetas, notas y controles. El texto blanco del hero se conserva para mantener su legibilidad sobre la fotografía.
- Validar escritorio y móvil, revisar que el marcador no cubra el título ni controles, y confirmar que el efecto se desactive con `prefers-reduced-motion`.
- Cuando se reciba el video de dron, comprobar duración, peso, derechos de uso, compatibilidad MP4/WebM y versión de respaldo antes de publicarlo.


### Iconos de los cinco módulos principales

Los accesos de la sección `#servicios` en `index.php` utilizan SVG incrustado en el propio HTML, sin fuentes de iconos ni dependencias externas. Los símbolos son: marcador de ubicación (visor), cubo isométrico (modelos 3D), reloj (línea del tiempo), ondas (vulnerabilidad costera) y cilindro de datos (datos y resultados).

El trazo se define en `assets/css/theme-light.css`: color turquesa, grosor uniforme, extremos redondeados y ausencia de relleno. Los SVG tienen `aria-hidden="true"` porque los enlaces ya cuentan con texto descriptivo accesible. Para modificar la iconografía, conservar los enlaces y etiquetas, editar únicamente el SVG correspondiente y comprobar su visualización en escritorio y móvil.


### Legibilidad tipográfica para consulta académica

Se añadió un bloque de accesibilidad tipográfica al final de `assets/css/theme-light.css`. El texto de lectura utiliza peso medio (500), los enlaces y controles seminegrita (600) y los encabezados negrita (700), con tonos azul grisáceo oscuros para mejorar el contraste sobre superficies claras. El texto de la portada permanece claro sobre la fotografía y recibe mayor peso para conservar su legibilidad.

En móvil se evita reducir el texto de lectura por debajo de 15 px y los accesos rápidos mantienen tamaños legibles. Los iconos SVG conservan su trazo original para no alterar la referencia visual.

Al validar este ajuste, revisar párrafos largos, etiquetas, navegación, tablas, formularios, tarjetas y la portada en escritorio y móvil. Si la fuente utilizada no dispone de un peso específico, el navegador puede aproximar el grosor; comprobar que las letras no se vean excesivamente pesadas ni pierdan definición.


### Color azul de Prusia para los iconos de portada

Se actualizó el color de los cinco iconos SVG principales en `assets/css/theme-light.css`. El trazo utiliza azul de Prusia `#003153` y cambia a un azul ligeramente más luminoso `#164B72` al pasar el cursor. Se incorporó un fondo claro semitransparente y discreto detrás de cada símbolo para conservar el contraste sobre la fotografía aérea. Las formas SVG, sus dimensiones, sus enlaces y su accesibilidad no se modificaron.

Al validar, revisar que los cinco iconos se distingan sobre las zonas claras y oscuras de la fotografía, tanto en escritorio como en móvil. Si el fondo de la portada cambia, volver a comprobar el contraste antes de ajustar el color.
