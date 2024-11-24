<?php
    require_once '../config/db.php';

    class Paquete {
        private $conexion;

        public function __construct() {
            $this->conexion = new DB(); // Instancia la conexión a la base de datos
        }

        public function obtenerTodos() {
            $query = "SELECT * FROM paquete"; 
            $stmt = $this->conexion->prepare($query); // Prepara la consulta
            $stmt->execute(); // Ejecuta la consulta
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve los resultados como array asociativo
        }

        public function obtenerPorServicio($servicio) {
            $query = "SELECT * FROM paquete WHERE servicio = ?"; // Ajusta según tu tabla
            $stmt = $this->conexion->prepare($query); // Prepara la consulta
            $stmt->bindValue(1, $servicio, PDO::PARAM_STR);
            $stmt->execute(); // Ejecuta la consulta
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve los resultados como array asociativo
        }

        public function obtenerTresServiciosDiferentes() {
            $query = "
                SELECT * 
                FROM paquete 
                GROUP BY servicio 
                LIMIT 3
            "; // Agrupamos por servicio y limitamos a 3
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insertar($datos) {
            $query = "INSERT INTO paquete (nombre, descripcion, destino, precio, foto, fecha_inicio, fecha_final, servicio, itinerario) 
                      VALUES (:nombre, :descripcion, :destino, :precio, :foto, :fecha_inicio, :fecha_final, :servicio, :itinerario)";
            $stmt = $this->conexion->prepare($query);
        
            $stmt->bindParam(':nombre', $datos['nombre']);
            $stmt->bindParam(':descripcion', $datos['descripcion']);
            $stmt->bindParam(':destino', $datos['destino']);
            $stmt->bindParam(':precio', $datos['precio']);
            $stmt->bindParam(':foto', $datos['foto'], PDO::PARAM_LOB);
            $stmt->bindParam(':fecha_inicio', $datos['fecha_inicio']);
            $stmt->bindParam(':fecha_final', $datos['fecha_final']);
            $stmt->bindParam(':servicio', $datos['servicio']);
            $stmt->bindParam(':itinerario', $datos['itinerario']);
        
            return $stmt->execute();
        }
        
    }
?>
