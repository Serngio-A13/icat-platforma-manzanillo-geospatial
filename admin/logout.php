<?php
declare(strict_types=1);
require_once __DIR__ . '/../php/admin/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verifyAdminCsrf($_POST['csrf_token'] ?? null)) {
    http_response_code(405);
    exit('Solicitud no válida.');
}

$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', [
        'expires' => time() - 42000,
        'path' => $params['path'],
        'secure' => $params['secure'],
        'httponly' => $params['httponly'],
        'samesite' => 'Strict',
    ]);
}
session_destroy();
header('Location: /admin/login.php');
exit;
