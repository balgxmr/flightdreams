<?php
require_once '../config/db.php';

class Viajes {
    private $conexion;

    public function __construct() {
        $this->conexion = new DB();
    }

    // Función para insertar un nuevo viaje en la base de datos
    public function crearViaje($estado, $fecha_inicio, $fecha_final, $visa, $id_usuario, $id_paquete) {
        try {
            $query = "INSERT INTO Viajes (Estado, Fecha_inicio, Fecha_final, Visa, id_usuario, id_paquete) 
                      VALUES (:estado, :fecha_inicio, :fecha_final, :visa, :id_usuario, :id_paquete)";
            $stmt = $this->conexion->prepare($query);

            // Vincular parámetros
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt->bindParam(':fecha_final', $fecha_final);
            $stmt->bindParam(':visa', $visa, PDO::PARAM_BOOL);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_paquete', $id_paquete, PDO::PARAM_INT);

            // Ejecutar consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear el viaje: " . $e->getMessage();
            return false;
        }
    }

    public function verReservas($userId) {
        $query = $this->conexion->prepare("SELECT * FROM Viajes WHERE id_usuario = ?");
        $query->execute([$userId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
