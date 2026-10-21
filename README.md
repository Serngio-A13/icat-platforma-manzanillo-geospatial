# Plataforma geoespacial de vulnerabilidad costera — ICAT

Base de demostración en PHP, CSS y JavaScript nativo; no requiere React en tiempo de ejecución.

## Ejecutar localmente
1. Instala PHP y habilita PDO MySQL. MariaDB es necesario para probar la conexión de base de datos.
2. Desde la raíz ejecuta `php -S 127.0.0.1:8000`.
3. Abre `http://127.0.0.1:8000`.
4. Leaflet y el mapa base requieren Internet y acceso a los CDN/servidores de mosaicos.

## Base de datos
Importa `database/schema.sql` en MariaDB y configura las variables de entorno `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER` y `DB_PASS`. El endpoint de prueba es `/php/api/health.php`.

## Importante
El GeoJSON incluido es ficticio y sirve exclusivamente para probar la carga de capas. No representa resultados científicos ni una delimitación oficial. Antes de producción deben integrarse datos autorizados, el tour 3DVista real y las credenciales configuradas de forma segura.