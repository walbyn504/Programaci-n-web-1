<?php
include 'conexionBaseDatos.php';
include 'UsuarioBll.php';

$usuarioBll = new UsuarioBll($conexion);
$provincias = $usuarioBll->listaProvincias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <form action = "/Workshop3/guardarUsuario.php" method= "post">
    <h2 style='color:Green;'>Registro Usuarios.</h2>
    <div class="form-group">                  
        <label for="nombre">Nombre</label><br>                      
        <input type="text" class="form-control" name="nombre" id="nombre"><br><br>              
    </div>
    <div class="form-group">                  
        <label for="apellidos">Apellidos</label><br>                      
        <input type="text" class="form-control" name="apellidos" id="apellidos"><br><br>              
    </div>
    <div class="form-group">                  
        <label for="provincia">Provincia</label><br>                      
        <select name='provincia'>
            <option value="">--Selecciona una Provincia--</option>
            <?php
            //Recorre el arreglo provincias y genera automáticamente las opciones.
            foreach($provincias as $prov){
                echo "<option value='{$prov['id']}'>{$prov['nombre']}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Registrar">
    </div>
    </form>             
</body>
</html>