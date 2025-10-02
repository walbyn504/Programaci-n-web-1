<?php
include 'conexionBaseDatos.php';
include 'UsuarioBll.php';

$usuarioBll = new UsuarioBll($conexion);

// Capturar los datos enviados por POST
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$provincia_id = $_POST['provincia'] ?? '';

// Validar que no estén vacíos
if (empty($nombre) || empty($apellidos) || empty($provincia_id)) {
    echo "<p style='color:red;'>Por favor completa todos los campos.</p>";
    exit;
}

if (!$usuarioBll->registrarUsuario($nombre, $apellidos, $provincia_id)) {
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuario</title>
</head>
<body>
    <h2>Login</h2>
   <form action="#" method="post">
    <div class="form-group">                  
        <label for="username">Usuario</label><br>                      
        <input type="text" class="form-control" name="username" id="username" 
               value="<?php echo htmlspecialchars($nombre); ?>" readonly>
    </div><br>
    <button type="button" onclick="window.location.href='registro.php'">
    Registrar otro usuario
    </button>
    </form>
</body>
</html>

