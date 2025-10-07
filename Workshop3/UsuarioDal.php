<?php
class UsuarioDal {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion; 
    }

    public function insertarUsuario($nombre, $apellidos, $provincia_id) {
        $stmt = $this->conexion->prepare(
            "INSERT INTO usuarios (nombre, apellidos, provincia_id) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("ssi", $nombre, $apellidos, $provincia_id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    public function obtenerProvincias() {
        $resultado = $this->conexion->query("SELECT id, nombre FROM provincias");
        $provincias = [];
        //Recorre los resultados y devuelve un array con todas las provincias encontradas.
        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $provincias[] = $fila;
            }
        }
        return $provincias;
    }
}
?>
