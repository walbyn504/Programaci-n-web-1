<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$inactivo = ($usuario['estado'] === 'Inactivo');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <p>Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?> (<?= htmlspecialchars($usuario['rol']) ?>)</p>
    </header>

    <main>
        <a href="login.php" class="btn-atras">X</a>
        <?php if (!$inactivo): ?>
            <div class="acciones">
                <a href="insertar_usuario.php" class="accion">Agregar Usuario</a>
                <a href="listado_usuarios.php" class="accion">Listado de Usuarios</a>
                <a href="cerrarSeccion.php" class="accion">Cerrar sesión</a>
            </div>
        <?php else: ?>
            <p class="mensaje">Tu cuenta está inactiva. Solo puedes visualizar información.</p>
            <div class="acciones">
                <a class="accion inactivo">Agregar Usuario</a>
                <a class="accion inactivo">Listado de Usuarios</a>
                <a href="cerrarSeccion.php" class="accion">Cerrar sesión</a>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>

