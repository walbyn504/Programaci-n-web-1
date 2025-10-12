<?php
session_start();
include 'usuarioBll.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $usuario = obtenerUsuario($conexion, $id);
    if (!$usuario) {
        $_SESSION['mensaje'] = "Usuario no encontrado.";
        header("Location: listado_usuarios.php");
        exit;
    }
} else {
    header("Location: listado_usuarios.php");
    exit;
}

$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];

    if (editarUsuario($conexion, $id, $nombre, $apellido, $correo, $telefono, $rol, $estado)) {
        $_SESSION['mensaje'] = "Usuario actualizado correctamente.";
        header("Location: listado_usuarios.php");
        exit;
    } else {
        $mensaje = "Error al actualizar el usuario.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <main class = "container">
        <header>
            <h2>Editar Usuario</h2>
        </header><br><br>
        <a href="panel.php" class="btn-lista">X</a>
        <?php if($mensaje) echo "<p style='color:red;'>$mensaje</p>"; ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
            Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required><br><br>
            Apellido: <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required><br><br>
            Correo: <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required><br><br>
            Teléfono: <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>" required><br><br>
            Rol:
            <select name="rol">
                <option value="Administrador" <?= $usuario['rol']==='Administrador'?'selected':'' ?>>Administrador</option>
                <option value="Usuario" <?= $usuario['rol']==='Usuario'?'selected':'' ?>>Usuario</option>
            </select><br><br>
            <?php if($usuario['estado'] === 'Inactivo' || empty($usuario['estado'])): ?>
            Estado:
            <select name="estado">
                <option value="Inactivo" <?= $usuario['estado']==='Inactivo'?'selected':'' ?>>Inactivo</option>
                <option value="Activo" <?= $usuario['estado']==='Activo'?'selected':'' ?>>Activo</option>
            </select><br><br>
            <?php else: ?>
                <input type="hidden" name="estado" value="<?= $usuario['estado'] ?>">
            <?php endif; ?>
            <button type="submit" name="guardar" class="boton">Guardar Cambios</button>
        </form>
    </main>
</body>
