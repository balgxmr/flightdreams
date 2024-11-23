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
    }
?>
