<?php
require_once '../config/db.php';

class Admin {
    private $conexion;

    public function __construct() {
        $this->conexion = new DB();
    }
    
    public function verReservasAdmin() {
        $query = $this->conexion->prepare("
            SELECT 
                v.*, 
                u.Nombre AS nombre_usuario, Correo, Telefono,
                p.Nombre AS nombre_paquete
            FROM Viajes v
            LEFT JOIN usuario u ON v.id_usuario = u.id_usuario
            LEFT JOIN paquete p ON v.id_paquete = p.id_paquete
            ORDER BY 
                CASE v.estado
                    WHEN 'pendiente' THEN 1
                    WHEN 'confirmado' THEN 2
                    WHEN 'cancelado' THEN 3
                    ELSE 4
                END,
                v.fecha_registro;
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function actualizarEstado($idViajes)
    {
        $stmt = $this->conexion->prepare("UPDATE Viajes SET estado = 'cancelado' WHERE id_viajes = ?");
        return $stmt->execute([$idViajes]);
    }

}
?>
