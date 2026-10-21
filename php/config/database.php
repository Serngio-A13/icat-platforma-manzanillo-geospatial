<?php
declare(strict_types=1);

/**
 * En desarrollo local puede crearse database.local.php a partir de
 * database.local.example.php. En el servidor, configura variables DB_*.
 * Las variables de entorno tienen prioridad sobre el archivo local.
 */
function getDatabaseConnection(): PDO
{
    $localFile = __DIR__ . '/database.local.php';
    $local = is_file($localFile) ? require $localFile : [];
    if (!is_array($local)) {
        $local = [];
    }

    $host = getenv('DB_HOST') ?: ($local['host'] ?? '127.0.0.1');
    $port = getenv('DB_PORT') ?: ($local['port'] ?? '3306');
    $name = getenv('DB_NAME') ?: ($local['name'] ?? 'icat_manzanillo');
    $user = getenv('DB_USER') ?: ($local['user'] ?? '');
    $passEnv = getenv('DB_PASS');
    $pass = $passEnv !== false ? $passEnv : (string)($local['pass'] ?? '');

    if ($user === '') {
        throw new RuntimeException('Falta configurar DB_USER o php/config/database.local.php.');
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}
