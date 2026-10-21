<?php
declare(strict_types=1);
require_once __DIR__ . '/../php/admin/auth.php';
require_once __DIR__ . '/../php/config/database.php';

if (adminIsAuthenticated()) {
    header('Location: /admin/index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyAdminCsrf($_POST['csrf_token'] ?? null)) {
        $error = 'La sesión del formulario expiró. Recarga la página e inténtalo de nuevo.';
    } else {
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            $error = 'Escribe tu usuario y contraseña.';
        } else {
            try {
                $pdo = getDatabaseConnection();
                $stmt = $pdo->prepare('SELECT id, nombre_usuario, nombre_completo, password_hash FROM usuarios WHERE nombre_usuario = :username AND activo = 1 LIMIT 1');
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password_hash'])) {
                    session_regenerate_id(true);
                    $_SESSION['admin_user_id'] = (int)$user['id'];
                    $_SESSION['admin_username'] = $user['nombre_usuario'];
                    $_SESSION['admin_name'] = $user['nombre_completo'];
                    $_SESSION['admin_csrf'] = bin2hex(random_bytes(32));

                    $audit = $pdo->prepare('UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = :id');
                    $audit->execute(['id' => $user['id']]);

                    header('Location: /admin/index.php');
                    exit;
                }
                $error = 'Usuario o contraseña incorrectos, o cuenta desactivada.';
            } catch (Throwable $e) {
                error_log('[ICAT admin login] ' . $e->getMessage());
                $error = 'No se pudo iniciar sesión. Verifica la configuración de la base de datos.';
            }
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acceso administrativo | Atlas Digital Litoral</title>
  <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body class="admin-body">
  <main class="login-card">
    <a class="brand-link" href="/">Atlas Digital Litoral <span>Manzanillo · ICAT</span></a>
    <p class="eyebrow">ÁREA PRIVADA</p>
    <h1>Iniciar sesión</h1>
    <p class="muted">Acceso exclusivo para las cuentas autorizadas del equipo investigador.</p>
    <?php if ($error !== ''): ?>
      <div class="alert" role="alert"><?= escapeHtml($error) ?></div>
    <?php endif; ?>
    <form method="post" action="/admin/login.php">
      <input type="hidden" name="csrf_token" value="<?= escapeHtml(adminCsrfToken()) ?>">
      <label for="username">Usuario</label>
      <input id="username" name="username" type="text" autocomplete="username" maxlength="50" required>
      <label for="password">Contraseña</label>
      <input id="password" name="password" type="password" autocomplete="current-password" required>
      <button type="submit">Entrar al panel</button>
    </form>
    <a class="back-link" href="/">← Volver a la plataforma pública</a>
  </main>
</body>
</html>
