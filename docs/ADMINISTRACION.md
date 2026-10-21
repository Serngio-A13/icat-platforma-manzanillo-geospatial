# Configuración inicial del panel administrativo

Esta guía crea las tres cuentas iniciales de investigadores en una instalación local de XAMPP. No hay cuentas ni contraseñas predeterminadas.

## 1. Preparar la base de datos

1. Inicia Apache y MySQL en XAMPP.
2. Abre phpMyAdmin: `http://localhost/phpmyadmin/`.
3. Importa el archivo `database/schema.sql` del proyecto.
4. Copia `php/config/database.local.example.php` como `php/config/database.local.php`.
5. Si tu XAMPP utiliza otra contraseña para MariaDB/MySQL, actualiza ese archivo. **El archivo `database.local.php` no se debe subir a GitHub.**

## 2. Crear las tres cuentas desde PowerShell

El script está limitado a la consola y solo se ejecuta cuando la tabla `usuarios` está vacía. Cada contraseña debe tener al menos 12 caracteres.

Abre PowerShell y pega el bloque siguiente. Cambia los nombres visibles si lo deseas. El código solicita las contraseñas de forma oculta; no escribas las contraseñas directamente en el script.

```powershell
function Set-SecretEnvironmentVariable($variableName, $promptText) {
    $secure = Read-Host $promptText -AsSecureString
    $pointer = [Runtime.InteropServices.Marshal]::SecureStringToBSTR($secure)
    try {
        $plain = [Runtime.InteropServices.Marshal]::PtrToStringBSTR($pointer)
        [Environment]::SetEnvironmentVariable($variableName, $plain, "Process")
    } finally {
        [Runtime.InteropServices.Marshal]::ZeroFreeBSTR($pointer)
    }
}

$env:ADMIN1_USER = "investigador1"
$env:ADMIN1_NAME = "Investigador 1"
Set-SecretEnvironmentVariable "ADMIN1_PASS" "Contraseña para investigador1 (mínimo 12 caracteres)"

$env:ADMIN2_USER = "investigador2"
$env:ADMIN2_NAME = "Investigador 2"
Set-SecretEnvironmentVariable "ADMIN2_PASS" "Contraseña para investigador2 (mínimo 12 caracteres)"

$env:ADMIN3_USER = "investigador3"
$env:ADMIN3_NAME = "Investigador 3"
Set-SecretEnvironmentVariable "ADMIN3_PASS" "Contraseña para investigador3 (mínimo 12 caracteres)"

& "C:\xampp\php\php.exe" "C:\xampp\htdocs\icat-platforma-manzanillo-geospatial-feat-homepage-php-gis\php\admin\setup_users.php"
```

Si tu carpeta del proyecto tiene otro nombre o está en otra ubicación, ajusta la última ruta. Ejecuta todo en la misma ventana de PowerShell. Al terminar, cierra esa ventana para descartar las variables temporales.

**No ejecutes de nuevo el script para cambiar contraseñas:** por seguridad, solo crea cuentas cuando no hay ninguna. El procedimiento para recuperar o cambiar credenciales se añadirá por separado.

## 3. Probar el acceso

1. Comprueba que Apache y MySQL sigan iniciados.
2. Abre `http://localhost/icat-platforma-manzanillo-geospatial-feat-homepage-php-gis/admin/login.php`.
3. Inicia sesión con una de las tres cuentas creadas.
4. El tablero mostrará el estado de la conexión y el conteo de cuentas, contenidos y multimedia.

Si aparece un error de conexión, comprueba `php/config/database.local.php` y visita el endpoint de salud de la base de datos: `http://localhost/icat-platforma-manzanillo-geospatial-feat-homepage-php-gis/php/api/health.php`.

## Notas de seguridad

- Estas credenciales son para desarrollo local; las cuentas definitivas deben configurarse de nuevo en el servidor autorizado por ICAT.
- No uses una cuenta MySQL `root` sin contraseña en producción.
- No compartas las tres contraseñas por correo abierto ni las guardes en el repositorio.
- La primera versión del panel solo incluye acceso y tablero; los módulos para editar contenido y subir archivos todavía no están implementados.
