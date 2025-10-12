<?php
session_start();
include 'conexion.php';
include 'usuarioBll.php';

$usuarios = listarUsuarios($conexion);
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="estilos.css?v=1.0">
</head>
<body>
    <main class = "container">
        <header>
            <h2>Listado de Usuarios</h2>
        </header><br><br>
        <a href="panel.php" class="btn-lista">X</a>
        <?php if($mensaje): ?>
            <p style="color:green;"><?= htmlspecialchars($mensaje) ?></p>
            <?php endif; ?>
            <table border="1" cellpadding="5">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Rol</th>
                    <th>Username</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach($usuarios as $u): ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= htmlspecialchars($u['nombre']) ?></td>
                        <td><?= htmlspecialchars($u['apellido']) ?></td>
                        <td><?= htmlspecialchars($u['correo']) ?></td>
                        <td><?= htmlspecialchars($u['telefono']) ?></td>
                        <td><?= htmlspecialchars($u['estado']) ?></td>
                        <td><?= htmlspecialchars($u['rol']) ?></td>
                        <td><?= htmlspecialchars($u['username']) ?></td>
                        <td>
                            <?php if($u['id'] != $_SESSION['usuario']['id']): ?>
                                <form style="display:inline" method="POST" action="editar_usuario.php">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <button type="submit">Editar</button>
                                </form>

                                <form style="display:inline" method="POST" action="eliminar_usuario.php">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar este usuario?');">Eliminar</button>
                                </form>

                                <?php if($u['estado'] === 'Activo'): ?>
                                    <form style="display:inline" method="POST" action="deshabilitar_usuario.php">
                                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                        <button type="submit">Deshabilitar</button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>Logueado</span>
                            <?php endif; ?>
                        </td>
                     </tr>
                <?php endforeach; ?>
            </table>
    </main>
</body>
</html>


