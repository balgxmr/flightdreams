<?php
require_once '../config/db.php'; // Incluye la conexión a la base de datos

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new DB(); // Instancia la conexión a la base de datos
    }

    // Función para registrar un nuevo usuario
    public function registrar($nombre, $apellido, $correo, $contrasena, $nacionalidad, $residencia, $telefono) {
        // Encriptamos la contraseña
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparamos la consulta SQL para insertar el nuevo usuario
        $query = "INSERT INTO Usuario (Nombre, Apellido, Correo, Contrasena, Nacionalidad, Residencia, Telefono) 
                  VALUES (:nombre, :apellido, :correo, :contrasena, :nacionalidad, :residencia, :telefono)";

        // Preparamos la declaración SQL
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena_encriptada);
        $stmt->bindParam(':nacionalidad', $nacionalidad);
        $stmt->bindParam(':residencia', $residencia);
        $stmt->bindParam(':telefono', $telefono);

        // Ejecutamos la consulta
        if ($stmt->execute()) {
            return true; // Usuario registrado exitosamente
        } else {
            return false; // Hubo un error al registrar el usuario
        }
    }
}
?>
