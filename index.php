<?php
declare(strict_types=1);
require_once __DIR__ . '/configuracion/conexion.php';

$totalEgresados = 0;
$totalConvocatorias = 0;
try {
    $totalEgresados = (int)$conexion->query('SELECT COUNT(*) FROM egresados')->fetchColumn();
    $totalConvocatorias = (int)$conexion->query("SELECT COUNT(*) FROM convocatorias WHERE estado = 'publicada'")->fetchColumn();
} catch (Throwable $error) {
    // La estructura SQL debe instalarse antes de abrir el panel.
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Seguimiento de Egresados | IESTP Utcubamba</title>
<style>
:root{--azul:#123b5d;--verde:#159b82;--fondo:#f3f6fa;--texto:#233247}
*{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--fondo);color:var(--texto)}
header{background:var(--azul);color:white;padding:28px 20px}header .contenedor,main{max-width:1050px;margin:auto}
h1{margin:0 0 8px;font-size:clamp(1.4rem,3vw,2rem)}header p{margin:0;color:#e2edf5}
main{padding:24px 18px}.rejilla{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}
.tarjeta{background:white;border-radius:14px;padding:20px;box-shadow:0 5px 18px #16324f12;border:1px solid #e2e8f0}
.numero{font-size:2rem;font-weight:bold;color:var(--verde);margin:8px 0}
a.boton{display:inline-block;padding:11px 15px;background:var(--azul);color:white;border-radius:8px;text-decoration:none;margin:5px 5px 0 0}
.nota{font-size:.92rem;line-height:1.55;color:#526277}
</style>
</head>
<body>
<header><div class="contenedor">
<h1>Sistema Web de Seguimiento de Egresados</h1>
<p>Instituto de Educación Superior Tecnológico Público Utcubamba · Bagua Grande, Amazonas</p>
</div></header>
<main>
<div class="rejilla">
<section class="tarjeta"><h2>Egresados registrados</h2><div class="numero"><?= htmlspecialchars((string)$totalEgresados) ?></div><p class="nota">Total de fichas creadas en la base de datos.</p></section>
<section class="tarjeta"><h2>Convocatorias publicadas</h2><div class="numero"><?= htmlspecialchars((string)$totalConvocatorias) ?></div><p class="nota">Oportunidades que están disponibles para consulta.</p></section>
<section class="tarjeta"><h2>Accesos</h2><p class="nota">La plantilla inicial confirma la conexión y lectura de las tablas. Los formularios y permisos deben integrarse en las siguientes etapas.</p><a class="boton" href="verificar_conexion.php">Verificar conexión</a></section>
</div>
<section class="tarjeta" style="margin-top:16px">
<h2>Estado de la instalación</h2>
<p>Esta es una plantilla inicial para conectar el proyecto PHP con la base de datos del hosting. No representa todavía el sistema completo de producción.</p>
<ul><li>Base de datos y tablas en español.</li><li>Conexión mediante PDO y consultas preparadas.</li><li>Roles previstos: jefe de empleabilidad, personal de seguimiento y egresado.</li><li>Próximo paso: integrar inicio de sesión, registro seguro y pantallas de cada módulo.</li></ul>
<p class="nota">Por seguridad, no se creó una cuenta administrativa con contraseña predeterminada. El administrador debe crearse mediante un proceso de instalación protegido.</p>
</section>
</main>
</body>
</html>
