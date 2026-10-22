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
