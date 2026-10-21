<?php
declare(strict_types=1);
require_once __DIR__ . '/configuracion/conexion.php';
try {
    $resultado = $conexion->query('SELECT VERSION() AS version_mysql, DATABASE() AS base_actual')->fetch();
    $tablas = $conexion->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
} catch (Throwable $error) {
    http_response_code(500);
    exit('La conexión abrió, pero no se pudo consultar la estructura. Ejecute primero el archivo SQL.');
}
?>
<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Verificación de conexión</title>
<style>body{font-family:Arial,sans-serif;background:#f3f6fa;padding:24px;color:#233247}.caja{max-width:850px;margin:auto;background:white;padding:24px;border-radius:12px}li{padding:4px}</style></head><body><main class="caja">
<h1>Conexión a la base de datos</h1>
<p><strong>Estado:</strong> conexión correcta.</p>
<p><strong>Base de datos:</strong> <?=htmlspecialchars((string)$resultado['base_actual'])?></p>
<p><strong>Versión del servidor:</strong> <?=htmlspecialchars((string)$resultado['version_mysql'])?></p>
<h2>Tablas detectadas</h2><ul><?php foreach($tablas as $tabla): ?><li><?=htmlspecialchars((string)$tabla)?></li><?php endforeach; ?></ul>
<p>Cuando termine la prueba, elimine o proteja este archivo para no exponer información técnica innecesaria.</p>
<p><a href="index.php">Volver al inicio</a></p>
</main></body></html>
