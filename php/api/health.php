<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
try {
    require_once __DIR__ . '/../config/database.php';
    getDatabaseConnection()->query('SELECT 1');
    echo json_encode(['ok' => true, 'database' => 'connected'], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(503);
    error_log('[ICAT database health] ' . $e->getMessage());
    echo json_encode(['ok' => false, 'database' => 'unavailable', 'message' => 'Verifica variables DB_* y PDO MySQL.'], JSON_UNESCAPED_UNICODE);
}