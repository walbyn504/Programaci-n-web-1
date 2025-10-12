<?php
include 'usuarioBll.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    crearUsuario($conexion, $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'], $_POST['rol'], $_POST['estado'], $_POST['username'], $_POST['contrasena']);
    header("Location: listado_usuarios.php");
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
    <main class="container">
        <a href="panel.php" class="btn-lista">X</a>
        <form method="POST">
            <header>
                <h2>Agregar Usuario</h2>
            </header><br><br>
            Nombre: <input type="text" name="nombre" required><br><br>
            Apellido: <input type="text" name="apellido" required><br><br>
            Correo: <input type="email" name="correo" required><br><br>
            Teléfono: <input type="text" name="telefono" required><br><br>
            Usuario: <input type="text" name="username" required><br><br>
            Contraseña: <input type="password" name="contrasena" required><br><br>
            Rol: 
            <select name="rol">
                <option>Administrador</option>
                <option>Usuario</option>
            </select><br><br>
            Estado:
            <select name="estado">
                <option>Activo</option>
                <option>Inactivo</option>
            </select><br><br>
            <button type="submit" class="boton">Guardar</button>
        </form>
    </main>
</body>