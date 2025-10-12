<?php
session_start();
include 'usuarioBll.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $contrasena = $_POST['contrasena'];

    $usuario = loginUsuario($conexion, $username, $contrasena);

if ($usuario) {
    $_SESSION['usuario'] = $usuario;
    header("Location: panel.php");
    exit;
} else {
    echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css?v=1.0">
</head>
<body>
    <main class= "container">
        <form method="POST">
            <header>
                <h2>Iniciar Sesión</h2>
            </header>
            <div><br>                  
                <label for="username">Usuario: </label><br>                      
                <input type="text" name="username">
            </div><br><br>
            <div>
                <label for="contrasena">Contraseña: </label><br>
                <input type="password" name="contrasena"><br><br>
            <button type="submit" class="boton">Entrar</button>
        </form>
    </main>
</body>
</html>