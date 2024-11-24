<?php
require_once '../config/db.php';

class Api {
    private $conexion;

    public function __construct() {
        $this->conexion = new DB(); // Instancia de la conexión
    }

    public function obtenerTodos() {
        $sql = "SELECT * FROM paquete";
        $stmt = $this->conexion->prepare($sql); // Usamos el método `prepare` de la clase DB
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolvemos los resultados
    }
}
?>
