<?php
declare(strict_types=1);

/*
 * Ejecutar solo desde CLI después de importar database/schema.sql.
 * Define ADMIN1_USER, ADMIN1_NAME, ADMIN1_PASS y los equivalentes 2 y 3.
 * No se crean contraseñas predeterminadas ni se permite ejecutar desde web.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit("No encontrado.\n");
}

require_once __DIR__ . '/../config/database.php';

$accounts = [];
for ($i = 1; $i <= 3; $i++) {
    $username = trim((string)getenv("ADMIN{$i}_USER"));
    $name = trim((string)getenv("ADMIN{$i}_NAME"));
    $password = (string)getenv("ADMIN{$i}_PASS");
    if ($username === '' || $name === '' || $password === '') {
        fwrite(STDERR, "Faltan variables para la cuenta {$i}: ADMIN{$i}_USER, ADMIN{$i}_NAME y ADMIN{$i}_PASS.\n");
        exit(1);
    }
    if (strlen($username) > 50 || strlen($name) > 120 || strlen($password) < 12) {
        fwrite(STDERR, "La cuenta {$i} excede un límite o su contraseña tiene menos de 12 caracteres.\n");
        exit(1);
    }
    $accounts[] = ['username' => $username, 'name' => $name, 'password' => $password];
}

$usernames = array_column($accounts, 'username');
if (count(array_unique($usernames)) !== 3) {
    fwrite(STDERR, "Los tres nombres de usuario deben ser diferentes.\n");
    exit(1);
}

try {
    $pdo = getDatabaseConnection();
    $pdo->beginTransaction();
    $count = (int)$pdo->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
    if ($count !== 0) {
        $pdo->rollBack();
        fwrite(STDERR, "La tabla usuarios ya contiene cuentas. Por seguridad, este script solo funciona con una tabla vacía.\n");
        exit(1);
    }

    $insert = $pdo->prepare('INSERT INTO usuarios (nombre_usuario, nombre_completo, password_hash) VALUES (:username, :name, :hash)');
    foreach ($accounts as $account) {
        $insert->execute([
            'username' => $account['username'],
            'name' => $account['name'],
            'hash' => password_hash($account['password'], PASSWORD_DEFAULT),
        ]);
    }
    $pdo->commit();
    fwrite(STDOUT, "Se crearon las tres cuentas. Guarda las credenciales en un lugar seguro y elimina las variables de entorno temporales.\n");
} catch (Throwable $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log('[ICAT setup users] ' . $e->getMessage());
    fwrite(STDERR, "No fue posible crear las cuentas. Revisa la conexión y que la tabla usuarios esté vacía.\n");
    exit(1);
}
