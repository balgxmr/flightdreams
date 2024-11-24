<?php
require_once(__DIR__ . '/../config/db.php');

class Admin {
    private $conexion;

    public function __construct() {
        $this->conexion = new DB();
    }
    
    public function verReservasAdmin($estado = '') {
        // Empieza con la consulta base
        $sql = "
            SELECT 
                v.*, 
                u.Nombre AS nombre_usuario, 
                u.Correo, 
                u.Telefono,
                p.Nombre AS nombre_paquete
            FROM Viajes v
            LEFT JOIN usuario u ON v.id_usuario = u.id_usuario
            LEFT JOIN paquete p ON v.id_paquete = p.id_paquete
        ";
        
        // Añadir la cláusula WHERE si se pasa el estado
        if ($estado) {
            $sql .= " WHERE v.estado = :estado";
        }
        
        // Ordenar la consulta
        $sql .= " ORDER BY v.fecha_registro DESC";
        
        // Preparar la consulta
        $query = $this->conexion->prepare($sql);
        
        // Si se pasa un estado, se debe vincular el parámetro
        if ($estado) {
            $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        }
        
        // Ejecutar la consulta
        $query->execute();
        
        // Retornar los resultados
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarEstado($idViajes, $estado) {
        // Verifica si el estado es válido
        $estadosPermitidos = ['cancelado', 'confirmado', 'pendiente'];
        if (!in_array($estado, $estadosPermitidos)) {
            throw new Exception("Estado no válido");
        }

        // Prepara la consulta SQL
        $stmt = $this->conexion->prepare("UPDATE Viajes SET estado = ? WHERE id_viajes = ?");
        
        // Ejecuta la consulta
        return $stmt->execute([$estado, $idViajes]);
    }

    public function getNacionalidadMasRepetida() {
        $sql = "SELECT Nacionalidad, COUNT(*) AS cantidad
                FROM Usuario
                GROUP BY Nacionalidad
                ORDER BY cantidad DESC
                LIMIT 1";
    
        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retornar la nacionalidad más repetida
        if ($row) {
            return $row; // Contiene Nacionalidad y cantidad
        } else {
            return null; // Si no se encuentra ninguna nacionalidad
        }
    }
    
}
?>
