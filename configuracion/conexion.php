<?php

declare(strict_types=1);

/*
 * CONFIGURACIÓN DE CONEXIÓN
 * Complete los valores con los datos que aparecen en el panel de SmarterASP.NET.
 * No publique este archivo con la contraseña real en repositorios abiertos.
 */
$servidor = 'mysql5050.site4now.net';
$base_datos = 'db_acfbf2_bd';
$usuario_bd = 'acfbf2_bd';
$contrasena_bd = 'Sistemas.,123';
$puerto = 3306;

try {
    $conexion = new PDO(
        "mysql:host={$servidor};port={$puerto};dbname={$base_datos};charset=utf8mb4",
        $usuario_bd,
        $contrasena_bd,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $error) {
    // No mostrar credenciales ni detalles internos al usuario final.
    error_log('Error de conexión a la base de datos: ' . $error->getMessage());
    http_response_code(500);
    exit('No se pudo conectar con la base de datos. Verifique la configuración del servidor.');
}
