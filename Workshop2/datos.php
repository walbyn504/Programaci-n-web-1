<?php
$mensaje = "";

// Verificamos si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $base_de_datos = "bade_datos_workshop2";

    $conexion = new mysqli($host, $usuario, $password, $base_de_datos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $conexion->prepare("INSERT INTO contactos (nombre, apellido, correo, telefono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $telefono);

    if ($stmt->execute()) {
        // Redirigimos agregando un parámetro en la URL
        header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=exito");
        exit();
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=error&detalle=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conexion->close();
}

// Mostrar mensaje según parámetro GET
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == "exito") {
        $mensaje = "Datos insertados correctamente.";
    } elseif ($_GET['mensaje'] == "error" && isset($_GET['detalle'])) {
        $mensaje = "Error al insertar datos: " . htmlspecialchars($_GET['detalle']);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="estilos.css?v=1.0">
</head>
<body>

<div class="form-container">
    <h2 class="form-title">Formulario de Contacto</h2>

    <?php if($mensaje != ""): ?>
        <p><strong><?php echo $mensaje; ?></strong></p>
    <script>
        if(window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    </script>
    <?php endif; ?>

    <form action="" method="post">
        <div class="input-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        
        <div class="input-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>
        
        <div class="input-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        
        <div class="input-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" required>
        </div>
        
        <div class="separator"></div>
        
        <button type="submit" class="btn-submit">Enviar</button>
    </form>
</div>

</body>
</html>
