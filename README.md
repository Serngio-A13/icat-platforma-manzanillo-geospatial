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
